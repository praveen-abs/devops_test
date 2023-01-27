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
            border-collapse: collapse;
            /* border: 1.5pt solid #0072ba; */

        }

        .payslip_table tr td {
            border: 1.5pt solid #0072ba;
            padding: 0px 4px;

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

        td.bg-ash {
            background-color: #c1c1c1;
        }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="0" class="payslip_table">
        <tr class="header-row">
            <td colspan="8" class="" style="border-right:0px;">
                <div class="header-cotent" style="margin: 10px;">
                    <p class="margin-0 brand-name " style="font-size: 16px;font-weight:600;color:#0072ba">Leather Sector Skill Council</p>
                    <p class="mb-0">No:1, Grand Southern Trunk Rd,</p>
                    <p class="mb-0"> Sadras, Guindy,</p>
                    <p class="mb-0">Chennai, Tamil Nadu 600032</p>
                </div>
            </td>
            <td colspan="4" class="" style="border-right:0px;">

                <div class="header-img txt-right" style="padding-right: 10px;width:200px;height:55px">

                    <img src="{{ URL::asset('assets/clients/leather_sector/precede_leatherSecotor.png') }}" class="" alt="logo"
                        style="height:100%;width:100%;">
                </div>


            </td>
        </tr>



        <tr>
            <td colspan="12" class="bg-ash">
                <p class="sub-header txt-center text-strong">PAYSLIP FOR THE MONTH OF &ndash;
                    {{\Carbon\Carbon::parse($employee_payslip->PAYROLL_MONTH)->format('M  y') }}</p>
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
                <p>{{ date('d-m-Y', strtotime($employee_details->dob)) }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>DATE OF JOINING</p>
            </td>
            <td colspan="3">
                <p>{{ date('d-m-Y', strtotime($employee_details->doj)) }}</p>
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
                <p>{{  $employee_details->location }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p>EPF NUMBER</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->EPF_Number }}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>ESIC NUMBER</p>
            </td>
            <td colspan="3">
                <p>{{ $employee_details->ESIC_Number }}</p>
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
                <p>{{ $employee_details->PAN_Number }}</p>
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
                <p class="txt-center">{{ $employee_details->Account_Number }}</p>
            </td>
            <td colspan="4" class="">
                <p class="txt-center">{{ $employee_details->Bank_IFSC_Code }}</p>
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
                <p class="txt-center">SL OpenBalance</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center">CL OpenBalance</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center">Availed SL</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center">Availed CL</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center">Balance SL</p>
            </td>
            <td colspan="2" class="bg-ash text-strong">
                <p class="txt-center">Balance CL</p>
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
                <p class="txt-center text-strong">DESCRIPTION</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong">AMOUNT</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong">ARREAR AMOUNT</p>
            </td>
            <td colspan="2" class="bg-ash">
                <p class="txt-center text-strong">EARNED AMOUNT</p>
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
                <p class="txt-right">{{ number_format(round($employee_details->BASIC), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->BASIC_ARREAR), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->Earned_BASIC), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">EPF</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->EPFR), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong">HRA</p>
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
                <p class="txt-left text-strong">ESIC</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->EMPLOYEE_DETAILS_ESIC), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong">SPECIAL ALLOW</p>
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
                <p class="txt-left text-strong">PT</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->PROF_TAX), 2) }}</p>
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
                <p class="txt-right">{{ number_format(round($employee_details->Overtime), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">TDS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->TDS), 2) }}</p>
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
                <p class="txt-right"> {{ number_format(round($employee_details->CANTEEN_DEDN), 2) }}</p>
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
                <p class="txt-left text-strong">OTHER DEDUCTIONS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->OTHER_DEDUC), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong">TOTAL EARNINGS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{ number_format(round($employee_details->TOTAL_EARNED_GROSS), 2) }}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right"></p>
            </td>

            <td colspan="2" class="">
                <p class="txt-right">---</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">TOTAL DEDUCTION</p>
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
                <p class="txt-left text-strong">NET PAY</p>
            </td>
            <td colspan="8" class="">
                <p class="txt-center ">{{ number_format(round($employee_details->NET_TAKE_HOME), 2) }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="bg-ash">
                <p class="txt-left text-strong">NET PAY IN WORDS</p>
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
                <p class="txt-center text-strong">TRANSACTION ID</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center"></p>
            </td>
            <td colspan="3" class="bg-ash">
                <p class="txt-center text-strong">Paid Date</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">11-MAY-2022</p>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <p class="padding-md">&nbsp; </p>
            </td>
        </tr>

        <tr>
            <td colspan="12">
                <p class="txt-center">This is a computer-generated slip does not require signature
                </p>
            </td>
        </tr>

        <tr class="border-less">
            <td colspan="8" class="border-less" style="    padding: 10px 0px;">
                <p class="txt-left">Please
                    reach out to us for any payroll queries at -payroll@ardens.in</p>
            </td>
            <td colspan="3" class="border-less txt-right" style="    padding: 10px;">
                <p>Generated By</p>

            </td>
            <td colspan="1" class="border-less" style="    padding: 10px 0px;">
                <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" width="80px"
                    height="15px" alt="" class="">
            </td>
        </tr>

    </table>

</body>

</html>
