<?php

namespace App\Http\Controllers;


use App\Models\VmtEmployeeWorkShifts;
use App\Services\VmtEmployeeLeaveModel;
use App\Services\VmtAttendanceService;
use App\Mail\ApproveRejectLeaveMail;
use App\Mail\RequestLeaveMail;
use App\Mail\VmtAttendanceMail_Regularization;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeCompensatoryLeave;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtLeaves;

use App\Models\VmtStaffAttendanceDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtOrgTimePeriod;
use App\Services\VmtNotificationsService;
use App\Models\VmtTimePeriod;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use Symfony\Component\Mailer\Exception\TransportException;


class VmtAttendanceController extends Controller
{

    public function showDashboard(Request $request)
    {

        $Total_Active_Employees = User::where('active', '1')

            ->where('is_ssa', '0')
            ->count();

        return view('attendance_dashboard', compact('Total_Active_Employees'));
    }

    public function showAttendanceLeavePage(Request $request)
    {

        $allEmployeesList = User::all();
        $leaveTypes = VmtLeaves::all();
        $leaveData_Team = null;
        $leaveData_Org = null;

        $leaveData_currentUser = VmtEmployeeLeaves::where('user_id', auth::user()->id);
        // dd( $leaveData_currentUser->get());
        //Get how many leaves taken for each leave_type
        $leaveData_currentUser = getLeaveCountDetails(auth::user()->id);

        //dd($leaveData_currentUser->toArray());

        //Accrued Leave Year Frame
        $available_time_frames = array();
        $time_periods_of_year_query = VmtOrgTimePeriod::where('status', 1)->first();
        $start_date =  $time_periods_of_year_query->start_date;
        $end_date   = $time_periods_of_year_query->end_date;
        $calender_type = $time_periods_of_year_query->abbrevation;
        // $time_frame = array( $start_date.'/'. $end_date=>$calender_type.' '.substr($start_date, 0, 4).'-'.substr($end_date, 0, 4));
        $available_time_frame_query = VmtOrgTimePeriod::get();
        foreach ($available_time_frame_query as $single_time_frame) {
            $time_frame_start_date = $single_time_frame->start_date;
            $time_frame_end_date = $single_time_frame->end_date;
            $available_time_frames[$single_time_frame->start_date . "/" . $single_time_frame->end_date] = $single_time_frame->abbrevation . ' ' . substr($time_frame_start_date, 0, 4) . '-' . substr($time_frame_end_date, 0, 4);
        }
        $time_frame = $calender_type . ' ' . substr($start_date, 0, 4) . '-' . substr($end_date, 0, 4);




        //Generate Team leave data
        if (Str::contains(currentLoggedInUserRole(), ['Manager'])) {
            //dd(auth::user()->id);
            $teamMembers_UserIDs = getTeamMembersUserIds(auth::user()->id);

            $leaveData_Team = VmtEmployeeLeaves::whereIn('user_id', $teamMembers_UserIDs)->get();
        }

        //Generate Org leave data
        if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR'])) {
            $leaveData_Org = VmtEmployeeLeaves::all();
        }
        //Calculate Leave Balance
        //   $leave_balance_details = calculateLeaveDetails(auth::user()->id,$start_date,$end_date);

