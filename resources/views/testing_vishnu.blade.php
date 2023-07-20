<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\VmtEmployee;
    use App\Models\VmtPMS_KPIFormAssignedModel;
    use App\Models\VmtPMS_KPIFormDetailsModel;
    use Dompdf\Dompdf;
     use Dompdf\Options;
     use Carbon\Carbon;

    use App\Models\VmtTempEmployeeProofDocuments;
    use App\Models\VmtEmployeeOfficeDetails;
    use App\Models\VmtClientMaster;
    use App\Mail\ApproveRejectEmpDetails;
    use App\Mail\VmtPMSMail_Assignee;
    use App\Models\User;
    use App\Models\VmtEmpPaygroup;
    use App\Models\VmtPaygroup;

    use App\Models\VmtEmployeeAttendance;
    use App\Models\VmtEmployeePayroll;
    use App\Models\VmtEmployeePaySlip;
    use App\Models\VmtEmployeePaySlipV2;
    use App\Models\VmtPMS_KPIFormModel;
    use App\Models\VmtLoanInterestSettings;
    use App\Models\VmtUserMailStatus;
    use App\Models\VmtEmployeePayslipStatus;
    use App\Models\VmtEmployeeMailStatus;
    use App\Models\VmtEmployeeStatutoryDetails;
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

//             $emppayslip = new VmtEmployeePaySlipV2;
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

                // //     $query_payslips[] = VmtEmployeePaySlipV2::where('emp_payroll_id',$singleuserid->id)
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

//         $query_payslips = VmtEmployeePaySlipV2::leftjoin('vmt_emp_payroll','vmt_emp_payroll.id','=','vmt_employee_payslip_v2.emp_payroll_id')
//                                              ->leftjoin('vmt_payroll','vmt_payroll.id','=','vmt_emp_payroll.payroll_id')
//                                              ->leftjoin('users','users.id','=','vmt_emp_payroll.user_id')
//                                              ->whereYear('vmt_payroll.payroll_date', $year)
//                                              ->whereMonth('vmt_payroll.payroll_date',$month)
//                                             ->where('users.is_ssa','0')
//                                             ->where('users.active','1')
//                                             ->get(['payroll_date','users.name','users.id']);                                                                        // "max_loan_amount as max_eligible_amount",
                                                                        // "loan_amt_interest as interest_rate",
                                                                        // "deduction_starting_months",
                                                                        // "max_tenure_months",
//                                                                         $multiple_months=array();


//                                                                         $user_id=auth()->user()->id;
//         $doj=Carbon::parse(VmtEmployee::where('userid', $user_id)->first()->doj);
//         $avaliable_int_loans=VmtInterestFreeLoanSettings::orderBy('min_month_served','DESC')->get();


//      $client_data = Users::where('id',auth()->user()->id)->first();





//             $loan_withinterest_setting_data =VmtLoanInterestSettings::get();

//             $loan_setting_count =count($loan_withinterest_setting_data);
//             for($i=0; $i<$loan_setting_count; $i++)
//             {
//             $deduction_months = array();

//             for($j=1; $j<=$loan_withinterest_setting_data[$i]->deduction_starting_months; $j++)
//             {
//                $deduction_months[]= Carbon::now()->addMonths($j)->format('Y-m-d');
//             }

//             $loan_withinterest_setting_data[$i]->deduction_starting_months = $deduction_months;
//            }
//             //array_push( $loan_withinterest_setting_data,$deduction_starting_months);

// dd( $loan_withinterest_setting_data );



//             $loan_withinterest_setting_data =VmtLoanInterestSettings::get();

//            foreach ($loan_withinterest_setting_data as $key => $singledata) {

// echo ($singledata['deduction_starting_months']);
//             $deduction_months = array();

//             for($j=1; $<=$singledata['deduction_starting_months']; $i++)
//             {
//                $deduction_months[]= Carbon::now()->addMonths($j)->format('Y-m-d');
//             }

//             $$singledata['deduction_starting_months']= $deduction_months;
//            }
//             //array_push( $loan_withinterest_setting_data,$deduction_starting_months);

// dd( $loan_withinterest_setting_data );









// $payroll_month=VmtPayroll::whereYear('payroll_date','2022')->groupby('payroll_date')->pluck('payroll_date');
//         for($i=0; $i < count($payroll_month); $i++)
//         {

//             $payroll_month[$i] = date("m",strtotime($payroll_month[$i]));
//         }
//         $payroll_available_months = array_unique($payroll_month->toArray());

// dd($payroll_available_months);


// $query_docs = User::whereIn('id',[174, 177, 179])->get();
// dd($query_docs);



// $timestamp = (strtotime('2023-03-01 08:56:04'));
// $date = date('Y-j-n', $timestamp);
// $time = date('H:i:s', $timestamp);
// echo ($date .'<br>'.$time)

// $attendanceCheckOut = \DB::table('vmt_staff_attenndance_device')
//                         ->select('user_Id', \DB::raw('MAX(date) as check_out_time'))
//                         ->whereDate('date', '2023-06-26')
//                         ->where('user_Id', 'PLIPL009')
//                         ->first(['check_out_time']);

