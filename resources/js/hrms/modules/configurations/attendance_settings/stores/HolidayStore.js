import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const useHolidayStore = defineStore("useHolidayStore", () => {

    // Notification service
    const toast = useToast();

    // Variable Declarations
    const canShowLoading = ref(false);
    const holidayData = ref();
    const arrayholidayMaster =ref();
    const activeHolidaysPage = ref(1);
    const arrayHolidaysList = ref();
    const CreateNewListDialog = ref(false);

    const addNewHoliday = reactive({
        FestivalTitle: "",
        Description: "",
        date: "",
        Holiday_Photo: "",
    });



    const CreateNewList = reactive({
        List_Name: "",
        ChooseTheHolidays:""
    });

    const AssignToLocation = reactive({
        location:"",
        ChooseTheHolidays:""
    });

    const ChooseTheHolidays = ref()
    const selectedHolidays = reactive([]);


    let forms = new FormData()

    const avatar  = ref()


    const FestivalPhoto = (e) => {
        // Check if file is selected
        if (e.target.files && e.target.files[0]) {
            // Get uploaded file
            addNewHoliday.Holiday_Photo = e.target.files[0];
            // Get file size
            // Print to console9+++
            avatar.value = window.URL.createObjectURL(e.target.files[0]);
            console.log(addNewHoliday.Holiday_Photo);
            forms.append("file",addNewHoliday.Holiday_Photo)
            console.log(forms);
        }
    }

    // events

    const getHolidays = async() =>{
        canShowLoading.value = true;
        await axios.get('/holiday/master-page').then(res=>{
            console.log(res.data);
            holidayData.value = res.data
        }).finally(()=>{
            canShowLoading.value = false;
        })
    }

    const sumbitAddNewHoliday = () => {

        let url =`http://localhost:3000/SubmitCreateNewList`;

        let form = new FormData();
        form.append('festivalTitle', addNewHoliday.FestivalTitle)
        form.append('description', addNewHoliday.Description);
        form.append('date', addNewHoliday.date);
        form.append('holiday_Photo',addNewHoliday.Holiday_Photo);
        axios.post(url,form).then(()=>{

        }).finally(() => {
        });
    }

    const getHolidaysMaster = async()=>{
        await axios.get('http://localhost:3000/HolidayMaster').then(res=>{
            console.log(res.data);
            arrayholidayMaster.value = res.data;

        })
    };

    const getHolidaylist = async()=>{
        await axios.get('/holidays/add_holidayslist').then((res)=>{
            arrayHolidaysList.value = res.data;

        })
    }

    const getCreateNewList =async()=>{
        await axios.get('http://localhost:3000/HolidayMaster').then(res=>{
            console.log(res.data);
            arrayholidayMaster.value = res.data;

        })
    }





    const SubmitCreateNewList = ()=>{

        for (var key in ChooseTheHolidays.value) {
            let data ={
                "id":ChooseTheHolidays.value[key].id,
                "holiday":ChooseTheHolidays.value[key].holiday_name,
            }
            selectedHolidays.push(data);
        }
        console.log(selectedHolidays);

        axios.post('http://localhost:3000/SubmitCreateNewList',{
            List_Name:CreateNewList.List_Name,
            HolidaysName:selectedHolidays
        }).then((res)=>{
            res.data;
        }).finally(()=>{
            CreateNewListDialog.value = false;

        })
    }

    const SubmitAddNewLocation = ()=>{
        axios.post('http://localhost:3000/SubmitAddNewLocation',{
            location:AssignToLocation.location,
            ChooseTheHolidays:AssignToLocation.ChooseTheHolidays
        }).finally(()=>{
        })
    }

    const getHolidayName = () =>{
        // console.log(Object.values(holiday.value.holiday_yname));
        console.log(ChooseTheHolidays.value);

    }

    async function RemoveHolidayList (){


    }





    return {

        // Variable Declaration
        holidayData,activeHolidaysPage,CreateNewList,AssignToLocation,arrayholidayMaster,canShowLoading,arrayHolidaysList,CreateNewListDialog,addNewHoliday

        // function
        ,getHolidays,SubmitCreateNewList,SubmitAddNewLocation,

        getHolidaysMaster,getHolidaylist,getHolidayName,ChooseTheHolidays,FestivalPhoto,sumbitAddNewHoliday,avatar

    };
});
