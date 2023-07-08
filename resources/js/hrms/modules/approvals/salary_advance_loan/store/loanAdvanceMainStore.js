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

    const salaryAdvance =reactive({
    });

    async function getEmpDetails() {
        canShowLoadingScreen.value = true;
        // let url = "/SalAdvApproverFlow";
         let url = "/SalAdvApproverFlow";
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
        let status = Status
        canShowLoadingScreen.value = true;

        let data = val.id;
        await axios.post('/rejectOrApprovedSaladv', {
            record_id: data,
            status:
            status == 1 ? 1
            : status == -1 ? -1
                        : status,
            reviewer_comments: reviewer_comments,
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
         axios.post('/fetch-employee-for-loan-approval',{
              loan_type:"InterestFreeLoan",
        }).then((res)=>{
            console.log( res.data);
            arrayIFL_List.value = res.data
            console.log(arrayIFL_List);
        }).finally(()=>{
            canShowLoadingScreen.value = false;
        })
    };

    // Interest free loan Datatable function Approval and Rejected

    async function IFLapproveAndReject(val, Status,reviewer_comments) {
        currentlySelectedStatus.value=Status;
        let status = Status
        canShowLoadingScreen.value = true;
        console.log(reviewer_comments);
        let data = val.id;
        console.log(data);
        await axios.post('/reject-or-approve-loan', {
            loan_type : 'InterestFreeLoan',
            record_id: data,
            status:
            status == 1
                    ? 1
                    : status == -1
                        ? 1
                        : status,
            reviewer_comments: reviewer_comments,
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
        salaryAdvance,
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

