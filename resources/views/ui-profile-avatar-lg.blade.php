<?php
    //dd($currentUser);
    $t_userAvatarDetails = json_decode(getEmployeeAvatarOrShortName($currentUser->id),true);
    // dd($t_userAvatarDetails);
?>

@if( $t_userAvatarDetails["type"]=="shortname")
        <div id="" class="align-middle rounded-circle h-100 w-100 user-name-container d-flex align-items-center justify-content-center  <?php echo $t_userAvatarDetails['color']; ?>">{{ $t_userAvatarDetails["data"] }}</div>
@else
    <img class="rounded-circle header-profile-user h-100 w-100" src=" {{URL::asset('images/'. $t_userAvatarDetails['data'])}}" alt="user-image" >
@endif


@section('script-profile-avatar')

<script>

</script>
@endsection
