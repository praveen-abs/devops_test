<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\VmtPayrollReports;
use App\Exports\VmtPmsReviewsReport;
use App\Models\VmtEmployeeAttendance;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\VmtEmployeeReimbursements;

class VmtReportsController extends Controller
{
    public function showPayrollReportsPage(Request $request){
        // $payroll_months = [
        //     "Nov 2022"=>"01-11-2022",
        //     "Dec 2022"=>"01-12-2022"
        // ];
        $query_payroll_year=VmtEmployeePaySlip::groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        //$query_payroll_months= VmtEmployeePaySlip::groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        $work_location= VmtEmployeeOfficeDetails::groupby('work_location')->pluck('work_location');
        $designation= VmtEmployeePaySlip::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->groupby('vmt_employee_office_details.designation')->pluck('vmt_employee_office_details.designation');

        for($i=0; $i < count($query_payroll_year); $i++)
        {
            $query_payroll_year[$i] = date("Y",strtotime($query_payroll_year[$i]));
        }

        $payroll_available_years = array_unique($query_payroll_year->toArray());
        // $payroll_months = [];
        // for($i=0;$i<count($query_payroll_months);$i++){
        //     $array_values = explode('-', $query_payroll_months[$i]);
        //         if($array_values[1]=='01'){
        //             $each_month=[
        //                 'January ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='02'){
        //             $each_month=[
        //                 'February ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='03'){
        //             $each_month=[
        //                 'March ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='04'){
        //             $each_month=[
        //                 'April ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //             //dd($each_month);
        //         }else if($array_values[1]=='05'){
        //             $each_month=[
        //                 'May ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='06'){
        //             $each_month=[
        //                 'Jun ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='07'){
        //             $each_month=[
        //                 'July ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='08'){
        //             $each_month=[
        //                 'August ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='09'){
        //             $each_month=[
        //                 'September ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='10'){
        //             $each_month=[
        //                 'October ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='11'){
        //             $each_month=[
        //                 'November ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }else if($array_values[1]=='12'){
        //             $each_month=[
        //                 'December ' . $array_values[0]=>$query_payroll_months[$i]
        //             ];
        //         }
        //         $payroll_months=array_merge($payroll_months, $each_month);
        // }

        return view('reports.vmt_showPayrollReports', compact('work_location','designation','payroll_available_years'));
    }

    // Retrieves all months payroll for the given Year

    public function fetchPayrollMonthForGivenYear(Request $request){
        $payroll_month=VmtEmployeePaySlip::whereYear('vmt_employee_payslip.PAYROLL_MONTH',$request->payroll_year)->groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        for($i=0; $i < count($payroll_month); $i++)
        {

            $payroll_month[$i] = date("m",strtotime($payroll_month[$i]));
        }
        $payroll_available_months = array_unique($payroll_month->toArray());

        return $payroll_available_months;
    }

    public function generatePayrollReports(Request $request){

        $filename = 'PayrollReports_'.$request->payroll_month.'.xlsx';
        return Excel::download(new VmtPayrollReports($request->payroll_month), $filename ,null, [\Maatwebsite\Excel\Excel::XLSX]);
    }

