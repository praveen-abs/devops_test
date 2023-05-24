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
    // TODO : Need to add the entire parameters
    public function saveWorkShiftSettings(
        $shift_code,
        $shift_name,
        $is_default,
        $shift_timerange_type,
        $flexible_gross_hours,
        $shift_start_time,
        $shift_end_time,
        $grace_time,
        $week_off_days,
        $custom_shift_time_for_specific_days,
        $break_timerange_type,
        $flexible_gross_break,
        $breaktime_morning,
        $breaktime_lunch,
        $breaktime_evening,
        $halfday_min_workhrs,
        $fullday_min_workhrs
    ) {


        $validator = Validator::make(
            $data = [
                "shift_code" => $shift_code,
                "shift_name" => $shift_name,
                "is_default"=> $is_default,
                "shift_timerange_type"=>$shift_timerange_type,
                "flexible_gross_hours"=>$flexible_gross_hours,
                "shift_start_time" => $shift_start_time,
                'shift_end_time' => $shift_end_time,
                'grace_time'=> $grace_time,
                'week_off_days'=> $week_off_days,
                'custom_shift_time_for_specific_days'=>$custom_shift_time_for_specific_days,
                '$break_timerange_type'=>$break_timerange_type,
                'flexible_gross_break'=>$flexible_gross_break,
                'breaktime_morning'=>$breaktime_morning,
                'breaktime_lunch'=>$breaktime_lunch,
                'breaktime_evening'=> $breaktime_evening,
                'halfday_min_workhrs'=> $halfday_min_workhrs,
                'fullday_min_workhrs'=> $fullday_min_workhrs
            ],
            $rules = [
                "shift_code" => 'required',
                "shift_name" => 'required',
                "shift_timerange_type"=>'required',
                'week_off_days'=>'required',
                '$break_timerange_type'=>'required',
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $response = '';

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while saving Work ShiftSettings",
                "data" => $e,
            ]);
        }


        dd($shift_code);
    }
}
