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
        department_id:'',
        designation:'',
        work_location:'',
        state:'',
        client_name:'',
    })

    // Eligible Employees

    // Get filter 

    const getDropdownFilterDetails = async() =>{
        let url = '/getAllDropdownFilter'
        await axios.get(url).then(res=>{
            dropdownFilter.value = res.data
        })
    }

    const getSelectoption = (key,filter) =>{
        console.log(filter);
    
        if(key == "department"){
            console.log(filter);
            selectedFilterOptions.department_id = filter
            console.log(selectedFilterOptions);
        }else
        if(key == "designation"){
            selectedFilterOptions.designation = filter
            console.log(selectedFilterOptions);
        }else
        if(key == "state"){
            selectedFilterOptions.state = filter
            console.log(selectedFilterOptions);
        }else
        if(key == "work_location"){
            selectedFilterOptions.work_location = filter
            console.log(selectedFilterOptions);
        }else
        if(key == "client_name"){
            selectedFilterOptions.client_name = filter
            console.log(selectedFilterOptions);
        }
        else{
            console.log("nope");
        }
    }

    const getElibigleEmployees = () =>{

        let url = ''
        axios.post(url,selectedFilterOptions).then(res=>{
            console.log(res.data);
        })
    }

    const eligibleSalaryAdvanceEmployeeData = ref()

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


    // Interest Free Loan Feature Begins

    // Initially Disabled

    const isInterestFreeLoaneature = ref(1)

    // Eligible Employees and Amount
    // Deduction Method
    const ifl = reactive({
        minEligibile:'',
        availPerInCtc:'',
        deductMethod:'',
        cusDeductMethod:'',
        maxTenure:''

    })

    const saveInterestfreeLoan = () =>{
        if(isInterestFreeLoaneature.value == '1'){
             console.log("disabled");
        }else{
            console.log(ifl);
        }
        
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
        tdl:'',
        deductMethod:'',
        sumbitWithIn:'',
        isDeductedInsubsequentpayroll:''
    })


    // Travel Advance Feature Ends


    // Loan With interest Feature Begins

    const isLoanWithInterestFeature = ref(1)

    const lwif = reactive({
        minEligibile:'',
        availPerInCtc:'',
        deductMethod:'',
        cusDeductMethod:'',
        maxTenure:''

    })


    // Loan With interest Feature Ends










    return {

        //
    dropdownFilter, getDropdownFilterDetails,getSelectoption,

    // SalaryAdvanceFeature

    isSalaryAdvanceFeatureEnabled,eligibleSalaryAdvanceEmployeeData,sa,SalaryAdvanceFeatureApprovalFlow,saveSalaryAdvanceFeature,

    // Interest Free Loan

    isInterestFreeLoaneature,ifl,saveInterestfreeLoan,

    // Travel Advance Feature 

    isTravelAdvanceFeatureEnabled,eligibleTravelAdvanceEmployeeData,ta,
    

    // Loan With interest Feature
    isLoanWithInterestFeature,lwif







    };
});



