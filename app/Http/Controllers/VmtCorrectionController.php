<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeReimbursements;
use App\Models\User;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtClientMaster;
use App\Models\VmtPayroll;
use App\Models\VmtEmployeeWorkShifts;
use App\Models\VmtEmployeePayslipV2;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeeLeaves;
use Carbon\Carbon;
Use Exception;

class VmtCorrectionController extends Controller
{
    public function processsExpense(Request $request){
        $reimbursement_details=VmtEmployeeReimbursements::select('id','vehicle_type_id','distance_travelled','total_expenses')
                                                         ->get();
        foreach( $reimbursement_details as $single_details){
                 if($single_details->vehicle_type_id==1){
                    $totalExpense=3.5*$single_details->distance_travelled;
                    $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                    $UpdateDetails->total_expenses= $totalExpense;
                    $UpdateDetails->save();

                 }else if( $single_details->vehicle_type_id==2){
                    $totalExpense=6*$single_details->distance_travelled;
                    $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                    $UpdateDetails->total_expenses= $totalExpense;
                    $UpdateDetails->save();
                   // dd('---------------');

                  //  dd( $single_details);
                 }
        }
        return  $reimbursement_details;

    }

    public function addingReimbursementsDataForSpecificMonth(Request $request){
         $existing_data = VmtEmployeeReimbursements::where('user_id',$request->user_id)
                                                    ->whereMonth('date',$request->month)
                                                    ->get()->toArray();
        $response = array();
         foreach(  $existing_data as $single_data){
               try{
                $new_record = new VmtEmployeeReimbursements;
                $new_record->user_id = $single_data['user_id'];
                $new_record->reimbursement_type_id = $single_data['reimbursement_type_id'];
                $new_record->date = Carbon::parse($single_data['date'])->addMonth()->toDateString();
                $new_record->reviewer_id = $single_data['reviewer_id'];
                $new_record->status = 'Pending';
                $new_record->from = $single_data['from'];
                $new_record->to = $single_data['to'];
                $new_record->vehicle_type_id = $single_data['vehicle_type_id'];
                $new_record->distance_travelled = $single_data['distance_travelled'];
                $new_record->total_expenses = $single_data['total_expenses'];
                $new_record->save();
                $response = array_merge($response,array(Carbon::parse($single_data['date'])->addMonth()->toDateString()=>$new_record->toArray()));

               }catch(\Exception $e){
                  dd($e);
               }

         }

         return $response;
    }
    public function  checkallemployeeonboardingstatus(){

        $query_all_users_details=User::get();
    try{
        foreach($query_all_users_details as $single_user_data){
              //get the mandatory document id
              $mandatory_doc_ids = VmtDocuments::where('is_mandatory','1')->pluck('id');

             //get the employees uploaded documents mandatory id
              $user_uploaded_docs_ids = VmtEmployeeDocuments::whereIn('doc_id',$mandatory_doc_ids)
                                                              ->where('vmt_employee_documents.user_id',$single_user_data->id)
                                                              ->pluck('doc_id');

          if(count($mandatory_doc_ids) == count($user_uploaded_docs_ids))
            {
             //set the onboard status to 1
                $currentUser =User::where('id',$single_user_data->id)->first();
                $currentUser->is_onboarded = '1';
                $currentUser->save();

           }
        }
    }catch(\Exception $e){
        dd($e);
     }
    }
    public function  addAllEmployeePayslipDetails(){

    /*Get all employee payslip details */

        $query_all_payslip = VmtEmployeePaySlip::all();

    /* save single payrollmonth in vmt_payroll*/
            $emp_payroll_month = VmtEmployeePaySlip::whereYear('created_at', '2022')->orwhereYear('created_at','2023')->distinct('created_at')->orderBy('PAYROLL_MONTH', 'ASC')->pluck('PAYROLL_MONTH');

            $client_details_id = VmtClientMaster::get("id");

            foreach ($client_details_id as $key => $singleclient) {

                foreach ($emp_payroll_month as $key => $singlepayrollmonth) {
               $Payroll_data=VmtPayroll::where('client_id',$singleclient->id)->where('payroll_date',$singlepayrollmonth)->first();
                  if(empty($Payroll_data)){
                    $query_payroll = new Vmtpayroll;
                    $query_payroll->client_id=$singleclient->id;
                    $query_payroll->payroll_date=$singlepayrollmonth;
                    $query_payroll->save();
                    }
                }
            }



         /* save user id and payroll id in the table vmt_emp_payroll*/
             foreach ($query_all_payslip as $key => $singleuserdata) {
                $client_id = User::where('id',$singleuserdata->user_id)->first()->client_id;
                $payroll_id =VmtPayroll::where('payroll_date',$singleuserdata->PAYROLL_MONTH)
                                                  ->where('client_id',$client_id)->first()->id;
                $emp_payroll_data = VmtEmployeePayroll::where('payroll_id',$payroll_id)->where('user_id',$singleuserdata->user_id)->first();
                    if(empty($emp_payroll_data)){
                    $query_payroll_data= new VmtEmployeePayroll;
                    $query_payroll_data->user_id=$singleuserdata->user_id;
                    $query_payroll_data->payroll_id=$payroll_id;
                    $query_payroll_data->save();
                  }
            }
         /*save all employee payslip details in vmt_employee_payslipv2 */

         foreach ($query_all_payslip as $key => $singlepayslipdetails) {

            $client_id = User::where('id',$singlepayslipdetails->user_id)->first()->client_id;
            $payroll_id =VmtPayroll::where('payroll_date',$singlepayslipdetails->PAYROLL_MONTH)
                                        ->where('client_id',$client_id)->first()->id;
           $emp_payroll_id=VmtEmployeePayroll::where('user_id',$singlepayslipdetails->user_id)->where('payroll_id',$payroll_id)->first()->id;

            /*get payroll id from vmt_emp_payroll in order to filter payroll_date and find emp_payroll_id */
            $emp_payslip_data = VmtEmployeePayslipV2::where('emp_payroll_id',$emp_payroll_id)->first();
            if(empty($emp_payslip_data)){
           $emppayslip = new VmtEmployeePayslipV2;
           $emppayslip->emp_payroll_id= $emp_payroll_id;
           $emppayslip->basic=$singlepayslipdetails->BASIC;
           $emppayslip->hra=$singlepayslipdetails->HRA;
           $emppayslip->child_edu_allowance=$singlepayslipdetails->CHILD_EDU_ALLOWANCE;
           $emppayslip->spl_alw=$singlepayslipdetails->SPL_ALW;
           $emppayslip->total_fixed_gross=$singlepayslipdetails->TOTAL_FIXED_GROSS;
           $emppayslip->month_days=$singlepayslipdetails->MONTH_DAYS;
           $emppayslip->worked_Days=$singlepayslipdetails->Worked_Days;
           $emppayslip->arrears_Days=$singlepayslipdetails->Arrears_Days;
           $emppayslip->lop=$singlepayslipdetails->LOP;
           $emppayslip->earned_basic=$singlepayslipdetails->Earned_BASIC;
           $emppayslip->basic_arrear=$singlepayslipdetails->BASIC_ARREAR;
           $emppayslip->earned_hra=$singlepayslipdetails->Earned_HRA;
           $emppayslip->hra_arrear=$singlepayslipdetails->HRA_ARREAR;
           $emppayslip->earned_child_edu_allowance=$singlepayslipdetails->Earned_CHILD_EDU_ALLOWANCE;
           $emppayslip->child_edu_allowance_arrear=$singlepayslipdetails->CHILD_EDU_ALLOWANCE_ARREAR  ;
           $emppayslip->earned_spl_alw=$singlepayslipdetails->Earned_SPL_ALW;
           $emppayslip->spl_alw_arrear=$singlepayslipdetails->SPL_ALW_ARREAR;
           $emppayslip->overtime=$singlepayslipdetails->Overtime;
           $emppayslip->total_earned_gross=$singlepayslipdetails->TOTAL_EARNED_GROSS;
           $emppayslip->pf_wages=$singlepayslipdetails->PF_WAGES;
           $emppayslip->pf_wages_arrear_epfr=$singlepayslipdetails->PF_WAGES_ARREAR_EPFR;
           $emppayslip->epfr=$singlepayslipdetails->EPFR;
           $emppayslip->epfr_arrear=$singlepayslipdetails->EPFR_ARREAR;
           $emppayslip->edli_charges=$singlepayslipdetails->EDLI_CHARGES;
           $emppayslip->edli_charges_arrears=$singlepayslipdetails->EDLI_CHARGES_ARREARS;
           $emppayslip->pf_admin_charges=$singlepayslipdetails->PF_ADMIN_CHARGES;
           $emppayslip->pf_admin_charges_arrears=$singlepayslipdetails->PF_ADMIN_CHARGES_ARREARS;
           $emppayslip->employer_esi=$singlepayslipdetails->EMPLOYER_ESI;
           $emppayslip->employer_lwf=$singlepayslipdetails->Employer_LWF;
           $emppayslip->ctc=$singlepayslipdetails->CTC;
           $emppayslip->epf_ee=$singlepayslipdetails->EPF_EE;
           $emppayslip->epf_ee_arrear=$singlepayslipdetails->EPF_EE_ARREAR;
           $emppayslip->employee_esic=$singlepayslipdetails->EMPLOYEE_ESIC;
           $emppayslip->prof_tax=$singlepayslipdetails->PROF_TAX;
           $emppayslip->income_tax=$singlepayslipdetails->income_tax;
           $emppayslip->sal_adv=$singlepayslipdetails->SAL_ADV;
           $emppayslip->canteen_dedn=$singlepayslipdetails->CANTEEN_DEDN;
           $emppayslip->other_deduc=$singlepayslipdetails->OTHER_DEDUC;
           $emppayslip->lwf=$singlepayslipdetails->LWF;
           $emppayslip->total_deductions=$singlepayslipdetails->TOTAL_DEDUCTIONS;
           $emppayslip->net_take_home=$singlepayslipdetails->NET_TAKE_HOME;
           $emppayslip->rupees=$singlepayslipdetails->Rupees;
           $emppayslip->el_opn_bal=$singlepayslipdetails->EL_Opn_Bal;
           $emppayslip->availed_el=$singlepayslipdetails->Availed_EL;
           $emppayslip->balance_el=$singlepayslipdetails->Balance_EL;
           $emppayslip->sl_opn_bal=$singlepayslipdetails->SL_Opn_Bal;
           $emppayslip->availed_sl=$singlepayslipdetails->Availed_SL;
           $emppayslip->balance_sl=$singlepayslipdetails->Balance_SL;
           $emppayslip->greetings=$singlepayslipdetails->Greetings;
           $emppayslip->travel_conveyance=$singlepayslipdetails->travel_conveyance;
           $emppayslip->other_earnings=$singlepayslipdetails->other_earnings;
           $emppayslip->save();
            }

         }
    }


