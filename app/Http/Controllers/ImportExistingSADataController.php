<?php

namespace App\Http\Controllers;

use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Models\VmtEmpInterestLoanDetails;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtInterestFreeLoanTransaction;
use App\Models\VmtLoanWithInterestTransactionRecord;
use Illuminate\Http\Request;
use App\Imports\ImportExistingSalaryAdvanceData;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use Carbon\Carbon;
use App\Models\VmtPayroll;
use Exception;


class ImportExistingSADataController extends Controller
{
    //
    public function saveSalaryAdvanceUploadPage()
    {

        return view('vmt_importSalaryAdvancedata');
    }

    public function loanTransectionRecord($loan_type, $loan_detail_id, $paid_emi, $emi)
    {

        try {
            if ($loan_type == 'InterestFreeLoan') {
                // dd($record_id);
                $loan_details = VmtEmployeeInterestFreeLoanDetails::where('id', $loan_detail_id)->first();
                $borrowed_amount = $loan_details->borrowed_amount;
                $tenure_months =  $loan_details->tenure_months;
                $deduction_starting_month = $loan_details->deduction_starting_month;
                for ($i = 0; $i < $tenure_months; $i++) {
                    $loan_detail = new VmtInterestFreeLoanTransaction;
                    $loan_detail->emp_loan_details_id = $loan_detail_id;
                    $loan_detail->expected_emi = $emi;
                    if ($i == 0) {
                        $loan_detail->payroll_date =  $deduction_starting_month;
                        $loan_detail->expected_emi =  $borrowed_amount / $tenure_months;
                        $loan_detail->paid_emi =  $paid_emi;
                    }
                    $loan_detail->payroll_date = Carbon::parse($deduction_starting_month)->addMonth($i);
                    $loan_detail->save();
                }
            } else if ($loan_type == 'InterestWithLoan') {
                $loan_details = VmtEmpInterestLoanDetails::where('id', $loan_detail_id)->first();
                $borrowed_amount = $loan_details->borrowed_amount;
                $tenure_months =  $loan_details->tenure_months;
                $deduction_starting_month = $loan_details->deduction_starting_month;
                for ($i = 0; $i < $tenure_months; $i++) {
                    $loan_detail = new VmtInterestFreeLoanTransaction;
                    $loan_detail->emp_loan_details_id = $loan_detail_id;
                    $loan_detail->expected_emi = $emi;
                    if ($i == 0) {
                        $loan_detail->payroll_date =  $deduction_starting_month;
                        $loan_detail->expected_emi =  $borrowed_amount / $tenure_months;
                        $loan_detail->expected_emi =  $paid_emi;
                    }
                    $loan_detail->payroll_date = Carbon::parse($deduction_starting_month)->addMonth($i);
                }
            } else {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Undefined Loan type'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Employee Loan History",
                "data" => $e->getMessage(),
            ]);
        }
    }

    public function imporExistingSalaryAdvanceData(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $importDataArry = \Excel::toArray(new ImportExistingSalaryAdvanceData, request()->file('file'));

        return $this->storeBulkFinComponentsPayslips($importDataArry);
    }


    public function getEmpapproverjson($settings_flow, $user_id)
    {
        $settings_flow = json_decode($settings_flow, true);
        $approver_flow = array();
        $temp_ar = array();
        foreach ($settings_flow as $single_ar) {

            $temp_ar['order'] = $single_ar['order'];

            $temp_column = $single_ar['approver'];
            $temp_ar['approver'] = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first()->$temp_column;
            if ($temp_column == 'l1_manager_code') {
                $temp_ar['approver'] = User::where('user_code', $temp_ar['approver'])->first()->id;
            }
            $temp_ar['status'] = 1;
            if ($temp_ar['approver'] == null || empty($temp_ar['approver'])) {
                return ('Error While Creating Approver Flow json');
            }
            array_push($approver_flow, $temp_ar);
            unset($temp_ar);
        }
        return (json_encode($approver_flow, true));
    }

    public function storeBulkFinComponentsPayslips($data)
    {
        // dd($data[0]);

        $max_loan_amount = array();
        $max_tenure = array();
        $emp_code = array();
        $userss = array();
        for ($i = 0; $i < count($data[0]); $i++) {
            $max_loan_amount[] = $data[0][$i]['loan_amount'];
            $max_tenure[] = $data[0][$i]['tenure'];
            $emp_code = $data[0][$i]['employee_code'];

            $userss[]  = User::where('user_code', $emp_code)->get('client_id')->toArray();
        }
        $value = [];
        for ($i = 1; $i < count($userss); $i++) {
            $value[] = $userss[$i][0]['client_id'];
        }
        $unique = array_unique($value);

        $json_flow  =  [
            [
                "approver" => "fa_user_id",
                "order" => 1,
                "name" => "Finance Admin"
            ]
        ];

        $loan_settings_ids = array();
        foreach ($unique as $single_unique) {
            $set_old_details_settings =  new VmtInterestFreeLoanSettings;
            $set_old_details_settings->client_id = $single_unique;
            $set_old_details_settings->name = "Existing Loan Free Interest Setting";
            $set_old_details_settings->loan_applicable_type = "fixed";
            $set_old_details_settings->min_month_served = 1;
            $set_old_details_settings->max_loan_amount = max($max_loan_amount);
            $set_old_details_settings->percent_of_ctc = null;
            $set_old_details_settings->deduction_starting_months = 1;
            $set_old_details_settings->max_tenure_months = max($max_tenure);
            $set_old_details_settings->approver_flow = json_encode($json_flow);
            $set_old_details_settings->active = 0;
            $set_old_details_settings->save();
            $temp_ar['client_id'] = $single_unique;
            $temp_ar['setting_id'] =  $set_old_details_settings->id;
            array_push($loan_settings_ids, $temp_ar);
        }
        //    return "saved";




        $users_details = $data[0];
        // dd($data[0]);
        //  dd( $users_details);
        for ($i = 1; $i < count($users_details); $i++) {
            $emp_code = $users_details[$i]['employee_code'];
            $users =  User::where('user_code', $emp_code)->first();
            $user_id  =  $users->id;
            $client_id =    $users->client_id;
            $deduction_starting_month = Carbon::parse(VmtPayroll::where('client_id', $client_id)->orderBy('payroll_date', 'DESC')->first()->payroll_date);
            //  $deduction_ending_month  =   $deduction_starting_month->addMonth($users_details[$i]['tenure']+1);
            foreach ($loan_settings_ids as $single_id) {
                if ($single_id['client_id'] == $client_id) {
                    $loan_stg_id = $single_id['setting_id'];
                }
            }
            $getallintrestfreeemp = VmtEmployeeInterestFreeLoanDetails::get()->sortByDesc('id')->first();

            if (empty($getallintrestfreeemp)) {
                $requestid = "ABSIF001";
            } else {
                $substrid = substr($getallintrestfreeemp->request_id, 5);
                $add1 = ($substrid + 1);
                $tostring = ((string) ($add1));
                $strlenth = strlen($tostring);
                if ($strlenth == 1) {
                    $requestid = "ABSIF" . "00" . $add1;
                } else if ($strlenth == 2) {
                    $requestid = "ABSIF" . "0" . $add1;
                } else {
                    $requestid = "ABSIF" . $add1;
                }
            }

            $emp_interest_free_loan =  new VmtEmployeeInterestFreeLoanDetails;
            //  dd($user_id);
            $emp_interest_free_loan->user_id =  $user_id;
            $emp_interest_free_loan->vmt_int_free_loan_id = $loan_stg_id;
            $emp_interest_free_loan->request_id = $requestid;
            $emp_interest_free_loan->eligible_amount = 0;
            $emp_interest_free_loan->eligible_amount = $users_details[$i]['loan_amount'];
            $emp_interest_free_loan->borrowed_amount = $users_details[$i]['loan_amount'];
            $emp_interest_free_loan->requested_date = Carbon::now()->format('Y-m-d');
            $emp_interest_free_loan->deduction_starting_month  =   $deduction_starting_month->format('Y-m-d');
            $emp_interest_free_loan->paid_date =  $deduction_starting_month->format('Y-m-d');
            $emp_interest_free_loan->deduction_ending_month  =   $deduction_starting_month->addMonth($users_details[$i]['tenure'])->format('Y-m-d');
            $emp_interest_free_loan->emi_per_month  = $users_details[$i]['emi'];
            $emp_interest_free_loan->tenure_months = $users_details[$i]['tenure'] + 1;
            $emp_interest_free_loan->reason = $users_details[$i]['reason'];
            $emp_interest_free_loan->approver_flow = $this->getEmpapproverjson(json_encode($json_flow), $user_id);
            $emp_interest_free_loan->loan_crd_sts = 1;
            $emp_interest_free_loan->loan_status = 'On Going';
            $emp_interest_free_loan->reviewer_cmds = ' ';
            $emp_interest_free_loan->loan_category = $users_details[$i]['category'];
            $emp_interest_free_loan->UTR_number = null;
            $emp_interest_free_loan->save();
            $this->loanTransectionRecord('InterestFreeLoan', $emp_interest_free_loan->id, $users_details[$i]['repayment_made'], $users_details[$i]['emi']);
        }
        return "saved";
    }

    public function loanAndAdvanceImportFormat(){
        
    }
}
