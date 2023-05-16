import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";

export const useDocumentSettingsStore = defineStore("DocumentSettings", () => {
    // Variable Declarations
    const array_emp_documents_details = ref()
    const loading = ref(false)

    // Events

    async function getEmployeesDocumentsDetails(){
        axios.get('/documents/employee_doc_settings').then((res)=>{
            array_emp_documents_details.value = res.data.data;
            console.log("getEmployeesDocumentsDetails()" + res.data);
        }).finally(()=>{
        })
    }




    return {

        // Varaible Declartion

        array_emp_documents_details, loading,

        // Functions
        getEmployeesDocumentsDetails

    };
});
