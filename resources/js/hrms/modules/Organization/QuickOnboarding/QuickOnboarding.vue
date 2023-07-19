<template>
    <div class="h-screen w-full" v-if="false">
        <div class="flex">
            <div class="w-6 px-2">
                <p class="font-bold text-2xl">Employee Quick Onboarding</p>
                <ul class="list-disc p-2 my-3">
                    <li @click="download" class="font-semibold fs-6">Download the <span
                            class="text-blue-300 font-semibold fs-6 cursor-pointer">Sample</span>
                    </li>
                    <li class="font-semibold fs-6">Fill the information in excel template</li>
                </ul>
                <div class="flex">
                    <label class="border-1 p-2 font-semibold fs-6 border-gray-500 rounded-lg cursor-pointer" for="file"><i
                            class="pi pi-folder px-2" style="font-size: 1rem"></i>Browse</label>
                    <input type="file" name="" id="file" hidden @change="json($event)" accept=".xls, .xlsx">
                    <p class="border-1 p-2 w-8 mx-2 border-gray-500 rounded-lg">{{ selectedFile ? selectedFile.name : '' }}
                    </p>
                </div>
                <button class="btn btn-orange mt-6" @click="upload">upload</button>

            </div>
            <div>
                <div class="col-form-label">
                    <p class="font-semibold fs-4"> Upload Instructions</p>
                    <div class="py-2 my-4 bg-red-100 rounded-lg f-12 alert-warning font-semibold fs-6"><i
                            class='fa fa-warning text-danger mx-2'></i> Read
                        these instructions before uploading the file.</div>
                    <div>
                        <ul class="list-style font-semibold" style="">
                            <li class="my-2 font-semibold fs-6"><i class="text-green-500 fa fa-check"
                                    aria-hidden="true"></i> Employee
                                Number,Employee Name, Email, Date of joining
                                and Location fields are required to add employees in.</li>
                            <li class="my-2 font-semibold fs-6"><i class="text-green-500 fa fa-check"></i> Enter mobile
                                number is mandatory
                                while adding employee </li>

                            <li class="my-2 font-semibold fs-6"> <i class="text-green-500 fa fa-check"></i> Employee email
                                is unique across
                                . So, cannot add same employee in two
                                Organizations with same email. </li>

                            <li class="my-2 font-semibold fs-6"><i class="text-green-500 fa fa-check"></i> Designation is
                                mandatory since
                                it will help to identify employees in People picker
                                search results when 2 or more employees have same Name. </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <ImportQuickOnboarding />
    </div>
</template>


<script setup>

import { ref } from 'vue';
import * as XLSX from 'xlsx';
import ImportQuickOnboarding from './ImportQuickOnboarding.vue'



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


const parseExcel = (file) => {

    // let file = e.target.files[0]

    // console.log(file);

    var reader = new FileReader();

    reader.onload = function (e) {
        var data = e.target.result;
        var workbook = XLSX.read(data, {
            type: 'binary'
        });

        workbook.SheetNames.forEach(function (sheetName) {
            // Here is your object
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
            var json_object = JSON.stringify(XL_row_object);
            console.log(json_object);

        })

    };

    reader.onerror = function (ex) {
        console.log(ex);
    };

    reader.readAsBinaryString(file);
};

const json = (e) => {

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
        let firstRowColumnIndex = 0
        let initialColumnValue = 0


        for (let index = 0; index < excelRowData.length; index++) {
            const singleRowData = excelRowData[index];
            initialColumnValue = index

            for (let index = 0; index < singleRowData.value.length; index++) {
                const value = singleRowData.value[index];
                const title = singleRowData.title[index];
                let form = {
                    title: title,
                    value: value
                }

                if (firstRowColumnIndex == initialColumnValue) {
                    excelHeaders.push(form)
                }
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
