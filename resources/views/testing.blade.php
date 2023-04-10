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

@vite('resources/js/hrms/modules/dashboard/dashboard.js')

  <div id="Dashboard"></div>

@endsection

