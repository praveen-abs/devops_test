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

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            if (document.getElementById("active_reimbursment-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'number',
                            name: 'Supplier Id',

                        },
                        {
                            id: 'name ',
                            name: 'Employee Name',

                        },
                        {
                            id: 'job_title',
                            name: 'Employee Code',
                        },
                        {
                            id: 'reporting_to',
                            name: ' From',
                        },
                        {
                            id: 'reporting_to',
                            name: ' To',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Kilo Meter',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Comments ',
                        }, {
                            id: '',
                            name: 'Action ',
                        },

                    ],
                    data: [

                    ],

                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,




                }).render(document.getElementById("active_reimbursment-table"));


            }



        });
        $(document).ready(function() {

            if (document.getElementById("notActive_reimbursment-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'number',
                            name: 'Supplier Id',

                        },
                        {
                            id: 'name ',
                            name: 'Employee Name',

                        },
                        {
                            id: 'job_title',
                            name: 'Employee Code',
                        },
                        {
                            id: 'reporting_to',
                            name: ' From',
                        },
                        {
                            id: 'reporting_to',
                            name: ' To',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Kilo Meter',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Comments ',
                        }, {
                            id: '',
                            name: 'Action ',
                        },

                    ],
                    data: [

                    ],

                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,




                }).render(document.getElementById("notActive_reimbursment-table"));


            }



        });
    </script>
@endsection
