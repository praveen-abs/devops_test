<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\User;
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
        $query_configPms= ConfigPms::first(['calendar_type','frequency']);
        $query_years= VmtPMS_KPIFormAssignedModel::groupby('year')->pluck('year');
        $username=User::groupby('id')->pluck('id','name');
        $query_pms_data=VmtPMS_KPIFormReviewsModel::
        leftJoin('users','users.id', '=','vmt_pms_kpiform_reviews.assignee_id')
        ->leftJoin('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.id', '=', 'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id')
        // ->where([
        //     //['vmt_pms_kpiform_assigned.calendar_type','=',$this->calendar_type],
        //     ['vmt_pms_kpiform_assigned.year','=',$this->year],
        //     ['vmt_pms_kpiform_assigned.assignment_period','=',$this->assignment_period],
        //     //['vmt_pms_kpiform_reviews.is_assignee_submitted','=',$this->is_assignee_submitted]
        // ])
        ->select(
                  'users.user_code',
                  'users.name',
                  'vmt_pms_kpiform_assigned.calendar_type',
                  'vmt_pms_kpiform_assigned.year',
                  'vmt_pms_kpiform_assigned.frequency',
                  'vmt_pms_kpiform_assigned.assignment_period',
                  'vmt_pms_kpiform_reviews.is_assignee_submitted',
                   //'vmt_pms_kpiform_reviews.is_reviewer_accepted', //For Manager name
                   'vmt_pms_kpiform_reviews.is_reviewer_submitted',


                 )
        ->get();
        //dd($query_years);
        //dd($query_years->value('year'));
        return view('reports.vmt_showPmsReviewsReports', compact('query_configPms','query_years','query_pms_data','username'));

    }


    public function generatePmsReviewsReports(Request $request){
        //$filename = 'PmsReports_'.$request->calender_type.'.xlsx';
        //dd($request->all());

        return Excel::download(new VmtPmsReviewsReport($request->calender_type,
                                                       $request->year,
                                                       $request->assignment_period,
                                                       $request->is_assignee_submitted,
                                                       $request->getHttpHost()
                                                       ), 'Reports.xlsx');

    }


}
