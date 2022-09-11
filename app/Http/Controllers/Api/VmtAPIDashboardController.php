<?php

namespace App\Http\Controllers\Api;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\HRMSBaseAPIController;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendance;
use Illuminate\Support\Facades\Auth;

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

}
