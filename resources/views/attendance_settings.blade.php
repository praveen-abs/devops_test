@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection



@section('content')

 <div class="mb-0 card approvals_wrapper mt-30">
    <div class="card-body ">
        <div class="filter-content">
            <div class="row">
                <div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
                    <h6 class="my-2 text-lg font-semibold">Attendance Settings</h6>
                </div>
            </div>
        </div>
        @vite('resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_master.js')

        <div id="vjs_attendance_master"></div>
    </div>
 </div>
@endsection

@section('script')
<script>
</script>
@endsection
