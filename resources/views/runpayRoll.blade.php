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
            <div class="card-body">
                <h6 class="mb-3">Payroll Progress</h6>
                <div class="card card-body mb-0">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-body">
                            <h6 class="mb-3">Sep - 2022<span class="f-13">(30 Days)</span></h6>
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
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body">
                            <h6>Activity</h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-3">Run Payroll</h6>
                <div class="card card-body mb-0">
                    <div class="arrow-steps clearfix d-flex justify-content-center mb-3">
                        <div class="step current border-start-radius"> 
                            <span> 
                                <span class="svg-algin-crtly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                </span>Leave Attendance
                            </span> 
                        </div>
                        <div class="step current">
                            <span>
                                <span class="svg-algin-crtly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gift-fill" viewBox="0 0 16 16">
                                        <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7h6zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9H2.5z"/>
                                    </svg>
                                </span>Bonus, Salary Revisions
                            </span>
                        </div>
                        <div class="step current"> 
                            <span> 
                                <span class="svg-algin-crtly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                    </svg>
                                </span>Salaries on Hold
                            </span> 
                        </div>
                        <div class="step"> 
                            <span> 
                                <span class="svg-algin-crtly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </span>Salaries on Hold
                            </span>
                        </div>
                        <div class="step">
                            <span>
                                <span class="svg-algin-crtly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
                                        <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
                                    </svg>
                                </span>Reimbursement
                            </span>
                        </div>
                        <div class="step border-end-radius">
                            <span>
                                <span class="svg-algin-crtly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                </span>Override<span class="f-12">(PT, ESI, TDS, LWF)</span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <div class="separate-converter-box">
                                <a class="hole-box-link" href="#">
                                    <div tabindex="-1" class="position-relative-box text-secondary">
                                        <h6>Leaves, Attendance & Daily Wages</h6>
                                    </div>
                                </a>
                                <div class="sc-1gyxcpm-0 csDfHB ojwc4z-4 dOHSmX" style="width:32px;height:32px">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 4C0 1.79086 1.79086 0 4 0H28C30.2091 0 32 1.79086 32 4V28C32 30.2091 30.2091 32 28 32H4C1.79086 32 0 30.2091 0 28V4Z" fill="#3D99F5"></path>
                                        <path d="M23.0874 25L28 7H24.0597L21.0661 19.4034H21.0149L17.8934 7H14.1322L10.9595 19.2521H10.9083L8.01706 7H4L8.83582 25H12.9041L15.9488 12.7479H16L19.0959 25H23.0874Z" fill="white"></path>
                                    </svg>
                                </div>
                                <p class="ojwc4z-5 jZEeUz f-10">Last Changes on Oct 03, 2022, (12:33 pm) By Harpitha Reddy</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="separate-converter-box">
                                <a class="hole-box-link" href="#">
                                    <div tabindex="-1" class="position-relative-box text-secondary">
                                        <h6>Bonus, Salary Revision & Overtime</h6>
                                    </div>
                                </a>
                                <div class="sc-1gyxcpm-0 csDfHB ojwc4z-4 dOHSmX" style="width:32px;height:32px">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 4C0 1.79086 1.79086 0 4 0H28C30.2091 0 32 1.79086 32 4V28C32 30.2091 30.2091 32 28 32H4C1.79086 32 0 30.2091 0 28V4Z" fill="#3D99F5"></path>
                                        <path d="M23.0874 25L28 7H24.0597L21.0661 19.4034H21.0149L17.8934 7H14.1322L10.9595 19.2521H10.9083L8.01706 7H4L8.83582 25H12.9041L15.9488 12.7479H16L19.0959 25H23.0874Z" fill="white"></path>
                                    </svg>
                                </div>
                                <p class="ojwc4z-5 jZEeUz f-10">Last Changes on Oct 03, 2022, (12:33 pm) By Harpitha Reddy</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="separate-converter-box">
                                <a class="hole-box-link" href="#">
                                    <div tabindex="-1" class="position-relative-box text-secondary">
                                        <h6>Salaries on Hold & Arrears</h6>
                                    </div>
                                </a>
                                <div class="sc-1gyxcpm-0 csDfHB ojwc4z-4 dOHSmX" style="width:32px;height:32px">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 4C0 1.79086 1.79086 0 4 0H28C30.2091 0 32 1.79086 32 4V28C32 30.2091 30.2091 32 28 32H4C1.79086 32 0 30.2091 0 28V4Z" fill="#3D99F5"></path>
                                        <path d="M23.0874 25L28 7H24.0597L21.0661 19.4034H21.0149L17.8934 7H14.1322L10.9595 19.2521H10.9083L8.01706 7H4L8.83582 25H12.9041L15.9488 12.7479H16L19.0959 25H23.0874Z" fill="white"></path>
                                    </svg>
                                </div>
                                <p class="ojwc4z-5 jZEeUz f-10">Last Changes on Oct 03, 2022, (12:33 pm) By Harpitha Reddy</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="separate-converter-box">
                                <a class="hole-box-link" href="#">
                                    <div tabindex="-1" class="position-relative-box text-secondary">
                                        <h6>Leaves, Attendance & Daily Wages</h6>
                                    </div>
                                </a>
                                <div class="sc-1gyxcpm-0 csDfHB ojwc4z-4 dOHSmX" style="width:32px;height:32px">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 4C0 1.79086 1.79086 0 4 0H28C30.2091 0 32 1.79086 32 4V28C32 30.2091 30.2091 32 28 32H4C1.79086 32 0 30.2091 0 28V4Z" fill="#3D99F5"></path>
                                        <path d="M23.0874 25L28 7H24.0597L21.0661 19.4034H21.0149L17.8934 7H14.1322L10.9595 19.2521H10.9083L8.01706 7H4L8.83582 25H12.9041L15.9488 12.7479H16L19.0959 25H23.0874Z" fill="white"></path>
                                    </svg>
                                </div>
                                <p class="ojwc4z-5 jZEeUz f-10">Last Changes on Oct 03, 2022, (12:33 pm) By Harpitha Reddy</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="separate-converter-box">
                                <a class="hole-box-link" href="#">
                                    <div tabindex="-1" class="position-relative-box text-secondary">
                                        <h6>Bonus, Salary Revision & Overtime</h6>
                                    </div>
                                </a>
                                <div class="sc-1gyxcpm-0 csDfHB ojwc4z-4 dOHSmX" style="width:32px;height:32px">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 4C0 1.79086 1.79086 0 4 0H28C30.2091 0 32 1.79086 32 4V28C32 30.2091 30.2091 32 28 32H4C1.79086 32 0 30.2091 0 28V4Z" fill="#3D99F5"></path>
                                        <path d="M23.0874 25L28 7H24.0597L21.0661 19.4034H21.0149L17.8934 7H14.1322L10.9595 19.2521H10.9083L8.01706 7H4L8.83582 25H12.9041L15.9488 12.7479H16L19.0959 25H23.0874Z" fill="white"></path>
                                    </svg>
                                </div>
                                <p class="ojwc4z-5 jZEeUz f-10">Last Changes on Oct 03, 2022, (12:33 pm) By Harpitha Reddy</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="separate-converter-box">
                                <a class="hole-box-link" href="#">
                                    <div tabindex="-1" class="position-relative-box text-secondary">
                                        <h6>Salaries on Hold & Arrears</h6>
                                    </div>
                                </a>
                                <div class="sc-1gyxcpm-0 csDfHB ojwc4z-4 dOHSmX" style="width:32px;height:32px">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 4C0 1.79086 1.79086 0 4 0H28C30.2091 0 32 1.79086 32 4V28C32 30.2091 30.2091 32 28 32H4C1.79086 32 0 30.2091 0 28V4Z" fill="#3D99F5"></path>
                                        <path d="M23.0874 25L28 7H24.0597L21.0661 19.4034H21.0149L17.8934 7H14.1322L10.9595 19.2521H10.9083L8.01706 7H4L8.83582 25H12.9041L15.9488 12.7479H16L19.0959 25H23.0874Z" fill="white"></path>
                                    </svg>
                                </div>
                                <p class="ojwc4z-5 jZEeUz f-10">Last Changes on Oct 03, 2022, (12:33 pm) By Harpitha Reddy</p>
                            </div>
                        </div>
                    </div>
                </div>
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
