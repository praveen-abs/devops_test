<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtPayrollSettingsService;
class VmtPayrollSettingsController extends Controller
{
    public function saveGenralPayrollSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->saveGenralPayrollSettings(
                $request->pay_frequency,
                $request->payperiod_start_month,
                $request->payperiod_end_date,
                $request->payment_date,
                $request->currency_type,
                $request->remuneration_type,
                $request->att_cutoff_period_id,
                $request->post_attendance_cutoff_date,
                $request->emp_attedance_cutoff_date,
                $request->paydays_in_month,
                $request->include_weekoffs,
                $request->include_holidays
            );

            return $response;

    }
}
