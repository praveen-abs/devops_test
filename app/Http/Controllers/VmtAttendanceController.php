<?php

namespace App\Http\Controllers;

use App\Mail\ApproveRejectLeaveMail;
use App\Mail\RequestLeaveMail;
use App\Models\User;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtLeaves;
use App\Models\VmtGeneralInfo;
use App\Models\VmtStaffAttendanceDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeMail;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use \Datetime;
use Carbon\Carbon;

class VmtAttendanceController extends Controller
{

    public function showDashboard(Request $request)
    {
        return view('attendance_dashboard');

    }

    public function showAttendanceLeavePage(Request $request){

        $allEmployeesList = User::all();
        return view('attendance_leave',compact('allEmployeesList'));

    }

    public function showAttendanceLeavePolicyPage(Request $request)
    {
        return view('attendance_leavepolicy');
    }

    public function showAttendanceLeaveReportsPage(Request $request)
    {
        return view('attendance_leaveReports');
    }

    public function showLeaveHistoryPage(Request $request){
        $allEmployeesList = User::all(['id','name']);

        if($request->type == 'org')
        {
            return view('leave_history_org',compact('allEmployeesList'));
        }
        else
        if($request->type == 'team')
        {
            return view('leave_history_team',compact('allEmployeesList'));
        }
        else
        if($request->type == 'employee')
        {
            return view('leave_history_employee',compact('allEmployeesList'));
        }

    }

    public function showAttendanceApprovalPage(Request $request){
        $allEmployeesList = User::all(['id','name']);

        return view('attendance_approvals',compact('allEmployeesList'));

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
        $employee_mail =  VmtEmployeeOfficeDetails::where('user_id',$employee_user_id)->value('officical_mail');
        $manager_user_id = VmtEmployeeLeaves::where('id', $request->leave_id)->value('reviewer_user_id');

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        $isSent    = \Mail::to($employee_mail)->send(new ApproveRejectLeaveMail(
                                                                auth::user()->name,
                                                                auth::user()->user_code,
                                                                User::find($manager_user_id)->value('name'),
                                                                User::find($manager_user_id)->value('user_code'),
                                                                request()->getSchemeAndHttpHost(),
                                                                $image_view,
                                                                "",
                                                                $request->status)
                                                    );

        if( $isSent) {
            $mail_status = "Mail sent successfully";

         } else {
            $mail_status= "There was one or more failures.";
        }

        $response = [
            'status' => 'success',
            'message' => 'Leave Request applied successfully',
            'mail_status' => $mail_status,
            'error' => '',
            'error_verbose' =>''
        ];





        $response = [
            'status' => 'success',
            'message' => 'Leave '.$request->status,
            'error' => '',
            'error_verbose' =>''
        ];

        return $response;
    }

    public function fetchLeaveRequestDetails(Request $request)
    {
        $leave_details = '';

        $map_allEmployees = User::all(['id','name'])->keyBy('id');

        if($request->type == 'org')
        {
            $employeeLeaves_Org = VmtEmployeeLeaves::all();

            //dd($map_allEmployees[1]["name"]);
            foreach($employeeLeaves_Org as $singleItem){
                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->user_id]);

                $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName([$singleItem->reviewer_user_id]);
            }

