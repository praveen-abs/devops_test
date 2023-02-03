<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeLeaveService;
use App\Models\User;

class VmtEmployeeLeaveController extends Controller
{


    public function processEmployeeLeaveBalance(Request $request, VmtEmployeeLeaveService $vmtEmployeeLeaveService){

        $user_id = "144";
        $leave_type_id = "1";

        $response = $vmtEmployeeLeaveService->processEmployeeLeaveBalance($user_id, $leave_type_id);

        dd($response);
    }
}
