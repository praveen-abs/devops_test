@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
<<<<<<< HEAD
    <div class="parollReports-wrapper  " >
        <div class="card" >
            <div class="card-body">
                <div class="row mb-3" >
                    <div class="col-3" >
                        <label for="">year</label>
                        <select id="dropdown_attendance_year" class="form-select ">
                            <option value="all" selected>---Select Year----</option>
                            @foreach ($attendance_available_years as $key => $value)
                                <option value="{{ $value }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
=======
{{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e

@vite('resources/js/hrms/modules/reports/attendance/attendanceBasicReports/attendanceBasicReports.js')
<div id="AttendanceBasicReports"></div>

@endsection
