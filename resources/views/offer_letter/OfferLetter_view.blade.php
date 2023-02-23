@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    @vite(['resources/scss/views/offer_letter.scss'])
@endsection
@section('content')
    <div class="offer-letter-wrapper mt-30">
        <div class="card  left-line mb-2">
            <div class="card-body  pb-0 pt-1">
                <ul class="nav nav-pills nav-tabs-dashed " role="tablist">
                    <li class="nav-item text-muted " role="presentation">
                        <a class="nav-link active pb-2" data-bs-toggle="tab" href="#offer_pending" aria-selected="true"
                            role="tab">
                            Pending
                        </a>
                    </li>
                    <li class="nav-item text-muted mx-4" role="presentation">
                        <a class="nav-link  pb-2" data-bs-toggle="tab" href="#offer_completed" aria-selected="true"
                            role="tab">
                            Completed
                        </a>
                    </li>
                    <li class="nav-item text-muted" role="presentation">
                        <a class="nav-link  pb-2" data-bs-toggle="tab" href="#offer_resent" aria-selected="true"
                            role="tab">
                            Resent
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show fade active" id="offer_pending" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        {{-- <div class="row">
                            <div class="col-xl-8 col-sm-8 col-lg-8 col-md-8 col-xxl-8"><span class="text-muted">Here you can
                                    view the saved offer letters to be sent</span></div>
                            <div class="col-xl-4 col-sm-4 col-lg-4 col-md-4 col-xxl-4">
                                <button class="btn btn-orange"><i class=" fa fa-plus-circle me-1"></i> Create Offer</button>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 col-xxl-12 mb-2">
                                <p class="text-muted fs-16 fw-bold">Offer letter generation</p>
                                <p class="text-muted fs-12">(fill the basic details to generate the offer letter)</p>
                            </div>
                            <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 mb-3 col-xxl-12 text-center">
                                <div>
                                    <h6>Choose mode</h6>
                                </div>
                                <div class="mx-auto d-flex align-items-center justify-content-center">
                                    <div class="form-check  me-4">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-2" type="radio" name="offer-mode"
                                                id="">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Normal Mode
                                            </label>
                                        </div>
                                        <span class="text-muted fs-10">(To Generate Single Offer Letter)</span>
                                    </div>
                                    <div class="form-check  me-4">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-2" type="radio" name="offer-mode"
                                                id="">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Normal Mode
                                            </label>
                                        </div>
                                        <span class="text-muted fs-10">(To Generate Bulk Offer Letter)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mb-3 col-xxl-6 ">
                                <p class="text-muted fs-14 mb-2">Candidate Details</p>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mb-3 col-xxl-6 ">
                            </div>
                            <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mb-3 col-xxl-6 ">
                            </div>
                        </div>
                        {{-- <div class="mx-auto col-md-4 text-center">
                            <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}" class="" alt="no-data">
                            <h4> <span class="text-orange">Sorry !</span> No data</h4>
                        </div> --}}



                        <div id="vjs_offerletter_module" style="display:none"></div>

                    </div>

                    <div class="tab-pane  fade " id="offer_completed" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div id="yet-to-active-directory-table" class="noCustomize_gridjs"></div>
                    </div>
                    <div class="tab-pane  fade " id="offer_resent" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div id="exit_employeeTable" class="noCustomize_gridjs"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/hrms/modules/onboarding_module/OfferLetterModule.js'])
@endsection
