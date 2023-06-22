@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payCheck.css') }}">
@endsection
@section('content')
@vite('resources/js/hrms/modules/paycheck/investments/investment.js')
<div id="Investments"></div>   
@endsection
