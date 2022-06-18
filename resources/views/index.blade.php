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

    <div class="card employee-card">
        <div class="card-body ">

            <div class="row ">
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="client-code" class="form-label">Client Code</label>
                        <input type="text" class="form-control" id="client-code">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="client-name" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="client-name">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="cin" class="form-label">CIN Number</label>
                        <input type="text" class="form-control" id="cin">

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="tan" class="form-label">Company TAN</label>
                        <input type="text" class="form-control" id="tan">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="pan" class="form-label">Company PAN</label>
                        <input type="text" class="form-control" id="pan">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="gst" class="form-label">GST Number</label>
                        <input type="text" class="form-control" id="gst">


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="epf" class="form-label">EPF Registration Number</label>
                        <input type="text" class="form-control" id="epf">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="esic" class="form-label">ESIC Registration Number</label>
                        <input type="text" class="form-control" id="esic">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="tax" class="form-label">Professional Tax Registration Number</label>
                        <input type="text" class="form-control" id="tax">


                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="authEmail" class="form-label">Authorized Person Contact Email</label>
                        <input type="text" class="form-control" id="authEmail">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">

                    <label class="form-label">Documents Upload</label>
                    <div class="input-group mb-3">

                        <input type="file" class="form-control" id="doc" accept="pdf">
                        <label for="doc" class="input-group-text">Upload</label>


                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="lwf" class="form-label">LWF Registration Number</label>
                        <input type="text" class="form-control" id="lwf">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3  scrollBar">
                        <label for="address" class="form-label">Address</label>

                        <textarea class="form-control" id="address" cols="10" rows="2"></textarea>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3 scrollBar">
                        <label for="billing" class="form-label">Billing Address</label>

                        <textarea class="form-control" id="billing" cols="10" rows="2"></textarea>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3 scrollBar">
                        <label for="ship" class="form-label">Shipping Address</label>

                        <textarea class="form-control" id="ship" cols="10" rows="2"></textarea>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="start" class="form-label">Contract Start Date</label>

                        <input type="date" class="form-control" id="start">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="end" class="form-label">Contract End Date</label>
                        <input type="date" class="form-control" id="end">


                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="product" class="form-label">Product</label>


                        <select name="" id="product" class="form-control">
                            <option value="-">Option-1</option>
                            <option value="-">Option-2</option>
                            <option value="-">Option-3</option>
                        </select>



                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-6 col-lg-4 ">
                    <div class="mb-3">
                        <label for="subcription" class="form-label">Subcription Type</label>


                        <select name="" id="subcription" class="form-control">
                            <option value="-">Option-1</option>
                            <option value="-">Option-2</option>
                            <option value="-">Option-3</option>
                        </select>



                    </div>
                </div>
            </div>
        </div>

    </div>



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