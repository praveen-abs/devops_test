import { defineStore } from "pinia";
import axios from "axios";
import { Service } from "../../Service/Service";
import { ref } from "vue";
import { data } from "autoprefixer";

export const useMainDashboardStore = defineStore("mainDashboardStore", () => {
    const service = Service();

    // Varaible Declarations

    const allEventSource = ref()
    const allNotificationSource = ref([])
    const leaveBalancePerMonthSource = ref([])
    const attenanceReportPerMonth = ref([])
    const canShowLoading = ref(true)

    // Subscribe Main DashBoard Data Source
    // const getMainDashboardSource = (async () => {

    //     let dashboardUrl = '/getAllNewDashboardDetails'
    //     await axios.get(dashboardUrl).then(res => {
    //             console.log(element);
    //             allEventSource.value = element.all_events.original.data.birthday
    //             allNotificationSource.value = element.all_notification.original.data.array_notifications
    //             leaveBalancePerMonthSource.value = element.leave_balance_per_month.original.data
    //             attenanceReportPerMonth.value = element.attenance_report_permonth.original.data
    //         });

    //     })

    // })

    async function getMainDashboardData(month, year) {
        await axios.get('/getAllNewDashboardDetails').then((response) => {
            allEventSource.value = response.data.all_events.birthday;
            allNotificationSource.value = response.data.all_notification.array_notifications;
            leaveBalancePerMonthSource.value = response.data.leave_balance_per_month;
            attenanceReportPerMonth.value = response.data.attenance_report_permonth;

        }).finally(() => {
            canShowLoading.value = false
        });
    }

    async function getHRDashboardData(){

    }

    async function getAttendanceStatus(user_code, date){
        await axios.get('/getAttendanceStatus',{
            user_code : 'PLIPL068',
            date : '2023-06-26',
        }).then((response) => {
            console.log("getAttendanceStatus() : "+response.data);
        }).finally(() => {

        });
    }

    /* Employee Welcome Card
        Employee Check in and out time
    */

    const getCurrentlyLoginUser = () => {
        return axios.get("/currentUserName");
    };

    const updateCheckin_out = (data) => {
        return axios.post("/performAttendanceCheckIn", data);
    };


    // async function getMainDashboardData() {
    //     if (!currentUserCode.value) {
    //         await axios.get("/currentUserCode").then((res) => {
    //             currentUserCode.value = res.data;
    //             //  console.log("Current User Code : " + currentUserCode.value);
    //         });
    //     }

    //     // console.log("Getting maindashboard data for USERCODE : " + service.current_user_code);

    //     await axios
    //         .post("/get-maindashboard-data", {
    //             user_code: currentUserCode,
    //         })
    //         .then((res) => {

    //             if (res.data.status == "success") {
    //                 mainDashboardData.value = res.data.data;
    //             } else if (res.data.status == "failure") {
    //                 console.log(res.data.message);

    //             }

    //         })
    //         .catch((err) => {
    //             console.log("Error :: getMainDashboardData() : " + err);
    //         });
    // }

    //    Leave Details

    const fetch_leave_history = () => {
        return axios.get(
            "http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"
        );
    };

    return {
        // varaible Declarations
        service,canShowLoading,

      // Welcome Card
        getCurrentlyLoginUser,
        getAttendanceStatus,
        //getMainDashboardData,
        getMainDashboardData,
        updateCheckin_out,
        fetch_leave_history,

        // All Events
        allEventSource,

        // Leave Balance Per Month
        leaveBalancePerMonthSource,

        // Notification

        allNotificationSource,

        // Attendance report Per Month

        attenanceReportPerMonth

    };
});
