<template>
    <div>
        <h1 class="mb-4 fs-3 d-flex  align-items-center fw-bolder"  style="color: #003056" ><i class='fas fa-cog fs-3 mr-3 '></i> Salary Advance & Loan Settings</h1>

        <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line">
            <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
                <li class="mx-2 nav-item " role="presentation">
                    <a class="nav-link " id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                        aria-selected="true" @click="activetab = 1" :class="[activetab === 1 ? 'active' : '']">
                        Salary Advance
                    </a>
                </li>

                <li class="mx-3 nav-item " role="presentation">
                    <a class="mx-4 text-center nav-link" id="" data-bs-toggle="pill" href="" @click="activetab = 2"
                        :class="[activetab === 2 ? 'active' : '']" role="tab" aria-controls="" aria-selected="true">
                        Interest Free Loan
                    </a>
                </li>
                <li class="mx-3 nav-item " role="presentation">
                    <a class="mx-4 text-center nav-link" id="" data-bs-toggle="pill" href="" @click="activetab = 3"
                        :class="[activetab === 3 ? 'active' : '']" role="tab" aria-controls="" aria-selected="true">

                        Travel Advance
                    </a>
                </li>
                <li class="mx-3 nav-item " role="presentation">
                    <a class="mx-4 text-center nav-link " id="" data-bs-toggle="pill" href="" @click="activetab = 4"
                        :class="[activetab === 4 ? 'active' : '']" role="tab" aria-controls="" aria-selected="true">
                        Loan With Interest
                    </a>
                </li>
            </ul>

        </div>


        <!-- Tab Content -->


        <div class="tab-content " id="">
            <div class="mr-4 ">

                <div class="card-body">
                    <div v-if="activetab === 1">
                        <SalaryAdvance />
                    </div>
                    <div v-if="activetab === 2">
                        <InterestFreeLoan />
                    </div>
                    <div v-if="activetab === 3">
                        <TravelAdvance />
                    </div>
                    <div v-if="activetab === 4">
                        <LoanWithInterest />
                    </div>
                </div>


            </div>


        </div>
    </div>
</template>


<script setup>


import { onMounted, ref } from 'vue';
import SalaryAdvance from './salary_advance/salary_advance.vue';
import LoanWithInterest from './loan_with_interest/loan_with_interest.vue';
import InterestFreeLoan from './interest_free_loan/interest_free_loan.vue';
import TravelAdvance from './travel_advance/travel_advance.vue';




const activetab = ref(1);



</script>
