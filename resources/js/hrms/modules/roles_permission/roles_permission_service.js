import { defineStore } from 'pinia';
import axios from 'axios';
import { ref , reactive } from 'vue';


export const UseRolePermissionServie = defineStore('RolePermissionServie',()=>{

    // Variable Declarations
    const array_RolePermission_data = ref();

const allpermission = ref();

    const getAllPermissions = () => {

        axios.get('/getAllPermissions').then(res => {
            allpermission.value = res.data;
            console.log(allpermission);
        });

    };


    return{

        // variable Declaration
        getAllPermissions,


        // function
        allpermission,


    }
})

