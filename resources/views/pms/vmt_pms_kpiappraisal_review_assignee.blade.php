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
                                        <div class="appraisal-box  btn bg-success text-white "><small>
                                            @if($isAllReviewersSubmittedOrNot) @if($ratingDetail){{$ratingDetail['rating']}}@else - @endif @else - @endif</small></div>

                                    </div>
                                    <div class="mb-3 input-wrap">
                                        <p>Corresponding ANNUAL PERFORMANCE Rating</p>
                                        <div class="appraisal-box  btn bg-success  text-white"><small>
                                            @if($isAllReviewersSubmittedOrNot) @if($ratingDetail){{$ratingDetail['performance']}}@else - @endif @else - @endif</small></div>
                                    </div>
                                    <div class="mb-3 input-wrap">
                                        <p>Ranking</p>
                                        <div class="appraisal-box   btn bg-success text-white "><small>
                                            @if($isAllReviewersSubmittedOrNot) @if($ratingDetail){{$ratingDetail['ranking']}}@else - @endif @else - @endif</small></div>
                                    </div>
                                    <div class=" input-wrap">
                                        <p>Action</p>
                                        <div class="appraisal-box btn bg-success text-white"><small>
                                            @if($isAllReviewersSubmittedOrNot) @if($ratingDetail){{$ratingDetail['action']}}@else - @endif @else - @endif</small></div>
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
                
                @if(isset($assignedGoals) && $assignedGoals->is_assignee_submitted != '1')
                <div class="row">
                    <div class="col-12 mt-3">
                        <form id="upload_form" enctype="multipart/form-data">
                            <div class="row pull-right mb-3">
                                @csrf
                                <input type="hidden" name="kpiFormAssignedId" value="{{ $kpiFormAssignedDetails->id }}">
                                <div class="col">
                                    <a href="{{route('download.excelsheet.pmsv2.review.form', [$assignedGoals->vmt_pms_kpiform_assigned_id,'1', $assignedGoals->year .'-'. strtoupper($assignedGoals->assignment_period)])}}" class="btn btn-orange pull-right"
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
                @endif
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
                                    <th scope="col" data-name='dimension' data-filterable="false" data-visible="{{$show['dimension']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['dimension']))
                                        {{ $headerColumnsDynamic['dimension'] }} @else Dimension @endif
                                    </th>
                                    <th scope="col" data-name='kpi' data-filterable="false" data-visible="{{$show['kpi']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['kpi']))
                                        {{ $headerColumnsDynamic['kpi'] }} @else KPI @endif
                                    </th>
                                    <th scope="col" data-name='operational' data-filterable="false" data-visible="{{$show['operational']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['operational']))
                                        {{ $headerColumnsDynamic['operational'] }} @else Operational Definition @endif
                                    </th>
                                    <th scope="col" data-name='measure' data-filterable="false" data-visible="{{$show['measure']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['measure']))
                                        {{ $headerColumnsDynamic['measure'] }} @else Measure @endif
                                    </th>
                                    <th scope="col" data-name='frequency' data-filterable="false" data-visible="{{$show['frequency']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['frequency']))
                                        {{ $headerColumnsDynamic['frequency'] }} @else Frequency @endif
                                    </th>
                                    <th scope="col" data-name='target' data-filterable="false" data-visible="{{$show['target']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['target']))
                                        {{ $headerColumnsDynamic['target'] }} @else Target @endif
                                    </th>
                                    <th scope="col" data-name='stretchTarget' data-filterable="false" data-visible="{{$show['stretchTarget']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['stretchTarget']))
                                        {{ $headerColumnsDynamic['stretchTarget'] }} @else Stretch Target @endif
                                    </th>
                                    <th scope="col" data-name='source' data-filterable="false" data-visible="{{$show['source']}}">@if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['source']))
                                        {{ $headerColumnsDynamic['source'] }} @else Source @endif
                                    </th>
                                    <th scope="col" data-name='kpiWeightage' data-filterable="false" data-visible="{{$show['kpiWeightage']}}">
                                        @if(count($headerColumnsDynamic) > 0 && isset($headerColumnsDynamic['kpiWeightage']))
                                        {{ $headerColumnsDynamic['kpiWeightage'] }}
                                        @else KPI Weightage @endif
                                    </th>
                                    <th scope="col" data-name='kpiSelfReview' data-filterable="false" data-visible="true">KPI - Achievement (Self Review)</th>
                                    <th scope="col" data-name='kpiSelfAchivement' data-filterable="false" data-visible="true">Self KPI Achievement %</th>
                                    <th scope="col" data-name='comments' data-filterable="false" data-visible="true">Comments</th>
                                    @if($isAllReviewersSubmittedOrNot)
                                    <?php $i = 1; ?>
                                    @foreach($reviewersId as $reviewerCheck)
                                        <th scope="col" data-name='kpiManagerReview' data-filterable="false" data-visible= true>KPI - Achievement (L{{$i}} Manager Review)</th>
                                        <th scope="col" data-name='kpiManagerAchivement' data-filterable="false" data-visible="true">L{{$i}} Manager KPI Achievement %</th>
                                        <?php $i++; ?>
                                    @endforeach
                                    @endif
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
                                        @if($assignedGoals->is_assignee_accepted == '1')
                                            @if($assignedGoals->is_assignee_submitted == 0)
                                            <div>
                                                <textarea style="width: 100%;" name="assignee_kpi_review[{{$kpiRow->id}}]" data-index="{{$index}}" data-targetval="{{$kpiRow->target}}" data-kpiweightageval="{{$kpiRow->kpi_weightage}}" id="assignee_kpi_review{{$index}}" cols="40" rows="8" @if(is_numeric($kpiRow->target))  onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46' class="calculateSelfKPIPercentage" placeholder="type numbers only" @else placeholder="type here" @endif>@if(isset(json_decode($assignedGoals->assignee_kpi_review,true)[$kpiRow->id])) {{json_decode($assignedGoals->assignee_kpi_review,true)[$kpiRow->id]}} @endif</textarea>
                                            </div>
                                            @else
                                            <div>
                                                {{json_decode($assignedGoals->assignee_kpi_review,true)[$kpiRow->id]}}
                                            </div>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($assignedGoals->is_assignee_accepted == '1')
                                            @if($assignedGoals->is_assignee_submitted == 0)
                                            <div>
                                                <textarea style="width: 100%;" class="inp-text" id="assignee_kpi_percentage{{$index}}" name="assignee_kpi_percentage[{{$kpiRow->id}}]" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46' @if(is_numeric($kpiRow->target)) readonly placeholder="Calculate based on Target and Self Review" @else placeholder="type number here" @endif>@if(isset( json_decode($assignedGoals->assignee_kpi_percentage,true)[$kpiRow->id])){{json_decode($assignedGoals->assignee_kpi_percentage,true)[$kpiRow->id]}}@endif</textarea>

                                            </div>
                                            @else
                                            <div> {{json_decode($assignedGoals->assignee_kpi_percentage,true)[$kpiRow->id]}}</div>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($assignedGoals->is_assignee_accepted == '1')
                                            @if($assignedGoals->is_assignee_submitted == 0)
                                            <div>
                                                <textarea style="width: 100%;" name="assignee_kpi_comments[{{$kpiRow->id}}]" id="assignee_kpi_comments{{$index}}" cols="40" rows="8" placeholder="type here">@if(isset(json_decode($assignedGoals->assignee_kpi_comments,true)[$kpiRow->id])) {{json_decode($assignedGoals->assignee_kpi_comments,true)[$kpiRow->id]}} @endif</textarea>
                                            </div>
                                            @else
                                            <div>{{json_decode($assignedGoals->assignee_kpi_comments,true)[$kpiRow->id]}}</div>
                                            @endif
                                        @endif
                                    </td>
                                    @if($isAllReviewersSubmittedOrNot)
                                        <?php
                                            $i = 1;
                                            $decodedKpiReviewerReview = json_decode($assignedGoals->reviewer_kpi_review,true);
                                            $decodedKpiReviewerPerc = json_decode($assignedGoals->reviewer_kpi_percentage,true);
                                        ?>
                                        @foreach($reviewersId as $reviewersReview)
                                        <td>
                                            <div>@if(isset( $decodedKpiReviewerReview[$reviewersReview])){{$decodedKpiReviewerReview[$reviewersReview][$kpiRow->id]}}@endif</div>
                                        </td>
                                        <td>
                                            <div>@if(isset( $decodedKpiReviewerPerc[$reviewersReview])){{$decodedKpiReviewerPerc[$reviewersReview][$kpiRow->id]}}@endif</div>
                                        </td>
                                        @endforeach
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </form>
                @if(isset($assignedGoals) && $assignedGoals->is_assignee_submitted != '1')
                    @if($assignedGoals->is_assignee_accepted == '1')
                    <div class="buttons d-flex align-items-center justify-content-end ">
                        <button class="btn btn-primary" id="save_table">
                        @if($assignedGoals->is_assignee_submitted == '') Save @else Edit @endif </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" id="publish_table" @if($assignedGoals->is_assignee_submitted == '') disabled @endif>Submit</button>
                    </div>
                    @elseif($assignedGoals->is_assignee_accepted == null)
                    <div class="buttons d-flex align-items-center justify-content-end ">
                        <button class="btn btn-primary" id="accept_review">
                        Accept </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" id="reject_review">Reject</button>
                    </div>
                    @elseif($assignedGoals->is_assignee_accepted == '0')
                    <h6>You have Already Rejected this review.</h6>
                    @endif
                @endif
                @else
                <h4>Goals Not Assigned</h4>
                @endif
            </div>
        </div>
    </div>

    <!-- Rating grid after submitted review by All Reviewers -->
    @if($isAllReviewersSubmittedOrNot && count($pmsRatingDetails) > 0)
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
                            @foreach($pmsRatingDetails as $ratingDetails)
                                <th scope="col">{{ $ratingDetails->score_range }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="tbody" id="tbody">
                        <tr>

                            <td class="">
                                Corresponding ANNUAL PERFORMANCE Rating

                            </td>
                            @foreach($pmsRatingDetails as $ratingDetails)
                                <td class="">{{ $ratingDetails->performance_rating }}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <td class="">
                                Ranking
                            </td>
                            @foreach($pmsRatingDetails as $ratingDetails)
                                <td class="">{{ $ratingDetails->ranking }}</td>
                            @endforeach
                        </tr>
                        <tr>

                            <td class="">
                                Action
                            </td>
                            @foreach($pmsRatingDetails as $ratingDetails)
                                <td class="">{{ $ratingDetails->action }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Rejection Modal Starts -->
    <div class="modal fade" id="rejectionCommentModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
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
                        <textarea name="reject_comment" id="reject_comment" class="form-control mb-3"></textarea>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-primary" id="rejection_submit" disabled>Save</button>
                            <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rejection Modal Ends -->
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

    /*
    * for calculating Self KPI Achievement % If Target is Number
    * formula :-
    * Self KPI Achievement %' = (KPI - Achievement Self-Review (this) / Target (targetVal)) * KPI Weightage (kpiWeightageVal);	
    */
    $(document).on('keyup','.calculateSelfKPIPercentage',function(){
        getCalculationResult($(this));
    })

    function getCalculationResult(idValue){
        var kpiAchievementSelfReview = idValue.val();
        var index = idValue.data("index");
        var targetVal = idValue.data("targetval");
        var kpiWeightageVal = idValue.data("kpiweightageval");
        kpiWeightageVal = kpiWeightageVal.replace('%', '');
        kpiWeightageVal = kpiWeightageVal/100;

        if(kpiAchievementSelfReview != ''){
            var result = (kpiAchievementSelfReview/targetVal) * kpiWeightageVal;
            $('#assignee_kpi_percentage'+index).val(result);
        }else{
            $('#assignee_kpi_percentage'+index).val('');
        }
    }

    // Upload file enable upload button
    $('#upload_file').change(function() {
        if ($(this).is(':valid')) {
            $('#upload-goal').removeAttr('disabled');
        } else {
            $('#upload-goal').attr('disabled', true);
        }
    });

    ft = FooTable.init('#table_review');

    // Upload file using ajax
    $('#upload-goal').click(function() {
        var validationCheck = false;
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
                if(data.status == true){
                    $.each(data.result, function(key, value) {
                        var countIndex = data.countStart;
                        var targetVal = $('#assignee_kpi_review' + key).data("targetval");
                        if($.isNumeric( targetVal ) == true){
                            if($.isNumeric( value[countIndex] ) == true){
                                $('#assignee_kpi_review' + key).val(value[countIndex]);

                                getCalculationResult($('#assignee_kpi_review' + key));  
                            }else{
                                $('#assignee_kpi_review' + key).val('');
                                $('#assignee_kpi_percentage'+key).val('');
                                validationCheck = true;
                            }
                        }else{
                            $('#assignee_kpi_review' + key).val(value[countIndex]);
                            $('#assignee_kpi_percentage' + key).val(value[countIndex+1]);
                        }
                        $('#assignee_kpi_comments' + key).val(value[countIndex+2]);
                          
                        
                    });
                    if(validationCheck == true){
                        swal("Wrong!", "Only Numbers are Allowed in KPI Achievement (Self Review) when Target is Number", "error");
                    }
                }else{
                    swal("Error!", data.message, "error");
                }
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
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{ route('saveAssigneeReviews') }}",
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
            url: "{{ route('saveAssigneeReviews') }}",
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
            },
            error: function(error) {
                $('.loader').hide();
            }
        });
    });

    // Accept Review
    $('#accept_review').click(function(e) {
        e.preventDefault();
        swal({
        title: 'Are you sure?',
        text: 'You want to Accept!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                var assigneeGoalId = "{{ $assignedGoals->id }}";
                var isApproveOrReject = '1';
                $('.loader').show();
                $.ajax({
                    type: "POST",
                    url: "{{ route('acceptRejectAssigneeReview') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        assigneeGoalId: assigneeGoalId,
                        isApproveOrReject: isApproveOrReject,

                    },
                    success: function(data) {
                        if(data.status == true){
                            swal("Success!", data.message, "success").then(function(){
                                location.reload();
                            });
                        }else{
                            swal("Error!", data.message, "error");
                        }
                        $('.loader').hide();
                    },
                    error: function(error) {
                        $('.loader').hide();
                    }
                });
            }
        });
    });

    // On click reject Rejection Comments modal should show 
    $('#reject_review').click(function(e) {
        $('#modalHeader').html("Rejected");
        $('#modalNot').html(
            "Are you sure you want to reject this Kpi. If yes, please entered the reason in the below command box:"
        );
        $('#rejectionCommentModal').show('modal');
    });

    // close Rejection Comments modal 
    $('body').on('click', '.close-modal', function() {
        $('#rejectionCommentModal').hide();
        $('#rejectionCommentModal').addClass('fade');
    });

    // close Rejection Comments modal 
    $('body').on("keyup", '#reject_comment', function() {
        if ($(this).val() == '') {
            $('#rejection_submit').attr('disabled', true);
        } else {
            $('#rejection_submit').removeAttr('disabled');
        }
    });
    
    // Accept Review
    $('#rejection_submit').click(function(e) {
        e.preventDefault();
        swal({
        title: 'Are you sure?',
        text: 'You want to Reject!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                var assigneeGoalId = "{{ $assignedGoals->id }}";
                var isApproveOrReject = '0';
                var reject_comment = $('#reject_comment').val();
                $('.loader').show();
                $.ajax({
                    type: "POST",
                    url: "{{ route('acceptRejectAssigneeReview') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        assigneeGoalId: assigneeGoalId,
                        isApproveOrReject: isApproveOrReject,
                        reject_comment: reject_comment,
                    },
                    success: function(data) {
                        if(data.status == true){
                            swal("Success!", data.message, "success").then(function(){
                                location.reload();
                            });
                        }else{
                            swal("Error!", data.message, "error");
                        }
                        $('.loader').hide();
                    },
                    error: function(error) {
                        $('.loader').hide();
                    }
                });
            }
        });
    });
</script>
@endsection
