<template>
         <LoadingSpinner v-if="useManageEmployees.canShowLoadingScreen"  class="absolute z-50 bg-white w-[100%] h-[100%]"/>
    <div class="">
        <div class="mb-2 card left-line">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted " role="presentation">
                        <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#active_employees" aria-selected="true"
                            role="tab">
                            Active Employees
                        </a>
                    </li>
                    <li class="mx-4 nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link" data-bs-toggle="tab" href="#not_active_employees" aria-selected="true"
                            role="tab">
                            Yet To Active Employees
                        </a>
                    </li>
                    <li class="nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link" data-bs-toggle="tab" href="#exit_employees" aria-selected="true"
                            role="tab">
                            Exit Employee
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show fade active" id="active_employees" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <ActiveEmployees />
                    </div>

                    <div class="tab-pane fade " id="not_active_employees" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <YetToActiveEmployees />
                    </div>
                    <div class="tab-pane fade " id="exit_employees" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <ExitEmployees />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import ActiveEmployees from './active_employees/active_employees.vue'
import YetToActiveEmployees from './yet_to_active_employees/yet_to_active_employees.vue'
import ExitEmployees from './exit_employees/exit_employees.vue';
import { useManageEmployeesStore } from './manage_service';
import LoadingSpinner from '../../../components/LoadingSpinner.vue';

const useManageEmployees = useManageEmployeesStore();

</script>

<style lang="scss">

.progressbar_val3 .p-progressbar-value.p-progressbar-value-animate  {
    /* background-color:#fff !important; */
    background-color: rgb(48, 218, 48) !important;
     color: #fff !important;
}
.progressbar .p-progressbar-value.p-progressbar-value-animate {
    /* background-color:#fff !important; */
    background-color: red !important;
     color: #fff !important;
}
.progressbar_val2 .p-progressbar-value.p-progressbar-value-animate {
    background-color:orange !important;
    color: black !important;
}
</style>

