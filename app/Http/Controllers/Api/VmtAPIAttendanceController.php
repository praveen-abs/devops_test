<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use App\Models\VmtEmployeeAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VmtAPIAttendanceController extends HRMSBaseAPIController
{
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

        // date,checkin_time,shift_type,work_mode, seflie_checkin,checkin_comments

        $attendanceCheckin           = new VmtEmployeeAttendance;
        $attendanceCheckin->date          = $request->date;
        $attendanceCheckin->checkin_time  = $request->checkin_time;
        $attendanceCheckin->user_id       = auth::user()->id;
        $attendanceCheckin->shift_type    = $request->shift_type;
        $attendanceCheckin->work_mode      = $request->work_mode;
        //$attendanceCheckin->selfie_checkin = $request->selfie_checkin; ////Need to save the image in folder and add path here
        $attendanceCheckin->checkin_comments = $request->checkin_comments;
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

        $emptyObj  = new \stdClass;
        return response()->json([
            'status' => 'success',
            'message'=> 'Check out success',
            'data'   => $emptyObj
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

        $monthlyGroups = VmtEmployeeAttendance::select(\DB::raw('MONTH(date) month'))->groupBy('month')->orderBy('month', 'DESC')->get();

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

}
