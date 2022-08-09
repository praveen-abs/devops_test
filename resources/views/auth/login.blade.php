@extends('layouts.master-without-nav')
@section('title')
@lang('translation.signin')
@endsection
@section('css')
<link href="{{ URL::asset('assets/css/login_page.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

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

<div class="login-wrpper bg-white">
    <div class="login-content h-100 px-3">
        <div class="row h-100">
            <div class="col-md-6 col-lg-6 col-xl-6 d-flex h-100 align-items-center justify-content-center left-content">
                <div class="login-left-content w-100 h-100 py-3 d-flex justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel w-100 slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active h-100">

                                <img src="{{ URL::asset('assets/images/login_img/illustrator.svg') }}" width="500"
                                    height="550" alt="" class="">
                                <div class="carousel-caption">
                                    <p>Your Data is Protected with
                                        <span class="text-orange">2048-Bit</span> Encryption, Bank Grade Security
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item  h-100">
                                <img src="{{ URL::asset('assets/images/login_img/Chat support.svg') }}" width="500"
                                    height="550" alt="" class="">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>Instant answers to
                                        your questions with <span class="text-orange">Chat Support</span></p>
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ URL::asset('assets/images/login_img/Payroll.svg') }}" width="500"
                                    height="550" alt="" class="">
                                <div class="carousel-caption d-none d-md-block">
                                    <p> Quickest Salary Payout is here!
                                        Transfer Salaries in less than <span class="text-orange">2 mins</span></p>
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ URL::asset('assets/images/login_img/Certified.svg') }}" width="500"
                                    height="550" alt="" class="">
                                <div class="carousel-caption d-none d-md-block">
                                    <p><span class="text-danger">Quality</span> and <span
                                            class="text-danger">Information</span> Security Management
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleSlides" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleSlides" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6">
                <div class="login-right-bg">
                    <div class="circle-1 d-flex align-items-center justify-content-center">
                        <div class="circle-2 d-flex align-items-center justify-content-center">
                            <div class="circle-3">
                                <div class="login-right-content ">
                                    <form action="{{ route('login') }}" method="POST" class="px-3">
                                        <div class="login-headers text-align-left mb-3">
                                            <div class="logo-change   d-flex align-items-center justify-content-center">
                                                <img src="{{ URL::asset($generalInfo->logo_img) }}" alt="" class="">
                                            </div>
                                            <div
                                                class="login-logo d-flex align-items-center justify-content-start  mb-1 flex-column">
                                                <p class="m-0 mt-1  h5 fw-bold log">Login <span
                                                        class="mr-1">to</span><span
                                                        class="m-0 fw-bold h4 mr-1">ABS</span><small
                                                        class="text-orange fw-bold f-10">hrms</small></p>
                                                <p class="text-muted f-10">Login to run your business together</p>
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="form-row mb-3">
                                            <input type="text"
                                                class="form-control textbox    @error('email') form-control-sm is-invalid @enderror"
                                                value="{{ old('email', 'hr_augustin@abshrms.com') }}"
                                                id="username" name="email" placeholder="Username   ">
                                            <label for="" class="float-label">Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-row ">
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
                                        <br>
                                        @if(count($errors) > 0)
                                        @foreach( $errors->all() as $message )
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @endforeach
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center my-1">
                                            <!-- Checkbox -->
                                            <div class="form-check mb-0">
                                                <!-- <input class="form-check-input " type="checkbox" value=""
                                                    id="form2Example3" />
                                                <label class="form-check-label f-12" for="form2Example3">
                                                    Remember me
                                                </label> -->
                                            </div>
                                            <a href="#!" class="f-12 my-1 text-orange">Forgot password?</a>
                                        </div>
                                        <div class="form-row d-flex justify-content-center my-1">
                                            <button
                                                class="btn btn-orange sign-in-btn text-white  waves-effect waves-light w-100"
                                                type="submit">Log-In</button>
                                        </div>
                                        <div class="divider d-flex align-items-center my-4 px-2 mx-5">
                                            <span class="text-center fw-bold mx-3 mb-0 text-muted">OR</span>
                                        </div>
                                        <div
                                            class="d-flex align-items-center justify-content-center social-icons-wrapper">
                                            <a href="https://accounts.google.com/signin" class="mr-5">
                                                <i class="ri-google-fill"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/login" class="mr-5">
                                                <i class="ri-linkedin-fill"></i>
                                            </a>
                                            <a class="mr"
                                                href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1658217648&rver=7.0.6738.0&wp=MBI_SSL&wreply=https:%2F%2Faccount.microsoft.com%2Fauth%2Fcomplete-signin%3Fru%3Dhttps%253A%252F%252Faccount.microsoft.com%252F%253Frefp%253Dsignedout-index%2526refd%253D127.0.0.1&lc=1033&id=292666&lw=1&fl=easi2">
                                                <i class="ri-windows-fill"></i>
                                            </a>
                                        </div>
                                        <div class="d-flex align-items-center mt-4 mb-5 available-app justify-content-center ">
                                            
                                                <span class="f-12 mr-3">Available</span>
                                                <a href="#" class="mx-2">
                                                    <img src="{{ URL::asset('assets/images/Google_Play_Store.png') }}"
                                                        alt="" class=" ">
                                                </a>
                                                <a href="#" class="">
                                                    <img src="{{ URL::asset('assets/images/apple_play_store.png') }}" alt=""
                                                        class="">
                                                </a>
                                            
                                        </div>
                                        <div class="d-flex align-items-center mt-5 power-by-logo justify-content-center">
                                            <span class="f-12">Powered by</span>
                                            <a href="#" class="">
                                                <img src="{{ URL::asset('assets/images/power_logo_abs.png     ') }}"
                                                    alt="" class="h-75 w-75 ">
                                            </a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-bottom">

    </div>
</div>



@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js')}}"></script>
@endsection