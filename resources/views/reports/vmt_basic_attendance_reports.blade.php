@extends('layouts.master')
@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
@vite('resources/js/hrms/modules/reports/attendance/attendanceBasicReports/attendanceBasicReports.js')
<div id="AttendanceBasicReports"></div>
@endsection
