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

        //$users = User::all();
        //return response()->json($users);
        return response()->json([
            'status' => 'success',
            'message'=> 'Not implemented',
            'data'   => [
                'username'=> auth()->user()->name,
            ]
        ]);
    }

}
