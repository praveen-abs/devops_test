import { defineStore } from "pinia";
import { computed, ref } from "vue";
import { useAttendanceTimesheetMainStore } from "./attendanceTimesheetMainStore";
import { Service } from '../../../Service/Service'

export const useCalendarStore = defineStore("calendar", () => {

    const useTimesheet = useAttendanceTimesheetMainStore()
    const service = Service()


    const year = ref(new Date().getFullYear());
    const month = ref(new Date().getMonth());
    const day = ref(new Date().getDate());

    const getYear = computed(() => year.value);
    const getMonth = computed(() => month.value);
    const getDay = computed(() => day.value);

    function incrementYear(val) {
        year.value = year.value + val;
    }
    function decrementYear(val) {
        year.value = year.value - val;
    }
    function incrementMonth(val) {
        if (month.value == 11) {
            incrementYear(1);
            month.value = 0;
            return;
        }

        month.value = month.value + val;

        console.log(useTimesheet.isTeamOrg);
        useTimesheet.getSelectedEmployeeTeamDetails(useTimesheet.currentlySelectedTeamMemberUserId)
        useTimesheet.getSelectedEmployeeOrgDetails(useTimesheet.currentlySelectedOrgMemberUserId)
        useTimesheet.getSelectedEmployeeAttendance()


    }
    function decrementMonth(val) {
        console.log(useTimesheet.isTeamOrg);

        if (month.value == 0) {
            decrementYear(1);
            month.value = 11;
            return;
        }
        month.value = month.value - val;

        useTimesheet.getSelectedEmployeeTeamDetails(useTimesheet.currentlySelectedTeamMemberUserId)
        useTimesheet.getSelectedEmployeeOrgDetails(useTimesheet.currentlySelectedOrgMemberUserId)
        useTimesheet.getSelectedEmployeeAttendance()



    }
    function incrementDay(val) {
        day.value = day.value + val;
    }

    function setMonth(val) {
        month.value = val;
    }

    function setYear(val) {
        year.value = val;
    }



    function resetDate() {
        year.value = new Date().getFullYear();
        month.value = new Date().getMonth();
        day.value = new Date().getDate();
    }

    return {
        year,
        month,
        day,
        getYear,
        getMonth,
        getDay,
        incrementYear,
        incrementMonth,
        decrementMonth,
        setMonth,
        setYear,
        resetDate,
    };
});
