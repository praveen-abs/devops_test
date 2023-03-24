@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
@endsection


@section('content')
    <div class="integrations-auth-wrapper mt-30">

        <p class="f-17  mb-2">Integrations/Authentications</p>
        <div class="card  left-line mb-2">
            <div class="card-body  pb-0 pt-1">
                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted me-5" role="presentation">
                        <a class="nav-link active  pb-2" data-bs-toggle="tab" href="#applications_tab" aria-selected="true"
                            role="tab">
                            Applications
                        </a>
                    </li>

                    <li class="nav-item text-muted mx-4" role="presentation">
                        <a class="nav-link  pb-2" data-bs-toggle="tab" href="#bank_tab" aria-selected="true" role="tab">
                            Bank

                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @vite('resources/js/hrms/modules/configurations/integration_auth/integration_auth.js')
                          <div id="integration"></div>
<!--
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show fade  active " id="applications_tab" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="row mb-5">
                            <div class="col-4">
                                <p class="f-15">Integrated Apps</p>
                                <p class="text-muted fs-12">Here you can manage the integrated Apps</p>
                            </div>
                            <div class="col-4">
                                <div class="search-wrapper">
                                    <i class="fa fa-search search-icon"></i>
                                    <input type="text" name="" id="" class="search-input form-control"
                                        placeholder="Search App...">

                                </div>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#integrate_modal"><i
                                        class="fa fa-plus-circle me-2"></i>Add New </button>

                            </div>
                        </div>
                        <div class="row px-5 mb-4">
                            <div class="col-sm-12 col-xl-4 col-md-6 mb-5 col-lg-4 col-xxl-4 px-4">

                                <div class="card box-shadow-md custom-card">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="auth-logo">
                                                <img class=""
                                                    src="{{ URL::asset('assets/images/social-icons/office.png') }}" />

                                            </div>

                                            <label class="toggler">
                                                <input type="checkbox" class="toggler-input" data-bs-target="#officeModal"
                                                    data-bs-toggle="modal">
                                                <span class="toggler-slider toggler-round"></span>
                                            </label>

                                        </div>
                                        <p class="auth-heading">Office</p>

                                        <div class="auth-content">

                                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatemLorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatem</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12 col-xl-4 col-md-6 mb-5 col-lg-4 col-xxl-4 px-4">

                                <div class="card box-shadow-md custom-card">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="auth-logo">
                                                <img class=""
                                                    src="{{ URL::asset('assets/images/social-icons/smtp2.png') }}" />

                                            </div>

                                            <label class="toggler">
                                                <input type="checkbox" class="toggler-input" data-bs-target="#smtpModal"
                                                    data-bs-toggle="modal">
                                                <span class="toggler-slider toggler-round"></span>
                                            </label>

                                        </div>
                                        <p class="auth-heading">SMTP</p>

                                        <div class="auth-content">

                                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatemLorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatem</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12 col-xl-4 col-md-6 mb-5 col-lg-4 col-xxl-4 px-4">

                                <div class="card box-shadow-md custom-card">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="auth-logo">
                                                <img class="auth-img"
                                                    src="{{ URL::asset('assets/images/social-icons/google.png') }}" />

                                            </div>

                                            <label class="toggler">
                                                <input type="checkbox" class="toggler-input"
                                                    data-bs-target="#googleAuthModal" data-bs-toggle="modal">
                                                <span class="toggler-slider toggler-round"></span>
                                            </label>

                                        </div>
                                        <p class="auth-heading">Google</p>

                                        <div class="auth-content">

                                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatemLorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatem</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12 col-xl-4 col-md-6 mb-5 col-lg-4 col-xxl-4 px-4">

                                <div class="card box-shadow-md custom-card">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="auth-logo">
                                                <img class=""
                                                    src="{{ URL::asset('assets/images/social-icons/imap.png') }}" />

                                            </div>

                                            <label class="toggler">
                                                <input type="checkbox" class="toggler-input">
                                                <span class="toggler-slider toggler-round"></span>
                                            </label>

                                        </div>
                                        <p class="auth-heading">IMAP</p>

                                        <div class="auth-content">

                                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatemLorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatem</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12 col-xl-4 col-md-6 mb-5 col-lg-4 col-xxl-4 px-4">

                                <div class="card box-shadow-md custom-card">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="auth-logo">
                                                <img class=" "
                                                    src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" />

                                            </div>

                                            <label class="toggler">
                                                <input type="checkbox" class="toggler-input"
                                                    data-bs-target="#loginAuthModal" data-bs-toggle="modal">
                                                <span class="toggler-slider toggler-round"></span>
                                            </label>

                                        </div>
                                        <p class="auth-heading">OTP</p>

                                        <div class="auth-content">

                                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatemLorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatem</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12 col-xl-4 col-md-6 mb-5 col-lg-4 col-xxl-4 px-4">

                                <div class="card box-shadow-md custom-card">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="auth-logo">
                                                <img class=" "
                                                    src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" />

                                            </div>

                                            <label class="toggler">
                                                <input type="checkbox" class="toggler-input">
                                                <span class="toggler-slider toggler-round"></span>
                                            </label>

                                        </div>
                                        <p class="auth-heading"> Login</p>

                                        <div class="auth-content">

                                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatemLorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                Pariatur voluptatem</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                    <div class="tab-pane show fade   " id="bank_tab" role="tabpanel"
                        aria-labelledby="pills-profile-tab">



                    </div>
                </div>
            </div>
        </div> -->

        <div class="modal fade" id="integrate_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header ">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>App Details</h5>
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1">Upload a logo <span class="text-muted">(Optional)</span><i
                                        class="fa fa-exclamation-circle text-muted ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title=".png,jpg.jpeg"></i></p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="img-xl rounded-circle"
                                        src="{{ URL::asset('assets/images/avatar-1.jpg') }}" />

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">App Name</label>
                                    <input type="email" class="form-control" id="" placeholder="App name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control resize-none" placeholder="Description" id="" rows="3"></textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-orange">Submit</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade custom-modal" id="smtpModal" aria-hidden="true" aria-labelledby="" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header custom-modal-header border-0 ">
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-logo">
                            <img class="" src="{{ URL::asset('assets/images/social-icons/smtp2.png') }}" />

                        </div>
                        <p class="modal-heading">SMPT Authentication</p>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 col-xxl-6 mb-2">
                                <label for="" class="form-label">Host</label>
                                <input type="text" class="form-control" id="" placeholder="Host"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 col-xxl-6 mb-2">
                                <label for="" class="form-label">Port</label>
                                <input type="text" class="form-control" id="" placeholder="Port"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 col-xxl-6 mb-2">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" id="" placeholder="E-Mail"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 col-xxl-6 mb-2">
                                <label for="" class="form-label">Password</label>
                                <input type="text" class="form-control" id="" placeholder="E-Mail"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">Custom Equation</label>
                                <input type="text" class="form-control" id="" placeholder="Custom Equation"
                                    aria-describedby="">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal">Create Connection</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade custom-modal" id="loginAuthModal" aria-hidden="true" aria-labelledby="" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header custom-modal-header border-0 ">
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-logo">
                            <img class=" "
                                src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}" />

                        </div>
                        <p class="modal-heading">Authentication</p>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">API URL</label>
                                <input type="text" class="form-control" id="" placeholder="API URL"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">API KEY</label>
                                <input type="text" class="form-control" id="" placeholder="API KEY"
                                    aria-describedby="">
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal">Create Connection</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade custom-modal" id="googleAuthModal" aria-hidden="true" aria-labelledby="" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header custom-modal-header border-0 ">
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-logo">
                            <img class="" src="{{ URL::asset('assets/images/social-icons/google.png') }}" />

                        </div>
                        <p class="modal-heading">Google Authentication</p>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">API URL</label>
                                <input type="text" class="form-control" id="" placeholder="API URL"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">API KEY</label>
                                <input type="text" class="form-control" id="" placeholder="API KEY"
                                    aria-describedby="">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal">Create Connection</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade custom-modal" id="officeModal" aria-hidden="true" aria-labelledby="" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header custom-modal-header border-0 ">
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-logo">
                            <img class="" src="{{ URL::asset('assets/images/social-icons/office.png') }}" />

                        </div>
                        <p class="modal-heading">Office Authentication</p>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">API URL</label>
                                <input type="text" class="form-control" id="" placeholder="API URL"
                                    aria-describedby="">
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                <label for="" class="form-label">API KEY</label>
                                <input type="text" class="form-control" id="" placeholder="API KEY"
                                    aria-describedby="">
                            </div>


                            <div>
                                <div class=" custom-modal-header border-0 ">

                                    <div class="modal-logo">
                                        <img class=""
                                            src="{{ URL::asset('assets/images/social-icons/office.png') }}" />

                                    </div>
                                    <p class="modal-heading">Office Authentication</p>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                        <label for="" class="form-label">API URL</label>
                                        <input type="text" class="form-control" id="" placeholder="API URL"
                                            aria-describedby="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-2">
                                        <label for="" class="form-label">API KEY</label>
                                        <input type="text" class="form-control" id="" placeholder="API KEY"
                                            aria-describedby="">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-dismiss="modal">Create Connection</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection

    @section('script')
        <script></script>
    @endsection
