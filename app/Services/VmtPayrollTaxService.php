<?php

namespace App\Services;

use App\Models\VmtPaygroup;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtInvFormSection;
use App\Models\VmtPayrollCycle;
use App\Models\VmtAttendanceCycle;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class VmtPayrollTaxService{

public function getEmpCompValues(){


    $get_emp_value  =  VmtPaygroup::join('vmt_paygroup_comps','vmt_paygroup_comps.paygroup_id','=','vmt_paygroup.id')
    ->join('vmt_payroll_components','vmt_payroll_components.id','=','vmt_paygroup_comps.comp_id')
     ->join('vmt_emp_paygroupcomp_value','vmt_emp_paygroupcomp_value.paygroup_comp_id','=','vmt_paygroup_comps.id')
    ->get([
        'vmt_paygroup.paygroup_name',
        'vmt_paygroup.description',
        'vmt_payroll_components.comp_name',
        'vmt_payroll_components.percentage',
        'vmt_emp_paygroupcomp_value.user_id',
        'vmt_emp_paygroupcomp_value.payroll_month',
        'vmt_emp_paygroupcomp_value.value',
    ])->toArray();

    // dd($get_emp_value);

    $user_id = User::where('user_code', 'BA016')->first()->id;

    $v_form_template = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
        ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
        ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
        ->leftjoin('vmt_inv_f_emp_assigned', 'vmt_inv_f_emp_assigned.id', '=', 'vmt_inv_emp_formdata.f_emp_id')
        ->leftjoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_inv_f_emp_assigned.user_id')
        ->leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_compensatory_details.user_id')
        ->where('vmt_inv_f_emp_assigned.user_id', $user_id)
        ->get(
            [
                'vmt_inv_section.section',
                'vmt_inv_section.particular',
                'vmt_inv_emp_formdata.dec_amount',
                'vmt_inv_section.max_amount',
                'vmt_inv_emp_formdata.json_popups_value',
                'vmt_inv_f_emp_assigned.regime',
                'vmt_inv_f_emp_assigned.updated_at',
            ]
        )->toArray();

        // dd($get_emp_value);

    $res= ["1) Gross Earnings" => [], "2) Allowance to the extent exampt under section 10" => [] , "3) Total after excemption (1 - 2)" => []];

    for($i=0; $i<count($get_emp_value); $i++){

        $Gross_earnings['particulars']    = $get_emp_value[$i]['comp_name'];
        $Gross_earnings['actual']    = $get_emp_value[$i]['value'];
        $Gross_earnings['projection']    = 0;
        $Gross_earnings['total']    = 0;
        array_push($res["1) Gross Earnings"],$Gross_earnings);

         }

        $allowance_under_sec_10['particular']  = 0;
        $allowance_under_sec_10['actual']    = 0;
        $allowance_under_sec_10['projection']    = 0;
        $allowance_under_sec_10['total']    = 0;

        array_push($res["2) Allowance to the extent exampt under section 10"],$allowance_under_sec_10);

        $total_after_exemption['total'] = "2000";

        array_push($res["3) Total after excemption (1 - 2)"],$total_after_exemption);

        return ($res);

     }








}
