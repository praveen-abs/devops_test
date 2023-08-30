<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeAttendanceV2;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\VmtWorkShifts;

class VmtAttendanceControllerV2 extends Controller
{
    //
    public function testing(Request $request)
    {
        $user_code = 'DM019';
        $user_id = '192';
        $work_shift_id = VmtWorkShifts::where('user_id',$user_id)->get();
        dd( $work_shift_id);
        try {
            echo 'working';
        } catch (Exception $e) {
            Log::info($e);
        }
    }
}
