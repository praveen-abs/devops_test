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

<?php
$query_clientMaster = \DB::table('vmt_client_master')->first();

if ($query_clientMaster) {
    $logoSrc = $query_clientMaster->client_logo;
} else {
    $logoSrc = '';
}
?>


<header id="page-topbar">
    <div class="navbar-header d-flex justify-content-between align-items-center ">
        <div class="d-flex ">
            <button type="button" class="btn btn-sm fs-16 vertical-menu-btn topnav-hamburger border-0 outline-none"
                id="topnav-hamburger-icon">
                <span class="hamburger-icon open">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
            <div class="topbar-logo mx-2 ">
                <img src=" {{ URL::asset(session()->get('client_logo_url')) }}" alt="" class=""
                    style="height: 40px;width:140px;">
            </div>
        </div>

        <div class="d-flex">
            <div class="notify-content d-flex justify-content-center align-items-center">
                @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']) && hasSubClients())
                    <?php
                    $clientsList = fetchClients();
                    $currentClientID = session('client_id');
                    //dd($currentClientID);
                    ?>
                    {{-- <span class=" f-14 fw-bold">Entity Name : </span> --}}
                    <button type="button" class="form-select outline-none border-0 fw-bold"
                        id="page-header-user-dropdown" data-bs-toggle="offcanvas" data-bs-target="#select_client"
                        aria-controls="" aria-haspopup="true" aria-expanded="false">
                        {{-- <div class="d-flex align-items-center page-header-user-dropdown"> --}}
                        {{ sessionGetSelectedClientName() }}
                        {{-- </div> --}}
                    </button>
                    <div class="offcanvas  selectClient-Offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1"
                        id="select_client" aria-labelledby="" style="top: 50px;">
                        <div class="offcanvas-header justify-content-end border-0 ">

                            <button type="button" class="close outline-none bg-transparent border-0 h3"
                                data-bs-dismiss="offcanvas" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="offcanvas-body p-0">
                            <div class="d-flex flex-column pb-3 border-bottom-liteAsh  align-items-center text-center justify-content-center"
                                style="position:relative;z-index:10;">

                                <div class="logo"
                                    style="position: absolute;z-index:0;opacity:0.2;height:100px;width:300px;  ">
                                    <img src=" {{ URL::asset(session()->get('client_logo_url')) }}" alt=""
                                        class="h-100 w-100" style="">
                                </div>

                                <div class=" d-flex align-items-center justify-content-center flex-column"
                                    style="position: relative;z-index:1;">
                                    @if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
                                        <!-- <span class="rounded-circle user-profile  ml-2 " id="shorthand_name_bg"> -->
                                        <div
                                            class="bg-primary img-lg rounded-circle  d-flex align-items-center justify-content-center text-white fw-bold  ">
                                            <i class="topbar_username" class="align-middle "></i>
                                        </div>
                                    @else
                                        <img class="rounded-circle img-lg  header-profile-user"
                                            src=" {{ URL::asset('images/' . Auth::user()->avatar) }}"
                                            alt="Header Avatar">
                                    @endif


                                    <h6 class=""></h6>
                                    <p class="text-ash"><span class="text-primary">Name :</span>
                                        {{ Auth::user()->name }}</p>
                                    <p class="text-ash"><span class="text-primary">User Id :</span>
                                        {{ Auth::user()->user_code }}</p>
                                    <p class="text-ash"><span class="text-primary">Mail:</span>
                                        {{ Auth::user()->email }}</p>

                                </div>
                            </div>
                            <p
                                class="d-flex justify-content-between text-muted align-items-center px-2 py-2 cursor-pointer text-info   border-bottom-liteAsh">
                                <span class="fw-bold text-muted">My
                                    Organizations</span><span class="text-info" style="cursor: pointer"><i
                                        class="mdi mdi-cog-outline  me-1"></i>Manage</span>
                            </p>



                            <div class="d-flex flex-column   overflow-auto " id="">
                                {{-- <div class="my-2 overflow-auto bg-ash" style=""> --}}

                                @foreach ($clientsList as $client)
                                    <div class="choose-client d-flex p-2 cursor-pointer border-bottom-liteAsh  align-items-center @if (!empty($currentClientID) && $currentClientID == $client->id) bg-ash @endif"
                                        data-client_id="{{ $client->id }}">
                                        <div class="mx-2 p-1 border d-flex align-items-center justify-content-center rounded border-1"
                                            style="height: 40px;width:40px">
                                            <img src="{{ URL::asset($client->client_logo) }}" alt=""
                                                class=" mh-100 mw-100">
                                        </div>
                                        <div class="">
                                            <p class="f-13 fw-bold text-muted">{{ $client->client_name }}</p>

                                        </div>
                                    </div>
                                @endforeach

                                {{-- </div> --}}
                            </div>
                        </div>
                @endif
            </div>

            <div class="dropdown topbar-user ">
                <button type="button" class="btn bg-transparent border-0 mx-1 py-1 " id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex align-items-center page-header-user-dropdown">
                        @if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
                            <!-- <span class="rounded-circle user-profile  ml-2 " id="shorthand_name_bg"> -->
                            <div
                                class="bg-primary img-sm rounded-circle d-flex align-items-center justify-content-center text-white fw-bold  ml-2">
                                <i class="topbar_username" class="align-middle "></i>
                            </div>
                        @else
                            <img class="rounded-circle img-sm header-profile-user"
                                src=" {{ URL::asset('images/' . Auth::user()->avatar) }}" alt="user">
                        @endif

                        {{-- <span class="f-12 mx-2 d-flex align-items-center">
                                        <span class="">{{ Auth::user()->name }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                        <i class="fa fa-caret-down ms-2" aria-hidden="true"></i>
                                    </span> --}}

                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-end " style="width:180px;">
                    <!-- item-->
                    {{-- <h6 class="dropdown-header">Welcome </h6> --}}
                    <div class="mx-2 ">

                        <div class="border-bottom-secondary pb-1 ">
                            <div class="d-flex mb-3 flex-column justify-content-center  align-items-center">
                                @if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
                                    <!-- <span class="rounded-circle user-profile  ml-2 " id="shorthand_name_bg"> -->
                                    <div
                                        class="bg-ash img-md rounded-circle mb-2 d-flex align-items-center justify-content-center text-primary fw-bold ">
                                        <i class="topbar_username " class="align-middle "></i>
                                    </div>
                                @else
                                    <img class="rounded-circle img-md mb-2 header-profile-user"
                                        src=" {{ URL::asset('images/' . Auth::user()->avatar) }}" alt="user">
                                @endif

                                <div class="f-12 ms-2 mb-1 d-flex  text-start flex-column">
                                    <span class="">{{ Auth::user()->name }}</span>
                                    {{-- <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span> --}}
                                    {{-- <span>{{ Auth::user()->designation }}</span> --}}
                                </div>
                            </div>

                        </div>

                        <a class="dropdown-item text-start   border-bottom-secondary  py-2"
                            href="{{ route('pages-profile') }}">
                            <i class="fa fa-user-circle me-2 text-muted"></i>
                            View Profile
                        </a>
                        @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))
                            <a class="dropdown-item border-bottom-secondary text-start py-2"
                                href="{{ route('vmt_topbar_settings') }}"><i
                                    class="mdi mdi-cog-outline text-muted  fs-16 align-middle me-1"></i>
                                <span class="align-middle">Settings</span></a>
                        @endif


                        <a class="dropdown-item text-start pt-2" href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off fs-16 text-muted align-middle me-1"></i> <span
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
</header>
<!-- added jquery script temporarily here since Jquery plugin is not loaded at this point -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
        var username =
            '{{ auth()->user()->name ??
                '
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ' }}';
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

        var a = $('.topbar_username').text(finalname.toUpperCase());
    }

    generateProfileShortName_Topbar();
    $('#shorthand_name_bg').css("backgroundColor", getRandomColor());


    function updateGlobalClient(client_id) {

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

    //$('#dropdown_client').selectpicker("refresh");
    $('.choose-client').click(function() {
        let selectedClientID = $(this).attr('data-client_id');
        console.log("Client ID chosen : " + selectedClientID);
        updateGlobalClient(selectedClientID);
    });
</script>
