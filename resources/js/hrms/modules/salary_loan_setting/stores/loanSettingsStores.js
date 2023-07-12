import axios from "axios";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { reactive, ref } from "vue";


export const loanSettingsStore = defineStore("loanSettings", () => {

    const CreateLoanWithNewFrom = ref(1);

    return{

        CreateLoanWithNewFrom

    }

});
