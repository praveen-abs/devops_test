@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

<!-- for styling -->
<link href="{{ URL::asset('assets/css/appraisal_review.css') }}" rel="stylesheet">
<style>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('{{ URL::asset("assets/images/loader.gif") }}') 50% 50% no-repeat rgb(249, 249, 249);
        opacity: 0.4;
    }
</style>
@endsection
@section('content')
<div class="loader" style="display:none;"></div>


<div class="employee-review-wrapper">
    <div class="card  profile-box card-top-border ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                            <div class="card  appraisal-left-content">
                                <div class="card-body">
                                    @if($empSelected)
                                    <div class="appraisal-info left-content">
                                        <ul class="personal-info">
                                            <li>
                                                <p class="title h5">Employee Name</p>
                                                <p class="text">{{$assignedUserDetails->name}}</p>
                                            </li>
                                            @if(isset($assignedUserDetails->getEmployeeDetails))
                                            <li>
                                                <p class="title h5"> Employee ID</p>
                                                <p class="text">{{$assignedUserDetails->getEmployeeDetails->emp_no}}</p>
                                            </li>
                                            @endif
                                            @if(isset($assignedUserDetails->getEmployeeOfficeDetails))
                                            <li>
                                                <p class="title h5">Job Title/Designation</p>
                                                <p class="text">{{$assignedUserDetails->getEmployeeOfficeDetails->designation}}</p>
                                            </li>
                                            @endif
                                            @if(isset($assignedUserDetails->getEmployeeOfficeDetails))
                                            <li>
                                                <p class="title h5">Business Unit/Process/Function</p>
                                                <p class="text">{{$assignedUserDetails->getEmployeeOfficeDetails->department}}</p>
                                            </li>
                                            @endif
                                            <li>
                                                <p class="title h5">Reporting Manager</p>
                                                <p class="text">{{$assignersName}}</p>
                                            </li>
                                            <li class="mb-0">
                                                <p class="title h5">Review Period</p>
                                                <p class="text">
                                                    {{  $assignedGoals->year }} - {{ strtoupper($assignedGoals->assignment_period) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
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
                                        <div class="appraisal-box btn bg-success text-white">
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
        <!-- appraisal table -->
        <div class="card">
            <div class="card-body pb-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <form id="upload_form" enctype="multipart/form-data">
                            <div class="row pull-right mb-3">
                                @csrf
                                <div class="col">
                                    <a href="{{route('download.excelsheet.pmsv2.review.form', [$assignedGoals->vmt_pms_kpiform_assigned_id,$assignedGoals->assignee_id])}}" class="btn btn-orange pull-right"
                                    id="download-excel">Download</a>
                                </div>
                                <div class="col-auto p-0">
                                    <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control" required>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-orange pull-right" id="upload-goal" disabled>Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($kpiRows) > 0)
                <form id="employee_self_review" method="POST">
                    @csrf
                    <input type="hidden" value="" name="formSubmitType" id="formSubmitType">
                    <input type="hidden" name="goal_id" value="{{$assignedGoals->id}}">
                    <input type="hidden" name="kpiReviewId" value="{{$assignedGoals->id}}">
                    <div class="table-content mb-4">
                        <table id="table_review"  class="table align-middle mb-0 table-bordered  responsive" data-paging="true" data-paging-size="10" data-paging-limit="3" data-paging-container="#paging-ui-container" data-paging-count-format="{PF} to {PL}" data-sorting="true" data-filtering="false" data-empty="No Results" data-filter-container="#filter-form-container" data-editing-add-text="Add New">
                            <thead class="thead" id="tHead">
                                <tr>
                                    <th scope="col" data-name='dimension' data-filterable="false" data-visible="{{$show['dimension']}}">@if($config && $config->header)
                                        {{$config->header['dimension']}} @else Dimension @endif
                                    </th>
                                    <th scope="col" data-name='kpi' data-filterable="false" data-visible="{{$show['kpi']}}">@if($config && $config->header)
                                        {{$config->header['kpi']}} @else KPI @endif
                                    </th>
                                    <th scope="col" data-name='operational' data-filterable="false" data-visible="{{$show['operational']}}">@if($config && $config->header)
                                        {{$config->header['operational']}} @else Operational Definition @endif
                                    </th>
                                    <th scope="col" data-name='measure' data-filterable="false" data-visible="{{$show['measure']}}">@if($config && $config->header)
                                        {{$config->header['measure']}} @else Measure @endif
                                    </th>
                                    <th scope="col" data-name='frequency' data-filterable="false" data-visible="{{$show['frequency']}}">@if($config && $config->header)
                                        {{$config->header['frequency']}} @else Frequency @endif
                                    </th>
                                    <th scope="col" data-name='target' data-filterable="false" data-visible="{{$show['target']}}">@if($config && $config->header)
                                        {{$config->header['target']}} @else Target @endif
                                    </th>
                                    <th scope="col" data-name='stretchTarget' data-filterable="false" data-visible="{{$show['stretchTarget']}}">@if($config && $config->header)
                                        {{$config->header['stretchTarget']}} @else Stretch Target @endif
                                    </th>
                                    <th scope="col" data-name='source' data-filterable="false" data-visible="{{$show['source']}}">@if($config && $config->header)
                                        {{$config->header['source']}} @else Source @endif
                                    </th>
                                    <th scope="col" data-name='kpiWeightage' data-filterable="false" data-visible="{{$show['kpiWeightage']}}">@if($config && $config->header)
                                        {{$config->header['kpiWeightage']}} @else KPI Weightage @endif
                                    </th>
                                    <th scope="col" data-name='kpiSelfReview' data-filterable="false" data-visible="true">KPI - Achievement (Self Review)</th>
                                    <th scope="col" data-name='kpiSelfAchivement' data-filterable="false" data-visible="true">Self KPI Achievement %</th>
                                    <th scope="col" data-name='comments' data-filterable="false" data-visible="true">Comments</th>

                                    <?php $i=1;
                                    $j=1;
                                    ?>
                                    @foreach($reviewersId as $reviewersReview)
                                        <th scope="col" data-name='kpiManagerReview' data-filterable="false" data-visible= true>KPI - Achievement (Manager Review) {{$i}}</th>
                                        <th scope="col" data-name='kpiManagerAchivement' data-filterable="false" data-visible="true">Manager KPI Achievement % - {{$i}}</th>
                                        <?php $i++; ?>
                                    @endforeach
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
                                        @if(isset($assignedGoals->is_assignee_submitted) && $assignedGoals->is_assignee_submitted == '1')
                                        <div>
                                            @if(isset($assignedGoals->assignee_kpi_review))
                                                {{json_decode($assignedGoals->assignee_kpi_review,true)[$kpiRow->id]}}
                                            @endif
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($assignedGoals->is_assignee_submitted) && $assignedGoals->is_assignee_submitted == '1')
                                        <div>
                                        @if(isset($assignedGoals->assignee_kpi_percentage))
                                            {{json_decode($assignedGoals->assignee_kpi_percentage,true)[$kpiRow->id]}}
                                        @endif
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($assignedGoals->is_assignee_submitted) && $assignedGoals->is_assignee_submitted == '1')
                                        <div>
                                        @if(isset($assignedGoals->assignee_kpi_comments))
                                            {{json_decode($assignedGoals->assignee_kpi_comments,true)[$kpiRow->id]}}
                                        @endif
                                        </div>
                                        @endif
                                    </td>
                                        <?php
                                        $decodedKpiReview = json_decode($assignedGoals->reviewer_kpi_review,true);
                                        $decodedKpiReviewSubmittedStatus = json_decode($assignedGoals->is_reviewer_submitted,true);
                                        ?>
                                        @foreach($reviewersId as $reviewersReview)
                                        <td>
                                            @if(isset($assignedGoals->is_assignee_submitted) && $assignedGoals->is_assignee_submitted == '1' && $reviewersReview == Auth::id() && ($decodedKpiReviewSubmittedStatus[$reviewersReview] == '' || $decodedKpiReviewSubmittedStatus[$reviewersReview] == '0'))
                                            <textarea name="reviewer_kpi_review[{{$reviewersReview}}][{{$kpiRow->id}}]" id="" cols="20" rows="8" placeholder="type here">@if(isset( $decodedKpiReview[$reviewersReview])){{$decodedKpiReview[$reviewersReview][$kpiRow->id]}}@endif</textarea>
                                            @else
                                            <div>@if(isset( $decodedKpiReview[$reviewersReview])){{$decodedKpiReview[$reviewersReview][$kpiRow->id]}}@endif</div>
                                            @endif

                                        </td>
                                        @endforeach
                                    <?php
                                        $decodedKpiReviewPerc = json_decode($assignedGoals->reviewer_kpi_percentage,true);
                                        ?>
                                        @foreach($reviewersId as $reviewersReview)
                                    <td>
                                            @if($assignedGoals->is_assignee_submitted == '1' && $reviewersReview == Auth::id() && ($decodedKpiReviewSubmittedStatus[$reviewersReview] == '' || $decodedKpiReviewSubmittedStatus[$reviewersReview] == '0'))
                                            <input type="number" class="inp-text" name="reviewer_kpi_percentage[{{$reviewersReview}}][{{$kpiRow->id}}]" placeholder="type here" value="@if(isset( $decodedKpiReviewPerc[$reviewersReview])){{$decodedKpiReviewPerc[$reviewersReview][$kpiRow->id]}}@endif">

                                            @else
                                            <div>@if(isset( $decodedKpiReviewPerc[$reviewersReview])){{$decodedKpiReviewPerc[$reviewersReview][$kpiRow->id]}}@endif</div>
                                            @endif


                                        </td>
                                        @endforeach
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </form>
                @if($assignedGoals->is_assignee_submitted == '1')
                    @if($decodedKpiReviewSubmittedStatus[Auth::id()] != '1')
                    <div class="buttons d-flex align-items-center justify-content-end ">
                        <button class="btn btn-primary" id="save_table" >
                        @if($decodedKpiReviewSubmittedStatus[Auth::id()] == '') Save @else Edit @endif <i class="fa fa-save"></i></button>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" id="publish_table" @if($decodedKpiReviewSubmittedStatus[Auth::id()] == '') disabled @endif>Submit<i class="fa fa-save"></i></button>
                    </div>
                    @endif
                @else
                <h6>Employee has not yet submitted this review.</h6>
                @endif
                @else
                <h4>Goals Not Assigned</h4>
                @endif
            </div>
        </div>
    </div>

    @if($reviewCompleted && $assignedGoals->is_hr_submitted)
    <div class="row mt-3">
        <div class="col-lg-12">
            <label class="form-label">
                Appraiser Feedback:
            </label>
            <div class="my-2">
                <textarea class="form-control" placeholder="" id="gen-info-description-input" name="performance" rows="4" readonly>@if(isset( $assignedGoals->appraiser_comment)){{$assignedGoals->appraiser_comment}}@endif</textarea>
            </div>
        </div>
    </div>
    @endif

    @if($isAllReviewersSubmittedOrNot)
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


    <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="modalHeader">Rejected
                        </h5>
                        <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mt-4">
                        <h4 class="mb-3" id="modalNot"></h4>
                        <textarea name="reject_content" id="reject_content" class="form-control mb-3"></textarea>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-primary" id="reject_save" disabled>Save</button>
                            <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade flip" id="acceptPMS" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <h4>You are about to delete a order ?</h4>

                        <p class="text-muted fs-15 mb-4">Deleting your order will remove
                            all of
                            your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
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
<!--Sweet alert JS-->
<script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>

