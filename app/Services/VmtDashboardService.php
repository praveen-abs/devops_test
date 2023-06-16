<?php

namespace App\Services;
use Illuminate\Support\Facades\File;
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

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use \Datetime;

use App\Services\VmtAttendanceService;
use App\Services\VmtHolidayService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VmtDashboardService{

    private function checkingGivenDateHolidayOrNot($year,$month,$i){

          $holiday_query=vmtHolidays::whereMonth('holiday_date',$month)
                        ->whereDay('holiday_date',$i)->get();
        if($holiday_query->isEmpty()){
            if(Carbon::parse($year.'-'.$month.'-'.$i)->format('l')=='Sunday'){
                 return true;
            }else{
                return false;
            }
        }else{
            return true;
        }


    }

    public function getMainDashboardData($user_code , VmtAttendanceService $serviceVmtAttendanceService, VmtHolidayService $serviceHolidayService){

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'integer' => 'Field :attribute should be integer',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                        'status' => 'failure',
                        'message' => $validator->errors()->all()
            ]);
        }

        $response = array();
        $user_id = User::where('user_code',$user_code)->first()->id;

        $employee_details_query = User::where('user_code',$user_code)->get(['id','name','avatar'])->first();
        $employee_designation = VmtEmployeeOfficeDetails::where('user_id',$employee_details_query->id)->first()->designation;

        $profile_pic = null;

        //If AVATAR filename present in DB column....
        $emp_avatar = $employee_details_query->avatar;

        if(!empty($emp_avatar))
        {
            //converting profile pic into base64
            $avatar_path = public_path("assets/images/".$emp_avatar);

            if(File::exists( $avatar_path)){
                $avatar_type = File::mimeType($avatar_path);
                $profile_pic = "data:".$avatar_type.";base64,".base64_encode(file_get_contents($avatar_path));
            }
        }
        else
        {
            $profile_pic='';
        }

        //Get the current year and month
        $year = date("Y");
        $month = str_replace( '0','', date("m"));
        $day = date('d');
        $present_count=0;
        $absent_count=0;
        $leave_count=0;

        //Get monthly attendance report data
        $attendance_DailyReport_PerMonth = $serviceVmtAttendanceService->fetchAttendanceDailyReport_PerMonth($user_code, $year, $month);

        for($i=01;$i<=$day;$i++)
        {
            $month = date('m');
            if($i<10){
                $i='0'.$i;
            }
            $date=$year.'-'.$month.'-'.$i;
            if($attendance_DailyReport_PerMonth[$date]['checkin_time'] || $attendance_DailyReport_PerMonth[$date]['checkout_time'] ){
                $present_count++;
            }else if($attendance_DailyReport_PerMonth[$date]['isAbsent']){
               if($attendance_DailyReport_PerMonth[$date]['absent_status']=='Approved'){
                  $leave_count++;
               }else{
                   $is_sunday_or_holiday = $this->checkingGivenDateHolidayOrNot($year,$month,$i);
                   if(!$is_sunday_or_holiday){
                    $absent_count++;
                   }
               }
            }

        }

        $response['name']=$employee_details_query->name;
        $response['designation']=$employee_designation;

        //Get the employee profile pic
        $response["profile_pic"] = $profile_pic; //BASE 64


         //Get the Present, Leave, Absent data from above JSON response
        $response["attendance"]["present_count"] = $present_count;
        $response["attendance"]["absent_count"] = $absent_count;
        $response["attendance"]["leave_count"]= $leave_count;

        //Get current day attendance checkin/checkout status

        $response["attendance"]["current_day_attendance_status"] = $serviceVmtAttendanceService->fetchAttendanceStatus($user_code, date("Y-m-d"));
        $response["holidays"] = $serviceHolidayService->getAllHolidays();
        $response["events"] = $this->getAllEvents();

        return $response;
    }

    public function getAllUsersDOJ_DOB(){
        return User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
            ->get(['users.name','users.name','vmt_employee_details.doj','vmt_employee_details.dob']);
    }

    /*
        Events such as Birthday event, work anniversary, etc


    */
    public function getAllEvents(){
        return [];
    }

    private function getAllEmployeeBirthdayDetails(){

    }

    private function getAllHolidays(){

    }
    public function performAttendanceCheckIn($user_code, $date, $checkin_time, $selfie_checkin, $work_mode, $attendance_mode_checkin, $checkin_lat_long)
    {

        $user_id = User::where('user_code', $user_code)->first()->id;

        /*
        1.get the work_shift_id for the particular user from VmtEmployeeWorkShifts.
        2,then check wheather the user have workshiftid or not.
        */

        //Check if user already checked-in
        $attendanceCheckin  = VmtEmployeeAttendance::where('user_id', $user_id)->where("date", $date)->first();

        if ($attendanceCheckin) {
            return response()->json([
                'status' => 'failure',
                'message' => 'Check-in already done',
                'data'   => ""
            ]);
        }

        $vmt_employee_workshift =VmtEmployeeWorkShifts::where('user_id', $user_id)->where('is_active','1')->first();

        if(empty( $vmt_employee_workshift->work_shift_id)){
            return response()->json([
                'status' => 'failure',
                'message' => 'No shift has been assigned',
                'data'   => ""
            ]);
    }


        //If check-in not done already , then create new record

        $attendanceCheckin           = new VmtEmployeeAttendance;
        $attendanceCheckin->date          = $date;
        $attendanceCheckin->checkin_time  = $checkin_time;
        $attendanceCheckin->user_id       = $user_id;
        //$attendanceCheckin->shift_type    = $shift_type; Todo : Need to remove in table
        $attendanceCheckin->work_mode = $work_mode; //office, home
        $attendanceCheckin->checkin_comments = "";
        $attendanceCheckin->attendance_mode_checkin = $attendance_mode_checkin;
        $attendanceCheckin->vmt_employee_workshift_id = $vmt_employee_workshift->work_shift_id; //TODO : Need to fetch from 'vmt_employee_workshifts'
        $attendanceCheckin->checkin_lat_long = $checkin_lat_long ?? ''; //TODO : Need to fetch from 'vmt_employee_workshifts'
        $attendanceCheckin->save();
        // processing and storing base64 files in public/selfies folder
        if (!empty('selfie_checkin')) {

            $emp_selfiedir_path = public_path('employees/' . $user_code . '/selfies/');

            // dd($emp_document_path);
            if (!File::isDirectory($emp_selfiedir_path))
                File::makeDirectory($emp_selfiedir_path, 0777, true, true);


            $selfieFileEncoded  =  $selfie_checkin;

            $fileName = $attendanceCheckin->id . '_checkin.png';

            \File::put($emp_selfiedir_path . $fileName, base64_decode($selfieFileEncoded));

            $attendanceCheckin->selfie_checkin = $fileName;
        }

        $attendanceCheckin->save();


        return response()->json([
            'status' => 'success',
            'message' => 'Check-in success',
            'data'   => ''
        ]);
    }

    public function fetchAttendanceDailyReport_PerMonth($user_code, $year, $month)
    {

        //Get the user_code
        $user_id = User::where('user_code', $user_code)->first()->id;


        //TODO : Hardcoded now. Need to fetch based on assigned shift for this employee
        $regularTime  = VmtWorkShifts::where('shift_name', 'First Shift')->first();

        ////Fetch the attendance reports
        //Create date array
        $requestedDate = $year . '-' . $month . '-01';
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



        // attendance details from vmt_staff_attenndance_device table
        $deviceData = [];
        for ($i = 0; $i < ($totalDays); $i++) {
            // code...
            $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');

            if ($dayStr != 'Sunday') {

                $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');

                $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                    ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                    ->whereDate('date', $dateString)
                    ->where('direction', 'out')
                    ->where('user_Id', $user_code)
                    ->first(['check_out_time']);

                $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                    ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                    ->whereDate('date', $dateString)
                    ->where('direction', 'in')
                    ->where('user_Id', $user_code)
                    ->first(['check_in_time']);

                $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
                $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];

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
        } //for



        // attendance details from vmt_employee_attenndance table
        $attendance_WebMobile = VmtEmployeeAttendance::where('user_id', $user_id)
            ->whereMonth('date', $month)
            ->orderBy('checkin_time', 'asc')
            ->get(['date', 'checkin_time', 'checkout_time', 'attendance_mode_checkin', 'attendance_mode_checkout', 'selfie_checkin', 'selfie_checkout']);

        $attendanceResponseArray = [];

        //Create empty month array with all dates.

        if ($month < 10)
            $month = "0" . $month;


        $days_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($i = 1; $i <= $days_count; $i++) {
            $date = "";

            if ($i < 10)
                $date = "0" . $i;
            else
                $date = $i;

            $fulldate = $year . "-" . $month . "-" . $date;


            $attendanceResponseArray[$fulldate] = array(
                "user_id" => $user_id, "isAbsent" => false, "attendance_mode_checkin" => null, "attendance_mode_checkout" => null,
                "absent_status" => null, "leave_type" => null, "checkin_time" => null, "checkout_time" => null,
                "selfie_checkin" => null, "selfie_checkout" => null,
                "isLC" => false, "lc_status" => null, "lc_reason" => null, "lc_reason_custom" => null,
                "isEG" => false, "eg_status" => null, "eg_reason" => null, "eg_reason_custom" => null,
                "isMIP" => false, "mip_status" => null, "isMOP" => false, "mop_status" => null
            );

            //echo "Date is ".$fulldate."\n";
            ///$month_array[""]
        }


        // merging result from both table
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

            //dd($value);
            foreach ($value as $singleValue) {
                //Find the min of checkin
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

            //selfies
            //format : http://127.0.0.1:8000/employees/PLIPL068/selfies/checkout.png
            if ($singleValue["checkin_time"] && !empty($singleValue["selfie_checkin"]))
                $attendanceResponseArray[$key]["selfie_checkin"] = 'employees/' . $user_code . '/selfies/' . $singleValue["selfie_checkin"];

            if ($singleValue["checkout_time"] && !empty($singleValue["selfie_checkout"]))
                $attendanceResponseArray[$key]["selfie_checkout"] = 'employees/' . $user_code . '/selfies/' . $singleValue["selfie_checkout"];
        }
        //dd($attendanceResponseArray);

        $shiftStartTime  = Carbon::parse($regularTime->shift_start_time);
        $shiftEndTime  = Carbon::parse($regularTime->shift_end_time);

        //dd($regularTime);
        ////Logic to check LC,EG,MIP,MOP,Leave status
        foreach ($attendanceResponseArray as $key => $value) {

            $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
            $checkout_time = $attendanceResponseArray[$key]["checkout_time"];


            //LC Check
            if (!empty($checkin_time)) {

                $parsedCheckIn_time  = Carbon::parse($checkin_time);

                //Check whether checkin done on-time
                $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

                if ($isCheckin_done_ontime) {
                    //employee came on time....

                } else {
                    //employee came on time....
                    //dd("Checkin NOT on-time");

                    //then LC
                    $attendanceResponseArray[$key]["isLC"] = true;

                    //check whether regularization applied.
                    $regularization_status = $this->isRegularizationRequestApplied($user_id, $key, 'LC');

                    //check regularization status
                    $attendanceResponseArray[$key]["lc_status"] = $regularization_status;
                }
            }


            //EG Check
            //check if its EG
            if (!empty($checkout_time)) {

                $parsedCheckOut_time  = Carbon::parse($checkout_time);

                //Check whether checkin done on-time
                $isCheckOut_doneEarly = $parsedCheckOut_time->lte($shiftEndTime);

                if ($isCheckOut_doneEarly) {
                    //employee left early on time....

                    //then EG
                    $attendanceResponseArray[$key]["isEG"] = true;

                    //check whether regularization applied.
                    $regularization_status = $this->isRegularizationRequestApplied($user_id, $key, 'EG');

                    //check regularization status
                    $attendanceResponseArray[$key]["eg_status"] = $regularization_status;
                } else {
                    //employee left late

                }
            }


            //for absent
            if ($checkin_time == null && $checkout_time == null) {
                $attendanceResponseArray[$key]["isAbsent"] = true;

                //Check whether leave is applied or not.
                $t_leaveRequestDetails = $this->isLeaveRequestApplied($user_id, $key, $year, $month);

                if (empty($t_leaveRequestDetails)) {

                    $attendanceResponseArray[$key]["absent_status"] = "Not Applied";
                    $attendanceResponseArray[$key]["leave_type"] = null;
                } else {
                    $attendanceResponseArray[$key]["absent_status"] = $t_leaveRequestDetails->status;
                    $attendanceResponseArray[$key]["leave_type"] = $t_leaveRequestDetails->leave_type;
                }
            } elseif ($checkin_time != null && $checkout_time == null) {

                //Since its MOP
                $attendanceResponseArray[$key]["isMOP"] = true;

                ////Is any permission applied
                $attendanceResponseArray[$key]["mop_status"] = $this->isRegularizationRequestApplied($user_id, $key, 'MOP');

                if ($attendanceResponseArray[$key]["mop_status"] == "Approved") {

                    //If Approved, then set the regularize time as checkin time
                    $attendanceResponseArray[$key]["checkout_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                        ->where('user_id',  $user_id)->where('regularization_type', 'MOP')->first()->regularize_time;

                    //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }
            } elseif ($checkin_time == null && $checkout_time != null) {

                //Since its MIP
                $attendanceResponseArray[$key]["isMIP"] = true;

                ////Is any permission applied
                $attendanceResponseArray[$key]["mip_status"] = $this->isRegularizationRequestApplied($user_id, $key, 'MIP');

                if ($attendanceResponseArray[$key]["mip_status"] == "Approved") {

                    //If Approved, then set the regularize time as checkin time
                    $attendanceResponseArray[$key]["checkin_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                        ->where('user_id',  $user_id)->where('regularization_type', 'MIP')->first()->regularize_time;

                    //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }
            }
        } //for each


        return $attendanceResponseArray;
    }

    public function getNotifications($user_code){
        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            //Get the user record and update avatar column
            $query_notifications = User::with('array_notifications')
                               ->where('users.user_code',$user_code)
                               ->first(['users.id','users.name', 'users.user_code']);

            //Add recipient name
            foreach($query_notifications['array_notifications'] as $singleNotification){

                $singleNotification["recipient_name"] = User::find($singleNotification["recipient_user_id"])->name;
            }

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $query_notifications,
            ]);

        }
        catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch notifications",
                "data" => $e,
            ]);

        }
    }




}


