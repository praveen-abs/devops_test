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
use App\Models\VmtPayroll;
use App\Models\VmtSnapchatEmpPaysheet;
use App\Models\VmtPayrollCycle;
use App\Models\VmtAttendanceCycle;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class VmtPayrollTaxService{

public function getEmpCompValues(){



    $get_payroll_data = VmtSnapchatEmpPaysheet::all()->toArray();

    $res1 = [];
    for($i =0; $i<count($get_payroll_data); $i++){
         $simma =  json_decode($get_payroll_data[$i]['payslip_data'],true);
         array_push($res1, $simma);
    }

    // dd($res1);



    $get_emp_value  =  VmtPaygroup::join('vmt_paygroup_comps','vmt_paygroup_comps.paygroup_id','=','vmt_paygroup.id')
    ->join('vmt_payroll_components','vmt_payroll_components.id','=','vmt_paygroup_comps.comp_id')
     ->join('vmt_emp_paygroupcomp_value','vmt_emp_paygroupcomp_value.paygroup_comp_id','=','vmt_paygroup_comps.id')
     ->where('vmt_emp_paygroupcomp_value.user_id','1')
    ->get(
        [
        'vmt_paygroup.paygroup_name',
        'vmt_paygroup.description',
        'vmt_payroll_components.comp_name',
        'vmt_emp_paygroupcomp_value.user_id',
        'vmt_emp_paygroupcomp_value.payroll_month',
        'vmt_emp_paygroupcomp_value.value',
    ]
    )->toArray();

    // dd($get_emp_value);

    $user_id = User::where('user_code', 'PSC0060')->first()->id;

    $v_form_template = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
        ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
        ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
        ->leftjoin('vmt_inv_f_emp_assigned', 'vmt_inv_f_emp_assigned.id', '=', 'vmt_inv_emp_formdata.f_emp_id')
        ->leftjoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_inv_f_emp_assigned.user_id')
        ->leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_compensatory_details.user_id')
        ->where('vmt_inv_f_emp_assigned.user_id', $user_id)
        ->get(
            [
                'vmt_inv_section_group.section_group',
                'vmt_inv_section.section',
                'vmt_inv_section.particular',
                'vmt_inv_emp_formdata.dec_amount',
                'vmt_inv_section.max_amount',
                'vmt_inv_emp_formdata.json_popups_value',
                'vmt_inv_f_emp_assigned.regime',
                'vmt_inv_f_emp_assigned.updated_at',
                'vmt_employee_compensatory_details.gross',
                'vmt_employee_compensatory_details.basic',
                'vmt_employee_compensatory_details.hra',
                'vmt_employee_compensatory_details.special_allowance',
                'vmt_employee_compensatory_details.professional_tax',
                'vmt_employee_compensatory_details.child_education_allowance',
                'vmt_employee_compensatory_details.lta',
                'vmt_employee_details.doj',
                'vmt_employee_details.dob',
            ]
        )->toArray();

        // dd($v_form_template);

    $res= [
        "1) Gross Earnings" => [],
        "2) Allowance to the extent exampt under section 10" => [],
        "3) Total after excemption (1 - 2)" => [],
        "4) Taxable Income Under Previous employment" => [],
        "5) Gross Total (3 - 4)" => [],
        "6) Under section 16" => [],
        "7) Income Chargeable Under the Head Salaries (5 - 6)" => [],
        "8) Any other income reported by the employee" => [],
        "9) Gross Total income" => [],
        "10) Decuction Under chapter VI - A" => [],
        "11) Total income (Round By 10 Rupees) (9 - 10)" => [],
        "12) Tax Calculation" => [],
        "13) Total Tax on income" => [],
        "14) Tax Payable including Education Cess minus of Relief Under Section 89" => [],
        "15) Tax Deduction at Source u/s 192" => [],
        ];


        // 1) Gross Earnings

        // $total_sum = 0;



    // for($i=0; $i<count($get_emp_value); $i++){

    //     // dd($get_emp_value);

    //         $total_sum = 1 + $get_emp_value[$i]['value'];


    //     $Gross_earnings['particulars']    = $get_emp_value[$i]['comp_name'];
    //     $Gross_earnings['actual']    =    0;
    //     $Gross_earnings['projection']    = $get_emp_value[$i]['value'];
    //     $Gross_earnings['total']    = $total_sum;

    //     array_push($res["1) Gross Earnings"],$Gross_earnings);

    //      }

         // 2) Allowance to the extent exampt under section 10

         $sumOfpreviousempincome=0;
         $sumOfHradeclared = 0;
         $inv_previous_emp_pt=0;
         $inv_stantard_deduction=0;
         $SumOfHousPropsInOld =0;
         foreach ($v_form_template as $dec_amt) {

            $empBasic = $dec_amt['basic'] * 12;

            if($dec_amt['section_group'] == "HRA"){

                $hraTotalRent = json_decode($dec_amt['json_popups_value'],true);
                $sumOfHradeclared += $hraTotalRent['total_rent_paid'];
                $hraexamtions = intval($sumOfHradeclared) - intval($empBasic * 10 / 100);
                $sumofsection10 = intval($hraexamtions) + intval($dec_amt['child_education_allowance']) * 12;

                $allowance_under_sec_10['particular']  =  [$dec_amt['particular'],"Note: Monthly splitup of HRA exemption can be found at the end of this tds sheet.", "Leave Encashment","Total of Allowance to the ex"];
                $allowance_under_sec_10['actual']    = $sumofsection10;
                $allowance_under_sec_10['projection']    = 0;
                $allowance_under_sec_10['total']    = $allowance_under_sec_10['actual'] + $allowance_under_sec_10['projection'];

                array_push($res["2) Allowance to the extent exampt under section 10"],$allowance_under_sec_10);
            }
         }

         // 3) Total after excemption (1 - 2);

        $total_after_exemption['total'] = $allowance_under_sec_10['total'];
        array_push($res["3) Total after excemption (1 - 2)"],$total_after_exemption);


         // 4) Taxable Income Under Previous employment
         if ($dec_amt['section_group'] == "Previous Employer Income") {
            $sumOfpreviousempincome += $dec_amt['dec_amount'];

            if ($dec_amt['particular'] == "Previous Employer Standard Deduction") {
                $inv_stantard_deduction = $dec_amt['dec_amount'];
            }

            if ($dec_amt['particular'] == "Previous Employer PT") {
                $inv_previous_emp_pt = $dec_amt['dec_amount'];
            }
        }

        $taxincome_preEmployment['particular']  = ['1) income After Exemptions', "2) Less: Professional Tax", "Total taxable income under Previous employment"];
        $taxincome_preEmployment['actual']    = ['0','0'];
        $taxincome_preEmployment['projection']  = 0;
        $taxincome_preEmployment['total']  = '848498';

         array_push($res["4) Taxable Income Under Previous employment"],$taxincome_preEmployment);

         // 5) Gross Total (3 - 4)

         $Gross_total['total'] = $total_after_exemption['total'] + $taxincome_preEmployment['total'];
         array_push($res["5) Gross Total (3 - 4)"],$Gross_total);

         // 6) Under section 16

         foreach ($v_form_template as $dec_amt) {

         $standardDeduction = $dec_amt['gross'];

         if ($dec_amt['professional_tax'] >= 2500) {
            $professional_tax = 2500;
        } else {
            // $professional_tax = intval($dec_amt['professional_tax']) + $perviousEmployeeProfessionalTax;
            $professional_tax = 2500;
        }

         if ($professional_tax + $inv_previous_emp_pt >= 2500) {
            $final_emp_pt = 2500;
        } else {
            $final_emp_pt = $professional_tax + $inv_previous_emp_pt;
        }

         if ($standardDeduction >= 50000) {
            $standardDeducation = 50000;
        } else {
            $standardDeducation = intval($dec_amt['gross']);
        }


         $previous_standard = $standardDeducation + $inv_stantard_deduction;

         if ($previous_standard >= 50000) {
             $final_standard = 50000;
         } else {
             $final_standard = $previous_standard;
         }

         $sumofSec16 = $final_standard + $final_emp_pt;


        }

        $undersection['particulars'] = ['a) Entertainment allowance' ,'b) Tax on employment','c) Standard Deduction', 'Total Under Section 16'];
        $undersection['actual'] = $sumofSec16;
        $undersection['projection'] = 0;
        $undersection['total'] = $sumofSec16;

        array_push($res["6) Under section 16"],$undersection);


        // 7) Income Chargeable Under the Head Salaries (5 - 6)

        $income_charge_head_salaries['total'] = $Gross_total['total'] + $undersection['total'] ;
        array_push($res["7) Income Chargeable Under the Head Salaries (5 - 6)"],$income_charge_head_salaries);


        // 8) Any other income reported by the employee
        foreach ($v_form_template as $dec_amt) {

        if ($dec_amt['section_group'] == "House Properties ") {

            $totalIntersetPaid = (json_decode($dec_amt["json_popups_value"], true));
            $SumOfHousPropsInOld += $totalIntersetPaid['income_loss'];
            if ($totalIntersetPaid['property_type'] == "Let Out Property") {
                $SumOfHousPropsInNew = $totalIntersetPaid['income_loss'];
                $tax_calc_new_redime += $totalIntersetPaid['income_loss'];
            }
        }
    }

        $other_income_report['particular']  =  $totalIntersetPaid['property_type'];
        $other_income_report['actual']    = $SumOfHousPropsInOld;
        $other_income_report['projection']    = 0;
        $other_income_report['total']    = $SumOfHousPropsInOld > 200000 ? 200000 : $SumOfHousPropsInOld;

        array_push($res["8) Any other income reported by the employee"],$other_income_report);


        // 9) Gross Total income

        $gorsstotalincome['total'] = $income_charge_head_salaries['total'] + $other_income_report['total'];
        array_push($res["9) Gross Total income"],$gorsstotalincome);

        // 10) Decuction Under chapter VI - A

        $deductablecapterVIA['particular']  =  0;
        $deductablecapterVIA['actual']    = 0;
        $deductablecapterVIA['projection']    = 0;
        $deductablecapterVIA['total']    = 0;
        array_push($res["10) Decuction Under chapter VI - A"],$deductablecapterVIA);

        // 11) Total income (Round By 10 Rupees) (9 - 10)

        $total_income_9_10['total'] = "2000";
        array_push($res["11) Total income (Round By 10 Rupees) (9 - 10)"],$total_income_9_10);

        // 12) Tax Calculation

        $tax_calculation['particular']  =  0;
        $tax_calculation['actual']    = 0;
        $tax_calculation['projection']    = 0;
        $tax_calculation['total']    = 0;
        array_push($res["12) Tax Calculation"],$tax_calculation);

        // 13) Total Tax on income

        $total_tax_income['total'] = "2000";
        array_push($res["13) Total Tax on income"],$total_tax_income);

        // 14) Tax Payable including Education Cess minus of Relief Under Section 89


        $tax_payable_ecucation['total'] = "2000";
        array_push($res["14) Tax Payable including Education Cess minus of Relief Under Section 89"],$tax_payable_ecucation);

        // 15) Tax Deduction at Source u/s 192

        $tax_deduction_192['particular']  =  0;
        $tax_deduction_192['actual']    = 0;
        $tax_deduction_192['projection']    = 0;
        $tax_deduction_192['total']    = 0;
        array_push($res["15) Tax Deduction at Source u/s 192"],$tax_deduction_192);


        return dd($res);



        }

}
