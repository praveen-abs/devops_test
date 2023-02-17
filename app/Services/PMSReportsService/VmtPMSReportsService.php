<?php

namespace App\Services\PMSReportsService;

use Illuminate\Support\Collection;
use JSON_AssignedPMSFormDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Exports\PMSFormsExport;
use Maatwebsite\Excel\Facades\Excel;

class VmtPMSReportsService {


    /*
        Exports the given form into Excel format
    */
    public function exportExcel_PMSForm($pms_assignedFormID){
        $pms_assignedFormDetails=$this->getSelectedPMSFormDetails($pms_assignedFormID);
        //dd($pms_assignedFormDetails);
        return Excel::download(new PMSFormsExport($pms_assignedFormDetails), 'PMS Forms.xlsx');
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
            $kpisForm= $kpisForm->where('assignment_period',$assignment_period);
         }
         $kpisForm =  $kpisForm ->get()->toArray();
        //loop thru all forms
        dd( $kpisForm);


        //end loop

        return  $kpisForm;
    }

    /*
        Get the Assigned form details for the given form id.

    */
    private function getSelectedPMSFormDetails($pms_assignedFormID){
            $pms_form_details = VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id',$pms_assignedFormID)
                                                            ->select('kpi','frequency','target','kpi_weightage')
                                                            ->get()->toArray();
            //Create JSON object for each forms
            //$temp = new JSON_AssignedPMSFormDetails($employeeName, $form_data);
            return  $pms_form_details;
    }
}
