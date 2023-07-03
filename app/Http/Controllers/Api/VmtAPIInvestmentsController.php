<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\VmtInvestmentsService;

class VmtAPIInvestmentsController extends Controller
{


    public function getInvestmentsFormDetailsTemplate(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
        //  dd($request->all());
          return $serviceVmtInvestmentsService->getInvestmentsFormDetailsTemplate($request->form_name);
    }


    public function SaveInvDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
        //dd($request->all());

        return $serviceVmtInvestmentsService->SaveInvDetails($request->user_code , $request->form_id , $request->is_submitted, $request->formDataSource);
    }

    public function saveSectionPopups(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
       // dd($request->all());

        return $serviceVmtInvestmentsService->saveSectionPopups($request->id, $request->user_code, $request->fs_id, $request->from_month, $request->to_month, $request->city, $request->total_rent_paid, $request->landlord_name,  $request->landlord_PAN, $request->address );
    }
    public function saveSection80(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
       // dd($request->all());

        return $serviceVmtInvestmentsService->saveSection80($request->user_code, $request->fs_id, $request->loan_sanction_date, $request->lender_type, $request->property_value, $request->loan_amount, $request->interest_amount_paid,  $request->section );
    }


    public function fetchHousePropertyDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
       // dd($request->all());

        return $serviceVmtInvestmentsService->fetchHousePropertyDetails($request->user_code, $request->fs_id);
    }
    public function fetchEmpRentalDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
       // dd($request->all());

        return $serviceVmtInvestmentsService->fetchEmpRentalDetails($request->user_code, $request->fs_id);
    }

    public function deleteHousePropertyDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
       // dd($request->all());

        return $serviceVmtInvestmentsService->deleteHousePropertyDetails($request->currentTableId);
    }


}


