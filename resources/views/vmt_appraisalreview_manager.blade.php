@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<style type="text/css">
.e-table>:not(caption)>*>* {
    border-bottom-width: 0px !important;
    padding: .45rem .6rem !important;
}

.e-table .e-table,
.e-table>thead {
    border: 0px !important;
}

.table-bordered .table-bordered>:not(caption)>*>* {
    border-top-width: 0px !important;
    border-bottom-width: 0px !important;
}

.inp-text {
    height:46px;
    width:auto;
    word-break: break-word;
}
</style>
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Self Appraisal Review @endslot
@endcomponent






<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">PERFORMANCE MANAGEMENT SYSTEMS (PMS) </h4>

            </div><!-- end card header -->

            <div class="card-body  pb-2">

                <br/>
                @if($empSelected)
                    <table class="table e-table align-middle table-nowrap mb-0 " style="border: none;">

                    <tbody>
                        <tr style="border: none;">
                            <td class=" text-left">
                                <b>Employee Name: </b>
                            </td>
                            <td class="text-left">
                                {{Auth::user()->name}}
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="text-left">
                                <b>Employee ID:
                            </td>
                            <td class="text-left">
                                {{$employeeData->emp_no}}
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Job Title / Designation:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                {{$employeeData->designation}}
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Business Unit/Process/Function:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Call Centre
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Reporting Manager :</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Ajeesh Kumar R -Head Service Delivery
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Managers Manager :</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Kumar
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Review Period: </b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Jul’21 To Mar’22
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif

            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">

            <div class="card-body  pb-2">

                <table class="table e-table align-middle table-nowrap mb-0 " style="border: none;">

                    <tbody>
                        <tr style="border: none;">
                            <td class=" text-left">
                                <b>Overall Annual Score: </b>
                            </td>
                            <td class="text-left">
                                @if($ratingDetail){{$ratingDetail['rating']}}@else - @endif
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="text-left">
                                <b>Corresponding ANNUAL PERFORMANCE Rating:</b>
                            </td>
                            <td class="text-left">
                                @if($ratingDetail){{$ratingDetail['performance']}}@else - @endif
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Ranking:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                @if($ratingDetail){{$ratingDetail['ranking']}}@else - @endif
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b> Action:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                @if($ratingDetail){{$ratingDetail['action']}}@else - @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div><!-- end card body -->
        </div><!-- end card -->

        <!-- @can('L1_Review')
                            <th style=" background-color: #405189;">
                                <h6 style="color:white;">Reporting Manger Review's (L1)<br /><br /> Comments
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score
                                </h6>
                            </th>
                            @endcan

                            @can('L2_Review')
                            <th class="r" style=" background-color: #405189;">
                                <h6 style="color:white;"> Managers Manager (L2)<br /><br /> Comments
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score</h6>
                            </th>
                            @endcan

                            @can('Final_Review')
                            <th class="r" style=" background-color: #405189;">
                                <h6 style="color:white;"> Final Review <br />( HR or Head Of the Department)</h6>
                            </th>
                            @endcan -->


        <!-- appraisal table -->
        <div class="card">
            <div class="card-body pb-2">
                @if(count($kpiRows) > 0)
                <form id="employee_self_review" method="POST">
                    @csrf
                    <input type="hidden" name="goal_id" value="{{$assignedGoals->id}}">
                    <div class="table-content mb-4">
                        
                        <table class="table align-middle mb-0  responsive" id="table">

                            <thead class="thead" id="tHead">
                                <tr>
                                    <th scope="col">Dimension</th>
                                    <th scope="col">KPI</th>
                                    <th scope="col">Operational Definition</th>
                                    <th scope="col">Measure</th>
                                    <th scope="col">Frequency</th>
                                    <th scope="col">Target</th>
                                    <th scope="col">Stretch Target</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">KPI Weightage</th>
                                    <th scope="col">KPI - Achievement (Self Review)</th>
                                    <th scope="col">Self KPI Achievement %</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">KPI - Achievement (Manager Review)</th>
                                    <th scope="col">Manager KPI Achievement %
                                    </th>
                                    @if($reviewCompleted)
                                    <th scope="col">KPI - Achievement (HR Review)</th>
                                    <th scope="col">HR KPI Achievement %
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody" id="tbody">
                                @foreach($kpiRows as $index => $kpiRow)
                                <tr>
                                    <th scope="row">{{$kpiRow->dimension}}</th>
                                    <td>
                                        <div>{{$kpiRow->dimension}}</div>
                                    </td>
                                    <td>
                                        <div> {{$kpiRow->operational_definition}} </div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->measure}} </div>
                                    </td>
                                    <td>
                                        <div> {{$kpiRow->frequency}}</div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->target}}</div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->stretch_target}}</div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->source}}</div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->kpi_weightage}}</div>
                                    </td>
                                    <td>
                                        <div>
                                            {{$kpiRow->self_kpi_review}}
                                        </div>
                                    </td>
                                    <td>
                                        <div> {{$kpiRow->self_kpi_percentage}}</div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->self_kpi_comments}}</div>
                                    </td>


                                    <td>
                                        @if($reviewCompleted)
                                            <div>{{$kpiRow->manager_kpi_review}}</div>
                                        @endif
                                        @if($assignedGoals->is_employee_submitted && !$reviewCompleted)
                                            <textarea name="managereview[{{$kpiRow->id}}]" id="" cols="20" rows="2" placeholder="type here">@if(isset( $kpiRow->manager_kpi_review)){{$kpiRow->manager_kpi_review}}@endif</textarea>
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if($reviewCompleted)
                                            <div>{{$kpiRow->manager_kpi_review}}</div>
                                        @endif
                                        @if($assignedGoals->is_employee_submitted  && !$reviewCompleted)      
                                        <!-- <textarea name="managerpercetage[{{$kpiRow->id}}]" id="" cols="20" rows="2" 
                                            placeholder="type here">@if(isset( $kpiRow->manager_kpi_percentage)) {{$kpiRow->manager_kpi_percentage}}@endif</textarea> -->
                                        <input type="number" class="inp-text" name="managerpercetage[{{$kpiRow->id}}]" placeholder="type here" value="@if(isset( $kpiRow->manager_kpi_percentage)){{$kpiRow->manager_kpi_percentage}}@endif">
                                        @else

                                        @endif
                                    </td>
                                    @if($reviewCompleted)
                                    <td>
                                        
                                            <div>{{$kpiRow->hr_kpi_review}}</div>
                                     </td>
                                    <td>
                                        
                                            <div>{{$kpiRow->hr_kpi_review}}</div>
                                        
                                    </td>
                                        @endif
                                   
                                    

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                       
                    </div>
                </form>
                <div class="buttons d-flex align-items-center justify-content-end ">
                    @if(!$assignedGoals->is_manager_approved)
                        <button class="btn btn-primary" id="approve">Approve<i class="fa fa-save"></i></button>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" id="reject">Reject<i class="fa fa-save"></i></button>
                        &nbsp;&nbsp;
                    @else
                        @if(!$reviewCompleted && $assignedGoals->is_employee_submitted)
                            <button class="btn btn-primary" id="save_table">Save<i class="fa fa-save"></i></button>
                            &nbsp;&nbsp;
                            <button class="btn btn-primary" id="publish_table">Publish<i class="fa fa-save"></i></button>
                        @endif
                        @if(!$assignedGoals->is_employee_submitted)
                            <h4>Employee has not yet submitted this review.</h4>
                        @endif
                    @endif
                </div>
                @else

                <h4>Goals Not Assigned</h4>

                @endif

            </div>
        </div>
    </div><!-- end col -->

    @if($reviewCompleted)

        <div class="row mt-3">
            <div class="col-lg-12">
                <label class="form-label">
                    Appraiser Feedback:
                </label>
                <div class="my-2">
                    <textarea class="form-control" placeholder="" id="gen-info-description-input" name="performance"
                        rows="4"></textarea>
                </div>
            </div>
        </div>
    @endif



    <div class="card">
        <div class="card-header">
            <p>Appraisee's Annual Score & Rating</p>
        </div>
        <div class="card-body pb-2">
            <h5>Best People Rating Grid</h5>
            <div class="table-content mb-4">
                <table class="table align-middle mb-0  responsive" id="table">

                    <thead class="thead" id="tHead">
                        <tr>
                            <th scope="col" colspan="6">Best People
                                Rating Grid</th>
                            <th scope="col"> Appraisee's Annual Score & Rating</th>

                        </tr>
                    </thead>
                    <tbody class="tbody" id="tbody">


                        <tr>
                            <td class="">
                                Overall Annual Score
                            </td>
                            <td class="">Less than 60 </td>
                            <td class="">60-70</td>
                            <td class="">70-80</td>
                            <td class="">80-90</td>
                            <td class="">90-100</td>
                        </tr>

                        <tr>

                            <td class="">
                                Corresponding ANNUAL PERFORMANCE Rating

                            </td>
                            <td class="">Needs Action</td>
                            <td class="">Below Expectations</td>
                            <td class="">Meet Expectations</td>
                            <td class="">Exceeds Expectations </td>
                            <td class="">Exceptionally Exceeds Expectations</td>
                        </tr>

                        <tr>
                            <td class="">
                                Ranking
                            </td>
                            <td class="">1</td>
                            <td class="">2</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">5</td>
                        </tr>
                        <tr>

                            <td class="">
                                Action
                            </td>
                            <td class="">Exit</td>
                            <td class="">PIP</td>
                            <td class="">10%</td>
                            <td class="">15%</td>
                            <td class="">20%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Modal -->
                <div class="modal fade flip" id="acceptPMS" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                    trigger="loop" colors="primary:#405189,secondary:#f06548"
                                    style="width:90px;height:90px"></lord-icon>
                                <div class="mt-4 text-center">
                                    <h4>You are about to delete a order ?</h4>
                                    
                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove
                                        all of
                                        your information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button
                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                            data-bs-dismiss="modal"><i
                                                class="ri-close-line me-1 align-middle"></i>
                                            Close</button>
                                        <button class="btn btn-danger" id="delete-record">Yes,
                                            Delete It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->


    
