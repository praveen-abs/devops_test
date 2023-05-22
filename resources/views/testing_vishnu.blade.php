<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\VmtEmployee;
    use App\Models\VmtPMS_KPIFormAssignedModel;
    use App\Models\VmtPMS_KPIFormDetailsModel;
    use App\Models\VmtGeneralInfo;
    use App\Models\VmtClientMaster;
    use App\Models\User;

    use App\Models\VmtEmployeePayroll;
    use App\Models\VmtEmployeePaySlip;
    use App\Models\VmtEmployeePayslipV2;
    use App\Models\VmtPMS_KPIFormModel;
    use App\Models\VmtUserMailStatus;
    use App\Models\VmtEmployeePayslipStatus;
    use App\Models\VmtEmployeeMailStatus;
    use App\Models\VmtPayroll;
    use App\Mail\QuickOnboardLink;
    use App\Services\VmtApprovalsService;
    use App\Mail\WelcomeMail;


?>

@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
    <?php

//     foreach ($emp_payroll_user_id as $key => $singleuser) {

// $user_code = User::where('id',$singleuser)->first()->user_code;
//     $emp_client_code = preg_replace('/\d+/', '',strtoupper($user_code));
// $client_data = VmtClientMaster::where('client_code',$emp_client_code)->first();
// $client_id = array();
// if(!empty($client_data)){
// $client_id[]=$client_data->id;

// }
// }


 /*Get all employee payslip details */

        $query_all_payslip = VmtEmployeePayslip::all();

/* save single payrollmonth in vmt_payroll*/
            $emp_payroll_month = VmtEmployeePayslip::whereYear('created_at', '2022')->orwhereYear('created_at','2023')->distinct('created_at')->orderBy('PAYROLL_MONTH', 'ASC')->pluck('PAYROLL_MONTH');

//  $client_details_id = VmtClientMaster::get("id");

//  foreach ($client_details_id as $key => $singleclient) {

//             foreach ($emp_payroll_month as $key => $singlepayrollmonth) {
//                 $query_payroll = new Vmtpayroll;
//                 $query_payroll->client_id=$singleclient->id;
//                 $query_payroll->payroll_date=$singlepayrollmonth;
//                 $query_payroll->save();
//             }
// }



// /* save user id and payroll id in the table vmt_emp_payroll*/
//           foreach ($query_all_payslip as $key => $singleuserdata) {
//                 $query_payroll_data= new VmtEmployeePayroll;
//                 $query_payroll_data->user_id=$singleuserdata->user_id;
//                 $client_id = User::where('id',$singleuserdata->user_id)->first()->client_id;
//                 $payroll_id =VmtPayroll::where('payroll_date',$singleuserdata->PAYROLL_MONTH)
//                                          ->where('client_id',$client_id)->first()->id;
//                 $query_payroll_data->payroll_id=$payroll_id;
//                 $query_payroll_data->save();
//             }

//  /*save all employee payslip details in vmt_employee_payslipv2 */

//         foreach ($query_all_payslip as $key => $singlepayslipdetails) {

//             $emppayslip = new VmtEmployeePayslipV2;
//  /*get payroll id from vmt_emp_payroll in order to filter payroll_date and find emp_payroll_id */

