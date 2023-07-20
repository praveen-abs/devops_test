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
            responsiveLayout="scroll" editMode="cell" @cell-edit-complete="onCellEditComplete"
            v-if="useStore.EmployeeQuickOnboardingSource" :rows="useStore.EmployeeQuickOnboardingSource.length">


            <Column v-for="col of  useStore.EmployeeQuickOnboardingDynamicHeader " :key="col.title" :field="col.title"
                style="min-width: 12rem;" :header="col.title">

                <template #body="{ data, field }">
                    <div v-if="field == 'Employee code'"
                        :class="[useStore.isSpecialChars(data['Employee code']) ? 'bg-red-100 p-2 rounded-lg' : '']">
                        <p class="font-semibold fs-6">
                            <i class="fa fa-exclamation-circle text-warning mx-2 cursor-pointer" aria-hidden="true"
                                v-tooltip.right="'User code is already exists'"
                                v-if="useStore.existingUserCode.includes(data['Employee code'])"></i>
                            {{ data['Employee code'] }}
                        </p>
                    </div>
                    <p v-else-if="field == 'Aadhar'"
                        :class="[useStore.isValidAadhar(data['Aadhar']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Aadhar'] }}
                    </p>
                    <p v-else-if="field == 'Employee Name'"
                        :class="[useStore.isLetter(data['Employee Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Employee Name'] }}
                    </p>
                    <p v-else-if="field == 'Email'"
                        :class="[useStore.isEmail(data['Email']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning  cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Email is already exists'"
                            v-if="useStore.existingEmails.includes(data['Email'])"></i>
                        {{ data['Email'] }}
                    </p>
                    <p v-else-if="field == 'Mobile Number'"
                        :class="[useStore.isValidMobileNumber(data['Mobile Number']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Mobile number is already exists'"
                            v-if="useStore.existingMobileNumbers.includes(data['Mobile Number'])"></i>
                        {{ data['Mobile Number'] }}
                    </p>

                    <p v-else-if="field == 'Account No'"
                        :class="[useStore.isValidBankAccountNo(data['Account No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Account No'] }}
                    </p>

                    <p v-else-if="field == 'Bank Name'"
                        :class="[useStore.isLetter(data['Bank Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        {{ data['Bank Name'] }}
                    </p>

                    <p v-else-if="field == 'Pan No'"
                        :class="[useStore.isValidPancard(data['Pan No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                        class="font-semibold fs-6">
                        <i class="fa fa-exclamation-circle text-warning cursor-pointer" aria-hidden="true"
                            v-tooltip.right="'Mobile number is already exists'"
                            v-if="useStore.existingPanCards.includes(data['Pan No'])"></i>
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
                    <InputText v-else v-model="data[field]" :readonly="checkingNonEditableFields(field)" />
                </template>
            </Column>
            <template #footer>
                <button class="btn btn-orange mx-auto flex justify-center"
                    @click="saveOnboarding(useStore.EmployeeQuickOnboardingSource)">Upload</button>
            </template>
        </DataTable>
    </div>
</template>


<script setup>

import { onMounted, ref } from 'vue';
import * as XLSX from 'xlsx';
import axios from 'axios'

import { useRouter, useRoute } from "vue-router";
const router = useRouter();
const route = useRoute();

import { useOnboardingMainStore } from '../stores/OnboardingMainStore'


const useStore = useOnboardingMainStore()



const saveOnboarding = (data) => {
    console.log(data);
    axios.post('/quicktesting', data)
}




const checkingNonEditableFields = (e) => {

    let nonEditableField = ['Basic', 'HRA', 'Statutory Bonus', 'Child Education Allowance', 'Food Coupon', 'LTA']

    return nonEditableField.includes(e) ? true : false

}




const onCellEditComplete = (event) => {

    useStore.errorRecordsCount.splice(0, useStore.errorRecordsCount.length)

    let { data, newValue, field } = event;

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
        'Physically Handicapped': 'No',
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
    XLSX.utils.book_append_sheet(wb, data, 'data')
    XLSX.writeFile(wb, 'QuickOnboarding.xlsx')
}


const Gender = ref([
    { name: "Male", value: "Male" },
    { name: "Female", value: "Female" },
    { name: "Others", value: "Others" },
]);

</script>


<!-- <DataTable editMode="cell" @cell-edit-complete="onCellEditComplete" ref="dt" dataKey="id" :paginator="true"
:rows="5"
paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
:rowsPerPageOptions="[5, 10, 25]"
currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

<Column header="Employee code" field="Employee code" style="min-width: 8rem">
    <template #body="{ data }">
        <p :class="[useStore.isSpecialChars(data['Employee code']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Employee code'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Employee Name" header="Employee Name" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data['Employee Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Employee Name'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Email" header="Email " style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isEmail(data['Email']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Email'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Aadhar" header="Aadhar " style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isValidAadhar(data['Aadhar']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Aadhar'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputMask id="ssn" mask="9999 9999 9999" v-model="data[field]" />
    </template>
</Column>
<Column field="Account No" header="Account No " style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isValidBankAccountNo(data['Account No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Account No'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" minlength="10" maxlength="18" />
    </template>
</Column>
<Column field="Bank Name" header="Bank Name " style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data['Bank Name']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Bank Name'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Gender" header="Gender" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data['Gender']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Gender'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <Dropdown v-model="data[field]" :options="Gender" optionLabel="name" optionValue="name"
            placeholder="Select Gender" class="w-full" />
    </template>

</Column>
<Column field="DOJ" header="DOJ " style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[isNumber(data['DOJ']) ? 'bg-red-100 p-2 rounded-lg border-1' : '']"
            class="font-semibold fs-6">
            {{ data['DOJ'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field=" Location" header="Location" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data[' Location']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data[' Location'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" @keypress="isEnterLetter($event)" />
    </template>
</Column>
<Column field="DOB" header="DOB" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[isNumber(data['DOB']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['DOB'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Pan No" header="Pan No" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isValidPancard(data['Pan No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Pan No'].toUpperCase() }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputMask id="serial" mask="aaaPa9999a" v-model="data[field]" class="uppercase" />
    </template>
</Column>
<Column field="Mobile Number" header="Mobile Number" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[isNumber(data['Mobile Number']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Mobile Number'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText minLength="10" maxLength="10" v-model="data[field]" @keypress="isEnteredNos($event)" />
    </template>
</Column>
<Column field="Department" header="Department" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data['Department']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Department'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" @keypress="isEnterLetter($event)" />
    </template>
</Column>
<Column field="Process" header="Process" style="min-width: 12rem">isEnterLetter
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data['Process']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Process'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" @keypress="isEnterLetter($event)" />
    </template>
</Column>
<Column field="Designation" header="Designation" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isLetter(data['Designation']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Designation'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" @keypress="isEnterLetter($event)" />
    </template>
</Column>
<Column field="Bank ifsc" header="Bank ifsc" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[useStore.isValidBankIfsc(data['Bank ifsc']) ? 'bg-red-100 p-2 rounded-lg' : '']"
            class="font-semibold fs-6">
            {{ data['Bank ifsc'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" @keypress="isEnterSpecialChars($event)" />
    </template>
</Column>

<template></template>

</DataTable> -->
