@extends('layouts.master-without-nav')
@section('title')
@lang('translation.signin')
@endsection
@section('content')
<div class="auth-page-wrapper p-2 ">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <!-- <div class="shape"> -->
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="100%" height="100%" preserveAspectRatio="none">
            <path class="path" width="100%" height="100%" fill="none" />
        </svg>
        <!-- </div> -->
        <!-- <div style=" position:absolute;bottom:-200px;width:100%;height:50px;">
            <img src="{{ URL::asset('assets/images/whitetexture.jpg')}}" alt="" height="1000">
        </div> -->
    </div>
    <!-- auth page content -->
    <div class="auth-page-content ">
        <div class="container-fluid auth-container mt-4">


            <div class="card m-2 p-2">
                <div class="card-body ">
                    <div class="row d-flex justify-content-center  align-items-center h-100">

                        <div class="col-md-9 col-lg-6 col-xl-5">
                            <div class="right-content-logo w-100 h-100">
                                <img src="{{ URL::asset($generalInfo->background_img)}}" alt="brand-logo"
                                    class="h-100 w-100">
                            </div>
                        </div>



                        <div class="col-md-8 col-lg-6 col-xl-4">

                            <div class="text-center mt-2">
                                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="brand-logo"
                                    class="h-50 w-50">
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', 'admin@gmail.com') }}" id="username" name="email"
                                            placeholder="Enter username">
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
                                        <button class="btn sign-in-btn text-white  waves-effect waves-light w-100"
                                            type="submit">Sign-In</button>

                                    </div>
                                    <!-- <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ?</p>
                                    </div> -->
                                    <div class="mb-3">

                                        <div class="divider d-flex align-items-center my-3 mb-2">
                                            <p class="text-center  mx-3 mb-0 text-muted">OR</p>
                                        </div>

                                    </div>
                                    <div class="mb-3">

                                        <div class="d-flex align-items-center justify-content-center flex-column">
                                            <div>
                                                <p class="text-center text-muted">Connect with</p>
                                            </div>
                                            <div class="d-flex align-items-center my-0">
                                                <button class="btn  mx-1 google-btn text-white">
                                                    <span class="ri-google-fill"></span>
                                                    Google
                                                </button>
                                                <button class="btn  mx-1 linked-in-btn text-white">
                                                    <span class="ri-linkedin-fill "></span>
                                                    Linked-in
                                                </button>
                                                <button class="btn btn primary mx-1 facebook-btn text-white">
                                                    <span class="ri-facebook-fill "></span>
                                                    Facebook
                                                </button>
                                            </div>
                                        </div>

                                    </div>
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