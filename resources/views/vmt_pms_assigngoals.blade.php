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

<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- prem content end -->
<style>
.f-20 {
    font-size: 20px;
}

.rounded-corner-add {
    border-radius: 30px !important;
    padding: 10px !important;
    width: 100px !important;
}

.br-card {
    border-radius: 10px !important;
}

.round {
  position: relative;
}

.round label {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 50%;
  cursor: pointer;
  height: 20px;
  left: 0;
  position: absolute;
  top: 0;
  width: 20px;
}

.round label:after {
  border: 2px solid #fff;
  border-top: none;
  border-right: none;
  content: "";
  height: 6px;
  left: 4px;
  opacity: 0;
  position: absolute;
  top: 5px;
  transform: rotate(-45deg);
  width: 12px;
}

.round input[type="checkbox"] {
  visibility: hidden;
}

.round input[type="checkbox"]:checked + label {
  background-color: #e9284a;
  border-color: #e9284a;
}

.round input[type="checkbox"]:checked + label:after {
  opacity: 1;
}

.number-top {
    border-radius: 0px 0px 30px 0px;
    padding: 2px 18px 12px 17px;
}

.plus-sign {
    --vz-bg-opacity: 1;
    background-color: rgba(var(--vz-light-rgb), var(--vz-bg-opacity)) !important;
    border-radius: 20px;
}

.avatar {
  display: inline-block;
}

.avatar:not(:first-child) {
  margin-left: -13px;
}

.img-addition {
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

.gridjs-footer {
    float: right !important;
}

.previous, .next {
    background: white !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  color: white !important;
}

.dataTables_wrapper .dataTables_paginate span .paginate_button {
    color: white !important;
}

.dataTables_wrapper .dataTables_paginate span .current {
    color: white !important;
}

span .current {
    color: white !important;
}

span .paginate_button {
    background: #405189 !important;
}


#empTable td:before {
    content: attr(data-label);
    display: inline;
    position: relative;
    font-size: 85%;
    top: -0.5rem;
    float: left;
    color: #808080;
    min-width: 4rem;
    margin-left: 0;
    margin-right: 1rem;
    text-align: left;
}

#empTable {
    border-collapse: separate;
    border-spacing: 0 2em;
}
#empTable tr{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

tr.selected td:before {
    color: #404040;
}

.table>:not(:last-child)>:last-child>* {
    border-bottom: none !important;
}

.table>:not(caption)>*>* {
    border-bottom: none !important;
}

.table td, .table th {
    border-top: none !important;
}


td:first-child,
th:first-child {
  border-radius: 10px 0 0 10px;
}

