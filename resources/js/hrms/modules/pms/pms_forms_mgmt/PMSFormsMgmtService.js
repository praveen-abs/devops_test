import {defineStore } from "pinia";
import {ref, reactive} from "vue";
import axios from "axios";

export const usePMSFormsDownloadStore = defineStore("pmsFormsDownloadStore", () => {

   //variable declaration
   const array_pms_forms_list = ref();
   const array_all_employees_list = ref();


  async function getAllEmployeesList(){

      //  array_all_employees_list
  }


});
