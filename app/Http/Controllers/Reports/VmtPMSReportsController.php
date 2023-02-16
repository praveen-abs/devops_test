<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Services\VmtPMSReportsService;
use Maatwebsite\Excel\Facades\Excel;

class VmtPMSReportsController extends Controller
{


    public function showPMSFormsDownloadPage(Request $request){
        return view('reports.vmt_pmsFormsDownloadPage');
    }

    /*
        Download the selected PMS form as excelsheet
    */
    public function downloadPMSForm(Request $request){

    }

    /*
        Fetch all the assigned PMS forms for the given assignment period.
    */
    public function fetchAllAssignedPMSForms(Request $request, VmtPMSReportsService $pmsReportsService){

        $status = "failure";
        $message = "";

        $calendar_type = $request->calendar_type;
        $year = $request->year;
        $assignment_period = $request->assignment_period;

        //call the service method
        $output = $pmsReportsService->getAllAssignedPMSForms($calendar_type, $year, $assignment_period);

        return $responseJSON = [
            'status' => $status,
            'message' => $message,
            'data' => $output,
        ];

    }
}