    public function addElbalancewithjsonString(Request $request){
      $data ='[{"user_code": "DM001","el_balance": 15},{ "user_code": "DM002", "el_balance": 15},
        {
         "user_code": "DM003",
         "el_balance": 15
        },
        {
         "user_code": "DM004",
         "el_balance": 15
        },
        {
         "user_code": "DM006",
         "el_balance": 5.5
        },
        {
         "user_code": "DM007",
         "el_balance": 6
        },
        {
         "user_code": "DM009",
         "el_balance": 10.5
        },
        {
         "user_code": "DM012",
         "el_balance": 8.5
        },
        {
         "user_code": "DM016",
         "el_balance": 15
        },
        {
         "user_code": "DM018",
         "el_balance": 6
        },
        {
         "user_code": "DM019",
         "el_balance": 9.5
        },
        {
         "user_code": "DM021",
         "el_balance": 1
        },
        {
         "user_code": "DM022",
         "el_balance": 5
        },
        {
         "user_code": "DM024",
         "el_balance": 9
        },
        {
         "user_code": "DM026",
         "el_balance": 8.5
        },
        {
         "user_code": "DM028",
         "el_balance": 6
        },
        {
         "user_code": "DM029",
         "el_balance": 9
        },
        {
         "user_code": "DM032",
         "el_balance": 5
        },
        {
         "user_code": "DM034",
         "el_balance": 12
        },
        {
         "user_code": "DM038",
         "el_balance": 9.5
        },
        {
         "user_code": "DM045",
         "el_balance": 6.5
        },
        {
         "user_code": "DM054",
         "el_balance": 15
        },
        {
         "user_code": "DM059",
         "el_balance": 5
        },
        {
         "user_code": "DM069",
         "el_balance": 13
        },
        {
         "user_code": "DM071",
         "el_balance": 11
        },
        {
         "user_code": "DM079",
         "el_balance": 8.5
        },
        {
         "user_code": "DM088",
         "el_balance": 6
        },
        {
         "user_code": "DM091",
         "el_balance": 3
        },
        {
         "user_code": "DM094",
         "el_balance": 8
        },
        {
         "user_code": "DM095",
         "el_balance": 7
        },
        {
         "user_code": "DM101",
         "el_balance": 5
        },
        {
         "user_code": "DM103",
         "el_balance": 6
        },
        {
         "user_code": "DM104",
         "el_balance": 5
        },
        {
         "user_code": "DM106",
         "el_balance": 9
        },
        {
         "user_code": "DM107",
         "el_balance": 4
        },
        {
         "user_code": "DM109",
         "el_balance": 8
        },
        {
         "user_code": "DM110",
         "el_balance": 7
        },
        {
         "user_code": "DM112",
         "el_balance": 14
        },
        {
         "user_code": "DM113",
         "el_balance": 6
        },
        {
         "user_code": "DM115",
         "el_balance": 7
        },
        {
         "user_code": "DM117",
         "el_balance": 2
        },
        {
         "user_code": "DM118",
         "el_balance": 12.5
        },
        {
         "user_code": "DM120",
         "el_balance": 9
        },
        {
         "user_code": "DM122",
         "el_balance": 6
        },
        {
         "user_code": "DM123",
         "el_balance": 6
        },
        {
         "user_code": "DM124",
         "el_balance": 7
        },
        {
         "user_code": "DM125",
         "el_balance": 5
        },
        {
         "user_code": "DM127",
         "el_balance": 8.5
        },
        {
         "user_code": "DM128",
         "el_balance": 6
        },
        {
         "user_code": "DM131",
         "el_balance": 5
        },
        {
         "user_code": "DM134",
         "el_balance": 6
        },
        {
         "user_code": "DM140",
         "el_balance": 7
        },
        {
         "user_code": "DM141",
         "el_balance": 8.5
        },
        {
         "user_code": "DM145",
         "el_balance": 9
        },
        {
         "user_code": "DM146",
         "el_balance": 7
        },
        {
         "user_code": "DM148",
         "el_balance": 9
        },
        {
         "user_code": "DM149",
         "el_balance": 10
        },
        {
         "user_code": "DM150",
         "el_balance": 8
        },
        {
         "user_code": "DM151",
         "el_balance": 5.5
        },
        {
         "user_code": "DM153",
         "el_balance": 8
        },
        {
         "user_code": "DM154",
         "el_balance": 6
        },
        {
         "user_code": "DM156",
         "el_balance": 9
        },
        {
         "user_code": "DM159",
         "el_balance": 5
        }
       ]';

