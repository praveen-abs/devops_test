@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')
    {{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}


        <div class="card mb-0 approvals_wrapper mt-30">
            <div class="card-body ">
                <div class="filter-content">
                    <div class="row">
                        <div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
                            <h6 class="">Holidays Summary</h6>
                        </div>
                    </div>
                </div>
                <div id="VJS_LeaveApproval">
                    @foreach ($master_holidays as $singleHoliday)
                    <br/>
                        <div>
                            <span> {{ $singleHoliday->holiday_name}} </span> <br/>
                            <span> {{ $singleHoliday->holiday_date}}</span> <br/>
                            <span><input type="button" class="editHoliday" value="Edit" />
                            </span>
                            <span><input type="button" class="editHoliday" value="Delete" /></span>
                        </div>
                    @endforeach


                </div>
            </div>
         </div>


@endsection

@section('script')
<script>

    $(document).ready(function() {

        console.log("Holiday page opened");

    });

    $('#myBtn').click(function(e) {
        $("#myModal").modal();
    });

</script>
@endsection
