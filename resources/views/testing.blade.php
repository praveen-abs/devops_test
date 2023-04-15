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


    <!-- @vite('resources/js/hrms/modules/Organization/manage_employee/manage_employee.js')
   <div id="ManageEmployee"></div>  -->


    @vite('resources/js/hrms/modules/configurations/client_onboarding/client_onboarding_master.js')
   <div id="clientOnboarding"></div> 

   
</body>
</html>
@endsection

