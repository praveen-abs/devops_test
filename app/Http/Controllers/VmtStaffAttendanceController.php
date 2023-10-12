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
    public function syncStaffAttendanceFromDeviceDatabase(){


        //For ESS only:  Pull the Dunamis contract data from 'u417351686_att_dunamis'
        $current_client_list = VmtClientMaster::where('client_code','<>','')->pluck('client_code')->toArray();

        try{
            $array_result = array();
            $recentDeviceData = null;

            //For ESS :: Fetch Dunamis Contract using "attendanceDB_DMC" DB connection
            if(in_array('DMC', $current_client_list)){

                //Fetch the last attendance details of dunamis in local db
                $recentDeviceData  = VmtStaffAttendanceDevice::where('att_server','dunamis')
                                        ->orderBy('date', 'DESC')->first();
                $attendanceData = null;

                if($recentDeviceData){
                    $attendanceData  = \DB::connection('attendanceDB_DMC')->table('staff_attenndance')
                                        ->where('att_server', 'dunamis')
                                        ->where('date', '>', $recentDeviceData->date)
                                        ->get();
                }else{
                    $attendanceData  = \DB::connection('attendanceDB_DMC')->table('staff_attenndance')->get();
                }


                $data_count = 0;

               // dd($attendanceData);
                foreach ($attendanceData as $key => $value) {
                    $this->insertDataFromExternalAttendanceTable($value);
                    $data_count++;
                }
                $start_date = $recentDeviceData->date ?? "-";
                array_push($array_result, "Client Name : ".$recentDeviceData->att_server ." , Start Date : ".$start_date." , Data Count : ".$data_count);

            }



            //For all other sites including ESS - ABS
            $recentDeviceData  = VmtStaffAttendanceDevice::where('att_server','<>','dunamis')
                                    ->orderBy('date', 'DESC')->first();

            $attendanceData = null;

            if($recentDeviceData){
                $attendanceData  = \DB::connection('attendanceDB')->table('staff_attenndance')->where('date', '>', $recentDeviceData->date)->get();
            }else{
                $attendanceData  = \DB::connection('attendanceDB')->table('staff_attenndance')->get();
            }

            $data_count = 0;

            foreach ($attendanceData as $key => $value) {
                $this->insertDataFromExternalAttendanceTable($value);
                $data_count++;
            }

            //Store the result
            $start_date = $recentDeviceData->date ?? "-";

            array_push($array_result, "Client Name : ".$recentDeviceData->att_server ." , Start Date : ".$start_date." , Data Count : ".$data_count);

            return [
                'status' => 'success',
                'message' => 'Biometric Attendance data import success',
                'data' => $array_result
            ];
        }
        catch(\Exception $e){
            return [
                "status" => "failure",
                "message" => "Error [ syncStaffAttendanceFromDeviceDatabase() ] : ".$e->getMessage(),
                "data" => $e,

            ];
        }
    }

    // inserting device data in to vmt_staff_attenndance_device table
    protected function insertDataFromExternalAttendanceTable($data){
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


}
