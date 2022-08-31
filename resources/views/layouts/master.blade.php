@php
clearstatcache();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="dark" data-sidebar="light" data-sidebar-size="lg">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/brands/Fusion Ardens.svg')}}">

<head>
    <meta charset="utf-8" />
    <title>ABS - HRMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon_abs.png')}}">
    @include('layouts.head-css')
    <style>


       

        .credit {
            font-size: 16px;
            color: rgba(191, 191, 191, 0.36);
            font-family: Arial Narrow, sans-serif;
            position: fixed;
            right: 2%;
            top: 17%;
            text-align: center;
            display: none;
        }

        .credit a {
            text-decoration: none;
            display: block;
            color: rgba(191, 191, 191, 0.36);
            -webkit-transition: .3s ease;
            -o-transition: .3s ease;
            transition: .3s ease
        }

        .credit a:hover {
            color: #283e4a
        }

        .loader-container {
            margin: auto;
            position: relative;
        }

        #loader-image {
            width: 8% !important;
        }

        .face {
            margin-top: 30%;
            text-align: center;
        }

        .loading {
            width: 130px;
            display: block;
            height: 2px;
            margin: 28px auto;
            border-radius: 2px;
            background-color: #cfcfcf;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .loading:before {
            content: '';
            height: 3px;
            width: 68px;
            position: absolute;
            -webkit-transform: translate(-34px, 0);
            -ms-transform: translate(-34px, 0);
            transform: translate(-34px, 0);
            background-color: #0073b1;
            border-radius: 2px;
            -webkit-animation: initial-loading 1.5s infinite ease;
            animation: animation 1.4s infinite ease;
        }

        @-webkit-keyframes animation {
            0% {
                left: 0
            }

            50% {
                left: 100%
            }

            100% {
                left: 0
            }
        }

        @keyframes animation {
            0% {
                left: 0
            }

            50% {
                left: 100%
            }

            100% {
                left: 0
            }
        }

        .face .loader-container>img {
            background: transparent;
            border border-radius: 2px;
            animation: bounce 1.4s ease infinite;
            -webkit-animation: bounce 1.4s ease infinite;
            -moz-animation: bounce 1.4s ease infinite;
            -ms-animation: bounce 1.4s ease infinite;
            -o-animation: bounce 1.4s ease infinite;
        }

        @-webkit-keyframes bounce {

            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-filter: blur(0);
                filter: blur(0);
            }

            50% {
                -webkit-transform: scale(.9);
                transform: scale(.9);
                -webkit-filter: blur(1.4);
                filter: blur(1.4);
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);

            }
        }

        @keyframes bounce {

            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-filter: blur(0);
                filter: blur(0);
            }

            50% {
                -webkit-transform: scale(.9);
                transform: scale(.9);
                -webkit-filter: blur(1.4);
                filter: blur(1.4);
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);

            }
        }

        #loading~#layout-wrapper .main-content {
            display: none;
        }
    </style>
</head>

@section('body')
@include('layouts.body')
@show
<!-- Begin page -->
<!-- <section id="loading" class="loading">
        <div id="loading-content" class="loading-content"></div>
    </section> -->
{{-- @yield('loading') --}}
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
    <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
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
<script>
    $(document).ready(function() {
        $('#loading').hide();
        $('.main-content').show();
    });

    $(function() {
        setTimeout(function() {
            $('.credit').fadeIn();
            $('.credit').delay(15000).fadeOut();
        }, 3000);
    });
</script>
</body>

</html>