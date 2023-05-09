<?php
//$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee->EMP_NO)->first('name');
$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
// $bank_names = \DB::table('vmt_banks')->get();
?>
<?php

// $bank_names = \DB::table('vmt_banks')->get();
?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        .sub-page {
            background: #fff;

        }

        @page {
            size: A4 landscape;
        }


        .paySlip_template {
            width: 100%;
            border: 0;
            background-color: #fff;
            white-space: nowrap;
            font-size: .9em;
        }

        .paySlip_template tr td {
            /* padding-top: .7em;
            padding-bottom: .7em; */

        }

        /* .paySlip_template , */
        .paySlip_template td {
            border: 0;
            whhite-space: nowrap;
        }

        .text-bolder {
            font-weight: 700;
        }

        .text-center {
            text-align: center;
        }

        .text-rignt {
            text-align: right;
        }

        .border-t-b {
            border-top: 1px solid #b6b3b3 !important;
            border-bottom: 1px solid #b6b3b3 !important;
        }

        .border-b {
            border-bottom: 1px solid #b6b3b3 !important;
        }

        .p-t-b {
            padding-top: .8em;
            padding-bottom: .8em;
        }

        .margin-0: {
            margin: 0;
        }
    </style>
</head>

<body>
    <table class="paySlip_template">
        <tbody>
            <tr>
                <td colspan="4" class=" ">
                    <div class="">
                        <img src="{{ $client_logo }}" class="" alt=""
                            style="height: 40px;width:250px;max-height:100%;">
                    </div>

                </td>

                <td colspan="3" class="text-rignt" align="right">
                    <p class="text-bolder text-right" style="margin:0">
                        eTeam Infoservices Pvt Ltd
                    </p>
                    <span class="text-right">
                        208/W, Seth B. N. Agarwal,<br>
                        Shyamkamal A CHS Ltd, Tejpal Road,<br>
                        Vile Parle East, Mumbai-400057, India
                    </span>

                </td>

            </tr>
            <tr class="">
                <td colspan="7" class="  border-t-b">
                    <p class="text-bolder " style="margin: 0;padding:.7em 0;">
                        Payslip For the Month of :
                        {{ strtoupper(date('F-Y', strtotime($employee_payslip->PAYROLL_MONTH))) }}
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="padding-bottom:1em;">
                    <table class="paySlip_template">
                        <tbody>
                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Employee code
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ $employee_payslip->EMP_NO }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Designation
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ $employee_office_details->designation }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;" class="text-bolder ">
                                    LeaveType
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;" class="text-bolder">
                                    Leave Taken
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;" class="text-bolder">
                                    Available Leave
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Employee Name
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ $employee_name }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Bank Name
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{-- {{ $bank_name }} --}}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    PL
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    1.00
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    1.50
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    UAN
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ $employee_statutory_details->uan_number }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Bank Account No
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ $employee_details->bank_account_number }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Location
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Chennai
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    PAN No
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    BTFPR1583J
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                            </tr>

                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    PF No
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ $employee_details->pan_number }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Joining Date
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    {{ date('d-M-Y', strtotime($employee_details->doj)) }}
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                            </tr>

                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Paid Days
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    28.00
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    ESI No
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Leave Balance
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    28.00
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">
                                    Arrear Days
                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                                <td colspan="1" style="padding-bottom: .3em;">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="border-t-b" style="padding:.3em 0">
                </td>
            </tr>
            <tr class="">
                <td colspan="4" style="padding-right:1em;padding-top:0.3em;">
                    <table class="paySlip_template">
                        <tr>
                            <td colspan="4">
                                <p class="text-bolder ">
                                    Earnings
                                </p>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <td class="border-b" style="padding-bottom: .3em;" colspan="1">
                                Description
                            </td>
                            <td class="border-b" style="padding-bottom: .3em;" colspan="1">
                                Fixed Gross
                            </td>
                            <td class="border-b" style="padding-bottom: .3em;" colspan="1">
                                Earned Gross
                            </td>
                            <td class="border-b" style="padding-bottom: .3em;padding-right:1em " colspan="1">
                                Arrear
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">Basic</td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->BASIC), 2) }}
                            </td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->Earned_BASIC), 2) }}
                            </td>
                            <td colspan="1" style="padding-bottom: .3em;padding-right:1em ">
                                {{ number_format(round($employee_payslip->BASIC_ARREAR), 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">HRA</td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->HRA), 2) }}
                            </td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->Earned_HRA), 2) }}
                            </td>
                            <td colspan="1" style="padding-bottom: .3em;padding-right:1em ">
                                {{ number_format(round($employee_payslip->HRA_ARREAR), 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">Spl_Allowance
                            </td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->SPL_ALW), 2) }}</td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->Earned_SPL_ALW), 2) }}</td>
                            <td colspan="1" style="padding-bottom: .3em;padding-right:1em ">
                                {{ number_format(round($employee_payslip->SPL_ALW_ARREAR), 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">Statutory Bonus
                            </td>
                            <td colspan="1" style="padding-bottom: .3em;">11600.00</td>
                            <td colspan="1" style="padding-bottom: .3em;">11600.00</td>
                            <td colspan="1" style="padding-bottom: .3em;">0.00</td>
                        </tr>
                        <tr class="border-t-b">
                            <td colspan="1" style="padding:.5em 0;" class="border-t-b">
                            </td>
                            <td colspan="1" style="padding:.5em 0;" class="border-t-b">11600.00</td>
                            <td colspan="1" style="padding:.5em 0;" class="border-t-b">11600.00</td>
                            <td colspan="1" style="padding:.5em 0;" class="border-t-b"></td>
                        </tr>

                    </table>
                </td>
                <td colspan="3" style="padding-left:1em;padding-top:0.3em;">
                    <table class="paySlip_template">
                        <tr>
                            <td colspan="3">
                                <p class="text-bolder" style="margin:">
                                    Deductions
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b" style="padding-bottom: .3em;" colspan="1">Deductions
                            </td>
                            <td class="border-b" style="padding-bottom: .3em;" colspan="1">Monthly
                            </td>
                            <td class="border-b" style="padding-bottom: .3em;" colspan="1">Arrear</td>


                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">PF</td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ $employee_statutory_details->epf_number ?? '-' }}</td>
                            <td colspan="1" style="padding-bottom: .3em;">1800.00</td>

                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">PT</td>
                            <td colspan="1" style="padding-bottom: .3em;">
                                {{ number_format(round($employee_payslip->PROF_TAX), 2) }}</td>
                            <td colspan="1" style="padding-bottom: .3em;">1800.00</td>

                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">&nbsp;</td>
                            <td colspan="1" style="padding-bottom: .3em;">&nbsp;</td>
                            <td colspan="1" style="padding-bottom: .3em;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="padding-bottom: .3em;">&nbsp;</td>
                            <td colspan="1" style="padding-bottom: .3em;">&nbsp;</td>
                            <td colspan="1" style="padding-bottom: .3em;">&nbsp;</td>
                        </tr>
                        <tr class="border-t-b">
                            <td colspan="1" style="padding:.6em 0;" class="border-t-b">Total Deductions</td>
                            <td colspan="1" style="padding:.6em 0;" class="border-t-b">
                                {{ number_format(round($employee_payslip->TOTAL_DEDUCTIONS), 2) }}</td>
                            <td colspan="1" style="padding:.6em 0;" class="border-t-b"></td>
                        </tr>

                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="7">
                    <p class="margin-0">
                        <span  class=" text-bolder">Payable Salary &nbsp;
                            {{ number_format(round($employee_payslip->TOTAL_EARNED_GROSS), 2) }}
                        </span>
                        <br>
                        <span style="padding:.2em 0">
                            Net Amount in words:
                            {{ $employee_payslip->Rupees }} Only
                        </span>
                    </p>
                </td>
            </tr>

            <tr>
                <td colspan="7">
                    <p class=" text-bolder" style="margin:.1em 0">THIS IS A SYSTEM GENERATED PAYSLIP, DOES
                        NOT REQUIRE ANY
                        SIGNATURE AND/OR COMPANY SEAL</p>
                </td>
            </tr>
            <tr>
                <td colspan="5">

                </td>
                <td colspan="1" class=" " style="padding-right:.2em">

                </td>
                <td colspan="1" class="text-right" align="right" style="padding:.3em 0">

                    <span>Generated By</span>
                    <img style="display: revert"
                        src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" width="80px"
                        height="18px" alt="logo" class="">

                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>
