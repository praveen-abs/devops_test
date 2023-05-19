import { defineStore } from "pinia";
import {ref} from "vue";
import axios from "axios";
import dayjs from "dayjs";
import { Service }  from "../Service/Service";

export const useLeaveModuleStore = defineStore("useLeaveModuleStore", () => {

    //Leave history vars
    const array_employeeLeaveHistory = ref();
    const array_teamLeaveHistory = ref();
    const array_orgLeaveHistory = ref();

    const selected_LeaveDetails = ref();

    const baseService = Service();

    async function getEmployeeLeaveHistory(user_code, filter_month, filter_year, filter_leave_status){
        axios.post('/attendance/getEmployeeLeaveDetails', {
             user_code  : user_code,
             filter_month  : filter_month,
             filter_year : filter_year,
             filter_leave_status : filter_leave_status,

        }).then((response) => {
            array_employeeLeaveHistory.value = response.data;
            console.log("getEmployeeLeaveHistory() : "+response.data);
        });
    }


    async function getTeamLeaveHistory(manager_code, filter_month, filter_year, filter_leave_status){
        axios.post('/attendance/getTeamLeaveDetails',{
            manager_code : manager_code,
            filter_month :filter_month,
            filter_year : filter_year,
            filter_leave_status : filter_leave_status
        }).then((response) => {
            array_teamLeaveHistory.value = response.data;
            console.log("getTeamLeaveHistory() : "+response.data);
        });

    }

    async function getAllEmployeesLeaveDetails(filter_month, filter_year, filter_leave_status){
        axios.post('/attendance/getAllEmployeesLeaveDetails',{
            filter_month :filter_month,
            filter_year : filter_year,
            filter_leave_status : filter_leave_status
        }).then((response) => {
            array_orgLeaveHistory.value = response.data;
            console.log("getOrgLeaveHistory() : "+response.data);
        });

    }

    /*
        Get the leave details of a particular leave record_id
    */
    async function getLeaveDetails(record_id){
        axios.post('/attendance/getLeaveDetails' ,{
            record_id : record_id

        }).then((response) => {
            array_orgLeaveHistory.value = response.data;
            console.log("getLeaveDetails() : "+response.data);
        });
    }

    return {

        // Varaible Declartion
        baseService,

        array_employeeLeaveHistory, array_teamLeaveHistory, array_orgLeaveHistory,

        // Functions

        getEmployeeLeaveHistory, getTeamLeaveHistory, getAllEmployeesLeaveDetails, getLeaveDetails

    };
});
