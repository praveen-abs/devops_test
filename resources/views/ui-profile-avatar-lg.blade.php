@if( empty($currentUser->avatar) || !file_exists(public_path('images/'. $currentUser->avatar)) )
    <!-- <span class=" rounded-circle h-100 w-100 d-flex align-items-center justify-content-center" id="shorthand_name_bg"> -->
    <div class=" rounded-circle  user_profile-wrapper  img-xl" id="">
        <div id="profileShortNameLargeCircle-profile" class="align-middle "></div>
    </div>
@else
    <img class="rounded-circle header-profile-user img-xl" src=" {{URL::asset('images/'. $currentUser->avatar)}}" alt="Header Avatar" >
@endif


@section('script-profile-avatar')

<script>
    // $(document).ready(function() {

        generateProfileShortName_VendorScript('profileShortNameLargeCircle-profile','{{ $currentUser->name }}');
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
