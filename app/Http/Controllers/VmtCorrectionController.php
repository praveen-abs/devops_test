<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeReimbursements;
use App\Models\User;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeWorkShifts;
use Carbon\Carbon;
Use Exception;

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

    //Adding Work Shift for dunamis
    public function addingWorkShiftForAllEmployees(Request $request){
        $number_of_flexi_shift=3;
        $all_employees=User::where('is_ssa',0)->get();
        foreach( $all_employees as $single_employee){
           if($single_employee->user_code=='DM054'||$single_employee->user_code=='DM145'||$single_employee->user_code=='DM178'||
             $single_employee->user_code=='DM176'||$single_employee->user_code=='DM183'){
                try
                {
                 $employee_work_shift = new VmtEmployeeWorkShifts;
                 $employee_work_shift->user_id = $single_employee->id;
                 $employee_work_shift->work_shift_id = 2;
                 $employee_work_shift->is_active = 1;
                 $employee_work_shift->save();
                }
                catch(Exception $e)
                {
                   dd($e->getMessage());
                }
           }else if($single_employee->user_code=='DM109'){
                   try
                   {
                    $employee_work_shift = new VmtEmployeeWorkShifts;
                    $employee_work_shift->user_id = $single_employee->id;
                    $employee_work_shift->work_shift_id = 3;
                    $employee_work_shift->is_active = 1;
                    $employee_work_shift->save();
                   }
                   catch(Exception $e)
                   {
                      dd($e->getMessage());
            }
           }else if($single_employee->user_code=='DM182'||$single_employee->user_code=='DM150'|| $single_employee->user_code=='DM179'|| $single_employee->user_code=='DM095'||
           $single_employee->user_code=='DMC101'||$single_employee->user_code=='DMC136'||$single_employee->user_code=='DMC133'||$single_employee->user_code=='DMC129'||$single_employee->user_code=='DM019'||
           $single_employee->user_code=='DM165'||$single_employee->user_code=='DM153'||$single_employee->user_code=='DM170'||$single_employee->user_code=='DMC069'||$single_employee->user_code=='DM045'){
                                   for($i=1;$i<=$number_of_flexi_shift;$i++){
                                    try
                                    {
                                     $employee_work_shift = new VmtEmployeeWorkShifts;
                                     $employee_work_shift->user_id = $single_employee->id;
                                     $employee_work_shift->work_shift_id = VmtWorkShifts::where('shift_type','Shift '.$i)->first('id')->id;
                                     $employee_work_shift->is_active = 1;
                                     $employee_work_shift->save();
                                    }
                                      catch(Exception $e)
                                    {
                                       dd($e->getMessage());
                                   }

                                   }

           }else{
            try
            {
             $employee_work_shift = new VmtEmployeeWorkShifts;
             $employee_work_shift->user_id = $single_employee->id;
             $employee_work_shift->work_shift_id = 1;
             $employee_work_shift->is_active = 1;
             $employee_work_shift->save();
            }
            catch(Exception $e)
            {
               dd($e->getMessage());
           }
           }
        }

        return "Employee Work Shift Added";

    }

}
