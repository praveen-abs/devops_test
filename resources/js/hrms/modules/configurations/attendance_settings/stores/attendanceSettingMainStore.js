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

    // Shift Details Begins

    const array_shiftDetails = ref();

    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    let selectedEmployees = ref();

    const shiftDetails = reactive({
        txt_shift_name:"",
        Shift_Code:"",
        txt_shift_start_time:"",
        Is_Default:"",
    })

    // shift Time range

    const shift_Time_range = reactive({

    })


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
                selectedEmployees: array_assignedEmp_ids,
                workshift_name: shiftDetails.txt_shift_name,
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





    return {

        // Variable Declaration
        canShowLoading,array_shiftDetails,shiftDetails,selectedEmployees,manageshift_exemption_steps,

        //
        fetchShiftDetails, saveWorkShiftDetails

    };
});
