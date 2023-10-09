<?php

namespace App\Http\Controllers;

use App\Exports\DetailedAttendanceExport;
use App\Exports\BasicAttendanceExport;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendanceV2;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceReport;
use Carbon\Carbon;
use App\Services\VmtAttendanceServiceV2;
use App\Models\vmtHolidays;
use App\Models\User;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtLeaves;
use App\Models\TrackTaskScheduler;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtClientMaster;
use App\Models\VmtOrgTimePeriod;
use Carbon\CarbonInterval;
use Maatwebsite\Excel\Facades\Excel;

class VmtAttendanceControllerV2 extends Controller
{

    public function attendanceJob(Request $request, VmtAttendanceServiceV2 $attendance_services)
    {
        $current_time = Carbon::now();
        foreach (VmtWorkShifts::pluck('shift_start_time') as $single_sfift) {
            $shift_start_time = Carbon::parse($single_sfift);
           // dd($shift_start_time,$current_time->diffInMinutes($shift_start_time),$current_time->diffInMinutes($shift_start_time) < 65);
            if ($current_time->diffInMinutes($shift_start_time) < 65) {
                if (VmtEmployeeAttendanceV2::exists()) {
                    $staff_attendance_query = VmtEmployeeAttendanceV2::orderBy('id', 'DESC')->first();
                    $start_date = Carbon::parse($staff_attendance_query->date)->subDays(2)->format('Y-m-d');
                } else {
                    $staff_attendance_query = VmtStaffAttendanceDevice::orderBy('id', 'asc')->first();
                    //dd('working');
                    if (Carbon::parse(VmtOrgTimePeriod::where('status', 1)->first()->start_date)->lte(Carbon::parse($staff_attendance_query->date))) {
                        $start_date = Carbon::parse($staff_attendance_query->date)->format('Y-m-d');
                    } else {
                        $start_date = Carbon::parse(VmtOrgTimePeriod::where('status', 1)->first()->start_date)->format('Y-m-d');
                    }
                }
                $end_date = Carbon::now()->format('Y-m-d');
                return $attendance_services->attendanceJobs($start_date, $end_date);
            }
        }
        return 'No New Data ';
    }


    public function downloadDetailedAttendanceReport(Request $request,VmtAttendanceServiceV2 $attendance_services)
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
        $start_date ='2023-07-26';
            $end_date ='2023-08-25';
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
        // dd($request->all());
        $period = Carbon::parse($start_date)->format('d-M-Y') . ' - ' . Carbon::parse($end_date)->format('d-M-Y');
       // dd($start_date);
       $department_id='';
       $client_id = '';
       // dd($attendance_services->downloadDetailedAttendanceReport($start_date, $end_date, $department_id, $client_id));
        return Excel::download(new BasicAttendanceExport($attendance_services->downloadDetailedAttendanceReport($start_date, $end_date, $request->department_id, $request->client_id), $public_client_logo_path, $active_status, $period, sessionGetSelectedClientName()), 'Basic Attendance Report c  .xlsx');
    }
}
