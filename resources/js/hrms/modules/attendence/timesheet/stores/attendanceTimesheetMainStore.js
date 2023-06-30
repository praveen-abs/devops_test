import { defineStore } from "pinia";
import { computed, ref } from "vue";

export const useAttendanceTimesheetMainStore = defineStore("Timesheet", () => {


    const timesheetMainSource = ref([

        {
            date: "2023-06-02 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: false,
            isLC: true,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: null,
            mip_status: null,
            mop_status: null,
            selfie_checkin: null,
            selfie_checkout: null,
            user_id: "1",
            vmt_employee_workshift_id: 1,
            workshift_code: "FS",
            workshift_name: "First Shift"
        },
        {
            date: "2023-06-04 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: false,
            isLC: true,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: null,
            mip_status: null,
            mop_status: null,
            selfie_checkin: null,
            selfie_checkout: null,
            user_id: "1",
            vmt_employee_workshift_id: 1,
            workshift_code: "FS",
            workshift_name: "First Shift"
        },
        {
            date: "2023-06-08 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: false,
            isLC: true,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: null,
            mip_status: null,
            mop_status: null,
            selfie_checkin: null,
            selfie_checkout: null,
            user_id: "1",
            vmt_employee_workshift_id: 1,
            workshift_code: "FS",
            workshift_name: "First Shift"
        },
        {
            date: "2023-06-12 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: false,
            isLC: true,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: null,
            mip_status: null,
            mop_status: null,
            selfie_checkin: null,
            selfie_checkout: null,
            user_id: "1",
            vmt_employee_workshift_id: 1,
            workshift_code: "FS",
            workshift_name: "First Shift"
        },
        {
            date: "2023-06-17 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: false,
            isLC: true,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: null,
            mip_status: null,
            mop_status: null,
            selfie_checkin: null,
            selfie_checkout: null,
            user_id: "1",
            vmt_employee_workshift_id: 1,
            workshift_code: "FS",
            workshift_name: "First Shift"
        },
        {
            date: "2023-06-20 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: false,
            isLC: true,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: null,
            mip_status: null,
            mop_status: null,
            selfie_checkin: null,
            selfie_checkout: null,
            user_id: "1",
            vmt_employee_workshift_id: 1,
            workshift_code: "FS",
            workshift_name: "First Shift"
        },
    ])

    const findAttendanceMode = (attendance_mode) => {
        console.log(attendance_mode);
        if (attendance_mode == "biometric")
            // return '&nbsp;<i class="fa-solid fa-fingerprint"></i>';
            return 'fas fa-fingerprint'
        else
            if (attendance_mode == "web")
                return 'fa fa-laptop';
            else
                if (attendance_mode == "mobile")
                    return 'fa fa-mobile-phone';
                else {
                    return ''; // when attendance_mode column is empty.
                }
    }


    return {
        // Timesheet Data source
        timesheetMainSource,

        // Finding Attendance Mode

        findAttendanceMode,
    }
})
