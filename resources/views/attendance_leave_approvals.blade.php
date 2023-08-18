@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')
    {{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}

                @vite('resources/js/hrms/modules/approvals/leaves/LeaveApproval.js')
                <div id="VJS_LeaveApproval"></div>

@endsection
