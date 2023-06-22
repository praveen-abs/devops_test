<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VmtPayrollComponents;
use App\Services\VmtPayrollComponentsService;

class VmtPayrollComponentsController extends Controller
{
    //

    public function fetchPayRollComponents(Request $request)
    {
        $paygroupcomponents =VmtPayrollComponents::get();
        return response()->json($paygroupcomponents);
    }
    public function CreatePayRollComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        // dd($request->all());

        $response =$serviceVmtPayrollComponentsService->CreatePayRollComponents(
            $request->name,
            $request->typeOfComp,
            $request->typeOfCalc,
            $request->nameInPayslip,
            $request->isConsiderForEPF,
            $request->isConsiderForESI,
            $request->isPartOfEmpSalStructure,
            $request->isTaxable,
            $request->isCalcShowProBasis,
            $request->isShowInPayslip,
            $request->status
        );

        return $response;
    }
    public function UpdatePayRollComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->UpdatePayRollComponents(
            $request->id,
            $request->name,
            $request->typeOfComp,
            $request->typeOfCalc,
            $request->nameInPayslip,
            $request->isConsiderForEPF,
            $request->isConsiderForESI,
            $request->isPartOfEmpSalStructure,
            $request->isTaxable,
            $request->isCalcShowProBasis,
            $request->isShowInPayslip,
            $request->status
        );

        return $response;
    }
    public function DeletePayRollComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->DeletePayRollComponents($request->comp_id);

        return $response;
    }
    public function EnableDisableComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->EnableDisableComponents($request->comp_id,$request->status);

        return $response;
    }
    public function ShowPayRollComponentsMgmtPage(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        return $serviceVmtPayrollComponentsService->ShowPayRollComponentsMgmtPage();
    }
    public function ShowPaySlipTemplateMgmtPage(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        return $serviceVmtPayrollComponentsService->ShowPaySlipTemplateMgmtPage();
    }
    public function assignPaySlipTemplateToClient(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        return $serviceVmtPayrollComponentsService->assignPaySlipTemplateToClient();
    }
}
