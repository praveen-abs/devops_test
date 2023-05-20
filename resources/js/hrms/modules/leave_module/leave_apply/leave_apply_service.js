import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const useLeaveService = defineStore("useLeaveService", () => {

    // Notification service
    const toast = useToast();

    // Variable Declarations
    const leave_data = reactive({
        current_login_user:"",
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
        compensatory_leaves:'',
        compensatory_leaves_dates:"",
        selected_compensatory_leaves:"",//This refers to comp days selected in dropdown
        compensatory_start_date:"",
        compensatory_total_days:"", //This refers to total days UI textbox
        compensatory_end_date:"",
        notifyTo: "",
        leave_reason: "",
        leave_request_error_messege:""
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
    const Email_Error=ref(false)

    let invalidDate = new Date();
    invalidDate.setDate(today.getDate() - 1);
    invalidDates.value = [today, invalidDate];


    // compensatory leave


     const selected_compensatory_leaves = ref();
    //  const compensatory_leaves = ref([]);


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

        // Custom Day Calculations

        let Custom_date= new Date().toJSON().slice(0, 10);
        var Custom_date1 = new Date(leave_data.custom_start_date);
        console.log(leave_data.custom_start_date);
        var custom_date2 = new Date(leave_data.custom_end_date);
        console.log(leave_data.custom_end_date);
        // To calculate the time difference of two dates
        var Difference_In_Time = custom_date2.getTime() - Custom_date1.getTime();
        console.log("Differenece" + Difference_In_Time);

        // To calculate the no. of days between two dates
        var Difference_In_Days = (
            Difference_In_Time /
            (1000 * 60 * 60 * 24)
        ).toFixed(0);
        let total_custom_days = Difference_In_Days;
        console.log(total_custom_days);
        leave_data.custom_total_days=parseInt(total_custom_days)+1
        console.log(leave_data.custom_total_days);

        // Compensatory Calculation

        var Compensatory_date1 = new Date(leave_data.compensatory_start_date);
        console.log(leave_data.compensatory_start_date);
        var Compensatory_date2 = new Date(leave_data.compensatory_end_date);
        console.log(leave_data.compensatory_end_date);
        // To calculate the time difference of two dates
        var Difference_In_Time = Compensatory_date2.getTime() -Compensatory_date1.getTime();
        console.log("Differenece" + Difference_In_Time);

        // To calculate the no. of days between two dates
        var Difference_In_Days = (
            Difference_In_Time /
            (1000 * 60 * 60 * 24)
        ).toFixed(0);
        let total_Compensatory_days = Difference_In_Days;
        console.log(total_Compensatory_days);
        leave_data.compensatory_total_days=parseInt(total_Compensatory_days)+1
        console.log(leave_data.compensatory_total_days);

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

        if (leave_data.selected_leave.includes("Permission")) {
            Permission_format.value = true;
            TotalNoOfDays.value = false;
            half_day_format.value = false;
            custom_format.value = false;
            compensatory_format.value = false;
        }
         else if (leave_data.selected_leave.includes('Compensatory')) {
            compensatory_format.value = true;
            Permission_format.value = false;
            full_day_format.value = false;
            half_day_format.value = false;
            custom_format.value = false;
            TotalNoOfDays.value = false;
            get_compensatroy_leaves();

            leave_data.compensatory_leaves_dates=moment(leave_data.compensatory_leaves.emp_attendance_date).format(`dddd DD-MMM-YYYY`);
            console.log("kn"+leave_data.compensatory_leaves.emp_attendance_date);

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
            TotalNoOfDays.value=true
            full_day_format.value = true
        }
    };


    const get_user  = () =>{

     // data_checking.value=true

        axios.get('/currentUser').then(res=>{
             leave_data.current_login_user=res.data;
             data_checking.value=false;
        }).catch(err=>{
            console.log(err);
        })

    }



    const get_leave_types = () =>{

        axios.get('/fetch-leave-policy-details').then(res=>{
            console.log(res.data);
            leave_types.value=res.data
       })
    }


    const get_compensatroy_leaves=() =>{

        let user_id= leave_data.current_login_user;
        axios.get(`/fetch-employee-unused-compensatory-days/${user_id}`).then(res=>{
            leave_data.compensatory_leaves=res.data


        }).catch(res=>{
            console.log(res);
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
        compensatory_leave_id:[],


    })

    const ReloadPage = () => {
        location.reload();
    }

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

        }
        else
        if(leave_data.radiobtn_half_day=="half_day"){
            console.log("Applying half-day leave on : "+leave_data.half_day_leave_date);
            leave_Request_data.no_of_days = 0.5;
            console.log("half day leave date"+leave_data.half_day_leave_date);
            leave_Request_data.start_date = moment(leave_data.half_day_leave_date).format('YYYY-MM-DD');
            leave_Request_data.end_date = leave_Request_data.start_date;

            if(leave_data.half_day_leave_session=="forenoon"){
                leave_Request_data.leave_session="FN"
            }
            else
            if(leave_data.half_day_leave_session=="afternoon"){
                leave_Request_data.leave_session="AN"
            }
            else{
                //No session selected, show error

                toast.add({
                    severity: "info",
                    summary: "Select Session",
                    detail: "Select Leave Session",
                    life: 3000,
                });

               return;
            }

        }
        else
        if(leave_data.radiobtn_custom=="custom"){
            leave_Request_data.start_date=  moment(leave_data.custom_start_date).format('YYYY-MM-DD');
            leave_Request_data.end_date= moment(leave_data.custom_end_date).format('YYYY-MM-DD');
            leave_Request_data.no_of_days=leave_data.custom_total_days
            leave_Request_data.leave_session="";

        }
        else
        if(leave_data.selected_leave.includes('Compensatory')){
            leave_Request_data.start_date=  moment(leave_data.compensatory_start_date).format('YYYY-MM-DD');
            leave_Request_data.end_date= moment(leave_data.compensatory_end_date).format('YYYY-MM-DD');
            leave_Request_data.no_of_days=leave_data.compensatory_total_days;

            let value_selected_compensatory_leaves = Object.values(leave_data.selected_compensatory_leaves).length;
            console.log( "Selected Compensatory No.of days : "+leave_data.compensatory_total_days);
            console.log( "Selected Compensatory Leaves : "+value_selected_compensatory_leaves);

            const  find_compensatory_id=Object.values(leave_data.selected_compensatory_leaves);

            //if textbox comp leave count != selected comp days in dropdown
            //// TODO :  Need to check comp days based on 0.5 days also. Right it assumes as 1 day per comp day selected
            if( parseInt(leave_data.compensatory_total_days) != value_selected_compensatory_leaves)
            {
                toast.add({
                    severity: "info",
                    summary: "Error",
                    detail: "Compensatory leaves doesnt match with available leave days",
                    life: 3000,
                });

                return
            }
            else
            {

                find_compensatory_id.map(data=>{
                    let id=data.emp_attendance_id
                    leave_Request_data.compensatory_leave_id.push(id)
                    console.log(leave_Request_data.compensatory_leave_id);
                })
            }

        }
        else{
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
        console.log(leave_Request_data);

        //show loading screen
        data_checking.value=true;


        // data_checking.value=true
        axios.post('/applyLeaveRequest',{
            "leave_request_date": leave_Request_data.leave_Request_date,
            "leave_type_name": leave_Request_data.leave_type_name,
            "leave_session": leave_Request_data.leave_session,
            "start_date":leave_Request_data.start_date ,
            "end_date": leave_Request_data.end_date,
            "no_of_days": leave_Request_data.no_of_days,
            "hours_diff": leave_Request_data.hours_diff,
            "compensatory_work_days_ids" : leave_Request_data.compensatory_leave_id,
            "notify_to": leave_Request_data.notify_to,
            "leave_reason": leave_Request_data.leave_reason,
        }).then(res=>{
            data_checking.value=false

            if(res.data.status=='success'){
                Email_Service.value=true
            }else
            if(res.data.status=='failure'){
                leave_data.leave_request_error_messege=res.data.message;
                Email_Error.value=true
            }

            console.log("Email status"+res.data.status);

        }).catch(err=>{
            console.log(err);
        })

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
        Email_Error,
        selected_compensatory_leaves,



        // Events
        half_day,
        full_day,
        custom_day,
        Permission,
        Submit,
        ReloadPage,
        dayCalculation,
        time_difference,
        get_user,
        get_leave_types,
        get_compensatroy_leaves,


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
