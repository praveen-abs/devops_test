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
    <div class="card mb-0 pms_approval_wrapper mt-30">
        <div class="card-body">
            <h6 class="mb-2">PMS</h6>
            <div class="table-responsive">
                <div id="table_pms_approvals" class="custom_gridJs"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $("#btn_submit").on('click', function() {

                $.ajax({
                    url: "{{ url('showPMSApprovalPage') }}",
                    type: "POST",
                    dataType: 'json',
                    data: $("").serialize(),

                })
            });
        });

        if (document.getElementById("table_pms_approvals")) {
            gridTable_pms_approvals = new gridjs.Grid({
                columns: [{
                        id: 'pms_kpiform_review_id',
                        name: 'ID',
                    },
                    {
                        id: 'name',
                        name: 'Assignee Name'
                    },
                    {
                        id: 'assignment_period',
                        name: 'Assignment Period',

                    },

                    {
                        id: 'reviewer_id',
                        name: 'Reviewer Name'
                    },

                    {
                        id: 'attr_reviewer_accepted_status',
                        name: 'Reviewer Status',
                        formatter: function formatter(cell) {
                            if (cell == -1 || cell == null ) {
                                return "Pending";
                            } else if (cell == 0) {
                                return "Rejected";
                            } else if (cell == 1) {
                                return "Approved";
                            }

                        }
                    },
                    {
                        id: 'actions',
                        name: 'Action',
                        formatter: function formatter(emp) {
                            var htmlcontent = "";

                            htmlcontent =
                                '<button type="button" value="Approve" data-kpiform_review_id="' + emp
                                .pms_kpiform_review_id +
                                '" data-status="Approve" class="status me-2 btn btn-success py-1 process-btn"><i class="fa me-1 fa-check-circle" aria-hidden="true"></i>Approve</button>';


                            htmlcontent = htmlcontent +
                                '<button type="button" value="Reject" data-kpiform_review_id="' + emp
                                .pms_kpiform_review_id +
                                '" data-status="Reject" class="status btn me-2 btn-danger py-1 process-btn"><i class="fa fa-times-circle me-1"></i>Reject</button>';
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
                    url: '{{ route('fetchPendingPMSForms') }}',
                    then: data => data.map(
                        approvals_pms => [
                            // Assignee name, Assignment period, Approval Status      Reviewer Name, BUTTON(View, Approve, Reject)

                            approvals_pms.pms_kpiform_review_id,
                            approvals_pms.assignee_name,
                            approvals_pms.assignment_period,
                            approvals_pms.reviewer_name,
                            approvals_pms.attr_reviewer_accepted_status,
                            approvals_pms,
                            //approvals_pms.status,

                        ]
                    )
                }
            }).render(document.getElementById("table_pms_approvals"));
        }

        $(document).ready(function() {

            $(document).on('click', '.process-btn', function(e) {
                let status_type = $(this).attr('data-status');
                let message = 'Do you want to ' + status_type + '?';
                let kpiform_review_id = $(this).attr('data-kpiform_review_id');

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

                    if (value.isConfirmed == true) {
                        console.log("Sending AJAX request");

                        $.ajax({
                            url: "{{ route('vmt-approvals-pms') }}",
                            type: "POST",
                            data: {
                                kpiform_review_id: kpiform_review_id,
                                status: status_type,
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
