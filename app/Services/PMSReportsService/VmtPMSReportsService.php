<?php

namespace App\Services;

use Illuminate\Support\Collection;
use JSON_AssignedPMSFormDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;

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

        $kpisForm = null;

        $kpisForm = VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform','vmt_pms_kpiform.id','=','vmt_pms_kpiform_id')
                                               ->join('users','users.id','=','assignee_id')
                                               ->where('year',$year)
                                               ->select('user_code','name','vmt_pms_kpiform_id');

         if($assignment_period!="All"){
            $kpisForm= $kpisForm->where('frequency',$assignment_period);
         }
         $kpisForm =  $kpisForm ->get();
        //loop thru all forms
        dd( $kpisForm);

            //Create JSON object for each forms
            $temp = new JSON_AssignedPMSFormDetails($employeeName, $form_data);

        //end loop

        return  $kpisForm;
    }
}
