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
    
    <div style="position:fixed;top:80px;right: 40px">
        <div class="toast hide common-toast-success common-toast bg-success" role="alert" aria-live="assertive" data-delay="3000"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Success</strong>
                <button type="button" class="ml-2 mb-1 close common-toast-close" data-dismiss="toast" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <p class="text-white" id="result-toast-success"></p>
            </div>
        </div>
    </div>

    <div style="position:fixed;top:80px;right: 40px">
        <div class="toast hide common-toast-error common-toast bg-danger" role="alert" aria-live="assertive" data-delay="3000"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Error</strong>
                <button type="button" class="ml-2 mb-1 close common-toast-close" data-dismiss="toast" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <p class="text-white" id="result-toast-error"></p>
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
