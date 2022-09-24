@if( empty(Auth::user()->avatar) || !file_exists(public_path('images/'. Auth::user()->avatar)) )
    <span class="bage rounded-circle h-100 w-100 d-flex align-items-center justify-content-center" id="shorthand_name_bg">
        <i id="profileShortNameLargeCircle-profile" class="align-middle "></i>
    </span>
@else
    <img class="rounded-circle header-profile-user" src=" {{URL::asset('images/'. Auth::user()->avatar)}}" alt="Header Avatar" style="width: 70px; height: 70px;">
@endif


@section('script-profile-avatar')

<script>
    // $(document).ready(function() {

        generateProfileShortName_VendorScript('profileShortNameLargeCircle-profile','{{ $currentUserName }}');
        $('#shorthand_name_bg').css( "backgroundColor", getRandomColor() );
    // });

    // function generateProfileShortName()
    // {
    //     var username = '{{auth()->user()->name}}';
    //     const splitArray = username.split(" ");
    //     var finalname ="empty";

    //     if( splitArray.length == 1)
    //     {
    //         finalname = splitArray[0][0] +""+ splitArray[0][1];
    //     }else
    //     {
    //         finalname = splitArray[0][0] +""+ splitArray[1][0];
    //     }

    //     var a = $('#profileShortNameLargeCircle-profile').text(finalname);
    //     console.log(a);
    // }

</script>
@endsection
