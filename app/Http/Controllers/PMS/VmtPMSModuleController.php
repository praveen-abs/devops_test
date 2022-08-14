<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
    New PMS Controller

*/

class VmtPMSModuleController extends Controller
{


    public function showPMSDashboard()
    {

    }

    public function assignKPIForm($assignees_id, $reviewers_id, $kpi_form_id, $author_id)
    {

    }

    public function publishKPIForm()
    {

    }

    public function showKPIReviewPage_Assignee(Request $request)
    {

    }

    public function showKPIReviewPage_Reviewer(Request $request)
    {

    }


    public function calculateOverallReviewRatings()
    {

    }

    public function getKPIFormDetails(){

    }

    /*
        Returns employees for the given reviewer

    */
    public function getEmployeesOfManager($reviewer_id)
    {

    }

    /*
        Returns manager for the given employees

    */
    public function getManagerForEmployees($employee_id)
    {

    }

}
