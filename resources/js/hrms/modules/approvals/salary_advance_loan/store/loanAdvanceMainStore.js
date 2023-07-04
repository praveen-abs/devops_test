import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import axios from "axios";


export const UseSalaryAdvanceApprovals = defineStore('SalaryAdvanceApprovals', () => {

    // variables
    const arraySalaryAdvance = ref();
    const currentlySelectedStatus = ref();
    const canShowLoadingScreen = ref(false);

    const Request_comments = ref();

    // functions

    async function getEmpDetails() {
        canShowLoadingScreen.value = true;
        // let url = "/SalAdvApproverFlow";
         let url = "http://localhost:3000/salaryAdvance";
        await axios.get(url).then((res) => {
            arraySalaryAdvance.value = res.data;
        }).finally(() => {
            canShowLoadingScreen.value = false;
        })
    }

    // salary Advance bulk submit button
    async function SAbulkApproveAndReject(Status, val) {
        canShowLoadingScreen.value = true;

        currentlySelectedStatus.value = Status;
        let data = val;
        await axios.post('http://localhost:3000/submitApproveAndReject', {
            record_id: data,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            reviewer_comments: "",
        }).then(() => {
        }).finally(()=>{
            canShowLoadingScreen.value = false;
        })
    }

    // salary advance datatable btn Approval and Rejected

    async function SAapproveAndReject(val, Status,reviewer_comments) {
        currentlySelectedStatus.value=Status;
        canShowLoadingScreen.value = true;

        let data = val;
        await axios.post('http://localhost:3000/submitApproveAndReject', {
            record_id: data,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            reviewer_comments: "",
        }).then(() => {
        }).finally(()=>{
            canShowLoadingScreen.value = false;
        })

    }


    // Interest free loan function and variables

    const arrayIFL_List = ref();

    async function getInterestFreeLoanDetails(){
        canShowLoadingScreen.value = true;
        arrayIFL_List.value = ""


        await axios.get('http://localhost:3000/InterestFreeloan').then((res)=>{
            arrayIFL_List.value = res.data
        }).finally(()=>{
            canShowLoadingScreen.value = false;
        })
    };

    // Interest free loan Datatable function Approval and Rejected

    async function IFLapproveAndReject(val, Status,reviewer_comments) {
        currentlySelectedStatus.value=Status;
        canShowLoadingScreen.value = true;
console.log(reviewer_comments);
        let data = val;
        await axios.post('http://localhost:3000/submitApproveAndReject', {
            record_id: data,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            reviewer_comments: "",
        }).then(() => {
        }).finally(()=>{
            canShowLoadingScreen.value = false;
        })

    }

    //  Interest free loan function bulk approval button

    async function IFLbulkApproveAndReject(Status, val) {
        canShowLoadingScreen.value = true;

        currentlySelectedStatus.value = Status;
        let data = val;
        await axios.post('http://localhost:3000/submitApproveAndReject', {
            record_id: data,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            reviewer_comments: "",
        }).then(() => {
        }).finally(()=>{
            canShowLoadingScreen.value = false;
        })
    }










    return {
        // Salary Advance
        arraySalaryAdvance,
        currentlySelectedStatus
        ,Request_comments,
        canShowLoadingScreen

        // function
        ,getEmpDetails,
        SAbulkApproveAndReject,
        SAapproveAndReject,

        // interest free loan
        arrayIFL_List,

        //  functions
        getInterestFreeLoanDetails,
        IFLapproveAndReject,
        IFLbulkApproveAndReject


    }

});

