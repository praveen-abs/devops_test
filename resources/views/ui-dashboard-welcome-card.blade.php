<div class="card  w-100  border-0 box-shadow-md">
    <div class="card-body">

        <div class="row">
            <div class="col-8 col-sm-8 col-md-8 col-xl-8 col-lg-8 col-xxl-8">
                <p class="fw-bold f-18 text-primary" id="greeting_text">-</p>
                <p class="fw-bold fs-16 text-orange my-1">
                    {{ auth()->user()->name }}
                </p>

                <div class="my-3"><i class="fa fa-sun-o me-3 text-warning" aria-hidden="true"></i>General Shift <label
                        class="switch-checkbox f-12 text-muted  ms-3">
                        <input type="checkbox" id="checkin_function" class="f-13 text-muted"
                            @if ($checked && $checked->checkin_time) @if ($checked->checkout_time)
                            @else
                            checked @endif
                            @endif>
                        <span class="slider-checkbox check-in round">
                            <span class="slider-checkbox-text">
                            </span>
                        </span>
                    </label>
                </div>
                <p class="f-12 text-muted " id="time_duration">Time Duration:
                    @if ($effective_hours)
                        <span class="test-primary f-12"> {{ $effective_hours }}</span>
                    @else
                        <span class="test-primary f-12"> {{ '-' }}</span>
                    @endif
                    </->
            </div>
            <div class="col-4 col-sm-4 col-md-4  col-xl-4 col-lg-4 col-xxl-4">
                <img src="{{ URL::asset('assets/images/dashboard/girl_walk.jpg') }}" class="" alt="girl-walk"
                    height="145px" width="100%">
            </div>
        </div>

    </div>
</div>

<!-- staticBackdrop Modal -->
<div class="modal fade" id="modal_checkin_confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-1">

                <div class="check-in-animate">
                    <lord-icon src="https://cdn.lordicon.com/dcfqtwxe.json" trigger="loop" delay="2000"
                        class="gliters" colors="primary:#1aff1a,secondary:#1aff1a">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000"
                        class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849">
                    </lord-icon>
                </div>
                <div class="mt-2">
                    <h4 class="mb-2">Welcome {{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-4">Have a good day !</p>
                    <div class="hstack gap-2 justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-link link-success fw-medium"
                            data-bs-dismiss="modal">
                            <button type="button" class="btn btn-primary">
                                Close
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_checkout_confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-1">

                <div class="check-in-animate">
                    <lord-icon src="https://cdn.lordicon.com/dcfqtwxe.json" trigger="loop" delay="2000"
                        colors="primary:#ff3300,secondary:#ff3300" class="gliters">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000"
                        class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00">
                    </lord-icon>

                </div>
                <div class="mt-4">
                    <h4 class="mb-3">Bye {{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-4"> See you tommorrow</p>
                    <div class="hstack gap-2 justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-link link-success fw-medium"
                            data-bs-dismiss="modal">
                            <button type="button" class="btn btn-primary">
                                Close
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('welcome-script')
    <script>
        function time() {

            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();

            $("#hidden_timer_value").val(("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2));

            $('#check_timing').html("Check In : " + ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s)
                .substr(-2));
        }




        function greetingMessage() {
            $('#greeting_text').text("Hey!!");
            var currentDate = new Date();

            var currentHour = currentDate.getHours();
            var message = "";

            if (currentHour <= 11) {
                message = "Good Morning";
            } else
            if (currentHour >= 12 && currentHour <= 15) {
                message = "Good Afternoon";
            } else
            if (currentHour >= 15) {
                message = "Good Evening";
            }

            $('#greeting_text').text(message);

        }

        $(document).ready(function() {

            var ui_checkInTime_interval;
            var checkIn_time = "";

            greetingMessage();

            if ($('#checkin_function').is(':checked')) {
                //If already checked-in, then run timer
                ui_checkInTime_interval = setInterval(time, 1000);

            }


            $('#checkin_function').change(function() {


                var checked_status = $('#checkin_function').is(':checked');
                const d = new Date();

                $.ajax({
                    type: "POST",
                    url: "{{ route('updateCheckin') }}",
                    data: {
                        'checkin': checked_status,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {

                        if (checked_status) {
                            ui_checkInTime_interval = setInterval(time, 1000);
                            //console.log("Timer start");
                            $('#time_duration').html("Time Duration: ");
                            $('#modal_checkin_confirm').modal('show');
                        } else {
                            $('#check_timing').html("Check Out: " + $("#hidden_timer_value")
                                .val());
                            $('#time_duration').html("Time Duration: " + data[
                                'effective_hours']);

                            clearInterval(ui_checkInTime_interval);
                            $('#modal_checkout_confirm').modal('show');
                            //console.log( $("#hidden_timer_value").val());
                        }

                        // $("#toast_message").html(data['message']);
                        // setTimeout(() => {
                        //     $('#toast_notification').toast('show');
                        // }, 0);

                    }
                });
            });

        });
    </script>
@endsection
