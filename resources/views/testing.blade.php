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
<!doctype html>
<html lang="en">
<head>


</head>
<body>


   <!-- {{-- @vite('resources/js/hrms/modules/Organization/manage_employee/manage_employee.js')
   <div id="ManageEmployee"></div> --}} -->


    @vite('resources/js/hrms/modules/paycheck/investments/investment.js')
   <div id="Investments"></div> 

 <!-- @vite('resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.js')
  <div id="SalaryAdvanceLoan"></div> -->


</body>
</html>
@endsection

