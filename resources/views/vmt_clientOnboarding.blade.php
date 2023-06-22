@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection

@section('content')
    <div class="client-onboard-wrapper mt-30">


        <div class="card  mb-2 left-line">
            <div class="card-body pb-0 pt-1">
                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item me-5 " role="presentation">
                        <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#client-list" role="tab" aria-controls="pills-home" aria-selected="true">
                            Client List
                        </a>
                    </li>
                    <li class="nav-item   " role="presentation">
                        <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#client-onboarding" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            Client Onboarding
                        </a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade active show" id="client-list" role="tabpanel" aria-labelledby="">
                @include('vmt_client')
            </div>
            <div class="tab-pane fade " id="client-onboarding" role="tabpanel" aria-labelledby="">
             @vite('resources/js/hrms/modules/configurations/client_onboarding/client_onboarding_master.js')
             <div id="clientOnboarding"></div>
            </div>
        </div>


    </div>
@endsection
@section('script')
@yield('script-gridjs-clients')

    <!-- ui notifications -->

    <!-- apexcharts -->


    <!-- for validating -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script>
    <script>
        $('#client_name').keyup(function() {

            var val = $(this).val();
            if (val.length <= 4) {
                $('#client_code').val(val);
            }
        });

        $('.onboard-form').keyup(function() {
            this.value = this.value.toLocaleUpperCase();

        }).trigger('keyup');

        //Pan Validation
        pan_val = false;
        $('#com_pan').keyup(function() {
            var pan = $('#com_pan').val();
            var patn = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
            $('#pan_err').css("display", "none");
            if (!patn.test(pan)) {
                $('#pan_err').css("display", "block");
                $('.error com_pan_label').hide();
                console.log("test " + pan_val);
            } else if (patn.test(pan)) {
                pan_val = true;
                console.log("test2 " + pan_val);
            }
        });

        $('#form-1').on('submit', function(e) {
            e.preventDefault();
            var flag = false;
            $('.files').each(function() {
                if ($(this).attr('vali') == "required" && $(this).val().length == 0) {
                    var attr = $(this).attr('id');
                    $('.' + attr + '_label').show();
                    flag = true;
                } else {
                    var attr = $(this).attr('id');
                    $('.' + attr + '_label').hide();
                }
            });
            console.log("testing: " + flag);
            if ($('#form-1').valid() && pan_val) {
                console.log("SUCCESS" + pan_val)
                console.log("SUCCESS" + pan_val)
                var form_data1 = new FormData(document.getElementById("form-1"));
                // var form_data2 = new FormData(document.getElementById("form-2"));
                // for (var pair of form_data2.entries()) {
                //     form_data1.append(pair[0], pair[1]);
                // }
                $.ajax({
                    url: "{{ url('vmt_clientOnboarding') }}",
                    type: "POST",
                    dataType: "json",
                    data: form_data1,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        console.log("test 2:" + data);
                    }
                });

                Swal.fire('You have updated client onboarding successfuully.').then(function() {
                    location.reload();
                });

            } else {

                Swal.fire('You have error in form.Recheck And Fill the Correct Infos.')
            }


            //console.log(personalData);
            //console.log(locationData);
            //console.log(officeData);
            //console.log(familyData);
            //console.log(statutoryData);
        });

        $('#form-1').validate({
            errorPlacement: function(error, element) {
                error.text('* ' + error.text());
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent()); // radio/checkbox?
                } else if (element.hasClass('select2-hidden-accessible')) {
                    error.insertAfter(element.next('span')); // select2
                    element.next('span').addClass('error').removeClass('valid');
                } else {
                    error.insertAfter(element); // default
                }
            }
        });

        $("select").on("select2:close", function(e) {
            $(this).valid();
        });
    </script>
@endsection
