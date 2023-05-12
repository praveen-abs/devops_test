<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VmtEmployeeReimbursements;
use App\Models\User;
use App\Services\VmtReimbursementsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtReimbursements;
use App\Models\VmtEmployeeLeaves;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Services\VmtAttendanceService;
use App\Services\VmtNotificationsService;
use Illuminate\Support\Facades\Validator;

class VmtAPIAttendanceController extends HRMSBaseAPIController
{

    private $cost_per_km_2wheeler = 3;
    private $cost_per_km_4wheeler = 4;


    public function performAttendanceCheckIn(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "date" => "required",
                "checkin_time" => "required",
                "work_mode" => "required", //office, work
                "attendance_mode_checkin" => "required", //mobile, web
                "checkin_lat_long" => "nullable", //stores in lat , long
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if($validator->fails()){
            return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
            ]);
        }

        $response =  $serviceVmtAttendanceService->performAttendanceCheckIn($request->user_code, $request->date, $request->checkin_time, $request->selfie_checkin, $request->work_mode, $request->attendance_mode_checkin,$request->checkin_lat_long);

        return $response;
    }


    public function performAttendanceCheckOut(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "date" => "required",
                "checkout_time" => "required",
                "work_mode" => "required", //office, work
                "attendance_mode_checkout" => "required", //mobile, web
                "checkout_lat_long" => "nullable", //lat, long
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if($validator->fails()){
            return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
            ]);
        }

        $response =  $serviceVmtAttendanceService->performAttendanceCheckOut($request->user_code,
                                                                             $request->date,
                                                                             $request->checkout_time,
                                                                             $request->selfie_checkout,
                                                                             $request->work_mode,
                                                                             $request->attendance_mode_checkout,
                                                                             $request->checkout_lat_long);

        return $response;
    }

    /*
        Get the attendance status of the given user
        for the given date


    */
    public function getAttendanceStatus(Request $request, VmtAttendanceService $serviceVmtAttendanceService){
        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "date" => "required",
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if($validator->fails()){
            return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
            ]);
        }

        $response = $serviceVmtAttendanceService->fetchAttendanceStatus($request->user_code, $request->date);

        return response()->json([
            'status' => 'success',
            'message' => $validator->errors()->all(),
            'data' => $response
        ]);
    }


    /*
        attendanceMonthlyReport():
        Input : date
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    public function getAttendanceMonthStatsReport(Request $request, VmtAttendanceService $serviceVmtAttendanceService)
    {

        //Validate the request
        $validator = Validator::make(
            $request->all(),
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

        //Fetch the data
        $response = $serviceVmtAttendanceService->fetchAttendanceMonthStatsReport($request->user_code,$request->year,$request->month);


        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $response
        ]);

    }

    public function getEmployeeLeaveBalance(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        return $serviceVmtAttendanceService->getEmployeeLeaveBalance($request->user_code);
    }

    public function applyLeaveRequest(Request $request, VmtAttendanceService $serviceVmtAttendanceService, VmtNotificationsService $serviceVmtNotificationsService){

        $validator = Validator::make(
            $request->all(),
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'leave_request_date' => 'required',
                'leave_reason' => 'required',
                'leave_type_name' => 'required|exists:vmt_leaves,leave_type',

                'start_date' => 'required',
                'end_date' => 'required',

                'no_of_days' => 'required',


                // 'start_date' => 'required',
                // 'end_date' => 'required',
                // 'hours_diff' => 'required',
                // 'no_of_days' => 'required',
                // 'compensatory_work_days_ids' => 'required',
                // 'leave_session' => 'required',
                // 'leave_type_name' => 'required',
                // 'leave_reason' => 'required',
                // 'notifications_users_id' => 'required',
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

        $user_id = User::where('user_code', $request->user_code)->first()->id;

        $response = $serviceVmtAttendanceService->applyLeaveRequest( user_id: $user_id,
                                                                    leave_request_date : $request->leave_request_date,
                                                                    start_date : $request->start_date,
                                                                    end_date : $request->end_date,
                                                                    hours_diff : $request->hours_diff,
                                                                    no_of_days : $request->no_of_days,
                                                                    compensatory_work_days_ids : $request->compensatory_work_days_ids,
                                                                    leave_session : $request->leave_session,
                                                                    leave_type_name : $request->leave_type_name,
                                                                    leave_reason : $request->leave_reason,
                                                                    notifications_users_id : $request->notifications_users_id,
                                                                    serviceNotificationsService: $serviceVmtNotificationsService
                                                );

        return $response;
    }

    public function approveRejectRevokeLeaveRequest(Request $request, VmtAttendanceService $serviceVmtAttendanceService){


        //Fetch the data
        return $serviceVmtAttendanceService->approveRejectRevokeLeaveRequest($request->record_id, auth()->user()->user_code, $request->status , $request->review_comment);

    }


    public function getAttendanceDailyReport_PerMonth(Request $request, VmtAttendanceService $serviceVmtAttendanceService){
        //dd("asdf");
        //Validate the request
        $validator = Validator::make(
            $request->all(),
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

        //Fetch the data
        $response = $serviceVmtAttendanceService->fetchAttendanceDailyReport_PerMonth($request->user_code,$request->year,$request->month);


        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $response
        ]);

    }

    public function applyRequestAbsentRegularization(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        return $serviceVmtAttendanceService->applyRequestAbsentRegularization(user_code : $request->user_code,
                                                                                attendance_date: $request->attendance_date,
                                                                                regularization_type : $request->regularization_type,
                                                                                checkin_time : $request->checkin_time,
                                                                                checkout_time : $request->checkout_time,
                                                                                reason : $request->reason,
                                                                                custom_reason : $request->custom_reason
                                                                            );

    }

    public function applyRequestAttendanceRegularization(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        //Validate the request
        $validator = Validator::make(
            $request->all(),
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'attendance_date' => 'required',
                'regularization_type' => 'required',
                'user_time' => 'nullable', //For MIP,MOP : its null
                'regularize_time' => 'required',
                'reason' => 'required',
                'custom_reason' => 'nullable', //Send empty string even if no custom reason needed
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                //'integer' => 'Field :attribute should be integer',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                        'status' => 'failure',
                        'message' => $validator->errors()->all()
            ]);
        }

        //Fetch the data
        $response = $serviceVmtAttendanceService->applyRequestAttendanceRegularization($request->user_code, $request->attendance_date, $request->regularization_type, $request->user_time, $request->regularize_time, $request->reason, $request->custom_reason);


        return $response;

    }


    public function approveRejectAttendanceRegularization(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        //Validate the request
        $validator = Validator::make(
            $request->all(),
            $rules = [
                'approver_user_code' => 'required|exists:users,user_code',
                'record_id' => 'required|integer',
                'status' => 'required',
                'status_text' => 'required',
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

        //Fetch the data
        $response = $serviceVmtAttendanceService->approveRejectAttendanceRegularization($request->approver_user_code, $request->record_id, $request->status, $request->status_text);

        return $response;

    }

    public function getAttendanceRegularizationData(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        //Validate the request
        $validator = Validator::make(
            $request->all(),
            $rules = [
                'manager_user_code' => 'nullable|exists:users,user_code',
                'month' => 'required',
                'year' => 'required'
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

        //Fetch the data
        $response = $serviceVmtAttendanceService->fetchAttendanceRegularizationData(manager_user_code: $request->manager_user_code, month: $request->month, year: $request->year);

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $response
        ]);
    }

    public function getUnusedCompensatoryDays(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        $validator = Validator::make(
            $request->all(),
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

        //fetch the data
        $user_id = User::where('user_code', $request->user_code)->first()->id;

        $response = $serviceVmtAttendanceService->fetchUnusedCompensatoryOffDays($user_id);

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $response
        ]);

    }

    public function getEmployeeWorkShiftTimings(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

       return $serviceVmtAttendanceService->getEmployeeWorkShiftTimings($request->user_code);

    }
    public function getEmployeeLeaveDetails(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

       return $serviceVmtAttendanceService->getEmployeeLeaveDetails($request->user_code,$request->filter_month,$request->filter_year,$request->filter_leave_status);

    }

}
