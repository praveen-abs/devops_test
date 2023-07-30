<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VmtPayrollComponents;
use App\Models\VmtPaygroup;
use App\Models\VmtAppIntegration;
use App\Models\VmtEmpPaygroup;
use App\Models\User;
use App\Models\VmtPaygroupComps;
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
         //dd($request->all());

        $response =$serviceVmtPayrollComponentsService->CreatePayRollComponents(
            $request->name,
            $request->typeOfComp,
            $request->typeOfCalc,
            $request->amount,
            $request->percentage,
            $request->nameInPayslip,
            $request->isConsiderForEPF,
            $request->isConsiderForESI,
            $request->category_id,
            $request->isPartOfEmpSalStructure,
            $request->isTaxable,
            $request->isCalcShowProBasis,
            $request->isShowInPayslip,
            $request->status
        );

        return $response;
    }
    public function UpdatePayRollEarningsComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {

        $response =$serviceVmtPayrollComponentsService->UpdatePayRollEarningsComponents(
            $request->id,
            $request->name,
            $request->typeOfComp,
            $request->typeOfCalc,
            $request->amount,
            $request->percentage,
            $request->nameInPayslip,
            $request->isConsiderForEPF,
            $request->isConsiderForESI,
            $request->category_id,
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

    public function authorizeComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->EnableDisableComponents($request->comp_id,$request->status);

        return $response;
    }

    public function AddAdhocAllowanceDetectionComp(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        //dd($request->all());
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
            $request->id,
            $request->comp_name,
            $request->is_taxable,
            $request->category_id,
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
        $request->comp_name,
        $request->category_id,
        $request->maximum_limit,
        $request->status);

        return $response;
    }
    public function fetchPayrollAppIntegration(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =VmtAppIntegration::get();

        return response()->json([
                "status" => "success",
                "message" => " ",
                "data" => $response,
        ]);

    }
    public function addPayrollAppIntegrations(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->addPayrollAppIntegrations(
        $request->accounting_soft_name,
        $request->accounting_soft_logo,
        $request->description,
        $request->status);

        return $response;
    }
    public function authorizeAppIntegration(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->EnableDisableAppIntegration(
            $request->app_id,
            $request->status);

        return $response;
    }


    public function fetchPayGroupEmpComponents(Request $request , VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {

        $response =$serviceVmtPayrollComponentsService->fetchPayGroupEmpComponents();


        return response()->json($response);
    }

    // public function getAllDropdownFilterSetting(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    // {

    //     return $vmtSalaryAdvanceService->getAllDropdownFilterSetting();
    // }


    // public function ShowAssignEmployeelist(Request $request, VmtPayrollComponentsService $VmtPayrollComponentsService)
    // {
    //     // dd($request->all());

    //     return $VmtPayrollComponentsService->ShowAssignEmployeelist($request->department_id, $request->designation, $request->work_location, $request->client_name);
    // }

    public function addPaygroupCompStructure(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        // dd($request->all());
            $response = $serviceVmtPayrollComponentsService->addPaygroupCompStructure(
            $request->structureName,
            $request->description,
            $request->pf,
            $request->esi,
            $request->tds,
            $request->fbp,
            $request->selectedComponents,
            $request->assignedEmployees
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
    public function CreatePayrollEpf(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        // dd($request->all());
            $response = $serviceVmtPayrollComponentsService->CreatePayrollEpf(
            $request->epf_number,
            $request->epf_deduction_cycle,
            $request->is_epf_num_default,
            $request->epf_rule,
            $request->epf_contrib_type,
            $request->pro_rated_lop_status,
            $request->can_consider_salcomp_pf,
            $request->employer_contrib_in_ctc,
            $request->employer_edli_contri_in_ctc,
            $request->admin_charges_in_ctc,
            $request->override_pf_contrib_rate,
            $request->status,
        );

        return $response;
    }
    public function updatePayrollEpf(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        // dd($request->all());
            $response = $serviceVmtPayrollComponentsService->updatePayrollEpf(
            $request->epf_id,
            $request->epf_number,
            $request->epf_deduction_cycle,
            $request->is_epf_num_default,
            $request->epf_rule,
            $request->epf_contrib_type,
            $request->pro_rated_lop_status,
            $request->can_consider_salcomp_pf,
            $request->employer_contrib_in_ctc,
            $request->employer_edli_contri_in_ctc,
            $request->admin_charges_in_ctc,
            $request->override_pf_contrib_rate,
            $request->status,
        );

        return $response;
    }
    public function deleteEpfEmployee(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->deleteEpfEmployee($request->epf_id);

        return $response;

    }
    public function authorizeEpfEmployee(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->authorizeEpfEmployee($request->epf_id,$request->status);

        return $response;
    }
    public function CreatePayrollEsi(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        // dd($request->all());

            $response = $serviceVmtPayrollComponentsService->CreatePayrollEsi(
            $request->esi_number,
            $request->esi_deduction_cycle,
            $request->state,
            $request->location,
            $request->employee_contribution_rate,
            $request->employer_contribution_rate,
            $request->employer_contribution_in_ctc,
            $request->override_pf_contrib_rate,
            $request->status,
        );

        return $response;
    }
    public function updatePayrollEsi( Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService){
        $response = $serviceVmtPayrollComponentsService->updatePayrollEsi(
            $request->esi_id,
            $request->esi_number,
            $request->esi_deduction_cycle,
            $request->state,
            $request->location,
            $request->employee_contribution_rate,
            $request->employer_contribution_rate,
            $request->employer_contribution_in_ctc,
            $request->status);

            return $response;
    }
    public function deleteEsiEmployee(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->deleteEsiEmployee($request->esi_id);

        return $response;

    }
    public function authorizeEsiEmployee(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->authorizeEsiEmployee($request->esi_id,$request->status);

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
