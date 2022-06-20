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



<div class="container-fluid">

      <!--  cards- container-->
    <div class="notify-content container w-100 h-75 my-2">
        <div class="row w-100">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="d-flex  align-items-center my-2">

                    <div class="img-container">
                        <img src="blob:https://www.pngwing.com/4e51f4d3-29bc-42b3-a043-bd35dd7d77e0" alt="">
                    </div>

                    <!-- card -->
                    <div class="notify-container mx-2 d-flex align-items-center">
                        <div class="card notify-card mx-2 my-2 ">
                            <div class="card-body d-flex align-items-center p-0">

                                <div class="d-flex  align-items-center py-1">
                                    <div class="notify-img mx-1">
                                        <img src="" alt="">
                                    </div>
                                    <div class="notify-content mx-1">
                                        <p>250/300</p>
                                        <span>Employee with goals</span>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card notify-card mx-2 my-2 ">
                            <div class="card-body d-flex align-items-center p-0">

                                <div class="d-flex  align-items-center py-1">
                                    <div class="notify-img mx-1">
                                        <img src="" alt="">
                                    </div>
                                    <div class="notify-content mx-1">
                                        <p>200/120</p>
                                        <span>Employee /rated</span>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card notify-card mx-2 my-2 ">
                            <div class="card-body d-flex align-items-center p-0">

                                <div class="d-flex  align-items-center py-1">
                                    <div class="notify-img mx-1">
                                        <img src="" alt="">
                                    </div>
                                    <div class="notify-content mx-1">
                                        <p>16-06-2022</p>
                                        <span>Goals assignment reminder notifications</span>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card notify-card mx-2 my-2 ">
                            <div class="card-body d-flex align-items-center p-0">

                                <div class="d-flex  align-items-center py-1">
                                    <div class="notify-img mx-1">
                                        <img src="" alt="">
                                    </div>
                                    <div class="notify-content mx-1">
                                        <p>16-06-2022</p>
                                        <span>Goals assignment reminder notifications</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- tables assign goals -->

    <div class="employee-wrpper mt-5 d-flex justify-content-between">
        <div class="row w-100">
            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">

                <div class="employee-content-left ">
                    <table class="table   responsive" id="table">
                        <thead class="thead" id="tHead">
                            <tr>

                                <th scope="col">Employee Name</th>
                                <th scope="col">Employee Id</th>
                            </tr>
                        </thead>
                        <tbody class="tbody" id="tbody">
                            <tr>

                                <td>joseph</td>
                                <td>CB123</td>
                            </tr>
                            <tr>

                                <td>joseph</td>
                                <td>CB123</td>
                            </tr>
                            <tr>

                                <td>joseph</td>
                                <td>CB123</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                <div class="employee-content-right mt-3 ">
                    <div class="card rounded-border">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="left-content d-flex">
                                    <span>New</span>
                                    <h6>Assign Goals</h6>
                                </div>
                                <div class="right-content d-flex">
                                    <span>publish</span>
                                    <span>X</span>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

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