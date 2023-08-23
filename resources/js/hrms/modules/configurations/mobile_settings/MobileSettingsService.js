import { defineStore } from "pinia";
import { ref, reactive ,watch } from "vue";
import axios from "axios";
import {Service} from '../../Service/Service';

export const useMobileSettingsStore = defineStore("MobileSettingsStore", () => {


    const employeeAssignDialog = ref(false);

    const arrayMobileSetDetails = ref();

    const client_details = ref();

    const currentlySelectedClient = ref();

    const canshowloading = ref(false);

    async function getMobileSettings(){
        canshowloading.value = true;
        console.log("testings ",client_details.value.id);
            await axios.post('/fetchMobileModuleData',{
                client_id:client_details.value.id
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

     const getSessionClient = async () => {
        await axios.get('session-sessionselectedclient').then(res => {
            console.log(res.data);
            currentlySelectedClient.value = res.data;
            if(res.data.id){
                client_details.value = res.data; //Store the client id here for future use
                // getMobileSettings(client_id.value);
            }
        })
    }

    const saveEnableDisableSetting = async(id,status)=>{
        // /SaveAppConfigStatus
        // let ID = id;
        // let Status =status;
        await axios.post('/saveAppConfigStatus',{
            module_id:id,
            status:status
        }).then((res)=>{
            getMobileSettings(client_details.value.id);
        }).finally(()=>{

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
        client_details,

        // function
        SaveEmployeeAppConfigStatus,

        getMobileSettings
    };
});
