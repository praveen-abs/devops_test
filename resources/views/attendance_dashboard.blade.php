@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/attendance.css') }}">
@endsection

@section('content')

    <div class="cotainer-fluid attandance-wrapper mt-30">
        <div class="card mb-2">
            <div class="py-1 card-body">

                <div class="row">
                    <div class="col-8 d-flex align-items-center">
                        <ul class="nav nav-pills nav-tabs-dashed">
                            <li class="nav-item text-muted">
                                <a class="nav-link active pb-2" data-bs-toggle="tab" href="#attendance_summary">Attendance
                                    Summary</a>
                            </li>
                            <li class="nav-item text-muted ">
                                <a class="nav-link pb-2" data-bs-toggle="tab" href="#attendance_analytics">Attendance
                                    Analytics</a>
                            </li>
                            <li class="nav-item text-muted ">
                                <a class="nav-link pb-2" data-bs-toggle="tab" href="#leave_summary">Leave Summary</a>
                            </li>
                            <li class="nav-item text-muted ">
                                <a class="nav-link pb-2" data-bs-toggle="tab" href="#leave_analytics">Leave Analytics</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="tab-content">
            <div id="attendance_summary" class="tab-pane fade show active">
                <div class="card  top-line">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-12 col-xl-8 col-md-8 col-lg-8">
                                <h6 class="text-left fw-bold">Today's Attendance Status</h6>
                            </div>
                            <div class="col-2  text-md-end text-center">

                                <select name="" id="" class="form-select border-orange disabled_focus">
                                    <option value="" selected hidden disabled>Department</option>
                                </select>

                            </div>
                            <div class="col-2  text-md-start text-center">
                                <select name="" id="" class="form-select border-orange  disabled_focus">
                                    <option value="" selected hidden disabled>Locations</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card  box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Total Active Employees</p>
                                        <h5 class="mb-0">{{ $Total_Active_Employees }}</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Early/On Time Arrivals</p>
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
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Late Arrivals</p>
                                        <h5 class="mb-0">-</h5>
                                        <div class="text-right">
                                            <button type="button"
                                                class="btn px-2 py-0 border_radius_3 btn-orange"data-bs-toggle="modal"
                                                data-bs-target="#lateArraivals_modal">
                                                <i class="fa fa-file-text-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 "> Absenteeism</p>
                                        <h5 class="mb-0">-</h5>
                                        <div class="text-right">
                                            <button type="button"
                                                class="btn px-2 py-0 border_radius_3 btn-orange"data-bs-toggle="modal"
                                                data-bs-target="#arrivals_modal">
                                                <i class="fa fa-file-text-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Work From Home</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">On Duty</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Remote Clock-In</p>
                                        <h5 class="mb-0">-</h5>
                                        <div class="text-right">
                                            <button type="button" class="btn px-2 py-0 border_radius_3 btn-orange"
                                                data-bs-toggle="modal" data-bs-target="#remorteClock_modal">
                                                <i class="fa fa-file-text-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Holiday/Week Off</p>
                                        <h5 class="mb-0">-</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card top-line mb-0">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-10 col-xl-10 col-md-10 col-lg-10">
                                <h6 class="text-left fw-bold">Attendance for Past Dates</h6>
                            </div>
                            <div class="col-sm-2 col-xl-2 col-md-2 col-lg-2">
                                <select name="" id="" class="form-select border-orange disabled_focus">
                                    <option value="" selected hidden disabled>Choose Week</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Employees Present</p>
                                        <p class="text-ash  f-13 mb-0"> %age of employees that were present
                                            during the selected duration.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Avg. Work Hours Spent</p>
                                        <p class="text-ash mb-0 f-13 ">Avg. effective hours spent by employees
                                            during the selected duration.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Avg. Overtime Hours</p>
                                        <p class="text-ash mb-0 f-13 "> Avg. OT hours worked by employees during
                                            the selected duration.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card box_shadow_0 border-rtb  left-line w-100">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Total Attendance Discrepancies</p>
                                        <p class="text-ash mb-0 f-13 ">Total penalizations due to attendance
                                            discrepancies
                                            during selected period.</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
                            <h6 class="text-left fw-bold">Employees Arrival Status </h6>
                        </div>

                        <div class="row ">
                            <div class="col-sm-10 col-xl-10 col-md-10 col-lg-10">
                                <ul class="nav nav-pills button_tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills_employeeCount" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">Employee
                                            Count</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills_employeePercentage" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Employee
                                            Percentage</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xl-2 col-md-2 col-lg-2">
                                <select name="" id="" class="border-orange form-select disabled_focus">
                                    <option value="" selected hidden disabled>Export</option>
                                </select>
                            </div>
                        </div>



                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane show fade active" id="pills_employeeCount" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                {{-- <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="height: 300px;max-width:500px;" class="">
                                            <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                class="h-100 w-100" alt="user-pic" </div>
                                        </div>

                                    </div>
                                    <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                </div> --}}
                                <div class="col-10 mx-auto">
                                    <canvas id="employeeCountChart" style="width:100%;height:300px"></canvas>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="pills_employeePercentage" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="col-10 mx-auto">
                                    <canvas id="employeePercentageChart" style="width:100%;height:300px"></canvas>
                                </div>
                            </div>



                        </div>

                    </div>

                </div>
            </div>
            <div id="attendance_analytics" class="tab-pane fade show">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-tabs-dashed card-header-tabs mb-3">
                            <li class="nav-item text-muted">

                                <a class="nav-link pb-2 active" data-bs-toggle="tab"href="#mostHour_worked"
                                    aria-selected="true" role="tab">
                                    Most hour worked</a>
                            </li>

                            <li class="nav-item text-muted">

                                <a class="nav-link pb-2 " data-bs-toggle="tab"href="#overtime_hours"
                                    aria-selected="true" role="tab">
                                    Overtime Hours</a>
                            </li>
                            <li class="nav-item text-muted">

                                <a class="nav-link pb-2 " data-bs-toggle="tab"href="#leastHours_worked"
                                    aria-selected="true" role="tab">
                                    Least Hours Worked</a>
                            </li>
                            <li class="nav-item text-muted">

                                <a class="nav-link pb-2 " data-bs-toggle="tab"href="#mostHour_worked"
                                    aria-selected="true" role="tab">
                                    Most hour worked</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="mostHour_worked" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <h6 class="mb-3 text-muted">Most Hours Worked by Department</h6>
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <ul class="nav nav-pills nav-tabs-dashed card-header-tabs">
                                            <li class="nav-item text-muted">


                                                <a class="nav-link pb-2 active "
                                                    data-bs-toggle="tab"href="#employeeCount_chart" aria-selected="true"
                                                    role="tab">
                                                    Employee
                                                    Count</a>
                                            </li>
                                            <li class="nav-item text-muted">

                                                <a class="nav-link pb-2 "
                                                    data-bs-toggle="tab"href="#emplyeePercentage_chart"
                                                    aria-selected="true" role="tab">
                                                    Employee
                                                    Percentage</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-2">

                                        <select name="" id=""
                                            class="border-orange form-select disabled_focus">
                                            <option value="" selected hidden disabled>Choose Week</option>
                                        </select>

                                    </div>
                                    <div class="col-2 ">

                                        <select name="" id=""
                                            class="border-orange form-select disabled_focus">
                                            <option value="" selected hidden disabled>Export</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="employee_count_percentage-chart">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="employeeCount_chart"
                                                    role="tabpanel">
                                                    <div class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <div style="height: 300px;max-width:500px;" class="">
                                                                <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                                    class="h-100 w-100" alt="user-pic" </div>
                                                            </div>

                                                        </div>
                                                        <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade " id="emplyeePercentage_chart" role="tabpanel">
                                                    <div class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <div style="height: 300px;max-width:500px;" class="">
                                                                <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                                    class="h-100 w-100" alt="user-pic" </div>
                                                            </div>

                                                        </div>
                                                        <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="overtime_hours" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="height: 300px;max-width:500px;" class="">
                                            <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                class="h-100 w-100" alt="user-pic" </div>
                                        </div>

                                    </div>
                                    <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="leastHours_worked" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="height: 300px;max-width:500px;" class="">
                                            <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                class="h-100 w-100" alt="user-pic" </div>
                                        </div>

                                    </div>
                                    <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mostBreaks_taken" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="height: 300px;max-width:500px;" class="">
                                            <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                class="h-100 w-100" alt="user-pic" </div>
                                        </div>

                                    </div>
                                    <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card top-line mb-0  ">
                    <div class="card-body">
                        <h6 class="text-left fw-bold mb-3">Avg Work Hours Leaderboard</h6>
                        <div class="col-md-12 d-flex justify-content-between mb-3">
                            <div class="d-flex space-around-between">
                                <button class="filter-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="btn selection-btn">Business Unit</button>
                                <button class="btn selection-btn">Department</button>
                                <button class="btn selection-btn">Location</button>
                                {{-- <button class="total-btn">Total <span>40</span></button> --}}
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div id="leaveAnalytics_table"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="leave_summary" class="tab-pane fade">
                <div class="card top-line">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-12 col-xl-8 col-md-8 col-lg-8">
                                <h6 class="text-left fw-bold">Today's Leave Status</h6>
                            </div>
                            <div class="col-2  text-md-end text-center">

                                <select name="" id="" class="form-select border-orange disabled_focus">
                                    <option value="" selected hidden disabled>Department</option>
                                </select>

                            </div>
                            <div class="col-2  text-md-start text-center">
                                <select name="" id="" class="form-select border-orange  disabled_focus">
                                    <option value="" selected hidden disabled>Locations</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card  box_shadow_0 border-rtb left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Paid Leave</p>
                                        <h5 class="mb-0">-</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card  box_shadow_0 border-rtb left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Unpaid Leave</p>
                                        <h5 class="mb-0">-</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card  box_shadow_0 border-rtb left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 ">Sick Leave</p>
                                        <h5 class="mb-0">-</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 d-flex">
                                <div class="card  box_shadow_0 border-rtb left-line w-100 mb-0">
                                    <div class="card-body text-center">
                                        <p class="text-ash-medium mb-2 f-13 "></p>
                                        <h5 class="mb-0">-</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card top-line mb-0  ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10 col-xl-10 col-md-10 col-lg-10">
                                <h6 class="text-left fw-bold">Leave for Past Dates</h6>
                            </div>
                            <div class="col-sm-2 col-xl-2 col-md-2 col-lg-2">
                                <button type="button" class="btn btn-orange">
                                    Aug 20 - Aug 26
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        style="margin-left:10px;" fill="currentColor" class="bi bi-calendar-date"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z">
                                        </path>
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 ">
                                <div class="card mb-0 box_shadow_0 border-rtb left-line ">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Employees On Leave</p>
                                        <p class="text-ash f-11 ">
                                            %age of employees that were on leave
                                            during
                                            the selected duration</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3 ">
                                <div class="card mb-0  box_shadow_0 border-rtb left-line ">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Avg Leave Taken</p>
                                        <p class="text-ash f-11 ">Avg leave taken by an employee during
                                            the
                                            selected duration.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3">
                                <div class="card mb-0  box_shadow_0 border-rtb left-line">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Total Leave Balance</p>
                                        <p class="text-ash f-11 ">Balance available with employee
                                            irrespective of
                                            selected date range.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-12 col-xl-3 col-md-4 col-lg-3">
                                <div class="card mv-0  box_shadow_0 border-rtb left-line">
                                    <div class="card-body text-center">
                                        <h5 class="mb-0">-</h5>
                                        <p class="text-ash-medium mb-2 f-13 ">Unplaned Leave Taken</p>
                                        <p class="text-ash f-11 ">Total leave applied for after the leave
                                            has been
                                            consumed/taken.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
                            <h6 class="text-left fw-bold">Employees Arrival Status </h6>
                        </div>
                        <div class="row">
                            <div class="col-6 d-flex">
                                <button class="btn btn-primary">Employee Count</button>
                                <button class="btn btn-custom-secondary">Employee Percentage</button>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-orange ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="svg-custom-icontwo bi bi-file-earmark"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                        </path>
                                    </svg>
                                    <span style="vertical-align: text-top;">Export</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="svg-custom-iconone bi bi-chevron-down"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div id="leave_analytics" class="tab-pane fade">
                <div class="card top-line mb-0">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-12">

                                <ul class="nav nav-pills nav-tabs-dashed">
                                    <li class="nav-item text-muted">
                                        <a class="nav-link active pb-2" data-bs-toggle="tab" href="#">
                                            Most Taken Leave</a>
                                    </li>
                                    <li class="nav-item text-muted ">
                                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#">Unplaned Leave
                                            Taken</a>
                                    </li>
                                    <li class="nav-item text-muted ">
                                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#">Leave Balance
                                            Available</a>
                                    </li>
                                    {{-- <li class="nav-item text-muted ">
                                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#">Most Breaks
                                            Taken</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <h6 class="text-muted my-2">Most Hours Worked by Department</h6>
                            </div>
                            <div class="col-10">


                                <ul class="nav nav-pills nav-tabs-dashed">
                                    <li class="nav-item text-muted">
                                        <a class="nav-link active pb-2" data-bs-toggle="tab"
                                            href="#attendance_summary">Attendance
                                            Summary</a>
                                    </li>
                                    <li class="nav-item text-muted ">
                                        <a class="nav-link pb-2" data-bs-toggle="tab"
                                            href="#attendance_analytics">Attendance
                                            Analytics</a>
                                    </li>

                                </ul>
                            </div>


                            <div class="col-2 ">

                                <select name="" id="" class="border-orange form-select disabled_focus">
                                    <option value="" selected hidden disabled>Export</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="employee_count_percentage-chart">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="employeeCount_chart" role="tabpanel">
                                            <div class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div style="height: 300px;max-width:500px;" class="">
                                                        <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                            class="h-100 w-100" alt="user-pic" </div>
                                                    </div>

                                                </div>
                                                <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="emplyeePercentage_chart" role="tabpanel">
                                            <div class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div style="height: 300px;max-width:500px;" class="">
                                                        <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}"
                                                            class="h-100 w-100" alt="user-pic" </div>
                                                    </div>

                                                </div>
                                                <h4> <span class="text-orange">Sorry !</span> No data</h4>
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

        <div id="earlyTimeArivals_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
                <div class="modal-content top-line">
                    <div class="modal-header py-2 border-0">
                        <h6 class="modal-title mb-1 text-primary">
                            Early/On Time Arrivals</h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="earlyArrivals_table" id="earlyArrivals_table"></div>

                        {{-- <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/Fingerprint.gif') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry..!</span> No data</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>


        <div id="lateArraivals_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
                <div class="modal-content top-line">
                    <div class="modal-header py-2 border-0">
                        <h6 class="modal-title mb-1 text-primary">
                            Late Arrivals</h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="lateArrivals_table" id="lateArrivals_table"></div>
                        {{-- <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/Fingerprint.gif') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry..!</span> No data</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="arrivals_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
                <div class="modal-content top-line">
                    <div class="modal-header py-2 border-0">
                        <h6 class="modal-title mb-1 text-primary">
                            Arrivals</h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="absenteeism_table" id="absenteeism_table"></div>
                        {{-- <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/Fingerprint.gif') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry..!</span> No data</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="remorteClock_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
                <div class="modal-content top-line">
                    <div class="modal-header py-2 border-0">
                        <h6 class="modal-title mb-1 text-primary">
                            Remote Clock-In</h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="remoteClock_table" id="remoteClock_table"></div>
                        {{-- <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/Fingerprint.gif') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry..!</span> No data</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            if (document.getElementById("leaveAnalytics_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'employee',
                            name: 'Employee',

                        },
                        {
                            id: 'unit',
                            name: 'Business Unit',
                        },
                        {
                            id: 'department',
                            name: 'Department',
                        },
                        {
                            id: 'location',
                            name: ' location',
                        },
                        {
                            id: 'leave_instances',
                            name: 'Leave Instances',
                        },
                        {
                            id: '',
                            name: 'Total Leave Taken',
                        }


                    ],
                    data: [

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("leaveAnalytics_table"));
            }
        });
        $(document).ready(function() {
            if (document.getElementById("remoteClock_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'employee',
                            name: 'Employee Name',

                        },
                        {
                            id: 'unit',
                            name: 'Employee Code',
                        },
                        {
                            id: 'unit',
                            name: 'Manager Name',
                        },
                        {
                            id: 'department',
                            name: 'Time',
                        },
                        // {
                        //     id: 'location',
                        //     name: '',
                        // },
                        // {
                        //     id: 'leave_instances',
                        //     name: 'Leave Instances',
                        // },
                        // {
                        //     id: '',
                        //     name: 'Total Leave Taken',
                        // }


                    ],
                    data: [

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("remoteClock_table"));
            }
        });
        $(document).ready(function() {
            if (document.getElementById("leaveAnalytics_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'employee',
                            name: 'Employee',

                        },
                        {
                            id: 'unit',
                            name: 'Business Unit',
                        },
                        {
                            id: 'department',
                            name: 'Department',
                        },
                        {
                            id: 'location',
                            name: ' location',
                        },
                        {
                            id: 'leave_instances',
                            name: 'Leave Instances',
                        },
                        {
                            id: '',
                            name: 'Total Leave Taken',
                        }


                    ],
                    data: [

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("leaveAnalytics_table"));
            }
        });
        $(document).ready(function() {
            if (document.getElementById("leaveAnalytics_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'employee',
                            name: 'Employee',

                        },
                        {
                            id: 'unit',
                            name: 'Business Unit',
                        },
                        {
                            id: 'department',
                            name: 'Department',
                        },
                        {
                            id: 'location',
                            name: ' location',
                        },
                        {
                            id: 'leave_instances',
                            name: 'Leave Instances',
                        },
                        {
                            id: '',
                            name: 'Total Leave Taken',
                        }


                    ],
                    data: [

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("leaveAnalytics_table"));
            }
        });
        $(document).ready(function() {
            if (document.getElementById("leaveAnalytics_table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'employee',
                            name: 'Employee',

                        },
                        {
                            id: 'unit',
                            name: 'Business Unit',
                        },
                        {
                            id: 'department',
                            name: 'Department',
                        },
                        {
                            id: 'location',
                            name: ' location',
                        },
                        {
                            id: 'leave_instances',
                            name: 'Leave Instances',
                        },
                        {
                            id: '',
                            name: 'Total Leave Taken',
                        }


                    ],
                    data: [

                    ],
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("leaveAnalytics_table"));
            }
        });


        // for chart


        var yLabels = {
            0: '9:00 AM',
            2: '10:00 AM',
            4: '11:00 AM',
            6: '12:00 PM',
            8: '1:00 PM',
            10: '2:00 PM',
            12: '3:00 PM',
            14: '4:00 PM',
            16: '5:00 PM',
            18: '6:00 PM',

        }

        var ctx = document.getElementById("employeeCountChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["ENBL001", "ENBL002", "ENBL003", "ENBL004", "ENBL005", "ENBL005", "ENBL007", "ENBL008",
                    "ENBL009", "ENBL0010", "ENBL0011", "ENBL0012", "ENBL0013", "ENBL0014", "ENBL0015"
                ],
                datasets: [{
                    data: [12, 19, 3, 10, 12, 19, 3, 10, 12, 19, 3, 10, 20, 10, 12],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',


                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return yLabels[value];
                            }
                        }
                    }]
                },
                title: {
                    display: true,
                    // text: 'Employees Arrival Status Chart'
                }
            }
        });

        var xLabels =  ["ENBL001", "ENBL002", "ENBL003", "ENBL004", "ENBL005", "ENBL005", "ENBL007", "ENBL008",
                    "ENBL009", "ENBL0010", "ENBL0011", "ENBL0012", "ENBL0013", "ENBL0014", "ENBL0015"];
        var donut = document.getElementById("employeePercentageChart");
        var myChart = new Chart(donut, {
            type: 'doughnut',
            data: {
                labels:xLabels,
                datasets: [{
                    data: [20, 50, 100,30,10,44,90,100,200,50,120,150,60,54,10],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(200, 205, 86)',
                        'rgb(210, 25, 16)',
                        'rgb(100, 25, 96)',
                        'rgb(45, 205, 86)',
                        'rgb(60, 215, 56)',
                        'rgb(10, 245, 16)',
                        'rgb(90, 215, 76)',
                        'rgb(30, 200, 86)',
                        'rgb(233, 93, 100)',
                        'rgb(190, 100, 86)',
                        'rgb(200, 205, 86)',
                    ],
                    hoverOffset: 4

                }]
            },
            options: {
                legend: {
                    display: true,
                },

                title: {
                    display: true,
                    // text: 'Employees Arrival Status Chart'
                }
            }
        });
    </script>
@endsection
