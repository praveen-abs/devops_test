
@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
<!-- @vite('resources/js/hrms/modules/exit/exit.js')
<div id="Exit"></div> -->

<!-- @vite('resources/js/hrms/modules/payroll/payRun/payRun.js')
<div id="PayRun"></div> -->

@vite('resources/js/hrms/modules/reports/ReportsModule.js')
<div id="ReportsModule"></div>


<!-- @vite('resources/js/app.js')
<div id="app"></div> -->
@endsection
