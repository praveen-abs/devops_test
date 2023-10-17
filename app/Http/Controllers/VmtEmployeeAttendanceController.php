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
use App\Exports\ConsolidateAttendanceExport;
use App\Exports\DetailedAttendanceExport;
use App\Exports\OverTimeReportExport;
use App\Exports\EarlyGoingReportExport;
use App\Exports\HalfDayReportExport;
use App\Exports\InvestmentsReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtEmployeeAttendanceController extends Controller
{
    public function generateDetailedAttendanceReports(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        // $start_date ='2023-06-26';
        // $end_date ='2023-06-29';
        $is_lc = false;
        if (VmtWorkShifts::where('is_lc_applicable', 1)->exists()) {
            $is_lc = true;
        }
        $data = $attendance_report_service->detailedAttendanceReport($start_date, $end_date, $request->department_id, $request->client_id);
        // dd($data);
        $client_query = VmtClientMaster::where('id', sessionGetSelectedClientid())->first();
        $client_name = sessionGetSelectedClientName();
        $client_logo_path = session()->get('client_logo_url');
        $public_client_logo_path = public_path($client_logo_path);
        // dd($data);
        return Excel::download(new DetailedAttendanceExport($data, $is_lc, $client_name, $public_client_logo_path, $start_date, $end_date), 'Detailed Attendance Report.xlsx');
    }
    public function downloadConsolidateReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {

        if (empty($request->start_date)  || empty($request->end_date)) {
            if (empty($request->date)) {
                $date = Carbon::now()->format('Y-m-d');
                $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
                $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
            } else {
                $start_date = Carbon::parse($request->date)->subMonth()->addDay(25)->format('Y-m-d');
                $end_date = Carbon::parse($request->date)->addDay(24)->format(('Y-m-d'));
            }
        } else {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $client_logo_path = session()->get('client_logo_url');
        $public_client_logo_path = public_path($client_logo_path);

        $period = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        return Excel::download(new ConsolidateAttendanceExport($attendance_report_service->fetchConsolidateReportData($start_date, $end_date, $request->department_id, $request->client_id), $public_client_logo_path, $period, sessionGetSelectedClientName()), 'Consolidate Attendance Report.xlsx');
    }
    public function fetchConsolidateAttendancedata(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        return $attendance_report_service->fetchConsolidateReportData($start_date, $end_date, $request->department_id, $request->client_id);
    }

    public function fetchDetailedAttendancedata(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $date = $request->date_req;
        if ($date = $request->date_req == null) {
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

            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        return $attendance_report_service->detailedAttendanceReport($start_date, $end_date, $request->department_id, $request->client_id);
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

        if (empty($request->start_date)  || empty($request->end_date)) {
            if (empty($request->date)) {
                $date = Carbon::now()->format('Y-m-d');
                $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
                $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
            } else {
                $start_date = Carbon::parse($request->date)->subMonth()->addDay(25)->format('Y-m-d');
                $end_date = Carbon::parse($request->date)->addDay(24)->format(('Y-m-d'));
            }
        } else {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
        }
        // dd($attendance_report_service->basicAttendanceReport($year)[0]);
        //return $attendance_report_service->basicAttendanceReport($year);
        $client_logo_path = session()->get('client_logo_url');
        $public_client_logo_path = public_path($client_logo_path);


        if (empty($request->active_status)) {
            $active_status = 'Active,Resigned,Yet to activate';
        } else {
            $active_status = '';
            foreach ($request->active_status as $single_sts) {
                if ($single_sts == '0') {
                    $active_status = $active_status . 'Yet to activate,';
                } else if ($single_sts == '1') {
                    $active_status = $active_status . 'Active,';
                } else if ($single_sts == '-1') {
                    $active_status = $active_status . 'Resigned,';
                } else {
                }
            }
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $period = Carbon::parse($start_date)->format('d-M-Y') . ' - ' . Carbon::parse($end_date)->format('d-M-Y');
        return Excel::download(new BasicAttendanceExport($attendance_report_service->basicAttendanceReport($start_date, $end_date, $request->department_id, $request->client_id), $public_client_logo_path, $active_status, $period, sessionGetSelectedClientName()), 'Basic Attendance Report c  .xlsx');
    }

    public function fetchAbsentReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        return $attendance_report_service->fetchAbsentReportData($start_date, $end_date, $request->department_id, $request->client_id);
    }

    public function downloadAbsentReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $period = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        $client_query = VmtClientMaster::where('id', sessionGetSelectedClientid())->first();
        $client_name = sessionGetSelectedClientName();
        $client_logo_path = session()->get('client_logo_url');
        $public_client_logo_path = public_path($client_logo_path);
        $absent_data = $attendance_report_service->fetchAbsentReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return Excel::download(new AbsentReportExport($absent_data, $client_name, $public_client_logo_path, $period), 'Absent Report.xlsx');
    }

    public function fetchLCReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        $response = $attendance_report_service->fetchLCReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return $response;
    }
    public function downloadLCReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        // dd($request->all());
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $date = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $period = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        $client_name = sessionGetSelectedClientName();
        $client_logo_path = VmtClientMaster::where('id', sessionGetSelectedClientid())->first()->client_logo;
        $public_client_logo_path = public_path($client_logo_path);
        $lc_data = $attendance_report_service->fetchLCReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return Excel::download(new LateComingReportExport($lc_data, $client_name, $public_client_logo_path,  $period), 'Late Coming Report.xlsx');
    }

    public function fetchEGReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchEGReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return $response;
    }

    public function downloadEGReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $period = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        $client_name = sessionGetSelectedClientName();
        $client_logo_path = VmtClientMaster::where('id', sessionGetSelectedClientid())->first()->client_logo;
        $public_client_logo_path = public_path($client_logo_path);

        $lc_data = $attendance_report_service->fetchEGReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return Excel::download(new EarlyGoingReportExport($lc_data, $client_name, $public_client_logo_path, $period), 'Early Going Report.xlsx');
    }



    public function fetchHalfDayReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchHalfDayReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return $response;
    }
    public function downloadHalfDayReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $date = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $period = Carbon::parse($request->start_date)->format('d-M-Y') . ' - ' . Carbon::parse($request->end_date)->format('d-M-Y');
        $client_name = sessionGetSelectedClientName();
        $client_logo_path = VmtClientMaster::where('id', sessionGetSelectedClientid())->first()->client_logo;
        $public_client_logo_path = public_path($client_logo_path);
        $halfday_data = $attendance_report_service->fetchHalfDayReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return Excel::download(new HalfDayReportExport($halfday_data, $client_name, $public_client_logo_path,  $period), 'Half Day Report.xlsx');
    }

    public function fetchOvertimeReportData(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        // $start_date = '2023-07-25';
        // $end_date = '2023-07-28';
        $response = $attendance_report_service->fetchOvertimeReportData($start_date, $end_date, $request->department_id, $request->client_id);
        return $response;
    }

    public function downloadOvertimeReport(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $date = $request->date;
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        if (Carbon::parse($end_date)->gt(Carbon::today())) {
            $end_date = Carbon::today()->format('Y-m-d');
        }
        $client_logo_path = session()->get('client_logo_url');
        $public_client_logo_path = public_path($client_logo_path);

        $period = Carbon::parse($start_date)->format('d-M-Y') . ' - ' . Carbon::parse($end_date)->format('d-M-Y');
        return Excel::download(new OverTimeReportExport($attendance_report_service->fetchOvertimeReportData($start_date, $end_date, $request->department_id, $request->client_id), $public_client_logo_path, $period, sessionGetSelectedClientName()), 'Over Time Report.xlsx');
    }

    public function shiftTimeForEmployee(Request $request, VmtAttendanceReportsService $attendance_report_service) // need to work
    {
        $start_date = "2022-07-15";
        $end_date = "2022-11-02";
        $client_domain = "";
        $response = $attendance_report_service->shiftTimeForEmployee($start_date, $end_date, $client_domain);
        return $response;
    }

    public function downloadInvestmentReport(Request $request, VmtAttendanceReportsService $attendance_report_service)
    {


        return Excel::download(new InvestmentsReportsExport($attendance_report_service->fetchInvestmentTaxReports()), 'Investments Report.xlsx');
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
