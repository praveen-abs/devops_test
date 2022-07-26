@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

<link href="{{ URL::asset('assets/css/salary.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">



@endsection
@section('content')

@component('components.paycheck_breadcrumb')
@slot('li_1') @endslot
@endcomponent

<div class="home-wrapper">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6 ">
            <div class="card shadow profile-box card-top-border p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="text-primary">
                            Your Pay Summary
                        </h5>
                        <button class="btn btn-primary"> <i class=" ri-calendar-2-line"></i> </button>
                    </div>

                    <div class="row">
                        <div class="col-4">

                            <div class="pay-chart-column pay-summary-border">
                                <div id="ember67" class="ember-view"><svg width="100%" height="200"
                                        viewBox="0 0 200 200" preserveAspectRatio="xMidYMid meet">
                                        <g class="pie-container" transform="translate(100, 100)">
                                            <path
                                                d="M6.123233995736766e-15,-100A100,100 0 1,1 -46.84084406997906,-88.35120444460226L-30.44654864548639,-57.42828288899147A65,65 0 1,0 3.980102097228898e-15,-65Z"
                                                class="arc cursor-pointer" style="fill:#002f56"></path>
                                            <path
                                                d="M-46.84084406997906,-88.35120444460226A100,100 0 0,1 -1.8369701987210297e-14,-100L-1.1940306291686693e-14,-65A65,65 0 0,0 -30.44654864548639,-57.42828288899147Z"
                                                class="arc cursor-pointer" style="fill: rgb(255, 105, 121);">
                                            </path>
                                        </g><text class="default-label" dx="100" dy="103">May 2022</text>
                                    </svg></div>

                            </div>
                        </div>
                        <div class="col-8 d-flex align-items-center justify-content-center">

                            <div class="d-flex align-items-center justify-content-between">
                                <div class=" d-flex align-items-center mx-2 flex-column">
                                    <div class="take-home-bar #17b510"></div>
                                    <p>Take Home</p>
                                    <div><span class="font-large font-mediumbold h5 ">₹ 3,600.00</span></div>
                                </div>
                                <div class=" d-flex align-items-center mx-2 flex-column">
                                    <div class="deductions-bar"></div>
                                    <p>Deductions</p>
                                    <div><span class="font-large font-mediumbold h5 ">₹ 3,600.00</span></div>
                                </div>
                                <div class=" d-flex align-items-center mx-2 flex-column">
                                    <div class="cross-pay-bar "></div>
                                    <p>Cross Pay</p>
                                    <div><span class="font-large font-mediumbold h5 ">₹ 3,600.00</span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <button class="btn btn-orange">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6 ">
            <div class="card shadow profile-box card-top-border p-3 flex-fill">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-primary">
                            EPF Summary
                        </h5>
                        <button class="btn btn-primary"> <i class=" ri-calendar-2-line"></i> </button>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="personal-info">
                                <li>
                                    <div class="title h5 text-muted fw-bold">Total Contribution</div>
                                    <div class="text  h5 text-primary fw-bold">₹ 3,600.00</div>
                                </li>
                                <li>
                                    <div class="title h5 text-muted fw-bold">Your Contribution</div>
                                    <div class="text h5 text-primary fw-bold">₹ 3,600.00</div>
                                </li>
                                <li>
                                    <div class="title h5 text-muted fw-bold">Employee Contribution</div>
                                    <div class="text h5 text-primary fw-bold">₹ 3,600.00</div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="dotted-line pt-2">
                                <i class="mx-1 ri-error-warning-fill text-grey"></i>
                                <span>Towards EPF, you contribute 12% of upto ₹ 15,000.00 of your Basic Pay and your
                                    employer
                                    contributes another 12% of upto ₹ 15,000.00 of your Basic Pay.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6 ">
            <div class="card shadow profile-box card-top-border p-3 flex-fill">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-primary">
                            My Payslip
                        </h5>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Small button
                            </button>
                            <div class="dropdown-menu">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="personal-info">
                                <li>
                                    <div class="title h5 text-muted fw-bold">August Salary Slip</div>

                                    <div class="text h4  fw-bold"><i class="text-orange  ri-download-cloud-2-fill"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="title h5 text-muted fw-bold">September Salary Slip</div>

                                    <div class="text h4 text-orange fw-bold"><i
                                            class="text-orange ri-download-cloud-2-fill"></i> </div>
                                </li>
                                <li>
                                    <div class="title h5 text-muted fw-bold">October Salary Slip</div>

                                    <div class="text h4 text-orange fw-bold"><i
                                            class="text-orange ri-download-cloud-2-fill"></i> </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6 ">
            <div class="card shadow profile-box card-top-border p-3 flex-fill">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-primary">
                            Tax Complete Sheet
                        </h5>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Small button
                            </button>
                            <div class="dropdown-menu">

                            </div>
                        </div>
                    </div>

                    <ul class="personal-info">
                        <li>
                            <div class="title h5 text-muted fw-bold">August Salary Slip</div>

                            <div class="text h4  fw-bold"><i class="text-orange  ri-download-cloud-2-fill"></i>
                            </div>
                        </li>
                        <li>
                            <div class="title h5 text-muted fw-bold">September Salary Slip</div>

                            <div class="text h4 text-orange fw-bold"><i
                                    class="text-orange ri-download-cloud-2-fill"></i> </div>
                        </li>
                        <li>
                            <div class="title h5 text-muted fw-bold">October Salary Slip</div>

                            <div class="text h4 text-orange fw-bold"><i
                                    class="text-orange ri-download-cloud-2-fill"></i> </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6 ">
            <div class="card shadow profile-box card-top-border small-card p-3 ">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-primary">
                            Tax Deduction TDS/TCS
                        </h5>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Small button
                            </button>
                            <div class="dropdown-menu">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="personal-info">
                                <li>
                                    <div class="title h5 text-muted fw-bold">Form-16</div>

                                    <div class="text h4  fw-bold"><i class="text-orange  ri-download-cloud-2-fill"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="title h5 text-muted fw-bold">Form-12BB</div>

                                    <div class="text h4 text-orange fw-bold"><i
                                            class="text-orange ri-download-cloud-2-fill"></i> </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-6 ">
            <div class="card shadow profile-box card-top-border p-3 small-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-primary">
                            Cost To Company(CTC)
                        </h5>
                        <button class="btn btn-primary"> <i class=" ri-calendar-2-line"></i> </button>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="personal-info">
                                <li>
                                    <div class="title">
                                        <div class=" h5 text-muted fw-bold">Total Contribution

                                        </div>
                                        <small class="text-muted">(Whole pay structure including all primary salary
                                            components)</small>
                                    </div>


                                    <div class="text h4 text-orange fw-bold"><i
                                            class="text-orange ri-download-cloud-2-fill"></i> </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
            <div class="card declaration-card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active h5" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#declaration" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Declaration</button>
                            <button class="nav-link h5" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Previous Income</button>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="declaration" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="card declaration-important-card my-5">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span><i class="ri-alert-fill text-danger"></i>Important</span>
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary btn-sm dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class=" ri-calendar-2-line"></i>
                                                        <span>FY 2022 <span>-</span> 23</span>
                                                    </button>
                                                    <div class="dropdown-menu">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">

                                            <ul class="list-style-numbered list-style-circle p-4">
                                                <li> '$' - Not considered for exemption if opted for New tax regime
                                                    (Section 115BAC).
                                                </li>
                                                <li>. You can declare your investment amount till 25th of every month
                                                    until the cutoff date of Feb 20, 2023.</li>

                                                <li>Last date for submitting your investment proofs is Feb 20, 2023.
                                                    Not submitting your investment proofs may lead to additional tax
                                                    being deducted in the subsequent months of this fiscal year.!</li>

                                            </ul>

                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4  col-xl-4 col-md-4 col-lg-4">
                                    <div class="card declaration-tax-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                                    <div
                                                        class="d-flex justify-content-center flex-column text-center align-items-center">
                                                        <p class="text-muted">Net Taxable Income</p>
                                                        <h4>INR 4,66,888</h4>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12 text-right">

                                                    <span class="text-muted ">Income Tax Computation</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4  col-xl-4 col-md-4 col-lg-4">
                                    <div class="card declaration-tax-card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                                    <div
                                                        class="d-flex justify-content-center flex-column text-center align-items-center">
                                                        <p class="text-muted">Total Tax Payable</p>
                                                        <h4>INR 4,66,888</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4  col-xl-4 col-md-4 col-lg-4">
                                    <div class="card declaration-tax-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                                    <div
                                                        class="d-flex justify-content-center flex-column text-center align-items-center">
                                                        <p class="text-muted">Tax Already Paid</p>
                                                        <h4>INR 4,66,888</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="my-2 ">My Declaration</h5>
                    <div class="table-responsive">
                        <table class=" table table-borderd  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Declaration</th>
                                    <th scope="col">No Of Declaration</th>
                                    <th scope="col">Amount Declared</th>
                                    <th scope="col">Proof Submitted</th>
                                    <th scope="col">Amount Rejected</th>
                                    <th scope="col">Amount Accepted</th>
                            </thead>
                            <tbody>

                                <tr>

                                    <td>
                                        1.5 lac
                                    </td>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        INR 98,897
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 65,000
                                    </td>
                                </tr>


                            </tbody>

                        </table>
                        <!-- end table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        
        <div class="card">
            <div class="card-body">
            <h5>Monthly Tax Deduction Details</h5>
                <div class="row">
                    <div class="col-sm-6  col-xl-3 col-md-4 col-lg-3">
                        <div class="card declaration-tax-card card-left-bar">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                        <div
                                            class="d-flex justify-content-center flex-column text-center align-items-center">
                                            <p class="text-muted">Total Tax Payable</p>
                                            <h4>INR 48</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6  col-xl-3 col-md-4 col-lg-3">
                        <div class="card declaration-tax-card card-left-bar">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                        <div
                                            class="d-flex justify-content-center flex-column text-center align-items-center">
                                            <p class="text-muted"> Tax Paid Till Now</p>
                                            <h4>INR 48</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6  col-xl-3 col-md-4 col-lg-3">
                        <div class="card declaration-tax-card card-left-bar">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
                                        <div
                                            class="d-flex justify-content-center flex-column text-center align-items-center">
                                            <p class="text-muted">Remaining Tax Amount</p>
                                            <h4>INR 48</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="month-declaration">
        <div class="col-sm-12  col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive tax-table-responsive ">
                        <table class=" table table-borderd tax-table  mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">
                                        <p class="text-white"> Month</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">APR</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">MAY</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">JUN</span>2022</p>
                                        <hr class="one">
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">JUL</span>2022</p>
                                        <hr class="two">
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">AUG</span>2022</p>
                                        <hr class="three">
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">SEP</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">OCT</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">NOV</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">DEC</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">JAN</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">FEB</span>2022</p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-white"><span class="mx-1">MAR</span>2022</p>
                                    </th>
                            </thead>
                            <tbody>

                                <tr>

                                    <td>
                                        Monthly Total Tax
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>

                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>
                                    <td>
                                        INR 0
                                    </td>

                                </tr>


                            </tbody>

                        </table>
                        <div class="d-flex mt-4 align-itemx-center justify-content-start tax-details">

                            <p class="mx-2 "> Tax deduction from projected salary</p>
                            <p class="mx-2 ">Tax deduction from previous employer</p>
                            <p class="mx-2 ">Imported tax deduction from current employer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection