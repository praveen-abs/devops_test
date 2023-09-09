<template>
    <div>
        <div class="bg-white p-2 flex  justify-between">
            <!-- v-model="filters['global'].value" -->
            <div>
                <InputText placeholder="Search"  v-model="filters['global'].value" class="border-color " style="height: 3em; "  />

                <Dropdown optionLabel="name" :options="dropdown" placeholder="Select Category" class="w-[200px] mx-2" />

                <button class=" px-3 py-2 bg-black text-white rounded-lg hover:bg-sky-700 " @click="UseEmployeeMaster.getEmployeeCTC" >Clear All</button>

            </div>
            <div class="flex items-center ">
                <h1 class=" font-semibold font-['poppins]">Personal Details -</h1>
                <button class="bg-[#E6E6E6] px-3 p-2 rounded-md mx-2 "  @click="UseEmployeeMaster.personalDetails()" >
                    <i class="pi pi-eye" v-if="UseEmployeeMaster.show" ></i> <i v-else-if="!UseEmployeeMaster.show" class="pi pi-eye-slash"></i></button>
                <button class=" bg-[#E6E6E6] p-2 mx-2 rounded-md"><i class="pi pi-download"></i> Download</button>
            </div>


        </div>

        <div>

            <DataTable :value="UseEmployeeMaster.employeeCTCReportSource" :filters="filters"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column v-for="col of UseEmployeeMaster.Employee_CTCReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
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
import { EmployeeMasterStore } from "./employee_master_reportsStore" ;


const UseEmployeeMaster = EmployeeMasterStore();

onMounted(()=>{
    UseEmployeeMaster.getEmployeeCTC();
    // fetchFilterClientIds();
});

const dropdown = ref([
    {name: "Active" , id:1},
    {name: "Yet To Active" , id:0},
    {name: "Exit" , id:-1},
])





const client_ids = ref([]);





const filters = ref({
    'global': { value: null, matchMode: FilterMatchMode.CONTAINS },
});






// const downloadEmployeeCTC = () => {
//     let url = '/report/download-early-going-report'
//     canShowLoading.value = true
//     axios.post(url, {
//         start_date: variable.start_date,
//         end_date: variable.end_date,
//     }, { responseType: 'blob' }).then((response) => {
//         console.log(response.data);
//         var link = document.createElement('a');
//         link.href = window.URL.createObjectURL(response.data);
//         link.download = `Attendance Early Going Report_${new Date(variable.start_date).getDate()}_${new Date(variable.end_date).getDate()}.xlsx`;
//         link.click();
//     }).finally(() => {
//         canShowLoading.value = false
//     })
// }


// , {
//         // start_date: variable.start_date,
//         // end_date: variable.end_date,
//     }




// function sentFilterClientIds(){
//     axios.post(url).then((res)=>{
//         console.log();
//     })

// }


</script>