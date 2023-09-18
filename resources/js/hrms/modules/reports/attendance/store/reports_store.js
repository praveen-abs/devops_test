import axios from "axios";
import { mixin } from "lodash";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { inject, reactive, ref } from "vue";

export const UseReports_store = defineStore("UseReports_store",()=>{

    // variable 

    const { downloand  } = ref();

    const legal_entity = ref();
    const department =ref();
    const PeriodMonth =  ref();

    const canShowLoading  = ref(false);

    const activetab =  ref(1);

    const btn_download = ref();

    const selectedfilters = reactive({
        date:"",
        department_id:"",
        legal_entity:"",
        active_status:""
    });

    const AttendanceReportSource = ref([]);
    const AttendanceReportDynamicHeaders =  ref([]);

    function fetchFilterClientId(){
        canShowLoading.value = true;
        axios.get('/clients-fetchAll').then((res)=>{
            legal_entity.value = res.data;
            console.log("legal_entity ::",legal_entity.value);
        }).finally(()=>{
            canShowLoading.value = false;
        })
    }

    // function 

    // function fetch

    // function 

    function get_All_Department(){
        canShowLoading.value = true;
     axios.get('/get-department').then((res)=>{
      department.value = res.data;
     }).finally(()=>{
         canShowLoading.value = false;
     })
 }

 function getPeriodMonth(){
    // let date = Date;
    canShowLoading.value = true;
    axios.post('/get-filter-months-for-reports').then((res)=>{
        PeriodMonth.value= res.data;
    }).finally(()=>{
        canShowLoading.value = false;
    })

}

// function 

function downloadEmployeeMaster(val){
    console.log(" value :: " , val );

} 

function getSelectoption(key,filterValue,active_status){
    console.log(key,filterValue,active_status);
    console.log(selectedfilters);
    let url;
    
    if(active_status==1){
        url = `/fetch-attendance-data`;
    }else{
        url = ``;
    }

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
                    selectedfilters.legal_entity = filterValue
                }

                if(active_status == 1){
                    // canShowLoading.value = true;
                
                    axios.post(url,selectedfilters).then(res => {
                        AttendanceReportSource.value = res.data.rows;
                        console.log(AttendanceReportSource.value," testings data");
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
    
                    })

                }else{

                }

}




    return{

        canShowLoading,

        // variables 
        legal_entity,
        department,
        PeriodMonth,
        btn_download,

        // navbar var
        activetab, 

        // functions 

        // fetch leagl entity
        fetchFilterClientId,
        get_All_Department,
       
        // 

        getPeriodMonth,
        getSelectoption
    }

});