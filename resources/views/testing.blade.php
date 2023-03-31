<?php

    use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
<!-- @vite('resources/js/hrms/modules/onboarding_module/offer_letter/offer_letter_template/offer_letter_template.js')
     <div id="offer_template"></div> -->

<!-- @vite('resources/js/hrms/modules/paycheck/declaration/declaration.js')

  <div id="declaration"></div> -->

@vite('resources/js/hrms/modules/payroll/payroll_setting/payroll_setting.js')

  <div id="payroll_setting"></div>

<!--
@vite('resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/payroll_setup.js')

  <div id="payroll_setup"></div> -->

@endsection

