<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VmtPayrollComponents;
use App\Services\VmtPayrollComponentsService;

class VmtPayrollComponentsController extends Controller
{
    //

    public function ShowPayRollComponentsPage(Request $request)
    {
        $paygroupcomponents =VmtPayrollComponents::get();
        return response()->json($paygroupcomponents);
    }
    public function CreatePayRollComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->CreatePayRollComponents(
            $request->comp_name,
            $request->comp_type_id,
            $request->calculation_method,
            $request->comp_name_payslip,
            $request->epf,
            $request->esi,
            $request->is_part_of_empsal_structure,
            $request->is_taxable,
            $request->calculate_on_prorate_basis,
            $request->can_show_inpayslip,
            $request->status
        );

        return $response;
    }
    public function UpdatePayRollComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->UpdatePayRollComponents(
            $request->comp_id,
            $request->comp_name,
            $request->comp_type_id,
            $request->calculation_method,
            $request->comp_name_payslip,
            $request->epf,
            $request->esi,
            $request->is_part_of_empsal_structure,
            $request->is_taxable,
            $request->calculate_on_prorate_basis,
            $request->can_show_inpayslip,
            $request->status);

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
    public function CreatePaygroupCompStructure(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        return$response = $serviceVmtPayrollComponentsService->CreatePaygroupCompStructure(
            $request->paygroup_name,
            $request->description,
            $request->pf,
            $request->esi,
            $request->tds,
            $request->fbp,
            $request->sal_components,
            $request->assigned_employees
        );

        return $response;
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
