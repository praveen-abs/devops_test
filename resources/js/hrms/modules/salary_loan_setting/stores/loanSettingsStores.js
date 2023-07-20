import axios from "axios";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { reactive, ref } from "vue";


export const loanSettingsStore = defineStore("loanSettings", () => {

    const CreateLoanWithNewFrom = ref(1);

    function viewHistory(data){

    }
    //

    async function SendEnableAndDisable(Status){
        let status = Status;
        await axios.post('',{
            Status : status
        }).then(()=>{
        })


    }


    return{

        CreateLoanWithNewFrom,
        viewHistory,
        SendEnableAndDisable
    }

});
