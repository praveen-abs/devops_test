@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
{{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}

@vite( 'resources/js/hrms/modules/reports/attendance/attendanceAbsentReports/attendanceAbsentReports.js')
<div id="AttendanceAbsentReports"></div>

@endsection
