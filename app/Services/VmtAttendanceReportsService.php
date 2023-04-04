<?php
namespace App\Services;
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
use App\Models\vmtHolidays;
use \Datetime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use App\Exports\DetailedAttendanceExport;
use App\Exports\BasicAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;





class VmtAttendanceReportsService{

    public function isRegularizationRequestApplied($user_id, $date,$regularizeType){
        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date',$date)
                           ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);
           if ($regularize_record->exists()) {
                 return $regularize_record->value('status');
           }else{
                return 'Not Applied';
            }
    }

    public function basicAttendanceReport($year,$month){
         //dd($month);
        $reportresponse=array();
        $user = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                      ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
                      ->where('is_ssa','0')
                      ->where('active','1')
                      ->where('vmt_employee_details.doj','<',Carbon::parse($year.'-'.$month.'-'.'01')->endOfMonth())
                      ->get(['users.id','users.user_code','users.name','vmt_employee_office_details.designation','vmt_employee_details.doj']);
       // print($user);exit;
        $holidays = vmtHolidays::whereMonth('holiday_date','=',$month)->pluck('holiday_date');
        foreach($user as $singleUser){

            $total_present=0;
            $total_absent=0;
            $total_weekoff=0;
            $total_holidays=0;
            $total_leave=0;
            $total_halfday=0;
            $total_OD=0;
            $total_LC=0;
            $total_EG=0;
            $total_lop=0;


            //dd($singleUser);

            $arrayReport=array($singleUser->user_code,$singleUser->name,$singleUser->designation,$singleUser->doj);




            $regularTime  = VmtWorkShifts::where('shift_type', 'First Shift')->first();

             $requestedDate = $year . '-' . $month . '-01';
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
                 ->whereMonth('date',$month)
                 ->orderBy('checkin_time', 'asc')
                 ->get(['date', 'checkin_time', 'checkout_time','attendance_mode_checkin','attendance_mode_checkout']);

             //dd($attendance_WebMobile);


             $attendanceResponseArray = [];

             //Create empty month array with all dates.
            // $month = $request->month;


             //$days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);
             //dd($totalDays );
             //For Excel Sheet Headers
             $heading_dates=array("Emp Code","Name","Designation","DOJ");
              for($i=1 ; $i <=$totalDays ;$i++)
              {
                $date = "";

                if($i<10)
                  $date = "0".$i;
                else
                  $date = $i;

                $fulldate = $year."-".$month."-".$date;
               // dd($i.' '.substr(Carbon::parse($fulldate)->format('l'),0,1));
              //  $date_day=$i.'  '.substr(Carbon::parse($fulldate)->format('l'),0,1);
              $date_day=$date.' - '.Carbon::parse($fulldate)->format('l');
                array_push($heading_dates, $date_day);

                $attendanceResponseArray[$fulldate] = array(
                 //"user_id"=>$request->user_id,
                 "user_id"=> $singleUser->id,"DOJ"=>$singleUser->doj,"isAbsent"=>false,"isLeave"=>false,
                 "is_weekoff"=>false,"isLC"=>null,"isEG"=>null,"date"=>$fulldate,"is_holiday"=>false,
                 "attendance_mode_checkin"=>null,"attendance_mode_checkout"=>null, "absent_status"=>null,
                 "checkin_time"=>null,"checkout_time"=>null,"leave_type"=>null,"half_day_status"=>null,"half_day_type"=>null
                                                             );

                //echo "Date is ".$fulldate."\n";
                ///$month_array[""]
              }
              array_push($heading_dates, "Total Weekoff", "Total Holiday","Total Present", "Total Absent","Total Late LOP","Total Leave","Total Halfday","Total On Duty","Total LC","Total EG","Total Payable Days");



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

         $shiftStartTime  = Carbon::parse($regularTime->shift_start_time);
         $shiftEndTime  = Carbon::parse($regularTime->shift_end_time);
            //
             foreach ($attendanceResponseArray as $key => $value) {
                     //Logic For Check week off or not

                   if(!array_key_exists('date',$attendanceResponseArray[$key]) )
                     dd("Missing for : ".$key);

                 if(Carbon::parse($attendanceResponseArray[$key]['date'])->format('l')=="Sunday"
                 &&$attendanceResponseArray[$key]['checkin_time']==null&&
                 $attendanceResponseArray[$key]["checkout_time"]==null){
                     $attendanceResponseArray[$key]['is_weekoff']=true;
                 }

                //Logic For Check Holiday Or Not
                foreach( $holidays as $holiday){
                    if(Carbon::parse($holiday)->eq(Carbon::parse($attendanceResponseArray[$key]['date']))
                    &&$attendanceResponseArray[$key]['checkin_time']==null&&
                    $attendanceResponseArray[$key]["checkout_time"]==null&&
                    !$attendanceResponseArray[$key]['is_weekoff']){
                        $attendanceResponseArray[$key]['is_holiday']=true;
                    }

                }

                 //Logic For Check Leave,Half day, Absent
                 //dd($attendanceResponseArray[$key]['user_id']);
                 if($attendanceResponseArray[$key]['checkin_time']==null&&
                   $attendanceResponseArray[$key]["checkout_time"]==null&&
                   $attendanceResponseArray[$key]['is_weekoff']==false){
                    $leave_Details=VmtEmployeeLeaves::where('user_id',$attendanceResponseArray[$key]['user_id'])
                                  ->whereYear('end_date', $year)
                                  ->whereMonth('end_date',$month)
                                  ->get(['start_date','end_date','status','leave_type_id','total_leave_datetime']);
                    if( $leave_Details->count()==0){
                       // dd( $leave_Details->count());
                        $attendanceResponseArray[$key]['isAbsent']=true;
                    }else{
                        foreach( $leave_Details as $single_leave_details){
                            $startDate = Carbon::parse($single_leave_details->start_date)->subDays(1);
                            $endDate = Carbon::parse($single_leave_details->end_date);
                            $currentDate =  Carbon::parse($attendanceResponseArray[$key]['date']);
                         //   dd($startDate.'-----'.$currentDate.'-----');
                            if($currentDate->gt( $startDate) && $currentDate->lte($endDate) ){
                                if(substr( $single_leave_details->total_leave_datetime,-1)=='N'){
                                    // Logic Get FN or AN Value From total Leave date time
                                        $attendanceResponseArray[$key]['half_day_type'] = preg_replace("/([^a-zA-Z]+)/i", "",  $single_leave_details->total_leave_datetime);
                                         $attendanceResponseArray[$key]['half_day_status']=$single_leave_details->status;
                                } else if($attendanceResponseArray[$key]['checkin_time']==null&&
                                $attendanceResponseArray[$key]["checkout_time"]==null&&
                                $single_leave_details->status=='Approved'){
                                    $attendanceResponseArray[$key]['isLeave']=true;
                                    $leave_type=VmtLeaves::where('id',$single_leave_details->leave_type_id)
                                                           ->pluck('leave_type');
                                                         //  dd( $leave_type[0]);
                                    if($leave_type[0]=='Sick Leave / Casual Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='SL/CL';
                                    }else if($leave_type[0]=='Earned Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='EL';
                                    }else if($leave_type[0]=='Maternity Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='ML';
                                    }else if($leave_type[0]=='Paternity Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='PTL';
                                    }else if($leave_type[0]=='On Duty'){
                                        $attendanceResponseArray[$key]['leave_type']='OD';
                                    }else if($leave_type[0]=='Permission'){
                                        $attendanceResponseArray[$key]['leave_type']="PI";
                                    }else if($leave_type[0]=='Compensatory Off'){
                                        $attendanceResponseArray[$key]['leave_type']='CO';
                                    }else if($leave_type[0]=='Casual Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='CL';
                                    }else if($leave_type[0]=='Sick Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='SL';
                                    }else if($leave_type[0]=='Compensatory Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='CO';
                                    }else if($leave_type[0]=='Flexi day-off Leave'){
                                        $attendanceResponseArray[$key]['leave_type']='FO L';
                                    }
                                       continue;
                                }else{
                                    $attendanceResponseArray[$key]['isAbsent']=true;
                                    continue;
                                }
                            }else{
                                $attendanceResponseArray[$key]['isAbsent']=true;
                                   continue;
                            }
                        }
                    }



                 }

                 $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
                 $checkout_time = $attendanceResponseArray[$key]["checkout_time"];

                 //Code For Check LG
           if(!empty($checkin_time)){
                       $parsedCheckIn_time  = Carbon::parse($checkin_time);
                     //Check whether checkin done on-time
                     $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);
                if($isCheckin_done_ontime){
                    //employee came on time....
                }else{
                    //dd("Checkin NOT on-time");
                    //check whether regularization applied.
                    $user_id=$attendanceResponseArray[$key]['user_id'];
                    $date=$attendanceResponseArray[$key]['date'];
                    $regularization_status = $this->isRegularizationRequestApplied($user_id,$date,'LC');
                    $attendanceResponseArray[$key]["isLC"] = $regularization_status;
                }
            }
                  //Code For Check LG
            if(!empty( $checkout_time)){
                    $parsedCheckOut_time  = Carbon::parse($checkout_time);
                  //Check whether checkin out on-time
                  $isCheckout_done_ontime =$parsedCheckOut_time->lte($shiftEndTime);
             if( $isCheckout_done_ontime){
                   //employee left early on time....
                 $user_id=$attendanceResponseArray[$key]['user_id'];
                 $date=$attendanceResponseArray[$key]['date'];
                 $regularization_status = $this->isRegularizationRequestApplied($user_id,$date,'EG');
                 $attendanceResponseArray[$key]["isEG"] = $regularization_status;
             }else{
                //employee left late....
             }
            }



             }


      // dd($attendanceResponseArray);

             foreach ($attendanceResponseArray as $key => $value) {
                 $current_date=Carbon::parse($attendanceResponseArray[$key]['date']);
                 $doj=Carbon::parse($attendanceResponseArray[$key]['DOJ']);

                 if($doj->gte($current_date)){
                    array_push($arrayReport,'N');
                 } else if($attendanceResponseArray[$key]['is_weekoff']){
                     array_push($arrayReport,'WO');
                     $total_weekoff++;
                  }else if($attendanceResponseArray[$key]['is_holiday']){
                    array_push($arrayReport,'HO');
                    $total_holidays++;
                  }else if($attendanceResponseArray[$key]['isAbsent']&&!$attendanceResponseArray[$key]['isLeave']
                  &&!$attendanceResponseArray[$key]['is_holiday']&&$attendanceResponseArray[$key]['half_day_status']==null){
                     array_push($arrayReport,'A');
                     $total_absent++;
                 }else if($attendanceResponseArray[$key]['half_day_status']=='Approved'){
                    if($attendanceResponseArray[$key]['half_day_type']=='FN'){
                        array_push($arrayReport,'HD/P');
                    }else if($attendanceResponseArray[$key]['half_day_type']=='AN'){
                        array_push($arrayReport,'P/HD');
                    }
                      $total_present= $total_present+0.5;
                      $total_halfday= $total_halfday+0.5;

                 }else if($attendanceResponseArray[$key]['half_day_status']=='Pending'||$attendanceResponseArray[$key]['half_day_status']=='Rejected'){
                    if($attendanceResponseArray[$key]['half_day_type']=='AN'){
                        array_push($arrayReport,'A/P');
                    }else if($attendanceResponseArray[$key]['half_day_type']=='FN'){
                        array_push($arrayReport,'P/A');
                    }
                    $total_present= $total_present+0.5;
                    $total_absent= $total_absent+0.5;
                 } else if( $attendanceResponseArray[$key]['isLeave']){
                   // dd($attendanceResponseArray[$key]);
                   if($attendanceResponseArray[$key]['leave_type']=='OD'){
                    array_push($arrayReport,$attendanceResponseArray[$key]['leave_type']);
                       $total_OD++;
                   }else{
                       array_push($arrayReport,$attendanceResponseArray[$key]['leave_type']);
                       $total_leave++;
                   }
                 } else if($attendanceResponseArray[$key]['checkin_time']!=null || $attendanceResponseArray[$key]['checkout_time']!=null) {
                     if($attendanceResponseArray[$key]['isLC']=='Rejected' || $attendanceResponseArray[$key]['isLC']=='Not Applied'){
                        array_push($arrayReport,'P/LC');
                        $total_present++;
                        $total_lop =  $total_lop+0.5;
                     }else if($attendanceResponseArray[$key]['isEG']=='Rejected'|| $attendanceResponseArray[$key]['isEG'] =='Not Applied'){
                        array_push($arrayReport,'P/EG');
                        $total_present++;
                     }else{
                        array_push($arrayReport,'P');
                        $total_present++;
                     }

                     //Count For LG AND EG
                 if($attendanceResponseArray[$key]['isLC']!=null){
                    $total_LC++;
                 }

                if($attendanceResponseArray[$key]['isEG']!=null){
                   $total_EG++;
               }

                 }else{
                    array_push($arrayReport,' ');
                 }





             }

             // dd($heading_dates);
              //dd(($attendanceResponseArray));

           // dd();
            $total_payable_days=($total_weekoff+$total_holidays+$total_present+$total_leave+$total_halfday+$total_OD)-$total_lop;
           //$total_payable_days=$total_weekoff+$total_holidays+$total_present+$total_leave+$total_halfday+$total_OD;
            array_push($arrayReport,$total_weekoff,$total_holidays,$total_present,$total_absent, $total_lop,$total_leave, $total_halfday,$total_OD,$total_LC,$total_EG, $total_payable_days);
            array_push($reportresponse,$arrayReport);

           // dd( $arrayReport);
            unset($arrayReport);
        }
        //dd($reportresponse);
        $data=array($heading_dates,$reportresponse);
       return $data;
    }

    public function detailedAttendanceReport($year,$month){
       dd($year);
    }

}





































































































































































































































































?>
