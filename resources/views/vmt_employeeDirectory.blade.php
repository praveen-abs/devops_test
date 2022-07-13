@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">

<style>
table {
    /* border-collapse: separate; */
    /* border-radius: 10px !important; */
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px !important;

}

table th {
    /* color: #4c9393; */
    background-color: #b0bff1;
    padding: 15px 10px !important;
}

tbody {
    background-color: #fff;
}

tbody tr:hover {
    background-color: #f3f3f9;

}

td {
    border: solid 1px #000;
    border-style: none solid solid none;
    padding: 10px;
    font-weight: 600;
    color: #878aa5;

}

td .btn i {
    font-size: 16px;
}


/* tr:first-child th:first-child {
    border-top-left-radius: 10px !important;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 10px !important;
}

tr:first-child th:last-child {
    border-top-right-radius: 10px !important;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 10px !important;
} */


/* for radio button */
.switch-field {
    display: flex;

}

/* .directory-right button {
    background-color: #b0bff1!important;

} */

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
    background-color: #fff;
    color: #1c8b8d;
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 10px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    /* box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1); */
    transition: all 0.1s ease-in-out;
    margin-bottom: 0px !important;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked+label {
    background-color: #b0bff1!important;
    box-shadow: none;
}

.switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
}

.directory-search-bar {
    background:#fff !important;
}
.directory-search-bar:focus{
    border:2px solid #1c8b8d !important;
}

</style>


@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Employee Directories @endslot
@endcomponent

