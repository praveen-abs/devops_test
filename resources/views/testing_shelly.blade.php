
@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
<!-- @vite('resources/js/hrms/modules/exit/exit.js')
<div id="Exit"></div> -->

<!-- @vite('resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_master.js')
<div id="vjs_attendance_master"></div> -->

<!-- @vite('resources/js/hrms/modules/payroll/payRun/payRun.js')
<div id="PayRun"></div> -->

@vite('resources/js/hrms/modules/dashboard/dashboard.js')
<div id="Dashboard"></div>
</html>
@endsection
