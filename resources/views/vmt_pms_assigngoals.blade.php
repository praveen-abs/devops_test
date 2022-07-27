@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />


<link href="{{ URL::asset('assets/css/assign_goals.css') }}" rel="stylesheet">

<!-- prem content -->

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
<style>
.output {
    font: 1rem 'Fira Sans', sans-serif;
}

blockquote {
    background: white;
    border-radius: 5px;
    margin: 0 !important;
    height: 100px;
    overflow-y:auto;
}

blockquote p {
    padding: 15px;
}

/* blockquote p::before {
    content: '\201C';
}

blockquote p::after {
    content: '\201D';
} */

[contenteditable='true'] {
    caret-color: red;
}

</style>
@endsection


@section('content')
@component('components.performance_breadcrumb')
@slot('li_1')  @endslot
@endcomponent




<div class="container-fluid ">
    <div class="cards-wrapper">

        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 ">
                <div class="card ">


                <div class="card px-5 py-2 pms-card-wrapper  pms-dashboard-wrapper ">


                    <div class="card-body p-3">
                        <!-- <div class="row ">
                            <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 "> -->

                        <div class="align-items-center justify-content-center row">
                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <div class="row mt-2">
                                        <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/self_review.png') }}" alt="" class=""></p>
                                        <div class="pt-2 col">
                                            <h4><b>-/{{$userCount}}</b></h4>
                                            <p>Self Review</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/rating_assessment.png') }}" alt="" class="">
                                        <p>Rating assessment reminder notiﬁcation</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 "> -->
                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('/assets/images/goals_assignment.png')}}" class="rounded-circle">
                                        <p>Goals assignment reminder notiﬁcation</p>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <!-- <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 "> -->
                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('/assets/images/manager_review.png')}}" class="">
                                        <p>Manager Review</p>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <!-- <div class="col-md-4 col-sm-6 col-lg-3 col-xl-3 "> -->
                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('/assets/images/org.png')}}" class="">
                                        <p>Organisation Review</p>
                                    </div>
                                </div>

                            </div>
                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <div class="row mt-2">
                                        <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/employee_goals.png') }}" alt="" class=""></p>
                                        <div class="pt-2 col">
                                            <h4><b>{{$empCount.'/'.$userCount}}</b></h4>
                                            <p>Employee Goals</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card pms-card m-0 m-3">
                                <div class="card-body p-0">
                                    <!-- <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('/assets/images/employees_assessed.png')}}" class="">
                                        <p>Employees Assessed</p>
                                    </div> -->
                                    <div class="row mt-2">
                                        <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/employees_assessed.png') }}" alt="" class=""></p>
                                        <div class="pt-2 col">
                                            <h4><b>{{$subCount.'/'.$userCount}}</b></h4>
                                            <p>Employees Assessed</p>
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
        @if(count($empGoals) == 0)
        <div class="mt-2 p-5" id="initial-section">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2 p-5">
                    <div class="p-3"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" style="width: 37%;height: 74%;"></div>
                    <h4><b>Assign Goals for your employees</b></h4>
                    <div class="mt-4">
                        <button id="add-goals" class="text-white btn btn-orange">
                            <h6 class="m-0 text-white p-2">
                                <i class="text-white fa fa-plus mx-1"></i>
                                <b>Add</b>
                            </h6>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else
        
        
