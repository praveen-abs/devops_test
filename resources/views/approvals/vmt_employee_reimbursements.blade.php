
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
    <div id="vjs_employee_reimbursement"></div>
@endsection
@section('script')
@vite('resources/js/hrms/modules/approvals/employee_reimbursements/employee_reimbursements.js')

@endsection
