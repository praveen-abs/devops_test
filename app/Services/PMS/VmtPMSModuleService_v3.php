<?php

namespace App\Services;


class VmtPMSModuleService_v3 {


    public function getPMSConfig()
    {
    }


    //Todo : Need to pass all the params
    public function savePMSConfig()
    {
    }


    public function getPMSRatingCardDetails()
    {

    }

    //Todo : Need to pass all the params
    public function savePMSRatingCardDetails()
    {

    }

    public function getDashboardCounters_OrgAppraisal(){

    }

    public function getDashboardCounters_TeamAppraisal(){

    }

    public function getDashboardCounters_SelfAppraisal(){

    }

    /*
        Gets the list of assigned PMS forms based on the given parameters.

        1. Org appraisal  : $assignment_period, $year, $client_id, $review_status
        2. Team appraisal : $assignment_period, $year, $client_id, $review_status, $team_manager_userid
        3. Self appraisal : $assignment_period, $year, $client_id, $review_status, $self_userid

    */
    private function getAssignedPMSFormsList($assignment_period, $year, $client_id, $review_status, $team_manager_userid = null, $self_userid = null){

    }

    /*
        For self-appraisal
    */
    public function getAssignedPMSFormsList_ForSelfAppraisal($assignment_period, $year, $client_id, $review_status, $self_userid){
        //Write Validator
        //call $this->getAssignedPMSFormsList()
    }

    /*
        For team-appraisal
    */
    public function getAssignedPMSFormsList_ForTeamAppraisal($assignment_period, $year, $client_id, $review_status, $team_manager_userid){
        //Write Validator
        //call $this->getAssignedPMSFormsList()

    }

    /*
        For org-appraisal
    */
    public function getAssignedPMSFormsList_ForOrgAppraisal($assignment_period, $year, $client_id, $review_status){
        //Write Validator
        //call $this->getAssignedPMSFormsList()

    }


    /*
        Returns the reviewed form details for a given Assignee user_id such as,
            Goals details
            Assignee review details, Assigners review details
            Review ratings, if completed
    */
    public function getReviewedPMSFormDetails($assignment_period, $year, $assignee_userid){

    }

    /*
        Returns the overall ratings for a given assignee

    */
    public function getAssigneeOverallRatings($year, $assignee_userid){

    }

    /*
        Returns the specific PMS form rating for a given assignee

        Use $assigned_pms_formid, if assigned form id is known
    */
    public function getAssigneePMSFormRating($assignment_period, $year, $assignee_userid, $assigned_pms_formid = null){

    }

    /*
        Get the PMS review timeline for a given assignee

        Use $assigned_pms_formid, if assigned form id is known
    */
    public function getPMSReviewTimeline($assignment_period, $year, $assignee_userid, $assigned_pms_formid = null){

    }

    /*
        Download a PMS form in excel format.
    */
    public function downloadPMSForms_AsExcel($assignment_period, $year, $pms_formid = null){

    }

    /*
        Upload a PMS form in excel format.

        //Todo : Need to decide the params. Also use PMS Config for validating the excelsheet columns.
    */
    public function validatePMSExcelForm(){

    }


}
