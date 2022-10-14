<?php

namespace App\Http\Controllers;

use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtLeaves;
use Illuminate\Http\Request;

class VmtAttendanceController extends Controller
{

    public function showDashboard(Request $request)
    {
        return view('attendance_dashboard');

    }

    public function showAttendanceLeavePolicyPage(Request $request)
    {
        $leave_policy_details = VmtLeaves::all();
        return view('attendance_leavepolicy',compact('leave_policy_details'));
    }

    public function showAttendanceLeaveReportsPage(Request $request)
    {
        return view('attendance_leaveReports');
    }

    public function getLeaveRequestDetails(Request $request)
    {
        return VmtEmployeeLeaves::where('id')->get();
    }

    public function saveLeaveRequestDetails(Request $request)
    {
        $emp_leave_details =  new VmtEmployeeLeaves;
        $emp_leave_details->leave_type_id = $request->leave_type_id;
        $emp_leave_details->start_date = $request->start_date;
        $emp_leave_details->end_date = $request->end_date;
        $emp_leave_details->leave_reason = $request->leave_reason;
        $emp_leave_details->reviewer_user_id = $request->reviewer_user_id;
        $emp_leave_details->notifications_users_id = $request->notifications_users_id;
        $emp_leave_details->reviewer_comments = $request->reviewer_comments;
        $emp_leave_details->status = $request->status;

        $emp_leave_details->save();

        return "success";

    }

    /*
        Show the attendance IN/OUT time for the given month

    */
    public function showEmployeeTimeSheetPage(Request $request)
    {
        $currentmonth = $request->current_month;

        //TODO : get the attendance data for the given month
        $employeeAttendanceData = VmtEmployeeAttendance::where('user_id',$request->user_id)->get();

        return view('vmt_attendance_timesheet',compact('employeeAttendanceData'));
    }

    public function showAllEmployeesTimesheetPage(Request $request){

        return view('vmt_admin_attendance_timesheet',compact('employeeAttendanceData'));

    }

}
