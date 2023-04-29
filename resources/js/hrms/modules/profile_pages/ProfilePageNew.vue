<!-- <template>

</template> -->

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
            <!-- <div v-if="!_instance_profilePagesStore.loading_screen"> <EmployeeCard /></div> -->
            <div v-if="!_instance_profilePagesStore.loading_screen" class="col-3 col-sm-12 col-md-3 col-lg-3 col-xxl-3 col-xl-3">
                <EmployeeCard />
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

                        <!-- <Documents /> -->

                    </div>

                </div>

            </div>
        </div>
    </div>

</template>



<script setup>
import EmployeeCard from './EmployeeCard/EmployeeCard.vue'
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

    )})
</script>
