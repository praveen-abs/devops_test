import {defineStore } from "pinia";
import {ref, reactive} from "vue";
import axios from "axios";
import {Service} from  '../../Service/Service';

export const usePMSFormsDownloadStore = defineStore("pmsFormsDownloadStore", () => {

    const loading = ref(false)

    const service = Service()

    const allEmployees = ref()
   //variable declaration
   const array_pms_forms_list = ref([]);

   const selectedEmployee = ref()



  async function getAllEmployeesList(){
    loading.value = true;

      //  array_all_employees_list

     await service.getAllEmployees().then(result =>{
        allEmployees.value = result.data
        console.log("testing data:",result.data);
      }).then(()=>{
        loading.value = false;
      })
  }

  async function viewEmployeePmsForm(){
    loading.value = true;

    axios.post('http://127.0.0.1:8000/getAssignedPMSFormTemplates',{
        user_code:selectedEmployee.value.user_code
    })
    .then((res)=>{
       console.log(res.data.data);
    //    array_pms_forms_list.push(res.data.data)
    array_pms_forms_list.value = res.data.data
        loading.value= false
    })
    console.log(selectedEmployee.value.user_code);
    console.log(`${selectedEmployee.value.user_code} - ${selectedEmployee.value.name}`);
    // axios.post( ,{
    //     emp:`${selectedEmployee.value.user_code} - ${selectedEmployee.value.name}`
    // })
  }

  async function getEmployeePMSHrview(response){
    loading.value = true;

    await axios.post('getEmployeePMSHrview',{
        pms_kpiform_id:array_pms_forms_list.pms_kpiform_id
    })
    .then(()=>{
        array_pms_forms_list.value = response.data;
        console.log("testing form details : ",array_pms_forms_list);

    })

  }

  const downloadForm = (async (form_id)=>{
    console.log(form_id);
    axios.post('/get-employee-PMS-form-template-excel',{
        form_id:form_id
    }).then(res=>{
        console.log(res);
    }).finally(()=>{
        console.log("form id sent");
    })
  })




  return{
    /* `allEmployees`, `getAllEmployeesList`, and `service` are the properties being returned by the
    `usePMSFormsDownloadStore` store. */
    allEmployees,getAllEmployeesList,service,array_pms_forms_list,selectedEmployee,downloadForm

    ,viewEmployeePmsForm,loading
  }


});