td:last-child,
th:last-child {
  border-radius: 0 10px 10px 0;
}
</style>

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

                <div class="first">
                    <div class="container-fluid shadow-lg p-3 mb-5 bg-body rounded">
                    <div>
                        <div>
                            <img src="{{ URL::asset('/assets/images/img_kpi_widget_bg.jpg')}}" class="rounded float-start" alt="..." width="250px">
                        </div>
                        <div class="card-group">
                            <div class="card mb-2 shadow-lg p-3 mb-5 bg-body rounded flex-row" style="width:10rem; ">
                                <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ URL::asset('/assets/images/img_kpi_widget_cardimg_1.jpg')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">250/300</h5>
                                    <p class="card-text">Employee with goals.</p>
                                </div>
                                </div>
                            </div>
                            <div class="card mb-2 shadow-lg p-3 mb-5 bg-body rounded flex-row" style="width: 10rem;">
                                <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ URL::asset('/assets/images/img_kpi_widget_cardimg_2.jpg')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">230/120</h5>
                                    <p class="card-text">Employee Assessed/Rated.</p>
                                </div>
                                </div>
                            </div>
                            <div class="card mb-2 shadow-lg p-3 mb-5 bg-body rounded" style="width: 10rem;">
                                <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ URL::asset('/assets/images/img_kpi_widget_cardimg_3.jpg')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">24-7-2022</h5>
                                    <p class="card-text">Goal Assainment reminder notification</p>
                                </div>
                                </div>
                            </div>
                            <div class="card mb-2 shadow-lg p-3 mb-5 bg-body rounded" style="width: 10rem;">
                                <div class="row g-0">
                                <div class="col-md-3 image">
                                    <img src="{{ URL::asset('/assets/images/img_kpi_widget_cardimg_4.jpg')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">24-10-2020</h5>
                                    <p class="card-text">Rating assessment reminder notification.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>









                    <!-- <div class="card-body"> -->

                        <!-- <div class="d-flex justify-content-between align-items-center">

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
                        </div> -->

                        <!-- <div class="align-items-center" style="justify-content:center;">
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0"></div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Employees with Goals</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Employees assessed/ rated</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Goals assignment reminder notification</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Rating assessment reminder notification</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0"></div>
                            </div>
                        </div>
                        <div class="align-items-center mt-3" style="justify-content:center;">

                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3 col-md-6 col-xl-3"></div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Self Review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Manger Review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 col-md-6 col-xl-2 pr-0">
                                    <div class="card employee-cards m-0">
                                        <div class="card-body p-0">
                                            <div class="row mt-2">
                                                <p class="pl-3 col-auto pb-2">
                                                    <img src="{{ URL::asset('/assets/premassets/img/client-img5.png') }}" class="img-round">
                                                </p>
                                                <div class="pt-2 col pb-2 pl-0">
                                                    <h5 class="fw-bold">-</h5>
                                                    <span>Org review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-6 col-lg-3 col-md-6 col-xl-3"></div>
                            </div>
                        </div>

                    <!-- </div> -->
                </div>
            </div>
        </div>
        @if(count($empGoals) == 0)
        <div class="mt-4 p-5" id="initial-section">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2 p-5">
                    <div class="p-3"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" style="width: 37%;height: 74%;"></div>
                    <h4><b>Assign Goals for your employees</b></h4>
                    <div class="mt-4">
                        <button id="add-goals" class="rounded-pill py-1 px-2 mx-2 text-white btn btn-primary"><h6 class="m-0 text-white p-2"><i class="text-white fa fa-plus mr-2"></i><b>Add</b></h6></button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <button id="add-goals" class="rounded-pill py-1 px-2 mx-2 text-white btn btn-primary mb-2" style="float:right;"><h6 class="m-0 text-white p-2"><i class="text-white fa fa-plus mr-2"></i><b>Add</b></h6></button>
        <div style="width:100%; overflow:auto;">
            <table id='empTable' class='table dt-responsive nowrap'>
                <thead>
                    <tr style="background:#f6f8fb;">
                        <th class="p-3"></th>
                        <th class=""  style="width : 30px"> </th>
                        <th class="p-3">Employee ID</th>
                        <th class="p-3">Employee name</th>
                        <th class="p-3">Manager</th>
                        <th class="p-3">Assignment Period</th>
                        <th class="p-3">Employee Status</th>
                        <th class="p-3">Manager Status</th>
                        <th class="p-3">Average Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empGoals as $emp)
                    <tr>
                        <td>
                            <img class="rounded-circle header-profile-user" src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif" alt="Header Avatar">
                        </td>
                        <td style="vertical-align : middle">
                            @if(auth()->user()->hasrole('Employee'))
                                <a target="_blank" href="{{url('vmt-pmsappraisal-review?id='.$emp->kpi_table_id)}}"><span class="mr-10 icon"><i class="fa fa-external-link"></i></span></a>
                            @else
                                <a target="_blank" href="{{url('pms-employee-reviews?goal_id='.$emp->kpi_table_id.'&user_id='.$emp->userid)}}"><span class="mr-10 icon"><i class="fa fa-external-link"></i></span></a>
                            @endif
                        </td>

                        <td class="p-3">{{$emp->emp_no}}</td>
                        <td class="p-3">{{$emp->emp_name}}</td>
                        <td class="p-3">
                            @if(auth()->user()->hasrole('Employee') || auth()->user()->hasrole('Manager') )
                                {{$users[0]->name}}
                            @else
                                 
                            @endif
                        </td>
                        <td class="p-3">{{$emp->assignment_period}}</td>
                        <td class="p-3"><!-- Employee status -->


                               @if(auth()->user()->hasrole('Employee'))
                                    
                                    @if(auth::user()->id == $emp->author_id)

                                        @if($emp->is_manager_approved)
                                            {{$emp->is_employee_submitted  ? 'Submitted' :  'Accepted, Not yet submitted'  }}
                                        @else
                                        {{ 'Not yet approved'}}
                                        @endif

                                    @else
                                        {{$emp->is_employee_submitted  ? 'Submitted' :  'Accepted, Not yet submitted'  }}
                                @endif
                                @endif
                                @if(auth()->user()->hasrole('Manager'))

                                    @if($emp->is_employee_accepted ) 
                                        {{$emp->is_employee_submitted  ? 'Submitted' :  'Accepted, Not yet submitted'  }}
                                    @else 
                                    {{ 'Not yet accepted'}}
                                    @endif

                                @endif

                                @if(auth()->user()->hasrole(['Admin','HR']))

                                    @if($emp->is_employee_accepted ) 
                                        {{$emp->is_employee_submitted  ? 'Submitted' :  'Accepted, Not yet submitted'  }}
                                    @else 
                                    {{ 'Not yet accepted'}}
                                    @endif

                                @endif                                


                        </td>   
                        <td class="p-3"><!-- Manager status -->
                            @if(auth()->user()->hasrole('Employee'))

                                {{$emp->is_manager_submitted  ? 'Submitted' :  'Not yet submitted'  }}

                            @endif
                            @if(auth()->user()->hasrole('Manager'))

                                @if($emp->is_manager_submitted ) 
                                    Submitted
                                @else 
                                    Not yet submitted
                                @endif

                            @endif

                            @if(auth()->user()->hasrole(['Admin','HR']))

                                {{$emp->is_manager_submitted  ? 'Submitted' :  'Not yet submitted'  }}

                            @endif
                        </td>                       
                        <td class="p-3">5</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <!-- <div class="assign-cards-wrapper">
        <div class="card mt-5 assignCards">
            <div class="card-header p-0 m-0">
                <div class="d-flex   justify-content-between align-items-center ">
                    <div class="d-flex  align-items-center">
                        <span class="left fw-bold text-white pt-3 px-4 pb-4">New</span>
                        <h5 class="m-0 mx-3">Assign Goals</h5>
                    </div>
                    <div class="d-flex align-items-center">

                        <span class="right rounded-pill py-1 px-2 mx-2 text-white btn btn-lg" id="publish-goal" style="cursor: pointer;">Publish</span>
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
                        <div class="col-4 mt-3 mb-3 ml-5">
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
                                <label class="" for="Assignment">Employees-02</label>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group-item">
                                        <a >
                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                        </a>
                                        <div class="mt-1 message-content align-items-start d-flex flex-column  mx-2">
                                            <span id="group-employee"></span>
                                        </div>
                                    </div>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#changeEmployee" class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white">Change</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mt-3 mb-3 d-flex ml-5">

                            <div class="d-flex flex-column">
                                <label class="" for="Assignment">Reviwer</label>
                                <div class="d-flex align-items-center">
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
                                    <button 
                                        type="button" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#createEmployee"
                                        class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white"
                                    >
                                        Change
                                    </button>
                                </div>
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
                                    
                                <table class="table align-middle mb-0 table-nowrap responsive table-responsive" id="kpiTable">
                                    @csrf
                                    <thead class="text-white bg-primary thead" id="tHead">

                                            <tr class="text-uppercase">
                                                <th class="sort" data-sort="id" style="width: 2%;">#</th>
                                                <th class="sort" data-sort="customer_name" style="width: 8%;">Dimension</th>
                                                <th class="sort" data-sort="product_name" style="width: 25%;">KPI</th>
                                                <th class="sort" data-sort="date" style="width: 25%;">Operational Definition</th>
                                                <th class="sort" data-sort="amount" style="width: 25%;">Measure</th>
                                                <th class="sort" data-sort="payment" style="width: 10%;">Frequency</th>
                                                <th class="sort" data-sort="status" style="width: 20%;">Target</th>
                                                <th class="sort" data-sort="status" style="width: 20%;">Stretch Target</th>
                                                <th class="sort" data-sort="status" style="">Source</th>
                                                <th class="sort" data-sort="status" style="width: 10%;" width="10%">KPI Weightage</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody content-container" id="tbody">
                                            <tr class="addition-content cursor-pointer" id="content1">
                                                <td class="">
                                                    <span  name="numbers" id="" class="tableInp" >1</span>
                                                    <div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div>
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
                                <div class="align-items-center justify-content-center d-flex mt-4 cursor-pointer">
                                    <span class="plus-sign p-4"><i class="fa fa-plus f-20"></i></span>
                                </div>
                                <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                                    <button class="btn btn-primary table-btn mx-2" id="save-table">Save Table</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div id="add-goals-modal" class="modal custom-modal fade show" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="assign-cards-wrapper col-12 p-0">
                    <div class="assignCards">
                        <div class="card-header p-0 m-0">
                            <div class="d-flex   justify-content-between align-items-center ">
                                <div class="d-flex  align-items-center">
                                    <span class="left fw-bold text-white pt-3 px-4 pb-4">New</span>
                                    <h5 class="m-0 mx-3">Assign Goals</h5>
                                </div>
                                <div class="d-flex align-items-center mx-5">
                                    <span class="right rounded-pill py-1 px-2 mx-2 text-white btn btn-lg" id="publish-goal" style="cursor: pointer;">Publish</span>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="assign-cards-wrapper">
                    <div class="assignCards">
                        <form id="goalForm">
                            @csrf
                            <input type="hidden" name="kpitable_id" id="kpitable_id">
                            @if(auth()->user()->hasrole('Employee'))
                            <input type="hidden" name="employees[]" value="{{auth()->user()->id}}" id="sel_employees">
                            @else
                            <input type="hidden" name="employees[]" id="sel_employees">
                            @endif

                            @if(auth()->user()->hasrole('Manager'))
                            <input type="hidden" name="reviewer" value="{{auth()->user()->id}}" id="sel_reviewer">
                            @elseif(auth()->user()->hasrole('Employee'))
                            <input type="hidden" name="reviewer" value="{{$users[0]['id']}}" id="sel_reviewer">
                            @else
                            <input type="hidden" name="reviewer" id="sel_reviewer">
                            @endif
                            <input type="hidden" name="assignment_period_year" id="assignment_period_year" value="<?php echo date("Y"); ?>">

                            <div class="row mt-3">
                                <div class="col-2  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="assignment_period_start">Assignment Period</label>
                                        <select name="assignment_period_start" id="">
                                            <option name="January" value="Jan">January - <?php echo date("Y"); ?> </option>
                                            <option name="February" value="Feb">February - <?php echo date("Y"); ?></option>
                                            <option name="March" value="Mar">March - <?php echo date("Y"); ?></option>
                                            <option name="April" value="Apr">April - <?php echo date("Y"); ?></option>
                                            <option name="May" value="May">May - <?php echo date("Y"); ?></option>
                                            <option name="June" value="Jun">June - <?php echo date("Y"); ?></option>
                                            <option name="July" value="Jul">July - <?php echo date("Y"); ?></option>
                                            <option name="August" value="Aug">August - <?php echo date("Y"); ?></option>
                                            <option name="September" value="Sep">September - <?php echo date("Y"); ?></option>
                                            <option name="October" value="Oct">October - <?php echo date("Y"); ?></option>
                                            <option name="November" value="Nov">November - <?php echo date("Y"); ?></option>
                                            <option name="December" value="Dec">December - <?php echo date("Y"); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="department">Department</label>
                                        <select name="department" id="">
                                            <option value="Technology">Technology</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Auditing">Auditing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4  mt-3 mb-3">
                                    @if (auth()->user()->hasrole('Manager') || auth()->user()->hasrole('Admin'))
                                    <div class="d-flex flex-column">
                                        <label class="" for="Assignment">Employees-02</label>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-group-item">
                                                <a class="avatar">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle p-0">
                                                </a>
                                                <a class="avatar">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle p-0">
                                                </a>
                                                <a class="avatar">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle p-0">
                                                </a>
                                                <a class="avatar">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle p-0">
                                                </a>
                                                <span class="img-addition" style="background-color: rgb(134, 192, 106);width: 30px;height: 30px;font-size:12px;"> +12 </span>
                                                <div class="mt-1 message-content align-items-start d-flex flex-column  mx-2">
                                                    <span id="group-employee"></span>
                                                </div>
                                            </div>
                                            <button type="button" target="#changeEmployee" class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white chnageButton">Edit</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-4 mt-3 mb-3 d-flex ml-5">

                                    <div class="d-flex flex-column">
                                        <label class="" for="Assignment">Reviewer</label>
                                        <div class="d-flex align-items-center">
                                            <div class="card reviwer-cards  m-0 rounded-pill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <a>
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                                        </a>

                                                        <div class=" mt-1 message-content align-items-start d-flex flex-column  mx-2">
                                                            @if(auth()->user()->hasrole('Manager'))
                                                            <h6 class="fw-bold m-0" id="reviewer-name">{{auth()->user()->name}}</h6>
                                                            @elseif(auth()->user()->hasrole('Employee'))
                                                            <h6 class="fw-bold m-0" id="reviewer-name">{{$users[0]['name']}}</h6>
                                                            @else
                                                            <h6 class="fw-bold m-0" id="reviewer-name">---</h6>
                                                            @endif

                                                            @if(auth()->user()->hasrole('Manager'))
                                                            <span id="reviewer-email">{{auth()->user()->email}}</span>
                                                            @elseif(auth()->user()->hasrole('Employee'))
                                                            <span id="reviewer-email">{{$users[0]['email']}}</span>
                                                            @else
                                                            <span id="reviewer-email">---</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @hasrole('Admin')
                                            <button 
                                                type="button" 
                                                target="#createEmployee"
                                                class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white reviewerButton"
                                            >
                                                Change
                                            </button>
                                            @endif
                                        </div>
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
                                            <table class="table align-middle mb-0 table-nowrap responsive table-responsive" id="kpiTable">
                                                @csrf
                                                <thead class="text-white bg-primary thead" id="tHead">
                                                    <tr class="text-uppercase">
                                                        <th class="sort" data-sort="id" style="width: 2%;">#</th>
                                                        <th class="sort" data-sort="customer_name" style="width: 8%;">Dimension</th>
                                                        <th class="sort" data-sort="product_name" style="width: 25%;">KPI</th>
                                                        <th class="sort" data-sort="date" style="width: 25%;">Operational Definition</th>
                                                        <th class="sort" data-sort="amount" style="width: 25%;">Measure</th>
                                                        <th class="sort" data-sort="payment" style="width: 10%;">Frequency</th>
                                                        <th class="sort" data-sort="status" style="width: 20%;">Target</th>
                                                        <th class="sort" data-sort="status" style="width: 20%;">Stretch Target</th>
                                                        <th class="sort" data-sort="status" style="">Source</th>
                                                        <th class="sort" data-sort="status" style="width: 10%;" width="10%">KPI Weightage</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody content-container" id="tbody">
                                                    <tr class="addition-content cursor-pointer" id="content1">
                                                        <td class="">
                                                            <span  name="numbers" id="" class="tableInp" >1</span>
                                                            <div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div>
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
                                        <div class="align-items-center justify-content-center d-flex mt-4 cursor-pointer">
                                            <span class="plus-sign p-4"><i class="fa fa-plus f-20"></i></span>
                                        </div>

                                        <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
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
    </div>
