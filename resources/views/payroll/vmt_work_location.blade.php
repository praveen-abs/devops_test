@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    @vite(['resources/scss/views/offer_letter.scss'])
@endsection
@section('content')
@vite('resources/js/hrms/modules/payroll/payroll_setting/work_location/work_location_setup/work_location_setup.js')

<div id="work_location"></div>

@endsection
