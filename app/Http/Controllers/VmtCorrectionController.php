<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeReimbursements;
use App\Models\User;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtEmployeeLeaves;
use Carbon\Carbon;

class VmtCorrectionController extends Controller
{
    public function processsExpense(Request $request){
        $reimbursement_details=VmtEmployeeReimbursements::select('id','vehicle_type_id','distance_travelled','total_expenses')
                                                         ->get();
        foreach( $reimbursement_details as $single_details){
                 if($single_details->vehicle_type_id==1){
                    $totalExpense=3.5*$single_details->distance_travelled;
                    $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                    $UpdateDetails->total_expenses= $totalExpense;
                    $UpdateDetails->save();

                 }else if( $single_details->vehicle_type_id==2){
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
                $new_record->vehicle_type_id = $single_data['vehicle_type_id'];
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
    public function  checkallemployeeonboardingstatus(){

        $query_all_users_details=User::get();
    try{
        foreach($query_all_users_details as $single_user_data){
              //get the mandatory document id
              $mandatory_doc_ids = VmtDocuments::where('is_mandatory','1')->pluck('id');

             //get the employees uploaded documents mandatory id
              $user_uploaded_docs_ids = VmtEmployeeDocuments::whereIn('doc_id',$mandatory_doc_ids)
                                                              ->where('vmt_employee_documents.user_id',$single_user_data->id)
                                                              ->pluck('doc_id');

          if(count($mandatory_doc_ids) == count($user_uploaded_docs_ids))
            {
             //set the onboard status to 1
                $currentUser =User::where('id',$single_user_data->id)->first();
                $currentUser->is_onboarded = '1';
                $currentUser->save();

           }
        }
    }catch(\Exception $e){
        dd($e);
     }
    }

    public function addElbalancewithjsonString(Request $request){
      $data ='[{"user_code": "DM001","el_balance": 15},{ "user_code": "DM002", "el_balance": 15},
        {
         "user_code": "DM003",
         "el_balance": 15
        },
        {
         "user_code": "DM004",
         "el_balance": 15
        },
        {
         "user_code": "DM006",
         "el_balance": 5.5
        },
        {
         "user_code": "DM007",
         "el_balance": 6
        },
        {
         "user_code": "DM009",
         "el_balance": 10.5
        },
        {
         "user_code": "DM012",
         "el_balance": 8.5
        },
        {
         "user_code": "DM016",
         "el_balance": 15
        },
        {
         "user_code": "DM018",
         "el_balance": 6
        },
        {
         "user_code": "DM019",
         "el_balance": 9.5
        },
        {
         "user_code": "DM021",
         "el_balance": 1
        },
        {
         "user_code": "DM022",
         "el_balance": 5
        },
        {
         "user_code": "DM024",
         "el_balance": 9
        },
        {
         "user_code": "DM026",
         "el_balance": 8.5
        },
        {
         "user_code": "DM028",
         "el_balance": 6
        },
        {
         "user_code": "DM029",
         "el_balance": 9
        },
        {
         "user_code": "DM032",
         "el_balance": 5
        },
        {
         "user_code": "DM034",
         "el_balance": 12
        },
        {
         "user_code": "DM038",
         "el_balance": 9.5
        },
        {
         "user_code": "DM045",
         "el_balance": 6.5
        },
        {
         "user_code": "DM054",
         "el_balance": 15
        },
        {
         "user_code": "DM059",
         "el_balance": 5
        },
        {
         "user_code": "DM069",
         "el_balance": 13
        },
        {
         "user_code": "DM071",
         "el_balance": 11
        },
        {
         "user_code": "DM079",
         "el_balance": 8.5
        },
        {
         "user_code": "DM088",
         "el_balance": 6
        },
        {
         "user_code": "DM091",
         "el_balance": 3
        },
        {
         "user_code": "DM094",
         "el_balance": 8
        },
        {
         "user_code": "DM095",
         "el_balance": 7
        },
        {
         "user_code": "DM101",
         "el_balance": 5
        },
        {
         "user_code": "DM103",
         "el_balance": 6
        },
        {
         "user_code": "DM104",
         "el_balance": 5
        },
        {
         "user_code": "DM106",
         "el_balance": 9
        },
        {
         "user_code": "DM107",
         "el_balance": 4
        },
        {
         "user_code": "DM109",
         "el_balance": 8
        },
        {
         "user_code": "DM110",
         "el_balance": 7
        },
        {
         "user_code": "DM112",
         "el_balance": 14
        },
        {
         "user_code": "DM113",
         "el_balance": 6
        },
        {
         "user_code": "DM115",
         "el_balance": 7
        },
        {
         "user_code": "DM117",
         "el_balance": 2
        },
        {
         "user_code": "DM118",
         "el_balance": 12.5
        },
        {
         "user_code": "DM120",
         "el_balance": 9
        },
        {
         "user_code": "DM122",
         "el_balance": 6
        },
        {
         "user_code": "DM123",
         "el_balance": 6
        },
        {
         "user_code": "DM124",
         "el_balance": 7
        },
        {
         "user_code": "DM125",
         "el_balance": 5
        },
        {
         "user_code": "DM127",
         "el_balance": 8.5
        },
        {
         "user_code": "DM128",
         "el_balance": 6
        },
        {
         "user_code": "DM131",
         "el_balance": 5
        },
        {
         "user_code": "DM134",
         "el_balance": 6
        },
        {
         "user_code": "DM140",
         "el_balance": 7
        },
        {
         "user_code": "DM141",
         "el_balance": 8.5
        },
        {
         "user_code": "DM145",
         "el_balance": 9
        },
        {
         "user_code": "DM146",
         "el_balance": 7
        },
        {
         "user_code": "DM148",
         "el_balance": 9
        },
        {
         "user_code": "DM149",
         "el_balance": 10
        },
        {
         "user_code": "DM150",
         "el_balance": 8
        },
        {
         "user_code": "DM151",
         "el_balance": 5.5
        },
        {
         "user_code": "DM153",
         "el_balance": 8
        },
        {
         "user_code": "DM154",
         "el_balance": 6
        },
        {
         "user_code": "DM156",
         "el_balance": 9
        },
        {
         "user_code": "DM159",
         "el_balance": 5
        }
       ]';

       $data = preg_replace('/\s+/', '', $data);
       $el_balance_json = json_decode($data, true);
       $leave_type_id=1;
        foreach( $el_balance_json as $single_user){
           $user_id = User::where('user_code',$single_user['user_code'])->first();
            if( $user_id==null){
               dd($single_user['user_code'].' does not exists in database');
            }else{
                // Joobi Karthi
                try {


                    $employee_leave = new VmtEmployeeLeaves;
                    $employee_leave->user_id = $user_id->id;
                    $employee_leave->leave_type_id =   $leave_type_id;
                    $employee_leave->start_date = '2022-06-01';
                    $employee_leave->end_date = '2022-06-10';
                    $employee_leave->total_leave_datetime=$single_user['el_balance'];
                    $employee_leave->status = 'Approved';
                    $employee_leave->save();


                  } catch (\Exception $e) {
                      return $e->getMessage();
                  }
            }
        }

        return 'Leave Balance Added Sucessfully';
    }

}
