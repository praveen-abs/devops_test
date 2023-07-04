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
            sa.repdate = res.data.Repayment_date
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

    const isInterestFreeLoaneature = ref();
    // const arrayInterestFreeLoan = ref();

    // Eligible Employees and Amount
    // Deduction Method

    const max_tenure_month  = ref();
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
        max_tenure_months:'',
        details :'',
        loan_type:'InterestFreeLoan',
        loan_setting_id: ''
    });



    function getinterestfreeloan() {

        axios.post('/show-eligible-interest-free-loan-details',{
            loan_type:"InterestFreeLoan"
        }).then((res)=>{
            console.log(res);
            interestFreeLoan.max_tenure_months = res.data.max_tenure_months;

            console.log( interestFreeLoan.max_tenure_months);
            interestFreeLoan.details = res.data ;
            interestFreeLoan.loan_setting_id = res.data.loan_setting_id;

            interestFreeLoan.minEligibile = res.data.max_loan_amount;

            console.log(res.data.max_tenure_months.month);
        })

        // let url = `/show-eligible-interest-free-loan-details`;
        // axios.get(url).then((res) => {
        //     console.log(res.data);
        //     interestFreeLoan.minEligibile = res.data;
        //     save_Start_Month.value = res.data.EMI_Start_Month;
        //     console.log(save_Start_Month);
        //     console.log(interestFreeLoan.minEligibile.ra);
        // });
    }
    // const selected_date =ref();
    const fetchInterestfreeLoan = () => {

        // canShowLoading.value = true

        console.log("fetching SA");

        axios.get('http://localhost:3000/Interst_free_loan').then(res => {

            isInterestFreeLoaneature.value = res.data
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
            // fetchInterestfreeLoan();
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
    const dialogInterestwithLoan = ref(true);


    // Loan With interest Feature Begins

    const isLoanWithInterestFeature = ref(1)

    const InterestWithLoanData = ref();

    const InterestWithLoan = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        ra: '',
        Term: '',
        Interest_rate: '2.5%',
        month_EMI: '0',
        EMI_Start_Month: '',
        EMI_END_Month: '',
        Total_Month: '',
        Reason: '',
    });

    const fetchInterstWithLoan = () => {

        console.log(InterestWithLoan);

        // canShowLoading.value = true;

        axios.get('http://localhost:3000/InterestWithLoan').then(res => {

            InterestWithLoanData.value = res.data
            console.log(res.data);

        }).finally(() => {
            canShowLoading.value = false
        })



    }

    const saveinterestWithLoan = () => {

        // canShowLoading.value = true;

        axios.post(' http://localhost:3000/InterestWithLoan', InterestWithLoan).finally(() => {
            canShowLoading.value = false

            fetchInterstWithLoan();

        })

        dialogInterestwithLoan.value = false;


    }


    // Loan With interest Feature Ends




    return {

        // varaible Declarations

        canShowLoading,

        // SalaryAdvanceFeature

        dailogSalaryAdvance, salaryAdvanceEmployeeData, sa, fetchSalaryAdvance, saveSalaryAdvance,
        arraySalaryDetails,
        getSalaryDetails,


        // Interest Free Loan

        dialog_NewInterestFreeLoanRequest, isInterestFreeLoaneature, interestFreeLoan,max_tenure_month, saveInterestfreeLoan, fetchInterestfreeLoan,
        getinterestfreeloan,

        // Travel Advance Feature

        isTravelAdvanceFeatureEnabled, eligibleTravelAdvanceEmployeeData, ta, dialog_TravelAdvance, saveTravelAdvance, fetchTraveladvance,


        // Loan With interest Feature
        isLoanWithInterestFeature, InterestWithLoan, dialogInterestwithLoan, saveinterestWithLoan, InterestWithLoanData, fetchInterstWithLoan,


    };
});



