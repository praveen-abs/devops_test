import {
    defineStore
} from "pinia";
import axios from "axios";
import { ref } from "vue";

export const Service = defineStore("Service", () => {

    const current_user_id = ref()
    const current_user_code = ref()
    const current_user_name = ref()


    axios.get('/currentUser').then(res => {
        current_user_id.value = res.data
        //  console.log("service class" + res.data);
    })

    axios.get('/currentUserName').then(res => {
        current_user_name.value = res.data
        //  console.log("service class" + res.data);

    })

    axios.get('/currentUserCode').then(res => {
        current_user_code.value = res.data
        //  console.log("service class" + res.data);

    })


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
        return axios.get(`/fetch-departments`);

    }

    const getMaritalStatus = () => {
        return axios.get(`/fetch-marital-details`);

    }


    const getBloodGroups = () => {
        return axios.get(`/fetch-blood-groups`);
    }

    const getAllEmployees = () => {
        return axios.get(`/get-all-employees`);
    }

    return {

        // varaible Declarations

        current_user_id,
        current_user_name,
        current_user_code,


        getBankList,
        getCountryList,
        getStateList,
        ManagerDetails,
        getBloodGroups,
        DepartmentDetails,
        getMaritalStatus,



    };
});
