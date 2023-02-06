<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtLeaves;
use App\Models\VmtGeneralInfo;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeAttendanceRegularization;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use App\Exports\EmployeeAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtEmployeeAttendanceController extends Controller
{
    public function generateAttendanceReports()
    {
        return Excel::download(new EmployeeAttendanceExport, 'Attendance.xlsx');

    }
    public function showAttendanceReport(){
        $attendance_details = VmtEmployeeAttendance::leftJoin('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
                ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','users.id')
                ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','users.id')
                ->select([
                       'users.user_code',
                       'users.name',
                       'vmt_employee_office_details.designation',
                       'vmt_employee_attendance.date',
                       'vmt_employee_attendance.checkin_time',
                       'vmt_employee_attendance.checkout_time',
                       'vmt_employee_attendance_regularizations.regularization_type',
                       'vmt_employee_attendance_regularizations.status',
                       ]
                 )//->where('vmt_employee_attendance.date','=','2022-'.'09-'.$i)
                 //->orderby('vmt_employee_attendance.date')
                 ->limit(3)
                 ->get();
        return view('attendance_reports', compact('attendance_details'));
    }

    public function basicArrendanceReport(){

            //dd($request->all());

           // $user = User::find($request->user_id);

            // $userCode = $user->user_code;
            $userCode=142;

            $regularTime  = VmtWorkShifts::where('shift_type', 'First Shift')->first();

           // $requestedDate = $request->year . '-' . $request->month . '-01';
           $requestedDate='2023-01-31';
            $currentDate = Carbon::now();
            $monthDateObj = Carbon::parse($requestedDate);
            $startOfMonth = $monthDateObj->startOfMonth(); //->format('Y-m-d');
            $endOfMonth   = $monthDateObj->endOfMonth(); //->format('Y-m-d');

            if ($currentDate->lte($endOfMonth)) {
                $lastAttendanceDate  = $currentDate; //->format('Y-m-d');
            } else {
                $lastAttendanceDate  = $endOfMonth; //->format('Y-m-d');
            }

            $totalDays  = $lastAttendanceDate->format('d');
            $firstDateStr  = $monthDateObj->startOfMonth()->toDateString();
        //dd($firstDateStr);
            // attendance details from vmt_staff_attenndance_device table
            $deviceData = [];
            for ($i = 0; $i < ($totalDays); $i++) {
                // code...

                $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');
               // dd($dayStr);
                if ($dayStr != 'Sunday') {

                    $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
                     //dd($dateString);

                    $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'out')
                        ->where('user_Id', 'BA005')
                        ->first(['check_out_time']);

                    $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                        ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                        ->whereDate('date', $dateString)
                        ->where('direction', 'in')
                        ->where('user_Id', 'BA005')
                        ->first(['check_in_time']);

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

            }

         // dd($deviceData);

            // attendance details from vmt_employee_attenndance table
            $attendance_WebMobile = VmtEmployeeAttendance::
            //where('user_id', $request->user_id)
                 where('user_id','142')
                //->whereMonth('date', $request->month)
                ->whereMonth('date','1')
                ->orderBy('checkin_time', 'asc')
                ->get(['date', 'checkin_time', 'checkout_time','attendance_mode_checkin','attendance_mode_checkout']);

            //dd($attendance_WebMobile);


            $attendanceResponseArray = [];

            //Create empty month array with all dates.
           // $month = $request->month;
            $month = 1;

            if($month < 10)
                $month = "0" . $month;

            //$year = $request->year;
            $year = 2023;
            $days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);

             for($i=1 ; $i <=$days_count ;$i++)
             {
               $date = "";

               if($i<10)
                 $date = "0".$i;
               else
                 $date = $i;

               $fulldate = $year."-".$month."-".$date;


               $attendanceResponseArray[$fulldate] = array(
                //"user_id"=>$request->user_id,
                "user_id"=>'142',
               "isAbsent"=>false, "attendance_mode_checkin"=>null, "attendance_mode_checkout"=>null,
                                                            "absent_status"=>null,"checkin_time"=>null, "checkout_time"=>null,"is_weekoff"=>null
                                                            );

               //echo "Date is ".$fulldate."\n";
               ///$month_array[""]
             }


            // merging result from both table
            //dd($attendance_WebMobile->toArray());
            $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());

            $dateCollectionObj    =  collect($merged_attendanceData);

            $sortedCollection   =   $dateCollectionObj->sortBy([
                ['date', 'asc'],
            ]);
            $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
            //dd($merged_attendanceData);
            //dd($dateWiseData);
            foreach ($dateWiseData  as $key => $value) {

               // dd($value[0]);

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


                foreach($value as $singleValue)
                {
                    //Find the min of checkin
                    //dd($singleValue);

                    if ($checkin_min == null) {
                        $checkin_min = $singleValue["checkin_time"];

                        $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                    }
                    else
                    if ($checkin_min > $singleValue["checkin_time"]) {
                        $checkin_min = $singleValue["checkin_time"];
                        $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                    }

                        //dd("Min value found : " . $singleValue["checkin_time"]);

                    //Find the max of checkin
                    if ($checkout_max == null) {
                        $checkout_max = $singleValue["checkout_time"];
                        $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
                    }
                    else
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



            ////Logic to check LC,EG,MIP,MOP,Leave status

            // $shiftStartTime  = Carbon::parse($regularTime->shift_start_time);
            // $shiftEndTime  = Carbon::parse($regularTime->shift_end_time);
            // //dd($regularTime);
            // foreach ($attendanceResponseArray as $key => $value) {

            //     $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
            //     $checkout_time = $attendanceResponseArray[$key]["checkout_time"];


            //     //LC Check
            //     if(!empty($checkin_time))
            //     {

            //         $parsedCheckIn_time  = Carbon::parse($checkin_time);

            //         //Check whether checkin done on-time
            //         $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

            //         if($isCheckin_done_ontime)
            //         {
            //             //employee came on time....

            //         }
            //         else
            //         {
            //             //employee came on time....
            //             //dd("Checkin NOT on-time");

            //             //then LC
            //             $attendanceResponseArray[$key]["isLC"] = true;

            //             //check whether regularization applied.
            //             $regularization_status = $this->isRegularizationRequestApplied($request->user_id, $key, 'LC');

            //             //check regularization status
            //             $attendanceResponseArray[$key]["lc_status"] = $regularization_status;

            //         }

            //     }


            //     //EG Check
            //     //check if its EG
            //     if(!empty($checkout_time))
            //     {

            //         $parsedCheckOut_time  = Carbon::parse($checkout_time);

            //         //Check whether checkin done on-time
            //         $isCheckOut_doneEarly = $parsedCheckOut_time->lte($shiftEndTime);

            //         if($isCheckOut_doneEarly)
            //         {
            //             //employee left early on time....

            //             //then EG
            //             $attendanceResponseArray[$key]["isEG"] = true;

            //             //check whether regularization applied.
            //             $regularization_status = $this->isRegularizationRequestApplied($request->user_id, $key, 'EG');

            //             //check regularization status
            //             $attendanceResponseArray[$key]["eg_status"] = $regularization_status;
            //         }
            //         else
            //         {
            //             //employee left late

            //         }

            //     }


            //     //for absent
            //     if($checkin_time == null && $checkout_time == null){
            //         $attendanceResponseArray[$key]["isAbsent"] = true;

            //         //Check whether leave is applied or not.
            //         $attendanceResponseArray[$key]["absent_status"] = $this->isLeaveRequestApplied($request->user_id, $key);

            //     }
            //     elseif($checkin_time != null && $checkout_time == null)
            //     {

            //         //Since its MOP
            //         $attendanceResponseArray[$key]["isMOP"] = true;

            //         ////Is any permission applied
            //         $attendanceResponseArray[$key]["mop_status"] = $this->isRegularizationRequestApplied($request->user_id, $key, 'MOP');

            //         if($attendanceResponseArray[$key]["mop_status"] == "Approved"){

            //             //If Approved, then set the regularize time as checkin time
            //             $attendanceResponseArray[$key]["checkout_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
            //                                          ->where('user_id',  $request->user_id)->where('regularization_type', 'MOP')->value('regularize_time');

            //           //  $attendanceResponseArray[$key]["checkin_time"] = ""
            //         }


            //     }
            //     elseif($checkin_time == null && $checkout_time != null){

            //         //Since its MIP
            //         $attendanceResponseArray[$key]["isMIP"] = true;

            //         ////Is any permission applied
            //         $attendanceResponseArray[$key]["mip_status"] = $this->isRegularizationRequestApplied($request->user_id, $key, 'MIP');

            //         if($attendanceResponseArray[$key]["mip_status"] == "Approved"){

            //             //If Approved, then set the regularize time as checkin time
            //             $attendanceResponseArray[$key]["checkin_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
            //                                          ->where('user_id',  $request->user_id)->where('regularization_type', 'MIP')->value('regularize_time');

            //           //  $attendanceResponseArray[$key]["checkin_time"] = ""
            //         }


            //     }

            // }//for each


            dd($attendanceResponseArray);
            return $attendanceResponseArray;
        }
    }

