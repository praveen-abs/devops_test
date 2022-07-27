@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

<!-- for styling -->
<link href="{{ URL::asset('assets/css/appraisal_review.css') }}" rel="stylesheet">

@endsection
@section('content')





<div>
    <div class="card  profile-box card-top-border ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                <div class=" appraisal-user">
                                    <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                                        class="soc-det-img profile-img-round w-100 h-100">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                <div class="d-flex flex-column justify-content-center mx-1 my-3 ">
                                    <h4 class="fw-bold">{{$assignedEmployee_Userdata->name}}</h5>
                                    <p class="text-muted">{{$assignedEmployeeOfficeDetails->designation}}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                            <hr>
                            @if($empSelected)
                            <div class="appraisal-info left-content">
                                <ul class="personal-info">
                                    <li>
                                        <p class="title">Employee Name</p>
                                        <p class="text">{{$assignedEmployee_Userdata->name}}</p>
                                    </li>
                                    <li>
                                        <p class="title"> Employee ID</p>
                                        <p class="text">{{$employeeData->emp_no}}</p>
                                    </li>
                                    <li>
                                        <p class="title">Job Title/Designation</p>
                                        <p class="text">{{$assignedEmployeeOfficeDetails->designation}}</p>
                                    </li>
                                    <li>
                                        <p class="title">Business Unit/Process/Function</p>
                                        <p class="text">{{$assignedEmployeeOfficeDetails->department}}</p>
                                    </li>
                                    <li>
                                        <p class="title">Reporting Manager</p>
                                        <p class="text">{{$assignedEmployeeOfficeDetails->l1_manager_name}}</p>
                                    </li>
                                    <li>
                                        <p class="title">Review Period</p>
                                        <p class="text"><?php
                                    $temp =  json_decode($assignedGoals->assignment_period, true);
                                   print_r($temp['year']." - ".strtoupper($temp['assignment_period_start']));
                                    //dd($temp);
                                ?></p>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                            <div class="card  appraisal-right-content">
                                <div class="card-body">

                                    <div class="mb-3 input-wrap">
                                        <p>Overall Annual Score</p>
                                        <div class="appraisal-box  btn bg-success text-white ">
                                            @if($ratingDetail){{$ratingDetail['rating']}}@else - @endif</div>

                                    </div>
                                    <div class="mb-3 input-wrap">
                                        <p>Corresponding ANNUAL PERFORMANCE Rating</p>
                                        <div class="appraisal-box  btn bg-success  text-white">
                                            @if($ratingDetail){{$ratingDetail['performance']}}@else - @endif</div>
                                    </div>
                                    <div class="mb-3 input-wrap">
                                        <p>Ranking</p>
                                        <div class="appraisal-box   btn bg-success text-white ">
                                            @if($ratingDetail){{$ratingDetail['ranking']}}@else - @endif</div>
                                    </div>
                                    <div class=" input-wrap">
                                        <p>Action</p>
                                        <div class="appraisal-box btn bg-danger text-white">
                                            @if($ratingDetail){{$ratingDetail['action']}}@else - @endif</div>
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
    <div class="col-xl-12">
        <!-- <div class="card">

            @if($empSelected)
            <table class="table e-table align-middle table-nowrap mb-0 " style="border: none;">

                <tbody>
                    <tr style="border: none;">
                        <td class=" text-left">
                            <b>Employee Name: </b>
                        </td>
                        <td class="text-left">
                            {{$assignedEmployee_Userdata->name}}
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
                            {{$assignedEmployeeOfficeDetails->designation}}
                        </td>
                    </tr>
                    <tr style="border: none;">
                        <td class="col-xl-6 text-left">
                            <b>Business Unit/Process/Function:</b>
                        </td>
                        <td class="col-xl-6 text-left">
                            {{$assignedEmployeeOfficeDetails->department}}
                        </td>
                    </tr>
                    <tr style="border: none;">
                        <td class="col-xl-6 text-left">
                            <b>Reporting Manager :</b>
                        </td>
                        <td class="col-xl-6 text-left">
                            {{$assignedEmployeeOfficeDetails->l1_manager_name}}
                        </td>
                    </tr>
                    {{-- <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Managers Manager :</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Kumar
                            </td>
                        </tr> --}}
                    <tr style="border: none;">
                        <td class="col-xl-6 text-left">
                            <b>Review Period: </b>
                        </td>
                        <td class="col-xl-6 text-left">
                            <?php
                                    $temp =  json_decode($assignedGoals->assignment_period, true);
                                   print_r($temp['year']." - ".strtoupper($temp['assignment_period_start']));
                                    
                                ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif

        </div> -->

        <!-- <div class="card">

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

        </div> -->

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
                <div class="row">
                    <div class="col-12 mt-3">
                        <form id="upload_form" enctype="multipart/form-data">
                            <div class="row pull-right mb-3">
                                @csrf
                                <div class="col">
                                    <a href="{{route('download-file', $kpiRowsId)}}" class="btn btn-primary pull-right"
                                        id="download-excel">Download</a>
                                </div>
                                <div class="col-auto p-0">
                                    <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx"
                                        class="form-control" required>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary pull-right" id="upload-goal"
                                        disabled>Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($kpiRows) > 0)
                <form id="employee_self_review" method="POST">
                    @csrf
                    <input type="hidden" name="goal_id" value="{{$assignedGoals->id}}">
                    <div class="table-content mb-4">

                        <table id='table' style="width:130%;" class="table align-middle mb-0 table-bordered  responsive" data-paging="true" data-paging-size="10" data-paging-limit="3" data-paging-container="#paging-ui-container" data-paging-count-format="{PF} to {PL}" data-sorting="true" data-filtering="false" data-empty="No Results" data-filter-container="#filter-form-container" data-editing-add-text="Add New">
                            <thead class="thead" id="tHead">
                                <tr>
                                    <th scope="col" data-name='dimension' data-filterable="false" data-visible="true">Dimension</th>
                                    <th scope="col" data-name='kpi' data-filterable="false" data-visible="true">KPI</th>
                                    <th scope="col" data-name='operational' data-filterable="false" data-visible="true">Operational Definition</th>
                                    <th scope="col" data-name='measure' data-filterable="false" data-visible="true">Measure</th>
                                    <th scope="col" data-name='frequency' data-filterable="false" data-visible="true">Frequency</th>
                                    <th scope="col" data-name='target' data-filterable="false" data-visible="true">Target</th>
                                    <th scope="col" data-name='stretchTarget' data-filterable="false" data-visible="true">Stretch Target</th>
                                    <th scope="col" data-name='source' data-filterable="false" data-visible="true">Source</th>
                                    <th scope="col" data-name='kpiWeightage' data-filterable="false" data-visible="true">KPI Weightage</th>
                                    <th scope="col" data-name='kpiSelfReview' data-filterable="false" data-visible="true">KPI - Achievement (Self Review)</th>
                                    <th scope="col" data-name='kpiSelfAchivement' data-filterable="false" data-visible="true">Self KPI Achievement %</th>
                                    <th scope="col" data-name='comments' data-filterable="false" data-visible="true">Comments</th>
                                    <th scope="col" data-name='kpiManagerReview' data-filterable="false" data-visible="true">KPI - Achievement (Manager Review)</th>
                                    <th scope="col" data-name='kpiManagerAchivement' data-filterable="false" data-visible="true">Manager KPI Achievement %</th>
                                    <th scope="col" data-name='kpiHrReview' data-filterable="false" data-visible="true">KPI - Achievement (HR Review)</th>
                                    <th scope="col" data-name='kpiHrAchivement' data-filterable="false" data-visible="true">HR KPI Achievement %
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tbody" id="tbody">
                                @foreach($kpiRows as $index => $kpiRow)
                                <tr>
                                    <th scope="row">
                                        <div>{{$kpiRow->dimension}}</div>
                                    </th>
                                    <td>
                                        <div>{{$kpiRow->kpi}}</div>
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
                                        <div>{{$kpiRow->manager_kpi_review}}</div>
                                    </td>
                                    <td>
                                        <div>{{$kpiRow->manager_kpi_percentage}}</div>
                                    </td>

                                    <td>
                                        @if(!$assignedGoals->is_hr_submitted && $assignedGoals->is_manager_submitted)
                                        <textarea name="hreview[{{$kpiRow->id}}]" id="" cols="20" rows="8"
                                            placeholder="type here">@if(isset( $kpiRow->hr_kpi_review)){{$kpiRow->hr_kpi_review}}@endif</textarea>
                                        @else
                                        <div>{{$kpiRow->hr_kpi_review}}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$assignedGoals->is_hr_submitted && $assignedGoals->is_manager_submitted)
                                        <!-- <textarea name="hrpercetage[{{$kpiRow->id}}]" id="" cols="20" rows="2" placeholder="type here">@if(isset( $kpiRow->hr_kpi_percentage)){{$kpiRow->hr_kpi_percentage}}@endif</textarea> -->
                                        <input type="number" class="inp-text" name="hrpercetage[{{$kpiRow->id}}]"
                                            placeholder="type here"
                                            value="@if(isset( $kpiRow->hr_kpi_percentage)){{$kpiRow->hr_kpi_percentage}}@endif">
                                        @else
                                        <div>{{$kpiRow->hr_kpi_percentage}}</div>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </form>
                <div class="buttons d-flex align-items-center justify-content-end ">
                    @if($assignedGoals->is_manager_submitted && !$assignedGoals->is_hr_submitted )
                    <button class="btn btn-primary" id="save_table">Save<i class="fa fa-save"></i></button>
                    &nbsp;&nbsp;
                    <button class="btn btn-primary" id="publish_table">Submit<i class="fa fa-save"></i></button>
                    @endif
                    @else
                    <h4>Goals Not Assigned</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($reviewCompleted)

    <div class="row mt-3">
        <div class="col-lg-12">
            <label class="form-label">
                Appraiser Feedback:
            </label>
            <div class="my-2">
                <textarea class="form-control" placeholder="" id="gen-info-description-input" name="performance"
                    rows="4"
                    readonly>@if(isset( $assignedGoals->appraiser_comment)){{$assignedGoals->appraiser_comment}}@endif</textarea>
            </div>
        </div>
    </div>
    @endif


    @if($reviewCompleted)

    <div class="card">
        <div class="card-header">
            <h5>Best People Rating Grid</h5>
        </div>
        <div class="card-body pb-2">
            <h6>Appraisee's Annual Score & Rating</h6>
            <div class="table-content mb-1">
                <table class="table align-middle mb-0 table-bordered  table-striped" id="table">

                    <thead class="thead" id="tHead">
                        <tr>
                            <th scope="col">Overall Annual Score</th>
                            <th scope="col">Less than 60</th>
                            <th scope="col">60-70</th>
                            <th scope="col">70-80</th>
                            <th scope="col">80-90</th>
                            <th scope="col">90-100</th>
                        </tr>
                    </thead>
                    <tbody class="tbody" id="tbody">
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
    @endif



    <!-- Modal -->
    <div class="modal fade flip" id="acceptPMS" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <h4>You are about to delete a order ?</h4>

                        <p class="text-muted fs-15 mb-4">Deleting your order will remove
                            all of
                            your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link link-success fw-medium text-decoration-none"
                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
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



