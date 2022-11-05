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

        if($request->type == 'org')
        {
            return VmtEmployeeLeaves::all();
        }
        else
        if($request->type == 'team')
        {
            //Get the list of employees for the given Manager
            $team_employees_ids = VmtEmployeeOfficeDetails::where('l1_manager_code',auth::user()->user_code)->get('user_id');

            //use wherein and fetch the relevant records

            return VmtEmployeeLeaves::whereIn('user_id',$team_employees_ids)->get();


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
        return 'Saved';
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
        return view('vmt_attendance_timeSheet',compact('employeeAttendanceData'));
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


        return view('attendance_calendar',compact('current_employee_detail','shift_start_time','shift_end_time'));

    }


    public function fetchUserTimesheet(Request $request)
    {
        $data = VmtEmployeeAttendance::where('user_id',$request->user_id)
                                        ->whereMonth('checkin_time',$request->month)
                                        ->orderBy('checkin_time', 'asc')->get(['checkin_time','checkout_time']);

        //dd($data->toArray());
        return $data;

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

    public function requestAttendanceRegularization(Request $request){

        $attendanceRegularizationRequest = new VmtEmployeeAttendanceRegularization;
        $attendanceRegularizationRequest->attendance_date = $request->attendance_date;
        $attendanceRegularizationRequest->arrival_time = $request->arrival_time;
        $attendanceRegularizationRequest->regularize_time = $request->regularize_time;
        $attendanceRegularizationRequest->reason = $request->reason;
        $attendanceRegularizationRequest->custom_reason = $request->custom_reason;

        $attendanceRegularizationRequest->save();

        return $responseJSON = [
            'status' => 'success',
            'message' => 'Request sent successfully!',
            'data' => [],
        ];
    }
}
