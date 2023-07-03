import axios from "axios";
import { defineStore } from "pinia";
import { computed, inject, ref } from "vue";
import { useCalendarStore } from './calendar'
const swal = inject("$swal");


export const useAttendanceTimesheetMainStore = defineStore("Timesheet", () => {

    const useCalendar = useCalendarStore()

    const canShowLoading = ref(false)
    const isManager = ref(false)

    const mopDetails = ref({})
    const mipDetails = ref({})
    const lcDetails = ref({})
    const egDetails = ref({})


    const dialog_Mop = ref(false)
    const dialog_Mip = ref(false)
    const dialog_Lc = ref(false)
    const dialog_Eg = ref(false)
    const dialog_Selfie = ref(false)

    const currentEmployeeAttendance = ref()
    const currentlySelectedTeamMemberAttendance = ref()


    const getSelectedEmployeeAttendance = async (currentlySelectedUser, currentlySelectedMonth, currentlySelectedYear) => {
        canShowLoading.value = true
        let url = '/fetch-attendance-user-timesheet'
        return axios.post(url, {
            month: currentlySelectedMonth + 1,
            year: currentlySelectedYear,
            user_id: currentlySelectedUser,
        }).finally(() => {
            canShowLoading.value = false
        })
    }

    const getTeamList = async (user_code) => {
        return axios.post('/fetch-team-members', {
            user_code: user_code
        })
    }

    const getOrgList = async () => {
        return axios.get('/fetch-org-members')
    }

    const getSelectedEmployeeDetails = (data) => {
        let user_id = data.id;
        getSelectedEmployeeAttendance(user_id, useCalendar.getMonth, useCalendar.getYear).then(res => {
            console.log(Object.values(res.data));
            currentlySelectedTeamMemberAttendance.value = Object.values(res.data)
        })

    }



    /* Finding Attendance Mode
      -> Mobile
      ->Biometric
      ->PC

       if Employee check in or check out using mobile
       selfie image is required
    */

    const findAttendanceMode = (attendance_mode) => {
        console.log(attendance_mode);
        if (attendance_mode == "biometric")
            // return '&nbsp;<i class="fa-solid fa-fingerprint"></i>';
            return 'fas fa-fingerprint fs-12'
        else
            if (attendance_mode == "web")
                return 'fa fa-laptop fs-12';
            else
                if (attendance_mode == "mobile")
                    return 'fa fa-mobile-phone fs-12';
                else {
                    return ''; // when attendance_mode column is empty.
                }
    }


    /* Attendance regularization for

    ->LC - Late coming
    ->EG - Early going
    ->MIP -> Missed In punch
    ->MOp -> Missed Out Punch

    */

    const AttendanceRegularizationApplyFormat = (selectedDayRegularizationRecord) => {

        let AttendanceRegularizeFormat = {
            user_id: selectedDayRegularizationRecord.user_id,
            date: selectedDayRegularizationRecord.date,
            actualTime: selectedDayRegularizationRecord.checkin_time,
            regularizeTime: '9.30 AM',
            reason: selectedDayRegularizationRecord.reason,
            custom_reason: selectedDayRegularizationRecord.custom_reason,
        }
        console.log(AttendanceRegularizeFormat);
    }


    //  Applying for Late Coming and Early Going

    const onClickShowLcRegularization = (attendance) => {
        dialog_Lc.value = true
        lcDetails.value = { ...attendance }
    }


    const applyLcRegularization = () => {
        AttendanceRegularizationApplyFormat(lcDetails.value);

        Swal.fire(
            'Good job!',
            'Attendance Regularized Successful',
            'success'
        )

    }

    const onClickShowEgRegularization = (attendance) => {
        dialog_Eg.value = true
        egDetails.value = { ...attendance }
    }

    const applyEgRegularization = () => {
        console.log(egDetails.value);
        AttendanceRegularizationApplyFormat(egDetails.value);

        Swal.fire(
            'Good job!',
            'Attendance Regularized Successful',
            'success'
        )

    }


    //  Applying for Missed In and  Out Punches

    const onClickShowMipRegularization = (attendance) => {
        dialog_Mip.value = true
        mipDetails.value = { ...attendance }
    }


    const applyMipRegularization = () => {
        AttendanceRegularizationApplyFormat(mipDetails.value);

        Swal.fire(
            'Good job!',
            'Attendance Regularized Successful',
            'success'
        )

    }

    const onClickShowMopRegularization = (attendance) => {
        dialog_Mop.value = true
        mopDetails.value = { ...attendance }
    }

    const applyMopRegularization = () => {
        console.log(mopDetails.value);
        AttendanceRegularizationApplyFormat(mopDetails.value);

        Swal.fire(
            'Good job!',
            'Attendance Regularized Successful',
            'success'
        )

    }


    // View check in and out selfie Images

    const viewSelfie = (value) => {
        dialog_Selfie.value = true
    }


    // Helper Functions

    //  error message
    const errorMessege = (value) => {
        let date = ''
        if (value) {
            if (date < value) {
                console.log('');
            }
        }
    }



    //  Finding Difference between start date and end date

    const findDayDifference = (date) => {
        let today = new Date().toJSON().slice(0, 10);
        var seletectedCellDate = new Date(date);
        console.log(leave_data.custom_start_date);
        console.log(leave_data.custom_end_date);
        // To calculate the time difference of two dates
        var Difference_In_Time = seletectedCellDate.getTime() - today.getTime();
        console.log("Differenece" + Difference_In_Time);

        // To calculate the no. of days between two dates
        var Difference_In_Days = (
            Difference_In_Time /
            (1000 * 60 * 60 * 24)
        ).toFixed(0);
        let total_days = Difference_In_Days;
        console.log(total_days);
    }



    return {
        // Timesheet Data source
        getSelectedEmployeeAttendance, currentEmployeeAttendance,
        getTeamList, getOrgList, getSelectedEmployeeDetails,

        currentlySelectedTeamMemberAttendance, canShowLoading, isManager,


        // Finding Attendance Mode
        findAttendanceMode,

        // Attendance Regularization

        //   MOP
        onClickShowLcRegularization,applyMopRegularization, mopDetails, dialog_Mop,
        //   MIP
        onClickShowEgRegularization,applyMipRegularization, mipDetails, dialog_Mip,
        //   LC
        onClickShowMipRegularization,applyLcRegularization, lcDetails, dialog_Lc,
        //   EG
        onClickShowMopRegularization,applyEgRegularization, egDetails, dialog_Eg,
        // Selfie
        dialog_Selfie, viewSelfie


    }
})
