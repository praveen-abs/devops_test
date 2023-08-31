<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Carbon\CarbonInterval;

class VmtAttendanceControllerV2 extends Controller
{
    //
    // public function testing(Request $request)
    // {
    //     $user_code = 'DM019';
    //     $user_id = '192';
    //     $attendance_report_query = VmtEmployeeAttendanceReport::orderBy('id', 'DESC')->first();
    //     // $start_date =   Carbon::parse($attendance_report_query->date)->subDays(2);
    //     $start_date = Carbon::parse('2023-08-15');
    //     $end_date = Carbon::now();
    //     $total_days = $start_date->diffInDays($end_date);
    //     $holidays = vmtHolidays::whereBetween('holiday_date', [$start_date, $end_date])->pluck('holiday_date');
    //     while ($start_date->lte($end_date)) {
    //         for ($i = 0; $i <= $total_days; $i++) {
    //             $current_date = $start_date->format('Y-m-d');
    //             $day = Carbon::parse($current_date)->addDay($i)->format('l');

    //             if (
    //                 sessionGetSelectedClientCode() == "DM" || sessionGetSelectedClientCode() == 'VASA' || sessionGetSelectedClientCode() == 'LAL'
    //                 || sessionGetSelectedClientCode() == 'PSC' || sessionGetSelectedClientCode() ==  'IMA' || sessionGetSelectedClientCode() ==  'PA' || sessionGetSelectedClientCode() ==  'DMC'
    //             ) {
    //                 $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
    //                     ->whereDate('date',  $current_date)
    //                     ->where('user_Id', $user_code)
    //                     ->first(['check_out_time']);



    //                 $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
    //                     ->whereDate('date', $current_date)
    //                     ->where('user_Id',  $user_code)
    //                     ->first(['check_in_time']);

    //                 // dd($attendanceCheckIn);
    //                 // if ($attendanceCheckOut->check_out_time ==  $attendanceCheckIn->check_in_time) {
    //                 //     $attendanceCheckOut = null;
    //                 // }
    //             } else {
    //                 $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
    //                     ->whereDate('date', $current_date)
    //                     ->where('direction', 'out')
    //                     ->where('user_Id', $user_code)
    //                     ->first(['check_out_time']);

    //                 $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
    //                     ->whereDate('date', $current_date)
    //                     ->where('direction', 'in')
    //                     ->where('user_Id', $user_code)
    //                     ->first(['check_in_time']);
    //             }
    //             //dd($attendanceCheckIn);

    //             $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
    //             $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];
    //             //    dd($deviceCheckOutTime.'-----------'.$deviceCheckInTime);
    //             if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
    //                 $deviceData[] = array(
    //                     'date' =>   $current_date,
    //                     'checkin_time' => $deviceCheckInTime,
    //                     'checkout_time' => $deviceCheckOutTime,
    //                     'attendance_mode_checkin' => 'biometric',
    //                     'attendance_mode_checkout' => 'biometric'
    //                 );
    //             }
    //         }
    //     }
    // }

