<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VmtEmployeeReimbursements;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtReimbursements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VmtAPIAttendanceController extends HRMSBaseAPIController
{

    private $cost_per_km_2wheeler = 3.5;
    private $cost_per_km_4wheeler = 6;

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
    public function attendanceMonthlyReport(Request $request)
    {
        // code...
        $workingCount = $onTimeCount = $lateCount = $leftTimelyCount = $leftEarlyCount = $onLeaveCount = $absentCount = 0;

        //$reportMonth  = $request->has('month') ? $request->month : date('m');

        $monthlyGroups = VmtEmployeeAttendance::select(\DB::raw('MONTH(date) month'))->where('user_id', auth::user()->id)->groupBy('month')->orderBy('month', 'DESC')->get();
        $monthlyReport =  [];

        foreach ($monthlyGroups as $key => $value) {
            // code...
            //dd($value);
            $dailyAttendanceReport  = VmtEmployeeAttendance::select('id', 'date', 'user_id', 'checkin_time', 'checkout_time', 'leave_type_id', 'shift_type')
                ->where('user_id', auth::user()->id)
                ->whereMonth("date", $value->month)
                ->orderBy('created_at', 'DESC')
                ->get();


            $workingCount = $dailyAttendanceReport->count();
            $onLeaveCount = $dailyAttendanceReport->whereNotNull('leave_type_id')->count() ;

            $monthlyReport[]  =  array(
                                    "year_value" => substr($dailyAttendanceReport[0]["date"],0,4),
                                    "month_value"  => $value->month,
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





        return response()->json([
            'status' => 'success',
            'message'=> '',
            'data'   => [
                            "month"  => $monthlyReport
                        ]
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


        return $serviceVmtAttendanceService->applyLeaveRequest($request);
    }



}

