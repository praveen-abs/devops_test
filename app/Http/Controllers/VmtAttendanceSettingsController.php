<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeWorkShifts;

class VmtAttendanceSettingsController extends Controller
{
    //

    public function showAttendanceSettingsPage(Request $request){
        return view('configurations.attendance_settings');
    }

    public function assignEmployeesWorkShift(Request $request){

        //VmtEmployeeWorkShifts
    }
}
