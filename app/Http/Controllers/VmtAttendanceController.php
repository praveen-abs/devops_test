<?php

namespace App\Http\Controllers;

use App\Mail\ApproveRejectLeaveMail;
use App\Mail\RequestLeaveMail;
use App\Mail\VmtAttendanceMail_Regularization;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtLeaves;
use App\Models\VmtGeneralInfo;
use App\Models\VmtStaffAttendanceDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;

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

        //Get how many leaves taken for each leave_type
        $leaveData_currentUser = getLeaveCountDetails(auth::user()->id);

        //dd($leaveData_currentUser->toArray());

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


        //dd($leaveTypes->toArray());
        return view('attendance_leave', compact('allEmployeesList', 'leaveTypes', 'leaveData_Org', 'leaveData_Team', 'leaveData_currentUser'));
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


    public function approveRejectLeaveRequest(Request $request)
    {
        // $approval_status = $request->status;
        $leave_record = VmtEmployeeLeaves::where('id', $request->leave_id)->first();
        $leave_record->status = $request->status;
        $leave_record->reviewer_comments = $request->leave_rejection_text;

        $leave_record->save();

        //Send mail to the employee
        $employee_user_id = VmtEmployeeLeaves::where('id', $request->leave_id)->value('user_id');
        $employee_mail =  VmtEmployeeOfficeDetails::where('user_id', $employee_user_id)->value('officical_mail');
        $obj_employee = User::where('id', $employee_user_id);
        $manager_user_id = VmtEmployeeLeaves::where('id', $request->leave_id)->value('reviewer_user_id');

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        $emp_avatar = getEmployeeAvatarOrShortName(auth::user()->id);


        $isSent    = \Mail::to($employee_mail)->send(
            new ApproveRejectLeaveMail(
                $obj_employee->value('name'),
                $obj_employee->value('user_code'),
                VmtLeaves::find($leave_record->leave_type_id)->leave_type,
                User::find($manager_user_id)->name,
                User::find($manager_user_id)->user_code,
                request()->getSchemeAndHttpHost(),
                $image_view,
                $emp_avatar,
                $request->status
            )
        );

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }

        $response = [
            'status' => 'success',
            'message' => 'Leave Request applied successfully',
            'mail_status' => $mail_status,
            'error' => '',
            'error_verbose' => ''
        ];





        $response = [
            'status' => 'success',
            'message' => 'Leave ' . $request->status,
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;
    }

    public function fetchLeaveRequestDetails(Request $request)
    {
        //Convert  'Pending', ' Approved' , 'Rejected' from csv to array
        $statusArray = explode(",", $request->statusArray);

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');

        if ($request->type == 'org') {
            $employeeLeaves_Org = '';

            $employeeLeaves_Org = VmtEmployeeLeaves::whereIn('status', $statusArray)->orderBy('created_at', 'DESC')->get();

            //dd($map_allEmployees[1]["name"]);
            foreach ($employeeLeaves_Org as $singleItem) {
                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->user_id]);

                $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName([$singleItem->reviewer_user_id]);
            }

            return $employeeLeaves_Org;
        } else
        if ($request->type == 'team') {
            //Get the list of employees for the given Manager
            $team_employees_ids = VmtEmployeeOfficeDetails::where('l1_manager_code', auth::user()->user_code)->get('user_id');

            //use wherein and fetch the relevant records
            $employeeLeaves_team = VmtEmployeeLeaves::whereIn('user_id', $team_employees_ids)->whereIn('status', $statusArray)->get();


            //dd($map_allEmployees[1]["name"]);
            foreach ($employeeLeaves_team as $singleItem) {
                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->user_id]);

                $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName([$singleItem->reviewer_user_id]);
            }

            //dd($employeeLeaves_team);
            return $employeeLeaves_team;
        } else
        if ($request->type == 'employee') {
            return VmtEmployeeLeaves::whereIn('status', $statusArray)->where('user_id', auth::user()->id)->get();
        }
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
     AJAX : Get leave details based on given leave_id
    */
    public function fetchLeaveDetails(Request $request){
        $leave_details = VmtEmployeeLeaves::find($request->leave_id);

        $leave_details['user_name'] = User::find($leave_details->user_id)->name;
        $leave_details['leave_type'] = VmtLeaves::find($leave_details->leave_type_id)->leave_type;
        // $leave_details['reviewer_name'] = User::find($leave_details->reviewer_user_id)->name;
        $leave_details['approver_name'] =  User::find($leave_details->reviewer_user_id)->name;
        $leave_details['approver_designation'] = VmtEmployeeOfficeDetails::where('user_id',$leave_details->user_id)->first()->value('designation');
        $leave_details['notification_userName'] = User::find($leave_details->notifications_users_id)->name;
        $leave_details['notification_designation'] = VmtEmployeeOfficeDetails::where('user_id',$leave_details->user_id)->first()->value('designation');
        $leave_details['avatar'] = getEmployeeAvatarOrShortName($leave_details->user_id);



        return $leave_details;
    }

    private function createLeaveRange($start_date, $end_date){
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start_date, $interval ,$end_date);

        return $daterange;
    }


    public function saveLeaveRequestDetails(Request $request)
    {
        //dd($request->toArray());
        $leave_month = date('m',strtotime($request->start_date));

        //get the existing Pending/Approved leaves. No need to check Rejected
        $existingNonPendingLeaves = VmtEmployeeLeaves::where('user_id', auth::user()->id)
                                    ->whereMonth('start_date','>=',$leave_month)
                                    ->whereIn('status',['Pending','Approved'])
                                    ->get(['start_date','end_date','status']);

        //dd($existingNonPendingLeaves);
        //coverting start_date and end_date for comparison
        $processed_leave_start_date = new Carbon($request->start_date);
        $processed_leave_end_date = new Carbon($request->end_date);

        //dd($processed_leave_start_date->format('Y-m-d'));

        foreach($existingNonPendingLeaves as $singleLeaveRange){
            $endDate = new Carbon($singleLeaveRange->end_date);
            $endDate->addDay();

            //create leave range
            $leave_range = $this->createLeaveRange($singleLeaveRange->start_date, $endDate);

            //check with the user given leave range
            foreach ($leave_range as $date) {
                //if date already exists in previous leaves
                if ($processed_leave_start_date->format('Y-m-d') == $date->format('Y-m-d') || $processed_leave_end_date->format('Y-m-d') == $date->format('Y-m-d'))
                {
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

       //dd("Leave not found");



        $leave_request_date = Carbon::now();

        //Calculate total leave days...
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        //$diff = $start->diff($end)->format('%D day(s) , %H hour(s)');
        $diff="ERROR";
        $mailtext_total_leave = " 0-0";

        //Check if its Leave or Permission
        if (isPermissionLeaveType($request->leave_type_id)) {
            $diff = intval( $start->diff($end)->format('%H'));
            $mailtext_total_leave = $diff . " Hour(s)";

            //dd("Time diff : ".$mailtext_total_leave);
        } else {
            $diff = intval( $start->diff($end)->format('%D')) + 1; //day adjusted by adding '1'
            $mailtext_total_leave = $diff . " Day(s)";
        }

        //dd($diff);

        $emp_leave_details =  new VmtEmployeeLeaves;
        $emp_leave_details->user_id = auth::user()->id;
        $emp_leave_details->leave_type_id = $request->leave_type_id;
        $emp_leave_details->leaverequest_date = $leave_request_date;
        $emp_leave_details->start_date = $request->start_date;
        $emp_leave_details->end_date = $request->end_date;
        $emp_leave_details->leave_reason = $request->leave_reason;
        $emp_leave_details->total_leave_datetime = $diff;

        //get manager of this employee
        $manager_emp_code = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->value('l1_manager_code');
        $manager_name = User::where('user_code', $manager_emp_code)->value('name');
        $manager_id = User::where('user_code', $manager_emp_code)->value('id');

        $emp_leave_details->reviewer_user_id = $manager_id;
        $emp_avatar = getEmployeeAvatarOrShortName(auth::user()->id);

        if (!empty($request->notifications_users_id))
            $emp_leave_details->notifications_users_id = implode(",", $request->notifications_users_id);

        $emp_leave_details->reviewer_comments = "";
        $emp_leave_details->status = "Pending";

        //dd($emp_leave_details->toArray());
        $emp_leave_details->save();

        //Need to send mail to 'reviewer' and 'notifications_users_id' list
        $reviewer_mail =  VmtEmployeeOfficeDetails::where('user_id', $manager_id)->value('officical_mail');

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;


        $isSent    = \Mail::to($reviewer_mail)->send(new RequestLeaveMail(
                                                    auth::user()->name,
                                                    auth::user()->user_code,
                                                    $emp_avatar,
                                                    $manager_name,
                                                    // Carbon::parse($leave_request_date)->format('M jS Y'),
                                                    // Carbon::parse($request->start_date)->format('M jS Y'),
                                                    // Carbon::parse($request->end_date)->format('M jS Y'),
                                                    $leave_request_date,
                                                    $request->start_date,
                                                    $request->end_date,
                                                    $request->leave_reason,
                                                    VmtLeaves::find($request->leave_type_id)->leave_type,
                                                    $mailtext_total_leave,
                                                    //Carbon::parse($request->total_leave_datetime)->format('M jS Y \\, h:i:s A'),
                                                    request()->getSchemeAndHttpHost(),
                                                    $image_view
                                                ));

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }

        $response = [
            'status' => 'success',
            'message' => 'Leave Request applied successfully',
            'mail_status' => $mail_status,
            'error' => '',
            'error_verbose' => ''
        ];

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
        $shift_timings = VmtWorkShifts::where('shift_type', 'First Shift')->first();

        return view('vmt_daily_staff_attendance', compact('users', 'shift_timings'));
    }





    /////////////////////// New routing methods


    public function showTimesheet(Request $request)
    {
        //$data = VmtEmployeeAttendance::where('user_id',a);
        //dd($data);

        $shift_start_time = VmtWorkShifts::where('shift_type', "First Shift")->value('shift_start_time');
        $shift_end_time = VmtWorkShifts::where('shift_type', "First Shift")->value('shift_end_time');

        //Show the single employee timesheet detail in sidepanel

        $current_employee_detail = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.id', auth::user()->id)
            ->first(['users.id', 'users.name', 'vmt_employee_office_details.designation']);

        $current_employee_detail->employee_avatar = getEmployeeAvatarOrShortName($current_employee_detail->id);

        return view('attendance_timesheet', compact('current_employee_detail', 'shift_start_time', 'shift_end_time'));
    }


    public function fetchUserTimesheet(Request $request)
    {
        //dd($request->all());

        $user = User::find($request->user_id);
        $userCode = $user->user_code;

        $regularTime  = VmtWorkShifts::where('shift_type', 'First Shift')->first();
        $currentyear = $request->year;
        $dt = $currentyear . '-' . $request->month . '-01';
        $currentDate = Carbon::now();
        $monthDateObj = Carbon::parse($dt);
        $startOfMonth = $monthDateObj->startOfMonth(); //->format('Y-m-d');
        $endOfMonth   = $monthDateObj->endOfMonth(); //->format('Y-m-d');

        if ($currentDate->lte($endOfMonth)) {
            $lastAttendanceDate  = $currentDate; //->format('Y-m-d');
        } else {
            $lastAttendanceDate  = $endOfMonth; //->format('Y-m-d');
        }

        $totDays  = $lastAttendanceDate->format('d');
        $firstDateStr  = $monthDateObj->startOfMonth()->toDateString();

        // attendance details from vmt_staff_attenndance_device table
        $deviceData = [];
        for ($i = 0; $i < ($totDays); $i++) {
            // code...
            $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');

            if ($dayStr != 'Sunday') {

                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');

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

                $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];

                if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
                    $deviceData[] = array(
                        'date' => $dateString,
                        'checkin_time' => $deviceCheckInTime,
                        'checkout_time' => $deviceCheckOutTime
                    );
                }
            }
        }//for

       //dd($deviceData);

        // attendance details from vmt_employee_attenndance table
        $data = VmtEmployeeAttendance::where('user_id', $request->user_id)
            ->whereMonth('date', $request->month)
            ->orderBy('checkin_time', 'asc')
            ->get(['date', 'checkin_time', 'checkout_time']);

        //dd($data);

        $attendanceResponseArray = [];

        //Create empty month array with all dates.
        $month = $request->month;
        $year = $request->year;
        $days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);

         for($i=1 ; $i <=$days_count ;$i++)
         {
           $date = "";

           if($i<10)
             $date = "0".$i;
           else
             $date = $i;

           $fulldate = $year."-".$month."-".$date;


           $attendanceResponseArray[$fulldate] = array( "user_id"=>$request->user_id,"isAbsent"=>false, "absent_status"=>null,
                                                        "checkin_time"=>null, "checkout_time"=>null,
                                                        "isLC"=>false, "lc_status"=>null, "lc_reason"=>null,"lc_reason_custom"=>null,
                                                        "isEG"=>false, "eg_status"=>null, "eg_reason"=>null,"eg_reason_custom"=>null,
                                                        "isMIP"=>false, "mip_status"=>null, "isMOP"=>false, "mop_status"=>null);

           //echo "Date is ".$fulldate."\n";
           ///$month_array[""]
         }


        // merging result from both table
        $data = $data->toArray();
        $data  = array_merge($deviceData, $data);
        $dateCollectionObj    =  collect($data);

        $sortedCollection   =   $dateCollectionObj->sortBy([
            ['date', 'asc'],
        ]);

        $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();

        foreach ($dateWiseData  as $key => $value) {

            $attendanceResponseArray[$value[0]["date"]]["checkin_time"] = $value->min('checkin_time') ;
            $attendanceResponseArray[$value[0]["date"]]["checkout_time"] = $value->max('checkout_time');

        }
        //dd($attendanceResponseArray);

        $shiftStartTime  = Carbon::parse($regularTime->shift_start_time);
        $shiftEndTime  = Carbon::parse($regularTime->shift_end_time);


        ////Logic to check LC,EG,MIP,MOP,Leave status
        foreach ($attendanceResponseArray as $key => $value) {

            $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
            $checkout_time = $attendanceResponseArray[$key]["checkout_time"];


            //LC Check
            if(!empty($checkin_time))
            {

                $parsedCheckIn_time  = Carbon::parse($checkin_time);

                //Check whether checkin done on-time
                $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

                if($isCheckin_done_ontime)
                {
                    //employee came on time....

                }
                else
                {
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
            if(!empty($checkout_time))
            {

                $parsedCheckOut_time  = Carbon::parse($checkout_time);

                //Check whether checkin done on-time
                $isCheckOut_doneEarly = $parsedCheckOut_time->lte($shiftEndTime);

                if($isCheckOut_doneEarly)
                {
                    //employee left early on time....

                    //then EG
                    $attendanceResponseArray[$key]["isEG"] = true;

                    //check whether regularization applied.
                    $regularization_status = $this->isRegularizationRequestApplied($request->user_id, $key, 'EG');

                    //check regularization status
                    $attendanceResponseArray[$key]["eg_status"] = $regularization_status;
                }
                else
                {
                    //employee left late

                }

            }


            //for absent
            if($checkin_time == null && $checkout_time == null){
                $attendanceResponseArray[$key]["isAbsent"] = true;

                //Check whether leave is applied or not.
                $attendanceResponseArray[$key]["absent_status"] = $this->isLeaveRequestApplied($request->user_id, $key);

            }
            elseif($checkin_time != null && $checkout_time == null)
            {

                //Since its MOP
                $attendanceResponseArray[$key]["isMOP"] = true;

                ////Is any permission applied
                $attendanceResponseArray[$key]["mop_status"] = $this->isRegularizationRequestApplied($request->user_id, $key, 'MOP');

                if($attendanceResponseArray[$key]["mop_status"] == "Approved"){

                    //If Approved, then set the regularize time as checkin time
                    $attendanceResponseArray[$key]["checkout_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                                                 ->where('user_id',  $request->user_id)->where('regularization_type', 'MOP')->value('regularize_time');

                  //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }


            }
            elseif($checkin_time == null && $checkout_time != null){

                //Since its MIP
                $attendanceResponseArray[$key]["isMIP"] = true;

                ////Is any permission applied
                $attendanceResponseArray[$key]["mip_status"] = $this->isRegularizationRequestApplied($request->user_id, $key, 'MIP');

                if($attendanceResponseArray[$key]["mip_status"] == "Approved"){

                    //If Approved, then set the regularize time as checkin time
                    $attendanceResponseArray[$key]["checkin_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                                                 ->where('user_id',  $request->user_id)->where('regularization_type', 'MIP')->value('regularize_time');

                  //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }


            }

        }//for each

        //dd($attendanceResponseArray);

        return $attendanceResponseArray;
    }

    public function isLeaveRequestApplied($user_id, $attendance_date){


        //check whether leave applied.If yes, check leave status
        $leave_record = VmtEmployeeLeaves::where('user_id',$user_id)->
                            whereDate('leaverequest_date',$attendance_date);

        if($leave_record->exists()){

            return $leave_record->first()->value('status');

        }
        else
        {
            return "Not Applied";
        }
    }



    private function isRegularizationRequestApplied($user_id, $attendance_date, $regularizeType)
    {

        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);

       // dd($user_id ." , ". $attendance_date." , ".$regularizeType);

        if ($regularize_record->exists())
        {
            return $regularize_record->value('status');
        }
        else
        {
            return "None";
        }
    }

    public function fetchRegularizationData(Request $request){

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
            ->whereIn('users.id', $reportees_id)->where('users.is_ssa', '0')
            ->get(['users.id', 'users.name', 'vmt_employee_office_details.designation']);



        //dd($reportees_details->toArray());
        foreach ($reportees_details as $singleItem) {
            $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->id]);
        }

        return $reportees_details;
    }

    public function fetchOrgMembers(Request $request)
    {
        //Get the team members of the given user
        //$reportees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $request->user_code)->get('user_id');

        $all_employees = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.is_ssa', '0')
            ->get(['users.id', 'users.name', 'vmt_employee_office_details.designation']);


        //dd($reportees_details->toArray());
        foreach ($all_employees as $singleItem) {
            $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->id]);
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

    public function fetchAttendanceLateComingDetails(Request $request)
    {


        $allEmployees_lateComing = '';

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');

        $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::all();

        //dd($allEmployees_lateComing);

        foreach ($allEmployees_lateComing as $singleItem) {
            $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
            $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->user_id]);

            //If reviewer_id = 0, then its not yet reviewed
            if ($singleItem->reviewer_id != 0) {
                $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_id]["name"];
                $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName([$singleItem->reviewer_id]);
            }
        }
        //dd($allEmployees_lateComing);
        return $allEmployees_lateComing;
    }

    /*
        Employee send request to HR for attendance regularization

    */
    public function applyRequestAttendanceRegularization(Request $request)
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


        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;


        $emp_avatar = getEmployeeAvatarOrShortName(auth::user()->id);


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

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }



        return $responseJSON = [
            'status' => 'success',
            'message' => 'Request sent successfully!',
            'mail_status' => $mail_status,
            'data' => [],
        ];
    }

    public function approveRejectAttendanceRegularization(Request $request)
    {

        //dd($request->all());

        $status = "failure";
        $message = "Invalid request. Kindly contact the HR/Admin";

        $data = VmtEmployeeAttendanceRegularization::find($request->lc_id);

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


        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;
        $emp_avatar = getEmployeeAvatarOrShortName(auth::user()->id);

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

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }



        return $responseJSON = [
            'status' => 'success',
            'message' => 'Regularization done successfully!',
            'mail_status' => $mail_status,
            'data' => [],
        ];
    }

    public function showLeavePolicyDocument(Request $request)
    {
        $client_name = "";

        //For testing only.
        if(isset($request->client_name))
        {
            $client_name = $request->client_name;
        }
        else
        {
            //get the client name from client table
            $client_name = VmtClientMaster::first()->value('client_name');
            $client_name = str_replace(' ', '', $client_name);
            //dd($client_name);
        }

        //choose the blade file
        $viewPage = 'leave_policy_'.strtolower($client_name);

        if (!view()->exists($viewPage)) {
            $viewPage = 'leave_policy_default';
        }

        return view($viewPage);

    }
}
