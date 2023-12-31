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

    // Currently Active Tab

    const activeTab = ref(1);

    /*  Payroll Setup Structure

        1) general payroll Setup

        2)Pf & Esi Setting
            1)Employee provident fund - epf
            2)Employee state insurance -esi
            3)Aatmanirbhar Bharat Yojana(ABRY)Scheme - abry
            4)Pradhan Matri Rojgar Protsahan Yojana(PMRPY)Scheme - pmrpy


        3)Salary components
            1)Earnings
            2)Adhoc Components
            3)Reimbursement
            4)Accounting Code

        4)Salary structure - Paygroups

        5)finance Setting
        6)Statutory Filling

     */


    // General Payroll Settings

    const generalPayrollSettings = ref({})

    const getCurrentGeneralPayrollSettings = () => {

    }

    const saveGeneralPayrollSettings = (data) => {
          console.log(data);
          axios.post('/save-genral-payroll-settings',data)
    }


    // PF ESI Setting

    //  - Employee provident fund

    // Add new rule for Employee provident fund

    const addNewEpf = ref({})

    const saveNewEpf = (data) => {
        console.log(data);
        axios.post('/Paygroup/CreatePayrollEpf', data)
    }


    // Employee's State Insurance

    const addNewEsi = ref({})

    const saveNewEsi = (data) => {
        console.log(data);
        axios.post('/Paygroup/CreatePayrollEsi', data)

    }






    // Salary Components - Earnings

    const dailogNewSalaryComponents = ref(false);
    const salaryComponentsUpdated = ref(false)
    const adhocComponentsUpdated = ref(false)

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
        isConsiderForEPF: 0,
        isConsiderForESI: 0,
        category_id: 1,
    })

    const adhocComponents = ref({
        category_id: 3,
        category_type: 'allowance'
    })

    const deductionComponents = ref({
        category_id: 2,
        category_type: 'deduction'
    })

    const reimbursementComponents = ref({
        category_id: 4,
        category_type: 'reimbursement'
    })


    const salaryComponentsSource = ref()

    const getSalaryComponents = (async () => {
        canShowLoading.value = true
        let salaryComponentUrl = `/Paygroup/fetchPayRollComponents`
        await axios.get(salaryComponentUrl).then(res => {
            salaryComponentsSource.value = res.data
            console.log(helper.filterSource(res.data, 3));
        }).finally(() => {
            canShowLoading.value = false
        })
    })

    const saveNewSalaryComponent = (key) => {
        dailogNewSalaryComponents.value = false
        canShowLoading.value = true
        let adhocUrl = '/Paygroup/AddAdhocAllowDetectComp'
        let reimbursmenturl = '/Paygroup/AddReimbursementComponents'
        var form_data = new FormData();

        if (key == 1) {

            if (salaryComponentsUpdated.value) {
                axios.post('/Paygroup/UpdatePayRollEarningsComponents', salaryComponents)
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
        } else
            if (key == 3) {
                for (var key in adhocComponents.value) {
                    form_data.append(key, adhocComponents.value[key]);
                }
                if (adhocComponentsUpdated.value) {
                    axios.post('/Paygroup/UpdateAdhocAllowDetectComp', form_data)
                        .finally(() => {
                            restChars()
                            canShowLoading.value = false
                            getSalaryComponents()
                        })
                } else {
                    axios.post(adhocUrl, form_data)
                        .finally(() => {
                            restChars()
                            canShowLoading.value = false
                            getSalaryComponents()
                        })
                }

            } else
                if (key == 2) {
                    for (var key in deductionComponents.value) {
                        form_data.append(key, deductionComponents.value[key]);
                    }
                    if (adhocComponentsUpdated.value) {
                        axios.post('/Paygroup/UpdateAdhocAllowDetectComp', form_data)
                            .finally(() => {
                                restChars()
                                canShowLoading.value = false
                                getSalaryComponents()
                            })
                    } else {
                        axios.post(adhocUrl, form_data)
                            .finally(() => {
                                restChars()
                                canShowLoading.value = false
                                getSalaryComponents()
                            })
                    }
                } else
                    if (key == 4) {
                        for (var key in reimbursementComponents.value) {
                            form_data.append(key, reimbursementComponents.value[key]);
                        }
                        axios.post(reimbursmenturl, form_data)
                            .finally(() => {
                                restChars()
                                canShowLoading.value = false
                                getSalaryComponents()
                            })
                    }
                    else {
                        console.log("No More options");
                    }
        console.log(form_data);

    }

    const editNewSalaryComponent = (boolean, data) => {
        console.log(data);
        dailogNewSalaryComponents.value = true
        salaryComponentsUpdated.value = boolean
        salaryComponents.name = data.comp_name,
            salaryComponents.id = data.id,
            salaryComponents.typeOfComp = data.comp_type_id,
            salaryComponents.nameInPayslip = data.comp_name_payslip,
            salaryComponents.typeOfCalc = parseInt(data.calculation_method_id),
            salaryComponents.amount = data.flat_amount,
            salaryComponents.status = data.status,
            salaryComponents.isPartOfEmpSalStructure = data.is_part_of_empsal_structure,
            salaryComponents.isTaxable = data.is_taxable,
            salaryComponents.isCalcShowProBasis = data.calculate_on_prorate_basis,
            salaryComponents.isShowInPayslip = data.can_show_inpayslip,
            salaryComponents.isConsiderForEPF = data.epf,
            salaryComponents.isConsiderForESI = data.esi
    }

    const editAdhocSalaryComponents = (currentRowData, key, boolean) => {
        console.log(currentRowData);
        if (key == 2) {
            adhocComponentsUpdated.value = true
            let type = { category_type: 'deduction' }
            deductionComponents.value = { ...type, ...currentRowData }
        } else
            if (key == 3) {
                adhocComponentsUpdated.value = true
                let type = { category_type: 'allowance' }
                adhocComponents.value = { ...type, ...currentRowData }
            } else
                if (key == 4) {
                    adhocComponentsUpdated.value = true
                    reimbursementComponents.value = { ...currentRowData }
                } else {
                    console.log("No More options");
                }
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


    // Accounting Code

    const accountingCodeSource = ref()
    const accountingCode = ref({})

    const getAccountingSoftware = () => {
        let accountingSoftwareUrl = `/Paygroup/fetchPayrollAppIntegrations`
        axios.get(accountingSoftwareUrl).then(res => {
            accountingCodeSource.value = res.data.data
            console.log(res.data.data);
        })
    }

    const saveAccountingCode = (data) => {
        console.log(data);
        axios.post('/Paygroup/addPayrollAppIntegrations', data)
    }

    const enableAccountingSoftware = (data, checked) => {
        console.log(data, checked);
    }


    // Salary structure

    const dailogNewSalaryStructure = ref(false);

    const salaryStructure = reactive({
        structureName: null,
        description: null,
        pf: 0,
        esi: 0,
        tds: 0,
        fbp: 0,
        selectedComponents: null,
        assignedEmployees: null,
    })

    const salaryStructureSource = ref()
    const employeeSource = ref()

    const getsalaryStructure = (async () => {
        let salaryyStructureUrl = `/Paygroup/fetchPayGroupEmpComponents`
        await axios.get(salaryyStructureUrl).then(res => {
            salaryStructureSource.value = Object.values(res.data)
        })
    })

    const addsalaryComponents = (selectedData) => {
        console.log(selectedData);
        salaryStructureSource.value = selectedData;
    }

    const saveNewsalaryStructure = () => {
        console.log(salaryStructure);
        axios.post('/Paygroup/addPaygroupCompStructure', salaryStructure)

        // if (salaryComponentsUpdated.value) {
        //     axios.post('Paygroup/addPaygroupCompStructure', salaryComponents)
        // } else {
        //     axios.post('/Paygroup/addPaygroupCompStructure', salaryComponents)
        //         .finally(() => {
        //             restChars()
        //         })
        // }
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
        canShowLoading,activeTab,

        // General Payroll Settings

        generalPayrollSettings,getCurrentGeneralPayrollSettings,saveGeneralPayrollSettings,

        // Pf & ESI Setting - EPF

        addNewEpf, saveNewEpf,

        // Pf & ESI Setting - ESI

        addNewEsi, saveNewEsi,


        // Salary Components - Earnings
        dailogNewSalaryComponents, salaryComponents, salaryComponentsSource, getSalaryComponents, saveNewSalaryComponent, editNewSalaryComponent, deleteSalaryComponent,
        // Salary Components - Adhoc Components and Deduction and Reimbursement Components
        adhocComponents, deductionComponents, reimbursementComponents, editAdhocSalaryComponents,
        // Salary Components - Accounting Code
        getAccountingSoftware, saveAccountingCode, accountingCode, accountingCodeSource, enableAccountingSoftware,


        // Salary Structure - Paygroup
        dailogNewSalaryStructure, salaryStructure, salaryStructureSource, getsalaryStructure, saveNewsalaryStructure, addsalaryComponents,
    }

})
