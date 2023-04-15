<?php

namespace App\Services;

use App\Models\VmtEmployee;
use Carbon\Carbon;
use App\Models\VmtEmployeesLeavesAccrued;
use App\Models\ConfigPms;
use App\Models\VmtOrgTimePeriod;
use App\Models\VmtTimePeriod;

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
        $current_month = Carbon::parse($date)->format('n');

        if(!VmtEmployeesLeavesAccrued::whereMonth('date',$current_month)
                                      ->where('user_id',$user_id)
                                      ->where('leave_type_id',$leave_type_id)
                                      ->exists())
        {

            $leavesAccrued = new VmtEmployeesLeavesAccrued;
            $leavesAccrued->user_id = $user_id;
            $leavesAccrued->date = $date;
            $leavesAccrued->leave_type_id = $leave_type_id;
            $leavesAccrued->accrued_leave_count = $accrual_leave_count;
            $leavesAccrued->save();
            return array($date=>'Added');
        }else{
            return array($date=>'Already Exists');
        }



    }



    public function processEmployeeLeaveBalance($user_id, $leave_type_id){


        $calendar_type =ConfigPms::first()->calendar_type;
        $employee[$user_id] = array();
        //dd( $calendar_type);
        $accrualLeaveAdd_startDate = 15; //TODO : Move to Leave Settings page

        $current_month = date('n');
        $today = Carbon::now();
        $date = date('Y-m-d');


        $emp_doj = VmtEmployee::where('userid',$user_id)->first()->doj;

        $emp_doj_Array = date_parse_from_format('Y-m-d', $emp_doj);
        // dd($empDateArray['month']);







        // if($calendar_type=='financial_year'){
        //         $time_period_current_year = VmtOrgTimePeriod::whereYear('year',Carbon::now()->format('Y'))->first();
        //         $time_period = VmtTimePeriod::where('id',  $time_period_current_year->vmt_time_period_id)->first();
        //         $time_period_start_month = Carbon::parse($time_period->start_month)->format('m');
        //         $time_period_start_day = Carbon::parse($time_period->start_month)->format('d');
        //         $accrued_leave_start_date =Carbon::parse(substr($time_period_current_year->year, 0, 4).'-'.$time_period_start_month.'-'.$time_period_start_day);
        //         if( $time_period->type == 'Financial Year' ){
        //             $time_period_end_year = Carbon::parse( $time_period_current_year->year.'-'.$time_period_start_month.'-'.$time_period_start_day)->addYear()->format('Y');
        //             $time_period_end_month = Carbon::parse($time_period->end_month)->format('m');
        //             $time_period_end_day = Carbon::parse($time_period->end_month)->format('d');
        //             $accrued_leave_end_date = Carbon::parse($time_period_end_year.'-'.$time_period_end_month.'-'.$time_period_end_day);
        //         }else{
        //             $time_period_end_month = Carbon::parse($time_period->end_month)->format('m');
        //             $time_period_end_day = Carbon::parse($time_period->end_month)->format('d');
        //             $accrued_leave_end_date = Carbon::parse( substr($time_period_current_year->year, 0, 4).'-'.$time_period_end_month.'-'.$time_period_end_day);

        //         }

        //         if(Carbon::now()->lte( $accrued_leave_end_date)){
        //             //till this date accured leave will be added
        //             $end_date = Carbon::now();
        //         }else{
        //            $end_date =  $accrued_leave_end_date;
        //         }


        //        $emp_doj = Carbon::parse($emp_doj);

        //        if($emp_doj->between( $accrued_leave_start_date,$end_date )){

        //         while($end_date->gte($emp_doj)){
        //             $year= $emp_doj->format('Y');
        //             $month= $emp_doj->format('n');

        //             if($emp_doj_Array ['month']==$month){
        //                 if($emp_doj_Array ['day']==15){
        //                     $accrual_leave_count='0.5';
        //                 }else if($emp_doj_Array ['day']>15){
        //                     $accrual_leave_count='0';
        //                 }else if($emp_doj_Array ['day']<15){
        //                     $accrual_leave_count='1';
        //                 }
        //             }else{
        //                 $accrual_leave_count='1';
        //             }

        //             if($month<10)
        //             $month='0'.$month;

        //            $date=$year."-".$month."-15";
        //            $employee[$user_id] = array_merge($employee[$user_id],$this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count));

        //            $emp_doj->addMonth();
        //         }

        //        }else{
        //         while($end_date->gte( $accrued_leave_start_date)){
        //             $year= $accrued_leave_start_date->format('Y');
        //             $month= $accrued_leave_start_date->format('n');

        //             if($month<10)
        //              $month='0'.$month;

        //             $date=$year."-".$month."-15";
        //             $accrual_leave_count='1';
        //             $employee[$user_id] = array_merge($employee[$user_id],$this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count));
        //             $accrued_leave_start_date->addMonth();
        //         }

        //        }
        // }
        // else if($calendar_type=='calendar_year'){
        //     $monthsSinceJoin = $today->diffInMonths($emp_doj);

        //    // Logic for Check and add accured leaves
        //     if(date('Y')==$emp_doj_Array ['year']){
        //         $doj_start_month=$emp_doj_Array ['month'];
        //         $current_month = date('n');

        //         // if($emp_doj_Array ['month']==date('n')){

        //         // }
        //         for($i=$doj_start_month;$i<=$current_month;$i++){
        //             if($emp_doj_Array ['month']==$i){
        //                 if($emp_doj_Array ['day']==15){
        //                     $accrual_leave_count='0.5';
        //                 }else if($emp_doj_Array ['day']>15){
        //                     $accrual_leave_count='0';
        //                 }else if($emp_doj_Array ['day']<15){
        //                     $accrual_leave_count='1';
        //                 }
        //             }else{
        //                 $accrual_leave_count='1';
        //             }
        //             $date="2023"."-0".$i."-15";
        //             $employee[$user_id] = array_merge($employee[$user_id],$this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count));
        //         }
        //     }else{
        //         $calendar_year_start_month=1;
        //         $current_month = date('n');

        //         for($i=$calendar_year_start_month;$i<=$current_month;$i++){
        //             $date="2023"."-0".$i."-15";
        //             $accrual_leave_count='1';
        //             $employee[$user_id] = array_merge($employee[$user_id],$this->insertAccrualLeaveRecord($user_id, $date, $leave_type_id, $accrual_leave_count));
        //         }
        //     }

        //     //check how many months have elapsed
        //     //$emp_doj_month
        // }

        return $employee;
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
