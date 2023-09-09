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

    @vite('resources/js/hrms/modules/reports/employee_master_report/employee_master_report.js')
    <div id="employee_master_report"></div>



</body>

</html>
@endsection
