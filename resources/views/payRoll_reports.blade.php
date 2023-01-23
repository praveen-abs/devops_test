@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payRoll.css') }}">
@endsection
@section('content')
    <div class="cotainer-fluid mt-30 payroll_wrapper">
        <div class="card left-line  mb-2">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav  nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <a class="nav-link active pb-2" data-bs-toggle="tab" href="#payroll_tab" aria-selected="true"
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
                        <a class="nav-link pb-2" data-bs-toggle="tab" href="#pms_tab"
                            aria-selected="false" tabindex="-1" role="tab">
                            PMS/OKR</a>
                    </li>

                </ul>


            </div>
        </div>

        <div class="tab-content">
            <div id="payroll_tab" class="tab-pane fade show active">
                <div class="card top-line mb-0">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-12 mb-2">
                                <h6 class="">Payroll Overview</h6>
                            </div> --}}
                            <div class="col-3">
                                <ul class=' list-style-circle px-4'>
                                    <li class=""><a href="#" class="">Payroll Summary</a></li>
                                    <li><a href="{{ route('Reports.showPayrollReportsPage') }}" class="">Salary
                                            Register - Monthly</a></li>
                                    <li><a href="#" class="">Employees Salary Statement</a></li>
                                    <li><a href="#" class="">Employee Pay Summary</a></li>
                                    <li><a href="#" class="">Payroll Liability Summary</a></li>
                                    <li><a href="#" class="">Leave Encashment Summary</a></li>
                                    <li><a href="#" class="">LOP Summary</a></li>
                                    <li><a href="#" class="">Variable Pay Earnings Report</a></li>

                                </ul>
                            </div>
                            <div class="col-3">
                                <ul class='list-style-numbered list-style-circle px-4'>
                                    <li class=""><a href="#" class="">EPF Summary</a>
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
                            <div class="col-3">
                                <ul class='list-style-numbered list-style-circle px-4'>
                                    <li class=""><a href="#" class="">Employee CTC Details</a>
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

                            <div class="col-3">

                                <div class="col-12">
                                    <h6>Payroll Journal</h6>
                                    <ul class=' list-style-circle px-4'>
                                        <li class=""><a href="#" class="">Payroll Journal Summary</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12 mt-5">
                                    <h6>Activity</h6>
                                    <ul class=' list-style-circle px-4'>
                                        <li class=""><a href="#" class="">Activity Logs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div id="pms_tab" class="tab-pane fade ">
                <div class="card top-line mb-0">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-3">
                                <ul class='list-style-numbered list-style-circle px-4'>
                                    <li><a href="{{ route('showPmsReviewsReportPage') }}" class="">PMS Report</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="attendance_tab" class="tab-pane fade ">

                </div>
                <div id="leaves_tab" class="tab-pane fade ">

                </div>
                <div id="pms_tab" class="tab-pane fade ">

                </div>
            </div>






            <div id="statutory_tab" class="tab-pane fade ">
                <div class="card top-line mb-0">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-3">
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

                                <div class="col-12">
                                    <h6 class="">Taxes and Forms</h6>
                                    <ul class=' list-style-circle px-4'>
                                        <li class=""><a href="#" class="">Tax Deduction Summary</a>
                                        </li>

                                        <li class=""><a href="#" class="">Form 24Q</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-12 mt-5">
                                    <h6 class="">Declarations & Investments</h6>
                                    <ul class=' list-style-circle px-4'>
                                        <li class=""><a href="#" class="">Tax Deduction Summary</a>
                                        </li>

                                        <li class=""><a href="#" class="">Form 24Q</a>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                            <div class="col-5">
                                <h6 class="">The Contract Labour (Regulation & Abolition) Act, 1970</h6>
                                <ul class=' list-style-circle px-4'>
                                    <li class=""><a href="#" class="">Form XIII - Register of
                                            Workmen
                                            Employed by Contractor</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XIV - Employment Card
                                            for
                                            Employee</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XV - Service Certificate
                                            to
                                            Employee</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XVI - Muster Roll</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XVII - Register of
                                            Wages</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XVIII - Muster roll cum
                                            wage
                                            register</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XIX - Wages Slip</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XXII - Register of
                                            Advances</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form XXIII - Register of
                                            Overtime</a>
                                    </li>
                                    <li class=""><a href="#" class="">Form C - Bonus Paid to
                                            employees</a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
                <div id="attendance_tab" class="tab-pane fade ">

                </div>
                <div id="leaves_tab" class="tab-pane fade ">

                </div>
                <div id="pms_tab" class="tab-pane fade ">

                </div>
            </div>
        </div>
    @endsection
