@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">


@endsection
@section('content')
@component('components.paycheck_breadcrumb')
@slot('li_1') @endslot
@endcomponent
<div class="investments-wrapper">
    <div class="card shadow profile-box line-top ">
        <div class="card-body">
            <div class="fill-header">
                <h5>Form 16</h5>
            </div>
            <div class="fill body content scroll-x scroll-y scrollbox details-container">
                <div class="empty-state-help-centered ind-empty-state d-flex flex-column justify-content-center align-items-center">
                    <img src="https://css.zohostatic.in/zfpayroll/zpayrollportal///assets/documents-empty-state-c3ea989472359383111b9e59961fb1e3.svg" class="empty-state-image">
                    <!-- <div class="empty-state-content"> -->
                        <!-- <div class="empty-state-content-header">You will be able to view and download your Form 16 once the
                            payroll admin uploads it.</div> -->
                            <span>You will be able to view and download your Form 16 once the
                            payroll admin uploads it.</span>
                    <!-- </div> -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection