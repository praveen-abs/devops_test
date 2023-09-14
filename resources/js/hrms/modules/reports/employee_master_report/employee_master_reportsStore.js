import axios from "axios";
import { mixin } from "lodash";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { inject, reactive, ref } from "vue";


export const EmployeeMasterStore = defineStore("EmployeeMasterStore", ()=>{

    // variable 


    // employee CTC 

    const legal_Entity = ref();
    const Department = ref();
    const period_Date = ref();
    const select_Category = ref();

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
    const filterbtn = ref(1);
    // const 
    const canShowLoading   = ref(false);
    const selectedfilters = reactive({
        date:"",
        department_id:"",
        legal_entity:"",
        active_status:""
    });

    // 


const getEmployeeCTC = () => {
    // Absent Reports
    // let url = '/fetch_employee_ctc_report'
    let url = '/fetch-employee-ctc-report'
    canShowLoading.value = true;
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

        selectedfilters.department_id = department_id;

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

        selectedfilters.date = Date;
    }

    // 

    const downloadEmployeeCTC = () => {
    let url = '/generate-employee-ctc-report'
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

function updateEmployeeApplyFilter(val){
    filterbtn.value = val;
    if(val===2){
        axios.post('/fetch-employee-ctc-report',selectedfilters)
        .then(res => {
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
// 
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

      

    }else{
        selectedfilters.active_status="";
        selectedfilters.date="";
        selectedfilters.department_id="";
        selectedfilters.legal_entity="";

        legal_Entity.value="";
        Department.value="";
        period_Date.value="";
        select_Category.value="";

        getEmployeeCTC();
    }


}

// employee master ctc

const employeeMaterReportSource = ref([]);
const Employee_MaterReportDynamicHeaders =  ref([]);

    function getemployeeMater(){
        let url = '/fetch-master-employee-report'
        canShowLoading.value = true;
        axios.post(url,{
            type:""
        }).then(res => {
            console.log(res.data.rows,"get value ");
            employeeMaterReportSource.value = res.data.rows
            console.log(employeeMaterReportSource.value," testings data");
            res.data.headers.forEach(element => {
                let format = {
                    title: element
                }
                Employee_MaterReportDynamicHeaders.value.push(format)
                console.log(element);
            });
            console.log(Employee_MaterReportDynamicHeaders.value);
    
        }).finally(() => {
            canShowLoading.value = false;
        })
    }

    function downloadEmployeeMaster(){

        let url = '/generate-employee-ctc-report'
        canShowLoading.value = true;
        axios.post(url,selectedfilters, { responseType: 'blob' }).then((response) => {
            console.log(response.data);
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(response.data);
            // ${new Date(variable.start_date).getDate()}_${new Date(variable.end_date).getDate()}
            link.download = `Employee Master Report_.xlsx`;
            link.click();
        }).finally(() => {
            btn_download.value = false;
            canShowLoading.value = false;
        })

    }

    function updateEmployeeMasterApplyFilter(val){
        canShowLoading.value = true;
        filterbtn.value = val;
        if(val===2){
                  axios.post('/fetch-master-employee-report',selectedfilters).then(res => {
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
    // 
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
        
            }).finally(()=>{
                canShowLoading.value = false;
            })
    
          
    
        }else{
            selectedfilters.active_status="";
            selectedfilters.date="";
            selectedfilters.department_id="";
            selectedfilters.legal_entity="";
    
            legal_Entity.value="";
            Department.value="";
            period_Date.value="";
            select_Category.value="";
    
            getemployeeMater();
        }
    
    
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
        updateEmployeeApplyFilter,

        // DownloadEmployee CTC

        downloadEmployeeCTC,


        // download animation btn
        btn_download,

        canShowLoading,

        filterbtn,

        legal_Entity,
        Department,
        period_Date,
        select_Category,
     

        // testings

        // employee master report 
        getemployeeMater,
        employeeMaterReportSource,
        Employee_MaterReportDynamicHeaders ,
        downloadEmployeeMaster,
        updateEmployeeMasterApplyFilter



    }
})