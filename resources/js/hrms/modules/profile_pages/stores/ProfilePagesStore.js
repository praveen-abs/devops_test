import axios from "axios";
import { defineStore } from "pinia";
import { Service } from "../../Service/Service";
import { useRouter, useRoute } from "vue-router";
import { onMounted, onUpdated } from 'vue';
import { ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const profilePagesStore = defineStore("employeeService", () => {

    const employeeDetails = ref([])

    const loading_screen = ref(true)

    const router = useRouter();
    const route = useRoute();
    const profile = ref();
    const profile_img = ref();

    const user_code = ref()

    const service = Service()

    const getProfilePhoto = () => {
        axios
            .post("/profile-pages/getProfilePicture", {
                user_code: service.current_user_code
            })
            .then((res) => {
                console.log("profile :?", res.data.data);
                profile.value = res.data.data;
                profile_img.value = res.data.data;
            })
            .finally(() => {
                console.log("profile Pic Fetched" ,profile_img.value);
                // fetchEmployeeDetails();
            });
    };

    async function fetchEmployeeDetails() {
        let url = '/profile-pages-getEmpDetails'
        console.log("Getting employee details")
        await axios.get(`${url}/${user_code.value}`).then(res => {
            console.log("fetchEmployeeDetails() : " + res.data);
            loading_screen.value = false
            employeeDetails.value = res.data
            console.log("Current User code :" + res.data.user_code);
        }).catch(e => console.log(e)).finally((res) => {
            getProfilePhoto()
            console.log("completed")
        })


    }

    return {

        // varaible Declarations
        fetchEmployeeDetails,
        employeeDetails,
        loading_screen,
        user_code,
        getProfilePhoto,
        profile,
        profile_img

    };
});



