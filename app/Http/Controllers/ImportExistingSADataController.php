<?php

namespace App\Http\Controllers;

use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Models\VmtInterestFreeLoanSettings;
use Illuminate\Http\Request;
use App\Imports\ImportExistingSalaryAdvanceData;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;


class ImportExistingSADataController extends Controller
{
    //
    public function saveSalaryAdvanceUploadPage(){

        return view('vmt_importSalaryAdvancedata');

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
            $temp_ar['status'] = 0;
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
        for($i=0; $i<count($data[0]); $i++){
             $max_loan_amount[] = $data[0][$i]['loan_amount'];
             $max_tenure[] = $data[0][$i]['tenure'];
             $emp_code = $data[0][$i]['employee_code'];

          $userss[]  = User::where('user_code',$emp_code)->get('client_id')->toArray();
        }
        $value=[];
        for($i=1; $i<count($userss); $i++){
             $value[] = $userss[$i][0]['client_id'];
        }
         $unique = array_unique($value);

     $json_flow  =  [
                ["approver"=>"fa_user_id",
                "order"=>1,
                "name"=>"Finance Admin"]
                  ];


            foreach($unique as $single_unique){

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
                $set_old_details_settings->active = 1;
                $set_old_details_settings->save();
            }

        //    return "saved";




        $users_id =[];
           for($i=1; $i<count($data[0]); $i++){
            $emp_code = $data[0][$i]['employee_code'];
            $users_id[]  = User::where('user_code',$emp_code)->pluck('id')->toArray();
       }


       for($i=0; $i<count($users_id); $i++){
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

      $j = $i + 1;

     $emp_interest_free_loan =  new VmtEmployeeInterestFreeLoanDetails;
     $emp_interest_free_loan->user_id = $users_id[$i][0];
     $emp_interest_free_loan->vmt_int_free_loan_id = $set_old_details_settings->id;
     $emp_interest_free_loan->request_id = $requestid;
     $emp_interest_free_loan->eligible_amount = 0;
     $emp_interest_free_loan->borrowed_amount = $data[0][$j]['loan_amount'];
     $emp_interest_free_loan->requested_date = 0;
     $emp_interest_free_loan->deduction_starting_month  = 0;
     $emp_interest_free_loan->deduction_ending_month  = 0;
     $emp_interest_free_loan->emi_per_month  = 0;
     $emp_interest_free_loan->tenure_months = 0;
     $emp_interest_free_loan->reason = $data[0][$j]['reason'];
     $emp_interest_free_loan->approver_flow = $this->getEmpapproverjson(json_encode($json_flow),$users_id[$i][0]);
     $emp_interest_free_loan->loan_crd_sts = 0;
     $emp_interest_free_loan->loan_status = 0;
     $emp_interest_free_loan->reviewer_cmds = 'summa';
     $emp_interest_free_loan->paid_date = 'titti';
     $emp_interest_free_loan->loan_category = $data[0][$j]['category'];
     $emp_interest_free_loan->UTR_number = null;
     $emp_interest_free_loan->save();


    }

    return "saved";

    }
}
