
@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

                    <div class="row mt-3">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card mb-0 leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">Reimbursements</h6>

                                <div class="table-responsive">
                                    <div id="table_reimbursement_approvals" class="custom_gridJs"></div>
                                </div>
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
                            id: 'id',
                            name: 'ID',
                        },
                        // {
                        //     id:'user_id',
                        //     name:'User Id',
                        // },
                        // {
                        //     id:'reimbursement_type_id',
                        //     name:'reimbursement_type_id',
                        // },
                        {
                            id:'name',
                            name:'Name',
                        },
                        {
                           id:'date',
                           name:'Date',

                        },

                        {
                            id:'user_data',
                            name:'User Data',
                        },
                        {
                            id:'user_comments',
                            name:'User Comments',

                        },
                        {
                            id:'reviewer_id',
                            name:'Reviewer Name'
                        },
                        {
                            id:'reviewed_date',
                            name:'Reviewed Date',
                        },
                        {
                            id: 'status',
                            name: 'Status',
                            formatter: function formatter(cell) {
                                if(cell == -1)
                                    return "Pending";
                                else
                                if(cell == 0)
                                    return "Rejected";
                                else
                                if(cell == 1)
                                    return "Approved";
                            }
                        },
                        {
                            id:'reviewer_comments',
                            name:'Reviewer Comments',
                        },
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
                                approvals_reimbursement.id,
                                //approvals_reimbursement.user_id,
                               // approvals_reimbursement.reimbursement_type_id,
                                approvals_reimbursement.name,
                                approvals_reimbursement.date,
                                approvals_reimbursement.user_data,
                                approvals_reimbursement.user_comments,
                                approvals_reimbursement.reviewer_id,
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
