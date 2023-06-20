<template>
  <div class="border-0 notification-wrapper card w-100 box-shadow-md h-100">
    <div class="card-body">
      <div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary" id="">
        <span class="text-primary font-semibold fs-6">Notifications</span>
          <i v-badge="filterNotificationLength(useDashboard.allNotificationSource)" class="pi pi-bell p-overlay-badge" style="font-size: 1.5rem" />
          <!-- {{ -- < span class="top-0 position-absolute start-100 translate-middle badge rounded-circle bg-danger" >
            5 +
            <span class="visually-hidden" > unread messages < /span>
              < /span> --}} -->
        <!-- </i> -->
      </div>
      <div class="contents">
        <div class="p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100 " 
        v-for="notification in useDashboard.allNotificationSource" :key="notification.id">
          <div class="p-2 card-body">
            <div class="notify-content">
              <p class="mb-1 orange-median align-items-center d-flex justify-content-between">
                <span class="">{{ notification.notification_title }}</span><span class="fs-11">{{ notification.redirect_to_module }}</span>
              </p>
              <div class="notify-message">
                <p class="fs-10">
                  {{ notification.notification_body }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useMainDashboardStore } from "../../stores/dashboard_service";

const useDashboard = useMainDashboardStore()

const filterNotificationLength = (value) =>{
  return value.length
}
</script>