</div>

<!-- Change Reviewr window -->

<div class="modal fade" id="createEmployee" role="dialog" aria-hidden="true" style="opacity:1; display:none;">
    <div class="modal-dialog modal-md" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Change Reviewer
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-reviewerButton" data-bs-dismiss="modal"
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
                    <div class="content-footer mt-3">
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

<!-- Vertically Centered -->
<div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;">
    <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="modalHeader">Success
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mt-4">
                    <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                    <p class="text-muted mb-4" id="modalBody"> Table Saved, Please publish goals.</p>
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Select Employees window -->
<div class="modal fade" id="changeEmployee">
    <div class="modal-dialog modal-md" id="" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2">

        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Select Employees
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-changeEmployee" data-bs-dismiss="modal"
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
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select-reviewer').select2({
        dropdownParent: '#createEmployee',
        minimumResultsForSearch: Infinity,
		width: '100%'
    });

    $(document).on('#select-reviewer:open', () => {
        $('.select2-search__field').focus();
    });
   $('#empTable').DataTable({
    //   'processing': true,
    //   'serverSide': true,
    //   'serverMethod': 'post',
    //   'ajax': {
    //       'url':'ajaxfile.php'
    //   },
    //   'columns': [
    //      { data: 'emp_name' },
    //      { data: 'email' },
    //      { data: 'gender' },
    //      { data: 'salary' },
    //      { data: 'city' },
    //   ]
   });
});

