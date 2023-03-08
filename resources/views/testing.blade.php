@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
@vite('resources/js/hrms/modules/approvals/reimbursements/ReimbursementsApproval.js')
<div id="vjs_reimbursementsApprovalTable"></div>
@endsection


