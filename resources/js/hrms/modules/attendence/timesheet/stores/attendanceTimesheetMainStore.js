import { defineStore } from "pinia";
import { computed, ref } from "vue";

export const useAttendanceTimesheetMainStore = defineStore("Timesheet", () => {

    const mopDetials = ref({})
    const mipDetials = ref({})
    const lcDetials = ref({})
    const egDetials = ref({})


    const dailog_Mop = ref(false)
    const dailog_Mip = ref(false)
    const dailog_Lc = ref(false)
    const dailog_Eg = ref(false)
    const dailog_Selfie = ref(false)


    const timesheetMainSource = ref([

        {
            date: "2023-06-02 12:00",
            absent_status: null,
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "mobile",
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
            attendance_mode_checkin: "biometric",
            attendance_mode_checkout: "biometric",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: false,
            isEG: true,
            isLC: false,
            isMIP: true,
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
            absent_status: 'Applied',
            attendance_mode_checkin: "web",
            attendance_mode_checkout: "web",
            checkin_time: "22:09:40",
            checkout_time: "22:09:48",
            eg_reason: null,
            eg_reason_custom: null,
            eg_status: null,
            isAbsent: true,
            isEG: false,
            isLC: false,
            isMIP: false,
            isMOP: false,
            lc_reason: null,
            lc_reason_custom: null,
            lc_status: "None",
            leave_type: 'Sick and Casual',
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
            attendance_mode_checkin: "mobile",
            attendance_mode_checkout: "mobile",
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
            isLC: false,
            isMIP: true,
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
            isEG: true,
            isLC: false,
            isMIP: true,
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

    //  Applying for Missed In and  Out Punches
    const applyMop = (value) => {
        dailog_Mop.value = true
        console.log(value);

    }
    const applyMip = (value) => {
        dailog_Mip.value = true
        console.log(value);

    }

    //  Applying for Late Coming and Early Going

    const applyLc = (value) => {
        dailog_Lc.value = true
        console.log(value);

    }
    const applyEg = (value) => {
        dailog_Eg.value = true
        console.log(value);
    }

    // View check in and out selfie Images

    const viewSelfie = (value) =>{
        dailog_Selfie.value = true
    }

    function onClickShowLC_Dialog(data_selecteddate){
        console.log("Opening LC dialog");

        //Logic to check whether max apply day limit reached


        //If within max apply day limit, then show the Dialog

        //Before showing the dialog, populate the required data. If regularization already applied, then show as non-editable fields


    }

    function applyLCRegularization(regularization_type, attendance_date, attendance_user, user_time, regularize_time, reason, custom_reason){

        console.log("Sending regularization req...");

        /*
            Need to send thses parameters:

                "regularization_type" => "required", //office, work
                "attendance_date" => "required",
                "attendance_user" => "required",
                "user_time" => "required",
                "regularize_time" => "required",

                "reason" => "required", //
                "custom_reason" => "required_with:reason",



        */

    }


    return {
        // Timesheet Data source
        timesheetMainSource,

        // Finding Attendance Mode

        findAttendanceMode,

        // Attendance Regularization
        //   MOP
        mopDetials, applyMop,dailog_Mop,
        //   MIP
        mipDetials, applyMip,dailog_Mip,
        //   LC
        lcDetials, applyLc,dailog_Lc,
        //   EG
        egDetials, applyEg,dailog_Eg,
        // Selfie
        dailog_Selfie,viewSelfie


    }
})
