import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";
import dayjs from 'dayjs';

export const useEmployeePayslipStore = defineStore("employeePayslipStore", () => {


    // Variable Declarations
    const array_employeePayslips_list = ref()

    const paySlipHTMLView = ref()

    const canShowPayslipView  = ref (false);

    const urlParams = new URLSearchParams(window.location.search);

    function getURLParams_UID(){
        if(urlParams.has('uid'))
            return urlParams.get('uid');
        else
            return '';
    }

    // Events
    async function getEmployeeAllPayslipList(){

        axios.post('/payroll/paycheck/getEmployeeAllPayslipList',{
            uid : getURLParams_UID()
        }).then((response) => {
           //console.log("Response [getEmployeeAllPayslipList] : " + JSON.stringify(response.data.data));

           array_employeePayslips_list.value = response.data.data;
        });
    }


    async function getEmployeePayslipDetailsAsHTML(user_code, payroll_month){

        //split the payroll_month into month and year
        let month = parseInt (dayjs(payroll_month).month())+1;
        let year = dayjs(payroll_month).year();

        await axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsHTML',{
             uid : getURLParams_UID(),
             user_code : user_code,
             month : month,
             year : year
         }).then((response) => {
             // console.log("Response [getEmployeePayslipDetailsAsHTML] : " + JSON.stringify(response.data.data));

             paySlipHTMLView.value = response.data;
             canShowPayslipView.value = true;

         });

     }

     async function getEmployeePayslipDetailsAsPDF(user_code, payroll_month){

        console.log("Downloading payslip PDF.....");


        let month = parseInt (dayjs(payroll_month).month())+1;
        let year = dayjs(payroll_month).year();

        //split the payroll_month into month and year

        var config = {
            responseType: 'stream'
        };

        await axios.post('/payroll/paycheck/getEmployeePayslipDetailsAsPDF',
        {
            uid : getURLParams_UID(),
             user_code : user_code,
             month : month,
             year : year
        }).then((response) => {
            //  console.log("Response [getEmployeePayslipDetailsAsPDF] : " + response.data.data);
             console.log(" Response [downloadPayslipReleaseStatus] : " + JSON.stringify( response.data.data));
             window.open(`"data:application/octet-stream;charset=utf-16le;base64,"+${response.data.data}`);
             window.location.reload();
             // window.open(`data:application/pdf;base64,${response.data.data}`);
            //saveAs(`data:application/pdf;base64,${response.data.data}`, 'payslip.pdf');

         })

     }






    return {

        // Varaible Declartion

        array_employeePayslips_list, paySlipHTMLView, canShowPayslipView,

        // Functions

        getEmployeeAllPayslipList, getEmployeePayslipDetailsAsHTML, getEmployeePayslipDetailsAsPDF

    };
});