<div class="table-responsive">
        
        <div class="container-fluid px-2 bg-white" style="position:relative;">
        <button id="add-goals" class="text-white py-1 px-3 btn btn-orange add-goals" ><i class="text-white fa fa-plus mx-1"></i>Add Goals</button>
    
    <table id='empTable' class=' table table-borderd  mb-0'>
        <thead class="table-light">
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">Employee ID</th>
                
                <th scope="col">Manager</th>
                <!-- <th scope="col">Employee name</th> -->
                
                <th scope="col">Assignment Period</th>
                <th scope="col">Employee Status</th>
                <th scope="col">Manager Status</th>
                <th scope="col">Average Rating</th>
                <th scope="col">Review </th>
            </tr>
        </thead>
        <tbody>
            @foreach($empGoals as $emp)
            <tr>
                <!-- <td>
                    <img class="rounded-circle header-profile-user"
                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                        alt="Header Avatar">
                </td> -->
                <td class="">{{$emp->emp_name}}</td>
                <td class="">{{$emp->emp_no}}</td>
                
                
                <td class="">
                    {{$users[0]->name}}
                </td>
                <td class="">
                    {{json_decode($emp->assignment_period, true) ? json_decode($emp->assignment_period, true)['assignment_period_start'] : $emp->assignment_period}}
                </td>
                <td class="">
                    <!-- Employee status -->


                    @if(auth()->user()->hasrole('Employee'))

                    <!-- If employee sets the KPI -->
                    @if(auth::user()->id == $emp->author_id)

                    {{$emp->is_employee_submitted  ? 'Submitted' :  'Not yet submitted'  }}


                    {{--
                                    @if($emp->is_manager_approved) 
                                       @if($emp->is_employee_accepted) 
                                           @if($emp->is_employee_submitted) 
                                               {{ 'Submitted'}}
                    @else
                    {{'Accepted, Not yet submitted'}}
                    @endif
                    @else
                    {{ 'Not yet accepted'}}
                    @else
                    {{ 'Not yet approved'}}
                    @endif
                    --}}
                    @else
                    {{$emp->is_employee_submitted  ? 'Submitted' :  'Not yet submitted'  }}
                    @endif
                    @endif
                    @if(auth()->user()->hasrole('Manager'))

                    {{$emp->is_employee_submitted  ? 'Submitted' :  'Not yet submitted'  }}

                    {{--    @if($emp->is_employee_accepted ) 
                               {{$emp->is_employee_submitted  ? 'Submitted' :  'Accepted, Not yet submitted'  }}
                    @else
                    {{ 'Not yet accepted'}}
                    @endif
                    --}}
                    @endif

                    @if(auth()->user()->hasrole(['Admin','HR']))

                    @if($emp->is_employee_accepted )
                    {{$emp->is_employee_submitted  ? 'Submitted' :  'Accepted, Not yet submitted'  }}
                    @else
                    {{ 'Not yet accepted'}}
                    @endif

                    @endif


                </td>
                <td class="">
                    <!-- Manager status -->
                    @if(auth()->user()->hasrole('Employee'))

                    {{$emp->is_manager_submitted  ? 'Reviewed' :  'Not yet reviewed'  }}

                    @endif
                    @if(auth()->user()->hasrole('Manager'))

                    @if($emp->is_manager_submitted )
                    Reviewed
                    @else
                    Not yet Reviewed
                    @endif

                    @endif

                    @if(auth()->user()->hasrole(['Admin','HR']))

                    {{$emp->is_manager_submitted  ? 'Reviewed' :  'Not yet Reviewed'  }}

                    @endif
                </td>
                <td class="">{{$emp['ranking']}}</td>
                <td>
                    @if(auth()->user()->hasrole('Employee'))
                    <a target="_blank"
                        href="{{url('vmt-pmsappraisal-review?id='.$emp->kpi_table_id)}}"><button class="btn btn-orange py-0 px-2 "> <span
                            class="mr-10 icon"><i class="text-white ri-pencil-line"></i></span>
                            
                        Review</button></a>
                    @else
                    
                    <a target="_blank"
                        href="{{url('pms-employee-reviews?goal_id='.$emp->kpi_table_id.'&user_id='.$emp->userid)}}"><button class="btn btn-orange py-0 px-2 "><span
                            class="mr-10 icon"><i class="text-white ri-pencil-line"></i></span>
                            Review</button></a>
                    @endif
                </td>              
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

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

