<template>
   <div class="offer-letter-wrapper mt-30">
        <div class="card  left-line mb-2">
            <div class="card-body  pb-0 pt-1">
                <ul class="nav nav-pills nav-tabs-dashed " role="tablist">
                    <li class="nav-item text-muted " role="presentation">
                        <router-link active-class="active" class="nav-link  pb-2"   to="/offer_pending">Pending</router-link>
                        <!-- <a class="nav-link active pb-2" data-bs-toggle="tab" href="#offer_pending" aria-selected="true"
                            role="tab">
                            Pending
                        </a> -->
                    </li>
                    <li class="nav-item  text-muted mx-4" role="presentation">
                        <router-link class="nav-link  pb-2" active-class="active" to="/offer_completed">Completed</router-link>

                        <!-- <a class="nav-link  pb-2" data-bs-toggle="tab" href="#offer_completed" aria-selected="true"
                            role="tab">
                            Completed
                        </a> -->
                    </li>
                    <li class="nav-item text-muted" role="presentation">
                        <router-link class="nav-link  pb-2" active-class="active" to="/offer_resent">Resent</router-link>

                        <!-- <a class="nav-link  pb-2" data-bs-toggle="tab" href="#offer_resent" aria-selected="true"
                            role="tab">
                            Resent
                        </a> -->
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <!-- <div class="tab-pane show fade active" id="offer_pending" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card ">
                    <div class="card-body">
                        <div class="offer-pending-content">
                            <div class="row">
                                <div class="col-xl-8 col-sm-8 col-lg-8 col-md-8 col-xxl-8"><span
                                        class="text-muted font-medium">Here you
                                        can
                                        view the saved offer letters to be sent</span></div>
                                <div class="col-xl-4 col-sm-4 col-lg-4 col-md-4 col-xxl-4 text-end">
                                    <button  class="btn btn-orange">
                                        <i class=" fa fa-plus-circle me-1"></i>
                                        <router-link to="/offer_letter_generation">
                                            Create offer</router-link>
                                    </button>

                                 <a href="{{ route('create-offer') }}" class="btn btn-orange">
                                        <i class=" fa fa-plus-circle me-1"></i>
                                            <router-link to="/offer_letter_generation">link</router-link> Create
                                        Offer</a>
                                </div>
                            </div>
                            <div id="offerletter_pending" class="" style=""></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="offer-delete-content">
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 col-xxl-12"><span
                                        class="text-muted font-medium">
                                        Deleted offer letters are stored here for 10 days</span>
                                </div>
                                <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 col-xxl-12">
                                    <div id="deleted_offerletter" style=""></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->

            <div class="tab-pane  fade " id="offer_completed" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card mb-0">
                    <div class="card-body">
                        <div id="offerletter_completedTable" style=""></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane  fade " id="offer_resent" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card mb-0">
                    <div class="card-body">

                            <div id="offerletter_resentTable" class="no-customize" style=""></div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <router-view></router-view>
</template>
