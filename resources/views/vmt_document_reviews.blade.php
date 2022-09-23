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
                                @csrf

                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center ">
                                        <div class="header-card-text">
                                            <h6 class="mb-0">Documents Review</h6>
                                        </div>
                                        <div class="form-card mb-2 mt-2">


                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aadhar Card Front</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->aadhar_card_file) }}"
                                                            alt="Aadhar Card Front">
                                                   </td>
                                                        <td> 

                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('aadhar_card_file', 1)"> Approve</button>
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('aadhar_card_file', 0)"> Reject</button>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Aadhar Card Back</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->aadhar_card_backend_file) }}"
                                                            alt="Aadhar Card Front">
                                                        </td>
                                                        <td> 
                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('aadhar_card_backend_file', 1)"> Approve</button>
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('aadhar_card_backend_file', 0)"> Reject</button>
                                                        </td>
                                                    </tr>

                                                     <tr>
                                                        <td>Pan Card</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->pan_card_file) }}"
                                                            alt="Aadhar Card Front">
                                                   </td>
                                                        <td>
                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('pan_card_file', 1)"> Approve</button>
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('pan_card_file', 0)"> Reject</button>
                                                        </td>
                                                    </tr>

                                                     <tr>
                                                        <td>Passport</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->passport_file) }}"
                                                            alt="Aadhar Card Front">
                                                   </td>
                                                        <td> 

                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('passport_file', 1)"> Approve</button>
                                                            
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('passport_file', 0)"> Reject</button>
                                                        </td>

                                                    </tr>


                                                     <tr>
                                                        <td>Voters ID</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->voters_id_file) }}"
                                                            alt="Aadhar Card Front">
                                                   </td>
                                                        <td> 
                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('voters_id_file', 1)"> Approve</button>
                                                            
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('voters_id_file', 0)"> Reject</button>
                                                        </td>

                                                    </tr> 
                                                    <tr>
                                                        <td>Driving License</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->dl_file) }}"
                                                            alt="Aadhar Card Front">
                                                   </td>
                                                        <td> 

                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('dl_file', 1)"> Approve</button>
                                                            
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('dl_file', 0)"> Reject</button>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Educational Certificate</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->education_certificate_file) }}"
                                                            alt="Aadhar Card Front">
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('education_certificate_file', 1)"> Approve</button>
                                                            
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('education_certificate_file', 0)"> Reject</button>

                                                        </td>

                                                    </tr>

                                                     <tr>
                                                        <td>Reliving Letter</td>
                                                        <td> <img class="w-100 h-100 soc-det-img "
                                                            src="{{ URL::asset('images/' . $documents_filenames[0]->reliving_letter_file) }}"
                                                            alt="Aadhar Card Front">
                                                        </td>
                                                        <td> 
                                                            
                                                            <button class="btn btn-success" onclick="approveOrRejectDocument('reliving_letter_file', 1)"> Approve</button>
                                                            
                                                            <button class="btn btn-secondary" onclick="approveOrRejectDocument('reliving_letter_file', 0)"> Reject</button>
                                                        </td>
                                                    </tr>
                                       
                                     
                                                </tbody>
                                            </table>
                                            
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

            function approveOrRejectDocument(docName, aproveStatus){
            
                $.ajax({
                    url: "{{route('vmt-store-documents-review')}}",
                    type: "POST",
                    data: {
                        user_code : "{{\Request::get('user_code')}}",
                        doc_name: docName,
                        approve_status: aproveStatus,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {
                        alert(data);
                    }
                });
            }

           


            $("#button_close").click(function(){
                window.location.href = "/";
            });
    </script>


    @endsection
