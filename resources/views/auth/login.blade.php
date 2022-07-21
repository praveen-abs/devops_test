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
                <form action="{{ route('login') }}" method="POST" class="py-4 px-3">
                    <div class="login-headers text-align-left ">
                        <div class="logo-change   d-flex align-items-center justify-content-center">
                            <img src="{{ URL::asset($generalInfo->logo_img) }}" alt="" class="">
                        </div>
                        <div class="login-logo  d-flex align-items-center mb-3">
                            <p class="m-0 mt-1 fw-bold log">Login <span class="mx-1">to</span><span
                                    class="m-0 fw-bold mx-1">ABS</span>hrms</p>
                        </div>
                    </div>
                    @csrf

                    <div class="form-row mb-3">
                        <!-- <label for="username" class="form-label">Username</label> -->
                        <input type="text" class="form-control @error('email') form-control-sm is-invalid @enderror"
                            value="{{ old('email', 'hr_augustin@vasagroup.abshrms.com') }}" id="username" name="email"
                            placeholder="Username   ">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-row mb-3">
                        <!-- <label for="">Password</label> -->


                        <input type="password"
                            class="form-control position-relative pe-5 @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" id="password-input" value="Abs@123123">
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
                            <label for=""><input type="checkbox" class="mx-1 m-0 ">Remember me</label>
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


                    <div class="d-flex align-items-center justify-content-center social-icons-wrapper">

                        <!-- <img src="{{ URL::asset('assets/images/social.png') }}" alt="" class=" w-100 soc-det-img "> -->
                        <a href="https://accounts.google.com/signin" class="mx-1">
                            <img src="{{ URL::asset('assets/images/google.png') }}" alt="" class="soc-det-img ">
                        </a>

                        <a href="https://www.linkedin.com/login"class="mx-1">

                            <img src="{{ URL::asset('assets/images/linkedin.png') }}" alt="" class="soc-det-img ">
                        </a>

                        <a
                           class="mx-1" href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1658217648&rver=7.0.6738.0&wp=MBI_SSL&wreply=https:%2F%2Faccount.microsoft.com%2Fauth%2Fcomplete-signin%3Fru%3Dhttps%253A%252F%252Faccount.microsoft.com%252F%253Frefp%253Dsignedout-index%2526refd%253D127.0.0.1&lc=1033&id=292666&lw=1&fl=easi2">

                            <img src="{{ URL::asset('assets/images/microsoft.png') }}" alt="" class="soc-det-img ">
                        </a>



                    </div>


                    <div class="d-flex align-items-center mt-2 justify-content-center  social-btns ">
                        <p class="w-50">Powered by</p>

                        <a href="#" class="mx-1">
                            <img src="{{ URL::asset('assets/images/power_logo_abs.png
                                ') }}" alt="" class="h-50 w-100 ">
                        </a>


                        <a href="https://play.google.com/store/"  class="mx-1">
                            <img src="{{ URL::asset('assets/images/Google_Play_Store.png') }}" alt="" class="w-100 h-50"></a>

                        <a href="https://www.apple.com/in/app-store/"  class="mx-1">
                            <img src="{{ URL::asset('assets/images/apple_play_store.png') }}" alt=""
                                class="w-100 h-50"></a>
                    </div>




                </form>
            </div>

        </div>

    </div>
    <div class="footer-img">
        <!-- <img src="{{ URL::asset('assets/images/footer_login.png') }}" alt="" class="" style="width:100%;"> -->
        <!-- <p class="fw-bold">Copyright © 2022 Ardens Business Solutions Private Limited - an ISO 9001 - 2015 Certified</p> -->
    </div>

</div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js')}}"></script>


@endsection