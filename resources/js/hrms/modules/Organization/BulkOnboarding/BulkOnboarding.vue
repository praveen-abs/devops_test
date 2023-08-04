<template>
    <Toast />
    <div class="" v-if="route.params.module == 'bulkOnboarding'">
        <ImportQuickOnboarding />
    </div>
    <Transition name="fade" v-else>
        <div class="h-screen w-full">
            <div class="flex">
                <div class="w-6 px-2">
                    <p class="font-bold text-2xl">Employee Bulk Onboarding</p>
                    <ul class="list-disc p-2 my-3">
                        <li class="font-semibold fs-6">Download the <a href="/assets/ABSBulkOnboarding.xls"
                                class="text-blue-300 font-semibold fs-6 cursor-pointer">Sample</a>
                        </li>
                        <li class="font-semibold fs-6">Fill the information in excel template</li>
                    </ul>
                    <div class="flex">
                        <label class="border-1 p-2 font-semibold fs-6 border-gray-500 rounded-lg cursor-pointer w-full mr-3"
                            for="file"><i class="pi pi-folder px-2" style="font-size: 1rem"></i>Browse <span
                                class=" p-2 border-l border-l-gray-500 px-6">
                                {{ useStore.selectedFile ? useStore.selectedFile.name : '' }}</span></label>
                        <input type="file" name="" id="file" hidden @change="useStore.getExcelForUpload($event)"
                            accept=".xls, .xlsx">
                        <!-- <p class="border-1 p-2 w-8 mx-2 border-gray-500 rounded-lg">
                            {{ selectedFile ? selectedFile.name : '' }}
                        </p> -->
                    </div>
                    <button class="btn btn-orange mt-6 float-right mx-5"
                        @click="useStore.convertExcelIntoArray('bulk')">Upload</button>
                </div>
                <div>
                    <div class="col-form-label">
                        <!-- <p class="font-semibold fs-4"> Upload Instructions</p> -->
                        <div class="py-2  bg-red-100 rounded-lg f-12 alert-warning font-semibold fs-6"><i
                                class='fa fa-warning text-danger mx-2'></i>
                            Read these instructions before uploading the file.
                        </div>
                        <div>
                            <ul class="list-disc font-semibold m-4" style="">
                                <li class="font-semibold fs-6">
                                    The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be
                                    filled in before adding workers.</li>
                                <li class="font-semibold fs-6">
                                    When adding an employee, you must enter your mobile phone
                                    number.</li>
                                <li class="font-semibold fs-6">
                                    To receive all messages, including those about timesheet reminders, leave requests, and
                                    attendance requests, your email address must be current.
                                </li>

                                <li class="font-semibold fs-6">
                                    Each employee's email is different. Therefore, an employee cannot be added to two
                                    organisations using
                                    the same email.</li>

                                <li class="font-semibold fs-6">
                                    Designation is required because, in cases when two or more workers share the same Name,
                                    it will aid in
                                    locating them in People Picker search results. </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <DataTable ref="dt" dataKey="id" :paginator="true" class="mt-3"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
                <Column field="Employee" header="Employee's"></Column>
                <Column field="Employee code" header="Month"></Column>
                <Column field="Employee code" header="Date Time"></Column>
                <Column field="Employee code" header="Total Employees Onboarded"></Column>
                <Column field="Employee code" header="Action"></Column>
            </DataTable>
        </div>
    </Transition>

    <Transition name="fade">
        <Dialog header="Header" v-model:visible="useStore.canShowloading"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
            :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog>
    </Transition>
</template>


<script setup>

import { onMounted, onUpdated, ref } from 'vue';
import * as XLSX from 'xlsx';
import ImportQuickOnboarding from '../QuickOnboarding/ImportQuickOnboarding.vue'
import { useRouter, useRoute } from "vue-router";
import { useOnboardingMainStore } from '../stores/OnboardingMainStore';
import { Service } from '../../Service/Service';
import { useNormalOnboardingMainStore } from '../Normal_Onboarding/stores/NormalOnboardingMainStore';


