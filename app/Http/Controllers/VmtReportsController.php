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
use App\Models\VmtEmployeeAttendance;
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

    public function showAttendanceReport(Request $request){
        $attendance_year=VmtEmployeeAttendance::groupby('date')->pluck('date');

        for($i=0; $i < count($attendance_year); $i++)
        {
            $attendance_year[$i] = date("Y",strtotime($attendance_year[$i]));
        }

        $attendance_available_years = array_unique($attendance_year->toArray());

        return view('reports.vmt_attendance_reports',compact('attendance_available_years'));
    }

    /*
        Retrieves all months attendance for the
        given Year

    */
    public function fetchAttendanceForGivenYear(Request $request){

        $attendance_month=VmtEmployeeAttendance::whereYear('vmt_employee_attendance.date',$request->attendance_year)->groupby('date')->pluck('date');
        for($i=0; $i < count($attendance_month); $i++)
        {

            $attendance_month[$i] = date("m",strtotime($attendance_month[$i]));
        }
        $attendance_available_months = array_unique($attendance_month->toArray());

        return $attendance_available_months;

    }

    public function fetchAttendanceInfo(Request $request){
        //    dd($request->attendance_year);
        $attendance_data= VmtEmployeeAttendance::leftJoin('users as us', 'us.id', '=', 'vmt_employee_attendance.user_id')
        ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','us.id')
        ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','us.id')
       ->whereYear('vmt_employee_attendance.date',$request->attendance_year)
        ->select('user_code','name','designation','checkin_time','checkout_time',
                       'regularization_type','status');
        //dd($attendance_data);
        if($request->attendance_month!="All"){
            $attendance_data=$attendance_data->whereMonth('vmt_employee_attendance.date',$request->attendance_month);
        }

        return $attendance_data->get();
    }


}
