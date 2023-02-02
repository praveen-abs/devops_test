<?php

namespace App\Services;

use App\Models\VmtEmployee;

class VmtEmployeeLeaveService
{

    /*
        Calculate leave balance for a given employee.
        And adds entry into 'vmt_employees_leaves_accrued' table.

        $calendar_type              = Financial Year/Calendar Year
        $accrualLeaveAdd_startDate  = Start date on which additional leave should be added
        $user_id                    = User to which the leave balance should be calculated

    */
    public function processEmployeeLeaveBalance($user_id){

        $calendar_type = "calendar_year";
        $accrualLeaveAdd_startDate = "1";

        $current_month = '';

        $emp_doj = VmtEmployee::where('userid',$user_id)->first()->doj;

        if($calendar_type=='financial_year'){
               
        }else 
        if($calendar_type=='calendar_year'){

            $calendar_type_start_month = "1";
            $emp_doj_month = "";

            dd($emp_doj);

            //check how many months have elapsed
            //$emp_doj_month
        }


        return $response = [
            'status' => 'success',
            'message' => 'Accrual Leaves added for the employee : '.$user_id.' ;DOJ : '.$doj,
            'error' => '',
            'error_verbose' => ''
        ];

    }


    private function getLeaveCalenderType(){
        $master_config_value = VmtMasterConfig::where('config_name', 'hr_userid')->first();

        if(empty($master_config_value))
        {
           // dd("HR not set");
           return null;
        }
        else
        {
            $master_config_value = $master_config_value->config_value;
    
            $hr_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id','=','users.id')
            ->where('users.id',$master_config_value)->first(['users.name','vmt_employee_office_details.officical_mail']);
    
        }
    }

    private function getAccrualStartDate(){

    }
}
