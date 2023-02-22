@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')


@endsection
@section('content')
    {{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}


    <div class="approvals_wrapper mt-30">
        <div class="card ">
            <div class="card-body ">
                <div class="filter-content">
                    <div class="row">
                        <div class="col-sm-12 col-xxl-4 col-md-6 col-xl-4 col-lg-4">
                            <h6 class="mb-0 text-muted text-start">Attendance Regularization Approvals</h6>
                            <br />
                        </div>
                        {{-- <div class="col-sm-12 col-xxl-8 col-md-6 col-xl-8 col-lg-8">
                            <div class="row">
                                <div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
                                    <label class="form-label mb-1">Month</label>
                                    <select name="" id="" class="form-select  border-orange disabled_focus">
                                        <option value="" selected hidden disabled>Choose</option>
                                        <option value="1" >Jan</option>
                                        <option value="2" >Feb</option>
                                        <option value="3" >Mar</option>
                                        <option value="4" >Apr</option>
                                        <option value="5" >May</option>
                                        <option value="6" >Jun</option>
                                        <option value="7" >Jul</option>
                                        <option value="8" >Aug</option>
                                        <option value="9" >Sep</option>
                                        <option value="10" >Oct</option>
                                        <option value="11" >Nov</option>
                                        <option value="12" >Dec</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
                                    <label class="form-label mb-1">Regularization Type</label>
                                    <select name="dropdown_regularizationType" id="dropdown_regularizationType" class="form-select border-orange disabled_focus">
                                        <option value="" selected hidden disabled>Choose</option>
                                        <option value="lc">LC (Late Coming)</option>
                                        <option value="eg">EG (Early Coming)</option>
                                        <option value="mip">MIP (Missed In Punch)</option>
                                        <option value="mop">MOP (Missed Out Punch)</option>
                                    </select>
                                </div>
                                <!-- Reason type based on LC,EG,MIP,MOP -->
                                <div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
                                    <label class="form-label mb-1">Reason Type</label>
                                    <select name="dropdown_reasonType" id="dropdown_reasonType" class="form-select border-orange disabled_focus">
                                        <option value="" selected hidden disabled>Choose</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
                                    <label class="form-label mb-1">Status</label>
                                    <select name="" id="" class="form-select border-orange disabled_focus">
                                        <option value="pending" selected>Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <div id="vjs_regularizationTable"></div>
                    {{-- <div class="attendance_gridjs" id="table_lateComingTable"></div> --}}
                </div>
            </div>
        </div>

        <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true"
            style="opacity:1; display:none;background:#00000073;">
            <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h6 class="modal-title" id="modalHeader">
                        </h6>
                        {{-- <button type="button" class="btn-close close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal" aria-label="Close">

                            </button> --}}
                        <button type="button" class="close close-modal outline-none bg-transparent border-0 h3"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4">
                            <p class="mb-3 text-muted f-15 text-center" id="modalNot"></p>
                            <textarea name="reject_content" id="status_text" class="form-control mb-3"></textarea>
                            <div class="text-end">
                                <input type="hidden" id="selected_LCId" />
                                <input type="hidden" id="selected_userId" />
                                <input type="hidden" id="selected_status" />

                                <button type="button" class="btn btn-primary submit_notify"
                                    id="modal_lc_reject">Submit</button>
                                <button type="button" class="btn btn-light close-modal"
                                    id="closeModal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    @vite(['resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.js'])

    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script>
        var leavetypes_array = '';

        var employeesList_array = '';

        var gridjs_lateComingTable ="";


        var dropdown_reasons_LC = [
               {display: 'Permission', value: 'Permission'},
               {display: 'Others', value: 'Others'},
            ];

        var dropdown_reasons_EG = [
               {display: 'Permission', value: 'Permission'},
               {display: 'Others', value: 'Others'},
            ];

        var dropdown_reasons_MIP = [
               {display: 'Permission', value: 'Permission'},
               {display: 'Forgot To Punch', value: 'Forgot To Punch'},
               {display: 'Others', value: 'Others'},
            ];


        var dropdown_reasons_MOP = [
               {display: 'Permission', value: 'Permission'},
               {display: 'Forgot To Punch', value: 'Forgot To Punch'},
               {display: 'Others', value: 'Others'},
            ];



        $('#dropdown_regularizationType').change(function () {
            let selectedValue = $("#dropdown_regularizationType option:selected").val();
            console.log("Regularization Type DD Changed : "+selectedValue);

            //clear existing options in dropdown
            $('#dropdown_reasonType').empty().append('<option value="" selected hidden disabled>Choose</option>');

            //Based on selected regularization type, we will show the reason dropdown values accordingly
            $.each(dropdown_reasons_LC, function (i, item) {
                $('#dropdown_reasonType').append($('<option>', {
                    value: item.value,
                    text : item.display
                }));
            });

        });

        $(document).ready(function() {


            $(".close-modal").click(function() {
                console.log('close');
                $("#notificationModal").hide();
            });


            function processLateComingApproveReject(lc_id, user_id, t_status, t_statusText) {
                $.ajax({
                    url: "{{ route('process-attendance-regularization-approvals') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'user_id': user_id,
                        'lc_id': lc_id,
                        'status': t_status,
                        'status_text': t_statusText,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $("#notificationModal").hide();

                            swal({
                                    title: "Info",
                                    text: data.message,
                                    type: data.status
                                }).then(function() {
                                    location.reload();
                                });

                            // location.reload();
                        } else {
                           // alert("Leave request failed. Contact your Admin");
                            swal({
                                    title: "Info",
                                    text: data.message,
                                    type: data.status
                                }).then(function() {
                                    location.reload();
                                });
                        }
                    },
                    error: function(data) {


                    }
                });

            }

            $(document).on('click', '.reject-lc-btn', function(e) {
                var lc_id = $(this).data('lc_id');
                var userId = $(this).data('user_id');
                var statusText = $(this).data('lc_status');

                $('#selected_LCId').val(lc_id);
                $('#selected_userId').val(userId);
                $('#selected_status').val(statusText);

                $('#modalHeader').html("Rejected");
                $('#modalNot').html(
                    "Are you sure you want to reject it. If yes, please entered the reason in the below command box:"
                );
                $('#notificationModal').show();
                $('#notificationModal').removeClass('fade');

            });




            $('#modal_lc_reject').on('click', function(e) {

                processLateComingApproveReject(
                    $('#selected_LCId').val(),
                    $('#selected_userId').val(),
                    $('#selected_status').val(),
                    $('#status_text').val()
                );
            });

            $(document).on('click', '.approve-lc-btn', function(e) {
                console.log("Approve button clicked");
                var LC_id = $(this).data('lc_id');
                var userId = $(this).data('user_id');
                var status = $(this).data('lc_status');

                processLateComingApproveReject(LC_id, userId, status, '');
            });


            if (document.getElementById("table_lateComingTable")) {
                gridjs_lateComingTable = new gridjs.Grid({
                    columns: [
                        {
                            id: 'avatar',
                            name: '',
                            formatter: function formatter(cell) {

                                var output = "";

                                if(cell.employee_avatar.type == "shortname"){

                                    output ='<div class="d-flex align-items-center p-0 page-header-user-dropdown">'+
                                                '<div class="rounded-circle user-profile col-auto user-profile  me-2 " id="">'+
                                                    '<i class="topbar_username" class="align-middle ">'+cell.employee_avatar.data+'</i>'+
                                                '</div>'+
                                            '</div>';
                                }
                                else
                                if(cell.employee_avatar.type == "avatar"){
                                    var imageURL = "images/"+cell.employee_avatar.data;

                                    output ='<div class="col-auto p-0">'+
                                            '<img class="rounded-circle header-profile-user" src="'+imageURL+'" alt="--">'+
                                        '</div>';
                                }


                                return gridjs.html(output);
                            }
                        },
                        {
                            id: 'employee_name',
                            name: 'Employee Name',
                            formatter: function formatter(employee_name) {
                                return gridjs.html(employee_name);
                            }
                        },
                        {
                            id: 'attendance_date',
                            name: 'Date',
                            formatter: function formatter(cell) {
                                return gridjs.html(cell);
                            }
                        },
                        {
                            id: 'regularization_type',
                            name: 'Type',
                            formatter: function formatter(cell) {
                                return gridjs.html(cell);
                            }
                        },
                        {
                            id: 'user_time',
                            name: 'Actual Time',
                            formatter: function formatter(cell) {

                                return gridjs.html(moment(cell,"HH:mm:ss").format('h:mm a'));
                                //return gridjs.html(cell);

                            }
                        },

                        {
                            id: 'regularize_time',
                            name: 'Regularize Time',
                            formatter: function formatter(cell) {

                                return gridjs.html(moment(cell,"HH:mm:ss").format('h:mm a'));
                            }
                        },

                        {
                            id: 'custom_reason',
                            name: 'Reason',
                        },
                        {
                            id: 'reviewer_comments',
                            name: 'Approver Comments',
                            formatter: function formatter(cell) {

                                return gridjs.html(cell);

                            }
                        },
                        {
                            id: 'reviewed_date',
                            name: 'Reviewed Date',
                            formatter: function formatter(cell) {
                                const date = new Date(cell);

                                return gridjs.html(moment(date).format('h:mm a'));

                            }
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
                            formatter: function formatter(req) {
                                var htmlcontent = "";
                                //console.log(emp);
                                if (req.status == "Pending") {
                                    htmlcontent =
                                        // '<input type="button" value="Approve" data-user_id="' + req.user_id +
                                        // '" data-lc_id="' + req.id +
                                        // '" data-lc_status="Approved" class="status btn btn-success py-1 approve-lc-btn">';

                                        '<button type="button" value="Approve" data-user_id="' + req.user_id +
                                        '" data-lc_id="' + req.id +
                                        '" data-lc_status="Approved" class="status me-2 btn btn-success py-1 approve-lc-btn"><i class="fa fa-check-circle me-1" aria-hidden="true"></i>Approve</button>';

                                    htmlcontent = htmlcontent +
                                        // '<input type="button" value="Reject" id="button_activate_"' +
                                        // req.user_id + '" data-user_id="' + req.user_id +
                                        // '" data-lc_id="' + req.id +
                                        // '" data-lc_status="Rejected" class="status btn btn-danger py-1 reject-lc-btn "></input>&nbsp;&nbsp;';
                                        '<button type="button" value="Reject" id="button_activate_"' +req.user_id + '" data-user_id="' + req.user_id +
                                        '" data-lc_id="' + req.id +
                                        '" data-lc_status="Rejected" class="status btn btn-danger py-1 reject-lc-btn "><i class="fa fa-times-circle me-1"></i>Reject</button>';
                                }

                                // htmlcontent = htmlcontent +
                                //     '<input type="button" value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal"></input>';


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
                        url: '{{ route('fetch-regularization-approvals') }}',
                        then: data => data.map(
                            att_regularize => [
                                //leave_history.id,
                                att_regularize,
                                att_regularize.employee_name,
                                att_regularize.attendance_date,
                                att_regularize.regularization_type ,
                                att_regularize.user_time,
                                att_regularize.regularize_time,
                                att_regularize.custom_reason,
                                //att_regularize.reviewer_user_id,
                                //att_regularize.notifications_users_id,
                                att_regularize.reviewer_comments,
                                att_regularize.reviewer_reviewed_date,
                                att_regularize.status,
                                att_regularize

                            ]
                        )
                    }
                }).render(document.getElementById("table_lateComingTable"));
            }

            /* function approveLeave(){
                 console.log(this);
             }*/
        });
    </script>
@endsection
