import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import axios from "axios";


export const UseSalaryAdvanceApprovals =defineStore('SalaryAdvanceApprovals',()=>{

    // variables
    const arraySalaryAdvance =ref();

    // functions

    async function getEmpDetails(){
        await axios.get('http://localhost:3000/salary_advance').then((res)=>{
            arraySalaryAdvance.value = res.data;
            console.log();
        }).finally(()=>{

        })

    }

    async function submit(){

    }


    return{
         arraySalaryAdvance
        ,getEmpDetails

    }

});