$(function () {
    $("#kpiTable").sortable({
        items: 'tr',
        cursor: 'pointer',
        axis: 'y',
        dropOnEmpty: false,
        start: function (e, ui) {
            ui.item.addClass("selected");
        },
        stop: function (e, ui) {
            ui.item.removeClass("selected");
            $(this).find("tr").each(function (index) {
                // if (index > 0) {
                //     $(this).find("td").eq(1).html(index);
                // }
            });
        }
    });
});
</script>
<script>
    // $("#select-reviewer").select2({
    //     dropdownParent: $("#createEmployee")
    // });
    $('.reviewerButton').click(function() {
        $('#createEmployee').show();
        $('#createEmployee').removeClass('fade');
    });
    $('.close-reviewerButton').click(function() {
        $('#createEmployee').hide();
        $('#createEmployee').addClass('fade');
    });
    $('.chnageButton').click(function() {
        $('#changeEmployee').show();
        $('#changeEmployee').removeClass('fade');
    });
    $('.close-changeEmployee').click(function() {
        $('#changeEmployee').hide();
        $('#changeEmployee').addClass('fade');
    });
    $('#add-goals').click(function() {
        $('#add-goals-modal').modal('show');
    });

$('body').on('click', '.plus-sign', function() {
    var id = $('.addition-content:last').attr('id');
    var length = 1;
    if (id) {
        length = parseInt(id.replace('content', '')) + 1;
    }
    $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class=""><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td><td class=""><textarea name="dimension[]" id="" cols="20" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="kpi[]" id="" cols="20" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="operational[]" id="" cols="20" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="measure[]" id="" cols="20" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="frequency[]" id="" cols="20" rows="2" placeholder="type here"></textarea></td><td class=""> <textarea name="target[]" id="" cols="20" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="stretchTarget[]" id="" cols="10" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="source[]" id="" cols="10" rows="2" placeholder="type here"></textarea></td><td class=""><textarea name="kpiWeightage[]" id="" cols="10" rows="2" placeholder="type here"></textarea></td></tr>');
});

