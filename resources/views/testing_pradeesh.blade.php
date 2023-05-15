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

@vite('resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveBalance.js')
<div id="vjs_orgLeaveTable_RemainingLeave"></div>

</body>
</html>
@endsection

