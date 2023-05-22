import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const useManageWelcomeMailStatusStore = defineStore("ManageWelcomeMailStatusStore", () => {


    // Variable Declarations

    const loading = ref(false);

    const array_employees_list = ref();

    async function getManageWelcomeMailStatus(){
        await axios.get('/getAllEmployees_WelcomeMailStatus_Details')
        .then((res)=>{
            array_employees_list.value = res.data ;
            console.log("testing",array_employees_list);
        })
        .finally(()=>{

        })
    }
    // async function


    // async function downloadPayslipReleaseStatus(user_code, month, year, status) {
    //     console.log("downloadPayslipReleaseStatus() : Updating releasepayslip status to user : " + user_code);


    //     let selectedDate = new Date(selectedPayRollDate.value)
    //     axios.post('/paycheck/employee_payslip/downloadPayslipReleaseStatus', {
    //         user_code: user_code,
    //         month: month,
    //         year: year,
    //         status: status
    //     }).then((response) => {
    //         console.log(" Response [downloadPayslipReleaseStatus] : " + JSON.stringify( response.data.data));
    //         window.open(`data:application/pdf;base64,${response.data.data}`);

    //     })
    //         .catch((data) => {
    //             console.log(data);

    //          });
    // }



    return {

        // Varaible Declartion
        array_employees_list,loading,


        // Functions
        getManageWelcomeMailStatus

    };

});
