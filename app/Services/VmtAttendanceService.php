<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\vmtHolidays;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeCompensatoryLeave;
use App\Models\VmtLeaves;
use App\Models\VmtWorkShifts;

use Carbon\Carbon;


class VmtAttendanceService{


    public function fetchAttendanceRegularizationData($manager_id = null)
    {
        $allEmployees_lateComing = '';

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');

        $allEmployees_lateComing = null;

        //If manager ID not set, then show all employees
        if(empty($manager_id))
        {
            //If manager ID set, then show only the team level employees

            $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::all();

        }
        else
        {

            //Get all the employees ID for the given manager_id
            $manager_emp_code = User::find($manager_id)->user_code;

            $employees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $manager_emp_code)->pluck('user_id');

            //dd($employees_id);

            $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::whereIn('user_id',$employees_id)->get();
            //dd($allEmployees_lateComing);

        }

        //dd($map_allEmployees->toArray());
        //dd($allEmployees_lateComing->toArray());

        foreach ($allEmployees_lateComing as $singleItem) {

            //check whether user_id from regularization table exists in USERS table
            if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {

                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->user_id);

                //If reviewer_id = 0, then its not yet reviewed
                if ($singleItem->reviewer_id != 0) {
                    $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_id]["name"];
                    $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName($singleItem->reviewer_id);
                }
            }
            else
            {
              //  dd("Missing User ID : " . $singleItem->user_id);
            }
        }

       // dd($allEmployees_lateComing);
        return $allEmployees_lateComing;

    }

    /*
        Get the employee's compensatory work days (Worked on holidays)
        This wont check whether these comp days are used by emps
    */
    private function fetchEmployeeCompensatoryOffDays($user_id){

        //Final array response
        //Get list of holidays
        $query_holidays = vmtHolidays::selectRaw('DATE(holiday_date) as holiday_date')->pluck('holiday_date');

            //Remove the year part
            $query_holidays = $query_holidays->map(function ($item,$key) {
                return substr($item,5);
            });

        $array_query_holidays = $query_holidays->toArray();

        //Get list of attendance days
        $query_emp_attendanceDetails = VmtEmployeeAttendance::where('user_id',$user_id)->get(['id','date'])->keyBy('date')->toArray();
            //dd($query_emp_attendanceDetails);

            //Get only the keys
            $dates_emp_attendanceDetails = array_keys($query_emp_attendanceDetails);
            //dd($dates_emp_attendanceDetails);


            foreach($dates_emp_attendanceDetails as $singleAttendanceDate){

                $trimmed_date = substr($singleAttendanceDate, 5);

                //dd($trimmed_date);

                //Check whether it is in Holiday or not
                if(!in_array($trimmed_date, $array_query_holidays))
                {
                    //If not in holiday, then remove from array
                    unset($query_emp_attendanceDetails[$singleAttendanceDate]);
                }

            }

        //dd($query_emp_attendanceDetails);

        return $query_emp_attendanceDetails;

    }

    /*
        Returns the unused comp off days for the given emp

        Returns a map.

        Eg : {
               "247"                    :  "2023-08-15"
               //("employee_attendance_id" :  "employee_attendance_date")
             }

    */
    public function fetchUnusedCompensatoryOffDays($user_id){

        $final_emp_unused_compdays = array();

        //Get all the comp work days
        $emp_comp_off_days = $this->fetchEmployeeCompensatoryOffDays($user_id);

        //dd($emp_comp_off_days);

        //Check whether its used or not ( Leave request should be Rejected or Not applied)
        //// Create a new array with (k,v)=(attendance_id, [attendance_id, attendance_date])

        $map_comp_off_days = array();

        foreach($emp_comp_off_days as $singleDay){
            //$map_comp_off_days[ $singleDay["id"] ] = $singleDay["date"];
            // array_push($map_comp_off_days, array("emp_attendance_id" => $singleDay["id"],
            //                                      "emp_attendance_date" => $singleDay["date"]));
            $map_comp_off_days[ $singleDay["id"] ] = array("emp_attendance_id" => $singleDay["id"],
                                                 "emp_attendance_date" => $singleDay["date"]);
            //dd($singleDay["id"]);
        }


        //Check whether the comp days exists in this table
        $query_emp_comp_leaves = VmtEmployeeCompensatoryLeave::whereIn('employee_attendance_id',array_keys($map_comp_off_days))->get(['employee_leave_id','employee_attendance_id']);

       // $i = 0;
        //Check whether its leave request is Rejected
        foreach($query_emp_comp_leaves as $singleEmpCompLeave)
        {
            //dd($singleEmpCompLeave);
            $emp_leave = VmtEmployeeLeaves::find($singleEmpCompLeave->employee_leave_id);
            if($emp_leave->exists())
            {
                //dd($emp_leave->status);
                //check the leave status
                if($emp_leave->status != "Rejected")
                {
                    //Remove from $map_comp_off_days
                    unset($map_comp_off_days[$singleEmpCompLeave->employee_attendance_id]);
                }
            }
            else
            {
                dd("ERROR : employee_leave_id ".$singleEmpCompLeave." doesnt exist in vmt_employee_leave table.");
            }


        }

        //Remove the keys and send only the values.
        return array_values($map_comp_off_days);
    }


    public function fetchEmployeeLeaveBalance($user_id)
    {
        $response = array();

          $leaveTypes = VmtLeaves::all();
         $sickLeaveCount =  VmtEmployeeLeaves::where('leave_type_id', '=', '1')->count();
         $CausalLeaveCount =  VmtEmployeeLeaves::where('leave_type_id', '=', '2')->count();
        $earnedleave_count =  VmtEmployeeLeaves::where('leave_type_id', '=', '3')->count();

        $query_emp_leaves = VmtEmployeeLeaves::join('vmt_leaves','vmt_leaves.id','vmt_employee_leaves.leave_type_id')
                                            ->where('user_id', '=' , '174');

        foreach($leaveTypes as $singleLeaveType)
        {
            $response[$singleLeaveType->leave_type] = $query_emp_leaves->where('leave_type_id',$singleLeaveType->id)->get()->count();
        }

        return $response;

    }


    public function  applyLeaveRequest($request){


        $leave_month = date('m',strtotime($request->start_date));
        $compensatory_leavetype_id = VmtLeaves::where('leave_type','LIKE','%Compensatory%')->value('id');

        $leave_type_id = VmtLeaves::where('leave_type',$request->leave_type_name)->value('id');
        //dd($leave_type_id);
        //get the existing Pending/Approved leaves. No need to check Rejected
        $existingNonPendingLeaves = VmtEmployeeLeaves::where('user_id', auth::user()->id)
                                    ->whereMonth('start_date','>=',$leave_month)
                                    ->whereIn('status',['Pending','Approved'])
                                    ->get(['start_date','end_date','status']);

        foreach($existingNonPendingLeaves as $singleLeaveRange){
            //$endDate = new Carbon($singleLeaveRange->end_date);
            //$endDate->addDay();

            //create leave range
            $leave_range = $this->createLeaveRange($singleLeaveRange->start_date, $singleLeaveRange->end_date);

            //dd($leave_range);

            //check with the user given leave range
            foreach ($leave_range as $date) {
                //if date already exists in previous leaves
                // if ($processed_leave_start_date->format('Y-m-d') == $date->format('Y-m-d') || $processed_leave_end_date->format('Y-m-d') == $date->format('Y-m-d'))
                if ($request->start_date == $date->format('Y-m-d') || $request->end_date == $date->format('Y-m-d') )
                {
                    return $response = [
                        'status' => 'failure',
                        'message' => 'Leave Request already applied for this date',
                        'mail_status' => '',
                        'error' => '',
                        'error_verbose' => ''
                    ];
                }
            }
        }

        $diff="ERROR";
        $mailtext_total_leave = " 0-0";


          //Check if its Leave or Permission
        if (isPermissionLeaveType($leave_type_id)) {

            $diff = $request->hours_diff;
            $mailtext_total_leave = $diff . " Hour(s)";
        } else {
            //Now its leave type

            ////Check if its 0.5 day leave, then handle separately

            if($request->no_of_days == '0.5')
            {
                if($request->leave_session == "FN"){
                    $diff = "Fore-noon ";
                } else
                if($request->leave_session == "AN"){
                    $diff = "After-noon ";
                }
            }
            else
            {
                //If its not half day leave, then its fullday or custom days
                $diff = intval($request->no_of_days);
            }

            $mailtext_total_leave = $diff . " Day(s)";
        }


        //Save in DB
        $emp_leave_details =  new VmtEmployeeLeaves;
        $emp_leave_details->user_id = auth::user()->id;
        $emp_leave_details->leave_type_id = $leave_type_id;
        $emp_leave_details->leaverequest_date = $request->leave_request_date;
        $emp_leave_details->start_date = $request->start_date;
        $emp_leave_details->end_date = $request->end_date;
        $emp_leave_details->leave_reason = $request->leave_reason;
        $emp_leave_details->total_leave_datetime = $request->no_of_days." ".$request->leave_session;
        // $emp_leave_details->total_leave_datetime = $diff;


        //get manager of this employee
        $manager_emp_code = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->value('l1_manager_code');
        $manager_name = User::where('user_code', $manager_emp_code)->value('name');
        $manager_id = User::where('user_code', $manager_emp_code)->value('id');

        $emp_leave_details->reviewer_user_id = $manager_id;
        $emp_avatar = json_decode(getEmployeeAvatarOrShortName(auth::user()->id));

        if (!empty($request->notifications_users_id))
            $emp_leave_details->notifications_users_id = implode(",", $request->notifications_users_id);

        $emp_leave_details->reviewer_comments = "";
        $emp_leave_details->status = "Pending";

        //dd($emp_leave_details->toArray());
        $emp_leave_details->save();


        ////If compensatory leave, then store the comp work days in 'vmt_employee_compensatory_leaves'
        if($leave_type_id == $compensatory_leavetype_id)
        {
            $array_comp_work_days_ids = $request->compensatory_work_days_ids == '' ? null : $request->compensatory_work_days_ids;


            if(!empty($array_comp_work_days_ids) && is_array($array_comp_work_days_ids))
            {

                foreach($array_comp_work_days_ids as $singleCompWorkDayID)
                {
                    $emp_compensatory_leave = new VmtEmployeeCompensatoryLeave;
                    $emp_compensatory_leave->employee_leave_id = $emp_leave_details->id;
                    $emp_compensatory_leave->employee_attendance_id = $singleCompWorkDayID;
                    $emp_compensatory_leave->save();
                }
            }
        }
        ////

        //Need to send mail to 'reviewer' and 'notifications_users_id' list
        $reviewer_mail =  VmtEmployeeOfficeDetails::where('user_id', $manager_id)->value('officical_mail');

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        // dd($request->leave_type_id);
        if(!empty($request->notifications_users_id))
            $notification_mails = VmtEmployeeOfficeDetails::whereIn('user_id',$request->notifications_users_id)->pluck('officical_mail');
        else
            $notification_mails = array();


        $isSent    = \Mail::to($reviewer_mail)->cc($notification_mails)->send(new RequestLeaveMail(
                                                    uEmployeeName : auth::user()->name,
                                                    uEmpCode : auth::user()->user_code,
                                                    uEmpAvatar : $emp_avatar,
                                                    uManagerName : $manager_name,
                                                    uLeaveRequestDate : Carbon::parse($request->leave_request_date)->format('M jS Y'),
                                                    uStartDate : Carbon::parse($request->start_date)->format('M jS Y'),
                                                    uEndDate : Carbon::parse($request->end_date)->format('M jS Y'),
                                                    uReason : $request->leave_reason,
                                                    uLeaveType : $request->leave_type_name,
                                                    uTotal_leave_datetime : $mailtext_total_leave,
                                                    //Carbon::parse($request->total_leave_datetime)->format('M jS Y \\, h:i:s A'),
                                                    loginLink : request()->getSchemeAndHttpHost(),
                                                    image_view : $image_view
                                                ));

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }

        $response = [
            'status' => 'success',
            'message' => 'Leave Request applied successfully',
            'mail_status' => $mail_status,
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;

    }


    public function withdrawLeave(Request $request){
        $withdraw_leave_query=VmtEmployeeLeaves::where('id',$request->leave_id)
        ->update(array('status' => 'Withdrawn'));
        $leave_status=VmtEmployeeLeaves::where('id',$request->leave_id)->first()->status;

        $response = [
            'status' => 'success',
            'message' => 'Leave withdrawn successfully',
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;
    }

    public function fetchAttendanceDailyReport_PerMonth($user_code, $year, $month){

        //Get the user_code
        $user_id = User::where('user_code',$user_code)->first()->id;

        $regularTime  = VmtWorkShifts::where('shift_type', 'First Shift')->first();

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
        }//for



        // attendance details from vmt_employee_attenndance table
        $attendance_WebMobile = VmtEmployeeAttendance::where('user_id', $user_id)
            ->whereMonth('date', $month)
            ->orderBy('checkin_time', 'asc')
            ->get(['date', 'checkin_time', 'checkout_time','attendance_mode_checkin','attendance_mode_checkout','selfie_checkin','selfie_checkout']);

            $attendanceResponseArray = [];

            //Create empty month array with all dates.

            if($month < 10)
                $month = "0" . $month;


            $days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);

             for($i=1 ; $i <=$days_count ;$i++)
             {
               $date = "";

               if($i<10)
                 $date = "0".$i;
               else
                 $date = $i;

               $fulldate = $year."-".$month."-".$date;


               $attendanceResponseArray[$fulldate] = array( "user_id"=>$user_id,"isAbsent"=>false, "attendance_mode_checkin"=>null, "attendance_mode_checkout"=>null,
                                                            "absent_status"=>null,"leave_type"=>null,"checkin_time"=>null, "checkout_time"=>null,
                                                            "selfie_checkin"=>null, "selfie_checkout"=>null,
                                                            "isLC"=>false, "lc_status"=>null, "lc_reason"=>null,"lc_reason_custom"=>null,
                                                            "isEG"=>false, "eg_status"=>null, "eg_reason"=>null,"eg_reason_custom"=>null,
                                                            "isMIP"=>false, "mip_status"=>null, "isMOP"=>false, "mop_status"=>null
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
                foreach($value as $singleValue)
                {
                    //Find the min of checkin
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

                //selfies
                //format : http://127.0.0.1:8000/employees/PLIPL068/selfies/checkout.png
                if($singleValue["checkin_time"] && !empty($singleValue["selfie_checkin"]))
                    $attendanceResponseArray[$key]["selfie_checkin"] = 'employees/'.$user_code.'/selfies/'.$singleValue["selfie_checkin"];

                if($singleValue["checkout_time"] && !empty($singleValue["selfie_checkout"]))
                    $attendanceResponseArray[$key]["selfie_checkout"] = 'employees/'.$user_code.'/selfies/'.$singleValue["selfie_checkout"];

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
                if(!empty($checkin_time))
                {

                    $parsedCheckIn_time  = Carbon::parse($checkin_time);

                    //Check whether checkin done on-time
                    $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

                    if($isCheckin_done_ontime)
                    {
                        //employee came on time....

                    }
                    else
                    {
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
                if(!empty($checkout_time))
                {

                    $parsedCheckOut_time  = Carbon::parse($checkout_time);

                    //Check whether checkin done on-time
                    $isCheckOut_doneEarly = $parsedCheckOut_time->lte($shiftEndTime);

                    if($isCheckOut_doneEarly)
                    {
                        //employee left early on time....

                        //then EG
                        $attendanceResponseArray[$key]["isEG"] = true;

                        //check whether regularization applied.
                        $regularization_status = $this->isRegularizationRequestApplied($user_id, $key, 'EG');

                        //check regularization status
                        $attendanceResponseArray[$key]["eg_status"] = $regularization_status;
                    }
                    else
                    {
                        //employee left late

                    }

                }


                //for absent
                if($checkin_time == null && $checkout_time == null){
                    $attendanceResponseArray[$key]["isAbsent"] = true;

                    //Check whether leave is applied or not.
                    $t_leaveRequestDetails = $this->isLeaveRequestApplied($user_id, $key,$year,$month);

                    if(empty($t_leaveRequestDetails))
                    {

                        $attendanceResponseArray[$key]["absent_status"] = "Not Applied";
                        $attendanceResponseArray[$key]["leave_type"] = null;

                    }
                    else
                    {
                        $attendanceResponseArray[$key]["absent_status"] = $t_leaveRequestDetails->status;
                        $attendanceResponseArray[$key]["leave_type"] = $t_leaveRequestDetails->leave_type;
                    }

                }
                elseif($checkin_time != null && $checkout_time == null)
                {

                    //Since its MOP
                    $attendanceResponseArray[$key]["isMOP"] = true;

                    ////Is any permission applied
                    $attendanceResponseArray[$key]["mop_status"] = $this->isRegularizationRequestApplied($user_id, $key, 'MOP');

                    if($attendanceResponseArray[$key]["mop_status"] == "Approved"){

                        //If Approved, then set the regularize time as checkin time
                        $attendanceResponseArray[$key]["checkout_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                                                     ->where('user_id',  $user_id)->where('regularization_type', 'MOP')->value('regularize_time');

                      //  $attendanceResponseArray[$key]["checkin_time"] = ""
                    }


                }
                elseif($checkin_time == null && $checkout_time != null){

                    //Since its MIP
                    $attendanceResponseArray[$key]["isMIP"] = true;

                    ////Is any permission applied
                    $attendanceResponseArray[$key]["mip_status"] = $this->isRegularizationRequestApplied($user_id, $key, 'MIP');

                    if($attendanceResponseArray[$key]["mip_status"] == "Approved"){

                        //If Approved, then set the regularize time as checkin time
                        $attendanceResponseArray[$key]["checkin_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
                                                     ->where('user_id',  $user_id)->where('regularization_type', 'MIP')->value('regularize_time');

                      //  $attendanceResponseArray[$key]["checkin_time"] = ""
                    }


                }

            }//for each


        return $attendanceResponseArray;
    }

    private function isRegularizationRequestApplied($user_id, $attendance_date, $regularizeType)
    {

        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);

       // dd($user_id ." , ". $attendance_date." , ".$regularizeType);

        if ($regularize_record->exists())
        {
            return $regularize_record->value('status');
        }
        else
        {
            return "None";
        }
    }

    public function isLeaveRequestApplied($user_id, $attendance_date,$year,$month){
        // dd($year);

        $leave_Details=VmtEmployeeLeaves::join('vmt_leaves','vmt_leaves.id','=','vmt_employee_leaves.leave_type_id')
                        ->where('user_id',$user_id)
                        ->whereYear('end_date', $year)
                        ->whereMonth('end_date',$month)
                        ->get(['start_date','end_date','status','vmt_leaves.leave_type','total_leave_datetime']);

        if( $leave_Details->count()==0){
            return null;
        }else{
            foreach( $leave_Details as $single_leave_details){
                        $startDate = Carbon::parse($single_leave_details->start_date)->subDay();
                        $endDate = Carbon::parse($single_leave_details->end_date);
                        $currentDate =  Carbon::parse($attendance_date);
                    // dd($startDate.'-----'.$currentDate.'------------'.$endDate.'-----');
                            if($currentDate->gt( $startDate) && $currentDate->lte($endDate) ){
                            // dd($single_leave_details);
                                    return $single_leave_details;

                            }else{
                                $single_leave_details=null;
                            }
            }
            return $single_leave_details;
        }


        //check whether leave applied.If yes, check leave status
        $leave_record = VmtEmployeeLeaves::where('user_id',$user_id)->whereDate('end_date',$attendance_date);

        if($leave_record->exists()){
            return $leave_record->first();
        }
        else
        {
            return null;
        }
    }

}


