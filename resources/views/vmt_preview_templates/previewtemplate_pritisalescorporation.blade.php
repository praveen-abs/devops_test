@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
<style>
    .main-page {
        width: 210mm;
        min-height: 297mm;
        margin: 10mm auto;
        background: white;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: bo;
    }

    .sub-page {
        padding: 1cm;

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



    .avatar_table tr,
    .avatar_table tr td {
        border: 2px solid #dee2e6 !important;
        padding: 5px !important;
    }

    .payslip_table {
        width: 100%;
        vertical-align: middle;
        font-family: sans-serif;
    }

    table.payslip_table tr,
    table.payslip_table tr td {
        border: 2px solid #0087c1;

    }



    .border-less {
        border: 0px !important;
    }

    .payslip_table tr {
        height: 12.55pt;
    }

    .payslip_table td {
        width: 81.35pt
    }



    .margin-0 {
        margin: 0px;
    }

    table.payslip_table tr td  p {
        font-size: 9pt;
        margin-top: 3pt;
        margin-bottom: 3pt;
        padding: 0px 5px;
        /* text-align: justify; */
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
        background-color: #9e9e9e5c;
    }

    .p3 {
        padding: 3px;
    }
</style>
@endsection
@section('content')
    <div class="card  left-line mb-2 mt-30">
        <div class="card-body px-2 pb-1 pt-2">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                        <li class="nav-item text-muted me-5" role="presentation">
                            <a class="nav-link active pb-2" data-bs-toggle="tab" href="#appointment" aria-selected="true"
                                role="tab">
                                Appointment Letter
                            </a>
                        </li>
                        <li class="nav-item text-muted" role="presentation">
                            <a class="nav-link  pb-2" data-bs-toggle="tab" href="#payslips" aria-selected="true"
                                role="tab">
                                Pay Slip
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-0">

        <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                        data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="main-page">
                                    <h5>Template not found for the client : {{ sessionGetSelectedClientName() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade  " id="payslips" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="container-fluid m-2 pdf-container ">
                    <div class="main-page">
                        <div class="sub-page" style="text-align: justify;font-size: 15px;">
                            <div class="table-responsive">
                                <table cellspacing="0" cellpadding="0" class="payslip_table">
                                    <tr class="header-row" aria-rowcount="">
                                        <td colspan="8" class="border-less p3" rowspan="">
                                            <div class="header-cotent">

                                                <h6 class="margin-0" style="padding-left: 5px">Priti Sales Corporation.</h6>
                                                <p class="mb-0">Dugar Towers, 2nd floor,</p>
                                                <p class="mb-0">#34/123, Marshalls Road, Egmore,</p>
                                                <p class="mb-0">Chennai, Tamil Nadu, India 600 008. </p>
                                            </div>
                                        </td>
                                        <td colspan="4" class="border-less p3">

                                            <div class="header-img txt-right d-flex align-items-center"
                                                style="height:100px ;">
                                                <img src="{{ URL::asset('assets/images/client_logos/vasa/logo_priti.jpg') }}"
                                                class="" alt=""
                                                style="height: 40px;width:250px;max-height:100%;">
                                            </div>


                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="12" class=" bg-ash ">
                                            <p class="sub-header txt-center text-strong">PAYSLIP FOR THE MONTH OF – NOV
                                                – 2022</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>EMPLOYEE NAME</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>EMPLOYEE CODE</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>DATE OF BIRTH</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>DATE OF JOINING</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>DESIGNATION</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>LOCATION</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>EPF NUMBER</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>ESIC NUMBER</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>UAN</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
                                        </td>
                                        <td colspan="3" class="bg-ash text-strong">
                                            <p>PAN</p>
                                        </td>
                                        <td colspan="3">
                                            <p></p>
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
                                            <p class="txt-center">-</p>
                                        </td>
                                        <td colspan="4" class="">
                                            <p class="txt-center">-</p>
                                        </td>
                                        <td colspan="4" class="">
                                            <p class="txt-center">-</p>
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
                                            <p class="txt-center">-</p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center">-</p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center">-</p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center">-</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="12">
                                            <p class="padding-md"></p>
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
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong">EPF</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong">HRA</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right">
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong">ESIC</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong">SPECIAL ALLOWANCE </p>
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
                                            <p class="txt-left text-strong">PROF TAX</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong">OVERTIME </p>
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
                                            <p class="txt-left text-strong">INCOME TAX</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>


                                    </tr>

                                    <tr>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong"> OTHER EARNINGS </p>
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
                                            <p class="txt-right"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="">
                                            <p class="txt-left text-strong"> TRAVEL CONVEYANCE </p>
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
                                            <p class="txt-left text-strong">OTHERDEDUCTIONS</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <p class="txt-right"></p>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2" class="bg-ash">
                                            <p class="txt-left text-strong">TOTAL EARNINGS</p>
                                        </td>
                                        <td colspan="2" class="bg-ash">
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="bg-ash">
                                            <p class="txt-right"></p>
                                        </td>

                                        <td colspan="2" class="bg-ash">
                                            <p class="txt-right"></p>
                                        </td>
                                        <td colspan="2" class="bg-ash">
                                            <p class="txt-left text-strong">TOTAL DEDUCTION</p>
                                        </td>
                                        <td colspan="2" class="bg-ash">
                                            <p class="txt-right"></p>
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
                                            <p class="txt-center "></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="bg-ash">
                                            <p class="txt-left text-strong">NET PAY IN WORDS</p>
                                        </td>
                                        <td colspan="8" class="">
                                            <p class="txt-center "></p>
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
                                        <td colspan="12" class="bg-ash">
                                            <p class="txt-center text-strong">Leave Details </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="bg-ash">
                                            <p class="txt-center text-strong">Leave’s Type</p>
                                        </td>
                                        <td colspan="3" class="bg-ash">
                                            <p class="txt-center text-strong">Opening Balance</p>
                                        </td>
                                        <td colspan="3" class="bg-ash">
                                            <p class="txt-center text-strong">Availed Leaves</p>
                                        </td>
                                        <td colspan="3" class="bg-ash">
                                            <p class="txt-center text-strong">Closing Balance</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" class="bg-ash">
                                            <p class="txt-center text-strong">Casual Leave / Sick Leave</p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center text-strong"></p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center text-strong"></p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center text-strong"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="bg-ash">
                                            <p class="txt-center text-strong">Earned Leave</p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center text-strong"></p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center text-strong"></p>
                                        </td>
                                        <td colspan="3" class="">
                                            <p class="txt-center text-strong"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12">
                                            <p class="txt-center">This is a computer-generated slip does not require
                                                signature</p>
                                        </td>
                                    </tr>

                                    <tr class="border-less">
                                        <td colspan="8" class="border-less">
                                            <p class="txt-left">Please
                                                reach out to us for any payroll queries at -payroll@ardens.in</p>
                                        </td>
                                        <td colspan="2" class="border-less ">
                                            <p class="txt-right">Powered By</p>


                                        </td>
                                        <td colspan="2" class="border-less">
                                            <img src="{{ URL::asset('assets/images/logo.png') }}" alt=""
                                                class="" style="height: 40px;width:120px;">
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
