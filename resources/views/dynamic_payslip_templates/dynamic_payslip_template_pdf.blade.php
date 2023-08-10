<?php

 $client_logo_path   = public_path($client_details[0]['client_logo']);

 $client_image  = base64_encode(file_get_contents($client_logo_path));

?>


<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">

    <style>
       @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins&display=swap');
       *{
        font-family: 'Lobster', cursive ;
        font-family: 'Poppins', sans-serif;
       }
        .border {
            border: 1px solid #f3f4f6 !important;
        }
        .float-right {
            float: right
        }

        .float-left {
            float: left
        }
        .td{
            height: 20px !important;
        }

        .marign-top1{

        }
    </style>
</head>


<body>
    <table style="width: 100%;  border-collapse: collapse; background:#fff; ">
            <tr>
                <td colspan="3" >
                    <h3 style="color:#000; ">PAYSLIP <span style="color:gray; font-weight:500;   font-family: 'Poppins', sans-serif !important;">MAR 2023</span></h3>
                    <p style="color:#000;font-size:10px;">{{$client_details[0]['client_fullname']}}</p>
                    <p style="color:#000; font-size:9px;width:220px;line-height:16px ">{{ $client_details[0]['address'] }}</p>
                </td>
                <td colspan="1" style="">
                    <img src="data:image/png;base64,{{ $client_image }}" style="margin-top:40px; " width="160px" height="60px"  >
                </td>
            </tr>
        <tr class="td"  style="height:20px; marign:0px;" >
            <td colspan="4" class="td"  border="2" style="marign:0px;">
                <h5 style="font-size: 12px; margin-bottom:2px ">{{ $personal_details[0]['name'] }}</h5>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="1" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        <tr class="td" style="height: 30px">
            <td class=" " style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray;">Employee Number</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['user_code']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Date Joined</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['doj']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Department</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['department_name']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Sub Department</p>
                <p style="font-size:11px; margin-top:-8px">{{" - "}}</p>
            </td>

        </tr>
        <tr class="td" style="height: 30px">
            <td class=" " style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray;">Designation </p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['designation']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Payment Mode</p>
                <p style="font-size:11px; margin-top:-8px"> {{ " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Bank</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['bank_name']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Bank IFSC</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['bank_ifsc_code']}}</p>
            </td>

        </tr>
        <tr class="td" style="height: 30px">
            <td class=" " style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray;">Bank Account</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['bank_account_number']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">PAN</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['pan_number']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">UAN</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['uan_number']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">PF Number</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['epf_number']}}</p>
            </td>

        </tr>
        <tr>
            <td colspan="4">
                <table border="0.5" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        <tr class="td"  style="height:20px; marign:0px;">
            <td colspan="4" class="td"  border="2" style="marign:0px;padding-top:20px">
                <p style="font-size: 12px; margin-bottom:2px ">SALARY DETAILS</p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="0.5" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        <tr class="td" style="height: 30px">
            <td class=" " style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray;">ACTUAL PAYABLE DAYS</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['month_days']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">TOTAL WORKING DAYS</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['worked_Days']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">LOSS OF PAY DAYS</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['lop']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">DAYS PAYABLE</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['arrears_Days']}}</p>
            </td>

        </tr>
        <tr>
            <td colspan="4" >
                    <table  style="width:100%;border-collapse: collapse; border-bottom: 0.4px solid rgba(128, 128, 128, 0.603);  "></table>
            </td>
        </tr>
        <tr style="width: 100%;">
            <td colspan="2" style=""  >
                <table style="width: 100%; margin-top:0%;border-right: 0.4px solid rgba(128, 128, 128, 0.603); padding-right:8px;" >
                    <tr style="height: 12px">
                        <td colspan="2" style="height: 12px">
                            <h1 style="font-size:10px; font-weight:900"><b>EARNINGS</b></h1>
                        </td>
                    </tr>
                    @foreach ($earnings[0] as $key => $single_earnings)
                    @if ($key == "Total Earnings")
                    <tr style="height: 12px; ">
                        <td style="height: 12px;">
                            <p style="font-size:10px;margin-top:-4px; font-weight:900 ">{{ $key }}</p>
                        </td>
                        <td>
                            <p style="font-size:10px; float: right;margin-top:-4px; font-weight:900">{{ $single_earnings }}</p>
                        </td>
                    </tr>
                        @else
                        <tr style="height: 12px; ">
                            <td style="height: 12px;">
                                <p style="font-size:10px;margin-top:-4px; ">{{ $key }}</p>
                            </td>
                            <td>
                                <p style="font-size:10px; float: right;margin-top:-4px;">{{ $single_earnings }}</p>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>

            </td>
            <td colspan="2" style="padding:0px">
                <table style="width: 100%;" >
                    <tr style="height: 12px">
                        <td colspan="2" style="height: 12px">
                            <h1 style="font-size:10px;"><b>CONTRIBUTIONS</b></h1>
                        </td>
                    </tr>
                    @foreach ($contribution[0] as $key => $single_contribution)
                    @if ($key =="Total Contribution")
                    <tr style="height: 12px">
                        <td style="height: 12px">
                            <p style="font-size:10px; margin-top:-4px; font-weight:900">{{ $key }}</p>
                        </td>
                        <td>
                            <p style="font-size:10px; float: right; margin-top:-4px; font-weight:900">{{ $single_contribution }}</p>
                        </td>
                    </tr>
                        @else
                        <tr style="height: 12px">
                            <td style="height: 12px">
                                <p style="font-size:10px; margin-top:-4px;">{{ $key }}</p>
                            </td>
                            <td>
                                <p style="font-size:10px; float: right; margin-top:-4px;">{{ $single_contribution }}</p>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td colspan="2">
                            <h1  style="font-size:10px; margin-top:-4px;"><b>TAXES & DEDUCTIONS</b></h1>
                        </td>
                    </tr>
                    @foreach ($Tax_Deduction[0] as $key => $single_taxdeduction)
                    @if ( $key == "Total Deduction")
                    <tr>
                        <td>
                            <p  style="font-size:10px; margin-top:-4px; font-weight:900">{{ $key }}</p>
                        </td>
                        <td>
                            <p style="font-size:10px; float: right; margin-top:-4px; font-weight:900">{{ $single_taxdeduction }}</p>
                        </td>
                    </tr>
                        @else
                        <tr>
                            <td>
                                <p  style="font-size:10px; margin-top:-4px;">{{ $key }}</p>
                            </td>
                            <td>
                                <p style="font-size:10px; float: right; margin-top:-4px;">{{ $single_taxdeduction }}</p>
                            </td>
                        </tr>
                    @endif

                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="1" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        @foreach ($over_all[0] as $key => $total_sumvalue)
        @if ($key == "Net Salary in words")
        <tr>
            <td colspan="1">
                <p style="font-size:12px font-weight:900">{{ $key }}</p>
            </td>
            <td colspan="4">
                <p style="font-size:12px; margin-left:110px; font-weight:900">{{  $total_sumvalue }}</p>
            </td>
        </tr>
            @else
            <tr>
                <td colspan="1">
                    <p style="font-size:12px">{{ $key }}</p>
                </td>
                <td colspan="4">
                    <p style="font-size:12px; margin-left:110px;">{{  $total_sumvalue }}</p>
                </td>
            </tr>
        @endif
        @endforeach
        <tr>
            <td colspan="2">
                <p style="font-size: 12px;"><b>**Note :</b> All amounts displayed in this payslip are in <b>INR</b></p>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <p style="font-size: 10px; margin-top:40px">*This is computer generated statement, does not require signature</p>
            </td>
        </tr>
    </table>
</body>
</html>
