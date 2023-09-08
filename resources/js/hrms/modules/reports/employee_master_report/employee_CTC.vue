<template>
    <div>
        <div class="bg-white p-2 flex  justify-between">
            <!-- v-model="filters['global'].value" -->
            <div>
                <InputText placeholder="Search"  v-model="filters['global'].value" class="border-color " style="height: 3em; "  />

                <Dropdown optionLabel="name" placeholder="Select Category" class="w-[200px] mx-2" />

            </div>
            <div class="flex items-center ">
                <h1>Personal Details -</h1>
                <button class="bg-[#E6E6E6] px-3 p-2 rounded-md mx-2 "  @click="personalDetails()" ><i class="pi pi-eye" v-if="show" ></i> <i v-else class="pi pi-eye-slash"></i></button>
                <button class=" bg-[#E6E6E6] p-2 mx-2 rounded-md"><i class="pi pi-download"></i> Download</button>
            </div>


        </div>

        <div>

            <DataTable :value="employeeCTCReportSource" :filters="filters"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column v-for="col of Employee_CTCReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
                style="white-space: nowrap;text-align: left; !important">

            </Column>
        </DataTable>

        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted, reactive } from 'vue';
import { FilterMatchMode } from 'primevue/api';


onMounted(()=>{
    getEmployeeCTC();
})


const show = ref(true);



const personalDetail =  ref();

const filters = ref({
    'global': { value: null, matchMode: FilterMatchMode.CONTAINS },
});


const employeeCTCReportSource = ref([]);

const Employee_CTCReportDynamicHeaders =  ref([]);

const getEmployeeCTC = () => {
    // Absent Reports
    // let url = '/fetch_employee_ctc_report'
    let url = '/fetch-employee-ctc-report'
    // canShowLoading.value = true
    axios.get(url).then(res => {
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

    if(show.value == true){
        console.log(show);
        show.value = false;
        personalDetail.value = "basic";
        console.log(personalDetail.value);
    }
    else if(show.value == false){
        show.value = true;
        personalDetail.value = "detailed";
        console.log(personalDetail.value);
    };

}

const downloadEmployeeCTC = () => {
    let url = '/report/download-early-going-report'
    canShowLoading.value = true
    axios.post(url, {
        start_date: variable.start_date,
        end_date: variable.end_date,
    }, { responseType: 'blob' }).then((response) => {
        console.log(response.data);
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(response.data);
        link.download = `Attendance Early Going Report_${new Date(variable.start_date).getDate()}_${new Date(variable.end_date).getDate()}.xlsx`;
        link.click();
    }).finally(() => {
        canShowLoading.value = false
    })
}


// , {
//         // start_date: variable.start_date,
//         // end_date: variable.end_date,
//     }



</script>