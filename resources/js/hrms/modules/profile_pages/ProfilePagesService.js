import axios from "axios";
import {
    defineStore
} from "pinia";
import { ref } from "vue";

export const  employeeService = defineStore("employeeService", () => {

    const employeeDetails  = ref([])

    const loading_screen = ref(true)

    let uid = '174';

     axios.get('/profile-pages-getEmpDetails?uid='+uid).then(res =>{
        loading_screen.value = false
        console.log(res.data);
        employeeDetails.value = res.data
    }).catch(e => console.log(e)).finally(()=>console.log("completed"))

    if(loading_screen.value == true){
        setTimeout(() => {
            // alert("yes")
            loading_screen.value = false;
            console.log("testing "+loading_screen.value);
        }, 1000);
        console.log("testing");
    }



    return {

        // varaible Declarations

        employeeDetails
        ,loading_screen

    };
});



