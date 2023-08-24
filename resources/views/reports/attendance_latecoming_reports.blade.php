@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
{{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}

@vite('resources/js/hrms/modules/reports/attendance/attendanceLatecomingReports/attendanceLatecomingReports.js')
<div id="AttendanceLateComingReports"></div>

@endsection
