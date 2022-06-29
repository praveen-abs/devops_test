@extends('layouts.master-without-nav')
@section('title')
@lang('translation.signin')
@endsection
@section('content')
<div class="container-fluid conya">
    <div class="side-left">
        <div class="sid-layy">
            <div class="row slid-roo">

            </div>
        </div>
    </div>
    <div class="side-right">
        <div class="text-center mt-5">
            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="brand-logo" class="h-50 w-50 mt-3">
        </div>
        <div class="p-2 mt-2">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-2">
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

                <div class="mb-2">

                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-2">
                        <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror"
                            name="password" placeholder="Enter password" id="password-input" value="123123123">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                            type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                    <label class="form-check-label" for="auth-remember-check">Remember
                        me</label>
                    <div class="float-end">
                        <a href="auth-pass-reset-basic" class="text-muted">Forgot
                            password?</a>
                    </div>
                </div>


                <div class="mt-4 text-center">
                    <button class="btn sign-in-btn text-white  waves-effect waves-light w-50"
                        type="submit">Sign-In</button>

                </div>
                <!-- <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ?</p>
                                    </div> -->
                <div class="mb-2">

                    <div class="divider d-flex align-items-center my-3 mb-2">
                        <p class="text-center  mx-3 mb-0 text-muted">OR</p>
                    </div>

                </div>
                <div class="mb-2">

                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <div>
                            <p class="text-center mb-2 text-muted">Connect with</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <button class="btn  mx-2 google-btn text-white rounded-circle">
                                <span class="ri-google-fill"></span>
                                <!-- Google -->
                            </button>
                            <button class="btn  mx-2 linked-in-btn text-white rounded-circle">
                                <span class="ri-linkedin-fill "></span>
                                <!-- Linked-in -->
                            </button>
                            <button class="btn btn primary mx-2 facebook-btn text-white rounded-circle">
                                <span class="ri-facebook-fill "></span>
                                <!-- Facebook -->
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <!-- <div class="power-by text-center mb-2">
            <p class="mx-2">Powered By</p>
        </div> -->
        <div class="d-flex justify-content-center align-items-center mt-5">
            <img src="{{ URL::asset('assets/images/powerby.png') }}" alt="brand-logo" class="mx-2 w-100 h-75">
        </div>
    </div>

</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js')}}"></script>




<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

@endsection