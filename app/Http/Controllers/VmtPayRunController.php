<?php

namespace App\Http\Controllers;

use App\Services\VmtPayRunService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VmtPayRunController extends Controller
{
    public function fetch_attendance_data(Request $request, VmtPayRunService $pay_run_service)
    { 
        $date = $request->date_req;
        if ( $date = $request->date_req == null ) {
            $current_date = Carbon::now();
            $current_month = $current_date->format('m');
            $last_month =  $current_month - 1;
            $date = 26;
            $year =  $current_date->format('Y');
            $start_date =  Carbon::parse($year . '-' . $last_month . '-' . $date)->format('Y-m-d');
            if ($current_date->lt(Carbon::parse($year . '-' .   $current_month . '-' . 25))) {
                $end_date = Carbon::parse($year . '-' .   $current_month . '-' . 25)->format('Y-m-d');
            } else {
                $end_date =   $current_date->format('Y-m-d');
            }
        } else {
           
            $start_date = Carbon::parse($date)->subMonth()->addDay(25)->format('Y-m-d');
            $end_date = Carbon::parse($date)->addDay(24)->format(('Y-m-d'));
        }
        return $pay_run_service->fetch_attendance_data($start_date, $end_date, $request->department_id, $request->client_id, $request->type, $request->active_status);
    }
}
