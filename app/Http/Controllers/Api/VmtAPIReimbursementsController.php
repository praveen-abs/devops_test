<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VmtReimbursementsService;
use Illuminate\Http\Request;

class VmtAPIReimbursementsController extends Controller
{

    public function saveReimbursementData(Request $request, VmtReimbursementsService $serviceVmtReimbursementsService){

        return $serviceVmtReimbursementsService->saveReimbursementData_LocalConveyance( user_code: $request->user_code,
                                                                                        date : $request->date,
                                                                                        reimbursement_type: $request->reimbursement_type,
                                                                                        vehicle_type: $request->vehicle_type,
                                                                                        from:  $request->from,
                                                                                        to: $request->to,
                                                                                        distance_travelled: $request->distance_travelled,
                                                                                        user_comments:   $request->user_comments);

    }


    public function getReimbursementVehicleTypes(Request $request, VmtReimbursementsService $serviceVmtReimbursementsService){
        return $serviceVmtReimbursementsService->getReimbursementVehicleTypes();
    }

    public function getReimbursementTypes(Request $request, VmtReimbursementsService $serviceVmtReimbursementsService){
        return $serviceVmtReimbursementsService->getReimbursementTypes();
    }



}
