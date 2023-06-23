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
            $request->category_id,
            $request->is_part_of_empsal_structure,
            $request->is_taxable,
            $request->calculate_on_prorate_basis,
            $request->can_show_inpayslip,
            $request->status
        );

        return $response;
    }
    public function UpdatePayRollEarningsComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->UpdatePayRollEarningsComponents(
            $request->comp_id,
            $request->comp_name,
            $request->comp_type_id,
            $request->calculation_method,
            $request->comp_name_payslip,
            $request->epf,
            $request->esi,
            $request->category_id,
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

    public function AddAdhocAllowanceDetectionComp(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->AddAdhocAllowanceDetectionComp(
            $request->comp_name,
            $request->category_id,
            $request->category_type,
            $request->is_taxable,
            $request->impact_on_gross,
            $request->status
        );
        return $response;
    }
    public function UpdateAdhocAllowanceDetectionComp(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->UpdateAdhocAllowanceDetectionComp(
            $request->comp_id,
            $request->comp_name,
            $request->is_taxable,
            $request->category,
            $request->category_type,
            $request->impact_on_gross);

        return $response;
    }
    public function AddReimbursementComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->AddReimbursementComponents(
            $request->comp_id,
            $request->comp_name,
            $request->category_id,
            $request->maximum_limit,
            $request->status);

        return $response;
    }
    public function UpdateReimbursementComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->UpdateReimbursementComponents(
        $request->comp_id,
        $request->comp_id,
        $request->comp_name,
        $request->category_id,
        $request->maximum_limit,
        $request->status);

        return $response;
    }


    public function addPaygroupCompStructure(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        return$response = $serviceVmtPayrollComponentsService->addPaygroupCompStructure(
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
    public function updatePaygroupCompStructure(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        return$response = $serviceVmtPayrollComponentsService->updatePaygroupCompStructure(
            $request->paygroup_id,
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

    public function deletePaygroupComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->deletePaygroupComponents($request->paygroup_id);

        return $response;

    }


    // public function ShowPaySlipTemplateMgmtPage(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    // {
    //     return $serviceVmtPayrollComponentsService->ShowPaySlipTemplateMgmtPage();
    // }
    // public function assignPaySlipTemplateToClient(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    // {
    //     return $serviceVmtPayrollComponentsService->assignPaySlipTemplateToClient();
    // }
}
