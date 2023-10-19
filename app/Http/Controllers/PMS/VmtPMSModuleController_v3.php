<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use App\Services\VmtPMSModuleService_v3;
use App\Models\ConfigPms;
use App\Models\User;
use App\Models\VmtConfigPmsV3;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtPmsKpiFormAssignedV3;
use App\Models\VmtPmsKpiFormDetailsV3;
use App\Models\VmtPmsKpiFormReviewsV3;
use App\Models\VmtPmsKpiFormV3;
use Exception;
use Illuminate\Http\Request;
use App\Services\VmtPMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;

class VmtPMSModuleController_v3 extends Controller
{
    public function createKpiForm(Request $request, VmtPMSModuleService_v3 $servicesVmtPMSModuleService_v3)
    {
        return $servicesVmtPMSModuleService_v3->createKpiForm($request->form_name,$request->form_details);
    }

    public function publishPmsform(Request $request , VmtPMSModuleService_v3 $servicesVmtPMSModuleService_v3)
    {
        return $servicesVmtPMSModuleService_v3->publishPmsform($request->kpiformid,$request->assignee_id,$request->reviewer_id,$request->assigner_id,$request->calender_type,$request->year,$request->frequency,$request->assignment_period,$request->department,$request->org_time_period_id);
    }

    public function Approverflow(Request $request, VmtPMSModuleService_v3 $servicesVmtPMSModuleService_v3)
    {
            return $servicesVmtPMSModuleService_v3->Approverflow();
    }

    public function ApproveOrReject(Request $request, VmtPMSModuleService_v3 $servicesVmtPMSModuleService_v3)
    {
        return $servicesVmtPMSModuleService_v3->ApproveOrReject($request->record_id,$request->status,$request->reviewer_comments);
    }

    public function selfDashBoardDetails(Request $request, VmtPMSModuleService_v3 $servicesVmtPMSModuleService_v3)
    {
        return $servicesVmtPMSModuleService_v3->selfDashBoardDetails();
    }
}
