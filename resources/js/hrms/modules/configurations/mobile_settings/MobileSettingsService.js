import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";
import {Service} from '../../Service/Service';

export const useMobileSettingsStore = defineStore("useMobileSettingsStore", () => {


    const employeeAssignDialog = ref(false)




    return {
        employeeAssignDialog
    };
});