//                         dd($attendanceCheckOut );


                        //dd($attendanceCheckOut );

    //                     uploadDocument($client_id,$fileObject){

    // try{
    //         $emp_code = User::find($emp_id)->user_code;

    //         $Client_logo= VmtClientMaster::where('client_id', $client_id);

    //         //check if document already uploaded

    //         }
    //         else
    //         {
    //             $employee_documents = new VmtEmployeeDocuments;
    //             $employee_documents->user_id = $emp_id;
    //             $employee_documents->doc_id = $onboard_doc_id;
    //         }


    //         $date = date('d-m-Y_H-i-s');
    //         $fileName =  str_replace(' ', '', $onboard_document_type).'_'.$emp_code.'_'.$date.'.'.$fileObject->extension();
    //         $path = $emp_code.'/onboarding_documents';
    //         $filePath = $fileObject->storeAs($path,$fileName, 'private');
    //         $employee_documents->doc_url = $fileName;

    //         $employee_documents_status = VmtEmployeeDocuments::where('user_id', $emp_id)
    //                                                            ->where('doc_id',$onboard_doc_id);

    //         if($employee_documents_status->exists() ){
    //                 $employee_documents_status = $employee_documents_status->first()->status;
    //            if($employee_documents_status == 'Approved')
    //                 $employee_documents->status = $employee_documents_status;
    //            else{
    //             $employee_documents->status ='Pending';
    //            }
    //         }else{

    //             $employee_documents->status = 'Pending';
    //          }


    //         $employee_documents->save();
    //     }
    //     catch(\Exception $e){
    //         dd("Error :: uploadDocument() ".$e);
    //     }

    //     return "success";


// $flowCheck	="1";

// $assignment_period_year =	"2023";
// $calendar_type	="financial_year";
// $hidden_calendar_year=	"April+-+2022+to+March+-+2023";
// $frequency	="quarterly";
// $assignment_period_start=	"q3";
// $department=	"6";
// $employees =['246','247','248'];
// $reviewer[]="245";
// $hr_id	="245";
// $selected_kpi_form_id=	"1";

//     //$reviewerMailId  = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->whereIn('userid', explode(',',$kpi_AssignedTable->reviewer_id))->pluck('officical_mail','userid')->toArray();
//      $assigneeName = User::whereIn('id',$employees)->pluck('name')->first();
//     //             $assignerName = User::where('id',auth::user()->id)->pluck('name')->first();
//                $comments_employee = '';
//     $login_Link = request()->getSchemeAndHttpHost();


//      $is_sent=\Mail::to('vvishva185@gmail.com')
//                         ->send(new VmtPMSMail_Assignee("none",$flowCheck,
//                                                        $assigneeName,
//                                                        $hidden_calendar_year." - ".strtoupper($assignment_period_start),
//                                                        'vishnu',
//                                                        $comments_employee,
//                                                        $login_Link));
// if($is_sent){
//     echo 'hii';
// }else{
//     echo 'bye';
// }
// $query_document =VmtDocuments::all();
//              $query_doc_id = array();
//           foreach ($query_document as $key => $Singledocid)
//             {
//                 $query_doc_id[] = $Singledocid;
//             }

//              $query_user_doc_id = array();
//           foreach ($query_doc_id as $key => $Singledocid)
//             {
//                 $query_user_doc_id[] = VmtEmployeeDocuments::where('user_id','236')->where('doc_id',$Singledocid['id'])->first();
//              }

//              dd(  $query_doc_id );
//              $reponse= array_diff($query_user_doc_id,$query_doc_id);




            //     $query_document =VmtDocuments::all()->toarray();

            //     $query_user_doc_id = VmtEmployeeDocuments::where('user_id','236')->get()->toarray();


            //     $present_doc= $query_document->diff($query_user_doc_id);

            //     $missing_doc=$query_document->diff($present_doc);
            //  $emp_documents=array();
            //  foreach ($present_doc as $key => $singledata) {

            //      if($docid){
            //         $emp_documents[$key]=
            //         $emp_documents[$key]['document_name']=VmtDocuments::where('id',$singledata->id)->first()->document_name;
            //      }else{
            //         $emp_documents[$j]['document_name']=VmtDocuments::where('id',$singledocid)->first()->document_name;
            //         $emp_documents[$j]['status']=null;
            //      }
            //      $i++;
            //     }

        //      $missing_doc_id= $query_document->diff($query_user_doc_id);
        //      $present_doc_id= $query_document->diff($missing_doc);
        //      $emp_documents=array();
        //                $i=0;
        //      foreach ($present_doc_id as $key => $singledocid) {
        //              $emp_documents[$i]= VmtEmployeeDocuments::where('user_id','236')->where('doc_id',$singledocid)->first();
        //              $emp_documents[$i]['document_name']=VmtDocuments::where('id',$singledocid)->first()->document_name;
        //              $i++;
        //            }
        //            $j=$i;
        //    foreach ($missing_doc_id as $key => $singledocid) {
        //               $emp_documents[$j]['document_name']=VmtDocuments::where('id',$singledocid)->first()->document_name;
        //               $emp_documents[$j]['status']=null;
        //               $j++;
        //          }


$data =array();

        $employees_aadhar_number =VmtEmployee::pluck('aadhar_number')->toarray();

// dd($employees_aadhar_number);
        // $aadhar_number = array_filter($employees_aadhar_number, static function($employees_aadhar_number){
        //     return $employees_aadhar_number !== null;
        // } );
     
dd($aadhar_number);
        $data['aadhar_number']=array_values($aadhar_number);


          //array_push($data,$employees_user_code,$employees_email,$employees_mobile_number);
        dd($data);

        //



    ?>


@endsection

