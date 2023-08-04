<template>
    <div class="grid grid-cols-3 w-8/12 place-content-center mx-auto my-2">
        <!-- <div class="flex">
            <label class="border-1 p-2 font-semibold fs-6 border-gray-500 rounded-lg cursor-pointer" for="file"><i
                    class="pi pi-folder px-2" style="font-size: 1rem"></i>Browse</label>
            <input type="file" name="" id="file" hidden @change="useStore.convertExcelIntoArray($event)"
                accept=".xls, .xlsx">
        </div> -->
        <div class="bg-white text-black p-2 font-semibold fs-6 mx-6 rounded-lg">Total Records : <span class="font-bold">
                {{ useStore.totalRecordsCount.length ? useStore.totalRecordsCount[0].length : 0 }}
            </span>
        </div>
        <div class="bg-green-100  text-black p-2 font-semibold fs-6 mx-6 rounded-lg">Processed Records : <span
                class="font-bold">
                {{ useStore.totalRecordsCount.length ? useStore.totalRecordsCount[0].length -
                    useStore.errorRecordsCount.length : 0 }}</span>
        </div>
        <div class="bg-red-100  text-black p-2 font-semibold fs-6 mx-6 rounded-lg">Error Records : <span class="font-bold">
                {{ useStore.errorRecordsCount.length }}</span>
        </div>
    </div>

    <div class="py-5">
        <p class="font-semibold fs-6">Sample format:</p>
        <div class="table-responsive">
            <DataTable class="my-4" :value="sampleTemplate" tableStyle="min-width: 50rem" responsiveLayout="scroll">
                <Column v-for="col of  sampleTemplateHeaders " :key="col.title" :field="col.title" style="min-width: 12rem;"
                    :header="col.title"></Column>
            </DataTable>
        </div>
    </div>


    <div class="table-responsive">
        <p class="font-semibold fs-6">Original data:</p>
        <DataTable class="py-4" :value="useStore.EmployeeQuickOnboardingSource" tableStyle="min-width: 50rem"
            responsiveLayout="scroll" editMode="cell" @cell-edit-complete="onCellEditComplete" stateStorage="session"
            stateKey="dt-state-demo-session" v-if="useStore.EmployeeQuickOnboardingSource"
            :rows="useStore.EmployeeQuickOnboardingSource.length">


            <Column v-for="col of  useStore.EmployeeQuickOnboardingDynamicHeader " :key="col.title" :field="col.title"
                style="min-width: 12rem;" :header="col.title">

                <template #body="{ data, field }">
                    <div v-if="field.includes('Employee Code')"
                        :class="[useStore.findCurrentTableDups(useStore.currentlyImportedTableEmployeeCodeValues, data['Employee Code']) || !useStore.isUserExists(data['Employee Code']) ? 'bg-red-100 p-2 rounded-lg' : '']">
                        <p class="font-semibold fs-6">
                            <i class="fa fa-exclamation-circle text-warning mx-2 cursor-pointer" aria-hidden="true"
                                v-tooltip.right="'User code is already exists'"
                                v-if="!useStore.isUserExists(data['Employee Code'])"></i>
                            {{ data['Employee Code'] }}
                        </p>
                    </div>
                    <p v-else-if="field == 'Aadhar'"
                        :class="[useStore.findCurrentTableDups(useStore.currentlyImportedTableAadharValues, data['Aadhar']) || useStore.isValidAadhar(data['Aadhar']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning mx-2 cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'User code is already exists'"
                            v-if="useStore.isAadharExists(data['Aadhar'])"></i>
                        {{ data['Aadhar'] }}
                    </p>
                    <p v-else-if="field == 'Employee Name'"
                        :class="[useStore.isLetter(data['Employee Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Employee Name'] }}
                    </p>
                    <p v-else-if="field == 'Email'"
                        :class="[useStore.findCurrentTableDups(useStore.currentlyImportedTableEmailValues, data['Email']) || useStore.isEmail(data['Email']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6 flex items-center">
                        <i class="fa fa-exclamation-circle text-warning  cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Email is already exists'"
                            v-if="useStore.existingEmails.includes(data['Email'])"></i>
                    <p class="font-semibold fs-6 px-2 py-auto">{{ data['Email'] }}</p>
                    </p>
                    <p v-else-if="field.includes('Mobile Number')"
                        :class="[useStore.findCurrentTableDups(useStore.currentlyImportedTableMobileNumberValues, data[field]) || useStore.existingMobileNumbers.includes(data[field]) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Mobile number is already exists'"
                            v-if="useStore.existingMobileNumbers.includes(data[field])"></i>
                        {{ data['Mobile Number'] }}
                    </p>

                    <p v-else-if="field == 'Account No'"
                        :class="[useStore.findCurrentTableDups(useStore.currentlyImportedTableAccNoValues, data['Account No']) || useStore.isValidBankAccountNo(data['Account No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Mobile number is already exists'"
                            v-if="useStore.existingMobileNumbers.includes(data[field])"></i>
                        {{ data['Account No'] }}
                    </p>

                    <p v-else-if="field == 'Bank Name'"
                        :class="[useStore.isLetter(data['Bank Name']) || !useStore.isBankExists(data['Bank Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Bank Name'] }}
                    </p>

                    <p v-else-if="field.includes('Pan No')"
                        :class="[useStore.findCurrentTableDups(useStore.currentlyImportedTablePanValues, data['Pan No']) || !useStore.isValidPancard(data['Pan No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Mobile number is already exists'"
                            v-if="!useStore.isValidPancard(data['Pan No'])"></i>
                        {{ data['Pan No'].toUpperCase() }}
                    </p>
                    <p v-else-if="field == 'DOB'"
                        :class="[useStore.isValidDate(data['DOB']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['DOB'] }}
                    </p>
                    <p v-else-if="field == 'DOJ'"
                        :class="[useStore.isValidDate(data['DOJ']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['DOJ'] }}
                    </p>
                    <p v-else-if="field == 'Bank ifsc'"
                        :class="[useStore.isValidBankIfsc(data['Bank ifsc']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Bank ifsc'].toUpperCase() }}
                    </p>
                    <p v-else-if="field.includes('Official Mail')"
                        :class="[useStore.isOfficialMailExists(data['Official Mail']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Official Mail'] }}
                    </p>
                    <p v-else-if="field.includes('Marital Status')"
                        :class="[useStore.isExistsOrNot(useStore.existingMartialStatus, data['Marital Status']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Marital Status'] }}
                    </p>
                    <p v-else-if="field.includes('Blood Group')"
                        :class="[useStore.isExistsOrNot(useStore.existingBloodgroups, data['Blood Group']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Blood Group'] }}
                    </p>

                    <p v-else class="font-semibold fs-6">
                        {{ data[field] }}
                    </p>

                </template>
                <template #editor="{ data, field }">
                    <InputMask v-if="field == 'Aadhar'" id="ssn" mask="9999 9999 9999" v-model="data[field]" />
                    <Dropdown v-else-if="field == 'Gender'" v-model="data[field]" :options="Gender" optionLabel="name"
                        optionValue="name" placeholder="Select Gender" class="w-full" />
                    <InputMask v-else-if="field == 'Pan No'" id="serial" mask="aaaPa9999a" v-model="data[field]"
                        class="uppercase" />
                    <InputText v-else-if="field == 'Email'" v-model="data[field]" />
                    <InputText v-else-if="field == 'Mobile Number'" v-model="data[field]" minLength="10" maxLength="10"
                        @keypress="useStore.isEnteredNos($event)" />
                    <Dropdown v-else-if="field == 'Bank Name'" v-model="data[field]"
                        :options="useNormalOnboardingStore.bankList" optionLabel="bank_name" optionValue="bank_name"
                        placeholder="Select Bank Name" />
                    <Dropdown v-else-if="field == 'Marital Status'" v-model="data[field]"
                        :options="useNormalOnboardingStore.maritalDetails" optionLabel="name" optionValue="name"
                        placeholder="Select Martial Status" />
                    <Dropdown v-else-if="field == 'Blood Group'" v-model="data[field]"
                        :options="useNormalOnboardingStore.bloodGroups" optionLabel="name" optionValue="name"
                        placeholder="Select Bloodgroup" class="p-error" />
                    <InputText v-else v-model="data[field]" :readonly="checkingNonEditableFields(field)" />
                </template>
            </Column>
            <template #footer>
                <button class="btn btn-orange mx-auto flex justify-center"
                    @click="useStore.uploadOnboardingFile(useStore.EmployeeQuickOnboardingSource)">Upload</button>
            </template>
        </DataTable>
    </div>
