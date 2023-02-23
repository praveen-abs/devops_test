<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtAttendanceReportsService;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtLeaves;
use App\Models\VmtGeneralInfo;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use App\Exports\EmployeeAttendanceExport;
use App\Exports\BasicAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtEmployeeAttendanceController extends Controller
{
    public function generateAttendanceReports()
    {
        return Excel::download(new EmployeeAttendanceExport, 'Attendance.xlsx');

    }

    public function showAttendanceReport(){
        $attendance_details = VmtEmployeeAttendance::leftJoin('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
                ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','users.id')
                ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','users.id')
                ->select([
                       'users.user_code',
                       'users.name',
                       'vmt_employee_office_details.designation',
                       'vmt_employee_attendance.date',
                       'vmt_employee_attendance.checkin_time',
                       'vmt_employee_attendance.checkout_time',
                       'vmt_employee_attendance_regularizations.regularization_type',
                       'vmt_employee_attendance_regularizations.status',
                       ]
                 )//->where('vmt_employee_attendance.date','=','2022-'.'09-'.$i)
                 //->orderby('vmt_employee_attendance.date')
                 ->limit(3)
                 ->get();
        return view('attendance_reports', compact('attendance_details'));
    }

    public function basicAttendanceReport(Request $request,VmtAttendanceReportsService $attendance_report_service){

        $year='2023';
        $month='01';
         // dd($attendance_report_service->basicAttendanceReport($year)[0]);
          //return $attendance_report_service->basicAttendanceReport($year);
         return Excel::download(new BasicAttendanceExport($attendance_report_service->basicAttendanceReport($year,$month)), 'Test.xlsx');
        }
    }

