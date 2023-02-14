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
use App\Exports\BasicAttendanceExport;
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

    public function basicAttendanceReport(){

            //dd($request->all());
            $reportresponse=array();

            $user = User::where('is_ssa','0')->get(['id','user_code','name']);
            //dd($user);
            foreach($user as $singleUser){

                $total_present=0;
                $total_absent=0;
                $total_weekoff=0;

                //dd($singleUser->user_code);

                $arrayReport=array($singleUser->user_code,$singleUser->name);




                $regularTime  = VmtWorkShifts::where('shift_type', 'First Shift')->first();

                // $requestedDate = $request->year . '-' . $request->month . '-01';
                $requestedDate='2023-01-25';
                 $currentDate = Carbon::now();
                 $monthDateObj = Carbon::parse($requestedDate);
                 //dd($monthDateObj);
                 $startOfMonth = Carbon::parse($monthDateObj)->startOfMonth(); //->format('Y-m-d');
                 $endOfMonth   =  Carbon::parse($monthDateObj)->endOfMonth(); //->format('Y-m-d');
                // dd($endOfMonth);
                 if ($currentDate->lte($endOfMonth)) {
                     $lastAttendanceDate  = $currentDate; //->format('Y-m-d');
                 } else {
                     $lastAttendanceDate  = $endOfMonth; //->format('Y-m-d');
                 }
                //dd($lastAttendanceDate->format('d'));
                 $totalDays  = $lastAttendanceDate->format('d');
                 $firstDateStr  = $monthDateObj->startOfMonth()->toDateString();
             //dd($totalDays);
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
                             ->where('user_Id', $singleUser->user_code)
                             ->first(['check_out_time']);

                         $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                             ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                             ->whereDate('date', $dateString)
                             ->where('direction', 'in')
                             ->where('user_Id', $singleUser->user_code)
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

              //dd($deviceData);

                 // attendance details from vmt_employee_attenndance table
                 $attendance_WebMobile = VmtEmployeeAttendance::
                // where('user_id', $request->user_id)
                 where('user_id', $singleUser->id)
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
                // dd($days_count);
                 $heading_dates=array("Emp Code","Name");
                  for($i=1 ; $i <=$days_count ;$i++)
                  {
                    $date = "";

                    if($i<10)
                      $date = "0".$i;
                    else
                      $date = $i;

                    $fulldate = $year."-".$month."-".$date;
                   // dd($i.' '.substr(Carbon::parse($fulldate)->format('l'),0,1));
                  //  $date_day=$i.'  '.substr(Carbon::parse($fulldate)->format('l'),0,1);
                  $date_day=$i.' - '.Carbon::parse($fulldate)->format('l');
                    array_push($heading_dates, $date_day);

                    $attendanceResponseArray[$fulldate] = array(
                     //"user_id"=>$request->user_id,
                     "user_id"=> $singleUser->id,"isAbsent"=>false, "is_weekoff"=>false,"date"=>$fulldate,
                     "attendance_mode_checkin"=>null, "attendance_mode_checkout"=>null,
                     "absent_status"=>null,"checkin_time"=>null, "checkout_time"=>null,
                                                                 );

                    //echo "Date is ".$fulldate."\n";
                    ///$month_array[""]
                  }
                  array_push($heading_dates, "Total WO", "P", "A");



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
                // dd($attendanceResponseArray);
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


                //dd($attendanceResponseArray);
                //
                 foreach ($attendanceResponseArray as $key => $value) {
                         //Logic For Check week off or not
                       //  dd(($attendanceResponseArray[$key]));
                       if(!array_key_exists('date',$attendanceResponseArray[$key]) )
                         dd("Missing for : ".$key);

                     if(Carbon::parse($attendanceResponseArray[$key]['date'])->format('l')=="Sunday"){
                         $attendanceResponseArray[$key]['is_weekoff']=true;
                     }

                     //Logic For Check Absent or Not
                     if($attendanceResponseArray[$key]['checkin_time']==null&&
                       $attendanceResponseArray[$key]["checkout_time"]==null&&
                       $attendanceResponseArray[$key]['is_weekoff']==false){
                         $attendanceResponseArray[$key]['isAbsent']=true;
                         $total_absent++;
                     }

                 }




                 foreach ($attendanceResponseArray as $key => $value) {
                     if($attendanceResponseArray[$key]['is_weekoff']){
                         array_push($arrayReport,'WO');
                         $total_weekoff++;
                      }else if($attendanceResponseArray[$key]['isAbsent']){
                         array_push($arrayReport,'A');
                         $total_absent++;
                     }else{
                         array_push($arrayReport,'P');
                         $total_present++;
                     }

                 }

                 // dd($heading_dates);
                  //dd(($attendanceResponseArray));

               // dd();
                array_push($arrayReport,$total_weekoff,$total_present,$total_absent);
                array_push($reportresponse,$arrayReport);

               // dd( $arrayReport);
                unset($arrayReport);
            }

          // dd( $reportresponse);

            $ar1 = array(1,2,3);

            $ar2 = array(4,5,6);

            //dd($attendanceResponseArray);
            return Excel::download(new BasicAttendanceExport($attendanceResponseArray,$ar1,$ar2,$heading_dates,$reportresponse), 'Test.xlsx');
        }
    }

