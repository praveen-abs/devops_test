<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\vmtHolidays;
use App\Models\VmtEmployeeAttendance;


class VmtAttendanceService{


    public function fetchAttendanceRegularizationData($manager_id = null)
    {
        $allEmployees_lateComing = '';

        $map_allEmployees = User::all(['id', 'name'])->keyBy('id');

        $allEmployees_lateComing = null;

        //If manager ID not set, then show all employees
        if(empty($manager_id))
        {
            //If manager ID set, then show only the team level employees

            $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::all();

        }
        else
        {

            //Get all the employees ID for the given manager_id
            $manager_emp_code = User::find($manager_id)->user_code;

            $employees_id = VmtEmployeeOfficeDetails::where('l1_manager_code', $manager_emp_code)->pluck('user_id');

            //dd($employees_id);

            $allEmployees_lateComing = VmtEmployeeAttendanceRegularization::whereIn('user_id',$employees_id)->get();
            //dd($allEmployees_lateComing);

        }

        //dd($map_allEmployees->toArray());
        //dd($allEmployees_lateComing->toArray());

        foreach ($allEmployees_lateComing as $singleItem) {

            //check whether user_id from regularization table exists in USERS table
            if (array_key_exists($singleItem->user_id, $map_allEmployees->toArray())) {

                $singleItem->employee_name = $map_allEmployees[$singleItem->user_id]["name"];
                $singleItem->employee_avatar = getEmployeeAvatarOrShortName($singleItem->user_id);

                //If reviewer_id = 0, then its not yet reviewed
                if ($singleItem->reviewer_id != 0) {
                    $singleItem->reviewer_name = $map_allEmployees[$singleItem->reviewer_id]["name"];
                    $singleItem->reviewer_avatar = getEmployeeAvatarOrShortName($singleItem->reviewer_id);
                }
            }
            else
            {
              //  dd("Missing User ID : " . $singleItem->user_id);
            }
        }

       // dd($allEmployees_lateComing);
        return $allEmployees_lateComing;

    }

    /*
        Get the employee's compensatory work days (Worked on holidays)
        This wont check whether these comp days are used by emps
    */
    private function fetchEmployeeCompensatoryOffDays($user_id){

        //Final array response
        $response_employee_comp_dates = array();

        //Get list of holidays
        $query_holidays = vmtHolidays::selectRaw('DATE(holiday_date) as holiday_date')->pluck('holiday_date');

            //Remove the year part
            $query_holidays = $query_holidays->map(function ($item,$key) {
                return substr($item,5);
            });

        //Get list of attendance days
        $query_emp_attendanceDetails = VmtEmployeeAttendance::where('user_id',$user_id)->get(['id','date'])->keyBy('id');
        dd($query_emp_attendanceDetails->toArray());

            $yearTrimmed_query_emp_attendanceDetails = $query_emp_attendanceDetails->map(function ($item,$key) {
                return substr($item,5);
            });


        //Find the matching dates using array_intersect()
        $matching_comp_dates = array_intersect( $yearTrimmed_query_emp_attendanceDetails->toArray(), $query_holidays->toArray());

            //get the keys and fetch the dates from 'query_emp_attendanceDetails' array
            $keys_matching_comp_dates =  array_keys($matching_comp_dates);


        //get the emp attendance dates based on matched array keys
        foreach($keys_matching_comp_dates as $singleKey){
            array_push($response_employee_comp_dates,  $query_emp_attendanceDetails[$singleKey]);
        }

        return $response_employee_comp_dates;

    }

    private function isCompWorkDaysAlreadyUsed($employee_attendance_id){

    }

    /*
        Returns the unused comp off days for the given emp
    */
    public function fetchUnusedCompensatoryOffDays($user_id){

        //Get all the comp work days
        $emp_comp_off_days = $this->fetchEmployeeCompensatoryOffDays($user_id);

        //Check whether its used or not
        dd($emp_comp_off_days);

    }

}
