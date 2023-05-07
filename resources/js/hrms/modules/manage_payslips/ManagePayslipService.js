import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const useManagePayslipStore = defineStore("managePayslipStore", () => {


    // Variable Declarations
    const array_employees_list = ref()

    const paySlipHTMLView = ref()

    // Events
    async function getAllEmployeesPayslipDetails(month, year){

        //reset the var
        array_employees_list.value = '';

        await axios.post('getAllEmployeesPayslipDetails',{
            month : month,
            year : year
        }).then((response) => {
           // console.log("Response [getAllEmployeesPayslipDetails] : " + JSON.stringify(response.data.data));

            array_employees_list.value = response.data.data;
        });
    }

    async function getEmployeePayslipDetailsAsHTML(user_code, month, year){

       await axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsHTML',{
            user_code : user_code,
            month : month,
            year : year
        }).then((response) => {
            // console.log("Response [getEmployeePayslipDetailsAsHTML] : " + JSON.stringify(response.data.data));

            paySlipHTMLView.value = response.data;

        });

    }

    async function sendMail_employeePayslip(user_code, month, year){
        console.log("sendMail_employeePayslip() : Sending mail to user : "+ user_code);

        // show_dialogconfirmation.value= false;

        axios.post('/payroll/paycheck/sendMail_employeePayslip',{
            user_code: user_code,
            month: month,
            year: year,
        }).then((response)=>{
            console.log(" Response [sendMail_employeePayslip] : "+response.data.data);
        })
        .catch((data)=>{
            console.log(data);

        })

    }


    async function updatePayslipReleaseStatus(user_code, month, year, status){
        console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : "+ user_code);

        // show_dialogconfirmation.value= false;

        axios.post('/payroll/paycheck/updatePayslipReleaseStatus',{
            user_code: user_code,
            month: month,
            year: year,
            status: status
        }).then((response)=>{
            console.log(" Response [updatePayslipReleaseStatus] : "+response.data.data);
        })
        .catch((data)=>{
            console.log(data);

        })

    }



    return {

        // Varaible Declartion

        array_employees_list, paySlipHTMLView,

        // Functions
        getAllEmployeesPayslipDetails, getEmployeePayslipDetailsAsHTML, sendMail_employeePayslip , updatePayslipReleaseStatus

    };
});
