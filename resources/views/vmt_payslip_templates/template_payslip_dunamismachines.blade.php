<?php
$general_info = \DB::table('vmt_client_master')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee->EMP_NO)->first('name');
$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->client_logo;
// dd(request()->getSchemeAndHttpHost()."".$general_info->client_logo);
$bank_names = \DB::table('vmt_banks')->get();
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <style>
        table {
            width: 100%;
            vertical-align: middle;

        }

        .payslip_table tr,
        .payslip_table td {
            border: 1.5pt solid #ff530a;

        }



        .border-less {
            border: 0px !important;
        }

        tr {
            height: 12.55pt;
        }

        td {
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
                    <td colspan="8" class="border-less">
                        <div class="header-cotent" style="margin: 1px;">
                            <p class=" text-strong"
                                style="color: #002f56;
                            padding-left: 5px;font-size:17px;margin:0px;">
                                Dunamis Machines International Private Limited</p>

                            <p class="mb-0" style="margin:0px;"> No.4/516C, Upparapalayam Road, Edapalayam, Alamathi, Redhills</p>
                            <p class="mb-0" style="margin:0px;">Near NDDB Semen Station,</p>
                            <p class="mb-0" style="margin:0px;"> Chennai, Tamil Nadu 600052 </p>

                        </div>
                    </td>
                    <td colspan="4" class="border-less">

                        <div class="header-img txt-right" style="">
                            <img src={{ $client_logo }} style="margin:10px;height: 60px;width:150px; " title="">
                            {{-- <img src={{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}
                                style="height: 35px;width:150px;margin:10px" title=""> --}}

                        </div>


                    </td>
                </tr>


                <tr>
                    <td colspan="12" class=" bg-ash">
                        <p class="sub-header txt-center text-strong">PAYSLIP FOR THE MONTH OF &ndash;
                            <span style="text-transform:uppercase;">
                                {{ strtoupper(date('F-Y', strtotime($emp_payroll_month->payroll_date))) }}</span>
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
                        <p>{{ $employee_code }}</p>
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
                        <p>{{ $employee_details->location }}</p>
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
                        <p>{{ $employee_statutory_details->uan_number }}</p>
                    </td>
                    <td colspan="3" class="bg-ash text-strong">
                        <p>PAN</p>
                    </td>
                    <td colspan="3">
                        <p>{{ $employee_details->pan_number }}</p>
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
                        <p class="txt-center">{{ $employee_payslip->month_days }}</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->worked_Days }}</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->lop }}</p>
                    </td>
                    <td colspan="3" class="">
                        <p class="txt-center">{{ $employee_payslip->arrears_Days }}</p>
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
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->basic), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->basic_arrear), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->earned_basic), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">EPF</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->epfr), 2) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">HRA</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->hra), 2) }}</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->hra_arrear), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->earned_hra), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">ESIC</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->employee_esic), 2) }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">SPECIAL ALLOWANCE</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->spl_alw), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->spl_alw_arrear), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->earned_spl_alw), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">PT</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->prof_tax), 2) }}
                        </p>
                    </td>


                </tr>

                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">DAILY ALLOWANCE</p>
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
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->daily_allowance), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">INCOME TAX</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->income_tax), 2) }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">OTHER EARNINGS </p>
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
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->other_earnings), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">CANT-DEDUCTION</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"> <img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->canteen_dedn), 2) }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">OVERTIME</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="">
                        <p class="txt-right"> <img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->overtime), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-left text-strong">SALARY ADVANCE</p>
                    </td>
                    <td colspan="2" class="">
                        <p class="txt-right"> <img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->sal_adv), 2) }}
                        </p>
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
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->other_deduc), 2) }}
                        </p>
                    </td>
                </tr>
                <tr class="text-strong">
                    <td colspan="2" class="bg-ash">
                        <p class="txt-left  text-strong">TOTAL EARNINGS</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->total_fixed_gross), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"></p>
                    </td>

                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->total_earned_gross), 2) }}
                        </p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-left text-strong">TOTAL DEDUCTION</p>
                    </td>
                    <td colspan="2" class="bg-ash">
                        <p class="txt-right"><img height="8.5" width="12"
                                src="{{ URL::asset('assets/images/inr_png.png') }}" class="txt-right" alt=""
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->total_deductions), 2) }}
                        </p>
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
                                style="padding-right:0px;">{{ number_format(round($employee_payslip->net_take_home), 2) }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="bg-ash">
                        <p class="txt-left text-strong">NET PAY IN WORDS</p>
                    </td>
                    <td colspan="8" class="">
                        <p class="txt-center ">{{ $employee_payslip->rupees }}</p>
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
                    <td colspan="8" class="border-less" style="    padding: 10px 0px;">
                        <p class="txt-left">Please
                            reach out to us for any payroll queries at -payroll@ardens.in</p>
                    </td>
                    <td colspan="3" class="border-less txt-right" style="    padding: 10px 0px;">
                        <p>Generated By</p>


                    </td>
                    <td colspan="1" class="border-less" style="    padding: 10px 0px;">
                        <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                            width="100px" height="18px" alt="" class="">
                    </td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>
