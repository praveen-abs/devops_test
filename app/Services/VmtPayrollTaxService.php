<?php

namespace App\Services;

use App\Models\AbsSalaryProjection;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtOrgTimePeriod;
use App\Models\VmtPaygroup;
use Carbon\Carbon;
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
use Barryvdh\DomPDF\Facade as PDF;



class VmtPayrollTaxService
{

    public function getEmpCompValues()
    {



        $get_payroll_data = VmtSnapchatEmpPaysheet::all()->toArray();

        $res1 = [];
        for ($i = 0; $i < count($get_payroll_data); $i++) {
            $simma = json_decode($get_payroll_data[$i]['payslip_data'], true);
            array_push($res1, $simma);
        }

        // dd($res1);



        $get_emp_value = VmtPaygroup::join('vmt_paygroup_comps', 'vmt_paygroup_comps.paygroup_id', '=', 'vmt_paygroup.id')
            ->join('vmt_payroll_components', 'vmt_payroll_components.id', '=', 'vmt_paygroup_comps.comp_id')
            ->join('vmt_emp_paygroupcomp_value', 'vmt_emp_paygroupcomp_value.paygroup_comp_id', '=', 'vmt_paygroup_comps.id')
            ->where('vmt_emp_paygroupcomp_value.user_id', '1')
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

        $template_value = $v_form_template;

        // dd($v_form_template);

        $res = [
            "Gross_Earnings" => ["1) Gross Earnings" => []],
            "under_section_10" => ["2) Allowance to the extent exampt under section 10" => []],
            "Total_after_excemption" => ["3) Total after excemption (1 - 2)" => []],
            "Under_Previous_employment" => ["4) Taxable Income Under Previous employment" => []],
            "Gross_Total" => ["5) Gross Total (3 - 4)" => []],
            "Under_section_16" => ["6) Under section 16" => []],
            "Under_the_Head_Salaries" => ["7) Income Chargeable Under the Head Salaries (5 - 6)" => []],
            "reported_by_the_employee" => ["8) Any other income reported by the employee" => []],
            "Gross_Total_income" => ["9) Gross Total income" => []],
            "Decuction_Under_chapter_6a" => ["10) Decuction Under chapter VI - A" => []],
            "Total_income" => ["11) Total income (Round By 10 Rupees) (9 - 10)" => []],
            "Tax_Calculation" => ["12) Tax Calculation" => []],
            "Total_Tax_on_income" => ["13) Total Tax on income" => []],
            "Surcharge_amt" => [],
            "Relief_Under_Section_89" => ["14) Tax Payable including Education Cess minus of Relief Under Section 89" => []],
            "Source_us_192" => ["15) Tax Deduction at Source u/s 192" => []],
        ];


        // 1) Gross Earnings

        $start_date = '2023-04-01';
        $single_users = $user_id;


        $payslip_id = VmtPayroll::join('vmt_emp_payroll','vmt_emp_payroll.payroll_id','=','vmt_payroll.id')
                ->where('vmt_payroll.payroll_date', $start_date)
                ->where('vmt_emp_payroll.user_id', $single_users)
                ->first([
                    'vmt_emp_payroll.id as id'
                ]);

     $payslip_details  = AbsSalaryProjection::where('vmt_emp_payroll_id',$payslip_id->id)->get()->toarray();


     $getpersonal = [];
     foreach ($payslip_details as $single_payslip) {
         foreach ($single_payslip as $key => $single_details) {

             if ($single_details == "0" || $single_details == null || $single_details == "") {
                 unset($single_payslip[$key]);
             }
         }
         array_push($getpersonal, $single_payslip);
     }

     dd($getpersonal);



    //         $Gross_earnings['particulars']    = 0;
    //         $Gross_earnings['actual']    =  0;
    //         $Gross_earnings['projection']    = 0;
    //         $Gross_earnings['total']    = 0;

    //         array_push($res["Gross_Earnings"]["1) Gross Earnings"],$Gross_earnings);


        //  2) Allowance to the extent exampt under section 10

        $sumOfpreviousempincome = 0;
        $sumOfHradeclared = 0;
        $SumOfHousPropsInOld = 0;
        $tax_calc_new_redime = 0;
        foreach ($v_form_template as $dec_amt) {

            $empBasic = $dec_amt['basic'] * 12;

            if ($dec_amt['section_group'] == "HRA") {

                $hraTotalRent = json_decode($dec_amt['json_popups_value'], true);
                $sumOfHradeclared += $hraTotalRent['total_rent_paid'];
                $hraexamtions = intval($sumOfHradeclared) - intval($empBasic * 10 / 100);
                $sumofsection10 = intval($hraexamtions) + intval($dec_amt['child_education_allowance']) * 12;

                $allowance_under_sec_10['particular'] = [
                $dec_amt['particular'],
                "Note: Monthly splitup of HRA exemption can be found at the end of this tds sheet.",
                "Leave Encashment",
                "Total of Allowance to the extent exempt under Section 10"
                ];
                $allowance_under_sec_10['actual'] = $sumOfHradeclared;
                $allowance_under_sec_10['projection'] = 0;
                $allowance_under_sec_10['total'] = $allowance_under_sec_10['actual'] + $allowance_under_sec_10['projection'];

                array_push($res["under_section_10"]["2) Allowance to the extent exampt under section 10"], $allowance_under_sec_10);
            }
        }

        // 3) Total after excemption (1 - 2);

        $total_after_exemption['total'] = $allowance_under_sec_10['total'];
        array_push($res["Total_after_excemption"]["3) Total after excemption (1 - 2)"], $total_after_exemption);


        // 4) Taxable Income Under Previous employment
        $sumOfpreviousempincome = [];
        $pre_particular = [];
        $sumofprevalue = 0;
        foreach ($v_form_template as $dec_amt) {

            if ($dec_amt['section_group'] == "Previous Employer Income") {
                    $pre_particular[]  =  $dec_amt['particular'];
                $sumOfpreviousempincome[] = $dec_amt['dec_amount'];

                if($dec_amt['particular'] == 'Previous Employer Gross'){
                        $sumofprevalue +=  $dec_amt['dec_amount'];
                }else{
                       $sumofprevalue -= $dec_amt['dec_amount'];
                }
            }
        }



        $taxincome_preEmployment['particular'] = $pre_particular;
        $taxincome_preEmployment['actual'] = $sumOfpreviousempincome;
        $taxincome_preEmployment['projection'] = 'Total taxable income under Previous employment' ;
        $taxincome_preEmployment['total'] = $sumofprevalue;

        // dd($taxincome_preEmployment);

        array_push($res["Under_Previous_employment"]["4) Taxable Income Under Previous employment"], $taxincome_preEmployment);

        // 5) Gross Total (3 - 4)

        $Gross_total['total'] = $total_after_exemption['total'] + $taxincome_preEmployment['total'];
        array_push($res["Gross_Total"]["5) Gross Total (3 - 4)"], $Gross_total);

        // 6) Under section 16

        foreach ($v_form_template as $dec_amt) {
            $pt_tax =  $dec_amt['professional_tax'] * 12;
            $standardDeduction = $dec_amt['gross'] * 12 ;

            if ($standardDeduction >= 50000) {
                $standardDeducation = 50000;
            } else {
                $standardDeducation = intval($dec_amt['gross']);
            }

            if($pt_tax > 2500){
                $max_pt = 2500;

            }else{
                $max_pt = $pt_tax;

            }

        }

        $undersection['particulars'] =
         [
            'a) Entertainment allowance' => 0,
            'b) Tax on employment' => $max_pt,
            'c) Standard Deduction'=> $standardDeducation,
        ];
        $undersection['Total Under Section 16'] = 0;
        $undersection['projection'] = 0;
        $undersection['total'] = $max_pt + $standardDeducation;

        array_push($res["Under_section_16"]["6) Under section 16"], $undersection);


        // 7) Income Chargeable Under the Head Salaries (5 - 6)

        $income_charge_head_salaries['total'] = $Gross_total['total'] + $undersection['total'];
        array_push($res["Under_the_Head_Salaries"]["7) Income Chargeable Under the Head Salaries (5 - 6)"], $income_charge_head_salaries);


        // 8) Any other income reported by the employee

        $property_type = [];
        $property_value = [];
        foreach ($v_form_template as $dec_amt) {

            if ($dec_amt['section_group'] == "House Properties ") {
                    // dd($dec_amt);
                $totalIntersetPaid = (json_decode($dec_amt["json_popups_value"], true));
                $property_type[] = $totalIntersetPaid['property_type'];
                $property_value[] = $totalIntersetPaid['income_loss'];
                $SumOfHousPropsInOld += $totalIntersetPaid['income_loss'];
                if ($totalIntersetPaid['property_type'] == "Let Out Property") {
                    $SumOfHousPropsInNew = $totalIntersetPaid['income_loss'];
                    $tax_calc_new_redime += $totalIntersetPaid['income_loss'];
                }
            }
        }

            if ($SumOfHousPropsInOld > 200000) {
                $sumofhouseproperty = 200000;
            } else if (-200000 > $SumOfHousPropsInOld) {
                $sumofhouseproperty = -200000;
            } else {
                $sumofhouseproperty = $SumOfHousPropsInOld;
            }


        $other_income_report['particular'] = $property_type;
        $other_income_report['actual'] = $property_value;
        $other_income_report['projection'] = 0;
        $other_income_report['total'] = $sumofhouseproperty;

        array_push($res["reported_by_the_employee"]["8) Any other income reported by the employee"], $other_income_report);


        // 9) Gross Total income

        $gorsstotalincome['total'] = $income_charge_head_salaries['total'] + $other_income_report['total'];
        array_push($res["Gross_Total_income"]["9) Gross Total income"], $gorsstotalincome);

        $dec_amount80c = 0;
        $count = 0;
        foreach ($v_form_template as $dec_amt) {
            if ($dec_amt['section_group'] == "Section 80C & 80CC ") {

                 $dec_amount80c += $dec_amt['dec_amount'];

                if (!array_key_exists($dec_amt["section"], $v_form_template)) {
                    $v_form_template[$dec_amt["section"]] = array();
                    array_push($v_form_template[$dec_amt["section"]], $dec_amt);
                } else {
                    array_push($v_form_template[$dec_amt["section"]], $dec_amt);
                }
            }
            //remove from outer json
            unset($v_form_template[$count]);
            $count++;
        }


        $sumof_max80ccd1 = 0;  $sumof_dec80ccd1 = 0;  $sumof_max80ccd2 = 0; $sumof_dec80ccd2 = 0; $sumof_max80d = 0; $sumof_dec80d = 0;
        $sumof_max80dd = 0; $sumof_dec80dd = 0; $sumof_max80ddb = 0; $sumof_dec80ddb = 0; $sumof_max80u = 0; $sumof_dec80u = 0; $sumof_max80e = 0; $sumof_dec80e = 0; $sumof_max80ee = 0; $sumof_dec80ee = 0; $sumof_max80eea = 0; $sumof_dec80eea = 0;
        $sumof_max80eeb = 0; $sumof_dec80eeb = 0; $sumof_max80g = 0; $sumof_dec80g = 0; $sumof_max80tta = 0; $sumof_dec80tta = 0;
        $sumof_max80ttb = 0; $sumof_dec80ttb = 0;


        $count = 0;
        foreach ($template_value as $dec_amt) {
            if ($dec_amt['section_group'] == "Other Excemptions ") {
                //    dd($dec_amt);

                if($dec_amt['section'] == '80CCD (1B)'){
                    $sumof_max80ccd1  += $dec_amt['max_amount'];
                    $sumof_dec80ccd1  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80CCD (2)'){
                    $sumof_max80ccd2 += $dec_amt['max_amount'];
                    $sumof_dec80ccd2 += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80D'){
                    $sumof_max80d  += $dec_amt['max_amount'];
                    $sumof_dec80d  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80DD'){
                    $sumof_max80dd  += $dec_amt['max_amount'];
                    $sumof_dec80dd  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80DDB'){
                    $sumof_max80ddb  += $dec_amt['max_amount'];
                    $sumof_dec80ddb  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80U'){
                    $sumof_max80u  += $dec_amt['max_amount'];
                    $sumof_dec80u  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80E'){
                    $sumof_max80e  += $dec_amt['max_amount'];
                    $sumof_dec80e  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80EE'){
                    $sumof_max80ee  += $dec_amt['max_amount'];
                    $sumof_dec80ee  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80EEA'){
                    $sumof_max80eea  += $dec_amt['max_amount'];
                    $sumof_dec80eea  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80EEB'){
                    $sumof_max80eeb  += $dec_amt['max_amount'];
                    $sumof_dec80eeb  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80G'){
                    $sumof_max80g  += $dec_amt['max_amount'];
                    $sumof_dec80g  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80TTA'){
                    $sumof_max80tta  += $dec_amt['max_amount'];
                    $sumof_dec80tta  += $dec_amt['dec_amount'];

                }

                if($dec_amt['section'] == '80TTB'){
                    $sumof_max80ttb  += $dec_amt['max_amount'];
                    $sumof_dec80ttb  += $dec_amt['dec_amount'];

                }

                if (!array_key_exists($dec_amt["section"], $template_value)) {
                    $template_value[$dec_amt["section"]] = array();
                    array_push($template_value[$dec_amt["section"]], $dec_amt);
                } else {
                    array_push($template_value[$dec_amt["section"]], $dec_amt);
                }
            }
            //remove from outer json
            unset($template_value[$count]);
            $count++;
        }

            $sum_of_section_amt['80CCD (1B)'] = $sumof_dec80ccd1  > $sumof_max80ccd1 ? $sumof_max80ccd1 : $sumof_dec80ccd1;
            $sum_of_section_amt['80CCD (2)'] =  $sumof_dec80ccd2 > $sumof_max80ccd2 ? $sumof_max80ccd2 : $sumof_dec80ccd2 ;
            $sum_of_section_amt['80D'] =  $sumof_dec80d > $sumof_max80d ? $sumof_max80d : $sumof_dec80d ;
            $sum_of_section_amt['80DD'] =  $sumof_dec80dd > $sumof_max80dd ? $sumof_max80dd : $sumof_dec80dd ;
            $sum_of_section_amt['80DDB'] = $sumof_dec80ddb > $sumof_max80ddb ? $sumof_max80ddb : $sumof_dec80ddb ;
            $sum_of_section_amt['80U'] = $sumof_dec80u > $sumof_max80u ? $sumof_max80u : $sumof_dec80u ;
            $sum_of_section_amt['80E'] = $sumof_dec80e > $sumof_max80e ? $sumof_max80e : $sumof_dec80e ;
            $sum_of_section_amt['80EE'] = $sumof_dec80ee > $sumof_max80ee ? $sumof_max80ee : $sumof_dec80ee ;
            $sum_of_section_amt['80EEA'] = $sumof_dec80eea > $sumof_max80eea ? $sumof_max80eea : $sumof_dec80eea ;
            $sum_of_section_amt['80EEB'] = $sumof_dec80eeb > $sumof_max80eeb ? $sumof_max80eeb : $sumof_dec80eeb ;
            $sum_of_section_amt['80G'] = $sumof_dec80g > $sumof_max80g ? $sumof_max80g : $sumof_dec80g ;
            $sum_of_section_amt['80TTA'] = $sumof_dec80tta > $sumof_max80tta ? $sumof_max80tta : $sumof_dec80tta ;
            $sum_of_section_amt['80TTB'] =  $sumof_dec80ttb > $sumof_max80ttb ? $sumof_max80ttb : $sumof_dec80ttb ;

            $sumofotherexception =0;
            foreach($sum_of_section_amt as $key => $single_value){
                  $sumofotherexception += $single_value;
            }

            $total_of_chapterVIa = (int)$sumofotherexception + ($dec_amount80c > 150000 ? 150000 : $dec_amount80c);

            // dd($sum_of_section_amt);

        // 10) Decuction Under chapter VI - A

        $deductablecapterVIA['particular'] = [$v_form_template, $template_value, 'Total of Deduction under Chapter VI-A'];
        $deductablecapterVIA['Total(80C+80CCC+80CCD)'] = $dec_amount80c > 150000 ? 150000 : $dec_amount80c  ;
        $deductablecapterVIA['projection'] = $sum_of_section_amt;
        $deductablecapterVIA['total_of_chapterVIa'] = $total_of_chapterVIa;
        array_push($res["Decuction_Under_chapter_6a"]["10) Decuction Under chapter VI - A"], $deductablecapterVIA);

        // 11) Total income (Round By 10 Rupees) (9 - 10)

        $total_income_9_10['total'] = $gorsstotalincome['total'] - $deductablecapterVIA['total_of_chapterVIa'];
        array_push($res["Total_income"]["11) Total income (Round By 10 Rupees) (9 - 10)"], $total_income_9_10);

        // dd($total_income_9_10);
        // 12) Tax Calculation

        $tax_calculation['particular'] = $this->getTaxCalculation(100000000000,40);
        $tax_calculation['actual'] = 0;
        $tax_calculation['projection'] = 0;
        $tax_calculation['total'] = 0;
        array_push($res["Tax_Calculation"]["12) Tax Calculation"], $tax_calculation);

        // 13) Total Tax on income
        // dd($tax_calculation);

        $total_tax_income['total'] = $tax_calculation['particular']['Tax on total Income'] ?? 0;
        $total_tax_income1 = $tax_calculation['particular']['Tax on total Income'] ?? 0;
        array_push($res["Total_Tax_on_income"]["13) Total Tax on income"], $total_tax_income);

        // 14) Tax Payable including Education Cess minus of Relief Under Section 89

        $surcharge_amount['surchage Amount'] = $this->subChargeCalculation($total_tax_income1);
        $surcharge_amount['Education Cess 4% of '.$total_tax_income1] = $total_tax_income1 * 0.04;
        $surcharge_amount['Less : Releif Under Section 89'] = 0;
        array_push($res["Surcharge_amt"], $surcharge_amount);

        $sumofhealthcess = 0;
        foreach($surcharge_amount as $single_value){
                $sumofhealthcess  += $single_value;
        }

        $tax_payable_ecucation['total'] = $sumofhealthcess + $total_tax_income1;
        array_push($res["Relief_Under_Section_89"]["14) Tax Payable including Education Cess minus of Relief Under Section 89"], $tax_payable_ecucation);

        // 15) Tax Deduction at Source u/s 192
          $current_month =  Carbon::now()->format('F');

        $tax_deduction_192['i) TDS till last month'] = 0;
        $tax_deduction_192['ii) TDS for '. $current_month] = 0;
        $tax_deduction_192['iii) TDS by Previous Employer'] = 0;
        $tax_deduction_192['A) Total Tax Deduction at Source (i + ii + iii)'] = 0;
        $tax_deduction_192['Tax Payable / Refundable (14 - 15(A))'] = 0;

        array_push($res["Source_us_192"]["15) Tax Deduction at Source u/s 192"], $tax_deduction_192);


        // return dd($res);

        $html = view('investmentTdsWorkSheet.TDS_work_sheet', $res);

        return $html;

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadhtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdf->stream('tds_pdf');

    }





