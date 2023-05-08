import {defineStore } from "pinia";
import {ref, reactive} from "vue";
import axios from "axios";
import {Service} from  '../../Service/Service';



export const useInvFormsMgmt = defineStore("InvFormsMgmt", () => {

  const service = Service()


  async function uploadInvestmentForm(form_name, excel_file){

  }


  return{
    uploadInvestmentForm
  }


});
