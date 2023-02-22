@if (empty(Auth::user()->avatar) || !file_exists(public_path('images/' . Auth::user()->avatar)))
    <div class=" rounded-circle h-100 w-100 f-18 d-flex align-items-center justify-content-center  usershortName_bg ">
        <i id="profileShortNameLargeCircle" class="align-middle "></i>
    </div>
@else
    <div class="bg-light userImg_bg">
        <img class="w-100 h-100 rounded-circle header-profile-user"
            src=" {{ URL::asset('images/' . Auth::user()->avatar) }}" alt="Header Avatar">
    </div>
@endif


@section('script-profile-avatar')
    <script>
        // $(document).ready(function() {

        generateProfileShortName_VendorScript('profileShortNameLargeCircle', '{{ $currentUserName }}');
        // });

        // function generateProfileShortName()
        // {
        //     var username = '{{ auth()->user()->name }}';
        //     const splitArray = username.split(" ");
        //     var finalname ="empty";

        //     if( splitArray.length == 1)
        //     {
        //         finalname = splitArray[0][0] +""+ splitArray[0][1];
        //     }else
        //     {
        //         finalname = splitArray[0][0] +""+ splitArray[1][0];
        //     }

        //     var a = $('#profileShortNameLargeCircle').text(finalname);
        //     console.log(a);
        // }
    </script>
@endsection
