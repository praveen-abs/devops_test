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
use App\Models\VmtEmployeeWorkShifts;
use App\Models\TrackTaskScheduler;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtClientMaster;
use App\Models\VmtOrgTimePeriod;
use Carbon\CarbonInterval;

class VmtAttendanceServiceV2
{

    public function getShiftTimeForEmployee($user_id, $checkin_time, $checkout_time)
    {


        $emp_work_shift = VmtEmployeeWorkShifts::where('user_id', $user_id)->where('is_active', '1')->get();

        if (count($emp_work_shift) == 1) {
            $regularTime  = VmtWorkShifts::where('id', $emp_work_shift->first()->work_shift_id)->first();
            return  $regularTime;
        } else if (count($emp_work_shift) > 1) {
            //dd($emp_work_shift);
            for ($i = 0; $i < count($emp_work_shift); $i++) {
                $regularTime  = VmtWorkShifts::where('id', $emp_work_shift[$i]->work_shift_id)->first();
                $date = Carbon::parse($checkin_time)->format('Y-m-d');
                $shift_start_time = Carbon::parse($date . ' ' . $regularTime->shift_start_time)->addMinutes($regularTime->grace_time);
                $shift_end_time = Carbon::parse($date . ' ' . $regularTime->shift_end_time);
                $diffInMinutesInCheckinTime = $shift_start_time->diffInMinutes(Carbon::parse($checkin_time), false);
                $diffInMinutesInCheckOutTime =   $shift_end_time->diffInMinutes(Carbon::parse($checkout_time), false);
                // if ($user_id == '192' && $checkin_time == "13:56:01");
                // dd($diffInMinutesInCheckinTime);
                if ($checkin_time == null && $checkout_time == null) {
                    return  $regularTime;
                } else  if ($diffInMinutesInCheckinTime > -65 &&    $diffInMinutesInCheckinTime < 275) {
                    return  $regularTime;
                } else if ($diffInMinutesInCheckOutTime > -65 &&  $diffInMinutesInCheckOutTime < 65) {
                    return  $regularTime;
                }
                if ($i == count($emp_work_shift) - 1) {
                    return  $regularTime;
                }
            }
        }
    }
    public function checkWeekOffStatus($date, $weekOffJson, $checkin_time, $checkout_time)
    {
        $days_for_per_week = array('Sunday' => 0, 'Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5, 'Saturday' => 6);
        //  $date =  Carbon::parse($date);
        $given_date_day = $date->format('l');
        $day_in_number = number_format($date->format('d'));

        $weekOffJson = json_decode($weekOffJson, true);
        if ($weekOffJson[$days_for_per_week[$given_date_day]]['all_week'] == 1) {

            return   $checkin_time == null && $checkout_time == null ? true : false;
        } else {
            //logic for nth week of day week off
            $week_of_month = (int)(ceil($day_in_number / 7));
            $week_of_month_in_string = 'week_' . $week_of_month;
            if ($weekOffJson[$days_for_per_week[$given_date_day]][$week_of_month_in_string] == 1) {
                return   $checkin_time == null && $checkout_time == null ? true : false;
            } else {
                return false;
            }
        }
    }

    public function findMIPOrMOP($time, $shiftStartTime, $shiftEndTime)
    {
        $response = array();

        $date =  Carbon::parse($time)->format('Y-m-d');

        $shiftStartTime = Carbon::parse($date . ' ' . Carbon::createFromFormat('Y-m-d H:i:s', $shiftStartTime)->format('H:i:s'));
        $shift_start_time = $shiftStartTime->subHours(1)->format('Y-m-d H:i:0');
        $first_half_end_time =  $shiftStartTime->addHours(5);
        if (Carbon::parse($time)->between(Carbon::parse($shift_start_time), $first_half_end_time, true)) {
            $response['checkin_time'] = $time;
            $response['checkout_time'] = null;
        } else {
            $response['checkin_time'] = null;
            $response['checkout_time'] = $time;
        }
        return $response;
    }

    public function attendanceJobs($start_date, $end_date)
    {
        $user = user::get();
        $start_date = '2023-07-31';
        $end_date = '2023-08-15';
        $current_date = Carbon::parse($start_date);
        try {
            while ($current_date->between(Carbon::parse($start_date), Carbon::parse($end_date))) {
                $users = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                    ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->where('is_ssa', '0');
                $holidays = vmtHolidays::whereBetween('holiday_date', [$start_date, $end_date])->pluck('holiday_date');
                foreach ($users->get(['users.id as id', 'users.user_code as user_code', 'users.name as name', 'vmt_employee_office_details.designation as designation', 'vmt_employee_details.doj as doj', 'vmt_employee_details.dol as dol', 'users.client_id as client_id']) as $single_user) {
                    // dd($single_user);
                    $doj = Carbon::parse($single_user->doj);
                    //  employee in that company on date

                    if ($single_user->dol == null && Carbon::parse($doj)->lte($current_date) || $current_date->between($doj, Carbon::parse($single_user->dol))) {

                        if ($single_user->id == 223)

                        $attendance_status = 'A';
                        $checkin_lat_long = null;
                        $checkout_lat_long = null;
                        $attendance_mode_checkin = null;
                        $attendance_mode_checkout = null;
                        $is_holiday = false;
                        $client_code = VmtClientMaster::where('id', $single_user->client_id)->first()->client_code;
                        if (
                            $client_code == "DM" ||  $client_code == 'VASA' || $client_code == 'LAL'
                            ||  $client_code == 'PSC' || $client_code ==  'IMA' ||  $client_code ==  'PA' ||  $client_code ==  'DMC'
                        ) {
                            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                                ->whereDate('date',   $current_date)
                                ->where('user_Id', $single_user->user_code)
                                ->first(['check_out_time']);



                            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                                ->whereDate('date',  $current_date)
                                ->where('user_Id',  $single_user->user_code)
                                ->first(['check_in_time']);
                        } else {
                            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                                ->whereDate('date',  $current_date)
                                ->where('direction', 'out')
                                ->where('user_Id', $single_user->user_code)
                                ->first(['check_out_time']);

                            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                                ->whereDate('date', $current_date)
                                ->where('direction', 'in')
                                ->where('user_Id', $single_user->user_code)
                                ->first(['check_in_time']);
                        }

                        $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                        $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];

                        //dd($current_date.'----------------'.$deviceCheckOutTime.'-----------'.$deviceCheckInTime);
                        //dd($current_date);


                        // attendance details from vmt_employee_attenndance table
                        $web_attendance = VmtEmployeeAttendance::whereDate('date', $current_date)
                            ->where('user_id', $single_user->id)->first();
                        $all_att_data = collect();
                        $web_checkin_time = null;
                        $web_checkout_time = null;
                        if (!empty($web_attendance)) {
                            $web_checkin_time = $web_attendance->checkin_time;
                            $web_checkout_time = $web_attendance->checkout_time;
                        }
                        if ($web_checkin_time != null) {
                            $all_att_data->push(['date' => $web_attendance->date . ' ' . $web_attendance->checkin_time, 'attendance_mode' => $web_attendance->attendance_mode_checkin]);
                        }

                        if ($web_checkout_time != null) {
                            $all_att_data->push(['date' => $web_attendance->checkout_date . ' ' . $web_attendance->checkout_time, 'attendance_mode' => $web_attendance->attendance_mode_checkout]);
                        }

                        if ($deviceCheckOutTime != null) {
                            // if ($single_user->id == 223)
                            // dd($current_date);
                            $all_att_data->push(['date' => $current_date->format('Y-m-d') . ' ' . $deviceCheckOutTime, 'attendance_mode' => 'biometric']);
                            //  $all_att_data->push(['date' => $current_date->format('Y-m-d') . ' ' . $deviceCheckOutTime]);
                        }


                        if ($deviceCheckInTime != null) {
                            $all_att_data->push(['date' => $current_date->format('Y-m-d') . ' ' . $deviceCheckInTime, 'attendance_mode' => 'biometric']);
                            // $all_att_data->push(['date' => $current_date->format('Y-m-d') . ' ' . $deviceCheckInTime]);
                        }
                        $sortedCollection   =   $all_att_data->sortBy([
                            ['date', 'asc'],
                        ]);

                        $checking_time_ar = $sortedCollection->first();
                        $checkout_time_ar =  $sortedCollection->last();


                        //dd( $sortedCollection->first());
                        if ($checking_time_ar != null) {
                            $checking_time = $checking_time_ar['date'];
                            $attendance_mode_checkin = $checking_time_ar['attendance_mode'];
                        }
                        if ($checkout_time_ar != null) {
                            $checkout_time =  $checkout_time_ar['date'];
                            $attendance_mode_checkout =    $checkout_time_ar['attendance_mode'];
                        }
                        $shift_settings =  $this->getShiftTimeForEmployee($single_user->id, $checking_time, $checkout_time);
                        $shiftStartTime  = Carbon::parse($shift_settings->shift_start_time);
                        $shiftEndTime  = Carbon::parse($shift_settings->shift_end_time);
                        if ($checking_time != null &&  $checkout_time != null &&  $checkout_time ==  $checking_time) {
                            $attendance_time = $this->findMIPOrMOP($checking_time, $shiftStartTime, $shiftEndTime);

                            $checking_time  = $attendance_time['checkin_time'];
                            $checkout_time = $attendance_time['checkout_time'];
                        }


                        $week_off =   $shift_settings->week_off_days;
                        $week_off_sts = $this->checkWeekOffStatus($current_date, $week_off, $checking_time, $checkout_time);

                        foreach ($holidays as $holiday) {
                            if (
                                Carbon::parse($holiday)->eq($current_date)
                                &&  $checking_time == null &&
                                $checkout_time == null &&
                                !$week_off_sts
                            ) {
                                $is_holiday = true;
                            }
                        }

                        if ($checking_time != null) {
                            $checking_date  = substr($checking_time, 0, 10);
                            $checking_time = substr($checking_time, 11);
                        } else {
                            $checking_date = null;
                        }
                      
                        if ($checkout_time != null) {
                            $checkout_date = substr($checkout_time, 0, 10);
                            $checkout_time =  substr($checkout_time, 11);
                        } else {
                            $checkout_date = null;
                        }
                      


                        $attendance_table = new VmtEmployeeAttendanceV2;
                        $attendance_table->user_id = $single_user->id;
                        $attendance_table->vmt_employee_workshift_id = $shift_settings->id;
                        $attendance_table->date = $current_date;
                        $attendance_table->checkin_time =   $checking_time;
                        $attendance_table->checkin_date =  $checking_date;
                        $attendance_table->checkout_time =  $checkout_time;
                        // if ($single_user->id == 223)
                        // dd(  $attendance_table);
                        $attendance_table->checkout_date = $checkout_date;


                        if ($checking_time != null ||  $checkout_time != null) {
                            $attendance_status = 'P';
                        } else if ($week_off_sts) {
                            $attendance_status = 'WO';
                        } else if ($is_holiday) {
                            $attendance_status = 'HO';
                        }
                        $attendance_table->status = $attendance_status;
                        $attendance_table->attendance_mode_checkin = $attendance_mode_checkin;
                        $attendance_table->attendance_mode_checkout = $attendance_mode_checkout;
                        $attendance_table->checkin_lat_long = $checkin_lat_long;
                        $attendance_table->checkout_lat_long = $checkout_lat_long;
                        $attendance_table->save();

                        // $employee_attendance
                    } else {
                        //employee exit, or they are not in organization 
                    }
                    // dd($single_user);
                }
              
                $current_date->addDay();
            }
            dd('done');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "attendanceJobs",
                'data' => $e->getTraceAsString(),
            ]);
        }
    }
}
