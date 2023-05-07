<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\PMSReportsService\VmtPMSFormsMgmtService;
use App\Exports\PMSFormsExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel as ExcelExcel;
class VmtPMSFormsMgmtController extends Controller
{

    public function getAllPMSFormTemplates(Request $request,VmtPMSFormsMgmtService $PMSFormsMgmtService){


        $response = $PMSFormsMgmtService->getAllPMSFormTemplates();
        return $response;

    }
    public function getEmployeePMSFormTemplate_AsExcel(Request $request,VmtPMSFormsMgmtService $PMSFormsMgmtService){
        $pms_form_id=40;

        //$response = $PMSFormsMgmtService->getPMSFormforGivenPMSFormID( $request->pms_form_id);
        $response = $PMSFormsMgmtService->getPMSFormforGivenPMSFormID( $pms_form_id);
        $form_name = $response['form_name'];
        $headings = $response['columns'];
        $form  = $response['pms_form_details'];
        $end_column = num2alpha(count($headings)-1);
        return Excel::download(new PMSFormsExport( $form_name,$headings,$form,$end_column),$form_name, ExcelExcel::XLSX);

    }
    public function getAssignedPMSFormTemplates(Request $request,VmtPMSFormsMgmtService $PMSFormsMgmtService){

         $user_id=auth()->user()->id;
        $response = $PMSFormsMgmtService->getAssignedPMSFormTemplates($user_id);
        return $response;

    }

    public function showPMSFormsMgmtPage_SelfView(Request $request){
        return view('pms.vmt_pms_forms_mgmt_self_view');
    }


    public function showPMSFormsMgmtPage_TeamView(Request $request){
        return view('pms.vmt_pms_forms_mgmt_team_view');
    }

}
