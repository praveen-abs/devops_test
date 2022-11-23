<div class="card profile-box flex-fill ">
    <div class="card-body">
        <div class="d-flex">
            <div class="status-wrapper page-header-user-dropdown me-3">
                @include('ui-profile-avatar',[
                    'currentUserName' =>  auth()->user()->name,
                    ])
            </div>
            <div class="greet-wrap ">
                <div class="d-felx ">
                    <!-- <h4>Welcome Back<b class="ml-1 text-primary">{{ auth()->user()->name }}</b></h4> -->
                    <p class="text-muted "><span class="f-12 me-1" id="greeting_text">Welcome Back</span><b
                            class="ml-1 f-15 text-primary">{{ auth()->user()->name }}</b>
                    </p>

                    <p class="text-muted f-12 mt-1 m-0">{{ date('d F Y') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12 col-xl-12 my-2   ">
                <div class="d-flex align-items-center ">
                    <p class="f-12 text-muted "><i class="f-14 ri-sun-line text-warning me-2"></i>General shift</p>
                    <p class="f-12 text-muted">
                        <span>
                            <label class="switch-checkbox f-12 text-muted  m-0">
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
                        </span>
                    </p>
                </div>
                <div class="d-flex align-items-center mt-1">
                    <input type="hidden" class="f-12 text-muted" id="hidden_timer_value" name="hidden_timer_value"
                        value="0">
                    @if ($checked && $checked->checkin_time)
                        @if ($checked->checkout_time)
                            <i class="ri-time-line text-warning f-14 me-2"></i><span id="check_timing"
                                class="f-12 me-2 text-muted ">Last Check Out :
                                {{ date('H:i:s', strtotime($checked->checkout_time)) }}</span>
                        @else
                            {{-- If not check_out time, then user havent checked-out yet --}}
                            <span class="ri-time-line text-warning me-2"></span><span id="check_timing"
                                class="f-12 text-muted me-2">Check In :
                                {{ date('H:i:s', strtotime($checked->checkin_time)) }}</span>
                        @endif
                    @endif

                    <span class="f-12 text-muted " id="time_duration">Time Duration:
                        @if ($effective_hours) {{ $effective_hours }}
                        @else
                            {{ '---' }} @endif
                    </span>

                </div>
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
                <!--confetti-->
                <!--lord-icon
                    src="https://cdn.lordicon.com/lupuorrc.json"
                    trigger="loop"
                    colors="primary:#121331,secondary:#08a88a"
                    style="width:120px;height:120px">
                </lord-icon-->
                <!--https://cdn.lordicon.com/pdlhjibh.json-->
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
                    <h4 class="mb-2">Hello {{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-4"> Welcome back!</p>
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
                        colors="primary:#ff3300,secondary:#ff3300"  class="gliters">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000"
                    class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"
                        >
                    </lord-icon>

                </div>
                <div class="mt-4">
                    <h4 class="mb-3">Good-bye {{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-4"> Checked out!</p>
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
