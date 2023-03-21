@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')

        <div class="card mb-0 approvals_wrapper mt-30">
            <div class="card-body ">
                <div class="filter-content">
                    <div class="row">
                        <div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
                            <h6 class="">Holidays Summary</h6>
                        </div>
                    </div>
                </div>
                <div id="vjs_holidays_tab">
                @vite('resources/js/hrms/modules/holidays/Holidays_MasterList.js')
                </div>
            </div>
         </div>


@endsection
