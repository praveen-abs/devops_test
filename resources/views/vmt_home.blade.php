@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">

<style>
.pay-summary-border svg {
    border: 1px solid #C9CEDE;
    border-radius: 50%;
    padding: 4px;
    height: 143px !important;
    width: 143px !important;
}

.pay-chart-column {
    margin-left: 50px !important;

}

.take-home-bar,
.deductions-bar,
.cross-pay-bar {

    height: 5px;
    width: 20px;

}

.take-home-bar {
    background: #17b510;
}

.cross-pay-bar {
    background: #9d3074;
}

.deductions-bar {
    background: #9d3074;
}

.dotted-line {
    border-top: dashed;
    opacity: 0.5;
}
</style>


@endsection
@section('content')

@component('components.paycheck_breadcrumb')
@slot('li_1') @endslot
@endcomponent

<div class="home-wrapper">
    <div class="row">
        <div class="col-6">
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
        <div class="col-6">
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
        <div class="col-6">
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

        <div class="col-6">
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
        <div class="col-6">
            <div class="card shadow profile-box card-top-border p-3 flex-fill">
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
        <div class="col-6">
            <div class="card shadow profile-box card-top-border p-3 flex-fill">
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
                                        <p class="text-muted">(Whole pay structure including all primary salary
                                            components)</p>
                                    </div>


                                    <div class="text h4 text-orange fw-bold"><i
                                            class="text-orange ri-download-cloud-2-fill"></i> </div>
                                </li>
                                <li>

                                </li>
                            </ul>
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