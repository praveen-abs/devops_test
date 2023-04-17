@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    @vite(['resources/scss/views/offer_letter.scss'])
@endsection
@section('content')
@vite('resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/payroll_setup.js')

<div id="payroll_setup"></div>

@endsection
