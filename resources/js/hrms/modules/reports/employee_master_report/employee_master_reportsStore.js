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
    const personalDetail =  ref();
    const show = ref(true);
    const employeeCTCReportSource = ref([]);
    const Employee_CTCReportDynamicHeaders =  ref([]);
    const department = ref();
    const PeriodMonth = ref();
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
    // canShowLoading.value = true
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
        // canShowLoading.value = false;
    })
}

    function fetchFilterClientIds(){
        axios.get('/filter-client-ids').then((res)=>{
            client_ids.value = res.data;
            console.log(client_ids.value);
        })
    }

    function sentFilterClientIds(legalEntity){
        selectedfilters.legal_entity = legalEntity;
        // let legalEntityID =  legalEntity;
        console.log(legalEntityID, " legal entity :: ");
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
            // canShowLoading.value = false;
        })
    }

    function personalDetails(){
        employeeCTCReportSource.value.splice(0);
        Employee_CTCReportDynamicHeaders.value.splice(0);
    
        if(show.value == true){
            console.log(show);
            show.value = false;
            personalDetail.value = "detailed";
            console.log(personalDetail.value);
        }
        else if(show.value == false){
            show.value = true;
            personalDetail.value = "";
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
        axios.get('/get-department').then((res)=>{
         department.value = res.data;
        });
    }

    function getEmployeeCTCReports(department_id){
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
        axios.post('/get-filter-months-for-reports').then((res)=>{
            PeriodMonth.value= res.data;
        })

    }

    function updateEmployee_Basic_CTC(Date){
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
        updateEmployee_Basic_CTC
     

        // testings

    }
})