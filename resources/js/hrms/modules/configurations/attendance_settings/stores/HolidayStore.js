import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const useHolidayStore = defineStore("useHolidayStore", () => {

    // Notification service
    const toast = useToast();

    // Variable Declarations

    const holidayData = ref()


    const getHolidays = async() =>{
        await axios.get('/holiday/master-page').then(res=>{
            console.log(res.data);
            holidayData.value = res.data
        })
    }




    return {

        // Variable Declaration
        holidayData,getHolidays

    };
});
