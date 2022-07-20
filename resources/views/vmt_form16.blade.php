@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<style>
    .card-border-blue {
        border-top: 7px solid #002F56!important;
    }
</style>
@endsection
@section('content')



<div class="container-fluid investments-wrapper bg-white card-border-blue">
    <div class="fill-header">
        <h3>Form 16</h3>
    </div>
    <div class="fill body content scroll-x scroll-y scrollbox details-container">
        <div class="empty-state-help-centered ind-empty-state">
            <img src="https://css.zohostatic.in/zfpayroll/zpayrollportal///assets/documents-empty-state-c3ea989472359383111b9e59961fb1e3.svg"
                class="empty-state-image">
            <div class="empty-state-content">
                <div class="empty-state-content-header">You will be able to view and download your Form 16 once the
                    payroll admin uploads it.</div>
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