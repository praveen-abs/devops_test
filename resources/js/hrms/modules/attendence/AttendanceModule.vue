<template>
    <Timesheet :attendance="useTimesheet.timesheetMainSource"/>
</template>


<script setup>
import Timesheet from './timesheet/timesheet.vue'
import {useAttendanceTimesheetMainStore} from './timesheet/stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()
</script>
