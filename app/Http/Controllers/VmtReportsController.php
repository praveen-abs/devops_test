<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VmtReportsController extends Controller
{
    public function showPayrollReportsPage(Request $request){
        $payroll_months = [
            "Nov 2022"=>"1-11-2022",
            "Dec 2022"=>"1-12-2022"
        ];

        return view('reports.vmt_showPayrollReports', compact('payroll_months'));
    }

    public function generatePayrollReports(Request $request){
        dd("This generates payroll ");
    }


}
