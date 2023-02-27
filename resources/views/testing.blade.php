@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}"> 
    <script src="{{ URL::asset('assets/js/calendar-vanila.js') }}" defer></script>
       <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
@endsection
@section('content')
@vite('resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.js')


<div id="vjs_leaveApply"></div>

@endsection
