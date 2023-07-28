<template>
    <div>
        <!-- Your HTML content goes here -->
        <div ref="contentToConvert" >
          <div class="p-4 bg-white">
            <div class=" grid grid-cols-2">
                <div>
                    <p>Payslip <strong>2023</strong></p>
                    <p>organization</p>
                    <p>Address</p>
                </div>
                <div>
                    <img class="h-16 float-right" src="../../../images/brand_avatar.png" alt="">
                </div>
            </div>
            <div class="my-4  grid grid-cols-1">
                <p class="font-semibold">Narasimman</p>
                <div class="border-t-2 border-t-black w-full"></div>
                <div class=" grid grid-cols-4 p-2 my-2 line-after-four-divs">
                    <div class="my-2">
                        <p class="text-lg font-medium text-gray-700">Employee Code</p>
                        <p class="font-semibold fs-6">BA002</p>
                    </div>
                </div>
                <div class="border-t-2 border-t-black w-full"></div>
            </div>


            <div class="my-2 grid grid-cols-1">
                <p class="font-medium">Salary Details</p>
                <div class="border-t-2 border-t-black w-full"></div>
                <div class=" grid grid-cols-4 p-2 line-after-four-divs">
                    <div class="my-2">
                        <p class="text-lg font-medium text-gray-700">Employee Code</p>
                        <p class="font-semibold fs-6">BA002</p>
                    </div>
                </div>
                <div class=" grid grid-cols-2 p-2">
                    <div>
                        <p class="font-semibold text-lg">Earnings</p>
                        <div class="grid grid-cols-2 p-2">
                            <p class="text-lg font-medium text-black">Employee Code</p>
                            <p class="font-semibold fs-6">BA002</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Contributions</p>
                        <div class="grid grid-cols-2 p-2">
                            <p class="text-lg font-medium text-black">Employee Code</p>
                            <p class="font-semibold fs-6">BA002</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
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
        html2canvas: { scale: 25 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
    };

    html2pdf().from(element).set(opt).save();
};

</script>


<style lang="scss">
.line-after-four-divs div:nth-child(4n) {
    border-bottom: 1px solid black;
    /* Replace "black" with your desired line color */
}
</style>
