@extends('layouts.master-without-nav')
@section('title')
@lang('translation.signin')
@endsection
@section('content')
<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <!-- <div class="bg-overlay"></div> -->

        <!-- <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div> -->
        <!-- <div style=" position:absolute;bottom:-200px;width:100%;height:50px;">
            <img src="{{ URL::asset('assets/images/whitetexture.jpg')}}" alt="" height="1000">
        </div> -->
    </div>
    <!-- auth page content -->
    <div class="auth-page-content my-5">
        <div class="container-fluid  my-5 w-75 h-75 auth-container">



            <div class="card m-4 p-4">
                <div class="card-body ">
                    <div class="row d-flex justify-content-center  align-items-center h-100">

                        <div class="col-md-9 col-lg-6 col-xl-5">
                            <div class="right-content-logo w-100 h-100">
                                <img src="{{ URL::asset($generalInfo->background_img)}}" alt="brand-logo"
                                    class="h-100 w-100">
                            </div>
                        </div>



                        <div class="col-md-8 col-lg-6 col-xl-5">

                            <div class="text-center mt-2">
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset($generalInfo->logo_img)}}" alt="brand-logo"
                                        class="h-50 w-50">
                                </a>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', 'admin@gmail.com') }}" id="username"
                                            name="email" placeholder="Enter username">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-pass-reset-basic" class="text-muted">Forgot
                                                password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password"
                                                class="form-control pe-5 @error('password') is-invalid @enderror"
                                                name="password" placeholder="Enter password" id="password-input"
                                                value="123456">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember
                                            me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn signIn-btn w-100" type="submit">Sign-In</button>
                                    </div>
                                    <!-- <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ?</p>
                                    </div> -->

                                </form>
                            </div>
                        </div>

                        <!-- end card body -->
                    </div>

                    <!-- end card -->


                </div>

                <!-- end row -->


            </div>
        </div>

        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->

    <!-- end Footer -->
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js')}}"></script>

@endsection