import axios from "axios";
import { mixin } from "lodash";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { inject, reactive, ref } from "vue";


export const EmployeeMasterStore = defineStore("EmployeeMasterStore", ()=>{

    // variable 

    // functions

    const client_ids = ref();
    const selectCategory = ref();
    const btn_download = ref(false);
    const personalDetail =  ref();
    const show = ref(false);
    const employeeCTCReportSource = ref([]);
    const Employee_CTCReportDynamicHeaders =  ref([]);
    const department = ref();
    const PeriodMonth = ref("");
    const canShowLoading   = ref(false);
    const selectedfilters = reactive({
        date:"",
        department_id:"",
        legal_entity:"",
        active_status:""
    });


const getEmployeeCTC = () => {
    // Absent Reports
    // let url = '/fetch_employee_ctc_report'
    let url = '/fetch-employee-ctc-report'
    canShowLoading.value = true
    axios.post(url,{
        type:""
    }).then(res => {
        console.log(res.data.rows,"get value ");
        employeeCTCReportSource.value = res.data.rows
        console.log(employeeCTCReportSource.value," testings data");
        res.data.headers.forEach(element => {
            let format = {
                title: element
            }
            Employee_CTCReportDynamicHeaders.value.push(format)
            console.log(element);
        });
        console.log(Employee_CTCReportDynamicHeaders.value);

    }).finally(() => {
        canShowLoading.value = false;
    })
}

    function fetchFilterClientIds(){
        canShowLoading.value = true;
        axios.get('/filter-client-ids').then((res)=>{
            client_ids.value = res.data;
            console.log(client_ids.value);
        }).finally(()=>{
            canShowLoading.value = false;
        })
    }

    function sentFilterClientIds(legalEntity){
        selectedfilters.legal_entity = legalEntity;
        canShowLoading.value = true;
        // let legalEntityID =  legalEntity;
        axios.post('/fetch-employee-ctc-report',selectedfilters).then(res => {
            console.log(res.data.rows,"get value ");
            employeeCTCReportSource.value = res.data.rows
            console.log(employeeCTCReportSource.value," testings data");
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                Employee_CTCReportDynamicHeaders.value.push(format)
                console.log(element);
            });
            console.log(Employee_CTCReportDynamicHeaders.value);
    
        }).finally(() => {
            canShowLoading.value = false;
        })
    }

    function personalDetails(){
        employeeCTCReportSource.value.splice(0);
        Employee_CTCReportDynamicHeaders.value.splice(0);
    
        if(show.value == true){
            console.log(show);
            show.value = false;
            personalDetail.value = "";
            console.log(personalDetail.value);
        }
        else if(show.value == false){
            show.value = true;
            personalDetail.value = "detailed";
            console.log(personalDetail.value);
        };
    
        let type =   personalDetail.value;
    
        axios.post('/fetch-employee-ctc-report',{
            type:type
        }).then(res => {
            console.log(res.data.rows,"get value ");
            employeeCTCReportSource.value = res.data.rows
            console.log(employeeCTCReportSource.value," testings data");
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                Employee_CTCReportDynamicHeaders.value.push(format)
                console.log(element);
            });
            console.log(Employee_CTCReportDynamicHeaders.value);
        })
    };

    function sentcategory(selectCategory){
        selectedfilters.active_status = selectCategory;
        employeeCTCReportSource.value.splice(0);
        Employee_CTCReportDynamicHeaders.value.splice(0);
        axios.post('/fetch-employee-ctc-report',selectedfilters).then(res => {
            console.log(res.data.rows,"get value ");
            employeeCTCReportSource.value = res.data.rows
            console.log(employeeCTCReportSource.value," testings data");
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                Employee_CTCReportDynamicHeaders.value.push(format)
                console.log(element);
            });
            console.log(Employee_CTCReportDynamicHeaders.value);
    
        })
    }

    function getALLdepartment(){
           canShowLoading.value = true;
        axios.get('/get-department').then((res)=>{
         department.value = res.data;
        }).finally(()=>{
            canShowLoading.value = false;
        })
    }

    function getEmployeeCTCReports(department_id){

        employeeCTCReportSource.value.splice(0);
        Employee_CTCReportDynamicHeaders.value.splice(0);

        selectedfilters.department_id = department_id;
        let departmentId = department_id;
        axios.post('/fetch-employee-ctc-report',selectedfilters).then(res => {
            console.log(res.data.rows,"get value ");
            employeeCTCReportSource.value = res.data.rows
            console.log(employeeCTCReportSource.value," testings data");
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                Employee_CTCReportDynamicHeaders.value.push(format)
                console.log(element);
            });
            console.log(Employee_CTCReportDynamicHeaders.value);
    
        })
    };

    function getPeriodMonth(){
        // let date = Date;
        canShowLoading.value = true;
        axios.post('/get-filter-months-for-reports').then((res)=>{
            PeriodMonth.value= res.data;
        }).finally(()=>{
            canShowLoading.value = false;
        })

    }

    function updateEmployee_Basic_CTC(Date){

        employeeCTCReportSource.value.splice(0);
        Employee_CTCReportDynamicHeaders.value.splice(0);

        selectedfilters.date = Date;
    //    let date = Date;
       axios.post('/fetch-employee-ctc-report',selectedfilters).then(res => {
        console.log(res.data.rows,"get value ");
        employeeCTCReportSource.value = res.data.rows
        console.log(employeeCTCReportSource.value," testings data");
        res.data.headers.forEach(element => {
            let format = {
                title: element
            }
            Employee_CTCReportDynamicHeaders.value.push(format)
            console.log(element);
        });
        console.log(Employee_CTCReportDynamicHeaders.value);

    });


    }

    // 

    const downloadEmployeeCTC = () => {
    let url = '/generate-employees-ctc-report-data'
    canShowLoading.value = true;
    axios.post(url,selectedfilters, { responseType: 'blob' }).then((response) => {
        console.log(response.data);
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(response.data);
        // ${new Date(variable.start_date).getDate()}_${new Date(variable.end_date).getDate()}
        link.download = `Employee CTC Report_.xlsx`;
        link.click();
    }).finally(() => {
        btn_download.value = false;
        canShowLoading.value = false;
    })
}

    // function testings(val){
    //     let x;
    //     val== 1? x = '/let': x='/const';

    //     console.log(x);
    // }
     




    // async function 

    return {
        // variables
         show,client_ids, employeeCTCReportSource, Employee_CTCReportDynamicHeaders,
         personalDetail,
         selectCategory,
         department,
         PeriodMonth,

        // functions
        fetchFilterClientIds,
        getEmployeeCTC,
        personalDetails,
        sentcategory,

        // sent Person Details  basic and detailed

        sentFilterClientIds,

        // getALLdepartment
        getALLdepartment,
        getEmployeeCTCReports,


        // get Period Month

        getPeriodMonth,
        updateEmployee_Basic_CTC,

        // DownloadEmployee CTC

        downloadEmployeeCTC,


        // download animation btn
        btn_download,

        canShowLoading
     

        // testings

    }
})