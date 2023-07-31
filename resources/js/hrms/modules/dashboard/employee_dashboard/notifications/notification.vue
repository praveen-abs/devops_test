<template>
    <div class="bg-white h-2/6 rounded-lg overflow-hidden p-2">
        <div class="mb-3 card-title flex items-center justify-between" id="">
            <span class="text-primary font-semibold fs-6">Notifications</span>
            <i v-badge="filterNotificationLength(useDashboard.allNotificationSource)" class="pi pi-bell p-overlay-badge px-4"
                style="font-size: 1rem" />
        </div>
        <div class="overflow-x-scroll h-full" >
            <div class="p-1 my-1 rounded-lg shadow-md  hover:bg-slate-100 "
                v-for="notification in useDashboard.allNotificationSource" :key="notification.id">
                <div class="p-2">
                    <a class="notify-content text-black">
                        <p class="mb-1 orange-median items-center flex justify-between">
                            <span class="orange-median font-semibold text-md ">{{ notification.notification_title }}</span>
                        </p>
                        <div class="notify-message">
                            <p class="text-xs text-gray-600 font-medium">
                                {{ notification.notification_body }}
                            </p>
                        </div>
                    </a>
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