    public function fetchPayrollReport(Request $request){
        //  dd($request->all());
        $payroll_data=VmtEmployeePaySlip::leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('users', 'users.id', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->whereYear('vmt_employee_payslip.PAYROLL_MONTH', $request->payroll_year)
        // ->orWhere('vmt_employee_office_details.work_location',$request->work_location)
        ->select('users.user_code',
                 'users.name',

                 'vmt_employee_office_details.DESIGNATION',
                 'vmt_employee_details.doj',
                 'vmt_employee_details.dob',

                 'vmt_employee_office_details.work_location',

                  'vmt_employee_details.Aadhar_Number',
                  'vmt_employee_details.PAN_Number',

                 'vmt_employee_statutory_details.uan_number',
                 'vmt_employee_statutory_details.epf_number',
                 'vmt_employee_statutory_details.esic_number',

                 'vmt_employee_details.bank_id',
                 'vmt_employee_details.bank_account_number',
                 'vmt_employee_details.bank_ifsc_code',
                 'vmt_employee_details.mobile_number',

                 'vmt_employee_office_details.officical_mail',

                 //Abry and Enitiy
                 'vmt_employee_payslip.PAYROLL_MONTH',
                 //Total Emoluments
                 'vmt_employee_payslip.BASIC',
                 'vmt_employee_payslip.HRA',
                 'vmt_employee_payslip.SPL_ALW',
                 'vmt_employee_payslip.TOTAL_FIXED_GROSS',

                 'vmt_employee_statutory_details.esic_applicable',

                 'vmt_employee_payslip.MONTH_DAYS',
                 'vmt_employee_payslip.Worked_Days',
                 'vmt_employee_payslip.Arrears_Days',
                 'vmt_employee_payslip.LOP',
                 'vmt_employee_payslip.Earned_BASIC',
                 'vmt_employee_payslip.BASIC_ARREAR',
                 'vmt_employee_payslip.Earned_HRA',
                 'vmt_employee_payslip.HRA_ARREAR',
                 'vmt_employee_payslip.Earned_SPL_ALW',
                 'vmt_employee_payslip.SPL_ALW_ARREAR',
                 'vmt_employee_payslip.Overtime',
                 //Overtime Arrears
                 'vmt_employee_payslip.TOTAL_EARNED_GROSS',
                 'vmt_employee_payslip.PF_WAGES',
                 'vmt_employee_payslip.PF_WAGES_ARREAR_EPFR',
                 'vmt_employee_payslip.EPFR',
                 'vmt_employee_payslip.EPFR_ARREAR',
                 'vmt_employee_payslip.EDLI_CHARGES',
                 'vmt_employee_payslip.EDLI_CHARGES_ARREARS',
                 'vmt_employee_payslip.PF_ADMIN_CHARGES',
                 'vmt_employee_payslip.PF_ADMIN_CHARGES_ARREARS',
                 'vmt_employee_payslip.EMPLOYER_ESI',
                 'vmt_employee_payslip.Employer_LWF',
                 'vmt_employee_payslip.CTC',
                 'vmt_employee_payslip.EPF_EE',
                 //VPF
                 'vmt_employee_payslip.EPF_EE_ARREAR',
                 'vmt_employee_payslip.EMPLOYEE_ESIC',
                 'vmt_employee_payslip.PROF_TAX',
                 //'vmt_employee_payslip.TDS',
                 //incomeTax
                 'vmt_employee_payslip.SAL_ADV',
                 'vmt_employee_payslip.CANTEEN_DEDN',
                 'vmt_employee_payslip.OTHER_DEDUC',
                 'vmt_employee_payslip.LWF',
                 'vmt_employee_payslip.TOTAL_DEDUCTIONS',
                 'vmt_employee_payslip.NET_TAKE_HOME'
        );

        // For Filter Option

        if($request->payroll_month!="all"){
            $payroll_data=$payroll_data->whereMonth('vmt_employee_payslip.PAYROLL_MONTH',$request->payroll_month);
        }


        if($request->work_location !="all"){
            $payroll_data = $payroll_data->where('vmt_employee_office_details.work_location',$request->work_location);
        }

        if (session('client_id') != '1') {
            $payroll_data = $payroll_data-> where('users.client_id', session('client_id'));
            //return ($payroll_data);
        }

        //fetch bank names
        $payroll_data = $payroll_data->get();

        foreach($payroll_data as $singlePayrollData)
        {
            // $singlePayrollData['bank_name'] = Bank::find($singlePayrollData->bank_id)->bank_name;
            $singlePayrollData['bank_name'] = Bank::find($singlePayrollData->bank_id);
            if( $singlePayrollData['bank_name']){
                $singlePayrollData['bank_name']= $singlePayrollData['bank_name']->bank_name;
            }else{
                $singlePayrollData['bank_name']='';
            }
        }

        //dd($payroll_data->get());
        //dd( $payroll_data);
        return $payroll_data;
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
         //dd($request->reviewed_status);
        $query_pms_data=VmtPMS_KPIFormReviewsModel::
        leftJoin('users','users.id', '=','vmt_pms_kpiform_reviews.assignee_id')
        ->leftJoin('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.id', '=', 'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id')
        ->where('vmt_pms_kpiform_assigned.year','=',$request->year)
        //->orWhere('vmt_pms_kpiform_assigned.assignment_period','=',$request->assignment_period)
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
                 );
       //dd($query_pms_data);
        if($request->assignment_period!="All"){
            $query_pms_data= $query_pms_data-> where('vmt_pms_kpiform_assigned.assignment_period','=',$request->assignment_period);
        }
        if($request->submission_status=="1"){

            $query_pms_data= $query_pms_data-> where('vmt_pms_kpiform_reviews.is_assignee_submitted','=',1);
        }else if($request->submission_status==""){
            $query_pms_data= $query_pms_data-> where('vmt_pms_kpiform_reviews.is_assignee_submitted','=',null);
        }
        if($request->reviewed_status=="1"){
            $query_pms_data= $query_pms_data-> where('vmt_pms_kpiform_reviews.is_reviewer_submitted','like','%"1"}');
        }else if($request->reviewed_status==""){
            $query_pms_data= $query_pms_data-> where('vmt_pms_kpiform_reviews.is_reviewer_submitted','not like','%"1"}');
        }

        if (session('client_id') != '1') {
            $query_pms_data= $query_pms_data-> where('users.client_id', session('client_id'));
            //return ($payroll_data);
        }

        return $query_pms_data->get();
    }

