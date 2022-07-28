<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="dark" data-sidebar="light" data-sidebar-size="lg">

<head>
    <meta charset="utf-8" />
    <title>ABS - HRMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png')}}">
    @include('layouts.head-css')
    <style>
    /* .page-content{
        background:#F2F2F2 url();
    } */
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
    .credit a{text-decoration: none;display: block;    color: rgba(191, 191, 191, 0.36);-webkit-transition:.3s ease;-o-transition:.3s ease;transition:.3s ease}
    .credit a:hover{color:#283e4a}
    .loader-container {
        margin: auto;
        position: relative;
    }
    #loader-image {
        width: 8% !important;
    }
    .face{
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
        content:'';
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
    .face .loader-container > img {
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
            -webkit-transform: scale(1) ;
            transform: scale(1) ;
            -webkit-filter: blur(0);
            filter: blur(0);    
        }
        50% {
            -webkit-transform: scale(.9) ;
            transform: scale(.9) ;
            -webkit-filter: blur(1.4);
            filter: blur(1.4);
        }
        100% {
            -webkit-transform: scale(1) ;
            transform: scale(1) ;
            
        }
    }
    @keyframes bounce {
        
        0% {
            -webkit-transform: scale(1) ;
            transform: scale(1) ;
            -webkit-filter: blur(0);
            filter: blur(0);    
        }
        50% {
            -webkit-transform: scale(.9) ;
            transform: scale(.9) ;
            -webkit-filter: blur(1.4);
            filter: blur(1.4);
        }
        100% {
            -webkit-transform: scale(1) ;
            transform: scale(1) ;
            
        }
    }
    #loading ~#layout-wrapper .main-content {
        display:none;
    }
    .select2-container--default .select2-selection--single {
        /* border-radius: 20px !important; */
        border: 1px solid #002F56 !important;
        height: 40px !important;
        padding: 5px 15px 12px 8px !important;
    }
    #msform input, #msform textarea, #msform select, .addfiles {
        /* padding: 12px 15px 12px 15px; */
        border: 1px solid #2C3E50 !important;
        /* border-radius: 20px; */
        margin-top: 2px;
        /* width: 100%; */
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px;
        outline: none;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 8px !important;
        right: 12px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #d1d5d8 transparent transparent transparent;
    }

    .addfiles {
        padding-left: 3px !important;
    }

    .addfiles::before {
        content: 'Upload';
        border-right: 1px solid #cdd1d5;
        background: #eff2f7;
        padding: 0.5rem 0.9rem;
        margin-right: 0.5rem;
    }
    </style>
@include('ui-onboarding')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
</head>

<body>



 <div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="main">
                    @yield('onboarding')
                </div>
            </div>
        </div>
    </div>
</div>




  
    

   

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- ui notifications -->

    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
    <!-- apexcharts -->

    <!--Page Wrapper-->

    <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script><!-- -->
    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>


    <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script><!-- -->
    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

    <!-- Page JavaScript Files-->
    <script src="{{ URL::asset('/assets/premassets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/jquery-1.12.4.min.js') }}"></script>
    <!--Popper JS-->
    <script src="{{ URL::asset('/assets/premassets/js/popper.min.js') }}"></script>
    <!--Bootstrap-->
    <script src="{{ URL::asset('/assets/premassets/js/bootstrap.min.js') }}"></script>
    <!--Sweet alert JS-->
    <script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
    <!--Progressbar JS-->
    <script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>
    <!--Charts-->
    <!--Canvas JS-->
    <!--Custom Js Script-->
    <!--Custom Js Script-->
    <script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/employeeOnboarding.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- <script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script> -->

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    

    <script>
    
    </script>

</body>
</html>