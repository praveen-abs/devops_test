<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VmtReportsController extends Controller
{
    public function showPayrollReportsPage(Request $request){
        dd("This is payroll reports page");
    }

    public function generatePayrollReports(Request $request){
        dd("This generates payroll ");
    }


}
