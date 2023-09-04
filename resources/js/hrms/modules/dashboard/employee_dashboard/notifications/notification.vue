<template>
    <div class="bg-white h-[700px] rounded-lg overflow-hidden">
        <div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id="">
            <span class="font-semibold text-[14px] text-[#000] font-['Poppins]">Activity Log</span>
            <!-- <i v-badge="filterNotificationLength(useDashboard.allNotificationSource)" class="px-4 pi pi-bell p-overlay-badge"
                style="font-size: 1rem" /> -->
        </div>
        <div class="h-full overflow-x-scroll" >
            <div class=" hover:bg-slate-100 divide-y-2 divide-gray-400  ">
                <p class="font-medium text-sm text-center">No activity log to display</p>
                <!-- <div class="p-2">
                    <a class="text-black notify-content">
                        <p class="flex items-center justify-between mb-1 orange-median">
                            <span class="text-sm font-semibold orange-median ">898</span>
                        </p>
                        <div class="notify-message">
                            <p class="text-xs font-medium text-gray-600">
                               090
                            </p>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { useMainDashboardStore } from "../../stores/dashboard_service";
import { ref } from "vue";

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

<style>
  @import url('https://fonts.googleapis.com/css2?family=Petrona&family=Poppins&display=swap');
</style>