//                $client_id = User::where('id',$singlepayslipdetails->user_id)->first()->client_id;
//                 $payroll_id =VmtPayroll::where('payroll_date',$singlepayslipdetails->PAYROLL_MONTH)
//                                          ->where('client_id',$client_id)->first()->id;
//            $emp_payroll_id=VmtEmployeePayroll::where('user_id',$singlepayslipdetails->user_id)->where('payroll_id',$payroll_id)->first()->id;
//            $emppayslip->emp_payroll_id= $emp_payroll_id;
//            $emppayslip->basic=$singlepayslipdetails->BASIC;
//            $emppayslip->hra=$singlepayslipdetails->HRA;
//            $emppayslip->child_edu_allowance=$singlepayslipdetails->CHILD_EDU_ALLOWANCE;
//            $emppayslip->spl_alw=$singlepayslipdetails->SPL_ALW;
//            $emppayslip->total_fixed_gross=$singlepayslipdetails->TOTAL_FIXED_GROSS;
//            $emppayslip->month_days=$singlepayslipdetails->MONTH_DAYS;
//            $emppayslip->worked_Days=$singlepayslipdetails->Worked_Days;
//            $emppayslip->arrears_Days=$singlepayslipdetails->Arrears_Days;
//            $emppayslip->lop=$singlepayslipdetails->LOP;
//            $emppayslip->earned_basic=$singlepayslipdetails->Earned_BASIC;
//            $emppayslip->basic_arrear=$singlepayslipdetails->BASIC_ARREAR;
//            $emppayslip->earned_hra=$singlepayslipdetails->Earned_HRA;
//            $emppayslip->hra_arrear=$singlepayslipdetails->HRA_ARREAR;
//            $emppayslip->earned_child_edu_allowance=$singlepayslipdetails->Earned_CHILD_EDU_ALLOWANCE;
//            $emppayslip->child_edu_allowance_arrear=$singlepayslipdetails->CHILD_EDU_ALLOWANCE_ARREAR;
//            $emppayslip->earned_spl_alw=$singlepayslipdetails->Earned_SPL_ALW;
//            $emppayslip->spl_alw_arrear=$singlepayslipdetails->SPL_ALW_ARREAR;
//            $emppayslip->overtime=$singlepayslipdetails->Overtime;
//            $emppayslip->total_earned_gross=$singlepayslipdetails->TOTAL_EARNED_GROSS;
//            $emppayslip->pf_wages=$singlepayslipdetails->PF_WAGES;
//            $emppayslip->pf_wages_arrear_epfr=$singlepayslipdetails->PF_WAGES_ARREAR_EPFR;
//            $emppayslip->epfr=$singlepayslipdetails->EPFR;
//            $emppayslip->epfr_arrear=$singlepayslipdetails->EPFR_ARREAR;
//            $emppayslip->edli_charges=$singlepayslipdetails->EDLI_CHARGES;
//            $emppayslip->edli_charges_arrears=$singlepayslipdetails->EDLI_CHARGES_ARREARS;
//            $emppayslip->pf_admin_charges=$singlepayslipdetails->PF_ADMIN_CHARGES;
//            $emppayslip->pf_admin_charges_arrears=$singlepayslipdetails->PF_ADMIN_CHARGES_ARREARS;
//            $emppayslip->employer_esi=$singlepayslipdetails->EMPLOYER_ESI;
//            $emppayslip->employer_lwf=$singlepayslipdetails->Employer_LWF;
//            $emppayslip->ctc=$singlepayslipdetails->CTC;
//            $emppayslip->epf_ee=$singlepayslipdetails->EPF_EE;
//            $emppayslip->epf_ee_arrear=$singlepayslipdetails->EPF_EE_ARREAR;
//            $emppayslip->employee_esic=$singlepayslipdetails->EMPLOYEE_ESIC;
//            $emppayslip->prof_tax=$singlepayslipdetails->PROF_TAX;
//            $emppayslip->income_tax=$singlepayslipdetails->income_tax;
//            $emppayslip->sal_adv=$singlepayslipdetails->SAL_ADV;
//            $emppayslip->canteen_dedn=$singlepayslipdetails->CANTEEN_DEDN;
//            $emppayslip->other_deduc=$singlepayslipdetails->OTHER_DEDUC;
//            $emppayslip->lwf=$singlepayslipdetails->LWF;
//            $emppayslip->total_deductions=$singlepayslipdetails->TOTAL_DEDUCTIONS;
//            $emppayslip->net_take_home=$singlepayslipdetails->NET_TAKE_HOME;
//            $emppayslip->rupees=$singlepayslipdetails->Rupees;
//            $emppayslip->el_opn_bal=$singlepayslipdetails->EL_Opn_Bal;
//            $emppayslip->availed_el=$singlepayslipdetails->Availed_EL;
//            $emppayslip->balance_el=$singlepayslipdetails->Balance_EL;
//            $emppayslip->sl_opn_bal=$singlepayslipdetails->SL_Opn_Bal;
//            $emppayslip->availed_sl=$singlepayslipdetails->Availed_SL;
//            $emppayslip->balance_sl=$singlepayslipdetails->Balance_SL;
//            $emppayslip->greetings=$singlepayslipdetails->Greetings;
//            $emppayslip->travel_conveyance=$singlepayslipdetails->travel_conveyance;
//            $emppayslip->other_earnings=$singlepayslipdetails->other_earnings;
//            $emppayslip->save();


