import {defineStore } from "pinia";
import {ref, reactive} from "vue";
import axios from "axios";
import {Service} from  '../../Service/Service';

const service = Service()

const allEmployees = ref()


export const usePMSFormsDownloadStore = defineStore("pmsFormsDownloadStore", () => {

   //variable declaration
   const array_pms_forms_list = ref();



  async function getAllEmployeesList(){

      //  array_all_employees_list

     await service.getAllEmployees().then(result =>{
        allEmployees.value = result
        console.log(result);
      })

  }

  return{
    allEmployees,getAllEmployeesList
  }


});
