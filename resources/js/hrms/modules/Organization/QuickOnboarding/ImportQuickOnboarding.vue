<template>
    <div class="flex">
        <label class="border-1 p-2 font-semibold fs-6 border-gray-500 rounded-lg cursor-pointer" for="file"><i
                class="pi pi-folder px-2" style="font-size: 1rem"></i>Browse</label>
        <input type="file" name="" id="file" hidden @change="convertExcelIntoArray($event)" accept=".xls, .xlsx">
        <p class="border-1 p-2 w-8 mx-2 border-gray-500 rounded-lg">{{ selectedFile ? selectedFile.name : '' }}
        </p>
    </div>
    <button class="btn btn-orange mt-6" @click="upload">upload</button>



    <DataTable :value="EmployeeQuickOnboardingSource" tableStyle="min-width: 50rem" responsiveLayout="scroll"
        editMode="cell" @cell-edit-complete="onCellEditComplete" v-if="EmployeeQuickOnboardingSource">


        <Column v-for="col of  EmployeeQuickOnboardingDynamicHeader " :key="col.title" :field="col.title"
            style="min-width: 12rem;" :header="col.title">


            <template #body="{ data, field }">
                <p v-if="field == 'Aadhar'" :class="[isValidAadhar(data['Aadhar']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['Aadhar'] }}
                </p>
                <p v-else-if="field == 'Employee code'"
                    :class="[isSpecialChars(data['Employee code']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['Employee code'] }}
                </p>

                <p v-else-if="field == 'Employee Name'"
                    :class="[isLetter(data['Employee Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['Employee Name'] }}
                </p>
                <p v-else-if="field == 'Email'" :class="[isEmail(data['Email']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['Email'] }}
                </p>

                <p v-else-if="field == 'Account No'"
                    :class="[isValidBankAccountNo(data['Account No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['Account No'] }}
                </p>

                <p v-else-if="field == 'Bank Name'"
                    :class="[isLetter(data['Bank Name']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
                    {{ data['Bank Name'] }}
                </p>

                <p v-else-if="field == 'Pan No'"
                    :class="[isValidPancard(data['Pan No']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
                    {{ data['Pan No'].toUpperCase() }}
                </p>
                <p v-else-if="field == 'DOB'" :class="[isValidDate(data['DOB']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['DOB'] }}
                </p>
                <p v-else-if="field == 'DOJ'" :class="[isValidDate(data['DOJ']) ? 'bg-red-100 p-2 rounded-lg' : '']"
                    class="font-semibold fs-6">
                    {{ data['DOJ'] }}
                </p>
                <p v-else class="font-semibold fs-6">
                    {{ data[field] }}
                </p>
            </template>
            <template #editor="{ data, field }">
                <InputMask v-if="field == 'Aadhar'" id="ssn" mask="9999 9999 9999" v-model="data[field]" />
                <Dropdown v-else-if="field == 'gender'" v-model="data[field]" :options="Gender" optionLabel="name"
                    optionValue="name" placeholder="Select Gender" class="w-full" />
                <InputMask v-else-if="field == 'Pan No'" id="serial" mask="aaaPa9999a" v-model="data[field]"
                    class="uppercase" />
                <InputText v-else v-model="data[field]" />
            </template>
        </Column>

    </DataTable>
</template>


<script setup>

import { ref } from 'vue';
import * as XLSX from 'xlsx';



const onCellEditComplete = (event) => {
    let { data, newValue, field } = event;

    if (newValue.trim().length > 0) data[field] = newValue;
    else event.preventDefault();

}


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

const dailog = ref(false)
const selectedFile = ref()



const EmployeeQuickOnboardingSource = ref()
const EmployeeQuickOnboardingDynamicHeader = ref()


const upload = () => {
    console.log(EmployeeQuickOnboardingSource.value);
}



