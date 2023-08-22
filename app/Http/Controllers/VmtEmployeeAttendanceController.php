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
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use App\Exports\AbsentReportExport;
use App\Exports\LateComingReportExport;
use App\Exports\EmployeeAttendanceExport;
use App\Exports\BasicAttendanceExport;
use App\Exports\DetailedAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtEmployeeAttendanceController extends Controller
{
    public function generateDetailedAttendanceReports(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        // $start_date ='2023-06-26';
        // $end_date ='2023-07-26';
        return Excel::download(new DetailedAttendanceExport($attendance_report_service->detailedAttendanceReport($start_date, $end_date)), 'Attendance.xlsx');
    }

    public function fetchDetailedAttendancedata(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        $start_date = '2023-07-26';
        $end_date = '2023-07-30';
        $attendance_data = $attendance_report_service->detailedAttendanceReport($start_date, $end_date);
        $first_row_array =  $attendance_data[0];
        $secound_row_ar =  $attendance_data[1];
        $response = array();
        $first_row = array();
        for ($i = 0; $i < count($first_row_array); $i++) {
            $temp_ar = array();
            $temp_ar['label'] = $first_row_array[$i];
            if ($i < 3) {
                $temp_ar['col_span'] = 1;
                $temp_ar['row_span'] = 2;
            } else if ($first_row_array[$i] == 'Total Calculation') {
                $temp_ar['col_span'] = 15;
                $temp_ar['row_span'] = 1;
            } else {
                $temp_ar['col_span'] = 5;
                $temp_ar['row_span'] = 1;
            }
            array_push($first_row,  $temp_ar);
            unset($temp_ar);
        }
        $response['first_row'] = $first_row;

        return $first_row;
        return $attendance_report_service->detailedAttendanceReport($start_date, $end_date);
    }

    public function showBasicAttendanceReport(Request $request)
    {
        $attendance_year = VmtEmployeeAttendance::groupBy(\DB::raw("YEAR(date)"))->pluck('date')->toArray();
        $attendance_year_device = VmtStaffAttendanceDevice::groupBY(\DB::raw("YEAR(date)"))->pluck('date')->toArray();
        $attendance_year = array_merge($attendance_year, $attendance_year_device);
        for ($i = 0; $i < count($attendance_year); $i++) {
            $attendance_year[$i] = date("Y", strtotime($attendance_year[$i]));
        }

        $attendance_available_years = array_unique($attendance_year);
        return view('reports.vmt_basic_attendance_reports', compact('attendance_available_years'));
    }

    public function showDetailedAttendanceReport(Request $request)
    {
        return view('reports.vmt_detailed_attendance_reports');
    }

    public function fetchAttendanceMonthForGivenYear(Request $request)
    {
        $attendance_month = VmtEmployeeAttendance::whereYear('date', $request->attendance_year)
            ->groupBy(\DB::raw("MONTH(date)"))->pluck('date')->toArray();
        $attendance_month_device = VmtStaffAttendanceDevice::whereyear('date', $request->attendance_year)
            ->groupBY(\DB::raw("MONTH(date)"))->pluck('date')->toArray();
        $attendance_month = array_merge($attendance_month, $attendance_month_device);
        for ($i = 0; $i < count($attendance_month); $i++) {
            $attendance_month[$i] = date("m", strtotime($attendance_month[$i]));
        }

        $attendance_available_months = array_unique($attendance_month);

        return  $attendance_available_months;
    }

    public function basicAttendanceReport(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {

        $client_domain = $request->getHttpHost();
        if ($request->start_date == null || $request->end_date == null) {
            $current_date = Carbon::now();
            // $last_month = $current_date->format('M')-1;
            // $start_date =  $current_date->format('Y').
            dd( $current_date->format('m')-1);
            dd($current_date);
            $start_date = '2023-07-25';
            $end_date = '2023-07-28';
        } else {
            $start_date = $request->start_date;
            $end_date =  $request->end_date;
        }
        // dd($attendance_report_service->basicAttendanceReport($year)[0]);
        //return $attendance_report_service->basicAttendanceReport($year);
        return Excel::download(new BasicAttendanceExport($attendance_report_service->basicAttendanceReport($start_date,  $end_date, $client_domain)), 'Test.xlsx');
    }

    public function fetchAbsentReportData(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return $attendance_report_service->fetchAbsentReportData($start_date, $end_date);
    }

    public function downloadAbsentReport(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return Excel::download(new AbsentReportExport($attendance_report_service->fetchAbsentReportData($start_date, $end_date)['rows']), 'Absent Report.xlsx');
    }

    public function fetchLCReportData(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $response = $attendance_report_service->fetchLCReportData($start_date, $end_date);
        return $response;
    }
    public function downloadLCReport(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        $start_date = '2023-07-15';
        $end_date = '2023-07-20';
        return Excel::download(new LateComingReportExport($attendance_report_service->fetchAbsentReportData($start_date, $end_date)), 'Late Coming Report.xlsx');
    }

    public function fetchEGReportData(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchEGReportData($start_date, $end_date);
        return $response;
    }


    public function showLateComingReport(Request $request)
    {
        return view('reports.attendance_latecoming_reports');
    }
    public function showEarlygoingReport(Request $request)
    {
        return view('reports.attendance_earlygoing_reports');
    }
}