    public function getTaxCalculation($total_income, $age)
    {

        // $cur = '₹';

        if ($age < 60) {
            if ($total_income <= 250000) {
                return $overall_deduction = 0;
            } else
                if ($total_income > 250000) {

                    $deducted_total_income['Exception ₹250000 and the balance amount'] = $total_income - 250000;
                    $deducted_total_income_1s = $total_income - 250000;


                    if ($deducted_total_income_1s > 250000) {
                        $deducted_total_income['For ₹250000 : Tax - 5% Tax Amount'] = 12500;
                        $deducted_total_income_2s = $deducted_total_income_1s - 250000;

                        if ($deducted_total_income_2s < 500000) {
                            $deducted_total_income['For ' . '₹' . $deducted_total_income_2s . ' : Tax - 20% Tax Amount'] = $deducted_total_income_2s * 0.20;
                        }

                        if ($deducted_total_income_2s > 500000) {
                            $deducted_total_income['For ₹500000 : Tax - 20% Tax Amount'] = 100000;
                            $deducted_total_income_3s = $deducted_total_income_2s - 500000;

                            if ($deducted_total_income_3s < 1000000) {
                                $deducted_total_income['For ' . '₹' . $deducted_total_income_3s . ' : Tax - 30% Tax Amount'] = $deducted_total_income_3s * 0.30;
                            }

                            if ($deducted_total_income_3s > 1000000) {
                                $deducted_total_income['For ' . '₹' . $deducted_total_income_3s . ' : Tax - 30% Tax Amount'] = $deducted_total_income_3s * 0.30;
                            }
                        }
                    }
                }

        } else if ($age >= 60 && $age <= 80) {

            if ($total_income < 300000) {
                return $overall_deduction = 0;
            } else
                if ($total_income > 300000) {
                    $deducted_total_income['For ₹300000 : Tax - 5% Tax Amount'] = 15000;
                    $deducted_total_income_2s = $total_income - 300000;

                    if ($deducted_total_income_2s < 500000) {
                        $deducted_total_income['For ' . $deducted_total_income_2s . ' Tax 5% Tax Amount'] = $deducted_total_income_2s * 0.05;
                    }

                    if ($deducted_total_income_2s > 500000) {
                        $deducted_total_income['For ₹500000 : Tax - 20% Tax Amount'] = 100000;
                        $deducted_total_income_3s = $deducted_total_income_2s - 500000;

                        if ($deducted_total_income_3s < 1000000) {
                            $deducted_total_income['For ' . '₹' . $deducted_total_income_3s . ' Tax 20% Tax Amount'] = $deducted_total_income_3s * 0.20;
                        }

                        if ($deducted_total_income_3s > 1000000) {
                            $deducted_total_income['For ' . '₹' . $deducted_total_income_3s . ' Tax 30% Tax Amount'] = $deducted_total_income_3s * 0.30;
                        }
                    }
                }
        } else if ($age > 80) {

            if ($total_income < 500000) {
                return $overall_deduction = 0;
            } else
                if ($total_income > 500000) {
                    $deducted_total_income['For ₹500000 : Tax - 20% Tax Amount'] = 100000;
                    $deducted_total_income_2s = $total_income - 500000;

                    if ($deducted_total_income_2s < 1000000) {
                        $deducted_total_income['For_' . '₹' . $deducted_total_income_2s . ' : Tax - 20% Tax Amount'] = $deducted_total_income_2s * 0.20;
                    }

                    if ($deducted_total_income_2s > 1000000) {
                        $deducted_total_income['For_' . '₹' . $deducted_total_income_2s . ' Tax - 30% Tax Amount'] = $deducted_total_income_2s * 0.30;
                    }

                }
        }

        $sumOftax = 0;
        foreach ($deducted_total_income as $key => $tax_calculate) {
            if ($key == 'Exception ₹250000 and the balance amount') {
                $sumOftax += 0;
            } else {
                $sumOftax += $tax_calculate;
            }
        }
        $deducted_total_income['Tax on total Income'] = $sumOftax;

        $deducted_total_income['Less : Rebate Under Section 87A'] = 0 ;

        $deducted_total_income['Note : if taxable income is less than ₹500000, tax rebate of a maximum of ₹12500 is provided under Section 87A'] = 0 ;

            return $deducted_total_income;

    }


