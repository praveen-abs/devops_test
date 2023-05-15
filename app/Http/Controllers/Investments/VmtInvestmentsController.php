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

    public function SaveInvDetails(Request $request)
    {
        // dd($request->formDataSource);


        $form_id = $request->form_id;
        $user_id = User::where('user_code', $request->user_code)->first()->id;
        $form_data = $request->formDataSource;

        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);
        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();

        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->save();
            $query_assign = $emp_assign_form;

        }

        // dd($form_data);
        foreach ($form_data as $singleFormData) {
            $fs_id = $singleFormData['fs_id'];
            $dec_amount = $singleFormData['declaration_amount'];



            $emp_formdata = new VmtInvEmpFormdata;
            $emp_formdata->f_emp_id = $query_assign->id;
            $emp_formdata->fs_id = $fs_id;
            $emp_formdata->dec_amount = $dec_amount;
        //   $emp_formdata->json_popups_value = $sima ?? "none";
            $emp_formdata->save();


        }



    }

    public function fetchEmpRentalDetails(Request $request,VmtInvestmentsService $serviceVmtInvestmentsService){
       
        $user_code = $request->user_code;
        $fs_id = $request->fs_id;
        return $serviceVmtInvestmentsService->fetchEmpRentalDetails($user_code,$fs_id);

    }

    public function saveSectionPopups(Request $request){

        $json_decodeHra = json_encode($request->all());

        $form_id = "1";

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
            $emp_assign_form->save();
            $query_assign = $emp_assign_form;
        }

             $Hra_save = new VmtInvEmpFormdata;
             $Hra_save->f_emp_id = $query_assign->id;
             $Hra_save->fs_id = $fs_id;
             $Hra_save->dec_amount ='none';
             $Hra_save->json_popups_value = $json_decodeHra;
             $Hra_save->save();




     return 'saved';


 }



    public function showInvestmentsFormMgmtPage(Request $request)
    {
        //dd($request->all());

        return view('investments_forms_mgmt');

    }

   



}
