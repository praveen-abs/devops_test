@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent


<section class="widget-wrapper">

    <div class="widget-container  container-fluid">

        <div class="row">
            <div class="col-6">
                <!-- for add -->
                <div class="widget-item">

                    <div class="card card-content card-animate">
                        <div class="card-body p-2 card-body-content d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="text-large text-white">Holidays</p><a class="text-white">View All</a>

                            </div>
                            <div class="d-flex align-items-center my-auto">
                                <div class="icon-click"><span class=" ri-arrow-drop-left-line text-white"></span>

                                </div>
                                <div class="flex-grow-1 mx-10 text-white">
                                    <h1 class="text-truncate-1 text-white" title="Rakshabandhan">Rakshabandhan</h1>
                                    <p class="d-flex align-items-center mt-1"><span>Thu, 11 August, 2022</span>

                                    </p>
                                </div>
                                <div class="icon-click">
                                    <!---->
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                        <div class="action-buttons">
                            <div tooltip="Settings" class="button"><span class="icon ic-settings"></span></div>
                            <!---->
                            <div tooltip="Drag" class="cursor-grab"><span class="icon ic-move transform-90"></span>
                            </div>
                            <!---->
                            <div tooltip="Remove" class="button"><span class="icon ic-close"></span></div>
                            <!---->
                        </div>
                    </div>
                    <!---->

                    <!---->
                </div>
            </div>
            <!-- for date and time -->
            <div class="col-6">
                <div class="widget-item ">

                    <div class="card card-content card-animate">
                        <div class="card-body p-2 card-body-content d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">

                                <div class="date-time d-flex align-items-center justify-content-between ">
                                    <p class="text-large text-white">
                                        Today Date
                                        <span>-</span>
                                    </p>
                                    <p id="displayDay"></p>
                                </div>

                                <p class="text-white">View All</p>

                            </div>


                            <div class="d-flex">
                                <div class="d-flex align-items-center my-auto">
                                    <div class="show-time d-flex flex-column">
                                        <p>Current Time</p>
                                        <div class="displayTime  d-flex">
                                            <h4 id="time" class="text-white"> </h4><s id="seconds" class="px-1"></s>
                                            <p id="session" class="px-1"></p>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 mx-10 text-white">

                                    </div>
                                    <div class="icon-click">
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                        <div class="action-buttons">
                            <div tooltip="Settings" class="button"><span class="icon ic-settings"></span></div>
                            <!---->
                            <div tooltip="Drag" class="cursor-grab"><span class="icon ic-move transform-90"></span>
                            </div>
                            <!---->
                            <div tooltip="Remove" class="button"><span class="icon ic-close"></span></div>
                            <!---->
                        </div>
                    </div>
                    <!---->

                    <!---->
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <!-- for employee info -->
                <div class="widget-item">
                    <div class="card card-content card-animate">
                        <div class="card-body p-2 card-body-content d-flex flex-column">
                            <div>
                                <h6 class="text-white">On Leave Today</h6>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="">
                                    <h5 class="text-white">Everyone Working Today</h5>
                                    <span class="text-white">No one is on leave today</span>
                                </div>
                                <div>
                                    <div class="info-img">

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="col-6">

                <div class="widget-item">

                    <div class="card card-content card-animate">
                        <div class="card-body p-2 card-body-content d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <p>Quick Links</p>


                            </div>


                            <div class="d-flex mt-4">
                                <div class="d-flex align-items-center my-auto">
                                    <h4 class="text-white">No Quick Links Are Added</h4>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!---->

                    <!---->
                </div>
            </div>
        </div>
        <!-- for circle  -->
        <div class="row">
            <div class="col-6">
                <div class="widget-item">

                    <div class="card card-content card-animate ">
                        <div class="card-body p-2 card-body-content  d-flex flex-column">

                            <div>
                                <span>Leave Balances</span>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="d-flex flex-column align-items-center text-center ">
                                    <div
                                        class=" align-items-center d-flex justify-content-around rounded-circle roundedCircle">
                                        0</div>
                                    <p>Sick Leave</p>
                                </div>
                                <div class="d-flex flex-column align-items-center  text-center  ">
                                    <div
                                        class="animate-circle align-items-center d-flex justify-content-around   rounded-circle roundedCircle">
                                        0</div>
                                    <p>Privilege Leave</p>
                                </div>
                                <div class="d-flex flex-column align-items-center  text-center ">
                                    <div
                                        class="animate-circle align-items-center d-flex justify-content-around   rounded-circle roundedCircle">
                                        0</div>
                                    <p>Casual Leave</p>
                                </div>

                                <div>
                                    <p class="text-center">Apply Leave View All Balances</p>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- rigth content -->





</section>




<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <div class="row ">
                                <div class="col-6">
                                    <h4 class="fs-16 mb-1">Good Morning !</h4>
                                </div>
                                <div class="col-6 text-end">
                                </div>
                            </div>
                        </div>


                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Active Review Cycles
                                    </p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="105">0</span></h4>
                                </div>
                                <div class="flex-shrink-0 align-self-end">
                                    <span class="badge badge-soft-success">Go to Review Groups<span> </span><i
                                            class="ri-arrow-right-s-fill align-middle me-1"></i></span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews to be Initiated
                                    </p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="233">0</span></h4>
                                </div>
                                <div class="flex-shrink-0 align-self-end">
                                    <span class="badge badge-soft-success">Go to Review Groups<span> </span><i
                                            class="ri-arrow-right-s-fill align-middle me-1"></i></span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews In Progress</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="120">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card  card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews Finalised</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="23">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->


                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Pending Feedback
                                        Requests</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="43">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

            </div> <!-- end col -->



        </div>
    </div>
    <!--end row-->


    @endsection

    @section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <!-- for date and time -->

    <script>
    // var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    // var d = new Date(dateString);
    // var dayName = days[d.getDay()];
    var dayIndex = new Date().getDay();
    const getDayName = (dayIndex) => {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        return days[dayIndex];
    }
    const dayName = getDayName(dayIndex)
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];

    const d = new Date();

    document.getElementById("displayDay").innerHTML = monthNames[d.getMonth()] + " " + d.getDate() + "," + d
        .getFullYear() + " " + dayName;


    function displayTimes() {

        var date = new Date();
        var hrs = date.getHours();
        var mins = date.getMinutes();
        var secs = date.getSeconds();

        var sessions = document.getElementById("session");

        if (hrs > 12) {
            session.innerHTML = "PM";

        } else {
            session.innerHTML = "PM";
        }

        if (hrs > 12) {
            hrs = hrs - 12;
        }

        if (mins <= 9) {
            mins = "0" + mins;
        }
        if (secs <= 9) {
            secs = "0" + secs;
        }

        document.getElementById("time").innerHTML = hrs + ":" + mins + ":" + secs;
    }
    setInterval(displayTimes, 10);


    // for counter number

    const counters = document.querySelectorAll('.count');
    // Main function
    for (let n of counters) {
        const updateCount = () => {
            const target = +n.getAttribute('data-target');
            const count = +n.innerText;
            const speed = 1000; // change animation speed here
            const inc = target / speed;
            if (count < target) {
                n.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 1);
            } else {
                n.innerText = target;
            }
        }
        updateCount();
    }



    // circle prograss bar
    </script>





    @endsection