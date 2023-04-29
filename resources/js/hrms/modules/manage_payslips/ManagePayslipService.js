import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const useManagePayslipStore = defineStore("managePayslipStore", () => {


    // Variable Declarations
    const array_employees_list = ref()

    const paySlipHTMLView = ref()

    const canShowPayslipView  = ref (false);

    // Events
    async function getAllEmployeesPayslipDetails(month, year){

        axios.post('getAllEmployeesPayslipDetails',{
            month : month,
            year : year
        }).then((response) => {
           // console.log("Response [getAllEmployeesPayslipDetails] : " + JSON.stringify(response.data.data));

            array_employees_list.value = response.data.data;
        });
    }

    async function getEmployeePayslipDetailsAsHTML(user_code, month, year){

        axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsHTML',{
            user_code : user_code,
            month : month,
            year : year
        }).then((response) => {
            console.log("Response [getEmployeePayslipDetailsAsHTML] : " + JSON.stringify(response.data.data));

            paySlipHTMLView.value = response.data;

            canShowPayslipView.value = true;
        });

    }

    async function sendPayslipMail(user_code){

        axios.post('http://localhost:3000/sendEmail',{
            user_code: user_code,
        }).then((data)=>{
            console.log(data);
        })
        .catch((data)=>{
            console.log(data);

        })

    }








    // async function getAllEmployeesMonthlyPayslipsDetails(month, year){

    //     axios.post('payroll/getAllEmployeesMonthlyPayslipsDetails', {
    //         month: month,
    //         year: year,
    //     })
    //     .then((response) => {
    //         console.log("Response : " + response);

    //         ajaxData_employees_list.value = res.data;
    //         console.log(ajaxData_employees_list.value);
    //     });

    // }


    // function monthYear() {
    //     let year = emp.selectDate.getFullYear();
    //     let month = emp.selectDate.getMonth() + 1;

    //     axios.post('/payroll/fetchEmployeePayslipDetails', {
    //         month: month,
    //         year: year,
    //         //selected:emp.selectedProduct,
    //     }).then((res) => {
    //         ajaxData_employees_list.value = res.data;
    //         console.log(res.data);
    //     })
    //         .catch((error) => console.log(error));

    // }



    return {

        // Varaible Declartion

        array_employees_list, paySlipHTMLView, canShowPayslipView,

        // Functions

        getAllEmployeesPayslipDetails, getEmployeePayslipDetailsAsHTML,

        sendPayslipMail

    };
});
