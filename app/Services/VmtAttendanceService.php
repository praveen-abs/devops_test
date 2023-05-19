<?php

namespace App\Services;

use App\Mail\ApproveRejectLeaveMail;
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
use App\Models\VmtEmployeesLeavesAccrued;
use App\Models\Department;

use App\Services\VmtNotificationsService;

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;
use App\Models\VmtEmployeeAbsentRegularization;
use App\Models\VmtEmployeeWorkShifts;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use \Datetime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\Models\VmtOrgTimePeriod;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class VmtAttendanceService
{


    public function fetchAttendanceRegularizationData($manager_user_code = null, $month, $year)
    {

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');

        $allEmployees_lateComing = null;

        //If manager ID not set, then show all employees
        if (empty($manager_user_code)) {
            if (empty($month) && empty($year))
                $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::all();
            else
                $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::whereYear('attendance_date', $year)
                    ->whereMonth('attendance_date', $month)
                    ->get();
        } else {
            //If manager ID set, then show only the team level employees

            $employees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $manager_user_code)->pluck('user_id');


            if (empty($month) && empty($year))
                $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::whereIn('user_id', $employees_id)->get();
            else
                $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::whereIn('user_id', $employees_id)
                    ->whereYear('attendance_date', $year)
                    ->whereMonth('attendance_date', $month)
                    ->get();
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
            } else {
                //  dd("Missing User ID : " . $singleItem->user_id);
            }
        }

        // dd($allEmployees_lateComing);
        // return [
        //     "status"=>"success",
        //     "message"=>"",
        //     "data"=>$allEmployees_lateComing
        // ];

        return $allEmployees_lateComing;
    }

    /*
        Get the employee's compensatory work days (Worked on holidays and also in leave days(Eg: Sun , Sat))
        This wont check whether these comp days are used by emps
    */
    private function fetchEmployeeCompensatoryOffDays($user_id){

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
                if(!in_array($trimmed_date, $array_query_holidays) && !in_array($day, $work_leave_days))
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


    public function getEmployeeLeaveBalance($user_code)
    {
        $validator = Validator::make(
            $data = [
                "user_code" => $user_code
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $response = array();

            $leaveTypes = VmtLeaves::all();

            $user_id = User::where('user_code', $user_code)->first()->id;

            $query_emp_leaves = VmtEmployeeLeaves::join('vmt_leaves', 'vmt_leaves.id', 'vmt_employee_leaves.leave_type_id')
                ->where('user_id', $user_id);

            foreach ($leaveTypes as $singleLeaveType) {
                $response[$singleLeaveType->leave_type] = $query_emp_leaves->where('leave_type_id', $singleLeaveType->id)->get()->count();
            }


            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching investments form data",
                "data" => $e,
            ]);
        }
    }

    /*
        For VJS Leave Approvals table

        Returns all leave status types

    */
    private function createLeaveRange($start_date, $end_date)
    {
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);
        $end_date->modify('+1 day'); //For PHP < 8.2, Adding extra date so that the late date is considered. In PHP 8.2 , we have flag to include END DATE

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start_date, $interval, $end_date);

        return $daterange;
    }

    /*

        $hours_diff : For permission only
        $no_of_days, $leave_session : For 0.5 and full day leave types

            // compensatory leaves
            $compensatory_work_days_ids

    */
    public function  applyLeaveRequest(
        $user_id,
        $leave_request_date,
        $start_date,
        $end_date,
        $hours_diff,
        $no_of_days,
        $compensatory_work_days_ids,
        $leave_session,
        $leave_type_name,
        $leave_reason,
        $notifications_users_id,
        VmtNotificationsService $serviceNotificationsService
    ) {

        //Core values needed
        $query_user = User::where('id', $user_id)->first();
        $compensatory_leavetype_id = VmtLeaves::where('leave_type', 'LIKE', '%Compensatory%')->value('id');
        $leave_type_id = VmtLeaves::where('leave_type', $leave_type_name)->value('id');

        //Check whether this user has manager
        $manager_emp_code = VmtEmployeeOfficeDetails::where('user_id', $user_id)->value('l1_manager_code');

        if (empty($manager_emp_code)) {
            return response()->json([
                "status" => "failure",
                "message" => "Manager not found for the given user " . $user_id . " . Kindly contact the admin"
            ]);
        }

        $query_manager = User::where('user_code', $manager_emp_code)->first();
        $manager_name = $query_manager->name;
        $manager_id = $query_manager->id;

        $reviewer_mail =  VmtEmployeeOfficeDetails::where('user_id', $manager_id)->value('officical_mail');

        if (empty($reviewer_mail)) {
            return response()->json([
                "status" => "failure",
                "message" => "Manager mail not defined. Kindly contact the admin"
            ]);
        }


        //Need to split the validation based on leave type so that mandatory fields are checked correctly.
        if (isPermissionLeaveType($leave_type_id)) {

            if (empty($hours_diff)) {
                return response()->json([
                    "status" => "failure",
                    "message" => "hours_diff is missing for given permission type = " . $leave_type_name
                ]);
            }
        } else
        if ($leave_type_id == $compensatory_leavetype_id) {
            if (empty($compensatory_work_days_ids)) {
                return response()->json([
                    "status" => "failure",
                    "message" => "compensatory work days are missing for given leave type = " . $leave_type_name
                ]);
            }
        } else // full day, half-day, custom
        {
            //if half day
            if ($no_of_days == '0.5') {
                if (empty($leave_session)) {
                    return response()->json([
                        "status" => "failure",
                        "message" => "leave_session is missing for given half-day leave type = " . $leave_type_name
                    ]);
                }
            } else //fullday and custom
            {
                //All the validations are done in API level.
                //Need to write in common place for using in web request also
            }
        }

        ////Check whether leave request already exists for the given leave dates

        $leave_month = date('m', strtotime($start_date));

        //get the existing Pending/Approved leaves. No need to check Rejected
        $existingLeavesRequests = VmtEmployeeLeaves::where('user_id', $user_id)
            ->whereMonth('start_date', '>=', $leave_month)
            ->whereIn('status', ['Pending', 'Approved'])
            ->get(['start_date', 'end_date', 'status']);


        foreach ($existingLeavesRequests as $singleExistingLeaveRequest) {

            //If start date and end date of an existing leave request is same, then no need to call createLeaveRange().
            //Just compare start_date with current start_date/end_date leave
            if ($singleExistingLeaveRequest->start_date == $singleExistingLeaveRequest->end_date) {

                $processedStartDate = substr($singleExistingLeaveRequest->start_date, 0, 10);
                $processedEndDate = substr($singleExistingLeaveRequest->end_date, 0, 10);

                if (
                    $processedStartDate == $start_date || $processedEndDate == $start_date ||
                    $processedStartDate == $end_date || $processedEndDate == $end_date
                ) {
                    //dd("single date leave collision");

                    return $response = [
                        'status' => 'failure',
                        'message' => 'Leave Request already applied for the given dates',
                    ];
                }
            } else {

                //create leave range
                $leave_range = $this->createLeaveRange($singleExistingLeaveRequest->start_date, $singleExistingLeaveRequest->end_date);

                //check with the user given leave range
                foreach ($leave_range as $date) {

                    //dd("Given start,end date : ".$start_date. " , ".$end_date);
                    //dd("Currently checking start,end date : ".$date->format('Y-m-d'));

                    //if date already exists in previous leaves
                    // if ($processed_leave_start_date->format('Y-m-d') == $date->format('Y-m-d') || $processed_leave_end_date->format('Y-m-d') == $date->format('Y-m-d'))
                    if ($start_date == $date->format('Y-m-d') || $end_date == $date->format('Y-m-d')) {
                        return $response = [
                            'status' => 'failure',
                            'message' => 'Leave Request already applied for the given dates',
                        ];
                    }
                }
            }
        }

        //dd("Leave doesnt exists");

        $mailtext_total_leave = " 0-0";


        //Check if its Leave or Permission
        if (isPermissionLeaveType($leave_type_id)) {

            $no_of_days = $hours_diff;
            $mailtext_total_leave = $hours_diff . " Hour(s)";
        } else {
            //Now its leave type

            $text_content = 'ERROR';
            ////Check if its 0.5 day leave, then handle separately

            if ($no_of_days == '0.5') {
                if ($leave_session == "FN") {
                    $text_content = "Fore-noon";
                } else
                if ($leave_session == "AN") {
                    $text_content = "After-noon";
                }
            } else {
                //If its not half day leave, then its fullday or custom days
                $text_content = intval($no_of_days);
                $leave_session = ''; //reset
            }

            $mailtext_total_leave = $text_content . " Day(s)";
        }


        //Save in DB
        $emp_leave_details =  new VmtEmployeeLeaves;
        $emp_leave_details->user_id = $user_id;
        $emp_leave_details->leave_type_id = $leave_type_id;
        $emp_leave_details->leaverequest_date = $leave_request_date;
        $emp_leave_details->start_date = $start_date;
        $emp_leave_details->end_date = $end_date;
        $emp_leave_details->leave_reason = $leave_reason;
        $emp_leave_details->total_leave_datetime = $no_of_days . " " . $leave_session;


        //get manager of this employee

        $emp_leave_details->reviewer_user_id = $manager_id;

        if (!empty($notifications_users_id))
            $emp_leave_details->notifications_users_id = implode(",", $notifications_users_id);

        $emp_leave_details->reviewer_comments = "";
        $emp_leave_details->status = "Pending";

        //dd($emp_leave_details->toArray());
        $emp_leave_details->save();


        ////If compensatory leave, then store the comp work days in 'vmt_employee_compensatory_leaves'
        if ($leave_type_id == $compensatory_leavetype_id) {
            $array_comp_work_days_ids = $compensatory_work_days_ids == '' ? null : $compensatory_work_days_ids;


            if (!empty($array_comp_work_days_ids) && is_array($array_comp_work_days_ids)) {

                foreach ($array_comp_work_days_ids as $singleCompWorkDayID) {
                    $emp_compensatory_leave = new VmtEmployeeCompensatoryLeave;
                    $emp_compensatory_leave->employee_leave_id = $emp_leave_details->id;
                    $emp_compensatory_leave->employee_attendance_id = $singleCompWorkDayID;
                    $emp_compensatory_leave->save();
                }
            }
        }
        ////

        //Need to send mail to 'reviewer' and 'notifications_users_id' list

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        //To store notif emails, if no notif emails given , then send this empty array to Mail::
        $notification_mails = array();

        if (!empty($notifications_users_id))
            $notification_mails = VmtEmployeeOfficeDetails::whereIn('user_id', $notifications_users_id)->pluck('officical_mail');

        $emp_avatar = json_decode(getEmployeeAvatarOrShortName($user_id));

        //Save in notifications table
        $serviceNotificationsService->saveNotification(
            user_code: $query_user->user_code,
            notification_title: "Leave request applied",
            notification_body: "Kindly take action",
            redirect_to_module: "Leave Approvals",
            recipient_user_code: $manager_emp_code,
            is_read: 0


        );

        $isSent    = \Mail::to($reviewer_mail)->cc($notification_mails)->send(new RequestLeaveMail(
            uEmployeeName: $query_user->name,
            uEmpCode: $query_user->user_code,
            uEmpAvatar: $emp_avatar,
            uManagerName: $manager_name,
            uLeaveRequestDate: Carbon::parse($leave_request_date)->format('M jS Y'),
            uStartDate: Carbon::parse($start_date)->format('M jS Y'),
            uEndDate: Carbon::parse($end_date)->format('M jS Y'),
            uReason: $leave_reason,
            uLeaveType: $leave_type_name,
            uTotal_leave_datetime: $mailtext_total_leave,
            //Carbon::parse($request->total_leave_datetime)->format('M jS Y \\, h:i:s A'),
            loginLink: request()->getSchemeAndHttpHost(),
            image_view: $image_view
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

    public function approveRejectRevokeLeaveRequest($record_id, $approver_user_code, $status, $review_comment)
    {

        $validator = Validator::make(
            $data = [
                'record_id' => $record_id,
                'approver_user_code' => $approver_user_code,
                'status' => $status,
                'review_comment' => $review_comment,
            ],
            $rules = [
                'record_id' => 'required|exists:vmt_employee_leaves,id',
                'approver_user_code' => 'required|exists:users,user_code',
                'status' => 'required',
                'review_comment' => 'nullable',
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



        //Get the user_code
        $query_user = User::where('user_code', $approver_user_code)->first();
        $approver_user_id = $query_user->id;

        // $approval_status = $request->status;
        $leave_record = VmtEmployeeLeaves::where('id', $record_id)->first();
        //dd($leave_record);
        //dd( $leave_record);
        //dd( $request->status);
        if ($status == "Revoked") {
            $leave_record->is_revoked = "true";
            $leave_record->status = "Pending";
        } else {
            //For Approved or rejected status
            $leave_record->status = $status;
        }

        $leave_record->reviewer_user_id = $approver_user_id;
        $leave_record->reviewer_comments = $review_comment ?? "";
        $leave_record->reviewed_date = Carbon::now();
        $leave_record->save();

        //Send mail to the employee
        $employee_user_id = $leave_record->user_id;
        $employee_mail =  VmtEmployeeOfficeDetails::where('user_id', $employee_user_id)->value('officical_mail');
        $obj_employee = User::where('id', $employee_user_id);
        $manager_user_id = $leave_record->reviewer_user_id;

        $message = "";
        $mail_status = "";

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        $emp_avatar = json_decode(getEmployeeAvatarOrShortName($approver_user_id));


        $isSent    = \Mail::to($employee_mail)->send(
            new ApproveRejectLeaveMail(
                $obj_employee->value('name'),
                $obj_employee->value('user_code'),
                VmtLeaves::find($leave_record->leave_type_id)->leave_type,
                User::find($manager_user_id)->name,
                User::find($manager_user_id)->user_code,
                request()->getSchemeAndHttpHost(),
                $image_view,
                $emp_avatar,
                $status
            )
        );

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }

        if ($status == "Approved")
            $text_status = "approved";
        else
        if ($status == "Rejected")
            $text_status = "rejected";
        else
        if ($status == "Revoked")
            $text_status = "revoked";


        $response = [
            'status' => 'success',
            'message' => 'Leave Request ' . $text_status . ' successfully',
            'mail_status' => $mail_status,
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;
    }


    public function withdrawLeave(Request $request)
    {
        $withdraw_leave_query = VmtEmployeeLeaves::where('id', $request->leave_id)
            ->update(array('status' => 'Withdrawn'));
        $leave_status = VmtEmployeeLeaves::where('id', $request->leave_id)->first()->status;

        $response = [
            'status' => 'success',
            'message' => 'Leave withdrawn successfully',
            'error' => '',
            'error_verbose' => ''
        ];

        return $response;
    }

    public function fetchAttendanceDailyReport_PerMonth($user_code, $year, $month)
    {

        //Get the user_code
        $user_id = User::where('user_code', $user_code)->first()->id;

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
                        ->where('user_id',  $user_id)->where('regularization_type', 'MOP')->value('regularize_time');

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
                        ->where('user_id',  $user_id)->where('regularization_type', 'MIP')->value('regularize_time');

                    //  $attendanceResponseArray[$key]["checkin_time"] = ""
                }
            }
        } //for each


        return $attendanceResponseArray;
    }

    /*
        Get attendance stats data for single month

    */
    public function fetchAttendanceMonthStatsReport($user_code, $year, $month)
    {

        //Get the user_code
        $query_user = User::where('user_code', $user_code)->first();
        $user_id = $query_user->id;

        // code...
        $workingCount = $onTimeCount = $lateCount = $leftTimelyCount = $leftEarlyCount = $onLeaveCount = $absentCount = 0;

        //$reportMonth  = $request->has('month') ? $request->month : date('m');

        //$monthlyGroups = VmtEmployeeAttendance::select(\DB::raw('MONTH(date) month'))->where('user_id', $user_id)->groupBy('month')->orderBy('month', 'DESC')->get();
        //$monthlyReport =  [];

        //foreach ($monthlyGroups as $key => $value) {
        // code...
        //dd($value);
        $dailyAttendanceReport  = VmtEmployeeAttendance::select('id', 'date', 'user_id', 'checkin_time', 'checkout_time', 'leave_type_id', 'shift_type')
            ->where('user_id', $user_id)
            ->whereYear("date", $year)
            ->whereMonth("date", $month)
            ->orderBy('created_at', 'DESC')
            ->get();


        $workingCount = $dailyAttendanceReport->count();

        if ($workingCount == 0) {
            return null;
        } else {
            $onLeaveCount = $dailyAttendanceReport->whereNotNull('leave_type_id')->count();

            $monthlyReport  =  array(
                "year_value" => substr($dailyAttendanceReport[0]["date"], 0, 4),
                "month_value"  => $month,
                "working_days" => $workingCount,
                "on_time" => $onTimeCount,
                "late" => $lateCount,
                "left_timely" => $leftTimelyCount,
                "left_early" => $leftEarlyCount,
                "on_leave" => $onLeaveCount,
                "absent" => $absentCount,
                "daily_attendance_report" => $dailyAttendanceReport
            );
        }

        return $monthlyReport;
    }


    private function isRegularizationRequestApplied($user_id, $attendance_date, $regularizeType)
    {

        $regularize_record = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
            ->where('user_id',  $user_id)->where('regularization_type', $regularizeType);

        // dd($user_id ." , ". $attendance_date." , ".$regularizeType);

        if ($regularize_record->exists()) {
            return $regularize_record->value('status');
        } else {
            return "None";
        }
    }

    public function isLeaveRequestApplied($user_id, $attendance_date, $year, $month)
    {
        // dd($year);

        $leave_Details = VmtEmployeeLeaves::join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('user_id', $user_id)
            ->whereYear('end_date', $year)
            ->whereMonth('end_date', $month)
            ->get(['start_date', 'end_date', 'status', 'vmt_leaves.leave_type', 'total_leave_datetime']);

        if ($leave_Details->count() == 0) {
            return null;
        } else {
            foreach ($leave_Details as $single_leave_details) {
                $startDate = Carbon::parse($single_leave_details->start_date)->subDay();
                $endDate = Carbon::parse($single_leave_details->end_date);
                $currentDate =  Carbon::parse($attendance_date);
                // dd($startDate.'-----'.$currentDate.'------------'.$endDate.'-----');
                if ($currentDate->gt($startDate) && $currentDate->lte($endDate)) {
                    // dd($single_leave_details);
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

    public function applyRequestAbsentRegularization(
        $user_code,
        $attendance_date,
        $regularization_type,
        $checkin_time,
        $checkout_time,
        $reason,
        $custom_reason
    ) {

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "attendance_date" => $attendance_date,
                "regularization_type" => $regularization_type,
                "checkin_time" => $checkin_time,
                "checkout_time" => $checkout_time,
                "reason" => $reason,
                "custom_reason" => $custom_reason,
                // "reviewer_id" => $reviewer_id,
                // "reviewer_comments" => $reviewer_comments,
                // "reviewer_reviewed_date" => $reviewer_reviewed_date,
                // "status" => $status,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'regularization_type' => ['required', Rule::in('Absent Regularization')],
                'attendance_date' => 'required',
                'checkin_time' => 'required',
                'checkout_time' => 'required',
                'reason' => 'required',
                'custom_reason' => 'nullable',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $query_user = User::where('user_code', $user_code)->first();

            $user_id = $query_user->id;

            //Check if already applied
            $query_att = VmtEmployeeAbsentRegularization::where('attendance_date', $attendance_date)
                ->where('user_id',  $user_id);

            if ($query_att->exists()) {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Absent Regularization already applied for the given date',
                    'data' => ''
                ]);
            }

            //fetch the data
            $absent_regularization = new VmtEmployeeAbsentRegularization;
            $absent_regularization->user_id = $user_id;
            $absent_regularization->attendance_date = $attendance_date;
            $absent_regularization->regularization_type = $regularization_type;
            $absent_regularization->checkin_time = $checkin_time;
            $absent_regularization->checkout_time = $checkout_time;
            $absent_regularization->reason = $reason;
            $absent_regularization->custom_reason = $custom_reason ?? '';
            $absent_regularization->status = "Pending";
            $absent_regularization->save();


            //Send mail to manager

            $mail_status = "";

            //Get manager details
            $manager_usercode = VmtEmployeeOfficeDetails::where('user_id', $user_id)->value('l1_manager_code');
            $manager_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->where('users.user_code', $manager_usercode)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

            //dd($manager_details);


            $VmtGeneralInfo = VmtGeneralInfo::first();
            $image_view = url('/') . $VmtGeneralInfo->logo_img;


            $emp_avatar = json_decode(getEmployeeAvatarOrShortName($user_id));


            $isSent    = \Mail::to($manager_details->officical_mail)->send(new VmtAttendanceMail_Regularization(
                $query_user->name,
                $query_user->user_code,
                $emp_avatar,
                $attendance_date,
                $manager_details->name,
                $manager_details->user_code,
                request()->getSchemeAndHttpHost(),
                $image_view,
                $custom_reason,
                "Pending"
            ));

            if ($isSent) {
                $mail_status = "Mail sent successfully";
            } else {
                $mail_status = "There was one or more failures.";
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Absent Regularization applied successfully',
                'mail_status' => $mail_status,
                'data' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ applyRequestAbsentRegularization() ] ",
                'data' => $e
            ]);
        }
    }

    public function applyRequestAttendanceRegularization($user_code, $attendance_date, $regularization_type, $user_time, $regularize_time, $reason, $custom_reason)
    {

        //Get the user_code
        $query_user = User::where('user_code', $user_code)->first();
        $user_id = $query_user->id;

        //Check if already request applied
        $data = VmtEmployeeAttendanceRegularization::where('attendance_date', $attendance_date)
            ->where('user_id',  $user_id)
            ->where('regularization_type',  $regularization_type);

        if ($data->exists()) {
            //dd("Request already applied");
            return $responseJSON = [
                'status' => 'failure',
                'message' => 'Request already applied',
                'mail_status' => 'failure',
                'data' => [],
            ];
        } else {

            //dd("Request not applied");

            if ($regularization_type == 'MIP' || $regularization_type == 'MOP')
                $user_time = null;

            $attendanceRegularizationRequest = new VmtEmployeeAttendanceRegularization;
            $attendanceRegularizationRequest->user_id = $user_id;
            $attendanceRegularizationRequest->attendance_date = $attendance_date;
            $attendanceRegularizationRequest->regularization_type =  $regularization_type;
            $attendanceRegularizationRequest->user_time =  empty($user_time) ? null : Carbon::createFromFormat('H:i:s', $user_time);
            $attendanceRegularizationRequest->regularize_time = Carbon::createFromFormat('H:i:s', $regularize_time);
            $attendanceRegularizationRequest->reason_type = $reason;
            $attendanceRegularizationRequest->custom_reason = $custom_reason ?? '';
            $attendanceRegularizationRequest->status = 'Pending';

            $attendanceRegularizationRequest->save();
        }


        ////Send mail to Manager

        $mail_status = "";

        //Get manager details
        $manager_usercode = VmtEmployeeOfficeDetails::where('user_id', $user_id)->value('l1_manager_code');
        $manager_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.user_code', $manager_usercode)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

        //dd($manager_details);


        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;


        $emp_avatar = json_decode(getEmployeeAvatarOrShortName($user_id));


        $isSent    = \Mail::to($manager_details->officical_mail)->send(new VmtAttendanceMail_Regularization(
            $query_user->name,
            $query_user->user_code,
            $emp_avatar,
            $attendance_date,
            $manager_details->name,
            $manager_details->user_code,
            request()->getSchemeAndHttpHost(),
            $image_view,
            $custom_reason,
            "Pending"
        ));

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }

        return $responseJSON = [
            'status' => 'success',
            'message' => 'Request sent successfully!',
            'mail_status' => $mail_status,
            'data' => [],
        ];
    }

    public function approveRejectAttendanceRegularization($approver_user_code, $record_id, $status, $status_text)
    {

        //Get the user_code
        $query_user = User::where('user_code', $approver_user_code)->first();
        $user_id = $query_user->id;

        $data = VmtEmployeeAttendanceRegularization::find($record_id);
        //dd(!empty($data) && $data->exists());

        if (!empty($data) && $data->exists()) {
            $data->reviewer_id = $user_id;
            $data->reviewer_reviewed_date = Carbon::today()->setTimezone('Asia/Kolkata');
            $data->status = $status;
            $data->reviewer_comments = $status_text ?? '---';

            $data->save();
        } else {
            return $responseJSON = [
                'status' => 'failure',
                'message' => 'Record not found',
                'mail_status' => '',
                'data' => [],
            ];
        }

        //Send mail to Employee

        $mail_status = "";

        //Get employee details
        $employee_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.id', $data->user_id)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

        //dd($employee_details->officical_mail);


        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;
        $emp_avatar = json_decode(getEmployeeAvatarOrShortName($query_user->id));

        $isSent    = \Mail::to($employee_details->officical_mail)->send(new VmtAttendanceMail_Regularization(
            $employee_details->name,
            $employee_details->user_code,
            $emp_avatar,
            $data->attendance_date,
            $query_user->name,
            $query_user->user_code,
            request()->getSchemeAndHttpHost(),
            $image_view,
            $status_text,
            $status
        ));

        if ($isSent) {
            $mail_status = "Mail sent successfully";
        } else {
            $mail_status = "There was one or more failures.";
        }



        return $responseJSON = [
            'status' => 'success',
            'message' => 'Regularization done successfully!',
            'mail_status' => $mail_status,
            'data' => [],
        ];
    }


    public function fetchAttendanceStatus($user_code, $date)
    {

        //Sub-query approach : Need to compare the speed with the below uncommented query
        // $query_response = VmtEmployeeAttendance::where('user_id',  function (Builder $query) use ($user_code) {
        //     $query->select('id')
        //         ->from('users')
        //         ->where('user_code',$user_code);
        // })->get();

        //Joins approach : Need to compare with above query
        $query_response = VmtEmployeeAttendance::join('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
            ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_attendance.vmt_employee_workshift_id')
            ->where('users.user_code', $user_code)
            ->where('vmt_employee_attendance.date', $date)
            ->first([
                'users.user_code as employee_code',
                'vmt_employee_attendance.date',

                'vmt_work_shifts.shift_type as shift_type',
                'vmt_work_shifts.shift_start_time as shift_start_time',
                'vmt_work_shifts.shift_end_time as shift_end_time',

                'vmt_employee_attendance.checkin_time as checkin_time',
                'vmt_employee_attendance.checkout_time as checkout_time',

                'vmt_employee_attendance.attendance_mode_checkin as attendance_mode_checkin',
                'vmt_employee_attendance.attendance_mode_checkout as attendance_mode_checkout',

            ]);

        return $query_response;
    }

    public function performAttendanceCheckIn($user_code, $date, $checkin_time, $selfie_checkin, $work_mode, $attendance_mode_checkin, $checkin_lat_long)
    {

        $user_id = User::where('user_code', $user_code)->first()->id;

        //Check if user already checked-in
        $attendanceCheckin  = VmtEmployeeAttendance::where('user_id', $user_id)->where("date", $date)->first();

        if ($attendanceCheckin) {
            return response()->json([
                'status' => 'failure',
                'message' => 'Check-in already done',
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
        $attendanceCheckin->vmt_employee_workshift_id = "1"; //TODO : Need to fetch from 'vmt_employee_workshifts'
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

    public function performAttendanceCheckOut($user_code, $date, $checkout_time, $selfie_checkout, $work_mode, $attendance_mode_checkout, $checkout_lat_long)
    {

        $user_id = User::where('user_code', $user_code)->first()->id;

        //Check if user already checked-in
        $attendanceCheckout  = VmtEmployeeAttendance::where('user_id', $user_id)->where("date", $date)->whereNull('checkout_time')->orderBy('updated_at', 'DESC')->first();

        if ($attendanceCheckout) {

            //TODO : Need to return if check-out is already done



            //Update existing record
            $attendanceCheckout->checkout_time = $checkout_time;
            $attendanceCheckout->checkout_comments = "";
            $attendanceCheckout->attendance_mode_checkout = $attendance_mode_checkout;
            $attendanceCheckout->checkout_lat_long = $checkout_lat_long ?? '';

            $attendanceCheckout->save();


            // processing and storing base64 files in public/selfies folder
            if (!empty('selfie_checkout')) {

                $emp_selfiedir_path = public_path('employees/' . $user_code . '/selfies/');

                // dd($emp_document_path);
                if (!File::isDirectory($emp_selfiedir_path))
                    File::makeDirectory($emp_selfiedir_path, 0777, true, true);


                $selfieFileEncoded  =  $selfie_checkout;

                $fileName = $attendanceCheckout->id . '_checkout.png';

                \File::put($emp_selfiedir_path . $fileName, base64_decode($selfieFileEncoded));

                $attendanceCheckout->selfie_checkout = $fileName;
            }

            $attendanceCheckout->save();


            return response()->json([
                'status' => 'success',
                'message' => 'Check-out success',
                'data'   => $date
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Unable to check-out since Check-in is not done for the given date',
                'data'   => ""
            ]);
        }
    }


    public function getEmployeeWorkShiftTimings($user_code)
    {
        $validator = Validator::make(
            $data = [
                "user_code" => $user_code
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $user_id = User::where('user_code', $user_code)->first()->id;

            //fetch the data
            $response = VmtEmployeeWorkShifts::join('users', 'users.id', '=', 'vmt_employee_workshifts.user_id')
                ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_workshifts.work_shift_id')
                ->where('users.id', $user_id)
                ->get(['vmt_work_shifts.shift_type', 'vmt_work_shifts.shift_start_time', 'vmt_work_shifts.shift_end_time'])
                ->first();


            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getEmployeeWorkShiftTimings() ] ",
                'data' => $e
            ]);
        }
    }

    /*
        Get the Leave information for the selected leave record_id.
        Used in Leave module ...

    */
    public function getLeaveInformation($record_id){

        $validator = Validator::make(
            $data = [
                "record_id" => $record_id,
            ],
            $rules = [
                'record_id' => 'required|exists:vmt_employee_leaves,id',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try
        {
            $leave_details = VmtEmployeeLeaves::find($record_id);

            $leave_details['user_name'] = User::find($leave_details->user_id)->name;
            $leave_details['leave_type'] = VmtLeaves::find($leave_details->leave_type_id)->leave_type;
            // $leave_details['reviewer_name'] = User::find($leave_details->reviewer_user_id)->name;
            $leave_details['approver_name'] =  User::find($leave_details->reviewer_user_id)->name;
            $leave_details['approver_designation'] = VmtEmployeeOfficeDetails::where('user_id',$leave_details->user_id)->first()->value('designation');

            if(!empty($leave_details->notifications_users_id))
            {
                $leave_details['notification_userName'] = User::find($leave_details->notifications_users_id)->name;
                $leave_details['notification_designation'] = VmtEmployeeOfficeDetails::where('user_id',$leave_details->user_id)->first()->value('designation');
            }
            else
                $leave_details['notification_userName'] = "";

            $leave_details['avatar'] = getEmployeeAvatarOrShortName($leave_details->user_id);

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" =>  $leave_details
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "",
                "data" =>  ''
            ]);
        }

    }

    public function getEmployeeLeaveDetails($user_code, $filter_month, $filter_year, $filter_leave_status)
    {

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "filter_month" => $filter_month,
                "filter_year" => $filter_year,
                "filter_leave_status" => $filter_leave_status,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'filter_month' => 'required',
                'filter_year' => 'required',
                'filter_leave_status' => 'required|in:Approved,Pending,Rejected',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'in' => 'Field <b>:attribute</b> should have the following values : :values .',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $user_id = User::where('user_code', $user_code)->first()->id;

            //fetch the data
            $query_employees_leaves = VmtEmployeeLeaves::join('users', 'users.id', '=', 'vmt_employee_leaves.user_id')
                ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
                ->where('users.id', $user_id)
                ->whereYear('leaverequest_date', $filter_year)
                ->whereMonth('leaverequest_date', $filter_month)
                ->where('status', $filter_leave_status)
                ->get([
                    "vmt_employee_leaves.id",
                    "vmt_employee_leaves.leaverequest_date",
                    "vmt_employee_leaves.start_date",
                    "vmt_employee_leaves.end_date",
                    "vmt_employee_leaves.total_leave_datetime",
                    "vmt_employee_leaves.leave_reason",
                    "vmt_employee_leaves.reviewer_user_id",
                    "vmt_employee_leaves.reviewed_date",
                    "vmt_employee_leaves.reviewer_comments",
                    "vmt_employee_leaves.status",
                    "vmt_employee_leaves.is_revoked",
                    "name",
                    "user_code",
                    "leave_type",
                ]);
             // dd($query_employees_leaves->toArray());
            $query_employees_leaves = $query_employees_leaves->toArray();

            for ($i = 0; $i < count($query_employees_leaves); $i++) {

                $reviewer_name = User::find($query_employees_leaves[$i]["reviewer_user_id"])->name;
                $query_employees_leaves[$i]["reviewer_name"] = $reviewer_name;
            }


            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $query_employees_leaves
            ]);
        } catch (\Exception $e) {
            // dd($e);
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getEmployeeLeaveDetails() ] ",
                'data' => $e
            ]);
        }
    }

    public function getTeamEmployeesLeaveDetails($manager_code, $filter_month, $filter_year, $filter_leave_status)
    {

        $validator = Validator::make(
            $data = [
                "manager_code" => $manager_code,
                "filter_month" => $filter_month,
                "filter_year" => $filter_year,
                "filter_leave_status" => $filter_leave_status,
            ],
            $rules = [

                'manager_code' => 'required',
                'filter_month' => 'required',
                'filter_year' => 'required',
                'filter_leave_status' => 'required|in:Approved,Pending,Rejected',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'in' => 'Field <b>:attribute</b> should have the following values : :values .',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $query_manager_id = User::where('user_code', $manager_code)->first()->id;

            $query_employees_leaves = VmtEmployeeLeaves::join('users', 'users.id', '=', 'vmt_employee_leaves.user_id')
                ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
                ->where('reviewer_user_id', $query_manager_id)
                ->whereYear('leaverequest_date', $filter_year)
                ->whereMonth('leaverequest_date', $filter_month)
                ->where('status', $filter_leave_status)
                ->get([
                    "vmt_employee_leaves.leaverequest_date",
                    "vmt_employee_leaves.start_date",
                    "vmt_employee_leaves.end_date",
                    "vmt_employee_leaves.total_leave_datetime",
                    "vmt_employee_leaves.leave_reason",
                    "vmt_employee_leaves.reviewer_user_id",
                    "vmt_employee_leaves.reviewed_date",
                    "vmt_employee_leaves.reviewer_comments",
                    "vmt_employee_leaves.status",
                    "vmt_employee_leaves.is_revoked",
                    "name",
                    "user_code",
                    "leave_type",
                ]);
            // dd($query_employees_leaves->toArray());
            $query_employees_leaves = $query_employees_leaves->toArray();

            for ($i = 0; $i < count($query_employees_leaves); $i++) {

                $manager_name = User::find($query_employees_leaves[$i]["reviewer_user_id"])->name;
                $query_employees_leaves[$i]["manager_name"] = $manager_name;
            }


            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $query_employees_leaves
            ]);
        } catch (\Exception $e) {
            // dd($e);
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getTeamEmployeesLeaveDetails() ] ",
                'data' => $e
            ]);
        }
    }

    public function getAllEmployeesLeaveDetails($filter_month, $filter_year, $filter_leave_status)
    {

        $validator = Validator::make(
            $data = [
                "filter_month" => $filter_month,
                "filter_year" => $filter_year,
                "filter_leave_status" => $filter_leave_status,
            ],
            $rules = [
                'filter_month' => 'required',
                'filter_year' => 'required',
                'filter_leave_status' => 'required|in:Approved,Pending,Rejected',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'in' => 'Field <b>:attribute</b> should have the following values : :values .',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {


            $query_employees_leaves = VmtEmployeeLeaves::join('users', 'users.id', '=', 'vmt_employee_leaves.user_id')
                ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
                ->whereYear('leaverequest_date', $filter_year)
                ->whereMonth('leaverequest_date', $filter_month)
                ->where('status', $filter_leave_status)
                ->get([
                    "vmt_employee_leaves.leaverequest_date",
                    "vmt_employee_leaves.start_date",
                    "vmt_employee_leaves.end_date",
                    "vmt_employee_leaves.total_leave_datetime",
                    "vmt_employee_leaves.leave_reason",
                    "vmt_employee_leaves.reviewer_user_id",
                    "vmt_employee_leaves.reviewed_date",
                    "vmt_employee_leaves.reviewer_comments",
                    "vmt_employee_leaves.status",
                    "vmt_employee_leaves.is_revoked",
                    "name",
                    "user_code",
                    "leave_type",
                ]);
            // dd($query_employees_leaves->toArray());
            $query_employees_leaves = $query_employees_leaves->toArray();

            for ($i = 0; $i < count($query_employees_leaves); $i++) {

                $manager_name = User::find($query_employees_leaves[$i]["reviewer_user_id"])->name;
                $query_employees_leaves[$i]["manager_name"] = $manager_name;
            }


            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $query_employees_leaves
            ]);
        } catch (\Exception $e) {
            // dd($e);
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getAllEmployeesLeaveDetails() ] ",
                'data' => $e
            ]);
        }
    }



    public function leavetypeAndBalanceDetails($user_id, $start_date, $end_date, $month)
    {
        $leave_details = array();
        $single_user_leave_details = array();
        $accrued_leave_types = VmtLeaves::get();
        foreach ($accrued_leave_types as $single_leave_types) {
            if ($single_leave_types->is_finite == 1) {
                $current_month_avalied_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereMonth('start_date', $month)
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                $till_last_month_avalied_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereBetween('start_date', [$start_date, Carbon::parse($end_date)->subMonth()])
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                if ($single_leave_types->is_carry_forward != 1) {

                    $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                        ->whereBetween('date', [$start_date, $end_date])
                        ->where('leave_type_id', $single_leave_types->id)
                        ->sum('accrued_leave_count');
                } else if ($single_leave_types->is_carry_forward == 1) {
                    $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                        ->where('leave_type_id', $single_leave_types->id)
                        ->sum('accrued_leave_count');
                }
                $single_user_leave_details['leave_type'] = $single_leave_types->leave_type;
                $single_user_leave_details['opening_balance'] =  $total_accrued -  $till_last_month_avalied_leaves;
                $single_user_leave_details['avalied'] =  $current_month_avalied_leaves;
                $single_user_leave_details['closing_balance'] =    $single_user_leave_details['opening_balance'] - $current_month_avalied_leaves;
            } else {
                $current_month_avalied_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereMonth('start_date', $month)
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                $single_user_leave_details['leave_type'] = $single_leave_types->leave_type;
                $single_user_leave_details['opening_balance'] = 0;
                $single_user_leave_details['avalied'] =  $current_month_avalied_leaves;
                $single_user_leave_details['closing_balance'] = 0;
            }
            array_push($leave_details, $single_user_leave_details);
            unset($single_user_leave_details);
        }
        return $leave_details;
    }
    /*

        Get the leave details based on the employee roles.


    */
    public function getLeaveRequestDetailsBasedOnCurrentRole()
    {
        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');
        $map_leaveTypes = VmtLeaves::all(['id', 'leave_type'])->keyBy('id');

        $time_periods_of_year_query = VmtOrgTimePeriod::where('status', 1)->first();
        $start_date =  $time_periods_of_year_query->start_date;

        $end_date   = $time_periods_of_year_query->end_date;

        //Get all the employee's leave details
        if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR'])) {
            $employeeLeaves_Org = '';

            $employeeLeaves_Org = VmtEmployeeLeaves::all();

            foreach ($employeeLeaves_Org as $singleItem) {

                //Map emp names
                if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {

                    $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                    $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->user_id);
                }

                //Map reviewer names
                if (array_key_exists($singleItem->reviewer_user_id, $map_allEmployees->toArray())) {
                    $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                    $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName($singleItem->reviewer_user_id);
                }

                //Map leave types
                $singleItem->leave_type = $map_leaveTypes[$singleItem->leave_type_id]["leave_type"];
            }

            return $employeeLeaves_Org;
        } else         //Get the manager's employees leave details
            if (Str::contains(currentLoggedInUserRole(), ['Manager'])) {
                //Get the list of employees for the given Manager
                $team_employees_ids = VmtEmployeeOfficeDetails::where('l1_manager_code', auth::user()->user_code)->get('user_id');

                //use wherein and fetch the relevant records
                $employeeLeaves_team = VmtEmployeeLeaves::whereIn('user_id', $team_employees_ids)->get();


                //dd($map_allEmployees[1]["name"]);
                foreach ($employeeLeaves_team as $singleItem) {

                    if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {
                        $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                        $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->user_id);
                    }

                    if (array_key_exists($singleItem->reviewer_user_id, $map_allEmployees->toArray())) {

                        $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                        $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName($singleItem->reviewer_user_id);
                    }

                    //Map leave types
                    $singleItem->leave_type = $map_leaveTypes[$singleItem->leave_type_id]["leave_type"];
                }


                //dd($employeeLeaves_team);
                return $employeeLeaves_team;
            } else  ///Get the current employee's leave details
                if (Str::contains(currentLoggedInUserRole(), ['Employee'])) {

                    return VmtEmployeeLeaves::where('user_id', auth::user()->id)
                        ->whereBetween('start_date', [$start_date, $end_date])->get();
                }
    }

    public function fetchOrgLeaveBalance($start_date, $end_date, $month)
    {
        $response = array();
        $all_active_user = User::leftJoin('vmt_employee_details', 'users.id', '=', 'vmt_employee_details.userid')->leftJoin('vmt_employee_office_details', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->where('active', 1)->where('is_ssa', 0)->get(['users.id', 'users.user_code', 'users.name', 'vmt_employee_details.location', 'vmt_employee_office_details.department_id']);
        //  dd( $all_active_user);
        foreach ($all_active_user as $single_user) {
            $total_leave_balance = 0;
            $overall_leave_balance = calculateLeaveDetails($single_user->id, $start_date, $end_date);
            $leavetypeAndBalanceDetails = $this->leavetypeAndBalanceDetails($single_user->id, $start_date, $end_date, $month);
            $each_user['user_code'] = $single_user->user_code;
            $each_user['name'] = $single_user->name;
            $each_user['location'] = $single_user->location;
            if ($single_user->department_id == null) {
                $each_user['department'] = $single_user->department_id;
            } else {
                $each_user['department'] =  Department::where('id', $single_user->department_id)->first()->name;
            }

            foreach ($overall_leave_balance['Leave Balance'] as $single_leave_balance) {
                //   dd($single_leave_balance);
                $total_leave_balance =  $total_leave_balance + $single_leave_balance;
            }
            $each_user['total_leave_balance'] =  $total_leave_balance;
            $each_user['leave_balance_details'] =  $leavetypeAndBalanceDetails;
            array_push($response, $each_user);
        }
        return $response;
    }

    public function teamLeaveBalance($start_date, $end_date, $month)
    {
        $manager_user_code = User::where('id', auth()->user()->id)->first()->user_code;
        $response = array();
        $all_active_user = User::leftJoin('vmt_employee_details', 'users.id', '=', 'vmt_employee_details.userid')->leftJoin('vmt_employee_office_details', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->where('active', 1)->where('is_ssa', 0)
            ->where('vmt_employee_office_details.l1_manager_code', $manager_user_code)->get(['users.id', 'users.user_code', 'users.name', 'vmt_employee_details.location', 'vmt_employee_office_details.department_id']);
        foreach ($all_active_user as $single_user) {
            $total_leave_balance = 0;
            $overall_leave_balance = calculateLeaveDetails($single_user->id, $start_date, $end_date);
            $leavetypeAndBalanceDetails = $this->leavetypeAndBalanceDetails($single_user->id, $start_date, $end_date, $month);
            $each_user['user_code'] = $single_user->user_code;
            $each_user['name'] = $single_user->name;
            $each_user['location'] = $single_user->location;
            if ($single_user->department_id == null) {
                $each_user['department'] = $single_user->department_id;
            } else {
                $each_user['department'] =  Department::where('id', $single_user->department_id)->first()->name;
            }

            foreach ($overall_leave_balance['Leave Balance'] as $single_leave_balance) {
                //   dd($single_leave_balance);
                $total_leave_balance =  $total_leave_balance + $single_leave_balance;
            }
            $each_user['total_leave_balance'] =  $total_leave_balance;
            $each_user['leave_balance_details'] =  $leavetypeAndBalanceDetails;
            array_push($response, $each_user);
        }
        return $response;
    }
}
