<template>
 <Toast />
    <Dialog header="Header" v-model:visible="_instance_profilePagesStore.loading_screen"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
        :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>

    <div class="profile_page-wrapper mt-30 container-fluid">
        <div class="row">
            <div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xxl-3 col-xl-3">


                <div class="mb-0 card top-line ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end">
                                <button class="p-0 m-0 bg-transparent border-0 outline-none btn"
                                    data-bs-target="#show_idCard" data-bs-toggle="modal">
                                    <i class="fa fa-id-card text-success" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="text-center col-12">


                                <div class="mx-auto rounded-circle img-xl userActive-status profile-img"
                                    style="border:6px solid #c2c2c2c2">

                                    <a class="edit-icon " data-bs-toggle="modal" data-bs-target="#edit_profileImg" id="">
                                        <i class="fa fa-camera"></i></a>
                                </div>


                                <div class="mt-4">
                                    <div class="progress-wrapper border-bottom-liteAsh ">
                                        <div class="mb-1 text-center">
                                            <h6 class="text-center">

                                                <!-- {{_instance_profilePagesStore.employeeDetails  }} -->

                                                {{ service.current_user_name }}
                                            </h6>
                                        </div>
                                        <div class="mb-1 d-flex justify-content-between ">
                                            <span class="text-muted f-12">Profile Completeness</span>
                                            <span class="text-muted text-end f-12 fw-bold" id="prograssBar_percentage">

                                            </span>
                                        </div>
                                        <div class="mb-2 progress progress-bar-content">
                                            <div class="progress-bar " role="progressbar" id="profile_progressBar"
                                                aria-valuenow="{{ $profileCompletenessValue }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="mb-2 text-muted f-10 text-start fw-bold">Your profile is completed</p>
                                    </div>

                                    <div class="mb-4 text-center profile-mid-right-content ">
                                        <div class="py-2 border-bottom-liteAsh">
                                            <p class="text-muted f-12 fw-bold">Employee Status</p>
                                            <p v-if="_instance_profilePagesStore.employeeDetails.active == 1" class="text-primary f-15 fw-bold">
                                              Active
                                            </p>
                                            <p v-else class="text-primary f-15 fw-bold">
                                             Not Active
                                            </p>

                                        </div>
                                        <div class="py-2 border-bottom-liteAsh">
                                            <p class="text-muted f-12 fw-bold">Employee Code</p>
                                            <p class="text-primary f-15 fw-bold">
                                                {{ _instance_profilePagesStore.employeeDetails.user_code }}
                                            </p>

                                        </div>
                                        <div class="py-2 border-bottom-liteAsh">
                                            <p class="text-muted f-12 fw-bold">Designation</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation }} -->
                                            </p>

                                        </div>
                                        <div class="py-2 border-bottom-liteAsh">
                                            <p class="text-muted f-12 fw-bold">Location</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.work_location }} -->
                                            </p>
                                        </div>
                                        <div class="py-2 border-bottom-liteAsh">
                                            <p class="text-muted f-12 fw-bold">Department</p>
                                            <p class="text-primary f-15 fw-bold">
                                                {{ _instance_profilePagesStore.employeeDetails.department }}
                                            </p>
                                        </div>
                                        <div class="py-2 border-bottom-liteAsh">
                                            <p class="text-muted f-12 fw-bold">Reporting To</p>
                                            <p class="text-primary f-15 fw-bold">
                                                <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name }} -->
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-center profile-bottom-right-content ">
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
                                <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#employee_details" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Employee Details</a>
                            </li>
                            <li class="mx-4 nav-item" role="presentation">
                                <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#family_det" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Family</a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#experience_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Experience</a>
                            </li>
                            <li class="mx-4 nav-item " role="presentation">
                                <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#finance_det"
                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                    Finance</a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#document_det"
                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                    Document</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content " id="pills-tabContent">

                    <div class="tab-pane fade active show" id="employee_details" role="tabpanel" aria-labelledby="" >
                        <div v-if="!_instance_profilePagesStore.loading_screen"><EmployeeDetails /></div>
                    </div>

                    <div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">
                        <FamilyDetails />



                    </div>

                    <div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">
                        <ExperienceDetails />

                    </div>
                    <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">
                        <div v-if="!_instance_profilePagesStore.loading_screen"><FinanceDetails /></div>


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
import { profilePagesStore } from './stores/ProfilePagesStore'
import { ref, onMounted } from 'vue'

const service = Service()



let _instance_profilePagesStore = profilePagesStore();

onMounted(async () => {

    console.log("Loading screen start : "+_instance_profilePagesStore.loading_screen)

    _instance_profilePagesStore.fetchEmployeeDetails().then(
        function(value) {
            console.log("Loading screen end : "+_instance_profilePagesStore.loading_screen)

            console.log("Req done");
        }

    )

    //console.log("Emp details : "+_instance_profilePagesStore.employeeDetails.get_employee_details);
})
</script>
