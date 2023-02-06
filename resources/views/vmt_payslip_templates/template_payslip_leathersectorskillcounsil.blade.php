<?php
//$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee->EMP_NO)->first('name');
$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
$bank_names = \DB::table('vmt_banks')->get();

?>
<?php
//$client_logo = request()->getSchemeAndHttpHost() . session()->get('client_logo_url');
$bank_names = \DB::table('vmt_banks')->get();
//dd($client_logo);
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <style>
        table {
            width: 100%;
            vertical-align: middle;
            font-family: sans-serif;
        }

        .payslip_table tr,
        .payslip_table td {
            border: 1.5pt solid #ea141c;

        }

        .navy-blue {
            color: #213060;
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

        p {
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

        .bg-ash {
            background-color: #9e9e9e5c;
        }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="0" class="payslip_table">
        <tr class="header-row">
            <td colspan="8" class="" style="border-right:0px;">
                <div class="header-cotent" style="margin: 10px;">
                    <p class="margin-0 brand-name " style="font-size: 16px;font-weight:600;color:#213060;">Precede
                        Workforce Solutions India Private Limited</p>
                    <p class="mb-0">No: 2,Vengaivasal main road,</p>
                    <p class="mb-0"> Santhoshapuram,medavakkam</p>
                    <p class="mb-0">Chennai -600073,Tamilnadu.</p>
                </div>
            </td>
            <td colspan="4" class="" style="border-left:0px;" align="right">

                {{-- <div class="header-img txt-right" style="padding-right: 10px;height:55px;width:180px;"> --}}
                <div class="header-img txt-right" style="padding-right: 10px;">
                    <img src="{{ URL::asset('assets/images/precede.png') }}" class="" alt="logo"
                        style="height:100%;width:100%;">
                </div>


            </td>
        </tr>



        <tr>
            <td colspan="12" class="bg-ash">
                <p class="sub-header navy-blue txt-center text-strong">PAYSLIP FOR THE MONTH OF &ndash;
                    {{ \Carbon\Carbon::parse($employee_payslip->PAYROLL_MONTH)->format('M  y') }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">EMPLOYEE NAME</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_name }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">EMPLOYEE CODE</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_payslip->EMP_NO }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">DATE OF BIRTH</p>
            </td>
            <td colspan="3">
                <p>{{ date('d-m-Y', strtotime($employee_details->dob)) }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">DATE OF JOINING</p>
            </td>
            <td colspan="3">
                <p>{{ date('d-m-Y', strtotime($employee_details->doj)) }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">DESIGNATION</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_office_details->designation }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">LOCATION</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->location }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">EPF NUMBER</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->EPF_Number }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">ESIC NUMBER</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->ESIC_Number }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">UAN</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->UAN }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p class="navy-blue">PAN</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->PAN_Number }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="4" class="bg-ash ">
                <p class="text-strong navy-blue txt-center">BANK NAME</p>
            </td>

            <td colspan="4" class="bg-ash ">
                <p class="text-strong navy-blue txt-center">ACCOUNT NUMBER</p>
            </td>
            <td colspan="4" class="bg-ash ">
                <p class="text-strong txt-center navy-blue">IFSC CODE</p>
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
                <p class="txt-center">{{ $employee_details->Account_Number }}</p>
            </td>
            <td colspan="4" class="">
                <p class="txt-center">{{ $employee_details->Bank_IFSC_Code }}</p>
            </td>


        </tr>

        <tr>
            <td colspan="3" class="bg-ash ">
                <p class="text-strong txt-center navy-blue">MONTH DAYS</p>
            </td>

            <td colspan="3" class="bg-ash ">
                <p class="text-strong txt-center navy-blue">WORKED DAYS</p>
            </td>
            <td colspan="3" class="bg-ash ">
                <p class="text-strong txt-center navy-blue">LOSS OF PAY</p>
            </td>
            <td colspan="3" class="bg-ash ">
                <p class="text-strong txt-center navy-blue">ARREAR DAYS</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="">
                <p class="txt-center">{{ $employee_details->MONTH_DAYS }}</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">{{ $employee_details->Worked_Days }}</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">{{ $employee_details->LOP }}</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">{{ $employee_details->Arrears_Days }}</p>
            </td>
        </tr>
        <tr>

            <td colspan="2" class="bg-ash text-strong ">
                <p class="txt-center navy-blue">SL OpenBalance</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center navy-blue">CL OpenBalance</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center navy-blue">Availed SL</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center navy-blue">Availed CL</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center navy-blue">Balance SL</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center navy-blue">Balance CL</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-center">-</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-center">-</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-center">-</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-center">-</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-center">-</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-center">-</p>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <p class="padding-md">&nbsp; </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong navy-blue">DESCRIPTION</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong navy-blue">AMOUNT</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong navy-blue">ARREAR AMOUNT</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong navy-blue">EARNED AMOUNT</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong navy-blue">DEDUCTION</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong navy-blue">AMOUNT</p>
            </td>

        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong navy-blue">BASIC</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->BASIC), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->BASIC_ARREAR), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->Earned_BASIC), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong navy-blue">EPF</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->EPFR), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong navy-blue">HRA</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->HRA), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->HRA_ARREAR), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->Earned_HRA), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong  navy-blue">ESIC</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->EMPLOYEE_DETAILS_ESIC), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong  navy-blue">STATS BONUS</p>
            </td>
            <td colspan="2" class="">
                {{-- <p class="txt-right">{{ number_format(round($employee_details->SPL_ALW), 2) }}</p> --}}
                <p class="txt-right"></p>
            </td>
            <td colspan="2" class="">
                {{-- <p class="txt-right">{{ number_format(round($employee_details->SPL_ALW_ARREAR), 2) }}</p> --}}
            </td>
            <td colspan="2" class="">
                {{-- <p class="txt-right">{{ number_format(round($employee_details->Earned_SPL_ALW), 2) }}</p> --}}
                <p class="txt-right"></p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong  navy-blue">PT</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->PROF_TAX), 2) }}</p>
            </td>


        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong  navy-blue">SPECIAL ALLOW</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->SPL_ALW), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->SPL_ALW_ARREAR), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->Earned_SPL_ALW), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong  navy-blue">INCOME TAX</p>
            </td>
            <td colspan="2" class="">
                {{-- <p class="txt-right">{{ number_format(round($employee_details->PROF_TAX), 2) }}</p> --}}
                <p class="txt-right"></p>
            </td>


        </tr>

        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong  navy-blue"> OVERTIME</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right"></p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right"></p>
            </td>

            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->Overtime), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong navy-blue">SALARY ADVANCE</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right"> {{ number_format(round($employee_details->SAL_ADV), 2) }}</p>
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
                <p class="txt-left text-strong navy-blue">OTHER DEDUCTIONS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->OTHER_DEDUC), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong navy-blue">TOTAL EARNINGS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->TOTAL_EARNED_GROSS), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right"></p>
            </td>

            <td colspan="2" class="">
                <p class="txt-right"></p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong navy-blue">TOTAL DEDUCTION</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->TOTAL_DEDUCTIONS), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <p class="padding-md">&nbsp; </p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="bg-ash">
                <p class="txt-left text-strong navy-blue">NET PAY</p>
            </td>
            <td colspan="8" class="">
                <p class="txt-center ext-strong navy-blue">
                    {{ number_format(round($employee_details->NET_TAKE_HOME), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="bg-ash">
                <p class="txt-left text-strong navy-blue">NET PAY IN WORDS</p>
            </td>
            <td colspan="8" class="">
                <p class="txt-center ">{{ $employee_details->Rupees }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <p class="padding-md">&nbsp; </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="bg-ash">
                <p class="txt-center text-strong navy-blue">TRANSACTION ID</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center"></p>
            </td>
            <td colspan="3" class="bg-ash">
                <p class="txt-center text-strong navy-blue">Paid Date</p>
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
                <p class="txt-center "> <i class="navy-blue"> This is a computer-generated slip does not require
                        signature</i>
                </p>
            </td>
        </tr>

        <tr class="border-less">
            <td colspan="8" class="border-less" style="    padding: 10px 0px;">
                <p class="txt-left navy-blue text-strong">Please
                    reach out to us for any payroll queries at-info@precedehrsolutions.com</p>
            </td>
            <td colspan="3" class="border-less txt-right" style="    padding: 10px;">
                <p class="navy-blue">Generated By</p>

            </td>
            <td colspan="1" class="border-less" style="    padding: 10px 0px;">
                <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" width="100px"
                    height="18px" alt="" class="">
            </td>
        </tr>

    </table>

</body>

</html>
