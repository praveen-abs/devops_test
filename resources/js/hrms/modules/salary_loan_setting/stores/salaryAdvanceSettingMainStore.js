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

    // Loading Service

    const canShowLoading = ref(false)


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
    const approvalFormat = reactive([])


    // Eligible Employees

    const eligbleEmployeeSource = ref()

    // Get filter

    const getDropdownFilterDetails = async () => {
        // canShowLoading.value = true
        let url = '/getAllDropdownFilter'
        await axios.get(url).then(res => {
            dropdownFilter.value = res.data
        }).finally(() => {
            // canShowLoading.value = false
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
       getElibigleEmployees()
    }

    const getElibigleEmployees = () => {
        canShowLoading.value = true
        let url = '/showAssignEmp'
        axios.post(url, selectedFilterOptions).then(res => {
            eligbleEmployeeSource.value = res.data
            console.log(res.data);
        }).finally(()=>{
            canShowLoading.value = false
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
        cusDeductMethod: '',
        approvalflow: approvalFormat
    })

    // Approval Flow

    const SalaryAdvanceFeatureApprovalFlow = ref({})


    const saveSalaryAdvanceFeature = () => {
        canShowLoading.value = true
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
        axios.post(url, sa).finally(() => {
            canShowLoading.value = false
            approvalFormat.splice(0, approvalFormat.length)
        })
        console.log(sa);
    }


    //   Salary Advance Ends


    // Interest Free Loan Feature Begins

    // Initially Disabled

    const isInterestFreeLoaneature = ref(1)

    // Eligible Employees and Amount
    // Deduction Method
    const ifl = reactive({
        isInterestFreeLoanIsEnabled: 0,
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        approvalflow: approvalFormat

    })

    const saveInterestfreeLoan = () => {
        canShowLoading.value = true
        if (ifl.deductMethod == 'emi') {
            ifl.deductMethod = ifl.cusDeductMethod
        } else {
            console.log("same of percent");
        }
        if (isInterestFreeLoaneature.value == '1') {
            console.log("disabled");
        } else {
            console.log(ifl);
            ifl.isInterestFreeLoanIsEnabled = 1
        }

        let url = '/save-interset-free-loan-settings'
        axios.post(url, ifl).finally(() => {
            canShowLoading.value = false
            approvalFormat.splice(0, approvalFormat.length)
        })
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
        isDeductedInsubsequentpayroll: '',
        claimBill: '',
        approvalflow: approvalFormat
    })

    const saveTravelAdvance = () => {
        canShowLoading.value = true
        if (isTravelAdvanceFeatureEnabled.value == '1') {
            console.log("disabled");
        } else {
            console.log(ta);
        }

        let url = '/saveTravelAdvanceSettings'
        axios.post(url, ta).finally(() => {
            canShowLoading.value = false
            approvalFormat.splice(0, approvalFormat.length)
        })
    }


    // Travel Advance Feature Ends


    // Loan With interest Feature Begins

    const isLoanWithInterestFeature = ref(1)

    const lwif = reactive({
        minEligibile: '',
        availPerInCtc: '',
        deductMethod: '',
        cusDeductMethod: '',
        maxTenure: '',
        approvalflow: approvalFormat

    })

    const saveLoanWithInterest = () => {
        canShowLoading.value = true
        if (isLoanWithInterestFeature.value == '1') {
            console.log("disabled");
        } else {
            console.log(ta);
        }

        let url = '/saveLoanWithIntrest'
        axios.post(url, lwif).finally(() => {
            canShowLoading.value = false
            approvalFormat.splice(0, approvalFormat.length)
        })
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

    const selectedOption1 = ref();
    const selectedOption2 = ref();
    const selectedOption3 = ref();


    const toSelectoption = (flow, value) => {
        console.log(value);
        if (flow == 1) {
            option.value = 1
            selectedOption1.value = value.name
            let approvalflow = {
                approver: value.name,
                order: flow
            }
            approvalFormat.push(approvalflow)
        }
        if (flow == 2) {
            selectedOption2.value = value.name
            let approvalflow = {
                approver: value.name,
                order: flow
            }
            approvalFormat.push(approvalflow)

        }
        if (flow == 3) {
            selectedOption3.value = value.name
            let approvalflow = {
                approver: value.name,
                order: flow
            }
            approvalFormat.push(approvalflow)
        } else {
            console.log("No More Options");
        }
        if (flow == 4) {
            console.log(value);
            var itemsWithoutCurrent = dropdownlist.value.filter(function (x) { return x.name == value; });
            console.log(itemsWithoutCurrent);
            let removedOption = { name: itemsWithoutCurrent[0].name, val: itemsWithoutCurrent[0].val };
            console.log(removedOption);
            filteredApprovalFlow.value.push(removedOption)
            selectedOption1.value = ''
            approvalFormat.pop()

        }
        if (flow == 5) {
            console.log(value);
            var itemsWithoutCurrent = dropdownlist.value.filter(function (x) { return x.name == value; });
            console.log(itemsWithoutCurrent);
            let removedOption = { name: itemsWithoutCurrent[0].name, val: itemsWithoutCurrent[0].val };
            console.log(removedOption);
            filteredApprovalFlow.value.push(removedOption)
            selectedOption2.value = ''
            approvalFormat.pop()

        }

        if (flow == 6) {
            console.log(value);
            var itemsWithoutCurrent = dropdownlist.value.filter(function (x) { return x.name == value; });
            console.log(itemsWithoutCurrent);
            let removedOption = { name: itemsWithoutCurrent[0].name, val: itemsWithoutCurrent[0].val };
            console.log(removedOption);
            filteredApprovalFlow.value.push(removedOption)
            selectedOption3.value = ''
            approvalFormat.pop()

        }

        var itemsWithoutCurrent = filteredApprovalFlow.value.filter(function (x) { return x.val !== value.val; });
        filteredApprovalFlow.value = itemsWithoutCurrent

    }



    const dropdownlist = ref([
        { name: "Line Manager", val: 1 },
        { name: "HR", val: 2 },
        { name: "Finance Admin", val: 3 }
    ])

    const filteredApprovalFlow = ref([
        { name: "Line Manager", val: 1 },
        { name: "HR", val: 2 },
        { name: "Finance Admin", val: 3 }
    ])



    const option = ref(0)
    const option1 = ref(0)
    const option2 = ref(0)







    return {

        //
        dropdownFilter, getDropdownFilterDetails, getSelectoption, getElibigleEmployees, eligbleEmployeeSource, resetFilters, canShowLoading,

        // Approver Flow

        approvalFormat, selectedOption1, selectedOption2, selectedOption3, option, option1, option2, dropdownlist, filteredApprovalFlow, toSelectoption,

        // SalaryAdvanceFeature

        isSalaryAdvanceFeatureEnabled, eligibleSalaryAdvanceEmployeeData, sa, SalaryAdvanceFeatureApprovalFlow, saveSalaryAdvanceFeature,

        // Interest Free Loan

        isInterestFreeLoaneature, ifl, saveInterestfreeLoan,

        // Travel Advance Feature

        isTravelAdvanceFeatureEnabled, eligibleTravelAdvanceEmployeeData, ta, saveTravelAdvance,


        // Loan With interest Feature
        isLoanWithInterestFeature, lwif, saveLoanWithInterest







    };
});