</div>


@endsection
@section('script')
<!-- apexcharts -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/footable.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/css/footable.bootstrap.min.css') }}"></script>
<script type="text/javascript">
$('#upload_file').change(function() {
    if ($(this).is(':valid')) {
        $('#upload-goal').removeAttr('disabled');
    } else {
        $('#upload-goal').attr('disabled', true);
    }
});

ft = FooTable.init('#kpiTable', {});

$('#upload-goal').click(function() {
    var form_data = new FormData(document.getElementById("upload_form"));
    $.ajax({
        type: "POST",
        url: "{{route('upload-file-review')}}",
        dataType: "json",
        contentType: false,
        processData: false,
        data: form_data,
        success: function(data) {
            // $('.addition-content').html('');
            $.each(data[0], function(key, value) {
                $('#selfreview' + key).val(value[9]);
                $('#selfkpiachievement' + key).val(value[10]);
                $('#selfcomments' + key).val(value[11]);
            });
        }
    });
});
$('#save_table').click(function(e) {
    e.preventDefault();
    // console.log("save trigger");
    // console.log($('#employee_self_review').serialize());

    $.ajax({
        type: "POST",
        url: "{{url('vmt-pms-saveKPItableDraft_HR')}}",
        data: $('#employee_self_review').serialize(),
        success: function(data) {
            alert(data);
        }
    })
});


$('#publish_table').click(function(e) {
    e.preventDefault();
    console.log("save trigger");
    console.log($('#employee_self_review').serialize());

    $.ajax({
        type: "POST",
        url: "{{url('vmt-pmsappraisal-hrreview')}}",
        data: $('#employee_self_review').serialize(),
        success: function(data) {
            alert(data);
            window.location.reload();
        }
    })
});
</script>
@endsection