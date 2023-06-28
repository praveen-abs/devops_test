<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VmtPayrollComponents;
use App\Models\VmtPaygroup;
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

    public function EnableDisableComponents(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
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
    public function addPayrollIntegrations(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    {
        $response =$serviceVmtPayrollComponentsService->addPayrollIntegrations(
        $request->accounting_soft_name,
        $request->accounting_soft_logo,
        $request->description,
        $request->status);

        return $response;
    }


    public function fetchPayGroupEmpComponents(Request $request)
    {
        $response =array();


          $paygroupassignempcomps =VmtEmpPaygroup::get();

              $emp_id =array();
                foreach ($paygroupassignempcomps as $key => $singlepaygroupassignempcomps) {

                    $emp_id[]=$singlepaygroupassignempcomps->user_id;

                }

         $payroll_assign_employees = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                                        ->join('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                                        ->join('vmt_client_master', 'vmt_client_master.id', '=', 'users.client_id')
                                        ->where('process', '<>', 'S2 Admin')
                                        ->whereIn('users.id',$emp_id)
                                        ->select(
                                            'users.name',
                                            'users.user_code',
                                            'vmt_department.name as department_name',
                                            'vmt_employee_office_details.designation',
                                            'vmt_employee_office_details.work_location',
                                            'vmt_client_master.client_name',
                                            )
                                        ->get();

                 $response['paygroupassignempcomps'] =$payroll_assign_employees;

      $paygroupassigncomps =VmtPaygroupComps::get();

              $comp_id =array();

         foreach ($paygroupassigncomps as $key => $singlepaygroupassigncomps) {

               $comp_id[]=$singlepaygroupassigncomps->comp_id;

          }

          $paygroup_assign_comps =VmtPayrollComponents::whereIn('id', $comp_id)->get();

           $response['paygroupassigncomps'] =$paygroup_assign_comps;

    $paygroupempstructure =VmtPaygroup::get();

    $paygroup = array();

    foreach ($paygroupempstructure as $key => $singlepaygroupempstructure) {

          $paygroup[]=$singlepaygroupempstructure->creator_user_id;

     }
      $paygroupempstructure['no_of_employees']=count($payroll_assign_employees);
      $creator_user_name = User::whereIn('id',$creator_user_id)->first();
      $paygroupempstructure['creator_user_id as creator_user_name']= $creator_user_name->name;

           $response['paygroupempstructure'] =$paygroupempstructure;


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


    // public function ShowPaySlipTemplateMgmtPage(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    // {
    //     return $serviceVmtPayrollComponentsService->ShowPaySlipTemplateMgmtPage();
    // }
    // public function assignPaySlipTemplateToClient(Request $request,  VmtPayrollComponentsService $serviceVmtPayrollComponentsService)
    // {
    //     return $serviceVmtPayrollComponentsService->assignPaySlipTemplateToClient();
    // }
}
