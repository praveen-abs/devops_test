import { defineStore } from "pinia";
import { ref, reactive ,watch } from "vue";
import axios from "axios";
import {Service} from '../../Service/Service';

export const useMobileSettingsStore = defineStore("MobileSettingsStore", () => {


    const employeeAssignDialog = ref(false);

    const arrayMobileSetDetails = ref();

    const client_id = ref();

    const currentlySelectedClient = ref();

    const canshowloading = ref(false);

 async function getMobileSettings(client_id){
    canshowloading.value = true;
    console.log("testings ",client_id);
        await axios.post('/fetchMoileModuleData',{
            client_id:client_id
        }).then((res)=>{
            console.log(res.data);
            // if(res.data.data[1]){
                arrayMobileSetDetails.value =res.data.data;
                console.log( "mobile settings",arrayMobileSetDetails.value );
            // }
        }).finally(()=>{
            canshowloading.value = false;
        })
    }

    const getSessionClient = () => {
        axios.get('session-sessionselectedclient').then(res => {
            console.log(res.data);
            currentlySelectedClient.value = res.data;
            if(res.data.id){
                getMobileSettings(res.data.id);
            }
        })
    }

    const saveEnableDisableSetting = async(id,status)=>{
        // /SaveAppConfigStatus
        // let ID = id;
        // let Status =status;
        await axios.post('/SaveAppConfigStatus',{
            module_id:id,
            status:status
        }).then((res)=>{
            getMobileSettings();
        }).finally(()=>{
            getSessionClient();
          
        })
       
    }

    const SaveEmployeeAppConfigStatus =()=>{
        
        axios.post('/SaveEmployeeAppConfigStatus',{
            app_sub_modules_link_id:app_sub_modules_link_id,
            selected_employees_user_code:selected_employees_user_code
        }).then(()=>{

        }).finally(()=>{

        })

    }



    return {
        employeeAssignDialog,
        arrayMobileSetDetails,
        getSessionClient,
        saveEnableDisableSetting,
        canshowloading,

        // function 
        SaveEmployeeAppConfigStatus,

        getMobileSettings
    };
});
