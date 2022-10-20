@extends('layouts.master')
@section('title')
@lang('translation.dashboards')
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/attendance.css') }}">
@endsection
@section('content')
@component('components.payroll_breadcrumb')
@slot('li_1')
@endslot
@endcomponent
    <div class="cotainer-fluid">
        <div class="card top-line mb-0">
            <h6 class="mb-3">Payroll Progress</h6>
            <div class=
            <h6 class="mb-3">Sep - 2022<span class="f-13">(30 Days)</span></h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card  box_shadow_0 border-rtb left-line w-100">
                                <div class="card-body text-center">
                                    <p class="text-ash-medium mb-2 f-13">Total Active Employees</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card  box_shadow_0 border-rtb left-line w-100">
                                <div class="card-body text-center">
                                    <p class="text-ash-medium mb-2 f-13">Total Active Employees</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card  box_shadow_0 border-rtb left-line w-100">
                                <div class="card-body text-center">
                                    <p class="text-ash-medium mb-2 f-13">Total Active Employees</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card  box_shadow_0 border-rtb left-line w-100">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <p class="text-ash-medium mb-2 f-13">Total Payroll Cost</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                                <div class="f-20">=</div>
                                <div class="">
                                    <p class="text-ash-medium mb-2 f-13">Employee Deposit</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                                <div class="f-20">+</div>
                                <div class="">
                                    <p class="text-ash-medium mb-2 f-13">Total Deductions</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                                <div class="f-20">+</div>
                                <div class="">
                                    <p class="text-ash-medium mb-2 f-13">Total contributions</p>
                                    <h5 class="mb-0">-</h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            if (document.getElementById("view_employees-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'month',
                            name: 'Upcoming months',

                        },
                        {
                            id: 'estimated',
                            name: 'Estimated Employee Cost',
                        },
                        {
                            id: 'compensation',
                            name: 'Compensation Cost',
                        },
                        {
                            id: 'pay',
                            name: 'Fix Pay',
                        },
                        {
                            id: 'bonus',
                            name: 'Bouns',
                        },
                        {
                            id: 'others',
                            name: 'Others',
                        },
                        {
                            id: 'final',
                            name: 'Final Cost',
                        }
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
                }).render(document.getElementById("view_employees-table"));
            }
        });
    </script>
@endsection
