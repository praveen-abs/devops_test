import axios from "axios";
import {
    defineStore
} from "pinia";
import { ref } from "vue";

export const  employeeService = defineStore("employeeService", () => {

    const employeeDetails  = ref([])

    const loading = ref(true)

    let uid = '174';

     axios.get('/profile-pages-getEmpDetails?uid='+uid).then(res =>{
        console.log(res.data);
        employeeDetails.value = res.data
        loading.value = false
    }).catch(e => console.log(e)).finally(()=>console.log("completed"))


    return {

        // varaible Declarations

        employeeDetails,loading

    };
});



