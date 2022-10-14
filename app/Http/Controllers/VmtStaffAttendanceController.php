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

    /**
     * dayWiseStaffAttendance 
     * table: users, vmt_staff_attenndance_device
     * input param: date
     *  
    */
    protected function dayWiseStaffAttendance(Request $request){
        $date = $request->has('date') ? $request->date : Carbon::now()->format('Y-m-d'); 
       
        $attendanceJoin = \DB::table('vmt_staff_attenndance_device')
                   ->select('user_Id',\DB::raw('MAX(date) as check_out_time'), \DB::raw('MIN(date) as check_in_time'))
                   ->whereDate('date', $date)
                   ->groupBy('user_Id');
 
        $users = \DB::table('users')->select('id', 'name', 'user_code', 'check_in_time','check_out_time')
            ->leftJoinSub($attendanceJoin, 'vmt_staff_attenndance_device', function ($join) {
                $join->on('users.user_code', '=', 'vmt_staff_attenndance_device.user_Id');
            })->get();
        return view('vmt_daily_staff_attendance', compact('users'));
    }
}
