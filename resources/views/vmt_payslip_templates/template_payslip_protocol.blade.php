<?php
//$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee_payslip->EMP_NO)->first('name');
$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
$bank_names = \DB::table('bank_list')->get();

?>
<html>



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    </head>

    <style>
        table {
            width: 100%;
            vertical-align: middle;
            font-family: sans-serif;
        }

        .payslip_table tr,
        td {
            border: 1.5pt solid #903700;

        }

        .border-less {
            border: 0px !important;
        }

        tr {
            height: 12.55pt;
        }

        td {
            width: 81.35pt;
            color: #002f56;
            /* padding: 1.5px; */
        }

        .padding-md {
            /* padding: 2pt 0pt; */
        }

        .margin-0 {
            margin: 0px;
        }
        .margin_b0{
            margin-bottom: 0px;
        }

        p {
            font-size: 9pt;
            margin-top: 3pt;
            margin-bottom: 3pt;
            padding: 0.5px 5px;
        }
        .text-navyBlue{
            color: #002f56;
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

        td.bg-ash {
            background-color: #d9d9d9;
        }
    </style>
</head>

<body>
    {{-- <div class="main-page"> --}}
        <div class="sub-page" style="text-align: justify;">

            <table cellspacing="0" cellpadding="0" class="payslip_table">
                <tr class="border-less">
                    <td class="border-less" colspan="12">
                        <img src="{{ URL::asset('assets/images/header_protocolo.svg') }}" class="" alt=""
                        style="width:100%;height:100%;">
                    </td>
                </tr>
                <tr class="header-row" aria-rowcount="">
                    <td colspan="8" class="border-less  p3" rowspan="">
                        <div class="header-cotent">

                            <p class="margin-0   text-strong"
                                style="color: #002f56;
                            font-size: 18px;
                            padding-left: 5px;">
                                Protocol Labels India Pvt. Ltd.</p>
                                <p class="margin_b0">166, Gerugambakkam, Bharathi Nagar,</p>
                                <p class="margin_b0">#3rd floor, S plot no 3A&3B, </p>
                            <p class="margin_b0">Porur, Chennai, Tamil Nadu 600128.</p>

                        </div>
                    </td>
                    <td colspan="4" class="border-less ">

                        <div class="header-img txt-right "
                            style="height:100px ;width:100%">

                            <img src="{{ URL::asset('assets/images/protocol_logo.png') }}" class="txt-right"
                                alt=""
                                style="height: 100px;width:110px;margin-top: -36px;
                                margin-right: 20px;">
                        </div>


                    </td>
                </tr>


                <tr>
                    <td colspan="12" class=" bg-ash">
                        <p class=" txt-center text-navyBlue  text-strong">PAYSLIP FOR THE MONTH OF &ndash;
                            {{ strtoupper($employee_payslip->PAYROLL_MONTH) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-navyBlue  bg-ash text-strong">
                        <p>EMPLOYEE NAME</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_name }}</p>
                    </td>
                    <td colspan="3" class="text-navyBlue  bg-ash text-strong">
                        <p>EMPLOYEE CODE</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_payslip->EMP_NO }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>DATE OF BIRTH</p>
                    </td>
                    <td colspan="3">
                        <p>{{ date('d-m-Y', strtotime($employee_details->dob)) }}</p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>DATE OF JOINING</p>
                    </td>
                    <td colspan="3">
                        <p>{{ date('d-m-Y', strtotime($employee_payslip->DOJ)) }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>DESIGNATION</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_office_details->designation }}</p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>LOCATION</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->location }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>EPF NUMBER</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->epf_number }}</p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>ESIC NUMBER</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->esic_number }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>UAN</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->uan }}</p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash text-strong">
                        <p>PAN</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->pan_number }}</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="4" class="text-navyBlue bg-ash ">
                        <p class="text-strong txt-center">BANK NAME</p>
                    </td>

                    <td colspan="4" class="text-navyBlue bg-ash ">
                        <p class="text-strong txt-center">ACCOUNT NUMBER</p>
                    </td>
                    <td colspan="4" class="text-navyBlue bg-ash ">
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
                    <td colspan="3" class="text-navyBlue bg-ash ">
                        <p class="text-strong txt-center">MONTH DAYS</p>
                    </td>

                    <td colspan="3" class="text-navyBlue bg-ash ">
                        <p class="text-strong txt-center">WORKED DAYS</p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash ">
                        <p class="text-strong txt-center">LOSS OF PAY</p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash ">
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

                <tr>
                    <td colspan="12">
                        <p class="padding-md">&nbsp; </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">DESCRIPTION</p>
                    </td>
                    <td colspan="2" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">AMOUNT</p>
                    </td>
                    <td colspan="2" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">ARREAR AMOUNT</p>
                    </td>
                    <td colspan="2" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">EARNED AMOUNT</p>
                    </td>
                    <td colspan="2" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">DEDUCTION</p>
                    </td>
                    <td colspan="2" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">AMOUNT</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">BASIC</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"> <span class="currency"></span>
                            {{ number_format((int)$employee_payslip->BASIC, 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->BASIC_ARREAR), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->Earned_BASIC), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">EPF</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->EPFR), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">HRA</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format((int)$employee_payslip->HRA, 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->HRA_ARREAR), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->Earned_HRA), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">ESIC</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->EMPLOYEE_ESIC), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">SPECIAL ALLOWANCE</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->SPL_ALW), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->SPL_ALW_ARREAR), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->Earned_SPL_ALW), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">PROF TAX</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->PROF_TAX), 2) }}</p>
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
                        <p class="txt-right">{{ number_format(round($employee_payslip->Overtime), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">INCOME TAX</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->TDS), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong"> OTHER EARNINGS</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->Overtime), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">SALARY ADVANCE</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right">{{ number_format(round($employee_payslip->TDS), 2) }}</p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-navyBlue text-strong">TRAVAL CONVEYANCE</p>
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
                        <p class="txt-left text-navyBlue text-strong">OTHER DEDUCTIONS</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right ">{{ number_format(round($employee_payslip->OTHER_DEDUC), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-left nav text-strong text-navyBlue">TOTAL EARNINGS</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right  text-navyBlue">{{ number_format(round($employee_payslip->TOTAL_EARNED_GROSS), 2) }}</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="bg-ash">
                        <p class="txt-right text-navyBlue">{{ number_format(round($employee_payslip->TOTAL_EARNED_GROSS), 2) }}</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-left text-strong text-navyBlue">TOTAL DEDUCTION</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right text-navyBlue">{{ number_format(round( $employee_payslip->TOTAL_DEDUCTIONS), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="padding-md">&nbsp; </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-navyBlue bg-ash">
                        <p class="txt-left text-strong">NET PAY</p>
                    </td>
                    <td colspan="8" class="">
                        <p class="txt-center ">{{ number_format(round($employee_payslip->NET_TAKE_HOME), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-navyBlue bg-ash">
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
                    <td colspan="3" class="text-navyBlue bg-ash">
                        <p class="txt-center text-strong">TRANSACTION ID</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                    <td colspan="3" class="text-navyBlue bg-ash">
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
                    <td colspan="12" class="bg-ash">
                        <p class="padding-md txt-center">Leave Details</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-navyBlue text-strong">Leave's Type</p>
                    </td>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-navyBlue text-strong">Opening Balance</p>
                    </td>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-navyBlue text-strong">Availed Balance</p>
                    </td>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-strong">Closing Balance</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-strong">Casual Leave</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center text-strong"></p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-strong">Sick Leave</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center text-strong"></p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class=" bg-ash">
                        <p class="txt-center text-strong">Earned Leave</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center text-strong"></p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <p class="txt-center">This is a computer-generated slip does not require signature</p>
                    </td>
                </tr>

                <tr class="border-less">
                    <td colspan="8" class="border-less" style="    padding: 10px 0px;">
                        <p class="txt-left">Please
                            reach out to us for any payroll queries at -payroll@ardens.in</p>
                    </td>
                    <td colspan="3" class="border-less txt-right" style="    padding: 10px 0px;">
                        <p>Generated By</p>


                    </td>
                    <td colspan="1" class="border-less" style="    padding: 10px 0px;">
                        <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" width="80px" height="15px"
                        alt="" class="">
                    </td>
                </tr>

                <tr class="border-less">
                    <td colspan="12" class="border-less">
                        <img src="{{ URL::asset('assets/images/footerProtocolImg_payslip.svg') }}" class="" alt=""
                        style="height:100%;width:100%;">
                    </td>
                </tr>

            </table>

        </div>
    {{-- </div> --}}

</body>

</html>
