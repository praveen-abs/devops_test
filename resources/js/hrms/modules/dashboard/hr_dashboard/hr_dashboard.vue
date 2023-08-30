<template>
    <div class="h-screen p-3 overflow-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 ">
                <div class="col-span-12 w-[100%]  !rounded-[20px] bg-white p-2">
                    <OrgEmployeeDetails />
                </div>

                <div class="col-span-12 !rounded-[20px]">
                    <div class="grid grid-cols-12 gap-4 my-2">
                        <div class="!rounded-[20px] overflow-hidden bg-red-100 col-span-5">
                            <LeaveRequest />
                        </div>
                        <div class="!rounded-[20px] overflow-hidden bg-white col-span-7">
                            <p class="text-center">Employee count in graph</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <Events />
                </div>
            </div>

            <div class="col-span-4 w-[100%] !rounded-[20px] ">
                <div>
                    <LeaveRequest />
                </div>
                <div class="py-3">
                    <Notification />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import OrgEmployeeDetails from "./org_employee_details/org_employee_details.vue";
import Task from "./tasks/task.vue";
import EmployeeStatus from "./employee_status/employee_status.vue";
import LeaveRequest from "./leave_requests/leave_request.vue";
import Notifiction from "./notifications/notification.vue";
import OverallEmployee from "./overall_employees/overall_employee.vue";
import { useMainDashboardStore } from '../stores/dashboard_service';
import Notification from "../employee_dashboard/notifications/notification.vue";
import Events from "../events/events.vue";




// onMounted(async ()=>{
//     //canShowLoadingScreen.value = true;
//    // await useDashboard.getMainDashboardData();
//     //await useDashboard.getAttendanceStatus();
//     //Service();
//     //canShowLoadingScreen.value = false;

// })

async function getHRDashboardData() {

}


</script>
