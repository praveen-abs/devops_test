<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\vmtHolidays;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeCompensatoryLeave;


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
        //Get list of holidays
        $query_holidays = vmtHolidays::selectRaw('DATE(holiday_date) as holiday_date')->pluck('holiday_date');

            //Remove the year part
            $query_holidays = $query_holidays->map(function ($item,$key) {
                return substr($item,5);
            });

        $array_query_holidays = $query_holidays->toArray();

        //Get list of attendance days
        $query_emp_attendanceDetails = VmtEmployeeAttendance::where('user_id',$user_id)->get(['id','date'])->keyBy('date')->toArray();
            //dd($query_emp_attendanceDetails);

            //Get only the keys
            $dates_emp_attendanceDetails = array_keys($query_emp_attendanceDetails);
            //dd($dates_emp_attendanceDetails);


            foreach($dates_emp_attendanceDetails as $singleAttendanceDate){

                $trimmed_date = substr($singleAttendanceDate, 5);

                //dd($trimmed_date);

                //Check whether it is in Holiday or not
                if(!in_array($trimmed_date, $array_query_holidays))
                {
                    //If not in holiday, then remove from array
                    unset($query_emp_attendanceDetails[$singleAttendanceDate]);
                }

            }

        //dd($query_emp_attendanceDetails);

        return $query_emp_attendanceDetails;

    }

    /*
        Returns the unused comp off days for the given emp

        Returns a map.

        Eg : {
               "247"                    :  "2023-08-15"
               //("employee_attendance_id" :  "employee_attendance_date")
             }

    */
    public function fetchUnusedCompensatoryOffDays($user_id){

        $final_emp_unused_compdays = array();

        //Get all the comp work days
        $emp_comp_off_days = $this->fetchEmployeeCompensatoryOffDays($user_id);

        //dd($emp_comp_off_days);

        //Check whether its used or not ( Leave request should be Rejected or Not applied)
        //// Create a new array with (k,v)=(attendance_id, [attendance_id, attendance_date])

        $map_comp_off_days = array();

        foreach($emp_comp_off_days as $singleDay){
            //$map_comp_off_days[ $singleDay["id"] ] = $singleDay["date"];
            // array_push($map_comp_off_days, array("emp_attendance_id" => $singleDay["id"],
            //                                      "emp_attendance_date" => $singleDay["date"]));
            $map_comp_off_days[ $singleDay["id"] ] = array("emp_attendance_id" => $singleDay["id"],
                                                 "emp_attendance_date" => $singleDay["date"]);
            //dd($singleDay["id"]);
        }


        //Check whether the comp days exists in this table
        $query_emp_comp_leaves = VmtEmployeeCompensatoryLeave::whereIn('employee_attendance_id',array_keys($map_comp_off_days))->get(['employee_leave_id','employee_attendance_id']);

       // $i = 0;
        //Check whether its leave request is Rejected
        foreach($query_emp_comp_leaves as $singleEmpCompLeave)
        {
            //dd($singleEmpCompLeave);
            $emp_leave = VmtEmployeeLeaves::find($singleEmpCompLeave->employee_leave_id);
            if($emp_leave->exists())
            {
                //dd($emp_leave->status);
                //check the leave status
                if($emp_leave->status != "Rejected")
                {
                    //Remove from $map_comp_off_days
                    unset($map_comp_off_days[$singleEmpCompLeave->employee_attendance_id]);
                }
            }
            else
            {
                dd("ERROR : employee_leave_id ".$singleEmpCompLeave." doesnt exist in vmt_employee_leave table.");
            }


        }

        //Remove the keys and send only the values.
        return array_values($map_comp_off_days);
    }

    // public function fetchEmployeeLeaveBalance(){

    // }


}
