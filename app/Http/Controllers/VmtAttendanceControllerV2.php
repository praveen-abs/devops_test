<?php

namespace App\Http\Controllers;

use App\Exports\DetailedAttendanceExport;
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
            if ($current_time->diffInMinutes($shift_start_time) < 65) {
                $task_sheduler = TrackTaskScheduler::where('job', 'vmt_staff_attenndance_device');
                // dd(VmtStaffAttendanceDevice::exists());
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
    }


    public function downloadDetailedAttendanceReport(VmtAttendanceServiceV2 $attendance_services)
    {
        $start_date = '2023-07-26';
        $end_date = '2023-08-25';
        return Excel::download(new DetailedAttendanceExport($attendance_services->downloadDetailedAttendanceReport($start_date, $end_date), true), 'Detailed Attendance Report.xlsx');
    }
}
