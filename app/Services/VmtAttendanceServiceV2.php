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
use App\Models\VmtEmployeeAttendanceRegularization;
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
        ini_set('max_execution_time', 3000);
        $user = user::get();
        $start_date = '2023-07-26';
        $end_date = '2023-08-26';
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



                        $attendance_status = 'A';
                        $checkin_lat_long = null;
                        $checkout_lat_long = null;
                        $attendance_mode_checkin = null;
                        $attendance_mode_checkout = null;
                        $is_holiday = false;
                        $checking_date = null;
                        $checking_time = null;
                        $checkout_date = null;
                        $checkout_time = null;
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
                        //    if($single_user->id==298)
                        //    dd( $sortedCollection );
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
                //  dd(  $current_date);
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
    public function isRegularizationRequestApplied($user_id, $date, $regularizeType)
    {
        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);
        if ($regularize_record->exists()) {
            return $regularize_record->value('status');
        } else {
            return 'Not Applied';
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

    public function downloadDetailedAttendanceReport($start_date, $end_date)
    {
        try {
            $current_date = Carbon::parse($start_date);
            $users = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->where('vmt_employee_details.doj', '<', Carbon::parse($end_date))
                ->where('is_ssa', '0')
                ->get([
                    'users.id as id',
                    'users.user_code as user_code',
                    'users.name as name',
                    'vmt_employee_office_details.designation as designation',
                    'vmt_employee_details.dob as dob',
                    'vmt_employee_details.doj as doj',
                    'vmt_employee_details.dol as dol'
                ]);
            $heading_dates = array("Emp Code", "Name", "Designation", "DOJ");
            $header_2 = array('', '', '', '');
            $attendance_setting_details = $this->attendanceSettingsinfos(null);
            foreach ($users as $single_user) {
                $current_date = Carbon::parse($start_date);
                array_push($heading_dates, $current_date->format('d') . ' - ' . $current_date->format('l'));
                array_push($header_2, 'InPunch', 'OutPunch', 'OT');
                if ($attendance_setting_details['lc_status'] == 1) {
                    array_push($header_2, 'LC Minutes');
                }
                array_push($header_2, 'Status');
                $temp_ar = array();
                array_push($temp_ar, $single_user->user_code, $single_user->name, $single_user->designation, $single_user->doj);
                $total_LC_mins = 0;
                $total_ot = 0;
                while ($current_date->between(Carbon::parse($start_date), Carbon::parse($end_date))) {

                    if ($single_user->dol == null && Carbon::parse($single_user->doj)->lte($current_date) || $current_date->between($single_user->doj, Carbon::parse($single_user->dol))) {

                        $att_detail = VmtEmployeeAttendanceV2::where('user_id', $single_user->id)->whereDate('date', $current_date)->first();
                        $lc_eg_setting = $this->attendanceSettingsinfos($att_detail->vmt_employee_workshift_id);
                        $checkin_time = 0;
                        $checkout_time = 0;
                        $current_ot = 0;
                        $is_eg = null;
                        $is_lc = null;
                        $lc_mins = 0;
                        if ($lc_eg_setting['lc_status'])
                            $lc_minutes = 0;
                        $status = $att_detail->status;
                        if ($att_detail->status == 'A') {
                            // get leave details for current date 
                            $leave = VmtLeaves::where('user_id', $single_user->id)
                                ->orWhereMonth('start_date', $current_date->format('m'))
                                ->orWhereMonth('end_date', $current_date->format('m'))->orderBy('id', 'DESC')->first();
                            if ($leave->exists()) {
                                $leave = $leave->first();
                                if ($current_date->between(Carbon::parse($leave->start_date), Carbon::parse($leave->end_date)) && $leave->status == 'Approved') {
                                    $leave_type = VmtLeaves::where('id', $leave->leave_type_id);
                                    if ($leave_type == 'Sick Leave / Casual Leave') {
                                        $status = 'SL/CL';
                                    } else if ($leave_type == 'Casual/Sick Leave') {
                                        $status = 'CL/SL';
                                    } else if ($leave_type == 'LOP Leave') {
                                        $status = 'LOP LE';
                                    } else if ($leave_type == 'Earned Leave') {
                                        $status = 'EL';
                                    } else if ($leave_type == 'Maternity Leave') {
                                        $status = 'ML';
                                    } else if ($leave_type == 'Paternity Leave') {
                                        $status = 'PTL';
                                    } else if ($leave_type == 'On Duty') {
                                        $status = 'OD';
                                    } else if ($leave_type == 'Permission') {
                                        $status = "PI";
                                    } else if ($leave_type == 'Compensatory Off') {
                                        $status = 'CO';
                                    } else if ($leave_type == 'Casual Leave') {
                                        $status = 'CL';
                                    } else if ($leave_type == 'Sick Leave') {
                                        $status = 'SL';
                                    } else if ($leave_type == 'Compensatory Leave') {
                                        $status = 'CO';
                                    } else if ($leave_type == 'Flexi day-off Leave') {
                                        $status = 'FO L';
                                    }
                                }
                            }
                        } else if ($att_detail->status != 'P') {
                            $checkin_time = $att_detail->checkin_time;
                            $checkin_time =  $att_detail->checkout_time;
                            $shift_settings = $this->getShiftTimeForEmployee($single_user->id,  $checkin_time, $checkin_time);
                            $shiftStartTime  = Carbon::parse($shift_settings->shift_start_time);
                            $shiftEndTime  = Carbon::parse($shift_settings->shift_end_time);
                            if (!empty($checkin_time)) {
                                $parsedCheckIn_time  = Carbon::parse($checkin_time);
                                //Check whether checkin done on-time
                                $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);
                                if ($isCheckin_done_ontime) {
                                    //employee came on time....
                                } else {
                                    //dd("Checkin NOT on-time");
                                    //check whether regularization applied.
                                    $regularization_status = $this->isRegularizationRequestApplied($single_user->id, $current_date->format('Y-m-d'), 'LC');
                                    $is_lc = $regularization_status;
                                }
                            }

                            if (!empty($checkout_time)) {
                                $parsedCheckOut_time  = Carbon::parse($checkout_time);
                                //Check whether checkin out on-time
                                $isCheckout_done_ontime = $parsedCheckOut_time->lte($shiftEndTime);
                                if ($isCheckout_done_ontime) {
                                    //employee left early on time....
                                    $regularization_status = $this->isRegularizationRequestApplied($single_user->id, $current_date, 'EG');
                                    $is_eg = $regularization_status;
                                } else {
                                    //employee left late....
                                }
                            }

                            if ($this->canCalculateOt($single_user->user_code)) {
                                if ($shiftStartTime->diffInMinutes($shiftEndTime) + 30 <= Carbon::parse($checkin_time)->diffInMinutes($checkout_time) && $checkout_time != null) {
                                    $ot = $shiftEndTime->diffInMinutes(Carbon::parse($checkout_time));
                                    $ot_ar = CarbonInterval::minutes($ot)->cascade();
                                    $ot_hrs = (int) $ot_ar->totalHours;
                                    $ot_mins = $ot_ar->toArray()['minutes'];
                                    $current_ot =    $ot_hrs . ' Hrs:' .  $ot_mins . ' Minutes';
                                    // dd( $total_ot);
                                    if ($ot_hrs == 0) {
                                        if ($ot_mins > 30) {
                                            $total_ot =  $total_ot +   $current_ot;
                                        }
                                    } else {
                                        $total_ot =  $total_ot +  $current_ot;
                                    }
                                }
                            }
                            if ($is_lc != null) {
                                $lc_mins = Carbon::parse($checkin_time)->diffInMinutes($shiftStartTime);
                                $total_LC_mins =  $total_LC_mins + $lc_mins;
                            }
                        } else if ($att_detail->status != 'HO' && $att_detail->status != 'WO') {
                            $checkin_time = '-';
                            $checkout_time = '-';
                            $ot = '-';
                            if ($lc_eg_setting['lc_status'])
                                $lc_minutes = '-';
                            $status = $att_detail->status;
                        }
                        dd($att_detail);
                    } else {
                        array_push($temp_ar, 0, 0, 0);
                        if ($attendance_setting_details['lc_status'] == 1) {
                            array_push($temp_ar, '0 Minutes');
                        }
                        array_push($temp_ar, 'N');
                    }
                }
                dd($single_user);
            }
            array_push($heading_dates, 'Total Calculation');
            array_push($header_2, "Total Weekoff", "Total Holiday", "Total Over Time", "Total Present", "Total Absent", "Total Late LOP", "Total Leave", "Total Halfday", "Total On Duty");
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "attendanceJobs",
                'data' => $e->getTraceAsString(),
            ]);
        }
    }
}
