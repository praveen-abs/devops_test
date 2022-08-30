<?php
$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
$client_logo = request()->getSchemeAndHttpHost() . "" . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
?>
<html>

<head>

    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .main-page {
            width: 210mm;
            min-height: 297mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .sub-page {
            padding: 1cm;
            height: 297mm;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>

</head>

<body>
    <div class="main-page">
        <div class="sub-page">
            <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; float:left;">
                <tbody>
                    <tr style="height:66.7pt; border:1.5pt solid #af1888;">
                        <td colspan="7" style=" padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <div class="header-cotent" style="">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Tahoma;">Ardens Business Solutions Private
                                            Limited</span></strong></p>
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:9.5pt;"><strong><span style="font-family:Tahoma;">&ldquo;SHALOM
                                            BUILDING&rdquo;&nbsp;</span></strong></p>
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:9.5pt;"><span style="font-family:Tahoma;">1</span><span style="font-family:Tahoma; font-size:6.33pt;"><sup>st</sup></span><span style="font-family:Tahoma;">&nbsp;Floor, Office No.20, No.04, Mannar
                                        Street,&nbsp;</span></p>
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:9.5pt;"><span style="font-family:Tahoma;">T Nagar, Chennai, Tamil Nadu, India &ndash; 600
                                        017</span></p>
                            </div>
                        </td>
                        <td colspan="4">
                            <div style="">
                                <!-- <img src="{{ URL::asset('assets/images/footer_logo.png') }}" alt="" class=""> -->
                                <div class="header-img" style="height: 40px;width:180px;">
                                    <img src={{$client_logo}} style="height:100%;width:100%;" title="">
                                    <!-- <img src="/brandavatar-appointementletter/images/brandavatarlogo.png" alt=""
                                        style="height:100%;width:100%;"> -->
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="9" style="width:542.2pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">PAYSLIP FOR THE
                                        MONTH OF &ndash;
                                        {{$employee->PAYROLL_MONTH}}</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">EMPLOYEE NAME</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->EMP_NAME}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">Employee CODE</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->EMP_NO}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">DATE OF BIRTH</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->DOB}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">DATE OF JOINING</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->DOJ}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">DESIGNATION</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->DESIGNATION}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">LOCATION</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->LOCATION}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">EPF NUMBER</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->EPF_Number}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">ESIC NUMBER</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->ESIC_Number}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">UAN</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->UAN}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">PAN</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:>; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->PAN_Number}}</span></p>

                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="4" style="width:173.5pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">BANK NAME</span></strong></p>
                        </td>
                        <td colspan="2" style="width:173.55pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">ACCOUNT NUMBER</span></strong></p>
                        </td>
                        <td colspan="3" style="width:173.55pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">IFSC CODE</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="4" style="width:173.5pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->Bank_Name}}</span></p>
                        </td>
                        <td colspan="2" style="width:173.55pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->Account_Number}}</span></p>
                        </td>
                        <td colspan="3" style="width:173.55pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->Bank_IFSC_Code}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">MONTH DAYS</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">WORKED DAYS</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">LOSS OF PAY</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">ARREAR DAYS</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->MONTH_DAYS}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->Worked_Days}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">{{$employee->LOP}}</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">{{$employee->Arrears_Days}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">SL Open Balance</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">CL Open Balance</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">Availed SL</span></strong></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">Availed CL</span></strong></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">Balance SL</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">Balance CL</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">-</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">-</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">-</span></strong></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">-</span></strong></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">-</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">-</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:6.3pt;">
                        <td colspan="9" style="width:542.2pt; border-top-style:solid; border-top-width:0.75pt; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#ffffff;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">&nbsp;</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">DESCRIPTION</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">AMOUNT</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">ARREAR AMOUNT</span></strong></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">EARNED AMOUNT</span></strong></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">DEDUCTION</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">AMOUNT</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">BASIC</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left    ; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->BASIC}}</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><span style="font-family:Calibri; font-size:10.5pt;">0</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><span style="font-family:Calibri; font-size:10.5pt;">4560</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">EPF</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; 638</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">HRA</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->HRA}}</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><span style="font-family:Calibri; font-size:10.5pt;">0</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><span style="font-family:Calibri; font-size:10.5pt;">2280</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">ESIC</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; 58</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">SPECIAL ALLOW</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->SPL_ALW}}</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; 0</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; 760</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">PT</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->PROF_TAX}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">OVERTIME</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->Overtime}}</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">TDS</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->TDS}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">&nbsp;</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:11pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">CANT-DEDUCTION</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->CANTEEN_DEDN}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">&nbsp;</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:11pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">SALARY ADVANCE</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->SAL_ADV}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">&nbsp;</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">OTHER DEDUCTIONS</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; {{$employee->OTHER_DEDUC}}</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">TOTAL EARNINGS</span></strong></p>
                        </td>
                        <td colspan="3" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><strong><span style="font-family:Calibri;">8000</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:10.5pt;"><strong><span style="font-family:Calibri;">&nbsp;</span></strong></p>
                        </td>
                        <td style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><strong><span style="font-family:Calibri; font-size:10.5pt;">7666</span></strong></p>
                        </td>
                        <td colspan="2" style="width:81.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">TOTAL DEDUCTION</span></strong></p>
                        </td>
                        <td style="width:81.4pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><strong><span style="font-family:Calibri;">{{$employee->TOTAL_DEDUCTIONS}}</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:14.35pt;">
                        <td colspan="9" style="width:542.2pt; border-top-style:solid; border-top-width:0.75pt; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:bottom;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="5" style="width:265.7pt; border-top:1.5pt solid #af1888; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:10.5pt;"><strong><span style="font-family:Calibri;">NET PAY</span></strong></p>
                        </td>
                        <td colspan="4" style="width:265.7pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">&#x20B9; </span><strong><span style="font-family:Calibri; font-size:10.5pt;">6665</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="2" style="width:95.05pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d0cece;">
                            <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><strong><span style="font-family:Calibri;">NET PAY IN WORDS</span></strong></p>
                        </td>
                        <td colspan="7" style="width:436.35pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">{{$employee->Rupees}}</span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:14.35pt;">
                        <td colspan="9" style="width:542.2pt; border-top-style:solid; border-top-width:0.75pt; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:4.65pt; padding-left:4.65pt; vertical-align:bottom;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height:20.55pt;">
                        <td colspan="3" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:Calibri;">TRANSACTION ID</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle; background-color:#d9d9d9;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><strong><span style="font-family:Calibri;">Paid Date</span></strong></p>
                        </td>
                        <td colspan="2" style="width:127.45pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:Calibri;">11-MAY-2022</span></p>
                        </td>
                    </tr>
                    <tr style="height:14.35pt;">
                        <td colspan="9" style="width:542.2pt; border-top-style:solid; border-top-width:0.75pt; border-right:1.5pt solid #af1888; border-left:1.5pt solid #af1888; border-bottom:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:bottom;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;"><span style="font-family:Calibri;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height:21.55pt;">
                        <td colspan="9" style="width:542.2pt; border:1.5pt solid #af1888; padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10.5pt;">
                                <strong><em><span style="font-family:Calibri;">This is a computer-generated slip does not
                                            require signature</span></em></strong>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:0pt;">
                        <td style="width:92.15pt;"><br></td>
                        <td style="width:13.7pt;"><br></td>
                        <td style="width:32.4pt;"><br></td>
                        <td style="width:46.05pt;"><br></td>
                        <td style="width:92.2pt;"><br></td>
                        <td style="width:92.15pt;"><br></td>
                        <td style="width:46.1pt;"><br></td>
                        <td style="width:46.05pt;"><br></td>
                        <td style="width:92.2pt;"><br></td>
                    </tr>
                    <tr style="height:66.7pt; border:0;">
                        <td colspan="6" style=" padding-right:4.65pt; padding-left:4.65pt; vertical-align:middle;">

                            <span style="margin-top:0pt; margin-bottom:0pt;"><span style="font-family:Calibri; font-size:10pt;margin-left: 13px;    padding-top: 15px;">Please
                                    reach out to us for any payroll queries at -payroll@ardens.in</span>
                        </td>
                        <td colspan="6">
                            <p style="font-family:'Calibri Light'; font-size:8pt;display:flex;align-items:center;"><span>Powered By</span> 
                                <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" class="" style="height: 45px;width:130px;">
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>