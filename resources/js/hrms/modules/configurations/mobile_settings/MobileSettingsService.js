import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";
import {Service} from '../../Service/Service';

export const useMobileSettingsStore = defineStore("useMobileSettingsStore", () => {


    const employeeAssignDialog = ref(false);

    const MobileSettingsDetails =ref();

 async function getMobileSettings(){
        await axios.get('/fetchMoileModuleData').then((res)=>{
            MobileSettingsDetails.value =res.data.data;
        }).finally(()=>{
          console.log(MobileSettingsDetails.value );
        })
    }



    return {
        employeeAssignDialog,
        MobileSettingsDetails,

        // function 

        getMobileSettings
    };
});
