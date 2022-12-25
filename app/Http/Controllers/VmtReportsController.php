<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VmtReportsController extends Controller
{
    public function showPayrollReportsPage(Request $request){
        return view('reports.vmt_showPayrollReports');
    }

    public function generatePayrollReports(Request $request){
        dd("This generates payroll ");
    }


}
