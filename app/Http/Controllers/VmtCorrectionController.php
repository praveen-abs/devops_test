<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeReimbursements;
use Carbon\Carbon;

class VmtCorrectionController extends Controller
{
    public function processsExpense(Request $request){
        $reimbursement_details=VmtEmployeeReimbursements::select('id','vehicle_type','distance_travelled','total_expenses')
                                                         ->get();
        foreach( $reimbursement_details as $single_details){
                 if($single_details->vehicle_type=='2-Wheeler'){
                    $totalExpense=3.5*$single_details->distance_travelled;
                    $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                    $UpdateDetails->total_expenses= $totalExpense;
                    $UpdateDetails->save();

                 }else if( $single_details->vehicle_type=='4-Wheeler'){
                    $totalExpense=6*$single_details->distance_travelled;
                    $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                    $UpdateDetails->total_expenses= $totalExpense;
                    $UpdateDetails->save();
                   // dd('---------------');

                  //  dd( $single_details);
                 }
        }
        return  $reimbursement_details;

    }

    public function addingReimbursementsDataForSpecificMonth(Request $request){
         $existing_data = VmtEmployeeReimbursements::where('user_id',$request->user_id)
                                                    ->whereMonth('date',$request->month)
                                                    ->get()->toArray();
        $response = array();
         foreach(  $existing_data as $single_data){
               try{
                $new_record = new VmtEmployeeReimbursements;
                $new_record->user_id = $single_data['user_id'];
                $new_record->reimbursement_type_id = $single_data['reimbursement_type_id'];
                $new_record->date = Carbon::parse($single_data['date'])->addMonth()->toDateString();
                $new_record->reviewer_id = $single_data['reviewer_id'];
                $new_record->status = 'Pending';
                $new_record->from = $single_data['from'];
                $new_record->to = $single_data['to'];
                $new_record->vehicle_type = $single_data['vehicle_type'];
                $new_record->distance_travelled = $single_data['distance_travelled'];
                $new_record->total_expenses = $single_data['total_expenses'];
                $new_record->save();
                $response = array_merge($response,array(Carbon::parse($single_data['date'])->addMonth()->toDateString()=>$new_record->toArray()));

               }catch(\Exception $e){
                  dd($e);
               }

         }

         return $response;
    }

}
