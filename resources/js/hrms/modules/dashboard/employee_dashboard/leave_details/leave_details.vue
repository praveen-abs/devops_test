<template>
    <div class="rounded overflow-hidden shadow-lg bg-white">
        <div class="px-6 py-4">
            <p class="text-gray-700 text-base">
                current month - <span class="font-semibold text-xl mb-2">June</span>
            </p>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="bg-gray-200 rounded-lg p-3">
                    <div class="px-auto">
                        <span class="font-bold text-xl mb-2 text-center">
                            {{ useDashboard.attenanceReportPerMonth.present }}
                        </span>
                        <span class="text-gray-700 text-base px-1">days</span>
                    </div>
                    <p class="font-medium  text-md text-gray-600 py-2 text-center">Present</p>
                </div>
                <div class="bg-gray-200 rounded-lg p-3"><span class="font-bold text-xl mb-2">
                        {{ useDashboard.attenanceReportPerMonth.not_applied }}
                    </span>
                    <span class="text-gray-700 text-base px-1">days</span>
                    <p class="font-medium  text-md text-gray-600 py-2 text-center">Leave</p>

                </div>
                <div class="bg-gray-200 rounded-lg p-3"><span class="font-bold text-xl mb-2">
                        {{ useDashboard.attenanceReportPerMonth.absent }}</span>
                    <span class="text-gray-700 text-base px-1">days</span>
                    <p class="font-medium  text-md text-gray-600 py-2 text-center">Absent</p>

                </div>
            </div>

        </div>
    </div>
</template>


<script setup>

import { onMounted, ref, reactive } from "vue";
import { useMainDashboardStore } from "../../stores/dashboard_service";

const useDashboard = useMainDashboardStore();


onMounted(() => {

})

</script>
