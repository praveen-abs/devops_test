<template>
    <div class="w-full">
        <!-- <ConfirmDialog></ConfirmDialog> -->
        <Toast />
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

        <Dialog header="Confirmation" v-model:visible="canShowConfirmation"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Proceed to save the shift details?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="saveWorkShiftDetails()" class="p-button-text" autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>

        <div class="flex px-4 pt-6 gap-9">

            <div>
                <span class="text-lg font-semibold">Shift Name</span>
                <span class="mx-2">
                    <InputText type="text" v-model="useAttendanceStore.shiftDetails.txt_shift_name"
                        placeholder="Enter the shift name" />
                </span>
            </div>
            <div>
                <span class="text-lg font-semibold">Shift Code</span>
                <span class="mx-2">
                    <InputText type="text" v-model="useAttendanceStore.shiftDetails.Shift_Code"
                        placeholder="Enter the shift code" />
                </span>
            </div>
            <div class="flex my-2">
                <p class="text-lg font-semibold px-3">Is Default</p>
                <Checkbox v-model="useAttendanceStore.shiftDetails.Is_Default" :binary="true" />
            </div>
        </div>
        <!--  -->

        <div class="w-full p-4 mx-5 ">
            <div class="flex gap-4 pt-4 ">
                <div>
                    <input style="height: 23px;width: 23px;" value="Apply Flexible Gross Hours"
                        class="mt-1 form-check-input" type="radio" name="leave" v-model="useAttendanceStore.change">
                </div>
                <div>
                    <p class="font-semibold py-auto">Apply Flexible Gross Hours</p>
                </div>
                <div class="flex">
                    <InputText type="text" v-model="txt_shift_start_time" class="w-8 h-10" />
                    <p class="mx-4 text-lg font-semibold text-gray-600 py-auto">Min</p>
                </div>
            </div>
            <div class="p-3 my-5 rounded-lg bg-blue-50 ">
                <div class="flex gap-4 col-12">
                    <input style="height: 20px;width: 20px;" value="Apply Standard General Shift Timing"
                        class="form-check-input" type="radio" name="leave" v-model="useAttendanceStore.change">
                    <p class="font-semibold">Apply Standard General Shift Timing</p>
                </div>
                <div v-if="useAttendanceStore.change == 'Apply Standard General Shift Timing'">
                    <div class="flex mx-6 my-4 row">
                        <div class="flex gap-4 col-6 ">
                            <div>
                                <p class="text-lg font-semibold py-auto">Shift Start Time</p>
                            </div>
                            <div>
                                <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />
                            </div>
                        </div>
                        <div class="flex gap-4 col-6">
                            <div>
                                <p class="text-lg font-semibold py-auto">Shift End Time</p>

                            </div>
                            <div>
                                <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />
                            </div>

                        </div>
                    </div>
                    <div class="flex mx-6 my-4 row ">
                        <div class="flex gap-1 col-6 d-flex align-items-center">
                            <div class="">
                                <p class="text-lg font-semibold py-auto ">Week Off</p>
                            </div>
                            <div class="ml-7 col-9">
                                <MultiSelect v-model="useAttendanceStore.shiftDetails.Week_Off" :options="Week_Off_Days"
                                    optionLabel="name" placeholder="Select Week Off" :maxSelectedLabels="3" class="h-15"
                                    style="width:180px" />
                            </div>
                        </div>
                        <div class="flex gap-1 col-6">
                            <div>
                                <p class="text-lg font-semibold py-auto">Grace Time</p>

                            </div>
                            <div class="ml-6 col-9">
                                <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <DataTable :value="useAttendanceStore.Week_Off_Days" tableStyle="min-width: 50rem">
                <!-- <Column selectionMode="multiple" headerStyle="width: 3rem"></Column> -->
                <Column field="weeks" header="Days">
                </Column>
                <Column field="week_off_list" header="ALL Weeks">
                    <template #body="slotProps">
                        <div>
                            <input @change="useAttendanceStore.updateWeekOffState(slotProps.data)"
                                style="height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="" id=""
                                v-model="slotProps.data.AllWeeks">
                        </div>
                    </template>
                </Column>
                <Column field="first_week" header="1st Week">
                    <template #body="slotProps">
                        <div>
                            <input @change="useAttendanceStore.updateWeekOffState(slotProps.data)"
                                style="height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="" id=""
                                :checked="slotProps.data.AllWeeks" v-model="slotProps.data.first_week"  >
                        </div>
                    </template>
                </Column>
                <Column field="sec_week" header="2nd Week">
                    <template #body="slotProps">
                        <div>
                            <input @change="useAttendanceStore.updateWeekOffState(slotProps.data)"
                                style="height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="" id=""
                                :checked="slotProps.data.AllWeeks" v-model="slotProps.data.sec_week">
                        </div>
                    </template>
                </Column>
                <Column field="third_week" header="3rd Week">
                    <template #body="slotProps">
                        <div>
                            <input @change="useAttendanceStore.updateWeekOffState(slotProps.data)"
                                style="height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="" id=""
                                :checked="slotProps.data.AllWeeks" v-model="slotProps.data.third_week">
                        </div>
                    </template>
                </Column>
                <Column field="fourth_week" header="4th Week">
                    <template #body="slotProps">
                        <div>
                            <input @change="useAttendanceStore.updateWeekOffState(slotProps.data)"
                                style="height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="" id=""
                                :checked="slotProps.data.AllWeeks" v-model="slotProps.data.fourth_week">
                        </div>
                    </template>
                </Column>
                <Column field="fifth_week" header="5th Week">
                    <template #body="slotProps">
                        <div>
                            <input @change="useAttendanceStore.updateWeekOffState(slotProps.data)"
                                style="height: 20px;width: 20px; " class="form-check-input" type="checkbox" name="" id=""
                                :checked="slotProps.data.AllWeeks" v-model="slotProps.data.fifth_week">
                        </div>
                    </template>
                </Column>
                <!-- <Column field="quantity" header=""></Column> -->
            </DataTable>



        </div>

        <!--  -->

        <div class="flex mx-4 my-6">
            <span class="text-lg font-semibold">Assign To</span>
            <span class="p-2 mx-4 my-auto mb-5 rounded-lg bg-red-50 fotn-bold"> <strong
                    class="text-orange-300">Note:</strong>
                Particular employees cannot be assigned to more than one shift unless he or she is assigned to a flexible
                shift.</span>
        </div>

        <div class="flex justify-between mx-4">
            <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Department"
                class="w-full md:w-14rem text-blue-900" style="border:1px solid navy" />
            <Dropdown v-model="selectedCity" style="border:1px solid navy" :options="cities" optionLabel="name"
                placeholder="Designation" class="w-full md:w-14rem text-blue-900" />
            <Dropdown v-model="selectedCity" style="border:1px solid navy" :options="cities" optionLabel="name"
                placeholder="Location" class="w-full md:w-14rem text-blue-900" />
            <Dropdown v-model="selectedCity" style="border:1px solid navy" :options="cities" optionLabel="name"
                placeholder="State" class="w-full md:w-14rem text-blue-900" />
            <Dropdown v-model="selectedCity" style="border:1px solid navy" :options="cities" optionLabel="name"
                placeholder="Branch" class="w-full md:w-14rem text-blue-900" />
            <Dropdown v-model="selectedCity" style="border:1px solid navy" :options="cities" optionLabel="name"
                placeholder="Legal Entity" class="w-full md:w-14rem text-blue-900 " />

        </div>

        <!-- <Calendar id="calendar-timeonly"  timeOnly hourFormat="12" /> -->
        <div class="mx-4">
            <InputText type="text" v-model="txt_shift_name" placeholder="Search..." class="my-4" />
            <!-- {{useAttendanceStore.array_shiftDetails}} -->
            <DataTable :value="useAttendanceStore.array_shiftDetails"
                v-model:selection="useAttendanceStore.selectedEmployees" :paginator="true" :rows="2" dataKey="emp_code"
                :rowsPerPageOptions="[5, 10, 25]"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" v-model:filters="filters"
                filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
                <template #empty> No Employee found </template>
                <template #loading> Loading employee data. Please wait. </template>
                <Column selectionMode="multiple"></Column>
                <Column field="emp_code" header="Employee ID" style="min-width: 2rem;">
                    <template #body="slotProps">
                        {{ slotProps.data.emp_code }}
                    </template>

                </Column>
                <Column field="employee_name" header="Employee Name" style="min-width: 8rem;">
                    <template #body="slotProps">
                        {{ slotProps.data.employee_name }}
                    </template>

                </Column>
                <Column field="designation" header="Designation" style="min-width: 10rem;">
                    <template #body="slotProps">
                        {{ slotProps.data.designation }}
                    </template>

                </Column>
                <Column style="min-width: 10rem;" field="department_name" header="Department">
                    <template #body="slotProps">
                        {{ slotProps.data.department_name }}
                    </template>

                </Column>
                <Column style="min-width: 10rem;" field="work_location" header="Location">
                    <template #body="slotProps">
                        {{ slotProps.data.work_location }}
                    </template>
                </Column>
                <Column style="min-width: 10rem;" field="work_location" header="State">
                    <template #body="slotProps">
                        {{ slotProps.data.work_location }}
                    </template>
                </Column>
            </DataTable>

        </div>
        <div class="my-3 text-end">
            <!-- <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"  @click="useAttendanceStore.saveWorkShiftDetails()" >Save</button> -->
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="useAttendanceStore.manageshift_exemption_steps++">Next</button>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import dateFormat, { masks } from "dateformat";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
// import {GeneralShift} from "../GeneralShift/GeneralShift.vue"
import { useAttendanceSettingMainStore } from '../../stores/attendanceSettingMainStore';

