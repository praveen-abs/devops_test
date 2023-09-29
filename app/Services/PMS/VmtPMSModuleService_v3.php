<?php

namespace App\Services;

use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormModel;

class VmtPMSModuleService_v3
{


    public function getPMSConfig()
    {
    }


    //Todo : Need to pass all the params
    public function savePMSConfig()
    {
    }

    //Todo : Need to pass all the params
    public function saveKPIForm($data)
    {

        // dd($data);
        $config = ConfigPms::first();
        //  dd($config->selected_columns);
        $kpiTable  = new VmtPMS_KPIFormModel();

        $kpiTable->available_columns   =    $config->selected_columns;
        $kpiTable->author_id       =    $data['user_id'];
        $kpiTable->form_name     =    $data['name'];
        $kpiTable->save();
        $KpiLAST = $kpiTable->id;
        // $totRows  = count($data->form_details);

        $form_details = $data['form_details'];
        foreach ($form_details as $key => $item) {
            $kpiRow = new VmtPMS_KPIFormDetailsModel();
            $kpiRow->vmt_pms_kpiform_id   =    $KpiLAST;
            $kpiRow->dimension   =    isset($item['dimension']) && isset($item['dimension']) ? $item['dimension'] : '';
            $kpiRow->kpi         =    isset($item['kpi']) ? $item['kpi'] : '';
            $kpiRow->operational_definition   = isset($item['objectives']) ? $item['objectives'] : '';
            $kpiRow->measure     =    isset($item['measure'])  ? $item['measure'] : '';
            $kpiRow->frequency   =    isset($item['frequency']) ? $item['frequency'] : '';
            $kpiRow->target      =    isset($item['target'])  ? $item['target'] : '';
            $kpiRow->stretch_target  =    isset($item['stretchTarget']) ? $item['stretchTarget'] : '';
            $kpiRow->source          =    isset($item['source'])  ? $item['source'] : '';
            $kpiRow->kpi_weightage   =    isset($item['kpiWeightage'])  ? $item['kpiWeightage'] : '';
            $kpiRow->save();
        }

        return "Question Created Successfully";
    }

    public function getKPIFormAsDropdown($author_id)
    {
        // dd($author_id);
        $kpiTable  = VmtPMS_KPIFormModel::where('author_id',$author_id)->get();
        $response =array();
        $id = 1;
        foreach ($kpiTable as $key => $item) {
            $form['id'] = $id++;
            $form['form_name'] = $item['form_name'];
            array_push($response,$form);
        }

        return $response;

    }

    public function getPMSRatingCardDetails()
    {
    }

    //Todo : Need to pass all the params
    public function savePMSRatingCardDetails()
    {
    }

    public function getDashboardCounters_OrgAppraisal()
    {
    }

    public function getDashboardCounters_TeamAppraisal()
    {
    }

    public function getDashboardCounters_SelfAppraisal()
    {
    }

    /*
        Gets the list of assigned PMS forms based on the given parameters.

        1. Org appraisal  : $assignment_period, $year, $client_id, $review_status
        2. Team appraisal : $assignment_period, $year, $client_id, $review_status, $team_manager_userid
        3. Self appraisal : $assignment_period, $year, $client_id, $review_status, $self_userid

    */
    private function getAssignedPMSFormsList($assignment_period, $year, $client_id, $review_status, $team_manager_userid = null, $self_userid = null)
    {
    }

    /*
        For self-appraisal
    */
    public function getAssignedPMSFormsList_ForSelfAppraisal($assignment_period, $year, $client_id, $review_status, $self_userid)
    {
        //Write Validator
        //call $this->getAssignedPMSFormsList()
    }

    /*
        For team-appraisal
    */
    public function getAssignedPMSFormsList_ForTeamAppraisal($assignment_period, $year, $client_id, $review_status, $team_manager_userid)
    {
        //Write Validator
        //call $this->getAssignedPMSFormsList()

    }

    /*
        For org-appraisal
    */
    public function getAssignedPMSFormsList_ForOrgAppraisal($assignment_period, $year, $client_id, $review_status)
    {
        //Write Validator
        //call $this->getAssignedPMSFormsList()

    }


    /*
        Returns the reviewed form details for a given Assignee user_id such as,
            Goals details
            Assignee review details, Assigners review details
            Review ratings, if completed
    */
    public function getReviewedPMSFormDetails($assignment_period, $year, $assignee_userid)
    {
    }

    /*
        Returns the overall ratings for a given assignee

    */
    public function getAssigneeOverallRatings($year, $assignee_userid)
    {
    }

    /*
        Returns the specific PMS form rating for a given assignee

        Use $assigned_pms_formid, if assigned form id is known
    */
    public function getAssigneePMSFormRating($assignment_period, $year, $assignee_userid, $assigned_pms_formid = null)
    {
    }

    /*
        Get the PMS review timeline for a given assignee

        Use $assigned_pms_formid, if assigned form id is known
    */
    public function getPMSReviewTimeline($assignment_period, $year, $assignee_userid, $assigned_pms_formid = null)
    {
    }

    /*
        Download a PMS form in excel format.
    */
    public function downloadPMSForms_AsExcel($assignment_period, $year, $pms_formid = null)
    {
    }

    /*
        Upload a PMS form in excel format.

        //Todo : Need to decide the params. Also use PMS Config for validating the excelsheet columns.
    */
    public function validatePMSExcelForm()
    {
    }
}
