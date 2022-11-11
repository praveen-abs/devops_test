@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/attendance.css') }}">
@endsection
@section('content')
    <div class="cotainer-fluid mt-30">
        <div class="card mb-3">
            <div class="pt-2 pb-0 card-body">
                <ul class="nav nav-pills nav-tabs-dashed">
                    <li class="nav-item text-muted">
                        <a class="nav-link active" data-bs-toggle="tab" href="#shift_weekly-off">Shift & Weekly
                            Offs</a>
                    </li>
                    <li class="nav-item mx-5 text-muted">
                        <a class="nav-link" data-bs-toggle="tab" href="#shift_allowance">Shift Allowance</a>
                    </li>
                    <li class="nav-item text-muted">
                        <a class="nav-link" data-bs-toggle="tab" href="#assignment">Assignments</a>
                    </li>
                    <li class="nav-item mx-5     text-muted">
                        <a class="nav-link" data-bs-toggle="tab" href="#scheduler">Scheduler</a>
                    </li>
                    <li class="nav-item text-muted">
                        <a class="nav-link" data-bs-toggle="tab" href="#holidays">Holidays</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show fade active" id="leave_balance" role="tabpanel"
                        aria-labelledby="pills-profile-tab">

                        <ul class="nav nav-pills  nav-tabs-dashed">
                            <li class="nav-item  text-muted">
                                <a class="nav-link active" data-bs-toggle="tab" href="#shift_weekly-off">Shift </a>
                            </li>

                            <li class="nav-item  mx-4 text-muted">
                                <a class="nav-link " data-bs-toggle="tab" href="#shift_weekly-off">Weekly Off's </a>
                            </li>
                            <li class="nav-item text-muted">
                                <a class="nav-link " data-bs-toggle="tab" href="#shift_weekly-off">Shifts And Weekly Off
                                    Rules </a>
                            </li>


                        </ul>


                        <div class="row mb-3">
                            <div class="col-6"></div>

                            <div class="col-6 d-flex justify-content-end">
                                <select name="" id=""
                                    class="form-select border-orange me-2 w-50 disabled_focus">
                                    <option value="" selected hidden disabled>Department</option>
                                </select>
                                <button type="button" class="btn btn-orange">
                                    <i class="fa fa-plus-circle"></i>
                                    Add Shifts
                                </button>
                            </div>

                        </div>



                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane show fade active" id="leave_balance" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <h6>General Shift <span
                                                        class="text-muted f-11 me-2">Shif-Code:GS</span><button
                                                        type="button"
                                                        class="fa outline-none border-0 bg-transparent fa-pencil text-orange"
                                                        aria-hidden="true"></button> </h6>
                                            </div>
                                            <div class="col-12">
                                                <ul class="nav nav-pills mb-3 nav-tabs-dashed">
                                                    <li class="nav-item  text-muted">
                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                            href="#summary_table">Summary </a>
                                                    </li>

                                                    <li class="nav-item  mx-4 text-muted">
                                                        <a class="nav-link " data-bs-toggle="tab"
                                                            href="#employees_table">Employees</a>
                                                    </li>



                                                </ul>

                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane show fade active" id="summary_table"
                                                        role="tabpanel" aria-labelledby="pills-profile-tab">

                                                        <div class="track_summary_table" id="track_summary_table"></div>

                                                        <div class="row pb-4 mb-3 border-bottom ">
                                                            <div class="col-4 d-flex align-items-center ">
                                                                <p class="text-primary text-end f-14">Half day minimum
                                                                    working hours required</p>
                                                            </div>
                                                            <div class="col-2 d-flex align-items-center">
                                                                <input type="text"
                                                                    class="text-center me-2   text-muted p-0 w-25 form-control"
                                                                    name="" id="" value="4" disabled>
                                                                <span class="text-muted f-12">hours</span>
                                                            </div>
                                                            <div class="col-4 d-flex align-items-center ">
                                                                <p class="text-primary text-end f-14">Full day minimum
                                                                    working hours required</p>
                                                            </div>
                                                            <div class="col-2 d-flex align-items-center">
                                                                <input type="text"
                                                                    class=" text-center me-2   text-muted p-0 w-25 form-control"
                                                                    name="" id="" value="4"
                                                                    disabled>
                                                                <span class="text-muted f-12">hours</span>
                                                            </div>
                                                        </div>
                                                        <div class="row pb-2 border-bottom ">
                                                            <div class="col-2 d-flex align-items-center ">
                                                                <p class="text-primary  f-14">Grace time</p>
                                                            </div>
                                                            <div class="col-2 d-flex align-items-center">
                                                                <input type="text"
                                                                    class="text-center me-2   text-muted p-0 w-25 form-control"
                                                                    name="" id="" value="30"
                                                                    disabled>
                                                                <span class="text-muted f-12">minutes</span>
                                                            </div>
                                                            <div class="col-8  d-flex align-items-center">
                                                                <div class="card w-100  mb-0">
                                                                    <div class="card-body py-2 ">
                                                                        <p> <i class="fa fa-info-circle me-2 text-info f-15"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, natus.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane " id="employees_table" role="tabpanel"
                                                        aria-labelledby="pills-profile-tab">
                                                        <div class="card">
                                                            <div class="card-body">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            if (document.getElementById("track_summary_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'shift',
                            name: 'Timing',

                        },
                        {
                            id: 'monday',
                            name: 'Monday',
                        },
                        {
                            id: 'tuesday',
                            name: 'Tuesday',
                        },
                        {
                            id: 'wednesday',
                            name: 'Wednesday',
                        },
                        {
                            id: 'thursday',
                            name: 'Thursday',
                        },
                        {
                            id: 'friday',
                            name: 'Friday',
                        },
                        {
                            id: 'saturday',
                            name: 'Saturday',
                        },
                        {
                            id: 'sunday',
                            name: 'Sunday',
                        }


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
                }).render(document.getElementById("track_summary_table"));
            }
        });

        $(document).ready(function() {
            if (document.getElementById("employee_Timng-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'employee name',
                            name: 'Employee',

                        },
                        {
                            id: 'employee_number',
                            name: 'Employee Number',
                        },
                        {
                            id: 'job_title',
                            name: 'Job Title',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Reporting To',
                        },
                        {
                            id: 'department',
                            name: 'Department',
                        },
                        {
                            id: 'location',
                            name: 'Location',
                        }

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
                }).render(document.getElementById("employee_Timng-table"));
            }
        });

        $(document).ready(function() {
            if (document.getElementById("track_Timng-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'currentdate',
                            name: 'Current Date',

                        },
                        {
                            id: 'uploadedate',
                            name: 'Uploaded Date',
                        },
                        {
                            id: 'action_track',
                            name: 'Action',
                        }

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
                }).render(document.getElementById("track_Timng-table"));
            }
        });

        $(document).ready(function() {
            if (document.getElementById("weekly_shift-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'weekoffs',
                            name: 'Week Offs',

                        },
                        {
                            id: 'dayoffs',
                            name: 'Day Offs',
                        }

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
                }).render(document.getElementById("weekly_shift-table"));
            }
        });
    </script>
@endsection
