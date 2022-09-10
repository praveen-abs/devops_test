<?php

namespace App\Http\Controllers\api;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendance;
use Illuminate\Support\Facades\Auth;

class VmtAPIDashboardController extends HRMSBaseAPIController
{
    
    {
        return response()->json([
            'status' => true,
            'message'=> 'Not implemented',
            'data'   => 'Not implemented'
        ]);
    }


    
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
            'status' => true,
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

        $attendanceCheckin = new VmtEmployeeAttendance; 
        $attendanceCheckin->date  = $request->date;
        $attendanceCheckin->checkin_time  = $request->checkin_time;
        $attendanceCheckin->user_id  = auth::user()->id;
        $attendanceCheckin->shift_type  = $request->shift_type;
        $attendanceCheckin->save();

        $emptyObj  = new \stdClass; 
        return response()->json([
            'status' => true,
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
        $attendanceCheckout->save();

        $emptyObj  = new \stdClass; 
        return response()->json([
            'status' => true,
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
        $attendanceLeave->user_id  = auth::user()->id;
        $attendanceLeave->save();
        $emptyObj  = new \stdClass;

        return response()->json([
            'status' => true,
            'message'=> 'Leave success',
            'data'   => $emptyObj
        ]);
    }
}
