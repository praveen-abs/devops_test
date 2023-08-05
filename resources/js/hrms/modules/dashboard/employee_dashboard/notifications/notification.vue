<template>
    <div class="border-0 notification-wrapper card w-100 box-shadow-md h-100 overflow-x-hidden overflow-y-auto">
        <div class="card-body">
            <div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary" id="">
                <span class="text-primary font-semibold fs-6">Notifications</span>
                <i v-badge="filterNotificationLength(useDashboard.allNotificationSource)" class="pi pi-bell p-overlay-badge"
                    style="font-size: 1.5rem" />
            </div>
            <div class="contents">
                <div class="p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100 "
                    v-for="notification in useDashboard.allNotificationSource" :key="notification.id">
                    <div class="p-2 card-body" >
                        <a class="notify-content text-black" :href="moduleRedirectionUrl(notification.redirect_to_module)">
                            <p class="mb-1 orange-median align-items-center d-flex justify-content-between">
                                <span
                                    class="orange-median font-semibold text-lg ">{{ notification.notification_title }}</span>
                            </p>
                            <div class="notify-message">
                                <p class="fs-10">
                                    {{ notification.notification_body }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useMainDashboardStore } from "../../stores/dashboard_service";

const useDashboard = useMainDashboardStore()

const filterNotificationLength = (value) => {
    return value.length
}



const moduleRedirectionUrl = (url) => {

    if (url == 'Leave Module') {
        return '/attendance-leave'
    } else
        if (url == 'attendance_regularization') {
            return '/attendance-regularization-approvals'

        }

}

</script>

