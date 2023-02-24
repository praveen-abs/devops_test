<?php

namespace App\Http\Controllers\Onboarding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\State;
use App\Models\Department;
use App\Models\VmtBloodGroup;
use App\Models\Bank;


class VmtEmployeeOnboardingController extends Controller
{

    public function showNormalOnboardingPage(Request $request)
    {

        return view('onboarding.vmt_normal_onboarding_v2');
    }

    /*
        Fetches all the required data for the normal onboarding page.
        These data are shown in onboarding form. Only standard selection data are sent
    */
    public function fetchNormalOnboardingPageData(Request $request){
        $is_employeeCode_editable = fetchMasterConfigValue("is_employee_code_editable_in_normal_onboarding");

        $db_countries = Countries::all();
        $employee_office_details = VmtEmployeeOfficeDetails::all();
        $db_departments = Department::all();
        $db_indianStates = State::where('country_code','IN')->get(['id','state_name']);
        $db_bloodGroups = VmtBloodGroup::all();

        $db_banks = Bank::all();

        dd("un-implemented");
    }

}
