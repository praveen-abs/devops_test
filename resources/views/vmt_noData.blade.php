@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Assign Roles @endslot
@endcomponent

<div class="container-fluid my-5">
    <div class="data-wrapper d-flex align-items-center justify-content-center">
        <img src="{{ URL::asset('assets/images/error400-cover.png') }}" alt="" class="h-50 w-50">
    </div>

</div>

@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
$('#role-form').on('submit', function(e) {
    e.preventDefault();
    var roleUri = $('#role-form').attr('action');
    console.log(roleUri);

    $.ajax({
        type: "POST",
        url: roleUri,
        data: $('#role-form').serialize(), // serializes the form's elements.
        success: function(data) {
            $('#alert-msg').html(data);
            var toastLiveExample3 = document.getElementById("borderedToast2");
            var toast = new bootstrap.Toast(toastLiveExample3);
            toast.show();
            //alert(data); // show response from the php script.
        }
    })
    //console.log($('#role-form').serialize());
});
</script>
@endsection