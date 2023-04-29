<?php use Illuminate\Support\Facades\Crypt; ?>
@extends('layouts.master')
@section('title')
    @lang('translation.projects')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
@endsection


@section('content')

    @vite('resources/js/hrms/modules/Organization/manage_employee/ManageEmployee.js')
     <div id="vjs_manage_employee"></div>

@endsection

