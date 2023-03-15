import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const Service = defineStore("Service", () => {

    // Notification service
    const toast = useToast();

    // Variable Declarations
    const leave_data = reactive({
        selected_leave: "",
        full_day_leave_date: "",
        half_day_leave_date: "",
        half_day_leave_session:"",
        radiobtn_full_day: "",
        radiobtn_half_day: "",
        radiobtn_custom: "",
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
    const leave_types=ref()
    let today = new Date();
    const RequiredField = ref(false);
    const data_checking=ref(false)
    const Email_Service=ref(false)

    let invalidDate = new Date();
    invalidDate.setDate(today.getDate() - 1);
    invalidDates.value = [today, invalidDate];



    // Events

    const full_day = () => {
        leave_data.radiobtn_full_day == "full_day"
            ? (full_day_format.value = true)
            : (full_day_format.value = false);
        full_day_format.value = true;
        custom_format.value = false;
        Permission_format.value = false;
        half_day_format.value = false;
        compensatory_format.value = false;
    };

    const half_day = () => {
        leave_data.radiobtn_half_day == "half_day"
            ? (half_day_format.value = true)
            : (half_day_format.value = false);
        custom_format.value = false;
        Permission_format.value = false;
        full_day_format.value = false;
        compensatory_format.value = false;
        half_day_format.value = true;
    };
    const custom_day = () => {
        leave_data.radiobtn_custom == "custom"
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

        if(!leave_data.custom_total_days<0){
            alert("")
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
        } else if (leave_data.selected_leave == "Compensatory Leave") {
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

    const get_leave_types=()=>{
        axios.get('/fetch-leave-policy-details').then(res=>{
            console.log(res.data);
            leave_types.value=res.data
        })
    }

    // Request leave Events

    const leave_Request_data=reactive({
        leave_type_id:1,
        leave_Request_date:moment().format( 'YYYY-MM-DD  HH:mm:ss' ),
        leave_type_name:'',
        leave_session:'',
        start_date:'',
        end_date:'',
        no_of_days:'',
        hours_diff:'',
        notify_to:'',
        leave_reason:'',
    })




    // write Email service and axios service here

    const Submit = () => {



        leave_Request_data.leave_type_name=leave_data.selected_leave
        if( leave_data.radiobtn_full_day=="full_day"){
            console.log("Full day leave : "+leave_data.full_day_leave_date);
            leave_Request_data.no_of_days=1
            //leave_Request_data.start_date = new Date(leave_data.full_day_leave_date).toISOString().slice(0,10)
            leave_Request_data.start_date = moment(leave_data.full_day_leave_date).format('YYYY-MM-DD');
            leave_Request_data.end_date = leave_Request_data.start_date
            leave_Request_data.leave_session="";

        }else
        if(leave_data.radiobtn_half_day=="half_day"){
            console.log("Applying half-day leave...");
            leave_Request_data.no_of_days = 0.5
            leave_Request_data.start_date = moment(leave_data.half_day_leave_date).format('YYYY-MM-DD');
            leave_Request_data.end_date = leave_Request_data.start_date

            if(leave_data.half_day_leave_session=="forenoon"){
                leave_Request_data.leave_session="FN"
            }else{
                leave_Request_data.leave_session="AN"
            }

      }else
        if(leave_data.radiobtn_custom=="custom"){
            leave_Request_data.start_date=  moment(leave_data.custom_start_date).format('YYYY-MM-DD');
            leave_Request_data.end_date= moment(leave_data.custom_end_date).format('YYYY-MM-DD');
            leave_Request_data.no_of_days=leave_data.custom_total_days
            leave_Request_data.leave_session="";

        }else{
            toast.add({
                severity: "info",
                summary: "Info Message",
                detail: "Select Leave",
                life: 3000,
            });
      }
      leave_Request_data.notify_to=leave_data.notifyTo
      leave_Request_data.leave_reason=leave_data.leave_reason

        RequiredField.value = true;
        data_checking.value=true

        console.log(leave_Request_data);

        axios.post('/applyLeaveRequest',{
            "leave_request_date": leave_Request_data.leave_Request_date,
            //"leave_type_id": leave_Request_data.leave_type_id,
            "leave_type_name": leave_Request_data.leave_type_name,
            "leave_session": leave_Request_data.leave_session,
            "start_date":leave_Request_data.start_date ,
            "end_date": leave_Request_data.end_date,
            "no_of_days": leave_Request_data.no_of_days,
            "hours_diff": leave_Request_data.hours_diff,
            "notify_to": leave_Request_data.notify_to,
            "leave_reason": leave_Request_data.leave_reason,
        }).then(res=>{
            if(res.data.status=='success'){
                Email_Service.value=true
            }

            console.log(res.data.status);
            data_checking.value=false

        }).catch(err=>{
            console.log(err);
        })
        console.log("Leave"+leave_data.selected_leave);



    };



    return {

        // Variable Declaration
        leave_data,
        invalidDate,
        today,
        invalidDates,
        toast,
        leave_Request_data,
        leave_types,
        data_checking,
        Email_Service,



        // Events
        half_day,
        full_day,
        custom_day,
        Permission,
        Submit,
        dayCalculation,
        time_difference,
        get_leave_types,

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
