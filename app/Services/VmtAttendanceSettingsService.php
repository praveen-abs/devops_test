<?php

namespace App\Services;

use App\Mail\ApproveRejectLeaveMail;
use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\vmtHolidays;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeCompensatoryLeave;
use App\Models\VmtLeaves;
use App\Models\VmtWorkShifts;
use App\Models\VmtGeneralInfo;
use App\Models\VmtEmployeesLeavesAccrued;
use App\Models\Department;

use App\Services\VmtNotificationsService;

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;
use App\Models\VmtEmployeeAbsentRegularization;
use App\Models\VmtEmployeeWorkShifts;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use \Datetime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\Models\VmtOrgTimePeriod;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class VmtAttendanceSettingsService
{
    //TODO : Need to add the entire parameters
    // public function saveWorkShiftSettings($shift_name, $shift_code, $is_default, $shift_timerange_type,
    //                                         $flexible_gross_hours, $shift_start_time, $shift_start_time){

    // }

}
