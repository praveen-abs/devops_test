import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const useHolidayStore = defineStore("useHolidayStore", () => {

    // Notification service
    const toast = useToast();

    // Variable Declarations
    const holidayData = ref();
    const AddNewHoliday = reactive({
        Holiday_Photo:"",
        FestivalTitle:"",
        Description:"",
        date:""
    });


    // events

    const getHolidays = async() =>{
        await axios.get('/holiday/master-page').then(res=>{
            console.log(res.data);
            holidayData.value = res.data
        })
    }

    const uploadFestivalPhoto = (e) => {
        if (e.target.files && e.target.files[0]) {
            AddNewHoliday.Holiday_Photo = e.target.files[0];
            console.log(AddNewHoliday.Holiday_Photo);
        }
    }

    const sumbitAddNewHoliday = (data) =>{
        console.log(data);
        axios.post().then((res)=>{
            console.log(res.data);
        }).finally(()=>{

        });
    }





    return {

        // Variable Declaration
        holidayData,AddNewHoliday

        // function
        ,getHolidays,uploadFestivalPhoto,sumbitAddNewHoliday

    };
});