            return $employeeLeaves_Org;

        }
        else
        if($request->type == 'team')
        {
            //Get the list of employees for the given Manager
            $team_employees_ids = VmtEmployeeOfficeDetails::where('l1_manager_code',auth::user()->user_code)->get('user_id');

            //use wherein and fetch the relevant records
            $employeeLeaves_team = VmtEmployeeLeaves::whereIn('user_id',$team_employees_ids)->get();


            //dd($map_allEmployees[1]["name"]);
            foreach($employeeLeaves_team as $singleItem){
                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->user_id]);

                $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName([$singleItem->reviewer_user_id]);
            }

            //dd($employeeLeaves_team);
            return $employeeLeaves_team;


        }
        else
        if($request->type == 'employee')
        {
            return VmtEmployeeLeaves::where('user_id',auth::user()->id)->get();
        }

    }

    public function fetchSingleLeavePolicyRecord($id)
    {
        $temp =VmtLeaves::find($id);
        return $temp;

    }

    public function updateSingleLeavePolicyRecord(Request $request)
    {
        $vmtLeave =VmtLeaves::find($request->leave_policy_id);
        $vmtLeave->days_annual  = $request->days_annual;
        $vmtLeave->days_monthly  = $request->days_month;
        $vmtLeave->days_restricted  = $request->days_restricted;


        $vmtLeave->save();
        $response = [
            'status' => 'success',
            'message' => 'Leave details updated',
            'error' => '',
            'error_verbose' =>''
        ];

        return $response;
    }

    public function saveLeaveRequestDetails(Request $request)
    {

        //dd($request->all());
        $notification_user = User::where('id',auth::user()->id)->first();

        $emp_leave_details =  new VmtEmployeeLeaves;
        $emp_leave_details->user_id = auth::user()->id;
        $emp_leave_details->leave_type_id = $request->leave_type_id;
        $emp_leave_details->start_date = $request->start_date;
        $emp_leave_details->end_date = $request->end_date;
        $emp_leave_details->leave_reason = $request->leave_reason;

        //get manager of this employee
        $manager_emp_code = VmtEmployeeOfficeDetails::where('user_id',auth::user()->id)->value('l1_manager_code');
        $manager_id = User::where('user_code',$manager_emp_code)->value('id');

        $emp_leave_details->reviewer_user_id = $manager_id;


        if(!empty($request->notifications_users_id))
            $emp_leave_details->notifications_users_id = implode(",",$request->notifications_users_id);

        $emp_leave_details->reviewer_comments = "";
        $emp_leave_details->status = "Pending";

        //dd($request->notifications_users_id);

        //dd($emp_leave_details->toArray());
        $emp_leave_details->save();

        //Need to send mail to 'reviewer' and 'notifications_users_id' list
        $reviewer_mail =  VmtEmployeeOfficeDetails::where('user_id',$manager_id)->value('officical_mail');

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        $isSent    = \Mail::to($reviewer_mail)->send(new RequestLeaveMail(auth::user()->name, auth::user()->user_code, request()->getSchemeAndHttpHost(), $image_view));

        if( $isSent) {
            $mail_status = "Mail sent successfully";

         } else {
            $mail_status= "There was one or more failures.";
        }

        $response = [
            'status' => 'success',
            'message' => 'Leave Request applied successfully',
            'mail_status' => $mail_status,
            'error' => '',
            'error_verbose' =>''
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
        return view('old_vmt_attendance_timesheet',compact('employeeAttendanceData'));
    }

    /*
        Fetch timesheet data via AJAX
        Input :

    */
    public function fetchTimesheetData(Request $request)
    {
        $month = $request->month;
        $user_id  =$request->user_id;

        $month='10';
        $user_id='141';

        $employeeAttendanceData = VmtEmployeeAttendance::whereMonth('checkin_time',$month)
                                    ->where('user_id',$user_id)
                                    ->get();

        dd($employeeAttendanceData);
        return $employeeAttendanceData;
    }

    public function showAllEmployeesTimesheetPage(Request $request){


        return view('vmt_admin_attendance_timesheet',compact('employeeAttendanceData'));

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
    protected function dayWiseStaffAttendance(Request $request){
        $date = $request->has('date') ? $request->date : Carbon::now()->format('Y-m-d');

        $attendanceJoin = \DB::table('vmt_staff_attenndance_device')
                   ->select('user_Id',\DB::raw('MAX(date) as check_out_time'), \DB::raw('MIN(date) as check_in_time'))
                   ->whereDate('date', $date)
                   ->groupBy('user_Id');

        $users = \DB::table('users')->select('id', 'name', 'user_code', 'check_in_time','check_out_time')
            ->leftJoinSub($attendanceJoin, 'vmt_staff_attenndance_device', function ($join) {
                $join->on('users.user_code', '=', 'vmt_staff_attenndance_device.user_Id');
            })->get();

        //Shift timings
        $shift_timings = VmtWorkShifts::where('shift_type','First Shift')->first();

        return view('vmt_daily_staff_attendance', compact('users','shift_timings'));
    }





    /////////////////////// New routing methods


    public function showTimesheet(Request $request){
        //$data = VmtEmployeeAttendance::where('user_id',a);
        //dd($data);

        $shift_start_time = VmtWorkShifts::where('shift_type',"First Shift")->value('shift_start_time');
        $shift_end_time = VmtWorkShifts::where('shift_type',"First Shift")->value('shift_end_time');

        //Show the single employee timesheet detail in sidepanel

        $current_employee_detail = User::leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
        ->where('users.id', auth::user()->id)
        ->first(['users.id','users.name','vmt_employee_office_details.designation']);


        return view('attendance_timesheet',compact('current_employee_detail','shift_start_time','shift_end_time'));

    }


    public function fetchUserTimesheet(Request $request)
    {
        $data = VmtEmployeeAttendance::where('user_id',$request->user_id)
                    ->whereMonth('checkin_time',$request->month)
                    ->orderBy('checkin_time', 'asc')->get(['checkin_time','checkout_time']);

        $regularTime  = VmtWorkShifts::where('shift_type', 'First Shift')->first();
        //dd($regularTime->shift_start_time);

        foreach ($data as $key => $value) {
            // code...
            $checkinDate  = Carbon::parse($value->checkin_time)->toDateString();
            $shiftStartTime  = Carbon::parse($checkinDate .' '.$regularTime->shift_start_time);
            $checkInTime = Carbon::parse($value->checkin_time);

            $isRegular = $shiftStartTime->lte($checkInTime);

            $data[$key]['is_lc'] = $isRegular;
            $data[$key]['is_lc_applied'] = $this->isLateComingRequestApplied($request->user_id, $checkinDate);
        }

        //dd($data->toArray());
        return $data;

    }

    private function isLateComingRequestApplied($user_id, $attendance_date){

        $existCount = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
                ->where('user_id',  $user_id)->count();

        if($existCount == 0)
            return false;
        else
            return true;
    }

    public function fetchTeamTimesheet(Request $request)
    {
        //Get the team members of the given user
        $reportees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $request->user_code)->get('user_id');

        $reportees_details = User::leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
                            ->whereIn('users.id',$reportees_id)
                            ->get(['users.id','users.name','vmt_employee_office_details.designation']);


        //dd($reportees_details->toArray());

        return $reportees_details;
    }

    public function fetchOrgTimesheet(Request $request)
    {
        //Get the team members of the given user
        //$reportees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $request->user_code)->get('user_id');

        $all_employees = User::leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
                            ->get(['users.id','users.name','vmt_employee_office_details.designation']);


        //dd($reportees_details->toArray());

        return $all_employees;
    }

    /*
        Also known as Attendance Regularization

    */
    public function showLateComingApprovalPage(Request $request){


        return view('attendance_latecoming_approvals');

    }

    public function fetchAttendanceLateComingDetails(Request $request)
    {


        $allEmployees_lateComing = '';

        $map_allEmployees = User::all(['id','name'])->keyBy('id');

        $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::all();

        //dd($allEmployees_lateComing);

        foreach($allEmployees_lateComing as $singleItem){
            $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
            $singleItem->employee_avatar = getEmployeeAvatarOrShortName([$singleItem->user_id]);

            //If reviewer_id = 0, then its not yet reviewed
            if($singleItem->reviewer_id != 0)
            {
                $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_id]["name"];
                $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName([$singleItem->reviewer_id]);
            }
        }
        //dd($allEmployees_lateComing);
        return $allEmployees_lateComing;
    }

    public function applyRequestAttendanceRegularization(Request $request){
       // dd($request->all());

        //Check if already request applied
        $data = VmtEmployeeAttendanceRegularization::where('attendance_date', $request->attendance_date)
                ->where('user_id',  $request->attendance_user);

        if($data->exists())
        {
            dd("Request already applied");
        }
        else
        {

            //dd("Request not applied");

            $attendanceRegularizationRequest = new VmtEmployeeAttendanceRegularization;
            $attendanceRegularizationRequest->user_id = $request->attendance_user;
            $attendanceRegularizationRequest->attendance_date = $request->attendance_date;
            $attendanceRegularizationRequest->arrival_time =  Carbon::createFromFormat('Y-m-d h:i:s',$request->attendance_date." ".$request->arrival_time);
            $attendanceRegularizationRequest->regularize_time = Carbon::createFromFormat('Y-m-d h:i:s',$request->attendance_date." ".$request->regularize_time);
            $attendanceRegularizationRequest->reason_type = $request->reason;
            $attendanceRegularizationRequest->custom_reason = $request->custom_reason;
            $attendanceRegularizationRequest->status = 'Pending';

            $attendanceRegularizationRequest->save();
        }

        return $responseJSON = [
            'status' => 'success',
            'message' => 'Request sent successfully!',
            'data' => [],
        ];
    }

    public function approveRejectAttendanceRegularization(Request $request){

        //dd($request->all());

        $status = "failure";
        $message = "Invalid request. Kindly contact the HR/Admin";

        $data = VmtEmployeeAttendanceRegularization::find($request->lc_id);

        if($data->exists())
        {
            $data->reviewer_id = auth::user()->id;
            $data->reviewer_reviewed_date = Carbon::today()->setTimezone('Asia/Kolkata');
            $data->status = $request->status;
            $data->reviewer_comments = $request->status_text ?? '---';

            $data->save();

            $status = "success";
            $message = "Attendance Regularization is completed.";

        }

        return $responseJSON = [
            'status' => $status,
            'message' => $message,
            'data' => [],
        ];
    }

}
