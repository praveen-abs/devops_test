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
                                <a class="nav-link active  pb-2" data-bs-toggle="tab" href="#not_active_reimbursment"
                                    aria-selected="true" role="tab">
                                    Yet To Approve
                                </a>
                            </li>
                            <li class="nav-item text-muted" role="presentation">
                                <a class="nav-link  pb-2" data-bs-toggle="tab" href="#active_reimbursment"
                                    aria-selected="true" role="tab">
                                    Approved
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
                    <div class="tab-pane  show fade active " id="not_active_reimbursment" role="tabpanel" aria-labelledby="">
                        <div id="notActive_reimbursment-table" class="noCustomize_gridjs"></div>
                    </div>
                    <div class="tab-pane fade" id="active_reimbursment" role="tabpanel" aria-labelledby="">
                        <div id="active_reimbursment-table" class="noCustomize_gridjs"></div>
                    </div>
                    <div class="table-responsive">
                        <div id="table_reimbursement_approvals" class="custom_gridJs"></div>
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

        if (document.getElementById("table_reimbursement_approvals")) {
            gridTable_reimbursement_approvals = new gridjs.Grid({
                columns: [
                    {
                        id: 'name',
                        name: 'Employee Name',
                    },
                     {
                        id:'id',
                        name:'Employee Code',
                    },
                    {
                       id:'date',
                       name:'From',

                    },

                    {
                        id:'user_data',
                        name:'To',
                    },
                    {
                        id:'reviewer_id',
                        name:'Kilometer'
                    },
                    {
                        id:'user_comments',
                        name:'Comments',

                    },
                    
                    // {
                    //     id:'reviewed_date',
                    //     name:'Reviewed Date',
                    // },
                    // {
                    //     id: 'status',
                    //     name: 'Status',
                    //     formatter: function formatter(cell) {
                    //         if(cell == -1)
                    //             return "Pending";
                    //         else
                    //         if(cell == 0)
                    //             return "Rejected";
                    //         else
                    //         if(cell == 1)
                    //             return "Approved";
                    //     }
                    // },
                    // {
                    //     id:'reviewer_comments',
                    //     name:'Reviewer Comments',
                    // },
                    {
                        id: 'actions',
                        name: 'Action',
                        formatter: function formatter(cell) {
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
                            approvals_reimbursement.id,
                            approvals_reimbursement.date,
                            approvals_reimbursement.user_data,
                            approvals_reimbursement.reviewer_id,
                            approvals_reimbursement.user_comments,
                            approvals_reimbursement.reviewed_date,
                            approvals_reimbursement.attr_reviewer_accepted_status,
                            approvals_reimbursement.reviewer_comments,
                            approvals_reimbursement,
                             

                        ]
                    )
                }
            }).render(document.getElementById("table_reimbursement_approvals"));
        }

        $(document).ready(function(){

            $(document).on('click','.process-btn', function(e)
            {
                let status_type =  $(this).attr('data-status');
                let message = 'Do you want to '+status_type+'?';
                let reimbursement_id = $(this).attr('data-reimbursement_id');

                e.preventDefault();

                Swal.fire({
                    title: 'Info',
                    text: message,
                    icon: 'warning',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                }).then(function(value) {
                    console.log(value);

                    if(value.isConfirmed == true)
                    {
                        console.log("Sending AJAX request");

                        $.ajax({
                            url: "{{ route('showReimbursementApprovalPage') }}",
                            type : "POST",
                            data :{
                                reimbursement_id : reimbursement_id,
                                status : status_type,
                                _token: '{{ csrf_token() }}'

                            },
                            success: function(data) {
                                console.log(data);

                                location.reload();
                            }
                        });

                    }

                });

            });
        });

</script>
@endsection
