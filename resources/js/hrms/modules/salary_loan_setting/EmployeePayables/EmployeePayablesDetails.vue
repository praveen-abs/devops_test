<template>
    <div>
        <h1>Employee Payables - Jun 2023</h1>
        <p>Payment Batches</p>

        <div style="position: relative;">
        <h1 class="mb-4 fs-3 d-flex align-items-center fw-bolder" style="color: #003056; "><i
                class='mr-3 fas fa-cog fs-3 '></i> Salary Advance & Loan Settings</h1>

        <!-- <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line"> -->
            <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
                <li class=" nav-item" role="presentation">
                    <a class="px-2 position-relative" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                        aria-selected="true" @click="activetab = 1" :class="[activetab === 1 ? 'active' : '']">
                        SUMMARY
                    </a>
                    <div v-if="activetab === 1" class=" border-3 h-1 rounded-l-3xl border-orange-400"></div>
                    <div v-else class=" border-3 h-1 rounded-l-3xl border-gray-400"></div>
                </li>

                <li class=" nav-item position-relative" role="presentation">
                    <a class=" text-center px-2 " id="" data-bs-toggle="pill" href="" @click="activetab = 2"
                        :class="[activetab === 2 ? 'active ' : '']" role="tab" aria-controls="" aria-selected="true">
                        EMPLOYEES
                    </a>
                    <div v-if="activetab === 2" class=" border-3 h-1 rounded-r-3xl border-orange-400 position-absolute right-5 w-10"></div>
                    <div v-else class=" border-3 h-1 rounded-r-3xl border-gray-400"></div>
                </li>
                <!-- <li class="mx-3 nav-item " role="presentation">
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
                </li> -->
            </ul>
        <!-- </div> -->
        <!-- Tab Content -->
        <div class="tab-content " id="">
            <div>
                <div class="card-body">
                    <div v-if="activetab === 1">
                        <SalaryAdvance />
                    </div>
                    <div v-if="activetab === 2">
                        <InterestFreeLoan />
                    </div>
                    <!-- <div v-if="activetab === 3">
                        <TravelAdvance />
                    </div>
                    <div v-if="activetab === 4">
                        <LoanWithInterest />
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <Dialog header="Header"
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


    </div>
</template>

<script setup>
import {ref} from "vue";

const activetab = ref(1);



</script>
