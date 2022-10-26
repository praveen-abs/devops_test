<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\User;
use Carbon\Carbon;

class VmtStaffAttendanceController extends Controller
{
    //

    /*
        Fetch staff attendance From biometric databse
        Storing data in to vmt_staff_attenndance_device table
    */
    public function syncStaffAttendanceFromDeviceDatabase(){

        $recentDeviceData  = VmtStaffAttendanceDevice::orderBy('date', 'DESC')->first();

        if($recentDeviceData){
            $attendanceData  = \DB::connection('attendanceDB')->table('staff_attenndance')->where('date', '>', $recentDeviceData->date)->get();
        }else{
            $attendanceData  = \DB::connection('attendanceDB')->table('staff_attenndance')->get();
        }


        foreach ($attendanceData as $key => $value) {
            // code...
            $this->insertDataFromExternalAttendanceTable($value);
        }

        return array('status' => true, 'msg' => 'success');
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
