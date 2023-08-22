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

    <div class="bg-white p-2 my-2 rounded-lg grid grid-cols-12">
        <div class="grid grid-cols-12 gap-6 col-span-6">
            <div class="col-span-4">
                <p>Start date</p>
                <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true" class="h-10"
                    v-model="variable.start_date" />
            </div>
            <div class="col-span-4">
                <p>End date</p>
                <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true" class="h-10" v-model="variable.end_date" />
            </div>
            <div class=" d-flex justify-content-center align-items-end col-span-4 ">
                <button @click="getEmployeeAttendanceReports" class="btn btn-orange">Generate</button>

            </div>
        </div>
        <div class="col-span-6 flex justify-end gap-4">
            <button><img src="../../assests/printer.svg" alt="" srcset=""
                    class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
            <button><img src="../../assests/download.svg" alt="" srcset="" @click="downloadAbsentReports"
                    class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
        </div>
    </div>

    <div class="my-4">
        <DataTable :value="AttendanceReportSource"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column v-for="col of AttendanceReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
                style="white-space: nowrap;text-align: left; !important">

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
import { ref, onMounted, reactive } from 'vue';

const variable = reactive({
    start_date: '',
    end_date: '',
})



const AttendanceReportDynamicHeaders = ref([])
const AttendanceReportSource = ref([])
const canShowLoading = ref(false)

const getEmployeeAttendanceReports = async () => {

    // Attendance Basic Reports
    let url = '/fetch-attendance-data'
    canShowLoading.value = true
    await axios.get(url).then(res => {
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


onMounted(() => {
    // getEmployeeAttendanceReports()
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