</div><!-- end row -->

 
@endsection
@section('script')
<!-- apexcharts -->

 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script type="text/javascript">
    
 
    $('#save_table').click(function(e){
        e.preventDefault();
        console.log("save trigger");
        console.log($('#employee_self_review').serialize());

        $.ajax({
            type: "POST", 
            url:"{{url('vmt-pms-saveKPItableDraft_Manager')}}",
            data:$('#employee_self_review').serialize(), 
            success: function(data){
                alert(data);
            }
        })
    });

    $('#publish_table').click(function(e){
        e.preventDefault();
        console.log("save trigger");
        console.log($('#employee_self_review').serialize());

        $.ajax({
            type: "POST", 
            url:"{{url('vmt-pmsappraisal-managerreview')}}",
            data:$('#employee_self_review').serialize(), 
            success: function(data){
                alert(data);
            }
        })
    });

    $('#approve').click(function(e){
        e.preventDefault();
        //goal_id=26&user_id=4
        var goal_id = "{{\Request::get('goal_id')}}";
        var user_id = "{{\Request::get('user_id')}}";
        var approve_flag = "approved";
       
        $.ajax({
            type: "GET", 
            url:"{{url('vmt-approvereject-kpitable')}}?goal_id="+goal_id+"&user_id="+user_id+"&approve_flag="+approve_flag,
            success: function(data){
                alert(data);
            }
        })
    });

    $('#reject').click(function(e){
        e.preventDefault();
        //goal_id=26&user_id=4
        var goal_id = "{{\Request::get('goal_id')}}";
        var user_id = "{{\Request::get('user_id')}}";
        var approve_flag = "rejected";
       
        $.ajax({
            type: "GET", 
            url:"{{url('vmt-approvereject-kpitable')}}?goal_id="+goal_id+"&user_id="+user_id+"&approve_flag="+approve_flag,
            success: function(data){
                alert(data);
            }
        })
    });

</script>
@endsection