<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use App\Models\VmtLoanInterestSettings;
use App\Models\VmtSalaryAdvSettings;
use Carbon\Carbon;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtEmployeeInterestFreeLoanDetails;

class VmtSalaryAdvanceService
{
    public function AssignEmpSalaryAdv( $request){

        $simma = VmtSalaryAdvSettings::join('vmt_emp_assign_salary_adv_setting','vmt_emp_assign_salary_adv_setting.salary_adv_id','=','vmt_salary_adv_setting.id')->get()->toArray();

        dd($simma);
    }
    public function saveLoanWithInterestSettings($max_loan_amount,$loan_amt_interest,$deduction_starting_months,$max_tenure_months,$approver_flow){
       try{

        $save_loan_setting_data = new VmtLoanInterestSettings;
        $save_loan_setting_data->max_loan_amount =$max_loan_amount;
        $save_loan_setting_data->loan_amt_interest =$loan_amt_interest;
        $save_loan_setting_data->deduction_starting_months =$deduction_starting_months;
        $save_loan_setting_data->max_tenure_months =$max_tenure_months;
        $save_loan_setting_data->approver_flow =$approver_flow;
        $save_loan_setting_data->save();

        return response()->json([
            "status" => "success",
            "message" => "loan setting data saved successfully",
            "data" => '',
        ]);

       }catch(\Exception $e){

        //dd("Error :: uploadDocument() ".$e);

        return response()->json([
            "status" => "failure",
            "message" => "Failed to save loan setting",
            "data" => $e->getMessage(),
        ]);

    }



    }

    public function  showInterestFreeLoanEmployeeinfo(){
         dd('working');
    }
}
