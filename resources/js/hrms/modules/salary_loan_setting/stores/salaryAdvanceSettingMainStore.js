import axios from "axios";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { reactive, ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const salaryAdvanceSettingMainStore = defineStore("salaryAdvanceSettingMainStore", () => {

    /*

     Salary Advance - sa
     Loan with Interest - lwi
     Interest free Loan  - ifl
     Travel Advance - ta

    */


    //   Salary Advance Begins


    // Initially Disabled

    const isSalaryAdvanceFeatureEnabled = ref(1)
    const dropdownFilter = ref()
    const selectedFilterOptions = reactive({
        department_id: '',
        designation: '',
        work_location: '',
        state: '',
        client_name: '',
    })

    // Eligible Employees

    const eligbleEmployeeSource = ref()

    // Get filter 

    const getDropdownFilterDetails = async () => {
        let url = '/getAllDropdownFilter'
        await axios.get(url).then(res => {
            dropdownFilter.value = res.data
        })
    }

    const getSelectoption = (key, filter) => {
        console.log(filter);

        if (key == "department") {
            console.log(filter);
            selectedFilterOptions.department_id = filter
            console.log(selectedFilterOptions);
        } else
            if (key == "designation") {
                selectedFilterOptions.designation = filter
                console.log(selectedFilterOptions);
            } else
                if (key == "state") {
                    selectedFilterOptions.state = filter
                    console.log(selectedFilterOptions);
                } else
                    if (key == "work_location") {
                        selectedFilterOptions.work_location = filter
                        console.log(selectedFilterOptions);
                    } else
                        if (key == "client_name") {
                            selectedFilterOptions.client_name = filter
                            console.log(selectedFilterOptions);
                        }
                        else {
                            console.log("nope");
                        }
        let url = '/showAssignEmp'
        axios.post(url, selectedFilterOptions).then(res => {
            eligbleEmployeeSource.value = res.data
            console.log(res.data);
        })
    }

    const getElibigleEmployees = () => {

        let url = '/showAssignEmp'
        axios.post(url, selectedFilterOptions).then(res => {
            eligbleEmployeeSource.value = res.data
            console.log(res.data);
        })
    }

    const eligibleSalaryAdvanceEmployeeData = ref()

    // Percentage of Salary Advance
    // Deduction Method

    const sa = reactive({
        isSalaryAdvanceEnabled: 0,
        eligibleEmployee: '',
        perOfSalAdvance: '',
        cusPerOfSalAdvance: '',
        deductMethod: '',
        cusDeductMethod: ''
    })

    // Approval Flow

    const SalaryAdvanceFeatureApprovalFlow = ref({})


    const saveSalaryAdvanceFeature = () => {

        if (sa.perOfSalAdvance == 'custom') {
            sa.perOfSalAdvance = sa.cusPerOfSalAdvance
        } else {
            console.log("same of percent");
        }

        if (sa.deductMethod == 'afterPayroll') {
            sa.deductMethod = sa.cusDeductMethod
        } else {
            console.log("same of percent");
        }

        let url = '/saveSalaryAdvanceSetting'
        if (isSalaryAdvanceFeatureEnabled.value == '1') {
            console.log("salary Advance Disabled");

        } {
            console.log("salary Advance Enabled");
            sa.isSalaryAdvanceEnabled = 1
        }
        axios.post(url, sa)
        console.log(sa);
    }


    //   Salary Advance Ends


    // Interest Free Loan Feature Begins

    // Initially Disabled

    const isInterestFreeLoaneature = ref(1)

    // Eligible Employees and Amount
    // Deduction Method
    const ifl = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: ''

    })

    const saveInterestfreeLoan = () => {
        if (isInterestFreeLoaneature.value == '1') {
            console.log("disabled");
        } else {
            console.log(ifl);
        }

        let url = '/saveSalaryAdvanceSetting' 
        axios.post(url,ifl)
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

    const saveTravelAdvance  = () => {
        if (isTravelAdvanceFeatureEnabled.value == '1') {
            console.log("disabled");
        } else {
            console.log(ta);
        }

        let url = '/saveSalaryAdvanceSetting' 
        axios.post(url,ta)
    }


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

    const saveLoanWithInterest  = () => {
        if (isLoanWithInterestFeature.value == '1') {
            console.log("disabled");
        } else {
            console.log(ta);
        }

        let url = '/saveSalaryAdvanceSetting' 
        axios.post(url,lwif)
    }


    // Loan With interest Feature Ends



    const resetFilters = () => {
        selectedFilterOptions.client_name = ''
        selectedFilterOptions.department_id = ''
        selectedFilterOptions.designation = ''
        selectedFilterOptions.state = ''
        selectedFilterOptions.work_location = ''

        let url = '/showAssignEmp'
        axios.post(url, selectedFilterOptions).then(res => {
            eligbleEmployeeSource.value = res.data
            console.log(res.data);
        })

    }







    return {

        //
        dropdownFilter, getDropdownFilterDetails, getSelectoption, getElibigleEmployees, eligbleEmployeeSource, resetFilters,

        // SalaryAdvanceFeature

        isSalaryAdvanceFeatureEnabled, eligibleSalaryAdvanceEmployeeData, sa, SalaryAdvanceFeatureApprovalFlow, saveSalaryAdvanceFeature,

        // Interest Free Loan

        isInterestFreeLoaneature, ifl, saveInterestfreeLoan,

        // Travel Advance Feature 

        isTravelAdvanceFeatureEnabled, eligibleTravelAdvanceEmployeeData, ta,saveTravelAdvance,


        // Loan With interest Feature
        isLoanWithInterestFeature, lwif,saveLoanWithInterest







    };
});



