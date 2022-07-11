@extends('layouts.master-without-nav')
@section('title')
@lang('translation.signin')
@endsection
@section('css')



<style>

/* ===================================== Import Less ================================== */
@font-face {
    font-family: 'mouse-300';
    src: url("../fonts/RobotoSlab-Regular.ttf") format("truetype");
}

@font-face {
    font-family: 'mouse-500';
    src: url("../fonts/RobotoSlab-Bold.ttf") format("truetype");
}

/* ===================================== Basic CSS ================================== */
* {
    margin: 0px;
    padding: 0px;
    list-style: none;
}

img {
    max-width: 100%;
}


.form-row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -5px;
    margin-left: -5px;
}

a {
    text-decoration: none;
    outline: none;
    color: #444;
}

a:hover {
    color: #444;
}

ul {
    margin-bottom: 0;
    padding-left: 0;
}

a:hover,
a:focus,
input,
textarea {
    text-decoration: none;
    outline: none;
}

.center {
    text-align: center;
}

.left {
    text-align: left;
}

.right {
    text-align: right;
}

.cp {
    cursor: pointer;
}

html,
body {
    height: 100%;
}

p {
    margin-bottom: 0px;
    width: 100%;
}

.no-padding {
    padding: 0px;
}

.no-margin {
    margin: 0px;
}

.hid {
    display: none;
}

.top-mar {
    margin-top: 15px;
}

.h-100 {
    height: 100%;
}

::placeholder {
    color: #747f8a !important;
    font-size: 13px;
    opacity: .5 !important;
}

.container-fluid {
    padding: 0px;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "mouse-500", Arial, Helvetica, sans-serif;
}

strong {
    font-family: "mouse-500", Arial, Helvetica, sans-serif;
}

body {
    background-color: #f7f7ff !important;
    font-family: "mouse-300", Arial, Helvetica, sans-serif;
    color: #6A6A6A;
}

.session-title {
    padding: 30px;
    margin: 0px;
}

.session-title h2 {
    width: 100%;
    text-align: center;
}

.session-title p {
    max-width: 850px;
    text-align: center;
    float: none;
    margin: auto;
}

.session-title span {
    float: right;
    font-style: italic;
}

.inner-title {
    padding: 20px;
    padding-left: 0px;
    margin-bottom: 30px;
}

.inner-title h2 {
    width: 100%;
    text-align: center;
    font-size: 2rem;
    font-family: "slab", Arial, Helvetica, sans-serif;
}

.inner-title p {
    width: 100%;
    text-align: center;
}

.page-nav {
    padding: 40px;
    text-align: center;
    padding-top: 160px;
}

.page-nav ul {
    float: none;
    margin: auto;
}

.page-nav h2 {
    font-size: 36px;
    width: 100%;
    color: #444;
}

@media screen and (max-width: 600px) {
    .page-nav h2 {
        font-size: 26px;
    }
}

.page-nav ul li {
    float: left;
    margin-right: 10px;
    margin-top: 10px;
    font-size: 16px;
}

.page-nav ul li i {
    width: 30px;
    text-align: center;
    color: #444;
}

.page-nav ul li a {
    color: #444;
}

.soc-det .btn-success {
    background-color: #863dd9;
    border-color: #863dd9;
}


.btn-success:hover {
    background-color: #863dd9 !important;
    border-color: #863dd9 !important;
}

.btn-success:active {
    background-color: #863dd9 !important;
    border-color: #863dd9 !important;
}

.btn-success:focus {
    background-color: #863dd9 !important;
    border-color: #863dd9 !important;
    box-shadow: none !important;
}

.btn-info {
    background-color: #4f6dcd;
    border-color: #4f6dcd;
}

.btn-info:hover {
    background-color: #4f6dcd !important;
    border-color: #4f6dcd !important;
}

.btn-info:active {
    background-color: #4f6dcd !important;
    border-color: #4f6dcd !important;
}

.btn-info:focus {
    background-color: #4f6dcd !important;
    border-color: #4f6dcd !important;
    box-shadow: none !important;
}

.btn {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #FF4D00 !important;

    color: white !important;
    font-weight: 600 !important;
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12) !important;
}

.form-control:focus {
    box-shadow: none !important;
    border: 2px solid #863dd9;
}

.btn-light {
    background-color: #FFF;
    color: #3F3F3F;
}

.collapse.show {
    display: block !important;
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid #863dd9 !important;
}

.form-control {
    background-color: #F8F8F8;
    margin-bottom: 20px;
}

.form-control:focus {
    background-color: #FFF;
    border-color: #CCC;
}

.container {
    max-width: 1100px;
}

@media screen and (max-width: 575px) {
    .container {
        padding: 20px 30px;
    }
}

/* ===================================== Body CSS ================================== */
body {
    height: 100%;
}

