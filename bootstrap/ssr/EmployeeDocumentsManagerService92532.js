import axios from "axios";
import { ref } from "vue";
import { defineStore } from "pinia";
<<<<<<<< HEAD:bootstrap/ssr/EmployeeDocumentsManagerService46681.js
import { S as Service } from "./Service46681.js";
import { p as profilePagesStore } from "./ProfilePagesStore46681.js";
========
import { S as Service } from "./Service92532.js";
import { p as profilePagesStore } from "./ProfilePagesStore92532.js";
>>>>>>>> 3d11572c6ee7fb534efc658b88a39b370fca8e71:bootstrap/ssr/EmployeeDocumentsManagerService92532.js
const UseEmployeeDocumentManagerService = defineStore("EmployeeDocumentManagerService", () => {
  const getEmployeeDetails = Service();
  const loading = ref(false);
  const getEmployeeDoc = ref([]);
  ref();
  const getEmpdocPhoto = ref();
  const usercode = profilePagesStore();
  const EmployeeDocs_upload = ref({
    AadharCardFront: null,
    AadharCardBack: null,
    PanCardDoc: null,
    DrivingLicenseDoc: null,
    EductionDoc: null,
    VoterIdDoc: null,
    RelievingLetterDoc: null,
    PassportDoc: null,
    save_draft_messege: null
  });
  const fetch_EmployeeDocument = async () => {
    let user_code = usercode.employeeDetails.user_code;
    await getEmployeeDetails.getCurrentUserCode().then((code) => {
      user_code = code.data;
    });
    loading.value = true;
    await axios.post("/employee-documents-details", {
      user_code
    }).then((res) => {
      getEmployeeDoc.value = res.data.data;
      console.log("employee document : ", getEmployeeDoc.value);
    }).finally(() => {
      loading.value = false;
      console.log("completed");
    });
  };
  return {
    EmployeeDocs_upload,
    getEmployeeDetails,
    getEmployeeDoc,
    getEmpdocPhoto,
    fetch_EmployeeDocument,
    loading
  };
});
export {
  UseEmployeeDocumentManagerService as U
};
