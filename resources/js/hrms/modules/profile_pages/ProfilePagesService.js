import axios from "axios";
import {
    defineStore
} from "pinia";
import { ref } from "vue";

export const employeeService = defineStore("Service", () => {

    alert("service ")

    const employeeDetails  = ref()

    axios.get('http://localhost:8000/api/profile-pages-getEmpDetails?user_id=174').then(res =>{
        console.log(res.data);
        employeeDetails.value = res.data
    }).catch(e => console.log(e)).finally(()=>console.log("completed"))

    return {

        // varaible Declarations
        employeeDetails
   



    };
});