<div id="add-goals-modal" class="modal custom-modal show" role="dialog" aria-modal="true" >
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
                                <!-- <div class="d-flex align-items-center mx-5">
                                    <span class="right rounded-pill py-1 px-2 mx-2 text-white btn btn-lg" id="publish-goal" style="cursor: pointer;">Publish</span>
                                </div> -->
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
                            <input type="hidden" name="goal_id" id="goal_id">
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
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="calendar_type">Calendar Type</label>
                                        <select name="calendar_type" id="calendar_type">
                                            <option value="">Select</option>
                                            <option name="financial_year" value="financial_year">Financial Year</option>
                                            <option name="calendar_year" value="calendar_year">Calendar Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="year">Year</label>
                                        <input type="hidden" name="hidden_calendar_year" id="hidden_calendar_year" value="">

                                        <select name="year" id="year" disabled>
                                            <option value="">Select</option>
                                            <option value="Jan-Dec">January - <?php echo date("Y"); ?> to December - <?= date("Y")?> </option>
                                            <option value="Apr-Mar">April - <?php echo date("Y"); ?> to March - <?= date("Y")+1?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="frequency">Frequency</label>
                                        <select name="frequency" id="frequency">
                                            <option value="">Select</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <option value="halfYearly">Half Yearly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3  mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="assignment_period_start">Assignment Period</label>
                                        <select name="assignment_period_start" id="assignment_period_start">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 mt-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label class="" for="department">Department</label>
                                        <select name="department" id="department">
                                            <option value="">Select Department</option>
                                            @foreach($department as $dept)
                                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4  mt-3 mb-3">
                                    @if (auth()->user()->hasrole('Manager') || auth()->user()->hasrole('Admin'))
                                    <div class="d-flex flex-column">
                                        <label class="" for="Assignment">Employees</label>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-group-item">
                                            </div>
                                            <button id="btn_selectEmployees" type="button" target="#changeEmployee" class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white chnageButton">Add</button>
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
                                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle">
                                                        </a>

                                                        <div class=" mt-3 message-content align-items-start d-flex flex-column  mx-2">
                                                            @if(auth()->user()->hasrole('Manager'))
                                                            <h6 class="" id="reviewer-name">{{auth()->user()->name}}</h6>
                                                            @elseif(auth()->user()->hasrole('Employee'))
                                                            <h6 class="" id="reviewer-name">{{$users[0]['name']}}</h6>
                                                            @else
                                                            <h6 class="" id="reviewer-name">---</h6>
                                                            @endif

                                                            {{-- @if(auth()->user()->hasrole('Manager'))
                                                            <span id="reviewer-email">{{auth()->user()->email}}</span>
                                                            @elseif(auth()->user()->hasrole('Employee'))
                                                            <span id="reviewer-email">{{$users[0]['email']}}</span>
                                                            @else
                                                            <span id="reviewer-email">---</span>
                                                            @endif --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @hasrole('Admin')
                                            <button 
                                                type="button" 
                                                id="btn_changeManager"
                                                target="#createEmployee"
                                                class="right btn btn-primary py-1 px-3 rounded-pill mx-3 text-white reviewerButton"
                                            >
                                                Select
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-wrapper">
                            <div class="row">
                                <div class="col-6"><h5>Key focus areas</h5></div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="container-fluid bg-light mt-3 py-2 rounded-border d-felx align-items-center">
                                        <h6 class="m-0">Goals / Areas of development</h6>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <form id="upload_form" enctype="multipart/form-data">
                                        <div class="row pull-right">
                                            @csrf
                                            <div class="col-8">
                                                <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-primary pull-right" id="upload-goal">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="container-fluid mb-1 mt-3 ">
                                        <form id="kpiTableForm">
                                            <div class="table-responsive">
                                                <table id='kpiTable' style="width:130%;" class="table align-middle mb-0" data-paging="true" data-paging-size="10" data-paging-limit="3" data-paging-container="#paging-ui-container" data-paging-count-format="{PF} to {PL}" data-sorting="true" data-filtering="false" data-empty="No Results" data-filter-container="#filter-form-container" data-editing-add-text="Add New">
                                                @csrf
                                                    <thead class="bg-primary thead" id="tHead">
                                                        <tr class="text-uppercase">
                                                            <th class="sort" data-sort="id" style="width: 2%;">#</th>
                                                            <th class="sort" data-sort="customer_name" style="width: 8%;" data-name='dimension' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('dimension', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['dimension']}} @else Dimension @endif</th>
                                                            <th class="sort" data-sort="product_name" style="width: 15%;" data-name='kpi' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('kpi', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['kpi']}} @else KPI @endif</th>
                                                            <th class="sort" data-sort="date" style="width: 20%;" data-name='operational' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('operational', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['operational']}} @else Operational Definition @endif</th>
                                                            <th class="sort" data-sort="amount" style="width: 15%;" data-name='measure' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('measure', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['measure']}} @else Measure @endif</th>
                                                            <th class="sort" data-sort="payment" style="width: 5%;" data-name='frequency' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('frequency', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['frequency']}} @else Frequency @endif</th>
                                                            <th class="sort" data-sort="status" style="width: 5%;" data-name='target' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('target', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['target']}} @else Target @endif</th>
                                                            <th class="sort" data-sort="status" style="width: 11%;" data-name='stretchTarget' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('stretchTarget', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['stretchTarget']}} @else Stretch Target @endif</th>
                                                            <th class="sort" data-sort="status" style="width: 4%;" data-name='source' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('source', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['source']}} @else Source @endif</th>
                                                            <th class="sort" data-sort="status" style="width: 15%;" width="10%" data-name='kpiWeightage' data-filterable="false" data-visible="{{$config ? $config->selected_columns && in_array('kpiWeightage', explode(',', $config->selected_columns)) ? true: false : true}}">@if($config && $config->header) {{$config->header['kpiWeightage']}} @else KPI Weightage ( % ) @endif</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody content-container" id="tbody">
                                                        <tr class="addition-content cursor-pointer" id="content1">
                                                            <td class="">
                                                                <span  name="numbers" id="" class="tableInp" >1</span>
                                                                <div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="dimension[]" id="dimension" class="text-box" cols="20"
                                                                    placeholder="type here" ></textarea> -->
                                                                <input type="hidden" id="dimension" name="dimension[]">
                                                                <blockquote contenteditable="true"><p data-id="dimension" class="bockquote">Edit Dimension Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="kpi[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="kpi" name="kpi[]">
                                                                <blockquote contenteditable="true"><p data-id="kpi" class="bockquote">Edit KPI Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="operational[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="operational" name="operational[]">
                                                                <blockquote contenteditable="true"><p data-id="operational" class="bockquote">Edit Operational Definition Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="measure[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="measure" name="measure[]">
                                                                <blockquote contenteditable="true"><p data-id="measure" class="bockquote">Edit Measure Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="frequency[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="frequency" name="frequency[]">
                                                                <blockquote contenteditable="true"><p data-id="frequency" class="bockquote">Edit Frequency Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="target[]" id="" class="text-box" cols="20"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="target" name="target[]">
                                                                <blockquote contenteditable="true"><p data-id="target" class="bockquote">Edit Target Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="stretchTarget[]" id="" class="text-box" cols="10"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="stretchTarget" name="stretchTarget[]">
                                                                <blockquote contenteditable="true"><p data-id="stretchTarget" class="bockquote">Edit Stretch Target Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="source[]" id="" class="text-box" cols="10"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="source" name="source[]">
                                                                <blockquote contenteditable="true"><p data-id="source" class="bockquote">Edit Source Here</p></blockquote>
                                                            </td>
                                                            <td class="text-box-td p-1">
                                                                <!-- <textarea name="kpiWeightage[]" id="" class="text-box" cols="10"
                                                                    placeholder="type here"></textarea> -->
                                                                <input type="hidden" id="kpiWeightage" name="kpiWeightage[]">
                                                                <blockquote contenteditable="true"><p data-id="kpiWeightage" class="bockquote">Edit KPI Weightage Here</p></blockquote>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                        <div class="align-items-center justify-content-center d-flex mt-4 cursor-pointer">
                                            <span class="plus-sign p-4"><i class="fa fa-plus f-20"></i></span>
                                        </div>

                                        <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                                            <button class="btn btn-primary table-btn mx-2" id="save-table">Save</button>
                                            <button class="btn btn-primary mx-2" id="publish-goal" disabled>Publish</button>
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


    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="errorMessageNotif_fieldsEmpty1" class="toast toast-border-danger fade hide " role="alert" aria-live="assertive" data-bs-animation="true" aria-atomic="true" >
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong class="">
                    <b>Please fill all the fields.</b>
                </strong>
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="errorMessageNotif_fieldsEmpty" class="toast toast-border-danger overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-alert-line align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">Please fill all the fields.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- Change Reviewr window -->

