<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtPayrollSettingsService;
class VmtPayrollSettingsController extends Controller
{
    public function saveGenralPayrollSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->saveGenralPayrollSettings(
                $request->pay_frequency,
                $request->payperiod_start_month,
                $request->payperiod_end_date,
                $request->payment_date,
                $request->currency_type,
                $request->remuneration_type,
                $request->att_cutoff_period_id,
                $request->post_attendance_cutoff_date,
                $request->emp_attedance_cutoff_date,
                $request->paydays_in_month,
                $request->include_weekoffs,
                $request->include_holidays
            );

            return $response;

    }
    public function updateGenralPayrollSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->updateGenralPayrollSettings(
                $request->record_id,
                $request->pay_frequency,
                $request->payperiod_start_month,
                $request->payperiod_end_date,
                $request->payment_date,
                $request->currency_type,
                $request->remuneration_type,
                $request->att_cutoff_period_id,
                $request->post_attendance_cutoff_date,
                $request->emp_attedance_cutoff_date,
                $request->paydays_in_month,
                $request->include_weekoffs,
                $request->include_holidays
            );

            return $response;

    }
    public function savePayrollFinanceSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->savePayrollFinanceSettings(
               $request->consider_default_rent_hra,
               $request->allow_emp_to_review_fin_info,
               $request->salary_payment_mode,
               $request->bank_information,
               $request->pf_esi_info,
               $request->pan_info,
               $request->aadhar_info,
               $request->deadline_date_for_OTR,
               $request->newjoine_inv_inout_deadline,
               $request->inv_dec_cutoff_date,
               $request->newjoinee_dec_deadline,
               $request->modify_fy_cutoff_date,
               $request->inv_decl_approval_date,
               $request->is_inv_decl_approval_needed,
               $request->can_notify_emp_inv_dec_release,
               $request->can_sendemail_emp_inv_dec,
               $request->notify_frequency,
               $request->can_release_inv_dec
            );

            return $response;

    }
    public function saveInvestmenstProofSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->saveInvestmenstProofSettings(
                $request->do_emp_provide_inv_proof,
                $request->is_compulsary_provide_comment,
                $request->can_emp_switch_tax_regime,
                $request->inv_schedule_date_1_enabled,
                $request->inv_schedule_date_1_value,
                $request->inv_schedule_date_2_enabled,
                $request->inv_schedule_date_2_value,
                $request->inv_schedule_date_3_enabled,
                $request->inv_schedule_date_3_value,
               $request->can_notify_emp_inv_dec_release,
               $request->can_sendemail_emp_inv_dec,
               $request->notify_frequency,
               $request->can_release_inv_proof
            );

            return $response;

    }

    public function saveProfessionalTaxSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->saveProfessionalTaxSettings(
                $request->pt_number,
                $request->state,
                $request->location,
                $request->employees,
                $request->deduction_cycle,
                $request->status,
            );

            return $response;

    }
    public function updateProfessionalTaxSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->saveProfessionalTaxSettings(
                $request->record_id,
                $request->pt_number,
                $request->state,
                $request->location,
                $request->employees,
                $request->deduction_cycle,
                $request->status,
            );

            return $response;

    }
    public function savelwfSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->savelwfSettings(
                $request->state,
                $request->employees_contrib,
                $request->emplolyer_contrib,
                $request->deduction_cycle,
                $request->employees,
                $request->status,
            );

            return $response;

    }
    public function updatelwfSettings(Request $request,VmtPayrollSettingsService $serviceVmtPayrollSettingsService)
    {
             //dd($request->all());

            $response =$serviceVmtPayrollSettingsService->updatelwfSettings(
                $request->record_id,
                $request->state,
                $request->employees_contrib,
                $request->emplolyer_contrib,
                $request->deduction_cycle,
                $request->employees,
                $request->status,
            );

            return $response;

    }
}
