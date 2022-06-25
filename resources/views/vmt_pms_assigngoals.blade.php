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
<!--Bootstrap Calendar-->
<!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/bootstrap_calendar.css') }}"> -->

<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
<!--Animate CSS-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
<!--Map-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">


<!-- calendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<!-- prem content end -->


@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent




<div class="container-fluid ">
    <div class="cards-wrapper">

        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 ">
                <div class="card ">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3 col-md-6 col-xl-3">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="image-content mx-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}"
                                                        class="img-round">
                                                </div>
                                                <div class="message-content mx-2">
                                                    <h5 class="fw-bold">250/200</h5>
                                                    <span>Lorem ipsum dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6 col-xl-3">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="image-content mx-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}"
                                                        class="img-round">
                                                </div>
                                                <div class="message-content mx-2">
                                                    <h5 class="fw-bold">250/200</h5>
                                                    <span>Lorem ipsum dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6 col-xl-3">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="image-content mx-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}"
                                                        class="img-round">
                                                </div>
                                                <div class="message-content mx-2">
                                                    <h5 class="fw-bold">250/200</h5>
                                                    <span>Lorem ipsum dolor sit amet.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6 col-xl-3">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="image-content mx-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}"
                                                        class="img-round">
                                                </div>
                                                <div class="message-content mx-2">
                                                    <h5 class="fw-bold">250/200</h5>
                                                    <span>Lorem ipsum dolor sit amet.</span>
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

    <div class="assign-cards-wrapper">
        <div class="card mt-5 assignCards">
            <div class="card-header p-0 m-0">
                <div class="d-flex   justify-content-between align-items-center ">
                    <div class="d-flex  align-items-center">
                        <span class="left fw-bold text-white py-2 px-4">New</span>
                        <h5 class="m-0 mx-3">Assign Goals</h5>
                    </div>
                    <div class="d-flex align-items-center">

                        <span class="right  rounded-pill py-1 px-2 mx-2 text-white">Publish</span>
                        <i class="ri-close-fill fw-bold mx-1 mt-0"></i>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-3  mt-3 mb-3">
                        <div class="d-flex flex-column">
                            <label class="" for="Assignment">
                                Assignment Period</label>
                            <input type="text" name="Assignment" class="" required />
                        </div>
                    </div>
                    <div class="col-3 mt-3 mb-3">
                        <div class="d-flex flex-column">
                            <label class="" for="Assignment">
                                Coverage</label>
                            <select name="dropDown" id="">
                                <option value="">Employee</option>
                                <option value="">Manager</option>
                                <option value="">Project Manager</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3  mt-3 mb-3">
                        <div class="d-flex flex-column">
                            <label class="" for="Assignment">
                                Employees-02</label>
                            <div class="avatar-group-item">
                                <a >
                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mt-3 mb-3 d-flex">

                        <div class="d-flex flex-column">
                            <label class="" for="Assignment">
                                Reviwer</label>

                            <div class="card reviwer-cards  m-0 rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">

                                        <a>
                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                        </a>

                                        <div class=" mt-1 message-content align-items-start d-flex flex-column   mx-2">
                                            <h6 class="fw-bold m-0">Steve Jobs</h6>
                                            <span>Steve@gmail.com</span>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="d-flex align-items-center">
                            <button
                                class="right btn btn-primary py-1 px-3 rounded-pill mt-4 mx-3 text-white">Change</button>
                        </div>
                    </div>
                </div>


                <div class="table-wrapper">
                    <h5>Key focus areas</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid bg-light mt-3 py-2 rounded-border d-felx align-items-center">
                                <h6 class="m-0">Goals / Areas of development</h6>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="container-fluid mb-1 mt-3 ">
                                <table class="table align-middle mb-0 table-nowrap responsive" id="kpiTable">
                                    <thead class="text-white bg-primary thead" id="tHead">

                                        <tr class="text-uppercase">

                                            <th class="sort" data-sort="id" style="width: 2%;">#</th>
                                            <th class="sort" data-sort="customer_name" style="width: 8%;">Dimension</th>
                                            <th class="sort" data-sort="product_name" style="width: 25%;">KPI</th>
                                            <th class="sort" data-sort="date" style="width: 25%;">Operational Definition
                                            </th>
                                            <th class="sort" data-sort="amount" style="width: 25%;">Measure</th>
                                            <th class="sort" data-sort="payment" style="width: 10%;">Frequency</th>
                                            <th class="sort" data-sort="status" style="width: 20%;">Target</th>
                                            <th class="sort" data-sort="status" style="width: 20%;">Stretch Target</th>
                                            <th class="sort" data-sort="status" style="">Source</th>

                                            <th class="sort" data-sort="status" style="width: 10%;" width="10%">KPI
                                                Weightage</th>


                                        </tr>
                                    </thead>
                                    <tbody class="tbody" id="tbody">
                                        <tr>
                                        <tr>

                                            <td class="">
                                                <span  name="numbers" id="" class="tableInp" >1</span>
                                            </td>

                                            <td class="">
                                                <textarea name="dimension" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>

                                            <td class="">
                                                <textarea name="kpi" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="operational" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="measure " id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="frequency" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="target" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="stretchTarget" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="source" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                            <td class="">
                                                <textarea name="kpiWeightage" id="" cols="25" rows="2"
                                                    placeholder="type here"></textarea>
                                            </td>
                                        </tr>

                                        </tr>

                                    </tbody>
                                </table>

                                <div class="buttons d-flex justify-content-end align-items-center mt-4">
                                    <button class="btn btn-primary mx-2" onclick="insRow()">Add</button>
                                    <button class="btn btn-primary mx-2" onclick="deleteRow(this)">Remove</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!--Main Content-->



