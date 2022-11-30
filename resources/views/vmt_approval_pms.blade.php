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
   

         

                <div class="row mt-3">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card mb-0 leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">PMS APPROVALS</h6>

                                <div class="table-responsive">
                                    <div id="emp_leaveHistory" class="custom_gridJs"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             

        
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
                    <div id="viewEmp_history_balance_table" class="custom_gridJs"></div>


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
                    <h6 class="modal-title mb-1 text-primary">
                        Leave Request</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    
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
                                                        <h6 id="_monthAndYear" class="_monthAndYear text-white"></h6>
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
                                        {{-- <div class="row">
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
                                        </div> --}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    {{-- error message details --}}

    <div id="error_notify" class="modal custom-modal fade" role="dialog" aria-hidden="true"
        style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-dialog-centered   modal-md" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary" id="errors_header"
                        style="border-bottom:5px solid #d0d4e2;">
                    </h6>
                    <button type="button" class="close close-modal outline-none bg-transparent border-0 h3"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errors-body" id="errors_body">

                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div id="leaveDetails_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary">
                        Leave Request Details</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row border-bottom mb-2 pb-3 align-items-center">
                                <div class="col-auto">
                                    <div id="" class="show_img">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <p class="text-primary f-15 fw-bold" id="employee_name"></p>
                                    <p class="text-muted f-13 ">Requsted on <span id="leaveRequested_date"></span></p>

                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-2 pb-3 ">
                                <div class="date-wrapper text-center rounded shadow-lite  me-2 border-bottom mb-2" style="width:75px">
                                    <p class="bg-primary rounded  text-center text-white py-1" id="leave_month"> Apr</p>
                                    <p id="leave_date"> </p>
                                    <p id="leave_day"> </p>
                                </div>
                                <div class="content-det">
                                    <p id="">
                                    <h6 id="totalLeave_days"></h6> <span id="leave_type"></span> </p>

                                </div>
                            </div>

                            <div class="row border-bottom mb-2 pb-3">
                                <div class="col-12">
                                    <h6 class="">Notify to</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-lg-6 col-md-6 col-xxl-4 col-xl-4 mb-md-0 mb-3">
                                    <div class="card mb-sm-3 mb-0 mb-sm-3 mb-xxl-0 mb-xl-0">
                                        <div class="card-body align-items-center  py-1 px-2 d-flex">
                                            {{-- <img class="float-right rounded-circle img-md"
                                                src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" /> --}}
                                            <div id="" class="show_img">
                                            </div>
                                            <div class="profile-details">
                                                <p id="notifyUser_name">Dillip Kumar</p>
                                                <h5 class="description" id="notifyUser_designation">Designation</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row border-bottom mb-2 pb-3">
                                <div class="col-12">
                                    <h6 class="">Approved by</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-lg-6 col-md-6 col-xxl-4 col-xl-4 mb-md-0 mb-3">
                                    <div class="card mb-sm-3 mb-0 mb-sm-3 mb-xxl-0 mb-xl-0">
                                        <div class="card-body align-items-center  py-1 px-2 d-flex">
                                            <div id="" class="show_img">
                                            </div>

                                            {{-- <img class="float-right rounded-circle img-md"
                                                src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866"
                                                alt="" /> --}}
                                            <div class="profile-details">
                                                <p id="approver_name"></p>
                                                <h5 class="description" id="approver_desgination"></h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row ">
                                <div class="col-12">
                                    <h6 class="">Reason</h6>
                                </div>
                                <div class="col-12 mb-md-0 mb-3">
                                    <textarea placeholder="Add Comment" class="form-control mb-2 outline-none border-0 shadow-lite" name=""
                                        id="" cols="30" rows="3"></textarea>

                                </div>
                                <div class="col-12 mb-md-0 mb-3 text-end">
                                    <button class="btn btn-orange"><i class="fa fa-paper-plane me"
                                            aria-hidden="true"></i> Send</button>

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

    <script>

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
                            formatter: function formatter(cell) {
                                //return gridjs.html(cell);
                                return gridjs.html(moment(cell).format('DD-MM-YYYY h:mm a'));
                            }
                        },

                        {
                            id: 'end_date',
                            name: 'End Date',
                            formatter: function formatter(cell) {
                                //return gridjs.html(cell);
                                return gridjs.html(moment(cell).format('DD-MM-YYYY h:mm a'));
                            }
                        },
                        {
                            id: 'total_leave_datetime',
                            name: 'Total Day(s)/Hour(s)',
                            formatter: function formatter(leave_history) {
                                let total_date_hours = leave_history.total_leave_datetime;

                                if (permissionTypeIds.includes(leave_history.leave_type_id))
                                    return gridjs.html(total_date_hours.split(',')[
                                        1]); //For permissions, show only hours
                                else
                                    return gridjs.html(total_date_hours.split(',')[
                                        0]); //For Leaves, show only days

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
                                //     '" class="status btn btn-orange py-1 onboard-employee-btn "></input>';
                                // else
                                //     htmlcontent =
                                //     '<input type="button" value="Activate" class="status btn btn-orange py-1 onboard-employee-btn disabled"></input>';
                                // <button class="btn btn-orange" data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">
                                //       <i class="fa  fa-sticky-note-o"></i>
                                //     </button>

                                htmlcontent =
                                    '<input type="button" value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">';
                                // '<button  value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal"></button>' ;


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
                        url: '{{ route('fetch-leaverequests', ['type' => 'employee', 'statusArray' => 'Approved,Rejected,Pending']) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                // leave_history.user_id,
                                //leave_history,
                                leave_history.leave_type_id,
                                leave_history.start_date,
                                leave_history.end_date,
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

 
</script>
@endsection