</template>


<script setup>

import { onMounted, onUpdated, ref } from 'vue';
import * as XLSX from 'xlsx';
import axios from 'axios'


import { useRouter, useRoute } from "vue-router";
const router = useRouter();
const route = useRoute();

import { useOnboardingMainStore } from '../stores/OnboardingMainStore'
import { useNormalOnboardingMainStore } from '../Normal_Onboarding/stores/NormalOnboardingMainStore';


const useStore = useOnboardingMainStore()
const useNormalOnboardingStore = useNormalOnboardingMainStore()

const checkingNonEditableFields = (e) => {

    let nonEditableField = ['Basic', 'HRA', 'Statutory Bonus', 'Child Education Allowance', 'Food Coupon', 'LTA']

    return nonEditableField.includes(e) ? true : false

}


onUpdated(() => {
    if (useStore.isValueUpdated) {
        useStore.currentlyImportedTableEmployeeCodeValues.splice(0, useStore.currentlyImportedTableEmployeeCodeValues.length)
        useStore.currentlyImportedTableAadharValues.splice(0, useStore.currentlyImportedTableAadharValues.length)
        useStore.currentlyImportedTableAccNoValues.splice(0, useStore.currentlyImportedTableAccNoValues.length)
        useStore.currentlyImportedTablePanValues.splice(0, useStore.currentlyImportedTablePanValues.length)
        useStore.currentlyImportedTableEmailValues.splice(0, useStore.currentlyImportedTableEmailValues.length)
        useStore.currentlyImportedTableMobileNumberValues.splice(0, useStore.currentlyImportedTableMobileNumberValues.length)
        setTimeout(() => {
            useStore.getCurrentlyImportedTableDuplicateEntries(useStore.EmployeeQuickOnboardingSource)
        }, 100);
    }
})

