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
                            <div class="row ">
                                <div class="col-6">
                                    <h4 class="fs-16 mb-1">Good Morning !</h4>
                                </div>
                                <div class="col-6 text-end">
                                </div>
                            </div>
                        </div>


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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Active Review Cycles
                                    </p>

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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Reviews to be Initiated
                                    </p>

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
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Pending Feedback
                                        Requests</p>

                                    <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                            data-target="43">0</span></h4>
                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

            </div> <!-- end col -->



    </div>        
</div>
<!--end row-->


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