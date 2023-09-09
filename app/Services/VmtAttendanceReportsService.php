<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtLeaves;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtPayroll;
use App\Models\AbsSalaryProjection;
use App\Models\VmtEmployeeWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\vmtHolidays;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use App\Exports\DetailedAttendanceExport;
use App\Exports\BasicAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Ramsey\Uuid\Type\Integer;

class VmtAttendanceReportsService
{

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

    public function findMIPOrMOP($time, $shiftStartTime, $shiftEndTime)
    {
        $response = array();
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

    public function RegularizationRequestStatus($user_id, $date, $regularizeType)
    {
        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);
        $reg_sts = array();
        $reg_sts['sts'] = 'Not Applied';
        $reg_sts['time'] = null;
        $reg_sts['id'] = null;
        if ($regularize_record->exists()) {
            $reg_sts['sts'] = $regularize_record->first()->status;
            $reg_sts['time'] = $regularize_record->first()->regularize_time;
            $reg_sts['id'] = $regularize_record->first()->id;
            return $reg_sts;
        } else {
            return  $reg_sts;
        }
    }

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
                $shift_start_time = Carbon::parse($regularTime->shift_start_time)->addMinutes($regularTime->grace_time);
                $shift_end_time = Carbon::parse($regularTime->shift_end_time);
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
        $date =  Carbon::parse($date);
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

