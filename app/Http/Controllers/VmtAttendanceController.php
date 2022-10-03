<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VmtAttendanceController extends Controller
{

    public function showDashboard(Request $request)
    {
        return view('attendance_dashboard');

    }

    public function showAttendanceLeavePolicyPage(Request $request)
    {
        return view('attendance_leavepolicy');
    }

    public function showAttendanceLeaveReportsPage(Request $request)
    {
        return view('attendance_leaveReports');
    }

}