       $data = preg_replace('/\s+/', '', $data);
       $el_balance_json = json_decode($data, true);
       $leave_type_id=1;
        foreach( $el_balance_json as $single_user){
           $user_id = User::where('user_code',$single_user['user_code'])->first();
            if( $user_id==null){
               dd($single_user['user_code'].' does not exists in database');
            }else{
                // Joobi Karthi
                try {


                    $employee_leave = new VmtEmployeeLeaves;
                    $employee_leave->user_id = $user_id->id;
                    $employee_leave->leave_type_id =   $leave_type_id;
                    $employee_leave->start_date = '2022-06-01';
                    $employee_leave->end_date = '2022-06-10';
                    $employee_leave->total_leave_datetime=$single_user['el_balance'];
                    $employee_leave->status = 'Approved';
                    $employee_leave->save();


                  } catch (\Exception $e) {
                      return $e->getMessage();
                  }
            }
        }

        return 'Leave Balance Added Sucessfully';
    }


    public function addingWorkShiftForAllEmployees(Request $request){
        $number_of_flexi_shift=3;
        $all_employees=User::where('is_ssa',0)->get();
        foreach( $all_employees as $single_employee){
           if($single_employee->user_code=='DM054'||$single_employee->user_code=='DM145'||$single_employee->user_code=='DM178'||
             $single_employee->user_code=='DM176'||$single_employee->user_code=='DM183'){
                try
                {
                 $employee_work_shift = new VmtEmployeeWorkShifts;
                 $employee_work_shift->user_id = $single_employee->id;
                 $employee_work_shift->work_shift_id = 2;
                 $employee_work_shift->is_active = 1;
                 $employee_work_shift->save();
                }
                catch(Exception $e)
                {
                   dd($e->getMessage());
                }
           }else if($single_employee->user_code=='DM109'){
                   try
                   {
                    $employee_work_shift = new VmtEmployeeWorkShifts;
                    $employee_work_shift->user_id = $single_employee->id;
                    $employee_work_shift->work_shift_id = 3;
                    $employee_work_shift->is_active = 1;
                    $employee_work_shift->save();
                   }
                   catch(Exception $e)
                   {
                      dd($e->getMessage());
            }
           }else if($single_employee->user_code=='DM182'||$single_employee->user_code=='DM150'|| $single_employee->user_code=='DM179'|| $single_employee->user_code=='DM095'||
           $single_employee->user_code=='DMC101'||$single_employee->user_code=='DMC136'||$single_employee->user_code=='DMC133'||$single_employee->user_code=='DMC129'||$single_employee->user_code=='DM019'||
           $single_employee->user_code=='DM165'||$single_employee->user_code=='DM153'||$single_employee->user_code=='DM170'||$single_employee->user_code=='DMC069'||$single_employee->user_code=='DM045'){
                                   for($i=1;$i<=$number_of_flexi_shift;$i++){
                                    try
                                    {
                                     $employee_work_shift = new VmtEmployeeWorkShifts;
                                     $employee_work_shift->user_id = $single_employee->id;
                                     $employee_work_shift->work_shift_id = VmtWorkShifts::where('shift_type','Shift '.$i)->first('id')->id;
                                     $employee_work_shift->is_active = 1;
                                     $employee_work_shift->save();
                                    }
                                      catch(Exception $e)
                                    {
                                       dd($e->getMessage());
                                   }

                                   }

           }else{
            try
            {
             $employee_work_shift = new VmtEmployeeWorkShifts;
             $employee_work_shift->user_id = $single_employee->id;
             $employee_work_shift->work_shift_id = 1;
             $employee_work_shift->is_active = 1;
             $employee_work_shift->save();
            }
            catch(Exception $e)
            {
               dd($e->getMessage());
           }
           }
        }

        return "Employee Work Shift Added";

    }

}