<!-- apexcharts -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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

    ft = FooTable.init('#table_review');

    $('#upload-goal').click(function() {
        var form_data = new FormData(document.getElementById("upload_form"));
        $('.loader').show();
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
                $('.loader').hide();
            },
            error: function(error) {
                $('.loader').hide();
            }
        });
    });


    // Save/Draft Assignee Reviews
    $('#save_table').click(function(e) {
        e.preventDefault();
        $('#formSubmitType').val(0);
        // console.log("save trigger");
        // console.log($('#employee_self_review').serialize());
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{ route('saveReviewerReviews') }}",
            data: $('#employee_self_review').serialize(),
            success: function(data) {
                if(data.status == true){
                    swal("Success!", data.message, "success").then(function(){
                        location.reload();
                    });
                }else{
                    swal("Error!", data.message, "error");
                }
                $('.loader').hide();
                // window.location.reload();
            },
            error: function(error) {
                $('.loader').hide();
            }
        });
    });

    // Publish/Confirm Assignee Reviews
    $('#publish_table').click(function(e) {
        e.preventDefault();
        $('#formSubmitType').val(1);
        console.log("save trigger");
        console.log($('#employee_self_review').serialize());
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{ route('saveReviewerReviews') }}",
            data: $('#employee_self_review').serialize(),
            success: function(data) {
                if(data.status == true){
                    swal("Success!", data.message, "success").then(function(){
                        location.reload();
                    });
                }else{
                    swal("Error!", data.message, "error");
                }
                $('.loader').hide();
                // window.location.reload();
            },
            error: function(error) {
                $('.loader').hide();
            }
        });
    });
</script>
@endsection
