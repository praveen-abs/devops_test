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
.program-card-wrapper img {}

.program-card-wrapper {
    position: relative;
}

.card-img {
    width: 407px;
    height: 101px;
}

.profile-status {
    position: relative;
    display: flex;
    justify-content: flex-start;
    padding: 0px;
    width: 100%;
    height: 100%;

}

.profile-status .status-circle {
    position: absolute;
}


.topbarContent .btn {
    border-bottom-left-radius: 0px;
    border-top-left-radius: 10px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 10px;
}

.greet-wrap p b {
    font-size: 21px;
}

.program-card-wrapper .program-day {
    z-index: 10;
    position: absolute;
    bottom: 0;
    /* font-size: 18px !important; */
}

.program-card-wrapper .bg-icon {
    transform: rotate(-45deg);
    font-size: 64px;
    position: absolute;
    opacity: 0.1;
    right: -13px;
    bottom: -29px;
    z-index: 0;
}

.program-card-wrapper .bg-icon.ri-hearts-fill {
    color: #a0064f;
}

.profile-wrapper .topbarNav,
.title {
    color: #002f56;
}


.bg-box-color-pink {
    background: pink;
    border-radius: 4px;
}

.bg-box-color-success {
    background: lightgreen;
    border-radius: 4px;
}

.profile-img-round {
    width: 73px;
    height: 73px;
    border-radius: 15%;
}

.switch-checkbox {
    position: relative;
    display: inline-block;
    width: 115px;
    height: 25px;
}

.switch-checkbox input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider-checkbox-text {
    color: #000;
    position: absolute;
    top: 5px;
    left: 30px;
    font-size: 10px;
}

.slider-checkbox {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    border: 1px solid #e5dddd;
    right: 0;
    bottom: 0;
    border-radius: 50px;
    background-color: #f0f0f6;
    width: 90px;
    -webkit-transition: .4s;
    box-shadow: inset -5px -5px 9px rgb(255 255 255 / 45%), inset 5px 5px 9px rgb(94 104 121 / 30%);
    transition: .4s;
}

.slider-checkbox.check-out:before {
    background-color: red;
}

.slider-checkbox.check-in:before {
    background-color: green;
}

.slider-checkbox:before {
    position: absolute;
    height: 23px;
    width: 23px;
    left: 0px;
    border-radius: 50%;
    bottom: 0px;
    color: white;
    -webkit-transition: .4s;
    transition: .4s;
    content: '\f011';
    font-family: FontAwesome !important;
    padding: 1px 2px 0px 5px;
    font-size: 15px;
    border: 1 solid;
}

input:checked+.slider-checkbox>.slider-checkbox-text {
    left: 10px;
    color: #fff;
}


input:checked+.slider-checkbox.check-out {
    background-color: red;
    color: #fff;
}

input:checked+.slider-checkbox.check-in {
    background-color: lawngreen;
    color: #fff;
}

input:focus+.slider-checkbox {
    box-shadow: 0 0 1px lawngreen;
}

input:checked+.slider-checkbox:before {
    -webkit-transform: translateX(65px);
    -ms-transform: translateX(65px);
    transform: translateX(65px);
    left: 0px;
    background-color: #f0f0f6;

}

input:checked+.slider-checkbox.check-out:before {
    color: red;
}

input:checked+.slider-checkbox.check-in:before {
    color: lawngreen;
}

.fc-scroller {
    height: auto !important;
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
    border: 1.1px solid rgba(0, 0, 0, .2);
    border-radius: 0.3rem;
    display: block;
    will-change: transform;
    top: 0px;
    left: 0px;
    transform: translate3d(324px, 179px, 0px);
}

.bs-popover-auto[x-placement^=right],
.bs-popover-right {
    margin-left: 0.5rem;
}

.popover,
.popover .arrow {
    position: absolute;
    display: block;
}

.popover {
    width: 480px;
    min-width: 480px;
}

