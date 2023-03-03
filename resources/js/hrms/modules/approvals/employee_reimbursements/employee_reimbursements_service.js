import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import { useToast } from "primevue/usetoast";

export const Service = defineStore("Service", () => {

    // Notification service
    const toast = useToast();

    // Variable Declarations
    const leave_data = reactive({
        selected_leave: "",
        date: "",
        full_day: "",
        half_day: "",
        custom: "",
        custom_start_date: "",
        custom_end_date: "",
        custom_total_days: "",
        permission_start_time: "",
        permission_total_time: "",
        permission_end_time: "",
        notifyTo: "",
        leave_reason: "",
    });
    const TotalNoOfDays = ref(true);
    const full_day_format = ref(true);
    const half_day_format = ref(false);
    const custom_format = ref(false);
    const Permission_format = ref(false);
    const compensatory_format = ref(false);
    const invalidDates = ref();
    let today = new Date();
    const RequiredField = ref(false);

    let invalidDate = new Date();
    invalidDate.setDate(today.getDate() - 1);
    invalidDates.value = [today, invalidDate];


    // Events

    const full_day = () => {
        leave_data.full_day == "full_day"
            ? (full_day_format.value = true)
            : (full_day_format.value = false);
        full_day_format.value = true;
        custom_format.value = false;
        Permission_format.value = false;
        half_day_format.value = false;
        compensatory_format.value = false;
    };

    const half_day = () => {
        leave_data.half_day == "half_day"
            ? (half_day_format.value = true)
            : (half_day_format.value = false);
        custom_format.value = false;
        Permission_format.value = false;
        full_day_format.value = false;
        compensatory_format.value = false;
        half_day_format.value = true;
    };
    const custom_day = () => {
        leave_data.custom == "custom"
            ? (custom_format.value = true)
            : (custom_format.value = false);
        custom_format.value = true;
        Permission_format.value = false;
        half_day_format.value = false;
        full_day_format.value = false;
        compensatory_format.value = false;
    };
    const dayCalculation = () => {
        if (custom_format.value == true) {
            if (
                leave_data.custom_start_date.length < 0 ||
                leave_data.custom_start_date == ""
            ) {
                toast.add({
                    severity: "info",
                    summary: "Info Message",
                    detail: "Select Start date",
                    life: 3000,
                });
            }
        }
        if (Permission_format.value == true) {
            if (
                leave_data.permission_start_time < 0 ||
                leave_data.permission_start_time == ""
            ) {
                toast.add({
                    severity: "info",
                    summary: "Info Message",
                    detail: "Select Start Time",
                    life: 3000,
                });
            }
        }

        console.log(leave_data.custom_start_date);
        console.log(leave_data.custom_end_date);
        var date1 = new Date(leave_data.custom_start_date);
        var date2 = new Date(leave_data.custom_end_date);

        // To calculate the time difference of two dates
        var Difference_In_Time = date2.getTime() - date1.getTime();
        console.log("Differnece" + Difference_In_Time);

        // To calculate the no. of days between two dates
        var Difference_In_Days = (
            Difference_In_Time /
            (1000 * 60 * 60 * 24)
        ).toFixed(0);
        leave_data.custom_total_days = Difference_In_Days;
        console.log(leave_data.custom_total_days);
    };

    const time_difference = () => {
        console.log(leave_data.permission_start_time);
        console.log(leave_data.permission_end_time);
        let t1 = new Date(leave_data.permission_start_time).getTime();
        let t2 = new Date(leave_data.permission_end_time).getTime();
        console.log("start" + t1, "end" + t2);

        var total_hours = ((t2 - t1) / 1000 / 60 / 60).toFixed(0);
        leave_data.permission_total_time = total_hours;
        console.log(total_hours);
    };
    const Permission = () => {
        // leave_data.selected_leave=='Permission' ? Permission_format.value=true:Permission_format.value=false
        // leave_data.selected_leave=='Compensatory Off'  ?  compensatory_format.value=true : compensatory_format.value=false

        // full_day_format.value=false
        // half_day_format.value=false
        // custom_format.value=false

        if (leave_data.selected_leave == "Permission") {
            Permission_format.value = true;
            TotalNoOfDays.value = false;
            half_day_format.value = false;
            custom_format.value = false;
            compensatory_format.value = false;
        } else if (leave_data.selected_leave == "Compensatory Off") {
            compensatory_format.value = true;
            Permission_format.value = false;
            full_day_format.value = false;
            half_day_format.value = false;
            custom_format.value = false;
            TotalNoOfDays.value = false;
        } else if (leave_data.selected_leave == "Select") {
            compensatory_format.value = false;
            Permission_format.value = false;
            full_day_format.value = true;
            half_day_format.value = false;
            custom_format.value = false;
            TotalNoOfDays.value = true;
        } else {
            Permission_format.value = false;
            compensatory_format.value = false;
        }
    };

    // Request leave Events

    // write Email service and axios service here

    const Submit = () => {
        RequiredField.value = true;
    };

    return {

        // Variable Declaration
        leave_data,
        invalidDate,
        today,
        invalidDates,
        toast,


        // Events
        half_day,
        full_day,
        custom_day,
        Permission,
        Submit,
        dayCalculation,
        time_difference,

        // Boolean values
        full_day_format,
        half_day_format,
        custom_format,
        Permission_format,
        compensatory_format,
        TotalNoOfDays,
        RequiredField,
    };
});
