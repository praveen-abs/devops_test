<template>
    <Dialog header="Header" v-model:visible="useTimesheet.dailog_Selfie" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '35vw', borderTop: '5px solid #002f56' }" :modal="true" :closable="true" :closeOnEscape="true">
        <template #header>
            <div>
                <!-- <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                class="fw-bold  fs-5 modal-title ">
                Selfie</h5> -->
            </div>
        </template>
        <img src="../../../../assests/images/family_image.png" alt="">

    </Dialog>
</template>



<script setup>
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()
</script>
