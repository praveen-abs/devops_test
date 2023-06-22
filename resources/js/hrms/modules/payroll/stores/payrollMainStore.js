import { defineStore } from 'pinia';
import axios from 'axios';
import { ref, reactive } from 'vue';


export const usePayrollMainStore = defineStore('usePayrollMainStore', () => {

    //Global  variable Declaration

    /*  Payroll Setup Structure
        
        1) general payroll Setup

        2)Pf & Esi Setting
        
        3)Salary components
            1)Earnings
            2)Adhoc Components
            3)Reimbursement
            4)Accounting Code
            
        4)Salary structure - Paygroups

        5)finance Setting
        6)Statutory Filling

     */


    // Salary Components - Earnings

    const salaryComponents = reactive({
        typeOfComp: null,
        name: null,
        nameInPayslip: null,
        typeOfCalc: null,
        amount: null,
        status: null,
        isPartOfEmpSalStructure: null,
        isTaxable: null,
        isCalcShowProBasis: null,
        isShowInPayslip: null,
        isConsiderForEPF: null,
        isConsiderForESI: null,
    })

    const salaryComponentsSource = ref()

    const getSalaryComponents = (async () => {
        let salaryComponentUrl = `/Paygroup/fetchPayRollComponents`
        await axios.get(salaryComponentUrl).then(res => {
            salaryComponentsSource.value = res.data
        })
    })

    const saveNewSalaryComponent = () => {
        console.log(salaryComponents);
        axios.post('/Paygroup/CreatePayRollComponents', salaryComponents)
            .finally(() => {
                restChars()
            })
    }


    // Salary structure

    const salaryStructure = reactive({
        structureName: null,
        description: null,
        pf: null,
        esi: null,
        tds: null,
        fbp: null,
        selectedComponents: null,
        assignedEmployees: null,
    })

    const salaryStructureSource = ref()

    const getsalaryStructure = (async () => {
        let salaryyStructureUrl = `/Paygroup/fetchPayRollComponents`
        await axios.get(salaryyStructureUrl).then(res => {
            salaryComponentsSource.value = res.data
        })
    })

    const saveNewsalaryStructure = () => {
        console.log(salaryStructure);
        axios.post('/Paygroup/CreatePayRollComponents', salaryComponents)
            .finally(() => {
                restChars()
            })
    }


    const restChars = () => {
        salaryComponents.typeOfComp = null,
            salaryComponents.name = null,
            salaryComponents.nameInPayslip = null,
            salaryComponents.typeOfCalc = null,
            salaryComponents.amount = null,
            salaryComponents.status = null,
            salaryComponents.isPartOfEmpSalStructure = null,
            salaryComponents.isTaxable = null,
            salaryComponents.isCalcShowProBasis = null,
            salaryComponents.isShowInPayslip = null,
            salaryComponents.isConsiderForEPF = null,
            salaryComponents.isConsiderForESI = null
    }
    return {

        // Salary Components - Earnings
        salaryComponents, salaryComponentsSource, getSalaryComponents, saveNewSalaryComponent,

        // Salary Structure - Paygroup
        salaryStructure, salaryStructureSource, getsalaryStructure, saveNewsalaryStructure,
    }

})    