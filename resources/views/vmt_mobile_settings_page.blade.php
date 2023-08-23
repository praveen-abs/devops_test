
@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

<div class="card mb-0 pms_approval_wrapper mt-30">
    <div class="card-body">
        <div class="table-responsive">
            @vite('resources/js/hrms/modules/configurations/mobile_settings/MobileSettings.js')
            <div id="MobileSettings"></div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection
