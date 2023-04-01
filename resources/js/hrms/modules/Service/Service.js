import {
    defineStore
} from "pinia";
import axios from "axios";

export const Service = defineStore("Service", () => {

    const getBankList = () => {
        return axios.get(`/db/getBankDetails`)
    }

    const getCountryList = () => {
       return axios.get(`/db/getCountryDetails`)
    }
    const getStateList = () => {
        return axios.get(`/db/getStatesDetails`);
    }
    const ManagerDetails = () => {
        return axios.get(`/fetch-managers-name`);

    }

    const DepartmentDetails = () => {
       return  axios.get(`/fetch-departments`);

    }

    const getMaritalStatus = () => {
        return axios.get(`/fetch-marital-details`);

    }


    const getBloodGroups = () => {
        return axios.get(`/fetch-blood-groups`);
    }

    return {

        // varaible Declarations



        getBankList,
        getCountryList,
        getStateList,
        ManagerDetails,
        getBloodGroups,
        DepartmentDetails,
        getMaritalStatus,



    };
});
