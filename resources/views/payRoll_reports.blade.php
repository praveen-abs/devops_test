@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payRoll.css') }}">
@endsection
@section('content')

    <div class="cotainer-fluid mt-30 payroll_wrapper">
        <div class="card  mb-0">
            <div class="card-body">
                <h5 class="mb-3">Reports</h5>

                <ul class="nav mb-3 nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <a class="nav-link active pb-2" data-bs-toggle="tab" href="#reports_tabe" aria-selected="true"
                            role="tab">
                            Payroll</a>
                    </li>

                    <li class="nav-item text-muted mx-5 " role="presentation">
                        <a class="nav-link  pb-2" data-bs-toggle="tab" href="#statutory_tab" aria-selected="false"
                            tabindex="-1" role="tab">
                            Statutory Reports</a>
                    </li>



                    <li class="nav-item  text-muted " role="presentation">
                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#attendance_tab" aria-selected="false"
                            tabindex="-1" role="tab">
                            Attendance</a>
                    </li>

                    <li class="nav-item text-muted mx-5" role="presentation">
                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#leaves_tab" aria-selected="false"
                            tabindex="-1" role="tab">
                            Leaves</a>
                    </li>

                    <li class="nav-item text-muted " role="presentation">
                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#pms_tab" aria-selected="false" tabindex="-1"
                            role="tab">
                            PMS</a>
                    </li>

                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show fade active" id="reports_tab" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="card top-line mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <h6 class="">Payroll Overview</h6>
                                    </div>
                                    <div class="col-4">
                                        <ul class=' list-style-circle px-4'>
                                            <li><a href="#" class="">Payroll Summary</a></li>
                                            <li><a href="#" class="">Salary Register - Monthly</a></li>
                                            <li><a href="#" class="">Employees Salary Statement</a></li>
                                            <li><a href="#" class="">Employee Pay Summary</a></li>
                                            <li><a href="#" class="">Payroll Liability Summary</a></li>
                                            <li><a href="#" class="">Leave Encashment Summary</a></li>
                                            <li><a href="#" class="">LOP Summary</a></li>
                                            <li><a href="#" class="">Variable Pay Earnings Report</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <ul class='list-style-numbered list-style-circle px-4'>
                                            <li><a href="#" class="">EPF Summary</a>
                                            </li>
                                            <li><a href="#" class="">EPF - ECR Report</a>
                                            </li>
                                            <li><a href="#" class="">ESI Summary</a>
                                            </li>
                                            <li><a href="#" class="">ESIC Return Report</a>
                                            </li>
                                            <li><a href="#" class="">PT Summary</a>
                                            </li>
                                            <li><a href="#" class="">PT Monthly Statement</a>
                                            </li>
                                            <li><a href="#" class="">PT Annual Return Statement</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <ul class='list-style-numbered list-style-circle px-4'>
                                            <li><a href="#" class="">Employee CTC Details</a>
                                            </li>
                                            <li><a href="#" class="">Reimbursement Summary</a>
                                            </li>
                                            <li><a href="#" class="">Employee Perquisite Summary</a>
                                            </li>

                                            <li><a href="#" class="">Employee Termination Report</a>
                                            </li>
                                            <li><a href="#" class="">Salary Revision Report</a>
                                            </li>
                                            <li><a href="#" class="">Salary Revision History</a>
                                            </li>
                                            <li><a href="#" class="">Salary Without Report</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane show fade active" id="statutory_tab" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                        </div>
                        <div class="tab-pane show fade active" id="attendance_tab" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                        </div>
                        <div class="tab-pane show fade active" id="leaves_tab" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                        </div>
                        <div class="tab-pane show fade active" id="pms_tab" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
