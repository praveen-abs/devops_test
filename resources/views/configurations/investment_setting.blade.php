@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payRoll.css') }}">
@endsection
@section('content')
<div class="mb-0 card approvals_wrapper">

       @vite('resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/finance_setting/finance_settings.js')
       <div id="finance_setting"></div>
 </div>
@endsection
