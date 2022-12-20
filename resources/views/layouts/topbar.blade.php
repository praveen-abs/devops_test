@section('css')
<link href="{{ URL::asset('assets/css/top_bar.css') }}" rel="stylesheet">
<style>




    .topbar-logo {
        height: 30px;
        width: 100px;
    }

    .topbar-logo img {
        height: 100%;
        width: 100%;
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
                    <div class="d-flex  align-items-center">
                        <button type="button" class="btn btn-sm fs-16 vertical-menu-btn topnav-hamburger border-0 outline-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="topbar-logo mx-2 d-felx align-items-center">
                            @php
                            $client_logo = App\Models\VmtGeneralInfo::first()->logo_img;
                            @endphp

                            @if( file_exists(public_path($client_logo)) )
                            <img src=" {{URL::asset($client_logo)}}" alt="" class="">
                            @endif
                        </div>

                        <div class="search-content ms-2 ">

                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control py-1 rounded" placeholder="Search">
                        </div>
                    </div>

                    <div class="notify-content d-flex justify-content-center align-items-center">

                        <!--DROPDOWN CODE WAS HERE-->



                        {{-- <a href="" class="ml-2  settings-icon   ">
                            <img src="{{ URL::asset('assets/images/megaphone.png') }}" class="" alt="user-pic"
                        style="height:20px;width:20px;">
                        </a> --}}
                        {{--
                        <button class="settings-icon bg-transparent outline-none border-0 text-muted">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>

                       </button> --}}
                        {{-- <button class="btn btn-icon bg-transparent outline-none border-0 btn-topbar rounded-circle text-muted">

                            <img src="{{ URL::asset('assets/images/megaphone.png') }}" class="" alt="user-pic" style="height:20px;width:20px;">
                        </button> --}}
                        @if( Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR","Manager"]) && hasSubClients() )

                        <div class="dropdown topbar-user ">
                            <button type="button" class="btn border-0  mx-1 shadow-sm " id="choose_client" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <p class=" " id="">
                                    Choose Client <i class="fa fa-caret-down ms-2" aria-hidden="true"></i>
                                </p>

                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <?php $clientsList = fetchClients() ?>
                                @foreach($clientsList as $client)
                                <a class="dropdown-item " onclick="updateGlobalClient('{{$client->id}}');">{{$client->client_name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="dropdown topbar-user ">
                            <button type="button" class="btn border-0 mx-1 py-1 shadow-sm" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center page-header-user-dropdown">
                                    @if( empty(Auth::user()->avatar) || !file_exists(public_path('images/'. Auth::user()->avatar)) )
                                    <!-- <span class="rounded-circle user-profile  ml-2 " id="shorthand_name_bg"> -->
                                    <span class="rounded-circle user-profile  ml-2 " id="">
                                        <i id="topbar_username" class="align-middle "></i>
                                    </span>
                                    @else
                                    <img class="rounded-circle header-profile-user" src=" {{URL::asset('images/'. Auth::user()->avatar)}}" alt="Header Avatar">
                                    @endif

                                    <span class="f-12 mx-2 d-flex align-items-center">
                                        <span class="">{{Auth::user()->name}}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                        <i class="fa fa-caret-down ms-2" aria-hidden="true"></i>
                                    </span>

                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome </h6>
                                <a class="dropdown-item" href="{{route('pages-profile')}}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>

                                @if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]) )

                                <a class="dropdown-item" href="{{route('vmt_topbar_settings')}}"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                @endif


                                <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span key="t-logout">@lang('translation.logout')</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }



    function generateProfileShortName_Topbar() {
        var username = '{{auth()->user()->name ?? '
        '}}';
        const splitArray = username.split(" ");
        var finalname = "empty111";

        if (splitArray.length == 1) {
            finalname = splitArray[0][0] + "" + splitArray[0][1];
        } else {
            if (splitArray[0].length == 1)
                finalname = splitArray[0][0] + "" + splitArray[1][0];
            else
                finalname = splitArray[0][0] + "" + splitArray[0][1];
        }

        var a = $('#topbar_username').text(finalname.toUpperCase());
    }

    generateProfileShortName_Topbar();
    $('#shorthand_name_bg').css("backgroundColor", getRandomColor());


    function updateGlobalClient(client_id) {
        console.log("Loading for client id: " + client_id);

        $.ajax({
                url: "{{ route('session-update-globalClient') }}",
                type: "POST",
                data: {
                    client_id: client_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log("Response : " + data);

                    location.reload();
                }
            });

        //location.reload();
    }
</script>