        //dd(  $leave_balance_details);
        //dd($leaveTypes->toArray());
        return view('attendance_leave', compact('allEmployeesList', 'leaveTypes', 'leaveData_Org', 'leaveData_Team', 'leaveData_currentUser', 'time_frame', 'available_time_frames', 'time_frame'));
    }

    public function showAttendanceLeaveSettings(Request $request)
    {
        return view('attendance_leave_settings');
    }

    public function showAttendanceLeaveReportsPage(Request $request)
    {
        return view('attendance_leaveReports');
    }

    public function showLeaveHistoryPage(Request $request)
    {
        $allEmployeesList = User::all(['id', 'name']);

        if ($request->type == 'org') {
            return view('leave_history_org', compact('allEmployeesList'));
        } else
        if ($request->type == 'team') {
            return view('leave_history_team', compact('allEmployeesList'));
        } else
        if ($request->type == 'employee') {
            return view('leave_history_employee', compact('allEmployeesList'));
        }
    }

    public function showLeaveApprovalPage(Request $request)
    {
        $allEmployeesList = User::all(['id', 'name']);

        return view('attendance_leave_approvals', compact('allEmployeesList'));
    }


    public function approveRejectRevokeLeaveRequest(Request $request, VmtAttendanceService $serviceVmtAttendanceService, VmtNotificationsService $serviceNotificationsService)
    {

        return $serviceVmtAttendanceService->approveRejectRevokeLeaveRequest(
            $request->record_id,
            auth()->user()->user_code,
            $request->status,
            $request->review_comment,
            serviceNotificationsService: $serviceNotificationsService
        );
    }

    public function getEmployeeLeaveDetails(Request $request,  VmtAttendanceService $serviceVmtAttendanceService)
    {
        return $serviceVmtAttendanceService->getEmployeeLeaveDetails($request->user_code, $request->filter_month, $request->filter_year, $request->filter_leave_status);
    }

    public function getTeamEmployeesLeaveDetails(Request $request,  VmtAttendanceService $serviceVmtAttendanceService)
    {
        //dd($request->all());
        return $serviceVmtAttendanceService->getTeamEmployeesLeaveDetails($request->manager_code, $request->filter_month, $request->filter_year, $request->filter_leave_status);
    }

    public function getAllEmployeesLeaveDetails(Request $request,  VmtAttendanceService $serviceVmtAttendanceService)
    {
        return $serviceVmtAttendanceService->getAllEmployeesLeaveDetails($request->filter_month, $request->filter_year, $request->filter_leave_status);
    }


    /*
        Fetches all leave details
        Also used VJS and gridjs table

        used in leave approvals page only

    */
    public function getLeaveRequestDetailsBasedOnCurrentRole(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {
        $response = $serviceVmtAttendanceService->getLeaveRequestDetailsBasedOnCurrentRole();

        return response()->json([
            "status" => "success",
            "message" => "",
            "data" => $response
        ]);
    }

    public function fetchSingleLeavePolicyRecord($id)
    {
        $temp = VmtLeaves::find($id);
        return $temp;
    }

    public function updateSingleLeavePolicyRecord(Request $request)
    {
        $vmtLeave = VmtLeaves::find($request->leave_policy_id);
        $vmtLeave->days_annual  = $request->days_annual;
        $vmtLeave->days_monthly  = $request->days_month;
        $vmtLeave->days_restricted  = $request->days_restricted;


        $vmtLeave->save();
        $response = [
            'status' => 'success',
            'message' => 'Leave details updated',
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;
    }

    /*
         Get leave info based on given leave_id
    */
    public function getLeaveInformation(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {
        return $serviceVmtAttendanceService->getLeaveInformation($request->record_id);
    }

    /*
        For VJS Leave Approvals table

        Returns all leave status types

    */
    private function createLeaveRange($start_date, $end_date)
    {
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start_date, $interval, $end_date);

        return $daterange;
    }

    public function applyLeaveRequest(Request $request, VmtNotificationsService $serviceNotificationsService)
    {

        try{
            // dd($request ->all());

            //get manager of this employee
            $manager_emp_code = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first()->l1_manager_code;
            $query_manager = User::where('user_code', $manager_emp_code);
            $reviewer_mail =  null;

            if ($query_manager->exists()) {
                $query_manager = $query_manager->first();
                $reviewer_mail =  VmtEmployeeOfficeDetails::where('user_id', $query_manager->id)->first()->officical_mail;
            } else {
                //throw error
                return [
                    "status" => "failure",
                    "message" => "Manager not found for the given employee. Please contact the admin",
                    "data" => "",
                ];
            }


            $leave_month = date('m', strtotime($request->start_date));
            $compensatory_leavetype_id = VmtLeaves::where('leave_type', 'LIKE', '%Compensatory%')->value('id');

            $leave_type_id = VmtLeaves::where('leave_type', $request->leave_type_name)->value('id');
            //dd($leave_type_id);
            //get the existing Pending/Approved leaves. No need to check Rejected
            $existingNonPendingLeaves = VmtEmployeeLeaves::where('user_id', auth::user()->id)
                ->whereMonth('start_date', '>=', $leave_month)
                ->whereIn('status', ['Pending', 'Approved'])
                ->get(['start_date', 'end_date', 'status']);

            foreach ($existingNonPendingLeaves as $singleLeaveRange) {
                //$endDate = new Carbon($singleLeaveRange->end_date);
                //$endDate->addDay();

                if ($singleLeaveRange->start_date == $singleLeaveRange->end_date) {
                    //Since start and end range are same , add one day
                    $end_date = date('Y-m-d', strtotime($singleLeaveRange->end_date . ' +1 day'));

                    //dd($stop_date);
                    //create leave range
                    $leave_range = $this->createLeaveRange($singleLeaveRange->start_date, $end_date);
                    // dd($leave_range);
                } else {
                    //create leave range
                    $leave_range = $this->createLeaveRange($singleLeaveRange->start_date, $singleLeaveRange->end_date);
                }

                //check with the user given leave range
                foreach ($leave_range as $date) {
                    //if date already exists in previous leaves
                    // if ($processed_leave_start_date->format('Y-m-d') == $date->format('Y-m-d') || $processed_leave_end_date->format('Y-m-d') == $date->format('Y-m-d'))

                    if ($request->start_date == $date->format('Y-m-d') || $request->end_date == $date->format('Y-m-d')) {
                        return $response = [
                            'status' => 'failure',
                            'message' => 'Leave Request already applied for this date',
                            'mail_status' => '',
                            'error' => '',
                            'error_verbose' => ''
                        ];
                    }
                }
            }

            $diff = "ERROR";
            $mailtext_total_leave = " 0-0";


            //Check if its Leave or Permission
            if (isPermissionLeaveType($leave_type_id)) {

                $diff = $request->hours_diff;
                $mailtext_total_leave = $diff . " Hour(s)";
            } else {
                //Now its leave type

                ////Check if its 0.5 day leave, then handle separately

                if ($request->no_of_days == '0.5') {
                    if ($request->leave_session == "FN") {
                        $diff = "Fore-noon ";
                    } else
                    if ($request->leave_session == "AN") {
                        $diff = "After-noon ";
                    }
                } else {
                    //If its not half day leave, then its fullday or custom days
                    $diff = intval($request->no_of_days)." ";
                }

                $mailtext_total_leave = $diff . " Day(s)";
            }


            //Save in DB
            $emp_leave_details =  new VmtEmployeeLeaves;
            $emp_leave_details->user_id = auth::user()->id;
            $emp_leave_details->leave_type_id = $leave_type_id;
            $emp_leave_details->leaverequest_date = $request->leave_request_date;
            $emp_leave_details->start_date = $request->start_date;
            $emp_leave_details->end_date = $request->end_date;
            $emp_leave_details->leave_reason = $request->leave_reason;
            $emp_leave_details->total_leave_datetime = $diff . $request->leave_session;
            // $emp_leave_details->total_leave_datetime = $diff;




            $emp_leave_details->reviewer_user_id = $query_manager->id;
            $emp_avatar = json_decode(getEmployeeAvatarOrShortName(auth::user()->id));

            if (!empty($request->notifications_users_id))
                $emp_leave_details->notifications_users_id = implode(",", $request->notifications_users_id);

            $emp_leave_details->reviewer_comments = "";
            $emp_leave_details->status = "Pending";

            //dd($emp_leave_details->toArray());
            $emp_leave_details->save();


            ////If compensatory leave, then store the comp work days in 'vmt_employee_compensatory_leaves'
            if ($leave_type_id == $compensatory_leavetype_id) {
                $array_comp_work_days_ids = $request->compensatory_work_days_ids == '' ? null : $request->compensatory_work_days_ids;


                if (!empty($array_comp_work_days_ids) && is_array($array_comp_work_days_ids)) {

                    foreach ($array_comp_work_days_ids as $singleCompWorkDayID) {
                        $emp_compensatory_leave = new VmtEmployeeCompensatoryLeave;
                        $emp_compensatory_leave->employee_leave_id = $emp_leave_details->id;
                        $emp_compensatory_leave->employee_attendance_id = $singleCompWorkDayID;
                        $emp_compensatory_leave->save();
                    }
                }
            }
            ////

            //Need to send mail to 'reviewer' and 'notifications_users_id' list

            $message = "";
            $mail_status = "";

            $VmtClientMaster = VmtClientMaster::first();
            $image_view = url('/') . $VmtClientMaster->client_logo;

            // dd($request->leave_type_id);
            if (!empty($request->notifications_users_id))
                $notification_mails = VmtEmployeeOfficeDetails::whereIn('user_id', $request->notifications_users_id)->pluck('officical_mail');
            else
                $notification_mails = array();

            // dd($reviewer_mail);

            $isSent    = \Mail::to($reviewer_mail)->cc($notification_mails)->send(new RequestLeaveMail(
                uEmployeeName: auth::user()->name,
                uEmpCode: auth::user()->user_code,
                uEmpAvatar: $emp_avatar,
                uManagerName: $query_manager->name,
                uLeaveRequestDate: Carbon::parse($request->leave_request_date)->format('M jS Y'),
                uStartDate: Carbon::parse($request->start_date)->format('M jS Y'),
                uEndDate: Carbon::parse($request->end_date)->format('M jS Y'),
                uReason: $request->leave_reason,
                uLeaveType: $request->leave_type_name,
                uTotal_leave_datetime: $mailtext_total_leave,
                //Carbon::parse($request->total_leave_datetime)->format('M jS Y \\, h:i:s A'),
                loginLink: request()->getSchemeAndHttpHost(),
                image_view: $image_view
            ));

            if ($isSent) {
                $mail_status = "Mail sent successfully";
            } else {
                $mail_status = "There was one or more failures.";
            }
            //send mobile notification
            $user_code = auth::user()->user_code;
            $res_notification = $serviceNotificationsService->sendLeaveApplied_FCMNotification(
                notif_user_id: $user_code,
                leave_module_type: 'employee_applies_leave',
                manager_user_code: $manager_emp_code,
                notifications_users_id: $request->notifications_users_id,
            );

            $response = [
                'status' => 'success',
                'message' => 'Leave Request applied successfully',
                'mail_status' => $mail_status,
                'notification_status ' => $res_notification,
                'error' => '',
                'error_verbose' => ''
            ];

            return $response;
        }
        catch(TransportException $e){

           return [
                'status' => 'success',
                'message' => 'Leave Request applied successfully.',
                'mail_status' => 'failure',
                'notification_status ' => '',
                'error' => $e->getMessage(),
                'error_verbose' => $e
            ];
        }
        catch(\Exception $e){
           return [
                'status' => 'failure',
                'message' => 'Error while applying leave request. Please contact the Admin.',
                'mail_status' => 'failure',
                'notification_status ' => '',
                'error' => $e->getMessage(),
                'error_verbose' => $e
            ];
        }
    }


    public function withdrawLeave(Request $request)
    {
        $withdraw_leave_query = VmtEmployeeLeaves::where('id', $request->leave_id)
            ->update(array('status' => 'Withdrawn'));
        $leave_status = VmtEmployeeLeaves::where('id', $request->leave_id)->first()->status;

        $response = [
            'status' => 'success',
            'message' => 'Leave withdrawn successfully',
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;
    }


    //Revoke Leave function
    public function revokeLeave(Request $request)
    {

        $response = $this->approveRejectRevokeLeaveRequest($request);

        return $response;
    }
    /*
        Show the attendance IN/OUT time for the given month

    */
    public function showEmployeeTimeSheetPage(Request $request)
    {

        //TODO : get the attendance data for the given month
        $employeeAttendanceData = VmtEmployeeAttendance::all();


        //dd($employeeAttendanceData);
        return view('old_vmt_attendance_timesheet', compact('employeeAttendanceData'));
    }

    /*
        Fetch timesheet data via AJAX
        Input :

    */
    // public function fetchTimesheetData(Request $request)
    // {
    //     $month = $request->month;
    //     $user_id  =$request->user_id;

    //     $employeeAttendanceData = VmtEmployeeAttendance::whereMonth('checkin_time',$month)
    //                                 ->where('user_id',$user_id)
    //                                 ->get();

    //     return $employeeAttendanceData;
    // }

    public function showAllEmployeesTimesheetPage(Request $request)
    {


        return view('vmt_admin_attendance_timesheet', compact('employeeAttendanceData'));
    }

    public function fetchLeavePolicyDetails(Request $request)
    {
        return VmtLeaves::all();
    }

    /**
     * dayWiseStaffAttendance
     * table: users, vmt_staff_attenndance_device
     * input param: date
     *
     */
    protected function dayWiseStaffAttendance(Request $request)
    {
        $date = $request->has('date') ? $request->date : Carbon::now()->format('Y-m-d');

        $attendanceJoin = \DB::table('vmt_staff_attenndance_device')
            ->select('user_Id', \DB::raw('MAX(date) as check_out_time'), \DB::raw('MIN(date) as check_in_time'))
            ->whereDate('date', $date)
            ->groupBy('user_Id');

        $users = \DB::table('users')->select('id', 'name', 'user_code', 'check_in_time', 'check_out_time')
            ->leftJoinSub($attendanceJoin, 'vmt_staff_attenndance_device', function ($join) {
                $join->on('users.user_code', '=', 'vmt_staff_attenndance_device.user_Id');
            })->get();

        //Shift timings
        $shift_timings = VmtWorkShifts::where('shift_name', 'First Shift')->first();

        return view('vmt_daily_staff_attendance', compact('users', 'shift_timings'));
    }





    /////////////////////// New routing methods


    public function showTimesheet(Request $request)
    {
        $shift_start_time = VmtWorkShifts::where('shift_name', "First Shift")->value('shift_start_time');
        $shift_end_time = VmtWorkShifts::where('shift_name', "First Shift")->value('shift_end_time');
        $leaveTypes = VmtLeaves::all();
        $leaveData_currentUser = VmtEmployeeLeaves::where('user_id', auth::user()->id);
        //Get how many leaves taken for each leave_type
        $leaveData_currentUser = getLeaveCountDetails(auth::user()->id);


        //Show the single employee timesheet detail in sidepanel

        $current_employee_detail = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.id', auth::user()->id)
            ->first(['users.id', 'users.name', 'vmt_employee_office_details.designation']);

        $current_employee_detail->employee_avatar = getEmployeeAvatarOrShortName($current_employee_detail->id);

        return view('attendance_timesheet', compact('current_employee_detail', 'shift_start_time', 'shift_end_time', 'leaveTypes'));
    }
    public function getShiftTimeForEmployee($user_id, $checkin_time, $checkout_time)
    {
        $emp_work_shift = VmtEmployeeWorkShifts::where('user_id', $user_id)->where('is_active', '1')->get();
        if (count($emp_work_shift) == 1) {
            $regularTime  = VmtWorkShifts::where('id', $emp_work_shift->first()->work_shift_id)->first();
            return  $regularTime;
        } else if (count($emp_work_shift) > 1) {
            foreach ($emp_work_shift as $single_work_shift) {
                $regularTime  = VmtWorkShifts::where('id', $single_work_shift->work_shift_id)->first();
                $shift_start_time = Carbon::parse($regularTime->shift_start_time);
                $shift_end_time = Carbon::parse($regularTime->shift_end_time);
                $diffInMinutesInCheckinTime = $shift_start_time->diffInMinutes(Carbon::parse($checkin_time), false);
                $diffInMinutesInCheckOutTime =   $shift_end_time->diffInMinutes(Carbon::parse($checkout_time), false);
                if ($checkin_time == null && $checkout_time == null) {
                    return  $regularTime;
                } else  if ($diffInMinutesInCheckinTime > -65 &&    $diffInMinutesInCheckinTime < 275) {
                    return  $regularTime;
                } else if ($diffInMinutesInCheckOutTime > -65 &&  $diffInMinutesInCheckOutTime < 65) {
                    return  $regularTime;
                } else {
                    return  $regularTime;
                }
            }
        }
    }

    public function fetchUserTimesheet(Request $request)
    {
        //dd($request->all());

        $user = User::find($request->user_id);
        $userCode = $user->user_code;



        $requestedDate = $request->year . '-' . $request->month . '-01';
        $currentDate = Carbon::now();
        $monthDateObj = Carbon::parse($requestedDate);
        $startOfMonth = $monthDateObj->startOfMonth(); //->format('Y-m-d');
        $endOfMonth   = $monthDateObj->endOfMonth(); //->format('Y-m-d');

        if ($currentDate->lte($endOfMonth)) {
            $lastAttendanceDate  = $currentDate; //->format('Y-m-d');
        } else {
            $lastAttendanceDate  = $endOfMonth; //->format('Y-m-d');
        }

        $totalDays  = $lastAttendanceDate->format('d');
        $firstDateStr  = $monthDateObj->startOfMonth()->toDateString();

        // attendance details from vmt_staff_attenndance_device table
        $deviceData = [];
        for ($i = 0; $i < ($totalDays); $i++) {
            // code...
            $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');

            if ($dayStr != 'Sunday') {

                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');

                //Need to process the checkin and checkout time based on the client.
                //Since some client's biometric data has "in/out" direction and some will have only "in" direction
                //dd(sessionGetSelectedClientCode());

                //If direction is only "in" or empty or "-"
                if (sessionGetSelectedClientCode() == "DM" ||

                    sessionGetSelectedClientCode() == "VASA" || sessionGetSelectedClientCode() == "PSC" || sessionGetSelectedClientCode() == "IMA"  || sessionGetSelectedClientCode() == "LAL"
                    || sessionGetSelectedClientCode() == "PLIPL" || sessionGetSelectedClientCode() == "DMC")
                    {

                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('user_Id', $userCode)
                        ->first(['check_out_time']);

                       // if($dateString == "2023-07-05")
                       //     dd($dateString);
                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('user_Id', $userCode)
                        ->first(['check_in_time']);

                } else //If direction is only "in" and "out"
                {
                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'out')
                        ->where('user_Id', $userCode)
                        ->first(['check_out_time']);

                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'in')
                        ->where('user_Id', $userCode)
                        ->first(['check_in_time']);
                }


                $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];

                if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
                    $deviceData[] = array(
                        'date' => $dateString,
                        'checkin_time' => $deviceCheckInTime,
                        'checkout_time' => $deviceCheckOutTime,
                        'attendance_mode_checkin' => 'biometric',
                        'attendance_mode_checkout' => 'biometric'
                    );
                }
            }
        } //for

        //dd($deviceData);

        // attendance details from vmt_employee_attenndance table
        $attendance_WebMobile = VmtEmployeeAttendance::where('user_id', $request->user_id)
            ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_attendance.vmt_employee_workshift_id')
            ->whereMonth('date', $request->month)
            ->orderBy('checkin_time', 'asc')
            ->get(['vmt_work_shifts.shift_code as workshift_code', 'vmt_work_shifts.shift_name as workshift_name', 'vmt_employee_workshift_id', 'date', 'checkin_time', 'checkout_time', 'attendance_mode_checkin', 'attendance_mode_checkout', 'selfie_checkin', 'selfie_checkout']);

        //dd($attendance_WebMobile);


        $attendanceResponseArray = [];

        //Create empty month array with all dates.
        $month = $request->month;

        if ($month < 10)
            $month = "0" . $month;

        $year = $request->year;
        $days_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($i = 1; $i <= $days_count; $i++) {
            $date = "";

            if ($i < 10)
                $date = "0" . $i;
            else
                $date = $i;

            $fulldate = $year . "-" . $month . "-" . $date;


            $attendanceResponseArray[$fulldate] = array(
                "user_id" => $request->user_id, "isAbsent" => false, "attendance_mode_checkin" => null, "attendance_mode_checkout" => null,
                "vmt_employee_workshift_id" => null, "workshift_code" => null, "workshift_name" => null,
                "absent_status" => null, "leave_type" => null, "checkin_time" => null, "checkout_time" => null,
                "selfie_checkin" => null, "selfie_checkout" => null,
                "isLC" => false, "lc_status" => null, "lc_reason" => null, "lc_reason_custom" => null,
                "isEG" => false, "eg_status" => null, "eg_reason" => null, "eg_reason_custom" => null,
                "isMIP" => false, "mip_status" => null, "isMOP" => false, "mop_status" => null,
            );

            //echo "Date is ".$fulldate."\n";

            ///$month_array[""]
        }


        // merging result from both table
        $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());
        $dateCollectionObj    =  collect($merged_attendanceData);

        $sortedCollection   =   $dateCollectionObj->sortBy([
            ['date', 'asc'],
        ]);

        $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
        //dd($merged_attendanceData);
        //dd($dateWiseData);
        foreach ($dateWiseData  as $key => $value) {
            // dd($dateWiseData);
            // dd($value[0]);

            /*
                Here $key is the date. i.e : 2022-10-01

                $value is ::

                    [
                        date=>2022-11-05
                        checkin_time=18:06:00
                        checkout_time=18:06:00
                        attendance_mode="web"
                        vmt_employee_workshift_id ="1" //Employee shift
                    ],
                    [
                        ....
                        attendance_mode="biometric"

                    ]

            */
            //Compare the checkin,checkout time between all attendance modes and get the min(checkin) and max(checkout)

            $checkin_min = null;
            $checkout_max = null;
            $attendance_mode_checkin = null;
            $attendance_mode_checkout = null;

            //dd($value);
            foreach ($value as $singleValue) {
                //Find the employee_workshift. Right now, we are getting from web/mobile checkin only.
                //For Biometric, we cant know which shift since the biometric table has no column for storing it
          //dd($singleValue["vmt_employee_workshift_id"]);
                //If we found 'vmt_employee_workshift_id', then store it. Else store NULL. In future, we have get shift details from biometric attendance
                // if (!empty($singleValue["vmt_employee_workshift_id"])) {
                //     $attendanceResponseArray[$key]["vmt_employee_workshift_id"] = $singleValue["vmt_employee_workshift_id"];
                //     $attendanceResponseArray[$key]["workshift_code"] = $singleValue["workshift_code"];
                //     $attendanceResponseArray[$key]["workshift_name"] = $singleValue["workshift_name"];
                // }
                //dd( $attendanceResponseArray[$key]);
                //Find the min of checkin
                if ($checkin_min == null) {
                    $checkin_min = $singleValue["checkin_time"];
                    $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                } else
                if ($checkin_min > $singleValue["checkin_time"]) {
                    $checkin_min = $singleValue["checkin_time"];
                    $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                }

                //dd("Min value found : " . $singleValue["checkin_time"]);

                //Find the max of checkin
                if ($checkout_max == null) {
                    $checkout_max = $singleValue["checkout_time"];
                    $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
                } else
                if ($checkout_max < $singleValue["checkout_time"]) {
                    $checkout_max = $singleValue["checkout_time"];
                    $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
                }
            }

            //dd("end : Check-in : ".$checkin_min." , Check-out : ".$checkout_max);

            //dd($value[0]["attendance_mode"]);
            $attendanceResponseArray[$key]["checkin_time"] = $checkin_min;
            $attendanceResponseArray[$key]["checkout_time"] = $checkout_max;

            //TODO :: Based on which checkin, checkout time taken, its corresponding attendance modes has to be assigned here
            $attendanceResponseArray[$key]["attendance_mode_checkin"] = $attendance_mode_checkin;
            $attendanceResponseArray[$key]["attendance_mode_checkout"] = $attendance_mode_checkout;

            //selfies
            //format : http://127.0.0.1:8000/employees/PLIPL068/selfies/checkout.png
            if ($singleValue["checkin_time"] && !empty($singleValue["selfie_checkin"]))
                $attendanceResponseArray[$key]["selfie_checkin"] = 'employees/' . $user->user_code . '/selfies/' . $singleValue["selfie_checkin"];

            if ($singleValue["checkout_time"] && !empty($singleValue["selfie_checkout"]))
                $attendanceResponseArray[$key]["selfie_checkout"] = 'employees/' . $user->user_code . '/selfies/' . $singleValue["selfie_checkout"];
        }

        //Get all the shift details
        $query_workShifts = VmtWorkShifts::all()->keyBy('id');
        //dd($query_workShifts->toArray()['2']);

        ////Logic to check LC,EG,MIP,MOP,Leave status
        foreach ($attendanceResponseArray as $key => $value) {

              $shift_time=$this->getShiftTimeForEmployee($value['user_id'],$value['checkin_time'],$value['checkout_time']);
              $attendanceResponseArray[$key]['vmt_employee_workshift_id']= $shift_time->id;
              $attendanceResponseArray[$key]['workshift_code']= $shift_time->shift_code;
              $attendanceResponseArray[$key]['workshift_name']= $shift_time->shift_name;
            //dd($attendanceResponseArray[$key]['vmt_employee_workshift_id']);

            //dd($query_workShifts[$currentdate_workshift]->shift_start_time);
               //dd( $attendanceResponseArray);
            $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
            $checkout_time = $attendanceResponseArray[$key]["checkout_time"];
            //dd($checkin_time);

            // dd(!empty($attendanceResponseArray[$key]['vmt_employee_workshift_id']));
            //Calculate LC, EG only if the current day shifttype is found. If no shifttype found, dont calculate LC, EG. NEED TO CORRECT IT MANUALLY
            if (!empty($attendanceResponseArray[$key]['vmt_employee_workshift_id'])) {

                //Get the workshift for the current day
                $currentdate_workshift = $attendanceResponseArray[$key]['vmt_employee_workshift_id'];

                $shiftStartTime  = Carbon::parse($query_workShifts[$currentdate_workshift]->shift_start_time);
                $shiftEndTime  = Carbon::parse($query_workShifts[$currentdate_workshift]->shift_end_time);


                //LC Check
                if (!empty($checkin_time)) {

                    $parsedCheckIn_time  = Carbon::parse($checkin_time);

                    //Check whether checkin done on-time
                    $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

                    if ($isCheckin_done_ontime) {
                        //employee came on time....

                    } else {
                        //employee came on time....
                        //dd("Checkin NOT on-time");

                        //then LC
                        $attendanceResponseArray[$key]["isLC"] = true;

                        //check whether regularization applied.
                        $regularization_status = $this->isRegularizationRequestApplied($request->user_id, $key, 'LC');

                        //check regularization status
                        $attendanceResponseArray[$key]["lc_status"] = $regularization_status;
                    }
                }


                //EG Check
                //check if its EG
                if (!empty($checkout_time)) {

                    $parsedCheckOut_time  = Carbon::parse($checkout_time);

                    //Check whether checkin done on-time
                    $isCheckOut_doneEarly = $parsedCheckOut_time->lte($shiftEndTime);

                    if ($isCheckOut_doneEarly) {
                        //employee left early on time....

                        //then EG
                        $attendanceResponseArray[$key]["isEG"] = true;

                        //check whether regularization applied.
                        $regularization_status = $this->isRegularizationRequestApplied($request->user_id, $key, 'EG');

                        //check regularization status
                        $attendanceResponseArray[$key]["eg_status"] = $regularization_status;
                    } else {
                        //employee left late

                    }
                }
            }

            //for absent
            if ($checkin_time == null && $checkout_time == null) {
                $attendanceResponseArray[$key]["isAbsent"] = true;

                //Check whether leave is applied or not.
                $year = $request->year;
                $month = $request->month;
                $t_leaveRequestDetails = $this->isLeaveRequestApplied($request->user_id, $key, $year, $month);

                if (empty($t_leaveRequestDetails)) {

                    $attendanceResponseArray[$key]["absent_status"] = "Not Applied";
                    $attendanceResponseArray[$key]["leave_type"] = null;
                } else {
                    $attendanceResponseArray[$key]["absent_status"] = $t_leaveRequestDetails->status;
                    $attendanceResponseArray[$key]["leave_type"] = $t_leaveRequestDetails->leave_type;
                }
            } elseif ($checkin_time != null && $checkout_time == null) {

                //Since its MOP
                $attendanceResponseArray[$key]["isMOP"] = true;

                ////Is any permission applied
                $attendanceResponseArray[$key]["mop_status"] = $this->isRegularizationRequestApplied($request->user_id, $key, 'MOP');

                if ($attendanceResponseArray[$key]["mop_status"] == "Approved") {

                    //If Approved, then set the regularize time as checkin time
                    $attendanceResponseArray[$key]["checkout_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                        ->where('user_id',  $request->user_id)->where('regularization_type', 'MOP')->value('regularize_time');

                    //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }
            } elseif ($checkin_time == null && $checkout_time != null) {

                //Since its MIP
                $attendanceResponseArray[$key]["isMIP"] = true;

                ////Is any permission applied
                $attendanceResponseArray[$key]["mip_status"] = $this->isRegularizationRequestApplied($request->user_id, $key, 'MIP');

                if ($attendanceResponseArray[$key]["mip_status"] == "Approved") {

                    //If Approved, then set the regularize time as checkin time
                    $attendanceResponseArray[$key]["checkin_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                        ->where('user_id',  $request->user_id)->where('regularization_type', 'MIP')->value('regularize_time');

                    //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }
            }
        } //for each

        // dd($attendanceResponseArray);

        return $attendanceResponseArray;
    }

    public function isLeaveRequestApplied($user_id, $attendance_date, $year, $month)
    {
        // dd($year);

        $leave_Details = VmtEmployeeLeaves::join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('user_id', $user_id)
            ->whereYear('end_date', $year)
            ->whereMonth('end_date', $month)
            ->get(['start_date', 'end_date', 'status', 'vmt_leaves.leave_type', 'total_leave_datetime']);

        if ($leave_Details->count() == 0) {
            return null;
        } else {
            foreach ($leave_Details as $single_leave_details) {
                $startDate = Carbon::parse($single_leave_details->start_date)->subDay();
                $endDate = Carbon::parse($single_leave_details->end_date);
                $currentDate =  Carbon::parse($attendance_date);
                // dd($startDate.'-----'.$currentDate.'------------'.$endDate.'-----');
                if ($currentDate->gt($startDate) && $currentDate->lte($endDate)) {
                    // dd($single_leave_details);
                    return $single_leave_details;
                } else {
                    $single_leave_details = null;
                }
            }
            return $single_leave_details;
        }


        //check whether leave applied.If yes, check leave status
        $leave_record = VmtEmployeeLeaves::where('user_id', $user_id)->whereDate('end_date', $attendance_date);

        if ($leave_record->exists()) {
            return $leave_record->first();
        } else {
            return null;
        }
    }



    private function isRegularizationRequestApplied($user_id, $attendance_date, $regularizeType)
    {

        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);

        // dd($user_id ." , ". $attendance_date." , ".$regularizeType);

        if ($regularize_record->exists()) {
            return $regularize_record->value('status');
        } else {
            return "None";
        }
    }

    /*
        Fetch regularization data for the given user id

    */
    public function fetchRegularizationData(Request $request)
    {

        //dd($request->all());

        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $request->selected_date)
            ->where('user_id',  $request->user_id)->where('regularization_type', $request->regularization_type)->first();

        //dd($regularize_record);

        return $regularize_record;
    }

    public function fetchTeamMembers(Request $request)
    {
        //Get the team members of the given user
        $reportees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $request->user_code)->get('user_id');

        $reportees_details = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->whereIn('users.id', $reportees_id)->where('users.is_ssa', '0')->where('users.active', '1')
            ->get(['users.id', 'users.name', 'vmt_employee_office_details.designation']);



        //dd($reportees_details->toArray());
        foreach ($reportees_details as $singleItem) {
            $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->id);
        }

        return $reportees_details;
    }

    public function fetchOrgMembers(Request $request)
    {
        //Get the team members of the given user
        //$reportees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $request->user_code)->get('user_id');

        $all_employees = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.is_ssa', '0')->where('users.active', '1')
            ->get(['users.id', 'users.name', 'vmt_employee_office_details.designation']);


        //dd($reportees_details->toArray());
        foreach ($all_employees as $singleItem) {
            $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->id);
        }

        return $all_employees;
    }

    /*
        Also known as Attendance Regularization

    */
    public function showRegularizationApprovalPage(Request $request)
    {


        return view('attendance_regularization_approvals');
    }

    /*
        Fetch Attendance Regularization data

        Todo : Need to restrict employee access
    */
    public function fetchAttendanceRegularizationData(Request $request, VmtAttendanceService $attendanceService)
    {

        $response = null;

        //Check whether the current employee is Manager

        if (Str::contains(currentLoggedInUserRole(), ['Manager'])) {
            //fetch team level data
            $response = $attendanceService->fetchAttendanceRegularizationData(auth()->user()->user_code, null, null);
        } else {

            //Fetch all data
            $response = $attendanceService->fetchAttendanceRegularizationData(null, null, null);
        }

        return $response;
    }


    /*
        Fetch all regularization data.
    */
    public function fetchAllRegularizationData(Request $request)
    {


        $allEmployees_lateComing = '';

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');


        $allEmployees_lateComing = null;

        //If manager ID set, then show only the team level employees
        if (isset($request->manager_id)) {
            //Get all the employees ID for the given manager_id
            $manager_emp_code = User::find($request->manager_id)->user_code;

            dd($manager_emp_code);
            $employees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', '');

            $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::whereIn();
        } else {
            $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::all();
        }

        //dd($map_allEmployees->toArray());
        //dd($allEmployees_lateComing->toArray());

        foreach ($allEmployees_lateComing as $singleItem) {

            //check whether user_id from regularization table exists in USERS table
            if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {

                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->user_id);

                //If reviewer_id = 0, then its not yet reviewed
                if ($singleItem->reviewer_id != 0) {
                    $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_id]["name"];
                    $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName($singleItem->reviewer_id);
                }
            } else {
                //  dd("Missing User ID : " . $singleItem->user_id);
            }
        }

        // dd($allEmployees_lateComing);
        return $allEmployees_lateComing;
    }

    /*
        Employee send request to HR for attendance regularization

    */
    public function applyRequestAttendanceRegularization(Request $request, VmtNotificationsService $serviceVmtNotificationsService)
    {
        //dd($request->all());

        //Check if already request applied
        $data = VmtEmployeeAttendanceRegularization::where('attendance_date', $request->attendance_date)
            ->where('user_id',  $request->attendance_user)
            ->where('regularization_type',  $request->regularization_type);

        if ($data->exists()) {
            //dd("Request already applied");
            return $responseJSON = [
                'status' => 'failure',
                'message' => 'Request already applied',
                'mail_status' => 'failure',
                'data' => [],
            ];
        } else {

            //dd("Request not applied");

            if ($request->regularization_type == 'MIP' || $request->regularization_type == 'MOP')
                $user_time = null;
            else
                $user_time = $request->user_time;



            $attendanceRegularizationRequest = new VmtEmployeeAttendanceRegularization;
            $attendanceRegularizationRequest->user_id = $request->attendance_user;
            $attendanceRegularizationRequest->attendance_date = $request->attendance_date;
            $attendanceRegularizationRequest->regularization_type =  $request->regularization_type;
            $attendanceRegularizationRequest->user_time =  empty($user_time) ? null : Carbon::createFromFormat('H:i:s', $user_time);
            $attendanceRegularizationRequest->regularize_time = Carbon::createFromFormat('H:i:s', $request->regularize_time);
            $attendanceRegularizationRequest->reason_type = $request->reason;
            $attendanceRegularizationRequest->custom_reason = $request->custom_reason ?? '';
            $attendanceRegularizationRequest->status = 'Pending';

            $attendanceRegularizationRequest->save();
        }


        ////Send mail to Manager

        $mail_status = "";

        //Get manager details
        $manager_usercode = VmtEmployeeOfficeDetails::where('user_id', $request->attendance_user)->value('l1_manager_code');
        $manager_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.user_code', $manager_usercode)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

        //dd($manager_details);


        $VmtClientMaster = VmtClientMaster::first();
        $image_view = url('/') . $VmtClientMaster->client_logo;


        $emp_avatar = json_decode(getEmployeeAvatarOrShortName(auth::user()->id));


        $isSent    = \Mail::to($manager_details->officical_mail)->send(new VmtAttendanceMail_Regularization(
            auth::user()->name,
            auth::user()->user_code,
            $emp_avatar,
            $request->attendance_date,
            $manager_details->name,
            $manager_details->user_code,
            request()->getSchemeAndHttpHost(),
            $image_view,
            $request->custom_reason,
            "Pending"
        ));
        if ($request->regularization_type == 'LC') {

            $attendance_regularization_type = 'employee_applies_lc';
        } else if ($request->regularization_type == 'EG') {

            $attendance_regularization_type = 'employee_applies_eg';
        } else if ($request->regularization_type == 'MOP') {

            $attendance_regularization_type = 'employee_applies_mop';
        } else if ($request->regularization_type == 'MIP') {

            $attendance_regularization_type = 'employee_applies_mip';
        }

        $res_notification = $serviceVmtNotificationsService->send_attendance_regularization_FCMNotification(
            notif_user_id: $request->attendance_user,
            attendance_regularization_type: $attendance_regularization_type,
            manager_user_code: $manager_usercode,
        );


        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }

        return $responseJSON = [
            'status' => 'success',
            'message' => 'Request sent successfully!',
            'notification_status' => $res_notification,
            'mail_status' => $mail_status,
            'data' => [],
        ];
    }

    public function approveRejectAttendanceRegularization(Request $request, VmtNotificationsService $serviceVmtNotificationsService)
    {

        //dd($request->all());

        $status = "failure";
        $message = "Invalid request. Kindly contact the HR/Admin";

        $data = VmtEmployeeAttendanceRegularization::find($request->id);

        if ($data->exists()) {
            $data->reviewer_id = auth::user()->id;
            $data->reviewer_reviewed_date = Carbon::today()->setTimezone('Asia/Kolkata');
            $data->status = $request->status;
            $data->reviewer_comments = $request->status_text ?? '---';

            $data->save();

            $status = "success";
            $message = "Attendance Regularization is completed.";
        }

        //Send mail to Employee

        $mail_status = "";

        //Get employee details
        $employee_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.id', $data->user_id)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

        //dd($employee_details->officical_mail);


        $VmtClientMaster = VmtClientMaster::first();
        $image_view = url('/') . $VmtClientMaster->client_logo;
        $emp_avatar = json_decode(getEmployeeAvatarOrShortName(auth::user()->id));

        $isSent    = \Mail::to($employee_details->officical_mail)->send(new VmtAttendanceMail_Regularization(
            $employee_details->name,
            $employee_details->user_code,
            $emp_avatar,
            $data->attendance_date,
            auth::user()->name,
            auth::user()->user_code,
            request()->getSchemeAndHttpHost(),
            $image_view,
            $request->status_text,
            $request->status
        ));
        if ($request->status == 'Approved') {

            $attendance_regularization_type = 'manager_approves_attendance_reg';
        } else if ($request->status == 'Rejected') {

            $attendance_regularization_type = 'manager_rejects_attendance_reg';
        }
        $res_notification = $serviceVmtNotificationsService->send_attendance_regularization_FCMNotification(
            notif_user_id: $data->user_id,
            attendance_regularization_type: $attendance_regularization_type,
            manager_user_code: auth::user()->user_code,
        );

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }



        return $responseJSON = [
            'status' => 'success',
            'message' => 'Regularization done successfully!',
            'notification_status' => $res_notification,
            'mail_status' => $mail_status,
            'data' => [],
        ];
    }

    public function showLeavePolicyDocument(Request $request)
    {
        $client_name = "";

        //For testing only.
        if (isset($request->client_name)) {
            $client_name = $request->client_name;
        } else {
            //get the client name from client table
            $client_name = VmtClientMaster::find(session('client_id'))->client_name;
            $client_name = str_replace(' ', '', $client_name);
            //dd($client_name);
        }

        //If no sub-client selected, then show a default template
        if ($client_name == "All") {
            $viewPage = 'leave_policy_default';
        } else {
            //choose the blade file
            $viewPage = 'leave_policy_' . strtolower($client_name);
        }

        if (!view()->exists('leave_policy_templates.' . $viewPage)) {
            $viewPage = 'leave_policy_default';
        }

        // dd($viewPage);
        return view('leave_policy_templates.' . $viewPage);
    }

    public function fetchOrgEmployeesPendingLeaves(Request $request)
    {

        $final_output = array("leave_types" => [], "employees" => []);

        $leave_types = VmtLeaves::all()->pluck('days_annual', 'leave_type');

        //store all leave types to show as column header in UI
        $final_output["leave_types"] = array_keys($leave_types->toArray());

        //Create leave array template for storing leave count for each leave type for a given employee
        $array_template_leaveTypes = array();

        //Set the total leaves for each leave type as per the system
        foreach ($leave_types as $key_singleLeaveType => $value) {
            $array_template_leaveTypes[$key_singleLeaveType] = $value;
        }

        $leave_balance_data = User::leftJoin('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->leftJoin('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('users.is_ssa', '0')
            ->select('users.id as user_id', 'user_code', 'avatar', 'name', 'leave_type_id', 'leave_type', 'total_leave_datetime')
            ->get();
        //dd($leave_balance_data->toArray());

        //For each employee, check how much leave taken for each leave type. This applies for emps who already applied leaves. Else it will be NULL
        foreach ($leave_balance_data as $single_leave_balance_data) {

            //If key not found, create one
            if (!array_key_exists($single_leave_balance_data->user_id, $final_output["employees"])) {
                //add to main array
                $final_output["employees"][$single_leave_balance_data->user_id] = new VmtEmployeeLeaveModel(
                    $single_leave_balance_data->user_id,
                    $single_leave_balance_data->name,
                    $array_template_leaveTypes
                );
            }

            //Only if the user has any leaves, this should run else leave details will be NULL. Need to handle this in front-end VueJS table
            if (!empty($single_leave_balance_data->leave_type_id)) {
                //Remove text chars from 'total_leave_datetime' value such as FN, AN.
                $processed_val_total_leave_balance_data = preg_replace("/[^0-9.]/", "", $single_leave_balance_data->total_leave_datetime);


                //Subtract the leave count in this array for the given leave_type
                $final_output["employees"][$single_leave_balance_data->user_id]
                    ->array_leave_details[$single_leave_balance_data->leave_type] -= $processed_val_total_leave_balance_data;
            }
        }

        //TODO : Ignore the keys and get their values..
        $final_output["employees"] = array_values($final_output["employees"]);

        //dd($final_output);
        return $final_output;
    }

    /*
        Team level leave balance

    */
    public function fetchTeamEmployeesPendingLeaves(Request $request)
    {

        //dd($request->all());

        $manager_user_code = User::find($request->user_id)->user_code;

        $final_output = array("leave_types" => [], "employees" => []);

        $leave_types = VmtLeaves::all()->pluck('days_annual', 'leave_type');

        //store all leave types to show as column header in UI
        $final_output["leave_types"] = array_keys($leave_types->toArray());

        //Create leave array template for storing leave count for each leave type for a given employee
        $array_template_leaveTypes = array();

        //Set the total leaves for each leave type as per the system
        foreach ($leave_types as $key_singleLeaveType => $value) {
            $array_template_leaveTypes[$key_singleLeaveType] = $value;
        }

        $leave_balance_data = VmtEmployeeLeaves::join('users', 'users.id', '=', 'vmt_employee_leaves.user_id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'vmt_employee_leaves.user_id')
            ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->select('vmt_employee_leaves.user_id', 'user_code', 'avatar', 'name', 'leave_type_id', 'leave_type', 'total_leave_datetime')
            ->where('vmt_employee_office_details.l1_manager_code', '=', $manager_user_code)
            ->get();

        //For each employee, check how much leave taken for each leave type
        foreach ($leave_balance_data as $single_leave_balance_data) {

            //If key not found, create one
            if (!array_key_exists($single_leave_balance_data->user_id, $final_output["employees"])) {
                //add to main array
                $final_output["employees"][$single_leave_balance_data->user_id] = new VmtEmployeeLeaveModel(
                    $single_leave_balance_data->user_id,
                    $single_leave_balance_data->name,
                    $array_template_leaveTypes
                );
            }

            //dd($single_leave_balance_data);

            //Remove text chars from 'total_leave_datetime' value such as FN, AN.
            $processed_val_total_leave_balance_data = preg_replace("/[^0-9.]/", "", $single_leave_balance_data->total_leave_datetime);

            //Add the leave count in this array for the given leave_type
            $final_output["employees"][$single_leave_balance_data->user_id]->array_leave_details[$single_leave_balance_data->leave_type] -= $processed_val_total_leave_balance_data;
        }

        //TODO : Ignore the keys and get their values..
        $final_output["employees"] = array_values($final_output["employees"]);

        //dd($final_output);
        return $final_output;
    }

    public function fetchUnusedCompensatoryOffDays(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {
        //dd($request->user_id);
        //TODO : Need to get current user_id instead of fetching from req params.
        $user_id = auth()->user()->id;
        return $serviceVmtAttendanceService->fetchUnusedCompensatoryOffDays($user_id);
    }

    public function employeeProfile(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {

        return $serviceVmtAttendanceService->employeeProfile($request);
    }

    public function getEmployeeLeaveBalance(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {
        //Accrued Leave Year Frame
        if (empty($request->all())) {
            $time_periods_of_year_query = VmtOrgTimePeriod::where('status', 1)->first();
        } else {
            $time_periods_of_year_query = VmtOrgTimePeriod::whereYear('start_date',)->whereMonth('start_date',)
                ->whereYear('end_date',)->whereMonth('end_date',)->first();
        }
        $start_date =  $time_periods_of_year_query->start_date;
        $end_date   = $time_periods_of_year_query->end_date;
        $calender_type = $time_periods_of_year_query->abbrevation;
        // $time_frame = array( $start_date.'/'. $end_date=>$calender_type.' '.substr($start_date, 0, 4).'-'.substr($end_date, 0, 4));
        $time_frame = $calender_type . ' ' . substr($start_date, 0, 4) . '-' . substr($end_date, 0, 4);
        $leave_balance_details = $serviceVmtAttendanceService->calculateEmployeeLeaveBalance(auth::user()->id, $start_date, $end_date);
        return  $leave_balance_details;
    }

    // public function fetchEmployeeLeaveBalance(Request $request){
    //     $leave_balance_details = calculateLeaveDetails(auth::user()->id,$request->start_date,$request->end_date);
    //     return $leave_balance_details;
    // }


    public function fetchOrgLeaveBalance(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {
        //dd($request->all());
        if(!empty($request->all())){
            $start_date=$request->start_date;
            $end_date=$request->end_date;
            $end_date_ar = explode("-", $end_date);
            $month = $end_date_ar[1];
        }else{
            $org_time= VmtOrgTimePeriod::where('status',1)->first();
           $today=Carbon::now();
           $start_date=$org_time->start_date;
           $end_date=$today->format('Y-m-d');
           $month=$today->format('m');
        }

        $response = $serviceVmtAttendanceService->fetchOrgLeaveBalance($start_date,  $end_date, $month);
        return $response;
    }

    public function fetchTeamLeaveBalance(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {

        if(!empty($request->all())){
            $start_date=$request->start_date;
            $end_date=$request->end_date;
            $end_date_ar = explode("-", $end_date);
            $month = $end_date_ar[1];
        }else{
            $org_time= VmtOrgTimePeriod::where('status',1)->first();
           $today=Carbon::now();
           $start_date=$org_time->start_date;
           $end_date=$today->format('Y-m-d');
           $month=$today->format('m');
        }
        $response = $serviceVmtAttendanceService->teamLeaveBalance($start_date,  $end_date, $month);
        return $response;
    }

    public function getAttendanceStatus(Request $request, VmtAttendanceService $serviceVmtAttendanceService){
        return $serviceVmtAttendanceService->fetchAttendanceStatus($request->user_code, $request->date);
    }
}
