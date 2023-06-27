import { defineStore } from 'pinia';
import axios from 'axios';
import { ref , reactive } from 'vue';


export const UseRolePermissionStore = defineStore('UseRolePermissionStore',()=>{

    // variables
    const rolesPermission = ref(1);
    // const
    const arrayRoleDetails = ref();
    const LoadingScreenStatus = ref();

    async function getRoleDetails(){

        axios.get('/getRoleDetails').then((res)=>{
            arrayRoleDetails.value = res.data;
            console.log(arrayRoleDetails.value);
        })
    }

    async function removeRoleDetails (roles_name,user_id){
    console.log(roles_name,user_id);
    let url = '/removeRoleToUsers';
        await axios.post(url,{
            roles_name:roles_name,
            user_id:user_id
        }).then((res)=>{})
    }
    // Events



    return{
        rolesPermission,
        arrayRoleDetails,

        // function
        getRoleDetails,
        removeRoleDetails

    }
})
