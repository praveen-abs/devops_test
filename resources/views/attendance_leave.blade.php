@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="Leave_dashboard mt-30">
        <div class="pt-1 pb-0 mb-3 tw-card left-line">
            <div class="flex justify-between">

                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#leave_balance" aria-selected="true"
                            role="tab">
                            Leave Balance</a>
                    </li>
                    @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR', 'Manager']))
                        <li class="nav-item text-muted " role="presentation">
                            <a class="pb-2 mx-4 nav-link" data-bs-toggle="tab" href="#team_leaveBalance"
                                aria-selected="false" tabindex="-1" role="tab">
                                Team Leave Balance</a>
                        </li>
                    @endif

                    @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))
                        <li class="nav-item text-muted " role="presentation">
                            <a class="pb-2 nav-link" data-bs-toggle="tab" href="#org_leave" aria-selected="false"
                                tabindex="-1" role="tab">
                                Org Leave Balance</a>
                        </li>
                    @endif
                </ul>

                <div class="flex items-center">
                    <div class="mr-3 ">
                        <div class="input-group me-2">
                            <label class="input-group-text " for="inputGroupSelect01"><i
                                    class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                            <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                {{-- @foreach ($available_time_frames as $key => $value)
                                    <option value={{ $key }}> {{ $value }} </option>
                                @endforeach --}}
                                <option>{{ $time_frame }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="">
                        <a href="{{ route('attendance-leave-policydocument') }}" id="" class=" btn btn-orange"
                            role="button" aria-expanded="false">
                            Leave
                            Policy Explanation
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="mb-3 tw-card">
                    <div class="mb-2 row">
                        <div class="col-sm-6 col-xl-6 col-md-6 col-lg-6">
                            <h6 class="text-lg font-semibold text-gray-900 modal-title">Leave Balance</h6>
                        </div>
                        <div class="col-6 justify-content-end d-flex">
                            {{-- <div class="pendingLeave_notify me-3">
                                        <button class="btn btn-border-primary " data-bs-target="#leavepending_modal" data-bs-toggle="modal">
                                            Pending
                                        </button>
                                        <span class="badge badge-soft-light rounded-circle fs-13 bg-danger">
                                            0</span>
                                    </div> --}}
                            @vite('resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.js')
                            <div id="vjs_leaveapply"> </div>


                        </div>
                    </div>
                    {{-- <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 xl:grid-cols-3"> --}}

                    <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
                        style="display: grid;">
                        @foreach ($leave_balance_details['Leave Balance'] as $key => $value)
                            <div class="tw-card dynamic-card ">
                                <div class="text-center">
                                    <p class="mb-2 text-base font-semibold ">{{ $key }}</p>
                                    <h6 class="mb-0 text-sm font-semibold">
                                        {{ $value }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tw-card ">
                    {{-- </div> --}}

                    <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Leave Availed</h6>
                    <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
                        style="display: grid;">
                        @foreach ($leave_balance_details['Avalied Leaves'] as $Leave_type => $balance)
                            <div class="bg-indigo-100 border-l-4 border-indigo-300 tw-card ">
                                <div class="text-center">
                                    <p class="mb-2 text-base font-semibold ">{{ $Leave_type }}</p>
                                    <h6 class="mb-0 text-base font-semibold">
                                        {{ $balance }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="mt-3 row">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="mb-0 card leave-history">
                            <div class="card-body">
                                <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Leave history</h6>

                                <div class="table-responsive">
                                    <div id="emp_leaveHistory" class="custom_gridJs"></div>
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
                                <h6 class="my-2 text-left fw-bold">Team Leave Balance</h6>
                            </div>
                            @vite('resources/js/hrms/modules/leave_module/team_leave_module/TeamLeaveBalance.js')
                            <div id="vjs_TeamLeaveTable_RemainingLeave"></div>
                        </div>

                    </div>

                </div>
                <div class="mt-3 row">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="mb-0 card leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Team Leave history</h6>

                                <div class="table-responsive">
                                    <div id="team_leaveHistory" class="custom_gridJs"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane show " id="org_leave" role="tabpanel" aria-labelledby="pills-profile-tab">
            
                <div class="mt-3 row">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="mb-0 card leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Org Leave Balance</h6>
                                @vite('resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveBalance.js')
                                <div id="vjs_orgLeaveTable_RemainingLeave"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="mb-0 card leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Org Leave history</h6>
                                @vite('resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveHistoryTable.js')
                                <div id="vjs_orgLeaveHistoryTable"></div>
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
                    <div class="border-0 modal-header">
                        <h6 class="modal-title" id="modalHeader">
                        </h6>
                        {{-- <button type="button" class="bg-transparent border-0 outline-none btn-close close h3" data-bs-dismiss="modal" aria-label="Close">

                            </button> --}}
                        <button type="button"
                            class="bg-transparent border-0 outline-none close popUp-close close-modal h3"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4">
                            <p class="mb-3 text-center text-muted f-15" id="modalNot"></p>
                            <textarea name="reject_content" id="leave_reject_content" class="mb-3 form-control"></textarea>
                            <div class="text-end">
                                <input type="hidden" id="selected_leaveId" />
                                <input type="hidden" id="selected_userId" />
                                <input type="hidden" id="selected_statusText" />

                                <button type="button" class="btn btn-primary submit_notify"
                                    id="modal_leave_reject">Submit</button>
                                <button type="button" class="btn btn-light popUp-close close-modal"
                                    id="closeModal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="leave_availed-modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content top-line">
                    <div class="py-2 border-0 modal-header new-role-header d-flex align-items-center">
                        <h6 class="mb-1 modal-title text-primary" style="border-bottom:5px solid #d0d4e2;">
                        </h6>
                        <button type="button" class="bg-transparent border-0 outline-none close h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2 d-flex justify-content-between ">
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

                            <div class="input-group w-25 me-2">
                                <label class="input-group-text " for="inputGroupSelect01"><i
                                        class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                                <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                    <option selected>{{ $time_frame }}</option>

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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content top-line">
                    <div class="py-2 border-0 modal-header new-role-header d-flex align-items-center">
                        <h6 class="mb-1 modal-title text-primary" style="border-bottom:5px solid #d0d4e2;">
                        </h6>
                        <button type="button" class="bg-transparent border-0 outline-none close h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2 d-flex justify-content-between ">
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

                            <div class="input-group w-25 me-2">
                                <label class="input-group-text " for="inputGroupSelect01"><i
                                        class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                                <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                    <option selected>FY 2022-23</option>

                                </select>
                            </div>
                        </div>
                        <div id="viewEmp_history_balance_table" class="custom_gridJs"></div>


                    </div>
                </div>
            </div>
        </div>

        <div id="leavepending_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content top-line">
                    <div class="py-2 border-0 modal-header new-role-header d-flex align-items-center">
                        <h6 class="mb-1 modal-title text-primary" style="border-bottom:5px solid #d0d4e2;">
                            Pending Request</h6>
                        <button type="button" class="bg-transparent border-0 outline-none close h3"
                            data-bs-dismiss="modal" aria-label="Close">
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

        <div id="error_notify" class="modal custom-modal fade" role="dialog" aria-hidden="true"
            style="opacity:1; display:none;background:#00000073;">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content top-line">
                    <div class="py-2 border-0 modal-header new-role-header d-flex align-items-center">
                        <h6 class="mb-1 modal-title text-primary" id="errors_header"
                            style="border-bottom:5px solid #d0d4e2;">
                        </h6>
                        <button type="button" class="bg-transparent border-0 outline-none close close-modal h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="errors-body" id="errors_body">

                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-light close-modal"
                                data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div id="leaveDetails_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content top-line">
                    <div class="py-2 border-0 modal-header new-role-header d-flex align-items-center">
                        <h6 class="mb-1 modal-title text-primary">
                            Leave Request Details</h6>
                        <button type="button" class="bg-transparent border-0 outline-none close h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="pb-3 mb-2 row border-bottom align-items-center">
                                    <div class="col-auto">
                                        <div id="" class="show_img">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-primary f-15 fw-bold" id="employee_name"></p>
                                        <p class="text-muted f-13 ">Requsted on <span id="leaveRequested_date"></span></p>

                                    </div>
                                </div>
                                <div class="pb-3 mb-2 d-flex border-bottom ">
                                    <div class="mb-2 text-center rounded date-wrapper shadow-lite me-2 border-bottom"
                                        style="width:75px">
                                        <p class="py-1 text-center text-white rounded bg-primary" id="leave_start_month">
                                        </p>
                                        <p id="leave_start_date"> </p>
                                        <p id="leave_start_day"> </p>
                                        {{-- <p id="reviewer_comments"></p> --}}
                                    </div>

                                    <div class="mb-2 text-center rounded date-wrapper shadow-lite me-2 border-bottom"
                                        style="width:75px" id="div_leave_end_date">
                                        <p class="py-1 text-center text-white rounded bg-primary" id="leave_end_month">
                                        </p>
                                        <p id="leave_end_date"> </p>
                                        <p id="leave_end_day"> </p>
                                        {{-- <p id="reviewer_comments"></p> --}}
                                    </div>

                                    <div class="content-det">
                                        <p><span id="totalLeave_days"></span> Day(s) of <span id="leave_type"></span></p>
                                    </div>
                                </div>

                                <div class="content-det">
                                    <p id="">
                                    <h6 id="reviewercomments"></h6>
                                    <h6><span id="reviewercomments"></span></h6>
                                    </p>

                                </div>
                                <div class="content-det">
                                    <p id="">
                                    <h6 id="leavereason"></h6>
                                    <h6><span id="leavereason"></span></h6>
                                    </p>

                                </div>
                            </div>


                            <div class="pb-3 mb-2 ml-4 row border-bottom align-items-center">
                                <div class="col-12">
                                    <h6 class=" f-15 fw-bold">Notify to</h6>
                                </div>
                                <div class="mb-3 col-4 col-sm-12 col-lg-6 col-md-6 col-xxl-4 col-xl-4 mb-md-0">
                                    <div class="mb-0 card mb-sm-3 mb-xxl-0 mb-xl-0">
                                        <div class="px-2 py-1 card-body align-items-center d-flex">
                                            {{-- <img class="float-right rounded-circle img-md"
                                                src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" /> --}}
                                            <div id="" class="show_img">
                                            </div>
                                            <div class="profile-details">
                                                <h5 p id="notifyUser_name"> </h5>
                                                <div class="description" id="notifyUser_designation"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="pb-3 mb-2 ml-4 row border-bottom">
                                <div class="col-12">
                                    <h6 class="">Approved by</h6>
                                </div>
                                <div class="mb-3 col-4 col-sm-12 col-lg-6 col-md-6 col-xxl-4 col-xl-4 mb-md-0">
                                    <div class="mb-0 card mb-sm-3 mb-xxl-0 mb-xl-0">
                                        <div class="px-2 py-1 card-body align-items-center d-flex">
                                            <div id="" class="show_img">
                                            </div>

                                            {{-- <img class="float-right rounded-circle img-md"
                                                src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" /> --}}
                                            <div class="profile-details">
                                                <h5 p id="approver_name"></h5>
                                                <div class="description" id="approver_desgination"></div>
                                                <div class="description">on <span id="reviewed_date"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="ml-4 row">
                                <div class="col-12">
                                    <h6 class="">Reason</h6>
                                </div>
                                <div class="mb-3 col-9 mb-md-0">
                                    <textarea readonly class="mb-2 border-0 outline-none form-control shadow-lite" name=""
                                        id="textarea_leavecomments" cols="30" rows="3"></textarea>
                                </div>
                                <div class="mb-3 col-12 mb-md-0 text-end">
                                    <button class="mx-4 btn btn-orange" data-leave-id=""
                                        id="btn_withdraw">Withdraw</button>
                                </div>

                                <div class="mb-3 col-12 mb-md-0 text-end">
                                    <button class="btn btn-orange" data-leave-id="" id="btn_revoke">Revoke</button>
                                </div>

                                <div class="mb-3 col-12 mb-md-0 text-end">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @vite('resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.js')
    </div>



    <!-- <div class="modal fade bd-example-modal-xl" tabindex="-10" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true " id="leaveApply_modal" >
                                                                                                                                                                                                      <div class="modal-dialog modal-xl modal-dialog-centered" style="z-index:-20 !important">
                                                                                                                                                                                                         <div class="modal-content">

                                                                                                                                                                                                      </div>
                                                                                                                                                                                                    </div> -->




    <!-- <div id="leaveApply_modal" class="modal custom-modal fade" role="dialog">


                                                                                                                                                                                                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                                                                                                                                                                                <div id="vjs_leaveapply">

                                                                                                                                                                                                    </div>




                                                                                                                                                                                                                </div>
                                                                                                                                                                                                        </div> -->

    {{-- error message details --}}
@endsection
@section('script')
    {{-- @vite(['resources/js/hrms/modules/leave_module/OrgLeaveBalance.js']) --}}
    <script>
        var leavetypes_array = <?php echo json_encode(getAllLeaveTypes()); ?>;
        const permissionTypeIds = {{ json_encode(getPermissionLeaveTypeIDs()) }};

        // permissionTypeIds = permissionTypeIds.split(',');
        console.log("Permission Leave IDs /length: " + permissionTypeIds + " : " + permissionTypeIds.length);

        var employeesList_array = <?php echo json_encode($allEmployeesList); ?>;

        //grid table vars
        var gridTable_emp_leaveHistory = "";
        var gridTable_team_leaveHistory = "";
        var gridTable_org_leaveHistory = "";

        //leave dates
        var leave_start_date = '';
        var leave_end_date = '';




        $('.close-modal').on('click', function() {
            $('#error_notify').fadeOut(100);

        });
        $('#btn_withdraw').on('click', function() {
            leave_id = $('#btn_withdraw').attr("data-leave-id");
            console.log("Withdrawing leave.... " + leave_id);

            $.ajax({
                url: "{{ route('withdrawLeave') }}",
                type: "GET",
                dataType: "json",
                data: {
                    'leave_id': $('#btn_withdraw').attr("data-leave-id"),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (data.status == "success") {
                        console.log("Leave withdraw successfully");
                        Swal.fire({
                            title: data.message,
                            text: data.mail_status,
                            type: "success"
                        }).then(function() {
                            location.reload();
                        });
                        //alert(data.message + " \n " + data.mail_status);
                    } else {
                        Swal.fire({
                            title: data.message,
                            text: data.mail_status,
                            type: data.failure
                        }).then(function() {
                            // location.reload();
                        });
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


        // For Revoking Leave

        $('#btn_revoke').on('click', function() {
            leave_id = $('#btn_revoke').attr("data-leave-id");
            console.log("Revoking leave.... " + leave_id);
            var status = "Revoked";
            $.ajax({
                url: "{{ route('processLeaveRequest') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'leave_id': $('#btn_revoke').attr("data-leave-id"),
                    'status': status,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (data.status == "success") {
                        console.log("Leave Revoked successfully");
                        Swal.fire({
                            title: data.message,
                            text: data.mail_status,
                            type: "success"
                        }).then(function() {
                            location.reload();
                        });
                        //alert(data.message + " \n " + data.mail_status);
                    } else {
                        Swal.fire({
                            title: data.message,
                            text: data.mail_status,
                            type: data.failure
                        }).then(function() {
                            // location.reload();
                        });
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


        function resetLeaveModalValues() {

            //Reset leave dropdown
            $('#leave_type_id').prop('selectedIndex', 0);

            leave_start_date = '';
            leave_end_date = '';
            //let currentDate = new Date().toJSON().slice(0,8)+'01'; //Restricting for current date
            let currentDate = new Date().toJSON().slice(0, 8) + '01'; //Restricting for current month

            $('#start_date').attr('type', 'datetime-local');
            $('#start_date').attr("min", currentDate + "T09:00:00");
            console.log("Current Date : " + currentDate);

            $('#start_date').val('');

            $('#end_date').attr('type', 'datetime-local');
            $('#end_date').val('');
            $('#leave_reason').val('');
            $('#total_leave_days').val('0');
            $('#total_permission_hours').val('0');

            $('#div_totalhours').hide();


        }

        $(document).ready(function() {
            $('#notifications_users_id').select2({
                dropdownParent: $("#modal_request_leave"),
                width: '100%'
            });


            //When start_date is chosen, then restrict end_date
            $('#start_date').change(function() {
                //let selectedStartDate = $('#start_date').attr("min",currentDate+"T09:00:00");
                //let currentDate = new Date().toJSON().slice(0,10);

                let selectedLeaveTypeID = $('#leave_type_id').find(":selected").val();

                if (permissionTypeIds.includes(parseInt(selectedLeaveTypeID))) {
                    let endDate_time = new Date($('#start_date').val());
                    endDate_time.setHours(endDate_time.getHours() + 1); //add one hour to start date
                    endDate_time = moment(endDate_time).format('YYYY-MM-DDTHH:mm');
                    // console.log("Enddate_time : "+endDate_time);

                    $('#end_date').attr("min", endDate_time);
                    $('#end_date').attr("max", endDate_time);
                    $('#end_date').val(endDate_time);

                    $('#total_permission_hours').html(1);
                } else {
                    $('#end_date').attr("min", $('#start_date').val());
                    $('#end_date').val($('#start_date').val());

                    $('#total_leave_days').html(1); // Set one day as default
                }

                console.log("Start Date selected : " + $('#start_date').val());

            });

            //When Leave dates are changed
            $('#end_date').change(function() {

                let selectedLeaveTypeID = $('#leave_type_id').find(":selected").val();

                //Get the date values
                let leave_start_date = moment($('#start_date').val());
                let leave_end_date = moment($(this).val());

                if (leave_start_date != '' && leave_end_date != '') {
                    //Check whether startdate is less than enddate

                    if (permissionTypeIds.includes(parseInt(selectedLeaveTypeID))) {


                        var totalPermissionHours = moment.duration(leave_end_date.diff(leave_start_date))
                            .asHours(); // +1 added so that 1 day leave can applied when startdate and enddate are same
                        console.log("Total permission hours : " + totalPermissionHours);
                        //$('#total_permission_hours').html(Math.ceil(totalPermissionHours));
                        if (totalPermissionHours < 1)
                            $('#total_permission_hours').html('0');
                        else
                            $('#total_permission_hours').html(Math.ceil(totalPermissionHours));
                    } else {
                        var totalDays = leave_end_date.diff(leave_start_date, 'days') +
                            1; // +1 added so that 1 day leave can applied when startdate and enddate are same
                        console.log("Total leave days : " + totalDays);
                        $('#total_leave_days').html(totalDays);

                    }

                }
            });


            $('#leave_type_id').change(function() {
                let selectedPermissionTypeID = $('#leave_type_id').find(":selected").val();
                console.log("Selected Leave Type : " + selectedPermissionTypeID);
                console.log("permissionTypeIds: " + permissionTypeIds);

                let currentDate = new Date().toJSON().slice(0, 8) + '01';

                if (permissionTypeIds.includes(parseInt(selectedPermissionTypeID))) {
                    //If permission selected, then show date & time in Start and End date dropdown

                    $('#start_date').attr('type', 'datetime-local');
                    $('#start_date').attr("min", currentDate + "T09:00:00");


                    $('#start_date').attr('type', 'datetime-local');
                    $('#end_date').attr('type', 'datetime-local');
                    $('#div_totaldays').hide();
                    $('#div_totalhours').show();
                } else {
                    $('#start_date').attr("min", currentDate);
                    $('#start_date').attr('type', 'date');
                    $('#end_date').attr('type', 'date');
                    $('#div_totaldays').show();
                    $('#div_totalhours').hide();
                }
            });

            $('#btn_request_leave').on('click', function(e) {
                //Loading screen
                Swal.fire({
                    title: 'Loading...',
                    //html: 'I will close in <b></b> milliseconds.',
                    html: '<b>Applying Leave.</b>',
                    timer: 2000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })

                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();

                let total_leave = 0; //Both leave and permission types are stored here
                let selectedLeaveTypeID = $('#leave_type_id').find(":selected").val();

                let half_day = null;
                let half_day_type = null;

                let radioBtn_halfDay = $("#for_half_day_leave").is(":checked");

                // full_day = $("#total_leave_days").text();
                // full = $("#for_full_day_leave").is(":checked");

                console.log("is half-day leave applied ? : " + radioBtn_halfDay);

                var availableLeaves_ForSelectedLeaveType = parseInt($('#leave_type_id').find(":selected")
                    .attr('data-remainingLeaves'));

                console.log("Available leaves : " + availableLeaves_ForSelectedLeaveType);

                // errors array
                var basic_details_errors = [];

                if ($('#leave_type_id').find(":selected").val() == '')
                    basic_details_errors.push("Leave Type");

                if (start_date == '')
                    basic_details_errors.push("Start Date");

                if (end_date == '')
                    basic_details_errors.push("End Date");

                if ($('#leave_reason').val() == '')
                    basic_details_errors.push("Leave Reason");

                //check empty data validation
                if (basic_details_errors.length > 0) {

                    $('#errors_header').html("Please fill the following details");
                    $('#errors_body').html('');

                    $('#errors_body').append("<ul class='px-4 list-style-numbered list-style-circle'>");
                    basic_details_errors.forEach(function(element) {
                        $('.list-style-numbered ').append('<li>' + element + '</li>');
                    });
                    $('#errors_body').append("</ul>");

                    $('#error_notify').show();
                    $('#error_notify').removeClass('fade');

                    return;
                }

                //Reset the array
                basic_details_errors = [];

                console.log("Selected leave type : " + $('#leave_type_id').find(":selected").attr(
                    'data-leavetype'));

                //    Leave Duration







                //for permission types
                if (permissionTypeIds.includes(parseInt(selectedLeaveTypeID))) {

                    let startDate = moment(start_date);
                    let endDate = moment(end_date);
                    let daysDiff = moment.duration(endDate.diff(startDate)).asDays();
                    console.log("Days diff : " + daysDiff);

                    var totalPermissionHours = parseInt($('#total_permission_hours').html());

                    if (Math.floor(daysDiff) != 0) {
                        basic_details_errors.push(
                            "For Permission leave type : Start date and End date should be same date.");
                    } else {
                        //If day difference is less than 1, then check timediff


                        //let timeDiff = moment.duration(endDate.diff(startDate)).asHours();
                        console.log("Permission TimeDiff : " + totalPermissionHours);

                        //Check if time diff is atleast 1hr
                        if (totalPermissionHours < 1.0) {
                            basic_details_errors.push("Permission time should be atleast 1hr.");
                        }


                    }


                } else {
                    //for leave types

                    var totalLeaveDays = parseInt($('#total_leave_days').html());


                    //For leave types
                    if (moment(start_date) > moment(end_date)) {
                        basic_details_errors.push(
                            "Start date should not be greater than End date.");
                    }

                    // IF availableLeaves_ForSelectedLeaveType =="NA", then its 'is_finite'== 1...
                    if (availableLeaves_ForSelectedLeaveType != "NA" &&
                        availableLeaves_ForSelectedLeaveType <= 0) {
                        basic_details_errors.push("No leaves available for the selected leave type.");
                    } else
                    if (totalLeaveDays > availableLeaves_ForSelectedLeaveType) {
                        basic_details_errors.push(
                            "Selected leave days exceeds your available leave days for the selected leave type."
                        );
                    }

                    //If half-daf radio button clicked, Get the half day value...
                    if (radioBtn_halfDay == true) {
                        half_day = $("#for_half_day_leave").val();
                        half_day_type = $('#half_day_type').val();
                    } else {
                        half_day = null;
                        half_day_type = null;
                    }

                }

                if (basic_details_errors.length > 0) {


                    $('#errors_header').html("Please fix the following error");
                    $('#errors_body').html('');

                    $('#errors_body').append("<ul class='px-4 list-style-numbered list-style-circle'>");
                    basic_details_errors.forEach(function(element) {
                        $('.list-style-numbered ').append('<li>' + element + '</li>');
                    });
                    $('#errors_body').append("</ul>");

                    $('#error_notify').show();
                    $('#error_notify').removeClass('fade');

                    return;
                }

                $.ajax({
                    url: "{{ route('attendance-applyleave') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'user_id': $('#leave_type_id').val(),
                        'start_date': $('#start_date').val(),
                        'end_date': $('#end_date').val(),
                        'half_day_leave': half_day,
                        'half_day_type': half_day_type,
                        'leave_reason': $('#leave_reason').val(),
                        'leave_type_id': $('#leave_type_id').val(),
                        'notifications_users_id': $('#notifications_users_id').val(),
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            console.log("Leave requested successfully");
                            Swal.fire({
                                title: data.message,
                                text: data.mail_status,
                                type: "success"
                            }).then(function() {
                                location.reload();
                            });
                            //alert(data.message + " \n " + data.mail_status);
                        } else {
                            Swal.fire({
                                title: data.message,
                                text: data.mail_status,
                                type: data.failure
                            }).then(function() {
                                // location.reload();
                            });
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
                            formatter: function formatter(leave_history) {
                                //return gridjs.html(cell);
                                if (permissionTypeIds.includes(leave_history.leave_type_id))
                                    return gridjs.html(moment(leave_history.start_date).format(
                                        ' DD-MMM-YYYY, h:mm a')); // Format : Jan 9th, 2023, 3:00 pm
                                else
                                    return gridjs.html(moment(leave_history.start_date).format(
                                        'DD-MMM-YYYY'));

                            }
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                            formatter: function formatter(leave_history) {

                                if (permissionTypeIds.includes(leave_history.leave_type_id))
                                    return gridjs.html(moment(leave_history.end_date).format(
                                        'DD-MMM-YYYY, h:mm a'));
                                else
                                    return gridjs.html(moment(leave_history.end_date).format(
                                        'DD-MMM-YYYY'));
                            }
                        },
                        {
                            id: 'total_leave_datetime',
                            name: 'Total Day(s)/Hour(s)',
                            formatter: function formatter(leave_history) {
                                let total_date_hours = leave_history.total_leave_datetime;

                                if (total_date_hours) {
                                    if (permissionTypeIds.includes(leave_history.leave_type_id))
                                        return gridjs.html(total_date_hours +
                                            " Hr(ssss)"); //For permissions, show only hours
                                    else
                                        return gridjs.html(
                                            total_date_hours); //For Leaves, show only days
                                } else {
                                    return gridjs.html('-');

                                }
                            }
                        },
                        {
                            id: 'leave_reason',
                            name: 'Reason',
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
                                //     '" class="py-1 status btn btn-orange onboard-employee-btn "></input>';
                                // else
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" class="py-1 status btn btn-orange onboard-employee-btn disabled"></input>';
                                // <button class="btn btn-orange" data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">
                                //       <i class="fa fa-sticky-note-o"></i>
                                //     </button>

                                htmlcontent =
                                    '<input type="button" value="View" class="py-1 status btn btn-orange onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal" onclick="onClickShowLeaveDetails(this)" data-leave-id=' +
                                    emp.id + '/>';
                                // '<button  value="View" class="py-1 status btn btn-orange onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal"></button>' ;


                                return gridjs.html(htmlcontent);

                                //Temporaryily hiding the VIEW button
                                // return gridjs.html('');
                            }
                        },

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetch-leaverequests', ['type' => 'employee', 'statusArray' => 'Approved,Rejected,Pending,Revoked,Withdrawn ']) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                // leave_history.user_id,
                                //leave_history,
                                leave_history.leave_type_id,
                                leave_history,
                                leave_history,
                                leave_history,
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
                                var emp_code = leaveHistoryObj.emp_code;
                                var emp_name = leaveHistoryObj.emp_name;
                                var emp_avatar = JSON.parse(leaveHistoryObj.employee_avatar);
                                var output = "";
                                if (emp_avatar.type == "shortname") {
                                    output =
                                        '<div class="d-flex align-items-center rounded-circle page-header-user-dropdown ">' +
                                        '<span class="ml-2 user-profile' + emp_avatar
                                        .color + ' " id="">' +
                                        '<i class="topbar_username" class="align-middle ">' +
                                        emp_avatar.data + '</i>' +
                                        '</span>' +
                                        '<span>&nbsp;&nbsp;' + leaveHistoryObj.employee_name +
                                        '</span>' +
                                        '</div>';

                                } else {
                                    var imagePath = '{{ URL::asset('images/') }}' + '/' +
                                        emp_avatar
                                        .avatar;

                                    output = '<div class="d-flex align-items-center">' +
                                        '<img class="rounded-circle header-profile-user" src="' +
                                        imagePath + '" alt="user image">' +
                                        '<span>&nbsp;&nbsp;' + leaveHistoryObj.employee_name +
                                        '</span>' +
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
                            formatter: function formatter(cell) {
                                //return gridjs.html(cell);
                                return gridjs.html(moment(cell).format('DD-MMM-YYYY h:mm a'));
                            }
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                            formatter: function formatter(cell) {
                                //return gridjs.html(cell);
                                return gridjs.html(moment(cell).format('DD-MMM-YYYY h:mm a'));
                            }
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


                                //console.log(emp);
                                if (emp.status == "Rejected" || emp.status == "Approved") {
                                    htmlcontent =
                                        '<input type="button" value="View" class="py-1 status btn btn-orange onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal" onclick="onClickShowLeaveDetails(this)" data-leave-id=' +
                                        emp.id + '>';

                                    return gridjs.html(htmlcontent);

                                }


                            }
                        },
                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetch-leaverequests', ['type' => 'team', 'statusArray' => 'Approved,Rejected,Pending']) }}',
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
                                var emp_code = leaveHistoryObj.emp_code;
                                var emp_name = leaveHistoryObj.emp_name;
                                var emp_avatar = JSON.parse(leaveHistoryObj.employee_avatar);
                                var output = "";
                                if (emp_avatar.type == "shortname") {
                                    output =
                                        '<div class="d-flex align-items-center rounded-circle page-header-user-dropdown ">' +
                                        '<span class="ml-2 user-profile' + emp_avatar
                                        .color + ' " id="">' +
                                        '<i class="topbar_username" class="align-middle ">' +
                                        emp_avatar.data + '</i>' +
                                        '</span>' +
                                        '<span>&nbsp;&nbsp;' + leaveHistoryObj.employee_name +
                                        '</span>' +
                                        '</div>';

                                } else {
                                    var imagePath = '{{ URL::asset('images/') }}' + '/' +
                                        emp_avatar
                                        .avatar;

                                    output = '<div class="d-flex align-items-center">' +
                                        '<img class="rounded-circle header-profile-user" src="' +
                                        imagePath + '" alt="user image">' +
                                        '<span>&nbsp;&nbsp;' + leaveHistoryObj.employee_name +
                                        '</span>' +
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
                            formatter: function formatter(leave_history) {
                                // return gridjs.html(leave_history.leave_type_id);
                                if (permissionTypeIds.includes(leave_history.leave_type_id))
                                    return gridjs.html(moment(leave_history.start_date).format(
                                        'DD-MMM-YYYY, h:mm a')); // Format : Jan 9th, 2023, 3:00 pm
                                else
                                    return gridjs.html(moment(leave_history.start_date).format(
                                        'DD-MMM-YYYY'));


                            }
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                            formatter: function formatter(leave_history) {
                                //return gridjs.html(cell);
                                if (permissionTypeIds.includes(leave_history.leave_type_id))
                                    return gridjs.html(moment(leave_history.start_date).format(
                                        'DD-MMM-YYYY, h:mm a')); // Format : Jan 9th, 2023, 3:00 pm
                                else
                                    return gridjs.html(moment(leave_history.start_date).format(
                                        'DD-MMM-YYYY'));

                            }
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
                                //     '" class="py-1 status btn btn-orange onboard-employee-btn "></input>';
                                // else
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" class="py-1 status btn btn-orange onboard-employee-btn disabled"></input>';
                                // <button class="btn btn-orange" data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">
                                //       <i class="fa fa-sticky-note-o"></i>
                                //     </button>
                                //var content_onclick = "getLeaveDetails(2)";
                                htmlcontent =
                                    // '<input type="button"  class="py-1 status btn btn-orange onboard-employee-btn leavebutton" value="View" />';
                                    // '<button   class="py-1 status btn btn-orange onboard-employee-btn " data-bs-target="#leaveDetails_modal"  data-bs-toggle="modal">View</button>';
                                    //'<button   class="py-1 status btn btn-orange onboard-employee-btn leavebutton " onClick=" getLeaveHistory(' +emp.id + ')" >View</button>';
                                    '';
                                return gridjs.html(htmlcontent);
                            },
                        },
                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetch-leaverequests', ['type' => 'org', 'statusArray' => 'Approved,Rejected,Pending']) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                leave_history,
                                leave_history.leave_type_id,
                                leave_history,
                                leave_history,
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

        function onClickShowLeaveDetails(element) {
            let leave_id = $(element).attr('data-leave-id');
            console.log("Leave status clicked for " + leave_id);

            getLeaveDetails(leave_id);

        }

        function getLeaveDetails(leave_id) {
            console.log("Getting date for leave_id : " + leave_id);
            $('#btn_withdraw').attr('data-leave-id', leave_id);
            $('#btn_revoke').attr('data-leave-id', leave_id);
            $.ajax({
                url: "{{ route('attendance-leave-getdetails') }}",
                type: "GET",
                dataType: "json",
                data: {
                    'leave_id': leave_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {

                    //clear old data
                    $('.show_img').remove(html_shortName);



                    var imagePath = '{{ URL::asset('images/') }}' + '/' + data.avatar.data;
                    $('#show_img').html('');

                    if (data.avatar['type'] == "shortname") {
                        // $('.show_img').text(data.avatar.data);


                        var html_shortName = $(
                            '<div class="text-white bg-primary d-flex justify-content-center align-items-center f-13 fw-bold img-md rounded-circle"></div>'
                        ).text(data.avatar.data);
                        $('.show_img').append(html_shortName);
                        // var html_shortName = ' <div class="text-white bg-primary f-13 fw-bold ">'data.avatar.data'</div>';
                        // $('#show_img').append(html_shortName);


                    } else {
                        var html_image_tag = '<img data-leave_id="' +
                            +
                            '" data-emp_name="' + data.user_name + '" id="img_' + leave_id +
                            '" class="rounded-circle img-lg"  alt=" " src="' + imagePath +
                            '"  />'

                        $('#show_img').append(html_image_tag);

                    }
                    $('#employee_name').text(data.user_name);

                    $('#leaveRequested_date').text(moment(data.leaverequest_date).format('MMM D , YYYY'));
                    $('#leave_start_month').text(moment(data.start_date).format('MMM'));
                    $('#leave_start_date').text(moment(data.start_date).format('D'));
                    $('#leave_start_day').text(moment(data.start_date).format('ddd'));

                    console.log("total_leave_datetime : " + data.total_leave_datetime);

                    if (data.total_leave_datetime == "0.5" || data.total_leave_datetime == "1")
                        $('#div_leave_end_date').hide();
                    else
                        $('#div_leave_end_date').show();

                    $('#leave_end_month').text(moment(data.end_date).format('MMM'));
                    $('#leave_end_date').text(moment(data.end_date).format('D'));
                    $('#leave_end_day').text(moment(data.end_date).format('ddd'));

                    $('#totalLeave_days').text(data.total_leave_datetime);
                    $('#leave_type').text(data.leave_type);

                    $('#notifyUser_name').text(data.notification_userName);
                    $('#notifyUser_designation').text(data.user_designation);
                    $('#approver_name').text(data.approver_name);
                    $('#approver_desgination').text(data.notification_designation);
                    $('#reviewed_date').text(moment(data.reviewed_date).format('MMM DD, YYYY, hh:MM a'));
                    $('#textarea_leavecomments').text(data.leave_reason);

                    console.log("Leave details for ID : " + leave_id + " :: " + data);

                    let current_emp_id = "{{ auth()->user()->id }}";
                    console.log("Current Emp id : " + current_emp_id);
                    console.log("Emp Emp id : " + data.user_id);
                    console.log("Mgr  Emp id : " + data.reviewer_user_id);

                    //Checking if the current user is employee who applied this leave
                    if (current_emp_id == data.user_id) {
                        //Employee can withdraw leave
                        if (data.status == "Pending") {
                            $('#btn_withdraw').show();
                        } else {
                            $('#btn_withdraw').hide();
                        }
                    } else {
                        $('#btn_withdraw').hide();
                    }

                    //Checking if the current user is Manager of this leave applied emp
                    if (current_emp_id == data.reviewer_user_id) {
                        //Manager can revoke his leave approval
                        if (data.status == "Rejected" || data.status == "Approved") {
                            $('#btn_revoke').show();
                        } else {
                            $('#btn_revoke').hide();
                        }
                    } else {
                        //console.log("Current user is not Manager : "+current_emp_id);
                        $('#btn_revoke').hide();

                    }

                    $('#leaveDetails_modal').modal('show');

                },
                error: function(data) {


                }
            });


        }
        $('#inputGroupSelect01').on('change', function() {
            var time_fram = $('#inputGroupSelect01').val();
            var time_frame_array = time_fram.split('/');
            var start_date = time_frame_array[0];
            var end_date = time_frame_array[1];
            $.ajax({
                url: "{{ route('fetchEmployeeLeaveBalance') }}",
                type: "GET",
                dataType: "json",
                data: {
                    'start_date': start_date,
                    'end_date': end_date,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {


                }
            });
        });
    </script>
@endsection
