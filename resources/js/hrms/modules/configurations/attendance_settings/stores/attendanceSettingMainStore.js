import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const useAttendanceSettingMainStore = defineStore("AttendanceSettingMainStore", () => {
    /*
    ----- Attendance Setting------

   1)Manage Shift

      1) Shift Details
      2) Shift Time Range
      3) Break Time Range
      4) Working Hours
      5)Late&Early Going

    */

    // Notification service
    const toast = useToast();
    // loading Spinner
    const canShowLoading = ref(false);
    // Variable Declarations

    // Steps for manageshift and exemption tab's  Next and Previous Button

    const manageshift_exemption_steps = ref(1);

    // steps for Apply Flexible Gross Break Toggle button

    const change = ref();

    // Shift Details Begins

    const array_shiftDetails = ref();

    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    let selectedEmployees = ref();

    // const selectedWeek_Off = ref();

    const shiftDetails = reactive({
        txt_shift_name:"",
        Shift_Code:"",
        txt_shift_start_time:"",
        Is_Default:"",
        AFGH_Min:"",
        Shift_start_Time:"",
        Shift_End_Time:"",
        Week_Off:"",
        Grace_Time:"",
        AFGB_Min:"",

    })

    // shift Time range

    const shift_Time_range = reactive({

    });

    // const AllWeeks = ref();
    const update_state = reactive([]);


    const Week_Off_Days = ref([
        // {weeks:"Sunday" ,week_off_list : 0,first_week: 0,sec_week:0,third_week:0,fourth_week:0,fifth_week:0 ,id:1 },
        // {weeks:"Monday" ,week_off_list : 0,first_week:1,sec_week:1,third_week:1,fourth_week:1,fifth_week:0,id:2 },
        // {weeks:"Tuesday" ,week_off_list : 0,first_week:0,sec_week:0,third_week:1,fourth_week:1,fifth_week:0,id:3 },
        // {weeks:"Wednesday" ,week_off_list : 1,first_week:1,sec_week:1,third_week:1,fourth_week:1,fifth_week:1,id:4 } ,
        // {weeks:"Thursday" ,week_off_list : 0,first_week:0,sec_week:0,third_week:1,fourth_week:1,fifth_week:1,id:5 } ,
        // {weeks:"Friday" ,week_off_list : 0,first_week:0,sec_week:0,third_week:1,fourth_week:1,fifth_week:1,id:6 } ,
        // {weeks:"Saturday" ,week_off_list : 0,first_week:1,sec_week:1,third_week:1,fourth_week:1,fifth_week:1,id:7 }
    ]);

    function getWeek_Off_Days() {
        canShowLoading.value = true;
        let url = "http://localhost:3000/assingWorkShifts";

        console.log("AJAX URL : " + url);

        axios.get(url).then((response) => {
            Week_Off_Days.value = response.data;
            console.log("testing getWeek_Off_Days data : ",Week_Off_Days.value);
            canShowLoading.value = false;
        });
    }



    // const fetchShiftDetails = (async () => {
    //     let url = ''
    //     await axios.get(url).then(res => {
    //         array_shiftDetails.value = res.data
    //     }).finally(() => {

    //     })
    // });

    function fetchShiftDetails() {
        canShowLoading.value = true;
        let url = window.location.origin + "/attendance_settings/fetch-emp-details";

        console.log("AJAX URL : " + url);

        axios.get(url).then((response) => {
            array_shiftDetails.value = response.data;
            console.log("testing fetch-emp-details : ",array_shiftDetails.value);
            canShowLoading.value = false;
        });
    }

    function resetVars() {
        currentlySelectedStatus = "";
        currentlySelectedRowData = null;
    }

    function getEmployeeIDsArray() {
        const temp = [];

        _.flatMap(selectedEmployees.value, function (data) {
          temp.push(data.user_id);
        });

        return temp;
        //console.log("Output : "+temp);
      }



    function saveWorkShiftDetails() {
        // hideConfirmDialog(false);

        canShowLoading.value = true;

        console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

        //squash all the emp details
        let array_assignedEmp_ids = getEmployeeIDsArray();

        // let url = `/attendance_settings/save-shiftdetails`;
        let url = `http://localhost:3000/assingWorkShifts`;

        //Shift name
        //Selected employees
        // window.location.origin +
        axios
            .post( url, {
                update_state:update_state,
            })
            .then((response) => {
                console.log(response);
                fetchShiftDetails();
                canShowLoading.value = false;
                // resetVars();
            })
            .catch((error) => {
                canShowLoading.value = false;
                // resetVars();

                // console.log(error.toJSON());
            });
    }

    async function updateWeekOffState(data){


        // AllWeeks.value = data;

        if(data.AllWeeks){
            data.first_week = 1;
            data.sec_week = 1;
            data.third_week = 1;
            data.fourth_week = 1;
            data.fifth_week = 1;
        }
        let val = {
            AllWeeks:data.AllWeeks,
            Week_1st:data.first_week,
            Week_2st:data.sec_week,
            Week_3st:data.third_week,
            Week_4st:data.fourth_week,
            Week_5st:data.fifth_week,
        }
        console.log(val.value);

        update_state.push(val)
        console.log(update_state);
        // console.log("get update Week_Off State : ", AllWeeks.value);

    }



    // resetVars(){

    // }








    return {

        // Variable Declaration
        canShowLoading,array_shiftDetails,shiftDetails,selectedEmployees,manageshift_exemption_steps,change,Week_Off_Days,update_state,

        //
        fetchShiftDetails, saveWorkShiftDetails,getWeek_Off_Days,updateWeekOffState


    };
});
