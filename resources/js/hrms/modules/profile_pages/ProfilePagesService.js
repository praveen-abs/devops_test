import axios from "axios";
import {
    defineStore
} from "pinia";
import { ref } from "vue";

export const  employeeService = defineStore("employeeService", () => {

    const employeeDetails  = ref([])

    const loading = ref(true)

     axios.get('http://localhost:8000/api/profile-pages-getEmpDetails?user_id=174').then(res =>{
        console.log(res.data);
        employeeDetails.value = res.data.data[0]
        loading.value = false
    }).catch(e => console.log(e)).finally(()=>console.log("completed"))


     async function fetchCurrentEmployee(uid){

        const response = await axios.post('/api/profile-pages-getEmpDetails', {
            encr_uid: uid,
          });
    
          return response;
    }

    return {

        // varaible Declarations
        employeeDetails,fetchCurrentEmployee,loading
   



    };
});

