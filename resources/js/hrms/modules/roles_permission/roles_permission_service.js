import { defineStore } from 'pinia';
import axios from 'axios';
import { ref , reactive } from 'vue';


export const UseRolePermissionServie = defineStore('RolePermissionServie',()=>{

    // Variable Declarations
    const loading = ref(false);
    const array_RolePermission_data = ref();

    const dialog_CreatingNewJobRole = reactive({
        Role_Title:"",
        Role_Description:"",
        Assets_privileges:[],
    })


    // Events


    async function CreateRolePermission(){

        axios.post(' http://localhost:3000/Creating_New_Job_role',{}).then(()=>{

        }).finally(()=>{

        })

    }

    async function fetchRolePermission(){
        axios.get({}).then(()=>{

        }).finally(()=>{

        });

    }




    return{

        // variable
        loading,array_RolePermission_data,

        // function
        CreateRolePermission,fetchRolePermission

    }
})

