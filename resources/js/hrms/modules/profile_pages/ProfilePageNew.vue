<template>
    <Toast />
    <LoadingSpinner class="absolute z-50 bg-white" v-if="_instance_profilePagesStore.loading_screen" />
    <div class="w-full h-screen bg-gray-50 p-3"
        v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details">
        <EmployeeCard />

        <div class="w-full my-2">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 col-xl-12">
                <div class="mb-2">
                    <div class="pt-1 pb-0 ">
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
                                    Paycheck</a>
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

                    <div class="tab-pane  fade active show" id="employee_details" role="tabpanel" aria-labelledby="">
                        <div>
                            <EmployeeDetails />
                        </div>
                    </div>

                    <div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">
                        <FamilyDetails />
                    </div>

                    <div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">
                        <ExperienceDetails />

                    </div>
                    <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">
                        <div>
                            <FinanceDetails />
                        </div>


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
import {ref, onMounted } from 'vue'
import EmployeeCard from './EmployeeCard/EmployeeCard.vue'
import EmployeeDetails from './employee_details/EmployeeDetails.vue'
import FamilyDetails from './family_details/FamilyDetails.vue'
import FinanceDetails from './finance_details/FinanceDetails.vue'
import ExperienceDetails from './experience/ExperienceDetails.vue'
import Documents from './documents/documents.vue'
import LoadingSpinner from '../../components/LoadingSpinner.vue'
import { Service } from '../Service/Service'
import { profilePagesStore } from './stores/ProfilePagesStore'

import { useRouter, useRoute } from "vue-router";


const service = Service()
const route = useRoute();


let _instance_profilePagesStore = profilePagesStore();

onMounted(async () => {
    if (route.params.user_code) {

        _instance_profilePagesStore.user_code = route.params.user_code
        console.log( _instance_profilePagesStore.user_code );
        _instance_profilePagesStore.loading_screen = true
        await _instance_profilePagesStore.fetchEmployeeDetails().finally(() => {
            _instance_profilePagesStore.loading_screen = false
        })

    } else {
        _instance_profilePagesStore.user_code = service.current_user_id
        console.log( _instance_profilePagesStore.user_code );
        await _instance_profilePagesStore.fetchEmployeeDetails()
    }
})
</script>
<style lang="scss"></style>
