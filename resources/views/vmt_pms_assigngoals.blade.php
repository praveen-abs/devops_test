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

                        <span class="right rounded-pill py-1 px-2 mx-2 text-white" id="publish-goal" style="cursor: pointer;">Publish</span>
                        <i class="ri-close-fill fw-bold mx-1 mt-0"></i>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="goalForm">
                    @csrf
                    <input type="hidden" name="kpitable_id" id="kpitable_id">
                    <input type="hidden" name="employees[]" id="sel_employees">
                    <input type="hidden" name="reviewer" id="sel_reviewer">
                    <div class="row mt-3">
                        <div class="col-4  mt-3 mb-3">
                            <div class="d-flex flex-column">
                                <label class="" for="Assignment">
                                    Assignment Period</label>
                                <input type="text" name="assignment_period" class="" required />
                            </div>
                        </div>
                        <div class="col-4 mt-3 mb-3">
                            <div class="d-flex flex-column">
                                <label class="" for="Assignment">
                                    Coverage</label>
                                <select name="coverage" id="">
                                    <option value="Employee">Employee</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Project Manager">Project Manager</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4  mt-3 mb-3">
                            <div class="d-flex flex-column">
                                <label class="" for="Assignment">
                                    Employees-02</label>
                                <div class="avatar-group-item">
                                    <a >
                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                    </a>
                                    <div class="mt-1 message-content align-items-start d-flex flex-column  mx-2">
                                        <span id="group-employee"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#changeEmployee"
                                    class="right btn btn-primary py-1 px-3 rounded-pill mt-4 mx-3 text-white">Change</button>
                            </div>
                        </div>

                        <div class="col-4 mt-3 mb-3 d-flex">

                            <div class="d-flex flex-column">
                                <label class="" for="Assignment">
                                    Reviwer</label>

                                <div class="card reviwer-cards  m-0 rounded-pill">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <a>
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                            </a>

                                            <div class=" mt-1 message-content align-items-start d-flex flex-column  mx-2">
                                                <h6 class="fw-bold m-0" id="reviewer-name">Steve Jobs</h6>
                                                <span id="reviewer-email">Steve@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex align-items-center">
                                <button 
                                    type="button" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#createEmployee"
                                    class="right btn btn-primary py-1 px-3 rounded-pill mt-4 mx-3 text-white"
                                >
                                    Change
                                </button>
                            </div>
                        </div>
                    </div>
                </form>


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
                                <form id="kpiTableForm">
                                    @csrf
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
                                                <td class="">
                                                    <span  name="numbers" id="" class="tableInp" >1</span>
                                                </td>

                                                <td class="">
                                                    <textarea name="dimension[]" id="" cols="20" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>

                                                <td class="">
                                                    <textarea name="kpi[]" id="" cols="20" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="operational[]" id="" cols="20" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="measure[]" id="" cols="20" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="frequency[]" id="" cols="20" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="target[]" id="" cols="20" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="stretchTarget[]" id="" cols="10" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="source[]" id="" cols="10" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                                <td class="">
                                                    <textarea name="kpiWeightage[]" id="" cols="10" rows="2"
                                                        placeholder="type here"></textarea>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </form>
                                <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                                    <button class="btn btn-primary table-btn mx-2" onclick="insRow()">Add</button>
                                    <button class="btn btn-primary table-btn mx-2" onclick="deleteRow(this)">Remove</button>
                                    <button class="btn btn-primary table-btn mx-2" id="save-table">Save Table</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Change Reviewr window -->

