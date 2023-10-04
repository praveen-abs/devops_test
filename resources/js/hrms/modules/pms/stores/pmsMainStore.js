import { defineStore } from "pinia";
import { computed, reactive, ref } from "vue";
import axios from "axios";
import { inject } from "vue";
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import * as XLSX from 'xlsx';
import { useRouter, useRoute } from "vue-router";
import dayjs from "dayjs";


export const usePmsMainStore = defineStore("usePmsMainStore", () => {

    // Global declaration
    const canShowLoading = ref(false)
    const pmsConfiguration = ref()
    const selfAppraisalDashboard = ref()
    const departmentOptions = ref()
    const existingKpiFormOptions = ref()
    const EmployeeOptions = ref()

    const getPmsConfiguration = async () => {
        await axios.get('/api/getPMSConfig').then(res => {
            pmsConfiguration.value = res.data
        })
    }

    const getSelfAppraisalDashboardDetails = async (author_id) => {
        await axios.get(`/api/selfDashboardDetails/${author_id}`).then(res => {
            pmsConfiguration.value = res.data.Configuration
            departmentOptions.value = res.data.Departments
            existingKpiFormOptions.value = res.data.ExistingKPIForms
            EmployeeOptions.value = res.data.Employees
        }).finally(()=>{
            if(pmsConfiguration.value){
                createNewGoals.value = {...pmsConfiguration.value}
            }
        })
    }

    const createNewGoals = ref({})
    const createKpiForm = ref({
        form_details: []
    })
    const addKra = ref({})

    const addFormDetails = (data) => {
        console.log(data);
        createKpiForm.value.form_details.push(data)
    }

    const saveKpiForm = () => {
        createKpiForm.value.user_id = 141
        axios.post('/api/saveKpiForm', createKpiForm.value)
    }

    const getKPIFormDetails = (form_id) =>{
        axios.get(`/api/getKPIFormDetails/${form_id}`).then(res=>{
            createKpiForm.value = {...res.data.data.form}
            createKpiForm.value.form_details = {...res.data.data.form_details}
        })
    }


    return {

        // Loading
        canShowLoading,

        // Pms Configuration

        pmsConfiguration, getPmsConfiguration,

        // General Variables

        departmentOptions,EmployeeOptions,existingKpiFormOptions,

        // Self Appraisal Dashboard Details

        getSelfAppraisalDashboardDetails,

        // KPI Form creation

        createKpiForm, addKra, addFormDetails, saveKpiForm,getKPIFormDetails,

        // New Goals Creation

        createNewGoals

    }
})
