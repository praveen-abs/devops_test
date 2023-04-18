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


        $reimbursementTypeId=$request->reimbursement_type_id;

        if($reimbursementTypeId == 1){

            return $reimbursementService->createReimbursement($request->reimbursement_type_id,
                                                                        $request->claim_type,
                                                                         $request->claim_amount,
                                                                        $request->eligible_amount,
                                                                         $request->user_comments,
                                                                        $request->status,
                                                                        $request->date_of_dispatch,
                                                                        $request->proof_of_delivery);


        }
        else
        if($reimbursementTypeId == 2){

          return $reimbursementService->createReimbursement_LocalConveyance($request->reimbursement_type_id,
                                                                         $request->date,
                                                                         $request->user_comments,
                                                                         $request->from,
                                                                         $request->to,
                                                                         $request->vehicle_type,
                                                                         $request->distance_travelled);

        }else{
            return  "reimbursement not founded!!";
        }


    //     $request->claim_type= $request['claim_type'];
    //     $request->claim_amount= $request['claim_amount'];
    //     $request->eligible_amount= $request['request'];
    //     $request->reimbursement_attachment= $request['reimbursement_attachment'];
    //     $fileName = time().'_'. $request->file->getClientOriginalName();
    //     $emp_document_path = Storage::disk('private');
    //    if(!$emp_document_path->exists('Emp_code')){
    //    File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true);
    //    }
    //    $filePath =  $request->file->storeAs('Emp_code', $fileName, 'private');
    //    $fileModel->name = time().'_'.$request->file->getClientOriginalName();
    //    $fileModel->file_path = '/storage/' . $filePath;
    //    $fileModel->save();
    //    return back()
    //    ->with('success','File has been uploaded.')
    //    ->with('file', $fileName);
    //    $request->save();


       }

       public function fetchEmployeeReimbursement(Request $request,VmtReimbursementsService $reimbursementService){
        $user_id = auth()->user()->id;
        $year = 2023;
        $month = 03;
        return  $reimbursementService->fetchEmployeeReimbursement($user_id,$year,$month);
       }
}
