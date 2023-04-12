<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VmtEmployeeReimbursements;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtReimbursements;
use App\Models\VmtEmployeeLeaves;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Services\VmtAttendanceService;
use Illuminate\Support\Facades\Validator;

class VmtAPIAttendanceController extends HRMSBaseAPIController
{

    private $cost_per_km_2wheeler = 3;
    private $cost_per_km_4wheeler = 4;

    /*
        get current day attendance details
        attendanceGetCurrentDay():
        Input : date
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    public function getCurrentDayAttendance(Request $request)
    {
        // code...
        $attendanceDate  = $request->date;

        $data  = VmtEmployeeAttendance::select("date", "checkin_time",  "checkout_time","shift_type","leave_type_id")
                ->where('user_id', auth::user()->id)
                ->where('date', $attendanceDate)
                ->first();

        return response()->json([
            'status' => 'success',
            'message'=> '',
            'data'   => $data
        ]);
    }


    /*
        attendanceCheckin():
        Input : date, checkin_time, shift_type
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    public function attendanceCheckin(Request $request){

        //Check if user already checked-in
        $attendanceCheckin  = VmtEmployeeAttendance::where('user_id', auth::user()->id)->where("date", $request->date)->first();

        if($attendanceCheckin)
        {

            $emptyObj  = new \stdClass;

            return response()->json([
                'status' => 'failure',
                'message'=> 'Check in already done',
                'data'   => $emptyObj
            ]);
        }
        else
        {

            $attendanceCheckin           = new VmtEmployeeAttendance;
            $attendanceCheckin->date          = $request->date;
            $attendanceCheckin->checkin_time  = $request->checkin_time;
            $attendanceCheckin->user_id       = auth::user()->id;
            $attendanceCheckin->shift_type    = $request->shift_type;
            $attendanceCheckin->work_mode      = $request->work_mode;
            //$attendanceCheckin->selfie_checkin = $request->selfie_checkin; ////Need to save the image in folder and add path here
            $attendanceCheckin->checkin_comments = $request->checkin_comments;
            $attendanceCheckin->attendance_mode_checkin = "mobile";
            $attendanceCheckin->save();


            // processing and storing base64 files in public/selfies folder
            if($request->has('selfie_checkin')){

                $emp_selfiedir_path = public_path('employees/'.auth::user()->user_code.'/selfies/');

                // dd($emp_document_path);
                if(!File::isDirectory($emp_selfiedir_path))
                    File::makeDirectory($emp_selfiedir_path, 0777, true, true);


                $selfieFileEncoded  =  $request->selfie_checkin;

                $fileName = $attendanceCheckin->id.'_checkin.png';

                \File::put($emp_selfiedir_path.$fileName, base64_decode($selfieFileEncoded));

                $attendanceCheckin->selfie_checkin = $fileName;
                $attendanceCheckin->save();
            }

            $emptyObj  = new \stdClass;

            return response()->json([
                'status' => 'success',
                'message'=> 'Check in success',
                'data'   => $emptyObj
            ]);

        }



    }

    /*
        attendanceCheckout():
        Input : date, checkout_time,
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    public function attendanceCheckout(Request $request){
        $reqDate  = $request->date;
        $attendanceCheckout  = VmtEmployeeAttendance::where('user_id', auth::user()->id)->where("date", $reqDate)->first();
        $attendanceCheckout->checkout_time = $request->checkout_time;
        //$attendanceCheckout->selfie_checkout = $request->selfie_checkout; //Need to save the image in folder and add path here
        $attendanceCheckout->checkout_comments = $request->checkout_comments;
        $attendanceCheckout->attendance_mode_checkout = "mobile";

        $attendanceCheckout->save();

        // processing and storing base64 files in public/selfies folder
        if($request->has('selfie_checkout')){

            $emp_selfiedir_path = public_path('employees/'.auth::user()->user_code.'/selfies/');

            // dd($emp_document_path);
            if(!File::isDirectory($emp_selfiedir_path))
                File::makeDirectory($emp_selfiedir_path, 0777, true, true);


            $selfieFileEncoded  =  $request->selfie_checkout;

            $fileName = $attendanceCheckout->id.'_checkout.png';

            \File::put($emp_selfiedir_path.$fileName, base64_decode($selfieFileEncoded));

            $attendanceCheckout->selfie_checkout = $fileName;
            $attendanceCheckout->save();
        }

        ////Store Reimbursement details if available
        $reimbursement_type = $request->reimbursement_type;


        //Get the reimbursement type




        $emptyObj  = new \stdClass;
        return response()->json([
            'status' => 'success',
            'message'=> 'Check out success',
            'data'   => $emptyObj
        ]);

    }

    public function saveReimbursementData(Request $request){


        //Save the reimbursement data
        $emp_reimbursement_data = new VmtEmployeeReimbursements;
        $emp_reimbursement_data->date = $request->date;
        $emp_reimbursement_data->reimbursement_type_id = VmtReimbursements::where('reimbursement_type',$request->reimbursement_type)->first()->value('id');
        $emp_reimbursement_data->user_id = Auth::user()->id;
        $emp_reimbursement_data->status = $request->status;

        //reimbursement details
        $emp_reimbursement_data->from = $request->from;
        $emp_reimbursement_data->to = $request->to;
        $emp_reimbursement_data->vehicle_type = $request->vehicle_type;
        $emp_reimbursement_data->distance_travelled = $request->distance_travelled;
        $emp_reimbursement_data->user_comments = $request->user_comments ?? "";

        if($request->vehicle_type == "2-Wheeler")
            $emp_reimbursement_data-> total_expenses  = $request->distance_travelled * $this->cost_per_km_2wheeler;
        else
        if($request->vehicle_type == "4-Wheeler")
            $emp_reimbursement_data-> total_expenses  = $request->distance_travelled * $this->cost_per_km_4wheeler;
        else
            $emp_reimbursement_data-> total_expenses = $request->distance_travelled;

        $emp_reimbursement_data->save();

        return response()->json([
            'status' => 'success',
            'message'=> 'Reimbursement detailed saved',
            'data'=> $request->all()
        ]);

    }


    /*
        attendanceApplyLeave():
        Input : date, leave_type_id
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    public function attendanceApplyLeave(Request $request)
    {
        // code...
        $attendanceLeave = new VmtEmployeeAttendance;
        $attendanceLeave->date  = $request->date;
        $attendanceLeave->leave_type_id  = $request->leave_type_id;
        $attendanceLeave->leave_comments = $request->leave_comments;
        $attendanceLeave->user_id  = auth::user()->id;
        $attendanceLeave->save();
        $emptyObj  = new \stdClass;

        return response()->json([
            'status' => 'success',
            'message'=> 'Leave success',
            'data'   => $emptyObj
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

    public function fetchEmployeeLeaveBalance(Request $request, VmtAttendanceService $serviceVmtAttendanceService){


        //Use TRY CATCH

        //Validate the request
            //If vaildation fails, send error json

            // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);


        //If validation success, fetch data

        //Send proper JSON
        /*
            {
                "status":"success",
                "message":"success/error message",
                "data":{

                }

            }

        */

