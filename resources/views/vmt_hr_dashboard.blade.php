@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')

<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">


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

@endsection


@section('content')



<div class="main">
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="status-wrapper ">

                            <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" > -->
                            <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                                class="soc-det-img profile-img-round h-100 w-100">
                            <!-- <img src="{{ URL::asset('assets/images/status-pic.png') }}" alt=""
                                class="profile-img-round"> -->

                            <!-- <i class="ri-checkbox-blank-circle-fill status-circle"></i> -->

                        </div>
                        <div class="greet-wrap mx-3">
                            <div class="d-felx ">
                                <!-- <h4>Welcome Back<b class="ml-1 text-primary">{{auth()->user()->name}}</b></h4> -->
                                <p class="text-muted ">Welcome Back<b
                                        class="ml-1 text-primary">{{auth()->user()->name}}</b>
                                </p>

                                <p class="text-muted f-13 mt-1 m-0">{{date('d F Y')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12 col-xl-12 mt-2 mb-4">
                            <div class="d-flex align-items-center ">
                                <p class="f-13 w-50"><i class=" ri-sun-line text-warning mr-2"></i>General shift</p>
                                <p class="f-15">
                                    <span>
                                        <label class="switch-checkbox m-0">
                                            <input type="checkbox" id="checkin_function" @if($checked && $checked->id) checked @endif>
                                            <span class="slider-checkbox check-in round">
                                                <span class="slider-checkbox-text">
                                                </span>
                                            </span>
                                        </label>
                                    </span>
                                @if ($checked && $checked->created_at)
                                <span id="check_timing" class="text-danger">{{round(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($checked->created_at)) / 60,2)}}</span>
                                @endif
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4  d-flex">
            <div class="card profile-box flex-fill">

                <h4 class="m-0 title text-center text-primary card-title my-3 fw-bold">My Actions</h4>
                <hr class="m-0">
                <div class="card-body">

                    <div class="p-1 px-3 bg-box-color-pink d-flex align-items-center">
                        <p class="mr-1 py-1 " style="font-size:10px"><b>6 July 2022</b>
                            <span class="text-muted ">You miss<b class="mx-1">checkin</b>and<b
                                    class="ml-1">checkOut</b></span>
                        </p>

                        <span class="bg-white px-2 rounded-pill " style="font-size:10px">
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
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4 d-flex">
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
        <div class="col-sm-9 col-md-9">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">New Employees</h5>
                                <h6 class="number-increment fw-bold">10</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Total Employees</h5>
                                <h6 class="number-increment fw-bold">30</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box " style="border-top:7px solid #E54E0D">
                        <!-- <div class="p-1 bg-danger" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Online</h5>
                                <h6 class="number-increment fw-bold">10</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Offline</h5>
                                <h6 class="number-increment fw-bold">20</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Employees on Leave</h5>
                                <h6 class="number-increment fw-bold">3</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Future Joiners</h5>
                                <h6 class="number-increment fw-bold">40</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card profile-box shadow  card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Hyrid</h5>
                                <h6 class="number-increment fw-bold">10</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 ipad-query">
                    <div class="card profile-box flex-fill">
                        <!-- <div class="p-1 bg-primary" ></div> -->
                        <div class="card-body p-0">
                            <div class="profile-wrapper d-flex p-0">
                                <div class="popover-body p-0 w-100">
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
                    <div class="card profile-box flex-fill" style="border-top: 7px solid #f06548;">
                        <!-- <div class="p-1 bg-danger" ></div> -->
                        <div class="card-body ">
                            <div class="wishes-card-wrapper">
                                <p class="text-muted f-15 m-0"><i class="ri-cake-2-fill f-13 mr-2"></i> Happy
                                    Birthday</p>
                                <div class="mt-2 ">
                                    <div class="px-2 d-flex ">
                                        <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                                            class="img-round"> -->
                                        <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}" alt=""
                                            class="img-round">
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
                    <div class="card profile-box flex-fill" style="border-top: 7px solid #00ffa8;">
                        <!-- <div class="p-1 bg-danger" ></div> -->
                        <div class="card-body ">
                            <div class="wishes-card-wrapper">
                                <p class="text-muted f-15 m-0"><i class=" f-13 mr-2 ri-shopping-bag-fill"></i> Work
                                    Anniversary</p>
                                <div class="mt-2 ">
                                    <div class="px-2 d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-10.jpg') }}" alt=""
                                            class="img-round">
                                        <!-- <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6> -->
                                        <h6 class=" text-primary mx-3 mt-3">Ray</h6>
                                    </div>
                                    <p class="fw-bold text-right program-day " style="color:#00ffa8">Tomorrow</p>
                                </div>
                                <i class="float-right bg-icon  ri-shopping-bag-fill" style="color:#00ffa8"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4">
                    <div class="card profile-box flex-fill" style="border-top: 7px solid #a0064f;">
                        <!-- <div class="p-1 bg-danger" ></div> -->
                        <div class="card-body ">
                            <div class="wishes-card-wrapper">
                                <p class="text-muted f-15 m-0"><i class=" ri-hearts-fill f-13 mr-2"></i>Wedding
                                    Anniversary</p>
                                <div class="mt-2  ">
                                    <div class="px-2 d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt=""
                                            class="img-round">
                                        <!-- <h6 class=" text-primary mx-3 mt-3">{{auth()->user()->name}}</h6> -->
                                        <h6 class=" text-primary mx-3 mt-3">Mosh</h6>
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
        <div class="col-sm-3 col-md-3">
            <div class="bg-white" style="">
                <div class="card profile-box flex-fill m-0 mb-2"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:3px 3px 20px 20px;">
                    <!-- <div class="p-1 bg-primary" ></div> -->
                    <div class="card-body p-2">
                        <div id='full_calendar_events'></div>
                    </div>
                </div>
                <!-- <div class="mb-0">
                    <div class="title py-4 px-2" style="border-bottom:dotted #a4a5a7;">
                        <h6 class="m-0 font-weight-bold text-primary">List Of Holidays-2022</h6>
                    </div>
                    <div class="card-body p-1">
                    </div>
                </div> -->
                <!-- <div class="">
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
                </div> -->
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
    setInterval(function(){
        var val = $('#check_timing').html();
        if (val != '') {
            var array = val.split(".");
            if (array[1] >= 59) {
                array[1] = 00;
                array[0] = parseInt(array[0])+1;
            } else {
                array[1] = parseInt(array[1])+1;
            }
            $('#check_timing').html(array.join('.'));
        }
    }, 1000);

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

    $('#checkin_function').change(function() {
        var checked = $('#checkin_function').is(':checked');
        console.log(checked);
        $.ajax({
            type: "POST", 
            url: "{{route('updtaeCheckin')}}", 
            data: {
                'checkin': checked,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data){
            }
        });
    });
});


// for number increament 

$(function() {
    function count($this) {
        var current = parseInt($this.html(), 10);
        $this.html(++current);
        if (current !== $this.data('count')) {
            setTimeout(function() {
                count($this)
            }, 50);
        }
    }
    $(".number-increment").each(function() {
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        count($(this));
    });
});
</script>
@endsection