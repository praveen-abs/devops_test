@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

@endsection
@section('content')
@component('components.paycheck_breadcrumb')
@slot('li_1')  @endslot
@endcomponent
<div class="investments-wrapper bg-white mt15-mb30">
    <div class="card shadow profile-box card-top-border ">
        <div class="fill salary-header nav-tab-header">
            <div class="row">
                <div class="col-xs-6">
                    <ul class="nav nav-pills nav-tabs-dashed">
                        <li id="ember76" class="active ember-view">
                            <a href="#/investments-and-proofs/investment-declaration" id="ember77"
                                class="active ember-view">
                                Investment Declaration
                            </a>
                        </li>
                        <li id="ember78" class="ember-view">
                            <a href="#/investments-and-proofs/proof-of-investments" id="ember79" class="ember-view">
                                Proof of Investments
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-xs-6">
                <p class="it-poi-help-link">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 512 512"
                        xml:space="preserve" class="icon icon-blue help-lhs vertical-align-text-top">
                        <path
                            d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256 256-114.6 256-256S397.4 0 256 0zm0 404.4c-18 0-32.6-14.6-32.6-32.6s14.6-32.6 32.6-32.6 32.6 14.6 32.6 32.6-14.6 32.6-32.6 32.6zm27.3-96.4c0 4.4-3.6 8-8 8h-38.7c-4.4 0-8-3.6-8-8 0-16.6 3.3-37.9 22.6-56.4s43.8-33.8 43.8-56.9c0-25.6-17.5-37.6-39.9-37.6-31 0-37.7 27.4-39.7 41.8-.5 3.9-3.9 6.9-7.9 6.9h-36.7c-4.7 0-8.3-4-7.9-8.7 3.5-40.1 23-89.5 92.7-89.5 64.8 0 93.6 42.7 93.6 83.4-.1 64.7-65.9 75.3-65.9 117z">
                        </path>
                    </svg>
                    <span class="need-help">
                        <a href="https://www.zoho.com/in/payroll/help/portal-it-declaration.html" target="_blank"
                            rel="noreferrer noopener" class="vertical-align-top">Help Doc</a>
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"
                            viewBox="0 0 512 512" xml:space="preserve" class="icon right-arrow vertical-align-middle">
                            <path
                                d="M317.8 238.3l-88.2-88.2c-9.8-9.8-25.6-9.8-35.4 0-9.8 9.8-9.8 25.6 0 35.4l17.7 17.7 52.8 52.8-52.8 52.8-17.7 17.7c-9.8 9.8-9.8 25.6 0 35.4 4.9 4.9 11.3 7.3 17.7 7.3s12.8-2.4 17.7-7.3l88.2-88.2c4.7-4.7 7.3-11 7.3-17.7 0-6.6-2.6-13-7.3-17.7z">
                            </path>
                        </svg>
                    </span>
                    <a class="help-video it-poi-help-video" href="https://www.youtube.com/watch?v=qL3e01-bLWo"
                        target="_blank" rel="noreferrer noopener">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"
                            viewBox="0 0 512 512" xml:space="preserve"
                            class="icon icon-xxlg icon-blue vertical-align-middle video-play">
                            <path
                                d="M326.2 232.1l-107.8-80.4c-19.8-14.8-47.9-.6-47.9 24v160.8c0 24.7 28.2 38.8 47.9 24l107.8-80.4c16-11.9 16-36 0-48z">
                            </path>
                        </svg>
                        <span class="vertical-align-middle">Watch Video</span>
                    </a>
                </p>
            </div> -->
            </div>
        </div>

        <div class="zp-container nav-tab-body-top scroll-x scroll-y">
            <div class="it-poi-filter-container">
                <div class="it-poi-filter list-filter">

                    <i class=" ri-filter-2-fill vertical-align-text-bottom text-secondary"></i>

                    <div class="dropdown cursor-pointer payslip-dropdown">
                        <div id="ember80" class="ember-view">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <span>Financial Year : </span>
                                <span class="font-semibold">2022 - 23</span>
                                <span class="caret "></span>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li data-ember-action="" data-ember-action-82="82"><a>2022 - 23</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ember83" class="ember-view">
                <div class="fill body content">
                    <div class="empty-state-help-centered ind-empty-state">
                        <img src="https://css.zohostatic.in/zfpayroll/zpayrollportal///assets/it-empty-state-68d45ef7fddba0f96b1ec6b7664ace53.svg"
                            class="empty-state-image">
                        <div class="empty-state-content">
                            <div class="empty-state-content-header">
                                Investment Declaration submission is locked
                            </div>
                            <div class="empty-state-content-subtext">
                                You can declare your IT saving investments for the current financial year once the admin
                                opens this option
                            </div>
                            <!---->
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