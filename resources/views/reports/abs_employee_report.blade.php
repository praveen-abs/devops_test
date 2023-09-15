@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
{{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}

{{-- @vite('resources/js/hrms/modules/reports/attendance/attendanceDetailReports/AttendanceReport_Detailed.js')
<div id="vjs_AttendanceReport_Detailed"></div> --}}

@vite('resources/js/hrms/modules/reports/employee_master_report/employee_master_report.js')
<div id="employee_master_report"></div>


@endsection