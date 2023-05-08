<<<<<<< HEAD
import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const usePmsSelfDetailsStore = defineStore("PmsSelfDetailsStore", () => {



        const array_single_employees_list = ref();

    async function getAllEmployeesPayslipDetails(user_id){

        //reset the var
        array_single_employees_list.value = '';

        await axios.post('/getAssignedPMSFormTemplates',{
          user_id : user_id,

        }).then((response) => {
           // console.log("Response [getAllEmployeesPayslipDetails] : " + JSON.stringify(response.data.data));

            array_single_employees_list.value = response.data.data;
        });
    }

    return{
            //variable
            array_employees_list,


        //function
        getAllEmployeesPayslipDetails,
    }



});

=======
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
>>>>>>> 4e8c300ce9d3fb88243956f6448a3500cfafa49a