$('body').on('click', '.delete-row', function() {
    $(this).parent().parent().remove();
});

$('#changeEmployeeForm').on('submit', function(e){
    e.preventDefault();
    var employeeSelected = $('#select-employees').val();
    @if(auth()->user()->hasrole('Employee'))

    @else
    var employees = {!!json_encode($employees)!!};

    @endif
    var employeeArray = [];

    $("#sel_employees").val(employeeSelected);

    $.each(employees, function(i, data){
        console.log(data);
        console.log('employee selected', employeeSelected);
        if($.inArray(data.id.toString(), employeeSelected) > -1){
            employeeArray.push(data.emp_name);
        }
    });
    $('#group-employee').html(employeeArray.join());
    $('#changeEmployee').css('display', 'none');
});

@if(auth()->user()->hasrole('Manager'))

    var userid = {{auth::user()->id}} 
    $.ajax({
        type: "GET", 
        url: "{{url('vmt-getAllChildEmployees')}}"+'?emp_id='+userid, 
        //data: $('#kpiTableForm').serialize(), 
        success: function(data){
        var optionHtml ="";
        $.each(data, function(i, tempdata){
            optionHtml = optionHtml+"<option value="+tempdata.id+">"+tempdata.name+"</option>";
            //if(tempdata.id == $('#select-employees').val()){
            //        $('#reviewer-name').html(tempdata.name);
            //        $('#reviewer-email').html(tempdata.email);
            //    }
          });
            
          $('#select-employees').html(optionHtml);
                     // $("#kpiTableForm :input").prop("disabled", true);
           // $(".table-btn").prop('disabled', true);
            console.log(data);
            //alert("Table Saved, Please publish goals");
           // $("#kpitable_id").val(data.table_id);
        }
    })

