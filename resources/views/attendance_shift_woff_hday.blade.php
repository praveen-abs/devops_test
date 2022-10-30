@extends('layouts.master')
@section('title')
@lang('translation.dashboards')
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/attendance.css') }}">
@endsection
@section('content')
@component('components.attendance_breadcrumb')
@slot('li_1')
@endslot
@endcomponent
    <div class="cotainer-fluid">
        <div class="card mb-2">
            <div class="py-1 card-body">
                <!-- <div class="card-header">
					<h5><span class="text-muted">Attendance &gt;</span> 
					<span class="text-danger"> Dashboard </span></h5>
                </div> -->
                <div class="row mb-2">
                    <div class="col-12 d-flex align-items-center">
                        <ul class="nav nav-pills nav-tabs-dashed">
                            <li class="nav-item text-muted">
                                <a class="nav-link active" data-bs-toggle="tab" href="#shift_weekly-off">Shift & Weekly Offs</a>
                            </li>
                            <li class="nav-item text-muted">
                                <a class="nav-link" data-bs-toggle="tab" href="#shift_allowance">Shift Allowance</a>
                            </li>
                            <li class="nav-item text-muted">
                                <a class="nav-link" data-bs-toggle="tab" href="#assignment">Assignments</a>
                            </li>
                            <li class="nav-item text-muted">
                                <a class="nav-link" data-bs-toggle="tab" href="#scheduler">Scheduler</a>
                            </li>
                            <li class="nav-item text-muted">
                                <a class="nav-link" data-bs-toggle="tab" href="#holidays">Holidays</a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="col-2  text-md-end text-center">
                        <select name="" id="" class="form-select border-orange disabled_focus">
                            <option value="" selected hidden disabled>Department</option>
                        </select>
                    </div>
                    <div class="col-2  text-md-start text-center">
                        <select name="" id="" class="form-select border-orange  disabled_focus">
                            <option value="" selected hidden disabled>Locations</option>
                        </select>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="shift_weekly-off" class="tab-pane fade show active">
                <div class="card top-line">
                    <div class="card-body">
						<div class="row mb-3">
							<div class="col-8">
								<ul class="nav nav-pills nav-tabs-dashed card-header-tabs" role="tablist">
									<li class="nav-item text-muted" role="presentation">
										<button type="button" class="btn nav-link attendances-analyist-tab active" data-bs-toggle="tab" href="#shift_main-tab" aria-selected="true" role="tab">Shifts</button>
									</li>
									<li class="nav-item text-muted" role="presentation">
										<button type="button" class="btn nav-link attendances-analyist-tab " data-bs-toggle="tab" href="#weekly_main-tab" aria-selected="false" tabindex="-1" role="tab">Weekly Offs</button>
									</li>
									<li class="nav-item text-muted" role="presentation">
										<button type="button" class="btn nav-link attendances-analyist-tab " data-bs-toggle="tab" href="#rules_main-tab" aria-selected="false" tabindex="-1" role="tab">Shifts & Weekly Off Rules</button>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="tab-content">
            				<div id="shift_main-tab" class="tab-pane fade show active">
								<div class="card box_shadow_0 border-rtb left-line w-100">
									<div class="card-body">
										<div class="row">
											<div class="col-8">
												<h6 class="text-left fw-bold">General Shift <span class="text-ash-medium mb-2 f-12"> Shift Code : GS</span></h6>
											</div>
											<div class="col-2">
												<select name="" id="" class="border-orange form-select disabled_focus">
													<option value="" selected="" hidden="" disabled="">Shift Type</option>
												</select>
											</div>
											<div class="col-2">
												<button class="btn btn-orange px-4">Add Shifts</button>
											</div>
										</div>
										<div class="col-12 d-flex align-items-center">
											<ul class="nav nav-pills nav-tabs-dashed" role="tablist">
												<li class="nav-item text-muted" role="presentation">
													<a class="nav-link active" data-bs-toggle="tab" href="#track_summary" aria-selected="true" role="tab">Summary</a>
												</li>
												<li class="nav-item text-muted" role="presentation">
													<a class="nav-link" data-bs-toggle="tab" href="#employees_track" aria-selected="false" tabindex="-1" role="tab">Employee</a>
												</li>
												<li class="nav-item text-muted" role="presentation">
													<a class="nav-link" data-bs-toggle="tab" href="#trackin_shift" aria-selected="false" tabindex="-1" role="tab">Track Shift Versions</a>
												</li>
											</ul>
										</div>
										<div class="tab-content">
											<div id="track_summary" class="tab-pane fade show active">
												<div class="col-md-12">
													<div class="" id="shift_Timng-table"></div>
												</div>
											</div>
											<div id="employees_track" class="tab-pane fade show">
												<div class="col-md-12">
													<div class="" id="employee_Timng-table"></div>
												</div>
											</div>
											<div id="trackin_shift" class="tab-pane fade show">
												<div class="col-md-12">
													<div class="" id="track_Timng-table"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
            				<div id="weekly_main-tab" class="tab-pane fade show">
								<div class="card box_shadow_0 border-rtb left-line w-100">
									<div class="card-body">
										<div class="row">
											<div class="col-8">
												<h6 class="text-left fw-bold">Weekly Off<span class="text-ash-medium mb-2 f-12"> Shift Code : GS</span></h6>
											</div>
											<div class="col-2">
												<select name="" id="" class="border-orange form-select disabled_focus">
													<option value="" selected="" hidden="" disabled="">Shift Type</option>
												</select>
											</div>
											<div class="col-2">
												<button class="btn btn-orange px-4">Add Shifts</button>
											</div>
										</div>
										<div class="col-md-12">
											<div class="" id="weekly_shift-table"></div>
										</div>
									</div>
								</div>
							</div>
            				<div id="rules_main-tab" class="tab-pane fade show">
								<div class="card box_shadow_0 border-rtb left-line w-100">
									<div class="card-body">
										<div class="row">
											<div class="col-10">
												<h6 class="text-left fw-bold">Shift & Weekly Off Rules</h6>
											</div>
											<div class="col-2">
												<button id="add_rules" class="btn btn-orange px-4">Add rules</button>
											</div>
										</div>
										<div class="col-md-12">
											<div class="" id="weekly_shift-table"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div id="shift_allowance" class="tab-pane fade show"></div>
            <div id="assignment" class="tab-pane fade"></div>
            <div id="scheduler" class="tab-pane fade"></div>
        </div>
		<div id="add-goals-modal" class="modal custom-modal fade" style="display: none" aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
				<div class="modal-content">
                    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                        <h6 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">Basic Information <span class="text-secondary">Settings</span></h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
							<div class="mt-3 d-flex align-items-center">
								<input type="text" name="options[]" id="" class="form-control " placeholder="Name" required="">
							</div>	
							<div class="mt-3 d-flex align-items-center">
								<textarea name="post_menu" id="post_menu" class="outline-none w-100 h-100" placeholder="Description about the rule"></textarea>
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
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            if (document.getElementById("shift_Timng-table")) {
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
                }).render(document.getElementById("shift_Timng-table"));
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
