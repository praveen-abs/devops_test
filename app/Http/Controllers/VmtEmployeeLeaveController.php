<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeLeaveService;
use App\Models\User;

class VmtEmployeeLeaveController extends Controller
{
       

    public function processEmployeeLeaveBalance(Request $request, VmtEmployeeLeaveService $vmtEmployeeLeaveService){
          
        $user_id = "144";

        $response = $vmtEmployeeLeaveService->processEmployeeLeaveBalance($user_id);

        dd($response);
    }
}
