<?php

namespace App\Services;

use App\Models\VmtEmployee;
use Carbon\Carbon;
use App\Models\VmtEmployeesLeavesAccrued;

class VmtEmployeeLeaveService
{



    /*
        Calculate leave balance for a given employee.
        And adds entry into 'vmt_employees_leaves_accrued' table.

        $calendar_type              = Financial Year/Calendar Year
        $accrualLeaveAdd_startDate  = Start date on which additional leave should be added
        $user_id                    = User to which the leave balance should be calculated

    */

    private function insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count){
        $current_month = date('n');

        if(VmtEmployeesLeavesAccrued::whereMonth('date',$current_month)->exists())
        {
            dd("Accrual day already added for month : ".$date);
            return 0;


        }

        $claendar_year_start_month=1;

        $leavesAccrued = new VmtEmployeesLeavesAccrued;
        $leavesAccrued->user_id = $user_id;
        $leavesAccrued->date = $date;
        $leavesAccrued->leave_type_id = $leave_type_id;
        $leavesAccrued->accrued_leave_count = $accrual_leave_count;
        $leavesAccrued->save();

    }



    public function processEmployeeLeaveBalance($user_id, $leave_type_id){


        $calendar_type = "calendar_year";
        $accrualLeaveAdd_startDate = 15; //TODO : Move to Leave Settings page

        $current_month = date('n');
        $today = Carbon::now();
        $date = date('Y-m-d');


        $emp_doj = VmtEmployee::where('userid',$user_id)->first()->doj;

        $emp_doj_Array = date_parse_from_format('Y-m-d', $emp_doj);
        // dd($empDateArray['month']);

        if($calendar_type=='financial_year'){

        }
        else
        if($calendar_type=='calendar_year'){
            $monthsSinceJoin = $today->diffInMonths($emp_doj);

            //Employee doj more than 12 since the current month check and add accured leaves
            if( $monthsSinceJoin>=12){
                $calendar_year_start_month=1;
                for($i=$calendar_year_start_month;$i<12;$i++){
                    $accrual_leave_count='1';
                    $this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count);
                }
            }
            //dd($monthsSinceJoin);


            if($monthsSinceJoin == 0 && $emp_doj_Array['month']-$current_month){

                if($emp_doj_Array['day'] < $accrualLeaveAdd_startDate){
                    $accrual_leave_count='1';
                    $this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count);

                }else if($emp_doj_Array['day']==$accrualLeaveAdd_startDate){
                    $accrual_leave_count='0.5';
                    $this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count);


                }else if($emp_doj_Array['day']>$accrualLeaveAdd_startDate){
                    $accrual_leave_count='0';
                    $this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count);

                }

            }
            else
            {
                //If the emp is existing one, then add accrual leave day
                $accrual_leave_count='1';
                $this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count);

            }

            //check how many months have elapsed
            //$emp_doj_month
        }

        return $response = [
            'status' => 'success',
            'message' => 'Accrual Leaves added for the employee : '.$user_id,
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
