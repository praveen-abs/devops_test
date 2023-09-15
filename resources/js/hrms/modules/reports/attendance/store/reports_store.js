import axios from "axios";
import { mixin } from "lodash";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { inject, reactive, ref } from "vue";

export const UseReports_store = defineStore("UseReports_store",()=>{

    // variable 

    const { downloand , legal_entity , department, } = ref();

    // const {  }

    const activetab =  ref(1);

    function fetchFilterClientIds(){
        canShowLoading.value = true;
        axios.get('/filter-client-ids').then((res)=>{
            legal_entity.value = res.data;
            console.log(legal_entity.value);
        }).finally(()=>{
            canShowLoading.value = false;
        })
    }

    // function 

    // function fetch

    // function 

    function get_All_Department(){
        canShowLoading.value = true;
     axios.get('/get-department').then((res)=>{
      department.value = res.data;
     }).finally(()=>{
         canShowLoading.value = false;
     })
 }






    return{

        // variables 
        legal_entity,
        department,

        // navbar var
        activetab, 


        // functions 

        // fetch leagl entity
        fetchFilterClientIds,
        get_All_Department
       
        // 
    }

});