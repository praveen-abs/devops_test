<template>
    <div>
        <TaxSavingInvestments />



        <!-- Navigation Bar -->

        <div class="mb-2 shadow card left-line">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item ember-view " role="presentation">
                        <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#c_cc" role="tab" aria-controls="" aria-selected="true">
                            Section 80C & 80CCC</a>
                    </li>
                    <li class="nav-item ember-view " role="presentation">
                        <a class="mx-0 nav-link ember-view mx-xl-3 " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#other_exemptions" role="tab" aria-controls="" aria-selected="true">
                            Other Exemptions
                        </a>
                    </li>
                    <li class="nav-item ember-view " role="presentation">
                        <a class="nav-link ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#house_property" role="tab" aria-controls="" aria-selected="true">
                            House Property
                        </a>
                    </li>
                    <li class="nav-item ember-view " role="presentation">
                        <a class="mx-0 nav-link ember-view mx-xl-3 " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#reimbursement" role="tab" aria-controls="" aria-selected="true">
                            Reimbursement
                        </a>
                    </li>
                    <li class="nav-item ember-view " role="presentation">
                        <a class="nav-link ember-view " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#previous_income" role="tab" aria-controls="" aria-selected="true">
                            Previous Employer Income
                        </a>
                    </li>
                    <li class="nav-item ember-view " role="presentation">
                        <a class="mx-0 nav-link ember-view mx-xl-3 " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#other_income" role="tab" aria-controls="" aria-selected="true">
                            Other Source Of Income
                        </a>
                    </li>

                </ul>
            </div>
        </div>


        <!-- Tab Content -->


        <div class="tab-content " id="">
            <div class="tab-pane fade active show " id="c_cc" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="table-responsive">
                </div>
            </div>
            <div class="tab-pane fade " id="house_property" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mb-3 table-responsive">

                </div>

                <div class="mb-2 shadow card">
                    <div class="pt-1 pb-0 card-body">
                        <ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist">
                            <li class="mx-4 nav-item ember-view" role="presentation">
                                <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#house_rent" role="tab" aria-controls="" aria-selected="true">
                                    Rentel Property</a>
                            </li>
                            <li class="mx-4 nav-item ember-view" role="presentation">
                                <a class="nav-link ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#house_own" role="tab" aria-controls="" aria-selected="true">
                                    Owner Property</a>
                            </li>


                        </ul>
                    </div>

                </div>

                <div class="tab-content " id="">
                    <div class="tab-pane fade active show" id="house_rent" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mb-0 card top-line border-bottom-0 border-end-0 border-start-0">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="mb-3 col-12 text-end">
                                        <button class="btn btn-border-orange" data-bs-target="#AddRendted_modal"
                                            data-bs-toggle="modal"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                                            Add Rented</button>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">
                                        <div class="mb-0 card top-line">
                                            <div class="card-body">

                                                <div class="mb-2 row border-bottom-secondary ">

                                                    <div class="col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6 ">
                                                        <h6 class="mt-1 mb-0">Rental Details</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6 text-end">

                                                        <span class="badge bg-primary me-2">Rented</span>
                                                        <button class="bg-transparent border-0 outline-none btn"><i
                                                                class="fa fa-pencil-square-o text-orange"></i>
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">
                                                        <label for="" class="form-label text-primary fw-bold">From</label>

                                                        <p class="text-muted"> Jun 2022</p>

                                                    </div>
                                                    <div class="mb-2 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">

                                                        <label for="" class="form-label text-primary fw-bold">To</label>

                                                        <p class="text-muted"> Jun 2023</p>
                                                    </div>

                                                    <div class="mb-2 col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12">
                                                        <label for=""
                                                            class="form-label text-primary fw-bold">Address</label>
                                                        <p class="text-muted">No:21 joe street,Guindy </p>


                                                    </div>
                                                    <div class="mb-2 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">
                                                        <label for="" class="form-label text-primary fw-bold">City</label>

                                                        <p class="text-muted">Chennai</p>

                                                    </div>
                                                    <div class="mb-2 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">
                                                        <label for="" class="form-label text-primary fw-bold">Rent
                                                            Declared</label>

                                                        <p class="text-muted "><i class="fa fa-rupee"></i> 1,00,000</p>

                                                    </div>
                                                </div>
                                                <div class="row ">

                                                    <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12 ">
                                                        <h6 class="">Owner Details</h6>
                                                    </div>
                                                    <div class="mb-2 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">
                                                        <label for="" class="form-label text-primary fw-bold">Name</label>

                                                        <p class="text-muted">Abdul</p>

                                                    </div>
                                                    <div class="mb-2 col-sm-12 col-md-6 col-xl-6 col-xxl 6 col-lg-6">
                                                        <label for="" class="form-label text-primary fw-bold">PAN
                                                            NUMBER</label>

                                                        <p class="text-muted">eeeDe11n</p>

                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12 ">
                                                        <label for=""
                                                            class="form-label text-primary fw-bold">Address</label>
                                                        <p class="text-muted">No:21 joe street,Guindy </p>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="house_own" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mb-0 card top-line border-bottom-0 border-end-0 border-start-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-border-orange" data-bs-target="#AddOwned_modal"
                                            data-bs-toggle="modal"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                                            Add Own</button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="height: 300px;max-width:500px;" class="">
                                        </div>

                                    </div>
                                    <h4> <span class="text-orange">Sorry !</span> No data</h4>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="reimbursement" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="mb-0 card top-line border-bottom-0 border-end-0 border-start-0">
                    <div class="card-body">
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="previous_income" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="mb-0 card top-line border-bottom-0 border-end-0 border-start-0">
                    <div class="card-body">
                        <div class="table-responsive">
                        

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="other_income" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="mb-0 card top-line border-bottom-0 border-end-0 border-start-0">
                    <div class="card-body">
                        <div class="table-responsive">



                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="other_exemptions" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="mb-0 card top-line border-bottom-0 border-end-0 border-start-0">
                    <div class="card-body">
                        <div class="table-responsive ">
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script setup>

import TaxSavingInvestments from './tax_saving_investments/tax_saving_investments.vue'
</script>