<div class=" project-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="row mb-3">
                <div class="card card-animate">
                    <div class="card-body p-0">
                        <!-- <h5>Employee Directory</h5> -->
                        <ul class="nav sub-topnav">
                            <li routerlinkactive="active" class="active">
                                <a routerlink="directory" href="{{url('vmt-employess/directory')}}">Employee
                                    Directory</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Organization Tree</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="logins" href="#/org/employees/logins">Logins</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="profile-changes" href="#/org/employees/profile-changes">Profile
                                    Changes</a>
                                <!---->
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="privateprofiles" href="#/org/employees/privateprofiles">Private
                                    Profiles</a>
                            </li>
                            <li routerlinkactive="active">
                                <a href="/#/org/employees/probation/in-probation">Probation</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="settings" href="#/org/employees/settings">Settings</a>
                            </li>
                        </ul>
                    </div><!-- end card body -->
                </div><!-- end card body -->
            </div>
            <div class="page-title">
                <h1>Employee Directory</h1>
            </div>
            <div class="card clear-margin-x clear-margin-b">
                <div class="card-body p-0">
                    <div class="row" style="border: 1px solid #f8f8f9;">
                        <div class="pt-1 col-2 dropdown-hover" style="border-right:1px solid #f8f8f9;">
                            <div class="dropdown">
                                <button type="button" class="btn" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="d-flex align-items-center">
                                        <span class="text-start ms-xl-2">
                                            <span class="wrap-text w-100"><span class="text-media">Department</span>
                                                <span><i class="fa fa-angle-down"></i></span></span>
                                            <span
                                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="input-search border-top-0 mx-16 mb-10">
                                        <input type="text" placeholder="Search"
                                            class="form-control h-100 w-100 text-normal ng-untouched ng-pristine ng-valid">
                                        <span class="ic-search icon icon-xs mt-8"></span>
                                    </div>
                                    <label class="dropdown-item">
                                        <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                            id="departmentNameSelectAll">
                                        <label for="departmentNameSelectAll">Select All</label>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName26546Hyderabad HQ_Customer Success">
                                            <label class="text-truncate-1"
                                                for="departmentName26546Hyderabad HQ_Customer Success"
                                                title="Hyderabad HQ_Customer Success">Hyderabad HQ_Customer
                                                Success</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName115611% Management %">
                                            <label class="text-truncate-1" for="departmentName115611% Management %"
                                                title="% Management %">% Management %</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName31801Hyderabad HQ_Inside Sales">
                                            <label class="text-truncate-1"
                                                for="departmentName31801Hyderabad HQ_Inside Sales"
                                                title="Hyderabad HQ_Inside Sales">Hyderabad HQ_Inside Sales</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName159730Solutions">
                                            <label class="text-truncate-1" for="departmentName159730Solutions"
                                                title="Solutions">Solutions</label>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pt-1 col-2 dropdown-hover" style="border-right:1px solid #f8f8f9;">
                            <div class="dropdown">
                                <button type="button" class="btn" id="page-user-dropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="d-flex align-items-center">
                                        <span class="text-start ms-xl-2">
                                            <span class="wrap-text w-100"><span class="text-media">Location
                                                </span><span><i class="fa fa-angle-down"></i></span></span>
                                            <span
                                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="input-search border-top-0 mx-16 mb-10">
                                        <input type="text" placeholder="Search"
                                            class="form-control h-100 w-100 text-normal ng-untouched ng-pristine ng-valid">
                                        <span class="ic-search icon icon-xs mt-8"></span>
                                    </div>
                                    <label class="dropdown-item">
                                        <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                            id="locationSelectAll">
                                        <label for="locationSelectAll">Select All</label>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="locationName26546Hyderabad HQ_Customer Success">
                                            <label class="text-truncate-1"
                                                for="locationName26546Hyderabad HQ_Customer Success"
                                                title="Hyderabad HQ_Customer Success">Hyderabad HQ_Customer
                                                Success</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="locationName115611% Management %">
                                            <label class="text-truncate-1" for="locationName115611% Management %"
                                                title="% Management %">% Management %</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="locationName31801Hyderabad HQ_Inside Sales">
                                            <label class="text-truncate-1"
                                                for="locationName31801Hyderabad HQ_Inside Sales"
                                                title="Hyderabad HQ_Inside Sales">Hyderabad HQ_Inside Sales</label>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pt-1 col-8">
                            <div class="input-search mr-40 d-flex">
                                <span class="mt-2"><i class="fa fa-search"></i></span>
                                <input type="text" placeholder="Search" name="filter" style="padding:6px;"
                                    autocomplete="off"
                                    class="mt-1 border-0 h-100 w-100 ng-untouched ng-pristine ng-valid">
                            </div>
                            <div class="reset-filter bg-white">
                                <a class="icon-click">
                                    <span tooltip="Clear filters" container="body"
                                        class="ic-clear-filter icon icon-lg"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="float:right;" class="p-3">
                        <div>
                            <p class="text-x-small text-muted">Showing 8 of 8</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="directory-content my-3 ">
        <div class="row">
            <div class="col-8">
                <div class="float-left directory-left d-flex">
                    <div class="switch-field align-items-center">
                        <input type="radio" id="radio-one" name="switch-one" value="Active" checked />
                        <label for="radio-one ">Active</label>
                        <input type="radio" id="radio-two" name="switch-one" value="Inactive" />
                        <label for="radio-two ">Inactive</label>
                    </div>

                    <div class="search-content header-item w-50 mx-5">

                        <i class=" ri-search-line "></i>
                        <input type="text" class="form-control search-bar directory-search-bar w-50 "
                            placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex directory-right float-right justify-content-end">
                    <div class="btn border-0 outline-none mx-2 ">
                        <i class="ri-menu-add-line fw-bold"></i>
                    </div>
                    <button class="btn border-0 outline-none onboard-employee-btn bg-danger text-white">
                        <i class="ri-add-line fw-bold mx-1"></i>
                        Onboard Employee
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="w-100 align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Employee Code</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Reporting Manager</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Reminder</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vmtEmployees as $key => $employee)
                <tr>
                    <td> <span>{{$employee->emp_no}}</span></td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                            @if($employee->avatar)
                                <img src="{{ URL::asset('assets/images/') }}/{{$employee->avatar}}" alt=""
                                    class="avatar-xs rounded-circle" />
                            @else
                                <img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            @endif
                            </div>
                            <div class="flex-grow-1">
                            {{$employee->emp_name}}
                            </div>
                        </div>
                    </td>

                    <td><span>{{$employee->designation}}</span></td>
                    <td><span>{{$employee->l1_manager_name }}</span></td>

                    <td><span>{{$employee->email_id }}</span></td>
                    <td><span> B <sup>+</sup></span></td>
                    <td>{{$employee->percentage}}%</td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <button data-id="{{$employee->id}}" class="add_goals btn border-0 outline-none bg-transparent p-0  mx-1">
                                <i class="ri-pencil-line text-primary fw-bold"></i>
                            </button>
                            <button class="btn border-0 outline-none bg-transparent p-0  ">
                                <i class="ri-delete-bin-line text-danger fw-bold"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <button class="btn border-0 outline-none bg-transparent p-0">
                            <i class="ri-alarm-line fw-bold "></i>
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
        <!-- end table -->
    </div>

