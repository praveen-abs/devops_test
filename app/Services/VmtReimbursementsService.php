<?php

namespace App\Services;

use App\Models\VmtReimbursementVehicleType;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtEmployeeReimbursements;
use App\Models\VmtReimbursements;
use Illuminate\Support\Facades\DB;

class VmtReimbursementsService {
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        //$query_LocalConveyance = VmtLocalConveyanceVehicles::all();
    }

    private function getLocalConveyanceCost($vehicle_type){

        switch ($vehicle_type) {
            case "Bike":
                return $this->kmsCost_2_wheeler;
            case "Car":
                return $this->kmsCost_4_wheeler;
            case "Public Transport":
                return $this->kmsCost_misc;
            default:
                return null;
        }
    }


    public function saveReimbursementData_LocalConveyance($user_code, $date, $reimbursement_type, $vehicle_type, $from, $to, $distance_travelled, $user_comments)
    {

        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'date' => $date,
                'reimbursement_type' => $reimbursement_type,
                'vehicle_type' => $vehicle_type,
                'from' => $from,
                'to' => $to,
                'distance_travelled' => $distance_travelled,
                'user_comments' => $user_comments,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "date" => "required",
                "reimbursement_type" => 'required|exists:vmt_reimbursements,reimbursement_type',
                "vehicle_type" => "required|exists:vmt_reimbursement_vehicle_types,vehicle_type",
                "from" => "required",
                "to" => "required",
                "distance_travelled" => "required",
                "user_comments" => "nullable",
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if($validator->fails()){
            return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
            ]);
        }

        $query_reimbursements_vehicle_types = VmtReimbursementVehicleType::where('vehicle_type', $vehicle_type)->first();

        //Save the reimbursement data
        $emp_reimbursement_data = new VmtEmployeeReimbursements;
        $emp_reimbursement_data->date = $date;
        $emp_reimbursement_data->reimbursement_type_id = VmtReimbursements::where('reimbursement_type',$reimbursement_type)->first()->id;
        $emp_reimbursement_data->user_id = User::where('user_code',$user_code)->first()->id;
        $emp_reimbursement_data->status = "Pending";

        //reimbursement details
        $emp_reimbursement_data->from = $from;
        $emp_reimbursement_data->to = $to;
        $emp_reimbursement_data->vehicle_type_id = $query_reimbursements_vehicle_types->id;
        $emp_reimbursement_data->distance_travelled = $distance_travelled;
        $emp_reimbursement_data->user_comments = $user_comments ?? "";

        $emp_reimbursement_data->total_expenses  = $distance_travelled *  $query_reimbursements_vehicle_types->cost_per_km;

        $emp_reimbursement_data->save();

        return response()->json([
            'status' => 'success',
            'message'=> 'Reimbursement details saved',
            'data'=> ''
        ]);

    }

    public function getReimbursementVehicleTypes(){
        return VmtReimbursementVehicleType::all(['id','vehicle_type','cost_per_km']);
    }

    public function getReimbursementTypes(){
        return VmtReimbursements::all(['id','reimbursement_type']);
    }

    function fetchAllReimbursementsAsGroups($year, $month, $status ,$reimbursement_type_id){



        $json_response = array();

        //Fetch how many unique users for the given filters
        //SELECT distinct user_id FROM `vmt_employee_reimbursements` where MONTH(date) = '3' AND YEAR(date) = '2023';
        $array_unique_users = VmtEmployeeReimbursements::leftJoin('users','users.id','=','vmt_employee_reimbursements.user_id')
                                ->whereYear('vmt_employee_reimbursements.date',$year)
                                ->whereMonth('vmt_employee_reimbursements.date',$month)
                                ->groupBy('user_code')
                                ->select('vmt_employee_reimbursements.user_id as user_id','users.name as employee_name',
                                'users.user_code as user_code',DB::raw('sum(distance_travelled) as total_distance_travelled'),
                                DB::raw('sum(total_expenses) as total_total_expenses'));

        if($status!=null){
            $array_unique_users=$array_unique_users->where('vmt_employee_reimbursements.status', $status);
        }

        $array_unique_users=$array_unique_users->get();

        foreach($array_unique_users as $single_user){

            //dd($single_user->user_id);
            $single_user_data["employee_name"] = $single_user->employee_name;
            $single_user_data["user_code"] = $single_user->user_code;
            $single_user_data["user_id"] = $single_user->user_id;
            $single_user_data["total_distance_travelled"]=$single_user->total_distance_travelled;
            $single_user_data["total_expenses"]=$single_user->total_total_expenses;


            //Get all the reimbursement data for the given user_id
            $reimbursement_data = VmtEmployeeReimbursements::where('user_id',$single_user->user_id)
                                ->join('vmt_reimbursement_vehicle_types','vmt_reimbursement_vehicle_types.id','=','vmt_employee_reimbursements.vehicle_type_id')
                                ->join('vmt_reimbursements','vmt_reimbursements.id','=','vmt_employee_reimbursements.reimbursement_type_id')
                                ->whereYear('vmt_employee_reimbursements.date',$year)
                                ->whereMonth('vmt_employee_reimbursements.date',$month)
                                ->where('vmt_employee_reimbursements.reimbursement_type_id',$reimbursement_type_id)
                                ->select('vmt_employee_reimbursements.id','vmt_employee_reimbursements.reimbursement_type_id','vmt_employee_reimbursements.date',
                                'vmt_employee_reimbursements.from','vmt_employee_reimbursements.to','user_comments','vmt_reimbursement_vehicle_types.vehicle_type','distance_travelled','total_expenses','status');

            if($status!=null){
                $reimbursement_data = $reimbursement_data->where('vmt_employee_reimbursements.status', $status);
            }
            $reimbursement_data = $reimbursement_data->get();

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

           // dd($single_user_data);

            array_push($json_response, $single_user_data);

        }


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

    public function fetchEmployeeReimbursement($user_id,$year,$month){
        $employee_reimbursement_data_query = VmtEmployeeReimbursements::join('vmt_reimbursements','vmt_reimbursements.id','=','vmt_employee_reimbursements.reimbursement_type_id')
                                                                      ->join('vmt_reimbursement_vehicle_types','vmt_reimbursement_vehicle_types.id','=','vmt_employee_reimbursements.vehicle_type_id')
                                                                      ->where('user_id',$user_id)
                                                                      ->whereYear('date',$year)
                                                                      ->whereMonth('date',$month)
                                                                      ->get(['date','vmt_reimbursements.reimbursement_type','from','to','vmt_reimbursement_vehicle_types.vehicle_type','vmt_reimbursement_vehicle_types.cost_per_km',
                                                                       'distance_travelled','total_expenses','user_comments']);

            return $employee_reimbursement_data_query;
    }
}
