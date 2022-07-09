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
    border-radius: 10px !important;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px !important;

}

table th {
    background-color: #daf3f3;
    color: #1c8b8d;
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


tr:first-child th:first-child {
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
}


/* for radio button */
.switch-field {
    display: flex;

}

.directory-right button {
    background-color: #1c8b8d;
    
}
.directory-right .add-onboard-btn{
    color: #1c8b8d !important;
    background: #fff;
    border: 1px solid #1c8b8d !important;
}

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
    background-color: #daf3f3;
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

            <div infinitescroll="" class="row no-gutters">
                @foreach($vmtEmployees as $key => $employee)
                <div class="col-default-3">
                    <div class="card card-animate employee-profile-card">
                        <div class="card-body employee-profile-header">
                            <div class="row mt-2">
                                <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}"
                                        class="img-round"></p>
                                <div class="pt-2 col">
                                    <div class="d-flex align-items-center">
                                        <h4 title="{{$employee->emp_name}}" class="m-0"><b>{{$employee->emp_name}}</b>
                                        </h4>
                                        <div class="ml-2">
                                            <a tabindex="0" role="button" data-html="true" data-toggle="popover"
                                                data-trigger="focus" data-popover-content="#a{{$key}}" title=''
                                                data-content="<div><b>Example popover</b> - content</div>"><i
                                                    class="fa fa-ellipsis-h" style="border:1px solid;"></i>
                                            </a>
                                            <div style="display:none" id="a{{$key}}">
                                                <div class="popover-body p-0">
                                                    <div
                                                        class="d-flex pl-20 pr-8 py-8 bg-muted justify-content-between border-bottom">
                                                        <div class="employee-profile-header align-items-center d-flex">
                                                            <img class="rounded-circle header-profile-user"
                                                                src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}"
                                                                alt="Header Avatar">
                                                            <div class="employee-details max-w-124 pl-4">
                                                                <h5 class="title text-truncate m-0" title="Dheeraj">
                                                                    {{$employee->emp_name}}</h5>
                                                            </div>
                                                            <div class="badge badge-custom bg-accent-violet ml-10">Leave
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a target="_blank" href="/#/employee/63968/about"><span
                                                                    class="mr-10 icon"><i
                                                                        class="fa fa-external-link"></i></span></a>
                                                            <a class="popover-close cursor-pointer"><span
                                                                    class="icon"><i class="fa fa-times"></i></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="min-h-250">
                                                        <div>
                                                            <ul class="nav sub-topnav px-20">
                                                                <li class="active topbarNav" id="profile"><a>Profile</a>
                                                                </li>
                                                                <li class="topbarNav" id="job"><a>Job</a></li>
                                                            </ul>
                                                            <div class="topbarContent emp-profile">
                                                                <div>
                                                                    <div class="px-20 p-16 row no-gutters">
                                                                        <div class="col-sm-12 data-bar mb-16">
                                                                            <h5 class="text-muted">Contact Details</h5>
                                                                            <div class="form-row mt-8">
                                                                                <div class="col-sm-6 clear-padding">
                                                                                    <span class="mr-20">
                                                                                        <span
                                                                                            class="icon icon-sm mr-8"><i
                                                                                                class="fa fa-envelope"></i></span>dheeraj@simha.in
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding">
                                                                                    <span class="mr-20">
                                                                                        <span
                                                                                            class="icon icon-xs mr-8"><i
                                                                                                class="fa fa-phone"></i></span>4027684424
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row col-sm-12 data-bar mt-12">
                                                                            <div
                                                                                class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span
                                                                                        class="text-muted text-label data-label d-inline-block">Location</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1"
                                                                                            title="Chennai">Chennai</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span
                                                                                        class="text-muted text-label data-label d-inline-block">WORK
                                                                                        PHONE</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1"
                                                                                            title="(206) 2964654">(206)
                                                                                            2964654</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row col-sm-12 data-bar mt-12">
                                                                            <div
                                                                                class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-16">
                                                                                    <span
                                                                                        class="text-muted text-label data-label d-inline-block">JOB
                                                                                        TITLE</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1"
                                                                                            title="HR HEAD">HR
                                                                                            HEAD</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span
                                                                                        class="text-muted text-label data-label d-inline-block">muted
                                                                                        JOB TITLE</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1"
                                                                                            title="Senior Director">Senior
                                                                                            Director</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row col-sm-12 data-bar mt-12">
                                                                            <div
                                                                                class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span
                                                                                        class="text-muted text-label data-label d-inline-block">Department</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1"
                                                                                            title="Accounting -1 > CEO Dept">Accounting
                                                                                            -1 &gt; CEO Dept</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span
                                                                                        class="text-muted text-label data-label d-inline-block">Business
                                                                                        Unit</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1"
                                                                                            title="A2S">A2S</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="topbarContent emp-job" style="display:none;">
                                                                <div>
                                                                    <div>
                                                                        <div class="p-20 row no-gutters">
                                                                            <div class="form-row col-sm-12 data-bar">
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">EMPLOYEE
                                                                                            NUMBER</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="1014">1014</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">DATE
                                                                                            OF JOINING</span>
                                                                                        <div>
                                                                                            <span>Apr 01, 2020</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-row col-sm-12 data-bar mt-12">
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">In
                                                                                            Probation?</span>
                                                                                        <div>
                                                                                            <span>No </span>
                                                                                            <span
                                                                                                class="text-muted text-small">Apr
                                                                                                01, 2020 - Sep 01,
                                                                                                2021</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Dotted
                                                                                            Line Manspan/label>
                                                                                            <div>
                                                                                                <span
                                                                                                    class="text-capitalize text-truncate-1"
                                                                                                    title=""></span>
                                                                                                <span>-Not Set-</span>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-row col-sm-12 data-bar mt-12">
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Reports
                                                                                            to</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-capitalize text-truncate-1"
                                                                                                title="Vivek Dahiya">Vivek
                                                                                                Dahiya</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Time
                                                                                            Type</span>
                                                                                        <div>
                                                                                            <span>Full Time</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-row col-sm-12 data-bar mt-12">
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">PAY
                                                                                            GRADE</span>
                                                                                        <div>
                                                                                            <span>-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Worker
                                                                                            Type</span>
                                                                                        <div>
                                                                                            <span>Permanent</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-row col-sm-12 data-bar mt-12">
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Cost
                                                                                            Center</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="-Not Set-">-Not
                                                                                                Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Segment</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="-Not Set-">-Not
                                                                                                Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Hub</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="-Not Set-">-Not
                                                                                                Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Zone</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="-Not Set-">-Not
                                                                                                Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Territory</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="-Not Set-">-Not
                                                                                                Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span
                                                                                            class="text-muted text-label data-label d-inline-block">Region</span>
                                                                                        <div>
                                                                                            <span
                                                                                                class="text-truncate-1"
                                                                                                title="-Not Set-">-Not
                                                                                                Set-</span>
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
                                            </div>
                                        </div>
                                    </div>
                                    <p class="m-0 mb-2"><span>{{$employee->designation}}
                                            <!-- <span> - Senior Director</span> -->
                                        </span></p>
                                    <p class="m-0"><span><span class="text-muted"
                                                title="Accounting -1 > CEO Dept">Department :
                                            </span>{{$employee->department}}</span></p>
                                    <p class="m-0"><span><span class="text-muted">Location :
                                            </span>{{$employee->location}}</span></p>


                                    <p class="m-0"><span><span class="text-muted">Reporting Manager :
                                            </span>{{$employee->l1_manager_name }}</span></p>

                                    <p class="m-0"><span><span class="text-muted">Email :
                                            </span>{{$employee->email_id}}</span></p>
                                    <p class="m-0"><span><span class="text-muted">Work : </span>(206) 2964654</span></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Do not delete thie design code -->
                <!-- <div class="col-default-3">
                    <div class="card employee-profile-card">
                        <div class="card-body employee-profile-header">
                            <div class="row mt-2">
                                <p class="col-auto pl-3 col-img-circle" style="width:95px;"><span class="img-initials" style="background-color: rgb(134, 192, 106);width: 72px;height: 72px;font-size:25px;"> HM </span></p>
                                <div class="pt-2 col">
                                    <div class="d-flex align-items-center">
                                        <h4 title="Dheeraj" class="m-0"><b>Dheeraj</b></h4>
                                        <div class="ml-2">
                                        <a tabindex="0"
                                                role="button" 
                                                data-html="true" 
                                                data-toggle="popover" 
                                                data-trigger="focus" 
                                                data-popover-content="#a2"
                                                title='' 
                                                data-content="<div><b>Example popover</b> - content</div>"><i class="fa fa-ellipsis-h" style="border:1px solid;"></i>
                                            </a>
                                            <div style="display:none" id="a2">
                                                <div class="popover-body p-0">
                                                    <div class="d-flex pl-20 pr-8 py-8 bg-muted justify-content-between border-bottom">
                                                        <div class="employee-profile-header align-items-center d-flex">
                                                            <img class="rounded-circle header-profile-user" src="{{ URL::asset('images/1656140741.png') }}" alt="Header Avatar">
                                                            <div class="employee-details max-w-124 pl-4">
                                                                <h5 class="title text-truncate m-0" title="Dheeraj">Dheeraj</h5>
                                                            </div>
                                                            <div class="badge badge-custom bg-accent-violet ml-10">Leave</div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a target="_blank" href="/#/employee/63968/about"><span class="mr-10 icon"><i class="fa fa-external-link"></i></span></a>
                                                            <a class="popover-close cursor-pointer"><span class="icon"><i class="fa fa-times"></i></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="min-h-250">
                                                        <div>
                                                            <ul class="nav sub-topnav px-20">
                                                                <li class="active topbarNav" id="profile"><a>Profile</a></li>
                                                                <li class="topbarNav" id="job"><a>Job</a></li>
                                                            </ul>
                                                            <div class="topbarContent emp-profile">
                                                                <div>
                                                                    <div class="px-20 p-16 row no-gutters">
                                                                        <div class="col-sm-12 data-bar mb-16"><h5 class="text-muted">Contact Details</h5>
                                                                            <div class="form-row mt-8">
                                                                                <div class="col-sm-6 clear-padding">
                                                                                    <span class="mr-20">
                                                                                        <span class="icon icon-sm mr-8"><i class="fa fa-envelope"></i></span>dheeraj@simha.in
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding">
                                                                                    <span class="mr-20">
                                                                                        <span class="icon icon-xs mr-8"><i class="fa fa-phone"></i></span>4027684424
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row col-sm-12 data-bar mt-12">
                                                                            <div class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span class="text-muted text-label data-label d-inline-block">Location</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1" title="Chennai">Chennai</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span class="text-muted text-label data-label d-inline-block">WORK PHONE</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1" title="(206) 2964654">(206) 2964654</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row col-sm-12 data-bar mt-12">
                                                                            <div class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-16">
                                                                                    <span class="text-muted text-label data-label d-inline-block">JOB TITLE</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1" title="HR HEAD">HR HEAD</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span class="text-muted text-label data-label d-inline-block">muted JOB TITLE</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1" title="Senior Director">Senior Director</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row col-sm-12 data-bar mt-12">
                                                                            <div class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span class="text-muted text-label data-label d-inline-block">Department</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1" title="Accounting -1 > CEO Dept">Accounting -1 &gt; CEO Dept</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 clear-padding data-block">
                                                                                <div class="d-inline-block mr-20">
                                                                                    <span class="text-muted text-label data-label d-inline-block">Business Unit</span>
                                                                                    <div>
                                                                                        <span class="text-truncate-1" title="A2S">A2S</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="topbarContent emp-job" style="display:none;">
                                                                <div>
                                                                    <div>
                                                                        <div class="p-20 row no-gutters">
                                                                            <div class="form-row col-sm-12 data-bar">
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">EMPLOYEE NUMBER</span>
                                                                                        <div>
                                                                                            <span class="text-truncate-1" title="1014">1014</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">DATE OF JOINING</span>
                                                                                        <div>
                                                                                            <span>Apr 01, 2020</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row col-sm-12 data-bar mt-12">
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">In Probation?</span>
                                                                                        <div>
                                                                                            <span>No </span>
                                                                                            <span class="text-muted text-small">Apr 01, 2020 - Sep 01, 2021</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Dotted Line Manspan/label>
                                                                                        <div>
                                                                                            <span class="text-capitalize text-truncate-1" title=""></span>
                                                                                            <span>-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row col-sm-12 data-bar mt-12">
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Reports to</span>
                                                                                        <div>
                                                                                            <span class="text-capitalize text-truncate-1" title="Vivek Dahiya">Vivek Dahiya</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Time Type</span>
                                                                                        <div>
                                                                                            <span>Full Time</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row col-sm-12 data-bar mt-12">
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">PAY GRADE</span>
                                                                                        <div>
                                                                                            <span>-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Worker Type</span>
                                                                                        <div>
                                                                                            <span>Permanent</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row col-sm-12 data-bar mt-12">
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Cost Center</span>
                                                                                            <div>
                                                                                                <span class="text-truncate-1" title="-Not Set-">-Not Set-</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6 clear-padding data-block">
                                                                                        <div class="d-inline-block mr-20">
                                                                                            <span class="text-muted text-label data-label d-inline-block">Segment</span>
                                                                                        <div>
                                                                                            <span class="text-truncate-1" title="-Not Set-">-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Hub</span>
                                                                                        <div>
                                                                                            <span class="text-truncate-1" title="-Not Set-">-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Zone</span>
                                                                                        <div>
                                                                                            <span class="text-truncate-1" title="-Not Set-">-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Territory</span>
                                                                                        <div>
                                                                                            <span class="text-truncate-1" title="-Not Set-">-Not Set-</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 clear-padding data-block">
                                                                                    <div class="d-inline-block mr-20">
                                                                                        <span class="text-muted text-label data-label d-inline-block">Region</span>
                                                                                        <div>
                                                                                            <span class="text-truncate-1" title="-Not Set-">-Not Set-</span>
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
                                            </div>
                                        </div>
                                    </div>
                                    <p class="m-0 mb-2"><span>HR HEAD  <span> - Senior Director</span></span></p>
                                    <p class="m-0"><span><span class="text-muted" title="Accounting -1 > CEO Dept">Department : </span>Accounting -1 &gt; CEO Dept</span></p>
                                    <p class="m-0"><span><span class="text-muted">Location : </span>Chennai</span></p>
                                    <p class="m-0"><span><span class="text-muted">Email : </span>dheeraj@simha.in</span></p>
                                    <p class="m-0"><span><span class="text-muted">Work : </span>(206) 2964654</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                    <button class="btn border-0 outline-none add-onboard-btn text-white  mx-2 ">
                        <i class="ri-menu-add-line fw-bold"></i>
                    </button>
                    <button class="btn border-0 outline-none onboard-employee-btn  text-white">
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
                <tr>
                    <td> <span>1</span></td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('assets/images/login_bg3.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1">
                                Jordan Kennedy
                            </div>
                        </div>
                    </td>

                    <td><span>Hr</span></td>
                    <td><span>ray</span></td>

                    <td><span>ray@gmail.com</span></td>
                    <td><span> B <sup>+</sup></span></td>
                    <td>60%</td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <button class="btn border-0 outline-none bg-transparent p-0  mx-1">
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

            </tbody>

        </table>
        <!-- end table -->
    </div>

</div><!-- end row -->





@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
});
</script>
@endsection