@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/holiday.css') }}">
    <script src="{{ URL::asset('assets/js/calendar-vanila.js') }}" defer></script>


    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection


@section('content')
    <div class="dashboard-wrapper mt-30">
        <div class="card  left-line mb-2">
            <div class="card-body  pb-0 pt-1">
                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted me-5" role="presentation">
                        <a class="nav-link  pb-2" data-bs-toggle="tab" href="#dashboard" aria-selected="true"
                            role="tab">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item text-muted" role="presentation">
                        <a class="nav-link active pb-2" data-bs-toggle="tab" href="#hrDashboard" aria-selected="true"
                            role="tab">
                            HR Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show fade  " id="dashboard" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-sm-12 col-md-6  col-xl-4 col-lg-4 col-xxl-4">
                        @include('ui-dashboard-welcome-card')
                    </div>
                    <div class="col-sm-12 col-md-6  col-xl-4 col-lg-4  d-flex col-xxl-4">
                        <div class="attendance-wrapper card w-100  border-0 box-shadow-md">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class=" text-primary ">Current Month</span>
                                    <a role="button"><span class="text-primary fs-11">View All</span></a>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4  col-xl-4 col-lg-4 col-xxl-4">
                                        <div class="card   border-0 box-shadow-sm  bg-green-lighten">
                                            <div class="py-2 card-body text-center mx-auto">
                                                <img src="{{ URL::asset('assets/images/dashboard/present.svg') }}"
                                                    class="" alt="present-icon" height="20px" width="20px">
                                                <div class="d-flex">
                                                    <span class="h1">0</span><span class="fs-12 ms-1 mt-4">days</span>

                                                </div>
                                                <p class="text-primary   ">Present</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4  col-xl-4 col-lg-4 col-xxl-4">
                                        <div class="card   border-0 box-shadow-sm bg-pink-lighten">
                                            <div class="py-2 card-body text-center mx-auto">
                                                <img src="{{ URL::asset('assets/images/dashboard/leave.svg') }}"
                                                    class="" alt="leave-icon" height="20px" width="20px">
                                                <div class="d-flex">
                                                    <span class="h1">0</span><span class="fs-12 ms-1 mt-4">days</span>

                                                </div>
                                                <p class="text-primary   ">Leave</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4  col-xl-4 col-lg-4 col-xxl-4">
                                        <div class="card   border-0 box-shadow-sm bg-sky-lighten">
                                            <div class="py-2 card-body text-center mx-auto">

                                                <img src="{{ URL::asset('assets/images/dashboard/absent.svg') }}"
                                                    class="" alt="absent-icon" height="20px" width="20px">
                                                <div class="d-flex">
                                                    <span class="h1">0</span><span class="fs-12 ms-1 mt-4">days</span>

                                                </div>
                                                <p class="text-primary   ">Absent </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  col-xl-4 col-lg-4 d-flex col-xxl-4">
                        @include('ui-dashboard-holiday-card')
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4 col-xxl-4">
                        <div class="notification-wrapper card w-100  border-0 box-shadow-md">
                            <div class="card-body ">
                                <div class=" mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                    id=""> <span>Notifications</span> <i type="button"
                                        class=" position-relative fa fa-bell">

                                        {{-- <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
                                            5+
                                            <span class="visually-hidden">unread messages</span>
                                        </span> --}}
                                    </i> </div>
                                <div class="contents  ">
                                    <div class="card mb-0 border-left-orange mb-3 bg-orange-lighten border-0 box-shadow-sm">
                                        <div class="card-body p-2">
                                            <div class="notify-content ">
                                                <p class="orange-median align-items-center d-flex justify-content-between mb-1"><span
                                                        class="  ">Leave</span><span
                                                        class="fs-11  ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-0 border-left-skyBlue mb-3 bg-sky-lighten border-0 box-shadow-sm">
                                        <div class="card-body p-2">
                                            <div class="notify-content ">
                                                <p class="sky-median d-flex justify-content-between mb-1"><span
                                                        class="  ">Leave</span><span
                                                        class="fs-11  ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-0 border-left-green mb-3 bg-green-lighten border-0 box-shadow-sm">
                                        <div class="card-body p-2">
                                            <div class="notify-content ">
                                                <p class="green-median d-flex justify-content-between mb-1"><span
                                                        class="  ">Leave</span><span
                                                        class="fs-11  ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-0 border-left-blue  border-0 box-shadow-sm">
                                        <div class="card-body p-2">
                                            <div class="notify-content ">
                                                <p class="blue-median d-flex justify-content-between mb-1"><span
                                                        class="  ">Leave</span><span
                                                        class="fs-11  ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  col-xl-4 col-lg-4   col-xxl-4">

                        <div class="leave-balance-wrapper card w-100 border-0 box-shadow-md">
                            <div class="card-body ">
                                <div class=" mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                    id=""> <span>Leave Balance</span>
                                </div>

                                <div class="contents">
                                    <div class="card leave-balance-card">
                                        <div class="card-body p-0">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3  col-xl-3 col-lg-3   col-xxl-3  leave-balance-container">
                                                    <div class="m-auto   leave-balance-available">
                                                        <span class=" ">9</span>
                                                        <span class=" ">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9  col-xl-9 col-lg-9  d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Casual Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card leave-balance-card">
                                        <div class="card-body p-0">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3  col-xl-3 col-lg-3   col-xxl-3  leave-balance-container">
                                                    <div class="m-auto   leave-balance-available">
                                                        <span class=" ">9</span>
                                                        <span class=" ">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9  col-xl-9 col-lg-9  d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Casual Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card leave-balance-card">
                                        <div class="card-body p-0">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3  col-xl-3 col-lg-3   col-xxl-3  leave-balance-container">
                                                    <div class="m-auto   leave-balance-available">
                                                        <span class=" ">9</span>
                                                        <span class=" ">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9  col-xl-9 col-lg-9  d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Casual Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card leave-balance-card">
                                        <div class="card-body p-0">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3  col-xl-3 col-lg-3   col-xxl-3  leave-balance-container">
                                                    <div class="m-auto   leave-balance-available">
                                                        <span class=" ">9</span>
                                                        <span class=" ">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9  col-xl-9 col-lg-9  d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Sick Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  col-xl-4 col-lg-4 d-flex col-xxl-4">
                        <div class="calendar-wrapper card  border-0 w-100">
                            <div class="card-body p-0">
                                <div class="_wrapper">
                                    <div class=" _container-calendar">
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
                    </div>
                </div>
            </div>
            <div class="tab-pane show fade active " id="hrDashboard" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div class="hr-dashboard">
                    <div class="row">
                        <div class="col-sm-12  col-md-6  col-xl-9 col-lg-9  col-xxl-9">
                            <div class="row ">
                                <div class="col-sm-6 col-6   col-md-6   col-xl-3 col-lg-3  col-xxl-3">
                                    <div class="card">
                                        <div class="card-body px-1 d-flex align-items-center">
                                            <div class=" me-2">
                                                <div class="icons  bg-blue-lighten">
                                                    <i class='fas fa-users blue-darken'></i>
                                                </div>

                                            </div>

                                            <div class="">
                                                <p class="fs-13 text-muted  mb-1 text-center">Total Employees</p>
                                                <p class="text-primary fs-17  text-center">100</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-6   col-md-6   col-xl-3 col-lg-3  col-xxl-3">
                                    <div class="card">
                                        <div class="card-body px-1 d-flex align-items-center">
                                            <div class=" me-2">
                                                <div class="icons  bg-green-lighten">
                                                    <i class='fas fa-user-plus  green-median'></i>
                                                </div>

                                            </div>

                                            <div class="">
                                                <p class="fs-13 text-muted mb-1 text-center">New Employees</p>
                                                <p class="text-primary fs-17  text-center">100</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-6   col-md-6   col-xl-3 col-lg-3  col-xxl-3">
                                    <div class="card">
                                        <div class="card-body px-1 d-flex align-items-center">
                                            <div class=" me-2">
                                                <div class="icons  bg-pink-lighten ">
                                                    <i class='fas fa-user-check  pink-median'></i>
                                                </div>

                                            </div>

                                            <div class="">
                                                <p class="fs-13 text-muted  mb-1 text-center"> Employees Present</p>
                                                <p class="text-primary fs-17  text-center">100</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-6   col-md-6   col-xl-3 col-lg-3  col-xxl-3">
                                    <div class="card">
                                        <div class="card-body px-1 d-flex align-items-center">
                                            <div class=" me-2">
                                                <div class="icons  bg-sky-lighten">
                                                    <i class='fas fa-user-minus  sky-median'></i>
                                                </div>

                                            </div>

                                            <div class="">
                                                <p class="fs-13 text-muted mb-1 text-center"> Employees On Leave
                                                </p>
                                                <p class="text-primary fs-17  text-center">100</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-12  col-md-12  col-xl-5 col-lg-5 col-xxl-5">
                                    <div class="task-wrapper card w-100 border-0 box-shadow-md">
                                        <div class="card-body ">
                                            <div class=" mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                                id=""> <span>Task</span>
                                            </div>
                                            <div class="contents  contents-h-445">
                                                <div class="card task-card  border-left-orange bg-orange-lighten">
                                                    <div class="card-body p-2">
                                                        <div class="notify-content ">
                                                            <div
                                                                class="orange-median d-flex align-items-center justify-content-between mb-1">
                                                                <span class="">Interview
                                                                    Scheduled</span><span class="fs-11 ">1:00 PM -
                                                                    2:00 PM</span>
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="fs-10">
                                                                    Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Ut, alias.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card task-card border-left-skyBlue bg-sky-lighten">
                                                    <div class="card-body p-2">
                                                        <div class="notify-content ">
                                                            <p
                                                                class="sky-median  align-items-center d-flex justify-content-between mb-1">
                                                                <span class="">Meeting</span><span
                                                                    class="fs-11">1:00 PM - 2:00 PM</span>
                                                            </p>
                                                            <div class="notify-message">
                                                                <p class="fs-10">
                                                                    Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Ut, alias.

                                                                    Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Ut, alias. </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card task-card border-left-green bg-green-lighten ">
                                                    <div class="card-body p-2">
                                                        <div class="notify-content ">
                                                            <p class="green-median d-flex justify-content-between mb-1">
                                                                <span class=" ">Leave</span><span
                                                                    class="fs-11">Request Approved</span>
                                                            </p>
                                                            <div class="notify-message">
                                                                <p class="fs-10">
                                                                    Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Ut, alias.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card task-card border-left-blue  ">
                                                    <div class="card-body p-2">
                                                        <div class="notify-content ">
                                                            <p class="blue-median d-flex justify-content-between mb-1">
                                                                <span class=" ">Leave</span><span
                                                                    class="fs-11">Request Approved</span>
                                                            </p>
                                                            <div class="notify-message">
                                                                <p class="fs-10">
                                                                    Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Ut, alias.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12  col-md-12  col-xl-7 col-lg-7  col-xxl-7">
                                    <div class="row">
                                        <div class="col-sm-12  col-md-12  col-xl-12 col-lg-12  col-xxl-12">
                                            <div class="card">
                                                <div class="card-body ">
                                                    <div class=" card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                                        id=""> <span>Employee Status</span>
                                                    </div>
                                                    <div class="employee-status-content">
                                                        <canvas id="employeeStatus"
                                                            style="width:100%;height:260px"></canvas>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12  col-md-12  col-xl-12 col-lg-12  col-xxl-12">
                                            <div class="card">
                                                <div class="card-body ">
                                                    <div class="  card-title d-flex align-items-center justify-content-between  "
                                                        id=""> <span class="text-primary">Leave Request</span>
                                                    </div>
                                                    <ul class="leave-request-wrapper ">
                                                        <li class="leave-request-content">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class=" d-flex align-items-center">
                                                                    <div class="user-img">
                                                                        <div class="icons  bg-blue-lighten">
                                                                            <i class='fas fa-users blue-darken'></i>
                                                                        </div>

                                                                    </div>
                                                                    <div class=" leave-request-user  mx-2">
                                                                        <p class="f-14 text-primary ">Anto</p>
                                                                        <p class="fs-10">Technical Lead</p>
                                                                    </div>

                                                                </div>

                                                                <div class="mx-3 leave-request-date">
                                                                    <p class="rounded-pill  px-3">
                                                                        2 days Casual Leave
                                                                    </p>
                                                                    <p class="fs-10 text-center text-muted">13 jan - 16 jan
                                                                    </p>
                                                                </div>
                                                                <a role="button"
                                                                    class="btn border-primary leave-request-view">View</a>

                                                            </div>


                                                        </li>
                                                        <li class="leave-request-content">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class=" d-flex align-items-center">
                                                                    <div class="user-img">
                                                                        <div class="icons  bg-blue-lighten">
                                                                            <i class='fas fa-users blue-darken'></i>
                                                                        </div>

                                                                    </div>
                                                                    <div class=" leave-request-user  mx-2">
                                                                        <p class="f-14 text-primary ">Karthikeyan
                                                                        </p>
                                                                        <p class="fs-10">Technical Lead</p>
                                                                    </div>

                                                                </div>

                                                                <div class="mx-3 leave-request-date">
                                                                    <p class="rounded-pill  px-3">
                                                                        2 days Casual Leave
                                                                    </p>
                                                                    <p class="fs-10 text-center text-muted">13 jan - 16 jan
                                                                    </p>
                                                                </div>
                                                                <a role="button"
                                                                    class="btn border-primary leave-request-view">View</a>

                                                            </div>


                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6  col-xl-3 col-lg-3  col-xxl-3">
                            <div class="request-wrapper card w-100 mb-3 border-0 box-shadow-md">
                                <div class="card-body ">
                                    <div class=" mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                        id=""> <span>Request</span>
                                    </div>
                                    <div class="contents  ">
                                        <div class="card mb-0  mb-3 bg-orange-lighten border-0 box-shadow-sm">
                                            <div class="card-body p-2">
                                                <div
                                                    class="request-content d-flex align-items-center justify-content-between">

                                                    <p class="fs-12  text-muted">Document Update</p>
                                                    <div class="d-flex align-items-center">
                                                        <span class=" me-1">20</span>
                                                        <i class="fa fa-arrow-up  arrow-cross-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-0  mb-3 bg-sky-lighten border-0 box-shadow-sm">
                                            <div class="card-body p-2">
                                                <div
                                                    class="request-content d-flex align-items-center justify-content-between">

                                                    <p class="fs-12  text-muted">Document Update</p>
                                                    <div class="d-flex align-items-center">
                                                        <span class=" me-1">20</span>
                                                        <i class="fa fa-arrow-up arrow-cross-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-0  mb-3 bg-yellow-lighten border-0 box-shadow-sm">
                                            <div class="card-body p-2">
                                                <div
                                                    class="request-content d-flex align-items-center justify-content-between">

                                                    <p class="fs-12  text-muted">Document Update</p>
                                                    <div class="d-flex align-items-center">
                                                        <span class=" me-1">20</span>
                                                        <i class="fa fa-arrow-up arrow-cross-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-0  mb-3 bg-blue-lighten border-0 box-shadow-sm">
                                            <div class="card-body p-2">
                                                <div
                                                    class="request-content d-flex align-items-center justify-content-between">

                                                    <p class="fs-12  text-muted">Reimbursement</p>
                                                    <div class="d-flex align-items-center">
                                                        <span class=" me-1">5</span>
                                                        <i class="fa fa-arrow-up arrow-cross-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-0  mb-3 bg-orange-lighten border-0 box-shadow-sm">
                                            <div class="card-body p-2">
                                                <div
                                                    class="request-content d-flex align-items-center justify-content-between">

                                                    <p class="fs-12  text-muted">Leave Request</p>
                                                    <div class="d-flex align-items-center">
                                                        <span class=" me-1">10</span>
                                                        <i class="fa fa-arrow-up arrow-cross-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="employee-wrapper card w-100 mb-3 border-0 box-shadow-md">
                                <div class="card-body ">
                                    <div class=" mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                        id=""> <span>Employee</span>
                                    </div>
                                    <div class="contents list-style-none  employee-contents">
                                        <div class="card mb-0 border  mb-3  box-shadow-sm">
                                            <div class="card-body p-2">
                                                <div
                                                    class="employee-content d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <p class="fs-13  text-dark">Design Team</p>
                                                        <p class="fs-10 text-muted">Total Members:10</p>
                                                    </div>
                                                    <div class="zee-cards-wrapper">
                                                        <ul class="zee-cards ">
                                                            <li>
                                                                <div class="user-img">
                                                                    <div class="icons  img-xs  bg-blue-lighten">
                                                                        <i class='fas fa-users blue-darken'></i>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-img">
                                                                    <div class="icons  img-xs  bg-green-lighten">
                                                                        <i class='fas fa-users blue-darken'></i>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-img">
                                                                    <div class="icons  img-xs bg-pink-lighten">
                                                                        <i class='fas fa-users blue-darken'></i>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-img">
                                                                    <div class="icons  img-xs  bg-blue-lighten">
                                                                        <i class='fas fa-users blue-darken'></i>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-img ">
                                                                    <div class="icons img-xs  bg-green-lighten">
                                                                        <i class='fas fa-users blue-darken'></i>
                                                                    </div>

                                                                </div>
                                                            </li>

                                                        </ul>
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

        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                        @include('ui-dashboard-event-card', [
                            'dashboardEmployeeEventsData' => $dashboardEmployeeEventsData,
                        ])

                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