    public function basicAttendanceReport($start_date, $end_date, $client_domain)
    {
        ini_set('max_execution_time', 3000);
        //dd($month);
        $reportresponse = array();
        $user = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('is_ssa', '0')
            ->where('active', '1')
            ->where('vmt_employee_details.doj', '<', Carbon::parse($end_date))
            ->get(['users.id', 'users.user_code', 'users.name', 'vmt_employee_office_details.designation', 'vmt_employee_details.doj']);
        // print($user);exit;
        $holidays = vmtHolidays::whereBetween('holiday_date', [$start_date, $end_date])->pluck('holiday_date');
        foreach ($user as $singleUser) {

            $total_present = 0;
            $total_absent = 0;
            $total_weekoff = 0;
            $total_holidays = 0;
            $total_leave = 0;
            $total_halfday = 0;
            $total_OD = 0;
            $total_LC = 0;
            $total_EG = 0;
            $total_lop = 0;


            //dd($singleUser);

            $arrayReport = array($singleUser->user_code, $singleUser->name, $singleUser->designation, $singleUser->doj);




            $firstDateStr = $start_date;
            $lastAttendanceDate = Carbon::parse($end_date);
            $totalDays =  $lastAttendanceDate->diffInDays(Carbon::parse($firstDateStr));
            $deviceData = [];
            for ($i = 0; $i < ($totalDays); $i++) {
                // code...

                $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');


                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                //dd($dateString);


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
            for ($i = 0; $i <= $totalDays; $i++) {
                $fulldate = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                $date = Carbon::parse($firstDateStr)->addDay($i)->format('d');

                $date_day = $date . ' - ' . Carbon::parse($fulldate)->format('l');
                array_push($heading_dates, $date_day);

                $attendanceResponseArray[$fulldate] = array(
                    //"user_id"=>$request->user_id,
                    "user_id" => $singleUser->id, "DOJ" => $singleUser->doj, "isAbsent" => false, "isLeave" => false,
                    "is_weekoff" => false, "isLC" => null, "isEG" => null, "date" => $fulldate, "is_holiday" => false,
                    "attendance_mode_checkin" => null, "attendance_mode_checkout" => null, "absent_status" => null,
                    "checkin_time" => null, "checkout_time" => null, "leave_type" => null, "half_day_status" => null, "half_day_type" => null
                );

                //echo "Date is ".$fulldate."\n";
                ///$month_array[""]
            }
            array_push($heading_dates, "Total Weekoff", "Total Holiday", "Total Present", "Total Absent", "Total Late LOP", "Total Leave", "Total Halfday", "Total On Duty");
            $attendance_setting_details = $this->attendanceSettingsinfos(null);

            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($heading_dates, 'Total LC');
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($heading_dates, 'Total EG');
            }
            array_push($heading_dates, "Total Payable Days");





            // merging result from both table
            //dd($attendance_WebMobile->toArray());
            //dd($deviceData);
            $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());

            $dateCollectionObj    =  collect($merged_attendanceData);
            $sortedCollection   =   $dateCollectionObj->sortBy([
                ['date', 'asc'],
            ]);
            $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
            //dd($merged_attendanceData);
            //dd($dateWiseData);
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

            // dd($attendanceResponseArray );
            foreach ($attendanceResponseArray as $key => $value) {

                //get Shift Time for day

                $shift_settings = $this->getShiftTimeForEmployee($singleUser->id, $value['checkin_time'], $value['checkout_time']);
                $shiftStartTime  = Carbon::parse($shift_settings->shift_start_time);
                $shiftEndTime  = Carbon::parse($shift_settings->shift_end_time);
                $weekOffDays =  $shift_settings->week_off_days;

                if ($attendanceResponseArray[$key]['checkin_time'] != null && $attendanceResponseArray[$key]['checkout_time'] != null && $attendanceResponseArray[$key]['checkout_time'] == $attendanceResponseArray[$key]['checkin_time']) {
                    $attendance_time = $this->findMIPOrMOP($attendanceResponseArray[$key]['checkin_time'], $shiftStartTime, $shiftEndTime);

                    $attendanceResponseArray[$key]['checkin_time'] = $attendance_time['checkin_time'];
                    $attendanceResponseArray[$key]['checkout_time'] = $attendance_time['checkout_time'];
                }



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
            }

            array_push($arrayReport, $total_weekoff, $total_holidays, $total_present, $total_absent, $total_lop, $total_leave, $total_halfday, $total_OD,);
            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($arrayReport, $total_LC);
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($arrayReport, $total_EG);
            }
            $total_payable_days = ($total_weekoff + $total_holidays + $total_present + $total_leave + $total_halfday + $total_OD) - $total_lop;
            array_push($arrayReport,  $total_payable_days);
            array_push($reportresponse, $arrayReport);
            unset($arrayReport);
        }

        $data = array($heading_dates, $reportresponse);
        return $data;
    }

    public function shiftTimeForEmployee($start_date, $end_date, $client_domain)
    {
        ini_set('max_execution_time', 3000);
        //dd($month);
        $reportresponse = array();
        $user = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('is_ssa', '0')
            ->where('active', '1')
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
            $total_LC = 0;
            $total_EG = 0;
            $total_lop = 0;

            $arrayReport = array($singleUser->user_code, $singleUser->name, $singleUser->designation, $singleUser->doj);

            $firstDateStr = $start_date;
            $lastAttendanceDate = Carbon::parse($end_date);
            $totalDays =  $lastAttendanceDate->diffInDays(Carbon::parse($firstDateStr));
            $deviceData = [];
            for ($i = 0; $i < ($totalDays); $i++) {
                // code...

                $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');


                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                //dd($dateString);


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

            // dd($attendance_WebMobile);


            $attendanceResponseArray = [];

            //Create empty month array with all dates.
            // $month = $request->month;


            //$days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);
            //dd($totalDays );
            //For Excel Sheet Headers
            $heading_dates = array("Emp Code", "Name", "Designation", "DOJ");
            for ($i = 0; $i <= $totalDays; $i++) {
                $fulldate = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                $date = Carbon::parse($firstDateStr)->addDay($i)->format('d');

                $date_day = $date . ' - ' . Carbon::parse($fulldate)->format('l');
                array_push($heading_dates, $date_day);

                $attendanceResponseArray[$fulldate] = array(
                    //"user_id"=>$request->user_id,
                    "user_id" => $singleUser->id, "DOJ" => $singleUser->doj, "isAbsent" => false, "isLeave" => false,
                    "is_weekoff" => false, "isLC" => null, "isEG" => null, "date" => $fulldate, "is_holiday" => false,
                    "attendance_mode_checkin" => null, "attendance_mode_checkout" => null, "absent_status" => null,
                    "checkin_time" => null, "checkout_time" => null, "leave_type" => null, "half_day_status" => null, "half_day_type" => null
                );

                //echo "Date is ".$fulldate."\n";
                ///$month_array[""]
            }

            // dd($attendanceResponseArray);

            array_push($heading_dates, "Total Weekoff", "Total Holiday", "Total Present", "Total Absent", "Total Late LOP", "Total Leave", "Total Halfday", "Total On Duty");

            $attendance_setting_details = $this->attendanceSettingsinfos(null);

            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($heading_dates, 'Total LC');
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($heading_dates, 'Total EG');
            }
            array_push($heading_dates, "Total Payable Days");





            // merging result from both table
            //dd($attendance_WebMobile->toArray());
            //dd($deviceData);
            $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());

            $dateCollectionObj    =  collect($merged_attendanceData);
            $sortedCollection   =   $dateCollectionObj->sortBy([
                ['date', 'asc'],
            ]);

            $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
            //dd($merged_attendanceData);
            //dd($dateWiseData);
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

            // dd($attendanceResponseArray );
            foreach ($attendanceResponseArray as $key => $value) {

                //get Shift Time for day

                $shift_settings = $this->getShiftTimeForEmployee($singleUser->id, $value['checkin_time'], $value['checkout_time']);
                $shiftStartTime  = Carbon::parse($shift_settings->shift_start_time);
                $shiftEndTime  = Carbon::parse($shift_settings->shift_end_time);
                $weekOffDays =  $shift_settings->week_off_days;


                if ($attendanceResponseArray[$key]['checkin_time'] != null && $attendanceResponseArray[$key]['checkout_time'] != null && $attendanceResponseArray[$key]['checkout_time'] == $attendanceResponseArray[$key]['checkin_time']) {
                    $attendance_time = $this->findMIPOrMOP($attendanceResponseArray[$key]['checkin_time'], $shiftStartTime, $shiftEndTime);

                    $attendanceResponseArray[$key]['checkin_time'] = $attendance_time['checkin_time'];
                    $attendanceResponseArray[$key]['checkout_time'] = $attendance_time['checkout_time'];
                }



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


            foreach ($attendanceResponseArray as $key => $value) {
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
            }

            array_push($arrayReport, $total_weekoff, $total_holidays, $total_present, $total_absent, $total_lop, $total_leave, $total_halfday, $total_OD,);
            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($arrayReport, $total_LC);
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($arrayReport, $total_EG);
            }
            $total_payable_days = ($total_weekoff + $total_holidays + $total_present + $total_leave + $total_halfday + $total_OD) - $total_lop;
            array_push($arrayReport,  $total_payable_days);
            array_push($reportresponse, $arrayReport);
            unset($arrayReport);
        }


        $data = array($heading_dates, $reportresponse);
        return $data;
    }

    public function detailedAttendanceReport($start_date, $end_date)
    {
        // dd('testing');
        ini_set('max_execution_time', 3000);
        //dd($month);
        $reportresponse = array();
        $user = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('is_ssa', '0')
            ->where('active', '1')
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
    public function fetch_attendance_data($start_date, $end_date)
    {
        ini_set('max_execution_time', 3000);
        $reportresponse = array();
        $user = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('is_ssa', '0')
            ->where('active', '1')
            ->where('vmt_employee_details.doj', '<', Carbon::parse($end_date));

        if (sessionGetSelectedClientid() != 1) {
            $user = $user->where('client_id', sessionGetSelectedClientid());
        }
        $user =  $user->get(['users.id', 'users.user_code', 'users.name', 'vmt_employee_office_details.designation', 'vmt_employee_details.doj']);
        $holidays = vmtHolidays::whereBetween('holiday_date', [$start_date, $end_date])->pluck('holiday_date');
        foreach ($user as $singleUser) {

            $firstDateStr = $start_date;
            $lastAttendanceDate = Carbon::parse($end_date);
            $totalDays =  $lastAttendanceDate->diffInDays(Carbon::parse($firstDateStr));
            $deviceData = [];

            for ($i = 0; $i < ($totalDays); $i++) {
                // code...

                $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');


                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                //dd($dateString);


                if (
                    sessionGetSelectedClientCode() == "DM" || sessionGetSelectedClientCode() == 'VASA' || sessionGetSelectedClientCode() == 'LAL'
                    || sessionGetSelectedClientCode() == 'PSC' || sessionGetSelectedClientCode() ==  'IMA' || sessionGetSelectedClientCode() ==  'PA' || sessionGetSelectedClientCode() ==  'DMC' || sessionGetSelectedClientCode() ==  'ABS'
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


            for ($i = 0; $i <= $totalDays; $i++) {
                $fulldate = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                $date = Carbon::parse($firstDateStr)->addDay($i)->format('d');

                $date_day = $date . ' - ' . Carbon::parse($fulldate)->format('l');
                array_push($heading_dates, $date_day);

                $attendanceResponseArray[$fulldate] = array(
                    //"user_id"=>$request->user_id,
                    "user_id" => $singleUser->id, "user_code" => $singleUser->user_code, "name" => $singleUser->name,
                    "DOJ" => $singleUser->doj, "isAbsent" => false, "isLeave" => false, "is_weekoff" => false, "isLC" => null, "isEG" => null, "date" => $fulldate, "is_holiday" => false, "attendance_mode_checkin" => null, "attendance_mode_checkout" => null, "absent_status" => null, "checkin_time" => null, "checkout_time" => null, "leave_type" => null, "half_day_status" => null, "half_day_type" => null, 'date_day' => $date_day, 'work_shift_id' => null, 'isMIP' => null, 'isMOP' => null, 'reged_checkin_time' => null,
                    'reged_checkout_time' => null, 'permission_id' => null, 'checkinRegId' => null, 'checkoutRegId' => null,
                );

                //echo "Date is ".$fulldate."\n";
                ///$month_array[""]
            }
            array_push($heading_dates, "Total Weekoff", "Total Holiday", "Total Present", "Total Absent", "Total Late LOP", "Total Leave", "Total Halfday", "Total On Duty");
            $attendance_setting_details =  $this->attendanceSettingsinfos(null);

            if ($attendance_setting_details['lc_status'] == 1) {
                array_push($heading_dates, 'Total LC');
            }
            if ($attendance_setting_details['eg_status'] == 1) {
                array_push($heading_dates, 'Total EG');
            }
            array_push($heading_dates, "Total Payable Days");





            // merging result from both table
            //dd($attendance_WebMobile->toArray());
            //dd($deviceData);
            $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());

            $dateCollectionObj    =  collect($merged_attendanceData);
            $sortedCollection   =   $dateCollectionObj->sortBy([
                ['date', 'asc'],
            ]);
            $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
            //dd($merged_attendanceData);
            //dd($dateWiseData);
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

            foreach ($attendanceResponseArray as $key => $value) {

                //get Shift Time for day

                $shift_settings =  $this->getShiftTimeForEmployee($singleUser->id, $value['checkin_time'], $value['checkout_time']);
                $shiftStartTime  = Carbon::parse($shift_settings->shift_start_time);
                $shiftEndTime  = Carbon::parse($shift_settings->shift_end_time);
                $weekOffDays =  $shift_settings->week_off_days;
                $attendanceResponseArray[$key]['work_shift_id'] =  $shift_settings->id;

                if ($attendanceResponseArray[$key]['checkin_time'] != null && $attendanceResponseArray[$key]['checkout_time'] != null && $attendanceResponseArray[$key]['checkout_time'] == $attendanceResponseArray[$key]['checkin_time']) {
                    $attendance_time = $this->findMIPOrMOP($attendanceResponseArray[$key]['checkin_time'], $shiftStartTime, $shiftEndTime);

                    $attendanceResponseArray[$key]['checkin_time'] = $attendance_time['checkin_time'];
                    $attendanceResponseArray[$key]['checkout_time'] = $attendance_time['checkout_time'];
                }




                //Logic For Check week off or not
                //    dd( $attendanceResponseArray);
                if (!array_key_exists('date', $attendanceResponseArray[$key]))
                    dd("Missing for : " . $key);

                // if (
                //     Carbon::parse($attendanceResponseArray[$key]['date'])->format('l') == "Sunday"
                //     && $attendanceResponseArray[$key]['checkin_time'] == null &&
                //     $attendanceResponseArray[$key]["checkout_time"] == null
                // ) {
                //     $attendanceResponseArray[$key]['is_weekoff'] = true;
                // }
                $attendanceResponseArray[$key]['is_weekoff'] =   $this->checkWeekOffStatus($attendanceResponseArray[$key]['date'], $weekOffDays, $attendanceResponseArray[$key]['checkin_time'], $attendanceResponseArray[$key]["checkout_time"]);

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
                    if ($leave_Details->count() == 0) {
                        $attendanceResponseArray[$key]['isAbsent'] = true;
                    } else {
                        foreach ($leave_Details as $single_leave_details) {
                            $startDate = Carbon::parse($single_leave_details->start_date)->subDays(1);
                            $endDate = Carbon::parse($single_leave_details->end_date);
                            $currentDate =  Carbon::parse($attendanceResponseArray[$key]['date']);
                            //   dd($startDate.'-----'.$currentDate.'-----');
                            if ($currentDate->gt($startDate) || $currentDate->lte($endDate)) {
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
                                        $attendanceResponseArray[$key]['permission_id'] = $single_leave_details->id;
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
                        $regularization_status =  $this->RegularizationRequestStatus($user_id, $date, 'LC');
                        $attendanceResponseArray[$key]["isLC"] = $regularization_status['sts'];
                        $attendanceResponseArray[$key]["checkinRegId"] = $regularization_status['id'];
                        $attendanceResponseArray[$key]["reged_checkin_time"] = $regularization_status['time'];
                    }
                } else if (empty($checkin_time) && !empty($checkout_time)) {
                    $user_id = $attendanceResponseArray[$key]['user_id'];
                    $date = $attendanceResponseArray[$key]['date'];
                    $regularization_status =  $this->RegularizationRequestStatus($user_id, $date, 'MIP');
                    $attendanceResponseArray[$key]["isMIP"] = $regularization_status['sts'];
                    $attendanceResponseArray[$key]["checkinRegId"] = $regularization_status['id'];
                    $attendanceResponseArray[$key]["reged_checkin_time"] = $regularization_status['time'];
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
                        $regularization_status =   $this->RegularizationRequestStatus($user_id, $date, 'EG');
                        $attendanceResponseArray[$key]["isEG"] = $regularization_status['sts'];
                        $attendanceResponseArray[$key]["checkoutRegId"] = $regularization_status['id'];
                        $attendanceResponseArray[$key]["reged_checkout_time"] = $regularization_status['time'];
                    } else if (!empty($checkin_time) && empty($checkout_time)) {
                        $user_id = $attendanceResponseArray[$key]['user_id'];
                        $date = $attendanceResponseArray[$key]['date'];
                        $regularization_status =   $this->RegularizationRequestStatus($user_id, $date, 'MOP');
                        $attendanceResponseArray[$key]["isMOP"] = $regularization_status['sts'];
                        $attendanceResponseArray[$key]["checkoutRegId"] = $regularization_status['id'];
                        $attendanceResponseArray[$key]["reged_checkout_time"] = $regularization_status['time'];
                    } else {
                        //employee left late....
                    }
                }
            }
            array_push($reportresponse, $attendanceResponseArray);
            unset($attendanceResponseArray);
        }

        return  $reportresponse;
    }

    public function fetchAbsentReportData($start_date, $end_date)
    {
        ini_set('max_execution_time', 3000);
        $response = array();
        $absent_data = array();
        $temp_ar = array();
        $attendance_data = $this->fetch_attendance_data($start_date, $end_date);
        foreach ($attendance_data as $single_data) {
            foreach ($single_data as $key => $value) {
                if ($value['isAbsent'] == true && $value['isLeave'] == false  && $value['is_weekoff'] == false) {
                    $temp_ar['Employee Code'] = $value['user_code'];
                    $temp_ar['Employee Name'] = $value['name'];
                    $temp_ar['Date'] = Carbon::parse($value['date'])->format('d-M-Y');
                    $temp_ar['Shift Name'] = VmtWorkShifts::where('id', $value['work_shift_id'])->first()->shift_name;
                    $temp_ar['In Punch'] = $value['checkin_time'];
                    $temp_ar['Out Punch'] = $value['checkout_time'];
                    $temp_ar['Status'] = 'Absent';
                    $temp_ar['Day Status'] = 'Full day Absent';
                    array_push($absent_data, $temp_ar);
                    unset($temp_ar);
                } else if ($value['isAbsent'] == false && $value['is_weekoff'] == false && $value['isLeave'] == false) {
                    $current_shift =  VmtWorkShifts::where('id', $value['work_shift_id'])->first();
                    if ($value['isLC'] == 'Approved' ||  $value['isMIP'] == 'Approved') {
                        $temp_ar['in_punch'] = $value['reged_checkin_time'];
                    } else {
                        $value['checkin_time'] = $value['checkin_time'];
                    }

                    if ($value['isEG'] == 'Approved' ||  $value['isMOP'] == 'Approved') {
                        $temp_ar['out_punch'] = $value['reged_checkout_time'];
                    } else {
                        $value['checkout_time'] = $value['checkout_time'];
                    }
                    if (Carbon::parse($value['checkin_time'])->diffInMinutes(Carbon::parse($value['checkout_time'])) < $current_shift->fullday_min_workhrs) {
                        $temp_ar['Employee Code'] = $value['user_code'];
                        $temp_ar['Employee Name'] = $value['name'];
                        $temp_ar['Date'] = Carbon::parse($value['date'])->format('d-M-Y');
                        $temp_ar['Shift Name'] = $current_shift->shift_name;
                        $temp_ar['In Punch'] = $value['checkin_time'];
                        $temp_ar['Out Punch'] = $value['checkout_time'];
                        if (Carbon::parse($temp_ar['In Punch'])->diffInMinutes(Carbon::parse($temp_ar['Out Punch'])) < $current_shift->halfday_min_workhrs) {
                            $temp_ar['Status'] = 'Absent';
                            $temp_ar['Day Status'] = 'Full day Absent';
                        } else {
                            $temp_ar['Status'] = 'Half Day';
                            $temp_ar['Day Status'] = 'Half Day Absent';
                        }
                        array_push($absent_data, $temp_ar);
                        unset($temp_ar);
                    }
                }
                // dd($response);
            }
        }
        $response['headers'] = array('Employee Code', 'Employee Name', 'Date', 'Shift Name', 'In Punch', 'Out Punch', 'Status', 'Day Status');
        $response['rows'] = $absent_data;
        return $response;
    }

    public function fetchHalfDayReportData($start_date, $end_date)
    {
        ini_set('max_execution_time', 3000);
        $response = array();
        $halfday_data = array();
        $temp_ar = array();
        $attendance_data = $this->fetch_attendance_data($start_date, $end_date);
        // dd( $attendance_data);
        foreach ($attendance_data as $single_data) {
            foreach ($single_data as $key => $value) {
                if ($value['isAbsent'] == false && $value['is_weekoff'] == false && $value['isLeave'] == false) {
                    $current_shift =  VmtWorkShifts::where('id', $value['work_shift_id'])->first();
                    if ($value['isLC'] == 'Approved' ||  $value['isMIP'] == 'Approved') {
                        $value['checkin_time'] = $value['reged_checkin_time'];
                    } else {
                        $value['checkin_time'] = $value['checkin_time'];
                    }

                    if ($value['isEG'] == 'Approved' ||  $value['isMOP'] == 'Approved') {
                        $value['checkout_time'] = $value['reged_checkout_time'];
                    } else {
                        $value['checkout_time'] = $value['checkout_time'];
                    }
                    if (Carbon::parse($value['checkin_time'])->diffInMinutes(Carbon::parse($value['checkout_time'])) < $current_shift->fullday_min_workhrs) {
                        $temp_ar['Employee Code'] = $value['user_code'];
                        $temp_ar['Employee Name'] = $value['name'];
                        $temp_ar['Date'] = Carbon::parse($value['date'])->format('d-M-Y');
                        $temp_ar['Shift Name'] = $current_shift->shift_name;
                        $temp_ar['In Punch'] = $value['checkin_time'];
                        $temp_ar['Out Punch'] = $value['checkout_time'];
                        $temp_ar['Status'] = 'Half Day';
                        $temp_ar['Day Status'] = 'Half Day Absent';

                        array_push($halfday_data, $temp_ar);
                        unset($temp_ar);
                    }
                }
            }
        }

        $response['headers'] = array('Employee Code', 'Employee Name', 'Date', 'Shift Name', 'In Punch', 'Out Punch', 'Status', 'Day Status');
        $response['rows'] = $halfday_data;
        return $response;
    }

    public function fetchLCReportData($start_date, $end_date)
    {
        ini_set('max_execution_time', 3000);
        $attendance_data = $this->fetch_attendance_data($start_date, $end_date);
        $lcData = array();
        $response = array();
        $temp_ar = array();
        foreach ($attendance_data as $single_data) {
            foreach ($single_data as $key => $value) {
                if ($value['isMIP'] != null || $value['isLC'] != null) {
                    $temp_ar['Employee Code'] = $value['user_code'];
                    $temp_ar['Employee Name'] = $value['name'];
                    $temp_ar['Date'] = $value['date_day'];
                    $current_shift = VmtWorkShifts::where('id', $value['work_shift_id'])->first();
                    $temp_ar['Shift Name'] =   $current_shift->shift_name;
                    $regularized_sts = 'No';
                    $reason = "-";
                    $approved_by = "-";
                    $approved_on = "-";
                    $approved_cmts = "-";
                    if ($value['checkinRegId'] != null) {
                        $in_punch = $value['reged_checkin_time'];
                    } else {
                        $in_punch = $value['checkin_time'];
                    }
                    $out_punch = $value['checkout_time'];
                    if ($in_punch  != null) {
                        $lc1_total_mins = Carbon::parse($current_shift->shift_start_time)->diffInMinutes(Carbon::parse($in_punch)) . ' Mins';
                        $lc_ar = CarbonInterval::minutes($lc1_total_mins)->cascade();
                        $lc_hrs = (int) $lc_ar->totalHours;
                        $lc_mins = $lc_ar->toArray()['minutes'];
                        $lc1_total_mins =    $lc_hrs . ' Hrs : ' .  $lc_mins . ' Minutes';
                    } else {
                        $LCDuration  = '-';
                    }
                    if (Carbon::parse($in_punch)->diffInMinutes(Carbon::parse($out_punch)) <  $current_shift->fullday_min_workhrs) {
                        $day_sts = 'Half Day';
                    } else {
                        $day_sts = 'Full Day';
                    }
                    if (($value['isMIP'] != 'Not Applied' && $value['isMIP'] != null) || ($value['isLC'] != 'Not Applied' && $value['isLC'] != null)) {
                        $regularized_record = VmtEmployeeAttendanceRegularization::where('id', $value['checkinRegId'])->first();
                        $regularized_sts = 'Yes';
                        if ($regularized_record->reason_type != null) {
                            if ($regularized_record->reason_type == 'Others') {
                                $reason = $regularized_record->custom_reason;
                            } else {
                                $reason =  $regularized_record->reason_type;
                            }
                        } else {
                            $reason = '-';
                        }


                        if (empty(User::where('id',  $regularized_record->reviewer_id)->first())) {
                            $approved_by = '-';
                        } else {
                            $approved_by = User::where('id',  $regularized_record->reviewer_id)->first()->name;
                        }

                        if ($regularized_record->reviewer_reviewed_date != null) {
                            $approved_on = Carbon::parse($regularized_record->reviewer_reviewed_date)->format('d-M-Y');
                        }
                        if ($regularized_record->reviewer_comments != null) {
                            $approved_cmts =  $regularized_record->reviewer_comments;
                        }
                    }
                    $temp_ar['In Punch'] =  $in_punch;
                    $temp_ar['Out Punch'] = $out_punch;
                    $temp_ar['Late Coming Duration'] = $lc1_total_mins;
                    $temp_ar['Day Status'] = $day_sts;
                    $temp_ar['Regularise Status'] = $regularized_sts;
                    $temp_ar['Employee Reason For Late Coming'] = $reason;
                    $temp_ar['Approved By'] = $approved_by;
                    $temp_ar['Approved On'] = $approved_on;
                    $temp_ar['Approver Comments'] = $approved_cmts;
                    array_push($lcData, $temp_ar);
                    unset($temp_ar);
                }
            }
        }
        $response['headers'] = array(
            'Employee Code', 'Employee Name', 'Date', 'Shift Name', 'In Punch', 'Out Punch', 'Late Coming Duration',
            'Employee Reason For Late Coming', 'Approved By', 'Approved On', 'Approver Comments'
        );
        $response['rows'] = $lcData;
        return $response;
    }
    public function fetchEGReportData($start_date, $end_date)
    {
        ini_set('max_execution_time', 3000);
        $attendance_data = $this->fetch_attendance_data($start_date, $end_date);
        $ecData = array();
        $response = array();
        $temp_ar = array();
        foreach ($attendance_data as $single_data) {
            foreach ($single_data as $key => $value) {
                if ($value['isMOP'] != null || $value['isEG'] != null) {
                    $temp_ar['Employee Code'] = $value['user_code'];
                    $temp_ar['Employee Name'] = $value['name'];
                    $temp_ar['Date'] = $value['date_day'];
                    $current_shift = VmtWorkShifts::where('id', $value['work_shift_id'])->first();
                    $temp_ar['Shift Name'] =   $current_shift->shift_name;
                    $regularized_sts = 'No';
                    $reason = "-";
                    $approved_by = "-";
                    $approved_on = "-";
                    $approved_cmts = "-";
                    $in_punch = $value['checkin_time'];
                    if ($value['checkoutRegId'] != null) {
                        $out_punch = $value['reged_checkout_time'];
                    } else {
                        $out_punch = $value['checkout_time'];
                    }

                    if ($out_punch   != null) {
                        // $EGDuration = Carbon::parse($out_punch)->diffInMinutes(Carbon::parse($current_shift->shift_end_time)) . ' Mins';
                        $eg1_total_mins = Carbon::parse($out_punch)->diffInMinutes(Carbon::parse($current_shift->shift_end_time)) . 'Mins';
                        $eg_ar = CarbonInterval::minutes($eg1_total_mins)->cascade();
                        $eg_hrs = (int) $eg_ar->totalHours;
                        $eg_mins = $eg_ar->toArray()['minutes'];
                        $eg_duration =    $eg_hrs . ' Hrs : ' .  $eg_mins . ' Minutes';

                        //  dd( $eg_hrs);
                    } else {
                        $EGDuration  = '-';
                    }
                    if (Carbon::parse($in_punch)->diffInMinutes(Carbon::parse($out_punch)) <  $current_shift->fullday_min_workhrs) {
                        $day_sts = 'Half Day';
                    } else {
                        $day_sts = 'Full Day';
                    }
                    if (($value['isMOP'] != 'Not Applied' && $value['isMOP'] != null) || ($value['isEG'] != 'Not Applied' && $value['isEG'] != null)) {
                        $regularized_record = VmtEmployeeAttendanceRegularization::where('id', $value['checkoutRegId'])->first();
                        $regularized_sts = 'Yes';
                        if ($regularized_record->reason_type != null) {
                            if ($regularized_record->reason_type == 'Others') {
                                $reason = $regularized_record->custom_reason;
                            } else {
                                $reason =  $regularized_record->reason_type;
                            }
                        } else {
                            $reason = '-';
                        }

                        $approved_by = User::where('id',  $regularized_record->reviewer_id)->first()->name;
                        if ($regularized_record->reviewer_reviewed_date != null) {
                            $approved_on = Carbon::parse($regularized_record->reviewer_reviewed_date)->format('d-M-Y');
                        }
                        if ($regularized_record->reviewer_comments != null) {
                            $approved_cmts =  $regularized_record->reviewer_comments;
                        }
                    }
                    $temp_ar['In Punch'] =  $in_punch;
                    $temp_ar['Out Punch'] = $out_punch;
                    $temp_ar['Early Going Duration'] =   $eg_duration;
                    $temp_ar['Day Status'] = $day_sts;
                    $temp_ar['Regularise Status'] = $regularized_sts;
                    $temp_ar['Employee Reason For Late Coming'] = $reason;
                    $temp_ar['Approved By'] = $approved_by;
                    $temp_ar['Approved On'] = $approved_on;
                    $temp_ar['Approver Comments'] = $approved_cmts;
                    array_push($ecData, $temp_ar);
                    unset($temp_ar);
                }
            }
        }
        $response['headers'] = array(
            'Employee Code', 'Employee Name', 'Date', 'Shift Name', 'In Punch', 'Out Punch', 'Early Going Duration',
            'Employee Reason For Late Coming', 'Approved By', 'Approved On', 'Approver Comments'
        );
        $response['rows'] =  $ecData;
        return $response;
    }
    public function fetchMIPReportData($date)
    {
        try {
            $client_id = sessionGetSelectedClientid();

            $user_data = User::where('client_id', $client_id)->get(["id", "name", "user_code", "client_id", "email"])->toarray();

            $dateString  = Carbon::parse($date)->format('Y-m-d');

            foreach ($user_data as $key => $single_user_data) {

                if (
                    sessionGetSelectedClientCode() == "DM" || sessionGetSelectedClientCode() == 'VASA' || sessionGetSelectedClientCode() == 'LAL'
                    || sessionGetSelectedClientCode() == 'PSC' || sessionGetSelectedClientCode() ==  'IMA' || sessionGetSelectedClientCode() ==  'PA' || sessionGetSelectedClientCode() ==  'DMC'
                ) {
                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('user_Id', $single_user_data['user_code'])
                        ->first(['check_out_time']);

                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('user_Id',  $single_user_data['user_code'])
                        ->first(['check_in_time']);
                } else {
                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'out')
                        ->where('user_Id', $single_user_data['user_code'])
                        ->first(['check_out_time']);

                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'in')
                        ->where('user_Id', $single_user_data['user_code'])
                        ->first(['check_in_time']);
                }
                //dd($attendanceCheckIn);

                $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];
                //    dd($deviceCheckOutTime.'-----------'.$deviceCheckInTime);

                // $leave_details =VmtEmployeeLeaves::where('user_id',$single_user_data['id'])->where('date',$dateString)->first();

                // $emp_work_shifts = VmtEmployeeWorkShifts::where("user_id",$single_user_data['id'])->first();
                // $work_shift =VmtWorkShifts::where('id',$emp_work_shifts->work_shift_id)->first();

                if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
                    $deviceData[] = array(
                        'date' => $dateString,
                        'user_code' => $single_user_data['user_code'],
                        'user_code' => $single_user_data['name'],
                        'checkin_time' => $deviceCheckInTime,
                        'checkout_time' => $deviceCheckOutTime,
                        'attendance_mode_checkin' => 'biometric',
                        'attendance_mode_checkout' => 'biometric'
                    );
                }
            }
            return $deviceData;
        } catch (\Exception $e) {
            return response()->json([
                'status' => "failure",
                'message' => "",
                'data' => $e->getmessage(),
            ]);
        }
    }

    public function fetchOvertimeReportData($start_date, $end_date)
    {
        ini_set('max_execution_time', 3000);
        $attendance_data = $this->fetch_attendance_data($start_date, $end_date);
        $otData = array();
        $response = array();
        $temp_ar = array();
        foreach ($attendance_data as $single_data) {
            foreach ($single_data as $key => $value) {
                if ($this->canCalculateOt($value['user_code'])) {
                    $current_shift = VmtWorkShifts::where('id', $value['work_shift_id'])->first();
                    $shiftStartTime = Carbon::parse($current_shift->shift_start_time);
                    $shiftEndTime = Carbon::parse($current_shift->shift_end_time);
                    if ($shiftStartTime->diffInMinutes($shiftEndTime) + 30 <= Carbon::parse($value['checkin_time'])->diffInMinutes(Carbon::parse($value['checkout_time'])) && $value['checkout_time'] != null) {
                        $shiftEndTime = Carbon::parse($value['checkin_time'])->addMinutes($current_shift->fullday_min_workhrs);
                        $ot =  $shiftEndTime->diffInMinutes(Carbon::parse($value['checkout_time']));
                        $ot_ar = CarbonInterval::minutes($ot)->cascade();
                        $ot_hrs = (int) $ot_ar->totalHours;
                        $ot_mins = $ot_ar->toArray()['minutes'];
                        if ($ot_hrs == 0) {
                            if ($ot_mins > 30) {
                                $total_ot =    $ot_hrs . ' Hrs:' .  $ot_mins . ' Minutes';
                                $temp_ar['Employee Code'] = $value['user_code'];
                                $temp_ar['Employee Name'] = $value['name'];
                                $temp_ar['Date'] = $value['date_day'];
                                $temp_ar['Shift Name'] =  $current_shift->shift_name;
                                $temp_ar['In Punch'] = $value['checkin_time'];
                                $temp_ar['Out Punch'] = $value['checkout_time'];
                                $temp_ar['OverTime Duration'] =   $total_ot;
                                array_push($otData,  $temp_ar);
                                unset($temp_ar);
                            } else {
                                break;
                            }
                        } else {
                            $total_ot =    $ot_hrs . ' Hrs:' .  $ot_mins . ' Minutes';
                            $temp_ar['Employee Code'] = $value['user_code'];
                            $temp_ar['Employee Name'] = $value['name'];
                            $temp_ar['Date'] = $value['date_day'];
                            $temp_ar['Shift Name'] =  $current_shift->shift_name;
                            $temp_ar['In Punch'] = $value['checkin_time'];
                            $temp_ar['Out Punch'] = $value['checkout_time'];
                            $temp_ar['OverTime Duration'] =   $total_ot;
                            array_push($otData,  $temp_ar);
                            unset($temp_ar);
                        }
                    }
                }
            }
        }

        $response['headers'] = array('Employee Code', 'Employee Name', 'Date', 'Shift Name', 'In Punch', 'Out Punch', 'OverTime Duration');
        $response['rows'] = $otData;
        return $response;
    }
    public function fetchSandwidchReportData($start_date, $end_date)
    {
        $attendance_data = $this->fetch_attendance_data($start_date, $end_date);
        $sandwitchData = array();
        $response = array();
        $temp_ar = array();
        foreach ($attendance_data as $single_data) {
            foreach ($single_data as $key => $value) {
                $current_shift = VmtWorkShifts::where('id', $value['work_shift_id'])->first();
                $shiftStartTime = Carbon::parse($current_shift->shift_start_time);
                $shiftEndTime = Carbon::parse($current_shift->shift_end_time);
                if ($shiftStartTime->diffInMinutes($shiftEndTime) + 30 <= Carbon::parse($value['checkin_time'])->diffInMinutes(Carbon::parse($value['checkout_time'])) && $value['checkout_time'] != null) {
                    $ot =  $shiftEndTime->diffInMinutes(Carbon::parse($value['checkout_time']));
                    $ot_ar = CarbonInterval::minutes($ot)->cascade();
                    $ot_hrs = (int) $ot_ar->totalHours;
                    $ot_mins = $ot_ar->toArray()['minutes'];
                    $total_ot =    $ot_hrs . ' Hrs:' .  $ot_mins . ' Minutes';
                    $temp_ar['Employee Code'] = $value['user_code'];
                    $temp_ar['Employee Name'] = $value['name'];
                    $temp_ar['Date'] = $value['date_day'];
                    $temp_ar['Shift Name'] =  $current_shift->shift_name;
                    $temp_ar['In Punch'] = $value['checkin_time'];
                    $temp_ar['Out Punch'] = $value['checkout_time'];
                    $temp_ar['OverTime Duration'] =   $total_ot;
                    array_push($otData,  $temp_ar);
                    unset($temp_ar);
                }
            }
        }
        $response['headers'] = array('Employee Code', 'Employee Name', 'Date', 'Shift Name', 'In Punch', 'Out Punch', 'OverTime Duration');
        $response['rows'] = $otData;
        return $response;
    }
    public function fetchInvestmentTaxReports()
    {
        $reportsdata = array();

        $client_id = "2";

        $payroll_month = "2023-06-01";

        $Employee_details = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->leftjoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
            ->where("users.active", "1")
            ->where("users.client_id", $client_id)
            ->get([
                'users.id as user_id',
                'users.user_code as Employee Code',
                'users.name as Employee Name',
                'vmt_employee_details.gender as Gender',
                'vmt_employee_details.pan_number as PAN Number',
                'vmt_employee_details.dob as Date Of Birth',
                'vmt_employee_details.doj as Date Of Joining',
                'vmt_employee_statutory_details.tax_regime as Tax Regime'
            ]);

     $employee_salary_details = array();

        foreach ($Employee_details as $key => $single_user) {

            $payroll_date = VmtPayroll::where('payroll_date',  $payroll_month)->where('client_id', $client_id)->first();

            if (!empty($payroll_date)) {

                $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $single_user['user_id'])->first();
            }

            $employee_projected_salary = AbsSalaryProjection::where('vmt_emp_payroll_id', $emp_payroll->id);

            if ($employee_projected_salary->exists()) {

                $employee_salary_details[$key]["Employee Code"] =$single_user['Employee Code'] ;
                $employee_salary_details[$key]["Employee Name"] =$single_user['Employee Name'] ;
                $employee_salary_details[$key]["Gender"] =$single_user['Gender'];
                $employee_salary_details[$key]["PAN Number"] =$single_user['PAN Number'];
                $employee_salary_details[$key]["Date Of Birth"] =$single_user['Date Of Birth'];
                $employee_salary_details[$key]["Date Of Joining"] =$single_user['Date Of Joining'];
                $employee_salary_details[$key]["Tax Regime"] =$single_user['Tax Regime'];
                $employee_salary_details[$key]["Basic"] =$employee_projected_salary->sum('earned_basic');
                $employee_salary_details[$key]["Basic Arrears"] =$employee_projected_salary->sum('basic_arrear');
                $employee_salary_details[$key]["Dearness Allowance"] =0;
                $employee_salary_details[$key]["Dearness Allowance Arrears"] =0;
                $employee_salary_details[$key]["Variable Dearness Allowance"] =0;
                $employee_salary_details[$key]["Vairable Dearness Allowance Arrears"] =0;
                $employee_salary_details[$key]["HRA"] =$employee_projected_salary->sum('earned_hra');
                $employee_salary_details[$key]["HRA Arrears"] =$employee_projected_salary->sum('hra_arrear');
                $employee_salary_details[$key]["Child Education Allowance"] =$employee_projected_salary->sum('earned_child_edu_allowance');
                $employee_salary_details[$key]["Child Education Allowance Arrears"] =$employee_projected_salary->sum('child_edu_allowance_arrear');
                $employee_salary_details[$key]["Statutory Bonus"] =$employee_projected_salary->sum('earned_stats_bonus');
                $employee_salary_details[$key]["Statutory Bonus Arrears"] =$employee_projected_salary->sum('earned_stats_arrear');
                $employee_salary_details[$key]["Medical Allowance"] =0;
                $employee_salary_details[$key]["Medical Allowance Arrears"] =0;
                $employee_salary_details[$key]["Communicaton Allowance"] =0;
                $employee_salary_details[$key]["Communication Allowance Arrears"] =0;
                $employee_salary_details[$key]["Leave Travel Allowance"] =0;
                $employee_salary_details[$key]["Leave Travel Allowance Arrears"] =0;
                $employee_salary_details[$key]["Food Allowance"] =0;
                $employee_salary_details[$key]["Food Allowance Arrear"] =0;
                $employee_salary_details[$key]["Special Allowance"] =$employee_projected_salary->sum('earned_spl_alw');
                $employee_salary_details[$key]["Special Allowance Arrears"] =$employee_projected_salary->sum('spl_alw_arrear');
                $employee_salary_details[$key]["Other Allowance"] =0;
                $employee_salary_details[$key]["Washing Allowance"] =0;
                $employee_salary_details[$key]["Washing Allowance Arrears"] =0;
                $employee_salary_details[$key]["Uniform Allowance"] =0;
                $employee_salary_details[$key]["Uniform Allowance Arrears"] =0;
                $employee_salary_details[$key]["Vehicle Reimbursement"] =0;
                $employee_salary_details[$key]["Vehicle Reimbursement Arrears"] =0;
                $employee_salary_details[$key]["Driver Salary Reimbursment"] =0;
                $employee_salary_details[$key]["Driver Salary Reimbursment Arrears"] =0;
                $employee_salary_details[$key]["Arrears"] =$employee_projected_salary->sum('basic_arrear','basic_arrear')+ 0 + 0 + $employee_projected_salary->sum('hra_arrear')+$employee_projected_salary->sum('hra_arrear') +
                                                            $employee_projected_salary->sum('child_edu_allowance_arrear') + $employee_projected_salary->sum('earned_stats_arrear') + 0
                                                            + 0 + 0 + 0 + $employee_projected_salary->sum('spl_alw_arrear') + 0 + 0 + 0 + 0 ;

                $employee_salary_details[$key]["Overtime"] =$employee_projected_salary->sum('overtime');
                $employee_salary_details[$key]["Overtime Arrears"] =0;
                $employee_salary_details[$key]["Incentive"] =0;
                $employee_salary_details[$key]["Other Earnings"] =$employee_projected_salary->sum('other_earnings');
                $employee_salary_details[$key]["Referral Bonus"] =0;
                $employee_salary_details[$key]["Annual Statutory Bonus"] =$employee_projected_salary->sum('earned_stats_bonus');
                $employee_salary_details[$key]["Ex-Gratia"] =0;
                $employee_salary_details[$key]["Attendance Bonus"] =0;
                $employee_salary_details[$key]["Leave Encashments"] =0;
                $employee_salary_details[$key]["Gift"] =0;
                $employee_salary_details[$key]["Annual Gross Salary"] =0;



            }

        }

        $salary_data['headers'] = array('Employee Code','Employee Name','Gender','PAN Number','Date Of Birth','Date Of Joining','Tax Regime','Basic','Basic Arrears',
        'Dearness Allowance','Dearness Allowance Arrears','Variable Dearness Allowance','Vairable Dearness Allowance Arrears','HRA','HRA Arrears','Child Education Allowance',
        'Child Education Allowance Arrears','Statutory Bonus','Statutory Bonus Arrears','Medical Allowance','Medical Allowance Arrears','Communicaton Allowance','Communication Allowance Arrears', 'Leave Travel Allowance',
        'Leave Travel Allowance Arrears','Food Allowance','Food Allowance Arrears','Special Allowance','Special Allowance Arrears','Other Allowance','Other Allowance Arrears',
        'Washing Allowance','Washing Allowance Arrears','Uniform Allowance','Uniform Allowance Arrears','Vehicle Reimbursement','Vehicle Reimbursement Arrears','Driver Salary Reimbursment',
        'Driver Salary Reimbursment Arrears','Arrears','Overtime','Overtime Arrears','Incentive','Other Earnings','Referral Bonus','Annual Statutory Bonus','Ex-Gratia','Attendance Bonus',
        // 'Daily Allowance','Leave Encashments','Gift','Annual Gross Salary','HRA - Exemptions','CEA - Exemptions','LTA Exemptions','Previous Employer Income','Previous Employer PT',
        // 'Previous Standard Deduction u/s 16(ia)','Gross Total Income','(a) Salary as per provisions contained in sec.17(1)','(b) Value of perquisites u/s 17(2)','(c) Profits in lieu of salary under section 17(3)',
        // '(d) Total','2. Less: Allowance to the extent exempt u/s 10','3. Balance (1-2)','(a) Standard Deduction u/s 16(ia)','(b) Entertainment allowance u/s 16(ii)','(c) Tax on employment u/s 16(iii)',
        // '5. Aggregate of 4(a), (b) and (c)', '6. Income chargeable under head salaries(3-5)','(a) Deductions u/s 24 - Interest','(b) Other Source Of Income','(c) 80EE Additional interest on House property','8. Gross total income (6+7)',
        // 'i) Provident Fund','(ii) Voluntary Provident Fund','(iii) National Savings Certificate','(iv) Children Tuition Fees','(v) Mutual Fund / ELSS / ULIP / SIP','(vi) Housing Loan Principal repayment',
        // '(vii) Life Insurance Premium','(viii) Sukanya Samriddhi Scheme','(ix) Others / Fixed Deposit (5 years) & Term Deposit','(x) NSC Accrued Interest / Approved Superannuation','(xi) Public Provident Fund',
        // '(xii) Life Insurance Pension Scheme (section 80CCC)','(xiii) Employee Contribution NPS (section 80CCD) (1)','(xiv) Employee Contribution NPS (section 80CCD) (2)','Section 80CCE Total','(a) 80D Mediclaim-Self', '(b) 80D Mediclaim -Parents','(c) 80DD Handicapped Dependents',
        // '(d) 80DDB Medical Expenses - Chronic Diseases','(e) 80E Interest on Loan taken for Higher Education','(f) 80U Permanent Physical disability','(g) 80G Donation','(h) 80GG Rent paid (HRA not received)', '(i) 80TTA Deduction of interest on savings account',
        // '(j) 80EEA interest on certain house property','(k) 80EEB Purchase of electric vehicle','10. Aggregate of deductible amount under Chapter VI-A','11.Total Income (8-10)','12.Tax on total income','13. Rebate u/s 87A (Taxable Income below Rs.5,00,000',
        // '14.Total Income Tax	15.Surcharge','16.Education Cess @4% (On Tax computed at (14 & 15)','17.Tax Payable (14+15+16)','18.Less: Relief under section 89','19.Tax Payable (17-18)','20.Tax Deducted Till Date', '21.Previous Employer TDS','22.Tax Due (19-20-21)','23.Tax Deduction Per Month'
         );
        $salary_data['rows'] = $employee_salary_details;
        array_push($reportsdata,$salary_data['headers'],$salary_data['rows']);

        return $reportsdata;
    }
}
