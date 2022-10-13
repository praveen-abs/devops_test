@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')
    @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent


    <div class="card leave_settings-wrapper">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <h6 class="">Leave History</h6>
                </div>
                <div class="col-6 text-end">

                    <div class="d-flex justify-content-end">
                        <div class="input-group  w-50 me-2">
                            <label class="input-group-text " for="inputGroupSelect01"><i class="fa fa-calendar text-primary "
                                    aria-hidden="true"></i></label>
                            <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                <option selected>FY 2022-23</option>

                            </select>
                        </div>
                        <div>
                            <button class="btn btn-orange" type="button">
                                Leave Policy Explanation
                            </button>
                        </div>

                    </div>


                </div>

            </div>

            <div class="card top-line mb-4">
                <div class="card-body">
                    <div class="leave-balance-wrapper">
                        <div class="row mb-2">
                            <div class="col-8">
                                <h6>Leave Balance</h6>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn btn-border-primary">
                                    Pending
                                </button>
                                <button class="btn btn-orange">
                                    Apply Leave
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 d-flex ">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center">Available</p>
                                    <h6 class="text-center">9/12</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex ">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center">Accured so far</p>
                                    <h6 class="text-center">9/12</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex ">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center">Carryover</p>
                                    <h6 class="text-center">9/12</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center"></p>
                                    <h6 class="text-center">9/12</h6>
                                    <div class="text-end">
                                        <button class="btn btn-orange px-1 p-0 text-end"><i class="fa fa-users"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="leave-availed-wrapper">
                        <div class="row mb-2">
                            <div class="col-8">
                                <h6>Leave Availed</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 d-flex ">
                                <div class="card left-line w-100">
                                    <div class="card-body">
                                        <p class="text-muted mb-2 fw-bold text-center">Available</p>
                                        <h6 class="text-center">9/12</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex ">
                                <div class="card left-line w-100">
                                    <div class="card-body">
                                        <p class="text-muted mb-2 fw-bold text-center">Accured so far</p>
                                        <h6 class="text-center">9/12</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex ">
                                <div class="card left-line w-100">
                                    <div class="card-body">
                                        <p class="text-muted mb-2 fw-bold text-center">Carryover</p>
                                        <h6 class="text-center">9/12</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex">
                                <div class="card left-line w-100">
                                    <div class="card-body">
                                        <p class="text-muted mb-2 fw-bold text-center"></p>
                                        <h6 class="text-center">9/12</h6>
                                        <div class="text-end">
                                            <button class="btn btn-orange px-1 p-0 text-end"><i class="fa fa-users"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="leave-history">
                <h6 class="mb-2">Leave history</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="right-history-leave">

                        </div>

                        <div id="leaveSettings_table"></div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>


    <script>
        $(document).ready(function() {
            if (document.getElementById("leaveSettings_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'name',
                            name: 'Leave Dates',
                        },

                        {
                            id: 'number',
                            name: 'Leave Type',
                        },

                        {
                            id: 'job_title',
                            name: 'Status',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Requested by',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Action Taken On',
                        },
                        {
                            id: '',
                            name: 'Leave Note',
                        },
                        {
                            id: '',
                            name: 'Actions',
                        },
                    ],
                    data: [
                        // {
                        //     name: 'John',
                        //     email: 'john@example.com',
                        //     phoneNumber: '(353) 01 222 3333'
                        // },
                        // {
                        //     name: 'Mark',
                        //     email: 'mark@gmail.com',
                        //     phoneNumber: '(01) 22 888 4444'
                        // },
                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("leaveSettings_table"));
            }
        });
    </script>
@endsection
