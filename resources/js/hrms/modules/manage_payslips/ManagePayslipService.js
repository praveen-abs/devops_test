import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const useManagePayslipStore = defineStore("managePayslipStore", () => {


    // Variable Declarations
    const array_employees_list = ref()
    const selectedPayRollDate = ref()
    const paySlipHTMLView = ref()
    const loading = ref(false)

    // Events
    async function getAllEmployeesPayslipDetails(month, year) {
        loading.value = true
        //reset the var
        array_employees_list.value = '';

        await axios.post('getAllEmployeesPayslipDetails', {
            month: month,
            year: year
        }).then((response) => {
            // console.log("Response [getAllEmployeesPayslipDetails] : " + JSON.stringify(response.data.data));

            array_employees_list.value = response.data.data;
        }).finally(() => {
            loading.value = false
        });
    }

    async function getEmployeePayslipDetailsAsHTML(user_code, month, year) {
        loading.value = true

        await axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsHTML', {
            user_code: user_code,
            month: month,
            year: year
        }).then((response) => {
            // console.log("Response [getEmployeePayslipDetailsAsHTML] : " + JSON.stringify(response.data.data));

            paySlipHTMLView.value = response.data;

        }).finally(() => {
            loading.value = false
        });

    }

    async function getEmployeePayslipDetailsAsPDF(user_code, month, year) {
        loading.value = true

        await axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsPDF', {
            user_code: user_code,
            month: month,
            year: year
        }).then((response) => {
            // console.log("Response [getEmployeePayslipDetailsAsHTML] : " + JSON.stringify(response.data.data));

           // paySlipHTMLView.value = response.data;

        }).finally(() => {
            loading.value = false
        });

    }

    async function sendMail_employeePayslip(user_code, month, year) {
        console.log("sendMail_employeePayslip() : Sending mail to user : " + user_code);

        loading.value = true

        // show_dialogconfirmation.value= false;

        axios.post('/payroll/paycheck/sendMail_employeePayslip', {
            user_code: user_code,
            month: month,
            year: year,
        }).then((response) => {
            console.log("testing ",response.data);

            if (response.data.status == "success"){
                console.log(response.data.status);
                Swal.fire({
                       title: response.data.status = "success",
                       text: response.data.message,
                       icon: "success",
                       showCancelButton: false,
                   }).then((result) => {

                   });
                   if (response.data.status == "failure") {
                    Swal.fire({
                        title: response.data.status = "failure",
                        text: response.data.message,
                        icon: "failure",
                        showCancelButton: false,
                    }).then((result) => {
                    });
                }
           }

            console.log(" Response [sendMail_employeePayslip] : " + response.data.data);
        })
            .catch((data) => {
                console.log(data);

            }).finally(()=>{
                loading.value = false
            })

    }


    async function updatePayslipReleaseStatus(user_code, month, year, status) {
        console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : " + user_code);

        // show_dialogconfirmation.value= false;

        let selectedDate = new Date(selectedPayRollDate.value)
        axios.post('/payroll/paycheck/updatePayslipReleaseStatus', {
            user_code: user_code,
            month: month,
            year: year,
            status: status
        }).then((response) => {
            console.log(" Response [updatePayslipReleaseStatus] : " + response.data.data);
        })
            .catch((response) => {
                console.log(response.data.data);

            }).finally(() => {
                getAllEmployeesPayslipDetails(selectedDate.getMonth() + 1, selectedDate.getFullYear())
            })

    }
    async function UpdateWithDrawStatus(user_code, month, year,status){
        console.log("UpdateWithDrawStatus() : Updating withdraw :", user_code);

        let selectedDate = new Date(selectedPayRollDate.value)
        axios.post('/payroll/paycheck/updatePayslipReleaseStatus', {
            user_code: user_code,
            month: month,
            year: year,
            status: status
        }).then((response) => {
            console.log(" Response [updatePayslipReleaseStatus] : " + response.data.data);
        })
            .catch((response) => {
                console.log(response.data.data);

            }).finally(() => {
                getAllEmployeesPayslipDetails(selectedDate.getMonth() + 1, selectedDate.getFullYear())
            })

    }

    async function downloadPayslip(user_code, month, year, status) {

        // show_dialogconfirmation.value= false;

        let selectedDate = new Date(selectedPayRollDate.value)
        axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsPDF', {
            user_code: user_code,
            month: month,
            year: year,
            status: status
        }).then((response) => {
            console.log(" Response [downloadPayslipReleaseStatus] : " + JSON.stringify( response.data.data));
            window.open(`data:application/pdf;base64,${response.data.data}`);

        })
            .catch((data) => {
                console.log(data);

             })//.finally(() => {
            //     getAllEmployeesPayslipDetails(selectedDate.getMonth() + 1, selectedDate.getFullYear())
            // })

    }



    return {

        // Varaible Declartion

        array_employees_list, paySlipHTMLView, selectedPayRollDate, loading,

        // Functions
        getAllEmployeesPayslipDetails, getEmployeePayslipDetailsAsHTML, sendMail_employeePayslip, updatePayslipReleaseStatus,downloadPayslip,UpdateWithDrawStatus,getEmployeePayslipDetailsAsPDF

    };
});
