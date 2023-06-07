import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const UseEmpDetailApprovalsStore = defineStore("EmpDetailApprovalsStore",()=>{

     // Variable Declarations
     const array_EmpDetails_list = ref();

      // Events

      async function getEmpDetails_list(){
        await axios.get("/fetch-proof-doc").then((res)=>{
            console.log(res.data);
            array_EmpDetails_list.value = res.data;
            console.log(array_EmpDetails_list.value);
        }).finally(()=>{
        })
      }


      return{
        // Variable
        array_EmpDetails_list,

        // function
        getEmpDetails_list,

      };
});
