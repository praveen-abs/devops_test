@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

@endsection
@section('content')
@component('components.paycheck_breadcrumb')
@slot('li_1') @endslot
@endcomponent
    <div class="card shadow top-line investments-wrapper">
        <div class="fill salary-header nav-tab-header">
            <div>
                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item active ember-view mx-4" role="presentation">
                        <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true">
                            Investment Declaration</a>
                    </li>
                    <li class="nav-item  ember-view mx-4" role="presentation">
                        <a class="nav-link  ember-view " id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investment_proof" role="tab" aria-controls="pills-home" aria-selected="true">
                            Proof of Investments</a>
                    </li>

                </ul>

            </div>

        </div>
        <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade show active" id="investment_dec" role="tabpanel" aria-labelledby="pills-home-tab">

                <div id="ember83" class="ember-view">
                    <div class="fill body content">
                        <div class="empty-state-help-centered ind-empty-state text-center">
                            <img src="https://css.zohostatic.in/zfpayroll/zpayrollportal///assets/it-empty-state-68d45ef7fddba0f96b1ec6b7664ace53.svg" class="empty-state-image">
                            <div class="empty-state-content text-center align-items-center">
                                <p class="empty-state-content-header">
                                    Investment Declaration submission is locked
                                </p>
                                <p class="empty-state-content-subtext my-1">
                                    You can declare your IT saving investments for the current financial year once the admin
                                    opens this option
                                </p>
                                <!---->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade " id="investment_proof" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="fill body content">
                    <div class="empty-state-help-centered ind-empty-state text-center">
                        <img src="https://css.zohostatic.in/zfpayroll/zpayrollportal///assets/it-empty-state-68d45ef7fddba0f96b1ec6b7664ace53.svg" class="empty-state-image">
                        <div class="empty-state-content text-center ">
                            <p class="empty-state-content-header">
                                Investment Declaration submission is locked
                            </p>
                            <p class="empty-state-content-subtext my-1">
                                You can declare your IT saving investments for the current financial year once the admin
                                opens this option
                            </p>
                            <!---->
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

@endsection