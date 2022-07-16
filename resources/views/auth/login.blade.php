@extends('layouts.master-without-nav')
@section('title')
@lang('translation.signin')
@endsection
@section('css')


<link href="{{ URL::asset('assets/css/login_page.css') }}" rel="stylesheet">

@endsection
@section('content')
<?php
    $logoObj = \DB::table('vmt_general_info')->first();

    if($logoObj){
        $logoSrc = $logoObj->logo_img;
    }else{
        $logoSrc = 'assets/images/vasa.jpg';
    }
    //dd($logoSrc);
?>
<div class="container-fluid conya">
    <div class="login-main login-bg">
        <img src="{{ URL::asset('assets/images/login_bg3.jpg') }}" alt="" class="">
    </div>
    <div class="row slidrow">
        <div class="sidecol col-6">

        </div>
        <div class="sidecol2 col-6">
            <div class="side-right">
                <form action="{{ route('login') }}" method="POST" class="py-3 px-4">
                    <div class="login-headers text-align-left my-1 ">
                        <div class="logo-change   d-flex align-items-center justify-content-center">
                            <img src="{{ URL::asset($generalInfo->logo_img) }}" alt="" class="">
                        </div>
                        <div class="login-logo  d-flex align-items-center">
                            <p class="m-0 mt-1 fw-bold log">Login <span class="mx-1">to</span><span class="h5 m-0 fw-bold mx-1">ABS</span>hrms</p>
                        </div>
                    </div>
                    @csrf

                    <div class="form-row mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('email') form-control-sm is-invalid @enderror"
                            value="{{ old('email', 'hr_augustin@vasagroup.abshrms.com') }}" id="username" name="email"
                            placeholder="Enter username">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-row mb-2">
                        <label for="">Password</label>


                        <input type="password"
                            class="form-control position-relative pe-5 @error('password') is-invalid @enderror"
                            name="password" placeholder="Enter password" id="password-input" value="Abs@123123">
                        <!-- <button
                                        class="btn btn-link  end-0 top-0 position-absolute text-decoration-none text-muted"
                                        type="button" id="password-addon"><i
                                            class="ri-eye-fill align-middle"></i></button> -->
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-row d-flex justify-content-between mt-1">
                        <div class="">
                            <label for=""><input type="checkbox" class="mx-1 m-0 ">Keep me Sign In</label>
                        </div>
                        <div class="">
                            <span> <a href="">Forget Password ?</a></span>
                        </div>
                    </div>


                    <div class="form-row d-flex justify-content-center mt-3 mb-2 ">
                        <button class="btn sign-in-btn text-white  waves-effect waves-light w-50"
                            type="submit">Log-In</button>
                    </div>


                    <div class="divider d-flex align-items-center mb-1">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                    </div>


                    <div class="d-flex justify-content-between social-icons-wrapper">

                        <!-- <img src="{{ URL::asset('assets/images/social.png') }}" alt="" class=" w-100 soc-det-img "> -->
                        <img src="{{ URL::asset('assets/images/google.png') }}" alt="" class="soc-det-img h-">
                        <img src="{{ URL::asset('assets/images/linkedin.png') }}" alt="" class="soc-det-img ">
                        <img src="{{ URL::asset('assets/images/microsoft.png') }}" alt="" class="soc-det-img ">

                        <!-- <ul>
                                <li class="facebook"><i class="fab fa-facebook-f"></i></li>
                                <li class="twitter"><i class="fab fa-twitter"></i></li>
                                <li class="pin"><i class="fab fa-pinterest-p"></i></li>
                                <li class="link"><i class="fab fa-linkedin-in"></i></li>
                               
                            </ul> -->
                    </div>
                    <div class="d-flex">
                        <img src="{{ URL::asset('assets/images/Group 4.png') }}" alt="" class="  w-100 h-25 mt-3">
                    </div>


                </form>
            </div>

        </div>

    </div>
    <!-- <div class="footer-img">
        <img src="{{ URL::asset('assets/images/footer.png') }}" alt="" class="" style="width:100%;">
    </div> -->

</div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js')}}"></script>


@endsection