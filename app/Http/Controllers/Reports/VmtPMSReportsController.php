<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Services\PMSReportsService\VmtPMSReportsService;
use Maatwebsite\Excel\Facades\Excel;

class VmtPMSReportsController extends Controller
{


    public function showPMSFormsDownloadPage(Request $request){
        $query_configPms= ConfigPms::first(['calendar_type','frequency']);
        $query_years= VmtPMS_KPIFormAssignedModel::groupby('year')->pluck('year');
        return view('reports.vmt_pmsFormsDownloadPage',compact('query_configPms','query_years'));
    }

    /*
        Get assignment_period Based On given Year
    */

    public function fetchAssignmentPeriodForGivenYear(Request $request){

        $query_assignment_period=VmtPMS_KPIFormAssignedModel::where('year',$request->year)->groupby('assignment_period')->pluck('assignment_period');

        return  $query_assignment_period;
    }

    /*
        Download the selected PMS form as excelsheet
    */
    public function downloadPMSForm(Request $request,VmtPMSReportsService $pmsReportsService){
               //For Testing Purpose
               $pms_assignedFormID=1;
               return $pmsReportsService->exportExcel_PMSForm($pms_assignedFormID);

    }

    /*
        Fetch all the assigned PMS forms for the given assignment period.
    */
    public function fetchAllAssignedPMSForms(Request $request, VmtPMSReportsService $pmsReportsService){

        $status = "failure";
        $message = "";
        // $calendar_type = $request->calendar_type;
        // $year = $request->year;
        // $assignment_period = $request->assignment_period;

        //For Testing Purpose
        $year='April - 2022 to March - 2023';
        $assignment_period='q2';
        $calendar_type=null;
       // dd($year);
        //call the service method
        $output = $pmsReportsService->getAllAssignedPMSForms($calendar_type, $year, $assignment_period);

        return $responseJSON = [
            'status' => $status,
            'message' => $message,
            'data' => $output,
        ];

    }
}
