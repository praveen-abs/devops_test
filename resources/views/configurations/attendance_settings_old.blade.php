@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payRoll.css') }}">
@endsection
@section('content')
    <div class="cotainer-fluid mt-30 payroll_wrapper">
        <div class="card left-line  mb-2">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav  nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <a class="nav-link active pb-2" data-bs-toggle="tab" href="#shift_details" aria-selected="true"
                            role="tab">
                            Shift Details</a>
                    </li>

                    <li class="nav-item text-muted mx-5 " role="presentation">
                        <a class="nav-link  pb-2" data-bs-toggle="tab" href="#shift_timerange" aria-selected="false"
                            tabindex="-1" role="tab">
                            Shift Time Range</a>
                    </li>
                </ul>


            </div>
        </div>

        <div class="tab-content">
            <div id="shift_details" class="tab-pane fade show active">
                <div class="card top-line mb-0">
                    <div class="card-body">
                        @vite('resources/js/hrms/modules/configurations/attendance_settings/Att_AssignWorkShifts.js')
                        <div id="VJS_AttSettings_AssignWorkShifts"></div>
                    </div>
                </div>
            </div>

            <div id="shift_timerange" class="tab-pane fade">
                <div class="card top-line mb-0">
                    <div class="card-body">

                    </div>
                </div>
            </div>
       </div>
    @endsection
