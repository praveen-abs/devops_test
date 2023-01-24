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
    <div class="navbar-header">

        <!-- disable setting icon for employee -->
        <div class="d-flex h-100 justify-content-between align-items-center ">
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

                {{-- dont remove --}}
                {{-- <div class="search-content mx-2 ">
                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control py-1 rounded" placeholder="Search">
                        </div> --}}
            </div>
            <div class="d-flex">
                <div class="notify-content d-flex justify-content-center align-items-center">
                    @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']) && hasSubClients())

                        <div class="d-flex align-items-center topbar-user ">
                            <?php
                            $clientsList = fetchClients();
                            $currentClientID = session('client_id');
                            //dd($currentClientID);
                            ?>
                            {{-- <span class=" f-14 fw-bold">Entity Name : </span> --}}
                            <button type="button" class="btn  border-0 mx-1 py-1 f-14 fw-bold"
                                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{-- <div class="d-flex align-items-center page-header-user-dropdown"> --}}
                                    {{ sessionGetSelectedClientName() }}
                                {{-- </div> --}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-end " style="width:220px;">
                                <div class="px-2">
                                    <div class="text-center">
                                        <h6>{{ sessionGetSelectedClientName() }}</h6>
                                        {{-- <p class="text-primary  border-bottom-secondary pb-2">Organization Id : 123456</p> --}}
                                        <p class="d-flex justify-content-between py-2  border-bottom-secondary"><span>My
                                                Organizations</span><span class="text-primary"><i
                                                    class="mdi mdi-cog-outline  me-1"></i>Manage</span> </p>
                                    </div>
                                    <div class="d-flex flex-column" id="">
                                        @foreach ($clientsList as $client)
                                            <div class="choose-client d-flex border-bottom-secondary  align-items-center @if (!empty($currentClientID) && $currentClientID == $client->id) bg-light bg-gradient @endif"
                                                data-client_id="{{ $client->id }}">
                                                <div class="mx-2">
                                                    <img src="{{ URL::asset($client->client_logo) }}" alt=""
                                                        class="rounded-circle" height="40px" width="40px">
                                                </div>
                                                <div class="">
                                                    <p class="f-14 text-muted">{{ $client->client_name }}</p>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endif
                </div>

                <div class="dropdown topbar-user ">
                    <button type="button" class="btn border-0 mx-1 py-1 shadow-sm" id="page-header-user-dropdown"
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
                                    src=" {{ URL::asset('images/' . Auth::user()->avatar) }}" alt="Header Avatar">
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
                        <div class="mx-2">

                            <div class="border-bottom-secondary pb-1 ">
                                <div class="d-flex mb-3  align-items-center">
                                    @if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
                                        <!-- <span class="rounded-circle user-profile  ml-2 " id="shorthand_name_bg"> -->
                                        <div
                                            class="bg-ash img-md rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold ">
                                            <i class="topbar_username " class="align-middle "></i>
                                        </div>
                                    @else
                                        <img class="rounded-circle img-md header-profile-user"
                                            src=" {{ URL::asset('images/' . Auth::user()->avatar) }}"
                                            alt="Header Avatar">
                                    @endif

                                    <div class="f-12 ms-2 mb-1 d-flex  text-start flex-column">
                                        <span class="">{{ Auth::user()->name }}</span>
                                        {{-- <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span> --}}
                                        <span>Designation</span>
                                    </div>
                                </div>
                                <a class="dropdown-item text-center mb-1 py-0 px-2 h-25 btn btn-border-primary rounded-pill"
                                    href="{{ route('pages-profile') }}">
                                    {{-- <i
                                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> --}}
                                    View Profile
                                </a>
                            </div>


                            @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))
                                <a class="dropdown-item border-bottom-secondary text-center py-2"
                                    href="{{ route('vmt_topbar_settings') }}"><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Settings</span></a>
                            @endif


                            <a class="dropdown-item text-center pt-2" href="javascript:void();"
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
