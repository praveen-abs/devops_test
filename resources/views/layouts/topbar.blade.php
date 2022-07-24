@section('css')
<link href="{{ URL::asset('assets/css/topbar.css') }}" rel="stylesheet">
@endsection


<?php
    $logoObj = \DB::table('vmt_general_info')->first();

    if($logoObj){
        $logoSrc = $logoObj->logo_img;
    }else{
        $logoSrc = 'assets/images/vasa.jpg';
    }
   // dd($logoSrc);
?>

<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex container-fluid">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
                        </span>
                    </a>

                    <a href="index" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
                        </span>
                    </a>
                </div>


                <!-- disable setting icon for employee -->


                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex w-50">
                        <button type="button" class="btn btn-sm  fs-16  vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="topbar-logo mx-2" style="width:100px">
                            <!-- <img src="{{ URL::asset($logoSrc) }}" alt="" class="w-100 h-100"> -->
                            <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" class="w-100 h-100">
                        </div>

                        <div class="topbar-search-bar search-content d-flex  align-items-center w-50 " style="left:60px">

                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control  w-100 py-1 rounded-pill"
                                placeholder="Search">
                        </div>
                    </div>


                    <div class="notify-content d-flex justify-content-center align-items-center">
                        @hasrole("Employee")

                        @else
                        <!-- <button class="settings-icon border-0 bg-transparent">

                            <a href="vmt_topbar_settings" class="p-0 pr-1">
                                <i class="ri-settings-3-line ">
                                </i>
                            </a>
                        </button> -->
                        @endhasrole

                        <div class="dropdown topbar-head-dropdown ms-1 ">
                            <button type="button" class="btn btn-icon btn-topbar rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18.798" height="22.911"
                                    viewBox="0 0 18.798 22.911">
                                    <path id="ic_notifications_none_24px"
                                        d="M13.4,25.411a2.357,2.357,0,0,0,2.35-2.35h-4.7A2.357,2.357,0,0,0,13.4,25.411Zm7.049-7.049V12.487c0-3.607-1.915-6.626-5.287-7.425v-.8a1.762,1.762,0,0,0-3.525,0v.8c-3.36.8-5.287,3.807-5.287,7.425v5.875L4,20.711v1.175H22.8V20.711ZM18.1,19.536H8.7V12.487C8.7,9.573,10.474,7.2,13.4,7.2s4.7,2.373,4.7,5.287Z"
                                        transform="translate(-4 -2.5)" fill="#361338" opacity="0.4" />
                                </svg>
                                <span class="badge badge-light fs-10 translate-middle badge rounded-pill bg-danger">{{$User = Auth::user()->notifications->count();}}</span>
                                {{-- <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"><span
                                        class="visually-hidden"></span> --}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge badge-soft-light fs-13"> {{$User = Auth::user()->notifications->count();}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                            id="notificationItemsTab" role="tablist">

                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                                    aria-select ed="false">
                                                    Messages
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    {{-- <div class="avatar-xs me-3">
                                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                                    </div> --}}
                                                    <div class="flex-1">
                                                        @php
                                                        $currentUser = Auth::user();
                                                        $User = Auth::user()->notifications->count();

                                                        foreach ($currentUser->notifications as $notification) {
                                                        @endphp
                                                        <a  class="stretched-link rIcon"><i class="fa fa-dot-circle-o mt-0 mb-2 lh-base"><h7>&nbsp;
                                                          @php echo
                                                                $notification->data['message']; @endphp</h7></i>
                                                        </a>

                                                        @php

                                                        }
                                                        @endphp



                                                    </div>

                                                </div>
                                            </div>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">


                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel"
                                        aria-labelledby="messages-tab">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow
                                                                forecast's
                                                                graph 🔔.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Mentionned you in his comment on 📃 invoice
                                                                #12501. </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 10 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 3 days
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-3 text-center">
                                                <button type="button"
                                                    class="btn btn-soft-success waves-effect waves-light">View
                                                    All Messages <i
                                                        class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel"
                                        aria-labelledby="alerts-tab">
                                        <div class="w-25 w-sm-50 pt-3 mx-auto">
                                            <img src="{{ URL::asset('assets/images/svg/bell.svg') }}" class="img-fluid"
                                                alt="user-pic">
                                        </div>
                                        <div class="text-center pb-5 mt-2">
                                            <h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a href="" class="ml-2  settings-icon   ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.494" height="23.353"
                                viewBox="0 0 23.494 23.353">
                                <g id="megaphone" transform="translate(0 -1.529)">
                                    <g id="Group_3534" data-name="Group 3534" transform="translate(0 1.529)">
                                        <g id="Group_3533" data-name="Group 3533" transform="translate(0 0)">
                                            <circle id="Ellipse_256" data-name="Ellipse 256" cx="0.7" cy="0.7" r="0.7"
                                                transform="translate(2.962 7.04)" fill="#aea0af" />
                                            <path id="Path_2943" data-name="Path 2943"
                                                d="M20.054,7.188V3.86a2.317,2.317,0,0,0-3.422-2.034l-6.116,3.78h-8.2A2.32,2.32,0,0,0,0,7.923V14.9a2.32,2.32,0,0,0,2.317,2.317H3.369v6.809a.854.854,0,0,0,.854.854H8.063a.854.854,0,0,0,.854-.854V17.219h1.6c6.486,4.009,6.129,3.79,6.182,3.817a2.317,2.317,0,0,0,3.356-2.071V15.637A4.314,4.314,0,0,0,20.054,7.188ZM7.21,23.174H5.076V17.219H7.21Zm7.2-5.556-3.2-1.979a.854.854,0,0,0-.449-.128H2.317a.61.61,0,0,1-.609-.609V7.923a.61.61,0,0,1,.609-.609h8.441a.854.854,0,0,0,.449-.128l3.2-1.979Zm3.081,1.9-1.373-.849V4.152L17.491,3.3a.609.609,0,0,1,.855.557c0,.642,0,14.47,0,15.1A.609.609,0,0,1,17.491,19.522Zm2.563-5.651V8.954A2.605,2.605,0,0,1,20.054,13.871Z"
                                                transform="translate(0 -1.529)" fill="#aea0af" />
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            </i>
                        </a>

                        <div class="dropdown topbar-user ">
                            <button type="button" class="btn ml-1 py-0" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/'. Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="Header Avatar">

                                    <!-- <img class="rounded-circle mx-1 header-profile-user" 
                                        src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}"
                                        alt="Header Avatar"> -->
                                    <span class="text-start ms-xl-2">
                                        <span class="fw-bold">{{Auth::user()->name}}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                    </span>
                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome </h6>
                                <a class="dropdown-item" href="{{route('pages-profile')}}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>

                                @hasrole("Employee")

                                @else

                                <a class="dropdown-item" href="{{route('vmt_topbar_settings')}}"><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                @endhasrole

                                <!-- <div class="colors-content">
                            <button class="selectColor" id="colorOne" value="red">one</button>
                            
                        </div> -->


                                <a class="dropdown-item " href="javascript:void();"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="bx bx-power-off font-size-16 align-middle me-1"></i> <span
                                        key="t-logout">@lang('translation.logout')</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <div class="d-flex align-items-center">

                <!-- <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->

                <!-- <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @switch(Session::get('lang'))
                        @case('ru')
                            <img src="{{ URL::asset('/assets/images/flags/russia.svg') }}" class="rounded" alt="Header Language"
                                height="20">
                        @break
                        @case('it')
                            <img src="{{ URL::asset('/assets/images/flags/italy.svg') }}" class="rounded" alt="Header Language"
                                height="20">
                        @break
                        @case('sp')
                            <img src="{{ URL::asset('/assets/images/flags/spain.svg') }}" class="rounded" alt="Header Language"
                                height="20">
                        @break
                        @case('ch')
                            <img src="{{ URL::asset('/assets/images/flags/china.svg') }}" class="rounded" alt="Header Language"
                                height="20">
                        @break
                        @case('fr')
                            <img src="{{ URL::asset('/assets/images/flags/french.svg') }}" class="rounded" alt="Header Language"
                                height="20">
                        @break
                        @case('gr')
                            <img src="{{ URL::asset('/assets/images/flags/germany.svg') }}" class="rounded" alt="Header Language"
                                height="20">
                        @break
                        @default
                            <img src="{{ URL::asset('/assets/images/flags/us.svg') }}" class="rounded" alt="Header Language" height="20">
                    @endswitch
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <a href="{{ url('index/en') }}" class="dropdown-item notify-item language py-2" data-lang="en"
                            title="English">
                            <img src="{{ URL::asset('assets/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded" height="20">
                            <span class="align-middle">English</span>
                        </a>

                        <a href="{{ url('index/sp') }}" class="dropdown-item notify-item language" data-lang="sp"
                            title="Spanish">
                            <img src="{{ URL::asset('assets/images/flags/spain.svg') }}" alt="user-image" class="me-2 rounded" height="20">
                            <span class="align-middle">Española</span>
                        </a>

                        <a href="{{ url('index/gr') }}" class="dropdown-item notify-item language" data-lang="gr"
                            title="German">
                            <img src="{{ URL::asset('assets/images/flags/germany.svg') }}" alt="user-image" class="me-2 rounded"
                                height="20"> <span class="align-middle">Deutsche</span>
                        </a>

                        <a href="{{ url('index/it') }}" class="dropdown-item notify-item language" data-lang="it"
                            title="Italian">
                            <img src="{{ URL::asset('assets/images/flags/italy.svg') }}" alt="user-image" class="me-2 rounded" height="20">
                            <span class="align-middle">Italiana</span>
                        </a>

                        <a href="{{ url('index/ru') }}" class="dropdown-item notify-item language" data-lang="ru"
                            title="Russian">
                            <img src="{{ URL::asset('assets/images/flags/russia.svg') }}" alt="user-image" class="me-2 rounded" height="20">
                            <span class="align-middle">русский</span>
                        </a>

                        <a href="{{ url('index/ch') }}" class="dropdown-item notify-item language" data-lang="ch"
                            title="Chinese">
                            <img src="{{ URL::asset('assets/images/flags/china.svg') }}" alt="user-image" class="me-2 rounded" height="20">
                            <span class="align-middle">中国人</span>
                        </a>

                        <a href="{{ url('index/fr') }}" class="dropdown-item notify-item language" data-lang="fr"
                            title="French">
                            <img src="{{ URL::asset('assets/images/flags/french.svg') }}" alt="user-image" class="me-2 rounded" height="20">
                            <span class="align-middle">français</span>
                        </a>
                    </div>
                </div> -->

                <!-- View all apps button -->
                <!-- <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category-alt fs-22'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fw-semibold fs-15"> Web Apps </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="btn btn-sm btn-soft-info"> View All Apps
                                        <i class="ri-arrow-right-s-line align-middle"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/github.png') }}" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/bitbucket.png') }}" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/dribbble.png') }}" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/dropbox.png') }}" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/mail_chimp.png') }}" alt="mail_chimp">
                                        <span>Mail Chimp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ URL::asset('assets/images/brands/slack.png') }}" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- View Cart button -->
                <!-- <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-shopping-bag fs-22'></i>
                        <span
                            class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">5</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart"
                        aria-labelledby="page-header-cart-dropdown">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-soft-warning fs-13"><span class="cartitem-badge">7</span>
                                        items</span>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 300px;">
                            <div class="p-2">
                                <div class="text-center empty-cart" id="empty-cart">
                                    <div class="avatar-md mx-auto my-3">
                                        <div class="avatar-title bg-soft-info text-info fs-36 rounded-circle">
                                            <i class='bx bx-cart'></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-3">Your Cart is Empty!</h5>
                                    <a href="#" class="btn btn-success w-md mb-3">Shop Now</a>
                                </div>
                                <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-1.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details" class="text-reset">Branded
                                                    T-Shirts</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>10 x $32</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$<span class="cart-item-price">320</span></h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button"
                                                class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-2.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details"
                                                    class="text-reset">Bentwood Chair</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>5 x $18</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$<span class="cart-item-price">89</span></h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button"
                                                class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-3.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details" class="text-reset">
                                                    Borosil Paper Cup</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>3 x $250</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$<span class="cart-item-price">750</span></h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button"
                                                class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-6.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details" class="text-reset">Gray
                                                    Styled T-Shirt</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>1 x $1250</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$ <span class="cart-item-price">1250</span></h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button"
                                                class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                
                    </div>
                </div> -->

                <!-- other buttons -->
                <!-- <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-bell fs-22'></i>
                        <span
                            class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                                class="visually-hidden">unread messages</span></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">

                        <div class="dropdown-head bg-primary bg-pattern rounded-top">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                    </div>
                                    <div class="col-auto dropdown-tabs">
                                        <span class="badge badge-soft-light fs-13"> 4 New</span>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2 pt-2">
                                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                    id="notificationItemsTab" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab"
                                            aria-selected="true">
                                            All (4)
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                            aria-selected="false">
                                            Messages
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab"
                                            aria-selected="false">
                                            Alerts
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="tab-content" id="notificationItemsTabContent">
                            <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                        Optimization <span class="text-secondary">reward</span> is ready!
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link"><h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6></a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                        graph 🔔.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                                                    <i class='bx bx-message-square-dots'></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b class="text-success">20</b> new messages in the conversation</h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link"><h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6></a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-3 text-center">
                                        <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                            All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel"
                                aria-labelledby="messages-tab">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <div class="text-reset notification-item d-block dropdown-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link"><h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6></a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 30 min ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link"><h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6></a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                        graph 🔔.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link"><h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6></a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">Mentionned you in his comment on 📃 invoice #12501. </p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 10 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link"><h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6></a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 3 days ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-3 text-center">
                                        <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                            All Messages <i class="ri-arrow-right-line align-middle"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab">
                                <div class="w-25 w-sm-50 pt-3 mx-auto">
                                    <img src="{{ URL::asset('assets/images/svg/bell.svg') }}" class="img-fluid" alt="user-pic">
                                </div>
                                <div class="text-center pb-5 mt-2">
                                    <h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</header>




@section('script')
<!-- apexcharts -->
<!-- <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script> -->



@endsection