<template>
    <div class="bg-white rounded-lg p-2 border">
        <p class="font-semibold text-[14px] text-[#000] font-['Poppins] text-center">Attendance Analytics</p>
        <div class=" grid grid-cols-2 gap-4 my-2.5">
            <div class="h-full ">
                <Chart type="pie" :data="chartData" :options="chartOptions" />
            </div>
            <div class="flex items-center">
               <div class="my-auto">
                <div>
                    <button class="orange_btn font-semibold text-sm"
                        :class="[currentDashboard === 1 ? 'bg-white text-slate-600 border border-black' : 'text-slate-600']"
                        @click="currentDashboard = 0">Check In </button>
                    <button class="Enable_btn font-semibold text-sm"
                        :class="[currentDashboard === 1 ? 'bg-[#d4d4d4] text-slate-600' : 'text-slate-600']"
                        @click="currentDashboard = 1">Check Out </button>
                </div>
                <div>

                </div>
               </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();

});

const chartData = ref();
const chartOptions = ref();
const currentDashboard = ref(0);

const setChartData = () => {
    const documentStyle = getComputedStyle(document.body);

    return {
        labels: ['Bio-Metric', 'Mobile', 'Web'],
        datasets: [
            {
                data: [1, 1, 1],
                backgroundColor: [
                    'rgba(122, 94, 162, 1)',
                    'rgba(255, 177, 184, 1)',
                    'rgba(107, 183, 192, 1)'
                ],
                hoverBackgroundColor: [documentStyle.getPropertyValue('--blue-400'), documentStyle.getPropertyValue('--yellow-400'), documentStyle.getPropertyValue('--green-400')]
            }
        ]
    };
};

const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--text-color');
    const textColorSecondary = documentStyle.getPropertyValue(
        '--text-color-secondary'
    );
    const surfaceBorder = documentStyle.getPropertyValue('--surface-border');

    return {
        maintainAspectRatio: false,
        aspectRatio: 1,
        plugins: {
            labels: {
                usePointStyle: true
            },
            title: {
                display: false,
                text: 'Custom Chart Title'
            },
            legend: {
                display: false,
                labels: {
                    fontColor: textColor,
                },

            },
        },
    };
};
</script>



<style>
:root
{
    --disable: #d4d4d4;
    --white: #fff;
    --navy: #002f56;
}

.orange_btn
{
    background-color: var(--disable);
    padding: 3px 10px;
    border-radius: 4px 0 0 4px;
}

.Enable_btn
{
    border: 1px solid var(--navy);
    padding: 3px 10px;
    border-radius: 0 4px 4px 0;
}
</style>






<!-- <div class="h-1/4 w-1/4"> -->