.conya {

    width: 100%;
    height: 100%;
    padding: 10px;
}

.main {
    width: 100%;
    height: 100%;
    background-image: url(../images/hrmslog.jpg);
    background-position: center;
    background-size: 100% 100%;
    background-repeat: no-repeat;


}

.slidrow {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.sidecol2 {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.side-right form{
    background-color: #FFF;
    height: 550px;
    width: 400px;
    margin-left: 40px;
    padding: 4px 30px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 1px 0px 4px rgba(74, 73, 73, 0.315);
    /* box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px,rgb(255 124 19) 0px 2px 16px 0px,
    rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; */
}
/* .side-right form:before{
   content:'';
   position:absolute; 
   top:-2px;
   bottom:-2px;
   left:-2px;
   right:-2px;
   background:#fff;
   z-index:-1;
}
.side-right form:after{
   content:'';
   position:absolute; 
   top:-2px;
   bottom:-2px;
   left:-2px;
   right:-2px;
   background:#fff;
   z-index:-2;
   filter:blur(40px);
}

.side-right form:after,
.side-right form:before{
background:linear-gradient(235deg,#89ff00,#060c21,#00bcd4);
} */

@media screen and (max-width: 660px) {
    .side-right {
        width: 100%;
    }
}

.side-right .logo {
    width: 200px;
}

.side-right .soc-det {
    display: flex;
}

.side-right .soc-det ul {
    float: none;
    margin: auto;
}



.soc-det {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.soc-det hr {
    color: black;
    opacity: 0.1;
    height: 5px !important;
}


/* .side-right .soc-det ul li {
        float: left;
        padding: 8px;
        background-color: #FFF;
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        border-radius: 2px;
        width: 35px;
        height: 35px;
        border-radius: 50px;
        margin-left: 10px;
        font-size: 12px; }
        .side-right .soc-det ul li i {
          color: #FFF; }
     
      .side-right .soc-det ul .twitter {
        background-color: #19a1f7; }
      .side-right .soc-det ul .pin {
        background-color: #db443b; }
      .side-right .soc-det ul .link {
        background-color: #007ab4; } */
.side-right h2 {
    font-size: 20px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: 700;
    padding: 2px 0px;
}

.side-right h2 span {

    font-size: 14px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: 500;
}

.side-right .form-row label {
    font-size: .8rem;
}

.side-right .skjh {
    font-size: .8rem;
}

.side-right .skjh span {
    float: right;
}

.dfr {
    padding: 20px 10px;
    text-align: center;
}

.dfr .btn {
    /* padding: 5px 40px; */
    /* border-radius: 50px; */
    float: none;
    margin: auto;
}

@media screen and (max-height: 630px){
    .soc-det-img {
        height: 10% !important;
    }
    .dfr {
        padding: 5px 10px !important;
    }
    .side-right {
        height: 85% !important;
    }
}


.login-headers {}
</style>
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
                <form action="{{ route('login') }}" method="POST">
                    <div class="login-headers text-align-left my-1 ">
                        <div class="logo-change   d-flex align-items-center justify-content-center">
                            <img src="{{ URL::asset($generalInfo->logo_img) }}" alt="" class="">
                        </div>
                        <div class="login-logo  d-flex align-items-center">
                            <span class="m-0 mt-1 fw-bold log">Login <span class="mt-1 mx-1">to</span> <img
                                    src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="" style="height:35px;width:55px;">

                        </div>
                    </div>
                    @csrf

                    <div class="form-row">
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


                    <div class="form-row">
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

                    <div class="form-row row skjh ">
                        <div class="col-7 left p-0">
                            <label for=""><input type="checkbox" class="mx-1 m-0 ">Keep me Sign In</label>
                        </div>
                        <div class="col-5">
                            <span> <a href="">Forget Password ?</a></span>
                        </div>


                    </div>


                    <div class="form-row dfr  ">
                        <button class="btn sign-in-btn text-white  waves-effect waves-light w-50"
                            type="submit">Log-In</button>
                    </div>


                    <div class="divider d-flex align-items-center mb-1">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                    </div>


                    <div class="soc-det">

                        <img src="{{ URL::asset('assets/images/social.png') }}" alt="" class=" w-100 soc-det-img ">



                        <!-- <ul>
                                <li class="facebook"><i class="fab fa-facebook-f"></i></li>
                                <li class="twitter"><i class="fab fa-twitter"></i></li>
                                <li class="pin"><i class="fab fa-pinterest-p"></i></li>
                                <li class="link"><i class="fab fa-linkedin-in"></i></li>
                               
                            </ul> -->



                        <hr class="w-100 ">


                        <img src="{{ URL::asset('assets/images/Group 4.png') }}" alt="" class="  w-100 h-25 mx-3 px-3">
                    </div>


                </form>



            </div>

        </div>

    </div>

</div>


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js')}}"></script>


@endsection