<div class="modal fade" id="createEmployee">
    <div class="modal-dialog modal-md" id="" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Change Reviewer
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="newQuestion" method="POST" >
                    @csrf
                    <label for="FormSelectDefault" class="form-label text-muted">Reviewer</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="reviewer" id="select-reviewer" >
                        @foreach($users as $index => $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <div class="content-footer">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="d-flex">
                                    <ul class="nav nav-pills w-100 mb-4" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item d-flex w-100 align-items-center justify-content-end "
                                            role="presentation">
                                           
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">
                                                Save
                                            </button>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- add employee  Modal-->
</div>

<!-- Select Employees window -->
<div class="modal fade" id="changeEmployee">
    <div class="modal-dialog modal-md" id="" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">

        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Select Employees
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">

                <form id="changeEmployeeForm" method="POST" >
                    @csrf
                    <label for="FormSelectDefault" class="form-label text-muted">Employees</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="employees[]" id="select-employees" multiple>
                        @foreach($employees as $index => $employee)
                            <option value="{{$employee->id}}">{{$employee->emp_name}}</option>
                        @endforeach
                    </select>
                
                    <div class="content-footer">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="d-flex">
                                    <ul class="nav nav-pills w-100 mb-4" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item d-flex w-100 align-items-center justify-content-end "
                                            role="presentation">
                                           
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">
                                                Save
                                            </button>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- add employee  Modal-->
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
    numbersBox.innerHTML = (currentIndex);
    var dimensionBox = document.createElement("textarea");
    dimensionBox.setAttribute("name", "dimension[]");
    dimensionBox.setAttribute("placeholder", "type here");
    dimensionBox.setAttribute("cols", "20");
    dimensionBox.setAttribute("rows", "2");


    var kpiBox = document.createElement("textarea");
    kpiBox.setAttribute("name", "kpi[]");
    kpiBox.setAttribute("placeholder", "type here");
    kpiBox.setAttribute("cols", "20");
    kpiBox.setAttribute("rows", "2");


    var operationalBox = document.createElement("textarea");
    operationalBox.setAttribute("name", "operational[]");
    operationalBox.setAttribute("placeholder", "type here");
    operationalBox.setAttribute("cols", "20");
    operationalBox.setAttribute("rows", "2");

    var measureBox = document.createElement("textarea");
    measureBox.setAttribute("name", "measure[]");
    measureBox.setAttribute("placeholder", "type here");
    measureBox.setAttribute("cols", "20");
    measureBox.setAttribute("rows", "2");

    var frequencyBox = document.createElement("textarea");
    frequencyBox.setAttribute("name", "frequency[]");
    frequencyBox.setAttribute("placeholder", "type here");
    frequencyBox.setAttribute("cols", "20");
    frequencyBox.setAttribute("rows", "2");

    var targetBox = document.createElement("textarea");
    targetBox.setAttribute("name", "target[]");
    targetBox.setAttribute("placeholder", "type here");
    targetBox.setAttribute("cols", "20");
    targetBox.setAttribute("rows", "2");

    var stretchTargetBox = document.createElement("textarea");
    stretchTargetBox.setAttribute("name", "stretchTarget[]");
    stretchTargetBox.setAttribute("placeholder", "type here");
    stretchTargetBox.setAttribute("cols", "10");
    stretchTargetBox.setAttribute("rows", "2");

    var sourceBox = document.createElement("textarea");
    sourceBox.setAttribute("name", "source[]");
    sourceBox.setAttribute("placeholder", "type here");
    sourceBox.setAttribute("cols", "10");
    sourceBox.setAttribute("rows", "2");

    var kpiWeightageBox = document.createElement("textarea");
    kpiWeightageBox.setAttribute("name", "kpiWeightage[]");
    kpiWeightageBox.setAttribute("placeholder", "type here");
    kpiWeightageBox.setAttribute("cols", "10");
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

$('#changeEmployeeForm').on('submit', function(e){
    e.preventDefault();
    var employeeSelected = $('#select-employees').val();
    var employees = {!!json_encode($employees)!!};
    var employeeArray = [];

    $("#sel_employees").val(employeeSelected);

    $.each(employees, function(i, data){
        if($.inArray(data.id.toString(), employeeSelected) > -1){
            employeeArray.push(data.emp_name);
        }
    });
    $('#group-employee').html(employeeArray.join());
    $('#changeEmployee').modal('hide');
});

// select reviewer
$('#newQuestion').on('submit', function(e){
    e.preventDefault();
    var userList = {!!json_encode($users)!!};
    var selReviewer = $('#select-reviewer').val();
    $("#sel_reviewer").val(selReviewer);

    $.each(userList, function(i, data){
        if(data.id == $('#select-reviewer').val()){
            $('#reviewer-name').html(data.name);
            $('#reviewer-email').html(data.email);
        }
    });

    $('#createEmployee').modal('hide');
});

// publishing tables
$('#save-table').click(function(e){
    e.preventDefault();
    console.log('assigning Goals');
    console.log($('#kpiTableForm').serialize());

    $.ajax({
        type: "POST", 
        url: "{{url('vmt-pms-kpi-table/save')}}", 
        data: $('#kpiTableForm').serialize(), 
        success: function(data){

            $("#kpiTableForm :input").prop("disabled", true);
            $(".table-btn").prop('disabled', true);

            alert("Table Saved, Please publish goals");
            $("#kpitable_id").val(data.table_id);
        }
    })
})

//
$("#publish-goal").click(function(e){
    e.preventDefault();

    if($('#kpitable_id').val()){  
        $.ajax({
            type: "POST", 
            url: "{{url('vmt-pms-assign-goals/publish')}}", 
            data: $('#goalForm').serialize(), 
            success: function(data){

                $("#kpiTableForm :input").prop("disabled", true);
                $(".table-btn").prop('disabled', true);

                alert("Goal Assigned, Email Sent to the employees");
                $("kpitable_id").val(data.table_id);
            }
        })
    }else{
        alert("please publish table first");
    }
   
});


</script>

@endsection