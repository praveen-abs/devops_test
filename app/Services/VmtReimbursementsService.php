<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeReimbursements;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtPMS_KPIFormAssignedModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtOrgRoles;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;


class VmtReimbursementsService {



    function fetchAllReimbursementsAsGroups($year, $month, $reimbursement_type_id){

        // $year = '2023';
        // $month = '03';
        // $reimbursement_type_id = "1"; //Hardcoded Local Conveyance

        $json_response = array();

        //Fetch how many unique users for the given filters
        //SELECT distinct user_id FROM `vmt_employee_reimbursements` where MONTH(date) = '3' AND YEAR(date) = '2023';
        $array_unique_users = VmtEmployeeReimbursements::leftJoin('users','users.id','=','vmt_employee_reimbursements.user_id')
                                ->whereYear('vmt_employee_reimbursements.date',$year)
                                ->whereMonth('vmt_employee_reimbursements.date',$month)
                                ->groupBy('user_code')
                                ->select('vmt_employee_reimbursements.user_id as user_id','users.name as employee_name',
                                'users.user_code as user_code',DB::raw('sum(distance_travelled) as total_distance_travelled'),
                                DB::raw('sum(total_expenses) as total_total_expenses'))->get();

        //for each user_id
      // dd($array_unique_users->toArray());
        foreach($array_unique_users as $single_user){

            //dd($single_user->user_id);
            $single_user_data["employee_name"] = $single_user->employee_name;
            $single_user_data["user_code"] = $single_user->user_code;
            $single_user_data["user_id"] = $single_user->user_id;
            $single_user_data["total_distance_travelled"]=$single_user->total_distance_travelled;
            $single_user_data["total_expenses"]=$single_user->total_total_expenses;


            //Get all the reimbursement data for the given user_id
            $reimbursement_data = VmtEmployeeReimbursements::where('user_id',$single_user->user_id)
                                ->where('reimbursement_type_id',$reimbursement_type_id)
                                ->get(['id','reimbursement_type_id','date','from','to','vehicle_type','distance_travelled','total_expenses','status']);


           foreach($reimbursement_data as $singledata){
                if($singledata->status=='Pending'){
                    $single_user_data["has_pending_reimbursements"] = "true";
                    break;
                }else{
                    $single_user_data["has_pending_reimbursements"] = "false";
                }
                 //dd();
           }
            $single_user_data["overall_expenses"] = "0";    //TODO : Need to calculate the overall expenses
              //TODO : Need to find if any pending reimbursement there for the given user.

            //dd($reimbursement_data->toArray());
            $single_user_data["reimbursement_data"] = $reimbursement_data->toArray();

            //dd($single_user_data);

            array_push($json_response, $single_user_data);

        }

        //dd($json_response);

        return $json_response;

    }

    public function processReimbursementBulkApprovals($data){
        $reimbursement_data = $data['reimbursement_id']["reimbursement_data"];
      //  dd( $reimbursement_data);
             for($i=0;$i<count($reimbursement_data);$i++){
                if($reimbursement_data[$i]['status']=='Pending'){
                    VmtEmployeeReimbursements::where('id',$reimbursement_data[$i]['id'])
                                            ->update([
                                                'status' => $data['status']
                                            ]);
                }

             }


    }
}
