import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";
import dayjs from 'dayjs';
import { useRouter, useRoute } from "vue-router";
import { UseEmployeeDocumentManagerService } from "../EmployeeDocumentsManagerService";

export const useEmployeePayslipStore = defineStore("employeePayslipStore", () => {


    const documentService = UseEmployeeDocumentManagerService()
    // Variable Declarations
    const array_employeePayslips_list = ref()

    const paySlipHTMLView = ref();
    const Payroll_month =  ref('');
    const router = useRouter();
    const route = useRoute();

    const canShowPayslipView = ref(false);

    const urlParams = new URLSearchParams(window.location.search);
    const loading = ref(false);

    function getURLParams_UID() {
        if(route.params.user_code){
            return route.params.user_code
        }else{
            return 'pradessh'
        }
    }

    // Events
    async function getEmployeeAllPayslipList() {

        loading.value = true;

        axios.post('/payroll/paycheck/getEmployeeAllPayslipList', {
            uid: getURLParams_UID()
        }).then((response) => {
            //console.log("Response [getEmployeeAllPayslipList] : " + JSON.stringify(response.data.data));

            array_employeePayslips_list.value = response.data.data;
        }).finally(()=>{
            loading.value = false;
        });
    }


    async function getEmployeePayslipDetailsAsHTML(user_code, payroll_month) {
        loading.value = true;

        //split the payroll_month into month and year
        Payroll_month.value = payroll_month;
        let month = parseInt(dayjs(payroll_month).month()) + 1;
        let year = dayjs(payroll_month).year();
        // /payroll/paycheck/getEmployeePayslipDetailsAsHTML
        await axios.post('/empViewPayslipdetails', {
            uid: getURLParams_UID(),
            user_code: user_code,
            month: month,
            year: year,
        }).then((response) => {
            // console.log("Response [getEmployeePayslipDetailsAsHTML] : " + JSON.stringify(response.data.data));
            paySlipHTMLView.value = response.data;
            canShowPayslipView.value = true;

        }).finally(()=>{
            loading.value = false;
        })

    }

    function downloadFileObject(base64String,employeeName ,payslipyear,payslipMonth) {
        const linkSource = base64String;
        const downloadLink = document.createElement("a");
        const fileName = `${employeeName}-${payslipyear}-${payslipMonth}.pdf`;
        downloadLink.href = linkSource;
        downloadLink.download = fileName;
        downloadLink.click();
    }

    // /empGeneratePayslipPdfMail
    async function getEmployeePayslipDetailsAsPDF(user_code, payroll_month) {
        loading.value = true;

        documentService.loading = true;
        payroll_month;
        console.log("Downloading payslip PDF.....");

        let month = parseInt(dayjs(payroll_month).month()) + 1;
        let year = dayjs(payroll_month).year();

        //split the payroll_month into month and year

        await axios.post('/empGeneratePayslipPdfMail',
            {
                uid: getURLParams_UID(),
                user_code: user_code,
                month: month,
                year: year,
                type:"pdf"
            }).then((response) => {
                 //console.log("Response [getEmployeePayslipDetailsAsPDF] : " + response.data.payslip);
                console.log(" Response [downloadPayslipReleaseStatus] : " + JSON.stringify(response.data.data.payslip));

                if(response.data){
                    let base64String = response.data.data.payslip;
                    let employeeName = response.data.data.emp_name
                    let payslipMonth = response.data.data.month;
                    let payslipyear = response.data.data.year;
                    console.log(base64String);
                    if(base64String){
                        if (base64String.startsWith("JVB")) {
                            base64String = "data:application/pdf;base64," + base64String;
                            downloadFileObject(base64String,employeeName,payslipMonth,payslipyear);
                        } else if (base64String.startsWith("data:application/pdf;base64")) {
                            downloadFileObject(base64String);
                        }
                    }
                }else{
                    console.log("Response Url Not Found");
                }

            }).finally(()=>{
                documentService.loading = false;
                loading.value = false;
            })

    }






    return {

        // Varaible Declartion

        // payroll_month
        Payroll_month,

        array_employeePayslips_list, paySlipHTMLView, canShowPayslipView,loading,

        // Functions

        getEmployeeAllPayslipList, getEmployeePayslipDetailsAsHTML, getEmployeePayslipDetailsAsPDF

    };
});
