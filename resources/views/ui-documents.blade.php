{{-- @section('ui-onboarding') --}}
<div class="container-fluid mt-8">
    <div class="">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="">
                    <div id="msform">
                        <!-- progressbar -->
                        <!-- <ul id="progressbar">
                                <li class="active" id="account"><strong class="f-9 onboard-detail">Personal Details</strong></li>
                                <li id="personal"><strong class="f-9 onboard-detail">Location Details</strong></li>
                                <li id="payment"><strong class="f-9 onboard-detail">Official Details</strong></li>
                                <li id="confirm"><strong class="f-9 onboard-detail">Family Details</strong></li>
                                <li id="compensatory"><strong class="f-9 onboard-detail">Compensatory</strong></li>
                                <li id="end"><strong class="f-9 onboard-detail">Personal Documents</strong></li>
                            </ul> -->
                        <form id="form-documentsupload" enctype="multipart/form-data">
                            @csrf

                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center ">
                                    <div class="header-card-text">
                                        <h6 class="mb-0">Personal Documents</h6>
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
                                                <label for="">Aadhar Card Front
                                                    @if(!empty($existing_doc_filenames->aadhar_card_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif
                                                </label>
                                                <div class="addfiles form-control md" data="#aadhar_card_file" id="aadhar_card_file_label"><span class="file_label">Choose Aadhar
                                                        Card Front</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Aadhar Card" name="aadhar_card_file" id="aadhar_card_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2" id="aadhar_card_backend_content">
                                                <!-- <label class="" for="aadhar_card_backend">Aadhar Card Backend<span id="aadhar_card_backend_req">{!! required() !!}</span></label> -->
                                                <label for=""> Aadhar Card Back
                                                    @if(!empty($existing_doc_filenames->aadhar_card_backend_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif
                                                </label>
                                                <div class="addfiles form-control" data="#aadhar_card_backend_file" id="aadhar_card_backend_file_label"><span class="file_label">Choose
                                                        Aadhar Card Back</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Aadhar Card Backend" name="aadhar_card_backend_file" id="aadhar_card_backend_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="pan_card">Pan Card{!! required() !!}</label> -->
                                                <label for=""> Pan Card
                                                    @if(!empty($existing_doc_filenames->pan_card_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif

                                                </label>
                                                <div class="addfiles form-control" data="#pan_card_file" id="pan_card_file_label"><span class="file_label">Upload Pan
                                                        Card</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Pan Card" name="pan_card_file" id="pan_card_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="passport">Passport{!! required() !!}</label> -->
                                                <label for="">Passport
                                                    @if(!empty($existing_doc_filenames->passport_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif
                                                </label>
                                                <div class="addfiles form-control" data="#passport_file" id="passport_file_label"><span class="file_label">Choose
                                                        Passport</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Passport" name="passport_file" id="passport_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="voters_id">Voters ID</label> -->
                                                <label for="">Voters ID
                                                    @if(!empty($existing_doc_filenames->voters_id_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif

                                                </label>
                                                <div class="addfiles form-control" data="#voters_id_file" id="voters_id_file_label"><span class="file_label">Choose Voters
                                                        ID</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Voters ID" name="voters_id_file" id="voters_id_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="dl_file">Driving License</label> -->
                                                <label for=""> Driving License
                                                    @if(!empty($existing_doc_filenames->dl_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif


                                                </label>
                                                <div class="addfiles form-control" data="#dl_file" id="dl_file_label"><span class="file_label">Choose Driving
                                                        License</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Driving License"
                                                 name="dl_file" id="dl_file" class="onboard-form form-control files" />

                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <!-- <label class="" for="education_certificate">Educations Certificate{!! required() !!}</label> -->
                                                <label for="">Educations Certificate

                                                    @if(!empty($existing_doc_filenames->education_certificate_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif
                                                </label>
                                                <div class="addfiles form-control" data="#education_certificate_file" id="education_certificate_file_label"><span class="file_label">Choose
                                                        Educations Certificate</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Educations Certificate" name="education_certificate_file" id="education_certificate_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <!-- <label class="" for="reliving_letter">Reliving Letter</label> -->
                                                <label for=""> Reliving Letter
                                                    @if(!empty($existing_doc_filenames->reliving_letter_file))
                                                        <b>&nbsp&nbsp(Already uploaded)  </b>
                                                    @endif

                                                </label>
                                                <div class="addfiles form-control" data="#reliving_letter_file" id="reliving_letter_file_label"><span class="file_label">Choose
                                                        Reliving Letter</span></div>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" style="display:none;" placeholder="Reliving Letter" name="reliving_letter_file" id="reliving_letter_file" class="onboard-form form-control files" />
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
