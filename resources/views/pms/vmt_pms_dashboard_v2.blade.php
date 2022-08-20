@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/css/assign_goals.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
    <!--Animate CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
    <!--Map-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">


    <!-- calendar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <style>
        .output {
            font: 1rem 'Fira Sans', sans-serif;
        }

        blockquote {
            background: white;
            border-radius: 5px;
            margin: 0 !important;
            height: 100px;
            overflow-y: auto;
        }

        blockquote p {
            padding: 15px;
        }

        [contenteditable='true'] {
            caret-color: red;
        }
    </style>
    <style type="text/css">
header {
    font-family: 'Lobster', cursive;
    text-align: center;
    font-size: 25px;
}


.scrollbar {
    /*margin-left: 67px;*/
    /*float: left;*/
    height: 300px;
    /*width: 400px;*/

    overflow-y: scroll;
    margin-bottom: 25px;
}

.force-overflow {
    min-height: 450px;
}

#wrapper {
    text-align: center;
    width: 500px;
    margin: auto;
}

/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
    background-color: #555;
}
</style>
@endsection


@section('content')
    @component('components.performance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent

    <div class="container-fluid assign-goal-wrapper mt-mb-15">
        <div class="cards-wrapper">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 ">
                    <div class="card pms-card">

                        <div class="pms-dashboard-wrapper ">

                            <div class="card-body p-5">
                                <!-- <div class="row ">
                                <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 "> -->

                                <div class="align-items-center justify-content-center d-flex pms-gadget-container">


                                    <div class="card pms-card m-0 m-3">
                                        <div class="card-body p-0">
                                            <div class="d-flex mt-2">
                                                <p class="pl-3 col-auto"><img
                                                        src="{{ URL::asset('assets/images/employee_goals.png') }}"
                                                        alt="" class=""></p>
                                                <div class="  d-flex align-items-center mt-3 flex-column">
                                                    <p>Employee Goals</p>
                                                    <h5><b>{{ $dashboardCountersData['employeesGoalsSetCount'] . '/' . $dashboardCountersData['totalEmployeesCount'] }}</b>
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card pms-card m-0 m-3">
                                        <div class="card-body p-0">

                                            <div class="d-flex mt-2">
                                                <p class="pl-3 col-auto"><img
                                                        src="{{ URL::asset('assets/images/self_review.png') }}"
                                                        alt="" class=""></p>
                                                <div class="  d-flex align-items-center mt-3 flex-column">
                                                    <p>Self Review</p>

                                                    <h5><b>{{ $dashboardCountersData['selfReviewCount'] . '/' . $dashboardCountersData['totalSelfReviewCount'] }}</b>
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="card pms-card m-0 m-3">
                                        <div class="card-body p-0">
                                            <div class="d-flex mt-2">
                                                <p class="pl-3 col-auto"><img
                                                        src="{{ URL::asset('assets/images/employees_assessed.png') }}"
                                                        alt="" class=""></p>
                                                <div class="  d-flex align-items-center mt-3 flex-column">
                                                    <p>Employees Assessed</p>
                                                    <h5><b>{{ $dashboardCountersData['employeesAssessedCount'] . '/' . $dashboardCountersData['employeesGoalsSetCount'] }}</b>
                                                    </h5>

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
            @if (!empty($existingGoals) && count($existingGoals) == 0)
                <div class="mt-2 p-5" id="initial-section">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2 p-5">
                            <div class="p-3"><img src="{{ URL::asset('assets/images/assign_goals.png') }}"
                                    style="width: 37%;height: 74%;"></div>
                            <h4><b>Assign Goals for your employees</b></h4>
                            <div class="mt-4">
                                <button id="add-goals" class="btn btn-primary">
                                    <h6 class="m-0 text-white p-2">
                                        <i class="text-white fa fa-plus mx-1"></i>
                                        <b>Add</b>
                                    </h6>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="table-responsive">

                    <div class="container-fluid px-2 bg-white" style="position:relative;">
                        <button id="add-goals" class="text-white py-1 px-3 btn btn-primary add-goals"><i
                                class="text-white fa fa-plus mx-1"></i>Add Goals</button>

                        <table id='empTable' class=' table table-borderd  mb-0'>
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Employee ID</th>

                                    <th scope="col">Manager</th>
                                    <!-- <th scope="col">Employee name</th> -->

                                    <th scope="col">Assignment Period</th>
                                    <th scope="col">Employee Status</th>
                                    <th scope="col">Manager Status</th>
                                    <th scope="col">Average Rating</th>
                                    <th scope="col">Review </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empGoals as $emp)
                                    <tr>
                                        <td class="">{{ $emp->emp_name }}</td>
                                        <td class="">{{ $emp->emp_no }}</td>


                                        <td class="">
                                            {{ $users[0]->name }}
                                        </td>
                                        <td class="">
                                            {{ json_decode($emp->assignment_period, true) ? json_decode($emp->assignment_period, true)['assignment_period_start'] : $emp->assignment_period }}
                                        </td>
                                        <td class="">
                                            <!-- Employee status -->


                                            @if (auth()->user()->hasrole('Employee'))
                                                <!-- If employee sets the KPI -->
                                                @if (auth::user()->id == $emp->author_id)
                                                    {{ $emp->is_employee_submitted ? 'Submitted' : 'Not yet submitted' }}
                                                @else
                                                    {{ $emp->is_employee_submitted ? 'Submitted' : 'Not yet submitted' }}
                                                @endif
                                            @endif
                                            @if (auth()->user()->hasrole('Manager'))
                                                {{ $emp->is_employee_submitted ? 'Submitted' : 'Not yet submitted' }}
                                            @endif

                                            @if (auth()->user()->hasrole(['Admin', 'HR']))
                                                @if ($emp->is_employee_accepted)
                                                    {{ $emp->is_employee_submitted ? 'Submitted' : 'Accepted, Not yet submitted' }}
                                                @else
                                                    {{ 'Not yet accepted' }}
                                                @endif
                                            @endif


                                        </td>
                                        <td class="">
                                            <!-- Manager status -->
                                            @if (auth()->user()->hasrole('Employee'))
                                                {{ $emp->is_manager_submitted ? 'Reviewed' : 'Not yet reviewed' }}
                                            @endif
                                            @if (auth()->user()->hasrole('Manager'))
                                                @if ($emp->is_manager_submitted)
                                                    Reviewed
                                                @else
                                                    Not yet Reviewed
                                                @endif
                                            @endif

                                            @if (auth()->user()->hasrole(['Admin', 'HR']))
                                                {{ $emp->is_manager_submitted ? 'Reviewed' : 'Not yet Reviewed' }}
                                            @endif
                                        </td>
                                        <td class="">{{ $emp['ranking'] }}</td>
                                        <td>
                                            <a target="_blank"
                                                href="{{ url('vmt-pmsappraisal-review?id=' . $emp->kpi_table_id . '&user_id=' . $emp->userid) }}"><button
                                                    class="btn btn-orange py-0 px-2 "> <span class="mr-10 icon"></span>

                                                    Review</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @endif
        </div>
    </div>

    <div id="add-goals-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header py-3 new-role-header d-flex align-items-center">
                    <h5 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">
                        New Assign Goals</h5>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-md profile-box p-2 card-left-bar">
                        <div class="card-body">

                            <form id="goalForm">
                                <input type="hidden" name="goal_id" id="goal_id">
                                @csrf
                                <input type="hidden" name="kpitable_id" id="kpitable_id">
                                <input type="hidden" name="employees[]" id="sel_employees">
                                <input type="hidden" name="reviewer" id="sel_reviewer">
                                <input type="hidden" name="assignment_period_year" id="assignment_period_year"
                                    value="<?php echo date('Y'); ?>">

                                <div class="row ">
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">

                                        <label class="" for="calendar_type">Calendar Type</label>
                                        <select name="calendar_type" id="calendar_type" class="form-control">
                                            <option value="">Select</option>
                                            <option name="financial_year" value="financial_year">Financial Year</option>
                                            <option name="calendar_year" value="calendar_year">Calendar Year</option>
                                        </select>

                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">

                                        <label class="" for="year">Year</label>
                                        <input type="hidden" name="hidden_calendar_year" id="hidden_calendar_year"
                                            value="">

                                        <select name="year" id="year" disabled class="form-control">
                                            <option value="">Select</option>
                                            <option value="Jan-Dec">January - <?php echo date('Y'); ?> to December -
                                                <?= date('Y') ?> </option>
                                            <option value="Apr-Mar">April - <?php echo date('Y'); ?> to March -
                                                <?= date('Y') + 1 ?></option>
                                        </select>

                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">

                                        <label class="" for="frequency">Frequency</label>
                                        <select name="frequency" id="frequency" class="form-control">
                                            <option value="">Select</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <option value="halfYearly">Half Yearly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>

                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">

                                        <label class="" for="assignment_period_start">Assignment Period</label>
                                        <select name="assignment_period_start" id="assignment_period_start"
                                            class="form-control">
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">
                                        <label class="" for="department">Department</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $dept)
                                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3 ">
                                        <label class="" for="">Employees</label>
                                        <input type="text" name="" id="selected_employee"
                                            target="#changeEmployee" class="form-control  increment-input"
                                            placeholder="Employees">
                                        <button type="button" id=""
                                            class="btn btn-primary increment-btn py-1 px-2 chnageButton">+</button>
                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">
                                        <label class="" for="">Reviewer</label>
                                        <input type="text" name="" id="selected_reviewer"
                                            class="form-control increment-input" placeholder="Reviewer">
                                        <button type="button" id="" target="#createEmployee"
                                            class="btn py-1 px-3 btn-primary increment-btn reviewerButton">Select</button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 mt-3 mb-3 d-flex ml-5">

                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                    <div class="card  profile-box p-2 card-left-bar ">
                        <div class="card-body ">
                            <div class="table-wrapper m-2">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>Goals / Areas of development</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="container-fluid mb-1 mt-3 ">
                                            {{-- <form id="kpiTableForm"> --}}
                                                @csrf
                                                <label>Select existing form from the Dropdown</label>
                                                <select name="selected_kpi_form_id" class="form-control mb-2">
                                                    <option value="">Select KPI Form</option>
                                                    @foreach ($existingKPIForms as $kpiForm)
                                                        <option value="{{ $kpiForm->id }}">{{ $kpiForm->form_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                            <div class="align-items-center justify-content-end d-flex mt-2 cursor-pointer">
                                                <a href="{{ route('showKPICreateForm') }}" target="_blank"><span
                                                        class="plus-sign text-info "><i class="fa fa-plus f-20"></i>Create
                                                        KPI Form</span></a>
                                            </div>

                                            <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                                                <button class="btn btn-primary ml-2" id="publish-goal"
                                                    >Publish</button>
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

    <!-- Change Reviewer window -->

    <div class="modal fade" id="createEmployee" role="dialog" aria-hidden="true"
        style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Change Reviewer
                        </h5>
                        <button type="button" class="btn-close btn-close-white close-reviewerButton"
                            data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="form_selectReviewer" method="POST">
                        @csrf
                        <label for="FormSelectDefault" class="form-label text-muted">Reviewer</label>
                        <div class="mb-3 row scrollbar" id="select-reviewer">
                            <!-- <select class="form-select mb-3" aria-label="Default select example" name="reviewer[]" multiple id="select-reviewer" > -->
                                <ul>
                                    <li>
                                        @foreach ($employees as $singleEmployee)
                               {{--  <div class="col-3"> --}}
                        <input type="checkbox" name="reviewer{{ $singleEmployee->id }}" id="reviewer{{ $singleEmployee->id }}" value="{{ $singleEmployee->id }}" class="mr-1 reviewer">&nbsp;{{ $singleEmployee->emp_name }}
                    </br>
                        {{-- <option value="{{ $singleEmployee->id }}">  {{ $singleEmployee->name }}</option> --}}
                                {{-- </div> --}}
                            @endforeach
                                    </li>
                                </ul>
                            {{-- @foreach ($employees as $singleEmployee)
                                <div class="col-3">
                                    <input type="checkbox" name="reviewer{{ $singleEmployee->id }}"
                                        id="reviewer{{ $singleEmployee->id }}" value="{{ $singleEmployee->id }}"
                                        class="mr-1 reviewer">{{ $singleEmployee->emp_name }}
                                    <option value="{{ $singleEmployee->id }}">{{ $singleEmployee->name }}</option>
                                </div>
                            @endforeach --}}
                            <!-- </select> -->
                        </div>
                        <div class="content-footer mt-3">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="d-flex">
                                        <ul class="nav nav-pills w-100 mb-4" id="pills-tab" role="tablist">
                                            <li class="nav-item d-flex w-100 align-items-center justify-content-end"
                                                role="presentation">

                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Save
                                                </button>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- add employee  Modal-->
    </div>

    <!-- Vertically Centered -->
    <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true"
        style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="modalHeader">Success
                        </h5>
                        <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mt-4">
                        <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                        <p class="text-muted mb-4" id="modalBody"> Table Saved, Please publish goals.</p>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light close-modal"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Select Employees window -->
    <div class="modal fade" id="changeEmployee" style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">

            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Select Employees
                        </h5>
                        <button type="button" class="btn-close btn-close-white close-changeEmployee"
                            data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="modal-body">

                    <form id="changeEmployeeForm" method="POST">
                        @csrf
                        <label for="FormSelectDefault" class="form-label text-muted">Employees</label>
                        <div class="mb-3 row" id="select-employees">
                            <!-- <select class="form-select mb-3" aria-label="Default select example" name="employees[]" id="select-employees" multiple>

                        </select> -->
                         <ul>
                                    <li>
                                        @foreach ($employees as $singleEmployee)
                               {{--  <div class="col-3"> --}}
                        <input type="checkbox" name="emp{{ $singleEmployee->id }}" id="emp{{ $singleEmployee->id }}" value="{{ $singleEmployee->id }}" class="mr-1 emp">&nbsp;{{ $singleEmployee->emp_name }}
                    </br>
                        {{-- <option value="{{ $singleEmployee->id }}">  {{ $singleEmployee->name }}</option> --}}
                                {{-- </div> --}}
                            @endforeach
                                    </li>
                                </ul>
                        </div>

                        <div class="content-footer">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="d-flex">
                                        <ul class="nav nav-pills w-100 mb-4" id="pills-tab" role="tablist">
                                            <li class="nav-item d-flex w-100 align-items-center justify-content-end "
                                                role="presentation">

                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Save
                                                </button>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- add employee  Modal-->
    </div>


    <!-- Error Message Notification -->

    <div style="z-index: 11">
        <div id="errorMessageNotif1" class="toast toast-border-danger overflow-hidden mt-3" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-alert-line align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">Something is very wrong! <a href="javascript:void(0);"
                                class="text-decoration-underline">See detailed report.</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--  -->
@endsection

@section('script')
    <!-- Prem assets -->
    <!--Nice select-->
    <script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

    <!--Custom Js Script-->
    <script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/dashboard.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/footable.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/css/footable.bootstrap.min.css') }}"></script>


    <!-- Prem assets ends -->

    <!-- for date and time -->
    < <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $('#select-reviewer').select2({
            //     dropdownParent: '#createEmployee',
            //     minimumResultsForSearch: Infinity,
            // 	width: '100%'
            // });

            ft = FooTable.init('#kpiTable', {});

            $('body').on('keyup', '.bockquote', function() {
                var val = $(this).html();
                var id = $(this).attr('data-id');
                $('#' + id).val(val);
            })

            $(document).on('#select-reviewer:open', () => {
                $('.select2-search__field').focus();
            });

            $('#empTable').DataTable({
                //   'processing': true,
                //   'serverSide': true,
                //   'serverMethod': 'post',
                //   'ajax': {
                //       'url':'ajaxfile.php'
                //   },
                //   'columns': [
                //      { data: 'emp_name' },
                //      { data: 'email' },
                //      { data: 'gender' },
                //      { data: 'salary' },
                //      { data: 'city' },
                //   ]
            });

            $('#calendar_type').change(function() {
                if ($('#calendar_type').val() == 'financial_year') {
                    $('#year').val('Apr-Mar');
                } else
                if ($('#calendar_type').val() == 'calendar_year') {
                    $('#year').val('Jan-Dec');
                } else {
                    $('#year').val('');
                }
                $('#hidden_calendar_year').val($("#year option:selected").text())
                frequencyChange();
            });

            $('#frequency').change(function() {
                frequencyChange();
            });

            function frequencyChange() {
                var data = "";
                var year = "<?= date('Y') ?>";
                var nextyear = "<?= date('Y', strtotime('+1 year')) ?>";
                if ($('#frequency').val() == 'monthly') {

                    if ($('#calendar_type').val() == 'financial_year') {
                        data = "<option value=''>Select</option><option value='apr'>April - " + year +
                            "</option><option value='may'>May - " + year + "</option><option value='june'>June - " +
                            year + "</option><option value='july'>July - " + year +
                            "</option><option value='aug'>August - " + year +
                            "</option><option value='sept'>September - " + year +
                            "</option><option value='oct'>October - " + year +
                            "</option><option value='nov'>November - " + year +
                            "</option><option value='dec'>December - " + year +
                            "</option><option value='jan'>January - " + nextyear +
                            "</option><option value='feb'>February - " + nextyear +
                            "</option><option value='mar'>March - " + nextyear + "</option>";
                    } else {
                        data = "<option value=''>Select</option><option value='jan'>January - " + year +
                            "</option><option value='feb'>February - " + year +
                            "</option><option value='mar'>March - " + year +
                            "</option><option value='apr'>April - " + year + "</option><option value='may'>May - " +
                            year + "</option><option value='june'>June - " + year +
                            "</option><option value='july'>July - " + year +
                            "</option><option value='aug'>August - " + year +
                            "</option><option value='sept'>September - " + year +
                            "</option><option value='oct'>October - " + year +
                            "</option><option value='nov'>November - " + year +
                            "</option><option value='dec'>December - " + year + "</option>";
                    }
                } else if ($('#frequency').val() == 'quarterly') {
                    if ($('#calendar_type').val() == 'financial_year')
                        data = "<option value=''>Select</option><option value='q1'>Q1 " + year +
                        "(Apr-Jun)</option><option value='q2'>Q2 " + year +
                        "(July-Sept)</option><option value='q3'>Q3 " + year +
                        "(Oct-Dec)</option><option value='q4'>Q4 " + nextyear + "(Jan-Mar)</option>";
                    else
                        data =
                        "<option value=''>Select</option><option value='q1'>Q1(Jan-Mar)</option><option value='q2'>Q2(Apr-June)</option><option value='q3'>Q3(July-Sept)</option><option value='q4'>Q4(Oct-Dec)</option>";
                } else if ($('#frequency').val() == 'halfYearly') {
                    if ($('#calendar_type').val() == 'financial_year')
                        data = "<option value=''>Select</option><option value='h1'>H1(Apr " + year + " - Sept " +
                        year + ")</option><option value='h2'>H2(Oct " + year + "- Mar " + nextyear + ")</option>";
                    else
                        data =
                        "<option value=''>Select</option><option value='h1'>H1(Jan-June)</option><option value='h2'>H2(July-Dec)</option>";

                } else {
                    data = "<option value=''>Select</option><option value='yearly'>Yearly</option>";
                }
                $('#assignment_period_start').html(data);
            }
        });

        $(function() {
            $("#kpiTable").sortable({
                items: 'tr',
                cursor: 'pointer',
                axis: 'y',
                dropOnEmpty: false,
                start: function(e, ui) {
                    ui.item.addClass("selected");
                },
                stop: function(e, ui) {
                    ui.item.removeClass("selected");
                    $(this).find("tr").each(function(index) {
                        // if (index > 0) {
                        //     $(this).find("td").eq(1).html(index);
                        // }
                    });
                }
            });
        });
    </script>
    <script>
        // $("#select-reviewer").select2({
        //     dropdownParent: $("#createEmployee")
        // });
        $('.reviewerButton').click(function() {
            $('#createEmployee').show();
            $('#createEmployee').removeClass('fade');
        });
        $('.close-reviewerButton').click(function() {
            $('#createEmployee').hide();
            $('#createEmployee').addClass('fade');
        });
        $('.chnageButton').click(function() {
            $('#changeEmployee').show();
            $('#changeEmployee').removeClass('fade');
        });
        $('.close-changeEmployee').click(function() {
            $('#changeEmployee').hide();
            $('#changeEmployee').addClass('fade');
        });
        $('#add-goals').click(function() {
            $('#add-goals-modal').modal('show');
        });

        $('#changeEmployeeForm').on('submit', function(e) {
            e.preventDefault();
            changeEmployee();
        });

        $('#changeEmployeeForm').on('submit', function(e) {
            e.preventDefault();
             var userList = {!! json_encode($employees) !!};
            var employeeSelected = [];
            $.each($('.emp'), function() {
                // if ($(this).is(':checked')) {
                //     employeeSelected.push($(this).val());
                // }
                 if ($(this).is(':checked')) {
                    employeeSelected.push(parseInt($(this).val()));
                }
            });
             var employees = [];
            $("#sel_employees").val(employeeSelected);
            $.each(userList, function(i, data) {
                if ($.inArray(parseInt(data.id), employeeSelected) > -1) {
                    // if(data.id == $('#select-employees').val()){
                    employees.push(data.emp_name);
                    // $('#reviewer-name').html(data.name);
                    // $('#reviewer-email').html(data.email);

                    //  $('#btn_changeManager').html("Edit");
                }
            });

            $('#selected_employee').val(employees.join());
            $.ajax({
                type: "GET",
                url: "{{ url('vmt-getAllParentReviewer') }}" + '?emp_id=' + employeeSelected,
                success: function(data) {
                    var reviewerId = [];
                    var reviewer = [];
                    $.each(data, function(i, tempdata) {
                        reviewer.push(tempdata.name);
                        reviewerId.push(tempdata.id);
                    });
                    var rev = {!! json_encode($employees) !!};

                    var optionHtml = "";
                    $.each(rev, function(i, tempdata) {
                        if ($.inArray(parseInt(tempdata.id), reviewerId) > -1 && !$.inArray((
                                tempdata.id).toString(), employeeSelected) > -1) {
                            optionHtml = optionHtml +
                                "<div class='col-3'><input type='checkbox' name='reviewer" +
                                tempdata.id + "' id='reviewer" + tempdata.id + "' value=" +
                                tempdata.id + " class='reviewer mr-1' checked>" + tempdata
                                .emp_name + "</div>";
                        } else {
                            optionHtml = optionHtml +
                                "<div class='col-3'><input type='checkbox' name='reviewer" +
                                tempdata.id + "' id='reviewer" + tempdata.id + "' value=" +
                                tempdata.id + " class='reviewer mr-1'>" + tempdata.emp_name +
                                "</div>";
                        }
                    });

                    $('#select-reviewer').html(optionHtml);

                    $.each($('.reviewer'), function() {
                        if($.inArray(parseInt($(this).val()), reviewerId) > -1){
                            $(this).attr('checked', true);
                        } else {
                            $(this).removeAttr('checked');
                        }
                    });
                    $('#select-reviewer').val(reviewerId).trigger('change');
                    $("#sel_reviewer").val(reviewerId.join());
                    $('#selected_reviewer').val(reviewer.join());

                }
            });
            changeReviewer();
          //  changeEmployee();
        });

        function changeReviewer() {
            var reviewerSelected = $('#select-reviewer').val();
            var reviewerSelected = [];

            $.each($('.reviewer'), function() {
                if ($(this).is(':checked')) {
                    reviewerSelected.push($(this).val());
                }
            });
            var reviewers = {!! json_encode($employees) !!};

            var reviewerArray = [];
            $("#sel_reviewer").val(reviewerSelected);
            $.each(reviewers, function(i, data) {
                if ($.inArray(data.id.toString(), reviewerSelected) > -1) {
                    reviewerArray.push(data.emp_name);
                }
            });
            $('#selected_reviewer').val(reviewerArray.join());
        }



        function changeEmployee() {
            var employeeSelected = $('#select-employees').val();
            var employeeSelected = [];
            var employees = {!! json_encode($employees) !!};

            var employeeArray = [];
            $.each($('.employee'), function() {
                if ($(this).is(':checked')) {
                    employeeSelected.push($(this).val());
                }
            });
            $("#sel_employees").val(employeeSelected);
            // var imgHtml ="";
            // var count = 0;
            $.each(employees, function(i, data) {
                if (data.id && $.inArray(data.id.toString(), employeeSelected) > -1) {
                    employeeArray.push(data.emp_name);
                    // if (count < 4) {
                    //     imgHtml = imgHtml+"<a class='avatar'><img src='assets/images/"+data.avatar+"' alt='' class='rounded-circle p-0'></a>";
                    // }
                    // count++;
                }
            });
            // if (count > 4) {
            //     imgHtml = imgHtml+"<span class='img-addition' style='background-color: rgb(134, 192, 106);width: 30px;height: 30px;font-size:12px;'> +"+count-3+" </span><div class='mt-1 message-content align-items-start d-flex flex-column  mx-2'><span id='group-employee'></span></div>";
            // }
            //Change button text based on employee selection count
            // if(count > 0)
            // {
            //     $('#btn_selectEmployees').html("Edit");
            // }
            // else
            // {
            //     $('#btn_selectEmployees').html("Add");
            // }
            $.each($('.employee'), function(i, data) {
                if ($.inArray($(this).val().toString(), employeeSelected) > -1) {
                    $(this).attr('checked', true);
                } else {
                    $(this).removeAttr('checked');
                }
            });
            $('#selected_employee').val(employeeArray.join());
            $('#group-employee').html(employeeArray.join());
            $('#changeEmployee').css('display', 'none');
            // $('.avatar-group-item').html(imgHtml);
        }

        // select reviewer
        $('#form_selectReviewer').on('submit', function(e) {
            e.preventDefault();
            var userList = {!! json_encode($employees) !!};
            var selReviewer = [];
            $.each($('.reviewer'), function() {
                if ($(this).is(':checked')) {
                    selReviewer.push(parseInt($(this).val()));
                }
            });
            // var selReviewer = $('#select-reviewer').val();
            var reviewer = [];
            $("#sel_reviewer").val(selReviewer);
            $.each(userList, function(i, data) {
                if ($.inArray(parseInt(data.id), selReviewer) > -1) {
                    // if(data.id == $('#select-reviewer').val()){
                    reviewer.push(data.emp_name);
                    // $('#reviewer-name').html(data.name);
                    // $('#reviewer-email').html(data.email);

                    //  $('#btn_changeManager').html("Edit");
                }
            });
            $('#selected_reviewer').val(reviewer.join());
            $.ajax({
                type: "GET",
                url: "{{ url('vmt-pmsgetAllEmployees') }}" + '?emp_id=' + selReviewer,
                //data: $('#kpiTableForm').serialize(),
                success: function(data) {
                    var optionHtml = "";
                    $.each(data, function(i, tempdata) {
                        if ($.inArray(tempdata.id, selReviewer) > -1) {
                            // optionHtml = optionHtml+"<option value="+tempdata.id+" selected>"+tempdata.name+"</option>";
                            optionHtml = optionHtml +
                                "<div class='col-3'><input type='checkbox' name='employees" +
                                tempdata.id + "' id='employees" + tempdata.id + "' value=" +
                                tempdata.id + " class='employee mr-1'>" + tempdata.name +
                                "</div>";
                        } else {
                            optionHtml = optionHtml +
                                "<div class='col-3'><input type='checkbox' name='employees" +
                                tempdata.id + "' id='employees" + tempdata.id + "' value=" +
                                tempdata.id + " class='employee mr-1' checked>" + tempdata
                                .name + "</div>";
                        }
                        //if(tempdata.id == $('#select-employees').val()){
                        //        $('#reviewer-name').html(tempdata.name);
                        //        $('#reviewer-email').html(tempdata.email);
                        //}
                    });

                    $('#select-employees').html(optionHtml);
                    // $("#kpiTableForm :input").prop("disabled", true);
                    // $(".table-btn").prop('disabled', true);
                    //alert("Table Saved, Please publish goals");
                    // $("#kpitable_id").val(data.table_id);
                    changeEmployee();
                }
            });


            $('#createEmployee').css('display', 'none');
        });

        $('body').on('click', '.close-modal', function() {
            $('#notificationModal').hide();
            $('#notificationModal').addClass('fade');
        })



        $('body').on('change', '#department', function() {
            $.ajax({
                type: "POST",
                url: "{{ route('department') }}",
                data: {
                    'id': $('#department').val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    var optionHtml = "";
                    var empSelected = [];
                    $.each(data['emp'], function(i, tempdata) {
                        empSelected.push(tempdata.id);
                        // optionHtml = optionHtml+"<option value="+tempdata.id+" selected>"+tempdata.name+"</option>";
                        optionHtml = optionHtml +
                            "<div class='col-3'><input type='checkbox' name='employees" +
                            tempdata.id + "' id='employees" + tempdata.id + "' value=" +
                            tempdata.id + " class='employee mr-1' checked>" + tempdata.name +
                            "</div>";
                    });

                    $('#select-employees').html(optionHtml);
                    // if (data['rev']) {
                    var reviewer = [];
                    var reviewerId = [];
                    $.each(data['rev'], function(i, val) {
                        reviewer.push(val.name);
                        reviewerId.push(val.id);
                        // $('#reviewer-name').html(data['rev'].name);
                        // $('#reviewer-email').html(data['rev'].email);
                    });
                    $("#sel_reviewer").val(reviewerId.join());
                    $('#selected_reviewer').val(reviewer.join());
                    $('#select-employees').val(employees.join());

                    // $.each($('.reviewer'), function() {

                    //     if($.inArray(parseInt($(this).val()), reviewerId) > -1){
                    //         $(this).attr('checked', true);
                    //     } else {
                    //         $(this).removeAttr('checked');
                    //     }
                    // });
                    changeEmployee1(data['emp']);
                    var rev = {!! json_encode($employees) !!};
                    var optionHtml = "";
                    $.each(rev, function(i, tempdata) {
                        if ($.inArray(tempdata.id, reviewerId) > -1 && !$.inArray(tempdata.id,
                                reviewerId) > -1) {
                            optionHtml = optionHtml +
                                "<div class='col-3'><input type='checkbox' name='reviewer" +
                                tempdata.id + "' id='reviewer" + tempdata.id + "' value=" +
                                tempdata.id + " class='reviewer mr-1' checked>" + tempdata
                                .emp_name + "</div>";
                        } else {
                            optionHtml = optionHtml +
                                "<div class='col-3'><input type='checkbox' name='reviewer" +
                                tempdata.id + "' id='reviewer" + tempdata.id + "' value=" +
                                tempdata.id + " class='reviewer mr-1'>" + tempdata.emp_name +
                                "</div>";
                        }
                    });
                    $('#select-reviewer').html(optionHtml);


                    // $('#select-reviewer').val(reviewer).trigger('change');

                }
            });
        });

        function changeEmployee1(employees) {
            // var employeeSelected = $('#select-employees').val();
            var employeeSelected = [];
            $.each($('.employee'), function() {
                if ($(this).is(':checked')) {
                    employeeSelected.push($(this).val());
                }
            });
            @if (auth()->user()->hasrole('Employee'))
            @else
                // var imgHtml ="";
                // var count = 0;
                var employeeArray = [];
                var employeeIdArray = [];
                $.each(employees, function(i, data) {
                    if ($.inArray(data.id.toString(), employeeSelected) > -1) {
                        employeeArray.push(data.name);
                        employeeIdArray.push(data.id);
                        // if (count < 4) {
                        //     imgHtml = imgHtml+"<a class='avatar'><img src='assets/images/"+data.avatar+"' alt='' class='rounded-circle p-0'></a>";
                        // }
                        // count++;
                    }
                });

                $("#sel_employees").val(employeeIdArray.join());
                $('#selected_employee').val(employeeArray.join());
                $('#group-employee').html(employeeArray.join());
                $('#changeEmployee').css('display', 'none');
                // $('.avatar-group-item').html(imgHtml);
            @endif
        }

        //
        $("#publish-goal").click(function(e) {
            e.preventDefault();

            // if ($('#kpitable_id').val()) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('publishKPIForm') }}",
                    data: $('#goalForm').serialize(),
                    success: function(data) {

                        $("#kpiTableForm :input").prop("disabled", true);
                        $(".table-btn").prop('disabled', true);

                        @if (auth()->user()->hasrole('Employee'))
                            $('#modalBody').html("Goals published. Email Sent to your Manager");
                            $('#notificationModal').show();
                            $('#notificationModal').removeClass('fade');
                        @else
                            $('#modalBody').html("Goals published. Email Sent to your Employees");
                            $('#notificationModal').show();
                            $('#notificationModal').removeClass('fade');
                        @endif

                        $("kpitable_id").val(data.table_id);
                    }
                })
            // } else {
            //     $('#modalBody').html("Please publish table first");
            //     $('#modalHeader').html("Failed");
            //     $('#modalNot').html("Failed to save Data");
            //     $('#notificationModal').show();
            //     $('#notificationModal').removeClass('fade');
            // }

        });
    </script>
@endsection
