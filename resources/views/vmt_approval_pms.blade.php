 
@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}">
    <script src="{{ URL::asset('assets/js/calendar-vanila.js') }}" defer></script>
    <link href="{{ URL::asset('assets/css/attendance.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
   
                    <div class="row mt-3">
                    <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card mb-0 leave-history">
                            <div class="card-body">
                                <h6 class="mb-2">PMS APPROVALS</h6>

                                <div class="table-responsive">
                                    <div id="table_pms_approvals" class="custom_gridJs"></div>
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
                url: "{{ url('showPMSApprovalPage') }}",  
                type : "POST", 
                dataType : 'json',  
                data :$("").serialize(), 
                
            })
        });
    });

            if (document.getElementById("table_pms_approvals")) {
                gridTable_pms_approvals = new gridjs.Grid({
                    columns: [
                        {
                            id: 'id',
                            name: 'ID',
                        },
                        {
                            id:'name',
                            name:'Assignee Name'
                        },
                        {
                           id:'assignment_period',
                           name:'Assignment Period',

                        },
                        {
                            id:' approval_status',
                            name:' Approval Status'
                        },
                        {
                            id:'reviewer_name',
                            name:'Reviewer Name'
                        },
                        {
                            id: 'is_assignee_accepted',
                            name: 'Assignee Accepted',
                        },
                        {
                            id: 'is_reviewer_accepted',
                            name: 'Reviewer Accepted',
                        },
                        // {
                        //     id: 'actions',
                        //     name: 'Action',
                        //     formatter: function formatter(emp) {
                        //         var htmlcontent = "";
 

                        //         htmlcontent =
                        //             '<input type="button" value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal">';
                        //         // '<button  value="View" class="status btn btn-orange py-1 onboard-employee-btn " data-bs-target="#leaveDetails_modal" data-bs-toggle="modal"></button>' ;


                        //         return gridjs.html(htmlcontent);
                        //     }
                        // },
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
                                // Assignee name, Assignment period, Approval Status, Reviewer Name, BUTTON(View, Approve, Reject)
                                 
                                approvals_pms.id,
                                approvals_pms.name,
                                approvals_pms.assignment_period,
                                approvals_pms.approval_status,
                                approvals_pms.reviewer_name,
                                approvals_pms.is_assignee_accepted,
                                approvals_pms.is_reviewer_accepted,
                                //approvals_pms.status,
                            ]
                        )
                    }
                }).render(document.getElementById("table_pms_approvals"));
            }

 
</script>
@endsection
