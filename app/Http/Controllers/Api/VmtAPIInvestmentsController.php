<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\VmtInvestmentsService;

class VmtAPIInvestmentsController extends Controller
{
    public function getInvestmentsFormDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
        //dd($request->all());

        return $serviceVmtInvestmentsService->getInvestmentsFormDetails($request->form_name);
    }


    public function getCurrentInvestmentsFormDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){

        $response = $serviceVmtInvestmentsService->getCurrentInvestmentsFormDetails();

        return $response;
    }

}