.bs-popover-auto[x-placement^=right],
.bs-popover-right {
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
    -webkit-transition: width .5s ease-in-out, left .2s ease-in-out;
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

.mb-16,
.my-16 {
    margin-bottom: 16px !important;
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
    display: none !important;
}

.fc-icon-left-single-arrow:after {
    display: none !important;
}

.fc-prev-button:before {
    color: black;
    font-size: 300% !important;
}

.fc-next-button:before {
    color: black;
    font-size: 300% !important;
}

.fc-head-container {
    border: none !important;
}

.fc-left h2 {
    font-weight: 700 !important;
}

.profile-box {
    border-radius: 10px !important;
    box-shadow: rgb(60 64 67 / 30%) 0px 1px 2px 0px, rgb(60 64 67 / 15%) 0px 2px 6px 2px !important;
}

.card-top-border {
    border-top: 10px solid #405189 !important;
}

.fc .fc-row .fc-content-skeleton table,
.fc .fc-row .fc-content-skeleton td,
.fc .fc-row .fc-helper-skeleton td {
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
        <div class="col-sm-4 col-md-4 mb-2 ">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 ">
                            <div class="profile-status">
                                <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" > -->
                                <img src="{{ URL::asset('assets/images/status-pic.png') }}" alt=""
                                    class="soc-det-img profile-img-round">
                                <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" class="profile-img-round"> -->
                                <!-- <i class="ri-checkbox-blank-circle-fill status-circle"></i> -->
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8 ">
                            <div class="d-felx greet-wrap">
                                <!-- <h4>Welcome Back<b class="ml-1 text-primary">{{auth()->user()->name}}</b></h4> -->
                                <p>Welcome Back<b class="ml-1 text-primary">{{auth()->user()->name}}</b></p>

                            </div>
                            <div class="">
                                <p class="text-muted  m-0">{{date('d F Y')}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-12 col-xl-12 ">
                            <div class="d-flex align-items-center   mt-4">
                                <p class="f-15 mr-1"><i class=" ri-sun-line text-warning mr-2"></i>General shift</p>
                                <p class="f-15  "><span><label class="switch-checkbox m-0"> <input type="checkbox">
                                            <span class="slider-checkbox check-in round"><span
                                                    class="slider-checkbox-text">Check in</span></span> </label></span>
                                </p>
                                <p class="f-15 m-0 "><label class="switch-checkbox m-0"> <input type="checkbox">
                                        <span class="slider-checkbox check-out round"><span
                                                class="slider-checkbox-text">Check out</span></span> </label>
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 mb-4 ipad-query">
            <div class="card profile-box flex-fill">

                <h4 class="m-0 title text-center text-primary card-title my-3 fw-bold">My Actions</h4>
                <hr class="m-0">
                <div class="card-body">

                    <div class="p-1 px-3 bg-box-color-pink d-flex align-items-center">
                        <p class="mr-1 py-1 " style="font-size:10px"><b>6 July 2022</b>
                            <span class="text-muted ">You miss<b class="mx-1">checkin</b>and<b
                                    class="ml-1">checkOut</b></span>
                        </p>

                        <span class="bg-white  ml-4 px-2 rounded-pill " style="font-size:10px">
                            <i class=" ri-flag-fill text-danger mr-1"></i>Report
                        </span>


                    </div>

                    <div class="p-1 px-3 bg-box-color-success mt-2 d-flex align-items-center">
                        <p class="mr-1 py-1 " style="font-size:10px"><b>5 July 2022</b>
                            <span class="text-muted ">You miss<b class="mx-1">check-in</b>and<b
                                    class="mx-1">check-out</b>successfully</span>
                        </p>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 mb-4 d-flex">
            <div class="card profile-box card-top-border flex-fill">
                <!-- <div class="p-1 bg-primary" ></div> -->
                <div class="card-body ">
                    <div class="card-img">
                        <img src="  {{ URL::asset('assets/images/independence.jpg') }}" alt="" class="w-100 h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-8 mb-4 ipad-query">
            <div class="row">
                <div class="col-sm-12 col-md-12 mb-4 ipad-query">
                    <div class="card profile-box flex-fill">
                        <!-- <div class="p-1 bg-primary" ></div> -->
                        <div class="card-body p-0">
                            <div class="profile-wrapper d-flex w-100">
                                <div class="popover-body  w-100">
                                    <div class="min-h-250">
                                        <div>
                                            <ul class="nav sub-topnav">
                                                <li class="title active topbarNav fw-bold" id="post"><a>Post</a>
                                                </li>
                                                <li class="title topbarNav  fw-bold" id="announcement">
                                                    <a>Announcement</a>
                                                </li>
                                                <li class="title topbarNav fw-bold" id="poll"><a>Poll</a></li>
                                                <li class="title topbarNav fw-bold" id="praise"><a>Praise</a></li>
                                            </ul>
                                            <div class="topbarContent emp-post">
                                                <div>
                                                    <div class="px-20 p-16 row no-gutters scrollBar">
                                                        <textarea name="" id=""
                                                            class="border-0 outline-none w-100 h-100">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                        </textarea>
                                                    </div>
                                                    <button class="btn btn-danger py-1 px-4  float-right">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-announcement " style="display:none;">
                                                <div>
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters scrollBar">
                                                            <textarea name="" id=""
                                                                class="border-0 outline-none w-100 h-100">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.\
                                                        </textarea>
                                                        </div>
                                                        <button class="btn btn-danger py-1 px-4  float-right">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-poll" style="display:none;">
                                                <div>
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters scrollBar">
                                                            <textarea name="" id="" cols="30" rows="10"
                                                                class="border-0 outline-none w-100">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                        </textarea>
                                                        </div>
                                                        <button class="btn btn-danger py-1 px-4  float-right">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-praise" style="display:none;">
                                                <div>
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters scrollBar">
                                                            <textarea name="" id="" cols="30" rows="10"
                                                                class="border-0 outline-none w-100">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                        </textarea>
                                                        </div>
                                                        <button class="btn btn-danger py-1 px-4  float-right">
                                                            Submit
                                                        </button>
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
                <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                    <div class="card profile-box flex-fill" style="border-top: 10px solid #f06548;">
                        <!-- <div class="p-1 bg-danger" ></div> -->
                        <div class="card-body ">
                            <div class="program-card-wrapper">
                                <p class="text-muted f-15 m-0"><i class="ri-cake-2-fill f-13 mr-2"></i> Happy
                                    Birthday</p>
                                <div class="mt-2 ">
                                    <div class="px-2 d-flex">
                                        <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                                            class="img-round w-25 h-25">
                                        <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6>
                                    </div>
                                    <p class="text-danger fw-bold text-right program-day ">Today</p>
                                </div>
                                <i class="float-right bg-icon text-danger ri-cake-2-fill"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                    <div class="card profile-box flex-fill" style="border-top: 10px solid #00ffa8;">
                        <!-- <div class="p-1 bg-danger" ></div> -->
                        <div class="card-body ">
                            <div class="program-card-wrapper">
                                <p class="text-muted f-15 m-0"><i class=" f-13 mr-2 ri-shopping-bag-fill"></i> Work
                                    Anniversary</p>
                                <div class="mt-2 ">
                                    <div class="px-2 d-flex">
                                        <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                                            class="img-round w-25 h-25">
                                        <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6>
                                    </div>
                                    <p class="fw-bold text-right program-day " style="color:#00ffa8">Tomorrow</p>
                                </div>
                                <i class="float-right bg-icon  ri-shopping-bag-fill" style="color:#00ffa8"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                    <div class="card profile-box flex-fill" style="border-top: 10px solid #a0064f;">
                        <!-- <div class="p-1 bg-danger" ></div> -->
                        <div class="card-body ">
                            <div class="program-card-wrapper">
                                <p class="text-muted f-15 m-0"><i class=" ri-hearts-fill f-13 mr-2"></i>Wedding
                                    Anniversary</p>
                                <div class="mt-2  ">
                                    <div class="px-2 d-flex">
                                        <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                                            class="img-round w-25 h-25">
                                        <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6>
                                    </div>
                                    <p class="fw-bold text-right program-day" style="color:#a0064f">09/07/2022</p>
                                </div>
                                <i class="float-right bg-icon  ri-hearts-fill"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 mb-4 ipad-query">
            <div style="background:white">
                <div class="card profile-box flex-fill m-0 mb-2"
                    style="border-top: 10px solid #405189;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:3px 3px 20px 20px;">
                    <!-- <div class="p-1 bg-primary" ></div> -->
                    <div class="card-body p-2">
                        <div id='full_calendar_events'></div>
                    </div>
                </div>
                <div class="mb-0">
                    <div class="title py-4 px-2" style="border-bottom:dotted #a4a5a7;">
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
                                    <h6 class="mr-1 col-auto f-13 pr-0 wrap-text" style="width: 60%;"><i
                                            class="fa fa-calendar-alt f-15 mr-2 text-purple"></i>Republic Day</h6>
                                    <h6 class="f-13 col pl-0">
                                        <div class="text-right">
                                            <span>Sun, Jan 26</span>
                                        </div>
                                    </h6>
                                </div>
                                <hr class="m-0">
                                <div class="row p-3">
                                    <h6 class="mr-1 col-auto f-13 pr-0 wrap-text" style="width: 60%;"><i
                                            class="fa fa-calendar-alt f-11 mr-2 text-yellow"></i>Shivaratri</h6>
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