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
use App\Models\VmtInvFEmpAssigned;
use App\Models\VmtPayroll;
use Carbon\CarbonPeriod;
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

    public function getEmpCompValues($user_id, $month)
    {


        // $get_payroll_data = VmtSnapchatEmpPaysheet::all()->toArray();

        // $res1 = [];
        // for ($i = 0; $i < count($get_payroll_data); $i++) {
        //     $simma = json_decode($get_payroll_data[$i]['payslip_data'], true);
        //     array_push($res1, $simma);
        // }

        // dd($res1);



        // $get_emp_value = VmtPaygroup::join('vmt_paygroup_comps', 'vmt_paygroup_comps.paygroup_id', '=', 'vmt_paygroup.id')
        //     ->join('vmt_payroll_components', 'vmt_payroll_components.id', '=', 'vmt_paygroup_comps.comp_id')
        //     ->join('vmt_emp_paygroupcomp_value', 'vmt_emp_paygroupcomp_value.paygroup_comp_id', '=', 'vmt_paygroup_comps.id')
        //     ->where('vmt_emp_paygroupcomp_value.user_id', '1')
        //     ->get(
        //         [
        //             'vmt_paygroup.paygroup_name',
        //             'vmt_paygroup.description',
        //             'vmt_payroll_components.comp_name',
        //             'vmt_emp_paygroupcomp_value.user_id',
        //             'vmt_emp_paygroupcomp_value.payroll_month',
        //             'vmt_emp_paygroupcomp_value.value',
        //         ]
        //     )->toArray();
        // dd($get_emp_value);


        // $user_id = 144;

        $inv_users = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->join('vmt_inv_f_emp_assigned', 'vmt_inv_f_emp_assigned.user_id', '=', 'users.id')
            ->where('vmt_inv_f_emp_assigned.user_id', $user_id)
            ->first([
                'users.id',
                'users.name',
                'vmt_employee_details.pan_number as Pan Number',
                'vmt_employee_office_details.designation as Designation',
                'vmt_inv_f_emp_assigned.regime'
            ]);


        $v_form_template = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
            ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
            ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
            ->leftjoin('vmt_inv_f_emp_assigned', 'vmt_inv_f_emp_assigned.id', '=', 'vmt_inv_emp_formdata.f_emp_id')
            ->leftjoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_inv_f_emp_assigned.user_id')
            ->leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_compensatory_details.user_id')
            ->where('vmt_inv_f_emp_assigned.user_id', $inv_users->id)
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


        $res = [
            "User_details" => [],
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
            "Hra_exception_calc" => [],
        ];

        // User Details

        array_push($res["User_details"], $inv_users->toArray());

        // 1) Gross Earnings

        $Gross_earnings['particulars']    = $this->getAnnualProjection($user_id, $month);
        $Gross_earnings['actual']    =  0;
        $Gross_earnings['projection']    = 0;
        $Gross_earnings['total']    = 0;

        array_push($res["Gross_Earnings"]["1) Gross Earnings"], $Gross_earnings);


        //  2) Allowance to the extent exampt under section 10
        $hraTotalRent = [];
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
            }
        }

        $allowance_under_sec_10['particular'] = [
            "House Rent Allowance",
            "Note: Monthly splitup of HRA exemption can be found at the end of this tds sheet.",
            "Leave Encashment",
            "Total of Allowance to the extent exempt under Section 10"
        ];
        $allowance_under_sec_10['actual'] = $sumOfHradeclared;
        $allowance_under_sec_10['projection'] = 0;
        $allowance_under_sec_10['total'] = $allowance_under_sec_10['actual'] + $allowance_under_sec_10['projection'];

        array_push($res["under_section_10"]["2) Allowance to the extent exampt under section 10"], $allowance_under_sec_10);



        // 3) Total after excemption (1 - 2);

        $total_after_exemption['total'] = $allowance_under_sec_10['total'] + $Gross_earnings['particulars']['Total Income'];
        array_push($res["Total_after_excemption"]["3) Total after excemption (1 - 2)"], $total_after_exemption);


        // 4) Taxable Income Under Previous employment
        $sumOfpreviousempincome = [];
        $pre_particular = [];
        $sumofprevalue = 0;
        foreach ($v_form_template as $dec_amt) {

            if ($dec_amt['section_group'] == "Previous Employer Income") {
                $pre_particular[]  =  $dec_amt['particular'];
                $sumOfpreviousempincome[] = $dec_amt['dec_amount'];

                if ($dec_amt['particular'] == 'Previous Employer Gross') {
                    $sumofprevalue +=  $dec_amt['dec_amount'];
                } else {
                    $sumofprevalue -= $dec_amt['dec_amount'];
                }
            }
        }



        $taxincome_preEmployment['particular'] = $pre_particular;
        $taxincome_preEmployment['actual'] = $sumOfpreviousempincome;
        $taxincome_preEmployment['projection'] = 'Total taxable income under Previous employment';
        $taxincome_preEmployment['total'] = $sumofprevalue;

        // dd($taxincome_preEmployment);

        array_push($res["Under_Previous_employment"]["4) Taxable Income Under Previous employment"], $taxincome_preEmployment);

        // 5) Gross Total (3 - 4)

        $Gross_total['total'] = $total_after_exemption['total'] + $taxincome_preEmployment['total'];
        array_push($res["Gross_Total"]["5) Gross Total (3 - 4)"], $Gross_total);

        // 6) Under section 16

        foreach ($v_form_template as $dec_amt) {
            $pt_tax =  $dec_amt['professional_tax'] * 12;
            $standardDeduction = $dec_amt['gross'] * 12;

            if ($standardDeduction >= 50000) {
                $standardDeducation = 50000;
            } else {
                $standardDeducation = intval($dec_amt['gross']);
            }

            if ($pt_tax > 2500) {
                $max_pt = 2500;
            } else {
                $max_pt = $pt_tax;
            }
        }

        $undersection['particulars'] =
            [
                'a) Entertainment allowance' => 0,
                'b) Tax on employment' => $max_pt,
                'c) Standard Deduction' => $standardDeducation,
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


        $sumof_max80ccd1 = 0;
        $sumof_dec80ccd1 = 0;
        $sumof_max80ccd2 = 0;
        $sumof_dec80ccd2 = 0;
        $sumof_max80d = 0;
        $sumof_dec80d = 0;
        $sumof_max80dd = 0;
        $sumof_dec80dd = 0;
        $sumof_max80ddb = 0;
        $sumof_dec80ddb = 0;
        $sumof_max80u = 0;
        $sumof_dec80u = 0;
        $sumof_max80e = 0;
        $sumof_dec80e = 0;
        $sumof_max80ee = 0;
        $sumof_dec80ee = 0;
        $sumof_max80eea = 0;
        $sumof_dec80eea = 0;
        $sumof_max80eeb = 0;
        $sumof_dec80eeb = 0;
        $sumof_max80g = 0;
        $sumof_dec80g = 0;
        $sumof_max80tta = 0;
        $sumof_dec80tta = 0;
        $sumof_max80ttb = 0;
        $sumof_dec80ttb = 0;


        $count = 0;
        foreach ($template_value as $dec_amt) {
            if ($dec_amt['section_group'] == "Other Excemptions ") {
                //    dd($dec_amt);

                if ($dec_amt['section'] == '80CCD (1B)') {
                    $sumof_max80ccd1  += $dec_amt['max_amount'];
                    $sumof_dec80ccd1  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80CCD (2)') {
                    $sumof_max80ccd2 += $dec_amt['max_amount'];
                    $sumof_dec80ccd2 += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80D') {
                    $sumof_max80d  += $dec_amt['max_amount'];
                    $sumof_dec80d  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80DD') {
                    $sumof_max80dd  += $dec_amt['max_amount'];
                    $sumof_dec80dd  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80DDB') {
                    $sumof_max80ddb  += $dec_amt['max_amount'];
                    $sumof_dec80ddb  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80U') {
                    $sumof_max80u  += $dec_amt['max_amount'];
                    $sumof_dec80u  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80E') {
                    $sumof_max80e  += $dec_amt['max_amount'];
                    $sumof_dec80e  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80EE') {
                    $sumof_max80ee  += $dec_amt['max_amount'];
                    $sumof_dec80ee  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80EEA') {
                    $sumof_max80eea  += $dec_amt['max_amount'];
                    $sumof_dec80eea  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80EEB') {
                    $sumof_max80eeb  += $dec_amt['max_amount'];
                    $sumof_dec80eeb  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80G') {
                    $sumof_max80g  += $dec_amt['max_amount'];
                    $sumof_dec80g  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80TTA') {
                    $sumof_max80tta  += $dec_amt['max_amount'];
                    $sumof_dec80tta  += $dec_amt['dec_amount'];
                }

                if ($dec_amt['section'] == '80TTB') {
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
        $sum_of_section_amt['80CCD (2)'] =  $sumof_dec80ccd2 > $sumof_max80ccd2 ? $sumof_max80ccd2 : $sumof_dec80ccd2;
        $sum_of_section_amt['80D'] =  $sumof_dec80d > $sumof_max80d ? $sumof_max80d : $sumof_dec80d;
        $sum_of_section_amt['80DD'] =  $sumof_dec80dd > $sumof_max80dd ? $sumof_max80dd : $sumof_dec80dd;
        $sum_of_section_amt['80DDB'] = $sumof_dec80ddb > $sumof_max80ddb ? $sumof_max80ddb : $sumof_dec80ddb;
        $sum_of_section_amt['80U'] = $sumof_dec80u > $sumof_max80u ? $sumof_max80u : $sumof_dec80u;
        $sum_of_section_amt['80E'] = $sumof_dec80e > $sumof_max80e ? $sumof_max80e : $sumof_dec80e;
        $sum_of_section_amt['80EE'] = $sumof_dec80ee > $sumof_max80ee ? $sumof_max80ee : $sumof_dec80ee;
        $sum_of_section_amt['80EEA'] = $sumof_dec80eea > $sumof_max80eea ? $sumof_max80eea : $sumof_dec80eea;
        $sum_of_section_amt['80EEB'] = $sumof_dec80eeb > $sumof_max80eeb ? $sumof_max80eeb : $sumof_dec80eeb;
        $sum_of_section_amt['80G'] = $sumof_dec80g > $sumof_max80g ? $sumof_max80g : $sumof_dec80g;
        $sum_of_section_amt['80TTA'] = $sumof_dec80tta > $sumof_max80tta ? $sumof_max80tta : $sumof_dec80tta;
        $sum_of_section_amt['80TTB'] =  $sumof_dec80ttb > $sumof_max80ttb ? $sumof_max80ttb : $sumof_dec80ttb;

        $sumofotherexception = 0;
        foreach ($sum_of_section_amt as $key => $single_value) {
            $sumofotherexception += $single_value;
        }

        $total_of_chapterVIa = (int)$sumofotherexception + ($dec_amount80c > 150000 ? 150000 : $dec_amount80c);

        // dd($sum_of_section_amt);

        // 10) Decuction Under chapter VI - A

        $deductablecapterVIA['particular'] = [$v_form_template, $template_value, 'Total of Deduction under Chapter VI-A'];
        $deductablecapterVIA['Total(80C+80CCC+80CCD)'] = $dec_amount80c > 150000 ? 150000 : $dec_amount80c;
        $deductablecapterVIA['projection'] = $sum_of_section_amt;
        $deductablecapterVIA['total_of_chapterVIa'] = $total_of_chapterVIa;
        array_push($res["Decuction_Under_chapter_6a"]["10) Decuction Under chapter VI - A"], $deductablecapterVIA);

        // 11) Total income (Round By 10 Rupees) (9 - 10)

        $total_income_9_10['total'] = $gorsstotalincome['total'] - $deductablecapterVIA['total_of_chapterVIa'];
        array_push($res["Total_income"]["11) Total income (Round By 10 Rupees) (9 - 10)"], $total_income_9_10);

        // dd($total_income_9_10);
        // 12) Tax Calculation

        $tax_calculation['particular'] = $this->getTaxCalculation($total_income_9_10['total'], 40);
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
        $surcharge_amount['Education Cess 4% of ' . $total_tax_income1] = $total_tax_income1 * 0.04;
        $surcharge_amount['Less : Releif Under Section 89'] = 0;
        array_push($res["Surcharge_amt"], $surcharge_amount);

        $sumofhealthcess = 0;
        foreach ($surcharge_amount as $single_value) {
            $sumofhealthcess  += $single_value;
        }

        $tax_payable_ecucation['total'] = $sumofhealthcess + $total_tax_income1;
        array_push($res["Relief_Under_Section_89"]["14) Tax Payable including Education Cess minus of Relief Under Section 89"], $tax_payable_ecucation);

        // 15) Tax Deduction at Source u/s 192
        $current_month =  Carbon::now()->format('F');

        $tax_deduction_192['i) TDS till last month'] = 0;
        $tax_deduction_192['ii) TDS for ' . $current_month] = 0;
        $tax_deduction_192['iii) TDS by Previous Employer'] = 0;
        $tax_deduction_192['A) Total Tax Deduction at Source (i + ii + iii)'] = 0;
        $tax_deduction_192['Tax Payable / Refundable (14 - 15(A))'] = 0;

        array_push($res["Source_us_192"]["15) Tax Deduction at Source u/s 192"], $tax_deduction_192);

        // hra exception calcuation

        array_push($res["Hra_exception_calc"], $this->HraExceptionCalc($user_id, $month));


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

        $deducted_total_income['Less : Rebate Under Section 87A'] = 0;

        $deducted_total_income['Note : if taxable income is less than ₹500000, tax rebate of a maximum of ₹12500 is provided under Section 87A'] = 0;

        return $deducted_total_income;
    }


    private function subChargeCalculation($total_income)
    {
        if ($total_income < 5000000) {
            return $subcharge = 0;
        } else if ($total_income >= 5000000 && $total_income < 10000000) {
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

    public function getAnnualProjection($user_id, $month)
    {

        $single_user_id = User::where('id', $user_id)->first();

            $payroll_date = VmtPayroll::where('payroll_date',  $month)->where('client_id', $single_user_id->client_id)->first();

            if (!empty($payroll_date)) {

                $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $user_id);

            }

            if ($emp_payroll->exists()) {
                 $emp_payroll =$emp_payroll->first();
                 $employee_projected_salary = AbsSalaryProjection::where('vmt_emp_payroll_id', $emp_payroll->id)->get();

            }

    //     $start_date = $month;
    //     $single_users = $user_id;

    //     $single_user_id = User::where('id', $single_users)->first();

    //     $payslip_id = VmtPayroll::join('vmt_emp_payroll','vmt_emp_payroll.payroll_id','=','vmt_payroll.id')
    //             ->where('vmt_payroll.payroll_date', $start_date)
    //             ->where('vmt_payroll.client_id', $single_user_id->client_id)
    //             ->where('vmt_emp_payroll.user_id', $single_users)
    //             ->first([
    //                 'vmt_emp_payroll.id as id'
    //             ]);


    //  $payslip_details  = AbsSalaryProjection::where('vmt_emp_payroll_id',$payslip_id->id)->get()->toarray();



        $timeperiod = VmtOrgTimePeriod::where('status', '1')->first();
        $start_date = Carbon::parse($timeperiod->start_date)->format('Y-m-d');

        $end_date = Carbon::parse($timeperiod->end_date)->format('Y-m-01');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        $current_date = Carbon::now()->subMonth(2);

        $date_range = CarbonPeriod::create($start_date, '1 month', $end_date);

        $date = [];
        foreach ($date_range as $key => $value) {
            $date[] = $value;
        }

        $actual = [];
        $projection = [];
        $compensatory_value = [];
        $payroll_value = [];

        $single_basic = 0;
        $single_hra = 0;
        $single_cld_all = 0;
        $single_spl_alw = 0;
        $single_total_fixed_gross = 0;
        $single_earned_basic = 0;
        $single_basic_arrear = 0;
        $single_earned_hra  = 0;
        $single_hra_arrear  = 0;
        $single_earned_child_edu_allowance = 0;
        $single_child_edu_allowance_arrear  = 0;
        $single_earned_spl_alw = 0;
        $single_spl_alw_arrear = 0;
        $single_overtime = 0;
        $single_total_earned_gross = 0;
        $single_pf_wages = 0;
        $single_pf_wages_arrear_epfr = 0;
        $single_epfr = 0;
        $single_epfr_arrear = 0;
        $single_edli_charges = 0;
        $single_edli_charges_arrears = 0;
        $single_pf_admin_charges = 0;
        $single_pf_admin_charges_arrears = 0;
        $single_employer_esi = 0;
        $single_employer_lwf  = 0;
        $single_ctc = 0;
        $single_epf_ee  = 0;
        $single_epf_ee_arrear = 0;
        $single_employee_esic = 0;
        $single_prof_tax  = 0;
        $single_income_tax  = 0;
        $single_sal_adv = 0;
        $single_canteen_dedn  = 0;
        $single_other_deduc  = 0;
        $single_lwf  = 0;
        $single_stats_bonus  = 0;
        $single_earned_stats_bonus = 0;
        $single_earned_stats_bonus_arrear = 0;
        $single_travel_conveyence  = 0;
        $single_earned_stats_bonus = 0;

        $single_basic1 = 0;
        $single_hra1 = 0;
        $single_cld_all1 = 0;
        $single_spl_alw1 = 0;
        $single_total_fixed_gross1 = 0;
        $single_earned_basic1 = 0;
        $single_basic_arrear1 = 0;
        $single_earned_hra1 = 0;
        $single_hra_arrear1 = 0;
        $single_earned_child_edu_allowance1 = 0;
        $single_child_edu_allowance_arrear1 = 0;
        $single_earned_spl_alw1 = 0;
        $single_spl_alw_arrear1 = 0;
        $single_overtime1 = 0;
        $single_total_earned_gross1 = 0;
        $single_pf_wages1 = 0;
        $single_pf_wages_arrear_epfr1 = 0;
        $single_epfr1 = 0;
        $single_epfr_arrear1 = 0;
        $single_edli_charges1 = 0;
        $single_edli_charges_arrears1 = 0;
        $single_pf_admin_charges1 = 0;
        $single_pf_admin_charges_arrears1 = 0;
        $single_employer_esi1 = 0;
        $single_employer_lwf1 = 0;
        $single_ctc1 = 0;
        $single_epf_ee1 = 0;
        $single_epf_ee_arrear1 = 0;
        $single_employee_esic1 = 0;
        $single_prof_tax1 = 0;
        $single_income_tax1 = 0;
        $single_sal_adv1 = 0;
        $single_canteen_dedn1 = 0;
        $single_other_deduc1 = 0;
        $single_lwf1 = 0;
        $single_stats_bonus1 = 0;
        $single_earned_stats_bonus1 = 0;
        $single_earned_stats_bonus_arrear1 = 0;
        $single_travel_conveyence1 = 0;
        $single_earned_stats_bonus1 = 0;


    foreach($date as $single_dates){
        if($single_dates->lte($current_date)){
            foreach($employee_projected_salary as $key => $single_value){

                    // dd($single_value);
                    if ($single_value['payroll_months'] == $single_dates->format('Y-m-d')) {

                        $single_basic += $single_value['basic'];
                        // $payroll_value['Basic'] = $single_basic;
                        // $single_hra += $single_value['hra'];
                        // $payroll_value['Hra'] = $single_hra;
                        $single_cld_all  +=  $single_value['child_edu_allowance'];
                        $payroll_value['Child_allowance'] = $single_cld_all;
                        $single_spl_alw  +=  $single_value['spl_alw'];
                        $payroll_value['Special_allowance'] = $single_spl_alw;
                        // $single_total_fixed_gross  += $single_value['total_fixed_gross'];
                        // $payroll_value['total_Fixed_Gross'] = $single_total_fixed_gross;
                        $single_earned_basic +=  $single_value['earned_basic'];
                        $payroll_value['Basic'] = $single_earned_basic;
                        $single_basic_arrear +=  $single_value['basic_arrear'];
                        $payroll_value['basic_arrear'] = $single_basic_arrear;
                        $single_earned_hra  += $single_value['earned_hra'];
                        $payroll_value['Hra'] = $single_earned_hra;
                        $single_hra_arrear  += $single_value['hra_arrear'];
                        $payroll_value['hra_arrear'] = $single_hra_arrear;
                        $single_earned_child_edu_allowance += $single_value['earned_child_edu_allowance'];
                        $payroll_value['earned_child_allowance'] = $single_earned_child_edu_allowance;
                        $single_child_edu_allowance_arrear   += $single_value['child_edu_allowance_arrear'];
                        $payroll_value['children_allw_arrear'] = $single_child_edu_allowance_arrear;
                        $single_earned_spl_alw   +=  $single_value['earned_spl_alw'];
                        $payroll_value['earned_spl_alw'] = $single_earned_spl_alw;
                        $single_spl_alw_arrear  +=   $single_value['spl_alw_arrear'];
                        $payroll_value['arrear_spl_alw'] = $single_spl_alw_arrear;
                        $single_overtime  +=   $single_value['overtime'];
                        $payroll_value['over_time'] = $single_overtime;
                        $single_total_earned_gross  +=  $single_value['total_earned_gross'];
                        // $payroll_value['total_gross'] = $single_total_earned_gross;
                        // $single_pf_wages  +=   $single_value['pf_wages'];
                        // $payroll_value['pf_wages'] = $single_pf_wages;
                        // $single_pf_wages_arrear_epfr  +=  $single_value['pf_wages_arrear_epfr'];
                        $payroll_value['pf_wages_arrear'] = $single_pf_wages_arrear_epfr;
                        $single_epfr  +=  $single_value['epfr'];
                        // $payroll_value['epfr'] = $single_epfr;
                        // $single_epfr_arrear  +=  $single_value['epfr_arrear'];
                        $payroll_value['epfr_arrear'] = $single_epfr_arrear;
                        $single_edli_charges  +=  $single_value['edli_charges'];
                        // $payroll_value['edli_charges'] = $single_edli_charges;
                        // $single_edli_charges_arrears +=  $single_value['edli_charges_arrears'];
                        $payroll_value['edli_charges_arrears'] = $single_edli_charges_arrears;
                        $single_pf_admin_charges  +=  $single_value['pf_admin_charges'];
                        // $payroll_value['pf_admin'] = $single_pf_admin_charges;
                        // $single_pf_admin_charges_arrears +=   $single_value['pf_admin_charges_arrears'];
                        $payroll_value['arrear_charges'] = $single_pf_admin_charges_arrears;
                        // $single_employer_esi  +=  $single_value['employer_esi'];
                        // $payroll_value['emp_esic'] = $single_employer_esi;
                        $single_employer_lwf  +=  (int)($single_value['employer_lwf']);
                        $payroll_value['lef'] = $single_employer_lwf;
                        // $single_ctc  +=  $single_value['ctc'];
                        // $payroll_value['ctc'] = $single_ctc;
                        // $single_epf_ee  +=  $single_value['epf_ee'];
                        // $payroll_value['epf_ee'] = $single_epf_ee;
                        // $single_epf_ee_arrear  +=  $single_value['epf_ee_arrear'];
                        // $payroll_value['epf_ee_arrear'] = $single_epf_ee_arrear;
                        // $single_employee_esic  +=  $single_value['employee_esic'];
                        // $payroll_value['employee_esic'] = $single_employee_esic;
                        // $single_prof_tax  +=  $single_value['prof_tax'];
                        // $payroll_value['prof_tax'] = $single_prof_tax;
                        // $single_income_tax  +=  $single_value['income_tax'];
                        // $payroll_value['income_tax'] = $single_prof_tax;
                        $single_sal_adv  +=  $single_value['sal_adv'];
                        $payroll_value['sal_adv'] = $single_sal_adv;
                        $single_canteen_dedn  +=  $single_value['canteen_dedn'];
                        $payroll_value['canteen_dedn'] = $single_canteen_dedn;
                        $single_other_deduc  +=  $single_value['other_deduc'];
                        $payroll_value['otehr_dec'] = $single_other_deduc;
                        $single_lwf  +=  $single_value['lwf'];
                        $payroll_value['lwf'] = $single_lwf;
                        $single_stats_bonus  +=  $single_value['stats_bonus'];
                        $payroll_value['stats_bonus'] = $single_stats_bonus;
                        $single_earned_stats_bonus  +=  $single_value['earned_stats_bonus'];
                        $payroll_value['earned_stats_bonus'] = $single_earned_stats_bonus;
                        $single_earned_stats_bonus_arrear  +=  $single_value['earned_stats_arrear'];
                        $payroll_value['earned_stats_arrear'] = $single_earned_stats_bonus_arrear;
                        $single_travel_conveyence  +=  $single_value['travel_conveyance'];
                        $payroll_value['travel_conveyence'] = $single_travel_conveyence;
                        $single_earned_stats_bonus +=   $single_value['other_earnings'];
                        $payroll_value['earned_stats_bonus'] = $single_earned_stats_bonus;


                        $actual[] = $single_value;
                    }
                }
            } else {

            foreach($employee_projected_salary as $key => $single_value){
                if($single_value['payroll_months'] == $single_dates->format('Y-m-d')){

                        // $single_basic1 += $single_value['basic'];
                        // $compensatory_value['Basic'] = $single_basic1;
                        // $single_hra1 += $single_value['hra'];
                        // $compensatory_value['Hra'] = $single_hra1;
                        $single_cld_all1  +=  $single_value['child_edu_allowance'];
                        $compensatory_value['Child_allowance'] = $single_cld_all1;
                        $single_spl_alw1  +=  $single_value['spl_alw'];
                        $compensatory_value['Special_allowance'] = $single_spl_alw1;
                        // $single_total_fixed_gross1  += $single_value['total_fixed_gross'];
                        // $compensatory_value['total_Fixed_Gross'] = $single_total_fixed_gross1;
                        $single_earned_basic1 +=  $single_value['earned_basic'];
                        $compensatory_value['Basic'] = $single_earned_basic1;
                        $single_basic_arrear1 +=  $single_value['basic_arrear'];
                        $compensatory_value['basic_arrear'] = $single_basic_arrear1;
                        $single_earned_hra1  += $single_value['earned_hra'];
                        $compensatory_value['Hra'] = $single_earned_hra1;
                        $single_hra_arrear1  += $single_value['hra_arrear'];
                        $compensatory_value['hra_arrear'] = $single_hra_arrear1;
                        $single_earned_child_edu_allowance1 += $single_value['earned_child_edu_allowance'];
                        $compensatory_value['earned_child_allowance'] = $single_earned_child_edu_allowance1;
                        $single_child_edu_allowance_arrear1   += $single_value['child_edu_allowance_arrear'];
                        $compensatory_value['children_allw_arrear'] = $single_child_edu_allowance_arrear1;
                        $single_earned_spl_alw1   +=  $single_value['earned_spl_alw'];
                        $compensatory_value['earned_spl_alw'] = $single_earned_spl_alw1;
                        $single_spl_alw_arrear1  +=   $single_value['spl_alw_arrear'];
                        $compensatory_value['arrear_spl_alw'] = $single_spl_alw_arrear1;
                        $single_overtime1 +=   $single_value['overtime'];
                        $compensatory_value['over_time'] = $single_overtime1;
                        // $single_total_earned_gross1  +=  $single_value['total_earned_gross'];
                        // $compensatory_value['total_gross'] = $single_total_earned_gross1;
                        // $single_pf_wages1  +=   $single_value['pf_wages'];
                        // $compensatory_value['pf_wages'] = $single_pf_wages1;
                        // $single_pf_wages_arrear_epfr1  +=  $single_value['pf_wages_arrear_epfr'];
                        // $compensatory_value['pf_wages_arrear'] = $single_pf_wages_arrear_epfr1;
                        // $single_epfr1  +=  $single_value['epfr'];
                        // $compensatory_value['epfr'] = $single_epfr1;
                        // $single_epfr_arrear1  +=  $single_value['epfr_arrear'];
                        // $compensatory_value['epfr_arrear'] = $single_epfr_arrear1;
                        // $single_edli_charges1  +=  $single_value['edli_charges'];
                        // $compensatory_value['edli_charges'] = $single_edli_charges1;
                        // $single_edli_charges_arrears1 +=  $single_value['edli_charges_arrears'];
                        // $compensatory_value['edli_charges_arrears'] = $single_edli_charges_arrears1;
                        // $single_pf_admin_charges1  +=  $single_value['pf_admin_charges'];
                        // $compensatory_value['pf_admin'] = $single_pf_admin_charges1;
                        // $single_pf_admin_charges_arrears1 +=   $single_value['pf_admin_charges_arrears'];
                        // $compensatory_value['arrear_charges'] = $single_pf_admin_charges_arrears1;
                        // $single_employer_esi1  +=  $single_value['employer_esi'];
                        // $compensatory_value['emp_esic'] = $single_employer_esi1;
                        // $single_employer_lwf1  +=  (int)($single_value['employer_lwf']);
                        // $compensatory_value['lef'] = $single_employer_lwf1;
                        // $single_ctc1  +=  $single_value['ctc'];
                        // $compensatory_value['ctc'] = $single_ctc1;
                        // $single_epf_ee1  +=  $single_value['epf_ee'];
                        // $compensatory_value['epf_ee'] = $single_epf_ee1;
                        // $single_epf_ee_arrear1  +=  $single_value['epf_ee_arrear'];
                        // $compensatory_value['epf_ee_arrear'] = $single_epf_ee_arrear1;
                        // $single_employee_esic1  +=  $single_value['employee_esic'];
                        // $compensatory_value['employee_esic'] = $single_employee_esic1;
                        // $single_prof_tax1  +=  $single_value['prof_tax'];
                        // $compensatory_value['prof_tax'] = $single_prof_tax1;
                        // $single_income_tax1  +=  $single_value['income_tax'];
                        // $compensatory_value['income_tax'] = $single_prof_tax1;
                        $single_sal_adv1  +=  $single_value['sal_adv'];
                        $compensatory_value['sal_adv'] = $single_sal_adv1;
                        $single_canteen_dedn1  +=  $single_value['canteen_dedn'];
                        $compensatory_value['canteen_dedn'] = $single_canteen_dedn1;
                        $single_other_deduc1  +=  $single_value['other_deduc'];
                        $compensatory_value['otehr_dec'] = $single_other_deduc1;
                        $single_lwf1  +=  $single_value['lwf'];
                        $compensatory_value['lwf'] = $single_lwf1;
                        $single_stats_bonus1  +=  $single_value['stats_bonus'];
                        $compensatory_value['stats_bonus'] = $single_stats_bonus1;
                        $single_earned_stats_bonus1  +=  $single_value['earned_stats_bonus'];
                        $compensatory_value['earned_stats_bonus'] = $single_earned_stats_bonus1;
                        $single_earned_stats_bonus_arrear1  +=  $single_value['earned_stats_arrear'];
                        $compensatory_value['earned_stats_arrear'] = $single_earned_stats_bonus_arrear1;
                        $single_travel_conveyence1  +=  $single_value['travel_conveyance'];
                        $compensatory_value['travel_conveyence'] = $single_travel_conveyence1;
                        $single_earned_stats_bonus1 +=   $single_value['other_earnings'];
                        $compensatory_value['earned_stats_bonus'] = $single_earned_stats_bonus1;


                    $projection[] = $single_value;

                }
            }
        }
}

        // dd($projection);

        foreach ($payroll_value as $key => $single_details) {
            if ($single_details == "0" || $single_details == null || $single_details == 0) {
                unset($payroll_value[$key]);
            }
        }

        foreach ($compensatory_value as $key => $single_details) {
            if ($single_details == "0" || $single_details == null) {
                unset($compensatory_value[$key]);
            }
        }

        $res = [];
        $res1 = [];
        foreach ($payroll_value as $key => $value) {
            if (isset($compensatory_value[$key])) {
                $res[$key]  =  $compensatory_value[$key] - $payroll_value[$key];
            } else {
                $res1[$key]  = $payroll_value[$key];
            }
        }

        $total_income = 0;
        foreach ($res as $single_value) {
            $total_income  += $single_value;
        }

        return ["Actual" => $payroll_value, "Projection" => $compensatory_value, "Total" => $res, "Total Income" => $total_income];
    }


    public function HraExceptionCalc($user_id, $month)
    {

        $timeperiod = VmtOrgTimePeriod::where('status', '1')->first();
        $start_date = Carbon::parse($timeperiod->start_date)->format('Y-m-d');

        $end_date = Carbon::parse($timeperiod->end_date)->format('Y-m-01');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');

        $date_range = CarbonPeriod::create($start_date, '1 month', $end_date);


        $date = [];
        foreach ($date_range as $key => $value) {
            $date[] = $value->format('M Y');
        }

        $annual =  $this->getAnnualProjection($user_id, $month);

        // dd($annual);

        if (isset($annual['Total']['arrear_Hra'])) {
            $annual_Hra =  $annual['Total']['arrear_Hra'] + $annual['Total']['Hra'];
        } else {
            $annual_Hra = $annual['Total']['Hra'];
        }


        if (isset($annual['Total']['arrear_basic'])) {
            $annual_basic =  $annual['Total']['arrear_basic'] + $annual['Total']['Basic'];
        } else {
            $annual_basic = $annual['Total']['Basic'];
        }

        $annual_basic = $annual_basic * 0.5;

        $annual_basic10per  = $annual_basic * 0.10;

        $excessOfRentPaid = $annual_Hra - $annual_basic10per;


        $res11 = ["total_earnedbasic" => $annual_basic, "total_hrareceived" => $annual_Hra, "Excess_of_rentpaid" => $excessOfRentPaid];

        $total_excep  = min(array_values($res11));

        $res = ["total_earnedbasic" => $annual_basic, "total_hrareceived" => $annual_Hra, "Excess_of_rentpaid" => $excessOfRentPaid, "total_exception_amt" => $total_excep];


        foreach ($date as $single_date) {
            $HraException['month'] = $single_date;
            $HraException['Earned_basic'] = $annual_basic / 12;
            $HraException['Hra_received'] =  round($annual_Hra / 12);
            $HraException['rent_paid_over_10per'] = round(( $annual_Hra - $annual_basic10per) / 12);

            array_push($res, $HraException);
        }


        foreach ($res as $key => $value) {
            if (is_int($key)) {
                $min_value  =  min(array_values($res[$key]));
                $res[$key]['Exception_amt'] = $min_value;
            }
        }

        return ($res);
    }


    public function newRegimeTaxReportCalculation($regime, $total_income)
    {

        if ($regime == 'new') {
            // Employeer Income Is Greater than 300000 and Less Than  600000
            if ($total_income > 300000 && $total_income <= 600000) {
                $taxable_amount = ($total_income - 300000) * 5 / 100;
                return $taxable_amount;
            } else
                // Employeer Income Is Greater than 600000 and Less Than  900000
                if ($total_income > 600000 && $total_income <= 900000) {
                    $taxable_amount = ($total_income - 600000) * 10 / 100;
                    return $taxable_amount;
                } else
                    // Employeer Income Is Greater than 900000 and Less Than  1200000
                    if ($total_income > 900000 && $total_income <= 1200000) {
                        $taxable_amount = ($total_income - 900000) * 15 / 100;
                        return $taxable_amount;
                    } else
                        // Employeer Income Is Greater than 1200000 and Less Than  1500000
                        if ($total_income > 1200000 && $total_income < 1500000) {
                            $taxable_amount = ($total_income - 1200000) * 20 / 100;
                            return $taxable_amount;
                        } else
                            // Employeer Income Is Greater than 1500000
                            if ($total_income > 1500000) {

                                $taxable_amount = ($total_income - 1500000) * 30 / 100;
                                $total_amount = floor($taxable_amount + 150000);
                                return $total_amount;
                            }
                    }
     }


        public function rebateUs87acalc($regime,$taxable_income,$tax_income){

            if($regime == "new"){
                if($taxable_income > 700000){
                    $rebate = 0;
                    return $rebate;
                }else{
                    if($tax_income >= 25000){
                        $rebate = 25000;
                        return $rebate;
                    }elseif($tax_income < 25000){
                        $rebate = $tax_income;
                        return $rebate;
                    }
                }
            }elseif($regime == "old"){
                if($taxable_income > 500000){
                    $rebate = 0;
                    return $rebate;
                }else{
                    if($tax_income >= 12500){
                        $rebate = 12500;
                        return $rebate;
                    }elseif($tax_income < 12500){
                        $rebate = $tax_income;
                        return $rebate;
                    }
                }
            }
        }


    public function fetchInvestmentTaxReports()
    {
        $reportsdata = array();

        // $client_id = ["2","3","4"];

        $payroll_month = "2023-08-01";

        // $inv_emp = VmtInvFEmpAssigned::pluck('user_id')->toArray();

        // $inv_emp = ['146','147'];

        // dd($inv_emp);

        $user_details = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
            ->join('vmt_inv_f_emp_assigned','vmt_inv_f_emp_assigned.user_id','=','users.id')
            ->where("users.active", "1");
            // ->where("users.id", "167");
            // ->where("vmt_inv_f_emp_assigned.user_id", "182");
            // ->whereIn("users.client_id", $client_id)
            // ->whereIn("users.id", $inv_emp)


        $Employee_details = $user_details->get([
            'users.id as user_id',
            'users.user_code as Employee Code',
            'users.name as Employee Name',
            'vmt_employee_details.gender as Gender',
            'vmt_employee_details.pan_number as PAN Number',
            'vmt_employee_details.dob as Date Of Birth',
            'vmt_employee_details.doj as Date Of Joining',
            'vmt_employee_statutory_details.tax_regime as Tax Regime'
        ])->toArray();

        $inv_emp = $user_details->pluck("users.id")->toarray();

        // dd($Employee_details,$inv_emp );

     $employee_salary_details = array();
     $professinal_income = array();

        foreach ($Employee_details as $key => $single_user) {

          $single_user_id = User::where('id', $single_user['user_id'])->first();

            $payroll_date = VmtPayroll::where('payroll_date',  $payroll_month)->where('client_id', $single_user_id->client_id)->first();

            if (!empty($payroll_date)) {

                $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $single_user['user_id']);

            }

            if ($emp_payroll->exists()) {
                $emp_payroll = $emp_payroll->first();
                $employee_projected_salary = AbsSalaryProjection::where('vmt_emp_payroll_id', $emp_payroll->id);
            }

            if ($employee_projected_salary->exists()) {

                $employee_salary_details[$key]["Employee Code"] =$single_user['Employee Code'];
                $employee_salary_details[$key]["Employee Name"] =$single_user['Employee Name'];
                $employee_salary_details[$key]["Gender"] =$single_user['Gender'];
                $employee_salary_details[$key]["PAN Number"] =$single_user['PAN Number'];
                $employee_salary_details[$key]["Date Of Birth"] =Carbon::parse($single_user['Date Of Birth'])->format('d-m-Y');
                $employee_salary_details[$key]["Date Of Joining"] =Carbon::parse($single_user['Date Of Joining'])->format('d-m-Y');
                $employee_salary_details[$key]["Tax Regime"] = ucfirst($single_user['Tax Regime'])." Regime";
                $professinal_income[$key]["Regime"] = $single_user['Tax Regime'];
                $employee_salary_details[$key]["Basic"] =$employee_projected_salary->sum('earned_basic');
                $employee_salary_details[$key]["Basic Arrears"] =$employee_projected_salary->sum('basic_arrear');
                $employee_salary_details[$key]["Dearness Allowance"] =$employee_projected_salary->sum('dearness_allowance_earned');
                $employee_salary_details[$key]["Dearness Allowance Arrears"] =$employee_projected_salary->sum('dearness_allowance_arrear');
                $employee_salary_details[$key]["Variable Dearness Allowance"] =$employee_projected_salary->sum('vda_earned');
                $employee_salary_details[$key]["Variable Dearness Allowance Arrears"] =$employee_projected_salary->sum('vda_arrear');
                $employee_salary_details[$key]["HRA"] =$employee_projected_salary->sum('earned_hra');
                $employee_salary_details[$key]["HRA Arrears"] =$employee_projected_salary->sum('hra_arrear');
                $employee_salary_details[$key]["Child Education Allowance"] =$employee_projected_salary->sum('earned_child_edu_allowance');
                $employee_salary_details[$key]["Child Education Allowance Arrears"] =$employee_projected_salary->sum('child_edu_allowance_arrear');
                $employee_salary_details[$key]["Statutory Bonus"] =$employee_projected_salary->sum('earned_stats_bonus');
                $employee_salary_details[$key]["Statutory Bonus Arrears"] =$employee_projected_salary->sum('earned_stats_arrear');
                $employee_salary_details[$key]["Medical Allowance"] =$employee_projected_salary->sum('medical_allowance_earned');
                $employee_salary_details[$key]["Medical Allowance Arrears"] =$employee_projected_salary->sum('medical_allowance_arrear');
                $employee_salary_details[$key]["Communicaton Allowance"] =$employee_projected_salary->sum('communication_allowance_earned');
                $employee_salary_details[$key]["Communication Allowance Arrears"] =$employee_projected_salary->sum('communication_allowance_arrear');
                $employee_salary_details[$key]["Leave Travel Allowance"] =$employee_projected_salary->sum('earned_lta');
                $employee_salary_details[$key]["Leave Travel Allowance Arrears"] =$employee_projected_salary->sum('lta_arrear');
                $employee_salary_details[$key]["Food Allowance"] =$employee_projected_salary->sum('food_allowance_earned');
                $employee_salary_details[$key]["Food Allowance Arrears"] =$employee_projected_salary->sum('food_allowance_arrear');
                $employee_salary_details[$key]["Special Allowance"] =$employee_projected_salary->sum('earned_spl_alw');
                $employee_salary_details[$key]["Special Allowance Arrears"] =$employee_projected_salary->sum('spl_alw_arrear');
                $employee_salary_details[$key]["Other Allowance"] =$employee_projected_salary->sum('other_allowance_earned');
                $employee_salary_details[$key]["Other Allowance Arrears"] =$employee_projected_salary->sum('other_allowance_arrear');
                $employee_salary_details[$key]["Washing Allowance"] =$employee_projected_salary->sum('washing_allowance_earned');
                $employee_salary_details[$key]["Washing Allowance Arrears"] =$employee_projected_salary->sum('washing_allowance_arrear');
                $employee_salary_details[$key]["Uniform Allowance"] =$employee_projected_salary->sum('uniform_allowance_earned');
                $employee_salary_details[$key]["Uniform Allowance Arrears"] =$employee_projected_salary->sum('uniform_allowance_arrear');
                $employee_salary_details[$key]["Vehicle Reimbursement"] =$employee_projected_salary->sum('vehicle_reimbursement_earned');
                $employee_salary_details[$key]["Vehicle Reimbursement Arrears"] =$employee_projected_salary->sum('vehicle_reimbursement_arrear');
                $employee_salary_details[$key]["Driver Salary Reimbursement"] =$employee_projected_salary->sum('driver_salary_earned');
                $employee_salary_details[$key]["Driver Salary Reimbursement Arrears"] =$employee_projected_salary->sum('driver_salary_arrear');
                $professinal_income[$key]["Professional Tax"] =$employee_projected_salary->sum('prof_tax');
                $professinal_income[$key]["Income Tax"] =$employee_projected_salary->sum('income_tax');
                $employee_salary_details[$key]["Overtime"] =$employee_projected_salary->sum('overtime');
                $employee_salary_details[$key]["Overtime Arrears"] =$employee_projected_salary->sum('overtime_arrear');

                $employee_salary_details[$key]["Arrears"] = $employee_projected_salary->sum('basic_arrear')+ $employee_projected_salary->sum('dearness_allowance_arrear') + $employee_projected_salary->sum('vda_arrear') + $employee_projected_salary->sum('hra_arrear')+$employee_projected_salary->sum('hra_arrear') +
                                                            $employee_projected_salary->sum('child_edu_allowance_arrear') + $employee_projected_salary->sum('earned_stats_arrear') + $employee_projected_salary->sum('medical_allowance_arrear')
                                                            +$employee_projected_salary->sum('communication_allowance_arrear')  + $employee_projected_salary->sum('food_allowance_arrear') + $employee_projected_salary->sum('lta_arrear') + $employee_projected_salary->sum('spl_alw_arrear') + $employee_projected_salary->sum('other_allowance_arrear')
                                                            + $employee_projected_salary->sum('washing_allowance_arrear') + $employee_projected_salary->sum('uniform_allowance_arrear') + $employee_projected_salary->sum('vehicle_reimbursement_arrear') +$employee_projected_salary->sum('driver_salary_arrear');


                $employee_salary_details[$key]["Incentive"] =$employee_projected_salary->sum('incentive');;
                $employee_salary_details[$key]["Other Earnings"] =$employee_projected_salary->sum('other_earnings');
                $employee_salary_details[$key]["Referral Bonus"] =$employee_projected_salary->sum('referral_bonus');
                $employee_salary_details[$key]["Annual Statutory Bonus"] =$employee_projected_salary->sum('earned_stats_bonus');
                $employee_salary_details[$key]["Ex-Gratia"] =$employee_projected_salary->sum('ex_gratia');
                $employee_salary_details[$key]["Attendance Bonus"] =$employee_projected_salary->sum('attendance_bonus');
                $employee_salary_details[$key]["Daily Allowance"] =$employee_projected_salary->sum('daily_allowance');
                $employee_salary_details[$key]["Leave Encashments"] =$employee_projected_salary->sum('leave_encashment');
                $employee_salary_details[$key]["Gift"] =$employee_projected_salary->sum('gift_payment');
                $employee_salary_details[$key]["Annual Gross Salary"] =$employee_projected_salary->sum('earned_basic') + $employee_projected_salary->sum('dearness_allowance_earned') + $employee_projected_salary->sum('vda_earned')
                                                                     +$employee_projected_salary->sum('earned_hra') +$employee_projected_salary->sum('earned_child_edu_allowance') + $employee_projected_salary->sum('medical_allowance_earned')
                                                                     + $employee_projected_salary->sum('communication_allowance_earned')+ $employee_projected_salary->sum('earned_lta') +$employee_projected_salary->sum('food_allowance_earned')
                                                                     +$employee_projected_salary->sum('earned_spl_alw')+$employee_projected_salary->sum('other_allowance_earned')+$employee_projected_salary->sum('washing_allowance_earned')+
                                                                     $employee_projected_salary->sum('uniform_allowance_earned') +
                                                                     $employee_projected_salary->sum('basic_arrear')+ $employee_projected_salary->sum('dearness_allowance_arrear') + $employee_projected_salary->sum('vda_arrear') + $employee_projected_salary->sum('hra_arrear')+$employee_projected_salary->sum('hra_arrear') +
                                                                     $employee_projected_salary->sum('child_edu_allowance_arrear') + $employee_projected_salary->sum('earned_stats_arrear') + $employee_projected_salary->sum('medical_allowance_arrear')
                                                                     +$employee_projected_salary->sum('communication_allowance_arrear')  + $employee_projected_salary->sum('food_allowance_arrear') + $employee_projected_salary->sum('lta_arrear') + $employee_projected_salary->sum('spl_alw_arrear') + $employee_projected_salary->sum('other_allowance_arrear')
                                                                     + $employee_projected_salary->sum('washing_allowance_arrear') + $employee_projected_salary->sum('uniform_allowance_arrear') + $employee_projected_salary->sum('vehicle_reimbursement_arrear') +$employee_projected_salary->sum('driver_salary_arrear');

            }

        }

        // dd($employee_salary_details);

        $salary_data['headers'] = array('Employee Code','Employee Name','Gender','PAN Number','Date Of Birth','Date Of Joining','Tax Regime','Basic','Basic Arrears',
        'Dearness Allowance','Dearness Allowance Arrears','Variable Dearness Allowance','Variable Dearness Allowance Arrears','HRA','HRA Arrears','Child Education Allowance',
        'Child Education Allowance Arrears','Statutory Bonus','Statutory Bonus Arrears','Medical Allowance','Medical Allowance Arrears','Communicaton Allowance','Communication Allowance Arrears', 'Leave Travel Allowance',
        'Leave Travel Allowance Arrears','Food Allowance','Food Allowance Arrears','Special Allowance','Special Allowance Arrears','Other Allowance','Other Allowance Arrears',
        'Washing Allowance','Washing Allowance Arrears','Uniform Allowance','Uniform Allowance Arrears','Vehicle Reimbursement','Vehicle Reimbursement Arrears','Driver Salary Reimbursement',
        'Driver Salary Reimbursement Arrears','Overtime','Overtime Arrears','Arrears','Incentive','Other Earnings','Referral Bonus','Annual Statutory Bonus','Ex-Gratia','Attendance Bonus',
        'Daily Allowance','Leave Encashments','Gift','Annual Gross Salary','HRA Exceptions','CEA Exceptions','LTA Exceptions','Previous Employer Gross','Previous Employer PT',
        'Previous Employer Standard Deduction','Gross Total Income','(a) salary as per provision as containeds in sec.17(1)','(b) Value of Prequisites u/s 17 (2)','(c) Profits in lie u of salary under section 13(3)',
        '(d) Total','2. Less: Allowance to the extent exempt u/s 10','3. Balance (1-2)','(a) Standard Deduction u/s 16(ia)','(b) Entertainment allowance u/s 16(ii)','(c) Tax on employment u/s 16(iii)',
        '5. Aggregate of 4(a), (b) and (c)', '6. Income chargeable under head salaries(3-5)','(a) Deductions u/s 24 - Interest','(b) Other Source Of Income','(c) 80EE Additional interest on House property','8. Gross total income (6+7)'
        );

        // dd($salary_data['headers'],$employee_salary_details);

        // dd($professinal_income);


         $v_form_template = [];

        foreach ($inv_emp as $single_inv_users) {

         $v_form_template[] = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
         ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
         ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
         ->leftjoin('vmt_inv_f_emp_assigned', 'vmt_inv_f_emp_assigned.id', '=', 'vmt_inv_emp_formdata.f_emp_id')
         ->leftjoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_inv_f_emp_assigned.user_id')
         ->leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_compensatory_details.user_id')
         ->where('vmt_inv_f_emp_assigned.user_id', $single_inv_users)
         ->get(
             [
                'vmt_inv_f_emp_assigned.user_id',
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

        }



        foreach ($Employee_details as $key => $single_user) {
            $value =  $this->HraExceptionCalc(User::where('user_code', $single_user['Employee Code'])->first()->id, $payroll_month)['total_exception_amt'];
            $employee_salary_details[$key]["HRA Exceptions"] = $value;
            $employee_salary_details[$key]["CEA Exceptions"] = 0;
            $employee_salary_details[$key]["LTA Exceptions"] = 0;
        }

        // Previous employeer income

        foreach($inv_emp as $single_inv_users){
          foreach($v_form_template as $dec_amt){
            foreach($dec_amt as $single_value){
                if(in_array($single_inv_users,$single_value)){
                  if($single_value['section_group'] == 'Previous Employer Income'){
                     foreach ($Employee_details as $key => $single_user) {
                        if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
                             $employee_salary_details[$key][$single_value['particular']] = $single_value['dec_amount'];
                        }
                    }
                }
            }
        }
    }
}


//          $sumofprevious_emp =0;
//          foreach($inv_emp as $single_inv_users){
//           foreach($v_form_template as $dec_amt){
//                  foreach($dec_amt as $single_value){
//                     if($single_value['particular'] == 'Previous Employer Gross'){
//                       if(in_array($single_inv_users,$single_value)){
//                 foreach ($Employee_details as $key => $single_user) {
//                     if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
//                         $sumofprevious_emp  += $single_value['dec_amount'];
//                       $employee_salary_details[$key]["Gross Total Income"] = $sumofprevious_emp + $employee_salary_details[$key]["Annual Gross Salary"];
//                     }
//                     }
//                 }
//             }else{
//                     $employee_salary_details[$key]["Gross Total Income"] = $employee_salary_details[$key]["Annual Gross Salary"];
//                     }
//         }
//     }
// }

    $sumofpreEmpgross = [];
    foreach($inv_emp as $single_inv_users){
            foreach($v_form_template as $dec_amt){
                foreach($dec_amt as $single_value){
                    if(in_array($single_inv_users,$single_value)){
                    if($single_value['particular'] == 'Previous Employer Gross'){
                        foreach ($Employee_details as $key => $single_user) {
                            if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
                                $sumofpreEmpgross[$single_inv_users][$single_value['dec_amount']] = $single_value['dec_amount'];
                            }
                        }
                    }
                }
            }
        }
    }

        // dd($sumofpreEmpgross);

$preEmpGross = [];
$sim = [];
    foreach($inv_emp as $key11 => $single_inv_users){
        if(array_key_exists($single_inv_users,$sumofpreEmpgross)){
         foreach($sumofpreEmpgross as $key => $single_value){
            if($single_inv_users == $key){

                // array_sum(array_values($single_value));
             $preEmpGross[$single_inv_users] =  array_sum(array_values($single_value)) + $employee_salary_details[$key11]["Annual Gross Salary"];
            }
         }
        }else{

         $preEmpGross[$single_inv_users] = $employee_salary_details[$key11]["Annual Gross Salary"];
        }
     }

    //  dd($preEmpGross);

     foreach($inv_emp as $single_inv_users){
        foreach ($Employee_details as $key => $single_user) {
             if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
            $employee_salary_details[$key]['Gross Total Income'] = $preEmpGross[$single_inv_users];
             }
        }
    }



$inv_stantard_deduction = [];
$inv_previous_emp_pt = [];
$inv_previous_emp_inv_dec = [];
$sumOfOtherSourceOfIncome =[];
$sumof80Ee = [];
$othersource = [];
$sumOfpreviousempincome = [];


     foreach($inv_emp as $single_inv_users){
        foreach($v_form_template as $dec_amt){
            foreach($dec_amt as $single_value){
                if(in_array($single_inv_users,$single_value)){
                    foreach ($Employee_details as $key => $single_user) {
                        if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
                            if ($single_value['section_group'] == "Previous Employer Income") {
                                // $sumOfpreviousempincome += $single_value['dec_amount'];
                                // $sumOfpreviousempincome[$single_inv_users][$single_value['dec_amount']] = $single_value['dec_amount'];

                                if ($single_value['particular'] == "Previous Employer Standard Deduction") {
                                    $inv_stantard_deduction[$single_inv_users] = $single_value['dec_amount'];
                                }

                                if ($single_value['particular'] == "Previous Employer PT") {
                                    $inv_previous_emp_pt[$single_inv_users] = $single_value['dec_amount'];
                                }

                                if ($single_value['particular'] == "Previous Employer Income Tax Deduction") {
                                    $inv_previous_emp_inv_dec[$single_inv_users] = $single_value['dec_amount'];
                                    $inv_previous_emp_inv_perticular = 'Previous Employer Income Tax Deduction';
                                }
                            }
                            if($single_value['particular'] == "Income earned from other sources"){
                                $othersource[$single_inv_users] = $single_value['dec_amount'];
                            }

                            if ($single_value['section'] == "80EE") {
                                     $sumof80Ee[$single_inv_users] = $single_value['dec_amount'];
                               }
                        }
                }
            }
        }
    }
}


$sumofothersource = [];
    foreach($inv_emp as $key11 => $single_inv_users){
        if(array_key_exists($single_inv_users,$othersource)){
         foreach($othersource as $key => $single_value){
            if($single_inv_users == $key){
             $sumofothersource[$single_inv_users] =  $othersource[$single_inv_users];
            }
         }
        }else{
         $sumofothersource[$single_inv_users] = 0;
        }
     }


$valueof_80ee = [];
    foreach($inv_emp as $key11 => $single_inv_users){
        if(array_key_exists($single_inv_users,$sumof80Ee)){
         foreach($sumof80Ee as $key => $single_value){
            if($single_inv_users == $key){
             $valueof_80ee[$single_inv_users] =  $sumof80Ee[$single_inv_users];
            }
         }
        }else{
         $valueof_80ee[$single_inv_users] = 0;
        }
     }

    $sumofstddeduction = [];
        foreach($inv_emp as $key11 => $single_inv_users){
            if(array_key_exists($single_inv_users,$inv_stantard_deduction)){
            foreach($inv_stantard_deduction as $key => $single_value){
                if($single_inv_users == $key){
                $sumofstddeduction[$single_inv_users] =  ($inv_stantard_deduction[$key] + $employee_salary_details[$key11]["Annual Gross Salary"]) >= 50000 ? 50000 : $inv_stantard_deduction[$key] + $employee_salary_details[$key11]["Annual Gross Salary"];
                }
            }
            }else{
            $sumofstddeduction[$single_inv_users] = $employee_salary_details[$key11]["Annual Gross Salary"] >= 50000 ? 50000 : $employee_salary_details[$key11]["Annual Gross Salary"];
            }
        }

        // dd($sumofstddeduction);
    $sumofptvalue = [];
    foreach($inv_emp as $key11 => $single_inv_users){
        if(array_key_exists($single_inv_users,$inv_previous_emp_pt)){
         foreach($inv_previous_emp_pt as $key => $single_value){
            if($single_inv_users == $key){
             $sumofptvalue[$single_inv_users] =  ($inv_previous_emp_pt[$key] + $professinal_income[$key11]["Professional Tax"]) >= 2500 ? 2500 : $inv_previous_emp_pt[$key] + $professinal_income[$key11]["Professional Tax"];
            }
         }
        }else{
         $sumofptvalue[$single_inv_users] = $professinal_income[$key11]["Professional Tax"] >= 2500 ? 2500 : $professinal_income[$key11]["Professional Tax"];
        }
     }


        foreach($inv_emp as $single_inv_users){

        foreach ($Employee_details as $key => $single_user) {
            if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
            $employee_salary_details[$key]["(a) salary as per provision as containeds in sec.17(1)"] = ($employee_salary_details[$key]["Gross Total Income"]);
            $employee_salary_details[$key]["(b) Value of Prequisites u/s 17 (2)"] = 0;
            $employee_salary_details[$key]["(c) Profits in lie u of salary under section 13(3)"] = 0;
            $employee_salary_details[$key]["(d) Total"] = ($employee_salary_details[$key]["(a) salary as per provision as containeds in sec.17(1)"]) + ($employee_salary_details[$key]["(b) Value of Prequisites u/s 17 (2)"]) + ($employee_salary_details[$key]["(c) Profits in lie u of salary under section 13(3)"]);
            $employee_salary_details[$key]["2. Less: Allowance to the extent exempt u/s 10"] = ($employee_salary_details[$key]["HRA Exceptions"]) - ($employee_salary_details[$key]["CEA Exceptions"]) +  ($employee_salary_details[$key]["LTA Exceptions"]);
            $employee_salary_details[$key]["3. Balance (1-2)"] = ($employee_salary_details[$key]["(d) Total"])  - ($employee_salary_details[$key]["2. Less: Allowance to the extent exempt u/s 10"]) ;
            $employee_salary_details[$key]["(a) Standard Deduction u/s 16(ia)"] = $sumofstddeduction[$single_inv_users];
            $employee_salary_details[$key]["(b) Entertainment allowance u/s 16(ii)"] = 0;
            $employee_salary_details[$key]["(c) Tax on employment u/s 16(iii)"] = $sumofptvalue[$single_inv_users];
            $employee_salary_details[$key]["5. Aggregate of 4(a), (b) and (c)"] = $sumofstddeduction[$single_inv_users] + 0 + $sumofptvalue[$single_inv_users];
            $employee_salary_details[$key]["6. Income chargeable under head salaries(3-5)"] = $employee_salary_details[$key]["3. Balance (1-2)"] - $employee_salary_details[$key]["5. Aggregate of 4(a), (b) and (c)"];
            $employee_salary_details[$key]['(a) Deductions u/s 24 - Interest'] = 0;
            $employee_salary_details[$key]['(b) Other Source Of Income'] = $sumofothersource[$single_inv_users] ;
            $employee_salary_details[$key]['(c) 80EE Additional interest on House property'] = $valueof_80ee[$single_inv_users];
            $employee_salary_details[$key]['8. Gross total income (6+7)'] = $employee_salary_details[$key]["6. Income chargeable under head salaries(3-5)"] + $employee_salary_details[$key]['(a) Deductions u/s 24 - Interest'] + $employee_salary_details[$key]['(b) Other Source Of Income'] + $employee_salary_details[$key]['(c) 80EE Additional interest on House property'];
            }
        }
    }


    $v_form_template_header = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
    ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
    ->get()->toArray();

    foreach($v_form_template_header as $single_value){
        if($single_value['section_group'] == "Section 80C & 80CC "){
        array_push( $salary_data['headers'] ,$single_value['particular']);
        }
    }
       // inv emp data Section 80C & 80CC

        $sumofsection80cc = [];
            foreach($inv_emp as $single_inv_users){
                    foreach($v_form_template as $dec_amt){
                        foreach($dec_amt as $single_value){
                            if(in_array($single_inv_users,$single_value)){
                            if($single_value['section_group'] == 'Section 80C & 80CC '){
                                foreach ($Employee_details as $key => $single_user) {
                                    if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
                                        $employee_salary_details[$key][$single_value['particular']] = $single_value['dec_amount'];
                                        $sumofsection80cc[$single_inv_users][$single_value['dec_amount']] = $single_value['dec_amount'];
                                    }
                                }
                            }
                        }
                    }
                }
            }



        array_push( $salary_data['headers'] , 'Section 80CCE Total');


    foreach($inv_emp as $key11 => $single_inv_users){
        if(array_key_exists($single_inv_users,$sumofsection80cc)){
         foreach($sumofsection80cc as $key => $single_value){
            if($single_inv_users == $key){
             $sumofsection80 =  array_sum(array_values($single_value));
            $employee_salary_details[$key11]['Section 80CCE Total'] =  $sumofsection80 >= 150000 ? 150000 : $sumofsection80;
            }
         }
        }else{
         $employee_salary_details[$key11]['Section 80CCE Total'] = 0;
        }
     }


        foreach($v_form_template_header as $single_value){
            if($single_value['section_group'] == "Other Excemptions "){
            array_push( $salary_data['headers'] ,$single_value['particular']);
            }
        }
        // inv emp data otherexception

        $sumofotherexception = [];
        foreach($inv_emp as $single_inv_users){
                foreach($v_form_template as $dec_amt){
                    foreach($dec_amt as $single_value){
                       // dd($single_inv_users);
                        if(in_array($single_inv_users,$single_value)){
                        if($single_value['section_group'] == 'Other Excemptions '){
                            foreach ($Employee_details as $key => $single_user) {
                                if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
                                    if($single_value['max_amount'] == 0){
                                            $max_decamount = $single_value['dec_amount'];
                                    }elseif ($single_value['max_amount'] < $single_value['dec_amount']){
                                        $max_decamount = $single_value['max_amount'];
                                    }else{
                                        $max_decamount = $single_value['dec_amount'];
                                    }
                                    $employee_salary_details[$key][$single_value['particular']] = $max_decamount;
                                    $sumofotherexception[$single_inv_users][$max_decamount] =  $max_decamount;
                                }
                            }
                        }
                    }
                }
            }
        }


        array_push( $salary_data['headers'] , '10. Aggregate of deductible amount under Chapter VI-A');

        $sum_execption = [];

        foreach($inv_emp as $key11 => $single_inv_users){
           if(array_key_exists($single_inv_users,$sumofotherexception)){
            foreach($sumofotherexception as $key => $single_value){
               if($single_inv_users == $key){
                $sumofother =  array_sum(array_values($single_value));
               $employee_salary_details[$key11]['10. Aggregate of deductible amount under Chapter VI-A'] = $sumofother + $employee_salary_details[$key11]['Section 80CCE Total'];
               $sum_execption[$single_inv_users] = $sumofother;
               }
            }
           }else{
            $employee_salary_details[$key11]['10. Aggregate of deductible amount under Chapter VI-A'] = 0 + $employee_salary_details[$key11]['Section 80CCE Total'];
            $sum_execption[$single_inv_users] = 0;
           }
        }

        // dd($sum_execption);
        // dd($professinal_income);

        $income = [];

        foreach($inv_emp as $key11 => $single_inv_users){
             foreach($sum_execption as $key => $single_value){
                if($single_inv_users == $key){
                    if($professinal_income[$key11]["Regime"] == "old" || $professinal_income[$key11]["Regime"] == ""){
                    $income[$single_inv_users] =  $employee_salary_details[$key11]['Gross Total Income'] - $employee_salary_details[$key11]['Section 80CCE Total'] - $sum_execption[$key] ;
                    }
                    else if ($professinal_income[$key11]["Regime"] == "new"){
                        $income[$single_inv_users] = $employee_salary_details[$key11]["Annual Gross Salary"] - $employee_salary_details[$key11]["(a) Standard Deduction u/s 16(ia)"] -  $employee_salary_details[$key11]['(a) Deductions u/s 24 - Interest'];
                    }
                }
             }
         }

        // dd($income);


        array_push( $salary_data['headers'] ,
        '11.Total Income (8-10)',
        '12.Tax on total income',
        '13. Rebate',
        '14.Total Income Tax',
        '15.Surcharge',
        '16.Education Cess @4% (On Tax computed at (14 & 15)',
        '17.Tax Payable (14+15+16)',
        '18.Less: Relief under section 89',
        '19.Tax Payable (17-18)',
        '20.Tax Deducted Till Date',
        '21.Previous Employer TDS',
        '22.Tax Due (19-20-21)',
    );

        foreach($inv_emp as $single_inv_users){
        foreach ($Employee_details as $key => $single_user) {
            if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
            $employee_salary_details[$key]['11.Total Income (8-10)'] = $income[$single_inv_users];
            $employee_salary_details[$key]['12.Tax on total income'] = round($this->getTaxCalculation($employee_salary_details[$key]['11.Total Income (8-10)'],40)['Tax on total Income']);
            $employee_salary_details[$key]['13. Rebate'] = round($this->rebateUs87acalc("old" ,$employee_salary_details[$key]['11.Total Income (8-10)'],$employee_salary_details[$key]['12.Tax on total income']));
            $employee_salary_details[$key]['14.Total Income Tax'] = round($employee_salary_details[$key]['12.Tax on total income'] - $employee_salary_details[$key]['13. Rebate']);
            $employee_salary_details[$key]['15.Surcharge'] = round($this->subChargeCalculation($employee_salary_details[$key]['11.Total Income (8-10)']));
            $employee_salary_details[$key]['16.Education Cess @4% (On Tax computed at (14 & 15)'] = round(($employee_salary_details[$key]['14.Total Income Tax'] + $employee_salary_details[$key]['15.Surcharge']) * 0.04);
            $employee_salary_details[$key]['17.Tax Payable (14+15+16)'] = round($employee_salary_details[$key]['14.Total Income Tax'] + $employee_salary_details[$key]['15.Surcharge'] + $employee_salary_details[$key]['16.Education Cess @4% (On Tax computed at (14 & 15)']);
            $employee_salary_details[$key]['18.Less: Relief under section 89'] = 0;
            $employee_salary_details[$key]['19.Tax Payable (17-18)'] = round($employee_salary_details[$key]['17.Tax Payable (14+15+16)'] - $employee_salary_details[$key]['18.Less: Relief under section 89']);
            $employee_salary_details[$key]['20.Tax Deducted Till Date'] = round($professinal_income[$key]["Income Tax"]);
            $employee_salary_details[$key]['21.Previous Employer TDS'] = 0;
            $employee_salary_details[$key]['22.Tax Due (19-20-21)'] = round($employee_salary_details[$key]['19.Tax Payable (17-18)'] - $employee_salary_details[$key]['20.Tax Deducted Till Date'] - 0);
            }
        }
    }

    array_push( $salary_data['headers'] , '23.Tax Deduction Per Month');

        $timeperiod = VmtOrgTimePeriod::where('status', '1')->first();
        $end_date = Carbon::parse($timeperiod->end_date);
        $end_date = Carbon::parse($end_date)->floorMonth();
        $current = Carbon::now()->floorMonth();

        $diffmonths = $current->diffInMonths($end_date)+1;


        foreach($inv_emp as $single_inv_users){
        foreach ($Employee_details as $key => $single_user) {
            if($single_inv_users == User::where('user_code',$single_user['Employee Code'])->first()->id){
                $employee_salary_details[$key]['23.Tax Deduction Per Month'] = round($employee_salary_details[$key]['22.Tax Due (19-20-21)'] / $diffmonths) ;
            }
        }
    }

        $salary_data['rows'] = $employee_salary_details;

        $temp_ar = array();
        $final_ar = array();
        foreach($salary_data['rows'] as $single_emp){
            foreach($salary_data['headers'] as  $single_headers){
                if(array_key_exists($single_headers,$single_emp)){
                    $temp_ar[$single_headers]=$single_emp[$single_headers];
                }else {
                    $temp_ar[$single_headers]="0";
                }
            }
            array_push($final_ar,$temp_ar);
            unset($temp_ar);
        }


        array_push($reportsdata,$salary_data['headers'],$final_ar);

        return dd($reportsdata,$income);


}


  public function annualSalaryReport(){


    $payroll_month = "2023-08-01";

    $user_details = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
        ->join('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
        ->where("users.active", "1");


    $Employee_details = $user_details->get([
        'users.id as user_id',
        'users.user_code as Employee Code',
        'users.name as Employee Name',
        'vmt_employee_details.gender as Gender',
        'vmt_employee_details.pan_number as PAN Number',
        'vmt_employee_details.dob as Date Of Birth',
        'vmt_employee_details.doj as Date Of Joining',
        'vmt_employee_statutory_details.tax_regime as Tax Regime'
    ])->toArray();

$annual_salary_projection =array();

 $employee_salary_details = array();

    foreach ($Employee_details as $key => $single_user) {

      $single_user_id = User::where('id', $single_user['user_id'])->first();

        $payroll_date = VmtPayroll::where('payroll_date',  $payroll_month)->where('client_id', $single_user_id->client_id)->first();

        if (!empty($payroll_date)) {

            $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $single_user['user_id']);

        }

        if ($emp_payroll->exists()) {
             $emp_payroll =$emp_payroll->first();
             $employee_projected_salary = AbsSalaryProjection::where('vmt_emp_payroll_id', $emp_payroll->id);
            // dd($employee_projected_salary);
        }

        if ($employee_projected_salary->exists()) {

            $employee_salary_details[$key]["Employee Code"] =$single_user['Employee Code'];
            $employee_salary_details[$key]["Employee Name"] =$single_user['Employee Name'];
            $employee_salary_details[$key]["Gender"] =$single_user['Gender'];
            $employee_salary_details[$key]["PAN Number"] =$single_user['PAN Number'];
            $employee_salary_details[$key]["Date Of Birth"] =Carbon::parse($single_user['Date Of Birth'])->format('d-m-Y');
            $employee_salary_details[$key]["Date Of Joining"] =Carbon::parse($single_user['Date Of Joining'])->format('d-m-Y');
            $employee_salary_details[$key]["Tax Regime"] = ucfirst($single_user['Tax Regime'])." Regime";
            // $professinal_income[$key]["Regime"] = $single_user['Tax Regime'];
            $employee_salary_details[$key]["Basic"] =$employee_projected_salary->sum('earned_basic');
            $employee_salary_details[$key]["Basic Arrears"] =$employee_projected_salary->sum('basic_arrear');
            $employee_salary_details[$key]["Dearness Allowance"] =$employee_projected_salary->sum('dearness_allowance_earned');
            $employee_salary_details[$key]["Dearness Allowance Arrears"] =$employee_projected_salary->sum('dearness_allowance_arrear');
            $employee_salary_details[$key]["Variable Dearness Allowance"] =$employee_projected_salary->sum('vda_earned');
            $employee_salary_details[$key]["Variable Dearness Allowance Arrears"] =$employee_projected_salary->sum('vda_arrear');
            $employee_salary_details[$key]["HRA"] =$employee_projected_salary->sum('earned_hra');
            $employee_salary_details[$key]["HRA Arrears"] =$employee_projected_salary->sum('hra_arrear');
            $employee_salary_details[$key]["Child Education Allowance"] =$employee_projected_salary->sum('earned_child_edu_allowance');
            $employee_salary_details[$key]["Child Education Allowance Arrears"] =$employee_projected_salary->sum('child_edu_allowance_arrear');
            $employee_salary_details[$key]["Statutory Bonus"] =$employee_projected_salary->sum('earned_stats_bonus');
            $employee_salary_details[$key]["Statutory Bonus Arrears"] =$employee_projected_salary->sum('earned_stats_arrear');
            $employee_salary_details[$key]["Medical Allowance"] =$employee_projected_salary->sum('medical_allowance_earned');
            $employee_salary_details[$key]["Medical Allowance Arrears"] =$employee_projected_salary->sum('medical_allowance_arrear');
            $employee_salary_details[$key]["Communicaton Allowance"] =$employee_projected_salary->sum('communication_allowance_earned');
            $employee_salary_details[$key]["Communication Allowance Arrears"] =$employee_projected_salary->sum('communication_allowance_arrear');
            $employee_salary_details[$key]["Leave Travel Allowance"] =$employee_projected_salary->sum('earned_lta');
            $employee_salary_details[$key]["Leave Travel Allowance Arrears"] =$employee_projected_salary->sum('lta_arrear');
            $employee_salary_details[$key]["Food Allowance"] =$employee_projected_salary->sum('food_allowance_earned');
            $employee_salary_details[$key]["Food Allowance Arrears"] =$employee_projected_salary->sum('food_allowance_arrear');
            $employee_salary_details[$key]["Special Allowance"] =$employee_projected_salary->sum('earned_spl_alw');
            $employee_salary_details[$key]["Special Allowance Arrears"] =$employee_projected_salary->sum('spl_alw_arrear');
            $employee_salary_details[$key]["Other Allowance"] =$employee_projected_salary->sum('other_allowance_earned');
            $employee_salary_details[$key]["Other Allowance Arrears"] =$employee_projected_salary->sum('other_allowance_arrear');
            $employee_salary_details[$key]["Washing Allowance"] =$employee_projected_salary->sum('washing_allowance_earned');
            $employee_salary_details[$key]["Washing Allowance Arrears"] =$employee_projected_salary->sum('washing_allowance_arrear');
            $employee_salary_details[$key]["Uniform Allowance"] =$employee_projected_salary->sum('uniform_allowance_earned');
            $employee_salary_details[$key]["Uniform Allowance Arrears"] =$employee_projected_salary->sum('uniform_allowance_arrear');
            $employee_salary_details[$key]["Vehicle Reimbursement"] =$employee_projected_salary->sum('vehicle_reimbursement_earned');
            $employee_salary_details[$key]["Vehicle Reimbursement Arrears"] =$employee_projected_salary->sum('vehicle_reimbursement_arrear');
            $employee_salary_details[$key]["Driver Salary Reimbursement"] =$employee_projected_salary->sum('driver_salary_earned');
            $employee_salary_details[$key]["Driver Salary Reimbursement Arrears"] =$employee_projected_salary->sum('driver_salary_arrear');
            // $professinal_income[$key]["Professional Tax"] =$employee_projected_salary->sum('prof_tax');
            // $professinal_income[$key]["Income Tax"] =$employee_projected_salary->sum('income_tax');
            $employee_salary_details[$key]["Overtime"] =$employee_projected_salary->sum('overtime');
            $employee_salary_details[$key]["Overtime Arrears"] =$employee_projected_salary->sum('overtime_arrear');

            $employee_salary_details[$key]["Arrears"] = $employee_projected_salary->sum('basic_arrear')+ $employee_projected_salary->sum('dearness_allowance_arrear') + $employee_projected_salary->sum('vda_arrear') + $employee_projected_salary->sum('hra_arrear')+$employee_projected_salary->sum('hra_arrear') +
                                                        $employee_projected_salary->sum('child_edu_allowance_arrear') + $employee_projected_salary->sum('earned_stats_arrear') + $employee_projected_salary->sum('medical_allowance_arrear')
                                                        +$employee_projected_salary->sum('communication_allowance_arrear')  + $employee_projected_salary->sum('food_allowance_arrear') + $employee_projected_salary->sum('lta_arrear') + $employee_projected_salary->sum('spl_alw_arrear') + $employee_projected_salary->sum('other_allowance_arrear')
                                                        + $employee_projected_salary->sum('washing_allowance_arrear') + $employee_projected_salary->sum('uniform_allowance_arrear') + $employee_projected_salary->sum('vehicle_reimbursement_arrear') +$employee_projected_salary->sum('driver_salary_arrear');


            $employee_salary_details[$key]["Incentive"] =$employee_projected_salary->sum('incentive');;
            $employee_salary_details[$key]["Other Earnings"] =$employee_projected_salary->sum('other_earnings');
            $employee_salary_details[$key]["Referral Bonus"] =$employee_projected_salary->sum('referral_bonus');
            $employee_salary_details[$key]["Annual Statutory Bonus"] =$employee_projected_salary->sum('earned_stats_bonus');
            $employee_salary_details[$key]["Ex-Gratia"] =$employee_projected_salary->sum('ex_gratia');
            $employee_salary_details[$key]["Attendance Bonus"] =$employee_projected_salary->sum('attendance_bonus');
            $employee_salary_details[$key]["Daily Allowance"] =$employee_projected_salary->sum('daily_allowance');
            $employee_salary_details[$key]["Leave Encashments"] =$employee_projected_salary->sum('leave_encashment');
            $employee_salary_details[$key]["Gift"] =$employee_projected_salary->sum('gift_payment');
            $employee_salary_details[$key]["Annual Gross Salary"] =$employee_projected_salary->sum('earned_basic') + $employee_projected_salary->sum('dearness_allowance_earned') + $employee_projected_salary->sum('vda_earned')
                                                                 +$employee_projected_salary->sum('earned_hra') +$employee_projected_salary->sum('earned_child_edu_allowance') + $employee_projected_salary->sum('medical_allowance_earned')
                                                                 + $employee_projected_salary->sum('communication_allowance_earned')+ $employee_projected_salary->sum('earned_lta') +$employee_projected_salary->sum('food_allowance_earned')
                                                                 +$employee_projected_salary->sum('earned_spl_alw')+$employee_projected_salary->sum('other_allowance_earned')+$employee_projected_salary->sum('washing_allowance_earned')+
                                                                 $employee_projected_salary->sum('uniform_allowance_earned') ;

        }

    }


    $salary_data['headers'] = array('Employee Code','Employee Name','Gender','PAN Number','Date Of Birth','Date Of Joining','Tax Regime','Basic','Basic Arrears',
    'Dearness Allowance','Dearness Allowance Arrears','Variable Dearness Allowance','Variable Dearness Allowance Arrears','HRA','HRA Arrears','Child Education Allowance',
    'Child Education Allowance Arrears','Statutory Bonus','Statutory Bonus Arrears','Medical Allowance','Medical Allowance Arrears','Communicaton Allowance','Communication Allowance Arrears', 'Leave Travel Allowance',
    'Leave Travel Allowance Arrears','Food Allowance','Food Allowance Arrears','Special Allowance','Special Allowance Arrears','Other Allowance','Other Allowance Arrears',
    'Washing Allowance','Washing Allowance Arrears','Uniform Allowance','Uniform Allowance Arrears','Vehicle Reimbursement','Vehicle Reimbursement Arrears','Driver Salary Reimbursement',
    'Driver Salary Reimbursement Arrears','Overtime','Overtime Arrears','Arrears','Incentive','Other Earnings','Referral Bonus','Annual Statutory Bonus','Ex-Gratia','Attendance Bonus',
    'Daily Allowance','Leave Encashments','Gift','Annual Gross Salary'
    );

      $payroll_date  = Carbon::parse($payroll_month)->format("M Y");

    array_push($annual_salary_projection,$salary_data['headers'],$employee_salary_details,$payroll_month);

    return $annual_salary_projection;

  }


  public function newregimetaxcal($total_income){

    if ($total_income > 300000) {

        $deducted_total_income['Exception ₹300000 and the balance amount'] = $total_income - 300000;
        $deducted_total_income_1s = $total_income - 300000;


        if ($deducted_total_income_1s > 300000) {
            $deducted_total_income['For ₹300000 : Tax - 5% Tax Amount'] = 15000;
            $deducted_total_income_2s = $deducted_total_income_1s - 300000;

            if ($deducted_total_income_2s < 600000) {
                $deducted_total_income['For ' . '₹' . $deducted_total_income_2s . ' : Tax - 10% Tax Amount'] = $deducted_total_income_2s * 0.10;
            }

            if ($deducted_total_income_2s > 600000) {
                $deducted_total_income['For ₹600000 : Tax - 10% Tax Amount'] = 60000;
                $deducted_total_income_3s = $deducted_total_income_2s - 600000;

                if ($deducted_total_income_3s < 900000) {
                    $deducted_total_income['For ' . '₹' . $deducted_total_income_3s . ' : Tax - 15% Tax Amount'] = $deducted_total_income_3s  * 0.15;
                }

                if ($deducted_total_income_3s > 900000) {
                    $deducted_total_income['For ₹900000 : Tax - 15% Tax Amount'] = 135000;
                    $deducted_total_income_4s = $deducted_total_income_3s - 900000;

                    if($deducted_total_income_4s < 1200000){
                        $deducted_total_income['For ' . '₹' . $deducted_total_income_4s . ' : Tax - 20% Tax Amount'] = $deducted_total_income_4s * 0.20;
                    }

                    if($deducted_total_income_4s > 1200000){
                        $deducted_total_income['For ₹12000000 : Tax - 20% Tax Amount'] = 240000;
                        $deducted_total_income_5s = $deducted_total_income_4s - 1200000;

                        if($deducted_total_income_5s < 1500000){
                            $deducted_total_income['For ' . '₹' . $deducted_total_income_5s . ' : Tax - 30% Tax Amount'] = $deducted_total_income_5s * 0.30;
                        }

                        if($deducted_total_income_5s > 1500000){
                            $deducted_total_income['For ' . '₹' . $deducted_total_income_5s . ' : Tax - 30% Tax Amount'] = $deducted_total_income_5s * 0.30;
                        }

                    }
                }
            }
        }
    }

    $sumOftax = 0;
    foreach ($deducted_total_income as $key => $tax_calculate) {
        if ($key == 'Exception ₹300000 and the balance amount') {
            $sumOftax += 0;
        } else {
            $sumOftax += $tax_calculate;
        }
    }
    $deducted_total_income['Tax on total Income'] = $sumOftax;

    $deducted_total_income['Less : Rebate Under Section 87A'] = $this->rebateUs87acalc('new',$total_income,$sumOftax);

    $deducted_total_income['Note : if taxable income is less than ₹500000, tax rebate of a maximum of ₹12500 is provided under Section 87A'] = 0 ;

        return $deducted_total_income;

  }


  public function newRegimeTaxCalculation($regime, $total_income)
  {

      if ($regime == 'new') {
          // Employeer Income Is Greater than 300000 and Less Than  600000
          if ($total_income > 300000 && $total_income <= 600000) {
              $taxable_amount = ($total_income - 300000) * 5 / 100;
              $total_amount = round($taxable_amount);
              $subcharge = $this->subChargeCalculation($total_income);
              $heath_and_education = $subcharge ? ($total_amount + $subcharge) * 4 / 100 : $total_amount * 4 / 100;
              $final_value = $total_amount + $subcharge + $heath_and_education;
              return round($final_value);
          } else
              // Employeer Income Is Greater than 600000 and Less Than  900000
              if ($total_income > 600000 && $total_income <= 900000) {
                  $taxable_amount = ($total_income - 600000) * 10 / 100;
                  $total_amount = round($taxable_amount + 15000);
                  $subcharge = $this->subChargeCalculation($total_income);
                  $heath_and_education = $subcharge ? ($total_amount + $subcharge) * 4 / 100 : $total_amount * 4 / 100;
                  $final_value = $total_amount + $subcharge + $heath_and_education;
                  return round($final_value);
              } else
                  // Employeer Income Is Greater than 900000 and Less Than  1200000
                  if ($total_income > 900000 && $total_income <= 1200000) {
                      $taxable_amount = ($total_income - 900000) * 15 / 100;
                      $total_amount = floor($taxable_amount + 45000);
                      $subcharge = $this->subChargeCalculation($total_income);
                      $heath_and_education = $subcharge ? ($total_amount + $subcharge) * 4 / 100 : $total_amount * 4 / 100;
                      $final_value = $total_amount + $subcharge + $heath_and_education;
                      return floor($final_value);
                  } else
                      // Employeer Income Is Greater than 1200000 and Less Than  1500000
                      if ($total_income > 1200000 && $total_income < 1500000) {
                          $taxable_amount = ($total_income - 1200000) * 20 / 100;
                          $total_amount = floor($taxable_amount + 90000);
                          $subcharge = $this->subChargeCalculation($total_income);
                          $heath_and_education = $subcharge ? ($total_amount + $subcharge) * 4 / 100 : $total_amount * 4 / 100;
                          $final_value = $total_amount + $subcharge + $heath_and_education;
                          return floor($final_value);
                      } else
                          // Employeer Income Is Greater than 1500000
                          if ($total_income > 1500000) {

                              $taxable_amount = ($total_income - 1500000) * 30 / 100;
                              $total_amount = floor($taxable_amount + 150000);
                              $subcharge = $this->subChargeCalculation($total_income);
                              $heath_and_education = $subcharge ? ($total_amount + $subcharge) * 4 / 100 : $total_amount * 4 / 100;
                              $final_value = $total_amount + $subcharge + $heath_and_education;
                              return floor($final_value);
                          }
      }
  }











}
