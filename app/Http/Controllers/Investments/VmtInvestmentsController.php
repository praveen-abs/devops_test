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

}
