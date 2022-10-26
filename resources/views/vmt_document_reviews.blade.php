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
            /* width: 100% !important;
                margin-left: 0 !important;
                height: 2.9em; */
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
        @slot('li_1')
        @endslot
    @endcomponent

    {{-- @section('ui-onboarding') --}}
    <div class="container-fluid documentReview_wrapper">
        <div id="msform">
            @csrf
            <input type="hidden" name="hidden_user_code" id="hidden_user_code" value="{{ $user_code }}" />
            <div class="card shadow  profile-box card-top-border p-2">
                <div class="card-body">
                    <h6 class="mb-0 text-start">Documents Review</h6>
                    <div class="header-card-text text-end">

                        @if (str_contains(json_encode($docs_reviewed), -1) || $docs_reviewed == null)
                            <button class="btn  btn-orange" onclick="approveAllDocument()">Approve All</button>
                        @endif
                    </div>
                    <div class="form-card mb-2 mt-2">


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Approval Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aadhar Card Front</td>
                                    <td>
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->aadhar_card_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->aadhar_card_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->aadhar_card_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->aadhar_card_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_file', 1)">
                                                Approve</button>
                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_file', 1)">
                                                Approve</button>
                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>
                                </tr>
                                @if( !empty($documents_filenames[0]->aadhar_card_backend_file))

                                <tr>
                                    <td>Aadhar Card Back</td>
                                    <td>
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->aadhar_card_backend_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->aadhar_card_backend_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->aadhar_card_backend_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->aadhar_card_backend_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_backend_file', 1)">
                                                Approve</button>
                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_backend_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_backend_file', 1)">
                                                Approve</button>
                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('aadhar_card_backend_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @if( !empty($documents_filenames[0]->pan_card_file))

                                <tr>
                                    <td>Pan Card</td>
                                    <td>
                                        <!-- <img class="w-100 h-100 soc-det-img "
                                                                    src="{{ URL::asset('images/' . $documents_filenames[0]->pan_card_file) }}"
                                                                    alt="Aadhar Card Front"> -->
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->pan_card_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->pan_card_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->pan_card_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->pan_card_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('pan_card_file', 1)">
                                                Approve</button>
                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('pan_card_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('pan_card_file', 1)">
                                                Approve</button>
                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('pan_card_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @if( !empty($documents_filenames[0]->passport_file))

                                <tr>
                                    <td>Passport</td>
                                    <td>
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->passport_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->passport_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->passport_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->passport_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('passport_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('passport_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('passport_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('passport_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>

                                </tr>

                                @endif
                                @if( !empty($documents_filenames[0]->voters_id_file))

                                <tr>
                                    <td>Voters ID</td>
                                    <td>
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->voters_id_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->voters_id_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->voters_id_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->voters_id_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('voters_id_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('voters_id_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('voters_id_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('voters_id_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>

                                </tr>
                                @endif
                                @if( !empty($documents_filenames[0]->dl_file))

                                <tr>
                                    <td>Driving License</td>
                                    <td>
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->dl_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->dl_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->dl_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->dl_file == -1)
                                            <button class="btn btn-border-primary" onclick="approveOrRejectDocument('dl_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary" onclick="approveOrRejectDocument('dl_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"onclick="approveOrRejectDocument('dl_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary" onclick="approveOrRejectDocument('dl_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>

                                </tr>
                                @endif
                                @if( !empty($documents_filenames[0]->education_certificate_file))
                                <tr>
                                    <td>Educational Certificate</td>
                                    <td>
                                        <!-- <img class="w-100 h-100 soc-det-img "
                                                                    src="{{ URL::asset('images/' . $documents_filenames[0]->education_certificate_file) }}"
                                                                    alt="Aadhar Card Front"> -->
                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->education_certificate_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->education_certificate_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->education_certificate_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($docs_reviewed) && $docs_reviewed->education_certificate_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('education_certificate_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('education_certificate_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('education_certificate_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('education_certificate_file', 0)">
                                                Reject</button>
                                        @endif
                                    </td>

                                </tr>
                                @endif
                                @if( !empty($documents_filenames[0]->reliving_letter_file))
                                <tr>
                                    <td>Reliving Letter</td>
                                    <td>
                                        <!-- <img class="w-100 h-100 soc-det-img "
                                                                    src="{{ URL::asset('images/' . $documents_filenames[0]->reliving_letter_file) }}"
                                                                    alt="Aadhar Card Front"> -->

                                        <div class="view-file"
                                            data-src="{{ URL::asset('employee_documents/' . $user_code . '/' . $documents_filenames[0]->reliving_letter_file) }}"
                                            style="cursor:pointer">
                                            {{ 'View Documents' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($docs_reviewed != null)
                                            @if ($docs_reviewed->reliving_letter_file == 1)
                                                {{ 'Approved' }}
                                            @elseif($docs_reviewed->reliving_letter_file == 0)
                                                {{ 'Rejected' }}
                                            @else
                                                {{ 'Not Reviewed' }}
                                            @endif
                                        @else
                                            {{ 'Not Reviewed' }}
                                        @endif
                                    </td>
                                    <td>

                                        @if (isset($docs_reviewed) && $docs_reviewed->reliving_letter_file == -1)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('reliving_letter_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('reliving_letter_file', 0)">
                                                Reject</button>
                                        @endif

                                        @if ($docs_reviewed == null)
                                            <button class="btn btn-border-primary"
                                                onclick="approveOrRejectDocument('reliving_letter_file', 1)">
                                                Approve</button>

                                            <button class="btn btn-primary"
                                                onclick="approveOrRejectDocument('reliving_letter_file', 0)">
                                                Reject</button>
                                        @endif

                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            </form>
        </div>


<div id="notificationModal" class="modal custom-modal fade" role="dialog"  style="opacity:1; display:none;background:#00000073;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
        <div class="modal-content top-line">
            <div id="modalHeader" class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                <h6 class="modal-title mb-1 text-primary"  style="border-bottom:5px solid #d0d4e2;">
                 Documents Review</h6>
                <button type="button" class="close-modal outline-none bg-transparent border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">



        {{-- <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true"
            style="opacity:1; display:none;background:#00000073;">
            <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true"
                aria-labelledby="">
                <div class="modal-content">
                    <div class="modal-header py-2 bg-primary">
                        <div class="w-100 modal-header-content d-flex align-items-center py-2">
                            <h5 class="modal-title text-white" id="modalHeader">Documents
                            </h5>
                            <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>
                    </div>
                    <div class="modal-body"> --}}

                            <div class="mb-2 col-md mx-auto text-center" id="modalBody">

                            </div>
                            <div class="text-end">
                                <button type="button" id="button_close" class="btn btn-border-primary close-modal"
                                    data-bs-dismiss="modal">Close</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @endsection --}}



@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>

    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

    <script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
    <!--Progressbar JS-->
    <script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>


    <script>
        $('body').on('click', '.close-modal', function() {
            $('#notificationModal').hide();
            $('#notificationModal').addClass('fade');
        });


        $('.view-file').on('click', function(e) {
            console.log($(this).data('src'));
            var docHtmlString = "<img src=" + $(this).data('src') + " width='100%' />";
            $('#modalBody').html(docHtmlString);

            $('#notificationModal').show();
        })

        function approveOrRejectDocument(docName, aproveStatus) {
            $.ajax({
                url: "{{ route('vmt-store-documents-review') }}",
                type: "POST",
                data: {
                    user_code: $('#hidden_user_code').val(),
                    doc_name: docName,
                    approve_status: aproveStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert("Document reviewed successfully");
                    //window.location.href = "/";
                    location.reload();
                }
            });
        }

        function approveAllDocument() {
            //e.preventDefault();
            console.log('aprove_All');

            var doc_reviewed = {
                aadhar_card_file: 1,
                aadhar_card_backend_file: 1,
                pan_card_file: 1,
                passport_file: 1,
                voters_id_file: 1,
                dl_file: 1,
                education_certificate_file: 1,
                reliving_letter_file: 1
            }

            $.ajax({
                url: "{{ route('vmt-store-documents-review-approve-all') }}",
                type: "POST",
                data: {
                    user_code: $('#hidden_user_code').val(),
                    doc_array: doc_reviewed,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert("All Documents approved successfully");
                    //window.location.href = "/";
                    location.reload();
                }
            });
        }



        // $("#button_close").click(function(){
        //     window.location.href = "/";
        // });
    </script>
@endsection
