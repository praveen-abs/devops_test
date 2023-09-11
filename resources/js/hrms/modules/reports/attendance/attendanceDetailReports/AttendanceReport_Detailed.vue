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

    <div>
        <p class="font-semibold text-lg">Attendance Detail Reports</p>
    </div>

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
            <button><img src="../../../../assests/printer.svg" alt="" srcset=""
                    class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button>
            <button><img src="../../../../assests/download.svg" alt="" srcset="" @click="downloadDetailReports"
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

import { ref, onMounted, reactive } from 'vue';
import axios from 'axios'
import { FilterMatchMode, FilterOperator } from 'primevue/api';
import moment from 'moment';
import dayjs from 'dayjs';


const canShowLoading = ref(false)
const start_date = ref()
const end_date = ref()

const selected_options_calendar_type = { "name": "Choose", "value": "" };
const options_calendar_type = [
    { "name": "Choose", "value": "" },
    { "name": "Financial Year", "value": "financial_year" },
    { "name": "Calendar Year", "value": "calendar_year" }
];

const selected_options_year = { "name": "Choose", "value": "" };
const options_year = [
    { "name": "Choose", "value": "" },
    { "name": "April - 2021 to March - 2022", "value": "April - 2021 to March - 2022" },
    { "name": "April - 2022 to March - 2023", "value": "April - 2022 to March - 2023" }
];

const selected_assignment_period = { "name": "Choose", "value": "" };
const options_assignment_period = [
    { "name": "Choose", "value": "" },
    { "name": "Q1", "value": "q1" },
    { "name": "Q2", "value": "q2" },
    { "name": "Q3", "value": "q3" },
    { "name": "Q4", "value": "q4" },
];

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,

    },
});


const variable = reactive({
    start_date: '',
    end_date: '',
})



const AttendanceReportDynamicHeaders = ref([])
const AttendanceReportSource = ref([])

const getEmployeeAttendanceReports = async () => {

    // Attendance Basic Reports
    let url = '/fetch-attendance-data'
    canShowLoading.value = true
    await axios.post(url, {
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

const downloadDetailReports = () => {
    let url = '/reports/generate-detailed-attendance-report'
    canShowLoading.value = true
    axios.post(url, {
        start_date: variable.start_date,
        end_date: variable.end_date,
    }, { responseType: 'blob' }).then((response) => {
        console.log(response.data);
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(response.data);
        link.download = `Attendance Detailed Report_${dayjs(variable.start_date).format('DD-MM-YYYY')}_${dayjs(variable.end_date).format('DD-MM-YYYY')}.xlsx`;
        link.click();
    }).finally(() => {
        canShowLoading.value = false
    })
}





</script>
<style  lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap');


.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1.3rem 1rem;
    border: 1px solid #dee2e6;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-width: 0 0 1px 0;
    font-weight: 600;
    color: #fff;
    background: #003056;
    transition: box-shadow 0.2s;
    font-size: 13px;

    .p-column-title {
        color: #fff;
        font-size: 13px;
    }

    .p-column-filter {
        width: 100%;
    }

    #pv_id_2 {
        height: 30px;
    }

    .p-fluid .p-dropdown .p-dropdown-label {
        margin-top: -10px;
    }

    .p-dropdown .p-dropdown-label.p-placeholder {
        margin-top: -12px;
    }

    .p-column-filter-menu-button {
        color: white;
        margin-left: 10px;

    }

    .p-column-filter-menu-button:hover {
        color: white;
        border-color: transparent;
        background: #023e70;
    }

}

.p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
    margin-bottom: 0.5rem;
    visibility: hidden;
    position: absolute;
}

.p-button .p-component .p-button-sm {
    background-color: #003056;
}

.p-datatable .p-datatable-tbody>tr {
    font-size: 13px;

    .employee_name {
        font-weight: bold;
        font-size: 13.5px;
    }


}

.p-datatable .p-datatable-tbody>tr>td {
    text-align: left;
    border: 1px solid #dee2e6;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-width: 0 0 1px 0;
    padding: 1rem 0.6rem;

}

.p-datatable .p-datatable-tbody>tr>td:nth-child(1) {
    width: 20%;
}

//   .main-content{
//     width: 105%;
//   }

.pending {
    font-weight: 700;

}


.approved {
    font-weight: 700;

}

.p-button.p-component.p-button-success.Button {
    padding: 8px;
}

.rejected {
    font-weight: 700;
    color: #ff2634;
}

.p-button.p-component.p-button-danger.Button {
    padding: 8px;
}

.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
    color: red;
}

.p-button.p-component.p-confirm-dialog-accept {
    background-color: #003056;
}

.p-button.p-component.p-confirm-dialog-reject.p-button-text {
    color: #003056;
}

.p-column-filter-overlay-menu .p-column-filter-buttonbar {
    padding: 1.25rem;
    position: absolute;
    visibility: hidden;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
    width: 53%;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter-menu-button {
    color: white;
    border-color: transparent;

}

.p-column-filter-menu-button.p-column-filter-menu-button-open {
    background: none;
}

.p-column-filter-menu-button.p-column-filter-menu-button-active {
    background: none;

}


/* For Sort */

.p-datatable .p-sortable-column:not(.p-highlight):hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
    color: white
}

.p-datatable .p-sortable-column.p-highlight {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column.p-highlight:hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:focus {
    box-shadow: none;
    outline: none;
    color: white;
}

.p-datatable .p-sortable-column .p-sortable-column-icon {
    color: white
}

.pi-sort-amount-down::before {
    content: "\e9a0";
    color: white;
}

.pi-sort-amount-up-alt::before {
    content: "\e9a2";
    color: white;
}
</style>
