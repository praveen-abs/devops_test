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

    public function showBasicAttendanceReport(Request $request){
        $attendance_year=VmtEmployeeAttendance::groupby('date')->pluck('date');
         //dd( $attendance_year);
        for($i=0; $i < count($attendance_year); $i++)
        {
            $attendance_year[$i] = date("Y",strtotime($attendance_year[$i]));
        }

        $attendance_available_years = array_unique($attendance_year->toArray());

        return view('reports.vmt_basic_attendance_reports',compact('attendance_available_years'));
    }

    public function basicAttendanceReport(Request $request,VmtAttendanceReportsService $attendance_report_service){

        $year=$request->year;
        $month=$request->month;
         // dd($attendance_report_service->basicAttendanceReport($year)[0]);
          //return $attendance_report_service->basicAttendanceReport($year);
         return Excel::download(new BasicAttendanceExport($attendance_report_service->basicAttendanceReport($year,$month)), 'Test.xlsx');
        }
    }

