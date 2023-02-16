<?php

namespace App\Services;

use Illuminate\Support\Collection;
use JSON_AssignedPMSFormDetails;

class VmtPMSReportsService {


    /*
        Exports the given form into Excel format
    */
    public function exportExcel_PMSForm($pms_assignedFormID){

    }


    /*
        Fetch all the assigned PMS forms for the given assignment period.

        return JSON structure
    */
    public function getAllAssignedPMSForms($calendar_type, $year, $assignment_period){

        $output = null;

        //loop thru all forms


            //Create JSON object for each forms
            $temp = new JSON_AssignedPMSFormDetails($employeeName, $form_data);

        //end loop

        return $output;
    }
}
