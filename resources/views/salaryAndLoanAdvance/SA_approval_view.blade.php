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

    @vite('resources/js/hrms/modules/approvals/salary_advance_loan/approvals_salary_advance.js')
    <div id="approvals_salary_advance"></div>

</body>

</html>
@endsection
