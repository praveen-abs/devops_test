@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Employee Onboarding @endslot
@endcomponent

<div class="container-fluid pms-dashboard">
    <div class="card   pms-dashboard-wrapper ">


        <div class="card-body">
            <div class="row ">
                <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 ">

                    <div class="card pms-card">
                        <div class="card-body">
                            <img src="{{ URL::asset('assets/images/comingsoon.png') }}" alt="" class="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 ">
                    <div class="card pms-card">
                        <div class="card-body">
                            <img src="{{ URL::asset('/assets/images/png_icons/goals_assignment.png')}}"
                                class="img-fluid rounded-start">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 ">
                    <div class="card pms-card">
                        <div class="card-body">
                            <img src="{{ URL::asset('/assets/images/png_icons/manager_review.png')}}"
                                class="img-fluid rounded-start">
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 ">
                    <div class="card pms-card">
                        <div class="card-body">
                            <img src="{{ URL::asset('/assets/images/png_icons/org_review.png')}}"
                                class="img-fluid rounded-start">
                        </div>

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
@endsection