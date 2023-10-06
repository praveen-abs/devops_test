<?php

namespace App\Services;

use App\Mail\ApproveRejectLeaveMail;
use App\Mail\AttendanceCheckinCheckoutNotifyMail;
use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\vmtHolidays;
use App\Models\VmtEmployeeAttendance;
use Exception;
use App\Models\VmtEmployeeCompensatoryLeave;
use App\Models\VmtLeaves;
use App\Models\VmtWorkShifts;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeesLeavesAccrued;
use App\Models\Department;
use App\Models\VmtStaffAttendanceDevice;
use App\Mail\VmtAbsentMail_Regularization;
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
use Symfony\Component\Mailer\Exception\TransportException;

class VmtAttendanceService
{


    public function fetchAttendanceRegularizationData($month, $year, $manager_user_code = null)
    {

        $validator = Validator::make(
            $data = [
                'manager_user_code' => $manager_user_code,
                'month' => $month,
                'year' => $year,
            ],
            $rules = [
                'manager_user_code' => 'required|exists:users,user_code',
                'month' => 'required',
                'year' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'integer' => 'Field :attribute should be integer',
                'in' => 'Field :attribute is invalid',
            ]
        );

        try {
            $map_allEmployees = User::all(['id', 'name'])->keyBy('id');
            // dd( $map_allEmployees);
            $allEmployees_lateComing = null;

            //If manager ID not set, then show all employees
            // dd($manager_user_code);
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
                // dd( $employees_id );

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
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching Attendance Regularization data",
                "data" => $e,
            ]);
        }
    }





    public function fetchAbsentRegularizationData($month, $year, $manager_user_code = null)
    {

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');

        $allEmployees_lateComing = null;

        //If manager ID not set, then show all employees
        if (empty($manager_user_code)) {
            if (empty($month) && empty($year))
                $allEmployees_lateComing = VmtEmployeeAbsentRegularization::all();
            else
                $allEmployees_lateComing = VmtEmployeeAbsentRegularization::whereYear('attendance_date', $year)
                    ->whereMonth('attendance_date', $month)
                    ->get();
        } else {
            //If manager ID set, then show only the team level employees

            $employees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $manager_user_code)->pluck('user_id');


            if (empty($month) && empty($year))
                $allEmployees_lateComing = VmtEmployeeAbsentRegularization::whereIn('user_id', $employees_id)->get();
            else
                $allEmployees_lateComing = VmtEmployeeAbsentRegularization::whereIn('user_id', $employees_id)
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
    private function fetchEmployeeCompensatoryOffDays($user_id)
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
            //dd( $work_leave_days);

            //Check whether not worked in Holidays or not in work_leave days
            if (!in_array($trimmed_date, $array_query_holidays) && !in_array($day, $work_leave_days)) {
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


            //Accrued Leave Year Frame
            //                if (empty($request->all())) {
            $time_periods_of_year_query = VmtOrgTimePeriod::where('status', 1)->first();
            // } else {
            //     $time_periods_of_year_query = VmtOrgTimePeriod::whereYear('start_date',)->whereMonth('start_date',)
            //         ->whereYear('end_date',)->whereMonth('end_date',)->first();
            // }
            $start_date =  $time_periods_of_year_query->start_date;
            $end_date   = $time_periods_of_year_query->end_date;
            $calender_type = $time_periods_of_year_query->abbrevation;
            // $time_frame = array( $start_date.'/'. $end_date=>$calender_type.' '.substr($start_date, 0, 4).'-'.substr($end_date, 0, 4));
            $time_frame = $calender_type . ' ' . substr($start_date, 0, 4) . '-' . substr($end_date, 0, 4);


            $leave_balance_details = $this->calculateEmployeeLeaveBalance(auth::user()->id, $start_date, $end_date);

            //convert current json response to older JSON structure
            /*
                     Old structure :
                     {
                         "status": "success",
                         "message": "",
                         "data" :{
                             "Earned Leave" : 1,
                             "Permission" : 0,
                             "Maternity Leave" : 0,
                             "Paternity Leave" : 0,
                         }

                     }
                 */
            // dd($leave_balance_details);
            $final_json = array();

            foreach ($leave_balance_details as $singleLeavebalance) {
                //dd($singleLeavebalance["leave_balance"]);
                $final_json[$singleLeavebalance["leave_type"]] = $singleLeavebalance["leave_balance"];
                // dd($final_json);
            }


            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $final_json,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching employee leave balance",
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

    public function applyLeaveRequest_AdminRole(
        $admin_user_code,
        $user_code,
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
        $serviceNotificationsService
    ) {

        $validator = Validator::make(
            $data = [
                'admin_user_code' => $admin_user_code,
                'user_code' => $user_code,
            ],
            $rules = [
                'admin_user_code' => 'required|exists:users,user_code',
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
            $is_admin = User::where('user_code', $admin_user_code)->where('org_role', "2");

            if ($is_admin->exists()) {

                //$is_admin = $is_admin->first();

                $response = $this->applyLeaveRequest(

                    user_code: $user_code,
                    leave_request_date: $leave_request_date,
                    start_date: $start_date,
                    end_date: $end_date,
                    hours_diff: $hours_diff,
                    no_of_days: $no_of_days,
                    compensatory_work_days_ids: $compensatory_work_days_ids,
                    leave_session: $leave_session,
                    leave_type_name: $leave_type_name,
                    leave_reason: $leave_reason,
                    notifications_users_id: $notifications_users_id,
                    user_type: "Admin",
                    serviceNotificationsService: $serviceNotificationsService,
                );

                //dd($response);

                if ($response['status'] == "success") {


                    $user_data = User::where('user_code', $user_code)->first();

                    $record_id = VmtEmployeeLeaves::where('user_id', $user_data->id)->wheredate("start_date", $start_date)->wheredate("end_date", $end_date)->first();

                    $response = $this->approveRejectRevokeLeaveRequest(
                        approver_user_code: $admin_user_code,
                        record_id: $record_id->id,
                        status: "Approved",
                        review_comment: "---",
                        user_type: "Admin",
                        serviceNotificationsService: $serviceNotificationsService


                    );
                }
            } else {
                return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all(),
                    'data' => ""
                ]);
            }
            return $response;
        } catch (\Exception $e) {
            return $response = [
                'status' => 'failure',
                'message' => 'Error while applying leave request',
                'mail_status' => 'failure',
                'notification' => '',
                'data' =>  $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];
        }
    }

    /*

         $hours_diff : For permission only
         $no_of_days, $leave_session : For 0.5 and full day leave types

             // compensatory leaves
             $compensatory_work_days_ids

     */
    public function  applyLeaveRequest(
        $user_code,
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
        $user_type,
        $serviceNotificationsService
    ) {

        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'leave_request_date' => $leave_request_date,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'leave_type_name' => $leave_type_name,
                'leave_reason' => $leave_reason,
                'notifications_users_id' => $notifications_users_id,
                'user_type' => $user_type,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'leave_request_date' => 'required|date',
                'start_date' => "required|date",
                'end_date' => 'required|date',
                'leave_type_name' => 'required|exists:vmt_leaves,leave_type',
                'notifications_users_id' => 'nullable',
                'user_type' => ['required', Rule::in(['Employee', 'Admin'])],
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'integer' => 'Field :attribute should be integer',
                'in' => 'Field :attribute is invalid',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {
            //Core values needed
            $query_user = User::where('user_code', $user_code)->first();

            $compensatory_leavetype_id = VmtLeaves::where('leave_type', 'LIKE', '%Compensatory%')->first()->id;
            $leave_type_id = VmtLeaves::where('leave_type', $leave_type_name)->first()->id;

            //Check whether this user has manager
            $manager_emp_code = VmtEmployeeOfficeDetails::where('user_id', $query_user->id)->first();

            if (empty($manager_emp_code)) {
                return response()->json([
                    "status" => "failure",
                    "message" => "Manager not found for the given user " . $query_user->name . " . Kindly contact the admin"
                ]);
            } else {
                $manager_emp_code = $manager_emp_code->l1_manager_code;
            }

            $query_manager = User::where('user_code', $manager_emp_code)->first();

            $manager_name = $query_manager->name;
            $manager_id = $query_manager->id;

            $reviewer_mail =  VmtEmployeeOfficeDetails::where('user_id', $manager_id)->first()->officical_mail;

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
            $existingLeavesRequests = VmtEmployeeLeaves::where('user_id', $query_user->id)
                ->whereMonth('start_date', '>=', $leave_month)
                ->whereIn('status', ['Pending', 'Approved'])
                ->get(['start_date', 'end_date', 'status']);

            //dd($existingLeavesRequests);

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
            $emp_leave_details->user_id = $query_user->id;
            $emp_leave_details->leave_type_id = $leave_type_id;
            $emp_leave_details->leaverequest_date = $leave_request_date;
            $emp_leave_details->start_date = $start_date;
            $emp_leave_details->end_date = $end_date;
            $emp_leave_details->leave_reason = $leave_reason;
            $emp_leave_details->total_leave_datetime = $no_of_days . " " . $leave_session;


            //get manager of this employee

            $emp_leave_details->reviewer_user_id = $manager_id;

            if (!empty($notifications_users_id))
                $emp_leave_details->notifications_users_id =  $notifications_users_id;

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

            $VmtClientMaster = VmtClientMaster::first();
            $image_view = url('/') . $VmtClientMaster->client_logo;

            //To store notif emails, if no notif emails given , then send this empty array to Mail::
            $notification_mails = array();
            $array_notif_ids = null;

            if (!empty($notifications_users_id)) {
                //Create array from CSV value
                $array_notif_ids = explode(',', $notifications_users_id);



                // dd($array_notif_ids);
                $notification_mails = VmtEmployeeOfficeDetails::whereIn('user_id', $array_notif_ids)->pluck('officical_mail');
            }

            $emp_avatar = json_decode(getEmployeeAvatarOrShortName($query_user->id), true);
            $manager_avatar = json_decode(getEmployeeAvatarOrShortName($query_manager->id), true);
            $emp_designation = VmtEmployeeOfficeDetails::where('user_id', $query_user->id)->first()->designation;

            //Save in notifications table
            // $serviceNotificationsService->saveNotification(
            //     user_code: $query_user->user_code,
            //     notification_title: "Leave request applied",
            //     notification_body: "Kindly take action",
            //     redirect_to_module: "Leave Approvals",
            //     recipient_user_code: $manager_emp_code,
            //     is_read: 0


            // );

            //send notification
            $res_notification = $serviceNotificationsService->sendLeaveApplied_FCMNotification(
                notif_user_id: $query_user->user_code,
                leave_module_type: 'employee_applies_leave',
                manager_user_code: $manager_emp_code,
                notifications_users_id: $array_notif_ids ?? null,
            );

            $mail_status = "";
            $res_notification = "";

            if ($user_type == "Employee") {
                $isSent    = \Mail::to($reviewer_mail)->cc($notification_mails)->send(new RequestLeaveMail(
                    uEmployeeName: $query_user->name,
                    uEmpCode: $query_user->user_code,
                    //uEmpAvatar: $emp_avatar,
                    uManagerName: $manager_name,
                    uLeaveRequestDate: Carbon::parse($leave_request_date)->format('M jS Y'),
                    uStartDate: Carbon::parse($start_date)->format('M jS Y'),
                    uEndDate: Carbon::parse($end_date)->format('M jS Y'),
                    uReason: $leave_reason,
                    uLeaveType: $leave_type_name,
                    uTotal_leave_datetime: $mailtext_total_leave,
                    //Carbon::parse($request->total_leave_datetime)->format('M jS Y \\, h:i:s A'),
                    loginLink: request()->getSchemeAndHttpHost(),
                    image_view: $image_view,
                    emp_image: $emp_avatar,
                    manager_image: $manager_avatar,
                    emp_designation: $emp_designation
                ));


                if ($isSent) {
                    $mail_status = "success";
                } else {
                    $mail_status = "failure";
                }
            }

            $response = [
                'status' => 'success',
                'message' => 'Leave Request applied successfully',
                'mail_status' => $mail_status,
                'notification' => $res_notification,
            ];

            return $response;
        } catch (TransportException $e) {
            $response = [
                'status' => 'success',
                'message' => 'Leave Request applied successfully',
                'mail_status' => 'failure',
                'notification' => $res_notification ?? '',
                'error' => $e->getMessage(),
                'error_verbose' => $e->getTraceAsString(),
            ];

            return $response;
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while applying leave request',
                'mail_status' => 'failure',
                'notification' => '',
                'error' =>  $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];

            return $response;
        }
    }

    public function approveRejectRevokeLeaveRequest($record_id, $approver_user_code, $status, $user_type, $review_comment, $serviceNotificationsService)
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
                'status' => ['required', Rule::in(['Approved', 'Rejected', 'Revoked'])],
                'review_comment' => 'nullable',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'integer' => 'Field :attribute should be integer',
                'in' => 'Field :attribute is invalid',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {
            //Get the user_code
            $query_user = User::where('user_code', $approver_user_code)->first();
            $approver_user_id = $query_user->id;

            // $approval_status = $request->status;
            $leave_record = VmtEmployeeLeaves::where('id', $record_id)->first();

            //Check whether the current status matches with the incoming status.
            if ($leave_record->status == $status) {
                if ($status == "Approved") {
                    $text_status = "approved";
                } else
                if ($status == "Rejected") {
                    $text_status = "rejected";
                }

                return $response = [
                    'status' => 'failure',
                    'message' => 'Leave Request has been already ' . $text_status,
                    'mail_status' => 'Not sent',
                    'notification' => 'Not sent',
                    'error' => '',
                    'error_verbose' => ''
                ];
            }



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
            $employee_mail =  VmtEmployeeOfficeDetails::where('user_id', $employee_user_id)->first()->officical_mail;
            $obj_employee = User::where('id', $employee_user_id)->first();
            $manager_user_id = $leave_record->reviewer_user_id;

            $message = "";
            $mail_status = "";

            $VmtClientMaster = VmtClientMaster::first();
            $image_view = url('/') . $VmtClientMaster->client_logo;

            $emp_avatar = json_decode(getEmployeeAvatarOrShortName($approver_user_id), true);
            $text_status = '';

            if (!empty($user_type) && $user_type == "Admin") {

                $isSent    = \Mail::to($employee_mail)->send(
                    new ApproveRejectLeaveMail(
                        $obj_employee->name,
                        $obj_employee->user_code,
                        VmtLeaves::find($leave_record->leave_type_id)->leave_type,
                        User::find($manager_user_id)->name,
                        User::find($manager_user_id)->user_code,
                        request()->getSchemeAndHttpHost(),
                        $image_view,
                        $emp_avatar,
                        $status,
                        $user_type = "Admin",
                    )
                );

                if ($isSent) {
                    $mail_status = "Mail sent successfully";
                } else {
                    $mail_status = "There was one or more failures.";
                }
            } else {

                $isSent    = \Mail::to($employee_mail)->send(
                    new ApproveRejectLeaveMail(
                        $obj_employee->name,
                        $obj_employee->user_code,
                        VmtLeaves::find($leave_record->leave_type_id)->leave_type,
                        User::find($manager_user_id)->name,
                        User::find($manager_user_id)->user_code,
                        request()->getSchemeAndHttpHost(),
                        $image_view,
                        $emp_avatar,
                        $status,
                        $user_type
                    )

                );
                if ($isSent) {
                    $mail_status = "success";
                } else {
                    $mail_status = "failure";
                }


                if ($status == "Approved") {
                    $text_status = "approved";
                    $leave_module_type = 'manager_approves_leave';
                } else
                if ($status == "Rejected") {
                    $text_status = "rejected";
                    $leave_module_type = 'manager_rejects_leave';
                } else
                if ($status == "Revoked") {
                    $text_status = "revoked";
                    $leave_module_type = 'manager_revokes_leave';
                }

                $users_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $approver_user_code);

                if ($users_id->exists()) {

                    $users_id = $users_id->first()->user_id;

                    $res_notification = $serviceNotificationsService->sendLeaveApplied_FCMNotification(
                        notif_user_id: User::where('id', $users_id)->first()->user_code,
                        leave_module_type: $leave_module_type,
                        manager_user_code: $approver_user_code,
                    );
                }
            }

            $response = [
                'status' => 'success',
                'message' => 'Leave Request ' . $text_status . ' successfully',
                'mail_status' => $mail_status,
                'notification' => $res_notification ?? 'Not sent',
                'error' => '',
                'error_verbose' => ''
            ];

            return $response;
        } catch (TransportException $e) {

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Leave Request ' . $text_status . ' successfully',
                    'mail_status' => 'failure',
                    'error' => $e->getMessage(),
                    'error_verbose' => $e
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ approveRejectRevokeLeaveRequest() ] " . $e->getMessage(),
                'data' => $e->getMessage()
            ]);
        }
    }


    public function withdrawLeave($leave_id)
    {

        $validator = Validator::make(
            $data = [
                "leave_id" => $leave_id,
            ],
            $rules = [
                'leave_id' => 'required|exists:vmt_employee_leaves,id',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'in' => 'Field :attribute is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $leave_details = VmtEmployeeLeaves::find($leave_id);

        //Check whether current loggedin user_id matches with leave's user_id
        if ($leave_details->user_id == auth()->user()->id) {
            $leave_details->status = 'Withdrawn';
            $leave_details->save();
        } else {
            //User id mismatching .
            return [
                'status' => 'failure',
                'message' => 'You are not authorized to perform this operation',
                'error' => 'Unable to withdrawn leave due to mismatch in user_id',
                'error_verbose' => ''
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Leave withdrawn successfully',
            'error' => '',
            'error_verbose' => ''
        ];
    }

    /*
         Get attendance stats data for single month

    */
    public function fetchAttendanceDailyReport_PerMonth_v2($user_code, $year, $month)
    {
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'year' => $year,
                'month' => $month,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'year' => 'required|integer',
                'month' => 'required|integer',
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


        try {

            $user_id = User::where('user_code', $user_code)->first()->id;

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

                    //Need to process the checkin and checkout time based on the client.
                    //Since some client's biometric data has "in/out" direction and some will have only "in" direction
                    //dd(sessionGetSelectedClientCode());

                    //If direction is only "in" or empty or "-"
                    if (
                        sessionGetSelectedClientCode() == "DM" ||

                        sessionGetSelectedClientCode() == "VASA" || sessionGetSelectedClientCode() == "PSC" || sessionGetSelectedClientCode() == "IMA"  || sessionGetSelectedClientCode() == "LAL"
                        || sessionGetSelectedClientCode() == "PLIPL" || sessionGetSelectedClientCode() == "DMC"
                    ) {

                        $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                            ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                            ->whereDate('date', $dateString)
                            ->where('user_Id', $user_code)
                            ->first(['check_out_time']);

                        // if($dateString == "2023-07-05")
                        //     dd($dateString);
                        $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                            ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                            ->whereDate('date', $dateString)
                            ->where('user_Id', $user_code)
                            ->first(['check_in_time']);
                    } else //If direction is only "in" and "out"
                    {
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
                    }


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

            //dd($deviceData);

            // attendance details from vmt_employee_attenndance table
            $attendance_WebMobile = VmtEmployeeAttendance::where('user_id', $user_id)
                ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_attendance.vmt_employee_workshift_id')
                ->whereMonth('date', $month)
                ->orderBy('checkin_time', 'asc')
                ->get(['vmt_work_shifts.shift_code as workshift_code', 'vmt_work_shifts.shift_name as workshift_name', 'vmt_employee_workshift_id', 'date', 'checkin_time', 'checkout_time', 'attendance_mode_checkin', 'attendance_mode_checkout', 'selfie_checkin', 'selfie_checkout']);

            //dd($attendance_WebMobile);


            $attendanceResponseArray = [];

            //Create empty month array with all dates.

            if ($month < 10)
                $month = "0" . $month;

            $year = $year;
            $days_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            for ($i = 1; $i <= $days_count; $i++) {
                $date = "";

                if ($i < 10)
                    $date = "0" . $i;
                else
                    $date = $i;

                $fulldate = $year . "-" . $month . "-" . $date;


                $attendanceResponseArray[$fulldate] = array(
                    "date" => $fulldate,
                    "user_id" => $user_id, "isAbsent" => false, "attendance_mode_checkin" => null, "attendance_mode_checkout" => null,
                    "vmt_employee_workshift_id" => null, "workshift_code" => null, "workshift_name" => null,
                    "absent_status" => null, "leave_type" => null, "checkin_time" => null, "checkout_time" => null,
                    "selfie_checkin" => null, "selfie_checkout" => null,
                    "isLC" => false, "lc_status" => null, "lc_reason" => null, "lc_reason_custom" => null, "lc_regularized_time" => null,
                    "isEG" => false, "eg_status" => null, "eg_reason" => null, "eg_reason_custom" => null, "eg_regularized_time" => null,
                    "isMIP" => false, "mip_status" => null, "mip_reason" => null, "mip_reason_custom" => null, "mip_regularized_time" => null,
                    "isMOP" => false, "mop_status" => null, "mop_reason" => null, "mop_reason_custom" => null, "mop_regularized_time" => null,
                    "absent_reg_status" => null, "absent_reg_checkin" => null, "absent_reg_checkout" => null,
                    "is_holiday" => false, "holiday_name" => "" , "holiday_image_url" => ""
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
                // dd($dateWiseData);
                // dd($value[0]);

                /*
                Here $key is the date. i.e : 2022-10-01

                $value is ::

                    [
                        date=>2022-11-05
                        checkin_time=18:06:00
                        checkout_time=18:06:00
                        attendance_mode="web"
                        vmt_employee_workshift_id ="1" //Employee shift
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
                    // if($singleValue["date"] == '2023-08-05')
                    //     dd($singleValue);
                    //Find the employee_workshift. Right now, we are getting from web/mobile checkin only.
                    //For Biometric, we cant know which shift since the biometric table has no column for storing it
                    //dd($singleValue["vmt_employee_workshift_id"]);
                    //If we found 'vmt_employee_workshift_id', then store it. Else store NULL. In future, we have get shift details from biometric attendance
                    // if (!empty($singleValue["vmt_employee_workshift_id"])) {
                    //     $attendanceResponseArray[$key]["vmt_employee_workshift_id"] = $singleValue["vmt_employee_workshift_id"];
                    //     $attendanceResponseArray[$key]["workshift_code"] = $singleValue["workshift_code"];
                    //     $attendanceResponseArray[$key]["workshift_name"] = $singleValue["workshift_name"];
                    // }
                    //dd( $attendanceResponseArray[$key]);
                    //Find the min of checkin
                    if ($checkin_min == null) {


                        $checkin_min = $singleValue["checkin_time"];
                        $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                    } else
                if (!empty($singleValue["checkin_time"]) && ($checkin_min > $singleValue["checkin_time"])) {
                        //Bug Fixing
                        // if($singleValue["date"] == '2023-08-05')
                        //     dd($singleValue);

                        $checkin_min = $singleValue["checkin_time"];
                        $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
                    }

                    //dd("Min value found : " . $singleValue["checkin_time"]);

                    //Find the max of checkout
                    if ($checkout_max == null) {
                        $checkout_max = $singleValue["checkout_time"];
                        $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
                    } else
                if (!empty($singleValue["checkout_time"]) && $checkout_max < $singleValue["checkout_time"]) {
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

            // dd($attendanceResponseArray);

            //Get all the shift details
            $query_workShifts = VmtWorkShifts::all()->keyBy('id');
            //dd($query_workShifts->toArray()['2']);

            ////Logic to check LC,EG,MIP,MOP,Leave status
            foreach ($attendanceResponseArray as $key => $value) {

               //START : Check whether the given date is holiday or not..
               $current_date =  strtotime($attendanceResponseArray[$key]["date"]);
               //dd("Month:". date('m', $current_date) ." Date:". date('d', $current_date));

               $query_holiday = vmtHolidays::whereMonth('holiday_date', date('m', $current_date) )
                                ->whereDay('holiday_date', date('d', $current_date) )->first();

                if(!empty($query_holiday))
                {
                    $attendanceResponseArray[$key]['is_holiday'] = true;
                    $attendanceResponseArray[$key]['holiday_name'] = $query_holiday->holiday_name;
                    $attendanceResponseArray[$key]['holiday_image_url'] = $query_holiday->image;
                }

                //END : Check whether the given date is holiday or not..
                //dd($attendanceResponseArray);

                $shift_time = $this->getShiftTimeForEmployee($value['user_id'], $value['checkin_time'], $value['checkout_time']);

                //If no shift assigned to user, then return null
                if (!$shift_time) {
                    return 0;
                }

                $attendanceResponseArray[$key]['vmt_employee_workshift_id'] = $shift_time->id;
                $attendanceResponseArray[$key]['workshift_code'] = $shift_time->shift_code;
                $attendanceResponseArray[$key]['workshift_name'] = $shift_time->shift_name;
                //dd($attendanceResponseArray[$key]['vmt_employee_workshift_id']);

                //dd($query_workShifts[$currentdate_workshift]->shift_start_time);
                //dd( $attendanceResponseArray);
                $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
                $checkout_time = $attendanceResponseArray[$key]["checkout_time"];
                //dd($checkin_time);

                // dd(!empty($attendanceResponseArray[$key]['vmt_employee_workshift_id']));
                //Calculate LC, EG only if the current day shifttype is found. If no shifttype found, dont calculate LC, EG. NEED TO CORRECT IT MANUALLY
                if (!empty($attendanceResponseArray[$key]['vmt_employee_workshift_id'])) {

                    //Get the workshift for the current day
                    $currentdate_workshift = $attendanceResponseArray[$key]['vmt_employee_workshift_id'];

                    $shiftStartTime  = Carbon::parse($query_workShifts[$currentdate_workshift]->shift_start_time);
                    $shiftEndTime  = Carbon::parse($query_workShifts[$currentdate_workshift]->shift_end_time);

                    //Attendance regularization check : When checkin and checkout is null
                    if (empty($checkin_time) && empty($checkout_time)) {

                        //check whether att regularization is done for the given date.
                        $query_absent_reg = VmtEmployeeAbsentRegularization::where('user_id', $value['user_id'])->where('attendance_date', $key);

                        if ($query_absent_reg->exists()) {
                            $attendanceResponseArray[$key]["absent_reg_status"] =  $query_absent_reg->first()->status;
                            $attendanceResponseArray[$key]["absent_reg_checkin"] =  $query_absent_reg->first()->checkin_time;
                            $attendanceResponseArray[$key]["absent_reg_checkout"] =  $query_absent_reg->first()->checkout_time;
                        } else {
                            $attendanceResponseArray[$key]["absent_reg_status"] =  'None';
                        }
                    }

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
                            $regularization_record = $this->isRegularizationRequestApplied($user_id, $key, 'LC');

                            //check regularization status
                            $attendanceResponseArray[$key]["lc_status"] =  $regularization_record['status'];
                            $attendanceResponseArray[$key]["lc_reason"] = $regularization_record['reason'];
                            $attendanceResponseArray[$key]["lc_reason_custom"] = $regularization_record['cst_reason'];
                            $attendanceResponseArray[$key]["lc_regularized_time"] = $regularization_record['regularized_time'];
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
                            $regularization_record = $this->isRegularizationRequestApplied($user_id, $key, 'EG');
                            //check regularization status


                            $attendanceResponseArray[$key]["eg_status"] = $regularization_record['status'];
                            $attendanceResponseArray[$key]["eg_reason"] = $regularization_record['reason'];
                            $attendanceResponseArray[$key]["eg_reason_custom"] = $regularization_record['cst_reason'];
                            $attendanceResponseArray[$key]["eg_regularized_time"] = $regularization_record['regularized_time'];
                        } else {
                            //employee left late

                        }
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
                    //check whether regularization applied.
                    $regularization_record = $this->isRegularizationRequestApplied($user_id, $key, 'MOP');

                    //check regularization status
                    $attendanceResponseArray[$key]["mop_status"] = $regularization_record['status'];
                    $attendanceResponseArray[$key]["mop_reason"] =  $regularization_record['reason'];
                    $attendanceResponseArray[$key]["mop_reason_custom"] = $regularization_record['cst_reason'];
                    $attendanceResponseArray[$key]["mop_regularized_time"] = $regularization_record['regularized_time'];


                    if ($attendanceResponseArray[$key]["mop_status"] == "Approved") {

                        //If Approved, then set the regularize time as checkout time
                        $attendanceResponseArray[$key]["checkout_time"] =  $regularization_record['regularized_time'];
                    }
                } elseif ($checkin_time == null && $checkout_time != null) {

                    //Since its MIP
                    $attendanceResponseArray[$key]["isMIP"] = true;

                    ////Is any permission applied
                    $regularization_record = $this->isRegularizationRequestApplied($user_id, $key, 'MIP');

                    //check regularization status
                    $attendanceResponseArray[$key]["mip_status"] = $regularization_record['status'];
                    $attendanceResponseArray[$key]["mip_reason"] =  $regularization_record['reason'];
                    $attendanceResponseArray[$key]["mip_reason_custom"] = $regularization_record['cst_reason'];
                    $attendanceResponseArray[$key]["mip_regularized_time"] = $regularization_record['regularized_time'];


                    if ($attendanceResponseArray[$key]["mip_status"] == "Approved") {

                        //If Approved, then set the regularize time as checkin time
                        $attendanceResponseArray[$key]["checkin_time"] =  $regularization_record['regularized_time'];

                        //  $attendanceResponseArray[$key]["checkin_time"] = ""
                    }
                }
            } //for each

            // dd($attendanceResponseArray);

            return [
                'status' => 'success',
                'message' => 'Attendance Monthly Report fetched successfully',
                'data' => $attendanceResponseArray,
            ];
        } catch (\Throwable $e) {

            return [
                'status' => 'failure',
                'message' => 'Error while fetching Attendance Monthly Report',
                'data' => '',
                'error' => $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];
        }
    }

    // public function fetchAttendanceDailyReport_PerMonth($user_code, $year, $month)
    // {

    //     //Get the user_code
    //     $user_id = User::where('user_code', $user_code)->first()->id;


    //     //TODO : Hardcoded now. Need to fetch based on assigned shift for this employee

    //     $vmt_employee_workshift = VmtEmployeeWorkShifts::where('user_id', $user_id)->where('is_active', '1')->first();

    //     if (empty($vmt_employee_workshift->work_shift_id)) {
    //         return [
    //             'status' => 'failure',
    //             'message' => 'No shift has been assigned',
    //             'data'   => ""
    //         ];
    //     }

    //     //dd($vmt_employee_workshift);
    //     $current_shift_details  = VmtWorkShifts::find($vmt_employee_workshift->work_shift_id);

    //     if (empty($current_shift_details)) {
    //         return [
    //             'status' => 'failure',
    //             'message' => 'Assigned Work shift details are missing or taking too long to load.',
    //             'data'   => ""
    //         ];
    //     }

    //     ////Fetch the attendance reports
    //     //Create date array
    //     $requestedDate = $year . '-' . $month . '-01';
    //     $currentDate = Carbon::now();
    //     $monthDateObj = Carbon::parse($requestedDate);
    //     $startOfMonth = $monthDateObj->startOfMonth(); //->format('Y-m-d');
    //     $endOfMonth   = $monthDateObj->endOfMonth(); //->format('Y-m-d');


    //     if ($currentDate->lte($endOfMonth)) {
    //         $lastAttendanceDate  = $currentDate; //->format('Y-m-d');
    //     } else {
    //         $lastAttendanceDate  = $endOfMonth; //->format('Y-m-d');
    //     }

    //     $totalDays  = $lastAttendanceDate->format('d');
    //     $firstDateStr  = $monthDateObj->startOfMonth()->toDateString();



    //     // attendance details from vmt_staff_attenndance_device table
    //     $deviceData = [];
    //     for ($i = 0; $i < ($totalDays); $i++) {
    //         // code...
    //         $dayStr = Carbon::parse($firstDateStr)->addDay($i)->format('l');

    //         if ($dayStr != 'Sunday') {

    //             $dateString  = Carbon::parse($firstDateStr)->addDay($i)->format('Y-m-d');
    //             $client_code = User::join('vmt_client_master', 'vmt_client_master.id', '=', 'users.client_id')
    //                 ->where('users.user_code', $user_code)->first()->client_code;
    //             if ($client_code == "DM" || $client_code == "PLIPL") {
    //                 $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
    //                     ->whereDate('date', $dateString)
    //                     ->where('user_Id', $user_code)
    //                     ->first(['check_out_time']);

    //                 $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
    //                     ->whereDate('date', $dateString)
    //                     ->where('user_Id',  $user_code)
    //                     ->first(['check_in_time']);
    //             } else {
    //                 $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
    //                     ->whereDate('date', $dateString)
    //                     ->where('direction', 'out')
    //                     ->where('user_Id', $user_code)
    //                     ->first(['check_out_time']);

    //                 $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
    //                     ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
    //                     ->whereDate('date', $dateString)
    //                     ->where('direction', 'in')
    //                     ->where('user_Id', $user_code)
    //                     ->first(['check_in_time']);
    //             }

    //             $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
    //             $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];

    //             if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
    //                 $deviceData[] = array(
    //                     'date' => $dateString,
    //                     'checkin_time' => $deviceCheckInTime,
    //                     'checkout_time' => $deviceCheckOutTime,
    //                     'attendance_mode_checkin' => 'biometric',
    //                     'attendance_mode_checkout' => 'biometric'
    //                 );
    //             }
    //         }
    //     } //for



    //     // attendance details from vmt_employee_attenndance table
    //     $attendance_WebMobile = VmtEmployeeAttendance::where('user_id', $user_id)
    //         ->whereMonth('date', $month)
    //         ->orderBy('checkin_time', 'asc')
    //         ->get(['date', 'checkin_time', 'checkout_time', 'attendance_mode_checkin', 'attendance_mode_checkout', 'selfie_checkin', 'selfie_checkout']);

    //     $attendanceResponseArray = [];

    //     //Create empty month array with all dates.

    //     if ($month < 10)
    //         $month = "0" . $month;


    //     $days_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    //     for ($i = 1; $i <= $days_count; $i++) {
    //         $date = "";

    //         if ($i < 10)
    //             $date = "0" . $i;
    //         else
    //             $date = $i;

    //         $fulldate = $year . "-" . $month . "-" . $date;


    //         $attendanceResponseArray[$fulldate] = array(
    //             "user_id" => $user_id, "isAbsent" => false, "attendance_mode_checkin" => null, "attendance_mode_checkout" => null,
    //             "absent_status" => null, "leave_type" => null, "checkin_time" => null, "checkout_time" => null,
    //             "selfie_checkin" => null, "selfie_checkout" => null,
    //             "isLC" => false, "lc_status" => null, "lc_reason" => null, "lc_reason_custom" => null,
    //             "isEG" => false, "eg_status" => null, "eg_reason" => null, "eg_reason_custom" => null,
    //             "isMIP" => false, "mip_status" => null, "isMOP" => false, "mop_status" => null
    //         );

    //         //echo "Date is ".$fulldate."\n";
    //         ///$month_array[""]
    //     }


    //     // merging result from both table
    //     $merged_attendanceData  = array_merge($deviceData, $attendance_WebMobile->toArray());
    //     $dateCollectionObj    =  collect($merged_attendanceData);

    //     $sortedCollection   =   $dateCollectionObj->sortBy([
    //         ['date', 'asc'],
    //     ]);

    //     $dateWiseData         =  $sortedCollection->groupBy('date'); //->all();
    //     //dd($merged_attendanceData);
    //     //dd($dateWiseData);
    //     foreach ($dateWiseData  as $key => $value) {

    //         // dd($value[0]);

    //         /*
    //                  Here $key is the date. i.e : 2022-10-01

    //                  $value is ::

    //                      [
    //                          date=>2022-11-05
    //                          checkin_time=18:06:00
    //                          checkout_time=18:06:00
    //                          attendance_mode="web"
    //                      ],
    //                      [
    //                          ....
    //                          attendance_mode="biometric"

    //                      ]

    //              */
    //         //Compare the checkin,checkout time between all attendance modes and get the min(checkin) and max(checkout)

    //         $checkin_min = null;
    //         $checkout_max = null;
    //         $attendance_mode_checkin = null;
    //         $attendance_mode_checkout = null;

    //         //dd($value);
    //         foreach ($value as $singleValue) {
    //             //Find the min of checkin
    //             if ($checkin_min == null) {
    //                 $checkin_min = $singleValue["checkin_time"];
    //                 $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
    //             } else
    //                  if ($checkin_min > $singleValue["checkin_time"]) {
    //                 $checkin_min = $singleValue["checkin_time"];
    //                 $attendance_mode_checkin = $singleValue["attendance_mode_checkin"];
    //             }

    //             //dd("Min value found : " . $singleValue["checkin_time"]);

    //             //Find the max of checkin
    //             if ($checkout_max == null) {
    //                 $checkout_max = $singleValue["checkout_time"];
    //                 $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
    //             } else
    //                  if ($checkout_max < $singleValue["checkout_time"]) {
    //                 $checkout_max = $singleValue["checkout_time"];
    //                 $attendance_mode_checkout = $singleValue["attendance_mode_checkout"];
    //             }
    //         }

    //         //dd("end : Check-in : ".$checkin_min." , Check-out : ".$checkout_max);

    //         //dd($value[0]["attendance_mode"]);
    //         $attendanceResponseArray[$key]["checkin_time"] = $checkin_min;
    //         $attendanceResponseArray[$key]["checkout_time"] = $checkout_max;

    //         //TODO :: Based on which checkin, checkout time taken, its corresponding attendance modes has to be assigned here
    //         $attendanceResponseArray[$key]["attendance_mode_checkin"] = $attendance_mode_checkin;
    //         $attendanceResponseArray[$key]["attendance_mode_checkout"] = $attendance_mode_checkout;

    //         //selfies
    //         //format : http://127.0.0.1:8000/employees/PLIPL068/selfies/checkout.png
    //         if ($singleValue["checkin_time"] && !empty($singleValue["selfie_checkin"]))
    //             $attendanceResponseArray[$key]["selfie_checkin"] = 'employees/' . $user_code . '/selfies/' . $singleValue["selfie_checkin"];

    //         if ($singleValue["checkout_time"] && !empty($singleValue["selfie_checkout"]))
    //             $attendanceResponseArray[$key]["selfie_checkout"] = 'employees/' . $user_code . '/selfies/' . $singleValue["selfie_checkout"];
    //     }
    //     //dd($attendanceResponseArray);

    //     $shiftStartTime  = Carbon::parse($current_shift_details->shift_start_time);
    //     $shiftEndTime  = Carbon::parse($current_shift_details->shift_end_time);

    //     ////Logic to check LC,EG,MIP,MOP,Leave status
    //     foreach ($attendanceResponseArray as $key => $value) {

    //         $checkin_time = $attendanceResponseArray[$key]["checkin_time"];
    //         $checkout_time = $attendanceResponseArray[$key]["checkout_time"];


    //         //LC Check
    //         if (!empty($checkin_time)) {

    //             $parsedCheckIn_time  = Carbon::parse($checkin_time);

    //             //Check whether checkin done on-time
    //             $isCheckin_done_ontime = $parsedCheckIn_time->lte($shiftStartTime);

    //             if ($isCheckin_done_ontime) {
    //                 //employee came on time....

    //             } else {
    //                 //employee came on time....
    //                 //dd("Checkin NOT on-time");

    //                 //then LC
    //                 $attendanceResponseArray[$key]["isLC"] = true;

    //                 //check whether regularization applied.
    //                 $regularization_status = $this->isRegularizationRequestApplied($user_id, $key, 'LC');

    //                 //check regularization status
    //                 $attendanceResponseArray[$key]["lc_status"] = $regularization_status;
    //             }
    //         }


    //         //EG Check
    //         //check if its EG
    //         if (!empty($checkout_time)) {

    //             $parsedCheckOut_time  = Carbon::parse($checkout_time);

    //             //Check whether checkin done on-time
    //             $isCheckOut_doneEarly = $parsedCheckOut_time->lte($shiftEndTime);

    //             if ($isCheckOut_doneEarly) {
    //                 //employee left early on time....

    //                 //then EG
    //                 $attendanceResponseArray[$key]["isEG"] = true;

    //                 //check whether regularization applied.
    //                 $regularization_status = $this->isRegularizationRequestApplied($user_id, $key, 'EG');

    //                 //check regularization status
    //                 $attendanceResponseArray[$key]["eg_status"] = $regularization_status;
    //             } else {
    //                 //employee left late

    //             }
    //         }


    //         //for absent
    //         if ($checkin_time == null && $checkout_time == null) {
    //             $attendanceResponseArray[$key]["isAbsent"] = true;

    //             //Check whether leave is applied or not.
    //             $t_leaveRequestDetails = $this->isLeaveRequestApplied($user_id, $key, $year, $month);

    //             if (empty($t_leaveRequestDetails)) {

    //                 $attendanceResponseArray[$key]["absent_status"] = "Not Applied";
    //                 $attendanceResponseArray[$key]["leave_type"] = null;
    //             } else {
    //                 $attendanceResponseArray[$key]["absent_status"] = $t_leaveRequestDetails->status;
    //                 $attendanceResponseArray[$key]["leave_type"] = $t_leaveRequestDetails->leave_type;
    //             }
    //         } elseif ($checkin_time != null && $checkout_time == null) {

    //             //Since its MOP
    //             $attendanceResponseArray[$key]["isMOP"] = true;

    //             ////Is any permission applied
    //             $attendanceResponseArray[$key]["mop_status"] = $this->isRegularizationRequestApplied($user_id, $key, 'MOP');

    //             if ($attendanceResponseArray[$key]["mop_status"] == "Approved") {

    //                 //If Approved, then set the regularize time as checkin time
    //                 $attendanceResponseArray[$key]["checkout_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
    //                     ->where('user_id',  $user_id)->where('regularization_type', 'MOP')->first()->regularize_time;

    //                 //  $attendanceResponseArray[$key]["checkin_time"] = ""
    //             }
    //         } elseif ($checkin_time == null && $checkout_time != null) {

    //             //Since its MIP
    //             $attendanceResponseArray[$key]["isMIP"] = true;

    //             ////Is any permission applied
    //             $attendanceResponseArray[$key]["mip_status"] = $this->isRegularizationRequestApplied($user_id, $key, 'MIP');

    //             if ($attendanceResponseArray[$key]["mip_status"] == "Approved") {

    //                 //If Approved, then set the regularize time as checkin time
    //                 $attendanceResponseArray[$key]["checkin_time"] =  VmtEmployeeAttendanceRegularization::where('attendance_date', $key)
    //                     ->where('user_id',  $user_id)->where('regularization_type', 'MIP')->first()->regularize_time;

    //                 //  $attendanceResponseArray[$key]["checkin_time"] = ""
    //             }
    //         }
    //     } //for each


    //     return $attendanceResponseArray;
    // }

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
        $record = array();
        if ($regularize_record->exists()) {
            unset($record);
            $record['status'] = $regularize_record->value('status');
            $record['regularized_time'] = $regularize_record->value('regularize_time');
            // dd($regularize_record->value('reason_type'));
            if ($regularize_record->value('reason_type') == 'Others') {
                $record['reason'] = $regularize_record->value('reason_type');
                $record['cst_reason'] = $regularize_record->value('custom_reason');
            } else {
                $record['reason'] = $regularize_record->value('reason_type');
                $record['cst_reason'] = null;
            }
        } else {
            unset($record);
            $record['status'] = "None";
            $record['reason'] = "None";
            $record['cst_reason'] = null;
            $record['regularized_time'] = null;
        }
        return  $record;
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
        $custom_reason,
        $user_type
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
                'in' => 'Field :attribute is invalid',
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
                return $response = ([
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
            $manager_usercode = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first()->l1_manager_code;
            $manager_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->where('users.user_code', $manager_usercode)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

            //dd($manager_details);


            $VmtClientMaster = VmtClientMaster::first();
            $image_view = url('/') . $VmtClientMaster->client_logo;

            $emp_avatar = json_decode(getEmployeeAvatarOrShortName($user_id));
            $isSent = null;

            if (!empty($user_type) && $user_type != "Admin") {
                if (empty($manager_details)) {
                    //Manager mail is empty or no manager assigned. Cant send mail
                    return response()->json([
                        'status' => 'failure',
                        'message' => "Manager mail is not found. Kindly contact the Admin.",
                        'data' => ''
                    ]);
                } else {
                    //If Manager mail is available, then send mail
                    $isSent    = \Mail::to($manager_details->officical_mail)->send(new VmtAbsentMail_Regularization(
                        $query_user->name,
                        $query_user->user_code,
                        $emp_avatar,
                        $attendance_date,
                        $manager_details->name,
                        $manager_details->user_code,
                        request()->getSchemeAndHttpHost(),
                        $image_view,
                        $custom_reason,
                        "Pending",
                        "",
                    ));
                }

                if ($isSent) {
                    $mail_status = "Mail sent successfully";
                } else {
                    $mail_status = "There was one or more failures.";
                }
            }

            return $response = ([
                'status' => 'success',
                'message' => 'Absent Regularization applied successfully',
                'mail_status' => $mail_status,
                'data' => ''
            ]);
        } catch (TransportException $e) {

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Absent Regularization applied successfully',
                    'mail_status' => 'failure',
                    'error' => $e->getMessage(),
                    'error_verbose' => $e
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ applyRequestAbsentRegularization() ] " . $e->getMessage(),
                'data' => $e->getMessage()
            ]);
        }
    }

    public function getAttendanceRegularizationStatus($user_code, $regularization_date, $regularization_type)
    {

        //Sample Input : ABS1006, 2023-07-29, LC
        //Sample Output : JSON structure of table row

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "regularization_date" => $regularization_date,
                "regularization_type" => $regularization_type,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'regularization_type' => ['required', Rule::in(['LC', 'EG', 'MIP', 'MOP', 'Absent Regularization'])],
                'regularization_date' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'in' => 'Field :attribute is invalid',
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

            if (Str::contains($regularization_type, ['LC', 'EG', 'MIP', 'MOP'])) {

                //Check if already request applied
                $data = VmtEmployeeAttendanceRegularization::where('attendance_date', $regularization_date)
                    ->where('user_id',  $user_id)
                    ->where('regularization_type',  $regularization_type);

                if ($data->exists()) {

                    //Adding 'is_exists' key for quick checking in frontend
                    $data = [
                        "is_exists" => 1,
                        "data" => $data->get()
                    ];

                    return $responseJSON = [
                        'status' => 'success',
                        'message' => 'Attendance Regularization status fetched successfully',
                        'data' => $data
                    ];
                } else {
                    //If data doesnt exists, then send 0

                    return $responseJSON = [
                        'status' => 'success',
                        'message' => 'Attendance Regularization status fetched successfully',
                        'data' => [
                            "is_exists" => 0
                        ]
                    ];
                }
            } else
             if (Str::contains($regularization_type, ['Absent Regularization'])) {
            }

            //,'Absent Regularization'

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error while fetching Attendance Regularization Status",
                'data' => "Error[ getAttendanceRegularizationStatus() ] " . $e->getMessage(),
            ]);
        }
    }

    public function applyRequestAttendanceRegularization($user_code, $attendance_date, $regularization_type, $user_time, $regularize_time, $reason, $custom_reason, $user_type, VmtNotificationsService $serviceVmtNotificationsService)
    {

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "attendance_date" => $attendance_date,
                "regularization_type" => $regularization_type,
                "user_time" => $user_time,
                "regularize_time" => $regularize_time,
                "reason" => $reason,
                "custom_reason" => $custom_reason,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                "attendance_date" => "required",
                'regularization_type' => ['required', Rule::in(['LC', 'EG', 'MIP', 'MOP'])],
                "user_time" => "nullable",
                "regularize_time" => "required",
                "reason" => "required", //
                "custom_reason" => "nullable",
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "required_with" => "Field :attribute is missing",
                'in' => 'Field :attribute is invalid',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {
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
                    'mail_status' => '',
                    'data' => [],
                ];
            } else {

                //dd("Request not applied");

                //For LC, EG : user_time is mandatory , So check it
                if (($regularization_type == 'LC' || $regularization_type == 'EG') && empty($user_time)) {
                    //if user_time is null, then throw error
                    return $responseJSON = [
                        'status' => 'failure',
                        'message' => 'User Time is missing',
                        'mail_status' => '',
                        'data' => [],
                    ];
                } else
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
            $res_notification = "";
            $mail_status = "";
            $isSent = "";

            //Get manager details
            $manager_usercode = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first()->l1_manager_code;
            $manager_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->where('users.user_code', $manager_usercode)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

            if (!empty($user_type) && $user_type != "Admin") {
                //Check if manager's mail exists or not
                if (!empty($manager_details)) {
                    //dd($manager_details);


                    $VmtClientMaster = VmtClientMaster::first();
                    $image_view = url('/') . $VmtClientMaster->client_logo;


                    $emp_avatar = json_decode(getEmployeeAvatarOrShortName($user_id), true);


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
                        "Pending",
                        $user_type = "",
                    ));

                    if ($isSent) {
                        $mail_status = "Mail sent successfully";
                    } else {
                        $mail_status = "There was one or more failures.";
                    }
                }


                if ($regularization_type == 'LC') {

                    $attendance_regularization_type = 'employee_applies_lc';
                } else if ($regularization_type == 'EG') {

                    $attendance_regularization_type = 'employee_applies_eg';
                } else if ($regularization_type == 'MOP') {

                    $attendance_regularization_type = 'employee_applies_mop';
                } else if ($regularization_type == 'MIP') {

                    $attendance_regularization_type = 'employee_applies_mip';
                }

                $res_notification = $serviceVmtNotificationsService->send_attendance_regularization_FCMNotification(
                    notif_user_id: $user_id,
                    attendance_regularization_type: $attendance_regularization_type,
                    manager_user_code: $manager_usercode,
                );
            }


            return [
                'status' => 'success',
                'message' => 'Request sent successfully!',
                'notification_status' => $res_notification,
                'mail_status' => $mail_status,
                'data' => [],
            ];
        } catch (TransportException $e) {

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Attendance Regularization applied successfully',
                    'mail_status' => 'failure',
                    'error' => $e->getMessage(),
                    'error_verbose' => $e
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ applyRequestAttendanceRegularization() ] " . $e->getMessage(),
                'data' => $e->getMessage()
            ]);
        }
    }

    public function approveRejectAttendanceRegularization($approver_user_code, $record_id, $status, $status_text, $user_type, VmtNotificationsService $serviceVmtNotificationsService)
    {

        //Validate the request
        $validator = Validator::make(
            $data = [
                'approver_user_code' => $approver_user_code,
                'record_id' => $record_id,
                'status' => $status,
                'status_text' => $status_text,
            ],
            $rules = [
                'approver_user_code' => 'required|exists:users,user_code',
                'record_id' => 'required|exists:vmt_employee_attendance_regularizations,id',
                'status' => ['required', Rule::in(['Approved', 'Rejected'])],
                'status_text' => 'nullable',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'integer' => 'Field :attribute should be integer',
                'in' => 'Field :attribute is invalid',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }



        try {
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
            if (!empty($user_type) && $user_type == "Admin") {

                $employee_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->where('users.id', $data->user_id)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

                //dd($employee_details->officical_mail);


                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;
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
                    $status,
                    $user_type = "Admin",
                ));

                if ($isSent) {
                    $mail_status = "Mail sent successfully";
                } else {
                    $mail_status = "There was one or more failures.";
                }
            } else {

                $employee_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->where('users.id', $data->user_id)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

                //dd($employee_details->officical_mail);


                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;
                $emp_avatar = json_decode(newgetEmployeeAvatarOrShortName($query_user->id), true);
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
                    $status,
                    $user_type = "manager",

                ));

                if ($isSent) {
                    $mail_status = "Mail sent successfully";
                } else {
                    $mail_status = "There was one or more failures.";
                }
                if ($status == 'Approved') {

                    $attendance_regularization_type = 'manager_approves_attendance_reg';
                } else if ($status == 'Rejected') {

                    $attendance_regularization_type = 'manager_rejects_attendance_reg';
                }

                $res_notification = $serviceVmtNotificationsService->send_attendance_regularization_FCMNotification(
                    notif_user_id: $data->user_id,
                    attendance_regularization_type: $attendance_regularization_type,
                    manager_user_code: $approver_user_code,
                );
            }

            return $responseJSON = [
                'status' => 'success',
                'message' => 'Regularization done successfully!',
                'notification_status' => $res_notification ?? "",
                'mail_status' => $mail_status,
                'data' => [],
            ];
        } catch (TransportException $e) {

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Attendance Regularization approval successful',
                    'mail_status' => 'failure',
                    'error' => $e->getMessage(),
                    'error_string' => $e->getTraceAsString(),
                    'error_verbose' => $e->getline(),
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ approveRejectAttendanceRegularization() ) ] ",
                'error_string' => $e->getTraceAsString(),
                'data' => $e->getMessage(),
                'error_line' => $e->getline(),
            ]);
        }
    }

    public function approveRejectAbsentRegularization($approver_user_code, $record_id, $status, $status_text, $user_type)
    {
        try {
            // dd($approver_user_code, $record_id, $status, $status_text);
            //Get the user_code
            $query_user = User::where('user_code', $approver_user_code)->first();
            $user_id = $query_user->id;

            $data = VmtEmployeeAbsentRegularization::find($record_id);
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
            if (!empty($user_type) && $user_type == "Admin") {

                //Get employee details
                $employee_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->where('users.id', $data->user_id)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

                //dd($employee_details->officical_mail);


                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;
                $emp_avatar = json_decode(getEmployeeAvatarOrShortName($query_user->id));

                $isSent    = \Mail::to($employee_details->officical_mail)->send(new VmtAbsentMail_Regularization(
                    $employee_details->name,
                    $employee_details->user_code,
                    $emp_avatar,
                    $data->attendance_date,
                    $query_user->name,
                    $query_user->user_code,
                    request()->getSchemeAndHttpHost(),
                    $image_view,
                    $status_text,
                    $status,
                    "Admin"
                ));

                if ($isSent) {
                    $mail_status = "Mail sent successfully";
                } else {
                    $mail_status = "There was one or more failures.";
                }
            } else {
                $employee_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->where('users.id', $data->user_id)->first(['users.name', 'users.user_code', 'vmt_employee_office_details.officical_mail']);

                //dd($employee_details->officical_mail);


                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;
                $emp_avatar = json_decode(getEmployeeAvatarOrShortName($query_user->id));

                $isSent    = \Mail::to($employee_details->officical_mail)->send(new VmtAbsentMail_Regularization(
                    $employee_details->name,
                    $employee_details->user_code,
                    $emp_avatar,
                    $data->attendance_date,
                    $query_user->name,
                    $query_user->user_code,
                    request()->getSchemeAndHttpHost(),
                    $image_view,
                    $status_text,
                    $status,
                    "manager"
                ));

                if ($isSent) {
                    $mail_status = "Mail sent successfully";
                } else {
                    $mail_status = "There was one or more failures.";
                }
            }
            // if ($status == 'Approved') {

            //     $attendance_regularization_type = 'manager_approves_attendance_reg';
            // } else if ($status == 'Rejected') {

            //     $attendance_regularization_type = 'manager_rejects_attendance_reg';
            // }

            // $res_notification = $serviceVmtNotificationsService->send_attendance_regularization_FCMNotification(
            //     notif_user_id: $data->user_id,
            //     attendance_regularization_type: $attendance_regularization_type,
            //     manager_user_code: $approver_user_code,
            // );

            return $responseJSON = [
                'status' => 'success',
                'message' => 'Absent Regularization done successfully!',
                'mail_status' => $mail_status,
                'data' => [],
            ];
        } catch (TransportException $e) {

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Absent Regularization approval successful',
                    'mail_status' => 'failure',
                    'error' => $e->getMessage(),
                    'error_verbose' => $e->getTraceAsString()
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error while doing absent regularization",
                'data' => $e->getMessage() . "  " . $e->getTraceAsString()
            ]);
        }
    }


    /*
         Get attendance status for the given date


     */
    public function fetchAttendanceStatus($user_code, $date)
    {
        $response = null;
        //Sub-query approach : Need to compare the speed with the below uncommented query
        // $query_web_mobile_response = VmtEmployeeAttendance::where('user_id',  function (Builder $query) use ($user_code) {
        //     $query->select('id')
        //         ->from('users')
        //         ->where('user_code',$user_code);
        // })->get();

        //Joins approach : Need to compare with above query
        $query_web_mobile_response = VmtEmployeeAttendance::join('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
            ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_attendance.vmt_employee_workshift_id')
            ->where('users.user_code', $user_code)
            ->where('vmt_employee_attendance.date', $date)
            ->first([
                'users.user_code as employee_code',
                'vmt_employee_attendance.date',

                'vmt_work_shifts.shift_name as shift_name',
                'vmt_work_shifts.shift_start_time as shift_start_time',
                'vmt_work_shifts.shift_end_time as shift_end_time',

                'vmt_employee_attendance.checkin_time as checkin_time',
                'vmt_employee_attendance.checkout_time as checkout_time',

                'vmt_employee_attendance.attendance_mode_checkin as attendance_mode_checkin',
                'vmt_employee_attendance.attendance_mode_checkout as attendance_mode_checkout',

            ]);

        $query_biometric_response = \DB::table('vmt_staff_attenndance_device')->leftjoin('users', 'users.user_code', '=', 'vmt_staff_attenndance_device.user_id')
            ->leftjoin('vmt_employee_workshifts', 'vmt_employee_workshifts.user_id', '=', 'users.id')
            ->leftjoin('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_workshifts.work_shift_id')
            ->where('users.user_code', $user_code)
            ->whereDate('vmt_staff_attenndance_device.date', $date)
            ->groupBy('vmt_staff_attenndance_device.date')
            ->first([
                'users.user_code as employee_code',
                'vmt_staff_attenndance_device.date',

                'vmt_work_shifts.shift_name as shift_name',
                'vmt_work_shifts.shift_start_time as shift_start_time',
                'vmt_work_shifts.shift_end_time as shift_end_time',

                'vmt_staff_attenndance_device.date as checkin_time',
                'vmt_staff_attenndance_device.date as checkout_time',

                'vmt_staff_attenndance_device.date as attendance_mode_checkin',
                'vmt_staff_attenndance_device.date as attendance_mode_checkout',
            ]);


        $bio_attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
            ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
            ->whereDate('date', $date)
            ->where('direction', 'in')
            ->where('user_Id', $user_code)
            ->first(['check_in_time']);


        $bio_attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
            ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
            ->whereDate('date', $date)
            ->where('direction', 'out')
            ->where('user_Id', $user_code)
            ->first(['check_out_time']);


        if (!empty($query_web_mobile_response->attendance_mode_checkin) && !empty($query_web_mobile_response->attendance_mode_checkout)) {

            $response = $query_web_mobile_response;
        } else if (!empty($bio_attendanceCheckIn->check_in_time) && !empty($bio_attendanceCheckOut->check_out_time)) {

            /*original  date data split into date and time in biometric and assign the time to checkin and checkout ,
                 then date to date and attedance mode.*/
            $query_biometric_response->date = $date;
            $query_biometric_response->checkin_time = date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
            $query_biometric_response->checkout_time = date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
            $query_biometric_response->attendance_mode_checkin = 'biometric';
            $query_biometric_response->attendance_mode_checkout = 'biometric';

            $response = $query_biometric_response;
        } else if (!empty($query_biometric_response) && (empty($bio_attendanceCheckIn->check_in_time) || empty($bio_attendanceCheckOut->check_out_time))) {


            if (empty($bio_attendanceCheckIn->check_in_time)) {

                $query_biometric_response->date = $date;
                $query_biometric_response->checkin_time =  empty($query_web_mobile_response->check_in_time) ? null : date("H:i:s", strtotime($query_web_mobile_response->check_in_time));
                $query_biometric_response->attendance_mode_checkin = empty($query_web_mobile_response->attendance_mode_checkin) ? null : $query_web_mobile_response->attendance_mode_checkin;
                $query_biometric_response->checkout_time = date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                $query_biometric_response->attendance_mode_checkin = 'biometric';
            } else if (empty($bio_attendanceCheckIn->check_out_time)) {

                $query_biometric_response->date = $date;
                $query_biometric_response->checkin_time = date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                $query_biometric_response->attendance_mode_checkin = 'biometric';
                $query_biometric_response->checkout_time = empty($query_web_mobile_response->check_out_time) ? null : date("H:i:s", strtotime($query_web_mobile_response->check_out_time));
                $query_biometric_response->attendance_mode_checkout = empty($query_web_mobile_response->attendance_mode_checkout) ? null : $query_web_mobile_response->attendance_mode_checkout;
            }
            $response = $query_biometric_response;
        } else if (!empty($query_web_mobile_response) && (empty($query_web_mobile_response->attendance_mode_checkin) || empty($query_web_mobile_response->attendance_mode_checkout))) {


            if (empty($query_web_mobile_response->attendance_mode_checkin)) {

                $query_web_mobile_response['checkin_time'] =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                $query_web_mobile_response['attendance_mode_checkin'] = empty($bio_attendanceCheckIn->check_in_time) ? null : 'biometric';
            } else if (empty($query_web_mobile_response->attendance_mode_checkout)) {

                $query_web_mobile_response['checkout_time'] = empty($bio_attendanceCheckOut->check_out_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                $query_web_mobile_response['attendance_mode_checkout'] = empty($bio_attendanceCheckOut->check_out_time) ? null : 'biometric';
            }

            $response = $query_web_mobile_response;
        } else {

            $response = null;
        }

        return $response;
    }

    /*
         Get the last attendance date status of the given user_code.
         If checkout was not done, then checkout date will be NULL.

     */
    public function getLastAttendanceStatus($user_code)
    {

        //Web/mobile attendance
        try {
            $response = null;

            $query_web_mobile_response = VmtEmployeeAttendance::join('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
                ->join('vmt_work_shifts', 'vmt_work_shifts.id', '=', 'vmt_employee_attendance.vmt_employee_workshift_id')
                ->where('users.user_code', $user_code)
                ->orderBy('vmt_employee_attendance.date', 'desc')
                ->first([
                    'users.user_code as employee_code',
                    'vmt_employee_attendance.date',
                    'vmt_work_shifts.shift_name as shift_name',
                    'vmt_work_shifts.shift_start_time as shift_start_time',
                    'vmt_work_shifts.shift_end_time as shift_end_time',
                    'vmt_employee_attendance.checkin_time as checkin_time',
                    'vmt_employee_attendance.checkout_time as checkout_time',
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
                    'vmt_work_shifts.shift_name as shift_name',
                    'vmt_work_shifts.shift_start_time as shift_start_time',
                    'vmt_work_shifts.shift_end_time as shift_end_time',
                    'vmt_staff_attenndance_device.date as checkin_time',
                    'vmt_staff_attenndance_device.date as checkout_time',
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
            $recent_attedance_data = null;
            if (!empty($query_biometric_response) || !empty($query_web_mobile_response)) {
                $max = max(array_map('strtotime', $boimetric_basic_attedance_date));
                $recent_attedance_data =  date('Y-m-d', $max);
            }

            //get check-in and check-out date from staff_attedance

            //   $bio_attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
            //   ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
            //   ->whereDate('date', $recent_attedance_data)
            //   ->where('user_Id', $user_code)
            //   ->first(['check_out_time']);
            //   $biometric_attendanceCheckoutTime=date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time)) > strtotime('12:00:00') ;

            //   $bio_attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
            //   ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
            //   ->whereDate('date', $recent_attedance_data)
            //   ->where('user_Id',  $user_code)
            //   ->first(['check_in_time']);
            //   $biometric_attendanceCheckInTime= date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time)) < strtotime('12:00:00') ;

            $bio_attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                ->whereDate('date', $recent_attedance_data)
                ->where('direction', 'out')
                ->where('user_Id', $user_code)
                ->first(['check_out_time']);


            $bio_attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $recent_attedance_data)
                ->where('direction', 'in')
                ->where('user_Id', $user_code)
                ->first(['check_in_time']);

            //dd($bio_attendanceCheckIn,$bio_attendanceCheckOut);

            //check wheather employee mode of check-in and check-out is present or not
            if ((empty($query_biometric_response) && empty($query_web_mobile_response))) {

                $response = null;
            } //check employee mode of check-in and check-out in both employee attedance and staff attedance biometric
            else if ($query_web_mobile_response_date == $recent_attedance_data && $query_biometric_response_date == $recent_attedance_data) {
                //check which attendance_mode is empty in employee attadance table
                if (empty($query_web_mobile_response->attendance_mode_checkin) || empty($query_web_mobile_response->attendance_mode_checkout)) {
                    //if is it checkin then directly check on staff attedance table
                    if (empty($query_web_mobile_response->attendance_mode_checkin)) {

                        $query_web_mobile_response->checkin_time =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_web_mobile_response->attendance_mode_checkin = empty($bio_attendanceCheckIn->check_in_time) ? null : 'biometric';
                    } //if is it checkout then directly check on staff attedance table
                    else if (empty($query_web_mobile_response->attendance_mode_checkout)) {

                        $query_web_mobile_response->checkout_time = empty($bio_attendanceCheckOut->check_out_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                        $query_web_mobile_response->attendance_mode_checkout = empty($bio_attendanceCheckOut->check_out_time) ? null : 'biometric';
                    }
                    $response = $query_web_mobile_response;
                } else {

                    $response = $query_web_mobile_response;
                }
            } //check employee mode of check-in and check-out in  employee attedance
            else if ($query_web_mobile_response_date == $recent_attedance_data) {

                //if both attedance modes are present then retrun $query_web_mobile_response
                if (!empty($query_web_mobile_response->attendance_mode_checkin) && !empty($query_web_mobile_response->attendance_mode_checkout)) {

                    $response = $query_web_mobile_response;
                } //else check which attendance_mode is empty in staff attedance table
                else if (empty($query_web_mobile_response->attendance_mode_checkin) || empty($query_web_mobile_response->attendance_mode_checkout)) {

                    if (empty($query_web_mobile_response->attendance_mode_checkin)) {

                        $query_web_mobile_response->checkin_time =  empty($bio_attendanceCheckIn->check_in_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_web_mobile_response->attendance_mode_checkin = empty($bio_attendanceCheckIn->check_in_time) ? null : 'biometric';
                    } else if (empty($query_web_mobile_response->attendance_mode_checkout)) {

                        $query_web_mobile_response->checkout_time = empty($bio_attendanceCheckOut->check_out_time) ? null : date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
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
                    $query_biometric_response->attendance_mode_checkin = 'biometric';
                    $query_biometric_response->attendance_mode_checkout = 'biometric';

                    $response = $query_biometric_response;
                } else if (empty($bio_attendanceCheckIn->check_in_time) || empty($bio_attendanceCheckOut->check_out_time)) {

                    if (empty($bio_attendanceCheckIn->check_in_time)) {

                        $query_biometric_response->date = $recent_attedance_data;
                        $query_biometric_response->checkin_time =  empty($query_web_mobile_response->check_in_time) ? null : date("H:i:s", strtotime($query_web_mobile_response->check_in_time));
                        $query_biometric_response->attendance_mode_checkin = empty($query_web_mobile_response->attendance_mode_checkin) ? null : $query_web_mobile_response->attendance_mode_checkin;
                        $query_biometric_response->checkout_time = date("H:i:s", strtotime($bio_attendanceCheckOut->check_out_time));
                        $query_biometric_response->attendance_mode_checkout = 'biometric';
                    } else if (empty($bio_attendanceCheckOut->check_out_time)) {

                        $query_biometric_response->date = $recent_attedance_data;
                        $query_biometric_response->checkin_time = date("H:i:s", strtotime($bio_attendanceCheckIn->check_in_time));
                        $query_biometric_response->attendance_mode_checkin = 'biometric';
                        $query_biometric_response->checkout_time = empty($query_web_mobile_response->check_out_time) ? null : date("H:i:s", strtotime($query_web_mobile_response->check_out_time));
                        $query_biometric_response->attendance_mode_checkout = empty($query_web_mobile_response->attendance_mode_checkout) ? null : $query_web_mobile_response->attendance_mode_checkout;
                    }
                    $response = $query_biometric_response;
                }
            }

            return $response;
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'success',
                'message' => 'Error while getting latest attendance status',
                'data'   => $e->getmessage(),
            ]);
        }
    }



    public function performAttendanceCheckIn($user_code, $date, $checkin_time, $selfie_checkin, $work_mode, $attendance_mode_checkin, $checkin_lat_long)
    {

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "date" => $date,
                "checkin_time" => $checkin_time,
                "selfie_checkin" => $selfie_checkin,
                "work_mode" => $work_mode,
                "attendance_mode_checkin" => $attendance_mode_checkin,
                "checkin_lat_long" => $checkin_lat_long,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "date" => "required",
                "checkin_time" => "required",
                "selfie_checkin" => "nullable",
                "work_mode" => "required", //office, work
                "attendance_mode_checkin" => "required", //mobile, web
                "checkin_lat_long" => "nullable", //stores in lat , long
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

            $query_user = User::where('user_code', $user_code)->first();
            $user_id = $query_user->id;

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

            $vmt_employee_workshift = VmtEmployeeWorkShifts::where('user_id', $user_id)->where('is_active', '1')->first();

            if (empty($vmt_employee_workshift->work_shift_id)) {
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
            if (!empty($selfie_checkin)) {

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

            //Check whether check-in time is LC...

            $current_workshift_timings = Carbon::parse(VmtWorkShifts::find($vmt_employee_workshift->work_shift_id)->shift_start_time);
            $parsed_checkin_time = Carbon::parse($checkin_time);
            $isSent = "NA";

            //If its LC, then send mail
            if ($parsed_checkin_time->gt($current_workshift_timings)) {
                //Send notification mail
                $user_mail = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first()->officical_mail;

                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;
                $emp_avatar = json_decode(newgetEmployeeAvatarOrShortName(auth::user()->id), true);

                // $isSent    = \Mail::to($user_mail)->send(new AttendanceCheckinCheckoutNotifyMail(
                //     $query_user->name,
                //     $query_user->user_code,
                //     Carbon::parse($date)->format('M jS, Y'),
                //     Carbon::parse($checkin_time)->format('h:i:s A'),
                //     $image_view,
                //     $emp_avatar,
                //     request()->getSchemeAndHttpHost(),
                //     "LC"
                // ));
            }


            if ($isSent) {
                $mail_status = "success";
            } else {
                $mail_status = "failure";
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Check-in success',
                'mail_status' => $mail_status ?? 'NA',
                'data'   => ''
            ]);
        } catch (TransportException $e) {
            $response = [
                'status' => 'success',
                'message' => 'Check-in success.',
                'mail_status' => 'failure',
                'notification' => '',
                'error' => $e->getMessage(),
                'error_verbose' => $e->getline(),
            ];

            return $response;
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while check-in',
                'mail_status' => 'failure',
                'notification' => '',
                'error' =>  $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];

            return $response;
        }
    }

    public function performAttendanceCheckOut($user_code, $existing_check_in_date, $checkout_time, $selfie_checkout, $work_mode, $attendance_mode_checkout, $checkout_lat_long)
    {

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "existing_check_in_date" => $existing_check_in_date,
                "checkout_time" => $checkout_time,
                "selfie_checkout" => $selfie_checkout,
                "work_mode" => $work_mode,
                "attendance_mode_checkout" => $attendance_mode_checkout,
                "checkout_lat_long" => $checkout_lat_long,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "existing_check_in_date" => "required",
                "checkout_time" => "required",
                "selfie_checkout" => "nullable",
                "work_mode" => "required", //office, work
                "attendance_mode_checkout" => "required", //mobile, web
                "checkout_lat_long" => "nullable", //stores in lat , long
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

            $query_user = User::where('user_code', $user_code)->first();
            $user_id = $query_user->id;

            //Check if workshift assigned for user
            $vmt_employee_workshift = VmtEmployeeWorkShifts::where('user_id', $user_id)->where('is_active', '1')->first();

            if (empty($vmt_employee_workshift->work_shift_id)) {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'No shift has been assigned',
                    'data'   => ""
                ]);
            }

            //Check if user already checked-out
            $existing_att_details  = VmtEmployeeAttendance::where('user_id', $user_id)->where("date", $existing_check_in_date)->first();

            //Check if user checked-in or not
            $bio_attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $existing_check_in_date)
                ->where('direction', 'in')
                ->where('user_Id', $user_code)
                ->first(['check_in_time']);

            //Checkout date will be current date...
            $t_checkout_date = date("Y-m-d");

            //If check-in exists and checkout doesnt exist, then its normal checkout
            if (!empty($existing_att_details) && empty($existing_att_details->checkout_time)) {


                //TODO : Need to return if check-out is already done

                //Update existing record
                $existing_att_details->checkout_time = $checkout_time;
                $existing_att_details->checkout_date = $t_checkout_date;
                $existing_att_details->checkout_comments = "";
                $existing_att_details->attendance_mode_checkout = $attendance_mode_checkout;
                $existing_att_details->checkout_lat_long = $checkout_lat_long ?? '';
                $existing_att_details->save();
                // processing and storing base64 files in public/selfies folder
                if (!empty($selfie_checkout)) {

                    $emp_selfiedir_path = public_path('employees/' . $user_code . '/selfies/');

                    // dd($emp_document_path);
                    if (!File::isDirectory($emp_selfiedir_path))
                        File::makeDirectory($emp_selfiedir_path, 0777, true, true);


                    $selfieFileEncoded  =  $selfie_checkout;

                    $fileName = $existing_att_details->id . '_checkout.png';

                    \File::put($emp_selfiedir_path . $fileName, base64_decode($selfieFileEncoded));

                    $existing_att_details->selfie_checkout = $fileName;
                }

                $existing_att_details->save();
            } else // If existing record not in emp-att table but available in Biometric table, then add new entry in emp-att table
                if (empty($existing_att_details) && !empty($bio_attendanceCheckIn->check_in_time)) {

                    $existing_att_details = new VmtEmployeeAttendance;
                    $existing_att_details->date = $existing_check_in_date;
                    $existing_att_details->checkout_time = $checkout_time;
                    $existing_att_details->user_id = $user_id;
                    $existing_att_details->work_mode = $work_mode;
                    $existing_att_details->checkout_date = $t_checkout_date;
                    $existing_att_details->checkout_comments = "";
                    $existing_att_details->attendance_mode_checkout = $attendance_mode_checkout;
                    $existing_att_details->vmt_employee_workshift_id = $vmt_employee_workshift->work_shift_id;
                    $existing_att_details->checkout_lat_long = $checkout_lat_long ?? '';
                    $existing_att_details->save();

                    // processing and storing base64 files in public/selfies folder
                    if (!empty('selfie_checkout')) {

                        $emp_selfiedir_path = public_path('employees/' . $user_code . '/selfies/');

                        // dd($emp_document_path);
                        if (!File::isDirectory($emp_selfiedir_path))
                            File::makeDirectory($emp_selfiedir_path, 0777, true, true);


                        $selfieFileEncoded  =  $selfie_checkout;

                        $fileName = $existing_att_details->id . '_checkout.png';

                        \File::put($emp_selfiedir_path . $fileName, base64_decode($selfieFileEncoded));

                        $existing_att_details->selfie_checkout = $fileName;
                    }

                    $existing_att_details->save();
                } else // If record doesnt exist in emp_table and biometric table, then its error
                {
                    return response()->json([
                        'status' => 'failure',
                        'message' => 'Unable to check-out since Check-in is not done for the given date or Check-out is already done',
                        'data'   => ""
                    ]);
                }

            //Check whether check-in time is EG...

            $current_workshift_timings = Carbon::parse(VmtWorkShifts::find($vmt_employee_workshift->work_shift_id)->shift_end_time);
            $parsed_checkout_time = Carbon::parse($checkout_time);
            $isSent = "NA";

            //If its EG, then send mail
            if ($parsed_checkout_time->lt($current_workshift_timings)) {
                //Send notification mail
                $user_mail = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first()->officical_mail;

                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;
                $emp_avatar = json_decode(newgetEmployeeAvatarOrShortName(auth::user()->id), true);

                // $isSent    = \Mail::to($user_mail)->send(new AttendanceCheckinCheckoutNotifyMail(
                //     $query_user->name,
                //     $query_user->user_code,
                //     Carbon::parse($t_checkout_date)->format('M jS, Y'),
                //     Carbon::parse($checkout_time)->format('h:i:s A'),
                //     $image_view,
                //     $emp_avatar,
                //     request()->getSchemeAndHttpHost(),
                //     "EG"
                // ));
            }

            if ($isSent) {
                $mail_status = "success";
            } else {
                $mail_status = "failure";
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Check-out success for the check-in date : ' . $existing_check_in_date,
                'data'   => '',
                'mail_status' => $mail_status ?? 'NA'
            ]);
        } catch (TransportException $e) {
            $response = [
                'status' => 'success',
                'message' => 'Check-out success.',
                'mail_status' => 'failure',
                'notification' => '',
                'error' => $e->getMessage(),
                'error_verbose' => $e->getline(),
            ];

            return $response;
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while check-out',
                'mail_status' => 'failure',
                'notification' => '',
                'error' =>  $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];

            return $response;
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
                ->get(['vmt_work_shifts.shift_name', 'vmt_work_shifts.shift_start_time', 'vmt_work_shifts.shift_end_time'])
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
    public function getLeaveInformation($record_id)
    {

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

        try {
            $leave_details = VmtEmployeeLeaves::find($record_id);

            $leave_details['user_name'] = User::find($leave_details->user_id)->name;
            $leave_details['leave_type'] = VmtLeaves::find($leave_details->leave_type_id)->leave_type;
            // $leave_details['reviewer_name'] = User::find($leave_details->reviewer_user_id)->name;
            $leave_details['approver_name'] =  User::find($leave_details->reviewer_user_id)->name;
            $leave_details['approver_designation'] = VmtEmployeeOfficeDetails::where('user_id', $leave_details->user_id)->first()->designation;

            if (!empty($leave_details->notifications_users_id)) {
                $leave_details['notification_userName'] = User::find($leave_details->notifications_users_id)->name;
                $leave_details['notification_designation'] = VmtEmployeeOfficeDetails::where('user_id', $leave_details->user_id)->first()->designation;
            } else
                $leave_details['notification_userName'] = "";

            $leave_details['avatar'] = getEmployeeAvatarOrShortName($leave_details->user_id);

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" =>  $leave_details
            ]);
        } catch (\Exception $e) {
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
                'filter_leave_status' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $valid_status_data = array("Approved", "Rejected", "Pending");

                        $diff = array_diff($value, $valid_status_data);

                        if (count($diff) != 0)
                            $fail('The ' . $attribute . ' has invalid status types.');
                    },
                ],
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
                ->whereIn('status', $filter_leave_status)
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
            //  dd($query_employees_leaves->toArray());

            $query_employees_leaves = $query_employees_leaves->toArray();

            for ($i = 0; $i < count($query_employees_leaves); $i++) {

                $reviewer_name = User::find($query_employees_leaves[$i]["reviewer_user_id"])->name;
                $reviewer_designation = VmtEmployeeOfficeDetails::where('user_id', $query_employees_leaves[$i]["reviewer_user_id"])->first()->designation;
                $query_employees_leaves[$i]["reviewer_name"] = $reviewer_name;
                $query_employees_leaves[$i]["reviewer_designation"] = $reviewer_designation;
                $query_employees_leaves[$i]["reviewer_short_name"] = getUserShortName($query_employees_leaves[$i]["reviewer_user_id"]);
                $query_employees_leaves[$i]["user_short_name"] = getUserShortName($user_id);

                //If user_code is the currently loggedin user AND if leave status is PENDING,  then show WITHDRAW button
                //if($user_code == auth()->user()->user_code && $query_employees_leaves[$i]["status"] == "Pending")
                if ($query_employees_leaves[$i]["status"] == "Pending") //We dont have to check auth()->user()->user_code since this is returned for current user only.
                {
                    //Show the Withdraw button in ui
                    $query_employees_leaves[$i]["can_withdraw_leave"] = true;
                } else {
                    //Dont show the Withdraw button in ui
                    $query_employees_leaves[$i]["can_withdraw_leave"] = false;
                }
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
                'filter_leave_status' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $valid_status_data = array("Approved", "Rejected", "Pending");

                        $diff = array_diff($value, $valid_status_data);

                        if (count($diff) != 0)
                            $fail('The ' . $attribute . ' has invalid status types.');
                    },
                ],
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

            $map_allEmployees = User::all(['id', 'name', 'user_code'])->keyBy('id');
            $map_leaveTypes = VmtLeaves::all(['id', 'leave_type'])->keyBy('id');

            //Get the list of employees for the given Manager
            $team_employees_ids = VmtEmployeeOfficeDetails::where('l1_manager_code', $manager_code)->get('user_id');
            $team_employee_user_code = User::whereIn('id', $team_employees_ids)->get('user_code');
            //use wherein and fetch the relevant records
            $employeeLeaves_team = VmtEmployeeLeaves::whereIn('user_id', $team_employees_ids)
                ->whereMonth('leaverequest_date', '=', $filter_month)
                ->whereYear('leaverequest_date', '=', $filter_year)
                ->whereIn('status', $filter_leave_status)
                ->get();


            //dd($map_allEmployees[1]["name"]);
            foreach ($employeeLeaves_team as $singleItem) {

                if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {
                    $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                    $singleItem->user_code = $map_allEmployees[$singleItem->user_id]["user_code"];
                    $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->user_id);
                }

                if (array_key_exists($singleItem->reviewer_user_id, $map_allEmployees->toArray())) {

                    $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                    $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName($singleItem->reviewer_user_id);
                }

                //Map leave types
                $singleItem->leave_type = $map_leaveTypes[$singleItem->leave_type_id]["leave_type"];


                //If leave status is PENDING,  then show WITHDRAW button
                if ($singleItem->status != "Pending") {
                    //Show the Revoke button in ui
                    $singleItem->can_revoke_leave = true;
                } else {
                    //Dont show the Revoke button in ui
                    $singleItem->can_revoke_leave = false;
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $employeeLeaves_team
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
                'filter_leave_status' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $valid_status_data = array("Approved", "Rejected", "Pending");

                        $diff = array_diff($value, $valid_status_data);

                        if (count($diff) != 0)
                            $fail('The ' . $attribute . ' has invalid status types.');
                    },
                ],
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
                ->whereIn('status', $filter_leave_status)
                ->get([
                    "vmt_employee_leaves.user_id",
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
                    "name as employee_name",
                    "user_code",
                    "leave_type",
                ]);
            // dd($query_employees_leaves->toArray());
            $query_employees_leaves = $query_employees_leaves->toArray();

            for ($i = 0; $i < count($query_employees_leaves); $i++) {

                $manager_name = User::find($query_employees_leaves[$i]["reviewer_user_id"])->name;
                $query_employees_leaves[$i]["manager_name"] = $manager_name;
                $query_employees_leaves[$i]["reviewer_short_name"] = getUserShortName($query_employees_leaves[$i]["reviewer_user_id"]);
                $query_employees_leaves[$i]["user_short_name"] = getUserShortName($query_employees_leaves[$i]["user_id"]);
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
                if ($single_leave_types->is_accrued != 1) {
                    $current_month_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                        ->whereMonth('start_date', $month)
                        ->where('leave_type_id', $single_leave_types->id)
                        ->whereIn('status', array('Approved', 'Pending'))
                        ->sum('total_leave_datetime');
                    $till_last_month_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                        ->whereBetween('start_date', [$start_date, Carbon::parse($end_date)->subMonth()])
                        ->where('leave_type_id', $single_leave_types->id)
                        ->whereIn('status', array('Approved', 'Pending'))
                        ->sum('total_leave_datetime');
                }
                $current_month_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereMonth('start_date', $month)
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                $till_last_month_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereBetween('start_date', [$start_date, Carbon::parse($end_date)->subMonth()])
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                if ($single_leave_types->is_carry_forward != 1) {

                    if ($single_leave_types->is_accrued == 1) {
                        $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                            ->whereBetween('date', [$start_date, $end_date])
                            ->where('leave_type_id', $single_leave_types->id)
                            ->sum('accrued_leave_count');
                        // dd($single_leave_types->leave_type);

                    } else {

                        if ($single_leave_types->leave_type == 'Compensatory Off') {
                            $total_accrued =  count($this->fetchUnusedCompensatoryOffDays($user_id));
                        } else {
                            $total_accrued = $single_leave_types->days_annual;
                        }
                    }
                } else if ($single_leave_types->is_carry_forward == 1) {
                    $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                        ->where('leave_type_id', $single_leave_types->id)
                        ->sum('accrued_leave_count');
                }


                $single_user_leave_details['leave_type'] = $single_leave_types->leave_type;
                $single_user_leave_details['opening_balance'] =  $total_accrued -  $till_last_month_availed_leaves;
                $single_user_leave_details['availed'] =  $current_month_availed_leaves;
                $single_user_leave_details['closing_balance'] =    $single_user_leave_details['opening_balance'] - $current_month_availed_leaves;
            } else {
                $current_month_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereMonth('start_date', $month)
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                $single_user_leave_details['leave_type'] = $single_leave_types->leave_type;
                $single_user_leave_details['opening_balance'] = 0;
                $single_user_leave_details['availed'] =  $current_month_availed_leaves;
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

            $employeeLeaves_Org = VmtEmployeeLeaves::all();

            foreach ($employeeLeaves_Org as $singleItem) {

                //Map emp names
                if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {

                    $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                    $singleItem->employee_avatar = newgetEmployeeAvatarOrShortName($singleItem->user_id);
                }

                //Map reviewer names
                if (array_key_exists($singleItem->reviewer_user_id, $map_allEmployees->toArray())) {
                    $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                    $singleItem->reviewer_avatar = newgetEmployeeAvatarOrShortName($singleItem->reviewer_user_id);
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
                        $singleItem->employee_avatar = newgetEmployeeAvatarOrShortName($singleItem->user_id);
                    }

                    if (array_key_exists($singleItem->reviewer_user_id, $map_allEmployees->toArray())) {

                        $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_user_id]["name"];
                        $singleItem->reviewer_avatar = newgetEmployeeAvatarOrShortName($singleItem->reviewer_user_id);
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
        // dd( $all_active_user);
        try {
            foreach ($all_active_user as $single_user) {
                $total_leave_balance = 0;
                $overall_leave_balance = $this->calculateEmployeeLeaveBalance($single_user->id, $start_date, $end_date);
                // dd($overall_leave_balance);
                $leavetypeAndBalanceDetails = $this->leavetypeAndBalanceDetails($single_user->id, $start_date, $end_date, $month);
                //dd($leavetypeAndBalanceDetails);
                $each_user['user_code'] = $single_user->user_code;
                $each_user['name'] = $single_user->name;
                $each_user['location'] = $single_user->location;
                if ($single_user->department_id != null) {
                    $each_user['department'] =  Department::where('id', $single_user->department_id)->first()->name;
                } else {
                    $each_user['department'] = $single_user->department_id;
                }

                foreach ($overall_leave_balance as $single_leave_balance) {
                    $total_leave_balance =  $total_leave_balance + $single_leave_balance['leave_balance'];
                }
                $each_user['total_leave_balance'] =  $total_leave_balance;
                $each_user['leave_balance_details'] =  $leavetypeAndBalanceDetails;
                //  dd( $each_user);
                array_push($response, $each_user);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "fetchOrgLeaveBalance",
                'data' => $e->getTraceAsString(),
            ]);
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
            $overall_leave_balance = $this->calculateEmployeeLeaveBalance($single_user->id, $start_date, $end_date);
            $leavetypeAndBalanceDetails = $this->leavetypeAndBalanceDetails($single_user->id, $start_date, $end_date, $month);
            $each_user['user_code'] = $single_user->user_code;
            $each_user['name'] = $single_user->name;
            $each_user['location'] = $single_user->location;
            if ($single_user->department_id == null) {
                $each_user['department'] = $single_user->department_id;
            } else {
                $each_user['department'] =  Department::where('id', $single_user->department_id)->first()->name;
            }

            foreach ($overall_leave_balance as $single_leave_balance) {
                $total_leave_balance =  $total_leave_balance + $single_leave_balance['leave_balance'];
            }
            $each_user['total_leave_balance'] =  $total_leave_balance;
            $each_user['leave_balance_details'] =  $leavetypeAndBalanceDetails;
            array_push($response, $each_user);
        }
        return $response;
    }
    public function calculateEmployeeLeaveBalance($user_id, $start_time_period, $end_time_period)
    {
        // TODO:: Which Leave Types we Have to Find availed And Balance //Need To Change In Setting Page
        //  $visible_leave_types = array('Casual/Sick Leave'=>1,'Earned Leave'=>2);
        $leave_balance_for_all_types = array();
        $availed_leaves = array();
        $response = array();
        $accrued_leave_types = VmtLeaves::get();
        $temp_leave = array();
        // dd($accrued_leave_types);
        foreach ($accrued_leave_types as $single_leave_types) {
            if ($single_leave_types->is_finite == 1) {
                if ($single_leave_types->is_accrued != 1) {
                    $total_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                        ->whereBetween('start_date', [$start_time_period, $end_time_period])
                        ->where('leave_type_id', $single_leave_types->id)
                        ->whereIn('status', array('Approved', 'Pending'))
                        ->sum('total_leave_datetime');
                    $availed_leaves[$single_leave_types->leave_type] =  $total_availed_leaves;
                    $temp_leave['leave_type'] = $single_leave_types->leave_type;
                    $temp_leave['leave_balance'] = (int)$single_leave_types->days_annual;
                    $temp_leave['availed_leaves'] = $total_availed_leaves;
                } else {

                    if ($single_leave_types->is_carry_forward != 1) {
                        $total_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
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
                            $leave_balance =  $total_accrued -  $total_availed_leaves;
                            $leave_balance_for_all_types[$single_leave_types->leave_type] = $leave_balance;
                            $availed_leaves[$single_leave_types->leave_type] =  $total_availed_leaves;
                        }
                        $temp_leave['leave_type'] = $single_leave_types->leave_type;
                        $temp_leave['leave_balance'] = $leave_balance;
                        $temp_leave['availed_leaves'] = $total_availed_leaves;
                        // $leave_balance_for_all_types[$single_leave_types->leave_type]= $leave_balance;
                        // $availed_leaves[$single_leave_types->leave_type] =  $total_availed_leaves ;
                        //$temp_leave=array('leave_type'=>$single_leave_types->leave_type,'leave_balance'=>$leave_balance,'availed_leaves'=>$total_availed_leaves);

                    } else if ($single_leave_types->is_carry_forward == 1) {

                        $total_accrued = VmtEmployeesLeavesAccrued::where('user_id', $user_id)
                            ->where('leave_type_id', $single_leave_types->id)
                            ->sum('accrued_leave_count');
                        $total_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                            ->whereBetween('start_date', [$start_time_period, $end_time_period])
                            ->where('leave_type_id', $single_leave_types->id)
                            ->whereIn('status', array('Approved', 'Pending'))
                            ->sum('total_leave_datetime');
                        $leave_balance =  $total_accrued - $total_availed_leaves;
                        // $leave_balance_for_all_types[$single_leave_types->leave_type] = $leave_balance;
                        // $availed_leaves[$single_leave_types->leave_type] =  $total_availed_leaves ;
                        $temp_leave['leave_type'] = $single_leave_types->leave_type;
                        $temp_leave['leave_balance'] = $leave_balance;
                        $temp_leave['availed_leaves'] = $total_availed_leaves;
                    }
                }
            } else {
                // dd($single_leave_types);
                $total_availed_leaves = VmtEmployeeLeaves::where('user_id', $user_id)
                    ->whereBetween('start_date', [$start_time_period, $end_time_period])
                    ->where('leave_type_id', $single_leave_types->id)
                    ->whereIn('status', array('Approved', 'Pending'))
                    ->sum('total_leave_datetime');
                $availed_leaves[$single_leave_types->leave_type] =  $total_availed_leaves;
                $temp_leave['leave_type'] = $single_leave_types->leave_type;
                $temp_leave['leave_balance'] = (int)$single_leave_types->days_annual;
                $temp_leave['availed_leaves'] = $total_availed_leaves;
            }
            array_push($response, $temp_leave);
            unset($temp_leave);
        }
        $leave_details = array('Leave Balance' => $leave_balance_for_all_types, 'availed Leaves' => $availed_leaves);
        //dd($response);
        //Based on gender, remove Maternity/Paternity leave type

        // $getcurrentusergender = getCurrentUserGender();



        // for ($i = 0; $i < count($response); $i++) {
        //     $singleLeaveType = $response[$i];
        //     if ($getcurrentusergender == 'male') {
        //         if ($response[$i]['leave_type'] == 'Maternity Leave')
        //             unset($response[$i]);
        //     } else
        //     if ($getcurrentusergender == 'female') {
        //         if ($response[$i]['leave_type'] == 'Paternity Leave')
        //             unset($response[$i]);
        //     }
        // }


        return $response;
    }

    //Get Count of Att req for given manager's team memebers
    public function getCountForAttRegularization($user_code)
    {
        //  $user_code = "BA011";
        try {
            $emp_users_query = VmtEmployeeOfficeDetails::where('l1_manager_code', $user_code)->get();
            $emp_users_id = array();
            foreach ($emp_users_query as $single_emp) {
                array_push($emp_users_id, $single_emp->user_id);
            }

            $month = Carbon::now()->format('m');


            $total_count['pending_count']  = VmtEmployeeAttendanceRegularization::whereIn('user_id', $emp_users_id)->whereMonth('attendance_date', $month)
                ->where('status', 'Pending')->count();
            $total_count['approved_count']  = VmtEmployeeAttendanceRegularization::whereIn('user_id', $emp_users_id)->whereMonth('attendance_date', $month)
                ->where('status', 'Approved')->count();
            $total_count['rejected_count']   = VmtEmployeeAttendanceRegularization::whereIn('user_id', $emp_users_id)->whereMonth('attendance_date', $month)
                ->where('status', 'Rejected')->count();

            return $total_count;
        } catch (\Exception $e) {
            // dd($e);
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getCountForAttRegularization ] ",
                'data' => $e
            ]);
        }
    }

    public function getfetchAttendadnceRegularization($user_code, $year, $month, $status)
    {
        try {
            $response = array();
            $response['att_reg_count'] = $this->getCountForAttRegularization($user_code);
            $user_id = user::where('user_code', $user_code)->first()->id;
            $employees = VmtEmployeeOfficeDetails::where('l1_manager_code', $user_code)->get();
            foreach ($employees as $singleemployee) {
                $temp_arr = array();
                $att_reg_query = VmtEmployeeAttendanceRegularization::where('user_id', $singleemployee->user_id)
                    ->whereYear('attendance_date', $year)->whereMonth('attendance_date', $month);
                if ($status == 'Pending') {
                    $att_reg_query =   $att_reg_query->where('status', 'Pending');
                } else if ($status == 'Approved') {
                    $att_reg_query =   $att_reg_query->where('status', 'Approved');
                } else if ($status == 'Rejected') {
                    $att_reg_query =   $att_reg_query->where('status', 'Rejected');
                }

                if ($att_reg_query->exists()) {
                    $temp_arr['name'] = User::where('id', $singleemployee->user_id)->first()->name;
                    $temp_arr['user_code'] =  User::where('id', $singleemployee->user_id)->first()->user_code;
                    $temp_arr['regularization_details'] = $att_reg_query->get();
                    array_push($response, $temp_arr);
                    unset($temp_arr);
                }
            }
            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $response
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getCountForAttRegularization ] ",
                'data' => $e
            ]);
        }
    }

    public function getAttendanceDashboardData()
    {

        $current_date = Carbon::now()->format('Y-m-d');
        $Current_month = Carbon::now()->format('m');
        $curent_year =  Carbon::now()->format('Y');
        $current_day =  Carbon::now()->format('d');

        $user_code =  auth()->user()->user_code;

        $user_data = User::where("user_code", $user_code)->first();

        $employees_data = array();

        $absent_count = 0;
        $absent_emps = array();
        $present_count = 0;
        $present_emps = array();
        $lc_count = 0;
        $lc_emps = array();
        $leave_emps = array();
        $eg_count = 0;
        $eg_emps = array();
        $mip_count = 0;
        $mip_emps = array();
        $mop_count = 0;
        $mop_emps = array();
        $isLC = null;
        $lc_emps = array();
        $isMIP = null;
        $mip_emps = array();
        $isMOP = null;
        $mop_emps = array();
        $isEG = null;
        $eg_emps = array();

        $leave_employee_count = array();
        $response = array();
        $i = 0;

        $employees_data = User::join('vmt_employee_office_details as off', 'off.user_id', '=', 'users.id')
            ->leftJoin('vmt_department as dep', 'dep.id', '=', 'off.department_id')
            ->leftJoin('vmt_employee_details as det', 'det.userid', '=', 'users.id')
            ->where('users.is_ssa', '0')->where('users.active', '1')
            ->get(['users.id as id', 'users.user_code as user_code', 'users.name as name', 'dep.name as department_name', 'off.process as process', 'det.location as location']);

        foreach ($employees_data as $key => $single_user_data) {
            $user_code = $single_user_data->user_code;
            $absent_present_employee_data  = VmtEmployeeAttendance::Where('user_id', $single_user_data['id'])->whereDate('date', $current_date)->first();
            $emp_bio_attendance = $this->getBioMetricAttendanceData($user_code, $current_date);

            if (empty($absent_present_employee_data)) {

                $absent_employee_data[$key]['absentEmployeeCount'] = $absent_present_employee_data;

                $emp_user_code = user::where('id', $single_user_data['id'])->first('user_code');

                $emp_bio_attendance = $this->getBioMetricAttendanceData($emp_user_code['user_code'], $current_date);

                if (empty($emp_bio_attendance)) {
                    array_push($absent_emps, $single_user_data);
                    $absent_count++;
                }
            }
            if (!empty($absent_present_employee_data)) {

                $present_employee_data[$key]['presentEmployeeCount'] = $absent_present_employee_data;
                array_push($present_emps, $single_user_data);
                $present_count++;
            } else {
                $emp_user_code = user::where('id', $single_user_data['id'])->first('user_code');

                $emp_bio_attendance = $this->getBioMetricAttendanceData($emp_user_code['user_code'], $current_date);

                if (!empty($emp_bio_attendance)) {
                    array_push($present_emps, $single_user_data);
                    $present_count++;
                }
            }


            $user_data = User::where('id', $single_user_data['id'])->first();
            //  dd($single_user_data['id']);
            $emp_leave_data = VmtEmployeeLeaves::Where('user_id', $single_user_data['id'])->whereMonth('start_date', $Current_month)->where('status', "Approved")->get()->toarray();
            //dd( $emp_leave_data);
            if (!empty($emp_leave_data)) {

                $start_Date = Carbon::parse($emp_leave_data['0']['start_date'])->format('Y-m-d');
                $end_Date = Carbon::parse($emp_leave_data['0']['end_date'])->format('Y-m-d');

                $dateRange = CarbonPeriod::create($start_Date, $end_Date);

                foreach ($dateRange as $single_date) {
                    $leave_date = $single_date->format('Y-m-d');

                    if ($leave_date == $current_date) {
                        array_push($leave_emps,$single_user_data);
                        $leave_employee_count[$i]['id'] =  $single_user_data['id'];
                        $leave_employee_count[$i]['user_code'] =  $user_data->user_code;
                        $leave_employee_count[$i]['user_name'] =  $user_data->name;
                        $leave_employee_count[$i]['leave_date'] = $leave_date;
                        $i++;
                    }
                }
            }

            //logics for get lc and mip
            $emp_shift_settings =  $this->getEmpAttendanceAndWorkshift($single_user_data->id, $user_code, $current_date);
            //Code For Check LC
            if (!empty($emp_shift_settings['checkin_time'])) {
                // dd($emp_shift_settings['checkin_time']);
                $parsedCheckIn_time  = Carbon::parse($emp_shift_settings['checkin_time']['date']);
                //Check whether checkin done on-time
                $isCheckin_done_ontime = $parsedCheckIn_time->lte(Carbon::parse($emp_shift_settings['shift_settings']['shift_start_time']));
                if ($isCheckin_done_ontime) {
                    //employee came on time....
                } else {
                    //dd("Checkin NOT on-time");
                    //check whether regularization applied.
                    $regularization_status =  $this->RegularizationRequestStatus($single_user_data->id, $current_date, 'LC');
                    $isLC = $regularization_status['sts'];
                    $checkinRegId = $regularization_status['id'];
                    $reged_checkin_time = $regularization_status['time'];
                }
            } else if (empty($emp_shift_settings['checkin_time']) && !empty($emp_shift_settings['checkout_time'])) {
                $regularization_status =  $this->RegularizationRequestStatus($single_user_data->id, $current_date, 'MIP');
                $isMIP = $regularization_status['sts'];
                $checkinRegId = $regularization_status['id'];
                $reged_checkin_time = $regularization_status['time'];
            }

            if ($isLC == 'Not Applied' || $isLC == 'Pending' || $isLC == 'Rejected') {
                array_push($lc_emps, $single_user_data);
                $lc_count++;
            }

            if ($isMIP == 'Not Applied' ||  $isMIP == 'Pending' ||  $isMIP == 'Rejected') {
                array_push($mip_emps, $single_user_data);
                $mip_count++;
            }

            //Code For Check EG
            $emp_shift_settings =  $this->getEmpAttendanceAndWorkshift($single_user_data->id, $user_code, Carbon::parse($current_date)->subDay()->format('Y-m-d'));
            if (!empty($emp_shift_settings['checkout_time'])) {
                $parsedCheckOut_time  = Carbon::parse($emp_shift_settings['checkout_time']['date']);
                //Check whether checkin out on-time
                $isCheckout_done_ontime = $parsedCheckOut_time->lte(Carbon::parse($emp_shift_settings['shift_settings']['shift_end_time']));
                if ($isCheckout_done_ontime) {
                    //employee left early on time....
                    $regularization_status =   $this->RegularizationRequestStatus($single_user_data->id, $current_date, 'EG');
                    $isEG = $regularization_status['sts'];
                    $checkoutRegId = $regularization_status['id'];
                    $reged_checkout_time = $regularization_status['time'];
                } else if (!empty($checkin_time) && empty($checkout_time)) {
                    $regularization_status =   $this->RegularizationRequestStatus($single_user_data->id, $current_date, 'MOP');
                    $isMOP = $regularization_status['sts'];
                    $checkoutRegId = $regularization_status['id'];
                    $checkoutRegId = $regularization_status['time'];
                } else {
                    //employee left late....
                }
            }

            if ($isEG == 'Not Applied' || $isEG == 'Pending' || $isEG == 'Rejected') {
                array_push($eg_emps, $single_user_data);
                $eg_count++;
            }

            if ($isMOP == 'Not Applied' ||  $isMOP == 'Pending' ||  $isMOP == 'Rejected') {
                $mop_count++;
                array_push($mop_emps, $single_user_data);
            }
        }
        // $attendanceOverview['absent_count'] = $absent_count;
        $attendanceOverview['absent_count'] = $absent_count;
        $attendanceOverview['absent_emps'] = $absent_emps;
        $attendanceOverview['present_count'] = $present_count;
        $attendanceOverview['present_emps'] = $present_emps;
        $attendanceOverview['leave_emp_count'] = count($leave_employee_count);
        $attendanceOverview['leave_emps'] = $leave_emps;
        $attendanceOverview['lg_count'] = $lc_count;
        $attendanceOverview['lc_emps'] = $lc_emps;
        $attendanceOverview['eg_count'] = $eg_count;
        $attendanceOverview['eg_emps'] = $eg_emps;
        $attendanceOverview['mop_count'] = $mop_count;
        $attendanceOverview['mop_emps'] = $mop_emps;
        $attendanceOverview['mip_count'] = $mip_count;
        $attendanceOverview['mip_emps'] = $mip_emps;

        $shifts = $this->getWorkShiftDetails();
        $on_duty_count = VmtEmployeeLeaves::where('start_date', '>', Carbon::now())
            ->where('leave_type_id', VmtLeaves::where('leave_type', 'On Duty')->first()->id)->count();
        $leave_count = VmtEmployeeLeaves::where('start_date', '>', Carbon::now())
            ->whereNotIn('leave_type_id', [VmtLeaves::where('leave_type', 'On Duty')->first()->id])->count();
        $upcomings['On duty'] =  $on_duty_count;
        $upcomings['Leave'] = $leave_count;
        $response = ["attendance_overview" => $attendanceOverview, "work_shift" => $shifts, 'upcomings' => $upcomings];
        return $response;
    }






    public function getBioMetricAttendanceData($user_code, $current_date)
    {


        $deviceData = array();
        if (
            sessionGetSelectedClientCode() == "DM"  || sessionGetSelectedClientCode() == 'VASA' || sessionGetSelectedClientCode() == 'LAL' ||
            sessionGetSelectedClientCode() == 'PSC'  || sessionGetSelectedClientCode() ==  'IMA' ||  sessionGetSelectedClientCode() ==  'PA' ||  sessionGetSelectedClientCode() ==  'DMC' || sessionGetSelectedClientCode() ==  'ABS'
        ) {

            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                ->whereDate('date', $current_date)
                ->where('user_Id', $user_code)
                ->first(['check_out_time']);

            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $current_date)
                ->where('user_Id',  $user_code)
                ->first(['check_in_time']);
        } else {
            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                ->whereDate('date', $current_date)
                ->where('direction', 'out')
                ->where('user_Id', $user_code)
                ->first(['check_out_time']);

            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $current_date)
                ->where('direction', 'in')
                ->where('user_Id', $user_code)
                ->first(['check_in_time']);
        }
        // dd($attendanceCheckIn);

        $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
        $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];
        //dd($deviceCheckInTime);
        if ($deviceCheckOutTime  != null || $deviceCheckInTime != null) {
            $deviceData[] = ([
                'date' => $current_date,
                'user_code' => $user_code,
                'checkin_time' => $deviceCheckInTime,
                'checkout_time' => $deviceCheckOutTime,
                'attendance_mode_checkin' => 'biometric',
                'attendance_mode_checkout' => 'biometric'
            ]);
        }

        return $deviceData;
    }

    public function getEmpAttendanceAndWorkshift($user_id, $user_code, $current_date)
    {
        // $user_id = 562;
        // $user_code = 'NAT0014';
        // $current_date = '2023-09-04';
        // $deviceData = array();
        if (
            sessionGetSelectedClientCode() == "DM"  || sessionGetSelectedClientCode() == 'VASA' || sessionGetSelectedClientCode() == 'LAL' ||
            sessionGetSelectedClientCode() == 'PSC'  || sessionGetSelectedClientCode() ==  'IMA' ||  sessionGetSelectedClientCode() ==  'PA' ||  sessionGetSelectedClientCode() ==  'DMC' || sessionGetSelectedClientCode() ==  'ABS'
            || sessionGetSelectedClientCode() ==  'NAT'
        ) {
            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                ->whereDate('date', $current_date)
                ->where('user_Id', $user_code)
                ->first(['check_out_time']);

            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $current_date)
                ->where('user_Id',  $user_code)
                ->first(['check_in_time']);
            // dd($attendanceCheckOut);
        } else {
            $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
                ->whereDate('date', $current_date)
                ->where('direction', 'out')
                ->where('user_Id', $user_code)
                ->first(['check_out_time']);

            $attendanceCheckIn = \DB::table('vmt_staff_attenndance_device')
                ->select('user_Id', \DB::raw('MIN(date) as check_in_time'))
                ->whereDate('date', $current_date)
                ->where('direction', 'in')
                ->where('user_Id', $user_code)
                ->first(['check_in_time']);



            $deviceCheckOutTime = empty($attendanceCheckOut->check_out_time) ? null : explode(' ', $attendanceCheckOut->check_out_time)[1];
            $deviceCheckInTime  = empty($attendanceCheckIn->check_in_time) ? null : explode(' ', $attendanceCheckIn->check_in_time)[1];
            $web_attendance = VmtEmployeeAttendance::whereDate('date', $current_date)
                ->where('user_id', $user_id)->first();
            $all_att_data = collect();
            $web_checkin_time = null;
            $web_checkout_time = null;
            if (!empty($web_attendance)) {
                $web_checkin_time = $web_attendance->checkin_time;
                $web_checkout_time = $web_attendance->checkout_time;
            }
            if ($web_checkin_time != null) {
                $all_att_data->push(['date' => $web_attendance->date . ' ' . $web_attendance->checkin_time]);
            }

            if ($web_checkout_time != null) {
                $all_att_data->push(['date' => $web_attendance->checkout_date . ' ' . $web_attendance->checkout_time]);
            }

            if ($deviceCheckOutTime != null) {
                $all_att_data->push(['date' => $current_date . ' ' . $deviceCheckOutTime]);
            }

            if ($deviceCheckInTime != null) {
                $all_att_data->push(['date' => $current_date . ' ' . $deviceCheckInTime]);
            }
            $sortedCollection   =   $all_att_data->sortBy([
                ['date', 'asc'],
            ]);
            $checking_time = $sortedCollection->first();
            $checkout_time =  $sortedCollection->last();
            return $response = ['checkin_time' => $checking_time, 'checkout_time' => $checkout_time, 'shift_settings' =>  $this->getShiftTimeForEmployee($user_id, $checking_time,  $checkout_time)];
            return $response;
        }
    }

    public function getEmployeeAnalyticsExceptionData()
    {

        $current_date = Carbon::now()->format('Y-m-d');
        $Current_month = Carbon::now()->format('m');
        $start_date_month = Carbon::now()->startOfMonth();

        $user_code =  auth()->user()->user_code;

        $user_data = User::where("user_code", $user_code)->first();

        $employees_data = array();

        $most_absent_count = array();

        $most_present_count = array();

        $present_employee_data = array();

        $absent_employee_data = array();

        $response = array();

        $i = 0;
        $j = 0;

        if ($user_data['org_role'] == "2" || $user_data['org_role'] == "3" || $user_data['org_role'] == "1") {

            $employees_data = user::where('is_ssa', '0')->where('active', '=', '1')->get(['id']);
        } else if ($user_data['org_role'] == "4") {

            $employees_data = VmtEmployeeOfficeDetails::where('l1_manager_code', $user_code)->get(['user_id as id']);
        }


        foreach ($employees_data as $key => $single_user_data) {

            //  if(count($present_employee_data)>count($most_present_count)){

            //  }
            //  if(count($absent_employee_data)>count($most_present_count)){

            //  }

            $start_Date = Carbon::parse($start_date_month)->format('Y-m-d');
            $end_Date = Carbon::parse($current_date)->format('Y-m-d');

            $dateRange = CarbonPeriod::create("2023-08-01", "2023-08-30");

            foreach ($dateRange as $key => $single_date) {

                $date = $single_date->format('Y-m-d');

                $most_att_employee_data = VmtEmployeeAttendance::Where('user_id', $single_user_data['id'])->whereDate('date', $date)->first();

                if (!empty($most_att_employee_data)) {

                    $present_employee_data[$i] = $most_att_employee_data;
                    $i++;
                } else {


                    $emp_user_code = user::where('id', $single_user_data['id'])->first('user_code');

                    $emp_bio_attendance = VmtStaffAttendanceDevice::where('user_Id', $emp_user_code['user_code'])->wheredate("date", $date);

                    if ($emp_bio_attendance->exists()) {

                        $present_employee_data[$i] = $emp_bio_attendance;
                        $i++;
                    }
                }

                if (empty($most_att_employee_data)) {

                    $emp_user_code = user::where('id', $single_user_data['id'])->first('user_code');

                    $emp_bio_attendance = $this->getBioMetricAttendanceData($emp_user_code['user_code'], $date);

                    if (empty($emp_bio_attendance)) {

                        $absent_employee_data[$j]['absentEmployeeCount'] = $emp_bio_attendance;
                        $j++;
                    }
                }
            }
            dd($present_employee_data);
        }



        //         if (empty($most_att_employee_data)) {

        //             $emp_user_code = user::where('id', $single_user_data['id'])->first('user_code');

        //             $emp_bio_attendance = $this->getBioMetricAttendanceData($emp_user_code, $current_date);

        //             if (empty($emp_bio_attendance)) {

        //                 $most_absent_count++;
        //             }
        //         }
        //         if (!empty($absent_present_employee_data)) {

        //             $present_employee_data[$key]['presentEmployeeCount'] = $absent_present_employee_data;

        //             $present_count++;
        //         } else {
        //             $emp_user_code = user::where('id', $single_user_data['id'])->first('user_code');

        //             $emp_bio_attendance = $this->getBioMetricAttendanceData($emp_user_code, $current_date);

        //             if (!empty($emp_bio_attendance)) {

        //                 $present_count++;
        //             }
        //         }



        // }
    }

    //dd($attendanceCheckIn);

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
                ;
                $diffInMinutesInCheckinTime = $shift_start_time->diffInMinutes(Carbon::parse($checkin_time['date']), false);
                $diffInMinutesInCheckOutTime =   $shift_end_time->diffInMinutes(Carbon::parse($checkout_time['date']), false);
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

    // public function getEmployeeUpcomingAppliedRequested()
    // {
    //     $on_duty_count = VmtEmployeeLeaves::where('start_date', '>', Carbon::now())
    //         ->where('leave_type_id', VmtLeaves::where('leave_type', 'On Duty')->first()->id)->count();
    //     $leave_count = VmtEmployeeLeaves::where('start_date', '>', Carbon::now())
    //         ->whereNotIn('leave_type_id', [VmtLeaves::where('leave_type', 'On Duty')->first()->id])->count();
    //     return $response = array('on_duty_count' => $on_duty_count, 'leave_count' => $leave_count);
    // }
    public function getWorkShiftDetails()
    {
        $workshiftCount = array();
        $work_shift_details = VmtWorkShifts::all()->toArray();

        foreach ($work_shift_details as $key => $single_shift_id) {

            $work_shift_assigned_employees = VmtWorkShifts::join('vmt_employee_workshifts', 'vmt_employee_workshifts.work_shift_id', '=', 'vmt_work_shifts.id')
                ->join('users', 'users.id', '=', 'vmt_employee_workshifts.user_id')
                ->where('vmt_employee_workshifts.work_shift_id', '=', $single_shift_id['id'])
                ->where('users.active', '=', 1)
                ->get();
            // $response ["work_shift_assigned_employees"][$key] = count( $work_shift_assigned_employees) ;
            $response[$key]["work_shift_assigned_employees"] = count($work_shift_assigned_employees);
            $response[$key]["work_shift_employee_data"] = $work_shift_assigned_employees;
        }
        // dd(count($workshiftCount));

        return $response;

        // return $work_shift->toArray();
    }
    public function checkEmployeeLcPermission($month, $year, $user_id)
{
    $validator = Validator::make(
        $data = [
            'manager_user_code' => $user_id,
            'month' => $month,
            'year' => $year,
        ],
        $rules = [
            'user_code' => 'required|exists:users,user_code',
            'month' => 'required',
            'year' => 'required',
        ],
        $messages = [
            'required' => 'Field :attribute is missing',
            'exists' => 'Field :attribute is invalid',
            'integer' => 'Field :attribute should be integer',
            'in' => 'Field :attribute is invalid',
        ]
    );
    try {
        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');
                $Employees_lateComing = VmtEmployeeAttendanceRegularization::where('user_id', $user_id)
                    ->whereYear('attendance_date', $year)
                    ->whereMonth('attendance_date', $month)
                    ->where('regularization_type','LC')
                    ->where('reason_type','Permission')
                    ->whereIn('status',['Approved','Pending'])
                    ->get();
                    // dd($Employees_lateComing);
    } catch (\Exception $e) {
        return response()->json([
            "status" => "failure",
            "message" => "Error while fetching Attendance Regularization LC data",
            "data" => $e,
        ]);
    }
}
}
