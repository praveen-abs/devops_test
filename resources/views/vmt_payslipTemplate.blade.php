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
        td {
            border: 1.5pt solid #af1888;

        }

        table td:last-child {}

        .border-less {
            border: 0px !important;
        }

        tr {
            height: 12.55pt;
        }

        td {
            width: 81.35pt
        }

        .padding-md {
            /* padding: 2pt 0pt; */
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


        .sm {}

        .md {}

        .lg {}

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
            <td colspan="7" class="border-less">
                <div class="header-cotent">
                    <h6 class="margin-0">Ardens Business Solutions Private Limited</h6>
                    <h6 class="margin-0">“SHALOM BUILDING”</h6>
                    <p>1st Floor, Office No.20, No.04, Mannar Street,</p>
                    <p>T Nagar, Chennai,Tamil Nadu, India – 600 017</p>
                </div>
            </td>
            <td colspan="5" class="border-less">
                <div style="">
                    <div class="header-img" style="height: 40px;width:180px;max-height:100%;">
                        <img src={{$client_logo}} style="height:100%;width:100%;" title="">
                    </div>
                </div>

            </td>
        </tr>


        <tr>
            <td colspan="12">
                <p class="sub-header txt-center bg-ash text-strong">PAYSLIP FOR THE MONTH OF &ndash; {{strtoupper($employee->PAYROLL_MONTH)}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p>EMPLOYEE NAME</p>
            </td>
            <td colspan="3">
                <p>{{$employee->EMP_NAME}}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>EMPLOYEE CODE</p>
            </td>
            <td colspan="3">
                <p>{{$employee->EMP_NO}}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p>DATE OF BIRTH</p>
            </td>
            <td colspan="3">
                <p>{{date("d-m-Y", strtotime($employee->DOB))}}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>DATE OF JOINING</p>
            </td>
            <td colspan="3">
                <p>{{date("d-m-Y", strtotime($employee->DOJ))}}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p>DESIGNATION</p>
            </td>
            <td colspan="3">
                <p>{{$employee->DESIGNATION}}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>LOCATION</p>
            </td>
            <td colspan="3">
                <p>{{$employee->LOCATION}}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p>EPF NUMBER</p>
            </td>
            <td colspan="3">
                <p>{{$employee->EPF_Number}}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>ESIC NUMBER</p>
            </td>
            <td colspan="3">
                <p>{{$employee->ESIC_Number}}</p>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="bg-ash text-strong">
                <p>UAN</p>
            </td>
            <td colspan="3">
                <p>{{$employee->UAN}}</p>
            </td>
            <td colspan="3" class="bg-ash text-strong">
                <p>PAN</p>
            </td>
            <td colspan="3">
                <p>{{$employee->PAN_Number}}</p>
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
                <p class="txt-center">{{$employee->Bank_Name}}</p>
            </td>
            <td colspan="4" class="">
                <p class="txt-center">{{$employee->Account_Number}}</p>
            </td>
            <td colspan="4" class="">
                <p class="txt-center">{{$employee->Bank_IFSC_Code}}</p>
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
                <p class="txt-center">{{$employee->MONTH_DAYS}}</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">{{$employee->Worked_Days}}</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">{{$employee->LOP}}</p>
            </td>
            <td colspan="3" class="">
                <p class="txt-center">{{$employee->Arrears_Days}}</p>
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
                <p class="txt-right">{{number_format(round($employee->BASIC),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->BASIC_ARREAR),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->Earned_BASIC),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">EPF</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">638.00</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong">HRA</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->HRA),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->HRA_ARREAR),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">2280.00</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">ESIC</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">58.00</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong">SPECIAL ALLOW</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->SPL_ALW),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->SPL_ALW_ARREAR),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->Earned_SPL_ALW),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">PT</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->PROF_TAX),2)}}</p>
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
                <p class="txt-right">{{number_format(round($employee->Overtime),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">TDS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->TDS),2)}}</p>
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
                <p class="txt-right"> {{number_format(round($employee->CANTEEN_DEDN),2)}}</p>
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
                <p class="txt-right"> {{number_format(round($employee->SAL_ADV),2)}}</p>
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
                <p class="txt-right">{{number_format(round($employee->OTHER_DEDUC),2)}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="">
                <p class="txt-left text-strong">TOTAL EARNINGS</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->TOTAL_EARNED_GROSS),2)}}</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right"></p>
            </td>

            <td colspan="2" class="">
                <p class="txt-right">7666.00</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-left text-strong">TOTAL DEDUCTION</p>
            </td>
            <td colspan="2" class="">
                <p class="txt-right">{{number_format(round($employee->TOTAL_DEDUCTIONS),2)}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="12">
                <p class="padding-md">&nbsp; </p>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="bg-ash">
                <p class="txt-left text-strong">NET PAY</p>
            </td>
            <td colspan="6" class="">
                <p class="txt-center ">{{number_format(round($employee->NET_TAKE_HOME),2)}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="bg-ash">
                <p class="txt-left text-strong">NET PAY IN WORDS</p>
            </td>
            <td colspan="7" class="">
                <p class="txt-center ">{{$employee->Rupees}}</p>
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
                <p class="txt-center">This is a computer-generated slip does not require signature</p>
            </td>
        </tr>

        <tr class="border-less">
            <td colspan="8" class="border-less">
                <p class="txt-left">Please
                    reach out to us for any payroll queries at -payroll@ardens.in</p>
            </td>
            <td colspan="2" class="border-less txt-right">
                <p>Powered By</p>


            </td>
            <td colspan="2" class="border-less">
                <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" class="" style="height: 40px;width:120px;">
            </td>
        </tr>

    </table>



</body>

</html>