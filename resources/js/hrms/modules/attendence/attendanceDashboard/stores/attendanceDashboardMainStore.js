import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useAttendanceDashboardMainStore = defineStore("useAttendanceDashboardMainStore", () => {

    // Variable Declaration

    const canShowLoading = ref(false);

    const attendanceDashboardMainSource = ref()
    const attendanceOverview = ref()
    const attendanceDashboardWorkShiftSource = ref()
    const canShowShiftDetails = ref(false)
    const currentlySelectedShiftDetails = ref([])


    const getAttendanceDashboardMainSource = () =>{
        canShowLoading.value = true
         let url = '/get-attendance-dashboard'
        axios.get(url).then(res=>{
            attendanceOverview.value = res.data.attendance_overview
            attendanceDashboardWorkShiftSource.value = res.data.work_shift
        }).finally(()=>{
            canShowLoading.value = false
        })
    }


    return {
        canShowLoading,
        attendanceDashboardWorkShiftSource, getAttendanceDashboardMainSource,

        attendanceOverview,

        canShowShiftDetails,currentlySelectedShiftDetails

    }
})
