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
        { id: '1', name: 'earnings' },
        { id: '2', name: 'deduction' },
        { id: '3', name: 'adhoc' },
        { id: '4', name: 'reimbursement' },
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

    const findCalType = (value) => {
        let type = calculationTypes.value.find(ele => {
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

    const filterSource = (data, key) => {
        let filteredSource = data.filter(ele => {
            return ele.category_id == key
        })
        return filteredSource
    }

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
        let url = '/showAssignEmp'
        axios.post(url, selectedFilterOptions).then(res => {
            eligbleEmployeeSource.value = res.data
            console.log(res.data);
        })
    }

    return {
        componentTypes,
        calculationTypes,
        componentCategories,
        findCompType,
        findCalType,
        findIsSelected,
        filterSource,
        dropdownFilter,
        getDropdownFilterDetails,
        getSelectoption

    }
})

