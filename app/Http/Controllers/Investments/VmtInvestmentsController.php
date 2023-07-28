<?php

namespace App\Http\Controllers\Investments;

use App\Models\Compensatory;
use App\Models\VmtEmployee;
use App\Models\VmtInvestmentForm;
use App\Models\VmtInvFormSection;
use App\Models\VmtInvEmpFormdata;
use App\Models\VmtInvFEmpAssigned;
use App\Http\Controllers\Controller;
use App\Models\VmtOrgTimePeriod;
use App\Services\VmtInvestmentsService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VmtEmpInvRentalDetails;
use Carbon\Carbon;




class VmtInvestmentsController extends Controller
{

    public function getInvestmentsFormDetailsTemplate(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //  dd($request->all());

        return $serviceVmtInvestmentsService->getInvestmentsFormDetailsTemplate($request->form_name);
    }

    public function saveEmpInvSecDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //dd($request->all());

        return $serviceVmtInvestmentsService->saveEmpInvSecDetails($request->user_code, $request->section_name, $request->section_data);
    }

    public function ImportInvestmentForm_Excel(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        // dd($request->all());

        return $serviceVmtInvestmentsService->ImportInvestmentForm_Excel($request->form_name, $request->excel_file);
    }


    // Common Save function Saving Investment Form
    public function SaveInvDetails(Request $request)
    {
        // dd($request->all());
        $form_id = $request->form_id;
        $user_id = User::where('user_code', $request->user_code)->first()->id;
        $form_data = $request->formDataSource;
        $current_date = date("Y-m-d");


        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);

        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();
        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->year = $current_date;
            $emp_assign_form->is_sumbit = $request->is_submitted;

            $emp_assign_form->save();
            $query_assign = $emp_assign_form;
        }

        // dd($form_data);
        $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

        if (isset($form_data)) {

            foreach ($form_data as $singleFormData) {

                $emp_formdata = VmtInvEmpFormdata::where('f_emp_id', $assigned_form_user_id)->where('fs_id', $singleFormData['fs_id'])->first();

                if (empty($emp_formdata)) {

                    $emp_formdata = new VmtInvEmpFormdata;
                    $emp_formdata->f_emp_id = $query_assign->id;
                    $emp_formdata->fs_id = $singleFormData['fs_id'];
                    $emp_formdata->dec_amount = $singleFormData['declaration_amount'];
                    $emp_formdata->selected_section_options = $singleFormData['select_option'] ?? '';
                    //   $emp_formdata->json_popups_value = $sima ?? "none";
                    $emp_formdata->save();
                } else {

                    $emp_formdata->f_emp_id = $query_assign->id;
                    $emp_formdata->fs_id = $singleFormData['fs_id'];
                    $emp_formdata->dec_amount = $singleFormData['declaration_amount'];
                    $emp_formdata->selected_section_options = $singleFormData['select_option'] ?? '';
                    //    $emp_formdata->json_popups_value = $singleFormData['json_popups_value'];

                    //   $emp_formdata->json_popups_value = $sima ?? "none";
                    $emp_formdata->save();
                }
            }
        } else {

            $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first();

            if ($assigned_form_user_id->exists()) {

                $assigned_form_user_id->is_sumbit = $request->is_submitted;
                $assigned_form_user_id->save();
            }

            return "sumbit";
        }
    }

    // Common Function For Saving All Popup In Investment Form's
    public function saveSectionPopups(Request $request)
    {
        // dd($request->all());
        $json_decodeHra = json_encode($request->all());
        $current_date = date("Y-m-d");

        // dd($json_decodeHra);

        $form_id = "1";

        $fs_id = $request->fs_id;

        // dd($fs_id);
        $user_id = User::where('user_code', $request->user_code)->first()->id;

        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);


        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();
        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->year = $current_date;
            $emp_assign_form->is_sumbit = $request->is_submitted;
            $emp_assign_form->save();
            $query_assign = $emp_assign_form;
        }

        if (empty($request->id)) {

            $Hra_save = new VmtInvEmpFormdata;
            $Hra_save->fs_id = $fs_id;
            $Hra_save->f_emp_id = $query_assign->id;
            $Hra_save->dec_amount = "0";
            $Hra_save->json_popups_value = $json_decodeHra;
            $Hra_save->save();
        } else {

            $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

            $emp_formdata = VmtInvEmpFormdata::where('f_emp_id', $assigned_form_user_id)->where('id', $request->id)->first();

            $emp_formdata->f_emp_id = $query_assign->id;
            $emp_formdata->fs_id = $fs_id;
            $emp_formdata->dec_amount = "0";
            $emp_formdata->json_popups_value = $json_decodeHra;

            $emp_formdata->save();
        }


        return 'saved';
    }

    // Get And Delete for HRA in Investment's Forms
    public function fetchEmpRentalDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        $user_code = $request->user_code;
        $fs_id = $request->fs_id;

        return $serviceVmtInvestmentsService->fetchEmpRentalDetails($user_code, $fs_id);
    }

    // Get And Delete for House Property in Investment's Forms
    public function fetchHousePropertyDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        $user_code = $request->user_code;
        $fs_id = $request->hop;

        return $serviceVmtInvestmentsService->fetchHousePropertyDetails($user_code, $fs_id);
    }
    public function fetchOtherExemptionDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        $user_code = $request->user_code;
        $fs_id = $request->otherExe;

        return $serviceVmtInvestmentsService->fetchHousePropertyDetails($user_code, $fs_id);
    }
    public function deleteHousePropertyDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {

        return $serviceVmtInvestmentsService->deleteHousePropertyDetails($request->current_table_id);
    }

    public function saveSection80(Request $request)
    {
        // dd($request->all());
        $json_decodeHra = json_encode($request->all());
        $current_date = date("Y-m-d");
        // dd($json_decodeHra);

        $form_id = "1";

        $dec_amount = $request->interest_amount_paid;

        $fs_id = $request->fs_id;

        $user_id = User::where('user_code', $request->user_code)->first()->id;

        // $form_data = $request->formDataSource;

        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);


        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();
        } else {

            $emp_assign_form = new VmtInvFEmpAssigned;
            $emp_assign_form->user_id = $user_id;
            $emp_assign_form->form_id = $form_id;
            $emp_assign_form->year = $current_date;
            $emp_assign_form->save();
            $query_assign = $emp_assign_form;
        }

        $assigned_form_user_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

        $emp_formdata = VmtInvEmpFormdata::where('f_emp_id', $assigned_form_user_id)->where('fs_id', $fs_id)->first();

        if (empty($emp_formdata)) {

            $Hra_save = new VmtInvEmpFormdata;
            $Hra_save->f_emp_id = $query_assign->id;
            $Hra_save->fs_id = $fs_id;
            $Hra_save->dec_amount = $dec_amount;
            $Hra_save->json_popups_value = $json_decodeHra;
            $Hra_save->selected_section_options = '0';
            $Hra_save->save();
        } else {
            $emp_formdata->f_emp_id = $query_assign->id;
            $emp_formdata->fs_id = $fs_id;
            $emp_formdata->dec_amount = $dec_amount;
            $emp_formdata->json_popups_value = $json_decodeHra;
            $emp_formdata->selected_section_options = '0';
            $emp_formdata->save();
        }


        return 'saved';
    }


    public function showInvestmentsFormMgmtPage(Request $request)
    {
        //dd($request->all());

        return view('investments_forms_mgmt');
    }

    public function declarationSummaryCalculation(Request $request)
    {

        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        // $v_form_template = VmtInvFEmpAssigned::leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.f_emp_id', '=', 'vmt_inv_f_emp_assigned.id')
        //     ->leftjoin('vmt_inv_formsection', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
        //     ->leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
        //     ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
        //    ->where('vmt_inv_f_emp_assigned.user_id',$user_id)

        $v_form_template = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
            ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
            ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
            ->leftjoin('vmt_inv_f_emp_assigned', 'vmt_inv_f_emp_assigned.id', '=', 'vmt_inv_emp_formdata.f_emp_id')
            ->leftjoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_inv_f_emp_assigned.user_id')
            ->leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_compensatory_details.user_id')
            ->where('vmt_inv_f_emp_assigned.user_id', $user_id)
            ->get(
                [
                    'vmt_inv_formsection.section_id',
                    'vmt_inv_section.section',
                    'vmt_inv_section.particular',
                    'vmt_inv_section.reference',
                    'vmt_inv_section.max_amount',
                    'vmt_inv_section_group.section_group',
                    'vmt_inv_formsection.id as fs_id',
                    'vmt_inv_section.section_option_1',
                    'vmt_inv_section.section_option_2',
                    'vmt_inv_emp_formdata.dec_amount',
                    'vmt_inv_emp_formdata.json_popups_value',
                    'vmt_employee_compensatory_details.gross',
                    'vmt_employee_compensatory_details.basic',
                    'vmt_employee_compensatory_details.hra',
                    'vmt_employee_compensatory_details.special_allowance',
                    'vmt_employee_compensatory_details.professional_tax',
                    'vmt_employee_details.doj',
                ]
            )->toArray();

        // dd( $v_form_template);


        $res = array();
        $hra = array('section_name' => 'HRA', 'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);
        $section80 =  array('section_name' => 'Section 80C & 80CC', 'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);
        $otherExemption =  array('section_name' => 'Other Excemptions', 'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);
        $houseProperty = array('section_name' => 'House Properties',  'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);
        $reimbersument = array('section_name' => 'Reimbersument',  'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);
        $previousEmployerIncome = array('section_name' => 'Previous Employer Income',  'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);
        $otherSourceIncome = array('section_name' => 'Other Source Of  Income', 'dec_amount' => 0, 'proof_submitted' => 0, 'amount_rejected' => 0, 'amount_accepted' => 0);

        $sumOfSec = 0;
        $sumOfHra = 0;
        $sumOfotherExemption = 0;
        $sumOfHouseProperty = 0;
        $sumOfReimbersument = 0;
        $sumOfPreviousEmployerIncome = 0;
        $sumOfOtherSourceIncome = 0;
        $totalSumOfExemption = 0;
        $sumOfOtherExemptionDec = 0;


        foreach ($v_form_template as $dec_amt) {
            //dd( $dec_amt);
            $empGeneralInfo['gross'] = $dec_amt['gross'];
            $empGeneralInfo['basic'] = $dec_amt['basic'];
            $empGeneralInfo['hra'] = $dec_amt['hra'];
            $empGeneralInfo['special_allowance'] = $dec_amt['special_allowance'];
            $empGeneralInfo['professional_tax'] = $dec_amt['professional_tax'];
            $empGeneralInfo['doj'] = $dec_amt['doj'];

            // dd($empGeneralInfo);


            if ($dec_amt['section_group'] == "HRA") {
                // dd($dec_amt['section_group'] == "HRA");
                $hraTotalRent = (json_decode($dec_amt["json_popups_value"], true));
                $sumOfHra += $hraTotalRent['total_rent_paid'];
                $totalSumOfExemption += $hraTotalRent['total_rent_paid'];
                $hra['section_name'] = $dec_amt['section_group'];
                $hra['dec_amount'] = $sumOfHra;
                $hra['proof_submitted'] = 0;
                $hra['amount_rejected'] = 0;
                $hra['amount_accepted'] = 0;
                // dd($hraTotalRent);
                // dd($hra);
            }
            if ($dec_amt['section_group'] == "Section 80C & 80CC ") {

                $sumOfSec += $dec_amt['dec_amount'];
                $totalSumOfExemption += $dec_amt['dec_amount'];
                $section80['section_name'] = $dec_amt['section_group'];
                $section80['dec_amount'] = $sumOfSec;
                $section80['proof_submitted'] = 0;
                if ($sumOfSec > 150000) {
                    $section80['amount_rejected'] = 150000 - $sumOfSec;
                } else {
                    $section80['amount_rejected'] = 0;
                }
                if ($sumOfSec > 150000) {
                    $section80['amount_accepted'] = $sumOfSec - abs(150000 - $sumOfSec);
                } else {
                    $section80['amount_accepted'] = $sumOfSec;
                }
            }
            if ($dec_amt['section_group'] == "Other Excemptions ") {
                $sumOfOtherExemptionDec += $dec_amt['max_amount'];
                $sumOfotherExemption += $dec_amt['dec_amount'];
                $totalSumOfExemption += $dec_amt['dec_amount'];
                $otherExemption['section_name'] = $dec_amt['section_group'];
                $otherExemption['dec_amount'] = $sumOfotherExemption;
                $otherExemption['proof_submitted'] = 0;
                if ($sumOfotherExemption > $sumOfOtherExemptionDec) {
                    $otherExemption['amount_rejected'] = $sumOfOtherExemptionDec - $sumOfotherExemption;
                } else {
                    $otherExemption['amount_rejected'] = 0;
                }
                if ($sumOfotherExemption > $sumOfOtherExemptionDec) {
                    $otherExemption['amount_accepted'] = $sumOfOtherExemptionDec - $sumOfotherExemption;
                } else {
                    $otherExemption['amount_accepted'] = 0;
                }
            }
            if ($dec_amt['section_group'] == "House Properties ") {
                $totalIntersetPaid = (json_decode($dec_amt["json_popups_value"], true));
                $sumOfHouseProperty += $totalIntersetPaid["income_loss"];
                $houseProperty['section_name'] = $dec_amt['section_group'];
                $houseProperty['dec_amount'] = $sumOfHouseProperty;
                $houseProperty['proof_submitted'] = 0;
                $houseProperty['amount_rejected'] = 0;
                $houseProperty['amount_accepted'] = 0;
            }
            if ($dec_amt['section_group'] == "Reimbersument ") {
                $sumOfReimbersument += $dec_amt['dec_amount'];
                $totalSumOfExemption += $dec_amt['dec_amount'];
                $reimbersument['section_name'] = $dec_amt['section_group'];
                $reimbersument['dec_amount'] = $sumOfReimbersument;
                $reimbersument['proof_submitted'] = 0;
                $reimbersument['amount_rejected'] = 0;
                $reimbersument['amount_accepted'] = 0;
            }
            if ($dec_amt['section_group'] == "Previous Employer Income") {
                $sumOfPreviousEmployerIncome += $dec_amt['dec_amount'];
                $totalSumOfExemption += $dec_amt['dec_amount'];
                $previousEmployerIncome['section_name'] = $dec_amt['section_group'];
                $previousEmployerIncome['dec_amount'] = $sumOfPreviousEmployerIncome;
                $previousEmployerIncome['proof_submitted'] = 0;
                $previousEmployerIncome['amount_rejected'] = 0;
                $previousEmployerIncome['amount_accepted'] = 0;
            }

            if ($dec_amt['section_group'] == "Other Source Of  Income") {
                $sumOfOtherSourceIncome += $dec_amt['dec_amount'];
                $totalSumOfExemption += $dec_amt['dec_amount'];
                $otherSourceIncome['section_name'] = $dec_amt['section_group'];
                $otherSourceIncome['dec_amount'] = $sumOfOtherSourceIncome;
                $otherSourceIncome['proof_submitted'] = 0;
                $otherSourceIncome['amount_rejected'] = 0;
                $otherSourceIncome['amount_accepted'] = 0;
            }
        }
        // dd($sumOfOtherExemptionDec);
        //dd($hra);
        // array_push($res,$section80,$otherExemption,$houseProperty,$reimbersument ,$previousEmployerIncome,$otherSourceIncome);
        array_push(
            $res,
            $hra,
            $section80,
            $houseProperty,
            $otherExemption,
            $reimbersument,
            $previousEmployerIncome,
            $otherSourceIncome,
        );

        return $res;
    }

    public function taxDeclaration(Request $request)
    {

        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

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
                    'vmt_inv_emp_formdata.dec_amount',
                    'vmt_inv_emp_formdata.json_popups_value',
                    'vmt_employee_compensatory_details.gross',
                    'vmt_employee_compensatory_details.basic',
                    'vmt_inv_f_emp_assigned.regime',
                    'vmt_inv_f_emp_assigned.updated_at',
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



        $res = array();
        $total_gross = array('sno' => 'a', 'section' => 'Total Gross Income', 'old_regime' => 0, 'new_regime' => 0);
        $Other_Source = array('sno' => 'b', 'section' => 'Other Source of Income', 'old_regime' => 0, 'new_regime' => 0);
        $Reimbursement = array('sno' => 'c', 'section' => 'Reimbursement Exemptions', 'old_regime' => 0, 'new_regime' => 0);
        $allowance_tax = array('sno' => 'd', 'section' => 'Allowance Exemptions (Sec 10)', 'old_regime' => 0, 'new_regime' => 0);
        $tax_on_emp = array('sno' => 'e', 'section' => 'Tax on Employment (Sec 16)', 'old_regime' => 0, 'new_regime' => 0);
        $exemption = array('sno' => 'f', 'section' => 'Exemptions under Sec 80', 'old_regime' => 0, 'new_regime' => 0);
        $total_tax_income = array('sno' => 'g', 'section' => 'Total Taxable Income', 'old_regime' => 0, 'new_regime' => 0);
        $total_tax_laibilty = array('sno' => 'h', 'section' => 'Total Tax Laibility', 'old_regime' => 0, 'new_regime' => 0);

        $sumOfHradeclared = 0;
        $sumOfReimbersument = 0;
        $sumOfOtherSourceOfIncome = 0;
        $totalRentPaid = 0;
        $standardDeducation = 0;
        $professional_tax = 0;
        $perviousEmployeeProfessionalTax = 0;
        $ExemptionsUnder80s = 0;
        $SumOfHousPropsInNew = 0;
        $SumOfHousPropsInOld = 0;
         $tax_calc_new_redime = 0;
        $otherAllowance = 0;
        $sumOfOtherExemptionDec = 0;
        $sumOfOtherExemptionMax = 0;

        foreach ($v_form_template as $dec_amt) {

            $perviousEmployeeProfessionalTax = 1000;

            $current_year = date('Y'); // Get Current Year
            $dob = date_parse($dec_amt['dob']); // Employeer Dob
            $year = $dob["year"];
            $empAge = ($current_year - $year);

           $current_financial = VmtOrgTimePeriod::where('status',"1")->first();
           $finance_month = Carbon::parse($current_financial->end_date);
            $doj = Carbon::parse($dec_amt['doj']);

             $joining_months =  ($doj)->diffInMonths($finance_month);

             if($joining_months > 12){
                $joinmonth = 12;
             }else{
                $joinmonth = $joining_months;
             }


            $totalIntersetPaid = (json_decode($dec_amt["json_popups_value"], true));
            $hraTotalRent = (json_decode($dec_amt["json_popups_value"], true));
            // $empHra = $dec_amt['hra'] * 12;
            $empBasic = $dec_amt['basic'] * 12;

            $hraexamtions = intval($sumOfHradeclared) - intval($empBasic * 10 / 100);

            if ($dec_amt['section_group'] == "HRA") {
                $sumOfHradeclared += $hraTotalRent['total_rent_paid'];
                // $totalSumOfExemption += $hraTotalRent['total_rent_paid'];
            }

            if ($dec_amt['section_group'] == "Section 80C & 80CC ") {
                $ExemptionsUnder80s += $dec_amt['dec_amount'];
            }
            if ($dec_amt['section_group'] == "Other Excemptions ") {
                $ExemptionsUnder80s += $dec_amt['dec_amount'];
            }
            if ($dec_amt['section_group'] == "Previous Employer Income") {
                $ExemptionsUnder80s += $dec_amt['dec_amount'];
            }

            if ($dec_amt['section_group'] == "Reimbersument ") {
                $sumOfReimbersument += $dec_amt['dec_amount'];
                $ExemptionsUnder80s += $dec_amt['dec_amount'];
            }

            if ($dec_amt['section_group'] == "Other Source Of  Income") {
                $sumOfOtherSourceOfIncome = $dec_amt['dec_amount'];
                $ExemptionsUnder80s += $dec_amt['dec_amount'];
            }

            if ($dec_amt['gross'] >= 50000) {
                $standardDeducation = 50000;
            } else {
                $standardDeducation = intval($dec_amt['gross']);
            }

            if ($dec_amt['professional_tax'] >= 2500) {
                $professional_tax = 2500;
            } else {
                $professional_tax = intval($dec_amt['professional_tax']) + $perviousEmployeeProfessionalTax;
            }
            // Compare standard deduction and pervious standard deduction
            //  50,000

            // Calculate Total Sum Of Declaration Amount

            // $ExemptionsUnder80s += $dec_amt['dec_amount'];

            if ($dec_amt['section_group'] == "House Properties ") {
                $SumOfHousPropsInOld += $totalIntersetPaid['income_loss'];
                if ($totalIntersetPaid['property_type'] == "Let Out Property") {
                    $SumOfHousPropsInNew = $totalIntersetPaid['income_loss'];

                    $tax_calc_new_redime += $totalIntersetPaid['income_loss'];
                }
            }

            if($SumOfHousPropsInOld > 200000){
                    $sumofhouseproperty = 200000;
            }else{
                $sumofhouseproperty = $SumOfHousPropsInOld ;
            }


            // sum pervious employee gross with actual gross
            $total_gross['sno'] = "a";
            $total_gross['section'] = "Total Gross Salary";
            $total_gross['old_regime'] = round($dec_amt['gross'] * $joinmonth);
            $total_gross['new_regime'] = round($dec_amt['gross'] * $joinmonth);



            $Other_Source['sno'] = "b";
            $Other_Source['section'] = "Other Source of Income";
            $Other_Source['old_regime'] = $sumOfOtherSourceOfIncome;
            $Other_Source['new_regime'] =  $sumOfOtherSourceOfIncome;



            $Reimbursement['sno'] = "c";
            $Reimbursement['section'] = "Reimbursement Exemptions";
            $Reimbursement['old_regime'] = $sumOfReimbersument;
            $Reimbursement['new_regime'] = $sumOfReimbersument;

            // Allowance Tax

            $allowance_tax['sno'] = "d";
            $allowance_tax['section'] = "Less: Allowances to the extent exempt under section 10";
            $allowance_tax['old_regime'] = intval($hraexamtions) + intval($dec_amt['child_education_allowance']) + intval($dec_amt['lta']);
            $allowance_tax['new_regime'] = 0;


            $tax_on_emp['sno'] = "e";
            $tax_on_emp['section'] = "Less: Deductions under section 16";
            // Sum Previous Employer Standard Deduction  and Previous Employer PT
            $tax_on_emp['old_regime'] = intval($standardDeducation) + $professional_tax * 12;
            $tax_on_emp['new_regime'] = $standardDeducation;


            // Values in negative
            $tax_on_emp['sno'] = "f";
            $tax_on_emp['section'] = "Add: Income or loss from house property (Section 24)";
            $tax_on_emp['old_regime'] = $sumofhouseproperty;
            $tax_on_emp['new_regime'] = $tax_calc_new_redime;


            $exemption['sno'] = "g";
            $exemption['section'] = "Deduction under Chapter VI-A";
            $exemption['old_regime'] = round($ExemptionsUnder80s);
            $exemption['new_regime'] = 0;

            $total_tax_income['sno'] = "h";
            $total_tax_income['section'] = "Total Taxable Income";
            $total_tax_income['old_regime'] = (round($dec_amt['gross'] * $joinmonth) + $sumOfOtherSourceOfIncome - $sumOfReimbersument - (intval($hraexamtions) + intval($dec_amt['child_education_allowance']) + intval($dec_amt['lta'])) + $sumofhouseproperty - round($ExemptionsUnder80s));
            $total_old_tax = (round($dec_amt['gross'] * $joinmonth) + $sumOfOtherSourceOfIncome - $sumOfReimbersument - (intval($hraexamtions) + intval($dec_amt['child_education_allowance']) + intval($dec_amt['lta'])) + $sumofhouseproperty - round($ExemptionsUnder80s));
            $total_tax_income['new_regime'] = (round($dec_amt['gross'] * $joinmonth) + $sumOfOtherSourceOfIncome - $sumOfReimbersument - 0 + $tax_calc_new_redime - 0 );
            $total_new_tax = (round($dec_amt['gross'] * $joinmonth) + $sumOfOtherSourceOfIncome - $sumOfReimbersument - 0 + $tax_calc_new_redime - 0 );

            // tax liability calculation old regime

            if($total_old_tax < 250000){
                $old_regime_tax = 0;
            }else if($total_old_tax > 250000 && $total_old_tax <= 500000){
                $old_regime_tax = $total_old_tax * 5 / 100 ;

            }else if($total_old_tax > 500000 && $total_old_tax <= 750000){
                $old_regime_tax = $total_old_tax * 20  / 100 ;

            }else if($total_old_tax > 750000 && $total_old_tax <= 1000000){
                $old_regime_tax = $total_old_tax * 20  / 100 ;

            }else if($total_old_tax > 1000000 && $total_old_tax <= 1250000){
                $old_regime_tax = $total_old_tax * 30 / 100 ;

            }else if($total_old_tax > 1250000 && $total_old_tax <= 1500000){
                $old_regime_tax = $total_old_tax * 30 / 100 ;

            }else if($total_old_tax > 1250000 && $total_old_tax <= 1500000){
                $old_regime_tax = $total_old_tax * 30 / 100 ;
            }

            // tax liability calculation new regime

            if( $total_new_tax < 250000){
                             $new_regime_tax = 0;
            }else if( $total_new_tax > 250000 &&  $total_new_tax <= 500000){
                        $new_regime_tax =  $total_new_tax * 5 / 100 ;

            }else if( $total_new_tax > 500000 &&  $total_new_tax <= 750000){
                        $new_regime_tax =  $total_new_tax * 10  / 100 ;

            }else if( $total_new_tax > 750000 &&  $total_new_tax <= 1000000){
                $new_regime_tax =  $total_new_tax * 15  / 100 ;

            }else if( $total_new_tax > 1000000 && $total_new_tax <= 1250000){
                $new_regime_tax =  $total_new_tax * 20 / 100 ;

            }else if( $total_new_tax > 1250000 &&  $total_new_tax <= 1500000){
                $new_regime_tax = $total_new_tax * 25 / 100 ;

            }else if( $total_new_tax > 1250000 &&  $total_new_tax <= 1500000){
                $new_regime_tax = $total_new_tax * 30 / 100 ;
            }


            $total_tax_laibilty['sno'] = "i";
            $total_tax_laibilty['section'] = "Total Tax Laibility";
            $total_tax_laibilty['old_regime'] = $old_regime_tax ;
            $total_tax_laibilty['new_regime'] = $new_regime_tax;
            $total_tax_laibilty['age'] = $empAge;
            $total_tax_laibilty['regime'] = $dec_amt['regime'];
            $total_tax_laibilty['last_updated'] = $dec_amt['updated_at'];
        }



        array_push(
            $res,
            $total_gross,
            $Other_Source,
            $Reimbursement,
            $allowance_tax,
            $tax_on_emp,
            $exemption,
            $total_tax_income,
            $total_tax_laibilty

        );

        return ($res);
    }

    public function saveEmpTaxRegime(Request $request)
    {

        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        $query_femp = VmtInvFEmpAssigned::where('user_id', $user_id);


        if ($query_femp->exists()) {
            $query_assign = $query_femp->first();
            $query_assign->regime = $request->regime;
            $query_assign->save();
        }
        return "Saved";
    }

    public function taxDeducationCalculate(Request $request)
    {
        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        $table = VmtInvFEmpAssigned::leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.f_emp_id', '=', 'vmt_inv_f_emp_assigned.id')
            ->where('vmt_inv_f_emp_assigned.user_id', $user_id)->get();

        $sumOfDeclarationAmount = 0;
        foreach ($table as $dec_amt) {
            $sumOfDeclarationAmount += $dec_amt['dec_amount'];
        }
        dd($sumOfDeclarationAmount);
    }


    public function monthTaxDeductionDetails(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //  dd($request->all());

        return $serviceVmtInvestmentsService->monthTaxDeductionDetails();
    }


    public function grossEarningsFromEmployment(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //  dd($request->all());

        return $serviceVmtInvestmentsService->grossEarningsFromEmployment();
    }

    public function taxableIncomeFromAllHeads(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService)
    {
        //  dd($request->all());

        return $serviceVmtInvestmentsService->taxableIncomeFromAllHeads();
    }
}
