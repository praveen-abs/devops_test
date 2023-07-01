import axios from "axios";
import { defineStore } from "pinia";
import { computed, ref } from "vue";

export const useAttendanceTimesheetMainStore = defineStore("Timesheet", () => {

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



    // const currentEmployeeAttendance = ref([

    //     {
    //         date: "2023-06-02 12:00",
    //         absent_status: null,
    //         attendance_mode_checkin: "web",
    //         attendance_mode_checkout: "mobile",
    //         checkin_time: "22:09:40",
    //         checkout_time: "22:09:48",
    //         eg_reason: null,
    //         eg_reason_custom: null,
    //         eg_status: null,
    //         isAbsent: false,
    //         isEG: false,
    //         isLC: true,
    //         isMIP: false,
    //         isMOP: false,
    //         lc_reason: null,
    //         lc_reason_custom: null,
    //         lc_status: "None",
    //         leave_type: null,
    //         mip_status: null,
    //         mop_status: null,
    //         selfie_checkin: null,
    //         selfie_checkout: null,
    //         user_id: "1",
    //         vmt_employee_workshift_id: 1,
    //         workshift_code: "FS",
    //         workshift_name: "First Shift"
    //     },
    //     {
    //         date: "2023-06-04 12:00",
    //         absent_status: null,
    //         attendance_mode_checkin: "biometric",
    //         attendance_mode_checkout: "biometric",
    //         checkin_time: "22:09:40",
    //         checkout_time: "22:09:48",
    //         eg_reason: null,
    //         eg_reason_custom: null,
    //         eg_status: null,
    //         isAbsent: false,
    //         isEG: true,
    //         isLC: false,
    //         isMIP: true,
    //         isMOP: false,
    //         lc_reason: null,
    //         lc_reason_custom: null,
    //         lc_status: "None",
    //         leave_type: null,
    //         mip_status: null,
    //         mop_status: null,
    //         selfie_checkin: null,
    //         selfie_checkout: null,
    //         user_id: "1",
    //         vmt_employee_workshift_id: 1,
    //         workshift_code: "FS",
    //         workshift_name: "First Shift"
    //     },
    //     {
    //         date: "2023-06-08 12:00",
    //         absent_status: 'Applied',
    //         attendance_mode_checkin: "web",
    //         attendance_mode_checkout: "web",
    //         checkin_time: "22:09:40",
    //         checkout_time: "22:09:48",
    //         eg_reason: null,
    //         eg_reason_custom: null,
    //         eg_status: null,
    //         isAbsent: true,
    //         isEG: false,
    //         isLC: false,
    //         isMIP: false,
    //         isMOP: false,
    //         lc_reason: null,
    //         lc_reason_custom: null,
    //         lc_status: "None",
    //         leave_type: 'Sick and Casual',
    //         mip_status: null,
    //         mop_status: null,
    //         selfie_checkin: null,
    //         selfie_checkout: null,
    //         user_id: "1",
    //         vmt_employee_workshift_id: 1,
    //         workshift_code: "FS",
    //         workshift_name: "First Shift"
    //     },
    //     {
    //         date: "2023-06-12 12:00",
    //         absent_status: null,
    //         attendance_mode_checkin: "mobile",
    //         attendance_mode_checkout: "mobile",
    //         checkin_time: "22:09:40",
    //         checkout_time: "22:09:48",
    //         eg_reason: null,
    //         eg_reason_custom: null,
    //         eg_status: null,
    //         isAbsent: false,
    //         isEG: false,
    //         isLC: true,
    //         isMIP: false,
    //         isMOP: false,
    //         lc_reason: null,
    //         lc_reason_custom: null,
    //         lc_status: "None",
    //         leave_type: null,
    //         mip_status: null,
    //         mop_status: null,
    //         selfie_checkin: null,
    //         selfie_checkout: null,
    //         user_id: "1",
    //         vmt_employee_workshift_id: 1,
    //         workshift_code: "FS",
    //         workshift_name: "First Shift"
    //     },
    //     {
    //         date: "2023-06-17 12:00",
    //         absent_status: null,
    //         attendance_mode_checkin: "web",
    //         attendance_mode_checkout: "web",
    //         checkin_time: "22:09:40",
    //         checkout_time: "22:09:48",
    //         eg_reason: null,
    //         eg_reason_custom: null,
    //         eg_status: null,
    //         isAbsent: false,
    //         isEG: false,
    //         isLC: false,
    //         isMIP: true,
    //         isMOP: false,
    //         lc_reason: null,
    //         lc_reason_custom: null,
    //         lc_status: "None",
    //         leave_type: null,
    //         mip_status: null,
    //         mop_status: null,
    //         selfie_checkin: null,
    //         selfie_checkout: null,
    //         user_id: "1",
    //         vmt_employee_workshift_id: 1,
    //         workshift_code: "FS",
    //         workshift_name: "First Shift"
    //     },
    //     {
    //         date: "2023-06-20 12:00",
    //         absent_status: null,
    //         attendance_mode_checkin: "web",
    //         attendance_mode_checkout: "web",
    //         checkin_time: "22:09:40",
    //         checkout_time: "22:09:48",
    //         eg_reason: null,
    //         eg_reason_custom: null,
    //         eg_status: null,
    //         isAbsent: false,
    //         isEG: true,
    //         isLC: false,
    //         isMIP: true,
    //         isMOP: false,
    //         lc_reason: null,
    //         lc_reason_custom: null,
    //         lc_status: "None",
    //         leave_type: null,
    //         mip_status: null,
    //         mop_status: null,
    //         selfie_checkin: null,
    //         selfie_checkout: null,
    //         user_id: "1",
    //         vmt_employee_workshift_id: 1,
    //         workshift_code: "FS",
    //         workshift_name: "First Shift"
    //     },
    // ])

    const getSelectedEmployeeAttendance = async(currentlySelectedUser,currentlySelectedMonth,currentlySelectedYear)=>{
        let url = '/fetch-attendance-user-timesheet'
        return  axios.post(url,{
            month: currentlySelectedMonth+1,
            year: currentlySelectedYear,
            user_id: currentlySelectedUser,
        })
    }

    const getTeamList = async(user_code) =>{
       return  axios.post('/fetch-team-members',{
        user_code:user_code
        })
    }

    const getOrgList = async() =>{
        return  axios.get('/fetch-org-members')
    }



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

    const onClickShowLc_dialog = (selectedLcDate) =>{
        // lcDetails.value = {...selectedLcDate}
        dialog_Lc.value = true
    }
    const applyLcRegularization = () =>{

    }

    //  Applying for Missed In and  Out Punches
    const applyMop = (value) => {
        dialog_Mop.value = true
        console.log(value);

    }
    const applyMip = (value) => {
        dialog_Mip.value = true
        console.log(value);

    }

    //  Applying for Late Coming and Early Going

    const applyLc = (value) => {

        dialog_Lc.value = true
        console.log(value);

    }
    const applyEg = (value) => {
        dialog_Eg.value = true
        console.log(value);
    }

    // View check in and out selfie Images

    const viewSelfie = (value) =>{
        dialog_Selfie.value = true
    }

    const errorMessege  = (value) =>{
        let date = ''
        if(value){
            if(date < value){
                console.log('');
            }
        }
    }

    const findDayDifference = (date) =>{
        let today= new Date().toJSON().slice(0, 10);
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
        // leave_data.custom_total_days=parseInt(total_custom_days)+1
        // console.log(leave_data.custom_total_days);
    }



    return {
        // Timesheet Data source
        getSelectedEmployeeAttendance, currentEmployeeAttendance,getTeamList,getOrgList,

        // Finding Attendance Mode

        findAttendanceMode,

        // Attendance Regularization
        //   MOP
        mopDetails, applyMop,dialog_Mop,
        //   MIP
        mipDetails, applyMip,dialog_Mip,
        //   LC
        onClickShowLc_dialog,applyLcRegularization,
        lcDetails, applyLc,dialog_Lc,
        //   EG
        egDetails, applyEg,dialog_Eg,
        // Selfie
        dialog_Selfie,viewSelfie


    }
})
