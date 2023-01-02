@extends('layouts.master')
@section('css')
@endsection

@section('content')
    <div class="reimbursement-wrapper mt-30">
        <div class="card  left-line mb-3">
            <div class="card-body px-2 pb-1 pt-2">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                            <li class="nav-item text-muted  me-5" role="presentation">
                                <a class="nav-link active  pb-2" data-bs-toggle="tab" href="#pending_reimbursment"
                                    aria-selected="true" role="tab">
                                    Yet To Approve
                                </a>
                            </li>
                            <li class="nav-item text-muted" role="presentation">
                                <a class="nav-link  pb-2" data-bs-toggle="tab" href="#approved_reimbursment"
                                    aria-selected="true" role="tab">
                                    Completed
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane  show fade active " id="pending_reimbursment" role="tabpanel" aria-labelledby="">
                        <div id="pending_reimbursement_approvals" class="noCustomize_gridjs"></div>
                    </div>
                    <div class="tab-pane fade" id="approved_reimbursment" role="tabpanel" aria-labelledby="">
                        <div id="approved_reimbursement_approvals" class="noCustomize_gridjs"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>

<script>

        $(document).ready(function(){

            $("#btn_submit").on('click', function(){

                $.ajax({
                    url: "{{ url('showReimbursementApprovalPage') }}",
                    type : "POST",
                    dataType : 'json',
                    data :$("").serialize(),

                })
            });
        });

        if (document.getElementById("pending_reimbursement_approvals")) {
            gridTable_reimbursement_approvals = new gridjs.Grid({
                columns: [
                    {
                        id: 'name',
                        name: 'Employee Name',
                    },
                    {
                        id:'user_code',
                        name:'Employee Code',
                    },
                    {
                        id:'date',
                        name:'Date',
                    },
                    {
                       id:'from',
                       name:'From',
                       formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[0];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'to',
                        name:'To',
                        formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[1];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'vehicle_type',
                        name:'Vehicle Type',
                        formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[2];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'kilometer',
                        name:'Kilometers',
                        formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[3];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    // {
                    //     id:'user_comments',
                    //     name:'Employee Comments',

                    // },
                    {
                        id: 'actions',
                        name: 'Action',
                        formatter: function formatter(cell) {
                            console.log("Action : "+cell.id);
                            var htmlcontent = "";

                                htmlcontent =
                                    '<button type="button" value="Approve" data-reimbursement_id="' + cell.id
                                    +'" data-status="Approve" class="status me-2 btn btn-success py-1 process-btn"><i class="fa me-1 fa-check-circle" aria-hidden="true"></i>Approve</button>';


                                htmlcontent = htmlcontent +
                                '<button type="button" value="Reject" data-reimbursement_id="' + cell.id
                                +'" data-status="Reject" class="status btn me-2 btn-danger py-1 process-btn"><i class="fa fa-times-circle me-1"></i>Reject</button>';
                                return gridjs.html(htmlcontent);
                        }
                    },
                ],


                pagination: {
                    limit: 10
                },
                sort: true,
                search: true,
                server: {
                    url: '{{ route('fetchPendingReimbursements') }}',
                    then: data => data.map(
                        approvals_reimbursement => [
                            approvals_reimbursement.name,
                            //approvals_reimbursement.user_id,
                           // approvals_reimbursement.reimbursement_type_id,
                            approvals_reimbursement.user_code,
                            approvals_reimbursement.reimbursement_date,
                            approvals_reimbursement,//from
                            approvals_reimbursement,//to
                            approvals_reimbursement,//vehicle type
                            approvals_reimbursement,//KMs
                            //approvals_reimbursement.user_comments,

                            // approvals_reimbursement.reviewer_id,
                            // approvals_reimbursement.user_comments,
                            //approvals_reimbursement.reviewed_date,
                            //approvals_reimbursement.user_data,
                           // approvals_reimbursement.attr_reviewer_accepted_status,

                            approvals_reimbursement,


                        ]
                    )
                }
            }).render(document.getElementById("pending_reimbursement_approvals"));
        }

        $(document).ready(function(){

            $(document).on('click','.process-btn', function(e)
            {
                let status_type =  $(this).attr('data-status');
                let message = 'Do you want to '+status_type+'?';
                let reimbursement_id = $(this).attr('data-reimbursement_id');

                e.preventDefault();

                if(status_type == "Approve")
                {
                    Swal.fire({
                        title: 'Info',
                        text: message,
                        icon: 'warning',
                        showDenyButton: true,
                        confirmButtonText: 'Yes',
                        denyButtonText: 'No',

                    }).then(function(value) {
                        console.log("Approving reimbursement : "+value);
                        ajax_processApproveRejectRequest(value, reimbursement_id, status_type,'---');
                    });
                }
                else
                if(status_type == "Reject")
                {
                    (async() => {
                        let swal_response;
                        swal_response = await Swal.fire({
                            title: message,
                            icon: 'warning',
                            showDenyButton: true,
                            confirmButtonText: 'Yes',
                            denyButtonText: 'No',

                            input: 'textarea',
                            inputPlaceholder: 'Type your rejection comments here...',
                            inputAttributes: {
                                'aria-label': 'Type your rejection comments here...e'
                            },

                        });

                        if(swal_response.isConfirmed == true){
                            console.log("Rejecting reimbursement : "+JSON.stringify(swal_response));

                            //creating fake obj to reuse existing SWAL 2 code since we are sending using async func

                            if(swal_response.value)
                                ajax_processApproveRejectRequest(swal_response, reimbursement_id, status_type,swal_response.value);
                            else
                                ajax_processApproveRejectRequest(swal_response, reimbursement_id, status_type,'---');

                        }
                    })();
                }
            });
        });


        function ajax_processApproveRejectRequest(value, reimbursement_id, status_type, reviewer_comments){


            if(value.isConfirmed == true)
            {
                console.log("Sending AJAX request");

                $.ajax({
                    url: "{{ route('approveRejectReimbursements') }}",
                    type : "POST",
                    data :{
                        reimbursement_id : reimbursement_id,
                        reviewer_comments : reviewer_comments, //TODO : Need to get from pop-up UI
                        status : status_type,
                        _token: '{{ csrf_token() }}'

                    },
                    success: function(data) {
                        console.log(data);

                        //location.reload();
                    }
                });
            }

        }


        if (document.getElementById("approved_reimbursement_approvals")) {
            gridTable_reimbursement_approvals = new gridjs.Grid({
                columns: [
                    {
                        id: 'name',
                        name: 'Employee Name',
                    },
                    {
                        id:'user_code',
                        name:'Employee Code',
                    },
                    {
                        id:'date',
                        name:'Date',
                    },
                    {
                       id:'from',
                       name:'From',
                       formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[0];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'to',
                        name:'To',
                        formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[1];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'vehicle_type',
                        name:'Vehicle Type',
                        formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[2];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'kilometer',
                        name:'Kilometers',
                        formatter: function formatter(cell) {
                            let array_content = cell.user_data.split(',')[3];

                            if(array_content)
                                return gridjs.html(array_content);
                            else
                                return gridjs.html('-');

                        }

                    },
                    {
                        id:'status',
                        name:'Status',

                    },
                    {
                        id:'reviewer_name',
                        name:'Reviewer Name',

                    },
                    {
                        id:'reviewer_comments',
                        name:'Reviewer Comments',

                    },
                    // {
                    //     id: 'actions',
                    //     name: 'Action',
                    //     formatter: function formatter(cell) {
                    //         console.log("Action : "+cell.id);
                    //         var htmlcontent = "";

                    //             htmlcontent =
                    //                 '<button type="button" value="Approve" data-reimbursement_id="' + cell.id
                    //                 +'" data-status="Approve" class="status me-2 btn btn-success py-1 process-btn"><i class="fa me-1 fa-check-circle" aria-hidden="true"></i>Approve</button>';


                    //             htmlcontent = htmlcontent +
                    //             '<button type="button" value="Reject" data-reimbursement_id="' + cell.id
                    //             +'" data-status="Reject" class="status btn me-2 btn-danger py-1 process-btn"><i class="fa fa-times-circle me-1"></i>Reject</button>';
                    //             return gridjs.html(htmlcontent);
                    //     }
                    // },
                ],


                pagination: {
                    limit: 10
                },
                sort: true,
                search: true,
                server: {
                    url: '{{ route('fetchApprovedRejectedReimbursements') }}',
                    then: data => data.map(
                        completed_reimbursement => [
                            completed_reimbursement.employee_name,
                            completed_reimbursement.employee_code,
                            completed_reimbursement.reimbursement_date,
                            completed_reimbursement,//from
                            completed_reimbursement,//to
                            completed_reimbursement,//vehicle type
                            completed_reimbursement,//KMs
                            //completed_reimbursement.user_comments,
                            completed_reimbursement.status,//status

                            completed_reimbursement.reviewer_name,
                            completed_reimbursement.reviewer_comments,
                            // completed_reimbursement.user_comments,
                            //completed_reimbursement.reviewed_date,
                            //completed_reimbursement.user_data,
                           // completed_reimbursement.attr_reviewer_accepted_status,

                            //completed_reimbursement,


                        ]
                    )
                }
            }).render(document.getElementById("approved_reimbursement_approvals"));
        }
</script>
@endsection
