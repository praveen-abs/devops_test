<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\vmtHolidays;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeCompensatoryLeave;
use App\Models\VmtLeaves;
use App\Models\VmtWorkShifts;
use App\Models\VmtGeneralInfo;

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use \Datetime;

use App\Services\VmtAttendanceService;


class VmtDashboardService{

    public function getMainDashboardData($user_code , VmtAttendanceService $serviceVmtAttendanceService){

        $response = array();

        //Get the current year and month
        $year = date("y");
        $month = date("m");

        //Get monthly attendance report data
        $attendance_DailyReport_PerMonth = $serviceVmtAttendanceService->fetchAttendanceDailyReport_PerMonth($user_code, $year, $month);


         //Get the Present, Leave, Absent data from above JSON response
         $response["attendance"]["present_count"] = "-";
         $response["attendance"]["absent_count"] = "-";
         $response["attendance"]["leave_count"]= "-";

        //Get the employee profile pic
        $response["profile_pic"] = ""; //BASE 64


        return $response;
    }

}