    public function detailedAttendanceReport($start_date, $end_date)
    {

        $reportresponse = array();
        $user = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('is_ssa', '0')
            ->where('active', '1')
            ->where('id', '192')
            ->where('vmt_employee_details.doj', '<', Carbon::parse($end_date));

        if (sessionGetSelectedClientid() != 1) {
            $user = $user->where('client_id', sessionGetSelectedClientid());
        }
        $user =  $user->get(['users.id', 'users.user_code', 'users.name', 'vmt_employee_office_details.designation', 'vmt_employee_details.doj']);
        $holidays = vmtHolidays::whereBetween('holiday_date', [$start_date, $end_date])->pluck('holiday_date');
        foreach ($user as $singleUser) {

            $total_present = 0;
            $total_absent = 0;
            $total_weekoff = 0;
            $total_holidays = 0;
            $total_leave = 0;
            $total_halfday = 0;
            $total_OD = 0;
            $total_OT = 0;
            $total_LC = 0;
            $total_LC_mins = 0;
            $total_EG = 0;
            $total_lop = 0;


            //dd($singleUser);

            $arrayReport = array($singleUser->user_code, $singleUser->name, $singleUser->designation, $singleUser->doj);



            $firstDateStr = $start_date;
            $lastAttendanceDate = Carbon::parse($end_date);
            $totalDays =  $lastAttendanceDate->diffInDays(Carbon::parse($firstDateStr));


            //dd($totalDays);
            // attendance details from vmt_staff_attenndance_device table
            $deviceData = [];

            for ($i = 0; $i <= ($totalDays); $i++) {
                // code...

                $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');



                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');

                //dd(sessionGetSelectedClientCode());
                if (
                    sessionGetSelectedClientCode() == "DM" || sessionGetSelectedClientCode() == 'VASA' || sessionGetSelectedClientCode() == 'LAL'
                    || sessionGetSelectedClientCode() == 'PSC' || sessionGetSelectedClientCode() ==  'IMA' || sessionGetSelectedClientCode() ==  'PA' || sessionGetSelectedClientCode() ==  'DMC'
                ) {
                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('user_Id', $singleUser->user_code)
                        ->first(['check_out_time']);



                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('user_Id',  $singleUser->user_code)
                        ->first(['check_in_time']);

                    // dd($attendanceCheckIn);
                    if ($attendanceCheckOut->check_out_time ==  $attendanceCheckIn->check_in_time) {
                        $attendanceCheckOut = null;
                    }
                } else {
                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'out')
                        ->where('user_Id', $singleUser->user_code)
                        ->first(['check_out_time']);

                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'in')
                        ->where('user_Id', $singleUser->user_code)
                        ->first(['check_in_time']);
                }
                //dd($attendanceCheckIn);

                $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];
                //    dd($deviceCheckOutTime.'-----------'.$deviceCheckInTime);
                if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
                    $deviceData[] = array(
                        'date' => $dateString,
                        'checkin_time' => $deviceCheckInTime,
                        'checkout_time' => $deviceCheckOutTime,
                        'attendance_mode_checkin' => 'biometric',
                        'attendance_mode_checkout' => 'biometric'
                    );
                }
            }




            // attendance details from vmt_employee_attenndance table
            $attendance_WebMobile = VmtEmployeeAttendance::
                // where('user_id', $request->user_id)
                where('user_id', $singleUser->id)
                //->whereMonth('date', $request->month)
                ->whereBetween('date', [$start_date, $end_date])
                ->orderBy('checkin_time', 'asc')
                ->get(['date', 'checkin_time', 'checkout_time', 'attendance_mode_checkin', 'attendance_mode_checkout']);
            //dd($attendance_WebMobile);


            $attendanceResponseArray = [];

            //Create empty month array with all dates.
            // $month = $request->month;


            //$days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);
            //dd($totalDays );

            //For Excel Sheet Headers
            $heading_dates = array("Emp Code", "Name", "Designation", "DOJ");
            $header_2 = array('', '', '', '');
            $heading_dates_2 = array();
            $attendance_setting_details = $this->attendanceSettingsinfos(null);
            for ($i = 0; $i <= $totalDays; $i++) {

                $fulldate = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                $date = Carbon::parse($firstDateStr)->addDay($i)->format('d');

                $date_day = $date . ' - ' . Carbon::parse($fulldate)->format('l');
                array_push($heading_dates, $date_day);
                array_push($heading_dates_2, $date_day);
                array_push($header_2, 'InPunch', 'OutPunch', 'OT');
                if ($attendance_setting_details['lc_status'] == 1) {
                    array_push($header_2, 'LC Minutes');
                }
                array_push($header_2, 'Staus');
                $attendanceResponseArray[$fulldate] = array(
                    //"user_id"=>$request->user_id,
                    "user_id" => $singleUser->id, "DOJ" => $singleUser->doj, "isAbsent" => false, "isLeave" => false,
                    "is_weekoff" => false, "isLC" => null, "isEG" => null, "date" => $fulldate, "is_holiday" => false,
                    "attendance_mode_checkin" => null, "attendance_mode_checkout" => null, "absent_status" => null,
                    "checkin_time" => null, "checkout_time" => null, "leave_type" => null, "half_day_status" => null,
                    "half_day_type" => null, "OT" => 0
                );

                //echo "Date is ".$fulldate."\n";
                ///$month_array[""]
            }
            //dd( $attendanceResponseArray);
            array_push($heading_dates, 'Total Calculation');
            array_push($header_2, "Total Weekoff", "Total Holiday", "Total Over Time", "Total Present", "Total Absent", "Total Late LOP", "Total Leave", "Total Halfday", "Total On Duty");
            $attendance_setting_details = $this->attendanceSettingsinfos(null);

            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($header_2, 'Total LC');
                array_push($header_2, 'Total LC Minutes');
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($header_2, 'Total EG');
            }
            array_push($header_2, "Total Payable Days");





            // merging result from both table
            //dd($attendance_WebMobile->toArray());

            // dd($deviceData);

            $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());

            $dateCollectionObj    =  collect($merged_attendanceData);
            $sortedCollection   =   $dateCollectionObj->sortBy([
                ['date', 'asc'],
            ]);
            $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
            //dd($merged_attendanceData);
            //if ($singleUser->id == '192')

            // dd($dateWiseData);
            // dd($attendanceResponseArray);
            foreach ($dateWiseData  as $key => $value) {
                //dd($key);
                //dd($value[0]);

                /*
                     Here $key is the date. i.e : 2022-10-01

                     $value is ::

                         [
                             date=>2022-11-05
                             checkin_time=18:06:00
                             checkout_time=18:06:00
                             attendance_mode="web"
                         ],
                         [
                             ....
                             attendance_mode="biometric"

                         ]

                 */
                //Compare the checkin,checkout time between all attendance modes and get the min(checkin) and max(checkout)

                $checkin_min = null;
                $checkout_max = null;
                $attendance_mode_checkin = null;
                $attendance_mode_checkout = null;


                foreach ($value as $singleValue) {
                    //Find the min of checkin
                    //dd($singleValue);

                    if ($checkin_min == null) {
                        $checkin_min = $singleValue["checkin_time"];

                        $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                    } else
                     if ($checkin_min > $singleValue["checkin_time"]) {
                        $checkin_min = $singleValue["checkin_time"];
                        $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                    }

                    //dd("Min value found : " . $singleValue["checkin_time"]);

                    //Find the max of checkin
                    if ($checkout_max == null) {
                        $checkout_max = $singleValue["checkout_time"];
                        $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
                    } else
                     if ($checkout_max < $singleValue["checkout_time"]) {
                        $checkout_max = $singleValue["checkout_time"];
                        $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
                    }
                }

                //dd("end : Check-in : ".$checkin_min." , Check-out : ".$checkout_max);

                //dd($value[0]["attendance_mode"]);

                $attendanceResponseArray[$key]["checkin_time"] = $checkin_min;
                $attendanceResponseArray[$key]["checkout_time"] = $checkout_max;

                //TODO :: Based on which checkin, checkout time taken, its corresponding attendance modes has to be assigned here
                $attendanceResponseArray[$key]["attendance_mode_checkin"] = $attendance_mode_checkin;
                $attendanceResponseArray[$key]["attendance_mode_checkout"] = $attendance_mode_checkout;
            }


            // if ($singleUser->id == '192')
            //dd($attendanceResponseArray );
            foreach ($attendanceResponseArray as $key => $value) {

                //dd($key);
                //get Shift Time for day

                $shift_settings = $this->getShiftTimeForEmployee($singleUser->id, $value['checkin_time'], $value['checkout_time']);
                // if( $shift_settings == null){
                //     dd($singleUser->id);
                // }
                // if( $shift_settings->shift_start_time==null)
                // dd($singleUser->id);
                $shiftStartTime  = Carbon::parse($shift_settings->shift_start_time);
                $shiftEndTime  = Carbon::parse($shift_settings->shift_end_time);
                $weekOffDays =  $shift_settings->week_off_days;
                $attendanceResponseArray[$key]['shift_start_time'] = $shiftStartTime;
                $attendanceResponseArray[$key]['shift_end_time'] = $shiftEndTime;
                if ($attendanceResponseArray[$key]['checkin_time'] != null && $attendanceResponseArray[$key]['checkout_time'] != null && $attendanceResponseArray[$key]['checkout_time'] == $attendanceResponseArray[$key]['checkin_time']) {
                    $attendance_time = $this->findMIPOrMOP($attendanceResponseArray[$key]['checkin_time'], $shiftStartTime, $shiftEndTime);

                    $attendanceResponseArray[$key]['checkin_time'] = $attendance_time['checkin_time'];
                    $attendanceResponseArray[$key]['checkout_time'] = $attendance_time['checkout_time'];
                }
                // if(  $singleUser->id=='192'&&$key='2023-06-13'){
                //     dd( $shift_settings);
                // }

                //Calculate OT
                // if($singleUser->id==188)
                //dd(Carbon::parse($value['checkin_time'])->diffInMinutes($value['checkout_time']));
                // dd($shiftStartTime->diffInMinutes($shiftEndTime) );
                //  dd(Carbon::parse($value['checkout_time']));
                if ($this->canCalculateOt($singleUser->user_code)) {
                    if ($shiftStartTime->diffInMinutes($shiftEndTime) + 30 <= Carbon::parse($value['checkin_time'])->diffInMinutes($value['checkout_time']) && $value['checkout_time'] != null) {
                        $ot = $shiftEndTime->diffInMinutes(Carbon::parse($value['checkout_time']));
                        $ot_ar = CarbonInterval::minutes($ot)->cascade();
                        $ot_hrs = (int) $ot_ar->totalHours;
                        $ot_mins = $ot_ar->toArray()['minutes'];
                        $total_ot =    $ot_hrs . ' Hrs:' .  $ot_mins . ' Minutes';
                        // dd( $total_ot);
                        if ($ot_hrs == 0) {
                            if ($ot_mins > 30) {
                                $attendanceResponseArray[$key]['OT'] =  $total_ot;
                                $total_OT =  $total_OT +  $ot;
                            } else {
                                $attendanceResponseArray[$key]['OT'] =  0;
                            }
                        } else {
                            $attendanceResponseArray[$key]['OT'] =  $total_ot;
                            $total_OT =  $total_OT +  $ot;
                        }
                    }
                } else {
                    $attendanceResponseArray[$key]['OT'] =  0;
                }

                // if ($shiftEndTime->diffInMinutes(Carbon::parse($value['checkout_time'])) > 30 && $value['checkout_time'] != null && $shiftStartTime->diffInMinutes($shiftEndTime) > 270) {
                //     $ot = $shiftEndTime->diffInMinutes(Carbon::parse($value['checkout_time']));
                //     $total_OT =  $total_OT +  $ot;
                //     $ot_ar = CarbonInterval::minutes($ot)->cascade();
                //     $ot_hrs = (int) $ot_ar->totalHours;
                //     $ot_mins = $ot_ar->toArray()['minutes'];
                //     $total_ot =    $ot_hrs . ' Hrs:' .  $ot_mins . ' Minutes';
                //     // dd( $total_ot);
                //     $attendanceResponseArray[$key]['OT'] =  $total_ot;
                // }
                //dd('---------');



                //Logic For Check week off or not

                if (!array_key_exists('date', $attendanceResponseArray[$key]))
                    dd("Missing for : " . $key);

                // if (
                //     Carbon::parse($attendanceResponseArray[$key]['date'])->format('l') == "Sunday"
                //     && $attendanceResponseArray[$key]['checkin_time'] == null &&
                //     $attendanceResponseArray[$key]["checkout_time"] == null
                // ) {
                //     $attendanceResponseArray[$key]['is_weekoff'] = true;
                // }
                $attendanceResponseArray[$key]['is_weekoff'] = $this->checkWeekOffStatus($attendanceResponseArray[$key]['date'], $weekOffDays, $attendanceResponseArray[$key]['checkin_time'], $attendanceResponseArray[$key]["checkout_time"]);

                //Logic For Check Holiday Or Not
                foreach ($holidays as $holiday) {
                    if (
                        Carbon::parse($holiday)->eq(Carbon::parse($attendanceResponseArray[$key]['date']))
                        && $attendanceResponseArray[$key]['checkin_time'] == null &&
                        $attendanceResponseArray[$key]["checkout_time"] == null &&
                        !$attendanceResponseArray[$key]['is_weekoff']
                    ) {
                        $attendanceResponseArray[$key]['is_holiday'] = true;
                    }
                }

                //Logic For Check Leave,Half day, Absent
                //dd($attendanceResponseArray[$key]['user_id']);
                if (
                    $attendanceResponseArray[$key]['checkin_time'] == null &&
                    $attendanceResponseArray[$key]["checkout_time"] == null &&
                    $attendanceResponseArray[$key]['is_weekoff'] == false
                ) {

                    $leave_Details = VmtEmployeeLeaves::where('user_id', $attendanceResponseArray[$key]['user_id']);

                    if (empty($leave_Details)) {
                        $leave_Details =   $leave_Details->get(['start_date', 'end_date', 'status', 'leave_type_id', 'total_leave_datetime']);
                    } else {
                        $leave_Details =   $leave_Details->WhereBetween('start_date', [$start_date, $end_date]);
                        $leave_Details =   $leave_Details->WhereBetween('end_date', [$start_date, $end_date])
                            ->get(['start_date', 'end_date', 'status', 'leave_type_id', 'total_leave_datetime']);
                        // if ($key == '2023-08-12')
                        // dd($leave_Details);
                    }

                    // if ($key == '2023-08-12')
                    //     dd($leave_Details);
                    if ($leave_Details->count() == 0) {
                        // dd( $leave_Details->count());
                        $attendanceResponseArray[$key]['isAbsent'] = true;
                    } else {
                        foreach ($leave_Details as $single_leave_details) {
                            $startDate = Carbon::parse($single_leave_details->start_date)->subDays(1);
                            $endDate = Carbon::parse($single_leave_details->end_date);
                            $currentDate =  Carbon::parse($attendanceResponseArray[$key]['date']);
                            //   dd($startDate.'-----'.$currentDate.'-----');
                            if ($currentDate->gt($startDate) && $currentDate->lte($endDate)) {
                                if (substr($single_leave_details->total_leave_datetime, -1) == 'N') {
                                    // Logic Get FN or AN Value From total Leave date time
                                    $attendanceResponseArray[$key]['half_day_type'] = preg_replace("/([^a-zA-Z]+)/i", "",  $single_leave_details->total_leave_datetime);
                                    $attendanceResponseArray[$key]['half_day_status'] = $single_leave_details->status;
                                } else if (
                                    $attendanceResponseArray[$key]['checkin_time'] == null &&
                                    $attendanceResponseArray[$key]["checkout_time"] == null &&
                                    $single_leave_details->status == 'Approved'
                                ) {
                                    $attendanceResponseArray[$key]['isLeave'] = true;
                                    $leave_type = VmtLeaves::where('id', $single_leave_details->leave_type_id)
                                        ->pluck('leave_type');
                                    //  dd( $leave_type[0]);
                                    if ($leave_type[0] == 'Sick Leave / Casual Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'SL/CL';
                                    } else if ($leave_type[0] == 'Casual/Sick Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'CL/SL';
                                    } else if ($leave_type[0] == 'LOP Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'LOP LE';
                                    } else if ($leave_type[0] == 'Earned Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'EL';
                                    } else if ($leave_type[0] == 'Maternity Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'ML';
                                    } else if ($leave_type[0] == 'Paternity Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'PTL';
                                    } else if ($leave_type[0] == 'On Duty') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'OD';
                                    } else if ($leave_type[0] == 'Permission') {
                                        $attendanceResponseArray[$key]['leave_type'] = "PI";
                                    } else if ($leave_type[0] == 'Compensatory Off') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'CO';
                                    } else if ($leave_type[0] == 'Casual Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'CL';
                                    } else if ($leave_type[0] == 'Sick Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'SL';
                                    } else if ($leave_type[0] == 'Compensatory Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'CO';
                                    } else if ($leave_type[0] == 'Flexi day-off Leave') {
                                        $attendanceResponseArray[$key]['leave_type'] = 'FO L';
                                    }
                                    continue;
                                } else {
                                    $attendanceResponseArray[$key]['isAbsent'] = true;
                                    continue;
                                }
                            } else {
                                $attendanceResponseArray[$key]['isAbsent'] = true;
                                continue;
                            }
                        }
                    }
                }

                $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
                $checkout_time = $attendanceResponseArray[$key]["checkout_time"];

                //Code For Check LC
                if (!empty($checkin_time)) {
                    $parsedCheckIn_time  = Carbon::parse($checkin_time);
                    //Check whether checkin done on-time
                    $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);
                    if ($isCheckin_done_ontime) {
                        //employee came on time....
                    } else {
                        //dd("Checkin NOT on-time");
                        //check whether regularization applied.
                        $user_id = $attendanceResponseArray[$key]['user_id'];
                        $date = $attendanceResponseArray[$key]['date'];
                        $regularization_status = $this->isRegularizationRequestApplied($user_id, $date, 'LC');
                        $attendanceResponseArray[$key]["isLC"] = $regularization_status;
                    }
                }
                //Code For Check EG
                if (!empty($checkout_time)) {
                    $parsedCheckOut_time  = Carbon::parse($checkout_time);
                    //Check whether checkin out on-time
                    $isCheckout_done_ontime = $parsedCheckOut_time->lte($shiftEndTime);
                    if ($isCheckout_done_ontime) {
                        //employee left early on time....
                        $user_id = $attendanceResponseArray[$key]['user_id'];
                        $date = $attendanceResponseArray[$key]['date'];
                        $regularization_status = $this->isRegularizationRequestApplied($user_id, $date, 'EG');
                        $attendanceResponseArray[$key]["isEG"] = $regularization_status;
                    } else {
                        //employee left late....
                    }
                }
            }


            // dd($attendanceResponseArray);
            foreach ($attendanceResponseArray as $key => $value) {
                $lc_mins = 0;
                if ($attendanceResponseArray[$key]['isLC'] != null) {
                    $lc_mins = Carbon::parse($attendanceResponseArray[$key]['checkin_time'])->diffInMinutes($attendanceResponseArray[$key]['shift_start_time']);
                    $total_LC_mins =  $total_LC_mins + $lc_mins;
                }
                array_push(
                    $arrayReport,
                    $attendanceResponseArray[$key]['checkin_time'] == null ? 0 : $attendanceResponseArray[$key]['checkin_time'],
                    $attendanceResponseArray[$key]['checkout_time'] == null ? 0 : $attendanceResponseArray[$key]['checkout_time'],
                    $attendanceResponseArray[$key]['OT'],
                    $lc_mins . ' Minutes'
                );
                // if($singleUser->id==206)
                //  dd($arrayReport);
                $current_date = Carbon::parse($attendanceResponseArray[$key]['date']);
                $doj = Carbon::parse($attendanceResponseArray[$key]['DOJ']);

                if ($doj->gt($current_date)) {
                    array_push($arrayReport, 'N');
                } else if ($attendanceResponseArray[$key]['is_weekoff']) {
                    array_push($arrayReport, 'WO');
                    $total_weekoff++;
                } else if ($attendanceResponseArray[$key]['is_holiday']) {
                    array_push($arrayReport, 'HO');
                    $total_holidays++;
                } else if (
                    $attendanceResponseArray[$key]['isAbsent'] && !$attendanceResponseArray[$key]['isLeave']
                    && !$attendanceResponseArray[$key]['is_holiday'] && $attendanceResponseArray[$key]['half_day_status'] == null
                ) {
                    array_push($arrayReport, 'A');
                    $total_absent++;
                } else if ($attendanceResponseArray[$key]['half_day_status'] == 'Approved') {
                    if ($attendanceResponseArray[$key]['half_day_type'] == 'FN') {
                        array_push($arrayReport, 'HD/P');
                    } else if ($attendanceResponseArray[$key]['half_day_type'] == 'AN') {
                        array_push($arrayReport, 'P/HD');
                    }
                    $total_present = $total_present + 0.5;
                    $total_halfday = $total_halfday + 0.5;
                } else if ($attendanceResponseArray[$key]['half_day_status'] == 'Pending' || $attendanceResponseArray[$key]['half_day_status'] == 'Rejected') {
                    if ($attendanceResponseArray[$key]['half_day_type'] == 'AN') {
                        array_push($arrayReport, 'A/P');
                    } else if ($attendanceResponseArray[$key]['half_day_type'] == 'FN') {
                        array_push($arrayReport, 'P/A');
                    }
                    $total_present = $total_present + 0.5;
                    $total_absent = $total_absent + 0.5;
                } else if ($attendanceResponseArray[$key]['isLeave']) {
                    // dd($attendanceResponseArray[$key]);
                    if ($attendanceResponseArray[$key]['leave_type'] == 'OD') {
                        array_push($arrayReport, $attendanceResponseArray[$key]['leave_type']);
                        $total_OD++;
                    } else {
                        array_push($arrayReport, $attendanceResponseArray[$key]['leave_type']);
                        $total_leave++;
                    }
                } else if ($attendanceResponseArray[$key]['checkin_time'] != null || $attendanceResponseArray[$key]['checkout_time'] != null) {


                    if ($shift_settings->is_lc_applicable == 1 ||  $shift_settings->is_eg_applicable == 1) {
                        $lc_eg_day_att = 'P';
                        if ($attendanceResponseArray[$key]['isLC'] == 'Rejected' || $attendanceResponseArray[$key]['isLC'] == 'Not Applied') {
                            if ($shift_settings->is_lc_applicable == 1) {
                                $lc_eg_day_att = $lc_eg_day_att . '/LC';
                                if ($total_LC >= $shift_settings->lc_limit_permonth && $shift_settings->lc_limit_permonth != null) {
                                    $total_lop =  $total_lop + $shift_settings->lc_exceed_lop_day;
                                }
                            }
                        }
                        if ($attendanceResponseArray[$key]['isEG'] == 'Rejected' || $attendanceResponseArray[$key]['isEG'] == 'Not Applied') {
                            if ($shift_settings->is_eg_applicable == 1) {
                                $lc_eg_day_att = $lc_eg_day_att . '/EG';
                                if ($total_EG >= $shift_settings->eg_limit_permonth && $shift_settings->eg_limit_permonth != null) {
                                    $total_lop =  $total_lop + $shift_settings->lc_exceed_lop_day;
                                }
                            }
                        }
                        array_push($arrayReport,  $lc_eg_day_att);
                        $total_present++;
                    } else {
                        array_push($arrayReport, 'P');
                        $total_present++;
                    }


                    //Count For LG AND EG
                    if ($attendanceResponseArray[$key]['isLC'] != null) {
                        $total_LC++;
                    }

                    if ($attendanceResponseArray[$key]['isEG'] != null) {
                        $total_EG++;
                    }
                } else {
                    array_push($arrayReport, ' ');
                }
                //if($singleUser->id==204)



            }

            // if($singleUser->id==204);
            // dd($arrayReport);
            // foreach ($attendanceResponseArray as $key => $value) {

            // }

            if ($total_OT > 0) {
                //dd( $total_OT);
                $total_OT = CarbonInterval::minutes($total_OT)->cascade();
                $total_hours = (int)$total_OT->totalHours;
                $total_minutes = $total_OT->toArray()['minutes'];
                $total_OT =  $total_hours . '.' . $total_minutes;
                // dd(  $total_OT );
            }


            array_push($arrayReport, $total_weekoff, $total_holidays, $total_OT, $total_present, $total_absent, $total_lop, $total_leave, $total_halfday, $total_OD,);
            if ($attendance_setting_details['lc_status'] == 1) {
                $total_LC_mins = $total_LC_mins . ' Minutes';
                array_push($arrayReport, $total_LC, $total_LC_mins);
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($arrayReport, $total_EG);
            }
            $total_payable_days = ($total_weekoff + $total_holidays + $total_present + $total_leave + $total_halfday) - $total_lop;
            array_push($arrayReport,  $total_payable_days);
            array_push($reportresponse, $arrayReport);
            unset($arrayReport);
        }

        $data = array($heading_dates, $header_2, $reportresponse, $heading_dates_2);

        return $data;
    }
}