<!--  -->
@endsection

@section('script')
<!-- Prem assets -->
<!-- OWL CAROUSEL -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>


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
function deleteRow(row) {
    document.getElementById('kpiTable').deleteRow(-1);
}


function insRow(argument) {
    var myTable = document.getElementById("kpiTable");
    var currentIndex = myTable.rows.length;
    var currentRow = myTable.insertRow(-1);


    var numbersBox = document.createElement("span");
    numbersBox.setAttribute("name", "numbers" + currentIndex);

    var dimensionBox = document.createElement("textarea");
    dimensionBox.setAttribute("name", "dimension" + currentIndex);
    dimensionBox.setAttribute("placeholder", "type here");
    dimensionBox.setAttribute("cols", "25");
    dimensionBox.setAttribute("rows", "2");



    var kpiBox = document.createElement("textarea");
    kpiBox.setAttribute("name", "kpi" + currentIndex);
    kpiBox.setAttribute("placeholder", "type here");
    kpiBox.setAttribute("cols", "25");
    kpiBox.setAttribute("rows", "2");


    var operationalBox = document.createElement("textarea");
    operationalBox.setAttribute("name", "operational" + currentIndex);
    operationalBox.setAttribute("placeholder", "type here");
    operationalBox.setAttribute("cols", "25");
    operationalBox.setAttribute("rows", "2");

    var measureBox = document.createElement("textarea");
    measureBox.setAttribute("name", "measure" + currentIndex);
    measureBox.setAttribute("placeholder", "type here");
    measureBox.setAttribute("cols", "25");
    measureBox.setAttribute("rows", "2");

    var frequencyBox = document.createElement("textarea");
    frequencyBox.setAttribute("name", "frequency" + currentIndex);
    frequencyBox.setAttribute("placeholder", "type here");
    frequencyBox.setAttribute("cols", "25");
    frequencyBox.setAttribute("rows", "2");

    var targetBox = document.createElement("textarea");
    targetBox.setAttribute("name", "target" + currentIndex);
    targetBox.setAttribute("placeholder", "type here");
    targetBox.setAttribute("cols", "25");
    targetBox.setAttribute("rows", "2");

    var stretchTargetBox = document.createElement("textarea");
    stretchTargetBox.setAttribute("name", "stretchTarget" + currentIndex);
    stretchTargetBox.setAttribute("placeholder", "type here");
    stretchTargetBox.setAttribute("cols", "25");
    stretchTargetBox.setAttribute("rows", "2");

    var sourceBox = document.createElement("textarea");
    sourceBox.setAttribute("name", "source" + currentIndex);
    sourceBox.setAttribute("placeholder", "type here");
    sourceBox.setAttribute("cols", "25");
    sourceBox.setAttribute("rows", "2");

    var kpiWeightageBox = document.createElement("textarea");
    kpiWeightageBox.setAttribute("name", "kpiWeightage" + currentIndex);
    kpiWeightageBox.setAttribute("placeholder", "type here");
    kpiWeightageBox.setAttribute("cols", "25");
    kpiWeightageBox.setAttribute("rows", "2");

    var currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(numbersBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(dimensionBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(kpiBox);


    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(operationalBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(measureBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(frequencyBox);


    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(targetBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(stretchTargetBox);


    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(sourceBox);


    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(kpiWeightageBox);




}
</script>





@endsection