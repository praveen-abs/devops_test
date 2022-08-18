@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/dashboard.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/holiday.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--Custom style.css-->
    <!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/hr_dashboard.css') }}"> -->

    <script src="{{ URL::asset('assets/js/calendar-vanila.js') }}" defer></script>
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

        <div class="card profile-box flex-fill ">
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-8 col-lg-8">
                        <div class="row mb-n4">
                            <div class="col-sm-6 col-md-4 col-xl-4 col-lg-4">
                                <div class="card shadow profile-box card-top-border">
                                    <!-- <div class="p-1 bg-primary" > -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h6 class="fw-bold title">New Employees</h6>
                                            <span class="number-increment text-muted f-15 fw-bold">
                                                {{ json_decode($json_dashboardCountersData)->newEmployeesCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-4 col-lg-4">
                                <div class="card shadow  profile-box card-top-border ">
                                    <!-- <div class="p-1 bg-primary" > -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h6 class="fw-bold title">Offline</h6>
                                            <span class="number-increment text-muted f-15 fw-bold">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-4 col-lg-4">
                                <div class="card shadow profile-box card-top-border ">
                                    <!-- <div class="p-1 bg-primary" > -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h6 class="fw-bold title">Total Employees</h6>
                                            <span class="number-increment text-muted f-15 fw-bold">
                                                {{ json_decode($json_dashboardCountersData)->totalEmployeesCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-4 col-lg-4">
                                <div class="card  profile-box card-top-border ">
                                    <!-- <div class="p-1 bg-primary" > -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h6 class="fw-bold title">Employees on Leave</h6>
                                            <span class="number-increment text-muted f-15 fw-bold">
                                                {{ json_decode($json_dashboardCountersData)->todayEmployeesOnLeaveCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-4 col-lg-4">
                                <div class="card shadow profile-box orange-top-border ">
                                    <!-- <div class="p-1 bg-danger" > -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h6 class="fw-bold title">Online</h6>
                                            <span class="number-increment text-muted f-15 fw-bold">
                                                {{ json_decode($json_dashboardCountersData)->todayEmployeesCheckedInCount }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-4 col-lg-4">
                                <div class="card shadow  profile-box card-top-border ">
                                    <!-- <div class="p-1 bg-primary" > -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h6 class="fw-bold title">Future Joiners</h6>
                                            <span class="number-increment text-muted f-15 fw-bold">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                <div class="card profile-box flex-fill card-top-border w-100">
                                    <!-- <div class="p-1 bg-primary" ></div> -->
                                    <div class="card-body ">
                                        <div class="profile-wrapper d-flex p-0">
                                            <div class="popover-body p-0 w-100">
                                                <div class="">
                                                    <div>
                                                        <ul class="nav sub-topnav">
                                                            <!-- <li class="title active topbarNav fw-bold" id="post_view"><a>View
                                                                                                            Post</a>
                                                                                                    </li> -->
                                                            <li class="title  topbarNav fw-bold active" id="post">
                                                                <a>Post</a>
                                                            </li>
                                                            <li class="title topbarNav  fw-bold" id="announcement">
                                                                <a>Announcement</a>
                                                            </li>
                                                            <li class="title topbarNav fw-bold" id="poll"><a>Poll</a>
                                                            </li>
                                                            <li class="title topbarNav fw-bold" id="praise"><a>Praise</a>
                                                            </li>
                                                        </ul>
                                                        <!-- code post view  -->


                                                        <!-- emd view -->
                                                        <div class="topbarContent emp-post">
                                                            <div>
                                                                <div class="px-22 p-16 row no-gutters scrollBar">

                                                                    <textarea name="post_menu" id="post_menu" class="border-0 outline-none w-100 h-100" placeholder="Write your Post here"></textarea>

                                                                </div>
                                                                <div class="post-contents d-flex align-items-center mx-4">

                                                                    <div class="img-contents">
                                                                        <i class="ri-image-2-fill"></i>
                                                                        <input type="file" class="filestyle"
                                                                            name="image_src" id="image_src"
                                                                            data-input="false" multiple accept="image/*"
                                                                            data-iconName="fa fa-upload"
                                                                            data-buttonText="Upload File" />
                                                                        <span class="tooltiptext">Image</span>

                                                                    </div>

                                                                    <div class="emoji-content mx-3">
                                                                        <i class="ri-user-smile-line text-muted"></i>
                                                                        <span class="tooltiptext">Emoji</span>

                                                                    </div>


                                                                </div>
                                                                <button class="btn btn-primary  float-end" type="submit">
                                                                    Create Post
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <div class="topbarContent emp-announcement "
                                                            style="display:none;">
                                                            <div>

                                                                <div class="announcement-content scrollBar">

                                                                    <input class="form-control   w-100 h-100"
                                                                        aria-label="default input example"
                                                                        placeholder="Title of the Announcement"
                                                                        type="text" id="title_data" name="title_data">
                                                                    <hr>
                                                                    <!-- <input class="form-control" type="text" placeholder="Default input" aria-label="default input example"> -->
                                                                    <textarea class="form-control placeholder-glow w-100 h-100" placeholder="Details of Announcement"
                                                                        aria-label="default input example" type="text" name="details_data" id="details_data"></textarea>


                                                                    <div class="bottom-content d-flex mx-2">

                                                                        <div class="row">
                                                                            <div
                                                                                class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-check mx-2">
                                                                                    <input
                                                                                        class="form-check-input check-box me-1"
                                                                                        type="checkbox" value=""
                                                                                        id="notifyEmp">
                                                                                    <label class="form-check-label"
                                                                                        for="notifyEmp">
                                                                                        Notify employees
                                                                                    </label>

                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-check mx-2">
                                                                                    <input
                                                                                        class="form-check-input check-box  me-1"
                                                                                        type="checkbox" value=""
                                                                                        id="requireAcknowledge">
                                                                                    <label class="form-check-label"
                                                                                        for="requireAcknowledge">
                                                                                        Require Acknowledgement
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-check mx-2">
                                                                                    <input
                                                                                        class="form-check-input check-box me-1"
                                                                                        type="checkbox" value=""
                                                                                        id="hideAfter">
                                                                                    <label class="form-check-label"
                                                                                        for="hideAfter">
                                                                                        Hide After
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-check mx-2">
                                                                                    <input
                                                                                        class="form-control me-1 anounce-date "
                                                                                        type="text"
                                                                                        placeholder="Select date"
                                                                                        value="" id=""
                                                                                        disabled>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-primary float-end"
                                                                    id="annon_menu_submit" type="button">
                                                                    Submit
                                                                </button>


                                                            </div>
                                                        </div>
                                                        <div class="topbarContent emp-poll" style="display:none;">
                                                            <div>
                                                                <div class="poll-content">
                                                                    <!-- <form action="{{ route('poll_voting') }}" method="POST">
                                                                                                                @csrf
                                                                                                                <div class="px-20 p-16 row no-gutters scrollBar">
                                                                                                                    @if ($polling)
    <h3>{{ $polling->question }}</h3>
                                                                                                                    <div class="d-flex align-items-center">
                                                                                                                        @foreach (json_decode($polling->options, true) as $key => $option)
    <div class="mr-2"><input id="polling{{ $key }}"
                                                                                                                                type="radio" name="polling"
                                                                                                                                value="{{ $option }}" @if ($polling->data && $polling->data == $option) checked @endif>
                                                                                                                            <label for="polling{{ $key }}"
                                                                                                                                class="m-0 mr-2">{{ $option }}</label>
                                                                                                                        </div>
    @endforeach
                                                                                                                        <input type="hidden" name="id"
                                                                                                                            value="{{ $polling->id }}">
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
                                                                        <input type="text" name=""
                                                                            id="" class="form-control "
                                                                            placeholder="Add option here">
                                                                        <i
                                                                            class="ri-delete-bin-7-fill mx-2 text-danger"></i>
                                                                    </div>
                                                                    <div class="text-end my-2">
                                                                        <!-- <button class="btn btn-secondary outline-none border-0"><i class=" ri-add-circle-line mr-2">Add More</i></button> -->
                                                                        <button
                                                                            class="btn text-primary p-0 bg-transparent outline-none border-0 f-12"><span
                                                                                class="me-2 fa fa-plus"></span> Add
                                                                            More</i></button>
                                                                    </div>

                                                                    <div
                                                                        class="bottom-content d-flex justify-content-between mx-2">
                                                                        <div class=" mx-2">
                                                                            <label for="">Poll Expires
                                                                                On</label>
                                                                            <input class=" me-1 anounce-date form-control "
                                                                                type="text" placeholder="Select date"
                                                                                value="" id="" disabled>

                                                                        </div>
                                                                        <div class=" mx-2">
                                                                            <input class="form-check-input check-box me-1"
                                                                                type="checkbox" value=""
                                                                                id="notifyEmp2">
                                                                            <label class="form-check-label"
                                                                                for="notifyEmp2">
                                                                                Notify employees
                                                                            </label>
                                                                        </div>
                                                                        <div class="mx-2">
                                                                            <input class="form-check-input check-box me-1"
                                                                                type="checkbox" value=""
                                                                                id="anonymous">
                                                                            <label class="form-check-label"
                                                                                for="anonymous">
                                                                                Anonymous Poll
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                    <div class="mt-2 text-end">
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
                                                                        <textarea name="" id="" cols="30" rows="3" class="border-0 outline-none w-100">

                                                                        </textarea>
                                                                    </div>
                                                                    <div class="text-end mt-2">
                                                                        <button
                                                                            class="btn btn-primary py-1 px-4  float-right">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-4">
                        <div class="profile-wrapper card profile-box mb-0">
                            <div class="popover-body p-0 w-100">
                                <div class="card-body">
                                    <div class="_wrapper">
                                        <div class="h-100 p-2  _container-calendar">
                                            <div
                                                class="_button-container-calendar d-flex align-items-center justify-content-between">
                                                <button id="_previous" onclick="previous()">&#8249;</button>
                                                <h6 id="_monthAndYear"></h6>
                                                <button id="_next" onclick="next()">&#8250;</button>
                                            </div>
                                            <table class="_table-calendar" id="_calendar" data-lang="en">
                                                <thead id="_thead-month"></thead>
                                                <tbody id="_calendar-body"></tbody>
                                            </table>

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
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                    {{-- @foreach ($dashboardEmployeeEventsData['birthday'] as $key)
                            @include('ui-dashboard-event-card',['date' => $key->dob])
                    @endforeach --}}
                    @include('ui-dashboard-event-card', [
                        'dashboardEmployeeEventsData' => $dashboardEmployeeEventsData,
                    ])

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
                var user_ref_id = "{{ Auth::user()->id }}";
                $.ajax({
                    type: "POST",
                    url: "{{ url('vmt-dashboard-announcement') }}",
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
    </script>
@endsection