const convertExcelIntoArray = (e) => {

    var file = e.target.files[0];
    selectedFile.value = e.target.files[0];
    // input canceled, return
    if (!file) return;

    var reader = new FileReader();
    reader.onload = function (e) {
        const data = reader.result;
        var workbook = XLSX.read(data, { type: 'binary' });
        var firstSheet = workbook.Sheets[workbook.SheetNames[0]];

        // header: 1 instructs xlsx to create an 'array of arrays'
        var result = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

        const jsonData = workbook.SheetNames.reduce((initial, name) => {
            const sheet = workbook.Sheets[name];
            initial[name] = XLSX.utils.sheet_to_json(sheet);
            return initial;
        }, {});

        console.log(jsonData['Sheet1']);

        for (let index = 0; index < jsonData['Sheet1'].length; index++) {
            console.log("jsonData['Sheet1'].length :", jsonData['Sheet1'].length);
            const validationResult = getValidationMessages(
                jsonData['Sheet1'][index]
            );
            // if (validationResult.length > 0) {
            //     problemLeads.push({ messages: validationResult, rowNumber: index + 1 });
            // }

            console.log(validationResult);
        }

        let excelRowData = []

        jsonData.Sheet1.forEach(element => {

            let format = {
                title: Object.keys(element),
                value: Object.values(element)
            }
            excelRowData.push(format)

        });

        let excelHeaders = []
        let RowIndex = 0
        let initialColumnValue = 0


        for (let i = 0; i < excelRowData.length; i++) {
            const singleRowData = excelRowData[i];
            RowIndex = i

            for (let j = 0; j < singleRowData.value.length; j++) {
                const value = singleRowData.value[j];
                const title = singleRowData.title[j];

                let form = {
                    title: title,
                    value: value
                }

                console.log(RowIndex);

                /*
                To Avoid duplicate Header insert
                  - only allow first index object headers
                 */

                if (RowIndex == initialColumnValue) {
                    excelHeaders.push(form)
                }

                console.log(excelHeaders);
            }
        }

        EmployeeQuickOnboardingDynamicHeader.value = excelHeaders
        EmployeeQuickOnboardingSource.value = jsonData.Sheet1

        // data preview

        // console.log(result);

    };
    reader.readAsArrayBuffer(file);
}


const isLetter = (e) => {
    if (/^[A-Za-z_ ]+$/.test(e)) {
        return false
    } else {
        return true

    }
}

const isSpecialChars = (e) => {
    if (/^[A-Za-z0-9]+$/.test(e)) {
        return false
    } else {
        return true

    }
}

const isNumber = (e) => {
    if (/^[0-9]+$/.test(e)) {
        return false
    } else {
        return true

    }
}

const isEmail = (e) => {
    if (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e)) {
        return false
    } else {
        return true

    }
}

const isValidAadhar = (e) => {
    if (/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(e)) {
        return false
    } else {
        return true
    }
}
const isValidPancard = (e) => {
    if (/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(e)) {
        return false
    } else {
        return true
    }
}
const isValidBankAccountNo = (e) => {
    if (/^[0-9]{9,18}$/.test(e)) {
        return false
    } else {
        return true
    }
}
const isValidBankIfsc = (e) => {
    if (/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(e)) {
        return false
    } else {
        return true
    }
}
const isValidDate = (e) => {
    if (/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/.test(e)) {
        return false
    } else {
        return true
    }
}



const isEnteredNos = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[0-9]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

const isEnterLetter = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z_ ]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

const isEnterSpecialChars = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z0-9]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

const getValidationMessages = (data) => {
    // console.log(data);
    let errorMessages = [];
    const isLetter = /^[A-Za-z_ ]+$/;
    const digitRegexp = /\w*\d{1,}\w*/;
    const emailRegexp =
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    const websiteRegexp =
        new RegExp('^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$');


    !isLetter.test(data['Department']) ? errorMessages.push('Invalid') : null

    return errorMessages;
}

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
        <p :class="[isSpecialChars(data['Employee code']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isLetter(data['Employee Name']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isEmail(data['Email']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Email'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Aadhar" header="Aadhar " style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[isValidAadhar(data['Aadhar']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isValidBankAccountNo(data['Account No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isLetter(data['Bank Name']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Bank Name'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" />
    </template>
</Column>
<Column field="Gender" header="Gender" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[isLetter(data['Gender']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
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
        <p :class="[isLetter(data[' Location']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
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
        <p :class="[isValidPancard(data['Pan No']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isLetter(data['Department']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isLetter(data['Process']) ? 'bg-red-100 p-2 rounded-lg' : '']" class="font-semibold fs-6">
            {{ data['Process'] }}
        </p>
    </template>
    <template #editor="{ data, field }">
        <InputText v-model="data[field]" @keypress="isEnterLetter($event)" />
    </template>
</Column>
<Column field="Designation" header="Designation" style="min-width: 12rem">
    <template #body="{ data }">
        <p :class="[isLetter(data['Designation']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
        <p :class="[isValidBankIfsc(data['Bank ifsc']) ? 'bg-red-100 p-2 rounded-lg' : '']"
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
