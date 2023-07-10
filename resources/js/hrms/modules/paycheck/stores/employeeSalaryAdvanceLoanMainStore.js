import axios from "axios";
import { constant, functions } from "lodash";
import { defineStore } from "pinia";
import dayjs from 'dayjs';
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
Interest free Loan  - interestFreeLoan
Travel Advance - ta
*/


    //   Salary Advance Begins


    // Salary Advance Dailog

    const dailogSalaryAdvance = ref(false)

    // Eligible Employees

    const salaryAdvanceEmployeeData = ref()

    const sa = reactive({
        ymi: '',
        ra: '',
        mxe: '',
        repdate: '',
        reason: '',
        isEligibleEmp: '',
        storeRepDate:''
    })

    const arraySalaryDetails = ref();

    async function getSalaryDetails() {

        let url = "/getEmpsaladvDetails"

        await axios.get(url).then((res) => {
            arraySalaryDetails.value = res.data;
            console.log(arraySalaryDetails.value);
        }).finally(() => {

        });
    }



    const fetchSalaryAdvance = () => {
        canShowLoading.value = true
        axios.get('/showEmployeeview').then(res => {
            salaryAdvanceEmployeeData.value = res.data
            sa.ymi = res.data.your_monthly_income
            sa.mxe = res.data.max_eligible_amount
            sa.storeRepDate = res.data.Repayment_date
            sa.isEligibleEmp = res.data.eligible
        }).finally(() => {
            canShowLoading.value = false
        })
    }

    const saveSalaryAdvance = () => {
        dailogSalaryAdvance.value = false
        canShowLoading.value = true;
        axios.post('/EmpSaveSalaryAmt', sa).finally(() => {
            canShowLoading.value = false
        })
    }

    // interest free loan


    //   Salary Advance Ends


    // Interest Free Loan Feature Begins

    // Initially Disabled

    const dialog_NewInterestFreeLoanRequest = ref(false)

    const isInterestFreeLoanFeature = ref();
    // const arrayInterestFreeLoan = ref();

    // Eligible Employees and Amount
    // Deduction Method

    const max_tenure_month = ref();
    const interestFreeLoan = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        required_amount: '',
        M_EMI: '',
        Term: '',
        EMI_Start_Month: '',
        EMI_End_Month: '',
        Total_Months: '',
        Reason: '',
        max_tenure_months: '',
        details: '',
        loan_type: 'InterestFreeLoan',
        loan_setting_id: ''
    });



    function getinterestfreeloan() {

        axios.post('/show-eligible-interest-free-loan-details', {
            loan_type: "InterestFreeLoan"
        }).then((res) => {
            console.log(res);
            // interestFreeLoan.max_tenure_months = res.data.max_tenure_months;
            interestFreeLoan.details = res.data;
            interestFreeLoan.loan_setting_id = res.data.loan_setting_id;
            interestFreeLoan.minEligibile = res.data.max_loan_amount;
        })
    }
    // const selected_date =ref();
    const fetchInterestfreeLoan = () => {
        canShowLoading.value = true

        console.log("fetching SA");

        axios.post('/employee-loan-history', { loan_type: "InterestFreeLoan" }).then(res => {

            isInterestFreeLoanFeature.value = res.data
            console.log(res.data);

        }).finally(() => {
            canShowLoading.value = false
        })
    }

    const saveInterestfreeLoan = () => {
        canShowLoading.value = true
        console.log("Saving SA");

        axios.post('/apply-loan', interestFreeLoan).finally(() => {
            canShowLoading.value = false;
            fetchInterestfreeLoan();
        })
        dialog_NewInterestFreeLoanRequest.value = false
    }

    // Interest Free Loan Feature Ends


    // Travel Advance Feature Begins

    const isTravelAdvanceFeatureEnabled = ref(1)

    const dialog_TravelAdvance = ref(false);

    // Eligible Employees

    const eligibleTravelAdvanceEmployeeData = ref()

    // Travel Advance Limit
    // Deduction
    // Claim Settings

    const ta = reactive({
        tdl: '',
        deductMethod: '',
        sumbitWithIn: '',
        isDeductedInsubsequentpayroll: '',
        ra: '',
        reason: ''

    })

    const fetchTraveladvance = () => {

        // canShowLoading.value = true

        console.log("fetching SA");

        axios.get('http://localhost:3000/TravelAdvance').then(res => {

            eligibleTravelAdvanceEmployeeData.value = res.data
            console.log(res.data);

        }).finally(() => {
            canShowLoading.value = false
        })

    }

    const saveTravelAdvance = () => {

        canShowLoading.value = true;
        axios.post('http://localhost:3000/TravelAdvance', ta).finally(() => {
            canShowLoading.value = false

            fetchTraveladvance();

        })
        dialog_TravelAdvance.value = false

    }



    // Travel Advance Feature Ends

    // dialog box varible
    const dialogInterestwithLoan = ref(false);


    // Loan With interest Feature Begins

    const isLoanWithInterestFeature = ref(1)

    const InterestWithLoanData = ref();

    const InterestWithLoan = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        required_amount: '',
        Term: '',
        Interest_rate: '',
        month_EMI: '0',
        EMI_Start_Month: '',
        EMI_END_Month: '',
        Total_Month: '',
        Reason: '',
        total_amount:'0' ,
        max_tenure_months: '',
        details: '',
        loan_type: 'InterestFreeLoan',
        loan_settings_id:''

    });

    const getLoanDetails = () => {
         axios.post('/show-eligible-interest-free-loan-details', {
            loan_type: "InterestWithLoan",
        }).then((res)=>{

            InterestWithLoan.details =res.data;
            InterestWithLoan.Interest_rate = res.data.loan_amt_interest;
            InterestWithLoan.minEligibile  = res.data.max_loan_amount;
            InterestWithLoan.loan_settings_id =res.data.loan_settings_id;
            InterestWithLoan.max_tenure_months = res.data.max_tenure_months;

        })
    }

    const fetchInterstWithLoan = () => {

        console.log(InterestWithLoan);

        canShowLoading.value = true;
        axios.post('/employee-loan-history', { loan_type: "InterestWithLoan" }).then(res => {
            InterestWithLoanData.value = res.data
            console.log(res.data);

        }).finally(() => {
            canShowLoading.value = false;
        })
    }


    const saveInterestWithLoan = () => {

        canShowLoading.value = true;

        axios.post('/apply-loan', InterestWithLoan).finally(() => {
            canShowLoading.value = false
            fetchInterstWithLoan();
        })

        dialogInterestwithLoan.value = false;
    }


    // Calculating Interest

    // function calculateLoanDetails(principal, rate, time) {
    //     console.log("Principal:" + principal);
    //     console.log("Rate:" + rate);
    //     console.log("Time:" + time);


    //     var monthlyInterestRate = rate / 12;
    //     var numberOfPayments = time * 12;

    //     var monthlyPayment = (principal * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));
    //     var totalLoanAmount = monthlyPayment * numberOfPayments;

    //     console.log("Monthly Pending:" + monthlyPayment);
    //     console.log("Total Loan Amount:" + totalLoanAmount);

    //     return {
    //         monthlyPayment: monthlyPayment,
    //         totalLoanAmount: totalLoanAmount
    //     };
    // }

    const calculateLoanDetails = (amount, interest_rate, months) => {

        const interest = amount * interest_rate / 100;

        console.log(interest);

        let finalAmount = amount + interest

        console.log(finalAmount);

        let payment = (finalAmount / months);

        console.log(payment);

        let loanDetails = {
            monthlyDue: (payment).toFixed(0),
            totalDue: finalAmount
        }

        InterestWithLoan.month_EMI = loanDetails.monthlyDue
        InterestWithLoan.total_amount = loanDetails.totalDue
    }

    // Example usage
    // var loanPrincipal = 5000;   The principal amount of the loan
    // var loanRate = 0.05;      The annual interest rate (5% in this case)
    // var j = 2;          The time period in years


    // Loan With interest Feature Ends




    return {

        // varaible Declarations

        canShowLoading,

        // SalaryAdvanceFeature

        dailogSalaryAdvance, salaryAdvanceEmployeeData, sa, fetchSalaryAdvance, saveSalaryAdvance,
        arraySalaryDetails,
        getSalaryDetails,


        // Interest Free Loan

        dialog_NewInterestFreeLoanRequest, isInterestFreeLoanFeature, interestFreeLoan, max_tenure_month, saveInterestfreeLoan, fetchInterestfreeLoan,
        getinterestfreeloan,

        // Travel Advance Feature

        isTravelAdvanceFeatureEnabled, eligibleTravelAdvanceEmployeeData, ta, dialog_TravelAdvance, saveTravelAdvance, fetchTraveladvance,


        // Loan With interest Feature
        isLoanWithInterestFeature, InterestWithLoan, dialogInterestwithLoan, saveInterestWithLoan, InterestWithLoanData, fetchInterstWithLoan,
        calculateLoanDetails, getLoanDetails


    };
});



