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
    <employee_dashboard />
</template>


<script setup>
import employee_dashboard from './employee_dashboard/employee_dashboard.vue'
import hr_dashboard from './hr_dashboard/hr_dashboard.vue'
import Events from './events/events.vue'
import { useMainDashboardStore } from './stores/dashboard_service'
import { ref, onMounted } from 'vue'
import { Service } from '../Service/Service'

const useDashboard = useMainDashboardStore();
const canShowLoadingScreen = ref();

onMounted(async () => {
    canShowLoadingScreen.value = true;
    await useDashboard.getMainDashboardData();
    // await useDashboard.getAttendanceStatus();
    Service();
    canShowLoadingScreen.value = false;

})

</script>


<style scoped>
.page-content {
    padding: calc(50px + 1.5rem) calc(1.5rem / 2) 50px calc(1.5rem / 2);
}

</style>
