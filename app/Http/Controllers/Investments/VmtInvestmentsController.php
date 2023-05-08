<?php

namespace App\Http\Controllers\Investments;

use App\Http\Controllers\Controller;
use App\Services\VmtInvestmentsService;
use Illuminate\Http\Request;



class VmtInvestmentsController extends Controller
{
    public function getInvestmentsFormDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
        //dd($request->all());

        return $serviceVmtInvestmentsService->getInvestmentsFormDetails($request->form_name);
    }

    public function saveEmpInvSecDetails(Request $request,VmtInvestmentsService $serviceVmtInvestmentsService){
        //dd($request->all());

        return $serviceVmtInvestmentsService->saveEmpInvSecDetails($request->user_code, $request->section_name, $request->section_data);
    }

    public function ImportInvestmentForm_Excel(Request $request,VmtInvestmentsService $serviceVmtInvestmentsService){
        //dd($request->all());

        return $serviceVmtInvestmentsService->ImportInvestmentForm_Excel($request->form_name, $request->section_name, $request->excel_file);
    }


    public function showInvestmentsFormMgmtPage(Request $request){
        //dd($request->all());

        return view('investments_forms_mgmt');
    }

}
