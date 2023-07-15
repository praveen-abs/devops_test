<?php

namespace App\Services;
use App\Models\VmtEmployeesLeavesAccrued;
use App\Models\VmtEmployeeWorkShifts;
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
use App\Models\VmtClientMaster;
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
        $response["events"] = $this->getAllEventsDashboard();

        return $response;
    }

    public function getAllUsersDOJ_DOB(){
        return User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
            ->get(['users.name','users.name','vmt_employee_details.doj','vmt_employee_details.dob']);
    }

    /*
        Events such as Birthday event, work anniversary, etc


    */
    public function getAllEventsDashboard(){

        try{

        $employeesEventDetails = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->select(
                'users.id',
                'users.name',
                'users.avatar',
                'vmt_employee_office_details.designation',
                'vmt_employee_details.dob',
                'vmt_employee_details.doj'
            )
            ->where('users.is_ssa', '=', '0')
            ->where('users.active', '=', '1')
            ->where('users.is_onboarded', '=', '1')
            ->whereNotNull('vmt_employee_details.doj')
            ->whereNotNull('vmt_employee_details.dob');

            // dd($employeesEventDetails);

        //Employee events for the current month only
        $dashboardEmployeeEventsData = [];
        $dashboardEmployeeEventsData['birthday'] = $employeesEventDetails->whereMonth('vmt_employee_details.dob', '>=', Carbon::now()->month)
                                                ->whereMonth('vmt_employee_details.dob', '<=', Carbon::now()->month + 1)
                                                ->get()->sortBy(function ($singleData, $key) {
                                                    return Carbon::createFromFormat('Y-m-d', $singleData["dob"])->dayOfYear;
                                                });

        $dashboardEmployeeEventsData['work_anniversary'] = $employeesEventDetails->whereMonth('vmt_employee_details.doj','>=',Carbon::now()->month)
                                                            ->whereMonth('vmt_employee_details.doj','<=',Carbon::now()->month + 1)
                                                            ->get()->sortBy(function ($singleData, $key) {
                                                                return Carbon::createFromFormat('Y-m-d', $singleData["doj"])->dayOfYear;
                                                            });

        // $dashboardEmployeeEventsData['hasData'] = 'true';

        //If any events found, then set 'hasData' to TRUE else FALSE
        if(count($dashboardEmployeeEventsData['birthday']) == 0 && count($dashboardEmployeeEventsData['work_anniversary']) == 0){
            $dashboardEmployeeEventsData['hasData'] = 'false';
        }
        else{

            $dashboardEmployeeEventsData['hasData'] = 'true';

        }

        // return  $dashboardEmployeeEventsData;

        return response()->json([
            "status" => "success",
            "message" => "",
            "data" =>$dashboardEmployeeEventsData,
        ]);

    }
    catch(\Exception $e){

        return response()->json([
            "status" => "failure",
            "message" => "Unable to fetch Allevent",
            "data" => $e,
        ]);

    }

    }



    private function getAllEmployeeBirthdayDetails(){

    }

    private function getAllHolidays(){

    }


    public function performAttendanceCheckIn($checked)
    {


        $vmt_employee_workshift =VmtEmployeeWorkShifts::where('user_id', auth()->user()->id)->where('is_active','1')->first();

        if(empty( $vmt_employee_workshift->work_shift_id)){
            return response()->json([
                'status' => 'failure',
                'message' => 'No work-shift has been assigned.Please contact Admin.',
                'data'   => ""
            ]);
        }

        // $checked = $check_in;
        if ($checked == 'true') {

            //Check if the user already checked-out.
            $attendance = VmtEmployeeAttendance::where('user_id', auth()->user()->id)
                        ->where('date', date('Y-m-d'))->first();

            if(!empty($attendance->date) && !empty($attendance->checkin_time))
            {
                return response()->json([
                    'status'=> 'failure',
                    'message' => 'Check-in already done',
                    'time' => ""
                ]);
            }

            $attendance = new VmtEmployeeAttendance;
            $attendance->user_id = auth()->user()->id;
            $attendance->date = date('Y-m-d');
            $currentTime = new DateTime("now", new \DateTimeZone('Asia/Kolkata') );
            $attendance->checkin_time = $currentTime;
            $attendance->vmt_employee_workshift_id = $vmt_employee_workshift->work_shift_id;
            $attendance->attendance_mode_checkin = "web";
            $attendance->save();

            //Check whether if its LC/EG
            // $regularization_type = checkRegularizationType($currentTime, "check-in");
            // $isSent = null;
            // $user_mail = VmtEmployeeOfficeDetails::where('user_id',$attendance->user_id)->first()->officical_mail;

            //Send mail if its LC
            // if( !empty($regularization_type) &&  $regularization_type == "LC")
            // {
               // dd("adsf");
                // $VmtClientMaster = VmtClientMaster::first();
                // $image_view = url('/') . $VmtClientMaster->client_logo;
                // $emp_avatar = json_decode(getEmployeeAvatarOrShortName(auth::user()->id),true);
                // dd($emp_avatar);
                // $isSent    = \Mail::to($user_mail)->send(new AttendanceCheckinCheckoutNotifyMail(
                //     auth::user()->name,
                //     auth::user()->user_code,
                //     Carbon::parse($attendance->date)->format('M jS, Y'),
                //     Carbon::parse($currentTime)->format('h:i:s A'),
                //     $image_view,
                //     $emp_avatar,
                //     request()->getSchemeAndHttpHost(),
                    // Carbon::parse($leave_request_date)->format('M jS Y'),
                //     $regularization_type
                // ));
          //  }



            return response()->json([
                'status' => 'success',
                'message' => 'You have successfully checkedin!',
                'time' => $attendance->checkin_time,
               // 'regularization_type' => $regularization_type,
               // 'regularization_mail_sent' => $isSent ? "True" : $isSent
            ]);
        } else {

            $user_data =User::where('id', auth()->user()->id)->first();
            $attendance = VmtEmployeeAttendance::where('user_id', $user_data->id)
                            ->where('date', date('Y-m-d'))
                            ->first();

            if(!empty($attendance)){
                if(!empty($attendance->checkout_date) && !empty($attendance->checkout_time))
                {
                    return response()->json([
                        'status'=> 'failure',
                        'message' => 'You have already checked-out for the day',
                        'time' => ""
                    ]);
                }

            }

            //dd($attendance);
            //$attendance->date = date('Y-m-d');
            //att- means (attendance)
            $last_checkout_data = $this->fetchEmpLastAttendanceStatus(auth()->user()->user_code);

            $bio_att_checkin_id = \DB::table('vmt_staff_attenndance_device')
                            ->select('id','user_Id', \DB::raw('MIN(date) as check_in_time'))
                            ->whereDate('date', $last_checkout_data->checkin_date)
                            ->where('direction', 'in')
                            ->where('user_Id', $user_data->user_code)
                            ->first(['check_in_time','date']);
                            dd($last_checkout_data);
                 // dd(empty($last_checkout_data->checkout_date) && empty($last_checkout_data->checkout_time) && $last_checkout_data->attendance_mode_checkin ='biometric');

     if(empty($last_checkout_data->checkout_date) && empty($last_checkout_data->checkout_time) && $last_checkout_data->attendance_mode_checkin ='biometric'){

                        $attendance_bio_data = new VmtEmployeeAttendance;
                        $attendance_bio_data->user_id = auth()->user()->id;
                        $attendance_bio_data->vmt_employee_workshift_id = $vmt_employee_workshift->work_shift_id;
                        $currentTime = new DateTime("now", new \DateTimeZone('Asia/Kolkata') );
                        $attendance_bio_data->checkout_time = $currentTime;
                        $attendance_bio_data->checkout_date= $last_checkout_data->checkin_date;
                        $attendance_bio_data->attendance_mode_checkin = "biometric";
                        $attendance_bio_data->attendance_mode_checkout = "web";
                        $attendance_bio_data->staff_attendance_id = $bio_att_checkin_id;
                        $attendance_bio_data->save();

    }else if(empty($last_checkout_data->checkout_date) && empty($last_checkout_data->checkout_time) &&($last_checkout_data->attendance_mode_checkin ='web' || $last_checkout_data->attendance_mode_checkin ='mobile') ){

                    $attendance_web_data = VmtEmployeeAttendance::where('user_id', $user_data->id)
                                              ->where('date', $last_checkout_data->checkin_date)->first();

                        $currentTime = new DateTime("now", new \DateTimeZone('Asia/Kolkata') );
                        $attendance_web_data->checkout_time = $currentTime;
                        $attendance_web_data->checkout_date= Carbon::today()->toDateString();
                        $attendance_web_data->attendance_mode_checkout = "web";
                        $attendance_web_data->save();

    }else{
                        $currentTime = new DateTime("now", new \DateTimeZone('Asia/Kolkata') );
                        $attendance->checkout_time = $currentTime;
                        $attendance->checkout_date= Carbon::today()->toDateString();
                        $attendance->attendance_mode_checkout = "web";
                        $attendance->save();

            }



            //Get the time diff
            $checked = VmtEmployeeAttendance::where('user_id', auth()->user()->id)
                        ->where('date', date('Y-m-d'))
                        ->first();

            $to = Carbon::createFromFormat('H:i:s', $checked->checkout_time);

            $from = Carbon::createFromFormat('H:i:s', $checked->checkin_time);

            $effective_hours = gmdate('H:i:s', $to->diffInSeconds($from));

               // dd($effective_hours);

            return response()->json([
                'status' => 'success',
                'message' => 'You have successfully checked out!',
                'time' => $attendance->checkout_time,
                'effective_hours' => $effective_hours,
            ]);
        }

        }



    public function fetchAttendanceDailyReport_PerMonth($user_code, $year, $month)
    {
        try{
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

        // dd($endOfMonth);


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

                // echo $i;


        } //for
        // dd();



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


        for ($i = 1; $i <= $totalDays; $i++) {
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
                // dd($t_leaveRequestDetails);
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

        // return ($attendanceResponseArray);


        $count =0;
        $count1=0;
        $count2 = 0;

        foreach($attendanceResponseArray as $attendancedash){

             if($attendancedash['isAbsent']){
              $count++;
             }
             if(!$attendancedash['isAbsent']){
                $count1++;
             }
             if($attendancedash['absent_status'] == "Not Applied"){
                $count2++;
             }
        }
       $current_mnth = ["absent"=>$count,"present"=>$count1, "not_applied"=>$count2];

        //array_push($res, $current_mnth);

        return response()->json([
            "status" => "success",
            "message" => "",
            "data" =>$current_mnth,
        ]);
    }
    catch(\Exception $e){

        return response()->json([
            "status" => "failure",
            "message" => "Unable to fetch attenance report per_month",
            "data" => $e,
        ]);

    }




    }

    private function isRegularizationRequestApplied($user_id, $attendance_date, $regularizeType)
    {

        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);

        // dd($user_id ." , ". $attendance_date." , ".$regularizeType);

        if ($regularize_record->exists()) {
            return $regularize_record->first()->status;
        } else {
            return "None";
        }
    }


    public function isLeaveRequestApplied($user_id, $attendance_date, $year, $month)
    {
        // dd($year);

        $leave_Details = VmtEmployeeLeaves::join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('user_id', "146")
            ->whereYear('end_date', "2023")
            ->whereMonth('end_date', "06")
            ->get(['start_date', 'end_date', 'status', 'vmt_leaves.leave_type', 'total_leave_datetime']);

        if ($leave_Details->count() == 0) {
            return null;
        } else {
            foreach ($leave_Details as $single_leave_details) {
                $startDate = Carbon::parse($single_leave_details->start_date)->subDay();
                $endDate = Carbon::parse($single_leave_details->end_date);
                $currentDate =  Carbon::parse($attendance_date);
                // echo $currentDate;
                // dd($startDate.'-----'.$currentDate.'------------'.$endDate.'-----');
                if ($currentDate->gt($startDate) && $currentDate->lte($endDate)) {

                    return $single_leave_details;
                } else {
                    $single_leave_details = null;
                }
            }
            return $single_leave_details;
        }



        //check whether leave applied.If yes, check leave status
        $leave_record = VmtEmployeeLeaves::where('user_id', $user_id)->whereDate('end_date', $attendance_date);

        if ($leave_record->exists()) {
            return $leave_record->first();
        } else {
            return null;
        }
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

    public function getEmployeeLeaveBalanceDashboards($user_id, $start_time_period, $end_time_period)
    {
        // TODO:: Which Leave Types we Have to Find Avalied And Balance //Need To Change In Setting Page

  //  $visible_leave_types = array('Casual/Sick Leave'=>1,'Earned Leave'=>2);

  try{

        $leave_balance_for_all_types = array();
        $avalied_leaves = array();
        $response = array();
        $accrued_leave_types = VmtLeaves::get();
        $temp_leave=array();

        foreach ($accrued_leave_types as $single_leave_types) {
            if ($single_leave_types->is_finite == 1) {
                if ($single_leave_types->is_carry_forward != 1) {
                    $total_avalied_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                        ->whereBetween('start_date', [$start_time_period, $end_time_period])
                        ->where('leave_type_id', $single_leave_types->id)
                        ->whereIn('status', array('Approved', 'Pending'))
                        ->sum('total_leave_datetime');
                    $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                        ->whereBetween('date', [$start_time_period, $end_time_period])
                        ->where('leave_type_id', $single_leave_types->id)
                        ->sum('accrued_leave_count');
                    if ($single_leave_types->leave_type == 'Compensatory Off') {
                        $leave_balance = count($this->fetchUnusedCompensatoryOffDays($user_id));
                    } else {
                        $leave_balance =  $total_accrued -  $total_avalied_leaves;
                        $leave_balance_for_all_types[$single_leave_types->leave_type]= $leave_balance;
                        $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves ;
                    }
                    $temp_leave['leave_type']= $single_leave_types->leave_type;
                    $temp_leave['leave_balance']=$leave_balance;
                    $temp_leave['avalied_leaves']= $total_avalied_leaves;
                    // $leave_balance_for_all_types[$single_leave_types->leave_type]= $leave_balance;
                    // $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves ;
                    //$temp_leave=array('leave_type'=>$single_leave_types->leave_type,'leave_balance'=>$leave_balance,'avalied_leaves'=>$total_avalied_leaves);

                } else if ($single_leave_types->is_carry_forward == 1) {

                    $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                        ->where('leave_type_id', $single_leave_types->id)
                        ->sum('accrued_leave_count');
                    $total_avalied_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                        ->whereBetween('start_date', [$start_time_period, $end_time_period])
                        ->where('leave_type_id', $single_leave_types->id)
                        ->whereIn('status', array('Approved', 'Pending'))
                        ->sum('total_leave_datetime');
                    $leave_balance =  $total_accrued - $total_avalied_leaves;
                    // $leave_balance_for_all_types[$single_leave_types->leave_type] = $leave_balance;
                    // $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves ;
                    $temp_leave['leave_type']= $single_leave_types->leave_type;
                    $temp_leave['leave_balance']=$leave_balance;
                    $temp_leave['avalied_leaves']= $total_avalied_leaves;



                }


            } else {
                $total_avalied_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereBetween('start_date', [$start_time_period, $end_time_period])
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves;
                $temp_leave['leave_type']= $single_leave_types->leave_type;
                $temp_leave['leave_balance']=0;
                $temp_leave['avalied_leaves']= $total_avalied_leaves;


            }
            array_push($response, $temp_leave);

            unset($temp_leave);

        }
        $leave_details = array('Leave Balance' => $leave_balance_for_all_types, 'Avalied Leaves' => $avalied_leaves);
        // return $response;

        return response()->json([
            "status" => "success",
            "message" => "",
            "data" => $response,
        ]);

    }
    catch(\Exception $e){

        return response()->json([
            "status" => "failure",
            "message" => "Unable to fetch LeaveBalance",
            "data" => $e,
        ]);
    }
    }

    public function fetchUnusedCompensatoryOffDays($user_id)
    {

        $final_emp_unused_compdays = array();

        //Get all the comp work days
        $emp_comp_off_days = $this->fetchEmployeeCompensatoryOffDays($user_id);

        //dd($emp_comp_off_days);

        //Check whether its used or not ( Leave request should be Rejected or Not applied)
        //// Create a new array with (k,v)=(attendance_id, [attendance_id, attendance_date])

        $map_comp_off_days = array();

        foreach ($emp_comp_off_days as $singleDay) {
            //$map_comp_off_days[ $singleDay["id"] ] = $singleDay["date"];
            // array_push($map_comp_off_days, array("emp_attendance_id" => $singleDay["id"],
            //                                      "emp_attendance_date" => $singleDay["date"]));
            $map_comp_off_days[$singleDay["id"]] = array(
                "emp_attendance_id" => $singleDay["id"],
                "emp_attendance_date" => $singleDay["date"]
            );
            //dd($singleDay["id"]);
        }


        //Check whether the comp days exists in this table
        $query_emp_comp_leaves = VmtEmployeeCompensatoryLeave::whereIn('employee_attendance_id', array_keys($map_comp_off_days))->get(['employee_leave_id', 'employee_attendance_id']);

        // $i = 0;
        //Check whether its leave request is Rejected
        foreach ($query_emp_comp_leaves as $singleEmpCompLeave) {
            //dd($singleEmpCompLeave);
            $emp_leave = VmtEmployeeLeaves::find($singleEmpCompLeave->employee_leave_id);
            if ($emp_leave->exists()) {
                //dd($emp_leave->status);
                //check the leave status
                if ($emp_leave->status != "Rejected") {
                    //Remove from $map_comp_off_days
                    unset($map_comp_off_days[$singleEmpCompLeave->employee_attendance_id]);
                }
            } else {
                dd("ERROR : employee_leave_id " . $singleEmpCompLeave . " doesnt exist in vmt_employee_leave table.");
            }
        }

        //Remove the keys and send only the values.
        return array_values($map_comp_off_days);
    }

    public function fetchEmployeeCompensatoryOffDays($user_id)
    {

        //Need to move to separate table settings
        $work_leave_days = ['Sunday'];

        //Final array response
        //Get list of holidays
        $query_holidays = vmtHolidays::selectRaw('DATE(holiday_date) as holiday_date')->pluck('holiday_date');

        //Remove the year part
        $query_holidays = $query_holidays->map(function ($item, $key) {
            return substr($item, 5);
        });

        $array_query_holidays = $query_holidays->toArray();

        //Get list of attendance days
        $query_emp_attendanceDetails = VmtEmployeeAttendance::where('user_id', $user_id)->get(['id', 'date'])->keyBy('date')->toArray();
        //dd($query_emp_attendanceDetails);

        //Get only the keys
        $dates_emp_attendanceDetails = array_keys($query_emp_attendanceDetails);
        //dd($dates_emp_attendanceDetails);


        foreach ($dates_emp_attendanceDetails as $singleAttendanceDate) {

            ////Need to check whether the given date is in holiday AND given date is in leave days(Eg : Sunday , saturday)
            $timestamp = strtotime($singleAttendanceDate);
            $day = date('l', $timestamp);

            //Test : Checking whether emp worked in work_leave_days
            /*
                    if(in_array($day, $work_leave_days)){
                     dd("Worked in leave days : ".$singleAttendanceDate);
                    }else
                    {
                       dd("Not Worked in leave days : ".$singleAttendanceDate);

                    }
                */
            //Test : End

            $trimmed_date = substr($singleAttendanceDate, 5);


            //Check whether not worked in Holidays or not in work_leave days
            if (!in_array($trimmed_date, $array_query_holidays) && !in_array($day, $work_leave_days)) {
                //If not in holiday, then remove from array
                unset($query_emp_attendanceDetails[$singleAttendanceDate]);
            }
        }

        //dd($query_emp_attendanceDetails);

        return $query_emp_attendanceDetails;
    }

    public function getAllNewDashboardDetails($user_id, $start_time_period, $end_time_period , $year , $month){

        $user_code = auth()->user()->user_code;

        try{
            $getAllEvent = $this->getAllEventsDashboard();
            $getAllNotification =  $this->getNotifications($user_code);
            $getEmpLeaveBalance =  $this->getEmployeeLeaveBalanceDashboards($user_id, $start_time_period, $end_time_period);
            $getAttenanceReportpermonth = $this->fetchAttendanceDailyReport_PerMonth($user_code, $year, $month);


            //dd($getAttenanceReportpermonth->content());

            return response()->json(
                [
                     "all_events"=>json_decode($getAllEvent->content(), true)['data'],
                     "all_notification" => json_decode($getAllNotification->content(),true)['data'],
                     "leave_balance_per_month"=>json_decode($getEmpLeaveBalance->content(), true)['data'],
                     "attenance_report_permonth"=>json_decode($getAttenanceReportpermonth->content(), true)['data']
                ]
            );

        }
        catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch new dashboard details",
                "data" => $e,
            ]);

        }

    }
    public function fetchEmpLastAttendanceStatus($user_code)
    {

        //Web/bio/mobile attendance
        try {
            $response = null;

            $query_web_mobile_response = VmtEmployeeAttendance::join('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
                ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_attendance.vmt_employee_workshift_id')
                ->where('users.user_code', $user_code)
                ->orderBy('vmt_employee_attendance.date', 'desc')
                ->first([
                    'users.user_code as employee_code',
                    'vmt_employee_attendance.date',
                    'vmt_employee_attendance.checkin_time as checkin_time',
                    'vmt_employee_attendance.date as checkin_date',
                    'vmt_employee_attendance.checkout_time as checkout_time',
                    'vmt_employee_attendance.checkout_date as checkout_date',
                    'vmt_employee_attendance.attendance_mode_checkin as attendance_mode_checkin',
                    'vmt_employee_attendance.attendance_mode_checkout as attendance_mode_checkout',
                ]);

            // Biometric
            $query_biometric_response = \DB::table('vmt_staff_attenndance_device')->leftjoin('users', 'users.user_code', '=', 'vmt_staff_attenndance_device.user_id')
                ->leftjoin('vmt_employee_workshifts', 'vmt_employee_workshifts.user_id', '=', 'users.id')
                ->leftjoin('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_workshifts.work_shift_id')
                ->where('users.user_code', $user_code)
                ->orderby('vmt_staff_attenndance_device.date', 'desc')
                ->first([
                    'users.user_code as employee_code',
                    'vmt_staff_attenndance_device.date',
                    'vmt_staff_attenndance_device.date as checkin_time',
                    'vmt_staff_attenndance_device.date as checkin_date',
                    'vmt_staff_attenndance_device.date as checkout_time',
                    'vmt_staff_attenndance_device.date as checkout_date',
                    'vmt_staff_attenndance_device.date as attendance_mode_checkin',
                    'vmt_staff_attenndance_device.date as attendance_mode_checkout',
                ]);

       // dd($query_biometric_response,$query_web_mobile_response);
//get dates from emp_attedance and staff_attedance and store it in an array

            $boimetric_basic_attedance_date = array();
            $query_web_mobile_response_date = null;
            if (!empty($query_web_mobile_response)) {
                array_push($boimetric_basic_attedance_date, $query_web_mobile_response->date);
                $query_web_mobile_response_date = date("Y-m-d", strtotime($query_web_mobile_response->date));
            }

            $query_biometric_response_date = null;
            if (!empty($query_biometric_response)) {
                array_push($boimetric_basic_attedance_date, $query_biometric_response->date);
                $query_biometric_response_date = date("Y-m-d", strtotime($query_biometric_response->date));
            }


//Compare which one is recent date
    $recent_attedance_data =null;
if(!empty($query_biometric_response) || !empty($query_web_mobile_response)){
    $max = max(array_map('strtotime', $boimetric_basic_attedance_date));
    $recent_attedance_data =  date('Y-m-d', $max);
}


            $bio_attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                ->whereDate('date', $recent_attedance_data)
                ->where('direction', 'out')
                ->where('user_Id', $user_code)
                ->first(['check_out_time','date']);


            $bio_attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $recent_attedance_data)
                ->where('direction', 'in')
                ->where('user_Id', $user_code)
                ->first(['check_in_time','date']);

//dd($bio_attendanceCheckIn,$bio_attendanceCheckOut);

            //check wheather employee mode of check-in and check-out is present or not
   if ((empty($query_biometric_response) && empty($query_web_mobile_response))) {

             $response = null;

        }//check employee mode of check-in and check-out in both employee attedance and staff attedance biometric
        else if($query_web_mobile_response_date== $recent_attedance_data && $query_biometric_response_date == $recent_attedance_data ){
        //check which attendance_mode is empty in employee attadance table
            if( empty($query_web_mobile_response->attendance_mode_checkin) || empty($query_web_mobile_response->attendance_mode_checkout)){
              //if is it checkin then directly check on staff attedance table
                if(empty($query_web_mobile_response->attendance_mode_checkin)){

                        $query_web_mobile_response->checkin_time =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_web_mobile_response->checkin_date =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("Y-m-d", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_web_mobile_response->attendance_mode_checkin = empty($bio_attendanceCheckIn->check_in_time) ? null : 'biometric';
                    } //if is it checkout then directly check on staff attedance table
                    else if (empty($query_web_mobile_response->attendance_mode_checkout)) {

                        $query_web_mobile_response->checkout_time = empty($bio_attendanceCheckOut->check_out_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                        $query_web_mobile_response->checkout_date= empty($bio_attendanceCheckOut->check_out_time) ? null : date("Y-m-d", strtotime($bio_attendanceCheckOut->check_out_time));
                        $query_web_mobile_response->attendance_mode_checkout = empty($bio_attendanceCheckOut->check_out_time) ? null : 'biometric';
                    }
            $response =$query_web_mobile_response;
        }else{

            $response = $query_web_mobile_response;
        }

    }//check employee mode of check-in and check-out in  employee attedance
    else if($query_web_mobile_response_date == $recent_attedance_data ){

               //if both attedance modes are present then retrun $query_web_mobile_response
              if(!empty($query_web_mobile_response->attendance_mode_checkin) && !empty($query_web_mobile_response->attendance_mode_checkout)){

                    $response = $query_web_mobile_response;
                } //else check which attendance_mode is empty in staff attedance table
                else if (empty($query_web_mobile_response->attendance_mode_checkin) || empty($query_web_mobile_response->attendance_mode_checkout)) {

                    if (empty($query_web_mobile_response->attendance_mode_checkin)) {

                        $query_web_mobile_response->checkin_time =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_web_mobile_response->checkin_date =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("Y-m-d", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_web_mobile_response->attendance_mode_checkin = empty($bio_attendanceCheckIn->check_in_time) ? null : 'biometric';
                    } else if (empty($query_web_mobile_response->attendance_mode_checkout)) {

                        $query_web_mobile_response->checkout_time = empty($bio_attendanceCheckOut->check_out_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                        $query_web_mobile_response->checkout_date = empty($bio_attendanceCheckOut->check_out_time) ? null : date("Y-m-d", strtotime($bio_attendanceCheckOut->check_out_time));
                        $query_web_mobile_response->attendance_mode_checkout = empty($bio_attendanceCheckOut->check_out_time) ? null : 'biometric';
                    }

                    $response = $query_web_mobile_response;
                }
            } //check employee mode of check-in and check-out in staff attedance biometric
            //else if($query_biometric_response_date == $recent_attedance_data && $biometric_attendanceCheckInTime && $biometric_attendanceCheckoutTime ){
            else if ($query_biometric_response_date == $recent_attedance_data) {

                if (!empty($bio_attendanceCheckIn->check_in_time) && !empty($bio_attendanceCheckOut->check_out_time)) {
                    /*original  data split into date and time in biometric and assign the time to checkin and checkout ,
                then date to Checkin checkout date */
                    $query_biometric_response->date = $recent_attedance_data;
                    $query_biometric_response->checkin_time = date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                    $query_biometric_response->checkout_time = date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                    $query_biometric_response->checkin_date = date("Y-m-d", strtotime($bio_attendanceCheckIn->check_in_time));
                    $query_biometric_response->checkout_date = date("Y-m-d", strtotime($bio_attendanceCheckOut->check_out_time));
                    $query_biometric_response->attendance_mode_checkin = 'biometric';
                    $query_biometric_response->attendance_mode_checkout = 'biometric';

                    $response = $query_biometric_response;

                } else if (empty($bio_attendanceCheckIn->check_in_time) || empty($bio_attendanceCheckOut->check_out_time)) {

                    if (empty($bio_attendanceCheckIn->check_in_time)) {

                     $query_biometric_response->date = $recent_attedance_data;
                     $query_biometric_response->checkin_time =  empty($query_web_mobile_response->check_in_time) ? null : date("H:i:s", strtotime($query_web_mobile_response->check_in_time));
                     $query_biometric_response->checkin_date =  empty($query_web_mobile_response->check_in_time) ? null : date("Y-m-d", strtotime($query_web_mobile_response->check_in_time));
                     $query_biometric_response->attendance_mode_checkin = empty($query_web_mobile_response->attendance_mode_checkin) ? null : $query_web_mobile_response->attendance_mode_checkin;
                     $query_biometric_response->checkout_time =date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                     $query_biometric_response->checkout_date =date("Y-m-d", strtotime($bio_attendanceCheckOut->check_out_time));
                     $query_biometric_response->attendance_mode_checkout = 'biometric';

                    }

                else if(empty($bio_attendanceCheckOut->check_out_time)){

                    $query_biometric_response->date = $recent_attedance_data;
                    $query_biometric_response->checkin_time = date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                    $query_biometric_response->checkin_date= date("Y-m-d", strtotime($bio_attendanceCheckIn->check_in_time));
                    $query_biometric_response->attendance_mode_checkin = 'biometric';
                    $query_biometric_response->checkout_time = empty($query_web_mobile_response->check_out_time) ? null : date("H:i:s", strtotime($query_web_mobile_response->check_out_time));
                    $query_biometric_response->checkout_date = empty($query_web_mobile_response->check_out_time) ? null : date("Y-m-d", strtotime($query_web_mobile_response->check_out_time));
                    $query_biometric_response->attendance_mode_checkout = empty($query_web_mobile_response->attendance_mode_checkout) ? null : $query_web_mobile_response->attendance_mode_checkout;


                    }
                    $response = $query_biometric_response;
                }
            }

            return $response;
        }catch (Exception $e) {
        return response()->json([
            'status' => 'success',
            'message' => 'Error while get latest attedance status',
            'data'   => $e->getmessage(),
        ]);
    }
}





}