const vaueSetting = ref(true)


const onCellEditComplete = (event) => {

    useStore.initialUpdate = true

    // vaueSetting ? useStore.getCurrentlyImportedTableDuplicateEntries(useStore.EmployeeQuickOnboardingSource) : ''


    setTimeout(() => {
        vaueSetting.value = false
        console.log("functionkilled");
    }, 30);

    useStore.errorRecordsCount.splice(0, useStore.errorRecordsCount.length)

    let { data, newValue, field } = event;

    newValue ? useStore.isValueUpdated = true : isValueUpdated = false

    if (newValue.trim().length > 0) data[field] = newValue;
    else event.preventDefault();

    for (let index = 0; index < useStore.EmployeeQuickOnboardingSource.length; index++) {
        useStore.getValidationMessages(useStore.EmployeeQuickOnboardingSource[index]);
    }
}


const sampleTemplate = ref([
    {
        'Employee Code': 'ABS01',
        'Employee Name': 'Vishu',
        'Date Of Birth (dd-mmm-yyyy)': '23-09-2001',
        'Date of Joined (dd-mmm-yyyy)': '23-09-2023',
        'Mobile Number': '9898989898',
        'Aadhaar Number': '2222 3333 4444',
        'Personal Email': 'abs@gmail.com',
        'Pan Number': 'AJUPA0900H',
        'Gender': 'Male',
        'Marital Status': 'Married',
        'Reporting Manager': 'Pradessh',
        'Designation': 'Developer',
        'Department': 'IT',
        'Location': 'Chennai',
        'Father Name': 'Simma',
        'Physically Handicapped': [
            "one", "two", "three", "four"
        ],
    }
])
const sampleTemplateHeaders = [
    { title: 'Employee Code' },
    { title: 'Employee Name' },
    { title: 'Date Of Birth (dd-mmm-yyyy)', },
    { title: 'Date of Joined (dd-mmm-yyyy)' },
    { title: 'Mobile Number' },
    { title: 'Aadhaar Number' },
    { title: 'Personal Email' },
    { title: 'Pan Number' },
    { title: 'Gender', },
    { title: 'Marital Status' },
    { title: 'Reporting Manager' },
    { title: 'Designation' },
    { title: 'Department' },
    { title: 'Location' },
    { title: 'Father Name' },
    { title: 'Physically Handicapped' },
]


const download = () => {
    const data = XLSX.utils.json_to_sheet(sampleTemplate.value)
    const wb = XLSX.utils.book_new()
    XLSX.utils.book_append_sheet(wb, data, 'sheet1')
    XLSX.writeFile(wb, 'QuickOnboarding.xlsx')
}


const Gender = ref([
    { name: "Male", value: "Male" },
    { name: "Female", value: "Female" },
    { name: "Others", value: "Others" },
]);

</script>

