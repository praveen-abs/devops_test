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

