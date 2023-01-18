<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtEmployeePaySlip;
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
        // $payroll_months = [
        //     "Nov 2022"=>"01-11-2022",
        //     "Dec 2022"=>"01-12-2022"
        // ];
        $query_payroll_months= VmtEmployeePaySlip::groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        $payroll_months = [];
        for($i=0;$i<count($query_payroll_months);$i++){
            $array_values = explode('-', $query_payroll_months[$i]);
                if($array_values[1]=='01'){
                    $each_month=[
                        'January ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='02'){
                    $each_month=[
                        'February ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='03'){
                    $each_month=[
                        'March ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='04'){
                    $each_month=[
                        'April ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                    //dd($each_month);
                }else if($array_values[1]=='05'){
                    $each_month=[
                        'May ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='06'){
                    $each_month=[
                        'Jun ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='07'){
                    $each_month=[
                        'July ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='08'){
                    $each_month=[
                        'August ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='09'){
                    $each_month=[
                        'September ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='10'){
                    $each_month=[
                        'October ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='11'){
                    $each_month=[
                        'November ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }else if($array_values[1]=='12'){
                    $each_month=[
                        'December ' . $array_values[2]=>$query_payroll_months[$i]
                    ];
                }
                $payroll_months=array_merge($payroll_months, $each_month);
        }

        return view('reports.vmt_showPayrollReports', compact('payroll_months'));
    }

    public function generatePayrollReports(Request $request){

        $filename = 'PayrollReports_'.$request->payroll_month.'.xlsx';
        return Excel::download(new VmtPayrollReports($request->payroll_month), $filename ,null, [\Maatwebsite\Excel\Excel::XLSX]);
    }

    public function showPmsReviewsReportPage(Request $request){
        $query_configPms= ConfigPms::first(['calendar_type','frequency']);
        $query_years= VmtPMS_KPIFormAssignedModel::groupby('year')->pluck('year');
        $username=User::groupby('id')->pluck('name','id');
        $username=json_decode($username, true);

        //dd($query_years);
        //dd($query_years->value('year'));
        return view('reports.vmt_showPmsReviewsReports', compact('query_configPms','query_years','username'));

    }

    public function filterPmsReport(Request $request){

        $query_pms_data=VmtPMS_KPIFormReviewsModel::
        leftJoin('users','users.id', '=','vmt_pms_kpiform_reviews.assignee_id')
        ->leftJoin('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.id', '=', 'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id')
        ->where('vmt_pms_kpiform_assigned.year','=',$request->year)
        ->orWhere('vmt_pms_kpiform_assigned.assignment_period','=',$request->assignment_period)
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
       //dd($query_pms_data);

        return $query_pms_data;
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
