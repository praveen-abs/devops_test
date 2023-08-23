<template>
    <Dialog header="Header" v-model:visible="canShowLoading" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>
    <ul class="nav nav-pills  nav-tabs-dashed" id="pills-tab" role="tablist">
        <li class="mx-2 nav-item ember-view" role="presentation">
            <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true">
                <p class="text-md">PAYROLL</p>
            </a>
        </li>
        <li class=" nav-item ember-view" role="presentation">
            <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true">
                <p class="text-md">STATUTORY REPORTS</p>
            </a>
        </li>
        <li class=" nav-item ember-view" role="presentation">
            <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                data-bs-target="#investmentComputation" role="tab" aria-controls="pills-home" aria-selected="true">
                <p class="text-md">Attendance</p>
            </a>
        </li>
        <li class="nav-item ember-view" role="presentation">
            <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                data-bs-target="#form_12bb" role="tab" aria-controls="pills-home" aria-selected="true">
                <p class="text-md">LEAVES</p>
            </a>
        </li>
        <li class="nav-item ember-view" role="presentation">
            <a class="mx-2 nav-link ember-view" id="" data-bs-toggle="pill" href="" data-bs-target="#tax_filling" role="tab"
                aria-controls="pills-home" aria-selected="true">
                <p class="text-md">PMS/OKR</p>
            </a>
        </li>

    </ul>



    <div class="grid grid-cols-12">
        <div class="col-span-4">
            <ul class="nav nav-pills  nav-tabs-dashed" id="pills-tab" role="tablist">
                <li class="mx-2 nav-item ember-view" role="presentation">
                    <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                        data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true">
                        <p class="text-sm">Detailed Report</p>
                    </a>
                </li>
                <li class=" nav-item ember-view" role="presentation">
                    <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                        data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true">
                        <p class="text-sm">Muster Roll</p>
                    </a>
                </li>
                <li class=" nav-item ember-view" role="presentation">
                    <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                        data-bs-target="#investmentComputation" role="tab" aria-controls="pills-home" aria-selected="true">
                        <p class="text-sm"> Consolidate</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-span-8 flex justify-end gap-4">
            <div class="flex gap-3">
                <div>
                    <p class="text-sm">Report type:</p>
                </div>
                <div>
                    <Dropdown v-model="selectedCity" :options="reportsType" optionLabel="name" class="w-full md:w-14rem" />
                </div>
            </div>
            <div class="flex gap-3">
                <div>
                    <p class="text-sm">Date:</p>
                </div>
                <div>
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" class="w-full md:w-14rem" />
                </div>
            </div>
            <div class="flex gap-3">
                <div>
                    <p class="text-sm">Legal Entity :
                    </p>
                </div>
                <div>
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" class="w-full md:w-14rem" />
                </div>
            </div>
            <div class="flex gap-3">
                <div>
                    <p class="text-sm">Department:</p>
                </div>
                <div>
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" class="w-full md:w-14rem" />
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-2 my-2 rounded-lg grid grid-cols-12">
        <div class="col-span-6">
            <input type="text" placeholder="Search employee..." name="" class="border p-1.5 text-sm bg-gray-50 rounded-lg"
                id="">
            <input type="date" name="" id="" v-model="variable.start_date">
            <input type="date" name="" id="" v-model="variable.end_date">
            <button @click="getEmployeeAbsentReports" class="btn btn-orange">Generate</button>
        </div>
        <div class="col-span-6 flex justify-end gap-4">
<<<<<<< HEAD
            <button><img src="../../assests/icons/printer.svg" alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
            <button><img src="../../assests/icons/download.svg" alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
=======
            <button><img src="../../assests/icons/printer.svg" alt="" srcset=""
                    class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
            <button><img src="../../assests/icons/download.svg" alt="" srcset="" @click="downloadAbsentReports"
                    class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
            <button class="bg-gray-100 rounded-full p-2 text-sm flex">
                <p class="bg-orange-400 p-1 h-6 w-6 rounded-full text-xs">A</p>
                <p class="text-sm my-auto">Abbrevation</p>
            </button>
        </div>
    </div>

    <div class="my-4">
        <DataTable :value="AttendanceReportSource"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
<<<<<<< HEAD
            <Column v-for="col of AttendanceReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title" style="white-space: nowrap;text-align: left; !important">
=======
            <Column v-for="col of AttendanceReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
                style="white-space: nowrap;text-align: left; !important">

>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
            </Column>
        </DataTable>
    </div>

    <div class="mb-0">
        <div class="card-body">
            <div class="tab-content " id="pills-tabContent">
                <div class="tab-pane fade active show" id="investment_dec" role="tabpanel" aria-labelledby="pills-home-tab">
                </div>

                <div class="tab-pane fade " id="exemptions" role="tabpanel">

                </div>
                <div class="tab-pane fade " id="investmentComputation" role="tabpanel">

                </div>
                <div class="tab-pane fade " id="other_income" role="tabpanel" aria-labelledby="pills-home-tab">

                </div>
                <div class="tab-pane fade " id="other_exemptions" role="tabpanel" aria-labelledby="pills-home-tab">

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
<<<<<<< HEAD
import { ref, onMounted } from 'vue';
=======
import { ref, onMounted, reactive } from 'vue';

const variable = reactive({
    start_date: '',
    end_date: '',
})
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e

const products = ref([
    { product: 'Bamboo Watch', lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
    { product: 'Black Watch', lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
    { product: 'Blue Band', lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
    { product: 'Blue T-Shirt', lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 },

]);

const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);

const reportsType = ref([
    { name: 'Absent reports', code: '1' },
    { name: 'Detailed Report', code: '2' },
]);


const AttendanceReportDynamicHeaders = ref([])
const AttendanceReportSource = ref([])
const canShowLoading = ref(false)

const getEmployeeAttendanceReports = async () => {
<<<<<<< HEAD
    canShowLoading.value = true
    await axios.get('/fetch-attendance-data').then(res => {
=======

    // Attendance Basic Reports
    let url = '/fetch-attendance-data'
    canShowLoading.value = true
    await axios.get(url).then(res => {
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
        console.log(res.data.rows);
        AttendanceReportSource.value = res.data.rows
        res.data.header.forEach(element => {
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

<<<<<<< HEAD
onMounted(() => {
    getEmployeeAttendanceReports()
=======
const getEmployeeAbsentReports = () => {
    // Absent Reports
    let url = '/fetch-absent-report-data'
    canShowLoading.value = true
    axios.post(url, {
        start_date: variable.start_date,
        end_date: variable.end_date,
    }).then(res => {
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

const downloadAbsentReports = () => {
    let url = '/report/download-absent-report'
    canShowLoading.value = true
    axios.post(url, {
        start_date: variable.start_date,
        end_date: variable.end_date,
    }, { responseType: 'blob' }).then((response) => {
        console.log(response.data);
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(response.data);
        link.download = ` Absent Report_${new Date(variable.start_date).getDate()}_${new Date(variable.end_date).getDate()}.xlsx`;
        link.click();
    }).finally(() => {
        canShowLoading.value = false
    })
}

onMounted(() => {
    // getEmployeeAttendanceReports()
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
})


</script>


<style>
.p-dropdown
{
    display: inline-flex;
    cursor: pointer;
    position: relative;
    user-select: none;
    height: 20px;
}

.p-dropdown .p-dropdown-label
{
    background: transparent;
    border: 0 none;
    margin-top: -11px;
}
</style>


