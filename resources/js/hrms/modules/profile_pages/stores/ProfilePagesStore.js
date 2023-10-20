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

    const user_code = ref();

    const user_id = ref();

    const service = Service();
    
    function getURLParams_UID() {

        if(route.params.user_code){
            return route.params.user_code
        }else{
            return service.current_user_id
        }
    }

    const getProfilePhoto = () => {
        console.log(route.params.user_code);
        if(route.params.user_code && user_id.value ){
            console.log(" admin and view user id ::");
            
        axios
        .post("/profile-pages/getProfilePicture", {
            user_id:user_id.value,
            admin_user_id:service.current_user_id
        })
        .then((res) => {
            console.log("profile :?", res.data.data);
            profile.value = res.data.data;
            profile_img.value = res.data.data;
        })
        .finally(() => {
        });

        }
        else{
            console.log(" admin ");
            axios
            .post("/profile-pages/getProfilePicture", {
                user_id:"",
                admin_user_id:service.current_user_id
            })
            .then((res) => {
                console.log("profile :?", res.data.data);
                profile.value = res.data.data;
                profile_img.value = res.data.data;
            })
            .finally(() => {
            });

        }

    };

<<<<<<< HEAD
    async function fetchEmployeeDetails() {

        let User_code = user_code.value;

        if(User_code){
            User_code = user_code.value;
=======
    async function fetchEmployeeDetails(userId) {
        
        let User_code = user_id.value;
        if(userId){
            User_code = userId;
            user_id.value = userId;
        }
        else if(User_code){
            User_code = user_id.value;
>>>>>>> d4dad5dd6e299f8d530eef67ec09f64e7032b293
        }else{
            User_code = service.current_user_id;
            user_id.value = service.current_user_id;
        }

        console.log(" user code : : " , user_code.value ,User_code );
        let url = '/profile-pages-getEmpDetails'
        console.log("Getting employee details")
        await axios.get(`${url}/${User_code}`).then(res => {
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
        profile_img,
        user_id,
        getURLParams_UID

    };
});



