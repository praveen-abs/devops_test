<div class="card profile-box flex-fill">
    <div class="card-body">
        <div class="d-flex">
            <div class="status-wrapper ">
                <!-- <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}" > -->
                <img src="{{ URL::asset('images/' . Auth::user()->avatar) }}"
                    class="soc-det-img profile-img-round h-100 w-100">
                <!-- <img src="{{ URL::asset('assets/images/status-pic.png') }}" alt=""
                    class="profile-img-round"> -->

                <!-- <i class="ri-checkbox-blank-circle-fill status-circle"></i> -->

            </div>
            <div class="greet-wrap ml-3 mr-0">
                <div class="d-felx ">
                    <!-- <h4>Welcome Back<b class="ml-1 text-primary">{{auth()->user()->name}}</b></h4> -->
                    <p class="text-muted ">Welcome Back<b class="ml-1 text-primary">{{auth()->user()->name}}</b>
                    </p>

                    <p class="text-muted f-13 mt-1 m-0">{{date('d F Y')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12 col-xl-12 mt-2 mb-3">
                <div class="d-flex align-items-center ">
                    <p class="f-13 w-50"><i class=" ri-sun-line text-warning mr-2"></i>General shift</p>
                    <p class="f-15">
                        <span>
                            <label class="switch-checkbox m-0">
                                <input type="checkbox" id="checkin_function" @if($checked && $checked->checkin_time)
                                @if($checked->checkout_time)

                                @else
                                checked
                                @endif
                                @endif>
                                <span class="slider-checkbox check-in round">
                                    <span class="slider-checkbox-text">
                                    </span>
                                </span>
                            </label>
                        </span>
                    </p>
                </div>
                <div class="d-flex align-items-center mt-1">
                    @if ($checked && $checked->checkin_time)
                    @if($checked->checkout_time)
                    <i class="ri-time-line text-warning mr-2"></i><span id="check_timing" class="f-13 w-20">Check Out :
                        {{date('H:i', strtotime($checked->checkout_time))}}</span>
                    @else
                    {{-- If not check_out time, then user havent checked-out yet --}}
                    <i class="ri-time-line text-warning mr-2"></i><span id="check_timing" class="f-13 w-20">Check In :
                        {{date('H:i', strtotime($checked->checkin_time))}}</span>
                    @endif
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="toast_notification" class="toast toast-border-success overflow-hidden mt-3" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Info</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

        <div class="toast-body">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                    <i class="ri-alert-line align-middle"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0" id="toast_message">--------</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@section('welcome-script')

<script>
$(document).ready(function() {

    $('#checkin_function').change(function() {
        var checked_status = $('#checkin_function').is(':checked');
        console.log(checked_status);
        $.ajax({
            type: "POST",
            url: "{{route('updtaeCheckin')}}",
            data: {
                'checkin': checked_status,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {

                if (checked_status)
                    $('#check_timing').html("Check In: " + data['time'].split(" ")[
                    1]); //get the time only
                else
                    $('#check_timing').html("Check Out: " + data['time'].split(" ")[
                    1]); //get the time only

                $("#toast_message").html(data['message']);
                setTimeout(() => {
                    $('#toast_notification').toast('show');
                }, 0);

                //console.log(data);
            }
        });
    });


});
</script>
@endsection