@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
@component('components.attendance_breadcrumb')
@slot('li_1')@endslot
@endcomponent

<div class="card ">
	<div class="card-body ">
		<div class="filter-content">
			<div class="row">
				<div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
				</div>
				<div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
					<div class="row">
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Department
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Location
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Leave Type
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Leave Status
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<div class="" id="table_leaveHistory"></div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
var leavetypes_array = <?php echo json_encode(getAllLeaveTypes()); ?>;

var employeesList_array = <?php echo json_encode($allEmployeesList); ?>;


    $(document).ready(function() {
        // $('#notifications_users_id').select2({
        //         dropdownParent: $("#modal_request_leave"),
        //        width: '100%'
        //     });

        // $(document).on('#select-reviewer:open', () => {
        //         $('.select2-search__field').focus();
        //     });

        $('#btn_request_leave').on('click', function(e) {
            console.log("Selected Button : "+$(this).attr('name'));

            $.ajax({
                url: "{{url('attendance-applyleave')}}",
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
                    if(data.status == "success")
                    {
                        alert(data.message+" \n "+data.mail_status);
                    }
                    else
                    {
                        alert("Leave request failed. Contact your Admin");
                    }
                },
                error: function(data) {


                }
            });
        });

        $(document).on('click', '.aprrove-leave-btn', function(e){
            console.log(e);
            var leaveId  = $(this).data('leave_id');
            var userId  = $(this).data('user_id');
            var statusText  = $(this).data('leave_status');

            $.ajax({
                url: "{{url('attendance-approve-rejectleave')}}",
                type: "POST",
                dataType: "json",
                data: {
                    'user_id': userId,
                    'leave_id': leaveId,
                    'status': statusText,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if(data.status == "success")
                    {
                        alert(data.message+" \n ");
                        location.reload();
                    }
                    else
                    {
                        alert("Leave request failed. Contact your Admin");
                    }
                },
                error: function(data) {


                }
            });
        });

        $('.aprrove-leave-btn').on('click', function(e){
            
        })

        // if (document.getElementById("attendance_approvals-table")) {
        //     const grid = new gridjs.Grid({
        //         columns: [{
        //                 id: 'number',
        //                 name: 'Employee',

        //             },
        //             {
        //                 id: 'name ',
        //                 name: ' Department',

        //             },
        //             {
        //                 id: 'job_title',
        //                 name: 'Location',
        //             },
        //             {
        //                 id: 'reporting_to',
        //                 name: 'Leave Dates',
        //             },
        //             {
        //                 id: 'reporting_to',
        //                 name: ' Leave Type',
        //             },
        //             {
        //                 id: 'reporting_to',
        //                 name: 'Status',
        //             },
        //             {
        //                 id: 'reporting_to',
        //                 name: 'Last Action By',
        //             },
        //             {
        //                 id: 'reporting_to',
        //                 name: 'Next Approvers',
        //             },
        //             {
        //                 id: 'reporting_to',
        //                 name: 'Leave Note',
        //             },
        //             {
        //                 id: '',
        //                 name: 'Actions',
        //             },


        //         ],
        //         data: [
        //             // {
        //             //     name: 'John',
        //             //     email: 'john@example.com',
        //             //     phoneNumber: '(353) 01 222 3333'
        //             // },
        //             // {
        //             //     name: 'Mark',
        //             //     email: 'mark@gmail.com',
        //             //     phoneNumber: '(01) 22 888 4444'
        //             // },
        //         ],

        //         pagination: {
        //             limit: 10
        //         },
        //         sort: true,
        //         search: true,






        //     }).render(document.getElementById("attendance_approvals-table")); // card Table
        // }
        // });

        if (document.getElementById("table_leaveHistory")) {
            const grid = new gridjs.Grid({
                columns: [

                    {
                        id: 'user_id',
                        name: 'Employee Name',
                        formatter: function formatter(cell) {

                            for (var i = 0; i < employeesList_array.length; i++) {
                                if (employeesList_array[i].id == cell)
                                    return gridjs.html(employeesList_array[i].name);
                            }


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
                        name: 'Reviewer Name',
                        formatter: function formatter(cell) {

                        for (var i = 0; i < employeesList_array.length; i++) {
                                if (employeesList_array[i].id == cell)
                                    return gridjs.html(employeesList_array[i].name);
                            }
                        }
                    },
                    {
                        id: 'reviewer_comments',
                        name: 'Reviewer Comments',
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
                                console.log(emp);
                                if (emp.status == "Pending"){
                                    htmlcontent =
                                     '<input type="button" value="Approve" id="button_activate_"' +
                                    emp.user_id + '" data-user_id="' + emp.user_id +
                                    '" data-leave_id="' + emp.id +
                                    '" data-leave_status="Approved" class="status btn btn-orange py-1 aprrove-leave-btn "></input>';

                                    htmlcontent = htmlcontent + 
                                     '&nbsp;&nbsp;<input type="button" value="Reject" id="button_activate_"' +
                                    emp.user_id + '" data-user_id="' + emp.user_id +
                                    '" data-leave_id="' + emp.id +
                                    '" data-leave_status="Rejected" class="status btn btn-orange py-1 aprrove-leave-btn "></input>&nbsp;&nbsp;';
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

                                    htmlcontent =htmlcontent +
                                    '<input type="button" value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal"></input>';


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
                    url: '{{route('fetch-leavehistory')}}',
                    then: data => data.map(
                        leave_history => [
                            //leave_history.id,
                            leave_history.user_id,
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
            }).render(document.getElementById("table_leaveHistory"));
        }

       /* function approveLeave(){
            console.log(this);
        }*/
    });
</script>
@endsection
