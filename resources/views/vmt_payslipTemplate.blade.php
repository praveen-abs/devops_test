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

        @media print {
            .main-page {
                page-break-after: always;
            }
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





        /* p {
  text-align: justify;

}


.appointment-letter {
  padding: 30px 50px;
}

.appointment-letter td {
  padding: 5px 10px;
}

.appointment-letter table {
  width: 100%;
}

.div.titlepage {
  page: blank;
}

@media screen {
  div .divFooter {
    display: none;
  }
}

@media print {
  div.divFooter {
    position: fixed;
    bottom: 0;
  }
}

footer {
  font-size: 9px;
  color: #f00;
  text-align: center;
}

.page {
  size: A4;
  margin: 11mm 17mm 17mm 17mm;
}

@media print {
  footer {
    position: Center;
    bottom: 0;
  }

  .content-block, p {
    page-break-inside: avoid;
  }

  html, body {
    width: 210mm;
    height: 297mm;
  }
}

body {
  background: rgb(204, 204, 204);
}

page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
}

page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}

page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;
}

page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}

page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;
}

page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}

page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;
}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

@media print {
  pre, blockquote {
    page-break-inside: avoid;
  }
} */

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td p {
            padding: 0px;
            margin: 0px;
            font-size: 14px;
        }

        table,
        th,
        td {
            line-height: 16px;
            border: 1px solid #af1888;
            height: 27px;
        }

        .t-0 {
            border-top: 0px;
        }

        table .row-full p {
            font-size: 13px;
            /* text-align: center !important; */
            font-weight: 600;
            margin: 5px 0px;
        }

        .row-full .center {
            text-align: center;
        }

        table .row-full {
            background-color: #dfdfdf;
            border-top: 0px;
        }

        .body-content {
            border-top: 0px;
        }

        .body-content .tl p {
            font-weight: 600;
            font-size: 13px;
        }

        .body-content .tr p span {
            /* font-weight: 600; */
            font-size: 12px;
        }

        .td-md p {
            width: auto;
        }

        .header-td {
            border-bottom: 0px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 5px 15px 5px;
            height: auto;
        }

        .header-content .left-header h5 {
            font-weight: 600;
            font-size: 15px;
            margin: 0px;
        }

        .header-content .left-header p {
            margin: 2px;
        }

        .header-content .left-header {
            width: 100%;
        }

        .header-content .right-header {
            width: 100%;
            text-align: end;
            clear: both;
        }

        .header-content .right-header .img-wrap {
            height: 45px;
            width: 180px;
            float: right;
        }

        .header-content .right-header img {
            height: 100%;
            width: 100%;
        }

        .body-content {
            width: 100%;
        }

        .body-content .body-header {}


        .tr-md .td-md {
            border-top: 0px;
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="main-page">
        <div class="sub-page" style="font-size: 15px;">
            <!-- <page size="A4"> -->


            <!-- <table>
        <tr>
          <div class="header-content">
            <div class="left-header">
              <h5>Ardens Business Solutions Private Limited</h5>
              <h5>“SHALOM BUILDING”</h5>
              <p>1st Floor, Office No.20, No.04, Mannar Street,</p>
              <p>T Nagar, Chennai,Tamil Nadu, India – 600 017</p>
            </div>
            <div class="right-header">

            </div>
          </div>
        </tr>
      </table> -->

            <table width="100%">
                <tr class="">
                    <td class="header-td">
                        <div class="header-content">
                            <div class="left-header">
                                <h5 class="">
                                    <span class="">Ardens Business Solutions Private Limited</span>
                                </h5>

                                <h5 class="">
                                    <span class="4">&ldquo;SHALOM BUILDING&rdquo; </span>
                                </h5>
                                <p class="">
                                    <span class="3">1</span><span class="3 ">st</span><span class="3 9">&nbsp;Floor,
                                        Office No.20, No.04, Mannar Street, </span>
                                </p>
                                <p class=""><span class="9 3">T Nagar, Chennai, Tamil Nadu, India &ndash; 600
                                        017</span></p>
                                <p class="4 "><span class="8"></span></p>
                            </div>
                            <div class="right-header">
                                <div class="img-wrap" style="transform: rotate(0.00rad) translateZ(0px);">
                                    <!-- <img src={{$client_logo}} style="width: 140px; height: 70px;" title=""> -->
                                    <!-- <img src="../images/brandavatarlogo.png" alt=""> -->
                                    <img src="{{ URL::asset('assets/images/brand_avatar.png') }}" alt="" class="">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="body-content">
                <tr class="body-header">
                    <td class="row-full" colspan="12" rowspan="1">
                        <p class="center"><span class="">PAYSLIP FOR THE
                                MONTH OF &ndash;
                                {{$employee->PAYROLL_MONTH}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm tl" colspan="0" rowspan="1">
                        <p class=""><span class="">EMPLOYEE NAME</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->EMP_NAME}}</span></p>
                    </td>
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">EMPLOYEE CODE</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->EMP_NO}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">DATE OF BIRTH</span></p>
                    </td>
                    <td class="td-sm tr " colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->DOB}}</span></p>
                    </td>
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">DATE OF JOINING</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->DOJ}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">DESIGNATION</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->DESIGNATION}}</span></p>
                    </td>
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">LOCATION</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->LOCATION}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">EPF NUMBER</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->EPF_Number}}</span></p>
                    </td>
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">ESIC NUMBER</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->ESIC_Number}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm tl " colspan="0" rowspan="1">
                        <p class=""><span class="">UAN</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->UAN}}</span></p>
                    </td>
                    <td class=" td-sm tl" colspan="0" rowspan="1">
                        <p class=""><span class="">PAN</span></p>
                    </td>
                    <td class="td-sm tr" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->PAN_Number}}</span></p>
                    </td>
                </tr>


            </table>
            <table class="row-full t-0">

                <tr class="tr-md row-full">
                    <td class="td-md th" colspan="" rowspan="1">
                        <p class="center"><span class="">BANK NAME</span></p>
                    </td>
                    <td class="td-md th " colspan="" rowspan="1">
                        <p class="center"><span class="">ACCOUNT NUMBER</span></p>
                    </td>
                    <td class="td-md th" colspan="" rowspan="1">
                        <p class="center"><span class="">IFSC CODE</span></p>
                    </td>
                </tr>
                <tr class="tr-md">
                    <td class=" td-md th" colspan="0" rowspan="1">
                        <p class="center"><span class="">{{$employee->Bank_Name}}</span></p>
                    </td>
                    <td class=" td-md th" colspan="0" rowspan="1">
                        <p class="center"><span class="">{{$employee->Account_Number}}</span></p>
                    </td>
                    <td class=" td-md th" colspan="0" rowspan="1">
                        <p class="center"><span class="">{{$employee->Bank_IFSC_Code}}</span></p>
                    </td>

                </tr>
            </table>
            <table class="t-0">

                <tr class="row-full  t-0">
                    <td class="td-sm t-0 " colspan="0" rowspan="1">
                        <p class="center"><span class="">MONTH DAYS</span></p>
                    </td>
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class="center"><span class="">WORKED DAYS</span></p>
                    </td>
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class="center"><span class="">LOSS OF PAY</span></p>
                    </td>
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class="center"><span class="">ARREAR DAYS</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="center"><span class="">{{$employee->MONTH_DAYS}}</span></p>
                    </td>
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="center">
                            <span class="">{{$employee->Worked_Days}}</span>
                        </p>
                    </td>
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="center">
                            <span class="">{{$employee->LOP}}</span>
                        </p>
                    </td>
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="center">
                            <span class="">{{$employee->Arrears_Days}}
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
            <table class="t-0">
                <tr class="">
                    <td class="row-full  t-0" colspan="1" rowspan="1">
                        <p class="center"><span class="">SL Open Balance</span></p>
                    </td>
                    <td class="row-full  t-0" colspan="3" rowspan="1">
                        <p class="center"><span class="">CL Open Balance</span></p>
                    </td>
                    <td class="row-full  t-0" colspan="1" rowspan="1">
                        <p class="center"><span class="">Availed SL</span></p>
                    </td>
                    <td class="row-full  t-0" colspan="1" rowspan="1">
                        <p class="center"><span class="">Availed CL</span></p>
                    </td>
                    <td class="row-full  t-0" colspan="1" rowspan="1">
                        <p class="center"><span class="">Balance SL</span></p>
                    </td>
                    <td class="row-full  t-0" colspan="2" rowspan="1">
                        <p class="center"><span class="">Balance CL</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="" colspan="1" rowspan="1">
                        <p class="center"><span class="">-</span></p>
                    </td>
                    <td class=" " colspan="3" rowspan="1">
                        <p class="center"><span class="">-</span></p>
                    </td>
                    <td class="" colspan="1" rowspan="1">
                        <p class="center"><span class="">-</span></p>
                    </td>
                    <td class="" colspan="1" rowspan="1">
                        <p class="center"><span class="">-</span></p>
                    </td>
                    <td class="" colspan="1" rowspan="1">
                        <p class="center"><span class="">-</span></p>
                    </td>
                    <td class="" colspan="2" rowspan="1">
                        <p class="center"><span class="">-</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td colspan="8"></td>
                </tr>


            </table>
            <table class="t-0">

                <tr class="row-full">
                    <td class="t-0" colspan="1" rowspan="1">
                        <p class=""><span class="">DESCRIPTION</span></p>
                    </td>
                    <td class="t-0" colspan="3" rowspan="1">
                        <p class=""><span class="">AMOUNT</span></p>
                    </td>
                    <td class="t-0" colspan="1" rowspan="1">
                        <p class=""><span class="">ARREAR AMOUNT</span></p>
                    </td>
                    <td class="t-0" colspan="1" rowspan="1">
                        <p class=""><span class="">EARNED AMOUNT</span></p>
                    </td>
                    <td class="t-0" colspan="1" rowspan="1">
                        <p class=""><span class="">DEDUCTION</span></p>
                    </td>
                    <td class="t-0" colspan="2" rowspan="1">
                        <p class=""><span class="">AMOUNT</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b>BASIC</b> </p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4"><span class=""> <span>&#8377;</span>{{$employee->BASIC}}</span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4">
                            <span class=""><span>&#8377;</span> </span>
                            <span class="">0</span>
                        </p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4"><span class="1"><span>&#8377;</span>
                            </span><span class="">4560</span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">EPF</b></p>
                    </td>
                    <td class="7" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                638</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">HRA</b></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->HRA}}</span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4">
                            <span class=""><span>&#8377;</span> </span>
                            <span class="">0</span>
                        </p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4">
                            <span class=""><span>&#8377;</span> </span>
                            <span class="">2280</span>
                        </p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">ESIC</span></p>
                    </td>
                    <td class="7" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                58</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">SPECIAL ALLOW</b></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->SPL_ALW}}</span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                0</span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                760</span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">PT</b></p>
                    </td>
                    <td class="7" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->PROF_TAX}}</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">OVERTIME</b></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4 "><span class=""></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4">
                            <span class=""><span>&#8377;</span>
                                {{$employee->Overtime}}
                            </span>
                        </p>
                    </td>
                    <td class="7" colspan="" rowspan="1">
                        <p class=""><b class="">TDS</b></p>
                    </td>
                    <td class="7" colspan="" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->TDS}}</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=" "><span class="c2"></span></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4 "><span class=""></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">CANT-DEDUCTION</b></p>
                    </td>
                    <td class="7" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->CANTEEN_DEDN}}</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=" "><span class="c2"></span></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4 "><span class=""></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="">
                            <b class="">SALARY ADVANCE</b>
                        </p>
                    </td>
                    <td class="7" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->SAL_ADV}}</span></p>
                    </td>
                </tr>
                <tr class="0">
                    <td class="7" colspan="1" rowspan="1">
                        <p class=" "><span class="c2"></span></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4 "><span class=""></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class="4 "><span class="6"></span></p>
                    </td>
                    <td class="7" colspan="1" rowspan="1">
                        <p class=""><b class="">OTHER DEDUCTIONS</b></p>
                    </td>
                    <td class="7" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                                {{$employee->OTHER_DEDUC}}</span></p>
                    </td>
                </tr>
                <tr class="row-full">
                    <td class="" colspan="1" rowspan="1">
                        <p class=""><b class="">TOTAL EARNINGS</b></p>
                    </td>
                    <td class="" colspan="3" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                            </span><b class="">{{$employee->TOTAL_EARNED_GROSS}}</b></p>
                    </td>
                    <td class="" colspan="1" rowspan="1">
                        <p class="4 "><span class=""></span></p>
                    </td>
                    <td class="" colspan="1" rowspan="1">
                        <p class="4"><span class="1"><span>&#8377;</span>
                            </span><b class="">7666</b></p>
                    </td>
                    <td class="" colspan="1" rowspan="1">
                        <p class=""><b class="">TOTAL DEDUCTION</b></p>
                    </td>
                    <td class="" colspan="2" rowspan="1">
                        <p class="4"><span class=""><span>&#8377;</span>
                            </span><b class="">{{$employee->TOTAL_DEDUCTIONS}}</b></p>
                    </td>
                </tr>


                <tr class="">
                    <td colspan="8"></td>
                </tr>
                <tr class="">
                    <td class="row-full" colspan="5" rowspan="1">
                        <p class=""><span class="">NET PAY</span></p>
                    </td>
                    <td class="1" colspan="4" rowspan="1">
                        <p class="center"><span class="1"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>
                            </span><span class="">{{$employee->NET_TAKE_HOME}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="row-full" colspan="2" rowspan="1">
                        <p class=""><span class="">NET PAY IN WORDS</span></p>
                    </td>
                    <td class="" colspan="7" rowspan="1">
                        <p class="center"><span class="">{{$employee->Rupees}}</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="" colspan="9" rowspan="1">
                        <p class=""><span class="6">&nbsp;</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="row-full" colspan="3" rowspan="1">
                        <p class=""><span class="">TRANSACTION ID</span></p>
                    </td>
                    <td class="" colspan="2" rowspan="1">
                        <p class=" "><span class="6"></span></p>
                    </td>
                    <td class="row-full" colspan="2" rowspan="1">
                        <p class=""><span class="">Paid Date</span></p>
                    </td>
                    <td class="" colspan="2" rowspan="1">
                        <p class=""><span class="c9">11-MAY-2022</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="" colspan="9" rowspan="1">
                        <p class=""><span class="6">&nbsp;</span></p>
                    </td>
                </tr>
                <tr class="8">
                    <td class="0" colspan="9" rowspan="1">
                        <p class="center" style="font-weight: 600;"><span class="1">This is a computer-generated slip does not require signature</span></p>
                    </td>
                </tr>


                <table style="border: 0px;">
                    <tfoot>
                        <tr style="border: 0px;">
                            <td style="border: 0px;">
                                <div style="height:100px; display:flex;align-items:center;justify-content:space-between;">
                                    <span>Please reach out to us for any payroll queries at -payroll@ardens.inPowered By</span>
                                    <div style="height: 30px; width:150px;display:flex;align-items:center;">
                                        <span style="width: 100%;">Powered By</span>
                                        <img src="{{ URL::asset('assets/images/brand_avatar.png') }}" alt="" class="" style="width:100%;height:100%;">
                                    </div>

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </table>
        </div>
    </div>

</body>

</html>