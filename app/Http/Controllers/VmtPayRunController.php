<?php

namespace App\Http\Controllers;

use App\Services\VmtPayRunService;
use Illuminate\Http\Request;

class VmtPayRunController extends Controller
{
    public function fetch_attendance_data(Request $request, VmtPayRunService $pay_run_service)
    {
         $start_date = '2023-06-26';
         $end_date = '2023-07-25';
        return $pay_run_service->fetch_attendance_data( $start_date ,  $end_date);
    }
}
