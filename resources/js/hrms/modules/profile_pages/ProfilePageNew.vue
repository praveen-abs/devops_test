<template>
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
