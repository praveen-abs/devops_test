@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    @vite(['resources/scss/views/offer_letter.scss'])
@endsection
@section('content')
    <div class="offer-letter-wrapper mt-30">
        <div class="card">
            <div class="card-body mx-5">
                <div class="no-data-wrapper text-center mx-auto col-lg-5" id="">
                    <img alt="no-data" id="" src="{{ URL::asset('assets/images/svg/offer-noData.svg') }}" />
                    <a target="_self" id="create_offer" role="button" href="#" class="btn btn-orange"><i
                            class="fa fa-plus-circle me-1" aria-hidden="true"></i> Create Offer</a>

                </div>

                <div class="crate-offer-content" id="createOffer_content" style="display:none;">
                    <div class="row mb-3">
                        <div class="col-xl-6 col-sm-6 col-lg-6 col-md-6 col-xxl-6 ">
                            <p class="text-muted fs-16 font-medium">Offer letter generation</p>
                            <p class="text-muted fs-12">(fill the basic details to generate the offer letter)</p>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-lg-6 mb-2 col-md-6  col-xxl-6 text-center">
                            {{-- <p class="fs-15 font-medium mb-3">Choose the mode</p> --}}
                            <div class="mx-auto d-flex align-items-center justify-content-center">
                                <div class="form-check  me-4">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-2" type="radio" name="offer-mode" id=""
                                            checked>
                                        <label class="form-check-label" for="">
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
                                            Bulk Mode
                                        </label>
                                    </div>
                                    <span class="text-muted fs-10">(To Generate Bulk Offer Letter)</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-xl-6 col-sm-12  col-lg-6 col-md-6 mb-3 col-xxl-6 ">
                            <div class="normal-offer-content">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 mb-3 col-xxl-12 ">
                                        <h6 class="text-muted fs-14 mb-2">Candidate Details</h6>
                                        <div class="card mb-2 bg-lite-gray">
                                            <div class="card-body">

                                                <div class="mb-3">
                                                    <label for="">Candiate Name</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Mail Id</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Mobile Number</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 mb-3 col-xxl-12 ">
                                        <h6 class="text-muted fs-14 mb-2">Salary Details</h6>
                                        <div class="card mb-3 bg-lite-gray">
                                            <div class="card-body">

                                                <div class="d-flex mb-4 align-items-center justify-content-center">
                                                    <div class="form-check  me-4">
                                                        <div class="d-flex align-items-center">
                                                            <input class="form-check-input me-2" type="radio"
                                                                name="structure-mode" id="" checked>
                                                            <label class="form-check-label" for="">
                                                                4-Structure
                                                            </label>
                                                        </div>
                                                        <span class="text-muted fs-10">(To Generate Single Offer
                                                            Letter)</span>
                                                    </div>
                                                    <div class="form-check  me-4">
                                                        <div class="d-flex align-items-center">
                                                            <input class="form-check-input me-2" type="radio"
                                                                name="structure-mode" id="">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                10-Structure
                                                            </label>
                                                        </div>
                                                        <span class="text-muted fs-10">(To Generate Bulk Offer
                                                            Letter)</span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mb-3 col-xxl-6 mb-3">
                                                        <label for="">Pay (<i class="fa fa-inr"
                                                                aria-hidden="true"></i>)</label>
                                                        <input type="text" class="form-control" id=""
                                                            placeholder="">
                                                    </div>
                                                    <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mb-3 col-xxl-6 mb-3">
                                                        <label for="">Specification</label>
                                                        <select name="" id="" class="form-select">
                                                            <option value=""></option>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Pay(In words)</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 mb-3 col-xxl-12 ">

                                        <h6 class="text-muted fs-14 mb-2">Role Details</h6>
                                        <div class="card bg-lite-gray">
                                            <div class="card-body">

                                                <div class="mb-3">
                                                    <label for="">Designation</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Expected DOJ</label>
                                                    <input type="date" class="form-control" id=""
                                                        placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Location</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Offer Expiry Date</label>
                                                    <input type="Date" class="form-control" id=""
                                                        placeholder="Offer Expiry Date">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="bulk-offer-content">
                                @include('vmt_employeeOnboarding_BulkUpload')
                            </div> --}}
                        </div>
                        <div class="col-xl-6 col-sm-12  col-lg-6 col-md-6 mb-3 col-xxl-6 ">

                            <div class="card mb-3 mt-4  bg-lite-gray offer-view-content">
                                <div class="card-body">
                                    <div class="text-center mx-auto col-lg-12" id="">
                                        <img alt="no-data" id=""
                                            src="{{ URL::asset('assets/images/svg/offer-noData.svg') }}" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-sm-12 text-end col-lg-12 col-md-12 mb-3 col-xxl-12 ">
                            <a href="{{ route('view-offer') }}" role="button"
                                class="btn btn-border-primary me-3">Save</a>
                            <button class="btn btn-dark me-3">Preview</button>
                            <button class="btn btn-orange me-3">Send to candidate</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/hrms/modules/onboarding_module/OfferLetterModule.js'])



    <script>
        $(document).ready(function() {
            $('#create_offer').click(() => {
                $('.no-data-wrapper').css('display', 'none');
                $('#createOffer_content').css('display', 'block');

            });




        })
    </script>
@endsection
