<?php

namespace App\Services;

use App\Models\Department;
use App\Models\VmtEmpAttIntrTable;
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
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtOrgTimePeriod;
use Carbon\CarbonInterval;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Single;
use Illuminate\Support\Facades\Validator;
use App\Mail\dommimails;
use \Mail;

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

    public function attendanceSettingsinfos($work_shift_id)
    {
        $lc_enable = false;
        $eg_enable = false;
        $lop_status_settings = array();
        if ($work_shift_id == null) {
            $all_work_shift = VmtWorkShifts::all();
            foreach ($all_work_shift as $single_shift) {
                if ($single_shift->is_lc_applicable == 1) {
                    $lc_enable = true;
                }
                if ($single_shift->is_eg_applicable == 1) {
                    $eg_enable = true;
                }
            }
            $lop_status_settings['lc_status'] = $lc_enable;
            $lop_status_settings['eg_status'] = $eg_enable;
            return  $lop_status_settings;
        } else {
            $work_shift = VmtWorkShifts::where('id', $work_shift_id)->first();
            if ($work_shift->is_lc_applicable == 1) {
                $lc_enable = true;
            }
            if ($work_shift->is_eg_applicable == 1) {
                $eg_enable = true;
            }

            $lop_status_settings['lc_status'] = $lc_enable;
            $lop_status_settings['eg_status'] = $eg_enable;
            return  $lop_status_settings;
        }
    }

    public function attendanceJobs($start_date, $end_date)
    {
        $a='9';
        $a=(int)$a;
        ini_set('max_execution_time', 3000);
        $current_date = Carbon::parse($start_date);
        try {
            while ($current_date->between(Carbon::parse($start_date), Carbon::parse($end_date))) {
                $users = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                    ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->where('is_ssa', '0');
                $holidays = vmtHolidays::whereBetween('holiday_date', [$start_date, $end_date])->pluck('holiday_date');
                foreach ($users->get(['users.id as id', 'users.user_code as user_code', 'users.name as name', 'vmt_employee_office_details.designation as designation', 'vmt_employee_details.doj as doj', 'vmt_employee_details.dol as dol', 'users.client_id as client_id']) as $single_user) {
                    // if ($single_user->id == 182) {
                    //     if (Carbon::parse('2023-07-28 00:00:00.0')->eq($current_date))
                    //         dd($current_date);
                    // }

                    // dd($single_user);
                    $doj = Carbon::parse($single_user->doj);
                    //  employee in that company on date

                    if ($single_user->dol == null && Carbon::parse($doj)->lte($current_date) || $current_date->between($doj, Carbon::parse($single_user->dol))) {

                        $current_date_str =  $current_date->format('Y-m-d');

                        $attendance_status = 'A';
                        $checkin_lat_long = null;
                        $checkout_lat_long = null;
                        $attendance_mode_checkin = null;
                        $attendance_mode_checkout = null;
                        $is_holiday = false;
                        $is_leave = false;
                        $leave_type = 'leave';
                        $is_half_day = false;
                        $lc_mins = 0;
                        $eg_mins = 0;
                        $mop_id = null;
                        $is_mop = false;
                        $mip_id = null;
                        $is_mip = false;
                        $lc_id = null;
                        $is_lc = false;
                        $eg_id = null;
                        $is_eg = false;
                        $regz_checkin_time = null;
                        $regz_checkout_time = null;
                        $ot_mins = 0;


                        $checking_date = null;
                        $checking_time = null;
                        $checkout_date = null;
                        $checkout_time = null;
                        $reg_checking_time = null;
                        $reg_checkout_time = null;
                        $client_code = VmtClientMaster::where('id', $single_user->client_id)->first()->client_code;
                        if (
                            $client_code == "DM" ||  $client_code == 'VASA' || $client_code == 'LAL'
                            ||  $client_code == 'PSC' || $client_code ==  'IMA' ||  $client_code ==  'PA' ||  $client_code ==  'DMC'
                        ) {
                            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                                ->whereDate('date',   $current_date_str)
                                ->where('user_Id', $single_user->user_code)
                                ->first(['check_out_time']);



                            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                                ->whereDate('date',  $current_date_str)
                                ->where('user_Id',  $single_user->user_code)
                                ->first(['check_in_time']);
                        } else {
                            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                                ->whereDate('date',  $current_date_str)
                                ->where('direction', 'out')
                                ->where('user_Id', $single_user->user_code)
                                ->first(['check_out_time']);

                            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                                ->whereDate('date', $current_date_str)
                                ->where('direction', 'in')
                                ->where('user_Id', $single_user->user_code)
                                ->first(['check_in_time']);
                        }

                        $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                        $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];

                        //dd($current_date.'----------------'.$deviceCheckOutTime.'-----------'.$deviceCheckInTime);
                        //dd($current_date);


                        // attendance details from vmt_employee_attenndance table
                        // $web_attendance = VmtEmployeeAttendance::whereDate('date',  $current_date_str)
                        //     ->where('user_id', $single_user->id)->first();
                        $web_attendance_checkin = VmtEmployeeAttendance::whereDate('date',  $current_date_str)
                            ->where('user_id', $single_user->id)->first();
                        $web_attendance_checkout = VmtEmployeeAttendance::whereDate('checkout_date',  $current_date_str)
                            ->where('user_id', $single_user->id)->first();
                        $all_att_data = collect();
                        $web_checkin_time = null;
                        $web_checkout_time = null;
                        if (!empty($web_attendance_checkin)) {

                            if ($web_attendance_checkin->checkin_time != null) {
                                $web_checkin_time =  $web_attendance_checkin->date . ' ' .  $web_attendance_checkin->checkin_time;
                            }
                        }
                        if (!empty($web_attendance_checkout)) {
                            if ($web_attendance_checkout->checkout_date == null) {
                                $web_attendance_checkout->checkout_date =  $current_date_str;
                            }
                            if ($web_attendance_checkout->checkout_time != null) {
                                $web_checkout_time = $web_attendance_checkout->checkout_date . ' ' . $web_attendance_checkout->checkout_time;
                            }
                        }
                        // if($single_user->id==266 && $current_date->format('Y-m-d')=='2023-10-13')
                        // dd();
                        if ($web_checkin_time != null) {
                            $all_att_data->push(['date' => $web_attendance_checkin->date . ' ' . $web_attendance_checkin->checkin_time, 'attendance_mode' => $web_attendance_checkin->attendance_mode_checkin]);
                        }

                        if ($web_checkout_time != null) {
                            $all_att_data->push(['date' => $web_attendance_checkout->checkout_date . ' ' . $web_attendance_checkout->checkout_time, 'attendance_mode' => $web_attendance_checkout->attendance_mode_checkout]);
                        }

                        if ($deviceCheckOutTime != null) {
                            // if ($single_user->id == 223)
                            // dd($current_date);
                            $all_att_data->push(['date' =>  $current_date_str . ' ' . $deviceCheckOutTime, 'attendance_mode' => 'biometric']);
                            //  $all_att_data->push(['date' => $current_date->format('Y-m-d') . ' ' . $deviceCheckOutTime]);
                        }


                        if ($deviceCheckInTime != null) {
                            $all_att_data->push(['date' =>  $current_date_str . ' ' . $deviceCheckInTime, 'attendance_mode' => 'biometric']);
                            // $all_att_data->push(['date' => $current_date->format('Y-m-d') . ' ' . $deviceCheckInTime]);
                        }
                        $sortedCollection   =   $all_att_data->sortBy([
                            ['date', 'asc'],
                        ]);
                        //    if($single_user->id==298)
                        //    dd( $sortedCollection );
                        $checking_time_ar = $sortedCollection->first();
                        $checkout_time_ar =  $sortedCollection->last();

                        //  dd($checking_time_ar, $checkout_time_ar);
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
                        $shiftStartTime  = Carbon::parse($current_date_str . ' ' . $shift_settings->shift_start_time)->addMinutes($shift_settings->grace_time);
                        $shiftEndTime  = Carbon::parse($current_date_str . ' ' . $shift_settings->shift_end_time);
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

                        //Code For Check LC And MOP
                        if ($checking_time != null) {
                            if ($checkout_time == null) {

                                $regularization_status = $this->isRegularizationRequestApplied($single_user->id, $current_date, 'MOP');
                                $mop_id = $regularization_status['id'];
                                if ($regularization_status['sts'] == 'Approved') {
                                    $regz_checkout_time = $regularization_status['reg_time'];
                                } else {
                                    $is_mop = true;
                                }
                            }
                            $parsedCheckIn_time  = Carbon::parse($checking_time);
                            //Check whether checkin done on-time
                            // dd($shiftStartTime);
                            $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

                            if ($isCheckin_done_ontime) {
                                //employee came on time....
                            } else {
                                //dd("Checkin NOT on-time");
                                //check whether regularization applied.
                                if ($shift_settings->is_lc_applicable == 1) {
                                    $regularization_status = $this->isRegularizationRequestApplied($single_user->id, $current_date, 'LC');
                                    //   dd($current_date);
                                    $lc_id = $regularization_status['id'];
                                    if ($regularization_status['sts'] == 'Approved') {
                                        $regz_checkin_time = $regularization_status['reg_time'];
                                    } else {
                                        $lc_mins = $shiftStartTime->diffInMinutes(Carbon::parse($checking_time));
                                        $is_lc = true;
                                    }
                                }
                            }
                        }
                        //Code For Check EG And MIP
                        if ($checkout_time != null) {

                            if ($checking_time == null) {
                                $regularization_status = $this->isRegularizationRequestApplied($single_user->id, $current_date, 'MIP');
                                $mip_id = $regularization_status['id'];
                                if ($regularization_status['sts'] == 'Approved') {
                                    $regz_checkin_time = $regularization_status['reg_time'];
                                } else {
                                    $is_mip = true;
                                }
                            }
                            $parsedCheckOut_time  = Carbon::parse($checkout_time);
                            //Check whether checkin out on-time
                            $isCheckout_done_ontime = $parsedCheckOut_time->lte($shiftEndTime);
                            if ($isCheckout_done_ontime) {
                                //employee left early on time....
                                if ($shift_settings->is_eg_applicable == 1) {
                                    $regularization_status = $this->isRegularizationRequestApplied($single_user->id, $current_date, 'EG');
                                    $eg_id = $regularization_status['id'];
                                    if ($regularization_status['sts'] == 'Approved') {
                                        $regz_checkout_time = $regularization_status['reg_time'];
                                    } else {
                                        $eg_mins = $shiftEndTime->diffInMinutes(Carbon::parse($checkout_time));
                                        $is_eg = true;
                                    }
                                }
                            } else {
                                //employee left late....
                            }
                        }

                        //Calculting Ot minutes
                        $emp_ot_sts = VmtEmployeeWorkShifts::where('user_id', $single_user->id)
                            ->where('work_shift_id', $shift_settings->id)->first()->can_calculate_ot;
                        if ($emp_ot_sts == 1) {

                            if ($regz_checkin_time != null) {
                                $checkin_time_ot = substr($checking_time, 0, 10) . ' ' . $regz_checkin_time;
                                // $checkin_time_ot
                            } else {
                                $checkin_time_ot = $checking_time;
                            }
                            if ($regz_checkout_time != null) {
                                $checkout_time_ot = substr($checkout_time, 0, 10) . ' ' . $regz_checkin_time;
                                // $checkin_time_ot
                            } else {
                                $checkout_time_ot = $checkout_time;
                            }
                            if ($checkout_time_ot != null &&  $checkin_time_ot != null) {
                                if ($shift_settings->ot_calculation_type == 'shift_time') {
                                    $gross_hours = $shiftStartTime->diffInMinutes($checkout_time_ot);
                                } else if ($shift_settings->ot_calculation_type == 'actual_time') {
                                    $gross_hours = Carbon::parse($checkin_time_ot)->diffInMinutes($checkout_time_ot);
                                }
                                if ($shiftStartTime->diffInMinutes($shiftEndTime) + $shift_settings->minimum_ot_working_mins <=  $gross_hours) {
                                    if ($shift_settings->ot_calculation_type == 'shift_time') {
                                        $ot_mins = $shiftEndTime->diffInMinutes(Carbon::parse($checkout_time_ot));
                                    } else if ($shift_settings->ot_calculation_type == 'actual_time') {
                                        $shift_start_ot = $shiftStartTime->diffInMinutes(Carbon::parse($checkin_time_ot));
                                        $shift_end_ot =  $shiftEndTime->diffInMinutes(Carbon::parse($checkout_time_ot));
                                        $ot_mins = $shift_start_ot + $shift_end_ot;
                                    }
                                }
                            }
                        }
                        // dd($emp_ot_sts);


                        //here checking for leave
                        if (!$week_off_sts && !$is_holiday && $checking_time != null && $checkout_time != null) {
                            $start_leave_list = VmtEmployeeLeaves::where('user_id', $single_user->id)
                                ->WhereBetween(
                                    'start_date',
                                    [$start_date, $end_date]
                                )->where('status', 'Approved')->get();
                            $end_leave_list = VmtEmployeeLeaves::where('user_id', $single_user->id)
                                ->WhereBetween(
                                    'end_date',
                                    [$start_date, $end_date]
                                )->where('status', 'Approved')->get();
                            $leave_list =  $start_leave_list->merge($end_leave_list);
                            if (count($leave_list) > 0) {
                                foreach ($leave_list as $single_emp_leave) {
                                    if (Carbon::parse($current_date_str)->addHour(23)->betweenIncluded(Carbon::parse($single_emp_leave->start_date), Carbon::parse($end_date))) {
                                        $current_leave_type = VmtLeaves::where('id', $single_emp_leave->leave_type_id)->first()->leave_type;
                                        switch ($current_leave_type) {
                                            case 'Sick Leave / Casual Leave';
                                                $leave_type = 'SL/CL';
                                                break;
                                            case 'Casual/Sick Leave';
                                                $leave_type = 'CL/SL';
                                                break;
                                            case 'LOP Leave';
                                                $leave_type = 'LOP LE';
                                                break;
                                            case 'Earned Leave';
                                                $leave_type = 'EL';
                                                break;
                                            case 'Maternity Leave';
                                                $leave_type = 'ML';
                                                break;
                                            case 'Paternity Leave';
                                                $leave_type = 'PTL';
                                                break;
                                            case 'On Duty';
                                                $leave_type = 'OD';
                                                break;
                                            case 'Permission';
                                                $leave_type = 'PI';
                                                break;
                                            case 'Compensatory Off';
                                                $leave_type = 'CO';
                                                break;
                                            case 'Casual Leave';
                                                $leave_type = 'CL';
                                                break;
                                            case 'Sick Leave';
                                                $leave_type = 'SL';
                                                break;
                                            case 'Compensatory Leave';
                                                $leave_type = 'CO';
                                                break;
                                            case 'Compensatory Leave';
                                                $leave_type = 'FO L';
                                                break;
                                        }
                                        $is_leave = true;
                                        break;
                                    }
                                }
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

                        $existing_record_query = VmtEmpAttIntrTable::where('user_id', $single_user->id)->whereDate('date', $current_date);
                        if ($existing_record_query->exists()) {
                            $existing_record_query->delete();
                        }

                        $attendance_table = new VmtEmpAttIntrTable;
                        $attendance_table->user_id = $single_user->id;
                        $attendance_table->vmt_employee_workshift_id = $shift_settings->id;
                        $attendance_table->date = $current_date;
                        $attendance_table->checkin_time =   $checking_time;
                        $attendance_table->checkin_date =  $checking_date;
                        $attendance_table->checkout_time =  $checkout_time;
                        $attendance_table->checkout_date = $checkout_date;
                        $attendance_table->regularized_checkin_time = $regz_checkin_time;
                        $attendance_table->regularized_checkout_time = $regz_checkout_time;

                        if ($checking_time != null ||  $checkout_time != null) {
                            $attendance_status = 'P';
                            if ($is_mip || $is_mop) {
                                $attendance_status = 'A';
                            }
                            if ($is_lc) {
                                $attendance_status =  $attendance_status . '/LC';
                            }
                            if ($is_mip) {
                                $attendance_status =  $attendance_status . '/MIP';
                            }
                            if ($is_eg) {
                                $attendance_status =  $attendance_status . '/EG';
                            }
                            if ($is_mop) {
                                $attendance_status =  $attendance_status . '/MOP';
                            }
                        } else if ($week_off_sts) {
                            $attendance_status = 'WO';
                        } else if ($is_holiday) {
                            $attendance_status = 'HO';
                        } else if ($is_leave) {
                            $attendance_status = $leave_type;
                        }
                        $attendance_table->status = $attendance_status;
                        $attendance_table->attendance_mode_checkin = $attendance_mode_checkin;
                        $attendance_table->attendance_mode_checkout = $attendance_mode_checkout;
                        $attendance_table->checkin_lat_long = $checkin_lat_long;
                        $attendance_table->checkout_lat_long = $checkout_lat_long;
                        $attendance_table->overtime = $ot_mins;
                        $attendance_table->lc_id = $lc_id;
                        $attendance_table->lc_minutes  = $lc_mins;
                        $attendance_table->eg_id = $eg_id;
                        $attendance_table->eg_minutes = $eg_mins;
                        $attendance_table->mip_id = $mip_id;
                        $attendance_table->mop_id = $mop_id;
                        $attendance_table->save();
                        // $employee_attendance
                    } else {
                        //employee exit, or they are not in organization
                    }
                    // dd($single_user);
                }
                $current_date->addDay();
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Attendance updated successfully',
                'sheduler' => Mail::to('simmasrfc1330@gmail.com')->send(new dommimails('success', ' data saved successfully ', 'null')),
            ]);
        } catch (Exception $e) {

            return response()->json([
                'status' => 'failure',
                'message' => $e->getMessage(),
                'data' => $e->getTraceAsString(),
                'sheduler' => Mail::to('karthigaiselvan@abshrms.com')->send(new dommimails('failure', $e->getMessage(), $e->getTraceAsString())),
            ]);
        }
    }
    public function isRegularizationRequestApplied($user_id, $date, $regularizeType)
    {
        $res['sts'] = null;
        $res['id'] = null;
        $res['reg_time'] = null;
        $regularize_record = VmtEmployeeAttendanceRegularization::whereDate('attendance_date', $date->format('Y-m-d'))
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);
        // dd($regularize_record->exists());
        if ($regularize_record->exists()) {
            $res['sts'] = $regularize_record->value('status');
            $res['id'] = $regularize_record->value('id');
            $res['reg_time'] = $regularize_record->value('regularize_time');
            return $res;
        } else {
            return $res;
        }
    }
    public function canCalculateOt($user_code)
    {
        $ot_ids = array('DM007', 'DM009', 'DM012', 'DM016', 'DM018', 'DM019', 'DM022', 'DM028', 'DM029', 'DM032', 'DM034', 'DM038', 'DM045', 'DM054', 'DM059', 'DM069', 'DM088', 'DM091', 'DM101', 'DM103', 'DM104', 'DM107', 'DM112', 'DM113', 'DM120', 'DM123', 'DM124', 'DM125', 'DM127', 'DM128', 'DM134', 'DM140', 'DM145', 'DM146', 'DM148', 'DM149', 'DM150', 'DM151', 'DM153', 'DM156', 'DM160', 'DM161', 'DM162', 'DM163', 'DM165', 'DM166', 'DM167', 'DM169', 'DM170', 'DM175', 'DM176', 'DM177', 'DM178', 'DM179', 'DM180', 'DM181', 'DM182', 'DM183', 'DMC069', 'DMC072', 'DMC083', 'DMC084', 'DMC086', 'DMC087', 'DMC089', 'DMC090', 'DMC091', 'DMC092', 'DMC093', 'DMC094', 'DMC095', 'DMC097', 'DMC101', 'DMC102', 'DMC103', 'DMC104', 'DMC105', 'DMC106', 'DMC107', 'DMC108', 'DMC110', 'DMC111', 'DMC114', 'DMC115', 'DMC116', 'DMC118', 'DMC119', 'DMC120', 'DMC121', 'DMC123', 'DMC124', 'DMC125', 'DMC126', 'DMC128', 'DMC129', 'DMC130', 'DMC133', 'DMC136', 'DMC137', 'DMC138', 'DMC139', 'DMC142', 'DMC143', 'DMC144', 'DMC145', 'DMC146', 'DMC147', 'DMC148', 'DMC149', 'DMC150', 'DMC151', 'DMC152', 'DMC153', 'DMC154', 'DMC155', 'DMC156', 'DMC158', 'DMC159', 'DMC161', 'DMC162', 'DMC163', 'DMC164', 'DMC165', 'DMC166', 'DMC168', 'DMC169', 'DMC170', 'DMC173', 'DMC174', 'DMC176', 'DMC177');
        if (sessionGetSelectedClientCode() == "DM" || sessionGetSelectedClientCode() == "DMC") {
            if (in_array($user_code,  $ot_ids)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function downloadDetailedAttendanceReport($start_date, $end_date, $department_id, $client_id)
    {
        ini_set('max_execution_time', 3000);
        $validator = Validator::make(
            $data = [
                'client_id' => $client_id,
                'department_id' => $department_id,
                'start_date' => $start_date,
                'end_date' => $end_date
            ],
            $rules = [
                'client_id' => 'nullable|exists:vmt_client_master,id',
                'department_id' => 'nullable|exists:vmt_department,id',
                'start_date' => 'required',
                'end_date' => 'required'
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {
            $reportresponse = array();
            $users = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->where('is_ssa', '0')
                ->where('active',  "1")
                ->where('vmt_employee_details.doj', '<', Carbon::parse($end_date));

            if (!empty($department_id)) {
                $users =  $users->whereIn('client_id', $client_id);
            }
            if (!empty($client_id)) {
                $users =  $users->whereIn('vmt_employee_office_details.department_id', $department_id);
            }
            $users =   $users->get(['users.id', 'users.user_code', 'users.name', 'vmt_employee_office_details.designation', 'vmt_employee_details.doj']);
            //  dd($users);
            $heading_dates = array("Emp Code", "Name", "Designation", "DOJ");
            $attendance_setting_details = $this->attendanceSettingsinfos(null);
            $reportresponse['rows'] = array();
            $header_date = Carbon::parse($start_date);
            while ($header_date->between(Carbon::parse($start_date), Carbon::parse($end_date))) {
                array_push($heading_dates, $header_date->format('d') . ' - ' .  $header_date->format('l'));
                $header_date->addDay();
            }
            array_push($heading_dates, "Total Weekoff", "Total Holiday", "Total Present", "Total Absent", "Total Late LOP", "Total Leave", "Total Halfday", "Total On Duty");
            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($heading_dates, 'Total LC');
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($heading_dates, 'Total EG');
            }
            array_push($heading_dates, "Total Payable Days");
            $reportresponse['headings'] = $heading_dates;
            foreach ($users as $single_user) {
                $current_date = Carbon::parse($start_date);
                $temp_ar = array();
                array_push($temp_ar, $single_user->user_code, $single_user->name, $single_user->designation, $single_user->doj);
                $total_weekoff = 0;
                $total_holiday = 0;
                $total_present = 0;
                $total_absent = 0;
                $total_late_lop = 0;
                $total_leave = 0;
                $total_half_day = 0;
                $total_on_duty = 0;
                $total_LC = 0;
                $total_EG = 0;
                while ($current_date->between(Carbon::parse($start_date), Carbon::parse($end_date))) {
                    if ($single_user->dol == null && Carbon::parse($single_user->doj)->lte($current_date) || $current_date->between($single_user->doj, Carbon::parse($single_user->dol))) {
                        $att_detail = VmtEmpAttIntrTable::where('user_id', $single_user->id)->whereDate('date', $current_date)->first();
                        //   dd($temp_ar);
                        $status = $att_detail->status;
                        $sts_ar =  explode("/", $status);
                        if ($sts_ar[0] == 'P') {
                            if (count($sts_ar) != 1) {
                                if (in_array('LC', $sts_ar)) {
                                    $total_LC =   $total_LC + 1;
                                }
                                if (in_array('EG', $sts_ar)) {
                                    $total_EG = $total_EG + 1;
                                }
                                // if (in_array('MOP', $sts_ar)) {
                                // }
                                // if (in_array('MIP', $sts_ar)) {
                                // }
                            }
                            $total_present = $total_present + 1;
                        } elseif (
                            $status == 'SL/CL' ||  $status == 'CL/SL' ||  $status == 'LOP LE' ||  $status == 'EL' ||  $status == 'ML' || $status == 'PTL' ||
                            $status == 'OD' || $status == 'PI' || $status == 'CO' || $status == 'CL' || $status == 'SL' || $status == 'FO L'
                        ) {
                            // if($status='leave')
                            // dd($att_detail);
                            if ($status == 'OD') {
                                $total_on_duty = $total_on_duty;
                            } else {
                                $total_leave = $total_leave;
                            }
                            $total_present = $total_present + 1;
                        } else if ($att_detail->status == 'A') {
                            $total_absent = $total_absent + 1;
                        } else if ($att_detail->status == 'HO') {
                            $status = $att_detail->status;
                            $total_holiday = $total_holiday + 1;
                        } else if ($att_detail->status == 'WO') {
                            $status = $att_detail->status;
                            $total_weekoff = $total_weekoff + 1;
                        } else {
                            $staus = '-';
                        }
                        array_push($temp_ar, $status);
                    } else {
                        array_push($temp_ar, 'N');
                    }
                    $current_date->addDay();
                }
                $total_payable_days = ($total_weekoff + $total_holiday + $total_present + $total_leave + $total_half_day + $total_on_duty) - $total_late_lop;
                array_push($temp_ar, $total_weekoff, $total_holiday, $total_present, $total_absent, $total_late_lop, $total_leave, $total_half_day, $total_on_duty);
                if ($attendance_setting_details['lc_status'] == 1) {
                    array_push($temp_ar, $total_LC);
                }
                if ($attendance_setting_details['eg_status'] == 1) {
                    array_push($temp_ar,  $total_EG);
                }
                array_push($temp_ar, $total_payable_days);
                array_push($reportresponse['rows'], $temp_ar);
                // dd($reportresponse);
                unset($temp_ar);
            }
            return $reportresponse;
        } catch (Exception $e) {

            return response()->json([
                'status' => 'failure',
                'message' => $e->getMessage(),
                'data' => $e->getTraceAsString(),
            ]);
        }
    }
}
