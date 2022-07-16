@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') PayCheck @endslot
@slot('title') Home @endslot
@endcomponent

<div class="container-fluid home-wrapper px-5">
    <div class="row">
        <div class="col-12">
            <div class="payslip-details-card dashboard-card">
                <h5 class="font-semibold font-moderate group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="icon dashboard-icon money-icon">
                        <path fill="#1574FF"
                            d="M322.5 181.2c9.9 0 18-8.1 18-18s-8.1-18-18-18h-133c-9.9 0-18 8.1-18 18s8.1 18 18 18H225c3.2.1 19.7 1 29.5 14.3.8 1.1 1.5 2.1 2.1 3.2h-67.1c-9.9 0-18 8.1-18 18s8.1 18 18 18h64.6c-10 11.6-30.1 20.1-55 17.4-7.6-.8-14.9 3.3-18.2 10.2s-1.8 15.1 3.6 20.5l79.9 78.7c3.5 3.5 8.1 5.2 12.6 5.2 4.7 0 9.3-1.8 12.8-5.4 7-7.1 6.9-18.5-.2-25.5l-52-51.2c7.2-2 14.1-4.7 20.4-8.1 18.3-9.8 31.2-24.7 36.4-41.9h28c9.9 0 18-8.1 18-18s-8.1-18-18-18H295c-1.5-6.1-3.9-12-7-17.5h34.5z">
                        </path>
                        <path fill="#333"
                            d="M431 68.2H81c-44.1 0-80 35.9-80 80v215.7c0 44.1 35.9 80 80 80h350c44.1 0 80-35.9 80-80V148.2c0-44.1-35.9-80-80-80zm40 295.6c0 22.1-17.9 40-40 40H81c-22.1 0-40-17.9-40-40V148.2c0-22.1 17.9-40 40-40h350c22.1 0 40 17.9 40 40v215.6z">
                        </path>
                    </svg>
                    Your Payslips
                </h5>

                <div>
                    <ul class="nav nav-pills nav-tabs-dashed">
                        <li>
                            <a class="active" data-ember-action="" data-ember-action-62="62">May 2022</a>
                        </li>
                    </ul>
                </div>
                <div id="ember63" class="ember-view pay-detail-chart">
                    <div class="row group">
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                            <div class="pay-chart-column pay-summary-border">
                                <div id="ember67" class="ember-view"><svg width="100%" height="200"
                                        viewBox="0 0 200 200" preserveAspectRatio="xMidYMid meet">
                                        <g class="pie-container" transform="translate(100, 100)">
                                            <path
                                                d="M6.123233995736766e-15,-100A100,100 0 1,1 -46.84084406997906,-88.35120444460226L-30.44654864548639,-57.42828288899147A65,65 0 1,0 3.980102097228898e-15,-65Z"
                                                class="arc cursor-pointer" style="fill:#002f56"></path>
                                            <path
                                                d="M-46.84084406997906,-88.35120444460226A100,100 0 0,1 -1.8369701987210297e-14,-100L-1.1940306291686693e-14,-65A65,65 0 0,0 -30.44654864548639,-57.42828288899147Z"
                                                class="arc cursor-pointer" style="fill: rgb(255, 105, 121);"></path>
                                        </g><text class="default-label" dx="100" dy="103">May 2022</text>
                                    </svg></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                            <div class="pay-info-column">
                                <div class="pay-info-item netpay">
                                    <label class="text-grey">Take Home</label>
                                    <div><span class="font-moderate font-mediumbold">₹21,400.00</span></div>
                                </div>
                                <div class="pay-info-item deductions">
                                    <label class="text-grey">Deductions</label>
                                    <div><span class="font-moderate font-mediumbold">₹1,800.00</span></div>
                                </div>
                                <div class="pay-info-item grosspay">
                                    <label class="text-grey">Gross Pay</label>
                                    <div><span class="font-moderate font-mediumbold">₹23,200.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center home-view-details">
                        <a href="{{url('vmt_salary_details')}}" id="ember68" class="ember-view fw-bold text-secondary">
                            View Payslip
                            <i class=" ri-arrow-right-line mx-1 text-secondary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="deduction-summary-card dashboard-card">
                <h5 class="dashboard-card-header fw-bold">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 my-2 col-lg-6 col-xl-6">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="icon dashboard-icon">
                                    <path fill="#1574FF"
                                        d="M311.2 154.1c-9.7-5.4-21.8-1.9-27.2 7.8l-93.6 168.8c-5.4 9.7-1.9 21.8 7.8 27.2 3.1 1.7 6.4 2.5 9.7 2.5 7 0 13.9-3.7 17.5-10.3L319 181.3c5.4-9.7 1.9-21.8-7.8-27.2z">
                                    </path>
                                    <circle transform="rotate(-42.674 319.683 296.455)" fill="#1574FF" cx="319.7"
                                        cy="296.5" r="29.7"></circle>
                                    <circle transform="rotate(-42.674 192.306 207.13)" fill="#1574FF" cx="192.3"
                                        cy="207.1" r="29.7"></circle>
                                    <path fill="#333"
                                        d="M389.6 11.3H122.4c-38.6 0-70 31.4-70 70v349.3c0 38.6 31.4 70 70 70h267.2c38.6 0 70-31.4 70-70V81.3c0-38.6-31.4-70-70-70zm30 419.4c0 16.5-13.5 30-30 30H122.4c-16.5 0-30-13.5-30-30V81.3c0-16.5 13.5-30 30-30h267.2c16.5 0 30 13.5 30 30v349.4z">
                                    </path>
                                </svg>
                                Tax Summary: FY 2022 - 2023
                            </span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 my-2">
                            <div class="font-mm font-regular text-grey pull-right t">You've opted for the Old Regime
                                <span class="font-mediumbold">(IT Declaration Based)</span>
                            </div>
                        </div>
                    </div>
                </h5>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                        <div class="media mbottom-medium pleft-small">
                            <div class="media-left">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"
                                    viewBox="0 0 512 512" xml:space="preserve"
                                    class="icon icon-xxxlg vertical-align-text-top">
                                    <path fill="#FFD152"
                                        d="M277.8 399.5l-62.9 26.6-30 12.7-40.3 17-30.2 12.8L81 482.7 54.4 494 15 510.7c-8.8 3.7-17.7-5.2-14-14l16.6-39.3L29 430.7l14.1-33.4L55.9 367l17-40.3 12.7-30 26.6-62.9 165.6 165.7z">
                                    </path>
                                    <ellipse transform="rotate(-45.001 195.02 316.686)" fill="#FF9400" cx="195"
                                        cy="316.7" rx="13.1" ry="117.1"></ellipse>
                                    <path fill="#B357B4"
                                        d="M214.9 426.1l-30 12.7c-14.4-9.3-37-28-60.5-51.5s-42.1-46.2-51.5-60.5l12.7-30c3.6 10.8 26.3 40.5 57.5 71.8 31.3 31.2 61.1 53.9 71.8 57.5zM144.7 455.8l-30.2 12.8c-10.8-8.4-24.1-20-37.7-33.6-13.6-13.6-25.2-26.9-33.6-37.7L55.9 367c8.1 11.9 22.8 29.5 41 47.7 18.3 18.3 35.8 33 47.8 41.1zM81 482.7L54.4 494c-5.8-4.7-12.4-10.7-19.2-17.5-6.8-6.8-12.7-13.4-17.5-19.2L29 430.7c5 7.2 13.6 17.4 24.1 27.9 10.6 10.5 20.8 19.1 27.9 24.1z">
                                    </path>
                                    <path fill="#0094FF"
                                        d="M377.9 42.1c-6.4-3.1-13.9-4.7-17 3.5-3.5 9.2-1.7 20.3-.2 29.8 1.3 8.1 2.7 16.2 3.7 24.3.4 3 .7 5.9 1 8.9.2 1.7.3 3.5.4 5.2-.1-2.4 0 3.1 0 1.4 0-1.8-.3 3.8 0 .9-.2 1.6.3 0-.2 1-.2.5-.8 1.9-1.8 2.8-2.1 1.8-5.1 1.8-7.7 1.6-8.3-.9-16.4-5-24-8-15.8-6.3-38.1-14-46.4 6.7-4.8 11.9-4.1 26-3.7 38.6.1 2.8.2 5.5.3 8.3.1 1.5.1 2.9.1 4.4V174.1c0 .6 0 1.2-.1 1.8 0-.6.3-2-.1.3-.3 1.7.1 0-.3 1.7-.5 1.9-1.1 3.9-2.2 5.8-12 20.3-45.5 1-59-6.6-2-1.1-2.6 12.6-2.6 13.6.1 3.5-.3 11.5 3.3 13.5 11.4 6.4 23.9 12.9 37.1 14.8 6.8.9 13.6.2 19.1-4.1 8.7-6.9 9.9-20.4 10.5-30.6.4-6.6.3-13.1 0-19.7-.1-2.7-.2-5.5-.3-8.2 0-1.5-.1-2.9-.1-4.4v-.6c0 1.8.1-1.5.1-1.8-.1 2.5.2-1.9.1-1.1-.1.6.3-1.6.3-1.8.5-1.9 1.4-4.1 2.6-5.8 2.4-3.5 5.7-5.7 9.8-6.6 8.7-2 18.1 1.3 26.2 4.3 8.6 3.2 16.9 7.4 25.8 9.6 6.7 1.7 13.1 1 16-6.1 2.6-6.4 2.9-13.9 3-20.6.1-9.1-.5-18.1-1.5-27.1-1.1-9.7-2.6-19.4-4.2-29.1-.4-2.3-.7-4.7-1.2-7-.5-2.7-.2-6.2-.4 4.5-.2 11.6-1.4 6.3 1.2 4.9 4.4-2.4 8.6-.4 12.8 1.6 2.2 1 2.6-12.6 2.6-13.6.2-3.4.6-11.9-3-13.6z">
                                    </path>
                                    <path fill="#F151A1"
                                        d="M150.6 267.3c5.1-27.8 18.6-53 32.4-77.4 7.1-12.4 14.4-24.7 21-37.3 6.9-13.1 14-26.5 16-41.3 2.1-15.9.5-33.2-7.5-47.5-6.3-11.3-15.9-20.4-26.8-27.1-20.5-12.6-45.4-17.1-69.2-13C103.3 26 90.8 31 79.7 38.4c-6.2 4.2-12 9.1-15.2 16-4.3 9.5-3.7 22-1.2 31.9.1.5.9 3.9 2.2 3.9 1.3 0 1.9-3.5 2-4 1.2-6 1-13.2-.5-19.1 3.4 13.6-1.9 15.3 2 9.2.8-1.2 1.7-2.2 2.6-3.3 2-2.2 4.3-4.2 6.7-6 4.4-3.3 9.1-6.1 14.1-8.4 9.4-4.5 19.5-7.3 29.8-8.5 20.8-2.5 42.7 1.3 60.9 11.8 9.4 5.4 17.9 12.7 24.2 21.4 1.7 2.4 3.3 4.8 4.6 7.5.9 1.8 1.5 6.1 2.8 7.4.6.6 1-3.5-.1-1.4-1.4 2.7-1.9 6.6-3.1 9.5-9.2 22.8-23.1 43.7-35.1 65.1-13.6 24.3-25.6 49.4-30.7 76.9-1.1 6.1-1.1 13.1.5 19.1 1.3 4.4 3.4 5 4.4-.1zM195.4 328.1c49.8-12 89.5-62 144.5-46.8 8.1 2.3 16 5.5 23.5 9.2 4.1 2 8.2 4 12.1 6.3 1.5.9 3 1.9 4.3 3.1l1.5 1.5c1.3 1.2.9 3 .4-.8-.2-3.5-.4-6.9-.6-10.4 0 .4-.1.9-.1 1.3l1.2-8.1c-.9 3.7-4.5 6.4-7.4 8.8-3.4 2.9-7.3 5.6-11.7 6.6-3.6.9-7.6.5-10.6-2-.9-.8-1.8-3.2-2.7-3.7-.7-.4 1.4 6.5.3 6.8.2 0 2.3-9 2.6-9.8 1.2-3.8 2.7-7.5 4.3-11.1 3.2-7 7.3-13.6 11.9-19.8 19.9-26.5 50.5-42.4 83.6-43.5 19.5-.6 38.9 3.9 56.1 13 2.1 1.1 2.6-12.6 2.6-13.6-.1-3.4.3-11.6-3.3-13.5-31.8-16.9-71.4-17.6-103.4-.8-28.6 15-49.6 42.2-57.6 73.4-2.7 10.6-3.5 21.6-1.9 32.5 1 7.3 3.1 15.8 10.7 18.8 7.8 3.1 16.2-3 21.8-7.8 3.1-2.7 6.2-5.6 7.7-9.6 2.4-6.4 2-14.7 1.1-21.4-1.4-10-6.4-14.3-14.9-18.8s-17.3-8.7-26.4-11.8c-16.9-5.7-34.2-6.4-51.3-1.4-35.3 10.5-63.1 37.6-99.2 46.3-5.4 1.4-1.8 27.8.9 27.1z">
                                    </path>
                                    <path fill="#0094FF"
                                        d="M263.8 374.3c19.4-4.4 40.4-8.7 60.1-2.9 17.1 5 31.5 18.9 35.3 36.5.1.5.9 3.9 2.2 3.9 1.3 0 1.9-3.5 2-4 1.3-6.1.9-13-.5-19.1-4.1-19.1-16.4-35.5-34.8-42.7-20.7-8.1-43.9-3.5-64.9 1.3-5.6 1.2-2.2 27.6.6 27z">
                                    </path>
                                    <circle fill="#FFD152" cx="427.7" cy="403.7" r="13.7"></circle>
                                    <circle fill="#F151A1" cx="299.7" cy="11.2" r="8.4"></circle>
                                    <circle fill="#0094FF" cx="441.4" cy="269.2" r="8.4"></circle>
                                    <circle fill="#FFD152" cx="488" cy="144.7" r="8.4"></circle>
                                    <circle fill="#F151A1" cx="433" cy="97.7" r="13.7"></circle>
                                    <circle fill="#0094FF" cx="107.6" cy="129.2" r="13.7"></circle>
                                </svg>
                            </div>

                            <div class="media-body w-100">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                        <div class="font-mediumbold font-medium fw-bold" style="line-height: 26px;">
                                            You're
                                            tax free!
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                        <span class="text-grey font-mm">Since your taxable income is within the no-tax
                                            slab,
                                            you
                                            don't have to pay any income tax this financial year.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="deduction-summary-card dashboard-card">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <h5 class="dashboard-card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon dashboard-icon">
                                <path fill="#333"
                                    d="M499.1 209.1l-36.3-13.7c-10.8-23.3-27.7-44.9-49.5-62.7-2.1-2-19.1-18.8-17.2-37.6C398 76 413.3 65.9 415 64.8c7.6-4.8 11-14.1 8.4-22.7-2.7-8.6-10.8-14.3-19.7-14-31.9 1.2-62.2 12.5-85.2 31.7-7.5 6.2-14.3 13.3-20.2 21.1-12.1-.7-31.3-1.7-43.8-1.7-58.4 0-113.5 18-155.2 50.6-33.1 25.9-54.8 58.7-63 94.5-3.7-5.5-10-9-17.1-8.8-11 .3-19.6 9.5-19.3 20.4C.4 253 12 267.7 28 271.5c1.7.4 3.5.7 5.3.8 4.1 39.9 24.5 77.1 58.7 106.5 1.2 6.3 3.9 22.3 8.8 61.5 3.1 25 24.4 43.8 49.6 43.8h46.5c16.5 0 29.9-13.4 29.9-29.9v-24.8c9.1.6 19.6 1 27.8 1 6.3 0 12.7-.2 19-.6 0 6.3 0 14.3-.1 24.2-.1 8 3 15.6 8.7 21.3 5.7 5.7 13.2 8.8 21.2 8.8h48c24 0 44.7-17.2 49.1-40.8 7.6-40.8 11.5-56.1 13.1-61.5 15.2-13 32.3-33.4 41.2-44.4l19.4-.1c9.4-.1 17.5-6.7 19.3-15.9l18.1-89.6c1.9-9.8-3.3-19.3-12.5-22.7zm-41.3 88.4l-12.8.1c-6.1 0-11.9 2.9-15.7 7.8-7.3 9.5-29.4 36.7-44.3 48.3-6.4 5-9 11.6-14.7 37.2-2.6 11.7-5.6 26.9-9 45-.9 4.8-5.1 8.4-10.1 8.4h-38.1c0-6.3.1-13.2 0-19.3 0-5.3-.1-9.6-.2-12.6-.2-6.5-.4-13.8-7.2-19.7-4.4-3.8-10.3-5.5-16-4.7-11.6 1.7-23.4 2.6-35.3 2.6-16.8 0-45.7-2.4-46-2.4-5.5-.5-11 1.4-15.1 5.2-4.1 3.8-6.4 9.1-6.4 14.6v36.3h-36.7c-5.1 0-9.5-3.8-10.1-9-2.3-18.5-4.4-33.8-6.1-45.5-3.9-26.2-5.4-32.4-12.3-37.9-31.9-25.8-49.5-59.4-49.5-94.6 0-76.3 81.8-138.4 182.2-138.4 17.7 0 52 2.2 52.4 2.3 7.2.5 14.2-3 18.1-9.2 5.3-8.3 11.7-15.6 19-21.8 4.7-3.9 9.6-7.2 14.5-9.9-.8 3.4-1.4 6.9-1.8 10.7-4.1 40.5 29.1 70.3 30.5 71.5.2.2.4.3.6.5 19.3 15.7 33.6 34.8 41.6 55.1 2 5.2 6.2 9.4 11.5 11.4l28.4 10.7-11.4 57.3z">
                                </path>
                                <circle transform="rotate(-9.213 368.327 205.775)" fill="#1574FF" cx="368.3" cy="205.8"
                                    r="21">
                                </circle>
                                <path fill="#1574FF"
                                    d="M284.3 170.8c-21.6-4.8-43.4-5.1-64.9-.9-16.1 3.1-31.6 8.7-46.1 16.7-9.6 5.3-13.2 17.3-7.9 27 3.6 6.6 10.4 10.3 17.4 10.3 3.2 0 6.5-.8 9.5-2.4 10.9-6 22.5-10.2 34.6-12.5 16.1-3.1 32.6-2.9 48.8.7 10.7 2.4 21.3-4.4 23.7-15.1 2.4-10.9-4.4-21.5-15.1-23.8z">
                                </path>
                            </svg>
                            EPF Summary
                            <span class="font-regular font-mm text-grey">Year to Date</span>
                        </h5>
                    </div>
                </div>


                <div class="row group">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-6 epf-contribution-separator">
                        <label class="text-grey">Total Contribution</label>
                        <div><span class="font-large font-mediumbold h3 ">₹ 3,600.00</span></div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-6">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 d-flex ">
                                <label class="col-xs-6 col-lg-6 col-md-6 col-xl-6 col-sm-6 text-grey no-pad-left">Your
                                    Contribution</label>
                                <div
                                    class="col-xs-6 col-lg-6 col-md-6 col-xl-6 col-sm-6 md-text font-semibold no-pad-left ">
                                    : ₹ 1,800.00</div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12  d-flex ">
                                <label
                                    class="col-xs-6 col-lg-6 col-md-6 col-xl-6 col-sm-6 text-grey no-pad-left">Employer
                                    Contribution</label>
                                <div class="col-xs-6 col-lg-6 col-md-6 col-xl-6 col-sm-6 font-semibold no-pad-left ">: ₹
                                    1,800.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-grey font-mm">
                    <i class="mx-1 ri-error-warning-fill text-grey"></i>
                    <span>Towards EPF, you contribute 12% of upto ₹ 15,000.00 of your Basic Pay and your employer
                        contributes another 12% of upto ₹ 15,000.00 of your Basic Pay.</span>
                    <hr>
                    <div class="text-center home-view-details">
                        <a href="{{url('vmt_salary_details')}}" id="ember68" class="ember-view fw-bold text-secondary">
                            View Payslip
                            <i class=" ri-arrow-right-line mx-1 text-secondary"></i>
                        </a>
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