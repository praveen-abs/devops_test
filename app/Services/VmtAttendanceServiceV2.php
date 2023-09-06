<?php

namespace App\Services;
use App\Models\VmtEmployeeAttendanceV2;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceReport;
use Carbon\Carbon;
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
class VmtAttendanceServiceV2
{

    public function attendanceJobs($start_date,$end_date)
    {
        $user = user::get();
        $current_date = Carbon::parse($start_date);

    }
}
