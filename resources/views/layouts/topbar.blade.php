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
@php
// $currentUser = Auth::user();
// $User = Auth::user()->unreadNotifications->count();
// $splitArray = explode(" ",$currentUser->name);
// dd($splitArray[0][0]);

@endphp

<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex container-fluid">
                <!-- disable setting icon for employee -->
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex ">
                        <button type="button" class="btn btn-sm fs-16 vertical-menu-btn topnav-hamburger border-0 outline-none"
                            id="topnav-hamburger-icon" >
                            <span class="hamburger-icon open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="topbar-logo mx-2 d-felx align-items-center">
                            @php
                                $client_logo =  App\Models\VmtGeneralInfo::first()->logo_img;
                            @endphp

                            @if( file_exists(public_path($client_logo)) )
                                <img src=" {{URL::asset($client_logo)}}"  alt="" class="">
                            @endif
                        </div>

                        <div class="topbar-search-bar search-content d-flex ms-5 align-items-center"
                            >

                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control py-1 rounded-pill"
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
                                                 $User = Auth::user()->unreadNotifications->count();
                                                 $splitArray = "A";
                                            @endphp

                                            @foreach ($currentUser->unreadNotifications  as $notification)
                                                <div class="text-reset notification-item d-block dropdown-item">
                                                    <div class="d-flex">
                                                        @if( empty(Auth::user()->avatar) || !file_exists(public_path('images/'. Auth::user()->avatar)) )
                                                            @php
                                                                // $splitArray = explode(" ",$currentUser->emp_name);
                                                                // // print_r($currentUser->emp_name);
                                                                // if(count($splitArray) == 1)
                                                                //     $name = strtoupper($splitArray[0][0].$splitArray[0][1]);
                                                                // else
                                                                //     $name = strtoupper($splitArray[0][0].$splitArray[1][0]);


                                                            @endphp
                                                                <span class="rounded-circle user-profile  ml-2">
                                                                    <i class="align-middle ">{{ "A" }}</i>
                                                                </span>
                                                        @else
                                                            <img class="rounded-circle header-profile-user" src=" {{URL::asset('images/'. Auth::user()->avatar)}}" alt="Header Avatar">
                                                        @endif


                                                            &nbsp;&nbsp;&nbsp;
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
                                            @endforeach
                                            @php
                                             foreach ($currentUser->Notifications  as $notification) {
                                                // if($notification){
                                            @endphp
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                        @php
                                                            // $splitArray = explode(" ",$currentUser->emp_name);

                                                            // if(count($splitArray) == 1)
                                                            //     $name = strtoupper($splitArray[0][0].$splitArray[0][1]);
                                                            // else
                                                            //     $name = strtoupper($splitArray[0][0].$splitArray[1][0]);
                                                            // if (Auth::user()->avatar == null || Auth::user()->avatar =='' ){
                                                        @endphp
                                                            <span class="rounded-circle user-profile  ml-2"><i
                                                                class="align-middle f-12 fw-bold">A</i></span>
                                                        @php
                                                         //   }else{
                                                        @endphp
                                                            <img src="{{URL::asset('images/'. Auth::user()->avatar)}}"
                                                                                class="me-3 rounded-circle avatar-xs" alt="">
                                                            @php
                                                         //   }
                                                        @endphp
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
                                     @if( empty(Auth::user()->avatar) || !file_exists(public_path('images/'. Auth::user()->avatar)) )
                                        <span class="rounded-circle user-profile  ml-2">
                                            <i id="topbar_username" class="align-middle "></i>
                                        </span>
                                    @else
                                        <img class="rounded-circle header-profile-user" src=" {{URL::asset('images/'. Auth::user()->avatar)}}" alt="Header Avatar">
                                    @endif

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
<!-- added jquery script temporarily here since Jquery plugin is not loaded at this point -->
<script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>

<script>

    function generateProfileShortName_Topbar()
    {
        var username = '{{auth()->user()->name ?? ''}}';
        const splitArray = username.split(" ");
        var finalname ="empty111";

        if( splitArray.length == 1)
        {
            finalname = splitArray[0][0] +""+ splitArray[0][1];
        }else
        {
            if(splitArray[0].length == 1)
                finalname = splitArray[0][0] +""+ splitArray[1][0];
            else
                finalname = splitArray[0][0] +""+ splitArray[0][1];
        }

        var a = $('#topbar_username').text(finalname);
    }

    generateProfileShortName_Topbar();

</script>

