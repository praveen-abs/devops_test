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

    // Eligible Employees

    const eligibleEmployeeData = ref()

    // Percentage of Salary Advance
    // Deduction Method

    const sa = reactive({
        perOfSalAdvance:'',
        cusPerOfSalAdvance:'',
        deductMethod:'',
        cusDeductMethod:''
    })

    // Approval Flow

    const SalaryAdvanceFeatureApprovalFlow = ref({})


    const saveSalaryAdvanceFeature = () =>{
        if(isSalaryAdvanceFeatureEnabled.value == '1'){
            console.log("salary Advance Disabled");
        }{
            console.log("salary Advance Enabled");
        }
        console.log(sa);
    }


    //   Salary Advance Ends




    return {

    // SalaryAdvanceFeature

    isSalaryAdvanceFeatureEnabled,eligibleEmployeeData,sa,SalaryAdvanceFeatureApprovalFlow,saveSalaryAdvanceFeature





    };
});



