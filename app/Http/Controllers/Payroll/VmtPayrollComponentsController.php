<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VmtPayrollComponentsService;

class VmtPayrollComponentsController extends Controller
{
    //

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
