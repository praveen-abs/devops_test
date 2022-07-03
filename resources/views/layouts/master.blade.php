<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="dark" data-sidebar="light" data-sidebar-size="sm">

<head>
    <meta charset="utf-8" />
    <title>ABS - HRMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png')}}">
    @include('layouts.head-css')
</head>

@section('body')
    @include('layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>

    <div style="z-index: 11">
        <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true" >
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-checkbox-circle-fill align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0" id="alert-msg">Yey! Everything worked!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="position:fixed;top:80px;right: 40px">
        <div class="toast hide common-toast-success common-toast toast-border-success" role="alert" aria-live="assertive" data-delay="3000" aria-atomic="true">
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-checkbox-circle-fill align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 id="result-toast-success" class="m-0"></h6>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div style="position:fixed;top:80px;right: 40px">
        <div class="toast hide common-toast-error common-toast toast-border-danger" role="alert" aria-live="assertive" data-delay="3000" aria-atomic="true">
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-checkbox-circle-fill align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 id="result-toast-error" class="m-0"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- END layout-wrapper -->

    <!-- Shows Theme Customizer menu on right side -->
    {{-- @include('layouts.customizer') --}}

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
</body>

</html>
