import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useAttendanceDashboardMainStore = defineStore("useAttendanceDashboardMainStore", () => {

    // Variable Declaration

    const attendanceDashboardMainSource = ref()
    const attendanceDashboardWorkShiftSource = ref()
    const canShowShiftDetails = ref(false)
    const currentlySelectedShiftDetails = ref([])


    const getAttendanceDashboardMainSource = () =>{
         let url = '/get-attendance-dashboard'
        axios.get(url).then(res=>{
            attendanceDashboardWorkShiftSource.value = res.data.work_shift
        })
    }


    return {
        attendanceDashboardWorkShiftSource, getAttendanceDashboardMainSource,

        canShowShiftDetails,currentlySelectedShiftDetails

    }
})
