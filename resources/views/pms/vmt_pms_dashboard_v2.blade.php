@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/css/assign_goals.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
    <!--Animate CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
    <!--Map-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css" rel="stylesheet" />
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

.td_content_center {
    text-align: center;
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

.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('{{ URL::asset("assets/images/loader.gif") }}') 50% 50% no-repeat rgb(249, 249, 249);
    opacity: 0.4;
}

    .employees-profile{
        display: flex;
        align-items: center;
    }

    .employees-profile img{
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
        border: 1px solid #fff;
    }

    .employees-profile img:not(:first-child){
        margin-left: -13px;
    }
    .employees-card{
        background-color: #fff;
        border-radius: 20px;
        padding: 8px 5px;
    }

    .employees-profile.counting{
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
        border: 1px solid #fff;
        background-color: #ff4d00;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .employees-profile.editProfile{
        width: 60px;
        height: 40px;
        object-fit: cover;
        border-radius: 30%;
        border: 1px solid #fff;
        background-color: #ff4d00;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mr-10{
        margin-right: 0px !important;
    }

    .fa-refresh:hover {
        cursor: pointer;
    }
</style>
@endsection


@section('content')
    <div class="loader" style="display:none;"></div>
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
            @if(count($pmsKpiAssigneeDetails) == 0)
                <div class="mt-2 p-5" id="initial-section">
                    <div class="row ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2 p-5">
                            <div class="p-3 justify-content-center d-flex align-items-center" ><img src="{{ URL::asset('assets/images/assign_goals.png') }}"
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
                                    <td class="d-none">Serial No</td>
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
                                <!-- pms kpi assigned details foreach  -->
                                @foreach ($pmsKpiAssigneeDetails as $key1 => $pmsKpiAssignee)
                                    <!-- gte kpi pms assignee details like currentLoggedUserRole, $decoded assigneeIds and reviewersIds -->
                                    @php $pmsKpiAssigneeData = getPmsKpiAssigneeDetails($pmsKpiAssignee->id); @endphp
                                    <!-- pms kpi assigned details assignees ids foreach  -->
                                    @foreach($pmsKpiAssigneeData['assigneesIds'] as $key => $assigneeId)
                                    <!-- check if Role is Assignee then check Own assignee id otherwise will show all Assignees -->
                                    @if(($pmsKpiAssigneeData['currentLoggedUserRole'] == 'assignee' && $assigneeId==Auth::id()) || $pmsKpiAssigneeData['currentLoggedUserRole'] != 'assignee')
                                        <?php
                                            // get KpiPmsReview Details
                                            $kpiFormAssigneeReview = getReviewKpiFormDetails($pmsKpiAssignee->id,$assigneeId);
                                        ?>
                                        <tr>
                                            <td class="d-none">{{ $key1 }}</td>
                                            <td class=""> <div class="td_content_center">{{ $pmsKpiAssignee->getUserDetails($assigneeId)['userNames'] }}</div></td>
                                            <td class=""> <div class="td_content_center">{{ $pmsKpiAssignee->getUserDetails($assigneeId)['userEmpIds'] }}</div></td>
                                            <td class="">
                                                @foreach($pmsKpiAssigneeData['reviewersIds'] as $keyCheck => $reviewer)
                                                    @if($pmsKpiAssigneeData['currentLoggedUserRole'] == 'reviewer' && $reviewer == Auth::id())
                                                       
                                                            <div class="td_content_center">{{ getUserDetailsById($reviewer) }}</div>
                                                    @elseif($pmsKpiAssigneeData['currentLoggedUserRole'] != 'reviewer')
                                                        @if($keyCheck != 0)<br>@endif
                                                        <div class="td_content_center">{{ getUserDetailsById($reviewer) }}</div>
                                                    @endif
                                                @endforeach

                                            </td>
                                            <td class="">
                                                <div class="td_content_center">{{ strtoupper($pmsKpiAssignee->assignment_period) }}</div>
                                            </td>
                                            <td class="">
                                                <div class="td_content_center">
                                                    @if(isset($kpiFormAssigneeReview) && $kpiFormAssigneeReview->is_assignee_accepted == '0')
                                                        Rejected
                                                    @else
                                                        @if(isset($kpiFormAssigneeReview) && $kpiFormAssigneeReview->is_assignee_submitted == '1')
                                                            Submitted
                                                        @else
                                                            Not yet submitted
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="">

                                                <div class="td_content_center">
                                                    <?php echo checkCurrentLoggedUserReviewerOrNot($pmsKpiAssigneeData['reviewersIds'],$pmsKpiAssigneeData['currentLoggedUserRole'],$kpiFormAssigneeReview); ?>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="td_content_center">
                                                    <?php echo calculateOverallReviewRatings($pmsKpiAssignee->id,$assigneeId); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                $checkViewReviewText = checkViewReviewText($pmsKpiAssigneeData['currentLoggedUserRole'],$kpiFormAssigneeReview);
                                                ?>
                                                <div class="td_content_center">
                                                <a target="_blank" @if($checkViewReviewText == 'Edit') href="{{ route('republishForm',$pmsKpiAssignee->id) }}" @else href="{{ url('pms-showReviewPage?assignedFormid=' . $pmsKpiAssignee->id . '&assigneeId=' . $assigneeId) }}" @endif><button
                                                        class="btn btn-orange py-0 px-2 "> <span class="mr-10 icon"></span>
                                                        <?php
                                                        echo $checkViewReviewText;
                                                        ?>
                                                        </button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
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
                                <input type="hidden" name="flowCheck" id="flowCheck" value="{{ $flowCheck }}">
                                <input type="hidden" name="kpitable_id" id="kpitable_id">

                                <!-- <input type="hidden" name="reviewer" id="sel_reviewer"> -->
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
                                            <option value="Jan-Dec">January - <?php echo date('Y'); ?> to December - <?= date('Y') ?> </option>
                                            <option value="Apr-Mar">April - <?php echo date('Y'); ?> to March - <?= date('Y') + 1 ?></option>
                                        </select>

                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">

                                        <label class="" for="frequency">Frequency</label>
                                        <select name="frequency" id="frequency" class="form-control">

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

                                    <!-- employee Selection portion starts -->
                                    @if(isset($parentReviewerIds) && isset($parentReviewerNames))
                                        <!-- flow 1 -->
                                        <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">
                                            <label class="" for="">Employees</label>
                                            <input type="hidden" name="employees" value="{{ $loggedInUser->id }}">
                                            <input type="text" disabled class="form-control increment-input" placeholder="Employee" value="{{ $loggedInUser->name }}">
                                        </div>
                                    @else
                                        <!-- flow 2 & 3 -->
                                        <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3 ">
                                            <label class="" for="">Employees</label>
                                            <div class="employee-selection-section">

                                            </div>
                                            <input type="hidden" name="employees" id="employeesSelectedValues">
                                        </div>
                                    @endif
                                    <!-- employee Selection portion Ends -->

                                    <!-- Reviewer Selection Portion Starts -->
                                    @if(isset($parentReviewerIds) && isset($parentReviewerNames))
                                    <!-- flow 3 -->
                                        <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">
                                            <label class="" for="">Reviewer</label>
                                            <input type="hidden" name="reviewer" value="{{ $parentReviewerIds }}">
                                            <input type="text" disabled class="form-control increment-input" placeholder="Reviewer" value="{{ $parentReviewerNames }}">
                                        </div>
                                    @elseif(isset($loggedManagerEmployees))
                                    <!-- flow 2 -->
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">
                                        <label class="" for="">Reviewer</label>
                                        @if(isset($getSameLevelManagers) && count($getSameLevelManagers) > 0)
                                            <select class="select-reviewer-dropdown form-control" name="reviewer">
                                            @foreach($getSameLevelManagers as $sameLevelManager)
                                                <option @if($sameLevelManager->id == Auth::id()) selected @endif value="{{ $sameLevelManager->id }}">{{ $sameLevelManager->name }}</option>
                                            @endforeach
                                            </select>
                                        @else
                                            <input type="hidden" name="reviewer" value="{{ $loggedUserDetails->id }}">
                                            <input type="text" disabled class="form-control increment-input" placeholder="Reviewer" value="{{ $loggedUserDetails->name }}">
                                        @endif
                                    </div>
                                    @else
                                    <!-- flow 1 -->
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-3  mb-3">
                                        <label class="" for="">Reviewer</label>
                                        <select class="select-multiple-reviewer form-control" name="reviewer[]" multiple="multiple">
                                            @if(isset($allEmployeesList) && count($allEmployeesList) > 0)
                                                @foreach($allEmployeesList as $employeeData)
                                                    <option value="{{ $employeeData->id }}">{{ $employeeData->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">Select Reviewer</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-2 col-xl-1  mb-3">
                                        <br>
                                        <button type="button" id="" target="#reviewerReplaceSameLevel" class="btn py-1 px-3 btn-primary increment-btn reviewerReplace">Change</button>
                                    </div>
                                    <div class="col-3 col-sm-12 col-md-12 col-lg-4 col-xl-2  mb-3">
                                    <label class="" for="">Reviewer</label>
                                        <select class="form-control select-hr-dropdown" name="hr_id">
                                            @if(isset($allEmployeesList) && count($allEmployeesList) > 0)
                                                @foreach($allEmployeesList as $employeeData)
                                                    <option value="{{ $employeeData->id }}">{{ $employeeData->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">Select Reviewer</option>
                                            @endif
                                        </select>
                                    </div>
                                    @endif
                                    <!-- Reviewer Selection Portion Ends -->
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
                                                <select name="selected_kpi_form_id" class="selectedKpiFormClass form-control mb-2">
                                                    
                                                </select>
                                                <i class="fa fa-refresh	refreshKPIFormDetails" aria-hidden="true"></i>

                                            </form>
                                            <div class="align-items-center justify-content-end d-flex mt-2 cursor-pointer">
                                                <!-- <a href="{{ route('showKPICreateForm') }}" target="_blank"> -->
                                                <a class="createKpiFromOnClick" target="_blank">
                                                    <span
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

    <div class="modal fade" id="reviewerReplaceSameLevel" role="dialog" aria-hidden="true"
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
                    <form id="changeReviewForm" action="{{ route('changeReviewerSelection') }}" method="POST">
                        @csrf
                        <label for="FormSelectDefault" class="form-label text-muted">Reviewer</label>
                        <div class="mb-3 row">
                            <div class="col-12 col-md-12 col-lg-12 ">
                                <label class="" for="">Existing Reviewer</label>
                                <select class="change-exiting-reviewer form-control" name="oldReviewerName">

                                </select>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 ">
                                <label class="" for="">New Reviewer</label>
                                <select class="with-new-reviewer form-control" name="newReviewerName">

                                </select>
                                <span style="color: red;" id="reviewerChangeError"></span>
                            </div>
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

    <!-- employee edit modal starts -->
    <div class="modal fade" id="employeeSelectionModal" role="dialog" aria-hidden="true"
        style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="modalHeader">Edit Employees
                        </h5>
                        <!-- <button type="button" class="btn-close btn-close-white close-modal-employee" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button> -->
                    </div>
                </div>
               
                <div class="modal-body">
                    <div class="mt-12">
                        @if(isset($loggedManagerEmployees))
                        <!-- flow 2 -->
                        <select class="select-employee-dropdown form-control" name="employees[]" multiple="multiple">
                            @foreach($loggedManagerEmployees as $employeesSelection)
                                <option selected value="{{ $employeesSelection->id }}">{{ $employeesSelection->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-orange py-0 px-2" onclick="resetEmployeesList()"><span class="mr-10 icon"></span>Reset Employees</button>
                        @else
                        <!-- flow 1 -->
                        <select class="select-employee-dropdown form-control" id="selectedEmployeeDropdownId" name="employees[]" multiple="multiple">
                            @if(isset($allEmployeesWithoutLoggedUserList) && count($allEmployeesWithoutLoggedUserList) > 0)
                                @foreach($allEmployeesWithoutLoggedUserList as $employeeList)
                                    <option value="{{ $employeeList->id }}">{{ $employeeList->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @endif
                    </div>
                    @if(isset($loggedManagerEmployees))
                    <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                        <button class="btn btn-primary ml-2" id="edit-employee"
                            >Save</button>
                    </div>
                    @else
                    <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                        <button class="btn btn-primary ml-2" id="edit-employee-based-on-reviewer"
                            >Save</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- emplyee edit modal ends -->


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


    <!--Sweet alert JS-->
    <script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- Prem assets ends -->

    <!-- for date and time -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php if(isset($loggedManagerEmployeesIDs)){?>
    <script>
        function resetEmployeesList(){
            var loggedManagerEmployeesIDs = [<?php echo $loggedManagerEmployeesIDs; ?>];
            if(loggedManagerEmployeesIDs.length > 0){

                $(".select-employee-dropdown").val(loggedManagerEmployeesIDs);
                $('.select-employee-dropdown').trigger('change');
            }
         }
    </script>
    <?php } ?>
    <script>

       

        $('.refreshKPIFormDetails').click(function(){
            $('.loader').show();
            getKPIFormDetails();
        })

        getKPIFormDetails();
        function getKPIFormDetails(){
            $.ajax({
                type: "GET",
                url: "{{ route('getKPIFormNameInDropdown') }}",
                success: function(data) {
                    if(data.status == true){
                        var finalResult = '<option value="">Select KPI Form</option>'
                        $.each(data.result, function(key, val){
                            finalResult += '<option value="'+val.id+'">'+val.form_name+'</option>';
                        })
                        $('.selectedKpiFormClass').html(finalResult);
                    }else{
                        swal('Wrong!',data.message,'error');
                    }
                    $('.loader').hide();
                },
                error: function(error) {
                    console.log('somethig went wrong');
                    $('.loader').hide();
                }
            });
        }

        var selectedEmployeesId = $('.select-employee-dropdown').val();
        changeAssigneeProfilePicOnSelection(selectedEmployeesId);

        function changeAssigneeProfilePicOnSelection(selectedEmployeesId){
            var selectedEmployeesId = selectedEmployeesId;
            $.ajax({
                type: "POST",
                url: "{{ route('changeEmployeeProfileIconsOnEdit') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    selectedEmployeesId : selectedEmployeesId,
                },
                success: function(data) {
                    if(data.status == true){
                        $('.employee-selection-section').html(data.html);
                        $('#employeeSelectionModal').hide();
                        $('#employeeSelectionModal').addClass('fade');
                        $('#employeesSelectedValues').val(selectedEmployeesId);
                    }
                },
                error: function(error) {
                    console.log('something went wrong');
                }
            });
        }

        $(document).on("click",".employeeEditButton",function() {
            $("#add-goals-modal").modal('hide');
            $('#employeeSelectionModal').show();
            $('#employeeSelectionModal').removeClass('fade');
        })

        $('#edit-employee').click(function(){
            var selectedEmployeesId = $('.select-employee-dropdown').val();
            // getReviewerOfSelectedEmployee(selectedEmployeesId);
            $('#add-goals-modal').modal('show');
            changeAssigneeProfilePicOnSelection(selectedEmployeesId);
        })
        $('#edit-employee-based-on-reviewer').click(function(){
            var selectedEmployeesId = $('.select-employee-dropdown').val();
            getReviewerOfSelectedEmployee(selectedEmployeesId);

        })

    </script>

    <script>
        $(document).ready(function() {

            $('.reviewerReplace').hide();

            $('.createKpiFromOnClick').click(function(){
                console.log("Create KPI button clicked");

            var assignmentPeriod = $('#assignment_period_start').val();
            var year = $('#year').val();
            if(assignmentPeriod != '' && year != ''){
                var YearText = $("#year option:selected").text();
                var url = '{{ route("showKPICreateForm", ":year") }}';
                url = url.replace(':year', YearText);
                // alert(url);
                window.open(url);
                return false;
            }
            else
            {
                alert("Please enter Assignment Period and Year ");
            }

        });


            $('.selectedKpiFormClass').select2({
                dropdownParent: $("#add-goals-modal"),
                width: '98%'
            });
            $('.select-employee-dropdown').select2({
                dropdownParent: $("#employeeSelectionModal"),
                
                width: '100%'
            });
            $('.select-reviewer-dropdown').select2({
                dropdownParent: $("#add-goals-modal"),
                width: '100%'
            });
            $('.change-exiting-reviewer').select2({
                dropdownParent: $("#reviewerReplaceSameLevel"),
                width: '100%'
            });
            $('.with-new-reviewer').select2({
                dropdownParent: $("#reviewerReplaceSameLevel"),
                width: '100%'
            });

            $('.select-multiple-reviewer').select2({
                dropdownParent: $("#add-goals-modal"),
                width: '100%'
            });
            $('.select-hr-dropdown').select2({
                dropdownParent: $("#add-goals-modal"),
                width: '100%'
            });



        });

        var prevReviewerCount = '';
        var prevReviewerList = [];
        var currentReviewerCount = $('.select-multiple-reviewer').val().length;
        var currentReviewerList = $('.select-multiple-reviewer').val();

        // $(".select-multiple-reviewer").on("select2:select", function (e) {
        //     // var select_val = $(e.currentTarget).val();
        //     var selected_element = $(e.currentTarget);
        //     var select_val = selected_element.val();
        //     alert(select_val);
        // });
        $('.select-multiple-reviewer').change(function(e){
            console.log(e);
            prevReviewerCount = currentReviewerCount;
            prevReviewerList = currentReviewerList;
            currentReviewerCount = $(this).val().length;
            currentReviewerList = $(this).val();

            var latest_value = $(this).val();
            checkReviewersExistOrNot();
            if(currentReviewerCount > prevReviewerCount){

                var selectedReviewer = '';

                $.each(currentReviewerList, function(key, val) {
                    if ($.inArray(val, prevReviewerList) <= -1) {
                        selectedReviewer = val;
                    }
                });

                $.ajax({
                type: "POST",
                url: "{{ route('getEmployeesOfReviewer') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    selectedReviewer : selectedReviewer,
                },
                success: function(data) {

                   $.each(data.result, function(i, value) {
                        var existingEmployeesId = $('#selectedEmployeeDropdownId').val();
                        existingEmployeesId.push(value.id);
                        $('#selectedEmployeeDropdownId').val(existingEmployeesId);
                        $('#selectedEmployeeDropdownId').trigger('change');
                    });
                    var selectedEmployeesId = $('#selectedEmployeeDropdownId').val();
                    changeAssigneeProfilePicOnSelection(selectedEmployeesId);
                    
                },
                error: function(error) {
                    console.log('something went wrong');
                }
            });
            }
        })

        // $('.select-employee-dropdown').change(function(){
        function getReviewerOfSelectedEmployee(selectedEmployeeId){
            var selectedEmployeeId = selectedEmployeeId;
            $.ajax({
                type: "POST",
                url: "{{ route('getReviewerOfSelectedEmployee') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    selectedEmployeeId : selectedEmployeeId,
                },
                success: function(data) {
                    console.log(data.result.reviewerIds);
                    if(data.status == true ){
                        $.each(data.result.removeSelectedEmployee, function(i, value) {
                            $(".select-employee-dropdown option[value="+value+"]").remove();
                        });
                        $(".select-multiple-reviewer").val(data.result.reviewerIds);
                        $('.select-multiple-reviewer').trigger('change.select2');


                        $("#reviewersAccordingAssignee").val(data.result.reviewerNames.join(","));
                        $("#selectedReviewIds").val(data.result.reviewerIds.join(","));
                        var afterUpdateEmployee = $('.select-employee-dropdown').val();
                    }
                    $('#add-goals-modal').modal('show');
                    checkReviewersExistOrNot();
                    changeAssigneeProfilePicOnSelection(afterUpdateEmployee);
                },
                error: function(error) {
                    console.log('something went wrong');
                }
            });
        }
    </script>
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
                if ($('#calendar_type').val() != ''){
                    var frequencyDataResult = '<option value="">Select</option><option value="monthly">Monthly</option><option value="quarterly">Quarterly</option><option value="halfYearly">Half Yearly</option><option value="yearly">Yearly</option>';
                    $('#frequency').html(frequencyDataResult);
                }else{
                    var frequencyDataResult = '<option value="">Select</option>';
                    $('#frequency').html(frequencyDataResult);
                    $('#frequency').val('');
                }
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
        // $('.reviewerButton').click(function() {
        //     $('#createEmployee').show();
        //     $('#createEmployee').removeClass('fade');
        // });
        $('.close-reviewerButton').click(function() {
            $('#add-goals-modal').modal('show');

            $('#reviewerReplaceSameLevel').hide();
            $('#reviewerReplaceSameLevel').addClass('fade');
        });


        $('#add-goals').click(function() {
            $('#add-goals-modal').modal('show');
        });



        $('body').on('click', '.close-modal', function() {
            $('#notificationModal').hide();
            $('#notificationModal').addClass('fade');
            window.location.reload();
        })

        $('body').on('click', '.close-modal-employee', function() {
            $('#employeeSelectionModal').hide();
            $('#employeeSelectionModal').addClass('fade');
        })

        // check reviewers are exists or not in reviewers textbox except logged in user
        function checkReviewersExistOrNot(){
            var values = [];
            var selectedReviewersVal = $(".select-multiple-reviewer").val();
            
            console.log(selectedReviewersVal);
            $.each (selectedReviewersVal, function(key,val){
                console.log(key);
                if('{{ $loggedInUser->id }}' != val){
                    values.push(val);
                }
            });
            if(values.length > 0){
                $('.reviewerReplace').show();
            }else{
                $('.reviewerReplace').hide();
            }
        }

        $('.reviewerReplace').click(function(){
            var result = '';
            $.each ($(".select-multiple-reviewer option:selected"), function(){
                if($(this).val() != '{{ $loggedInUser->id }}'){
                    result += '<option value="'+$(this).val()+'">'+$(this).text()+'</option>';
                }
            });

            $('.change-exiting-reviewer').html(result);

            $('#add-goals-modal').modal('hide');

            $('#reviewerReplaceSameLevel').show();
            $('#reviewerReplaceSameLevel').removeClass('fade');
            changeExitingReviewer();

            // var selectedReviewersNames = $('#reviewersAccordingAssignee').val();
            // var selectedReviewersIds = $('#selectedReviewIds').val();
            // alert(selectedReviewersNames+' - '+selectedReviewersIds);
            // if(selectedReviewersIds != null && selectedReviewersIds != ''){
            //     var result = '';
            //     var selectedReviewersIds = selectedReviewersIds.split(',');
            //     var selectedReviewersNames = selectedReviewersNames.split(',');
            //     $.each(selectedReviewersIds, function(key, value){
            //         if(value != {{Auth::id()}}){
            //             result += '<option value="'+value+'">'+selectedReviewersNames[key]+'</option>';
            //         }
            //     });

            //     $('.change-exiting-reviewer').html(result);
            //     $('#reviewerReplaceSameLevel').show();
            //     $('#reviewerReplaceSameLevel').removeClass('fade');
            //     changeExitingReviewer();
            // }
        })

        $('.change-exiting-reviewer').change(function(){
            changeExitingReviewer();
        })
        function changeExitingReviewer(){
            $('#reviewerChangeError').html('');
            var reviewerId = $('.change-exiting-reviewer').val();
            $.ajax({
                type: "POST",
                url: "{{ route('getSameLevelOfReviewer') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'reviewerId': reviewerId,
                },
                success: function(data) {
                    if(data.status == true){
                        var result = '';
                        $.each(data.result.getSameLevelManagers, function(key, value){
                            result += '<option value="'+value.id+'">'+value.name+'</option>';
                        });
                        $('.with-new-reviewer').html(result);
                    }else{
                        $('#reviewerChangeError').html(data.message);
                    }
                }
            });
        }

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
            $('.loader').show();
            // if ($('#kpitable_id').val()) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('publishKPIForm') }}",
                    data: $('#goalForm').serialize(),
                    success: function(data) {
                        $('.loader').hide();
                        if(data.status == true){
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
                        }else{
                            swal('Wrong!',data.message,'error');
                        }
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
    <script>
        if ($("#changeReviewForm").length > 0) {
            $('#changeReviewForm').validate({
                rules: {
                    oldReviewerName : {
                        required : true
                    },
                    newReviewerName : {
                        required : true
                    },
                },
                messages: {
                    oldReviewerName : {
                        required: "Existing Reviewer Name is required",
                    },
                    newReviewerName : {
                        required: "New Reviewer Name is required",
                    },
                }
            });
        }

        $("#changeReviewForm").submit(function(e) {
            
            // var reviewersName =$("#reviewersAccordingAssignee").val();
            // var reviewersIds =$("#selectedReviewIds").val();

            e.preventDefault();
            var oldReviewerId = $('.change-exiting-reviewer').val();
            var newReviewerId = $('.with-new-reviewer').val();
            console.log(oldReviewerId);
            console.log(newReviewerId);

            var existingValues = $(".select-multiple-reviewer").val();
            console.log(existingValues);

            var result = existingValues.filter(function(elem){
                return elem != oldReviewerId;
            });

            result.push(newReviewerId);

            $('.select-multiple-reviewer').val(null).trigger('change');
            $(".select-multiple-reviewer").val(result);
            $('.select-multiple-reviewer').trigger('change.select2');

            
            $('#reviewerReplaceSameLevel').hide();
            $('#reviewerReplaceSameLevel').addClass('fade');
            
            $('#add-goals-modal').modal('show');
            checkReviewersExistOrNot();
        })
    </script>
@endsection
