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
}
