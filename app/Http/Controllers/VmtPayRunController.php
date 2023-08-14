<?php

namespace App\Http\Controllers;

use App\Services\VmtPayRunService;
use Illuminate\Http\Request;

class VmtPayRunController extends Controller
{
    public function fetchAttendanceDataApi(Request $request, VmtPayRunService $pay_run_service)
    {
        return $pay_run_service->test();
    }
}
