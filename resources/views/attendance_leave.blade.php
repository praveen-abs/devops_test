@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}">
    <script src="{{ URL::asset('assets/js/calendar-vanila.js') }}" defer></script>
    <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')




    <div class="Leave_dashboard mt-30">

        <div class="card  left-line mb-3">
            <div class="card-body px-2 py-2">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                            <li class="nav-item text-muted" role="presentation">
                                <a class="nav-link active pb-2" data-bs-toggle="tab" href="#leave_balance"
                                    aria-selected="true" role="tab">
                                    Leave Balance</a>
                            </li>
                            @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR', 'Manager']))
                                <li class="nav-item text-muted " role="presentation">
                                    <a class="nav-link pb-2" data-bs-toggle="tab" href="#team_leaveBalance"
                                        aria-selected="false" tabindex="-1" role="tab">
                                        Team Leave Balance</a>
                                </li>
                            @endif

                            @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))
                                <li class="nav-item text-muted " role="presentation">
                                    <a class="nav-link pb-2" data-bs-toggle="tab" href="#org_leave" aria-selected="false"
                                        tabindex="-1" role="tab">
                                        Org Leave Balance</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-3  text-md-end text-center">

                        <div class="input-group   me-2">
                            <label class="input-group-text " for="inputGroupSelect01"><i
                                    class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                            <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                <option selected>FY 2022-23</option>

                            </select>
                        </div>

                    </div>
                    <div class="col-3  text-md-start text-center">
                        <div>

                            <a href="{{ url('leave_policy_explanation') }}" id=""
                                class="nav-link sidebar  btn btn-orange" role="button" aria-expanded="false"><span> Leave
                                    Policy Explanation</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card top-line">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-6 col-md-6 col-lg-6">
                                <h6 class="text-left fw-bold">Leave Balance</h6>
                            </div>
                            <div class="col-6  justify-content-end d-flex">
                                {{-- <div class="pendingLeave_notify me-3">
                                        <button class="btn btn-border-primary " data-bs-target="#leavepending_modal" data-bs-toggle="modal">
                                            Pending
                                        </button>
                                        <span class="badge badge-soft-light rounded-circle fs-13 bg-danger">
                                            0</span>
                                    </div> --}}

                                <button class="btn btn-orange" data-bs-target="#leaveApply_modal" data-bs-toggle="modal">
                                    Apply Leave
                                </button>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-3 col-sm-12 col-xl-4 col-md-4 col-lg-4 d-flex">
                                <div class="card  box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Sick Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-4 col-md-4 col-lg-4 d-flex">
                                <div class="card box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Earned Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-4 col-md-4 col-lg-4 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Casual Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                                <h6 class="text-left fw-bold">Leave Availed</h6>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-4 col-md-4 col-lg-4 d-flex">
                                <div class="card mb-0 box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Sick Leave </p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-4 col-md-4 col-lg-4 d-flex">
                                <div class="card mb-0 box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Earned Leave </p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-4 col-md-4 col-lg-4 d-flex">
                                <div class="card mb-0 box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Casual Leave </p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card mb-0 leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Leave history</h6>

                                <div class="table-responsive">
                                    <div id="emp_leaveHistory"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show " id="team_leaveBalance" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="card top-line">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
                                <h6 class="text-left fw-bold">Team Leave Balance</h6>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card   box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Sick Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Earned Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Casual Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 "> Carryover</p>
                                        <h5 class="mb-0">-</h5>
                                        <div class="text-right">
                                            <button type="button" class="btn px-2 py-0 border_radius_3 btn-orange"
                                                data-bs-toggle="modal" data-bs-target="#earlyTimeArivals_modal">
                                                <i class="fa fa-file-text-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
                                <h6 class="text-left fw-bold">Leave Availed</h6>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card mb-0  box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Sick Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card mb-0 box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Earned Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="cardmb-0 box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Casual Leave</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="cardmb-0 box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 "> Carryover</p>
                                        <h5 class="mb-0">-</h5>
                                        <div class="text-right">
                                            <button type="button" class="btn px-2 py-0 border_radius_3 btn-orange"
                                                data-bs-toggle="modal" data-bs-target="#earlyTimeArivals_modal">
                                                <i class="fa fa-file-text-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card mb-0 leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Team Leave history</h6>

                                <div class="table-responsive">
                                    <div id="team_leaveHistory"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane show " id="org_leave" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row mt-3">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card mb-0 leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Org Leave history</h6>

                                <div class="table-responsive">
                                    <div id="org_leaveHistory"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true"
            style="opacity:1; display:none;background:#00000073;">
            <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true"
                aria-labelledby="">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h6 class="modal-title" id="modalHeader">
                        </h6>
                        {{-- <button type="button" class="btn-close close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal" aria-label="Close">

                            </button> --}}
                        <button type="button"
                            class="close  popUp-close close-modal outline-none bg-transparent border-0 h3"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4">
                            <p class="mb-3 text-muted f-15 text-center" id="modalNot"></p>
                            <textarea name="reject_content" id="leave_reject_content" class="form-control mb-3"></textarea>
                            <div class="text-end">
                                <input type="hidden" id="selected_leaveId" />
                                <input type="hidden" id="selected_userId" />
                                <input type="hidden" id="selected_statusText" />

                                <button type="button" class="btn btn-primary submit_notify"
                                    id="modal_leave_reject">Submit</button>
                                <button type="button" class="btn btn-light  popUp-close close-modal"
                                    id="closeModal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--  --}}


    {{--
        <div class="card top-line ">
            <div class="card-body">
                <div class="leave-balance-wrapper">
                    <div class="row mb-2">
                        <div class="col-8">
                            <h6>Leave Balance</h6>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-4 d-flex ">
                        <div class="card left-line w-100">
                            <div class="card-body">
                                <p class="text-muted mb-2 fw-bold text-center">Available</p>
                                <h6 class="text-center">-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex ">
                        <div class="card left-line w-100">
                            <div class="card-body">
                                <p class="text-muted mb-2 fw-bold text-center">Accured so far</p>
                                <h6 class="text-center">-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex ">
                        <div class="card left-line w-100">
                            <div class="card-body">
                                <p class="text-muted mb-2 fw-bold text-center">Carryover</p>
                                <h6 class="text-center">-</h6>
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
                        <div class="col-4 d-flex ">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center">Available</p>
                                    <h6 class="text-center">-</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex ">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center">Accured so far</p>
                                    <h6 class="text-center">-</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex ">
                            <div class="card left-line w-100">
                                <div class="card-body">
                                    <p class="text-muted mb-2 fw-bold text-center">Carryover</p>
                                    <h6 class="text-center">-</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div> --}}







    {{-- modals --}}


    <div id="leave_availed-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                    </h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-2 justify-content-between ">
                        <div class="d-flex">
                            <button class="btn btn-orange me-2"><i class="fa fa-filter" aria-hidden="true"></i></button>
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
                    <div id="emp_leaveHistory">
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div id="leave_balance-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                    </h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-2 justify-content-between ">
                        <div class="d-flex">
                            <button class="btn btn-orange me-2"><i class="fa fa-filter" aria-hidden="true"></i></button>
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

    <div id="leavepending_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                        Pending Request</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="show_message d-flex justify-content-center align-items-center">
                        <h6 class="text-muted">No Request Pending</h6>
                    </div>
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
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">





                    <!-- MODEL : Request leave -->
                    <div id="modal_request_leave" class="card top-line mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 col-sm-12 col-lg-8 col-xxl-8 col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-6 text-md-start mb-md-0 mb-3">
                                            <h6 class=" mb-1">Set range</h6>
                                        </div>


                                        <div class="col-md-6 text-end mb-md-0 mb-3">
                                            <select name="" id="leave_type_id" class="form-select outline-none">
                                                <option value="" selected hidden disabled>Choose Leave</option>
                                                <option value="1">Sick Leave</option>
                                                <option value="2">LOP Leave</option>
                                                <option value="3">Casual Leave</option>
                                                <option value="4">Compensatory Leave</option>
                                                <option value="5">Flexi day-off Leave</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4 text-md-start mb-md-0 mb-3">
                                            <label class="fw-bold">Start Date</label>
                                            <input type="datetime-local" id="start_date"
                                                class="form-control outline-none border-0 shadow-lite">
                                        </div>
                                        <div class="col-md-4 text-md-center mb-md-0 ">
                                            <p class="fw-bold  text-muted">Total Days</p>
                                            <span class="shadow-lite mt-3">-</span>
                                        </div>
                                        <div class="col-md-4 text-md-end ">
                                            <label class="fw-bold">End Date</label>
                                            <input type="datetime-local" id="end_date"
                                                class="form-control outline-none border-0 shadow-lite">
                                        </div>
                                    </div>
                                    <textarea id="leave_reason" placeholder="Reason here..." class="w-100 outline-none border-0 shadow-lite form-control"
                                        rows="4" style=""></textarea>
                                    <div class="py-2" style="border-bottom: 1px solid #cecece;"></div>
                                    <h6 class="modal-sub-title py-2">Notify to</h6>
                                    <div class="row mb-3">
                                        <div>

                                            <select class="" name="notifications_users_id[]"
                                                id="notifications_users_id" multiple="multiple">
                                                @if (!empty($allEmployeesList))
                                                    @foreach ($allEmployeesList as $employeeData)
                                                        <option value="{{ $employeeData->id }}">
                                                            {{ $employeeData->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Select Employees</option>
                                                @endif
                                            </select>


                                        </div>
                                    </div>
                                    <div class="text-center text-md-end">
                                        <button type="button" class="btn btn-border-primary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" id="btn_request_leave" class="btn btn-primary">Request
                                            Leave</button>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 col-lg-4 col-xxl-4 col-md-12  mt-md-3 mt-sm-3">

                                    <div class="calendar-wrapper card mb-4 border-0">
                                        <div class="card-body p-0">
                                            <div class="_wrapper">
                                                <div class="h-100  _container-calendar">
                                                    <div
                                                        class="_button-container-calendar d-flex align-items-center justify-content-between">
                                                        <button id="_previous" onclick="previous()" class="previous"><i
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


    {{-- <div id="leaveDetails_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                        Leave Request Details</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex profile-wrapper">
                                <div class="profile-img d-flex align-items-center justify-content-center me-3">
                                    <span>GN</span>
                                </div>

                                <div class="content d-flex flex-column align-items-center justify-content-center">
                                    <p class="text-primary fw-bold">Augustin</p>
                                    <p class="text-muted">Requested on Sep 21,2022 </p>
                                </div>


                            </div>


                            <hr class="text-muted p-0">

                            <div class="d-flex ">
                                <div class="date-wrapper shadow-lite d-flex flex-column justify-content-center me-2">

                                    <div class="month text-center bg-primary text-white">
                                        Apr
                                    </div>
                                    <div class="date text-center fw-bold f-14 text-primary ">
                                        22
                                    </div>
                                    <div class="day text-center f-12 fw-bold text-muted ">

                                        Fri
                                    </div>

                                </div>
                                <div class="content-det">
                                    <h6>1 Day Sick Leave</h6>
                                    <p>Leave Ended 40 days ago</p>
                                    <p>No teammates are no leave on this day</p>
                                </div>
                            </div>

                            <hr class="text-muted p-0">
                            <h6 class="modal-sub-title py-2">Notify to</h6>
                            <div class="row mb-3">
                                <div class="col-6 mb-md-0 mb-3">
                                    <div class="profile-wrapper center">
                                        <div class="profile-body">
                                            <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" />
                                            <div class="profile-details">
                                                <p>Dillip Kumar</p>
                                                <h5 class="description">Designation</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-md-0 mb-3">
                                    <div class="profile-wrapper center">
                                        <div class="profile-body">
                                            <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" />
                                            <div class="profile-details">
                                                <p>Praveen</p>
                                                <h5 class="description">Designation</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="text-muted p-0">
                            <h6 class="modal-sub-title py-2">Approved by</h6>
                            <div class="row mb-3">
                                <div class="col-6 mb-md-0 mb-3">
                                    <div class="profile-wrapper center">
                                        <div class="profile-body">
                                            <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" />
                                            <div class="profile-details">
                                                <p>Dillip Kumar</p>
                                                <h5 class="description">Designation</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted p-0">
                            <h6 class="modal-sub-title py-2">Approved by</h6>
                            <div class="row mb-3">
                                <div class="col-12 mb-md-0 mb-3">
                                    <textarea placeholder="Add Comment" class="form-control outline-none border-0 shadow-lite" name=""
                                        id="" cols="30" rows="3"></textarea>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 mb-md-0 mb-3 text-end">
                                    <button class="btn btn-orange">Post</button>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}


    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/calendar.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/calendar.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var leavetypes_array = <?php echo json_encode(getAllLeaveTypes()); ?>;
        var employeesList_array = <?php echo json_encode($allEmployeesList); ?>;

        //grid table vars
        var gridTable_emp_leaveHistory = "";
        var gridTable_team_leaveHistory = "";
        var gridTable_org_leaveHistory = "";


        $(document).ready(function() {
            $('#notifications_users_id').select2({
                dropdownParent: $("#modal_request_leave"),
                width: '100%'
            });

            // $(document).on('#select-reviewer:open', () => {
            //         $('.select2-search__field').focus();
            //     });

            $('#btn_request_leave').on('click', function(e) {
                console.log("Selected Button : " + $(this).attr('name'));

                $.ajax({
                    url: "{{ url('attendance-applyleave') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'user_id': $('#leave_type_id').val(),
                        'start_date': $('#start_date').val(),
                        'end_date': $('#end_date').val(),
                        'leave_reason': $('#leave_reason').val(),
                        'leave_type_id': $('#leave_type_id').val(),
                        'notifications_users_id': $('#notifications_users_id').val(),
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            console.log("Leave requested successfully");
                            swal({
                                    title: data.message,
                                    text: data.mail_status,
                                    type: "success"
                                }).then(function() {
                                    location.reload();
                                });
                            //alert(data.message + " \n " + data.mail_status);
                        } else {
                            alert("Leave request failed. Contact your Admin");
                        }

                        //Update all the gridjs tables
                        gridTable_emp_leaveHistory.updateConfig({}).forceRender();
                        gridTable_team_leaveHistory.updateConfig({}).forceRender();
                        gridTable_org_leaveHistory.updateConfig({}).forceRender();
                    },
                    error: function(data) {


                    }
                });
            });

            function processLeaveApproveReject(leave_id, user_id, t_statusText, t_leave_rejection_text) {
                $.ajax({
                    url: "{{ url('attendance-approve-rejectleave') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'user_id': user_id,
                        'leave_id': leave_id,
                        'status': t_statusText,
                        'leave_rejection_text': t_leave_rejection_text,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            alert(data.message + " \n ");
                            // location.reload();
                        } else {
                            alert("Leave request failed. Contact your Admin");
                        }

                        //Update all the gridjs tables
                        gridTable_emp_leaveHistory.updateConfig({}).forceRender();
                        gridTable_team_leaveHistory.updateConfig({}).forceRender();
                        gridTable_org_leaveHistory.updateConfig({}).forceRender();

                    },
                    error: function(data) {


                    }
                });

            }

            $(document).on('click', '.reject-leave-btn', function(e) {
                var leaveId = $(this).data('leave_id');
                var userId = $(this).data('user_id');
                var statusText = $(this).data('leave_status');

                $('#selected_leaveId').val(leaveId);
                $('#selected_userId').val(userId);
                $('#selected_statusText').val(statusText);

                $('#modalHeader').html("Rejected");
                $('#modalNot').html(
                    "Are you sure you want to reject leave. If yes, please entered the reason in the below command box:"
                );
                $('#notificationModal').show();
                $('#notificationModal').removeClass('fade');

            });


            $('.popUp-close').click(function() {
                $('#notificationModal').fadeOut(400);
            })




            $('#modal_leave_reject').on('click', function(e) {

                processLeaveApproveReject(
                    $('#selected_leaveId').val(),
                    $('#selected_userId').val(),
                    $('#selected_statusText').val(),
                    $('#leave_reject_content').val()
                );
            });

            $(document).on('click', '.approve-leave-btn', function(e) {
                console.log("Approve button clicked");
                var leaveId = $(this).data('leave_id');
                var userId = $(this).data('user_id');
                var statusText = $(this).data('leave_status');

                processLeaveApproveReject(leaveId, userId, statusText, '');
            });






            /// GRID JS code start ///
            //TODO  :  Need to hide these code execution based on currentuser roles.


            if (document.getElementById("emp_leaveHistory")) {
                gridTable_emp_leaveHistory = new gridjs.Grid({
                    columns: [

                        {
                            id: 'user_id',
                            name: 'User Id',
                            hidden: true,
                            formatter: function formatter(cell) {
                                return gridjs.html(cell);
                            }
                        },
                        {
                            id: 'leave_type_id',
                            name: 'Leave Type',
                            formatter: function formatter(cell) {

                                for (var i = 0; i < leavetypes_array.length; i++) {
                                    if (leavetypes_array[i].id == cell)
                                        return gridjs.html(leavetypes_array[i].leave_type);
                                }
                            }
                        },
                        {
                            id: 'start_date',
                            name: 'Start Date',
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                        },

                        {
                            id: 'leave_reason',
                            name: 'Leave Reason',
                        },
                        {
                            id: 'reviewer_user_id',
                            name: 'Approver Name',
                            formatter: function formatter(cell) {

                                for (var i = 0; i < employeesList_array.length; i++) {
                                    if (employeesList_array[i].id == cell)
                                        return gridjs.html(employeesList_array[i].name);
                                }
                            }
                        },
                        {
                            id: 'reviewer_comments',
                            name: 'Approver Comments',
                        },
                        {
                            id: 'status',
                            name: 'Status',
                            //     formatter: (cell, row) => {
                            //         return h('button', {
                            //             className: 'py-2 mb-4 px-4 border rounded-md text-white bg-blue-600',
                            //             onClick: () => alert(
                            //                 `Editing "${row.cells[0].data}" "${row.cells[1].data}"`
                            //                 )
                            //         }, 'Edit');

                            // },
                        },
                        {
                            id: 'actions',
                            name: 'Action',
                            formatter: function formatter(emp) {
                                var htmlcontent = "";

                                // if (leave_history.status == "Pending")
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" onclick="activateEmployee(this)" id="button_activate_"' +
                                //     emp.user_id + '" data-user_id="' + emp.user_id +
                                //     '" class="status btn btn-orange py-1 onboard-employee-btn "></input>';
                                // else
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" class="status btn btn-orange py-1 onboard-employee-btn disabled"></input>';
                                // <button class="btn btn-orange" data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">
                                //       <i class="fa  fa-sticky-note-o"></i>
                                //     </button>

                                htmlcontent =
                                    '<input type="button" value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal" disabled></input>';

                                return gridjs.html(htmlcontent);
                            }
                        },
                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetch-leaverequests', ['type' => 'employee','statusArray' => 'Approved,Rejected' ]) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                // leave_history.user_id,
                                //leave_history,
                                leave_history.leave_type_id,
                                leave_history.start_date,
                                leave_history.end_date,
                                leave_history.leave_reason,
                                leave_history.reviewer_user_id,
                                //leave_history.notifications_users_id,
                                leave_history.reviewer_comments,
                                leave_history.status,
                                leave_history,

                            ]
                        )
                    }
                }).render(document.getElementById("emp_leaveHistory"));
            }

            if (document.getElementById("team_leaveHistory")) {
                gridTable_team_leaveHistory = new gridjs.Grid({
                    columns: [

                        {
                            id: 'id',
                            name: 'ID',
                            hidden: true,
                            formatter: function formatter(cell) {

                                return gridjs.html(cell);
                            }
                        },
                        {
                            id: 'employee_name',
                            name: 'Employee Name',
                            formatter: function formatter(leaveHistoryObj) {
                                var output = "";

                                if(leaveHistoryObj.employee_avatar.type == "shortname"){

                                    output ='<div class="col-auto p-0">'+
                                                '<span class="rounded-circle user-profile  ml-2 " id="">'+
                                                    '<i class="topbar_username" class="align-middle ">'+leaveHistoryObj.employee_avatar.data+'</i>'+
                                                '</span>'+
                                                '<span>&nbsp;&nbsp;'+leaveHistoryObj.employee_name+'</span>'+
                                            '</div>';
                                }
                                else
                                if(leaveHistoryObj.employee_avatar.type == "avatar"){
                                    var imageURL = "images/"+leaveHistoryObj.employee_avatar.data;

                                    output ='<div class="col-auto p-0">'+
                                                '<img class="rounded-circle header-profile-user" src="'+imageURL+'" alt="--">'+
                                                '<span>&nbsp;&nbsp;'+leaveHistoryObj.employee_name+'</span>'+
                                            '</div>';
                                }

                                return gridjs.html(output);
                            }
                        },
                        {
                            id: 'leave_type_id',
                            name: 'Leave Type',
                            formatter: function formatter(cell) {

                                for (var i = 0; i < leavetypes_array.length; i++) {
                                    if (leavetypes_array[i].id == cell)
                                        return gridjs.html(leavetypes_array[i].leave_type);
                                }
                            }
                        },
                        {
                            id: 'start_date',
                            name: 'Start Date',
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                        },

                        {
                            id: 'leave_reason',
                            name: 'Leave Reason',
                        },
                        {
                            id: 'reviewer_user_id',
                            name: 'Approver Name',
                            formatter: function formatter(cell) {

                                for (var i = 0; i < employeesList_array.length; i++) {
                                    if (employeesList_array[i].id == cell)
                                        return gridjs.html(employeesList_array[i].name);
                                }
                            }
                        },
                        {
                            id: 'reviewer_comments',
                            name: 'Approver Comments',
                        },
                        {
                            id: 'status',
                            name: 'Status',
                            //     formatter: (cell, row) => {
                            //         return h('button', {
                            //             className: 'py-2 mb-4 px-4 border rounded-md text-white bg-blue-600',
                            //             onClick: () => alert(
                            //                 `Editing "${row.cells[0].data}" "${row.cells[1].data}"`
                            //                 )
                            //         }, 'Edit');

                            // },
                        },
                        {
                            id: 'actions',
                            name: 'Action',
                            formatter: function formatter(emp) {
                                var htmlcontent = "";

                                var htmlcontent = "";
                                //console.log(emp);
                                if (emp.status == "Pending") {
                                    htmlcontent =
                                        '<input type="button" value="Approve" data-user_id="' + emp
                                        .user_id +
                                        '" data-leave_id="' + emp.id +
                                        '" data-leave_status="Approved" class="status btn btn-success text-center py-1 approve-leave-btn"></input>';

                                    htmlcontent = htmlcontent +
                                        '&nbsp;&nbsp;<input type="button" value="Reject" id="button_activate_"' +
                                        emp.user_id + '" data-user_id="' + emp.user_id +
                                        '" data-leave_id="' + emp.id +
                                        '" data-leave_status="Rejected" class="status text-center btn btn-danger py-1 reject-leave-btn "></input>&nbsp;&nbsp;';
                                }

                                // if (leave_history.status == "Pending")
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" onclick="activateEmployee(this)" id="button_activate_"' +
                                //     emp.user_id + '" data-user_id="' + emp.user_id +
                                //     '" class="status btn btn-orange py-1 onboard-employee-btn "></input>';
                                // else
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" class="status btn btn-orange py-1 onboard-employee-btn disabled"></input>';
                                // <button class="btn btn-orange" data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">
                                //       <i class="fa  fa-sticky-note-o"></i>
                                //     </button>

                                htmlcontent = htmlcontent +
                                    '<input type="button" value="View" class="status text-center btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal"></input>';


                                return gridjs.html(htmlcontent);

                            }
                        },
                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetch-leaverequests',  ['type' => 'team','statusArray' => 'Approved,Rejected' ]) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                leave_history,
                                leave_history.leave_type_id,
                                leave_history.start_date,
                                leave_history.end_date,
                                leave_history.leave_reason,
                                leave_history.reviewer_user_id,
                                //leave_history.notifications_users_id,
                                leave_history.reviewer_comments,
                                leave_history.status,
                                leave_history,

                            ]
                        )
                    }
                }).render(document.getElementById("team_leaveHistory"));
            }

            if (document.getElementById("org_leaveHistory")) {
                gridTable_org_leaveHistory = new gridjs.Grid({
                    columns: [


                        {
                            id: 'id',
                            name: 'ID',
                            hidden: true,
                            formatter: function formatter(cell) {

                                return gridjs.html(cell);
                            }
                        },
                        {
                            id: 'employee_name',
                            name: 'Employee Name',
                            formatter: function formatter(leaveHistoryObj) {

                                var output = "";

                                if(leaveHistoryObj.employee_avatar.type == "shortname"){

                                    output ='<div class="col-auto p-0">'+
                                                '<span class="rounded-circle user-profile  ml-2 " id="">'+
                                                    '<i class="topbar_username" class="align-middle ">'+leaveHistoryObj.employee_avatar.data+'</i>'+
                                                '</span>'+
                                                '<span>&nbsp;&nbsp;'+leaveHistoryObj.employee_name+'</span>'+
                                            '</div>';
                                }
                                else
                                if(leaveHistoryObj.employee_avatar.type == "avatar"){
                                    var imageURL = "images/"+leaveHistoryObj.employee_avatar.data;

                                    output ='<div class="col-auto p-0">'+
                                            '<img class="rounded-circle header-profile-user" src="'+imageURL+'" alt="--">'+
                                            '<span>&nbsp;&nbsp;'+leaveHistoryObj.employee_name+'</span>'+
                                        '</div>';
                                }

                                return gridjs.html(output);
                            }
                        },
                        {
                            id: 'leave_type_id',
                            name: 'Leave Type',
                            formatter: function formatter(cell) {

                                for (var i = 0; i < leavetypes_array.length; i++) {
                                    if (leavetypes_array[i].id == cell)
                                        return gridjs.html(leavetypes_array[i].leave_type);
                                }
                            }
                        },
                        {
                            id: 'start_date',
                            name: 'Start Date',
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                        },

                        {
                            id: 'leave_reason',
                            name: 'Leave Reason',
                        },
                        {
                            id: 'reviewer_user_id',
                            name: 'Approver Name',
                            formatter: function formatter(cell) {

                                for (var i = 0; i < employeesList_array.length; i++) {
                                    if (employeesList_array[i].id == cell)
                                        return gridjs.html(employeesList_array[i].name);
                                }
                            }
                        },
                        {
                            id: 'reviewer_comments',
                            name: 'Approver Comments',
                        },
                        {
                            id: 'status',
                            name: 'Status',
                            //     formatter: (cell, row) => {
                            //         return h('button', {
                            //             className: 'py-2 mb-4 px-4 border rounded-md text-white bg-blue-600',
                            //             onClick: () => alert(
                            //                 `Editing "${row.cells[0].data}" "${row.cells[1].data}"`
                            //                 )
                            //         }, 'Edit');

                            // },
                        },
                        {
                            id: 'actions',
                            name: 'Action',
                            formatter: function formatter(emp) {
                                var htmlcontent = "";

                                // if (leave_history.status == "Pending")
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" onclick="activateEmployee(this)" id="button_activate_"' +
                                //     emp.user_id + '" data-user_id="' + emp.user_id +
                                //     '" class="status btn btn-orange py-1 onboard-employee-btn "></input>';
                                // else
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" class="status btn btn-orange py-1 onboard-employee-btn disabled"></input>';
                                // <button class="btn btn-orange" data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">
                                //       <i class="fa  fa-sticky-note-o"></i>
                                //     </button>

                                htmlcontent =
                                    '<input type="button" value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal" disabled></input>';

                                return gridjs.html(htmlcontent);
                            }
                        },
                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetch-leaverequests',  ['type' => 'org','statusArray' => 'Approved,Rejected' ]) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                leave_history,
                                leave_history.leave_type_id,
                                leave_history.start_date,
                                leave_history.end_date,
                                leave_history.leave_reason,
                                leave_history.reviewer_user_id,
                                //leave_history.notifications_users_id,
                                leave_history.reviewer_comments,
                                leave_history.status,
                                leave_history,

                            ]
                        )
                    }
                }).render(document.getElementById("org_leaveHistory"));
            }
        });
    </script>
@endsection
