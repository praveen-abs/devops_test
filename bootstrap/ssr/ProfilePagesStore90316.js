import axios from "axios";
import { defineStore } from "pinia";
import { S as Service } from "./Service90316.js";
import { ref } from "vue";
const profilePagesStore = defineStore("employeeService", () => {
  const employeeDetails = ref([]);
  const loading_screen = ref(true);
  const profile = ref();
  const user_code = ref();
  const service = Service();
  const urlParams = new URLSearchParams(window.location.search);
  let url = "/profile-pages-getEmpDetails";
  if (urlParams.has("uid"))
    url = url + "?uid=" + urlParams.get("uid");
  console.log("id" + url);
  let url_param_UID = new URL(document.location).searchParams.get("uid");
  const getProfilePhoto = () => {
    axios.post("/profile-pages/getProfilePicture", {
      user_code: user_code.value
    }).then((res) => {
      console.log("profile :?", res.data.data);
      profile.value = res.data.data;
    }).finally(() => {
      console.log("profile Pic Fetched");
    });
  };
  async function fetchEmployeeDetails() {
    console.log("Getting employee details");
    await axios.get(url).then((res) => {
      console.log("fetchEmployeeDetails() : " + res.data);
      loading_screen.value = false;
      employeeDetails.value = res.data;
      console.log("Current User code :" + res.data.user_code);
      if (url_param_UID) {
        user_code.value = res.data.user_code;
      } else {
        console.log("user not code");
        user_code.value = service.current_user_code;
      }
    }).catch((e) => console.log(e)).finally((res) => {
      getProfilePhoto();
      console.log("completed");
    });
  }
  return {
    fetchEmployeeDetails,
    employeeDetails,
    loading_screen,
    user_code,
    getProfilePhoto,
    profile
  };
});
export {
  profilePagesStore as p
};
