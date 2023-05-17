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

    @vite('resources/js/hrms/modules/configurations/emp_documents/DocumentsSettings.js')
    <div id="DocumentsSettings"></div>

</body>
</html>

@endsection
