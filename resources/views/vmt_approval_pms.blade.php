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
                            
                        },
                        {
                            id: 'actions',
                            name: 'Action',
                            formatter: function formatter(emp) {
                                var htmlcontent = "";
 

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
