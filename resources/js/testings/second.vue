<template>
    <div>
        <button @click="downloadExcelFile">Download Excel</button>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import * as ExcelJS from 'exceljs'

const dataArray = ref([
    { Name: 'John', Age: 28, Email: 'john@example.com' },
    { Name: 'Alice', Age: 24, Email: 'alice@example.com' },
    // Add more objects as needed
]);

const downloadExcelFile = async () => {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Sheet1');

    // Add headers to the worksheet
    const headers = Object.keys(dataArray.value[0]);
    worksheet.addRow(headers);

    // Add data to the worksheet
    dataArray.value.forEach((item) => {
        const row = [];
        headers.forEach((header) => {
            row.push(item[header]);
        });
        worksheet.addRow(row);
    });

    // Create a Blob from the workbook
    const blob = await workbook.xlsx.writeBuffer();

    // Create a Blob URL for the Excel file
    const blobURL = window.URL.createObjectURL(new Blob([blob]));

    // Create a temporary link element to trigger the download
    const link = document.createElement('a');
    link.href = blobURL;
    link.download = 'data.xlsx'; // Set the desired file name
    link.click();

    // Clean up the Blob URL
    window.URL.revokeObjectURL(blobURL);
};

</script>
