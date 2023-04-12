<?php

namespace App\Http\Controllers\Api;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Services\VmtDashboardService;
use App\Services\VmtAttendanceService;

class VmtAPIDashboardController extends HRMSBaseAPIController
{

    public function getDashboardData() {


        $data = [

            'username'=> auth()->user()->name,
            'appointments'=> "1",
            'meetings'=> "2",
            'visits'=> "4",

        ];

        return response()->json([
            'status' => 'success',
            'message'=> 'Not implemented',
            'data'   => $data
        ]);
    }

    public function getMainDashboardData(Request $request, VmtDashboardService $serviceVmtDashboardService, VmtAttendanceService $serviceVmtAttendanceService){

        $validator = Validator::make(
            $request->all(),
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

        //Fetch the data
        $response = $serviceVmtDashboardService->getMainDashboardData($request->user_code, $serviceVmtAttendanceService);



        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $response
        ]);



        // $today_date= Carbon::now()->format('Y-m-d');
        // $month=Carbon::now()->format('m');
        // $month_start = Carbon::parse(Carbon::now()->format('Y').'-'.$month.'-01')->format('Y-m-d');
        // return $month_start;
        // $user_code = User::where('id','=',$request->user_id)->pluck('user_code');
        // $name = User::where('id','=',$request->user_id)->pluck('name');
        // $days_present = array();
        // $total_leave_days = VmtEmployeeLeaves::where('user_id',$request->user_id)
        //                     ->whereMonth('start_date',$month)
        //                     ->whereMonth('end_date',$month)
        //                     ->where('status','Approved')
        //                     ->get('total_leave_datetime')->sum('total_leave_datetime');

        // $employee_biomatric_attendnace_query = VmtStaffAttendanceDevice::where('user_id',$user_code)
        //                                  ->whereMonth('date',$month)->pluck('date')->toArray();
        // $employee_web_attendance_query = VmtEmployeeAttendance::where('user_id',$request->user_id)
        //                                  ->whereMonth('date',$month)->pluck('date')->toArray();
        // $employee_attendance_array = array_merge( $employee_biomatric_attendnace_query, $employee_web_attendance_query);


        //     foreach($employee_attendance_array as $single_data ){
        //         array_push($days_present,Carbon::parse($single_data)->format('Y-m-d'));
        //     }
        //     $days_present = array_unique($days_present);
        //     $total_present_days = count($days_present);
        //     return $today_date;

        // $data=User::join('vmt_employee_attendance','vmt_employee_attendance.user_id','=','users.id')
        //       ->where('vmt_employee_attendance.user_id','=',$request->user_id)
        //       ->whereMonth('vmt_employee_attendance.date','=',$month)
        //       ->get(['users.name',])
        // return response()->json([
        //     'status' => 'success',
        //     'message'=> '',
        //     'data'   => $data
        // ]);

    }




}
