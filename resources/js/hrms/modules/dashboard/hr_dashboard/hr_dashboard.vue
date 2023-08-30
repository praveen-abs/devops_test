<template>
  <div class="row">
    <div class="col-sm-12 col-md-7 col-xl-9 col-lg-9 col-xxl-9">
      <div class="grid grid-cols-4 gap-4 my-2 ml-2">
        <OrgEmployeeDetails />
      </div>
      <div class="row my-3">
        <Task />
        <div class="col-sm-12 col-md-12 col-xl-7 col-lg-7 col-xxl-7 h-full">
          <div class="row h-100">
            <EmployeeStatus />

            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 my-3">
              <LeaveRequest />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3 col-lg-3 col-xxl-3">
      <div class="mb-3 border-0 request-wrapper card w-100 box-shadow-md my-2">
        <Notifiction />
      </div>
      <div class="mb-3 border-0 employee-wrapper card w-100 box-shadow-md">
        <OverallEmployee />
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

// onMounted(async ()=>{
//     //canShowLoadingScreen.value = true;
//    // await useDashboard.getMainDashboardData();
//     //await useDashboard.getAttendanceStatus();
//     //Service();
//     //canShowLoadingScreen.value = false;

// })

async function getHRDashboardData(){

}


</script>
