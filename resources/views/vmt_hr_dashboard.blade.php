@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')

<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/holiday.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}" />

<!--Custom style.css-->
<!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/hr_dashboard.css') }}"> -->


@endsection

@section('loading')
<section id="loading">
    <div class='face'>
        <div class='loader-container'>
            <img id="loader-image" src="{{ URL::asset('assets/images/abs logo.png') }}" />
            <span class='loading'></span>
        </div>
    </div>
</section>
@endsection

@section('content')

<div class="hr-dashboar-wrpper mt30-mb15">
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4">
            @include('ui-dashboard-welcome-card')
        </div>
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4  d-flex">
            @include('ui-dashboard-action-card')
        </div>
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4 d-flex">
            @include('ui-dashboard-holiday-card')
        </div>
    </div>

    <div class="card profile-box flex-fill py-2">
        <div class="card-body">
        <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">
            <div class="row mb-n4">
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">New Employees</h5>
                                <span class="number-increment text-muted f-15 fw-bold">
                                    {{ json_decode($json_dashboardCountersData)->newEmployeesCount }}</span>
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
                                <span class="number-increment text-muted f-15 fw-bold">
                                    {{ json_decode($json_dashboardCountersData)->totalEmployeesCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box orange-top-border ">
                        <!-- <div class="p-1 bg-danger" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Online</h5>
                                <span class="number-increment text-muted f-15 fw-bold">
                                    {{ json_decode($json_dashboardCountersData)->todayEmployeesCheckedInCount }}</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Offline</h5>
                                <span class="number-increment text-muted f-15 fw-bold">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Employees on Leave</h5>
                                <span class="number-increment text-muted f-15 fw-bold">
                                    {{ json_decode($json_dashboardCountersData)->todayEmployeesOnLeaveCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Future Joiners</h5>
                                <span class="number-increment text-muted f-15 fw-bold">0</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-9 col-md-9">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                    <div class="card profile-box flex-fill card-top-border">
                        <!-- <div class="p-1 bg-primary" ></div> -->
                        <div class="card-body ">
                            <div class="profile-wrapper d-flex p-0">
                                <div class="popover-body p-0 w-100">
                                    <div class="min-h-250">
                                        <div>
                                            <ul class="nav sub-topnav">
                                                <!-- <li class="title active topbarNav fw-bold" id="post_view"><a>View
                                                        Post</a>
                                                </li> -->
                                                <li class="title  topbarNav fw-bold active" id="post"><a>Post</a>
                                                </li>
                                                <li class="title topbarNav  fw-bold" id="announcement">
                                                    <a>Announcement</a>
                                                </li>
                                                <li class="title topbarNav fw-bold" id="poll"><a>Poll</a></li>
                                                <li class="title topbarNav fw-bold" id="praise"><a>Praise</a></li>
                                            </ul>
                                            <!-- code post view  -->
                                            <!-- <div class="topbarContent emp-post_view">
                                                <div>
                                                    <div class="px-20 p-16 row no-gutters scrollBar">
                                                        @foreach($dashboardpost as $index => $user )
                                                        <img style="width: 100px;"
                                                            src="{{ URL::asset('images/'.$user->post_image)  }}">
                                                        <input name="post_menuss" id="post_menuss"
                                                            class="border-0 outline-none  w-100 h-100" readonly
                                                            value="{{$user->message}}">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div> -->

                                            <!-- emd view -->
                                            <div class="topbarContent emp-post">
                                                <div>
                                                    <div class="px-22 p-16 row no-gutters scrollBar">

                                                        <textarea name="post_menu" id="post_menu"
                                                            class="border-0 outline-none w-100 h-100"
                                                            placeholder="Write your Post here"></textarea>

                                                    </div>
                                                    <div class="post-contents d-flex align-items-center mx-4">

                                                        <div class="img-contents">
                                                            <i class="ri-image-2-fill"></i>
                                                            <input type="file" class="filestyle" name="image_src"
                                                                id="image_src" data-input="false" multiple
                                                                accept="image/*" data-iconName="fa fa-upload"
                                                                data-buttonText="Upload File" />
                                                            <span class="tooltiptext">Image</span>

                                                        </div>

                                                        <div class="emoji-content mx-3">
                                                            <i class="ri-user-smile-line"></i>
                                                            <span class="tooltiptext">Emoji</span>

                                                        </div>


                                                    </div>
                                                    <button class="btn btn-primary py-1 px-4  float-right"
                                                        type="submit">
                                                        Create Post
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="topbarContent emp-announcement " style="display:none;">
                                                <div>

                                                    <div class="announcement-content scrollBar">

                                                        <input class="form-control   w-100 h-100"
                                                            aria-label="default input example"
                                                            placeholder="Title of the Announcement" type="text"
                                                            id="title_data" name="title_data">
                                                        <hr>
                                                        <!-- <input class="form-control" type="text" placeholder="Default input" aria-label="default input example"> -->
                                                        <textarea class="form-control placeholder-glow w-100 h-100"
                                                            placeholder="Details of Announcement"
                                                            aria-label="default input example" type="text"
                                                            name="details_data" id="details_data"></textarea>



                                                        <div class="bottom-content d-flex mx-2">
                                                            <div class="form-check mx-2">
                                                                <input class="form-check-input check-box mr-1"
                                                                    type="checkbox" value="" id="notifyEmp">
                                                                <label class="form-check-label" for="notifyEmp">
                                                                    Notify employees
                                                                </label>
                                                            </div>
                                                            <div class="form-check mx-2">
                                                                <input class="form-check-input check-box  mr-1"
                                                                    type="checkbox" value="" id="requireAcknowledge">
                                                                <label class="form-check-label"
                                                                    for="requireAcknowledge">
                                                                    Require Acknowledgement
                                                                </label>
                                                            </div>
                                                            <div class="form-check mx-2">
                                                                <input class="form-check-input check-box mr-1"
                                                                    type="checkbox" value="" id="hideAfter">
                                                                <label class="form-check-label" for="hideAfter">
                                                                    Hide After
                                                                </label>
                                                            </div>
                                                            <div class="form-check mx-2">
                                                                <input class="form-control mr-1 anounce-date "
                                                                    type="text" placeholder="Select date" value="" id=""
                                                                    disabled>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button class="btn btn-primary py-1 px-4  float-right"
                                                        id="annon_menu_submit" type="button">
                                                        Submit
                                                    </button>


                                                </div>
                                            </div>
                                            <div class="topbarContent emp-poll" style="display:none;">
                                                <div>
                                                    <div class="poll-content">
                                                        <!-- <form action="{{route('poll_voting')}}" method="POST">
                                                            @csrf
                                                            <div class="px-20 p-16 row no-gutters scrollBar">
                                                                @if ($polling)
                                                                <h3>{{$polling->question}}</h3>
                                                                <div class="d-flex align-items-center">
                                                                    @foreach(json_decode($polling->options, true) as
                                                                    $key => $option)
                                                                    <div class="mr-2"><input id="polling{{$key}}"
                                                                            type="radio" name="polling"
                                                                            value="{{$option}}" @if($polling->data &&
                                                                        $polling->data == $option) checked @endif>
                                                                        <label for="polling{{$key}}"
                                                                            class="m-0 mr-2">{{$option}}</label>
                                                                    </div>
                                                                    @endforeach
                                                                    <input type="hidden" name="id"
                                                                        value="{{$polling->id}}">
                                                                </div>
                                                                @else
                                                                <div class="text-center">
                                                                    <h4>There is no polling now..!</h4>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <button class="btn btn-danger py-1 px-4  float-right">
                                                                Submit
                                                            </button>
                                                        </form> -->

                                                        <input type="text" name="" id=""
                                                            class="form-control border-0 outline-none"
                                                            placeholder="What this poll is about">
                                                        <hr>
                                                        <div class="mt-3 d-flex align-items-center">
                                                            <input type="text" name="" id="" class="form-control w-50"
                                                                placeholder="Add option here">
                                                            <i class="ri-delete-bin-7-fill mx-2 text-danger"></i>
                                                        </div>

                                                        <div class="mt-2 d-flex align-items-center">
                                                            <input type="text" name="" id="" class="form-control w-50"
                                                                placeholder="Add option here">
                                                            <i class="ri-delete-bin-7-fill mx-2 text-danger"></i>
                                                        </div>
                                                        <div class="text-start">
                                                            <!-- <button class="btn btn-secondary outline-none border-0"><i class=" ri-add-circle-line mr-2">Add More</i></button> -->
                                                            <button
                                                                class="btn btn-light text-secondary px-0 bg-transparent outline-none border-0"><span
                                                                    class="mr-2">+</span> Add More</i></button>
                                                        </div>

                                                        <div class="bottom-content d-flex justify-content-between mx-2">
                                                            <div class=" mx-2">
                                                                <label for="">Poll Expires On</label>
                                                                <input class=" mr-1 anounce-date " type="text"
                                                                    placeholder="Select date" value="" id="" disabled>

                                                            </div>
                                                            <div class=" mx-2">
                                                                <input class="form-check-input check-box mr-1"
                                                                    type="checkbox" value="" id="notifyEmp2">
                                                                <label class="form-check-label" for="notifyEmp2">
                                                                    Notify employees
                                                                </label>
                                                            </div>
                                                            <div class="mx-2">
                                                                <input class="form-check-input check-box mr-1"
                                                                    type="checkbox" value="" id="anonymous">
                                                                <label class="form-check-label" for="anonymous">
                                                                    Anonymous Poll
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="mt-3 text-end">
                                                            <button class="btn btn-default">Cancel</button>
                                                            <button class="btn btn-primary">Post</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-praise" style="display:none;">
                                                <div>
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters scrollBar">
                                                            <textarea name="" id="" cols="30" rows="3"
                                                                class="border-0 outline-none w-100">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nesciunt debitis esse facilis harum cumque eos in minus sed unde nisi assumenda ipsum sit aliquam placeat doloremque quasi sint sequi ullam, nostrum numquam aliquid! Magni, ipsam. Quod aperiam rem id labore amet totam doloribus ab, asperiores numquam rerum deserunt. Voluptate.
                                                        </textarea>
                                                        </div>
                                                        <button class="btn btn-primary py-1 px-4  float-right">
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
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                    {{-- @foreach($dashboardEmployeeEventsData['birthday'] as $key)
                            @include('ui-dashboard-event-card',['date' => $key->dob])
                    @endforeach --}}
                    @include('ui-dashboard-event-card',['dashboardEmployeeEventsData' => $dashboardEmployeeEventsData])

                </div>
            </div>
        </div>

        <div class="col-sm-3 col-md-3">
            <div class="">
                <div class="card profile-box flex-fill m-0 mb-2 "
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:3px 3px 20px 20px;">
                    <!-- <div class="p-1 bg-primary" ></div> -->
                    <div class="card-body p-0" style="padding:0px !important">
                        <!-- <div id='full_calendar_events'></div> -->
                        <!-- <div id="calendar"></div> -->
                        <div class="calendar-wrapper" id="calendar-wrapper"></div>
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

<!--Sweet alert JS-->
<script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>

<!--Nice select-->
<script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

<!--Custom Js Script-->
<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/holiday.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/calendar.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/calendar.js') }}"></script>

<!-- Prem assets ends -->

<!-- apexcharts -->
<!-- dashboard init -->
@yield('welcome-script')
@yield('script-profile-avatar')
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


    $('#annon_menu_submit').click(function(e) {
        e.preventDefault();
        var image = $('#image_src').val();
        //alert(image);
        var title_data = $('#title_data').val();
        var details_data = $('#details_data').val();
        var user_ref_id = "{{Auth::user()->id}}";
        $.ajax({
            type: "POST",
            url: "{{url('vmt-dashboard-announcement')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                title_data: title_data,
                user_ref_id: user_ref_id,
                details_data: details_data,
            },
            success: function(data) {
                // alert(data);
                location.reload();
            }
        })
    });


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
            url: "{{url('vmt-dashboard-post')}}",
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


</script>
@endsection
