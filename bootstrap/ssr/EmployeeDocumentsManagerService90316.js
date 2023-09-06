import axios from "axios";
import { ref } from "vue";
import { defineStore } from "pinia";
import { S as Service } from "./Service90316.js";
import { p as profilePagesStore } from "./ProfilePagesStore90316.js";
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
