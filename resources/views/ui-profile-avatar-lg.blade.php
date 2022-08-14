@if( empty(Auth::user()->avatar) || !file_exists(public_path('images/'. Auth::user()->avatar)) )
    <span class="bage rounded-circle h-100 w-100 d-flex align-items-center justify-content-center  ">
        <i id="profileShortNameLargeCircle-profile" class="align-middle "></i>
    </span>
@else
    <img class="rounded-circle header-profile-user" src=" {{URL::asset('images/'. Auth::user()->avatar)}}" alt="Header Avatar">
@endif


@section('script-profile-avatar')

<script>
    $(document).ready(function() {

        generateProfileShortName();
    });

    function generateProfileShortName()
    {
        var username = '{{auth()->user()->name}}';
        const myArray = username.split(" ");
        var a = $('#profileShortNameLargeCircle-profile').text(myArray[0][0]+""+myArray[1][0]);
        console.log(a);
    }

</script>
@endsection
