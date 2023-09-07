<template>
    <!-- <Dialog header="Header" v-model:visible="canShowLoadingScreen" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog> -->
    <!-- <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                    <Events />

                </div>
            </div>
        </div>
    </div> -->


    <!-- <div class="dashboard-wrapper mt-30">
        <div class="mb-2 card left-line">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted me-5" role="presentation">
                        <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#dashboard" aria-selected="true"
                            role="tab">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link" data-bs-toggle="tab" href="#hrDashboard" aria-selected="true" role="tab">
                            HR Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->

    <!-- <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show fade active " id="dashboard" role="tabpanel" aria-labelledby="pills-profile-tab">
                <employee_dashboard />
            </div>
            <div class="tab-pane show fade " id="hrDashboard" role="tabpanel" aria-labelledby="pills-profile-tab">
                <hr_dashboard />
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                            <Events />

                        </div>
                    </div>
                </div>


            </div>

        </div> -->
    <!-- </div> -->
    <div class="col"
        v-if="service.current_user_role == 1 || service.current_user_role == 2 || service.current_user_role == 3" >
        <button class="orange_btn font-semibold text-sm"
            :class="[useDashboard.currentDashboard === 1 ? 'bg-white text-slate-600 border border-black' : 'text-slate-600']"
            @click="useDashboard.currentDashboard = 0">Self-dashboard</button>
        <button class="Enable_btn font-semibold text-sm"
            :class="[useDashboard.currentDashboard === 1 ? 'bg-[#d4d4d4] text-slate-600' : 'text-slate-600']"
            @click="useDashboard.currentDashboard = 1">Org-dashboard</button>
    </div>
    <loadingSpinner v-if="useDashboard.canShowLoading" />
    <transition v-else-if="useDashboard.currentDashboard == 1"
        enter-active-class="transition ease-out transform duration-600" enter-class="translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-100 ease-in transform"
        leave-class="translate-y-0 opacity-100" leave-to-class="translate-y-2 opacity-0">
        <Hr_dashboard />
    </transition>
    <transition v-else enter-active-class="transition ease-out transform duration-600" enter-class="translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-100 ease-in transform"
        leave-class="translate-y-0 opacity-100" leave-to-class="translate-y-2 opacity-0">
        <employee_dashboard />
    </transition>
</template>


<script setup>
import employee_dashboard from './employee_dashboard/employee_dashboard.vue'

import loadingSpinner from '../../components/LoadingSpinner.vue'
import { useMainDashboardStore } from './stores/dashboard_service'
import { ref, onMounted } from 'vue'
import { Service } from '../Service/Service'
import Hr_dashboard from './hr_dashboard/hr_dashboard.vue';

const useDashboard = useMainDashboardStore();
const canShowLoadingScreen = ref();
const service = Service()

onMounted(async () => {
    canShowLoadingScreen.value = true;
    await useDashboard.getMainDashboardData();
    useDashboard.getHrDashboardMainSource()
    // await useDashboard.getAttendanceStatus();
    Service();
    canShowLoadingScreen.value = false;

})

</script>


<style>
:root
{
    --disable: #d4d4d4;
    --white: #fff;
    --navy: #002f56;
}

.orange_btn
{
    background-color: var(--disable);
    padding: 3px 30px;
    border-radius: 4px 0 0 4px;
}

.Enable_btn
{
    border: 1px solid var(--navy);
    padding: 3px 30px;
    border-radius: 0 4px 4px 0;
}
</style>
