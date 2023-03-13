<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeAttendanceRegularization;
use App\Models\VmtEmployeeOfficeDetails;


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
}
