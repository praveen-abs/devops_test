@extends('layouts.master-without-nav')
@section('title')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/login_page.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
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


<section class="vh-100">
    <div class="container-fluid h-100">
        <div class="row h-100 mx-1 mx-sm-2">
            <div class="col col-xl-12">
                <div class="card h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-6 col-xl-7 col-lg-7 d-none d-xs-none d-sm-none d-md-block">
                            <div id="carouselExampleIndicators" class="carousel w-100 slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner h-100">
                                    <div class="carousel-item active h-100">

                                        <img src="{{ URL::asset('assets/images/login_img/illustrator.svg') }}" alt=""
                                            class="">
                                        <div class="carousel-caption">
                                            <p>Your Data is Protected with
                                                <span class="text-orange">2048-Bit</span> Encryption, Bank Grade
                                                Security
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item  h-100">
                                        <img src="{{ URL::asset('assets/images/login_img/Chat support.svg') }}" alt=""
                                            class="">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p>Instant answers to
                                                your questions with <span class="text-orange">Chat Support</span></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item h-100">
                                        <img src="{{ URL::asset('assets/images/login_img/Payroll.svg') }}" alt=""
                                            class="">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p> Quickest Salary Payout is here!
                                                Transfer Salaries in less than <span class="text-orange">2 mins</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item h-100">
                                        <img src="{{ URL::asset('assets/images/login_img/Certified.svg') }}" alt=""
                                            class="">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p><span class="text-danger">Quality</span> and <span
                                                    class="text-danger">Information</span> Security Management
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleSlides" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleSlides" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 col-xl-5 col-lg-5 d-flex align-items-center right-cotent">
                            <div class="card-body  p-4 p-lg-5 te1xt-black login-card">
                                <form action="{{ route('login') }}" method="POST" class="login-form">
                                    <div class="d-flex align-items-center justify-content-center mb-3">
                                        <img src="{{ URL::asset($generalInfo->logo_img) }}" alt="" class="">
                                    </div>
                                    <p class="m-0   h5 fw-bold log">Login <span class="mr-1">to</span><span
                                            class="m-0 fw-bold h4 mr-1">ABS</span><small
                                            class="text-orange fw-bold f-10">hrms</small></p>
                                    <p class="text-muted f-10 mb-2">Login to run your business together</p>


                                    @csrf
                                    <div class="form-outline mb-3 form-row">
                                    <input type="text"
                                                class="form-control textbox  @error('user_code') is-invalid @enderror"
                                                value="{{ old('user_code', 'ADMIN100') }}"
                                                id="user_code" name="user_code" placeholder="Employee Code">
                                        <label for="" class="float-label">Employee Code</label>
                                        @error('user_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-1    form-row">
                                        <input type="password"
                                            class="form-control textbox @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" id="password-input"
                                            value="Abs@123123">
                                        <label for="" class="float-label">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    @if(count($errors) > 0)
                                    @foreach( $errors->all() as $message )
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span>{{ $message }}</span>
                                    </div>
                                    @endforeach
                                    @endif

                                    <div class="d-flex justify-content-end align-items-center mb-3">
                                        <a href="#!" class="f-12 text-orange">Forgot password?</a>
                                    </div>

                                    <button
                                        class="btn btn-orange btn-md fw-bold sign-in-btn   waves-effect waves-light w-100"
                                        type="submit">Log-In</button>


                                    <div class="divider d-flex align-items-center my-4 px-2 mx-5">
                                        <span class="text-center fw-bold mx-3 mb-0 text-muted">OR</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center social-icons-wrapper">
                                        <a href="https://accounts.google.com/signin" class="mr-5">

                                            <img src="{{ URL::asset('assets/images/login_img/google.png') }}" alt=""
                                                class="h-50 w-25">
                                        </a>
                                        <a href="https://www.linkedin.com/login" class="mr-5">

                                            <img src="{{ URL::asset('assets/images/login_img/linkedIn_PNG39.png') }}"
                                                alt="" class="h-50 w-25">
                                        </a>
                                        <a class="mr"
                                            href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1658217648&rver=7.0.6738.0&wp=MBI_SSL&wreply=https:%2F%2Faccount.microsoft.com%2Fauth%2Fcomplete-signin%3Fru%3Dhttps%253A%252F%252Faccount.microsoft.com%252F%253Frefp%253Dsignedout-index%2526refd%253D127.0.0.1&lc=1033&id=292666&lw=1&fl=easi2">

                                            <img src="{{ URL::asset('assets/images/login_img/microsoft_PNG18.png') }}"
                                                alt="" class="h-50 w-25">
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center my-4  available-app justify-content-center ">

                                        <span class="f-12 mr-3">Available On</span>
                                        <a href="#" class="mx-2">
                                            <img src="{{ URL::asset('assets/images/Google_Play_Store.png') }}" alt=""
                                                class="">
                                        </a>
                                        <a href="#" class="">
                                            <img src="{{ URL::asset('assets/images/apple_play_store.png') }}" alt=""
                                                class="">
                                        </a>

                                    </div>
                                    <div
                                        class="d-flex text-center align-items-center mt-2 power-by-logo justify-content-center">

                                        <a href="#" class="">
                                            <span class="f-12">Powered by</span>
                                            <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt=""
                                                class="h-25 w-25 ">
                                        </a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="login-bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    var temp = '{{ $cacheStatus}}';
    console.log(temp);

    var allCookies = document.cookie.split(';');

    for (var i = 0; i < allCookies.length; i++)
        document.cookie = allCookies[i] + "=;expires="
        + new Date(0).toUTCString();

    console.log("All cookies cleared");

});
</script>

@endsection