</div><!-- end row -->


<div id="add-goals-modal" class="modal custom-modal fade show" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="assign-cards-wrapper col-12 p-0">
                    <div class="assignCards">
                        <div class="card-header p-0 m-0">
                            <div class="d-flex   justify-content-between align-items-center ">
                                <div class="d-flex  align-items-center">
                                    <span class="left fw-bold text-white pt-3 px-4 pb-4">New</span>
                                    <h5 class="m-0 mx-3">Assign Goals</h5>
                                </div>
                                <!-- <div class="d-flex align-items-center mx-5">
                                    <span class="right rounded-pill py-1 px-2 mx-2 text-white btn btn-lg" id="publish-goal" style="cursor: pointer;">Publish</span>
                                </div> -->
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="assign-cards-wrapper">
                    <div class="assignCards">
                        <form id="goalForm">
                            <input type="hidden" name="goal_id" id="goal_id">
                            @csrf
                            <input type="hidden" name="kpitable_id" id="kpitable_id">
                            @if(auth()->user()->hasrole('Employee'))
                            <input type="hidden" name="employees[]" value="{{auth()->user()->id}}" id="sel_employees">
                            @else
                            <input type="hidden" name="employees[]" id="sel_employees">
                            @endif

                            @if(auth()->user()->hasrole('Manager'))
                            <input type="hidden" name="reviewer" value="{{auth()->user()->id}}" id="sel_reviewer">
                            @elseif(auth()->user()->hasrole('Employee'))
                            <input type="hidden" name="reviewer" value="{{$users[0]['id']}}" id="sel_reviewer">
                            @else
                            <input type="hidden" name="reviewer" id="sel_reviewer">
                            @endif
                            <input type="hidden" name="assignment_period_year" id="assignment_period_year" value="<?php echo date("Y"); ?>">

                            <div class="row mt-3">
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="calendar_type">Calendar Type</label>
                                        <select name="calendar_type" id="calendar_type">
                                            <option value="">Select</option>
                                            <option name="financial_year" value="financial_year">Financial Year</option>
                                            <option name="calendar_year" value="calendar_year">Calendar Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="year">Year</label>
                                        <select name="year" id="year" disabled>
                                            <option value="">Select</option>
                                            <option value="Jan">January - <?php echo date("Y"); ?> to December - <?= date("Y")?> </option>
                                            <option value="Apr">April - <?php echo date("Y"); ?> to March - <?= date("Y")+1?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="frequency">Frequency</label>
                                        <select name="frequency" id="frequency">
                                            <option value="">Select</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="quaterly">Quaterly</option>
                                            <option value="halfYearly">Half Yearly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="assignment_period_start">Assignment Period</label>
                                        <select name="assignment_period_start" id="assignment_period_start">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="department">Department</label>
                                        <select name="department" id="department">
                                            <option value="Technology">Technology</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Auditing">Auditing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4  mt-3 mb-3">
                                    @if (auth()->user()->hasrole('Manager') || auth()->user()->hasrole('Admin'))
                                    <div class="d-flex flex-column">
                                        <label class="" for="Assignment">Employees-02</label>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-group-item">
                                            </div>
                                            <button type="button" target="#changeEmployee" class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white chnageButton">Edit</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-4 mt-3 mb-3 d-flex ml-5">

                                    <div class="d-flex flex-column">
                                        <label class="" for="Assignment">Reviewer</label>
                                        <div class="d-flex align-items-center">
                                            <div class="card reviwer-cards  m-0 rounded-pill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <a>
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                                        </a>

                                                        <div class=" mt-1 message-content align-items-start d-flex flex-column  mx-2">
                                                            @if(auth()->user()->hasrole('Manager'))
                                                            <h6 class="fw-bold m-0" id="reviewer-name">{{auth()->user()->name}}</h6>
                                                            @elseif(auth()->user()->hasrole('Employee'))
                                                            <h6 class="fw-bold m-0" id="reviewer-name">{{$users[0]['name']}}</h6>
                                                            @else
                                                            <h6 class="fw-bold m-0" id="reviewer-name">---</h6>
                                                            @endif

                                                            @if(auth()->user()->hasrole('Manager'))
                                                            <span id="reviewer-email">{{auth()->user()->email}}</span>
                                                            @elseif(auth()->user()->hasrole('Employee'))
                                                            <span id="reviewer-email">{{$users[0]['email']}}</span>
                                                            @else
                                                            <span id="reviewer-email">---</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @hasrole('Admin')
                                            <button 
                                                type="button" 
                                                target="#createEmployee"
                                                class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white reviewerButton"
                                            >
                                                Change
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-wrapper">
                            <div class="row">
                                <div class="col-6"><h5>Key focus areas</h5></div>
                                <div class="col-6">
                                    <form id="upload_form" enctype="multipart/form-data">
                                        <div class="row pull-right">
                                            @csrf
                                            <div class="col-8">
                                                <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-primary pull-right" id="upload-goal">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="container-fluid bg-light mt-3 py-2 rounded-border d-felx align-items-center">
                                        <h6 class="m-0">Goals / Areas of development</h6>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="container-fluid mb-1 mt-3 ">
                                        <form id="kpiTableForm">
                                            <input type="hidden" id="kpi_table_id" name="kpi_table_id">
                                            <div class="table-responsive">
                                                <table class="w-100 align-middle mb-0" id="kpiTable">
                                                    @csrf
                                                    <thead class="text-white bg-primary thead" id="tHead">
                                                        <tr class="text-uppercase">
                                                            <th class="sort" data-sort="id" style="width: 2%;">#</th>
                                                            <th class="sort" data-sort="customer_name" style="width: 8%;">Dimension</th>
                                                            <th class="sort" data-sort="product_name" style="width: 25%;">KPI</th>
                                                            <th class="sort" data-sort="date" style="width: 25%;">Operational Definition</th>
                                                            <th class="sort" data-sort="amount" style="width: 25%;">Measure</th>
                                                            <th class="sort" data-sort="payment" style="width: 10%;">Frequency</th>
                                                            <th class="sort" data-sort="status" style="width: 20%;">Target</th>
                                                            <th class="sort" data-sort="status" style="width: 20%;">Stretch Target</th>
                                                            <th class="sort" data-sort="status" style="">Source</th>
                                                            <th class="sort" data-sort="status" style="width: 10%;" width="10%">KPI Weightage ( % )</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody content-container" id="tbody">
                                                        <tr class="addition-content cursor-pointer" id="content1">
                                                            <input type="hidden" name="kpi_id[]">
                                                            <td class="">
                                                                <span  name="numbers" id="" class="tableInp" >1</span>
                                                                <div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div>
                                                            </td>

                                                            <td class="text-box-td p-1">
                                                                <textarea name="dimension[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here" ></textarea>
                                                            </td>

                                                            <td class="text-box-td p-1">
                                                                <textarea name="kpi[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="operational[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="measure[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="frequency[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="target[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="stretchTarget[]" id="" class="text-box" cols="10"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="source[]" id="" class="text-box" cols="10"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <textarea name="kpiWeightage[]" id="" class="text-box" cols="10"
                                                                    placeholder="type here"></textarea>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                        <div class="align-items-center justify-content-center d-flex mt-4 cursor-pointer">
                                            <span class="plus-sign p-4"><i class="fa fa-plus f-20"></i></span>
                                        </div>

                                        <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                                            <button class="btn btn-primary table-btn mx-2" id="save-table">Save</button>
                                            <button class="btn btn-primary mx-2" id="publish-goal" disabled>Publish</button>
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

<!-- Change Reviewr window -->

<div class="modal fade" id="createEmployee" role="dialog" aria-hidden="true" style="opacity:1; display:none;">
    <div class="modal-dialog modal-md" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Change Reviewer
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-reviewerButton" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="newQuestion" method="POST" >
                    @csrf
                    <label for="FormSelectDefault" class="form-label text-muted">Reviewer</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="reviewer" id="select-reviewer" >
                        @foreach($users as $index => $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <div class="content-footer mt-3">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="d-flex">
                                    <ul class="nav nav-pills w-100 mb-4" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item d-flex w-100 align-items-center justify-content-end "
                                            role="presentation">
                                           
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">
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
<div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;">
    <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="modalHeader">Success
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mt-4">
                    <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                    <p class="text-muted mb-4" id="modalBody"> Table Saved, Please publish goals.</p>
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Select Employees window -->
<div class="modal fade" id="changeEmployee">
    <div class="modal-dialog modal-md" id="" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2">

        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Select Employees
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-changeEmployee" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">

                <form id="changeEmployeeForm" method="POST" >
                    @csrf
                    <label for="FormSelectDefault" class="form-label text-muted">Employees</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="employees[]" id="select-employees" multiple>
                      
                    </select>
                
                    <div class="content-footer">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="d-flex">
                                    <ul class="nav nav-pills w-100 mb-4" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item d-flex w-100 align-items-center justify-content-end "
                                            role="presentation">
                                           
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">
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



@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $(function() {
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
            },
        });
    });

    $('#upload-goal').click(function() {
        // upload a file
        var form_data = new FormData(document.getElementById("upload_form"));
        $.ajax({
            type: "POST", 
            url: "{{route('upload-file')}}", 
            dataType : "json",
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                $('.addition-content').html('');
                var length = 1;
                // $.each(data,function(k, v) {
                    $.each(data[0],function(key, value) {
                        $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td><td class="text-box-td p-1"><textarea name="dimension[]" id="" class="text-box" cols="20" placeholder="type here">'+value[0]+'</textarea></td><td class="text-box-td p-1"><textarea name="kpi[]" id="" class="text-box" cols="20" placeholder="type here">'+value[1]+'</textarea></td><td class="text-box-td p-1"><textarea name="operational[]" id="" class="text-box" cols="20" placeholder="type here">'+value[2]+'</textarea></td><td class="text-box-td p-1"><textarea name="measure[]" id="" class="text-box" cols="20" placeholder="type here">'+value[3]+'</textarea></td><td class="text-box-td p-1"><textarea name="frequency[]" id="" class="text-box" cols="20" placeholder="type here">'+value[4]+'</textarea></td><td class="text-box-td p-1"> <textarea name="target[]" id="" class="text-box" cols="20" placeholder="type here">'+value[5]+'</textarea></td><td class="text-box-td p-1"><textarea name="stretchTarget[]" id="" class="text-box" cols="10" placeholder="type here">'+value[6]+'</textarea></td><td class="text-box-td p-1"><textarea name="source[]" id="" class="text-box" cols="10" placeholder="type here">'+value[7]+'</textarea></td><td class="text-box-td p-1"><textarea name="kpiWeightage[]" id="" class="text-box" cols="10" placeholder="type here">'+value[8]+'</textarea></td></tr>');
                        length++;
                    });
                // });
            }
        });
    });

    $(document).on('#select-reviewer:open', () => {
        $('.select2-search__field').focus();
    });

    $('#calendar_type').change(function() {
        calendar();
    });

    function calendar() {
        if ($('#calendar_type').val() == 'financial_year') {
            $('#year').val('Apr');
        } else {
            $('#year').val('Jan');
        }
    }

    $('body').on('click', '.close-modal', function() {
        $('#notificationModal').hide();
        $('#notificationModal').addClass('fade');
    });

    $('#frequency').change(function() {
        frequency();
    });

    function frequency(){
        var data = "";
        if ($('#frequency').val() == 'monthly') {
            data = "<option value=''>Select</option><option value='jan'>January</option><option value='feb'>February</option><option value='mar'>March</option><option value='apr'>April</option><option value='may'>May</option><option value='june'>June</option><option value='july'>July</option><option value='aug'>August</option><option value='sept'>September</option><option value='oct'>October</option><option value='nov'>November</option><option value='dec'>December</option>";
        } else if ($('#frequency').val() == 'quaterly') {
            data = "<option value=''>Select</option><option value='q1'>Q1(Jan-Mar)</option><option value='q2'>Q2(Apr-June)</option><option value='q3'>Q3(July-Sept)</option><option value='q4'>Q4(Oct-Dec)</option>";
        } else if ($('#frequency').val() == 'halfYearly') {
            data = "<option value=''>Select</option><option value='h1'>H1(Jan-June)</option><option value='h2'>H2(July-Dec)</option>";
        } else {
            data = "<option value=''>Select</option><option value='yearly'>Yearly</option>";
        }
        $('#assignment_period_start').html(data);
    }

    $(function () {
        $("#kpiTable").sortable({
            items: 'tr',
            cursor: 'pointer',
            axis: 'y',
            dropOnEmpty: false,
            start: function (e, ui) {
                ui.item.addClass("selected");
            },
            stop: function (e, ui) {
                ui.item.removeClass("selected");
                $(this).find("tr").each(function (index) {
                    // if (index > 0) {
                    //     $(this).find("td").eq(1).html(index);
                    // }
                });
            }
        });
    });

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
    
    $('#changeEmployeeForm').on('submit', function(e){
        e.preventDefault();
        var employeeSelected = $('#select-employees').val();
        @if(auth()->user()->hasrole('Employee'))
        @else
        var employees = {!!json_encode($employees)!!};

        @endif
        var employeeArray = [];
        $("#sel_employees").val(employeeSelected);

        var imgHtml ="";
        var count = 0;
        $.each(employees, function(i, data){
            console.log(data);
            console.log('employee selected', employeeSelected);
            if($.inArray(data.id.toString(), employeeSelected) > -1){
                employeeArray.push(data.emp_name);
                if (count < 4) {
                    imgHtml = imgHtml+"<a class='avatar'><img src='assets/images/"+data.avatar+"' alt='' class='rounded-circle p-0'></a>";
                }
                count++;
            }
        });
        if (count > 4) {
            imgHtml = imgHtml+"<span class='img-addition' style='background-color: rgb(134, 192, 106);width: 30px;height: 30px;font-size:12px;'> +"+count-3+" </span><div class='mt-1 message-content align-items-start d-flex flex-column  mx-2'><span id='group-employee'></span></div>";
        }
        $('#group-employee').html(employeeArray.join());
        $('#changeEmployee').css('display', 'none');
        $('.avatar-group-item').html(imgHtml);
    });

    $('#newQuestion').on('submit', function(e){
        e.preventDefault();
        var userList = {!!json_encode($users)!!};
        var selReviewer = $('#select-reviewer').val();
        $("#sel_reviewer").val(selReviewer);

        $.each(userList, function(i, data){
            if(data.id == $('#select-reviewer').val()){
                $('#reviewer-name').html(data.name);
                $('#reviewer-email').html(data.email);
            }
        });

        $.ajax({
            type: "GET", 
            url: "{{url('vmt-getAllChildEmployees')}}"+'?emp_id='+selReviewer, 
            //data: $('#kpiTableForm').serialize(), 
            success: function(data){
            var optionHtml ="";
            $.each(data, function(i, tempdata){
                optionHtml = optionHtml+"<option value="+tempdata.id+">"+tempdata.name+"</option>";
                //if(tempdata.id == $('#select-employees').val()){
                //        $('#reviewer-name').html(tempdata.name);
                //        $('#reviewer-email').html(tempdata.email);
                //    }
            });
                
            $('#select-employees').html(optionHtml);
                        // $("#kpiTableForm :input").prop("disabled", true);
            // $(".table-btn").prop('disabled', true);
                console.log(data);
                //alert("Table Saved, Please publish goals");
            // $("#kpitable_id").val(data.table_id);
            }
        })


        $('#createEmployee').css('display','none');
    });
    @if(auth()->user()->hasrole('Manager'))

        var userid = {{auth()->user()->id}} 
        $.ajax({
            type: "GET", 
            url: "{{url('vmt-getAllChildEmployees')}}"+'?emp_id='+userid, 
            //data: $('#kpiTableForm').serialize(), 
            success: function(data){
            var optionHtml ="";
            $.each(data, function(i, tempdata){
                optionHtml = optionHtml+"<option value="+tempdata.id+">"+tempdata.name+"</option>";
                //if(tempdata.id == $('#select-employees').val()){
                //        $('#reviewer-name').html(tempdata.name);
                //        $('#reviewer-email').html(tempdata.email);
                //    }
            });
                
            $('#select-employees').html(optionHtml);
                        // $("#kpiTableForm :input").prop("disabled", true);
            // $(".table-btn").prop('disabled', true);
                console.log(data);
                //alert("Table Saved, Please publish goals");
            // $("#kpitable_id").val(data.table_id);
            }
        })

    @endif

    $('.add_goals').click(function() {
        // data poplate for edit
        var key = $(this).attr('data-id');
        var length = 1;
        $.ajax({
            type: "POST", 
            url: "{{route('kpi-data')}}", 
            data: {
                id:key,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data){
                var goal = data['goal'];
                var goals = data['goals'];
                $('#kpi_table_id').val(goals['kpi_table_id']);
                $('#goal_id').val(goals['id']);
                // $('#sel_employees').val();
                $('#sel_reviewer').val(goals['reviewer_id']);
                $('#select-reviewer').val(goals['reviewer_id']);
                if (goals['rev'] && goals['rev']['id']) {
                    $('#reviewer-name').val(goals['rev']['name']);
                    $('#reviewer-email').val(goals['rev']['email']);
                }
                if (goals['emp'] && goals['emp']['id']) {
                    var employeeSelected = $('#select-employees').val(goals['emp']['id']);
                    @if(auth()->user()->hasrole('Employee'))
                    @else
                    var employees = {!!json_encode($employees)!!};

                    @endif
                    var employeeArray = [];
                    $("#sel_employees").val(employeeSelected);

                    var imgHtml ="";
                    var count = 0;
                    $.each(goals['emp'], function(i, data){
                        if($.inArray(data.id.toString(), employeeSelected) > -1){
                            employeeArray.push(data.emp_name);
                            if (count < 4) {
                                imgHtml = imgHtml+"<a class='avatar'><img src='assets/images/"+data.avatar+"' alt='' class='rounded-circle p-0'></a>";
                            }
                            count++;
                        }
                    });
                    if (count > 4) {
                        imgHtml = imgHtml+"<span class='img-addition' style='background-color: rgb(134, 192, 106);width: 30px;height: 30px;font-size:12px;'> +"+count-3+" </span><div class='mt-1 message-content align-items-start d-flex flex-column  mx-2'><span id='group-employee'></span></div>";
                    }
                    $('#group-employee').html(employeeArray.join());
                    $('#changeEmployee').css('display', 'none');
                    $('.avatar-group-item').html(imgHtml);

                    $('#empiewer-name').val(goals['emp']['name']);
                    $('#empiewer-email').val(goals['emp']['email']);
                }
                $('#calendar_type').val(goal['calendar_type']);
                calendar();
                $('#year').val(goal['year']);
                $('#frequency').val(goal['frequency']);
                frequency();
                $('#assignment_period_start').val(goal['assignment_period_start']);
                $('#department').val(goal['department']);

                if (data) {
                    $('.addition-content').html('');
                }
                $.each(data['kpi'],function(key, value) {
                    $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><input type="hidden" name="kpi_id[]" value="'+value['id']+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td><td class="text-box-td p-1"><textarea name="dimension[]" id="" class="text-box" cols="20" placeholder="type here">'+value['dimension']+'</textarea></td><td class="text-box-td p-1"><textarea name="kpi[]" id="" class="text-box" cols="20" placeholder="type here">'+value['kpi']+'</textarea></td><td class="text-box-td p-1"><textarea name="operational[]" id="" class="text-box" cols="20" placeholder="type here">'+value['operational_definition']+'</textarea></td><td class="text-box-td p-1"><textarea name="measure[]" id="" class="text-box" cols="20" placeholder="type here">'+value['measure']+'</textarea></td><td class="text-box-td p-1"><textarea name="frequency[]" id="" class="text-box" cols="20" placeholder="type here">'+value['frequency']+'</textarea></td><td class="text-box-td p-1"> <textarea name="target[]" id="" class="text-box" cols="20" placeholder="type here">'+value['target']+'</textarea></td><td class="text-box-td p-1"><textarea name="stretchTarget[]" id="" class="text-box" cols="10" placeholder="type here">'+value['stretch_target']+'</textarea></td><td class="text-box-td p-1"><textarea name="source[]" id="" class="text-box" cols="10" placeholder="type here">'+value['source']+'</textarea></td><td class="text-box-td p-1"><textarea name="kpiWeightage[]" id="" class="text-box" cols="10" placeholder="type here">'+value['kpi_weightage']+'</textarea></td></tr>');
                    length++;
                });
            }
        });
        $('#add-goals-modal').modal('show');
    });
    
    $('body').on('click', '.delete-row', function() {
        $(this).parent().parent().remove();
    });

    $('body').on('click', '.plus-sign', function() {
        var id = $('.addition-content:last').attr('id');
        var length = 1;
        if (id) {
            length = parseInt(id.replace('content', '')) + 1;
        }
        $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><input type="hidden" name="kpi_id[]"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td><td class="text-box-td p-1"><textarea name="dimension[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="kpi[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="operational[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="measure[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="frequency[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"> <textarea name="target[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="stretchTarget[]" id="" class="text-box" cols="10" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="source[]" id="" class="text-box" cols="10" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="kpiWeightage[]" id="" class="text-box" cols="10" placeholder="type here"></textarea></td></tr>');
    });


    $('body').on('click', '.popover-close', function() {
        $("[data-toggle=popover]").popover('hide');
    });

    $('body').on('click', '.topbarNav', function() {
        $('.topbarNav').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id');
        $('.topbarContent').hide();
        $('.emp-' + id).css("display", "block");
    });
    var options = [];
    $('.dropdown-menu a').on('click', function(event) {
        var $target = $(event.currentTarget),
            val = $target.attr('data-value'),
            $inp = $target.find('input'),
            idx;
        if ((idx = options.indexOf(val)) > -1) {
            options.splice(idx, 1);
            setTimeout(function() {
                $inp.prop('checked', false)
            }, 0);
        } else {
            options.push(val);
            setTimeout(function() {
                $inp.prop('checked', true)
            }, 0);
        }
        $(event.target).blur();
        return false;
    });
    
    // publishing tables
    $('body').on('click', '#save-table', function(e){

        var canSaveForm = true;
        var kpiWeightageTotal = 0;

        //Validate the input fields
        $("#kpiTableForm :input").each(function(){
            var input = $(this);
            //console.log("length : ");
            if(input.attr('name') == "kpiWeightage[]")
            {
                kpiWeightageTotal =kpiWeightageTotal+parseInt(input.val());
                //console.log(input.attr('name')+" , "+input.val());
            }

        if(input.val().length < 1)
        {
            canSaveForm = false;
        }
        });


        //Validate KPI Weightage
        if(kpiWeightageTotal != 100 )
        {
            canSaveForm = false;
            alert("KPI Weightage should be exactly 100%. Please fix it");
        }

        if(canSaveForm)
        {
            $.ajax({
                type: "POST", 
                url: "{{url('vmt-pms-kpi-table/save')}}", 
                data: $('#kpiTableForm').serialize(), 
                success: function(data){

                    $("#kpiTableForm :input").prop("disabled", true);
                    $(".table-btn").prop('disabled', true);
                    $('#notificationModal').show();

                    // alert("Table Saved, Please publish goals");
                    $('#modalBody').html("Table Saved, Please publish goals.");
                    $('#notificationModal').show();
                    $('#notificationModal').removeClass('fade');
                    $("#kpitable_id").val(data.table_id);
                    $('#publish-goal').removeAttr('disabled');
                }
            });
        }
        else
        {
            alert("Please fill all the fields");
        }
    })

    $("#publish-goal").click(function(e){
        e.preventDefault();

        if($('#kpitable_id').val()){  
            $.ajax({
                type: "POST", 
                url: "{{url('vmt-pms-assign-goals/publish')}}", 
                data: $('#goalForm').serialize(), 
                success: function(data){

                    $("#kpiTableForm :input").prop("disabled", true);
                    $(".table-btn").prop('disabled', true);

                    @if(auth()->user()->hasrole('Employee'))
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
        }else{
            $('#modalBody').html("Please publish table first");
            $('#modalHeader').html("Failed");
            $('#modalNot').html("Failed to save Data");
            $('#notificationModal').show();
            $('#notificationModal').removeClass('fade');
        }
    
    });

});
</script>
@endsection