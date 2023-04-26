import axios from "axios";
import { defineStore } from "pinia";

import { reactive, ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const useEmpSalaryAdvanceStore = defineStore("useEmpSalaryAdvanceStore", () => {


    // Loading Screen

    const canShowLoading = ref(false)


            /*
        Salary Advance - sa
        Loan with Interest - lwi
        Interest free Loan  - ifl
        Travel Advance - ta
        */


    //   Salary Advance Begins


    // Salary Advance Dailog

    const dailogSalaryAdvance = ref(false)

    // Eligible Employees

    const salaryAdvanceEmployeeData = ref()

    const sa = reactive({
        ymi:'',
        ra:'',
        reason:'',
    })


    const fetchSalaryAdvance = () => {

        canShowLoading.value = true
        console.log(sa);
        console.log("fetching SA");

        axios.get('http://localhost:3000/salary').then(res=>{
            salaryAdvanceEmployeeData.value = res.data
            console.log(res.data);

        }).finally(()=>{
            canShowLoading.value = false
        })
    }

    const saveSalaryAdvance = () => {

        canShowLoading.value = true
        console.log(sa);
        console.log("Saving SA");

        axios.post('http://localhost:3000/salary',sa).finally(()=>{
            canShowLoading.value = false
            fetchSalaryAdvance()
        })
    }

    // interest free loan


    //   Salary Advance Ends


    // Interest Free Loan Feature Begins

    // Initially Disabled

    const dialog_NewInterestFreeLoanRequest = ref(false)

    const isInterestFreeLoaneature = ref()

    // Eligible Employees and Amount
    // Deduction Method
    const ifl = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        Ra:'',
        M_EMI:'',
        Term:'',
        EMI_Start_Month:'',
        Total_Months:'',
        Reason:''
    })


    const fetchInterestfreeLoan = () => {

        canShowLoading.value = true

        console.log("fetching SA");

        axios.get('http://localhost:3000/Interst_free_loan').then(res=>{

        isInterestFreeLoaneature.value = res.data
            console.log(res.data);

        }).finally(()=>{
            canShowLoading.value = false
        })
    }

    const saveInterestfreeLoan = () => {


        canShowLoading.value = true
        console.log("Saving SA");

        axios.post('http://localhost:3000/Interst_free_loan',ifl).finally(()=>{
            canShowLoading.value = false

            fetchInterestfreeLoan();

        })
        dialog_NewInterestFreeLoanRequest.value = false
    }

    // Interest Free Loan Feature Ends


    // Travel Advance Feature Begins

    const isTravelAdvanceFeatureEnabled = ref(1)


    // Eligible Employees

    const eligibleTravelAdvanceEmployeeData = ref(1)

    // Travel Advance Limit
    // Deduction
    // Claim Settings

    const ta = reactive({
        tdl: '',
        deductMethod: '',
        sumbitWithIn: '',
        isDeductedInsubsequentpayroll: ''
    })


    // Travel Advance Feature Ends


    // Loan With interest Feature Begins

    const isLoanWithInterestFeature = ref(1)

    const lwif = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: ''

    })


    // Loan With interest Feature Ends




    return {

        // varaible Declarations

        canShowLoading,

        // SalaryAdvanceFeature

        dailogSalaryAdvance, salaryAdvanceEmployeeData, sa,fetchSalaryAdvance, saveSalaryAdvance,

        // Interest Free Loan

        dialog_NewInterestFreeLoanRequest,isInterestFreeLoaneature, ifl, saveInterestfreeLoan,fetchInterestfreeLoan,

        // Travel Advance Feature

        isTravelAdvanceFeatureEnabled, eligibleTravelAdvanceEmployeeData, ta,


        // Loan With interest Feature
        isLoanWithInterestFeature, lwif


    };
});



