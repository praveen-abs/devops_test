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
use App\Exports\OverTimeReportExport;
use App\Exports\EarlyGoingReportExport;
use App\Exports\HalfDayReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtEmployeeAttendanceController extends Controller
{
    public function generateDetailedAttendanceReports(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
        $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        // $start_date ='2023-06-26';
        // $end_date ='2023-07-26';
        return Excel::download(new DetailedAttendanceExport($attendance_report_service->detailedAttendanceReport($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status), 'Detailed Attendance Report.xlsx'));
    }

    public function fetchDetailedAttendancedata(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        // $start_date = Carbon::parse($request->start_date)->addDay()->format('Y-m-d');
        // $end_date = Carbon::parse($request->end_date)->addDay()->format('Y-m-d');
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
        $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        // $start_date = '2023-07-26';
        dd( $start_date);
        // $end_date = '2023-07-29'; 
        $attendance_data = $attendance_report_service->detailedAttendanceReport($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
        $first_row_array =  $attendance_data[0];
        $secound_row_ar =  $attendance_data[1];
        $response = array();
        $first_row = array();
        for ($i = 0; $i < count($first_row_array); $i++) {
            $temp_ar = array();
            $temp_ar['label'] = $first_row_array[$i];
            if ($i < 3) {
                array_push($first_row,  $first_row_array[$i]);
            } else {
                if ($first_row_array[$i] == 'Total Calculation') {
                    array_push($first_row,  $first_row_array[$i]);
                } else {
                    array_push($first_row, $first_row_array[$i], "", "", "", "");
                }
            }
        }
        $response['headers'] = $first_row;
        $response['sub_headers'] = $attendance_data[1];
        $response['rows'] = $attendance_data[2];
        return $response;
        // return $first_row;
        // return $attendance_report_service->detailedAttendanceReport($start_date, $end_date);
    }

    public function showBasicAttendanceReport(Request $request)
    {
        return view('reports.vmt_basic_attendance_reports');
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

    public function basicAttendanceReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {

        $client_domain = $request->getHttpHost();
        if ($request->start_date == null || $request->end_date == null) {
            $current_date = Carbon::now();
            $current_month = $current_date->format('m');
            $last_month =  $current_month - 1;
            $date = 26;
            $year =  $current_date->format('Y');
            $start_date =  Carbon::parse($year . '-' . $last_month . '-' . $date)->format('Y-m-d');
            if ($current_date->lt(Carbon::parse($year . '-' .   $current_month . '-' . 25))) {
                $end_date = Carbon::parse($year . '-' .   $current_month . '-' . 25)->format('Y-m-d');
            } else {
                $end_date =   $current_date->format('Y-m-d');
            }
        } else {
            $start_date = Carbon::parse($request->start_date)->addDay()->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->addDay()->format('Y-m-d');
        }
        // dd($attendance_report_service->basicAttendanceReport($year)[0]);
        //return $attendance_report_service->basicAttendanceReport($year);
        return Excel::download(new BasicAttendanceExport($attendance_report_service->basicAttendanceReport($start_date,  $end_date, $client_domain)), 'Basic Attendance Report c  .xlsx');
    }

    public function fetchAbsentReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
        $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        return $attendance_report_service->fetchAbsentReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
    }

    public function downloadAbsentReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
        $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        return Excel::download(new AbsentReportExport($attendance_report_service->fetchAbsentReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status), 'Absent Report.xlsx'));
    }

    public function fetchLCReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
        $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        $response = $attendance_report_service->fetchLCReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
        return $response;
    }
    public function downloadLCReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
        $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        return Excel::download(new LateComingReportExport($attendance_report_service->fetchLCReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status), 'Late Coming Report.xlsx'));
    }

    public function fetchEGReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d'); 
        $end_date =Carbon::parse($date)->addDay(24)->format(('Y-m-d'));  
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchEGReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
        return $response;
    }

    public function downloadEGReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d'); 
        $end_date =Carbon::parse($date)->addDay(24)->format(('Y-m-d'));  
        return Excel::download(new EarlyGoingReportExport($attendance_report_service->fetchEGReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status), 'Early Going Report.xlsx'));
    }
    public function fetchHalfDayReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    { 
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d'); 
        $end_date =Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchHalfDayReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
        return $response;
    }
    public function downloadHalfDayReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d'); 
        $end_date =Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        return Excel::download(new HalfDayReportExport($attendance_report_service->fetchHalfDayReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status), 'Half Day Report.xlsx'));
    }

    public function fetchOvertimeReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d'); 
        $end_date =Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchOvertimeReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
        return $response;
    }

    public function downloadOvertimeReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d'); 
        $end_date =Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        return Excel::download(new OverTimeReportExport($attendance_report_service->fetchOvertimeReportData($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status), 'Over Time Report.xlsx'));
    }

    public function shiftTimeForEmployee(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $start_date = "2022-07-15";
        $end_date = "2022-11-02";
        $client_domain = "";
        $response = $attendance_report_service->shiftTimeForEmployee($start_date, $end_date, $client_domain);
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
    public function showAbsentReport(Request $request)
    {
        return view('reports.attendance_absent_reports');
    }
    public function showOvertimeReport(Request $request)
    {
        return view('reports.attendance_overtime_reports');
    }
    public function showHalfdayAbsentReport(Request $request)
    {
        return view('reports.attendance_halfday_absent_reports');
    }


    public function fetchMIPReportData(Request $request, VmtAttendanceReportsService $serviceVmtAttendanceReportsService)
    {
        return $serviceVmtAttendanceReportsService->fetchMIPReportData($date = "2023-08-01",);
    }
    public function fetchSandwidchReportData(Request $request, VmtAttendanceReportsService $serviceVmtAttendanceReportsService)
    {
        return $serviceVmtAttendanceReportsService->fetchSandwidchReportData($start_date = "2023-08-01", $end_date = "2023-08-20");
    }
}
