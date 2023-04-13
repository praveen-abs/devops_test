import axios from "axios";
import { defineStore } from "pinia";

import { ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const profilePagesStore = defineStore("employeeService", () => {

    const employeeDetails  = ref([])

    const loading_screen = ref(true)

    const urlParams = new URLSearchParams(window.location.search);

    let url = '/profile-pages-getEmpDetails';

    if(urlParams.has('uid'))
        url = url +'?uid='+urlParams.get('uid');


    async function fetchEmployeeDetails(){
        console.log("Getting employee details")
        await axios.get(url).then(res =>{
            console.log("fetchEmployeeDetails() : "+res.data);

            loading_screen.value = false
            employeeDetails.value = res.data

        }).catch(e => console.log(e)).finally(()=>console.log("completed"))

        // if(loading_screen.value == true){
        //     setTimeout(() => {
        //         // alert("yes")
        //         loading_screen.value = false;
        //         console.log("testing "+loading_screen.value);
        //     }, 1000);
        //     console.log("testing");
        // }
    }


    return {

        // varaible Declarations
        fetchEmployeeDetails,
        employeeDetails,
        loading_screen

    };
});



