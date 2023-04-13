import {
    defineStore
} from "pinia";
import axios from "axios";

export const Service = defineStore("Service", () => {

    // Welcome Card

   const  getCurrentlyLoginUser = () => {
     return axios.get('/currentUserName')
   }

   const updateCheckin_out = (data) => {
    return axios.post('http://localhost:3000/Empdetails',data)
   }


//    Leave Details

const fetch_leave_history = () => {
    return axios.get('http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20')
}


    return {

        // varaible Declarations
        getCurrentlyLoginUser,
        updateCheckin_out,
        fetch_leave_history


       



    };
});
