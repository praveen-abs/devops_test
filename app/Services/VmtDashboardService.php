<?php

namespace App\Services;
use Illuminate\Support\Facades\File;
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

    private function checkingGivenDateHolidayOrNot($year,$month,$i){

          $holiday_query=vmtHolidays::whereMonth('holiday_date',$month)
                        ->whereDay('holiday_date',$i)->get();
        if($holiday_query->isEmpty()){
            if(Carbon::parse($year.'-'.$month.'-'.$i)->format('l')=='Sunday'){
                 return true;
            }else{
                return false;
            }
        }else{
            return true;
        }


    }

    public function getMainDashboardData($user_code , VmtAttendanceService $serviceVmtAttendanceService){

        $response = array();
        $user_id = User::where('user_code',$user_code)->first()->id;

        $employee_details_query = User::where('user_code',$user_code)->get(['id','name','avatar'])->first();
        $employee_designation = VmtEmployeeOfficeDetails::where('user_id',$employee_details_query->id)->first()->designation;


        //If AVATAR filename present in DB column....
        $emp_avatar = $employee_details_query->avatar;

        if(!empty($emp_avatar))
        {
            //converting profile pic into base64
            $avatar_path = public_path("assets/images/".$emp_avatar);

            if(File::exists( $avatar_path)){
                $avatar_type = File::mimeType($avatar_path);
                $profile_pic = "data:".$avatar_type.";base64,".base64_encode(file_get_contents($avatar_path));
            }
        }
        else
        {
            $profile_pic='';
        }

        //Get the current year and month
        $year = date("Y");
        $month = str_replace( '0','', date("m"));
        $day = date('d');
        $present_count=0;
        $absent_count=0;
        $leave_count=0;

        //Get monthly attendance report data
        $attendance_DailyReport_PerMonth = $serviceVmtAttendanceService->fetchAttendanceDailyReport_PerMonth($user_code, $year, $month);

        for($i=01;$i<=$day;$i++)
        {
            $month = date('m');
            if($i<10){
                $i='0'.$i;
            }
            $date=$year.'-'.$month.'-'.$i;
            if($attendance_DailyReport_PerMonth[$date]['checkin_time'] || $attendance_DailyReport_PerMonth[$date]['checkout_time'] ){
                $present_count++;
            }else if($attendance_DailyReport_PerMonth[$date]['isAbsent']){
               if($attendance_DailyReport_PerMonth[$date]['absent_status']=='Approved'){
                  $leave_count++;
               }else{
                   $is_sunday_or_holiday = $this->checkingGivenDateHolidayOrNot($year,$month,$i);
                   if(!$is_sunday_or_holiday){
                    $absent_count++;
                   }
               }
            }

        }

        $response['name']=$employee_details_query->name;
        $response['designation']=$employee_designation;

        //Get the employee profile pic
        $response["profile_pic"] = $profile_pic; //BASE 64


         //Get the Present, Leave, Absent data from above JSON response
        $response["attendance"]["present_count"] = $present_count;
        $response["attendance"]["absent_count"] = $absent_count;
        $response["attendance"]["leave_count"]= $leave_count;

        //Get current day attendance checkin/checkout status
        $current_day_attendance = VmtEmployeeAttendance::where('user_id',$user_id)
                                ->join('vmt_work_shifts','vmt_work_shifts.id','=','vmt_employee_attendance.vmt_employee_workshift_id')
                                ->where('date',date("Y-m-d"))
                                ->first(['vmt_work_shifts.shift_type','vmt_work_shifts.shift_start_time','vmt_work_shifts.shift_end_time',
                                        'work_mode','checkin_time','checkout_time','attendance_mode_checkin','attendance_mode_checkout',
                                        'selfie_checkin','selfie_checkout']);

       // dd($current_day_attendance);

        // "id" => 1
        // "user_id" => "182"
        // "vmt_employee_workshift_id" => 0
        // "date" => "2023-04-15"
        // "checkin_time" => "09:49:24"
        // "checkout_time" => "14:49:26"
        // "shift_type" => null
        // "leave_type_id" => null
        // "created_at" => "2023-03-29 20:19:24"
        // "updated_at" => "2023-03-29 20:19:26"
        // "work_mode" => "office"
        // "leave_comments" => null
        // "selfie_checkin" => null
        // "selfie_checkout" => null
        // "checkin_comments" => null
        // "checkout_comments" => null
        // "attendance_mode_checkin" => "web"
        // "attendance_mode_checkout" => "web"
        $response["attendance"]["current_day_attendance_status"] = $current_day_attendance;




        return $response;
    }

}


