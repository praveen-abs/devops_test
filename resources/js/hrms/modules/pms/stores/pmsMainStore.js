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

    const getPmsConfiguration = async () => {
        await axios.get('/api/getPMSConfig').then(res => {
            pmsConfiguration.value = res.data
        })
    }


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
         axios.post('/api/saveKpiForm',createKpiForm.value)
    }


    return {

        // Loading
        canShowLoading,

        // Pms Configuration

        pmsConfiguration, getPmsConfiguration,

        // KPI Form creation

        createKpiForm, addKra, addFormDetails,saveKpiForm

    }
})
