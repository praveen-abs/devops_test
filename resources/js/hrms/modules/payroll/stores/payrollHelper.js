import { defineStore } from 'pinia';
import { ref, reactive } from 'vue';


export const usePayrollHelper = defineStore('usePayrollHelper', () => {

    /*
    1)Helper class contains Dropdown source 
    2)Basic Dependent Function 
    3)Filter functions
    4)Simple Calculation

    *Only Access for Payroll Module 
    */

    const componentTypes = ref([
        { id: 1, name: "Fixed", value: 1 },
        { id: 2, name: "Variable", value: 2 },
    ])
    const componentCategories = ref([
        { id:'1',name:'earnings'},
        { id:'2',name:'deduction'},
        { id:'3',name:'adhoc'},
        { id:'4',name:'reimbursement'},
    ])
    const calculationTypes = ref([
        { id: 1, name: "Flat Amount", value: 1 },
        { id: 2, name: "Percentage of CTC", value: 2 },
    ])
    
    const findCompType = (value) => {
        let type = componentTypes.value.find(ele => {
            return ele.value == value
        })
        return type.name
    }
    
    const findIsSelected = (value) => {
        if (value == 1) {
            return "Yes"
        } else {
            return "No"
        }
    }

    const filterSource = (data,key) =>{
        let filteredSource = data.filter(ele =>{
            return ele.category_id == key
        })
        return filteredSource
    }

    return {
        componentTypes,
        calculationTypes,
        componentCategories,
        findCompType,
        findIsSelected,
        filterSource

    }
})

