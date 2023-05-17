import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import axios from "axios";
import {Service} from '../../Service/Service'

export const useDocumentSettingsStore = defineStore("DocumentSettings", () => {
    // Variable Declarations
    const array_emp_documents_details = ref()
    const loading = ref(false);
    const service =  Service()

    const getEmpdocumentsSettingsDetails = reactive([]);
    const is_Mandatory = ref();
    const is_onboarding_doc = ref();
    const updatedSource = reactive([])

    // const

    // Events

    async function getEmployeesDocumentsDetails() {
        await axios.get('/documents/employee_doc_settings').then((res) => {
            array_emp_documents_details.value = res.data.data;
            console.log("getEmployeesDocumentsDetails()" + res.data);
        }).finally(() => {
        })
    }

    async function updateDocumentState(document){
        console.log("Updating doc status for : "+JSON.stringify(document));
    // }

    // async function MandatoryDetails(document) {

        if (document.isOnboardingDoc) {
            is_onboarding_doc.value = 0
        } else {
            is_onboarding_doc.value = 1
        }

        if (document.isMandatory) {
            is_Mandatory.value = 0
        } else {
            is_Mandatory.value = 1
        }

        let data = {
            // user_code:service.current_user_code,
            id:document.id,
            document_name:document.document_name,
            is_onboarding_doc:is_onboarding_doc.value ,
            is_mandatory:is_Mandatory.value

        }

        updatedSource.push(data)

        console.log(updatedSource);


    }

    function submitDocumentSettings(name) {
        console.log("testing:", name);
        let url = ' http://localhost:3000/DocumentsSettings'
        axios.post(url,updatedSource
        ).then((res) => {
            console.log(res.data);
        }).finally(()=>{
            updatedSource.splice(0,updatedSource.length)
        })
        console.log(is_onboarding_doc, is_Mandatory);

    }




    return {

        // Varaible Declartion

        array_emp_documents_details, loading, is_Mandatory, is_onboarding_doc,

        // Functions
        getEmployeesDocumentsDetails, submitDocumentSettings, updateDocumentState
        // MandatoryDetails

    };
});
