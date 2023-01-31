@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/roles_permission.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="roles-permission-wrapper mt-30">

        <div class="card  mb-2 top-line">
            <div class="card-body pb-0 pt-1">
                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item  " role="presentation">
                        <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#user_details" role="tab" aria-controls="" aria-selected="true">
                            Details</a>
                    </li>
                    <li class="nav-item mx-4  " role="presentation">
                        <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#user_roles" role="tab" aria-controls="" aria-selected="true">
                            Users</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body px-4">
                <div class="tab-content " id="pills-tabContent">
                    <div class="tab-pane fade active show" id="user_details" role="tabpanel" aria-labelledby="">
                        <div class="newRole-content details">

                            <div class="row mb-2">
                                <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                                    <p class="fw-bold text-ash-dark fs-16">Role Details</p>
                                </div>
                                <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-12 mb-3">
                                    <label for="" class="">Role title</label>
                                    <input type="text" name="" id="" class="form-control  "
                                        placeholder="Role title">
                                </div>
                                <div
                                    class="col-sm-12 d-none d-xl-block d-xxl-block d-lg-block  d-sm-none d-md-none col-xl-6 col-lg-6 col-xxl-6 mb-3">
                                </div>
                                <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-12 mb-3">
                                    <label for="" class="">Role description</label>
                                    <textarea type="text" name="" id="" class="form-control   resize-none " cols=""
                                        rows="4"></textarea>
                                </div>
                                <div
                                    class="col-sm-12 d-none d-xl-block d-xxl-block d-lg-block  d-sm-none d-md-none col-xl-6 col-lg-6 col-xxl-6 mb-3">
                                </div>
                                <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-12 mb-3">
                                    <label for="" class="">Assigned to</label>
                                    <div class="roles-filter search-bar-wrapper">
                                        <i class="fa fa-search"></i>
                                        <input type="text" name="" id="" class="form-control "
                                            placeholder="Search....">
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 d-none d-xl-block d-xxl-block d-lg-block  d-sm-none d-md-none col-xl-6 col-lg-6 col-xxl-6 mb-3">
                                </div>
                                {{-- selected user will appear while searching them and choosed   --}}
                                <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-12 mb-3">

                                    <div id="" class="selected-user-container form-control " cols=""
                                        rows="4">
                                        <div class="chip align-items-center">
                                            <div class="chips-img-sm me-2">
                                                <img src="{{ URL::asset('assets/images/holiday/Diwali.png') }}"
                                                    class="rounded-circle h-100 w-100" alt="">
                                            </div>

                                            <div class="text-start ">
                                                <p class="user-name fs-12 text-ash-dark ">Praveen </p>
                                                <p class="user-role fs-10 text-muted">Lead Frotend Developer</p>
                                            </div>

                                            <button class="ms-2 closebtn-wrapper  outlin-none border-0 "
                                                onclick="this.parentElement.style.display='none'"> &times;
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-none d-xl-block d-xxl-block d-lg-block  d-sm-none d-md-none col-xl-6 col-lg-6 col-xxl-6 mb-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                                    <h6 class="mb-2 text-ash-dark">Set Permissions</h6>
                                </div>
                                <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-6 mb-3">
                                    <div class="accordion" id="roles_permissions">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="asset_heading">
                                                <div class="d-flex align-items-center ">
                                                    <button
                                                        class="accordion-button   text-ash-dark  outline-none border-0 collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#asset_privileges" aria-expanded="true"
                                                        aria-controls="">
                                                        <input class="form-check-input me-2" type="checkbox"
                                                            value="" id=""> Assets Privileges

                                                    </button>
                                                </div>
                                            </div>
                                            <div id="asset_privileges" class="accordion-collapse collapse "
                                                aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                                <div class="accordion-body">

                                                    <ul class="list-unstyled privileges-list">
                                                        <li>
                                                            <div class=""> <input class="form-check-input me-2"
                                                                    type="checkbox" value="" id="assest"> <span
                                                                    for="assest">View Asset
                                                                    Dashboard</span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class=""> <input class="form-check-input me-2"
                                                                    type="checkbox" value="" id=""> <span>
                                                                    View Asset
                                                                    Inventory
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span> Add Individual
                                                                    Asset</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span> Edit
                                                                    Individual Asset Information</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span> Bulk import
                                                                    assets & assignment</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign Asset to
                                                                    an Employee</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Update Asset
                                                                    Availability</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Recover Asset &
                                                                    Update Condition</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View
                                                                    Reports</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span> Download
                                                                    Reports</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Asset
                                                                    DefinitionsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Asset
                                                                    SettingsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Delete
                                                                    Asset</span>
                                                            </div>
                                                        </li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="asset_heading">
                                                <div class="d-flex align-items-center ">
                                                    <button
                                                        class="accordion-button   text-ash-dark  collapsed outline-none border-0"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#attendance_privileges" aria-expanded="true"
                                                        aria-controls="">
                                                        <input class="form-check-input me-2" type="checkbox"
                                                            value="" id=""> Attendance Privileges
                                                    </button>
                                                </div>
                                            </h2>
                                            <div id="attendance_privileges" class="accordion-collapse collapse "
                                                aria-labelledby="" data-bs-parent="#roles_permissions">
                                                <div class="accordion-body">

                                                    <ul class="list-unstyled privileges-list">
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employees
                                                                    attendance details
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Apply for
                                                                    attendance adjustment /
                                                                    regularisation on behalf of employees</span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    attendance adjustment /
                                                                    regularisation requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Apply 'Work from
                                                                    Home (WFH) / On Duty
                                                                    (OD)' on behalf of employees</span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    'Work from Home (WFH) / On
                                                                    Duty (OD)' requests</span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Cancel 'Work from
                                                                    Home (WFH) / On Duty
                                                                    (OD)' requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Apply for partial
                                                                    day on behalf of
                                                                    employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    partial day
                                                                    requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Cancel partial
                                                                    day request</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employees'
                                                                    overtime (OT)
                                                                    requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Apply for
                                                                    overtime (OT) permission on
                                                                    behalf of employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    overtime (OT)
                                                                    requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Cancel Overtime
                                                                    request</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    'Remote Clock-In'
                                                                    requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign Shifts and
                                                                    Weekly-offs to
                                                                    Employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Shift and
                                                                    Weekly-offs</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Shifts and
                                                                    Weekly-offsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign tracking
                                                                    policies to
                                                                    Employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Tracking
                                                                    Policy</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage tracking
                                                                    policiesGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign capture
                                                                    scheme to Employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Capture
                                                                    scheme</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage capture
                                                                    schemeGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employees'
                                                                    Shift/Weekly-off
                                                                    requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Apply for
                                                                    Shift/Weekly-off permission on
                                                                    behalf of employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    Shift/Weekly-off
                                                                    requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View
                                                                    Shift/Weekly-off Rules</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage
                                                                    Shift/Weekly-off
                                                                    RulesGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign
                                                                    Shift/Weekly-off Rule to
                                                                    Employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage employees
                                                                    on shift
                                                                    boardGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Shift
                                                                    BoardGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Shift
                                                                    BoardGlobal</span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage employees
                                                                    in shift
                                                                    RotationGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Shift
                                                                    RotationGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Shift
                                                                    RotationGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View holiday
                                                                    ListsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage holiday
                                                                    ListsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign OT policy
                                                                    to employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage OT Policy
                                                                    and Pay
                                                                    CodesGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View OT Policy
                                                                    and Pay Codes</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Attendance
                                                                    Diplay
                                                                    SettingsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage IP Network
                                                                    ConfigurationGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Geo
                                                                    LocationsGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Geo
                                                                    Locations</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View attendance
                                                                    reports of
                                                                    employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Download
                                                                    attendance reports of
                                                                    employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Attendance
                                                                    Dashboard Summary</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Shift
                                                                    Allowance</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Shift
                                                                    AllowanceGlobal</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Assign Shift
                                                                    Allowance</span>
                                                            </div>
                                                        </li>



                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="asset_heading">
                                                <div class="d-flex align-items-center ">
                                                    <button
                                                        class="accordion-button   text-ash-dark  collapsed outline-none border-0"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#employee_document" aria-expanded="true"
                                                        aria-controls="">
                                                        <input class="form-check-input me-2" type="checkbox"
                                                            value="" id=""> Employee Document

                                                    </button>
                                                </div>
                                            </h2>
                                            <div id="employee_document" class="accordion-collapse collapse "
                                                aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                                <div class="accordion-body">

                                                    <ul class="list-unstyled privileges-list">
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Employee
                                                                    Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add / Edit
                                                                    Employee Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Delete Employee
                                                                    Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Download Employee
                                                                    Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Remind Employee
                                                                    To Submit Document</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Verify Employee
                                                                    Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Document
                                                                    Definitions</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Document
                                                                    Audit Logs</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Bulk
                                                                    Upload Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Move Bulk
                                                                    Uploaded Documents in
                                                                    Profile</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Employee Letter
                                                                    Privileges</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Employee
                                                                    Letters</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Download Employee
                                                                    Letters</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Generate Employee
                                                                    Letters</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Letter
                                                                    Templates</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Org Document
                                                                    Privileges</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add / Edit Org
                                                                    Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Delete Org
                                                                    Documents</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Org
                                                                    Document Folders</span>
                                                            </div>
                                                        </li>



                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="asset_heading">
                                                <div class="d-flex align-items-center ">
                                                    <button
                                                        class="accordion-button   text-ash-dark  collapsed outline-none border-0"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#finance_previleges" aria-expanded="true"
                                                        aria-controls="">
                                                        <input class="form-check-input me-2" type="checkbox"
                                                            value="" id=""> Employee Finance Privileges


                                                    </button>
                                                </div>
                                            </h2>
                                            <div id="finance_previleges" class="accordion-collapse collapse "
                                                aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                                <div class="accordion-body">

                                                    <ul class="list-unstyled privileges-list">
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Employee
                                                                    Salary Details</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add/Update Salary
                                                                    Details</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employee
                                                                    Payslips</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View
                                                                    IncomeTaxDetails</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Access Form
                                                                    12BB</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employee
                                                                    income tax
                                                                    declarations</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage employee
                                                                    income tax
                                                                    declarations</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Delete Employee
                                                                    Declarations</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employee
                                                                    component claims</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add/Update
                                                                    employee component
                                                                    claims</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve employee
                                                                    component claims</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employee FBP
                                                                    declarations</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add/Update
                                                                    employee FBP
                                                                    declaration</span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Previous
                                                                    Income</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add Previous
                                                                    Income</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View employee
                                                                    financial data</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add/Update
                                                                    employee financial data</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View loan
                                                                    details</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Request loan for
                                                                    employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Add loan for
                                                                    employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    loan request</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Update loan of
                                                                    Employees</span>
                                                            </div>
                                                        </li>

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="asset_heading">
                                                <div class="d-flex align-items-center ">
                                                    <button
                                                        class="accordion-button  collapsed  text-ash-dark  outline-none border-0"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#leave_previleges" aria-expanded="true"
                                                        aria-controls="">
                                                        <input class="form-check-input me-2" type="checkbox"
                                                            value="" id=""> leave Privileges



                                                    </button>
                                                </div>
                                            </h2>
                                            <div id="leave_previleges" class="accordion-collapse collapse "
                                                aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                                <div class="accordion-body">

                                                    <ul class="list-unstyled privileges-list">
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Employee
                                                                    Leave Details</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Apply Leave on
                                                                    behalf of Employee</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Change Leave
                                                                    Type</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Change Employee
                                                                    Leave Dates</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Award
                                                                    Comp-offs</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    Leave Requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Approve/Reject
                                                                    Comp-off Requests</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Cancel Employee
                                                                    Leave Request</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Cancel Employee
                                                                    Penalized Leave
                                                                    Request</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Leave
                                                                    Reports of Employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Download Leave
                                                                    Reports of
                                                                    Employees</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Delete Employee
                                                                    Leave Permanently</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Leave
                                                                    Plan</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>Manage Leave
                                                                    Plan</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center"> <input
                                                                    class="form-check-input me-2" type="checkbox"
                                                                    value="" id=""> <span>View Leave
                                                                    Dashboard Summary</span>
                                                            </div>
                                                        </li>

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-10 col-lg-10 col-xxl-10 col-md-10 my-3 ">

                                    <div class="d-flex align-items-center justify-content-end">
                                        <button class="btn btn-border-orange me-3">Cancel</button>
                                        <button class="btn btn-dark me-3">Delete Role</button>
                                        <button class="btn btn-orange">Save Changes</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="user_roles" role="tabpanel" aria-labelledby="">
                        <div class="user-roles">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="text-muted fs-13"><i class="fa fa-info-circle me-2 text-dark"
                                        aria-hidden="true"></i>Here you can manage the Users/Employees</span>
                                <button class="btn btn-orange" data-bs-toggle="collapse"
                                    data-bs-target="#select_users"><i class="fa fa-plus-circle me-2"></i>Add New
                                    User</button>
                            </div>
                            <div class="collapse" id="select_users">
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-xl-4 col-lg-4 text-start  col-xxl-4 col-md-4">
                                        <label for="" class="mb-2">Select Users</label>
                                        <div class="roles-filter search-bar-wrapper">
                                            <i class="fa fa-search"></i>
                                            <input type="text" name="" id=""
                                                class="form-control border-0 box-shadow-none outline-none border-bottom w-100"
                                                placeholder="Search....">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-4 col-lg-4 text-start  col-xxl-4 col-md-4 ">
                                        <button class="btn btn-orange px-3" style="margin: 23px 0px 0px 0px">Add</button>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 ">
                                    <div class="user-info-table" id="userRole-table"></div>
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
    <script>
        $(document).ready(function() {

            if (document.getElementById("userRole-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'number',
                            name: 'User',

                        },
                        {
                            id: 'number',
                            name: 'Employee Id',

                        },
                        {
                            id: 'number',
                            name: 'Added On (dd/mm/yyyy)',

                        },
                        {
                            id: 'number',
                            name: 'Actions',

                        },



                    ],
                    data: [

                    ],

                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                }).render(document.getElementById("userRole-table"));


            }



        });
    </script>
@endsection