<div class="modal fade" id="createEmployee" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
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
                <form id="form_selectReviewer" method="POST" >
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
<div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
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
<div class="modal fade" id="changeEmployee" style="opacity:1; display:none;background:#00000073;">
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


<!-- Error Message Notification -->

<div style="z-index: 11">
    <div id="errorMessageNotif1" class="toast toast-border-danger overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                    <i class="ri-alert-line align-middle"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Something is very wrong!  <a href="javascript:void(0);" class="text-decoration-underline">See detailed report.</a></h6>
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
<script src="{{ URL::asset('/assets/premassets/js/footable.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/css/footable.bootstrap.min.css') }}"></script>


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

    ft = FooTable.init('#kpiTable', {
    });

    $('body').on('keyup', '.bockquote', function() {
        var val = $(this).html();
        var id = $(this).attr('data-id');
        $('#'+id).val(val);
    })

    $('#upload-goal').click(function() {
        // upload a file
        var form_data = new FormData(document.getElementById("upload_form"));
        $.ajax({
            type: "POST", 
            url: "{{route('upload-file')}}", 
            dataType : "json",
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                $('.addition-content').html('');
                var length = 1;
                // $.each(data,function(k, v) {
                    $.each(data[0],function(key, value) {
                        $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td><td class="text-box-td p-1"><textarea name="dimension[]" id="" class="text-box" cols="20" placeholder="type here">'+value[0]+'</textarea></td><td class="text-box-td p-1"><textarea name="kpi[]" id="" class="text-box" cols="20" placeholder="type here">'+value[1]+'</textarea></td><td class="text-box-td p-1"><textarea name="operational[]" id="" class="text-box" cols="20" placeholder="type here">'+value[2]+'</textarea></td><td class="text-box-td p-1"><textarea name="measure[]" id="" class="text-box" cols="20" placeholder="type here">'+value[3]+'</textarea></td><td class="text-box-td p-1"><textarea name="frequency[]" id="" class="text-box" cols="20" placeholder="type here">'+value[4]+'</textarea></td><td class="text-box-td p-1"> <textarea name="target[]" id="" class="text-box" cols="20" placeholder="type here">'+value[5]+'</textarea></td><td class="text-box-td p-1"><textarea name="stretchTarget[]" id="" class="text-box" cols="10" placeholder="type here">'+value[6]+'</textarea></td><td class="text-box-td p-1"><textarea name="source[]" id="" class="text-box" cols="10" placeholder="type here">'+value[7]+'</textarea></td><td class="text-box-td p-1"><textarea name="kpiWeightage[]" id="" class="text-box" cols="10" placeholder="type here">'+value[8]+'</textarea></td></tr>');
                        length++;
                    });
                // });
            }
        });
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

    $('#calendar_type').change(function() {
        if ($('#calendar_type').val() == 'financial_year') {
            $('#year').val('Apr-Mar');
        }else
        if ($('#calendar_type').val() == 'calendar_year') {
            $('#year').val('Jan-Dec');
        }
        else
        {
            $('#year').val('');
        }
        $('#hidden_calendar_year').val($("#year option:selected").text())
        console.log($( "#hidden_calendar_year" ).val());
        frequencyChange();
    });

    $('#frequency').change(function() {
        frequencyChange();
    });

    function frequencyChange() {
        var data = "";
        if ($('#frequency').val() == 'monthly') {
            var year = "<?=date('Y')?>";
            var nextyear = "<?=date('Y', strtotime('+1 year'))?>";
            if ($('#calendar_type').val() == 'financial_year') {
                data = "<option value=''>Select</option><option value='apr'>April - "+year+"</option><option value='may'>May - "+year+"</option><option value='june'>June - "+year+"</option><option value='july'>July - "+year+"</option><option value='aug'>August - "+year+"</option><option value='sept'>September - "+year+"</option><option value='oct'>October - "+year+"</option><option value='nov'>November - "+year+"</option><option value='dec'>December - "+year+"</option><option value='jan'>January - "+nextyear+"</option><option value='feb'>February - "+nextyear+"</option><option value='mar'>March - "+nextyear+"</option>";
            } else {
                data = "<option value=''>Select</option><option value='jan'>January - "+year+"</option><option value='feb'>February - "+year+"</option><option value='mar'>March - "+year+"</option><option value='apr'>April - "+year+"</option><option value='may'>May - "+year+"</option><option value='june'>June - "+year+"</option><option value='july'>July - "+year+"</option><option value='aug'>August - "+year+"</option><option value='sept'>September - "+year+"</option><option value='oct'>October - "+year+"</option><option value='nov'>November - "+year+"</option><option value='dec'>December - "+year+"</option>";
            }
        } else if ($('#frequency').val() == 'quarterly') {
            data = "<option value=''>Select</option><option value='q1'>Q1(Jan-Mar)</option><option value='q2'>Q2(Apr-June)</option><option value='q3'>Q3(July-Sept)</option><option value='q4'>Q4(Oct-Dec)</option>";
        } else if ($('#frequency').val() == 'halfYearly') {
            data = "<option value=''>Select</option><option value='h1'>H1(Jan-June)</option><option value='h2'>H2(July-Dec)</option>";
        } else {
            data = "<option value=''>Select</option><option value='yearly'>Yearly</option>";
        }
        $('#assignment_period_start').html(data);
    }
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
        $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td><td class="text-box-td p-1"><textarea name="dimension[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="kpi[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="operational[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="measure[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="frequency[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"> <textarea name="target[]" id="" class="text-box" cols="20" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="stretchTarget[]" id="" class="text-box" cols="10" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="source[]" id="" class="text-box" cols="10" placeholder="type here"></textarea></td><td class="text-box-td p-1"><textarea name="kpiWeightage[]" id="" class="text-box" cols="10" placeholder="type here"></textarea></td></tr>');
    });

    $('body').on('click', '.delete-row', function() {
        $(this).parent().parent().remove();
    });

    $('#changeEmployeeForm').on('submit', function(e){
        e.preventDefault();
        changeEmployee();
    });

    function changeEmployee() {
        var employeeSelected = $('#select-employees').val();
        @if(auth()->user()->hasrole('Employee'))
        @else
        var employees = {!!json_encode($employees)!!};

        @endif
        var employeeArray = [];
        $("#sel_employees").val(employeeSelected);
        var imgHtml ="";
        var count = 0;
        $.each(employees, function(i, data){
            //console.log(data);
            //console.log('employee selected', employeeSelected);
            if($.inArray(data.id.toString(), employeeSelected) > -1){
                employeeArray.push(data.emp_name);
                if (count < 4) {
                    imgHtml = imgHtml+"<a class='avatar'><img src='assets/images/"+data.avatar+"' alt='' class='rounded-circle p-0'></a>";
                }
                count++;
            }
        });
        if (count > 4) {
            imgHtml = imgHtml+"<span class='img-addition' style='background-color: rgb(134, 192, 106);width: 30px;height: 30px;font-size:12px;'> +"+count-3+" </span><div class='mt-1 message-content align-items-start d-flex flex-column  mx-2'><span id='group-employee'></span></div>";
        }
        //Change button text based on employee selection count
        if(count > 0)
        {
            $('#btn_selectEmployees').html("Edit");
          //  console.log("Changed to Edit button");
        }
        else
        {
            $('#btn_selectEmployees').html("Add");
           // console.log("Changed to Add button");
        }
        $('#group-employee').html(employeeArray.join());
        $('#changeEmployee').css('display', 'none');
        $('.avatar-group-item').html(imgHtml);
    }

@if(auth()->user()->hasrole('Manager'))

    var userid = {{auth()->user()->id}} 
    $.ajax({
        type: "GET", 
        url: "{{url('vmt-getAllChildEmployees')}}"+'?emp_id='+userid, 
        //data: $('#kpiTableForm').serialize(), 
        success: function(data){
        var optionHtml ="";
        $.each(data, function(i, tempdata){
            optionHtml = optionHtml+"<option value="+tempdata.id+" selected>"+tempdata.name+"</option>";
            //if(tempdata.id == $('#select-employees').val()){
            //        $('#reviewer-name').html(tempdata.name);
            //        $('#reviewer-email').html(tempdata.email);
            //    }
          });
            
            $('#select-employees').html(optionHtml);
            changeEmployee();
                     // $("#kpiTableForm :input").prop("disabled", true);
           // $(".table-btn").prop('disabled', true);
            //console.log(data);
            //alert("Table Saved, Please publish goals");
           // $("#kpitable_id").val(data.table_id);
        }
    })

@endif

// select reviewer
$('#form_selectReviewer').on('submit', function(e){
    e.preventDefault();
    var userList = {!!json_encode($users)!!};
    
    var selReviewer = $('#select-reviewer').val();
    $("#sel_reviewer").val(selReviewer);
    $.each(userList, function(i, data){
        if(data.id == $('#select-reviewer').val()){
            $('#reviewer-name').html(data.name);
            $('#reviewer-email').html(data.email);

             $('#btn_changeManager').html("Edit");
        }
    });

    $.ajax({
        type: "GET", 
        url: "{{url('vmt-getAllChildEmployees')}}"+'?emp_id='+selReviewer, 
        //data: $('#kpiTableForm').serialize(), 
        success: function(data){
        var optionHtml ="";
        $.each(data, function(i, tempdata){
            optionHtml = optionHtml+"<option value="+tempdata.id+" selected>"+tempdata.name+"</option>";
            //if(tempdata.id == $('#select-employees').val()){
            //        $('#reviewer-name').html(tempdata.name);
            //        $('#reviewer-email').html(tempdata.email);
            //    }
          });
            
          $('#select-employees').html(optionHtml);
          changeEmployee();
                     // $("#kpiTableForm :input").prop("disabled", true);
           // $(".table-btn").prop('disabled', true);
            //console.log(data);
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
    //console.log('assigning Goals');
    //console.log($('#kpiTableForm').serialize());

    var isAllFieldsEntered = true;
    var canSaveForm = true;
    var kpiWeightageTotal = 0;

    //Validate the input fields
    $("#kpiTableForm :input").each(function(){
        var input = $(this);
        //console.log("length : ");
        if(input.attr('name') == "kpiWeightage[]")
        {
            kpiWeightageTotal =kpiWeightageTotal+parseInt(input.val().replace('%', ''));
            //console.log(input.attr('name')+" , "+input.val());
        }

        if(input.val().trim().length < 1)
        {
          isAllFieldsEntered = false;
        }

    });

    //Validate other fields
    if( $('#reviewer-name').html() != "---" &&
         @if(auth()->user()->hasrole('Employee'))
         @else
           $('#btn_selectEmployees').html() == "Edit" &&
         @endif
        $('#calendar_type').val() != "" && 
        $("#year option:selected").text() != "Select" &&
        $('#frequency').val() != "" &&
        $('#assignment_period_start').val() != "" &&
        $('#department').val() != "" &&
       isAllFieldsEntered
      )
    {
        //Validate KPI Weightage
        if(kpiWeightageTotal != 100 )
        {
            canSaveForm = false;
            alert("KPI Weightage should be exactly 100%. Please validate.");
        }
    }
    else
    {
     //alert("Please fill all the fields");

     //var toast = new bootstrap.Toast($('#errorMessageNotif'));
     setTimeout(() => {
        $('#errorMessageNotif_fieldsEmpty').toast('show');
    }, 0)

        canSaveForm = false;

        // console.log( $('#reviewer-name').html());
        // console.log( $('#btn_selectEmployees').html());
        // console.log( $('#calendar_type').val());
        // console.log( $("#year option:selected").text());
        // console.log( $('#frequency').val());
        // console.log( $('#assignment_period_start').val() );
        // console.log( $('#department').val() );
    }
        
    if(canSaveForm)
    {
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
                $('#publish-goal').removeAttr('disabled');
            }
        });
    }

});



$('body').on('change', '#department', function() {
    $.ajax({
        type: "POST", 
        url: "{{route('department')}}", 
        data: {
            'id': $('#department').val(),
            "_token": "{{ csrf_token() }}",
        },
        success: function(data) {
            console.log(data['emp']);
            var optionHtml ="";
            $.each(data['emp'], function(i, tempdata){
                optionHtml = optionHtml+"<option value="+tempdata.id+" selected>"+tempdata.name+"</option>";
            });
                
            $('#select-employees').html(optionHtml);
            if (data['rev']) {
                $('#select-reviewer').val(data['rev'].id);
                $('#reviewer-name').html(data['rev'].name);
                $('#reviewer-email').html(data['rev'].email);
            }
            changeEmployee1(data['emp']);
        }
    });
});

function changeEmployee1(employees) {
    var employeeSelected = $('#select-employees').val();
    @if(auth()->user()->hasrole('Employee'))
    @else
    var imgHtml ="";
    var count = 0;
    var employeeArray = [];
    $.each(employees, function(i, data){
        // console.log(data);
        // console.log('employee selected', employeeSelected);
        if($.inArray(data.id.toString(), employeeSelected) > -1){
            employeeArray.push(data.name);
            if (count < 4) {
                imgHtml = imgHtml+"<a class='avatar'><img src='assets/images/"+data.avatar+"' alt='' class='rounded-circle p-0'></a>";
            }
            count++;
        }
    });
    if (count > 4) {
        var rem = count -3;
        imgHtml = imgHtml+"<span class='img-addition' style='background-color: rgb(134, 192, 106);width: 30px;height: 30px;font-size:12px;'> +"+rem+" </span><div class='mt-1 message-content align-items-start d-flex flex-column  mx-2'><span id='group-employee'></span></div>";
    }
    //Change button text based on employee selection count
    if(count > 0)
    {
        $('#btn_selectEmployees').html("Edit");
        //  console.log("Changed to Edit button");
    }
    else
    {
        $('#btn_selectEmployees').html("Add");
        // console.log("Changed to Add button");
    }
    $('#group-employee').html(employeeArray.join());
    $('#changeEmployee').css('display', 'none');
    $('.avatar-group-item').html(imgHtml);
    @endif
}

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