@endif

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

    $.ajax({
        type: "GET", 
        url: "{{url('vmt-getAllChildEmployees')}}"+'?emp_id='+selReviewer, 
        //data: $('#kpiTableForm').serialize(), 
        success: function(data){
        var optionHtml ="";
        $.each(data, function(i, tempdata){
            optionHtml = optionHtml+"<option value="+tempdata.id+">"+tempdata.name+"</option>";
            //if(tempdata.id == $('#select-employees').val()){
            //        $('#reviewer-name').html(tempdata.name);
            //        $('#reviewer-email').html(tempdata.email);
            //    }
          });
            
          $('#select-employees').html(optionHtml);
                     // $("#kpiTableForm :input").prop("disabled", true);
           // $(".table-btn").prop('disabled', true);
            console.log(data);
            //alert("Table Saved, Please publish goals");
           // $("#kpitable_id").val(data.table_id);
        }
    })


    $('#createEmployee').css('display','none');
});

$('body').on('click', '.close-modal', function() {
    $('#notificationModal').hide();
    $('#notificationModal').addClass('fade');
})


// publishing tables
$('body').on('click', '#save-table', function(e){
    // e.preventDefault();
    console.log('assigning Goals');
    console.log($('#kpiTableForm').serialize());

    $.ajax({
        type: "POST", 
        url: "{{url('vmt-pms-kpi-table/save')}}", 
        data: $('#kpiTableForm').serialize(), 
        success: function(data){

            $("#kpiTableForm :input").prop("disabled", true);
            $(".table-btn").prop('disabled', true);
            $('#notificationModal').show();

            // alert("Table Saved, Please publish goals");
            $('#modalBody').html("Table Saved, Please publish goals.");
            $('#notificationModal').show();
            $('#notificationModal').removeClass('fade');
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

                @if(auth()->user()->hasrole('Employee'))
                    $('#modalBody').html("Goals published. Email Sent to your Manager");
                    $('#notificationModal').show();
                    $('#notificationModal').removeClass('fade');
                @else
                    $('#modalBody').html("Goals published. Email Sent to your Employees");
                    $('#notificationModal').show();
                    $('#notificationModal').removeClass('fade');
                @endif

                $("kpitable_id").val(data.table_id);
            }
        })
    }else{
        $('#modalBody').html("Please publish table first");
        $('#modalHeader').html("Failed");
        $('#modalNot').html("Failed to save Data");
        $('#notificationModal').show();
        $('#notificationModal').removeClass('fade');
    }
   
});


</script>

@endsection