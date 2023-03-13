@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
@vite('resources/js/hrms/modules/reimbursements/employee_reimbursements/EmployeeReimbursements.js')
<div id="vjs_employee_reimbursement"></div>
@endsection


