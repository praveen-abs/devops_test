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
Interest free Loan  - ifl
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
    const save_Start_Month = ref([]);
    const ifl = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        Ra: '',
        M_EMI: '',
        Term: '',
        EMI_Start_Month: '',
        EMI_End_Month: '',
        Total_Months: '',
        Reason: '',

    });



    function getinterestfreeloan() {

        axios.post('/show-eligible-interest-free-loan-details',{
            loan_type:"InterestFreeLoan"
        }).then((res)=>{
        })

        let url = `/show-eligible-interest-free-loan-details`;
        axios.get(url).then((res) => {
            console.log(res.data);
            ifl.minEligibile = res.data;
            save_Start_Month.value = res.data.EMI_Start_Month;
            console.log(save_Start_Month);
            console.log(ifl.minEligibile.ra);
        });


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


        // canShowLoading.value = true
        console.log("Saving SA");

        axios.post('http://localhost:3000/Interst_free_loan', ifl).finally(() => {
            canShowLoading.value = false

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
    const dialogInterestwithLoan = ref(true);


    // Loan With interest Feature Begins

    const isLoanWithInterestFeature = ref(1)

    const InterestWithLoanData = ref();

    const lwif = reactive({
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

        console.log(lwif);

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

        axios.post(' http://localhost:3000/InterestWithLoan', lwif).finally(() => {
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

        dialog_NewInterestFreeLoanRequest, isInterestFreeLoaneature, ifl, save_Start_Month, saveInterestfreeLoan, fetchInterestfreeLoan,
        getinterestfreeloan,

        // Travel Advance Feature

        isTravelAdvanceFeatureEnabled, eligibleTravelAdvanceEmployeeData, ta, dialog_TravelAdvance, saveTravelAdvance, fetchTraveladvance,


        // Loan With interest Feature
        isLoanWithInterestFeature, lwif, dialogInterestwithLoan, saveinterestWithLoan, InterestWithLoanData, fetchInterstWithLoan,


    };
});



