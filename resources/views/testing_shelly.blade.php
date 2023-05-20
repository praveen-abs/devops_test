
@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
@vite('resources/js/hrms/modules/paycheck/investments/investment.js')
<div id="Investments"></div>
<!-- @vite('resources/js/hrms/modules/exit/exit.js')
<div id="Exit"></div> -->
</html>
@endsection
