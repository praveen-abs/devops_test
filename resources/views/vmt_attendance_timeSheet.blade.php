@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')
    @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent


    <div class="card timeSheet_wrapper">
        <div class="card-body">

            <h6 class="">Time Sheet</h6>

            <div class="" id="timeSheet_table"></div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>


    <script>
        $(document).ready(function() {
            if (document.getElementById("timeSheet_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'name',
                            name: 'Date',
                        },
                        {
                            id: 'name',
                            name: 'Check-In',
                        },
                        {
                            id: 'name',
                            name: 'Check-Out',
                        },

                    ],
                    data: [

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("timeSheet_table"));
            }

        });
    </script>
@endsection
