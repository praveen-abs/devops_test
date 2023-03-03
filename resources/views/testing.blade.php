@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
@endsection
@endsection
@section('content')
@vite('resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.js')
<div id="vjs_leaveapply"></div>
@endsection

