@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />


<!-- prem content -->

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/bootstrap.min.css') }}">

    <!--Custom style.css-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/quicksand.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/hr_dashboard.css') }}">
    <!--Bootstrap Calendar-->
    <!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/bootstrap_calendar.css') }}"> -->

    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
    <!--Animate CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/app.min.css') }}">
    <!--Map-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">

    
    <!-- calendar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<!-- prem content end -->

<style>
    .bg-box-color-pink {
        background:pink;
        border-radius: 10px;
    }
    .bg-box-color-success {
        background:lightgreen;
        border-radius: 10px;
    }
    .profile-img-round {
        width: 75px;
        height: 75px;
        border-radius: 15%;
    }
    .switch-checkbox {
        position: relative;
        display: inline-block;
        width: 115px;
        height: 28px;
    }
        
    .switch-checkbox input { 
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider-checkbox-text{
        color: #000;
        position: relative;
        top: 4px;
        left: 30px;
        font-size: 12px;
    }
        
    .slider-checkbox {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 20px;
        background-color: lightgreen;
        width:100px;
        -webkit-transition: .4s;
        box-shadow: inset -5px -5px 9px rgba(255,255,255,0.45), inset 5px 5px 9px rgba(94,104,121,0.3);
        transition: .4s;
    }
    
    .slider-checkbox.check-out:before{
        background-color: green;
    }
    .slider-checkbox.check-in:before{
        background-color: green;
    }
    input:checked + .slider>.slider-text:after {
        content: 'Checkout';
        color: red;
    }

    input + .slider>.slider-text:after {
        content: 'Check In';
    }

    .slider-checkbox:before {
        position: absolute;
        height: 25px;
        width: 25px;
        left: 2px;
        border-radius: 20px;
        bottom: 2px;
        color: white;
        background-color: green;
        -webkit-transition: .4s;
        transition: .4s;
        content: '\f011';
        font-size: 19px;
        font-family: FontAwesome !important;
        padding: 3px 0px 0px 4px;
    }
    
    input:checked + .slider-checkbox>.slider-checkbox-text {
        left:6px
    }

        
    input:checked + .slider-checkbox.check-out {
        background-color:#f0657070;
        color:red;
    } 
    
    input:checked + .slider-checkbox.check-in {
        background-color: #f0657070;
        color:red;
    } 

    input:focus + .slider-checkbox {
        box-shadow: 0 0 1px lawngreen;
    }

    input:checked + .slider-checkbox:before {
        -webkit-transform: translateX(65px);
        -ms-transform: translateX(65px);
        transform: translateX(65px);
        left: 10px;
        background-color: #f0f0f6;
        
    }
    input:checked + .slider-checkbox.check-out:before {
        color: white;
        background-color: red;
    }
    input:checked + .slider-checkbox.check-in:before {
        color: white;
        background-color: red;
    }

    input:checked + .slider-checkbox>.slider-checkbox-text:after {
        content: 'Checkout';
        color: red;
    }

    input + .slider-checkbox>.slider-checkbox-text:after {
        content: 'Check In';
    }

    .fc-scroller {
        height:auto !important;
    }

    .fc-widget-header { 
        margin-right: 0px !important;
    }

    .popover {
        top: 0;
        left: 0;
        z-index: 1060;
        max-width: 276px;
        font-family: Segoe UI;
        font-style: normal;
        font-weight: 400;
        line-height: 1.5;
        text-align: left;
        text-align: start;
        text-decoration: none;
        text-shadow: none;
        text-transform: none;
        letter-spacing: normal;
        word-break: normal;
        word-spacing: normal;
        white-space: normal;
        line-break: auto;
        font-size: .875rem;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: padding-box;
        border: 1.1px solid rgba(0,0,0,.2);
        border-radius: 0.3rem;
        display: block;
        will-change: transform;
        top: 0px;
        left: 0px;
        transform: translate3d(324px, 179px, 0px);
    }

    .bs-popover-auto[x-placement^=right], .bs-popover-right {
        margin-left: 0.5rem;
    }

    .popover, .popover .arrow {
        position: absolute;
        display: block;
    }

    .popover {
        width: 480px;
        min-width: 480px;
    }

    .bs-popover-auto[x-placement^=right], .bs-popover-right {
        box-shadow: 1px 3px 4px 0 rgb(0 0 0 / 24%);
    }

    
    .p-20 {
        padding: 20px !important;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .mr-8 {
        margin-right: 8px !important;
    }

    .ml-2 {
        margin-left: 2px !important;
    }


    
    .sub-topnav.nav {
        background-color: #fff;
        min-height: 40px;
    }

    .sub-topnav.nav {
        background-color: #fff;
        border-bottom: 1px solid #a2a9b4;
        min-height: 40px;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .px-20 {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .sub-topnav.nav li {
        position: relative;
        padding-left: 12px !important;
        padding-right: 8px !important;
        padding-top: 8px !important;
        padding-bottom: 8px !important;
    }

    .sub-topnav.nav li a:after {
        position: absolute;
        -webkit-transition: width .5s ease-in-out,left .2s ease-in-out;
        content: "";
        width: 0;
        left: 55%;
    }

    .sub-topnav.nav li.active a:after {
        border-top: 5px solid #f06548;
        bottom: -9px;
        width: 88%;
        left: 6%;
    }

    .emp-job {
        display: none;
    }

    .p-16 {
        padding: 16px;
    }

    .mb-16, .my-16 {
        margin-bottom: 16px!important;
    }

    /* calendar */
    .fc-widget-content {
        border: none !important;
    }

    .fc th.fc-widget-header {
        background: white !important;
        border: none !important;
    }

    .fc-button {
        border: none !important;
    }
    .fc-icon-right-single-arrow:after {
        display:none !important;
    }

    .fc-icon-left-single-arrow:after {
        display: none !important;
    }

    .fc-prev-button:before {
        color: black;
        font-size:300% !important;
    }

    .fc-next-button:before {
        color: black;
        font-size:300% !important;
    }
    .fc-head-container {
        border: none !important;
    }
    .fc-left h2 {
        font-weight: 700 !important;
    }
    .fc .fc-row .fc-content-skeleton table, .fc .fc-row .fc-content-skeleton td, .fc .fc-row .fc-helper-skeleton td {
        font-weight: 700 !important;
        text-align: center !important;
        vertical-align: middle !important;
    }
    /* .fc th.fc-widget-header {
        text-align: right !important;
    } */
    .fc-ltr .fc-basic-view .fc-day-top .fc-day-number {
        float: none !important;
    }

    html {
        min-height: auto !important;
    }
</style>
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent


    <div class="main">
   <!-- Content Row -->
       <div class="row">
            <div class="col-sm-4 col-md-4 mb-4 ipad-query">
                <div class="card profile-box flex-fill" style="height:95%;">
                    <div class="row pl-2 pr-2 media-query" style="height:100%;">
                        <div class="col-sm-12 col-md-12">
                            <div class="row mt-2">
                                <p class="pl-3 col-auto"><img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" class="profile-img-round"></p>
                                <div class="pt-2 col">
                                    <h4>Welcome Back<b class="ml-1">{{auth()->user()->name}}</b></h4>
                                    <p class="text-muted f-15 m-0">{{date('Wed, d F Y')}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <h6 class="f-15 mr-1"><span><i class="fa fa-sun mr-1"></i>General shift</span></h6>
                                <h6 class="f-15 m-0"><span><label class="switch-checkbox "> <input type="checkbox"> <span class="slider-checkbox check-in round"><span class="slider-checkbox-text"></span></span> </label></span></h6>
                                <h6 class="f-15 m-0"><span><label class="switch-checkbox "> <input type="checkbox"> <span class="slider-checkbox check-out round"><span class="slider-checkbox-text"></span></span> </label></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 mb-4 ipad-query">
                <div class="card profile-box flex-fill" style="height:95%;">
                    <div class="card-header py-3">
                        <h5 class="m-0 text-center text-primary"><b>My Actions</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="mt-2">
                            <div class="p-1 bg-box-color-pink" style="">
                                <div class="row pl-2 mt-2" style="justify-content:space-between;width:100%">
                                    <div class="d-flex col" style="width:80%;">
                                        <h6 class="mr-1 f-13"><b>6 July 2022</b></h6>
                                        <span class="">
                                            <p class="text-muted f-13">You miss<b class="ml-1 mr-1">checkin</b>and<b class="ml-1">checkOut</b></p>
                                        </span>
                                    </div>
                                    <h6 class="f-11 clock-center col-auto pr-0">
                                        <span class="p-2 bg-muted">
                                            <i class="fa fa-flag mr-1"></i>Report
                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="bg-box-color-success p-1">
                                <div class="row pl-2 mt-2" style="justify-content:space-between;width:100%">
                                    <div class="d-flex col" style="width:80%;">
                                        <h6 class="mr-1 f-13"><b>5 July 2022</b></h6>
                                        <span class="">
                                            <p class="text-muted f-13"><b class="mr-1">checkin</b>and<b class="ml-1 mr-1">checkOut</b>successfully</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 mb-4 ipad-query">
                <div class="card profile-box flex-fill" style="height:95%;border-top: 5px solid #405189;">
                    <!-- <div class="p-1 bg-primary" ></div> -->
                    <div class="card-body p-0">
                        <img src="{{ URL::asset('assets/images/anniversary.png') }}" alt="" class="w-100 h-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-md-9 mb-4 ipad-query"> 
                <div class="row">
                    <div class="col-sm-4 col-md-4 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>New Employees</h4>
                                    <h4><b>6</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-sm-4 col-md-4 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Total Employees</h4>
                                    <h4><b>30</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-danger" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Online</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Offline</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Employees on Leave</h4>
                                    <h4><b>3</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Future Joiners</h4>
                                    <h4><b>8</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-1">
                        <div class="card shadow mb-1" style="height:75%;border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" > -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Hyrid</h4>
                                    <h4><b>0</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-sm-12 col-md-12 mb-4 ipad-query">
                        <div class="card profile-box flex-fill" style="border-top: 5px solid #405189;">
                            <!-- <div class="p-1 bg-primary" ></div> -->
                            <div class="card-body p-0">
                                <div class="profile-wrapper d-flex w-100">
                                    <div class="popover-body p-0">
                                        <div class="min-h-250">
                                            <div>
                                                <ul class="nav sub-topnav px-20">
                                                    <li class="active topbarNav" id="post"><a>Post</a>
                                                    </li>
                                                    <li class="topbarNav" id="announcement"><a>Announcement</a></li>
                                                    <li class="topbarNav" id="poll"><a>Poll</a></li>
                                                    <li class="topbarNav" id="praise"><a>Praise</a></li>
                                                </ul>
                                                <div class="topbarContent emp-post">
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters">
                                                            <p>Payroll is the process of paying a company's employees, which includes tracking hours worked, calculating employees' pay, and distributing payments via direct deposit to employee bank accounts or by check.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="topbarContent emp-announcement" style="display:none;">
                                                    <div>
                                                        <div>
                                                            <div class="p-20 row no-gutters">
                                                                <p>Payroll is the process of paying a company's employees, which includes tracking hours worked, calculating employees' pay, and distributing payments via direct deposit to employee bank accounts or by check.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="topbarContent emp-poll" style="display:none;">
                                                    <div>
                                                        <div>
                                                            <div class="p-20 row no-gutters">
                                                                <p>Payroll is the process of paying a company's employees, which includes tracking hours worked, calculating employees' pay, and distributing payments via direct deposit to employee bank accounts or by check.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="topbarContent emp-praise" style="display:none;">
                                                    <div>
                                                        <div>
                                                            <div class="p-20 row no-gutters">
                                                                <p>Payroll is the process of paying a company's employees, which includes tracking hours worked, calculating employees' pay, and distributing payments via direct deposit to employee bank accounts or by check.</p>
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
                    <h5 class="text-primary"><b>Events</b></h5>
                    <div class="col-sm-4 col-md-4 mb-4 ipad-query">
                        <div class="card profile-box flex-fill" style="height:95%;border-top: 5px solid #f06548;">
                            <!-- <div class="p-1 bg-danger" ></div> -->
                            <div class="card-body p-0">
                                <div class="profile-wrapper d-flex w-100">
                                    <div class="row pl-2 pr-2 media-query" style="height:100%;">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="d-flex align-items-center mt-4">
                                                <i class="mr-1 fa fa-birthday-cake f-13"></i>
                                                <p class="text-muted f-15 m-0">Happy Birthday</p>
                                            </div>
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto"><img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" class="img-round"></p>
                                                <div class="pt-2 col">
                                                    <h4><b class="ml-1">{{auth()->user()->name}}</b></h4>
                                                    <h4 class="pull-right text-danger f-15 m-0">Today</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-4 col-md-4 mb-4 ipad-query">
                        <div class="card profile-box flex-fill" style="height:95%;border-top: 5px solid #0ab39c;">
                            <!-- <div class="p-1 bg-success" ></div> -->
                            <div class="card-body p-0">
                                <div class="profile-wrapper d-flex w-100">
                                    <div class="row pl-2 pr-2 media-query" style="height:100%;">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="d-flex align-items-center mt-4">
                                                <i class="mr-1 fa fa-birthday-cake f-13"></i>
                                                <p class="text-muted f-15 m-0">Work Anniversary</p>
                                            </div>
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto"><img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" class="img-round"></p>
                                                <div class="pt-2 col">
                                                    <h4><b class="ml-1">{{auth()->user()->name}}</b></h4>
                                                    <h4 class="pull-right text-success f-15 m-0">Tommorow</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-4 col-md-4 mb-4 ipad-query">
                        <div class="card profile-box flex-fill" style="height:95%;border-top: 5px solid #f06548;">
                            <!-- <div class="p-1 bg-danger" ></div> -->
                            <div class="card-body p-0">
                                <div class="profile-wrapper d-flex w-100">
                                    <div class="row pl-2 pr-2 media-query" style="height:100%;">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="d-flex align-items-center mt-4">
                                                <i class="mr-1 fa fa-birthday-cake f-13"></i>
                                                <p class="text-muted f-15 m-0">Marriage Anniversary</p>
                                            </div>
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto"><img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" class="img-round"></p>
                                                <div class="pt-2 col">
                                                    <h4><b class="ml-1">{{auth()->user()->name}}</b></h4>
                                                    <h4 class="pull-right text-danger f-15 m-0">09/08/2022</h4>
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
            <div class="col-sm-3 col-md-3 mb-4 ipad-query">
                <div style="background:white">
                    <div class="card profile-box flex-fill m-0 mb-2" style="border-top: 5px solid #405189;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:3px 3px 20px 20px;">
                        <!-- <div class="p-1 bg-primary" ></div> -->
                        <div class="card-body p-2">
                            <div id='full_calendar_events'></div>
                        </div>
                    </div> 
                    <div class="mb-0">
                        <div class="card-header py-4" style="border-bottom:dotted #a4a5a7;">
                            <h6 class="m-0 font-weight-bold text-primary">List Of Holidays-2022</h6>
                        </div>
                        <div class="card-body p-1">
                        </div>
                    </div> 
                    <div class="">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 p-0">
                                <div class="bg-muted pl-2 pr-2">
                                    <div class="row p-3">
                                        <h6 class="mr-1 col-auto f-13 pr-0 wrap-text" style="width: 60%;"><i class="fa fa-calendar-alt f-15 mr-2 text-purple"></i>Republic Day</h6>
                                        <h6 class="f-13 col pl-0">
                                            <div class="text-right">
                                                <span>Sun, Jan 26</span>
                                            </div>
                                        </h6>
                                    </div>
                                    <hr class="m-0">
                                    <div class="row p-3">
                                        <h6 class="mr-1 col-auto f-13 pr-0 wrap-text" style="width: 60%;"><i class="fa fa-calendar-alt f-11 mr-2 text-yellow"></i>Shivaratri</h6>
                                        <h6 class="f-13 col pl-0">
                                            <div class="text-right">
                                                <span>Sun, July 26</span>
                                            </div>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>   

<!--  -->
@endsection

@section('script')
<!-- Prem assets -->
    <!-- OWL CAROUSEL -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>

   <script src="{{ URL::asset('/assets/premassets/js/jquery-1.12.4.min.js') }}"></script>
    <!--Popper JS-->
    <script src="{{ URL::asset('/assets/premassets/js/popper.min.js') }}"></script>
    <!--Bootstrap-->
    <script src="{{ URL::asset('/assets/premassets/js/bootstrap.min.js') }}"></script>
    <!--Sweet alert JS-->
    <script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>
    <!--Flot.JS-->
    <script src="{{ URL::asset('/assets/premassets/js/charts/jquery.flot.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/charts/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/charts/jquery.flot.categories.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/charts/jquery.flot.stack.min.js') }}"></script>
    <!--Echarts-->
    <script src="{{ URL::asset('/assets/premassets/js/charts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/charts/echarts-data.js') }}"></script>
    <!--Charts JS-->
    <script src="{{ URL::asset('/assets/premassets/js/charts/chart.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/charts/demo.js') }}"></script>
    <!--Maps-->
    <script src="{{ URL::asset('/assets/premassets/js/maps/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/maps/jvector-maps.js') }}"></script>
    <!--Bootstrap Calendar JS-->
    <!-- <script src="{{ URL::asset('/assets/premassets/js/calendar/bootstrap_calendar.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/calendar/demo.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <!--Nice select-->
    <script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

    <!--Custom Js Script-->
    <script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/dashboard.js') }}"></script>


<!-- Prem assets ends -->

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

<!-- for date and time -->

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
});
</script>
@endsection