@section('script')
    <!--Nice select-->
    <script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

    <!--Custom Js Script-->
    <script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/holiday.js') }}"></script>


    <!-- Prem assets ends -->

    <!-- apexcharts -->
    <!-- dashboard init -->
    @yield('welcome-script')
    @yield('script-profile-avatar')
    <!-- for date and time -->


    <script>
        function showOnlineUsers(element) {

            //create table
            <?php
            $online_users = json_decode($json_dashboardCountersData)->todayEmployeesCheckedIn;
            $html = '<ul>';
            foreach ($online_users as $singleUser) {
                $html = $html . '<li>' . $singleUser->name . '</li>';
            }
            $html = $html . '</ul>';
            ?>

            //


            // console.log(user_content);

            Swal.fire({
                title: 'Online Employees',
                html: '{!! $html !!}'
            });

            //alert("karthick");
        }


        $(document).ready(function() {

            $('body').on('click', '.plus-sign', function() {
                $('.content-container').append(
                    '<div class="mt-3 d-flex align-items-center"><input type="text" name="options[]"id="" class="form-control" placeholder="Add option here" required><i class="delete-row ri-delete-bin-7-fill mx-2 text-danger"></i></div>'
                );
            });


            $('body').on('click', '.delete-row', function() {
                $(this).parent().remove();
            });

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

            // Announcement Submit Form through Ajax starts
            $('#announcement-form-submit').on('submit', function(e) {
                e.preventDefault();
                if ($('#announcement-form-submit').is(':valid')) {
                    var announcementFormData = new FormData(document.getElementById(
                        "announcement-form-submit"));
                    console.log(announcementFormData);

                    $.ajax({
                        url: "{{ url('vmt-dashboard-announcement') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: announcementFormData,
                        beforeSend: function() {
                            $("#annon_menu_submit").attr("disabled", true);
                        },
                        success: function(data) {
                            Swal.fire("Success!", "Announcement added successfully", "success");
                            document.getElementById("announcement-form-submit").reset();
                            $("#annon_menu_submit").attr("disabled", false);
                        }
                    });

                }
            });
            // Announcement Submit Form through Ajax ends

            // Polling Submit Form through Ajax starts
            $('#polling-questions-form-submit').on('submit', function(e) {
                e.preventDefault();
                if ($('#polling-questions-form-submit').is(':valid')) {
                    var pollingFormData = new FormData(document.getElementById(
                        "polling-questions-form-submit"));
                    console.log(pollingFormData);

                    $.ajax({
                        url: "{{ url('vmt-dashboard-polling-question') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: pollingFormData,
                        beforeSend: function() {
                            $("#polling-submit-btn").attr("disabled", true);
                        },
                        success: function(data) {
                            if (data.status == true) {
                                Swal.fire("Success!", data.message, "success");
                                $('.delete-row').parent().remove();
                            } else {
                                Swal.fire("Error!", data.message, "error");
                            }
                            document.getElementById("polling-questions-form-submit").reset();
                            $("#polling-submit-btn").attr("disabled", false);
                        }
                    });

                }
            });

            $('#polling-cancel-btn').on('click', function(e) {
                document.getElementById("polling-questions-form-submit").reset();
            });
            // Polling Submit Form through Ajax ends

            // Praise Submit Form through Ajax starts
            $('#praise-form-submit').on('submit', function(e) {
                e.preventDefault();
                if ($('#praise-form-submit').is(':valid')) {
                    var praiseFormData = new FormData(document.getElementById("praise-form-submit"));
                    console.log(praiseFormData);

                    $.ajax({
                        url: "{{ url('vmt-dashboard-praise') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: praiseFormData,
                        beforeSend: function() {
                            $("#praise-submit-btn").attr("disabled", true);
                        },
                        success: function(data) {
                            if (data.status == true) {
                                Swal.fire("Success!", data.message, "success");
                            } else {
                                Swal.fire("Error!", data.message, "error");
                            }
                            document.getElementById("praise-form-submit").reset();
                            $("#praise-submit-btn").attr("disabled", false);
                        }
                    });

                }
            });
            // Praise Submit Form through Ajax Ends

            // $('#annon_menu_submit').click(function(e) {
            //     e.preventDefault();
            //     var image = $('#image_src').val();
            //     //alert(image);
            //     var title_data = $('#title_data').val();
            //     var details_data = $('#details_data').val();
            //     var user_ref_id = "{{ Auth::user()->id }}";
            //     $.ajax({
            //         type: "POST",
            //         url: "{{ url('vmt-dashboard-announcement') }}",
            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             title_data: title_data,
            //             user_ref_id: user_ref_id,
            //             details_data: details_data,
            //         },
            //         success: function(data) {
            //             // alert(data);
            //             location.reload();
            //         }
            //     })
            // });


            // for number increament

            $(function() {
                function count($this) {
                    var current = parseInt($this.html(), 10);
                    $this.html(++current);

                    if (current != 0) {
                        if (current !== $this.data('count')) {
                            setTimeout(function() {
                                count($this)
                            }, 50);
                        }
                    }
                }

                $(".number-increment").each(function() {
                    var currentValue = parseInt($(this).html(), 10);
                    $(this).data('count', currentValue);
                    $(this).html('0');

                    if (currentValue != 0)
                        count($(this));
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submit_post_data').submit(function(e) {
                e.preventDefault();
                // alert("helooo");
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('vmt-dashboard-post') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        alert('Post Created Successfully');
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });





        // show small card widget details



        $(document).ready(function() {

            if (document.getElementById("")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'number',
                            name: 'Supplier Id',

                        },
                        {
                            id: 'name ',
                            name: ' Name',

                        },
                        {
                            id: 'job_title',
                            name: 'Contact',
                        },
                        {
                            id: 'reporting_to',
                            name: ' Email',
                        },
                        {
                            id: 'reporting_to',
                            name: ' Company Name',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Vendor Category',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Status ',
                        }, {
                            id: '',
                            name: 'Action ',
                        },

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




                }).render(document.getElementById(""));


            }



        });


        // var yLabels = {
        //     0: '9:00 AM',
        //     2: '10:00 AM',
        //     4: '11:00 AM',
        //     6: '12:00 PM',
        //     8: '1:00 PM',
        //     10: '2:00 PM',
        //     12: '3:00 PM',


        // }

        var ctx = document.getElementById("employeeStatus");

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Male", "Female", "Active", "Yet To Active", "Resigned",
                    "Surving Notice Period"
                ],
                datasets: [{
                    data: [12, 19, 3, 10, 12, 19],
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
                            display: false,
                            // callback: function(value, index, values) {
                            //     return yLabels[value];
                            // }
                        }

                    }]
                },
                title: {
                    display: true,
                    // text: 'Employees Arrival Status Chart'
                }
            }
        });
    </script>
@endsection
