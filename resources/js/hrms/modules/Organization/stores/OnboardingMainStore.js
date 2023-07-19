import { defineStore } from "pinia";
import { computed, reactive, ref } from "vue";
import useValidate from '@vuelidate/core'
import { required, email, minLength, sameAs, helpers } from '@vuelidate/validators'
import axios from "axios";
import { inject } from "vue";
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";






export const useOnboardingMainStore = defineStore("useOnboardingMainStore", () => {



    const service = Service()


    // Helper Function

    const userCodeExists = (user_code) => {
        axios.get(`/user-code-exists/${user_code}`).then(response => {
            return response.data;
        })

    }

    const personalMailExists = (mail) => {
        axios.get(`/personal-mail-exists/${mail}`).then((response) => {
            return response.data;
        })
    };

    const mobileNoExists = (mobile) => {
        axios
            .get(`/mobile-no-exists/${mobile}`)
            .then((response) => {
                return response.data;
            })
    }

    const AadharCardExits = (aadhar_no) => {
        axios
            .get(`/aadhar-no-exists/${aadhar_no}`)
            .then((response) => {
                return response.data;
            })
    };

    const panCardExists = (pan_no) => {
        axios
            .get(`/pan-no-exists/${pan_no}`)
            .then((response) => {
                return response.data;
            })
    };

    const AccountNoExists = (Ac_no) => {
        axios
            .get(`/ac-no-exists/${Ac_no}`)
            .then((response) => {
                return response.data;
            })
    }





    const bankList = ref();
    const country = ref();
    const departmentDetails = ref();
    const state = ref();
    const ManagerDetails = ref();
    const maritalDetails = ref();
    const bloodGroups = ref();





    const getBasicDeps = () => {
        // For Bank Data
        service.getBankList().then((result) => bankList.value = result.data);
        //  For Countries
        service.getCountryList().then((result) => (country.value = result.data));

        service.getStateList().then((result) => (state.value = result.data));
        // for Manager Details
        service.ManagerDetails().then((result) => (ManagerDetails.value = result.data));

        //Get Department details

        service.DepartmentDetails().then((result) => (departmentDetails.value = result.data));

        service.getMaritalStatus().then((result) => {
            maritalDetails.value = result.data;
        });

        service.getBloodGroups().then((result) => (bloodGroups.value = result.data));
    }



    return {



        // Onboarding Helper functions

        userCodeExists, personalMailExists, panCardExists, mobileNoExists, AccountNoExists,

        // Basic Depes
        getBasicDeps, bankList, country, state, departmentDetails, ManagerDetails, maritalDetails, bloodGroups,

    }
})
