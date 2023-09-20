import axios from "axios";
import { mixin } from "lodash";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { inject, reactive, ref } from "vue";
import { EmployeeMasterStore } from "../../employee_master_report/employee_master_reportsStore";


export const UseReports_store = defineStore("UseReports_store", () => {

    // variable

    const { downloand } = ref();

    const useEmployeeMaster = EmployeeMasterStore()

    // fetch filter details variables

    const get_Legal_Entity = ref();
    const getDepartment = ref();
    const getPeriodMonth = ref();


    // v-model values

    const Legal_Entity = ref();
    const Department = ref();
    const PeriodMonth = ref();

    const attendance_Type = ref();

    // const

    const canShowLoading = ref(false);

    const activetab = ref(1);

    const btn_download = ref();

    const selectedfilters = reactive({
        date: "",
        department_id: "",
        client_id: "",
        active_status: "",
    });

    const AttendanceReportSource = ref([]);
    const AttendanceReportDynamicHeaders = ref([]);

    function fetchFilterClientId() {
        canShowLoading.value = true;
        axios.get('/clients-fetchAll').then((res) => {
            get_Legal_Entity.value = res.data;
            console.log("legal_entity ::", get_Legal_Entity.value);
        }).finally(() => {
            canShowLoading.value = false;
        })
    }

    function get_All_Department() {
        canShowLoading.value = true;
        axios.get('/get-department').then((res) => {
            getDepartment.value = res.data;
        }).finally(() => {
            canShowLoading.value = false;
        })
    }

    function fetchPeriodMonth() {
        // let date = Date;
        canShowLoading.value = true;
        axios.post('/get-filter-months-for-reports').then((res) => {
            getPeriodMonth.value = res.data;
        }).finally(() => {
            canShowLoading.value = false;
        })

    }

    // function

    function downloadEmployeeMaster(val) {
        console.log(" value :: ", val);

    }

    function getSelectoption(key, filterValue, active_status) {
        useEmployeeMaster.canShowLoading = true
        console.log(key, filterValue, active_status);
        console.log(selectedfilters);
        let url;

        if (active_status == 1) {
            // Detailed Reports
            url = `/fetch-detailed-attendance-data`;
        } else
            if (active_status == 2) {
                // Muster Reports
                url = `/fetch-attendance-data`;
            }
            else {
                url = `/fetch-LC-report-data`;
            }
        // url= '/fetch-attendance-data';

        if (key == "department") {
            selectedfilters.department_id = filterValue;

        } else
            if (key == "Category") {
                selectedfilters.active_status = filterValue
                console.log(selectedfilters);
            } else
                if (key == "date") {
                    selectedfilters.date = filterValue
                } else
                    if (key == "legal_entity") {
                        selectedfilters.client_id = filterValue
                    }

        // canShowLoading.value = true;

        axios.post(url, selectedfilters).then(res => {
            AttendanceReportSource.value = res.data.rows;
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                AttendanceReportDynamicHeaders.value.push(format);

                if (res.data.rows.length === 0) {
                    Swal.fire({
                        title: res.data.status = "failure",
                        text: "No employees found in this category",
                        // "Salary Advance Succesfully",
                        icon: "error",
                        showCancelButton: false,
                    }).then((res) => {
                        // blink_UI.value = res.data.data;

                    })

                }
            });
        }).finally(() => {
            useEmployeeMaster.canShowLoading = false
        })



    }


    const downloadAttendanceReports = (active_status) => {
        useEmployeeMaster.canShowLoading = true
        let url;
        let filename;
        if (active_status == 1) {
            url = '/reports/generate-detailed-attendance-report'
            filename = "Attendance Detailed Report"
        } else
            if (active_status == 2) {
                url = '/reports/generate-basic-attendance'
                filename = "Attendance Basic Report"

            }
        axios.post(url, selectedfilters, { responseType: 'blob' }).then((response) => {
            console.log(response.data);
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(response.data);
            link.download = `${filename}.xlsx`;
            link.click();
        }).finally(() => {
            useEmployeeMaster.canShowLoading = false

        })

    }


    const getEmployeeAttendanceReports = async () => {

        // Attendance Basic Reports
        let url = '/fetch-attendance-data'
        canShowLoading.value = true
        await axios.post(url).then(res => {
            console.log(res.data.rows);
            AttendanceReportSource.value = res.data.rows
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                AttendanceReportDynamicHeaders.value.push(format)
                console.log(element);
            });
            console.log(AttendanceReportDynamicHeaders.value);

        }).finally(() => {
            canShowLoading.value = false
        })

    }




    return {

        canShowLoading,

        // variables
        Legal_Entity,
        Department,
        PeriodMonth,

        btn_download,

        getPeriodMonth,
        getDepartment,
        get_Legal_Entity,

        // navbar var
        activetab,

        // functions

        // fetch leagl entity
        fetchFilterClientId,
        get_All_Department,
        fetchPeriodMonth,

        //
        getSelectoption,
        AttendanceReportSource,
        AttendanceReportDynamicHeaders,
        getEmployeeAttendanceReports,
        attendance_Type,
        downloadAttendanceReports
    }

});
