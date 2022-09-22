@extends('layouts.master')
{{-- @include('ui-onboarding')
 --}}
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    input {
        width: 100% !important;
        margin-left: 0 !important;
        height: 2.9em;
    }

    #current_address_copy {
        height: 12px !important;
        width: 12px !important;
    }

    .addfiles {
        padding: 7px;
        border-radius: 2px;
    }
</style>
@endsection

@section('content')

@component('components.organization_breadcrumb')
@slot('li_1') @endslot
@endcomponent
<div class="main">


    {{-- @section('ui-onboarding') --}}
    <div class="container-fluid mt-8">
        <div class="">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <div class="">
                        <div id="msform">
                            <form id="form-1" enctype="multipart/form-data">
                                @csrf

                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center ">
                                        <div class="header-card-text">
                                            <h6 class="mb-0">Documents Review</h6>
                                        </div>
                                        <div class="form-card mb-2">
                                            <div class="row mt-1">
                                                <!-- <div class="col-12 mb-2">
                                                        <input type="checkbox" placeholder="" name="aadhar_backend"
                                                            id="aadhar_backend" style="width:auto;" />
                                                        <label for="aadhar_backend">Upload aadhar backend</label>
                                                    </div> -->
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                    <!-- <label class="" for="aadhar_card">Aadhar Card{!! required() !!}</label> -->
                                                    <label for="">Aadhar
                                                        Card Front</label>
                                                    <div class="addfiles form-control md" data="#aadhar_card" id="aadhar_card_label"><span class="file_label">Choose Aadhar
                                                            Card Front</span></div>
                                                            <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames->aadhar_card_file) }}"
                                                            alt="Header Avatar">
                                                </div>



                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2" id="aadhar_card_backend_content">
                                                    <!-- <label class="" for="aadhar_card_backend">Aadhar Card Backend<span id="aadhar_card_backend_req">{!! required() !!}</span></label> -->
                                                    <label for=""> Aadhar Card Back</label>
                                                    <div class="addfiles form-control" data="#aadhar_card_backend" id="aadhar_card_backend_label"><span class="file_label">Choose
                                                            Aadhar Card Back</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Aadhar Card Backend" name="aadhar_card_backend" id="aadhar_card_backend" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                    <!-- <label class="" for="pan_card">Pan Card{!! required() !!}</label> -->
                                                    <label for=""> Pan
                                                        Card</label>
                                                    <div class="addfiles form-control" data="#pan_card" id="pan_card_label"><span class="file_label">Upload Pan
                                                            Card</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Pan Card" name="pan_card" id="pan_card" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                    <!-- <label class="" for="passport">Passport{!! required() !!}</label> -->
                                                    <label for="">
                                                        Passport</label>
                                                    <div class="addfiles form-control" data="#passport" id="passport_label"><span class="file_label">Choose
                                                            Passport</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Passport" name="passport" id="passport" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                    <!-- <label class="" for="voters_id">Voters ID</label> -->
                                                    <label for="">
                                                        Voters
                                                        ID</label>
                                                    <div class="addfiles form-control" data="#voters_id" id="voters_id_label"><span class="file_label">Choose Voters
                                                            ID</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Voters ID" name="voters_id" id="voters_id" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                    <!-- <label class="" for="dl_file">Driving License</label> -->
                                                    <label for=""> Driving License</label>
                                                    <div class="addfiles form-control" data="#dl_file" id="dl_file_label"><span class="file_label">Choose Driving
                                                            License</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Driving License" name="dl_file" id="dl_file" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <!-- <label class="" for="education_certificate">Educations Certificate{!! required() !!}</label> -->
                                                    <label for="">Educations Certificate</label>
                                                    <div class="addfiles form-control" data="#education_certificate" id="education_certificate_label"><span class="file_label">Choose
                                                            Educations Certificate</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Educations Certificate" name="education_certificate" id="education_certificate" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                    <!-- <label class="" for="reliving_letter">Reliving Letter</label> -->
                                                    <label for=""> Reliving Letter</label>
                                                    <div class="addfiles form-control" data="#reliving_letter" id="reliving_letter_label"><span class="file_label">Choose
                                                            Reliving Letter</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Reliving Letter" name="reliving_letter" id="reliving_letter" class="onboard-form form-control files" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-right"><button type="button" data="row-6" next="row-6" placeholder="" name="next" id="submit_button" class="btn btn-orange  text-center" value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Main Content-->
    </div>

    <!-- Vertically Centered -->
    <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="modalHeader">Failure
                        </h5>
                        <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mt-4">
                        <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                        <p class="text-muted mb-4" id="modalBody"></p>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" id="button_close" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endsection --}}





    @endsection
    @section('script')

    <!-- ui notifications -->

    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
    <!-- apexcharts -->

    <!-- dashboard init -->

    <!--Page Wrapper-->


    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

    <script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
    <!--Progressbar JS-->
    <script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>
    <!--Charts-->
    <!--Canvas JS-->
    <!--Custom Js Script-->
    <!--Custom Js Script-->
    <script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>


    <script>

            $('body').on('click', '.close-modal', function() {
                $('#notificationModal').hide();
                $('#notificationModal').addClass('fade');
            });

           $('#submit_button').on('click', function(e) {
                console.log("Submitting documents");
                var flag = false;

                if ($('#form-1').valid() && !flag) {

                    //alert("1 st one");
                    var form_data1 = new FormData(document.getElementById("form-1"));

                    $.ajax({
                        url: "{{route('vmt-storedocuments-route')}}",
                        type: "POST",
                        dataType: "json",
                        data: form_data1,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data.responseText == "Saved") {
                                $('#modalHeader').html(data);
                                $('#modalNot').html("Documents upload success");
                                //$('#modalBody').html("Mail notification sent.");
                                $('#notificationModal').show();
                                $('#notificationModal').removeClass('fade');
                            } else {
                                $('#modalHeader').html(data);
                                $('#modalNot').html("Failed to save Data");
                                //$('#modalBody').html("Request to the server failed");
                                $('#notificationModal').show();
                                $('#notificationModal').removeClass('fade');
                            }
                            console.log(data);

                            //alert(data);
                        },
                        error: function(data) { //NEED TO FIX IT
                            // console.log('error');
                            if (data.responseText == "Saved") {
                                $('#modalHeader').html(data);
                                $('#modalNot').html("Documents upload success");
                                //$('#modalBody').html("Mail notification sent.");
                                $('#notificationModal').show();
                                $('#notificationModal').removeClass('fade');
                            } else {

                                $('#modalHeader').html(data);
                                $('#modalNot').html("Failed to save Data");
                                //$('#modalBody').html("Request to the server failed");
                                $('#notificationModal').show();
                                $('#notificationModal').removeClass('fade');
                            }

                        }
                    });

                }
            });


            $("#button_close").click(function(){
                window.location.href = "/";
            });
    </script>


    @endsection
