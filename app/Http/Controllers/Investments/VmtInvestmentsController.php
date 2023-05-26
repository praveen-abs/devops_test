<?php

namespace App\Http\Controllers\Investments;

use App\Http\Controllers\Controller;
use App\Models\VmtInvEmpFormdata;
use App\Models\VmtInvFEmpAssigned;
use App\Services\VmtInvestmentsService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VmtEmpInvRentalDetails;




class VmtInvestmentsController extends Controller
{
    public function getInvestmentsFormDetailsTemplate(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //  dd($request->all());

        return $serviceVmtInvestmentsService->getInvestmentsFormDetailsTemplate($request->form_name);
    }

    public function saveEmpInvSecDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //dd($request->all());

        return $serviceVmtInvestmentsService->saveEmpInvSecDetails($request->user_code, $request->section_name, $request->section_data);
    }

    public function ImportInvestmentForm_Excel(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        // dd($request->all());

        return $serviceVmtInvestmentsService->ImportInvestmentForm_Excel($request->form_name, $request->excel_file);
    }


    // Common Save function Saving Investment Form
    public function SaveInvDetails(Request $request)
    {
        // dd($request->all());
        $form_id = $request->form_id;
        $user_id = User::where('user_code', $request->user_code)->first()->id;
        $form_data = $request->formDataSource;
        $current_date = date("Y-m-d");


        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);

        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();

        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->year = $current_date;
            $emp_assign_form->is_sumbit = $request->is_submitted;

            $emp_assign_form->save();
            $query_assign = $emp_assign_form;

        }

        // dd($form_data);
        $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

        if (isset($form_data)) {

            foreach ($form_data as $singleFormData) {

                $emp_formdata = VmtInvEmpFormdata::where('f_emp_id', $assigned_form_user_id)->where('fs_id', $singleFormData['fs_id'])->first();

                if (empty($emp_formdata)) {

                    $emp_formdata = new VmtInvEmpFormdata;
                    $emp_formdata->f_emp_id = $query_assign->id;
                    $emp_formdata->fs_id = $singleFormData['fs_id'];
                    $emp_formdata->dec_amount = $singleFormData['declaration_amount'];
                    $emp_formdata->selected_section_options = $singleFormData['select_option'] ?? '';
                    //   $emp_formdata->json_popups_value = $sima ?? "none";
                    $emp_formdata->save();

                } else {

                    $emp_formdata->f_emp_id = $query_assign->id;
                    $emp_formdata->fs_id = $singleFormData['fs_id'];
                    $emp_formdata->dec_amount = $singleFormData['declaration_amount'];
                    $emp_formdata->selected_section_options = $singleFormData['select_option'] ?? '';
                    //    $emp_formdata->json_popups_value = $singleFormData['json_popups_value'];

                    //   $emp_formdata->json_popups_value = $sima ?? "none";
                    $emp_formdata->save();

                }

            }
        } else {

            $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first();

            if ($assigned_form_user_id->exists()) {

                $assigned_form_user_id->is_sumbit = $request->is_submitted;
                $assigned_form_user_id->save();

            }

            return "sumbit";
        }

    }

    // Common Function For Saving All Popup In Investment Form's
    public function saveSectionPopups(Request $request)
    {
        // dd($request->all());
        $json_decodeHra = json_encode($request->all());
        $current_date = date("Y-m-d");

        // dd($json_decodeHra);

        $form_id = "1";

        $fs_id = $request->fs_id;

        // dd($fs_id);
        $user_id = User::where('user_code', $request->user_code)->first()->id;

        // $form_data = $request->formDataSource;

        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);


        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();

        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->year = $current_date;
            $emp_assign_form->is_sumbit = $request->is_submitted;
            $emp_assign_form->save();
            $query_assign = $emp_assign_form;
        }

        if (empty($request->id)) {

            $Hra_save = new VmtInvEmpFormdata;
            $Hra_save->fs_id = $fs_id;
            $Hra_save->f_emp_id = $query_assign->id;
            $Hra_save->dec_amount = "0";
            $Hra_save->json_popups_value = $json_decodeHra;
            $Hra_save->save();

        } else {

            $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

            $emp_formdata = VmtInvEmpFormdata::where('f_emp_id', $assigned_form_user_id)->where('id', $request->id)->first();

            $emp_formdata->f_emp_id = $query_assign->id;
            $emp_formdata->fs_id = $fs_id;
            $emp_formdata->dec_amount = "0";
            $emp_formdata->json_popups_value = $json_decodeHra;

            $emp_formdata->save();

        }


        return 'saved';


    }

    // Get And Delete for HRA in Investment's Forms
    public function fetchEmpRentalDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        $user_code = $request->user_code;
        $fs_id = $request->fs_id;

        return $serviceVmtInvestmentsService->fetchEmpRentalDetails($user_code, $fs_id);
    }

    public function deleteRentalDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {

        return $serviceVmtInvestmentsService->deleteEmpRentalDetails($request->current_table_id);
    }

    // Get And Delete for House Property in Investment's Forms
    public function fetchHousePropertyDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        $user_code = $request->user_code;
        $fs_id = $request->hop;

        return $serviceVmtInvestmentsService->fetchHousePropertyDetails($user_code, $fs_id);
    }
    public function fetchOtherExemptionDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        $user_code = $request->user_code;
        $fs_id = $request->otherExe;

        return $serviceVmtInvestmentsService->fetchHousePropertyDetails($user_code, $fs_id);
    }
    public function deleteHousePropertyDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {

        return $serviceVmtInvestmentsService->deleteEmpRentalDetails($request->current_table_id);
    }

    public function saveSection80(Request $request)
    {

        $json_decodeHra = json_encode($request->all());
        $current_date = date("Y-m-d");
        // dd($json_decodeHra);

        $form_id = "1";

        $dec_amount = $request->interest_amount_paid;

        $fs_id = $request->fs_id;

        $user_id = User::where('user_code', $request->user_code)->first()->id;

        // $form_data = $request->formDataSource;

        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);


        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();

        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->year = $current_date;
            $emp_assign_form->save();
            $query_assign = $emp_assign_form;
        }

        $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

        $emp_formdata = VmtInvEmpFormdata::where('f_emp_id', $assigned_form_user_id)->where('fs_id', $fs_id)->first();

        if (empty($emp_formdata)) {

            $Hra_save = new VmtInvEmpFormdata;
            $Hra_save->f_emp_id = $query_assign->id;
            $Hra_save->fs_id = $fs_id;
            $Hra_save->dec_amount = $dec_amount;
            $Hra_save->json_popups_value = $json_decodeHra;
            $Hra_save->selected_section_options = '0';
            $Hra_save->save();

        } else {
            $emp_formdata->f_emp_id = $query_assign->id;
            $emp_formdata->fs_id = $fs_id;
            $emp_formdata->dec_amount = $dec_amount;
            $emp_formdata->json_popups_value = $json_decodeHra;
            $emp_formdata->selected_section_options = '0';
            $emp_formdata->save();

        }


        return 'saved';

    }


    public function showInvestmentsFormMgmtPage(Request $request)
    {
        //dd($request->all());

        return view('investments_forms_mgmt');

    }


    public function taxDeducationCalculate(Request $request)
    {
        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        $table = VmtInvFEmpAssigned::leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.f_emp_id', '=', 'vmt_inv_f_emp_assigned.id')
            ->where('vmt_inv_f_emp_assigned.user_id', $user_id)->get();

        $sumOfDeclarationAmount = 0;
        foreach ($table as $dec_amt) {
            $sumOfDeclarationAmount += $dec_amt['dec_amount'];
        }
        dd($sumOfDeclarationAmount);

    }





}
