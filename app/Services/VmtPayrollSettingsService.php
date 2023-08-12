<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtPayrollCycle;
use App\Models\VmtAttendanceCycle;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class VmtPayrollSettingsService{

    public function saveGenralPayrollSettings($pay_frequency,$payperiod_start_month,$payperiod_end_date,$payment_date,$currency_type,$remuneration_type,
                                $att_cutoff_period_id,$post_attendance_cutoff_date,$emp_attedance_cutoff_date,$paydays_in_month,$include_weekoffs,$include_holidays )
    {
        $validator = Validator::make(
            $data = [
                'pay_frequency' => $pay_frequency,
                'payperiod_start_month' => $payperiod_start_month,
                'payperiod_end_date' => $payperiod_end_date,
                'payment_date' =>$payment_date,
                'currency_type' =>$currency_type,
                'remuneration_type' => $remuneration_type,
                'att_cutoff_period_id' => $att_cutoff_period_id,
                'post_attendance_cutoff_date' => $post_attendance_cutoff_date,
                'emp_attedance_cutoff_date' => $emp_attedance_cutoff_date,
                'paydays_in_month' =>$paydays_in_month,
                'include_weekoffs' =>$include_weekoffs,
                'include_holidays' => $include_holidays,
            ],
            $rules = [
                'pay_frequency' => 'required',
                'payperiod_start_month' => 'required',
                'payperiod_end_date' => 'required',
                'payment_date' => 'required',
                'currency_type' => 'required',
                'remuneration_type' => 'required',
                'att_cutoff_period_id' => 'required',
                'post_attendance_cutoff_date' => 'required',
                'emp_attedance_cutoff_date' => 'required',
                'paydays_in_month' => 'required',
                'include_weekoffs' => 'required',
                'include_holidays' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{
            $save_payroll_cycle = new VmtPayrollCycle;
            $save_payroll_cycle->client_id = auth()->user()->client_id;
            $save_payroll_cycle->pay_frequency = $pay_frequency;
            $save_payroll_cycle->payperiod_start_month =$payperiod_start_month ;
            $save_payroll_cycle->payperiod_end_date =$payperiod_end_date ;
            $save_payroll_cycle->payment_date =$payment_date ;
            $save_payroll_cycle->currency_type = $currency_type;
            $save_payroll_cycle->remuneration_type =$remuneration_type ;
            $save_payroll_cycle->save();

           $save_attendance_cycle = new VmtAttendanceCycle;
           $save_attendance_cycle->client_id = auth()->user()->client_id;
           $save_attendance_cycle->att_cutoff_period_id = $att_cutoff_period_id;
           $save_attendance_cycle->post_attendance_cutoff_date =$post_attendance_cutoff_date ;
           $save_attendance_cycle->emp_attedance_cutoff_date =$emp_attedance_cutoff_date ;
           $save_attendance_cycle->paydays_in_month =$paydays_in_month ;
           $save_attendance_cycle->include_weekoffs = $include_weekoffs;
           $save_attendance_cycle->include_holidays =$include_holidays ;
           $save_attendance_cycle->save();

            return $response=([
                "status" => "success",
                "message" => "payroll setting saved successfully",
                "data" => "",
            ]);

         }catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Unable to create esi employee ",
                "data" => $e->getmessage(),
            ]);
        }
    }
    public function updateGenralPayrollSettings($record_id,$pay_frequency,$payperiod_start_month,$payperiod_end_date,$payment_date,$currency_type,$remuneration_type,
                                $att_cutoff_period_id,$post_attendance_cutoff_date,$emp_attedance_cutoff_date,$paydays_in_month,$include_weekoffs,$include_holidays )
    {
        $validator = Validator::make(
            $data = [
                'record_id' => $record_id,
                'pay_frequency' => $pay_frequency,
                'payperiod_start_month' => $payperiod_start_month,
                'payperiod_end_date' => $payperiod_end_date,
                'payment_date' =>$payment_date,
                'currency_type' =>$currency_type,
                'remuneration_type' => $remuneration_type,
                'att_cutoff_period_id' => $att_cutoff_period_id,
                'post_attendance_cutoff_date' => $post_attendance_cutoff_date,
                'emp_attedance_cutoff_date' => $emp_attedance_cutoff_date,
                'paydays_in_month' =>$paydays_in_month,
                'include_weekoffs' =>$include_weekoffs,
                'include_holidays' => $include_holidays,
            ],
            $rules = [
                'record_id' => 'required',
                'pay_frequency' => 'required',
                'payperiod_start_month' => 'required',
                'payperiod_end_date' => 'required',
                'payment_date' => 'required',
                'currency_type' => 'required',
                'remuneration_type' => 'required',
                'att_cutoff_period_id' => 'required',
                'post_attendance_cutoff_date' => 'required',
                'emp_attedance_cutoff_date' => 'required',
                'paydays_in_month' => 'required',
                'include_weekoffs' => 'required',
                'include_holidays' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            $update_payroll_cycle =VmtPayrollCycle::where('id',$record_id)->first();
            
        if(!empty($update_payroll_cycle)){
            $update_payroll_cycle->client_id = auth()->user()->client_id;
            $update_payroll_cycle->pay_frequency = $pay_frequency;
            $update_payroll_cycle->payperiod_start_month =$payperiod_start_month ;
            $update_payroll_cycle->payperiod_end_date =$payperiod_end_date ;
            $update_payroll_cycle->payment_date =$payment_date ;
            $update_payroll_cycle->currency_type = $currency_type;
            $update_payroll_cycle->remuneration_type =$remuneration_type ;
            $update_payroll_cycle->save();
        }
            $update_attendance_cycle =VmtAttendanceCycle::where('id',$record_id)->first();
        if(!empty($update_attendance_cycle)){
            $update_attendance_cycle->client_id = auth()->user()->client_id;
            $update_attendance_cycle->att_cutoff_period_id = $att_cutoff_period_id;
            $update_attendance_cycle->post_attendance_cutoff_date =$post_attendance_cutoff_date ;
            $update_attendance_cycle->emp_attedance_cutoff_date =$emp_attedance_cutoff_date ;
            $update_attendance_cycle->paydays_in_month =$paydays_in_month ;
            $update_attendance_cycle->include_weekoffs = $include_weekoffs;
            $update_attendance_cycle->include_holidays =$include_holidays ;
            $update_attendance_cycle->save();
        }

        return $response=([
                "status" => "success",
                "message" => "payroll settings updated successfully",
                "data" => "",
            ]);

         }catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to create esi employee ",
                "data" => $e->getmessage(),
            ]);
        }
    }





























}
