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
            -webkit-box-sizing: border-box;
        }

        .sub-page {
            padding: 1cm;

        }

        table.annexure_table {
            border-collapse: separate;
            border: 1px solid #000;
        }

        table.annexure_table tr td {
            border: 1px solid #000;
            border-bottom-right-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            padding: 6px 6px;
        }

        table.annexure_table tr td.bg-ash {
            background-color: #c1c1c1;
        }

        table.annexure_table tr td p {
            margin: 0;
        }

        .border-b {
            border-bottom: 1px solid #000;
        }

        .text-bolder {
            font-weight: 700;
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

        .appointment_tempate,
        .appointment_tempate tr td p {
            text-align: justify;
        }

        .appointment_tempate {
            background: url(assets/images/email/background_dunamis_logo.jpg) no-repeat center;
        }
    </style>
@endsection
@section('content')
    @component('components.configuration_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent
    <div class="card mt-30">
        <div class="card-body">
            <div class="fill salary-header nav-tab-header">
                <div>
                    <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                        <li class="nav-item active ember-view mx-4" role="presentation">
                            <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                                data-bs-target="#appointment" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                Appointment Letter</a>
                        </li>
                        <li class="nav-item mx-4 ember-view" role="presentation ">
                            <a class="nav-link ember-view" id="payslips-tab" data-bs-toggle="pill"
                                data-bs-target="#payslips" type="button" role="tab" aria-controls="payslips"
                                aria-selected="false">Pay Slip</a>
                        </li>

                    </ul>

                </div>

            </div>

            <div class="tab-content " id="pills-tabContent">
                <div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                        data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="main-page">
                                    <div class="sub-page">
                                        <table style="width:100%;" class="appointment_tempate">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" align="left">
                                                        <div class="logo" style="height:80px;width:80px;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_logo_short.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                    <td colspan="2" align="right">
                                                        <div class="logo" style="height:50px;width:50%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_long_logo.png') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="right" style="padding-bottom: 5px">
                                                        <b>07-Jul-2023</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="center" style="padding-bottom: 15px">
                                                        <b class="border-b " style="">LETTER OF APPOINTMENT</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="left">
                                                        <div>
                                                            <b class="">Dear MICHAEL DOSS V,</b>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                We are glad to appoint you as <b>
                                                                    “ACCOUNTS MANAGER” </b> in our
                                                                company, <b> Dunamis Machines.</b>
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <b class="">Remunerations</b>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                Your total remuneration package per annum
                                                                will consist <b> CTC Rs 4,41,600/- per annum (Rupees Four
                                                                    Lakh
                                                                    Foutry One Thousand Six Hundred Only).</b> The breakup
                                                                of
                                                                your
                                                                compensation package shall be as detailed in
                                                                Annexure A.
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <b class="">Commencement</b>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                Your employment with the company <b> Dunamis Machines </b>
                                                                will be
                                                                with effect from <b> 07-Jul-2020.</b> You shall initially
                                                                be placed at <b> Chennai.</b> You may however be required to
                                                                travel
                                                                and may be positioned or deputed outside within
                                                                India or abroad.
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <b class="">Rules and Regulations</b>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                You shall be governed by the policies of the company as
                                                                specified in <b> Annexure B. </b> You shall serve the
                                                                Company
                                                                and shall carry out such duties which will be explained and
                                                                defined by your manager (immediate superior),
                                                                subject always to the employee policy and the rules and
                                                                regulations of the Company. Your employment shall
                                                                continue to be governed by the terms of this appointment
                                                                letter in the event of you being deputed or positioned
                                                                outside India.
                                                            </p>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                We welcome you to our team. We are confident that you will
                                                                make an effective contribution to the growth of
                                                                the company and will enjoy working with us

                                                            </p>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                You will be under probation for a period of SIXMONTHS. Your
                                                                confirmation will be based on the evaluation
                                                                during the end of the probation period.
                                                            </p>
                                                            <p style="padding: 5px 0 25px 0;">
                                                                If you are agreeable to the terms and conditions of
                                                                appointment (Annexure B), then kindly confirm your
                                                                acceptance of appointment by signing and returning to us the
                                                                attached copy of this letter.


                                                            </p>


                                                        </div>
                                                        <div>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                <b class="">Yours faithfully,</b>
                                                            </p>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                <b>For Dunamis Machines</b>
                                                            </p>

                                                        </div>
                                                        <div class="logo" style="height:50px;width:20%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_sign.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>

                                                        <div>
                                                            <p><b>(Benjamin Doss A)</b></p>
                                                            <p><b>Proprietor and Managing Director</b></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"
                                                        style="border-top: 1px solid #000;padding-bottom:20px;"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-bottom: 20px;">
                                                        I MICHAEL DOSS V , have read <b> ANNEXURE A & B,</b> understood, and
                                                        accept
                                                        the appointment upon the terms
                                                        and conditions as outlined in this appointment letter for my
                                                        position at <b> Dunamis Machines.</b>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="">
                                                        <p style="text-align: left">Sign:</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p style="text-align: right">Date:</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-top: 70px;">
                                                        <p style="text-align: center">
                                                            Registered Office Address - Dunamis <span
                                                                style="color:#e1993c;"> Machines </span>, No-4/516 C,
                                                            Upparapalayam Road, Alamathi, Redhills, Chennai,
                                                            Tamil Nadu, India, 600052

                                                        </p>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="main-page">
                                    <div class="sub-page">
                                        <table style="width:100%;" class="appointment_tempate ">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" align="left" style="padding: 0 0 20px 0;">
                                                        <div class="logo" style="height:80px;width:80px;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_logo_short.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                    <td colspan="2" align="right" style="padding: 0 0 20px 0;">
                                                        <div class="logo" style="height:50px;width:50%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_long_logo.png') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding: 0 0 40px 0;">
                                                        <table class="annexure_table    " style="width: 100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="12" class="" align="center">
                                                                        <p class="text-bolder" style="text-align:center;">
                                                                            ANNEXURE A
                                                                        </p>

                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td colspan="12" style=" "class=""
                                                                        align="center">
                                                                        <p class="text-bolder" style="text-align:center;">
                                                                            SALARY STRUCTURE
                                                                        </p>

                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td colspan="12" style=" "class=""
                                                                        align="center">
                                                                        <p class="text-bolder" style="text-align:center;">
                                                                            Your remuneration shall be paid to you under the
                                                                            following heads
                                                                        </p>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td colspan="6" style=" "class="bg-ash "
                                                                        align="left">
                                                                        <p class="text-bolder" style="">
                                                                            Name:
                                                                        </p>

                                                                    </td>

                                                                    <td colspan="6" style=" "class="bg-ash ">
                                                                        <p class="text-bolder"
                                                                            style="text-align:center;padding:0 40px">
                                                                            Salary
                                                                        </p>

                                                                    </td>

                                                                </tr>
                                                                <tr>

                                                                    <td colspan="6" class="bg-ash" align="left">
                                                                        <p class="text-bolder" style="">
                                                                            Designation
                                                                        </p>

                                                                    </td>

                                                                    <td colspan="3" class="bg-ash">
                                                                        <p class="" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" class="bg-ash">
                                                                        <p class="" style="">

                                                                        </p>

                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class="  " style="">
                                                                            Basic
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="  " style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="      " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class="  " style="">
                                                                            HRA
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class=" " style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="      " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class="  " style="">
                                                                            Child Education Allowance
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class=" " style="text-align:right;">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="      " style="text-align:right;">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class="  " style="">
                                                                            Special Allowance
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class=" " style="text-align:right;">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="  " style="text-align:right;">

                                                                        </p>

                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td colspan="6" style=" "class="bg-ash "
                                                                        align="center">
                                                                        <p class="text-bolder" style="">
                                                                            Gross
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="bg-ash">
                                                                        <p class="text-bolder" style="text-align:right;">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="bg-ash">
                                                                        <p class="text-bolder" style="text-align:right;">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class="" style="">
                                                                            PF (Employer Contribution)
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="  txt-center" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="   txt-center   " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class="  " style="">
                                                                            ESI (Employer Contribution)
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class=" " style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="     " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>

                                                                <tr class="">
                                                                    <td colspan="6" style=" "class="bg-ash">
                                                                        <p class="text-bolder " style="">
                                                                            Cost to Companys
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="bg-ash">
                                                                        <p class="text-bolder" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="bg-ash">
                                                                        <p class="text-bolder" style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class=" " style="">
                                                                            EPF (Employee Contribution)
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="t   " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class=" " style="">
                                                                            ESI (Employee Contribution)
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="   " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class=" ">
                                                                        <p class=" " style="">
                                                                            Professional Tax

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class="">
                                                                        <p class="   " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style=" "class="  bg-ash">
                                                                        <p class="text-bolder" style="">
                                                                            Net Income
                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class=" bg-ash">
                                                                        <p class="text-bolder" style="">

                                                                        </p>

                                                                    </td>
                                                                    <td colspan="3" style=" "class=" bg-ash">
                                                                        <p class="text-bolder  " style="">

                                                                        </p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="12">
                                                                        <p style="text-align:center;padding:6px 0;"
                                                                            class="text-bolder">Income Tax as applicable
                                                                            will be deducted</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding: 0 0 30px 0;">
                                                        <p>
                                                            I MICHAEL DOSS V, have read <b> ANNEXURE A & B </b>, understood,
                                                            and
                                                            accept the appointment upon the terms
                                                            and conditions as outlined in this appointment letter for my
                                                            position at <b> Dunamis Machines.</b>

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="">
                                                        <p style="text-align: left">Sign:</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p style="text-align: right">Date:</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-top: 120px;">
                                                        <p style="text-align: center">
                                                            Registered Office Address - Dunamis <span
                                                                style="color:#e1993c;"> Machines </span>, No-4/516 C,
                                                            Upparapalayam Road, Alamathi, Redhills, Chennai,
                                                            Tamil Nadu, India, 600052

                                                        </p>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="main-page">
                                    <div class="sub-page">
                                        <table style="width:100%;" class="appointment_tempate ">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" align="left">
                                                        <div class="logo" style="height:80px;width:80px;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_logo_short.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                    <td colspan="2" align="right">
                                                        <div class="logo" style="height:50px;width:50%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_long_logo.png') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align:center;padding-bottom:20px;">
                                                        <b class="border-b">ANNEXURE B</b>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>DUTIES</b></p>
                                                        <p style="padding: 10px 0">
                                                            You will devote your full-time skill and attention to the work
                                                            and
                                                            business of the Company and shall continue to
                                                            work to the best of your ability.
                                                        </p>
                                                        <p>
                                                            Without the Company’s prior written consent, you will not
                                                            perform any other work for pay during your
                                                            employment term, or will you, alone or with others, directly or
                                                            indirectly, establish any business, whatever its
                                                            form, or take any financial interest in or perform work for such
                                                            a business, whether or not for consideration
                                                        </p>
                                                        <p>
                                                            You will accept, support and work within the management,
                                                            financial, personnel, internal control and reporting
                                                            systems, policies, practices and procedures as determined by the
                                                            Company or your Manager, from time to time.
                                                        </p>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td colspan="4" style="padding-top: 10px;">
                                                        <p> <b>HOURS OF WORK</b></p>
                                                        <p style="padding: 10px 0">
                                                            Your actual working hours including working in Shifts and
                                                            working days (including working on weekly offs and
                                                            public holidays) will be often determined by workflow and
                                                            Company commitments.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>CONDUCT</b></p>
                                                        <p style="padding: 10px 0">
                                                            You shall conduct yourself in a befitting manner and abide by
                                                            all the conduct policy, the rules and regulations of
                                                            the Company.

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>REVIEW OF SALARY</b></p>
                                                        <p style="padding: 10px 0">
                                                            Your remuneration shall be reviewed annually and any changes to
                                                            your remuneration package shall be
                                                            determined by considering your performance in the Company, the
                                                            Company’s performance and your
                                                            contribution to the Company.

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>CONFIDENTIALITY OF SALARY</b></p>
                                                        <p style="padding: 10px 0">
                                                            Your salary is the reward for your untiring effort and work. You
                                                            need to maintain your salary with utmost
                                                            confidentiality. In the event of you not maintaining the
                                                            confidentiality of your salary, you may be subject to
                                                            disciplinary action.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>EXPENSES</b></p>
                                                        <p style="padding: 10px 0">
                                                            The Company will compensate you for all expenses that are
                                                            reasonably incurred and that are directly related to
                                                            the performance of your work, but only insofar as that
                                                            compensation may be provided tax free compensation of
                                                            expenses as contained herein will be made only on the basis of a
                                                            statement of expenses that has been approved
                                                            by the Company.

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>PROVIDENT FUND SCHEME AND ESIC</b></p>
                                                        <p style="padding: 10px 0">
                                                            Employer contributions will be submitted to the Indian
                                                            Government approved Provident Fund Scheme on your
                                                            behalf with your equal monthly contribution as detailed in <b>
                                                                Annexure A</b>.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>METHOD OF PAYMENT</b></p>
                                                        <p style="padding: 10px 0">
                                                            Salaries and wages will be paid monthly by electronic funds
                                                            transfer or will be deposited in you Corporate Salary
                                                            Account or any other means on or before 7th day of each month in
                                                            arrears. The company reserves its right to
                                                            vary this procedure at its option. However, such variance will
                                                            be communicated to you in due course
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p> <b>LEAVE</b></p>
                                                        <p style="padding: 10px 0">
                                                            You will be governed by the leave rules of the Company; your
                                                            manager has got all rights to decide on your leave
                                                            as per the policy and procedure of the Company
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-top: 10px;">
                                                        <p style="text-align: center">
                                                            Registered Office Address - Dunamis <span
                                                                style="color:#e1993c;"> Machines </span>, No-4/516 C,
                                                            Upparapalayam Road, Alamathi, Redhills, Chennai,
                                                            Tamil Nadu, India, 600052

                                                        </p>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="main-page">
                                    <div class="sub-page">
                                        <table style="width:100%;" class="appointment_tempate ">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" align="left">
                                                        <div class="logo" style="height:80px;width:80px;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_logo_short.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                    <td colspan="2" align="right">
                                                        <div class="logo" style="height:50px;width:50%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_long_logo.png') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <b>INTELLECTUAL PROPERTY RIGHTS</b>
                                                        <p style="padding:10px 0 0 0;">
                                                            All Industrial and intellectual property rights, including but
                                                            not limited to patent rights, design rights, copyrights
                                                            and related rights, database rights, trademark rights and chip
                                                            rights, ensuring within the framework of the work
                                                            performed by you during your employment with the company, will
                                                            be exclusively vested in Company. You may
                                                            not independently during your employment and subsequent to
                                                            termination disclose, multiply, use, manufacture,
                                                            bring on the market or sell, lease, deliver or otherwise trade,
                                                            offer on behalf of any third party or commission the
                                                            registration of the results of your work. To the extent that
                                                            such inventions are performed under the Company’s
                                                            direction, you shall fully, freely and immediately communicate
                                                            any invention to the Company and all rights, title
                                                            and interest to any such invention (“Inventions”) shall be the
                                                            sole property of the Company.

                                                        </p>
                                                        <p style="">
                                                            In pursuance of the above
                                                        </p>
                                                        <div>
                                                            <ol type="A"
                                                                style="padding-left:60px;list-style:upper-alpha; ">
                                                                <li>
                                                                    You will give the Company and its solicitors and / or
                                                                    its
                                                                    patent attorneys all necessary assistance and
                                                                    co-operation in connection with the preparation and
                                                                    prosecution of any application for patent, design,
                                                                    registration, or copyright by the Company in respect of
                                                                    the
                                                                    Invention.
                                                                </li>
                                                                <li style="padding:10px 0;">
                                                                    You irrevocably appoint the Company and any directors of
                                                                    the Company jointly and severally your true
                                                                    and lawful attorney to execute all such documents and do
                                                                    all such things as in the opinion of the
                                                                    Company may be necessary or requisite for any such
                                                                    purpose

                                                                </li>

                                                            </ol>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <b>NON-DISCLOSURE AGREEMENT</b>
                                                        <p style="padding:10px 0 5px 0;">
                                                            During the employment, the employee shall not directly or
                                                            indirectly carry on, assist, engage in, be concerned or
                                                            participate in any business/activity (whether directly or
                                                            indirectly, as a partner, shareholder, principal, agent,
                                                            director, affiliate, Consultant or in any other capacity or
                                                            manner whatsoever) which is similar to the business of
                                                            the Company, nor engage in any activity that conflicts with the
                                                            employee's obligations to the Company;
                                                        </p>
                                                        <p>
                                                            Solicit Business: During the Term and for a period of 12 months
                                                            after the Term, the employee shall not solicit,
                                                            endeavor to solicit, influence or attempt to influence any
                                                            client, customer or other Person, directly or indirectly,
                                                            to direct his or its purchase of the Company's product and/or
                                                            services, to self or any Person in competition with
                                                            the business of the Company;

                                                        </p>
                                                        <p style="padding:5px 0 10px 0;">
                                                            Solicit Personnel: During the Term and for a period of 12 months
                                                            after the Term, the Employee shall not solicit
                                                            or attempt to influence any person employed or engaged by the
                                                            Company (whether as an Employee, Consultant,
                                                            Advisor or in any other manner) or engagement with the Company
                                                            or become the Consultant of or directly or
                                                            indirectly offer services in any form or manner to himself or
                                                            any Person who is a competitor of the Company
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <b>TERMINATION</b>
                                                        <p style="padding:10px 0 5px 0;">
                                                            Your employment may be terminated at any time by yourself, or by
                                                            the Company, upon providing one (1) month
                                                            written notice to the other party
                                                        </p>
                                                        <p>
                                                            In the case of the Company terminating you for reasons other
                                                            than breach of contract by you or for any
                                                            disciplinary reasons against you, the company shall pay you one
                                                            month’s salary equal to your notice period not
                                                            worked as payment in lieu of notice
                                                        </p>
                                                        <p style="padding:5px 0;">
                                                            In the event that you seek to terminate your employment with the
                                                            company, you shall do a proper hand over of
                                                            all the work and responsibilities that you are handling to your
                                                            manager and the resource identified for replacing
                                                            you, to the satisfaction of your manager
                                                        </p>
                                                        <p>
                                                            In case you are handling a large product or responsibility, you
                                                            need to give the company sufficient notice of at
                                                            least 3 months in order to and ensure a smooth transition to
                                                            your next subordinate or successor.
                                                            Up on termination of your employment with the company, you agree
                                                            not to solicit any other team members in
                                                            the company to the new organization that you are going.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-top:15px;">
                                                        <p style="text-align: center">
                                                            Registered Office Address - Dunamis <span
                                                                style="color:#e1993c;"> Machines </span>, No-4/516 C,
                                                            Upparapalayam Road, Alamathi, Redhills, Chennai,
                                                            Tamil Nadu, India, 600052

                                                        </p>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="main-page">
                                    <div class="sub-page">
                                        <table style="width:100%;" class="appointment_tempate ">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" align="left">
                                                        <div class="logo" style="height:80px;width:80px;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_logo_short.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                    <td colspan="2" align="right">
                                                        <div class="logo" style="height:50px;width:50%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_long_logo.png') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="4">
                                                        <b>DISPUTE RESOLUTION</b>
                                                        <p style="padding:10px 0 0 0;">
                                                            Any differences and disputes arising out of this appointment
                                                            letter would be settled by Arbitration conducted in
                                                            accordance with the arbitration and conciliation act 1996 with a
                                                            person nominated by the company as the sole
                                                            arbitrator. The arbitrator shall conclude the arbitration within
                                                            30 days from the date of reference and shall pass
                                                            an award. The award passed by the arbitrator shall be conclusive
                                                            and binding on the parties and shall not be
                                                            appealable before court of law.
                                                        </p>

                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="4" style="padding:10px 0 0 0;">
                                                        <b>GOVERNING LAW AND JURISDICTION</b>
                                                        <p style="padding:10px 0 0 0;">
                                                            This agreement shall be governed by the laws of republic of
                                                            India and courts in Chennai have exclusive
                                                            jurisdiction over this agreement.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="4" style="padding:10px 0 0 0;">
                                                        <b> RETIREMENT AGE</b>
                                                        <p style="padding:10px 0 0 0;">
                                                            The general Retirement for employees in the Company is
                                                            Fifty-Eight (58) years.
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4">
                                                        <div>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                <b class="">Yours faithfully,</b>
                                                            </p>
                                                            <p style="padding: 5px 0 15px 0;">
                                                                <b>For Dunamis Machines</b>
                                                            </p>

                                                        </div>
                                                        <div class="logo" style="height:50px;width:20%;">
                                                            <img src="{{ URL::asset('assets/images/email/dunamis_sign.jpg') }}"
                                                                alt="" class=""
                                                                style="height:100%;width:100%;">
                                                        </div>

                                                        <div>
                                                            <p><b>(Benjamin Doss A)</b></p>
                                                            <p><b>Proprietor and Managing Director</b></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"
                                                        style="border-top: 1px solid #000;padding-bottom:20px;"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-bottom: 20px;">
                                                        I MICHAEL DOSS V , have read <b> ANNEXURE A & B,</b> understood, and
                                                        accept
                                                        the appointment upon the terms
                                                        and conditions as outlined in this appointment letter for my
                                                        position at <b> Dunamis Machines.</b>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="">
                                                        <p style="text-align: left">Sign:</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p style="text-align: right">Date:</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding-top: 404px;">
                                                        <p style="text-align: center">
                                                            Registered Office Address - Dunamis <span
                                                                style="color:#e1993c;"> Machines </span>, No-4/516 C,
                                                            Upparapalayam Road, Alamathi, Redhills, Chennai,
                                                            Tamil Nadu, India, 600052

                                                        </p>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="tab-pane fade  " id="payslips" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="container-fluid m-2 pdf-container ">
                        <div class="main-page">
                            <div class="sub-page" style="text-align: justify;font-size: 15px;">
                                <div class="table-responsive">


                                    <table cellspacing="0" cellpadding="0" class="payslip_table">
                                        <tr class="border-less">
                                            <td class="border-less " colspan="12" style="padding-bottom:50px">
                                                <img src="{{ URL::asset('assets/images/header_protocolo.svg') }}"
                                                    class="" alt="" style="width:100%;height:100%;">
                                            </td>
                                        </tr>
                                        <tr class="header-row" aria-rowcount="">
                                            <td colspan="8" class="  p3" rowspan="" style="border-right: 0px">
                                                <div class="header-cotent">

                                                    <p class="margin-0   text-strong"
                                                        style="color: #002f56;
                                                    font-size: 18px;
                                                    padding-left: 5px;">
                                                        Protocol Labels India Pvt. Ltd.</p>
                                                    <p class="margin_b0">166, Gerugambakkam, Bharathi Nagar,</p>
                                                    <p class="margin_b0">#3rd floor, S plot no 3A&3B, </p>
                                                    <p class="margin_b0">Porur, Chennai, Tamil Nadu 600128.</p>

                                                </div>
                                            </td>
                                            <td colspan="4" class=" " style="border-left: 0px">

                                                <div class="header-img  " style="height:100px ;width:100%">

                                                    <img src="{{ URL::asset('assets/images/protocol_logo.png') }}"
                                                        class="" alt=""
                                                        style="height: 100px;width:110px;margin-top: -36px;
                                                        margin-right: 20px;">
                                                </div>


                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="12" class=" bg-ash">
                                                <p class=" txt-center text-navyBlue  text-strong">PAYSLIP FOR THE MONTH OF
                                                    &ndash;
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-navyBlue  bg-ash text-strong">
                                                <p>EMPLOYEE NAME</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue  bg-ash text-strong">
                                                <p>EMPLOYEE CODE</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>DATE OF BIRTH</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>DATE OF JOINING</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>DESIGNATION</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>LOCATION</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>EPF NUMBER</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>ESIC NUMBER</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>UAN</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash text-strong">
                                                <p>PAN</p>
                                            </td>
                                            <td colspan="3">
                                                <p></p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">BANK NAME</p>
                                            </td>

                                            <td colspan="4" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">ACCOUNT NUMBER</p>
                                            </td>
                                            <td colspan="4" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">IFSC CODE</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="4" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="4" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="4" class="">
                                                <p></p>
                                            </td>


                                        </tr>

                                        <tr>
                                            <td colspan="3" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">MONTH DAYS</p>
                                            </td>

                                            <td colspan="3" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">WORKED DAYS</p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">LOSS OF PAY</p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash ">
                                                <p class="text-strong txt-center">ARREAR DAYS</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p></p>
                                            </td>

                                        <tr>
                                            <td colspan="12">
                                                <p class="padding-md">&nbsp; </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">DESCRIPTION</p>
                                            </td>
                                            <td colspan="2" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">AMOUNT</p>
                                            </td>
                                            <td colspan="2" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">ARREAR AMOUNT</p>
                                            </td>
                                            <td colspan="2" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">EARNED AMOUNT</p>
                                            </td>
                                            <td colspan="2" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">DEDUCTION</p>
                                            </td>
                                            <td colspan="2" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">AMOUNT</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">BASIC</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">EPF</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">HRA</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">ESIC</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">SPECIAL ALLOWANCE</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">PROF TAX</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>


                                        </tr>

                                        <tr>
                                            <td colspan="2" class="">
                                                <p class=" text-strong"> OVERTIME</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>

                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">INCOME TAX</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="">
                                                <p class=" text-strong"> OTHER EARNINGS</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>

                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=" text-strong">SALARY ADVANCE</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="">
                                                <p class=" text-navyBlue text-strong">TRAVAL CONVEYANCE</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>

                                            <td colspan="2" class="">
                                                <p class=""></p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p class=" text-navyBlue text-strong">OTHER DEDUCTIONS</p>
                                            </td>
                                            <td colspan="2" class="">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-ash">
                                                <p class=" nav text-strong text-navyBlue">TOTAL EARNINGS</p>
                                            </td>
                                            <td colspan="2" class="bg-ash">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="bg-ash">
                                                <p class=""></p>
                                            </td>

                                            <td colspan="2" class="bg-ash">
                                                <p></p>
                                            </td>
                                            <td colspan="2" class="bg-ash">
                                                <p class=" text-strong text-navyBlue">TOTAL DEDUCTION</p>
                                            </td>
                                            <td colspan="2" class="bg-ash">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="12">
                                                <p class="padding-md">&nbsp; </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-navyBlue bg-ash">
                                                <p class=" text-strong">NET PAY</p>
                                            </td>
                                            <td colspan="8" class="">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-navyBlue bg-ash">
                                                <p class=" text-strong">NET PAY IN WORDS</p>
                                            </td>
                                            <td colspan="8" class="">
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="12">
                                                <p class="padding-md">&nbsp; </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-navyBlue bg-ash">
                                                <p class="txt-center text-strong">TRANSACTION ID</p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                            <td colspan="3" class="text-navyBlue bg-ash">
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
                                                <p class="padding-md txt-center">Leave Details</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-navyBlue text-strong">Leave's Type</p>
                                            </td>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-navyBlue text-strong">Opening Balance</p>
                                            </td>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-navyBlue text-strong">Availed Balance</p>
                                            </td>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-strong">Closing Balance</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-strong">Casual Leave</p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center text-strong"></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-strong">Sick Leave</p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center text-strong"></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=" bg-ash">
                                                <p class="txt-center text-strong">Earned Leave</p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center text-strong"></p>
                                            </td>
                                            <td colspan="3" class="">
                                                <p class="txt-center"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="12">
                                                <p class="txt-center">This is a computer-generated slip does not require
                                                    signature</p>
                                            </td>
                                        </tr>

                                        <tr class="border-less">
                                            <td colspan="8" class="border-less" style="    padding: 10px 0px;">
                                                <p class="">Please
                                                    reach out to us for any payroll queries at -payroll@ardens.in</p>
                                            </td>
                                            <td colspan="3" class="border-less " style="    padding: 10px 0px;">
                                                <p>Generated By</p>


                                            </td>
                                            <td colspan="1" class="border-less" style="    padding: 10px 0px;">
                                                <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                                                    width="80px" height="15px" alt="" class="">
                                            </td>
                                        </tr>

                                        <tr class="border-less">
                                            <td colspan="12" class="border-less">
                                                <img src="{{ URL::asset('assets/images/footerProtocolImg_payslip.svg') }}"
                                                    class="" alt="" style="height:100%;width:100%;">
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
    </div>
@endsection
