import { defineStore } from "pinia";
import axios from "axios";
import { Service } from "../Service/Service";
import { ref } from "vue";

export const useMainDashboardStore = defineStore("mainDashboardStore", () => {
    const service = Service();

    const currentUserCode = ref();

    const mainDashboardData = ref();

    const getCurrentlyLoginUser = () => {
        return axios.get("/currentUserName");
    };

    const updateCheckin_out = (data) => {
        return axios.post("http://localhost:3000/Empdetails", data);
    };

    //    function getCheckinCheckOutData(){

    //    }

    async function getMainDashboardData() {
        if (!currentUserCode.value) {
            await axios.get("/currentUserCode").then((res) => {
                currentUserCode.value = res.data;
              //  console.log("Current User Code : " + currentUserCode.value);
            });
        }

       // console.log("Getting maindashboard data for USERCODE : " + service.current_user_code);

        await axios
            .post("/get-maindashboard-data", {
                user_code: currentUserCode,
            })
            .then((res) => {

                if (res.data.status == "success") {
                    mainDashboardData.value = res.data.data;
                } else if (res.data.status == "failure") {
                    console.log( res.data.message );

                }

            })
            .catch((err) => {
                console.log("Error :: getMainDashboardData() : "+ err);
            });
    }

    //    Leave Details

    const fetch_leave_history = () => {
        return axios.get(
            "http://localhost:8000/fetch-leaverequests/employee/Approved,Rejected,Pending,Revoked,Withdrawn%20"
        );
    };

    return {
        service,

        // varaible Declarations
        getCurrentlyLoginUser,
        getMainDashboardData,
        updateCheckin_out,
        fetch_leave_history,
    };
});
