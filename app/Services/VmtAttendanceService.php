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
    }


