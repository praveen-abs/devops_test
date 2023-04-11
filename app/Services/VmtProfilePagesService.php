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

        $response = User::with([ 'getEmployeeDetails',
                                 'getEmployeeOfficeDetails',
                                 'getFamilyDetails',
                                 'getEmergencyContactsDetails']
                    )
                    ->where('users.id',$user_id)
                    ->first();

        //Remove ID from user table
        unset($response['id']);


        return $response;
    }

}
