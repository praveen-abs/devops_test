<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeLeaveService;

class VmtEmployeeLeaveController extends Controller
{


    public function processEmployeeLeaveBalance(Request $request, VmtEmployeeLeaveService $vmtEmployeeLeaveService){

        $calendar_type = "Financial Year";
        $accrualLeaveAdd_startDate = "1";
        $user_id = "120";

        $vmtEmployeeLeaveService->processEmployeeLeaveBalance($calendar_type, $accrualLeaveAdd_startDate, $user_id);
    }
}
