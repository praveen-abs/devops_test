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
use App\Exports\DetailedAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtEmployeeAttendanceController extends Controller
{
    public function generateDetailedAttendanceReports(Request $request,VmtAttendanceReportsService $attendance_report_service)
    {
        $year=2023;
        $month='03';
        return Excel::download(new DetailedAttendanceExport($attendance_report_service->detailedAttendanceReport($year,$month)), 'Attendance.xlsx');

    }

    public function showBasicAttendanceReport(Request $request){
        $attendance_year=VmtEmployeeAttendance::groupBy(\DB::raw("YEAR(date)"))->pluck('date')->toArray();
        $attendance_year_device = VmtStaffAttendanceDevice::groupBY(\DB::raw("YEAR(date)"))->pluck('date')->toArray();
        $attendance_year = array_merge( $attendance_year, $attendance_year_device);
        for($i=0; $i < count($attendance_year); $i++)
        {
            $attendance_year[$i] = date("Y",strtotime($attendance_year[$i]));
        }

        $attendance_available_years = array_unique($attendance_year);
        return view('reports.vmt_basic_attendance_reports',compact('attendance_available_years'));
    }

    public function fetchAttendanceMonthForGivenYear(Request $request){
        $attendance_month=VmtEmployeeAttendance::whereYear('date',$request->attendance_year)
                                              ->groupBy(\DB::raw("MONTH(date)"))->pluck('date')->toArray();
        $attendance_month_device = VmtStaffAttendanceDevice::whereyear('date',$request->attendance_year)
                                              ->groupBY(\DB::raw("MONTH(date)"))->pluck('date')->toArray();
        $attendance_month = array_merge( $attendance_month, $attendance_month_device);
        for($i=0; $i < count($attendance_month); $i++)
        {
            $attendance_month[$i] = date("m",strtotime($attendance_month[$i]));
        }

        $attendance_available_months = array_unique($attendance_month);

       return  $attendance_available_months;
    }

    public function basicAttendanceReport(Request $request,VmtAttendanceReportsService $attendance_report_service){

        $client_domain = $request->getHttpHost();
        //$client_domain = 'brandavatar.abshrms.com';
        $year=$request->year;
        $month=$request->month;
         // dd($attendance_report_service->basicAttendanceReport($year)[0]);
          //return $attendance_report_service->basicAttendanceReport($year);
         return Excel::download(new BasicAttendanceExport($attendance_report_service->basicAttendanceReport($year,$month,$client_domain)), 'Test.xlsx');
        }


    }

