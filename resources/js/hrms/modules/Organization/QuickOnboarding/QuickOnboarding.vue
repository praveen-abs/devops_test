<template>
    <div class="h-screen w-full">
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
                    <input type="file" name="" id="file" hidden @change="json($event)">
                    <p class="border-1 p-2 w-8 mx-2 border-gray-500 rounded-lg"></p>
                </div>
            </div>
            <div>
                <div class="col-form-label">
                    <h4 class="font-semibold fs-6"> Upload Instructions</h4>
                    <div class="py-2 my-4 bg-red-100 rounded-lg f-12 alert-warning font-semibold fs-6"><i
                            class='fa fa-warning text-danger mx-2'></i> Read
                        these instructions before uploading the file.</div>
                    <div>
                        <ul class="list-style" style="">
                            <li class="my-2"><i class="text-green-500 fa fa-check" aria-hidden="true"></i> Employee
                                Number,Employee Name, Email, Date of joining
                                and Location fields are required to add employees in.</li>
                            <li class="my-2"><i class="text-green-500 fa fa-check"></i> Enter mobile number is mandatory
                                while adding employee </li>

                            <li class="my-2"> <i class="text-green-500 fa fa-check"></i> Employee email is unique across
                                . So, cannot add same employee in two
                                Organizations with same email. </li>

                            <li class="my-2"><i class="text-green-500 fa fa-check"></i> Designation is mandatory since
                                it will help to identify employees in People picker
                                search results when 2 or more employees have same Name. </li>

                            <!---->
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="employee_documents"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="Employee code" style="min-width: 8rem">
            </Column>

            <Column field="Employee Name" header="Status" style="min-width: 12rem">

            </Column>

            <Column field="Email" header="Reason " style="min-width: 12rem"></Column>
            <Column field="Aadhar" header="Reason " style="min-width: 12rem"></Column>
            <Column field="Account No" header="Reason " style="min-width: 12rem"></Column>
            <Column field="Bank Name" header="Reason " style="min-width: 12rem"></Column>

        </DataTable>
    </div>
</template>


<script setup>

import { ref } from 'vue';
import * as XLSX from 'xlsx';


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


const items = ref([
    { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
    { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
    { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
    { age: 38, first_name: 'Jami', last_name: 'Carney' }
])





const employee_documents = ref()



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

        console.log(jsonData);
        employee_documents.value = jsonData.Sheet1

        // data preview

        // console.log(result);

    };
    reader.readAsArrayBuffer(file);
}


const download = () => {
    const data = XLSX.utils.json_to_sheet(sampleTemplate.value)
    const wb = XLSX.utils.book_new()
    XLSX.utils.book_append_sheet(wb, data, 'data')
    XLSX.writeFile(wb, 'demo.xlsx')
}

</script>
