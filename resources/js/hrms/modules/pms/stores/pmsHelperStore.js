import { defineStore } from "pinia";
import { computed, reactive, ref } from "vue";
import axios from "axios";
import { inject } from "vue";
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import * as XLSX from 'xlsx';
import { useRouter, useRoute } from "vue-router";
import dayjs from "dayjs";


export const usePmsHelperStore = defineStore("usePmsHelperStore", () => {

    // Global declaration

    const KpiForms = ref()
    const ManagerList = ref()

    const getKpiAsDropdown = async (user_id) => {
        await axios.get(`/api/getKpiFormAsDropdown/${141}`).then(res=>{
             KpiForms.value = res.data
        })
    }
    const getManagerList = async (user_id) => {
        await axios.get(`/api/getManagersListForEmployees/${141}`).then(res=>{
            ManagerList.value = res.data
        })
    }



    return {
        KpiForms,getKpiAsDropdown,
        ManagerList,getManagerList

    }
})
