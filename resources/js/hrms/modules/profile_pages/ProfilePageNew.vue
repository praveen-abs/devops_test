<!-- <template>

</template> -->

<template>
        <div class="profile_page-wrapper mt-30 container-fluid">
        <div class="row">
            <div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xxl-3 col-xl-3">

                <div class="card top-line mb-0 ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end">
                                <button class="btn outline-none border-0 bg-transparent m-0 p-0"
                                    data-bs-target="#show_idCard" data-bs-toggle="modal">
                                    <i class="fa fa-id-card text-success" aria-hidden="true"></i>
                                </button>

                                <!-- {{-- <i class="bi bi-person-vcard"></i> --}} -->
                            </div>
                            <div class="col-12 text-center">


                                <div class="rounded-circle img-xl
                                 mx-auto userActive-status profile-img"
                                    style="border:6px solid #c2c2c2c2">

                                    <a class="edit-icon  " data-bs-toggle="modal" data-bs-target="#edit_profileImg"
                                        id="">
                                        <i class="fa fa-camera"></i></a>
                                </div>


                                <div class="mt-4">
                                    <div class="progress-wrapper border-bottom-liteAsh ">
                                        <div class="mb-1 text-center">
                                            <h6 class="text-center">
                                                <!-- {{ $user->name }} -->
                                            </h6>
                                        </div>
                                        <div class="mb-1 d-flex justify-content-between ">
                                            <span class="text-muted f-12">Profile Completeness</span>
                                            <span class="text-muted text-end f-12 fw-bold" id="prograssBar_percentage">

                                            </span>
                                        </div>
                                        <div class="progress progress-bar-content mb-2">
                                            <div class="progress-bar  " role="progressbar" id="profile_progressBar"
                                                aria-valuenow="{{ $profileCompletenessValue }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted f-10 text-start mb-2 fw-bold">Your profile is completed</p>
                                    </div>

                                    <div class="profile-mid-right-content mb-4 text-center ">
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Employee Status</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ getEmployeeActiveStatus($user->id) ?? '-' }} -->
                                            </p>

                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Employee Code</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ $user_full_details->user_code ?? '-' }} -->
                                            </p>

                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Designation</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ $user_full_details->designation }} -->
                                            </p>

                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Location</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ $user_full_details->work_location ?? '-' }}-->
                                                </p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Department</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ $department ?? '-' }}-->
                                                    </p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Reporting To</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ $user_full_details->l1_manager_name ?? '-' }}-->
                                                </p>
                                        </div>
                                    </div>
                                    <div class="profile-bottom-right-content  text-center ">
                                        <!-- {{-- <button class="btn btn-danger"><i class="fa fa-sign-out me-2"></i> Logout </button> --}} -->
                                        <button class="btn btn-danger"><i class="fa fa-sign-out me-1"></i> Action </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xxl-9 col-xl-9">
              <div class="mb-2 card top-line">
        <div class="pt-1 pb-0 card-body">
            <ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation">
                    <a class="nav-link active " id="" data-bs-toggle="pill" href="" data-bs-target="#employee_details"
                        role="tab" aria-controls="pills-home" aria-selected="true">
                        Employee Details</a>
                </li>
                <li class="mx-4 nav-item" role="presentation">
                    <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#family_det"
                        role="tab" aria-controls="pills-home" aria-selected="true">
                        Family</a>
                </li>
                <li class="nav-item " role="presentation">
                    <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#experience_det"
                        role="tab" aria-controls="pills-home" aria-selected="true">
                        Experience</a>
                </li>
                <li class="mx-4 nav-item " role="presentation">
                    <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#finance_det" role="tab"
                        aria-controls="pills-home" aria-selected="true">
                        Finance</a>
                </li>
                <li class="nav-item " role="presentation">
                    <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#document_det" role="tab"
                        aria-controls="pills-home" aria-selected="true">
                        Document</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content " id="pills-tabContent">

        <div class="tab-pane fade active show" id="employee_details" role="tabpanel" aria-labelledby="">
            <EmployeeDetails />
        </div>

        <div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">
            <FamilyDetails />



        </div>

        <div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">
            <ExperienceDetails />

        </div>
        <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">
            <FinanceDetails />


        </div>
        <div class="tab-pane fade" id="document_det" role="tabpanel" aria-labelledby="">

            <Documents />

        </div>

    </div>

                </div>
                </div>
                </div>




</template>


<script setup>

import EmployeeDetails from './employee_details/EmployeeDetails.vue'
import FamilyDetails from './family_details/FamilyDetails.vue'
import FinanceDetails from './finance_details/FinanceDetails.vue'
import ExperienceDetails from './experience/ExperienceDetails.vue'
import Documents from './documents/documents.vue'

import { Service } from '../Service/Service'
import { onMounted } from 'vue'


onMounted(() => {

    Service()

})
</script>
