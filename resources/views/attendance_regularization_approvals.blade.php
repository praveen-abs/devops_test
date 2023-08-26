@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')


@endsection
@section('content')
 <div id="vjs_regularizationTable"></div>       
@endsection

@section('script')
    @vite(['resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.js'])
@endsection
