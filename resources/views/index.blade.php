@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Good Morning !<br/><br/>Performance Review Stats</h4>
                        </div>
                  
                        <!-- <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true"
                                                data-date-format="d M, Y"
                                                data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                            <div
                                                class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-success"><i
                                                class="ri-add-circle-line align-middle me-1"></i>
                                            Add Product</button>
                                    </div>

                                    <div class="col-auto">
                                        <button type="button"
                                            class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i
                                                class="ri-pulse-line"></i></button>
                                    </div>
                                            
                                </div>
                            </form>
                        </div> -->
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Active Review Cycles</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="105">0</span></h4>
                                </div>
                                <div class="flex-shrink-0 align-self-end">
                                    <span class="badge badge-soft-success">Go to Review Groups<span> </span><i
                                            class="ri-arrow-right-s-fill align-middle me-1"></i></span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews to be Initiated</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="233">0</span></h4>
                                </div>
                                <div class="flex-shrink-0 align-self-end">
                                    <span class="badge badge-soft-success">Go to Review Groups<span> </span><i
                                            class="ri-arrow-right-s-fill align-middle me-1"></i></span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews In Progress</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="120">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews Finalised</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="23">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                
                <div class="col-xl-4 col-md-6 ">
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <div class="vertical-line">

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Pending Feedback Requests</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="43">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

            </div> <!-- end col -->


            <div class="row mb-3 pb-1">

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Badges & Leaderboards</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <!-- <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                                class="text-muted">Last 30 Days<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a> -->
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 Days</a>
                                            <a class="dropdown-item" href="#">Last 30 Days</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-nowrap align-middle mb-0">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col">Member</th>
                                                <th scope="col">Hours</th>
                                                <th scope="col">Tasks</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Donald Risher</h5>
                                                        <p class="fs-12 mb-0 text-muted">Product Manager</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">110h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    258
                                                </td>
                                                <td style="width:5%;">
                                                    <div id="radialBar_chart_1" data-colors='["--vz-primary"]'
                                                        data-chart-series="50" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Jansh Brown</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">83h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    105
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_2" data-colors='["--vz-primary"]'
                                                        data-chart-series="45" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Carroll Adams</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">58h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    75
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_3" data-colors='["--vz-primary"]'
                                                        data-chart-series="75" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">William Pinto</h5>
                                                        <p class="fs-12 mb-0 text-muted">UI/UX Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">96h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    85
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_4" data-colors='["--vz-warning"]'
                                                        data-chart-series="25" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Garry Fournier</h5>
                                                        <p class="fs-12 mb-0 text-muted">Web Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">76h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    69
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_5" data-colors='["--vz-primary"]'
                                                        data-chart-series="60" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Susan Denton</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <h6 class="mb-0">123h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    658
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_6" data-colors='["--vz-success"]'
                                                        data-chart-series="85" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Joseph Jackson</h5>
                                                        <p class="fs-12 mb-0 text-muted">React Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">117h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    125
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_7" data-colors='["--vz-primary"]'
                                                        data-chart-series="70" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Employees with Highest Performance Ratings</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <!-- <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                                class="text-muted">Last 30 Days<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a> -->
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 Days</a>
                                            <a class="dropdown-item" href="#">Last 30 Days</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-nowrap align-middle mb-0">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col">Member</th>
                                                <th scope="col">Hours</th>
                                                <th scope="col">Tasks</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Donald Risher</h5>
                                                        <p class="fs-12 mb-0 text-muted">Product Manager</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">110h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    258
                                                </td>
                                                <td style="width:5%;">
                                                    <div id="radialBar_chart_1" data-colors='["--vz-primary"]'
                                                        data-chart-series="50" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Jansh Brown</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">83h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    105
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_2" data-colors='["--vz-primary"]'
                                                        data-chart-series="45" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Carroll Adams</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">58h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    75
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_3" data-colors='["--vz-primary"]'
                                                        data-chart-series="75" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">William Pinto</h5>
                                                        <p class="fs-12 mb-0 text-muted">UI/UX Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">96h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    85
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_4" data-colors='["--vz-warning"]'
                                                        data-chart-series="25" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Garry Fournier</h5>
                                                        <p class="fs-12 mb-0 text-muted">Web Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">76h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    69
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_5" data-colors='["--vz-primary"]'
                                                        data-chart-series="60" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Susan Denton</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <h6 class="mb-0">123h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    658
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_6" data-colors='["--vz-success"]'
                                                        data-chart-series="85" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Joseph Jackson</h5>
                                                        <p class="fs-12 mb-0 text-muted">React Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">117h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    125
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_7" data-colors='["--vz-primary"]'
                                                        data-chart-series="70" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                

            </div>
            <!--end row-->            

            <div class="row mb-3 pb-1">

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Employees who gave Most Praises/Feedbacks</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <!-- <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                                class="text-muted">Last 30 Days<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a> -->
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 Days</a>
                                            <a class="dropdown-item" href="#">Last 30 Days</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-nowrap align-middle mb-0">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col">Member</th>
                                                <th scope="col">Hours</th>
                                                <th scope="col">Tasks</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Donald Risher</h5>
                                                        <p class="fs-12 mb-0 text-muted">Product Manager</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">110h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    258
                                                </td>
                                                <td style="width:5%;">
                                                    <div id="radialBar_chart_1" data-colors='["--vz-primary"]'
                                                        data-chart-series="50" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Jansh Brown</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">83h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    105
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_2" data-colors='["--vz-primary"]'
                                                        data-chart-series="45" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Carroll Adams</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">58h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    75
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_3" data-colors='["--vz-primary"]'
                                                        data-chart-series="75" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">William Pinto</h5>
                                                        <p class="fs-12 mb-0 text-muted">UI/UX Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">96h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    85
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_4" data-colors='["--vz-warning"]'
                                                        data-chart-series="25" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Garry Fournier</h5>
                                                        <p class="fs-12 mb-0 text-muted">Web Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">76h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    69
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_5" data-colors='["--vz-primary"]'
                                                        data-chart-series="60" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Susan Denton</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <h6 class="mb-0">123h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    658
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_6" data-colors='["--vz-success"]'
                                                        data-chart-series="85" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Joseph Jackson</h5>
                                                        <p class="fs-12 mb-0 text-muted">React Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">117h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    125
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_7" data-colors='["--vz-primary"]'
                                                        data-chart-series="70" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Employees who received Most Praises/Feedbacks</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <!-- <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                                class="text-muted">Last 30 Days<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a> -->
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 Days</a>
                                            <a class="dropdown-item" href="#">Last 30 Days</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-nowrap align-middle mb-0">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col">Member</th>
                                                <th scope="col">Hours</th>
                                                <th scope="col">Tasks</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Donald Risher</h5>
                                                        <p class="fs-12 mb-0 text-muted">Product Manager</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">110h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    258
                                                </td>
                                                <td style="width:5%;">
                                                    <div id="radialBar_chart_1" data-colors='["--vz-primary"]'
                                                        data-chart-series="50" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Jansh Brown</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">83h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    105
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_2" data-colors='["--vz-primary"]'
                                                        data-chart-series="45" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Carroll Adams</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">58h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    75
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_3" data-colors='["--vz-primary"]'
                                                        data-chart-series="75" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">William Pinto</h5>
                                                        <p class="fs-12 mb-0 text-muted">UI/UX Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">96h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    85
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_4" data-colors='["--vz-warning"]'
                                                        data-chart-series="25" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Garry Fournier</h5>
                                                        <p class="fs-12 mb-0 text-muted">Web Designer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">76h : <span class="text-muted">150h</span></h6>
                                                </td>
                                                <td>
                                                    69
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_5" data-colors='["--vz-primary"]'
                                                        data-chart-series="60" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Susan Denton</h5>
                                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    <h6 class="mb-0">123h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    658
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_6" data-colors='["--vz-success"]'
                                                        data-chart-series="85" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt=""
                                                        class="avatar-xs rounded-3 me-2">
                                                    <div>
                                                        <h5 class="fs-13 mb-0">Joseph Jackson</h5>
                                                        <p class="fs-12 mb-0 text-muted">React Developer</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">117h : <span class="text-muted">150h</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    125
                                                </td>
                                                <td>
                                                    <div id="radialBar_chart_7" data-colors='["--vz-primary"]'
                                                        data-chart-series="70" class="apex-charts" dir="ltr"></div>
                                                </td>
                                            </tr><!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                

            </div>
            <!--end row-->      


        </div> <!-- end .rightbar-->


    </div> <!-- end col -->
</div>

@endsection

@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection