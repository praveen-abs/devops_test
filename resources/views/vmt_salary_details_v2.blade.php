<?php use Carbon\Carbon; ?>
@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('public\assets\css\payCheck.css') }}" rel="stylesheet">
@endsection
@section('content')
<h2 class="fs-5 font-semibold">Salary Details</h2>
    <div class="mt-4 salary-details-wrapper ">
        @vite('resources/js/hrms/modules/profile_pages/finance_details/EmployeePayslips.js')
        <div id="vjs_manage_payslips">

        </div>
    </div>
@endsection
@section('script')
@endsection
