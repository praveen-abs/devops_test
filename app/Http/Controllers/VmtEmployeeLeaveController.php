<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeLeaveService;

class VmtEmployeeLeaveController extends Controller
{


    public function processEmployeeLeaveBalance(Request $request, VmtEmployeeLeaveService $vmtEmployeeLeaveService){

        $user_id = "120";

        $response = $vmtEmployeeLeaveService->processEmployeeLeaveBalance($user_id);

        dd($response);
    }
}
