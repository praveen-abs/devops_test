<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\User;
use App\Models\VmtClientMaster;
use Carbon\Carbon;

class VmtStaffAttendanceController extends Controller
{
    //

    /*
        Fetch staff attendance From biometric databse
        Storing data in to vmt_staff_attenndance_device table
    */
    public function syncStaffAttendanceFromDeviceDatabase(Request $request, string $can_debug = null){

        $current_client_list = VmtClientMaster::where('client_code','<>','')->get(['client_code','client_name','client_fullname'])->keyBy('client_code')->toArray();
        //dd($current_client_list);
        try{
            $array_result = array();

            foreach($current_client_list as $single_client)
            {
                //check if the current client is valid
                $client_db_details = $this->getClientDBDetails($single_client['client_code']);

                if(!empty($client_db_details))
                {
                   //dd($client_db_details);

                   $array_result[] = $this->pullDataFromAttendanceDB( client_db_connection_name: $client_db_details["client_db_connection_name"], att_client_name : $client_db_details["att_client_name"]);
                }
                else
                {
                    $array_result[] = 'Client DB Details not found for the given Client Code : '.$single_client['client_code'];
                }

            }

            return [
                'status' => 'success',
                'message' => 'Biometric Attendance data import success',
                'data' => $array_result
            ];
        }
        catch(\Exception $e){
            $client_list =  empty($current_client_list) ? 'NULL' : json_encode($current_client_list);
            $temp = [
                "status" => "failure",
                "message" => "Error [ syncStaffAttendanceFromDeviceDatabase() ] : Error while fetching biometric attendance data for client list :: ".$client_list,
                "data" => $array_result,
                "error" =>$e->getMessage().' | Line : '.$e->getLine(),
                "error_verbose" => (!empty($can_debug) && $can_debug  == "1") ? $e->getTrace() : '** Debug Mode is disabled **',

            ];

            return $temp;
        }
    }

    private function pullDataFromAttendanceDB($client_db_connection_name, $att_client_name){

        //Fetch the last attendance details of dunamis in local db
        $recentDeviceData  = VmtStaffAttendanceDevice::where('att_server',$att_client_name)
                                ->orderBy('date', 'DESC')->first();

        $attendanceData = null;

        if($recentDeviceData){
            $attendanceData  = \DB::connection($client_db_connection_name)->table('staff_attenndance')
                                ->where('att_server', $att_client_name)
                                ->where('date', '>', $recentDeviceData->date)
                                ->get();
        }else{
            $attendanceData  = \DB::connection($client_db_connection_name)->table('staff_attenndance')->get();
        }

        $response =
        $data_count = 0;

        // dd($attendanceData);
        foreach ($attendanceData as $key => $value) {
            $this->insertDataFromExternalAttendanceTable($value);
            $data_count++;
        }

        return [
            "Client Name" =>$recentDeviceData->att_server ,
            "Start Date" => $recentDeviceData->date ?? "-",
            "Data Count" => $data_count
        ];

    }


    /*

        Should add the db connection name in database.php before running this.
    */
    private function getClientDBDetails($client_code){

        if(empty($client_code)){
            return null;
        }

        switch($client_code){
            case "DM":
                return [
                  "client_db_connection_name" => "attendanceDB_Dunamis" ,
                  "att_client_name" => "dunamis"
                ];
            case "DMC":
                return [
                  "client_db_connection_name" => "attendanceDB_Dunamis" ,
                  "att_client_name" => "dunamis"
                ];
            case "ABS":
                return [
                  "client_db_connection_name" => "attendanceDB" ,
                  "att_client_name" => "ess"
                ];
            default:
                return null;
        }

    }


    // inserting device data in to vmt_staff_attenndance_device table
    protected function insertDataFromExternalAttendanceTable($data){

        try
        {
            $staffAttendace     = new  VmtStaffAttendanceDevice;
            $staffAttendace->id = $data->id;
            $staffAttendace->att_server = $data->att_server;
            $staffAttendace->location   = $data->location;
            $staffAttendace->table_name = $data->table_name;
            $staffAttendace->device_log_Id = $data->device_log_Id;
            $staffAttendace->device_Id     = $data->device_Id;
            $staffAttendace->user_Id       = $data->user_Id;
            $staffAttendace->direction     = $data->direction;
            $staffAttendace->verification_mode  = $data->verification_mode;
            $staffAttendace->date = $data->date;
            $staffAttendace->timezone  = $data->timezone;
            $staffAttendace->created_on  = $data->created_on;
            $staffAttendace->save();
        }
        catch(\Exception $e){
            return [
                "status" => "failure",
                "message" => "Error while saving data",
                "error" => $e->getMessage().' | Line : '.$e->getLine(),
                "error_verbose" => app()->hasDebugModeEnabled() ? $e->getTrace() : '** Debug Mode is disabled **',
            ];
        }
    }


}
