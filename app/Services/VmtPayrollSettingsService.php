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
use App\Models\VmtProfessionalTaxSettings;
use App\Models\VmtLabourWelfareFundSettings;
use App\Models\VmtAttendanceCycle;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtInvestmentsDeclarationSettings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class VmtPayrollSettingsService{

    public function saveGenralPayrollSettings($pay_frequency,$payperiod_start_month,$payperiod_end_date,$payment_date,$currency_type,$remuneration_type,$att_cutoff_period_id,$post_attendance_cutoff_date,$emp_attedance_cutoff_date,$paydays_in_month,$include_weekoffs,$include_holidays )
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
    public function updateGenralPayrollSettings($record_id,$pay_frequency,$payperiod_start_month,$payperiod_end_date,$payment_date,$currency_type,$remuneration_type,$att_cutoff_period_id,$post_attendance_cutoff_date,$emp_attedance_cutoff_date,$paydays_in_month,$include_weekoffs,$include_holidays )
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
                "message" => "Error while upadeting payroll settings",
                "data" => $e->getmessage(),
            ]);
        }
    }
    public function savePayrollFinanceSettings( $consider_default_rent_hra,$allow_emp_to_review_fin_info,$salary_payment_mode,$bank_information,$pf_esi_info,$pan_info,   $aadhar_info, $deadline_date_for_OTR,$newjoine_inv_inout_deadline,$inv_dec_cutoff_date,$newjoinee_dec_deadline,$modify_fy_cutoff_date,$inv_decl_approval_date,
    $is_inv_decl_approval_needed,$can_notify_emp_inv_dec_release,$can_sendemail_emp_inv_dec,$notify_frequency,$can_release_inv_dec)
    {
        $validator = Validator::make(
            $data = [
                'consider_default_rent_hra' => $consider_default_rent_hra,
                'allow_emp_to_review_fin_info' => $allow_emp_to_review_fin_info,
                'salary_payment_mode' => $salary_payment_mode,
                'bank_information' => $bank_information,
                'pf_esi_info' =>$pf_esi_info,
                'pan_info' =>$pan_info,
                'aadhar_info' => $aadhar_info,
                'deadline_date_for_OTR' => $deadline_date_for_OTR,
                'newjoine_inv_inout_deadline' => $newjoine_inv_inout_deadline,
                'inv_dec_cutoff_date' => $inv_dec_cutoff_date,
                'newjoinee_dec_deadline' =>$newjoinee_dec_deadline,
                'modify_fy_cutoff_date' =>$modify_fy_cutoff_date,
                'inv_decl_approval_date' => $inv_decl_approval_date,
                'is_inv_decl_approval_needed' => $is_inv_decl_approval_needed,
                'can_notify_emp_inv_dec_release' => $can_notify_emp_inv_dec_release,
                'can_sendemail_emp_inv_dec' => $can_sendemail_emp_inv_dec,
                'notify_frequency' => $notify_frequency,
                'can_release_inv_dec' => $can_release_inv_dec,
            ],
            $rules = [
                'consider_default_rent_hra' => 'required',
                'allow_emp_to_review_fin_info' => 'required',
                'salary_payment_mode' => 'required',
                'bank_information' => 'required',
                'pf_esi_info' => 'required',
                'pan_info' => 'required',
                'aadhar_info' => 'required',
                'deadline_date_for_OTR' => 'required',
                'newjoine_inv_inout_deadline' => 'required',
                'inv_dec_cutoff_date' => 'required',
                'newjoinee_dec_deadline' => 'required',
                'modify_fy_cutoff_date' => 'required',
                'inv_decl_approval_date' => 'required',
                'is_inv_decl_approval_needed' => 'required',
                'can_notify_emp_inv_dec_release' => 'required',
                'can_sendemail_emp_inv_dec' => 'required',
                'notify_frequency' => 'required',
                'can_release_inv_dec' => 'required',
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
            $client_id =sessionGetSelectedClientid();

            $save_inv_dec_settings_data =VmtInvestmentsDeclarationSettings::where("client_id
            ",$client_id);

        if($save_inv_dec_settings_data->exists()){
            $save_inv_dec_settings_data =$save_inv_dec_settings_data->first();
        }else{
            $save_inv_dec_settings_data =new VmtInvestmentsDeclarationSettings;
        }
            $save_inv_dec_settings_data->client_id =$client_id;
            $save_inv_dec_settings_data->consider_default_rent_hra = $consider_default_rent_hra;
            $save_inv_dec_settings_data->allow_emp_to_review_fin_info =$allow_emp_to_review_fin_info ;
            $save_inv_dec_settings_data->salary_payment_mode =$salary_payment_mode ;
            $save_inv_dec_settings_data->bank_information =$bank_information ;
            $save_inv_dec_settings_data->pf_esi_info = $pf_esi_info;
            $save_inv_dec_settings_data->pan_info =$pan_info ;
            $save_inv_dec_settings_data->aadhar_info = $aadhar_info;
            $save_inv_dec_settings_data->deadline_date_for_OTR =$deadline_date_for_OTR ;
            $save_inv_dec_settings_data->newjoine_inv_inout_deadline =$newjoine_inv_inout_deadline ;
            $save_inv_dec_settings_data->inv_dec_cutoff_date =$inv_dec_cutoff_date ;
            $save_inv_dec_settings_data->newjoinee_dec_deadline = $newjoinee_dec_deadline;
            $save_inv_dec_settings_data->modify_fy_cutoff_date =$modify_fy_cutoff_date;
            $save_inv_dec_settings_data->inv_decl_approval_date =$inv_decl_approval_date;
            $save_inv_dec_settings_data->is_inv_decl_approval_needed =$is_inv_decl_approval_needed;
            $save_inv_dec_settings_data->can_notify_emp_inv_dec_release =$can_notify_emp_inv_dec_release;
            $save_inv_dec_settings_data->notify_frequency =$notify_frequency;
            $save_inv_dec_settings_data->can_sendemail_emp_inv_dec =$can_sendemail_emp_inv_dec;
            $save_inv_dec_settings_data->can_release_inv_dec =$can_release_inv_dec;
            $save_inv_dec_settings_data->save();


        return $response=([
                "status" => "success",
                "message" => "investments declaration settings created successfully",
                "data" => "",
            ]);

         }catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Error while creating investments declaration settings",
                "data" => $e->getmessage(),
            ]);
        }
    }
    // public function updatePayrollFinanceSettings( $record_id,$consider_default_rent_hra,$allow_emp_to_review_fin_info,$salary_payment_mode,$bank_information,$pf_esi_info,$pan_info,   $aadhar_info, $deadline_date_for_OTR,$newjoine_inv_inout_deadline,$inv_dec_cutoff_date,$newjoinee_dec_deadline,$modify_fy_cutoff_date,$inv_decl_approval_date,
    // $is_inv_decl_approval_needed,$can_notify_emp_inv_dec_release,$can_sendemail_emp_inv_dec,$notify_frequency,$can_release_inv_dec)
    // {
    //     $validator = Validator::make(
    //         $data = [
    //             'record_id' => $record_id,
    //             'consider_default_rent_hra' => $consider_default_rent_hra,
    //             'allow_emp_to_review_fin_info' => $allow_emp_to_review_fin_info,
    //             'salary_payment_mode' => $salary_payment_mode,
    //             'bank_information' => $bank_information,
    //             'pf_esi_info' =>$pf_esi_info,
    //             'pan_info' =>$pan_info,
    //             'aadhar_info' => $aadhar_info,
    //             'deadline_date_for_OTR' => $deadline_date_for_OTR,
    //             'newjoine_inv_inout_deadline' => $newjoine_inv_inout_deadline,
    //             'inv_dec_cutoff_date' => $inv_dec_cutoff_date,
    //             'newjoinee_dec_deadline' =>$newjoinee_dec_deadline,
    //             'modify_fy_cutoff_date' =>$modify_fy_cutoff_date,
    //             'inv_decl_approval_date' => $inv_decl_approval_date,
    //             'is_inv_decl_approval_needed' => $is_inv_decl_approval_needed,
    //             'can_notify_emp_inv_dec_release' => $can_notify_emp_inv_dec_release,
    //             'can_sendemail_emp_inv_dec' => $can_sendemail_emp_inv_dec,
    //             'notify_frequency' => $notify_frequency,
    //             'can_release_inv_dec' => $can_release_inv_dec,
    //         ],
    //         $rules = [
    //             'record_id' => 'required',
    //             'consider_default_rent_hra' => 'required',
    //             'allow_emp_to_review_fin_info' => 'required',
    //             'salary_payment_mode' => 'required',
    //             'bank_information' => 'required',
    //             'pf_esi_info' => 'required',
    //             'pan_info' => 'required',
    //             'aadhar_info' => 'required',
    //             'deadline_date_for_OTR' => 'required',
    //             'newjoine_inv_inout_deadline' => 'required',
    //             'inv_dec_cutoff_date' => 'required',
    //             'newjoinee_dec_deadline' => 'required',
    //             'modify_fy_cutoff_date' => 'required',
    //             'inv_decl_approval_date' => 'required',
    //             'is_inv_decl_approval_needed' => 'required',
    //             'can_notify_emp_inv_dec_release' => 'required',
    //             'can_sendemail_emp_inv_dec' => 'required',
    //             'notify_frequency' => 'required',
    //             'can_release_inv_dec' => 'required',
    //         ],
    //         $messages = [
    //             'required' => 'Field :attribute is missing',
    //             'numeric' => 'Field <b>:attribute</b> is invalid',
    //         ]
    //     );

    //     if($validator->fails()){
    //         return response()->json([
    //             'status' => 'failure',
    //             'message' => $validator->errors()->all()
    //         ]);
    //     }

    //     try{
    //         $client_id =sessionGetSelectedClientid();

    //         $update_inv_dec_settings_data =VmtInvestmentsDeclarationSettings::where('id',$record_id);

    //     if($update_inv_dec_settings_data->exists()){
    //         $update_inv_dec_settings_data =$update_inv_dec_settings_data->first();
    //     }else{
    //         $update_inv_dec_settings_data =new VmtInvestmentsDeclarationSettings;
    //     }
    //         $update_inv_dec_settings_data->client_id =$client_id;
    //         $update_inv_dec_settings_data->consider_default_rent_hra = $consider_default_rent_hra;
    //         $update_inv_dec_settings_data->allow_emp_to_review_fin_info =$allow_emp_to_review_fin_info ;
    //         $update_inv_dec_settings_data->salary_payment_mode =$salary_payment_mode ;
    //         $update_inv_dec_settings_data->bank_information =$bank_information ;
    //         $update_inv_dec_settings_data->pf_esi_info = $pf_esi_info;
    //         $update_inv_dec_settings_data->pan_info =$pan_info ;
    //         $update_inv_dec_settings_data->aadhar_info = $aadhar_info;
    //         $update_inv_dec_settings_data->deadline_date_for_OTR =$deadline_date_for_OTR ;
    //         $update_inv_dec_settings_data->newjoine_inv_inout_deadline =$newjoine_inv_inout_deadline ;
    //         $update_inv_dec_settings_data->inv_dec_cutoff_date =$inv_dec_cutoff_date ;
    //         $update_inv_dec_settings_data->newjoinee_dec_deadline = $newjoinee_dec_deadline;
    //         $update_inv_dec_settings_data->modify_fy_cutoff_date =$modify_fy_cutoff_date;
    //         $update_inv_dec_settings_data->inv_decl_approval_date =$inv_decl_approval_date;
    //         $update_inv_dec_settings_data->is_inv_decl_approval_needed =$is_inv_decl_approval_needed;
    //         $update_inv_dec_settings_data->can_notify_emp_inv_dec_release =$can_notify_emp_inv_dec_release;
    //         $update_inv_dec_settings_data->notify_frequency =$notify_frequency;
    //         $update_inv_dec_settings_data->can_sendemail_emp_inv_dec =$can_sendemail_emp_inv_dec;
    //         $update_inv_dec_settings_data->can_release_inv_dec =$can_release_inv_dec;
    //         $update_inv_dec_settings_data->save();


    //     return $response=([
    //             "status" => "success",
    //             "message" => "investments declaration settings updated successfully",
    //             "data" => "",
    //         ]);

    //      }catch(\Exception $e){

    //         return response()->json([
    //             "status" => "failure",
    //             "message" => "Error while updating investments declaration settings",
    //             "data" => $e->getmessage(),
    //         ]);
    //     }
    // }
    public function saveInvestmenstProofSettings($do_emp_provide_inv_proof,$is_compulsary_provide_comment,$can_emp_switch_tax_regime,$inv_schedule_date_1_enabled,$inv_schedule_date_1_value,$inv_schedule_date_2_enabled,$inv_schedule_date_2_value, $inv_schedule_date_3_enabled,
    $inv_schedule_date_3_value,$can_notify_emp_inv_dec_release,$can_sendemail_emp_inv_dec,$notify_frequency,$can_release_inv_proof)
    {
        $validator = Validator::make(
            $data = [
                'do_emp_provide_inv_proof' => $do_emp_provide_inv_proof,
                'is_compulsary_provide_comment' => $is_compulsary_provide_comment,
                'can_emp_switch_tax_regime' => $can_emp_switch_tax_regime,
                'inv_schedule_date_1_enabled' => $inv_schedule_date_1_enabled,
                'inv_schedule_date_1_value' =>$inv_schedule_date_1_value,
                'inv_schedule_date_2_enabled' =>$inv_schedule_date_2_enabled,
                'inv_schedule_date_2_value' => $inv_schedule_date_2_value,
                'inv_schedule_date_3_enabled' => $inv_schedule_date_3_enabled,
                'inv_schedule_date_3_value' => $inv_schedule_date_3_value,
                'can_notify_emp_inv_dec_release' => $can_notify_emp_inv_dec_release,
                'can_sendemail_emp_inv_dec' => $can_sendemail_emp_inv_dec,
                'notify_frequency' => $notify_frequency,
                'can_release_inv_proof' => $can_release_inv_proof,
            ],
            $rules = [
                'do_emp_provide_inv_proof' => 'required',
                'is_compulsary_provide_comment' => 'required',
                'can_emp_switch_tax_regime' => 'required',
                'inv_schedule_date_1_enabled' => 'required',
                'inv_schedule_date_1_value' => 'required',
                'inv_schedule_date_2_enabled' => 'required',
                'inv_schedule_date_2_value' => 'required',
                'inv_schedule_date_3_enabled' => 'required',
                'inv_schedule_date_3_value' => 'required',
                'can_notify_emp_inv_dec_release' => 'required',
                'can_sendemail_emp_inv_dec' => 'required',
                'notify_frequency' => 'required',
                'can_release_inv_proof' => 'required',
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
            $client_id =sessionGetSelectedClientid();

            $save_inv_proof_settings_data =VmtInvestmentsDeclarationSettings::where("client_id",$client_id);

        if($save_inv_proof_settings_data->exists()){
            $save_inv_proof_settings_data =$save_inv_proof_settings_data->first();
        }else{
            $save_inv_proof_settings_data =new VmtInvestmentsDeclarationSettings;
        }
            $save_inv_proof_settings_data->client_id =$client_id;
            $save_inv_proof_settings_data->do_emp_provide_inv_proof = $do_emp_provide_inv_proof;
            $save_inv_proof_settings_data->is_compulsary_provide_comment =$is_compulsary_provide_comment ;
            $save_inv_proof_settings_data->can_emp_switch_tax_regime =$can_emp_switch_tax_regime ;
            $save_inv_proof_settings_data->inv_schedule_date_1_enabled =$inv_schedule_date_1_enabled ;
            $save_inv_proof_settings_data->inv_schedule_date_1_value =$inv_schedule_date_1_value ;
            $save_inv_proof_settings_data->inv_schedule_date_2_enabled = $inv_schedule_date_2_enabled;
            $save_inv_proof_settings_data->inv_schedule_date_2_value =$inv_schedule_date_2_value ;
            $save_inv_proof_settings_data->inv_schedule_date_3_enabled = $inv_schedule_date_3_enabled;
            $save_inv_proof_settings_data->inv_schedule_date_3_value =$inv_schedule_date_3_value;
            $save_inv_proof_settings_data->can_notify_emp_inv_dec_release =$can_notify_emp_inv_dec_release;
            $save_inv_proof_settings_data->notify_frequency =$notify_frequency;
            $save_inv_proof_settings_data->can_sendemail_emp_inv_dec =$can_sendemail_emp_inv_dec;
            $save_inv_proof_settings_data->can_release_inv_proof =$can_release_inv_proof;
            $save_inv_proof_settings_data->save();


        return $response=([
                "status" => "success",
                "message" => "investments proof settings created successfully",
                "data" => "",
            ]);

         }catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Error while creating investments proof settings",
                "data" => $e->getmessage(),
            ]);
        }
    }
    // public function updateInvestmenstProofSettings($record_id,$do_emp_provide_inv_proof,$is_compulsary_provide_comment,$can_emp_switch_tax_regime,$inv_schedule_date_1_enabled,$inv_schedule_date_1_value,$inv_schedule_date_2_enabled,$inv_schedule_date_2_value, $inv_schedule_date_3_enabled,
    // $inv_schedule_date_3_value,$can_notify_emp_inv_dec_release,$can_sendemail_emp_inv_dec,$notify_frequency,$can_release_inv_proof)
    // {
    //     $validator = Validator::make(
    //         $data = [
    //             'record_id' => $record_id,
    //             'do_emp_provide_inv_proof' => $do_emp_provide_inv_proof,
    //             'is_compulsary_provide_comment' => $is_compulsary_provide_comment,
    //             'can_emp_switch_tax_regime' => $can_emp_switch_tax_regime,
    //             'inv_schedule_date_1_enabled' => $inv_schedule_date_1_enabled,
    //             'inv_schedule_date_1_value' =>$inv_schedule_date_1_value,
    //             'inv_schedule_date_2_enabled' =>$inv_schedule_date_2_enabled,
    //             'inv_schedule_date_2_value' => $inv_schedule_date_2_value,
    //             'inv_schedule_date_3_enabled' => $inv_schedule_date_3_enabled,
    //             'inv_schedule_date_3_value' => $inv_schedule_date_3_value,
    //             'can_notify_emp_inv_dec_release' => $can_notify_emp_inv_dec_release,
    //             'can_sendemail_emp_inv_dec' => $can_sendemail_emp_inv_dec,
    //             'notify_frequency' => $notify_frequency,
    //             'can_release_inv_proof' => $can_release_inv_proof,
    //         ],
    //         $rules = [
    //             'record_id' => 'required',
    //             'do_emp_provide_inv_proof' => 'required',
    //             'is_compulsary_provide_comment' => 'required',
    //             'can_emp_switch_tax_regime' => 'required',
    //             'inv_schedule_date_1_enabled' => 'required',
    //             'inv_schedule_date_1_value' => 'required',
    //             'inv_schedule_date_2_enabled' => 'required',
    //             'inv_schedule_date_2_value' => 'required',
    //             'inv_schedule_date_3_enabled' => 'required',
    //             'inv_schedule_date_3_value' => 'required',
    //             'can_notify_emp_inv_dec_release' => 'required',
    //             'can_sendemail_emp_inv_dec' => 'required',
    //             'notify_frequency' => 'required',
    //             'can_release_inv_proof' => 'required',
    //         ],
    //         $messages = [
    //             'required' => 'Field :attribute is missing',
    //             'numeric' => 'Field <b>:attribute</b> is invalid',
    //         ]
    //     );

    //     if($validator->fails()){
    //         return response()->json([
    //             'status' => 'failure',
    //             'message' => $validator->errors()->all()
    //         ]);
    //     }

    //     try{
    //         $client_id =sessionGetSelectedClientid();

    //         $update_inv_proof_settings_data =VmtInvestmentsDeclarationSettings::where('id',$record_id);

    //     if($update_inv_proof_settings_data->exists()){
    //         $update_inv_proof_settings_data =$update_inv_proof_settings_data->first();
    //     }else{

    //     }
    //         $update_inv_proof_settings_data->client_id =$client_id;
    //         $update_inv_proof_settings_data->do_emp_provide_inv_proof = $do_emp_provide_inv_proof;
    //         $update_inv_proof_settings_data->is_compulsary_provide_comment =$is_compulsary_provide_comment ;
    //         $update_inv_proof_settings_data->can_emp_switch_tax_regime =$can_emp_switch_tax_regime ;
    //         $update_inv_proof_settings_data->inv_schedule_date_1_enabled =$inv_schedule_date_1_enabled ;
    //         $update_inv_proof_settings_data->inv_schedule_date_1_value =$inv_schedule_date_1_value ;
    //         $update_inv_proof_settings_data->inv_schedule_date_2_enabled = $inv_schedule_date_2_enabled;
    //         $update_inv_proof_settings_data->inv_schedule_date_2_value =$inv_schedule_date_2_value ;
    //         $update_inv_proof_settings_data->inv_schedule_date_3_enabled = $inv_schedule_date_3_enabled;
    //         $update_inv_proof_settings_data->inv_schedule_date_3_value =$inv_schedule_date_3_value;
    //         $update_inv_proof_settings_data->can_notify_emp_inv_dec_release =$can_notify_emp_inv_dec_release;
    //         $update_inv_proof_settings_data->notify_frequency =$notify_frequency;
    //         $update_inv_proof_settings_data->can_sendemail_emp_inv_dec =$can_sendemail_emp_inv_dec;
    //         $update_inv_proof_settings_data->can_release_inv_proof =$can_release_inv_proof;
    //         $update_inv_proof_settings_data->save();


    //     return $response=([
    //             "status" => "success",
    //             "message" => "investments proof settings created successfully",
    //             "data" => "",
    //         ]);

    //      }catch(\Exception $e){

    //         return response()->json([
    //             "status" => "failure",
    //             "message" => "Error while creating investments proof settings",
    //             "data" => $e->getmessage(),
    //         ]);
    //     }
    // }

    public function saveProfessionalTaxSettings($pt_number,$state,$location,$employees,$deduction_cycle,$status)
    {
        $validator = Validator::make(
            $data = [
                'pt_number' => $pt_number,
                'state' => $state,
                'location' => $location,
                'employees' =>$employees,
                'deduction_cycle' =>$deduction_cycle,
                'status' => $status,
            ],
            $rules = [
                'pt_number' => 'required',
                'state' => 'required',
                'location' => 'required',
                'employees' => 'employees',
                'deduction_cycle' => 'required',
                'status' => 'required',
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
            $client_id =sessionGetSelectedClientid();

            $save_pt_settings =VmtProfessionalTaxSettings::where($client_id,$client_id);

                if($save_pt_settings->exists()){

                    $save_pt_settings =$save_pt_settings->first();

                }else{

                    $save_pt_settings =new VmtProfessionalTaxSettings;
                }

            $save_pt_settings->client_id = $client_id;
            $save_pt_settings->pt_number = $pt_number;
            $save_pt_settings->state = $state;
            $save_pt_settings->location =$location ;
            $save_pt_settings->employees =$employees ;
            $save_pt_settings->deduction_cycle = $deduction_cycle;
            $save_pt_settings->status =$status ;
            $save_pt_settings->save();

            return $response=([
                "status" => "success",
                "message" => "professional tax settings saved successfully",
                "data" => "",
            ]);

         }catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "error while save professional tax settings",
                "data" => $e->getmessage(),
            ]);
        }
    }
    public function updateProfessionalTaxSettings($record_id,$pt_number,$state,$location,$employees,$deduction_cycle,$status)
    {
        $validator = Validator::make(
            $data = [
                'record_id' => $record_id,
                'pt_number' => $pt_number,
                'state' => $state,
                'location' => $location,
                'employees' =>$employees,
                'deduction_cycle' =>$deduction_cycle,
                'status' => $status,
            ],
            $rules = [
                'record_id' => 'required',
                'pt_number' => 'required',
                'state' => 'required',
                'location' => 'required',
                'employees' => 'employees',
                'deduction_cycle' => 'required',
                'status' => 'required',
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


            $client_id =sessionGetSelectedClientid();

           $update_pt_settings =VmtProfessionalTaxSettings::where('id',$record_id)->where('client_id',$client_id );

        if($update_pt_settings->exists()){
            $update_pt_settings =$update_pt_settings->first();
            $update_pt_settings->client_id = $client_id;
            $update_pt_settings->pt_number = $pt_number;
            $update_pt_settings->state = $state;
            $update_pt_settings->location =$location ;
            $update_pt_settings->employees =$employees ;
            $update_pt_settings->deduction_cycle = $deduction_cycle;
            $update_pt_settings->status =$status ;
            $update_pt_settings->save();

            return $response=([
                "status" => "success",
                "message" => "professional tax settings saved successfully",
                "data" => "",
            ]);
        }else{

            return $response=([
                "status" => "failure",
                "message" => "data not found",
                "data" => "",
            ]);

        }


         }catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "error while save professional tax settings",
                "data" => $e->getmessage(),
            ]);
        }
    }
    public function savelwfSettings($state,$employees_contrib,$employer_contrib,$employees,$deduction_cycle,$status)
    {
        $validator = Validator::make(
            $data = [
                'state' => $state,
                'employees_contrib' => $employees_contrib,
                'employers_contrib' => $employer_contrib,
                'deduction_cycle' =>$deduction_cycle,
                'employees' =>$employees,
                'status' => $status,
            ],
            $rules = [
                'state' => 'required',
                'employees_contrib' => 'required',
                'employer_contrib' => 'required',
                'deduction_cycle' => 'required',
                'employees' => 'employees',
                'status' => 'required',
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

            $client_id =sessionGetSelectedClientid();

            $save_lwf_settings =VmtLabourWelfareFundSettings::where("client_id",$client_id);

            if($save_lwf_settings->exists()){

                $save_lwf_settings =$save_lwf_settings->first();

            }else{

                $save_lwf_settings =new VmtLabourWelfareFundSettings;
            }
            $save_lwf_settings->client_id = $client_id;
            $save_lwf_settings->employees_contrib = $employees_contrib;
            $save_lwf_settings->state = $state;
            $save_lwf_settings->employer_contrib =$employer_contrib ;
            $save_lwf_settings->employees =$employees ;
            $save_lwf_settings->deduction_cycle = $deduction_cycle;
            $save_lwf_settings->status =$status ;
            $save_lwf_settings->save();

            return $response=([
                "status" => "success",
                "message" => "LWF settings saved successfully",
                "data" => "",
            ]);

         }catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "error while save LWF settings",
                "data" => $e->getmessage(),
            ]);
        }
    }

        public function updatelwfSettings($record_id,$state,$employees_contrib,$employer_contrib,$employees,$deduction_cycle,$status)
        {
            $validator = Validator::make(
                $data = [
                    'record_id' => $record_id,
                    'state' => $state,
                    'employees_contrib' => $employees_contrib,
                    'emplolyers_contrib' => $emplolyers_contrib,
                    'deduction_cycle' =>$deduction_cycle,
                    'employees' =>$employees,
                    'status' => $status,
                ],
                $rules = [
                    'record_id' => 'required',
                    'state' => 'required',
                    'employees_contrib' => 'required',
                    'emplolyers_contrib' => 'required',
                    'deduction_cycle' => 'required',
                    'employees' => 'employees',
                    'status' => 'required',
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


                $client_id =sessionGetSelectedClientid();

               $update_lwf_settings =VmtLabourWelfareFundSettings::where('id',$record_id)->where('client_id',$client_id );

            if($update_lwf_settings->exists()){
                $update_lwf_settings =$update_lwf_settings->first();
                $update_lwf_settings->client_id = $client_id;
                $update_lwf_settings->employees_contrib = $employees_contrib;
                $update_lwf_settings->state = $state;
                $update_lwf_settings->employer_contrib =$employer_contrib ;
                $update_lwf_settings->deduction_cycle = $deduction_cycle;
                $update_lwf_settings->status =$status ;
                $update_lwf_settings->save();

                return $response=([
                    "status" => "success",
                    "message" => "LWF settings updated successfully",
                    "data" => "",
                ]);
            }else{

                return $response=([
                    "status" => "failure",
                    "message" => "data not found",
                    "data" => "",
                ]);

            }


             }catch(\Exception $e){
                return response()->json([
                    "status" => "failure",
                    "message" => "error while update LWF settings",
                    "data" => $e->getmessage(),
                ]);
            }
        }
    }
