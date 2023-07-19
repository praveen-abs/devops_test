<template>
        <!-- <div class=""  v-if="route.params.module == 'quickOnboarding'"> -->
        <ImportQuickOnboarding />
        <!-- </div> -->
        <Transition name="fade">
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
                        <label class="border-1 p-2 font-semibold fs-6 border-gray-500 rounded-lg cursor-pointer"
                            for="file"><i class="pi pi-folder px-2" style="font-size: 1rem"></i>Browse</label>
                        <input type="file" name="" id="file" hidden @change="convertExcelIntoArray($event)"
                            accept=".xls, .xlsx">
                        <p class="border-1 p-2 w-8 mx-2 border-gray-500 rounded-lg">{{ selectedFile ? selectedFile.name : ''
                        }}
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

                                <li class="my-2 font-semibold fs-6"> <i class="text-green-500 fa fa-check"></i> Employee
                                    email
                                    is unique across
                                    . So, cannot add same employee in two
                                    Organizations with same email. </li>

                                <li class="my-2 font-semibold fs-6"><i class="text-green-500 fa fa-check"></i> Designation
                                    is
                                    mandatory since
                                    it will help to identify employees in People picker
                                    search results when 2 or more employees have same Name. </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>


<script setup>

import { ref } from 'vue';
import * as XLSX from 'xlsx';
import ImportQuickOnboarding from './ImportQuickOnboarding.vue'
import { useRouter, useRoute } from "vue-router";


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

const convertExcelIntoArray = (e) => {

    router.push({ path: `/testing_shelly/${'quickOnboarding'}` })

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

        EmployeeQuickOnboardingSource.value = jsonData.Sheet1





        // console.log(jsonData['Sheet1']);

        for (let index = 0; index < jsonData['Sheet1'].length; index++) {
            console.log("jsonData['Sheet1'].length :", jsonData['Sheet1'].length);


            const validationResult = getValidationMessages(
                EmployeeQuickOnboardingSource.value[index]
            );

            // if (validationResult.length > 0) {
            //     problemLeads.push({ messages: validationResult, rowNumber: index + 1 });
            // }

            // console.log(validationResult);
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


                totalRecordsCount.value.push(form)




                /*
                To Avoid duplicate Header insert
                  - only allow first index object headers
                 */

                if (RowIndex == initialColumnValue) {
                    excelHeaders.push(form)
                }
            }
        }

        EmployeeQuickOnboardingDynamicHeader.value = excelHeaders




        // data preview

        // console.log(result);

    };
    reader.readAsArrayBuffer(file);
}


const upload = () => {
}


</script>
