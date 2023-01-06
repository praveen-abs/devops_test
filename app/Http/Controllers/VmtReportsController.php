<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormAssignedModel;
use Illuminate\Support\Facades\DB;
use App\Exports\VmtPayrollReports;
use App\Exports\VmtPmsReviewsReport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtReportsController extends Controller
{
    public function showPayrollReportsPage(Request $request){
        $payroll_months = [
            "Nov 2022"=>"01-11-2022",
            "Dec 2022"=>"01-12-2022"
        ];

        return view('reports.vmt_showPayrollReports', compact('payroll_months'));
    }

    public function generatePayrollReports(Request $request){

        $filename = 'PayrollReports_'.$request->payroll_month.'.xlsx';
        return Excel::download(new VmtPayrollReports($request->payroll_month), $filename ,null, [\Maatwebsite\Excel\Excel::XLSX]);
    }

    public function showPmsReviewsReportPage(Request $request){
        $query_configPms= ConfigPms::first();
        $query_years= VmtPMS_KPIFormAssignedModel::groupby('year')->select('year')->get();
        print($query_years->value('year'));exit;
        return view('reports.vmt_showPmsReviewsReports', compact('query_configPms','query_years'));

    }

    public function generatePmsReviewsReports(Request $request){
        //$filename = 'PmsReports_'.$request->calender_type.'.xlsx';


        return Excel::download(new VmtPmsReviewsReport($request->calender_type,
                                                       $request->year,
                                                       $request->assignment_period,
                                                       $request->is_assignee_submitted,
                                                       $request->getHttpHost()
                                                       ), 'Reports.xlsx');

    }


}
