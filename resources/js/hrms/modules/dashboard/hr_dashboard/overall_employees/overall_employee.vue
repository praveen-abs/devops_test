<template>
    <Chart type="bar" :data="chartData" :options="chartOptions" class="h-full" />
</template>

<script setup>
import { ref, onMounted } from 'vue';

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    return {
        labels: ['Male', 'Female', 'Others', 'App Check-Ins', 'Active Apps', 'Inactive Apps',],
        datasets: [
            {
                backgroundColor: [
                    'rgba(8, 115, 205, 1)',
                    'rgba(205, 159, 71, 1)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(80, 64, 34, 1)',
                    'rgba(113, 74, 161, 1)',
                    'rgba(181, 86, 151, 1)',
                    'rgba(126, 164, 79, 1)',
                ],
                // borderWidth: 10,
                // borderColor: documentStyle.getPropertyValue('--blue-500'),
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
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
        scales: {
            x: {
                ticks: {
                    // autoSkip: false, // Prevent auto-skipping of labels
                    // maxRotation: 0, // Rotate the labels to 0 degrees (horizontal)
                    // minRotation: 0,
                    textAlign: 'center', // Center-align the tick labels
                    // padding: 10, // Add some padding for better alignment
                    color: textColorSecondary,
                    font: {
                        weight: 600,
                        // align:center,
                    },
                },
                grid: {
                    // display: false,
                    drawBorder: false,
                },
            },
            y: {
                // display: false,
                ticks: {
                    color: textColorSecondary,
                },
                grid: {
                    color: false,
                    drawBorder: false,
                },
            },
        },
    };
};
</script>
