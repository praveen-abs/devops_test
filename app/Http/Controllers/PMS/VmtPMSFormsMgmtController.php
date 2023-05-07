<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VmtPMSFormsMgmtService;

class VmtPMSFormsMgmtController extends Controller
{

    public function getAllPMSFormTemplates(Request $request,VmtPMSFormsMgmtService $PMSFormsMgmtService){


        $response = $PMSFormsMgmtService->getAllPMSFormTemplates();
        return $response;

    }
    public function getEmployeePMSFormTemplate_AsExcel(Request $request,VmtPMSFormsMgmtService $PMSFormsMgmtService){


        $response = $PMSFormsMgmtService->getEmployeePMSFormTemplate_AsExcel($request->user_code, $request->pms_form_id);
        return $response;

    }
    public function getAssignedPMSFormTemplates(Request $request,VmtPMSFormsMgmtService $PMSFormsMgmtService){


        return $PMSFormsMgmtService->getAssignedPMSFormTemplates($request->user_code);

    }

    public function showPMSFormsMgmtPage_SelfView(Request $request){
        return view('pms.vmt_pms_forms_mgmt_self_view');
    }


    public function showPMSFormsMgmtPage_TeamView(Request $request){
        return view('pms.vmt_pms_forms_mgmt_team_view');
    }

}
