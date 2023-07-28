<template>
    <div>
        <!-- Your HTML content goes here -->
        <div ref="contentToConvert">
            <!-- Your HTML content to be converted to PDF -->
            <h1>Hello, this is the content to be converted to PDF!</h1>
            <!-- Add the content you want to include in the PDF here -->
        </div>

        <button @click="downloadPdf">Download PDF</button>
    </div>
</template>

<script setup>
import html2pdf from 'html2pdf.js';
import { ref } from 'vue';
const contentToConvert = ref(null);

const downloadPdf = () => {
    const element = contentToConvert.value;
    if (!element) return;

    const opt = {
        margin: 10,
        filename: 'generated_pdf.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 30 },
        jsPDF: { unit: 'px', format: 'a4', orientation: 'portrait' },
    };

    html2pdf().from(element).set(opt).save();
};

</script>
