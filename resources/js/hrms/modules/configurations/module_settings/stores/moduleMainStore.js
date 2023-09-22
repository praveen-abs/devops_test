import { defineStore } from "pinia";
import { ref, reactive ,watch } from "vue";
import axios from "axios";

export const useModuleSettingsStore = defineStore("useModuleSettingsStore", () => {


    const employeeAssignDialog = ref(false);

    const arrayModuleSettingsDetails = ref();

    const client_details = ref();

    const currentlySelectedClient = ref();

    const canshowloading = ref(false);

    async function getModuleSettings(){
        canshowloading.value = true;

            await axios.get('/getClient_AllModulePermissionDetails').then((res)=>{
                console.log(res.data);
                // if(res.data.data[1]){
                    arrayModuleSettingsDetails.value =res.data.data;
                    console.log( "mobile settings",arrayModuleSettingsDetails.value );
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

    const saveEnableDisableSetting = async(item,status)=>{


        canshowloading.value = true;

        await axios.post('/updateClientModuleStatus',{
            module_id:item.id,
            status:status
        }).then((res)=>{

            console.log("Status received : "+res.data.status);

            if(res.data.status == "success")
            {
                item.status = status; //Toggle the button
            }

        }).finally(()=>{
            canshowloading.value = false;

        })

    }

    const updateEmployeesPermissionStatus =()=>{

        axios.post('/updateEmployeesPermissionStatus',{
            app_sub_modules_link_id:app_sub_modules_link_id,
            selected_employees_user_code:selected_employees_user_code
        }).then(()=>{

        }).finally(()=>{

        })

    }



    return {
        employeeAssignDialog,
        arrayModuleSettingsDetails,
        getSessionClient,
        saveEnableDisableSetting,
        canshowloading,
        client_details,

        // function
        updateEmployeesPermissionStatus,

        getModuleSettings
    };
});
