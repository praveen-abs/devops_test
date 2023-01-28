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
                <button type="button" class="form-select outline-none border-0 fw-bold" id="page-header-user-dropdown"
                    data-bs-toggle="offcanvas" data-bs-target=".offcanvas" aria-controls="" aria-haspopup="true"
                    aria-expanded="false">

                    {{ sessionGetSelectedClientName() }}

                </button>
                <div class="offcanvas  selectClient-Offcanvas offcanvas-end" data-bs-keyboard="true"
                    data-bs-backdrop="true" tabindex="-1" id="select_client" aria-labelledby=""
                    style="top: 50px;border-radius:10px 0px 0px 0px">
                    <div class="offcanvas-header pb-0 bg-ash  align-items-center border-0 ">
                        <a role="button" href="{{ route('pages-profile') }}"
                            class="border-0 outline-none profile-icon bg-transparent" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="View Profile">
                            <i class="fa fa-user text-muted fs-15"></i>
                        </a>

                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="offcanvas-body overflow-hidden p-0">
                        <div
                            class="bg-ash border-bottom-liteAsh d-flex align-items-center justify-content-center flex-column">
                            @if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
                                <div
                                    class="bg-primary mb-2 img-lg rounded-circle  d-flex align-items-center justify-content-center text-white fw-bold  ">
                                    <i class="topbar_username align-middle "></i>
                                </div>
                            @else
                                <img class="rounded-circle mb-2 img-lg  header-profile-user"
                                    src=" {{ URL::asset('images/' . Auth::user()->avatar) }}" alt="Header Avatar">
                            @endif
                            <p class="text-dark  fs-15  mb-1">
                                {{ Auth::user()->name }}</p>
                            <p class="text-muted mb-1"><span class="">User Id :</span>
                                {{ Auth::user()->user_code }}</p>

                            <div class="mb-3">
                                <a class="text-danger " href="javascript:void();"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="bx bx-power-off fs-16 align-middle me-1 "></i> <span key="t-logout">Sign
                                        Out</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']) && hasSubClients())
                            <?php
                            $clientsList = fetchClients();
                            $currentClientID = session('client_id');

                            ?>
                            <div class=" text-start text-muted  p-2 border-bottom-liteAsh">

                                <span>My Organizations </span>
                                {{-- <a href="{{ route('vmt_topbar_settings') }}" class="text-info" style="cursor: pointer">
                                </a> --}}
                            </div>

                            <div class="choose-client-wrapper">
                                @foreach ($clientsList as $client)
                                    <div class="choose-client justify-content-between d-flex p-2  border-bottom-liteAsh  align-items-center  @if (!empty($currentClientID) && $currentClientID == $client->id) bg-ash @endif>"
                                        data-client_id="{{ $client->id }}">
                                        <div class="d-flex   align-items-center   ">
                                            <div class="mx-2 p-1 border d-flex align-items-center  rounded border-1"
                                                style="height: 40px;width:40px">
                                                <img src="{{ URL::asset($client->client_logo) }}" alt=""
                                                    class=" mh-100 mw-100">
                                            </div>
                                            <span class=" fw-bold ">{{ $client->client_name }}</span>
                                        </div>
                                        @if (!empty($currentClientID) && $currentClientID == $client->id)
                                            <img src='{{ URL::asset('assets/images/check.png') }}'
                                                style='height:13px;width:13px;' class="me-2">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

            </div>


            <button type="button" class="btn bg-transparent border-0 mx-1 py-1 " id="page-header-user-dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-toggle="offcanvas" data-bs-target=".offcanvas"
                aria-controls="" aria-haspopup="true" aria-expanded="false">
                <div class="d-flex align-items-center page-header-user-dropdown">
                    @if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
                        <div
                            class="bg-primary img-sm rounded-circle d-flex align-items-center justify-content-center text-white fw-bold  ml-2">
                            <i class="topbar_username" class="align-middle "></i>
                        </div>
                    @else
                        <img class="rounded-circle img-sm header-profile-user"
                            src=" {{ URL::asset('images/' . Auth::user()->avatar) }}" alt="user">
                    @endif


                </div>
            </button>

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
