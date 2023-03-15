<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtReimbursementsService;

class VmtReimbursementController extends Controller
{
    public function showReimbursementsPage(Request $request){
       return view('approvals.vmt_employee_reimbursements');
    }


    public function fetchReimbursementsData(Request $request){

    }

    public function fetchLocalConveyanceData(Request $request){

    }



    public function saveReimbursementsData(Request $request, VmtReimbursementsService $reimbursementService){

        dd($request->all());
        $request->claim_type= $request['claim_type'];
        $request->claim_amount= $request['claim_amount'];
        $request->eligible_amount= $request['request'];
        $request->reimbursement_attachment= $request['reimbursement_attachment'];

        $reimbursementService->testCreateLocalCovergance();
        $request->save();


    }
}