    public function generatePmsReviewsReports(Request $request){
        //$filename = 'PmsReports_'.$request->calender_type.'.xlsx';
        //dd($request->all());

        return Excel::download(new VmtPmsReviewsReport($request->calender_type,
                                                       $request->year,
                                                       $request->assignment_period,
                                                       $request->is_assignee_submitted,
                                                       $request->is_reviewer_accepted,
                                                       $request->getHttpHost()
                                                       ), 'Pms Reports.xlsx');

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


    private function getManagerReimbursementsReports($year,$month,$status){
       //dd($year);

        $reimbursements_details=User::leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id','=',
        'users.id')
        ->leftJoin('vmt_department','vmt_department.id','=','vmt_employee_office_details.department_id')
        ->join('vmt_employee_reimbursements','vmt_employee_reimbursements.user_id','=', 'users.id')
        ->where('is_ssa',0)->where('active','1')
        ->whereYear('vmt_employee_reimbursements.date',$year)
        ->whereMonth('vmt_employee_reimbursements.date',$month)
        ->groupBy('users.id')
        ->select('users.user_code','users.name','vmt_employee_office_details.designation',
        'vmt_department.name as department',DB::raw('sum(vmt_employee_reimbursements.distance_travelled) as total_distance'),
        DB::raw('sum(vmt_employee_reimbursements.total_expenses) as total_expenses'),'vmt_employee_office_details.l1_manager_name');


        if($status!="undefined"){
            $reimbursements_details= $reimbursements_details->where('vmt_employee_reimbursements.status',$status);
        }
       // dd($reimbursements_details->get());

        return $reimbursements_details->get();

    }

    public function generateManagerReimbursementsReports(Request $request){
    // dd($request->selected_status);
        $year=$request->selected_year;
        $month=$request->selected_month;
        $status=$request->selected_status;
        $overall_distance=0;
        $overall_expense=0;

        $reimbursements_details = $this->getManagerReimbursementsReports($year,$month,$status);
       //dd($reimbursements_details);
        foreach( $reimbursements_details as $single_details){
              $overall_distance = $overall_distance+$single_details->total_distance;
              $overall_expense = $overall_expense+ $single_details->total_expenses;
        }
          //$totals = array('',"Total","","",$overall_distance, $overall_expense);
          $totals = array("Total"=>"Total","overall_distance"=>$overall_distance,"overall_Expense"=> $overall_expense);
         //dd($totals);

                           // ->sum('vmt_employee_reimbursements.distance_travelled');
         // dd(gettype($user_details));
       //  dd(count($reimbursements_details));
         $client_name=sessionGetSelectedClientName();
         if( $client_name=='Protocol'){
            $legal_entity='PROTOCOL LABELS INDIA PRIVATE LIMITED';
            $client_name=strtolower( $client_name);
         }else{
            $legal_entity=  $client_name;
            $client_name=strtolower( $client_name);
         }
         $file_name=date("F", strtotime('00-'.$month.'-01'))."-".$year;
         $month_name=strtoupper(date("F", strtotime('00-'.$month.'-01')));
        return Excel::download(new ManagerReimbursementsExport($reimbursements_details,
                                                               $totals,$legal_entity, $month_name,$year,$client_name
                                                              ), $file_name.' Reimbursements Reports.xlsx');

    }
    public function fetchManagerReimbursementsReports(Request $request){
        $month="2022";
        $year="12";
        $status="Pending";
        return  $this->getManagerReimbursementsReports($year,$month,$status);

    }
}
