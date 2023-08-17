<template>
    <div class="p-2 bg-white rounded-lg shadow tw-card left-line" style="background-color: white;">
        <div class="flex justify-between">
            <ul class="bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed " id="pills-tab" role="tablist">
                <li class="nav-item text-muted" role="presentation">
                    <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#leave_balance" aria-selected="true"
                        role="tab">
                        Leave Balance</a>
                </li>
                <!--
                        Current User Role == 2 ,HR
                        Current User Role == 4 ,Manager
                        Current User Role == 5 ,Employee
                     -->
                <li class="nav-item text-muted " role="presentation"
                    v-if="service.current_user_role == 2 || service.current_user_role == 4">
                    <a class="pb-2 mx-4 nav-link" data-bs-toggle="tab" href="#team_leaveBalance" aria-selected="false"
                        tabindex="-1" role="tab">
                        Team Leave Balance</a>
                </li>

                <li class="nav-item text-muted " role="presentation" v-if="service.current_user_role == 2">
                    <a class="pb-2 nav-link" data-bs-toggle="tab" href="#org_leave" aria-selected="false" tabindex="-1"
                        role="tab">
                        Org Leave Balance</a>
                </li>
            </ul>

            <div class="flex items-center">
                <div class="mr-3 ">
                    <!-- <div class="input-group me-2">
                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-calendar text-primary "
                                aria-hidden="true"></i></label>
                        <select class="form-select btn-line-primary" id="inputGroupSelect01">
                        </select>
                    </div> -->

                </div>
                <a href="/attendance-leave-policydocument" id=""
                    class="text-md  font-medium border-1 border-orange-400 rounded-lg text-center bg-orange-400 text-white my-auto p-1.5 dark:text-white"
                    role="button" aria-expanded="false">
                    Leave
                    Policy Explanation
                </a>
            </div>

        </div>
    </div>


    <div class="tab-content py-2" id="pills-tabContent">
        <div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">
            <EmployeeLeaveDetails />
        </div>
        <div class="tab-pane fade show " id="team_leaveBalance" role="tabpanel" aria-labelledby="pills-profile-tab">
            <TeamLeaveDetails />
        </div>
        <div class="tab-pane show " id="org_leave" role="tabpanel" aria-labelledby="pills-profile-tab">
            <OrgLeaveDetails />
        </div>
    </div>
    <Dialog header="Header" v-model:visible="useLeaveStore.canShowLoading"
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



    <Dialog v-model:visible="apply" :style="{ width: '80vw' }" :breakpoints="{ '960px': '75vw', '641px': '100vw' }">
        <template #header>
            <h6 class="mb-4 modal-title fs-21">
                Leave Request</h6>
        </template>
        <leaveapply2 />
    </Dialog>
</template>

<script setup>
import { Service } from '../Service/Service';
import EmployeeLeaveDetails from './leave_details/EmployeeLeaveDetails.vue';
import OrgLeaveDetails from './leave_details/OrgLeaveDetails.vue';
import TeamLeaveDetails from './leave_details/TeamLeaveDetails.vue';
import { useLeaveModuleStore } from './LeaveModuleService'
import { onMounted, ref } from 'vue';
import leaveapply2 from './leave_apply_v2/leave_apply_v2.vue'


const useLeaveStore = useLeaveModuleStore()
const service = Service()

const apply = ref(false)

onMounted(() => {
    useLeaveStore.getEmployeeLeaveBalance()
})
</script>

