@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="vendor-wrapper mt-30 card">
        <div class="card-body">
            <h6 class="">Payroll Reports</h6>
            <div class=" text-end mb-2">
                <button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#newVendor">Download Report</button>
            </div>

            <div class="vendor-table-wrapper">
                <div id="vendor-table" class="noCustomize_gridjs"></div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            if (document.getElementById("vendor-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'number',
                            name: 'Supplier Id',

                        },
                        {
                            id: 'name ',
                            name: ' Name',

                        },
                        {
                            id: 'job_title',
                            name: 'Contact',
                        },
                        {
                            id: 'reporting_to',
                            name: ' Email',
                        },
                        {
                            id: 'reporting_to',
                            name: ' Company Name',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Vendor Category',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Status ',
                        }, {
                            id: '',
                            name: 'Action ',
                        },

                    ],
                    data: [
                        // {
                        //     name: 'John',
                        //     email: 'john@example.com',
                        //     phoneNumber: '(353) 01 222 3333'
                        // },
                        // {
                        //     name: 'Mark',
                        //     email: 'mark@gmail.com',
                        //     phoneNumber: '(01) 22 888 4444'
                        // },
                    ],

                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,
                    server: {
                        url: '{{ route('fetchAllEmployeePayrollDetails', ['payroll_month' => 'sss']) }}',
                        then: data => data.map(
                            leave_history => [
                                leave_history.id,
                                leave_history,
                                leave_history.leave_type_id,
                                leave_history.start_date,
                                leave_history.end_date,
                                leave_history.leave_reason,
                                leave_history.reviewer_user_id,
                                //leave_history.notifications_users_id,
                                leave_history.reviewer_comments,
                                leave_history.status,
                                leave_history,

                            ]
                        )
                    }



                }).render(document.getElementById("vendor-table"));


            }



        });
    </script>
@endsection
