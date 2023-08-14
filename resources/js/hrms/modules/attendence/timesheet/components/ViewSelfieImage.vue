<template>
    <Dialog header="Header" v-model:visible="useTimesheet.dialog_Selfie" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '40vw', borderTop: '5px solid #002f56' }" :modal="true" :closable="true" :closeOnEscape="true">
        <template #header>
            <div>
                <!-- <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                class="fw-bold  fs-5 modal-title ">
                Selfie</h5> -->
            </div>
        </template>
        <img v-if="useTimesheet.selfieDetails" :src="`${baseUrl}/${useTimesheet.selfieDetails}`" :alt="`${baseUrl}/${useTimesheet.selfieDetails}`">
        <img v-else src="../assests/noData.svg" alt="">
    </Dialog>
</template>



<script setup>
import { onMounted, ref } from 'vue';
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'
const useTimesheet = useAttendanceTimesheetMainStore()

const baseUrl = ref()

onMounted(()=>{
    baseUrl.value = window.location.origin
    console.log(window.location.origin);
})

const props= defineProps({
    checkin:{
        type:Object,
        required:true
    },
    checkout:{
        type:Object,
        required:true
    },
})
</script>
