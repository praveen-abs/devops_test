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

            <DataTable :value="employeeCTCReportSource"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column v-for="col of Employee_CTCReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
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

const Basic_details =  ref(1);

const employeeCTCReportSource = ref([]);

const Employee_CTCReportDynamicHeaders =  ref([]);

const getEmployeeCTC = () => {
    // Absent Reports
    let url = '/fetch_employee_ctc_report'
    // canShowLoading.value = true
    axios.get(url, {
        // start_date: variable.start_date,
        // end_date: variable.end_date,
    }).then(res => {
        console.log(res.data.rows);
        employeeCTCReportSource.value = res.data.rows
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

onMounted(()=>{
    getEmployeeCTC();
})

</script>