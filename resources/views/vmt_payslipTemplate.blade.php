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

        p {
            text-align: justify;
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
            font-size: 15px;
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
            font-size: 14px;
            text-align: center !important;
            font-weight: 600;
            margin: 5px 0px;
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

        .body-content .tr p {
            font-weight: 600;
            font-size: 12px;
        }

        .td-md p {
            width: auto;
        }

        .header-td {
            border-bottom: 0px;
        }

        table .header-content {
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

        .header-content .right-header .img-wrap {
            height: 45px;
            width: 180px;
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
                                    <span class="c53">1</span><span class="c53 c61">st</span><span class="c53 c59">&nbsp;Floor,
                                        Office No.20, No.04, Mannar Street, </span>
                                </p>
                                <p class=""><span class="c59 c53">T Nagar, Chennai, Tamil Nadu, India &ndash; 600
                                        017</span></p>
                                <p class="4 c23"><span class="8"></span></p>
                            </div>
                            <div class="right-header">
                                <div class="img-wrap" style="transform: rotate(0.00rad) translateZ(0px);">
                                    <!-- <img src={{$client_logo}} style="width: 140px; height: 70px;" title=""> -->
                                    <!-- <img src="" alt=""> -->
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
                        <p class=" "><span class="">PAYSLIP FOR THE
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
                        <p class=""><span class="">BANK NAME</span></p>
                    </td>
                    <td class="td-md th " colspan="" rowspan="1">
                        <p class=""><span class="">ACCOUNT NUMBER</span></p>
                    </td>
                    <td class="td-md th" colspan="" rowspan="1">
                        <p class=""><span class="">IFSC CODE</span></p>
                    </td>
                </tr>
                <tr class="tr-md">
                    <td class=" td-md th" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->Bank_Name}}</span></p>
                    </td>
                    <td class=" td-md th" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->Account_Number}}</span></p>
                    </td>
                    <td class=" td-md th" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->Bank_IFSC_Code}}</span></p>
                    </td>

                </tr>
            </table>
            <table class="row-full t-0">

                <tr class="">
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class=""><span class="">MONTH DAYS</span></p>
                    </td>
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class=""><span class="">WORKED DAYS</span></p>
                    </td>
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class=""><span class="">LOSS OF PAY</span></p>
                    </td>
                    <td class="td-sm t-0" colspan="0" rowspan="1">
                        <p class=""><span class="">ARREAR DAYS</span></p>
                    </td>
                </tr>
                <tr class="">
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class=""><span class="">{{$employee->MONTH_DAYS}}</span></p>
                    </td>
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="td-sm">
                            <span class="">{{$employee->Worked_Days}}</span>
                        </p>
                    </td>
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="">
                            <span class="">{{$employee->LOP}}</span>
                        </p>
                    </td>
                    <td class="td-sm" colspan="0" rowspan="1">
                        <p class="">
                            <span class="">{{$employee->Arrears_Days}}
                            </span>
                        </p>
                    </td>
                </tr>
            </table>


        </div>
    </div>

</body>

</html>