const useStore = useOnboardingMainStore()
const useNormalOnboardingStore = useNormalOnboardingMainStore()


onMounted(() => {
    useStore.getExistingOnboardingDocuments()
    useNormalOnboardingStore.getBasicDeps()
})

onUpdated(() => {


    if (useStore.initialUpdate) {
        useStore.currentlyImportedTableEmployeeCodeValues.splice(0, useStore.currentlyImportedTableEmployeeCodeValues.length)
        useStore.currentlyImportedTableAadharValues.splice(0, useStore.currentlyImportedTableAadharValues.length)
        useStore.currentlyImportedTableMobileNumberValues.splice(0, useStore.currentlyImportedTableMobileNumberValues.length)
        useStore.currentlyImportedTableAccNoValues.splice(0, useStore.currentlyImportedTableAccNoValues.length)
        useStore.currentlyImportedTablePanValues.splice(0, useStore.currentlyImportedTablePanValues.length)
        useStore.currentlyImportedTableEmailValues.splice(0, useStore.currentlyImportedTableEmailValues.length)
    }
    // if (useStore.isValueUpdated) {
    //     useStore.currentlyImportedTableEmployeeCodeValues.splice(0, useStore.currentlyImportedTableEmployeeCodeValues.length)
    //     useStore.currentlyImportedTableAadharValues.splice(0, useStore.currentlyImportedTableAadharValues.length)
    //     useStore.currentlyImportedTableAccNoValues.splice(0, useStore.currentlyImportedTableAccNoValues.length)
    //     useStore.currentlyImportedTablePanValues.splice(0, useStore.currentlyImportedTablePanValues.length)
    //     useStore.currentlyImportedTableEmailValues.splice(0, useStore.currentlyImportedTableEmailValues.length)
    // };
})




const router = useRouter();
const route = useRoute();

const sampleTemplate = ref([
    {
        "Location": "",
        Aadhar: '',
        "Account No": '',
        "Bank Name": " ",
        "Bank ifsc": "",
        Basic: '',
        "Child DOB": '',
        "Child Education Allowance": '',
        "Child Name": '',
        "Confirmation Period": '',
        "Cost Center": '',
        "Current Address": "",
        DOB: '',
        DOJ: '',
        Department: "",
        Designation: "",
        "EPF Employer Contribution": '',
        "EPf Employee": '',
        "ESIC Employee": '',
        "ESIC Employer Contribution": '',
        Email: "",
        "Emp Notice": '',
        "Employee Name": "",
        "Employee code": "",
        "Esic applicable": "",
        "Father DOB": "",
        "Father Gender": "",
        "Father name": "",
        "Food Coupon": "",
        Gender: "",
        Graduity: "",
        HRA: "",
        "Holiday Location": "",
        Insurance: "",
        "L1 Manager Code": "",
        "L1 Manager Name": "",
        LTA: "",
        "Labour Welfare Fund": "",
        "Lwf location": "",
        "Marital Status": " ",
        "Mobile Number": "",
        "Mother DOB": "",
        "Mother Gender": "",
        "Mother Name": "",
        "Net Income ": "",
        "No of child": "",
        "Official Mail": "",
        "Official Mobile": "",
        "Other Allowance": "",
        "Pan Ack": "",
        "Pan No": "",
        "Permanent Address": "",
        "Pf applicable ": "",
        Process: "",
        "Professional Tax": "",
        "Ptax location ": "",
        "Special Allowance": "",
        "Spouse DOB": "",
        "Spouse Name": "",
        "Statutory Bonus": "",
        "Work Location": "",
        "dearness  allowance ": "",
        "tax regime ": "",
        "uan number": ""
    }
])

const selectedFile = ref()


</script>



<style>
.page-content {
    padding: calc(20px + 1.5rem) calc(1.5rem / 2) 50px calc(1.5rem / 2);
}
</style>
