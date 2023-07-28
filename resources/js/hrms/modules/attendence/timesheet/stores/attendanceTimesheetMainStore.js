import axios from "axios";
import { defineStore } from "pinia";
import { computed, inject, ref } from "vue";
import { useCalendarStore } from './calendar'
import { Service } from "../../../Service/Service";
const swal = inject("$swal");


export const useAttendanceTimesheetMainStore = defineStore("Timesheet", () => {

    const useCalendar = useCalendarStore()
    const service = Service()

    const canShowLoading = ref(false)
    const isManager = ref(false)
    const isTeamOrg = ref('single')
    const switchTimesheet = ref('Classic')

    const mopDetails = ref({})
    const mipDetails = ref({})
    const lcDetails = ref({})
    const egDetails = ref({})
    const absentRegularizationDetails = ref({})
    const selfieDetails = ref({})


    const dialog_Mop = ref(false)
    const dialog_Mip = ref(false)
    const dialog_Lc = ref(false)
    const dialog_Eg = ref(false)
    const dialog_Selfie = ref(false)
    const classicTimesheetSidebar = ref(false)

    const currentEmployeeAttendance = ref()
    const currentEmployeeAttendanceLength = ref(0)
    const currentlySelectedTeamMemberUserId = ref()
    const currentlySelectedTeamMemberAttendance = ref()
    const currentlySelectedOrgMemberUserId = ref()
    const currentlySelectedOrgMemberAttendance = ref()


    const getEmployeeAttendance = async (currentlySelectedUser, currentlySelectedMonth, currentlySelectedYear) => {
        canShowLoading.value = true
        let url = '/fetch-attendance-user-timesheet';

        //Returns '0' if shift is not assigned to user. Need to handle error scenario based on that value.

        return axios.post(url, {
            month: currentlySelectedMonth + 1,
            year: currentlySelectedYear,
            user_id: currentlySelectedUser,
        })
    }


    const getSelectedEmployeeAttendance = () => {

        canShowLoading.value = true
        getEmployeeAttendance(156, useCalendar.getMonth, useCalendar.getYear).then(res => {
            console.log("Selected employee attendance : " + res.data);
            currentEmployeeAttendance.value = Object.values(res.data)
            currentEmployeeAttendanceLength.value = Object.values(res.data).length
        }).finally(() => {
            canShowLoading.value = false
        })
    }

    const getSelectedEmployeeTeamDetails = (user_id, isteam) => {
        isTeamOrg.value = isteam
        currentlySelectedTeamMemberUserId.value = user_id
        getEmployeeAttendance(user_id, useCalendar.getMonth, useCalendar.getYear).then(res => {
            currentlySelectedTeamMemberAttendance.value = Object.values(res.data)

        }).finally(() => {
            canShowLoading.value = false
        })
    }


    const getSelectedEmployeeOrgDetails = (user_id, isteam) => {
        isTeamOrg.value = isteam
        currentlySelectedOrgMemberUserId.value = user_id
        getEmployeeAttendance(user_id, useCalendar.getMonth, useCalendar.getYear).then(res => {
            console.log(Object.values(res.data));
            currentlySelectedOrgMemberAttendance.value = Object.values(res.data)
        }).finally(() => {
            canShowLoading.value = false
        })
    }

    const getTeamList = async (user_code) => {
        console.log(user_code);
        return axios.post('/fetch-team-members', {
            user_code: user_code
        })
    }

    const getOrgList = async () => {
        return axios.get('/fetch-org-members')
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

    const AttendanceRegularizationApplyFormat = (selectedDayRegularizationRecord, selectedAttendanceRegularizationType) => {

        let AttendanceRegularizeFormat = {
            attendance_user: selectedDayRegularizationRecord.user_id,
            regularization_type: selectedAttendanceRegularizationType,
            attendance_date: selectedDayRegularizationRecord.date,
            user_time: selectedDayRegularizationRecord.checkin_time,
            regularize_time: selectedAttendanceRegularizationType == 'LC' || selectedAttendanceRegularizationType == 'MIP' ? '9:30:00' :
                selectedAttendanceRegularizationType == 'EG' || selectedAttendanceRegularizationType == 'MOP' ? '6:30:00' : '',
            reason: selectedDayRegularizationRecord.reason,
            custom_reason: selectedDayRegularizationRecord.custom_reason ? selectedDayRegularizationRecord.custom_reason : '',
        }
        console.log(AttendanceRegularizeFormat);
        return AttendanceRegularizeFormat
    }


    //  Applying for Late Coming and Early Going

    const onClickShowLcRegularization = (attendance) => {
        dialog_Lc.value = true
        lcDetails.value = { ...attendance }
    }


    const applyLcRegularization = () => {
        classicTimesheetSidebar.value = false
        canShowLoading.value = true
        axios.post('/attendance-req-regularization', AttendanceRegularizationApplyFormat(lcDetails.value, 'LC'))
            .then((res) => {
                getSelectedEmployeeAttendance()
                let message = res.data.message
                console.log(message);
                if (res.data.status == 'success') {
                    Swal.fire(
                        'Good job!',
                        'Attendance Regularized Successful',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Fill!',
                        `${message}`,
                        'error'
                    )
                }
            }).finally(() => {
                canShowLoading.value = false
            })

    }

    const onClickShowEgRegularization = (attendance) => {
        dialog_Eg.value = true
        egDetails.value = { ...attendance }
    }

    const applyEgRegularization = () => {
        classicTimesheetSidebar.value = false
        canShowLoading.value = true
        axios.post('/attendance-req-regularization', AttendanceRegularizationApplyFormat(egDetails.value, 'EG'))
            .then((res) => {
                getSelectedEmployeeAttendance()
                let message = res.data.message
                console.log(message);
                if (res.data.status == 'success') {
                    Swal.fire(
                        'Success!',
                        'Attendance Regularized Successful',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error',
                        `${message}`,
                        'error'
                    )
                }
            }).finally(() => {
                canShowLoading.value = false
            })

    }


    //  Applying for Missed In and  Out Punches

    const onClickShowMipRegularization = (attendance) => {
        dialog_Mip.value = true
        mipDetails.value = { ...attendance }
    }


    const applyMipRegularization = () => {
        classicTimesheetSidebar.value = false
        canShowLoading.value = true
        axios.post('/attendance-req-regularization', AttendanceRegularizationApplyFormat(mipDetails.value, 'MIP'))
            .then((res) => {
                getSelectedEmployeeAttendance()
                let message = res.data.message
                console.log(message);
                if (res.data.status == 'success') {
                    Swal.fire(
                        'Good job!',
                        'Attendance Regularized Successful',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Fill!',
                        `${message}`,
                        'error'
                    )
                }
            }).finally(() => {
                canShowLoading.value = false
            })

    }

    const onClickShowMopRegularization = (attendance) => {
        dialog_Mop.value = true
        mopDetails.value = { ...attendance }
    }

    const applyMopRegularization = () => {
        classicTimesheetSidebar.value = false
        canShowLoading.value = true
        axios.post('/attendance-req-regularization', AttendanceRegularizationApplyFormat(mopDetails.value, 'MOP'))
            .then((res) => {
                getSelectedEmployeeAttendance()
                let message = res.data.message
                console.log(message);
                if (res.data.status == 'success') {
                    Swal.fire(
                        'Good job!',
                        'Attendance Regularized Successful',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Fill!',
                        `${message}`,
                        'error'
                    )
                }
            }).finally(() => {
                canShowLoading.value = false
            })

    }
    //  Applying for Attendance Regularization



    const applyAbsentRegularization = () => {
        classicTimesheetSidebar.value = false
        canShowLoading.value = true
        axios.post('/attendance-req-absent-regularization', {
            user_code: service.current_user_code,
            attendance_date: absentRegularizationDetails.value.date,
            regularization_type: "Absent Regularization",
            checkin_time: absentRegularizationDetails.value.start_time,
            checkout_time: absentRegularizationDetails.value.end_time,
            reason: absentRegularizationDetails.value.reason,
            custom_reason: absentRegularizationDetails.value.custom_reason ? absentRegularizationDetails.value.custom_reason : "",
        })
            .then((res) => {
                getSelectedEmployeeAttendance()
                let message = res.data.message
                console.log(message);
                if (res.data.status == 'success') {
                    Swal.fire(
                        'Good job!',
                        'Attendance Regularized Successful',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Fill!',
                        `${message}`,
                        'error'
                    )
                }
            }).finally(() => {
                canShowLoading.value = false
            })

    }




    // View check in and out selfie Images

    const onClickSViewSelfie = (attendance) => {
        dialog_Selfie.value = true
        selfieDetails.value = attendance
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


    const getLocation = () => {
        bdcApi = bdcApi
            + "?latitude=" + position.coords.latitude
            + "&longitude=" + position.coords.longitude
            + "&localityLanguage=en";
        var locationApi = "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=13.026586987757538&longitude=80.20477619620871&localityLanguage=en"
    }
    // Latitude: 13.026586987757538
    // Longitude: 80.20477619620871



    return {
        // Timesheet Data source
        getEmployeeAttendance, currentEmployeeAttendance, currentEmployeeAttendanceLength, getSelectedEmployeeOrgDetails,
        getTeamList, getOrgList, getSelectedEmployeeTeamDetails, getSelectedEmployeeAttendance,

        // Classic timesheet Sidebar

        classicTimesheetSidebar,


        currentlySelectedTeamMemberUserId,
        currentlySelectedTeamMemberAttendance,
        currentlySelectedOrgMemberUserId,
        currentlySelectedOrgMemberAttendance,
        canShowLoading, isManager, isTeamOrg,


        // Finding Attendance Mode
        findAttendanceMode,

        // Attendance Regularization

        //   MOP
        onClickShowLcRegularization, applyMopRegularization, mopDetails, dialog_Mop,
        //   MIP
        onClickShowEgRegularization, applyMipRegularization, mipDetails, dialog_Mip,
        //   LC
        onClickShowMipRegularization, applyLcRegularization, lcDetails, dialog_Lc,
        //   EG
        onClickShowMopRegularization, applyEgRegularization, egDetails, dialog_Eg,
        // Selfie
        dialog_Selfie, onClickSViewSelfie, selfieDetails, switchTimesheet,
        // Absent regularization
        absentRegularizationDetails, applyAbsentRegularization,




    }
})
