import { defineStore } from "pinia";
import { reactive, ref } from "vue";
import axios from "axios";
import dayjs from "dayjs";
import { Service } from '../Service/Service'

export const useLeaveModuleStore = defineStore("useLeaveModuleStore", () => {

    const service = Service()

    const canShowLoading = ref(true)

    //Leave history vars
    const array_employeeLeaveBalance = ref()
    const array_employeeAvailedLeaveBalance = ref()
    const array_employeeLeaveHistory = ref();
    const array_teamLeaveHistory = ref();
    const array_orgLeaveHistory = ref();
    const array_orgLeaveBalance = ref();
    const selectedStartDate = ref();
    const selectedEndDate = ref();
    const canshowloadingsrceen = ref();
    const arrayTermLeaveBalance = ref();

    const selected_LeaveInformation = ref();
    const canShowLeaveDetails = ref(false);

    // const


    const setLeaveDetails = ref({})

    const getLeaveDetails = (leaveDetails) => {
        canShowLeaveDetails.value = true
        console.log(leaveDetails);
        setLeaveDetails.value = { ...leaveDetails }
        setLeaveDetails.emp_name = leaveDetails.name

    }

    async function getEmployeeLeaveBalance() {
        canShowLoading.value = true
        let url_leave_balance = `/get-employee-leave-balance`
        await axios.get(url_leave_balance).then(res => {
            console.log(res.data);
            array_employeeLeaveBalance.value = res.data
            array_employeeAvailedLeaveBalance.value = res.data["Avalied Leaves"]
        }).finally(() => {
            canShowLoading.value = false
        })
    }
    async function getEmployeeLeaveHistory(filter_month, filter_year, filter_leave_status) {

        let user_code = 0;
        // canShowLoading.value = true

        await axios.get(window.location.origin + "/currentUserCode ").then((response) => {
            user_code = response.data;
        });


        await axios.post('/attendance/getEmployeeLeaveDetails', {
            user_code: user_code,
            filter_month: filter_month,
            filter_year: filter_year,
            filter_leave_status: filter_leave_status,

        }).then((response) => {
            array_employeeLeaveHistory.value = response.data.data;
            console.log("getEmployeeLeaveHistory() : " + response.data);
        }).finally(() => {
            canShowLoading.value = false
        });

    }


    async function getTeamLeaveHistory(filter_month, filter_year, filter_leave_status) {


        let user_code = 0;

        await axios.get(window.location.origin + "/currentUserCode ").then((response) => {
            user_code = response.data;
        });



        axios.post('/attendance/getTeamEmployeesLeaveDetails', {
            manager_code: user_code,
            filter_month: filter_month,
            filter_year: filter_year,
            filter_leave_status: filter_leave_status
        }).then((response) => {
            array_teamLeaveHistory.value = response.data.data;
            console.log("getTeamLeaveHistory() : " + response.data);
        }).finally(() => {
            canShowLoading.value = false
        });

    }

    async function getAllEmployeesLeaveHistory(filter_month, filter_year, filter_leave_status) {
        axios.post('/attendance/getAllEmployeesLeaveDetails', {
            filter_month: filter_month,
            filter_year: filter_year,
            filter_leave_status: filter_leave_status
        }).then((response) => {
            array_orgLeaveHistory.value = response.data.data;
            console.log("getOrgLeaveHistory() : " + response.data.data);
        }).finally(() => {
            canShowLoading.value = false
        });

    }

    /*
        Get the leave details of a particular leave record_id
    */
    async function getLeaveInformation(record_id) {
        // canShowLoading.value = true
        axios.post('/attendance/getLeaveInformation', {
            record_id: record_id

        }).then((response) => {
            selected_LeaveInformation.value = response.data.data;
            console.log("getLeaveInformation() : " + response.data);
        }).finally(() => {
            canShowLoading.value = false
        });

    }

    // Get Org Leave Balance details

    async function getOrgLeaveBalance(start_date, end_date) {
        // canShowLoading.value = true;

        await axios.post('/fetch-org-leaves-balance', {
            start_date: start_date,
            end_date: end_date
        }).then((res) => {
            array_orgLeaveBalance.value = res.data;
        }).finally(() => {
            canShowLoading.value = false;
        });
    }

    async function getTermLeaveBalance(start_date, end_date) {
        // canShowLoading.value = true;
        console.log(start_date, end_date);
        axios.post('/fetch-team-leave-balance', {
            start_date: start_date,
            end_date: end_date
        }).then((res) => {
            arrayTermLeaveBalance.value = res.data;

        }).finally(() => {
            canShowLoading.value = false;
        })
    }

    return {

        canShowLoading, canShowLeaveDetails, setLeaveDetails, getLeaveDetails,

        array_employeeLeaveHistory, array_teamLeaveHistory, array_orgLeaveHistory, array_employeeLeaveBalance, array_employeeAvailedLeaveBalance, array_orgLeaveBalance,
        selectedStartDate, selectedEndDate,
        canshowloadingsrceen,

        arrayTermLeaveBalance,

        //

        // Functions

        getEmployeeLeaveHistory, getTeamLeaveHistory, getAllEmployeesLeaveHistory, getLeaveInformation, getEmployeeLeaveBalance,
        // org leave Balance functions
        getOrgLeaveBalance,

        // TermLeaveBalance
        getTermLeaveBalance

    };
});
