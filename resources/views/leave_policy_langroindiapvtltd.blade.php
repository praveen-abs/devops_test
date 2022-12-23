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

        p {
            text-align: justify;

        }

        table {
            width: 100%;
            vertical-align: middle;
            font-family: sans-serif;
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


        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
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

        .p3 {
            padding: 3px;
        }

        .border_bottom-brown {
            border-bottom: 2px solid #863b28;
        }

        .border_top-brown {
            border-top: 2px solid #863b28;
        }

        .text-sky_blue {
            color: #24bdf2 !important;
        }

        .f-14 {
            font-size: 14px
        }

        .f-13 {
            font-size: 13px
        }

        .pad-top-10 {
            padding-top: 10px;
        }

        .pad-top-15 {
            padding-top: 15px;
        }

        .pad-top-20 {
            padding-top: 20px;
        }

        .pad-top-5 {
            padding-top: 5px;
        }

        .pad-bottom-25 {
            padding-bottom: 25px;
        }

        .pad-top-8 {
            padding-top: 8px;
        }

        .pad-bottom-10 {
            padding-bottom: 10px;
        }

        .pad-top-25 {
            padding-top: 25px;
        }

        .pad-0 {
            padding: 0px;
        }

        .m-0 {
            margin: 0px;
        }


        .text-white {
            color: #ffffff;
        }

        .ptb-5 {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .f-12 {
            font-size: 12px;
        }

        tr:first-child th:last-child,
        tr:first-child th:first-child,
        tr:first-child th:first-child,
        tr:first-child th:last-child,
        tr:last-child td:first-child,
        tr:last-child td:last-child {
            border-radius: 0px;
        }

        .border_tb {
            border-top: 2px solid #006bb1;
            border-bottom: 2px solid #006bb1;
        }

        .border_b {
            border-bottom: 2px solid #006bb1;
        }

        .border_b1 {
            border-bottom: 1px solid #006bb1;
        }

        .border_t2_b1 {
            border-top: 2px solid #006bb1;
            border-bottom: 1px solid #006bb1;
        }

        .txt_blue {
            color: #006bb1;
        }

        .pad-bottom-15 {
            padding-bottom: 15px;

        }
    </style>
@endsection
@section('content')
    <div class="card mt-30 mb-0">
        <div class="card-body">
            <div class="fill salary-header nav-tab-header">
                <div>
                    <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                        <li class="nav-item active ember-view mx-4" role="presentation">
                            <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                                data-bs-target="#appointment" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                Leave Policy Explanation</a>
                        </li>


                    </ul>

                </div>
            </div>

            <div class="tab-content " id="pills-tabContent">
                <div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div id="policy_carousel" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <div class="main-page">
                                    <div class="sub-page">
                                        <table class="policy_table txt_blue" style="padding:0;">
                                            <tbody>
                                                <tr class="">
                                                    <td colspan="8" align="" class="text-right pad-bottom-25">
                                                        <div class="logo" style="">

                                                            <img src="{{ URL::asset('assets/images/client_logos/vasa/logo_langro.jpg') }}"
                                                                class="" alt=""
                                                                style="height: 100px;width:250px;max-height:100%;">

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class=" pad-bottom-25">
                                                        <table class="policy_table">
                                                            <tbody>
                                                                <tr class="border_tb">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Name of the Policy
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Attendance & Leave Policy
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Version Number
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue  ">
                                                                            HR/Attendance & Leave/2022/01
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Version Date
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue  ">

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Status
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue ">

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Policy Owner
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue  ">

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Responsibility Matrix
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue   ">

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border_b">
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Approving Authority
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="4" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue   ">

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <span class="border_b1  text-strong">
                                                            Purpose:

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <p class="">
                                                            The focus of this policy is to properly manage and track the
                                                            attendance and leaves of all the employees of the Indchem
                                                            Marketing Agencies .

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <span class="border_b1  text-strong">
                                                            Scope:

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <p class="">

                                                            This policy applies to all the employees of Indchem Marketing
                                                            Agencies , across all the departments and regardless of the job
                                                            position they hold.
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <span class="border_b1  text-strong">
                                                            Applicability

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <p class="">

                                                            This policy applies to all employees working for Indchem
                                                            Marketing Agencies
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <span class="border_b1  text-strong">
                                                            General Guidelines:

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-10">
                                                        <ol style="list-style: none">
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ Awareness and understanding of
                                                                    the policy shall be the responsibility of each employee.
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ Assuring compliance with the
                                                                    policy is the responsibility of the Reporting Manager/
                                                                    Head of the Business/Function.</p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ The Financial year system will
                                                                    be followed in all leave categories</p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ Any planned leave must be
                                                                    applied in the leave application form. Leave will be
                                                                    treated as Leave without Pay / Loss of Pay (LWP/LOP)/
                                                                    Unauthorised Absence if it is not subsequently approved
                                                                    by their reporting manager in the application form</p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ In case of leave taken without
                                                                    prior approval, as in emergency/sick, an employee can
                                                                    raise their leave request in leave form and the same
                                                                    should be approved by the Reporting Manager
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ All leaves must be planned and
                                                                    intimated in advance (except during exigencies), such
                                                                    that it does not affect day-to-day work. </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10"> ⮚ If there is neither prior
                                                                    intimation nor any communication for five days the
                                                                    organisation holds the right to treat them as abscond,
                                                                    if more than 7 days of absence, the organization holds
                                                                    the right to terminate service for ‘job abandonment’ and
                                                                    the employee may not be eligible for rehire.</p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">⮚ Salary will also be withheld
                                                                    with immediate effect from the date of absence</p>
                                                            </li>
                                                        </ol>

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
                                        <table class="policy_table txt_blue" style="padding:0;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class="border_b1  text-strong">
                                                            Definition:

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-15">
                                                        <p class="">
                                                            <span class=" text-strong">
                                                                A. Absenteeism

                                                            </span>
                                                            is referred to as the act of being unable to perform assigned
                                                            tasks in accordance with a specified schedule without prior
                                                            information.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">
                                                        <p class="">
                                                            <span class=" text-strong">
                                                                B. Tardiness

                                                            </span>
                                                            is considered when the following circumstances happen
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">

                                                        <ol style="list-style: none">
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ When an employee leaves the workplace before the end
                                                                    of the shift without the supervisor’s approval.

                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ When an employee fails to report to work at the
                                                                    assigned schedule.
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ When an employee over breaks and takes extended hours
                                                                    or minutes for meals
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ When an employee arrives late or past the time of
                                                                    his/her scheduled shift.
                                                                </p>
                                                            </li>
                                                        </ol>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class="border_b1  text-strong">
                                                            Eligibility Criteria for Absenteeism & Tardiness:


                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">

                                                        <ol style="list-style: none">
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Employees are expected to have one hundred percent
                                                                    attendance as much as possible

                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Employees can check their attendance in the HR Team –
                                                                    Calendar on a daily basis.
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Employees can regularize their attendance on their own
                                                                    through the HR Team if there is any
                                                                    leave/permission taken by them.

                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10 ">
                                                                    ⮚ <span class="text-strong">Employees are eligible to
                                                                        avail of two permissions per
                                                                        month of 1.5 hours each per
                                                                        permission. More than 4 permissions in a month will
                                                                        be
                                                                        considered a half-day LOP. </span>
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚
                                                                    <span class="text-strong">NO CALL NO SHOW</span>
                                                                    is subject to disciplinary action and grounds for
                                                                    termination


                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Attendance will be tracked through the Bio Matric
                                                                    System, and it is visible to all the
                                                                    employee’s payslips.
                                                                </p>

                                                            </li>

                                                        </ol>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class="border_b1  text-strong">
                                                            C. Attendance Process in HR Team:
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <ul type=""
                                                            style="padding-left:3rem;
                                                        ">
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    Attendance will be calculated based on the effective
                                                                    tossed hours
                                                                </p>

                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class=" pad-bottom-25">
                                                        <table class="policy_table">
                                                            <tbody>
                                                                <tr class="border_t2_b1">
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Particulars
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Attendance input
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Effective Hours
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Event Type
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border_b">
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">

                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">

                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">

                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class="border_b1  text-strong">
                                                            D. Type of Leaves (Per Financial Year)

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <ol type="" style="list-style:none;">
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Sick Leave / Casual Leave – 12 days

                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Earned Leave – 12 days
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Maternity Leave – 26 weeks (as per the Maternity
                                                                    Benefits Act)
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom-10">
                                                                    ⮚ Paternity Leave – 5 days (Only For Male)
                                                                </p>

                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class=" text-strong">
                                                            E. Core, Centre, and Optional holidays

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-10">
                                                        <p class="pad-bottom-10">
                                                            Indchem Marketing Agencies will have 11 holidays per annum
                                                            classified as Core, Centre, or State as per the holiday list.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <p class="pad-bottom-10">
                                                            The list of Core, Centre holidays for a calendar year shall be
                                                            announced prior to the beginning of the new calendar year.
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
                                        <table class="policy_table txt_blue" style="padding:0;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">
                                                        <span class="  text-strong">
                                                            F. Sick leave

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">

                                                        <ol style="list-style: none">
                                                            <li>
                                                                <p class="pad-bottom">
                                                                    ⮚ Employees are eligible for one day of SL/CL in the
                                                                    same month on which he/she joins the company, but the
                                                                    only criteria are he/she should join before 15 of the
                                                                    respective months; if not, the leave for that month will
                                                                    not be provided.

                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom">
                                                                    ⮚ All existing employees of Indchem Marketing
                                                                    Agenciesare eligible for 12 (Twelve) days of Sick leave
                                                                    / Casual Leave per annum on the 1st of April every year.
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom">
                                                                    ⮚ Employees joining in the middle of the year will be
                                                                    eligible for proportionate leave
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom">
                                                                    ⮚ Employees availing more than 2 days of Sick leave /
                                                                    Casual Leave will have to produce a medical certificate
                                                                    to support their sick / Casual leave request

                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom">
                                                                    ⮚ Sick Leave / Casual Leave cannot be carried forward to
                                                                    next year.
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="pad-bottom">
                                                                    ⮚ Sick Leave / Casual Leave of more than 5 days will get
                                                                    prior approval from the HR Department.
                                                                </p>
                                                            </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">
                                                        <span class="  text-strong">
                                                            G. Earned leave

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <ul type=""
                                                            style="padding-left:3rem;
                                                        ">
                                                            <li>
                                                                <p class="">
                                                                    All employees will be eligible for 12 (twelve) days of
                                                                    Earned leaves per annum
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="">
                                                                    All new joiners will be eligible to avail of Earned
                                                                    Leave based on their date of joining.

                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="">
                                                                    Earned Leave will be accrued every month. i. e 1 day per
                                                                    month

                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="">
                                                                    Earned Leave can be carried forward to next year and
                                                                    the maximum accumulation will be 24 days and every 2
                                                                    years accumulated earned leave will be encashed
                                                                </p>

                                                            </li>

                                                            <li>
                                                                <p class="">
                                                                    Earned Leave taken more than 5 days will get the prior
                                                                    approval from the HR Department.

                                                                </p>

                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-5">
                                                        <span class="  text-strong">
                                                            Leave Accumulation

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <ul type=""
                                                            style="padding-left:3rem;
                                                        ">
                                                            <li>
                                                                <p class="">
                                                                    Leave Accumulation: Management

                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="">
                                                                    Earned Leave is subjected to a limit of 12 days per
                                                                    annum and the maximum earned leave accumulation limit
                                                                    for an employee is set as 22 days up to 2 years
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="">
                                                                    Un-availed Sick leaves/ Casual leaves at the end of the
                                                                    financial year would not be carried forward to the
                                                                    subsequent year
                                                                </p>

                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class="border_b1  text-strong">
                                                            Approval Matrix
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">

                                                        <p class="">
                                                            The approvals as per the matrix are applicable only for the
                                                            exceptions to the policy and are permitted
                                                            only when the requirement for the same can be clearly
                                                            substantiated
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class=" pad-bottom-25">
                                                        <table class="policy_table">
                                                            <tbody>
                                                                <tr class="border_t2_b1">
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Policy Exceptions
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Initiated By
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Recommended By
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Approved By
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border_b">
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            -
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            -
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                           -
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                           -
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">
                                                        <span class="border_b1  text-strong">
                                                            Version Control
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class=" pad-bottom-25">
                                                        <table class="policy_table">
                                                            <tbody>
                                                                <tr class="border_t2_b1">
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            Version Number
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Roll Out Date
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Changes Made by
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            Approved By
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border_b">
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong ">
                                                                            -
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            -
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            -
                                                                        </p>
                                                                    </td>
                                                                    <td colspan="2" align="" class="pad-top-5">
                                                                        <p class="f-13 txt_blue text-strong  ">
                                                                            -
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="" class="pad-bottom-25">

                                                        <p class="">
                                                            Printed copies of this document may not be the latest version
                                                            and should not be relied upon. Also, please contact your manager
                                                            or Human Resources if you require any further information
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev " type="button" data-bs-target="#policy_carousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-secondary rounded-circle"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#policy_carousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-secondary rounded-circle"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