    private function subChargeCalculation($total_income)
    {
        if($total_income < 5000000){
            return $subcharge = 0;
        }else if ($total_income >= 5000000 && $total_income < 10000000) {
            $subcharge = $total_income * 10 / 100;
            return $subcharge;
        } else if ($total_income >= 10000000 && $total_income < 20000000) {
            $subcharge = $total_income * 15 / 100;
            return $subcharge;
        } else if ($total_income >= 20000000 && $total_income < 50000000) {
            $subcharge = $total_income * 25 / 100;
            return $subcharge;
        } else if ($total_income > 50000000) {
            $subcharge = $total_income * 37 / 100;
            return $subcharge;
        }
    }



    public function annualProjection()
    {

        $user_id = '144';
        $payroll_date = VmtPayroll::where('payroll_date', '2023-04-01')->where('client_id', '3')->first();
        $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $user_id)->first();
        $timeperiod = VmtOrgTimePeriod::where('status', '1')->first();
        $start_date = Carbon::parse($timeperiod->start_date)->subMonth(1);
        $end_date = Carbon::parse($timeperiod->end_date);
        $current_date = Carbon::now();

        $res = [];
        while ($start_date->lte($end_date)) {

            $start_date = Carbon::parse($start_date)->addMonth();
            if ($start_date->lt($current_date)) {

                $payslip_data = User::join('vmt_emp_payroll', 'vmt_emp_payroll.user_id', '=', 'users.id')
                    ->join('vmt_payroll', 'vmt_payroll.id', '=', 'vmt_emp_payroll.payroll_id')
                    ->join('vmt_employee_payslip_v2', 'vmt_employee_payslip_v2.emp_payroll_id', '=', 'vmt_emp_payroll.id')
                    ->where('vmt_emp_payroll.user_id', $user_id)
                    ->where('payroll_date', $start_date)
                    ->first();

                if ($payslip_data) {
                    $salary_project_data = new AbsSalaryProjection;
                    $salary_project_data->vmt_emp_payroll_id = $emp_payroll->id;
                    $salary_project_data->earned_basic = $payslip_data['earned_basic'];
                    $salary_project_data->earned_hra = $payslip_data['earned_hra'];
                    $salary_project_data->earned_child_edu_allowance = $payslip_data['earned_child_edu_allowance'];
                    $salary_project_data->earned_spl_alw = $payslip_data['earned_spl_alw'];
                    $salary_project_data->total_earned_gross = $payslip_data['total_earned_gross'];
                    $salary_project_data->save();
                }

                array_push($res, $payslip_data);

            } else {

                $compensatory_details = User::join('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                    ->where('user_id', $user_id)->first();

                $salary_project_data = new AbsSalaryProjection;
                $salary_project_data->vmt_emp_payroll_id = $emp_payroll->id;
                $salary_project_data->earned_basic = $compensatory_details['basic'];
                $salary_project_data->earned_hra = $compensatory_details['hra'];
                $salary_project_data->earned_child_edu_allowance = $compensatory_details['child_education_allowance'];
                $salary_project_data->earned_spl_alw = $compensatory_details['special_allowance'];
                $salary_project_data->total_earned_gross = $compensatory_details['gross'];
                $salary_project_data->save();

                array_push($res, $compensatory_details);

            }

        }
        dd("saved");
    }

}