//          }

  // $payroll_month= VmtPayroll::whereMonth('payroll_date', $month)
            //                                      ->whereYear('payroll_date', $year)->first();

                //  $emp_payslip_id =VmtEmployeePayroll::where('user_id','144')->get('id');
                //  $query_payslips=array();
                //   foreach ($emp_payslip_id as $key => $singleuserid) {

                // //     $query_payslips[] = VmtEmployeePayslipV2::where('emp_payroll_id',$singleuserid->id)
                // //                                     ->orderBy('emp_payroll_id', 'ASC')
                // //                                     ->get(['id','NET_TAKE_HOME','TOTAL_DEDUCTIONS','TOTAL_EARNED_GROSS']);
                //  }
        //         $month='08';
        //          $year='2022';
        //          $user_id ='144';

        //          $response['payslip_data'] = User::with([
        //                                     'getEmployeeDetails' => function($query){
        //                                        $query->select(['id','userid','dob','doj','location','pan_number','bank_id','bank_account_number','bank_ifsc_code']);
        //                                     },
        //                                     'getEmployeeOfficeDetails' => function($query){
        //                                             $query->select(['id','user_id','designation']);
        //                                     },
        //                                     'getStatutoryDetails' =>function($query){
        //                                         $query->select(['id','user_id','epf_number','esic_number','uan_number']);
        //                                     },
        //                                     'single_payslip_empid' =>function($query){
        //                                         $query->select(['user_id']);
        //                                     },
        //                                     'single_payslip_month' =>function($query) use($month , $year){
        //                                         $query->whereMonth('payroll_date', $month)
        //                                               ->whereYear('payroll_date', $year)
        //                                               ->select(['payroll_date']);
        //                                     },
        //                                     'single_payslip_detail' => function($query) {
        //                                             $query->select(['id','month_days as MONTH_DAYS','worked_Days as Worked_Days','lop as LOP','arrears_Days as ArrearS_Days','basic as BASIC','hra as HRA','spl_alw as SPL_ALW',
        //                                                     'overtime as Overtime','travel_conveyance','total_earned_gross as TOTAL_EARNED_GROSS','prof_tax as PROF_TAX','income_tax','sal_adv as SAL_ADV','other_deduc as OTHER_DEDUC','total_deductions as TOTAL_DEDUCTIONS','epfr as EPFR','employee_esic as EMPLOYEE_ESIC',
        //                                                     'net_take_home as NET_TAKE_HOME','employer_esi as EMPLOYER_ESI']);
        //                                         },
        //                                     ])
        //                                     ->where('users.id','144')
        //                                     ->get(['users.id','users.name','users.user_code','users.email']);

        //   dd( $response['payslip_data']);
// $year='2022';
// $month='10';

//         $query_payslips = VmtEmployeePayslipV2::leftjoin('vmt_emp_payroll','vmt_emp_payroll.id','=','vmt_employee_payslip_v2.emp_payroll_id')
//                                              ->leftjoin('vmt_payroll','vmt_payroll.id','=','vmt_emp_payroll.payroll_id')
//                                              ->leftjoin('users','users.id','=','vmt_emp_payroll.user_id')
//                                              ->whereYear('vmt_payroll.payroll_date', $year)
//                                              ->whereMonth('vmt_payroll.payroll_date',$month)
//                                             ->where('users.is_ssa','0')
//                                             ->where('users.active','1')
//                                             ->get(['payroll_date','users.name','users.id']);
$payroll_month=VmtPayroll::whereYear('payroll_date','2022')->groupby('payroll_date')->pluck('payroll_date');
        for($i=0; $i < count($payroll_month); $i++)
        {

            $payroll_month[$i] = date("m",strtotime($payroll_month[$i]));
        }
        $payroll_available_months = array_unique($payroll_month->toArray());

dd($payroll_available_months);
    ?>


@endsection
