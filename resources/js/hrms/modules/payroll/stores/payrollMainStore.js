import { defineStore } from 'pinia';
import axios from 'axios';
import { ref, reactive } from 'vue';
import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";

import { usePayrollHelper } from './payrollHelper';


export const usePayrollMainStore = defineStore('usePayrollMainStore', () => {

    //Global  variable Declaration

    const helper = usePayrollHelper()
    // Confirmation Service
    const confirm = useConfirm();

    // Notification Service
    const toast = useToast();

    // loading Spinner
    const canShowLoading = ref(false);

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

    const dailogNewSalaryComponents = ref(false);
    const salaryComponentsUpdated = ref(false)

    const salaryComponents = reactive({
        typeOfComp: null,
        id: null,
        name: null,
        nameInPayslip: null,
        typeOfCalc: null,
        amount: null,
        percentage: null,
        status: null,
        isPartOfEmpSalStructure: 0,
        isTaxable: 0,
        isCalcShowProBasis: 0,
        isShowInPayslip: 0,
        isConsiderForEPF: null,
        isConsiderForESI: null,
    })

    const salaryComponentsSource = ref()

    const getSalaryComponents = (async () => {
        canShowLoading.value = true
        let salaryComponentUrl = `/Paygroup/fetchPayRollComponents`
        await axios.get(salaryComponentUrl).then(res => {
            salaryComponentsSource.value = res.data
            console.log(helper.filterSource(res.data,3));
        }).finally(() => {
            canShowLoading.value = false
        })
    })

    const saveNewSalaryComponent = () => {
        dailogNewSalaryComponents.value = false
        canShowLoading.value = true
        if (salaryComponentsUpdated.value) {
            axios.post('/Paygroup/UpdatePayRollComponents', salaryComponents)
            .finally(() => {
                restChars()
                canShowLoading.value = false
                getSalaryComponents()
            })
        } else {
            axios.post('/Paygroup/CreatePayRollComponents', salaryComponents)
                .finally(() => {
                    restChars()
                    canShowLoading.value = false
                    getSalaryComponents()
                })
        }
    }

    const editNewSalaryComponent = (boolean, data) => {
        dailogNewSalaryComponents.value = true
        salaryComponentsUpdated.value = boolean
        salaryComponents.name = data.comp_name,
            salaryComponents.id = data.id,
            salaryComponents.typeOfComp = data.comp_type_id,
            salaryComponents.nameInPayslip = data.comp_name_payslip,
            salaryComponents.typeOfCalc = data.calculation_method,
            salaryComponents.amount = null,
            salaryComponents.status = data.status,
            salaryComponents.isPartOfEmpSalStructure = data.is_part_of_empsal_structure,
            salaryComponents.isTaxable = data.is_taxable,
            salaryComponents.isCalcShowProBasis = data.calculate_on_prorate_basis,
            salaryComponents.isShowInPayslip = data.can_show_inpayslip,
            salaryComponents.isConsiderForEPF = data.epf,
            salaryComponents.isConsiderForESI = data.esi
    }

    const deleteSalaryComponent = (recordID) => {
        confirm.require({
            message: "Do you want to delete this record?",
            header: "Delete Confirmation",
            icon: "pi pi-info-circle",
            acceptClass: "p-button-danger",
            accept: () => {
                canShowLoading.value = true;
                axios.post('/Paygroup/DeletePayRollComponents', {
                    comp_id: recordID
                })
                    .finally(() => {
                        toast.add({
                            severity: "error",
                            summary: "Deleted",
                            detail: "Salary Component Deleted",
                            life: 3000,
                        });
                        canShowLoading.value = false
                        getSalaryComponents()
                    });
            },
            reject: () => { },
        });
    }


    // Salary structure

    const dailogNewSalaryStructure = ref(false);

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

    const addsalaryComponents = (selectedData) =>{
        console.log(selectedData);
        salaryStructureSource.value = selectedData;
    }

    const saveNewsalaryStructure = () => {
        console.log(salaryStructure);
        if (salaryComponentsUpdated.value) {
            axios.post('/Paygroup/UpdatePayRollComponents', salaryComponents)
        } else {
            axios.post('/Paygroup/CreatePayRollComponents', salaryComponents)
                .finally(() => {
                    restChars()
                })
        }
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
        // Varaible Declaration
        canShowLoading,
        // Salary Components - Earnings
        dailogNewSalaryComponents, salaryComponents, salaryComponentsSource, getSalaryComponents, saveNewSalaryComponent, editNewSalaryComponent, deleteSalaryComponent,

        // Salary Structure - Paygroup
        dailogNewSalaryStructure,salaryStructure, salaryStructureSource, getsalaryStructure, saveNewsalaryStructure,addsalaryComponents,
    }

})    