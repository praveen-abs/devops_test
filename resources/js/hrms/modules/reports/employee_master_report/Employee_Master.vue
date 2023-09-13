<template>
    <div>

    <div>
        <div class="bg-white p-2 flex  justify-between">
            <!-- v-model="filters['global'].value" -->
            <div>
                <InputText placeholder="Search" class="border-color " style="height: 3em; font-['poppins'] " />

                <Dropdown optionLabel="name" placeholder="Select Category" class="w-[200px] mx-2" />

            </div>
            <div class="flex items-center ">
                <div>
                    <button class="px-3 py-2 " :class="[Basic_details==1 ? 'bg-black  text-[white] rounded-l-md' : ' bg-[#E6E6E6] text-black rounded-l-md']" @click="Basic_details=1">Basic</button>
                    <button class="px-3 py-2 " :class="[Basic_details==2 ? 'bg-black text-[white] rounded-r-md' : ' bg-[#E6E6E6] text-black  rounded-r-md']" @click="Basic_details=2">Detail</button>
                </div>
                <button class=" bg-[#E6E6E6] p-2 mx-3 rounded-md"><i class="pi pi-download"></i> Download</button>
            </div>


        </div>

        <div>

            <DataTable :value="UseEmployeeMaster.employeeMaterReportSource"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column v-for="col of UseEmployeeMaster.Employee_MaterReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
                style="white-space: nowrap;text-align: left; !important">
            </Column>
        </DataTable>

        </div>
    </div>
        
    </div>
</template>
<script setup>
import axios from 'axios';
import { ref, onMounted, reactive } from 'vue';

import { EmployeeMasterStore } from "./employee_master_reportsStore" ;

const Basic_details =  ref(1);


const UseEmployeeMaster = EmployeeMasterStore();

onMounted(()=>{
    UseEmployeeMaster.getemployeeMater();
    // fetchFilterClientIds();
});

</script>