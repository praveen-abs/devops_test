<?php

use Illuminate\Support\Facades\Storage;
use App\Models\VmtClientMaster;
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

    @vite('resources/js/hrms/modules/paycheck/salary_advance_loan/employee_salary_loan.js')
    <div id="EmpSalaryAdvanceLoan"></div>
</body>

</html>
@endsection
