<?php
//$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee_payslip->EMP_NO)->first('name');
//$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
$bank_names = \DB::table('vmt_banks')->get();

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <style>
        table.payslip_table {
            width: 100%;
            vertical-align: middle;

        }

        .payslip_table tr,
        .payslip_table td {
            border: 1.5pt solid #af1888;

        }

        .border-less {
            border: 0px !important;
        }

        .payslip_table tr {
            height: 12.55pt;
        }

        .payslip_table td {
            width: 81.35pt
        }

        .margin-0 {
            margin: 0px;
        }

        .payslip_table tr p,
        .payslip_table td p {
            font-size: 9pt;
            margin-top: 3pt;
            margin-bottom: 3pt;
            padding: 0px 5px;
        }



        .txt-left {
            text-align: left;
        }

        .txt-right {
            text-align: right;
        }

        .txt-center {
            text-align: center;
        }

        .text-strong {
            font-weight: 600;
        }

        .header-row {
            height: 50px;
        }

        .payslip_table tr .bg-ash,
        .payslip_table td .bg-ash {
            background-color: #9e9e9e5c;
        }
    </style>
</head>

<body>
    <div class="main-page">
        <div class="sub-page" style="text-align: justify;">
            <table cellspacing="0" cellpadding="0" class="payslip_table">
                <tr class="header-row">
                    <td colspan="7" class="border-less">
                        <div class="header-cotent" style="margin: 1px;">
                            <p class=" text-strong"
                                style="color: #002f56;
                            padding-left: 5px;font-size:18px;margin:0px;">
                                Brand Avatar LLP</p>
                            <p class="mb-0" style="margin:0px;">NO-01,Kandasamy Street,</p>
                            <p class="mb-0" style="margin:0px;">Chandrabagh Ave 2nd St, Dr. Radha Krishnan Salai,
                            </p>
                            <p class="mb-0" style="margin:0px;">Mylapore, Chennai, Tamil Nadu 600004</p>
                        </div>
                    </td>
                    <td colspan="5" class="border-less">

                        <div class="header-img txt-right" style="">
                            <img src="{{ URL::asset('assets/clients/brandavatar/logos/logo_brandavatar.png') }}" style="height: 60px;width:200px;margin:10px" title="">
                        </div>


                    </td>
                </tr>


                <tr>
                    <td colspan="12" class=" bg-ash">
                        <p class="sub-header txt-center text-strong">PAYSLIP FOR THE MONTH OF
                            {{-- {{\Carbon\Carbon::parse($employee_payslip->PAYROLL_MONTH)->format('M  y') }} --}}
                            <span style="text-transform:uppercase;">
                                {{ strtoupper(date('F-Y', strtotime($employee_payslip->PAYROLL_MONTH))) }} </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>EMPLOYEE NAME</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_name }}</p>
                    </td>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>EMPLOYEE CODE</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_payslip->EMP_NO }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>DATE OF BIRTH</p>
                    </td>
                    <td colspan="3">
                        <p>{{ date('d-M-Y', strtotime($employee_details->dob)) }}</p>
                    </td>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>DATE OF JOINING</p>
                    </td>
                    <td colspan="3">
                        <p>{{ date('d-M-Y', strtotime($employee_details->doj)) }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>DESIGNATION</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_office_details->designation }}</p>
                    </td>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>LOCATION</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_payslip->LOCATION }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>EPF NUMBER</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_statutory_details->epf_number }}</p>
                    </td>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>ESIC NUMBER</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_statutory_details->esic_number }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>UAN</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->UAN }}</p>
                    </td>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>PAN</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_statutory_details->uan_number }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="4" class="bg-ash ">
                        <p class="text-strong txt-center">BANK NAME</p>
                    </td>

                    <td colspan="4" class="bg-ash ">
                        <p class="text-strong txt-center">ACCOUNT NUMBER</p>
                    </td>
                    <td colspan="4" class="bg-ash ">
                        <p class="text-strong txt-center">IFSC CODE</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="4" class="">
                        <?php
                        $bank_name = '';
                        foreach ($bank_names as $singleBank) {
                            if ($singleBank->id == $employee_details->bank_id) {
                                $bank_name = $singleBank->bank_name;
                                break;
                            }
                        }
                        ?>
                        <p class="txt-center">{{ $bank_name }}</p>
                    </td>
                    <td colspan="4" class="">
                        <p class="txt-center">{{ $employee_details->bank_account_number }}</p>
                    </td>
                    <td colspan="4" class="">
                        <p class="txt-center">{{ $employee_details->bank_ifsc_code }}</p>
                    </td>


                </tr>

                <tr>
                    <td colspan="3" class="bg-ash ">
                        <p class="text-strong txt-center">MONTH DAYS</p>
                    </td>

                    <td colspan="3" class="bg-ash ">
                        <p class="text-strong txt-center">WORKED DAYS</p>
                    </td>
                    <td colspan="3" class="bg-ash ">
                        <p class="text-strong txt-center">LOSS OF PAY</p>
                    </td>
                    <td colspan="3" class="bg-ash ">
                        <p class="text-strong txt-center">ARREAR DAYS</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->MONTH_DAYS }}</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->Worked_Days }}</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->LOP }}</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->Arrears_Days }}</p>
                    </td>
                </tr>
                <tr>

                    <td colspan="2" class="bg-ash text-strong ">
                        <p class="txt-center">SL OpenBalance</p>
                    </td>
                    <td colspan="2" class="bg-ash text-strong">
                        <p class="txt-center">EL OpenBalance</p>
                    </td>
                    <td colspan="2" class="bg-ash text-strong">
                        <p class="txt-center">Availed SL</p>
                    </td>
                    <td colspan="2" class="bg-ash text-strong">
                        <p class="txt-center">Availed EL</p>
                    </td>
                    <td colspan="2" class="bg-ash text-strong">
                        <p class="txt-center">Balance SL</p>
                    </td>
                    <td colspan="2" class="bg-ash text-strong">
                        <p class="txt-center">Balance EL</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-center">{{ $employee_payslip->SL_Opn_Bal }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-center">{{ $employee_payslip->EL_Opn_Bal }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-center">{{ $employee_payslip->Availed_SL }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-center">{{ $employee_payslip->Availed_EL }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-center">{{ $employee_payslip->Balance_SL }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-center">{{ $employee_payslip->Balance_EL }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="padding-md">&nbsp; </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-center text-strong">DESCRIPTION</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-center text-strong">FIXED GROSS</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-center text-strong">ARREAR GROSS</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-center text-strong">EARNED GROSS</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-center text-strong">DEDUCTION</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-center text-strong">AMOUNT</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">BASIC</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->BASIC), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->BASIC_ARREAR), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->Earned_BASIC), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">EPF</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->EPFR), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">HRA</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->HRA), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->HRA_ARREAR), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->Earned_HRA), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">ESIC</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->EMPLOYEE_ESIC), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">SPECIAL ALLOWANCE</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->SPL_ALW), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->SPL_ALW_ARREAR), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->Earned_SPL_ALW), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">PT</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->PROF_TAX), 2) }}</p>
                    </td>


                </tr>

                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong"> OVERTIME</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->Overtime), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">INCOME TAX</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->TDS), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong"> </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">CANT-DEDUCTION</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"> <img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->CANTEEN_DEDN), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong"> </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">SALARY ADVANCE</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->SAL_ADV), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong"> </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">OTHER DEDUCTIONS</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->OTHER_DEDUC), 2) }}</p>
                    </td>
                </tr>
                <tr class="text-strong">
                    <td colspan="2" class="bg-ash">
                        <p class="txt-left text-strong">TOTAL EARNINGS</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->TOTAL_EARNED_GROSS), 2) }}</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->TOTAL_EARNED_GROSS), 2) }}</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-left text-strong">TOTAL DEDUCTION</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->TOTAL_DEDUCTIONS), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="padding-md">&nbsp; </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="bg-ash">
                        <p class="txt-left text-strong">NET PAY</p>
                    </td>
                    <td colspan="8" class="">
                        <p class="txt-center "><img height="8.5" width="12"
                            src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                            style="padding-right:0px;">{{ number_format(round($employee_payslip->NET_TAKE_HOME), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="bg-ash">
                        <p class="txt-left text-strong">NET PAY IN WORDS</p>
                    </td>
                    <td colspan="8" class="">
                        <p class="txt-center ">{{ $employee_payslip->Rupees }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="padding-md">&nbsp; </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="bg-ash">
                        <p class="txt-center text-strong">TRANSACTION ID</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                    <td colspan="3" class="bg-ash">
                        <p class="txt-center text-strong">Paid Date</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="padding-md">&nbsp; </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="txt-center">This is a computer-generated slip does not require signature</p>
                    </td>
                </tr>

                <tr class="border-less">
                    <td colspan="8" class="border-less" style="padding: 10px 0px;">
                        <p class="txt-left">Please
                            reach out to us for any payroll queries at -payroll@ardens.in</p>
                    </td>
                    <td colspan="3" class="border-less txt-right" style="    padding: 10px 0px;">
                        <p>Generated By</p>


                    </td>
                    <td colspan="1" class="border-less" style="    padding: 10px 0px;">
                        <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                            width="80px" height="15px" alt="" class="">
                    </td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>
