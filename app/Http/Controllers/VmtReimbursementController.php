<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtReimbursementsService;

class VmtReimbursementController extends Controller
{
    public function showReimbursementsPage(Request $request){
       return view('approvals.vmt_employee_reimbursements');
    }

    public function saveReimbursementsData(Request $request, VmtReimbursementsService $serviceVmtReimbursementsService){

        return $serviceVmtReimbursementsService->saveReimbursementData_LocalConveyance( user_code: $request->user_code,
                                                                                        date : $request->date,
                                                                                        reimbursement_type: $request->reimbursement_type,
                                                                                        vehicle_type: $request->vehicle_type,
                                                                                        from:  $request->from,
                                                                                        to: $request->to,
                                                                                        distance_travelled: $request->distance_travelled,
                                                                                        user_comments:   $request->user_comments);

    }

    public function fetchEmployeeReimbursement(Request $request,VmtReimbursementsService $reimbursementService){
    // dd($request->all());
    $user_id = auth()->user()->id;
    $year = $request->selected_year;
    $month = $request->selected_month;
    return  $reimbursementService->fetchEmployeeReimbursement($user_id,$year,$month);
    }
}
