@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')
    {{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}



        <div class="mb-0 card approvals_wrapper mt-30">
            <div class="card-body ">
                <div class="filter-content">
                    <div class="row">
                        <div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
                            <h6 class="my-2 text-lg font-semibold">Leave Approvals</h6>
                        </div>
                    </div>
                </div>
                @vite('resources/js/hrms/modules/approvals/leaves/LeaveApproval.js')
                <div id="VJS_LeaveApproval"></div>
            </div>
         </div>
@endsection
