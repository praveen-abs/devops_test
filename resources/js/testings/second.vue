<template>
    <input type="file" name="" id="" @change="json($event)">
    <!-- <div class="result-table"> <button type="button" class="download-btn" @change="parseExcel($event)">Download</button> -->
    <!-- </div> -->
</template>

<style scoped>
.result-table {
    width: 50%;
    text-align: center;
}

.download-btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 30px;
    margin: 12px 0;
    cursor: pointer;
    font-size: 20px;
}

/* Darker background on mouse-over */
.download-btn:hover {
    background-color: RoyalBlue;
}
</style>

<script setup>

import { ref } from 'vue';
import * as XLSX from 'xlsx';

const items = ref([
    { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
    { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
    { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
    { age: 38, first_name: 'Jami', last_name: 'Carney' }
])




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

        // data preview

        // console.log(result);

    };
    reader.readAsArrayBuffer(file);
}


const download = () => {
    const data = XLSX.utils.json_to_sheet(items)
    const wb = XLSX.utils.book_new()
    XLSX.utils.book_append_sheet(wb, data, 'data')
    XLSX.writeFile(wb, 'demo.xlsx')
}

</script>