        return $serviceVmtAttendanceService->fetchEmployeeLeaveBalance($request->user_id);
    }

    public function applyLeaveRequest(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        dd("---");
        //Need to split the validation based on leave type so that mandatory fields are checked correctly.

        $validator = Validator::make(
            $request->all(),
            $rules = [
                'user_id' => 'required|exists:users,user_code',
                'leave_request_date' => 'required',
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


        $response = $serviceVmtAttendanceService->applyLeaveRequest( user_id: $request->user_id,
                                                                    leave_request_date : $request->leave_request_date,
                                                                    start_date : $request->start_date,
                                                                    end_date : $request->end_date,
                                                                    hours_diff : $request->hours_diff,
                                                                    no_of_days : $request->no_of_days,
                                                                    compensatory_work_days_ids : $request->compensatory_work_days_ids,
                                                                    leave_session : $request->leave_session,
                                                                    leave_type_name : $request->leave_type_name,
                                                                    leave_reason : $request->leave_reason,
                                                                    notifications_users_id : $request->notifications_users_id
                                                );

        return $response;
    }

    public function approveRejectRevokeLeaveRequest(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        $validator = Validator::make(
            $request->all(),
            $rules = [
                'record_id' => 'required|exists:users,user_code',
                'approver_user_code' => 'required',
                'status' => 'required',
                'leave_rejection_text' => 'required',
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
        $response = $serviceVmtAttendanceService->approveRejectRevokeLeaveRequest($request->record_id, $request->approver_user_code, $request->status , $request->leave_rejection_text);

        return $response;
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

    public function applyRequestAttendanceRegularization(Request $request, VmtAttendanceService $serviceVmtAttendanceService){

        //Validate the request
        $validator = Validator::make(
            $request->all(),
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'attendance_date' => 'required',
                'regularization_type' => 'required',
                'user_time' => 'required',
                'regularize_time' => 'required',
                'reason' => 'required',
                'custom_reason' => 'required', //Send empty string even if no custom reason needed
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
        $response = $serviceVmtAttendanceService->fetchAttendanceRegularizationData($request->manager_user_code);

        return $response;

    }
}