const useAttendanceStore = useAttendanceSettingMainStore();

let canShowConfirmation = ref(false);

// const checked =ref(false);

const checkdata = ref();
const checked = (data) => {

    checkdata.value = data;
    console.log(data);

}



onMounted(() => {
    console.log(useAttendanceStore.manageshift_exemption_steps);
})


// const confirm = useConfirm();
// const toast = useToast();

const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);

const select_Week_Off = ref({});





const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    emp_code: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    designation: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    department_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    location: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
});


let currentlySelectedStatus = null;
let currentlySelectedRowData = null;

onMounted(() => {
    //   ajax_GetEmployeeDetails();
    useAttendanceStore.fetchShiftDetails();
});

function onClickGetEmployees() {
    console.log(
        "onClickGetEmployees() button clicked : Shift Name :: " + txt_shift_name.value
    );
    console.log("Selected Employees : " + JSON.stringify(selectedEmployees.value));
}



function showConfirmDialog() {
    canShowConfirmation.value = true;

    // console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}

function hideConfirmDialog(canClearData) {
    canShowConfirmation.value = false;

    if (canClearData) resetVars();
}



////PrimeVue ConfirmDialog code -- Keeping here for reference
//const confirm = useConfirm();

// function confirmDialog(selectedRowData, status) {
//     console.log("Showing confirm dialog now...");

//     confirm.require({
//         message: 'Are you sure you want to proceed?',
//         header: 'Confirmation',
//         icon: 'pi pi-exclamation-triangle',
//         accept: () => {
//             toast.add({severity:'info', summary:'Confirmed', detail:'You have '+status, life: 3000});
//         },
//         reject: () => {
//             console.log("Rejected");
//             //toast.add({severity:'error', summary:'Rejected', detail:'You have rejected', life: 3000});
//         }
//     });
// }

const css_statusColumn = (data) => {
    return [
        {
            pending: data.status === "Pending",
            approved: data.status === "Approved",
            rejected: data.status === "Rejected",
        },
    ];
};

/*
    Input : Emp array obj
    Output : A 1-D array of emp ids.

*/

</script>


{
    <!--




<template>
    <div class="card">
        <DataTable v-model:selection="selectedProduct" :value="products" dataKey="id" tableStyle="min-width: 50rem">
            <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
            <Column field="code" header="Code"></Column>
            <Column field="name" header="Name"></Column>
            <Column field="category" header="Category"></Column>
            <Column field="quantity" header="Quantity"></Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { ProductService } from '@/service/ProductService';

onMounted(() => {
    ProductService.getProductsMini().then((data) => (products.value = data));
});

const products = ref();
const selectedProduct = ref();
const metaKey = ref(true);

</script>




<template>
    <div class="card flex justify-content-center">
        <Checkbox v-model="checked" :binary="true" />
    </div>
</template>

<script setup>
import { ref } from "vue";

const checked = ref(false);
</script>
     -->
}

