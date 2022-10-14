@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}">
    <script src="{{ URL::asset('assets/js/calendar-vanila.js') }}" defer></script>
    <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">



<style>

</style>


@endsection
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
                        <label class="input-group-text " for="inputGroupSelect01"><i
                                class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
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
                            <button class="btn btn-orange" data-bs-target="#leaveApply_modal" data-bs-toggle="modal">
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
                                            aria-hidden="true" data-bs-toggle="modal"
                                            data-bs-target="#leave_balance-modal"></i></button>
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
                                                aria-hidden="true" data-bs-toggle="modal"
                                                data-bs-target="#leave_availed-modal"></i></button>
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


    <div id="leave_availed-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                        View Employees</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-2 justify-content-between ">
                        <div class="d-flex">
                            <button class="btn btn-orange me-2"><i class="fa fa-filter"
                                    aria-hidden="true"></i></button>
                            <button class="btn btn-border-primary me-2">Employee</button>
                            <button class="btn btn-border-primary me-2">Department</button>
                            <button class="btn btn-border-primary me-2">Location</button>
                            <button class="btn btn-border-primary me-2">Job Title</button>
                            <button class="btn btn-border-primary me-2">Total:20</button>
                            <label for=""></label>
                        </div>

                        <div class="input-group  w-25 me-2">
                            <label class="input-group-text " for="inputGroupSelect01"><i
                                    class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                            <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                <option selected>FY 2022-23</option>

                            </select>
                        </div>
                    </div>
                    <div id="viewEmphistory_table"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="leave_balance-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                        View Employees</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-2 justify-content-between ">
                        <div class="d-flex">
                            <button class="btn btn-orange me-2"><i class="fa fa-filter"
                                    aria-hidden="true"></i></button>
                            <button class="btn btn-border-primary me-2">Employee</button>
                            <button class="btn btn-border-primary me-2">Department</button>
                            <button class="btn btn-border-primary me-2">Location</button>
                            <button class="btn btn-border-primary me-2">Job Title</button>
                            <button class="btn btn-border-primary me-2">Total:20</button>
                            <label for=""></label>
                        </div>

                        <div class="input-group  w-25 me-2">
                            <label class="input-group-text " for="inputGroupSelect01"><i
                                    class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                            <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                <option selected>FY 2022-23</option>

                            </select>
                        </div>
                    </div>
                    <div id="viewEmp_history_balance_table"></div>
                </div>
            </div>
        </div>
    </div>




    <div id="leaveApply_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                        Leave Request</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card top-line mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex col-sm-12 col-md-6 col-xl-4 col-xxl-4 col-lg-4">
                                    <div class="card w-100 left-line">
                                        <div class="card-body">
                                            <p class="text-muted mb-1 fw-bold text-center">Casual Leave</p>
                                            <h6 class="text-center">10<span class="f-12">days</span> </h6>
                                            <div class="alert mb-0 alert-danger py-1 d-flex align-items-center"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <i class="text-warning fw-bold f-10 fa fa-warning me-1">
                                                    </i><span class=" f-10 text-muted "> Lorem ipsum
                                                        dolor sit amet.Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex col-sm-12 col-md-6 col-xl-4 col-xxl-4 col-lg-4">
                                    <div class="card w-100 left-line">
                                        <div class="card-body">
                                            <p class="text-muted mb-1 fw-bold text-center">Sick Leave</p>
                                            <h6 class="text-center">10<span class="f-12">days</span> </h6>
                                            <div class="alert mb-0 alert-danger py-1 d-flex align-items-center"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <i class="text-warning fw-bold f-10 fa fa-warning me-1">
                                                    </i><span class=" f-10 text-muted "> Lorem ipsum
                                                        dolor sit amet.Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex col-sm-12 col-md-6 col-xl-4 col-xxl-4 col-lg-4">
                                    <div class="card w-100 left-line">
                                        <div class="card-body">
                                            <p class="text-muted mb-1 fw-bold text-center">Extend Leave</p>
                                            <h6 class="text-center">10<span class="f-12">days</span> </h6>
                                            <div class="alert mb-0 alert-danger py-1 d-flex align-items-center"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <i class="text-warning fw-bold f-10 fa fa-warning me-1">
                                                    </i><span class=" f-10 text-muted "> Lorem ipsum
                                                        dolor sit amet.Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex col-sm-12 col-md-6 col-xl-4 col-xxl-4 col-lg-4">
                                    <div class="card w-100 left-line">
                                        <div class="card-body">
                                            <p class="text-muted mb-1 fw-bold text-center">Maternity Leave</p>
                                            <h6 class="text-center">10<span class="f-12">days</span> </h6>
                                            <div class="alert mb-0 alert-danger py-1 d-flex align-items-center"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <i class="text-warning fw-bold f-10 fa fa-warning me-1">
                                                    </i><span class=" f-10 text-muted "> Lorem ipsum
                                                        dolor sit amet.Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex col-sm-12 col-md-6 col-xl-4 col-xxl-4 col-lg-4">
                                    <div class="card w-100 left-line">
                                        <div class="card-body">
                                            <p class="text-muted mb-1 fw-bold text-center">Casual Leave</p>
                                            <h6 class="text-center">10<span class="f-12">days</span> </h6>
                                            <div class="alert mb-0 alert-danger py-1 d-flex align-items-center"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <i class="text-warning fw-bold f-10 fa fa-warning me-1">
                                                    </i><span class=" f-10 text-muted "> Lorem ipsum
                                                        dolor sit amet.Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex col-sm-12 col-md-6 col-xl-4 col-xxl-4 col-lg-4">
                                    <div class="card w-100 left-line">
                                        <div class="card-body">
                                            <p class="text-muted mb-1 fw-bold text-center">Casual Leave</p>
                                            <h6 class="text-center">10<span class="f-12">days</span> </h6>
                                            <div class="alert mb-0 alert-danger py-1 d-flex align-items-center"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <i class="text-warning fw-bold f-10 fa fa-warning me-1">
                                                    </i><span class=" f-10 text-muted "> Lorem ipsum
                                                        dolor sit amet.Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.
                                                        Lorem ipsum
                                                        dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card top-line">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 col-sm-12 col-lg-8 col-xxl-8 col-md-12">
                                    <h6 class=" mb-1">Set range</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-4 text-md-start mb-md-0 mb-3">
                                            <label class="fw-bold">Start Date</label>
                                            <input type="date"
                                                class="form-control outline-none border-0 shadow-lite">
                                        </div>
                                        <div class="col-md-4 text-md-center mb-md-0 ">
                                            <p class="fw-bold  text-muted">Total Days</p>
                                            <span class="shadow-lite mt-3">10</span>
                                        </div>
                                        <div class="col-md-4 text-md-end ">
                                            <label class="fw-bold">End Date</label>
                                            <input type="date"
                                                class="form-control outline-none border-0 shadow-lite">
                                        </div>
                                    </div>
                                    <textarea class="w-100 outline-none border-0 shadow-lite form-control" rows="4" style=""></textarea>
                                    <div class="py-2" style="border-bottom: 1px solid #cecece;"></div>
                                    <h6 class="modal-sub-title py-2">Notify to</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-md-0 mb-3">
                                            <div class="profile-wrapper center">
                                                <div class="profile-body">
                                                    <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                        alt="" />
                                                    <div class="profile-details">
                                                        <p>Dillip Kumar</p>
                                                        <h5 class="description">Scottish DJ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4 mb-md-0 mb-3">
                                            <div class="profile-wrapper center">
                                                <div class="profile-body">
                                                    <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                        alt="" />
                                                    <div class="profile-details">
                                                        <p>Dillip Kumar</p>
                                                        <h5 class="description">Scottish DJ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-md-0 mb-3">
                                            <div class="profile-wrapper center">
                                                <div class="profile-body">
                                                    <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                        alt="" />
                                                    <div class="profile-details">
                                                        <p>Dillip Kumar</p>
                                                        <h5 class="description">Scottish DJ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="text-center text-md-end">
                                        <button type="button" class="btn btn-border-primary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Request Leave</button>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 col-lg-4 col-xxl-4 col-md-12  mt-md-3 mt-sm-3">

                                    <div class="calendar-wrapper card mb-4 border-0">
                                        <div class="card-body p-0">
                                            <div class="_wrapper">
                                                <div class="h-100  _container-calendar">
                                                    <div
                                                        class="_button-container-calendar d-flex align-items-center justify-content-between">
                                                        <button id="_previous" onclick="previous()"
                                                            class="previous"><i
                                                                class="fa fa-chevron-left"></i></button>
                                                        <h6 id="_monthAndYear" class="_monthAndYear"></h6>
                                                        <button id="_next" onclick="next()" class="next"><i
                                                                class="fa fa-chevron-right"></i></button>
                                                    </div>
                                                    <table class="_table-calendar" id="_calendar" data-lang="en">


                                                        <thead id="_thead-month"></thead>
                                                        <tbody id="_calendar-body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="leave_det_calendar">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="casual_leave">Casual Leave</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="sick_leave">Sick Leave</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="floater_leave">Floater Leave</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="maternity_leave">Maternity Leave</p>
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
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/calendar.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/calendar.js') }}"></script>

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
        if (document.getElementById("viewEmphistory_table")) {
            const grid = new gridjs.Grid({
                columns: [{
                        id: 'name',
                        name: 'Employee',
                    },

                    {
                        id: 'number',
                        name: 'Department',
                    },

                    {
                        id: 'job_title',
                        name: 'Location',
                    },
                    {
                        id: 'reporting_to',
                        name: 'Job Title',
                    },

                ],
                data: [

                ],
                pagination: {
                    limit: 10
                },
                sort: true,
                search: true,
            }).render(document.getElementById("viewEmphistory_table"));
        }
        if (document.getElementById("viewEmp_history_balance_table")) {
            const grid = new gridjs.Grid({
                columns: [{
                        id: 'name',
                        name: 'Employee',
                    },

                    {
                        id: 'number',
                        name: 'Department',
                    },

                    {
                        id: 'job_title',
                        name: 'Location',
                    },
                    {
                        id: 'reporting_to',
                        name: 'Job Title',
                    },

                ],
                data: [

                ],
                pagination: {
                    limit: 10
                },
                sort: true,
                search: true,
            }).render(document.getElementById("viewEmp_history_balance_table"));
        }
    });
</script>
@endsection
