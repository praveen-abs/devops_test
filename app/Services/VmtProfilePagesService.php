<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeDetails;
use App\Models\VmtEmployeeOfficeDetails;


class VmtProfilePagesService{

    /*

        Get employee details related to profile pages.

    */

    public function getEmployeeProfileDetails($user_id)
    {

        $response = User::leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->leftjoin('vmt_employee_family_details', 'vmt_employee_family_details.user_id', '=', 'users.id')
            ->leftjoin('vmt_employee_emergency_contact_details', 'vmt_employee_emergency_contact_details.user_id', '=', 'users.id')
            ->where('users.id',$user_id)
            ->get();
        
        return $response;
    }

}
