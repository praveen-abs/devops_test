@section('css')
<link href="{{ URL::asset('assets/css/top_bar.css') }}" rel="stylesheet">

<style>
    .page-header-user-dropdown span{
    height: 30px;
    width: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: aliceblue;

}



</style>

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
                        <button type="button" class="btn btn-sm fs-16 vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon" style="border: 0px;">
                            <span class="hamburger-icon open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="topbar-logo mx-2" style="width:100px">
                            <img src="{{ URL::asset($logoSrc) }}" alt="" class="w-100 h-100">
                            <!-- <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" class="w-100 h-100"> -->
                        </div>

                        <div class="topbar-search-bar search-content d-flex  align-items-center w-50 "
                            style="left:60px">

                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control  w-100 py-1 rounded-pill"
                                placeholder="Search">
                        </div>
                    </div>


                    <div class="notify-content d-flex justify-content-center align-items-center">
                        @hasrole("Employee")

                        @else
                        @endhasrole

                        <!--DROPDOWN CODE WAS HERE-->
                        <div class="dropdown topbar-head-dropdown ms-1 ">
                            <button type="button" class="btn btn-icon bg-transparent outline-none border-0 btn-topbar rounded-circle text-muted"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="border: 0px;">

                                <img src="{{ URL::asset('assets/images/bell.png') }}" alt="" class="" style="height:
                                    20px; width: 20px;">
                                    {{-- <button class="settings-icon bg-transparent outline-none border-0 text-muted"> --}}
                                        {{-- <i class="fa fa-bell" aria-hidden="true"></i> --}}
                                    {{-- </button> --}}
                                @if($User = Auth::user()->unreadNotifications->count() != 0 )
                                <span
                                    class="badge fs-10 translate-middle  rounded-circle  bg-danger">{{$User = Auth::user()->unreadNotifications->count();}}</span>
                                @endif
                                {{-- <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"
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
                                                <span class="badge badge-soft-light rounded-circle fs-13 bg-danger">
                                                    {{$User = Auth::user()->unreadNotifications->count();}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs  dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                            id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect active waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                                    aria-select ed="false">
                                                    Messages
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="notificationItemsTabContent">

                                    <div class="tab-pane fade show active py-2 ps-2 " id="messages-tab" role="tabpanel"
                                        aria-labelledby="messages-tab">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            @php
                                            $currentUser = Auth::user();
                                            $User = Auth::user()->unreadNotifications  ->count();
                                           // $read_id= Auth::user()->notifications()->where('id', $id)->first();
                                                // var_dump($currentUser->notifications);
                                            foreach ($currentUser->unreadNotifications  as $notification) {
                                                // if($notification){
                                            @endphp
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">

                                                    <img src="{{ URL::asset('assets/images/event1.png') }}"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <div class="fs-13 text-muted">
                                                <a href="{{url('notifications/'.$notification->id)}}" data-notif-id="{{$notification->id}}" class="text-primary">

                                             {{$notification->data['message']}}
                                </a>
                                                        </div>
                                                        <p class="mb-0 f-10 text-end text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <!-- <div class="px-2 fs-15">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div> -->
                                                </div>
                                            </div>
                                            @php
                                        // }
                                            }
                                            @endphp
                                            @php
                                             foreach ($currentUser->Notifications  as $notification) {
                                                // if($notification){
                                            @endphp
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">

                                                    <img src="{{ URL::asset('assets/images/event1.png') }}"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <div class="fs-13 text-muted">
                                 <a  href="{{url('notifications/'.$notification->id)}}" data-notif-id="{{$notification->id}}">
                                {{$notification->data['message']}}
                                 </a>
                                                        </div>
                                                        <p class="mb-0 f-11 text-end fw-mediumtext-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <!-- <div class="px-2 fs-15">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div> -->
                                                </div>
                                            </div>
                                            @php
                                        // }
                                            }
                                            @endphp

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        {{-- <a href="" class="ml-2  settings-icon   ">
                            <img src="{{ URL::asset('assets/images/megaphone.png') }}" class="" alt="user-pic"
                                style="height:20px;width:20px;">
                        </a> --}}
{{--
                        <button class="settings-icon bg-transparent outline-none border-0 text-muted">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>

                       </button> --}}
                        <button class="btn btn-icon bg-transparent outline-none border-0 btn-topbar rounded-circle text-muted">

                            <img src="{{ URL::asset('assets/images/megaphone.png') }}" class="" alt="user-pic"
                                style="height:20px;width:20px;">
                       </button>

                        <div class="dropdown topbar-user ">
                            <button type="button" class="btn border-0 mx-1 py-0" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center page-header-user-dropdown">
                                     <!-- <img class="rounded-circle header-profile-user" src="@if (Auth::user()->avatar != ''){{ URL::asset('images/'. Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"alt="Header Avatar"> -->

                                    @php
                                    preg_match('/(?:\w+\. )?(\w+).*?(\w+)(?: \w+\.)?$/',Auth::user()->name , $result);
                                    $name = strtoupper($result[1][0].$result[2][0]);

                                    if (Auth::user()->avatar == null || Auth::user()->avatar =='' ){
                                    @endphp
                                        <span class="rounded-circle user-profile  ml-2"><i
                                            class="align-middle f-12 fw-bold">{{$name}}</i></span>
                                    @php
                                    }else{
                                    @endphp
                                    <img class="rounded-circle header-profile-user"
                                        src="{{URL::asset('images/'. Auth::user()->avatar)}}" alt="Header Avatar">
                                    @php
                                    }
                                    @endphp

                                    <span class="text-start ms-xl-2 f-12 mx-2">
                                        <span class="">{{Auth::user()->name}}</span>
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

                                @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin'))

                                <a class="dropdown-item" href="{{route('vmt_topbar_settings')}}"><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                @endif


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
            </div>
        </div>
    </div>
</header>

@section('script')

@endsection

