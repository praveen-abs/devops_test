import axios from 'axios';
import {ref,reactive} from  'vue';
import {defineStore} from "pinia";
import {Service} from '../Service/Service'

export const UseEmployeeDocumentManagerSerive = defineStore("EmployeeDocumentManagerSerive", () => {


    // variable
    const getEmployeeDetails = Service();
    const loading = ref(true);

    const getEmployeeDoc = ref([]);
    const uploadDocs = ref();
    const getEmpdocPhoto = ref();


    const EmployeeDocs_upload = ref({
        AadharCardFront: null,
        AadharCardBack: null,
        PanCardDoc: null,
        DrivingLicenseDoc: null,
        EductionDoc: null,
        VoterIdDoc: null,
        RelievingLetterDoc: null,
        PassportDoc: null,
        save_draft_messege: null,
    });


const fetch_EmployeeDocument = () => {
    axios.post('/employee-documents-details', {
        user_code: 'PSC0057'
    }).then((res) => {
        // console.log(res.data);
        getEmployeeDoc.value = res.data.data
        console.log("employee document : " , getEmployeeDoc.value);
    }).finally(() => {
        loading.value = false
        console.log("completed");
    })
}
    return{
        // variable
        EmployeeDocs_upload,getEmployeeDetails,getEmployeeDoc,getEmpdocPhoto,

        // function
        fetch_EmployeeDocument,loading
    }
})
