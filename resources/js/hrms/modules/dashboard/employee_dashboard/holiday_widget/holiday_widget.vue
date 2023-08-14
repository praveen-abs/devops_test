<template>
    <div class="image-slider relative h-[180px] w-full">
        <transition name="fade" mode="out-in">
            <img :src="`data:image/jpeg;base64,${currentImage}`" :key="currentImage" alt="Holiday Image"
                class="h-full w-full rounded-lg" />
        </transition>
        <div class="controls absolute top-16 w-full px-3">
            <div class="flex justify-between">
                <button class="sliderButton" @click="prevImage">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button class="sliderButton" @click="nextImage">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';

const currentIndex = ref();
const holidays = ref()
const currentImage = ref()


const getHolidays = () => {
    axios.get('/holiday/master-page').then(res => {
        console.log(res.data);
        holidays.value = res.data
        let conditionPass = true
        res.data.forEach((element, i) => {
            if (conditionPass) {
                if (new Date(element.holiday_date) >= new Date()) {
                    currentIndex.value  = i
                    conditionPass = false
                }
            }
        });
        currentImage.value = holidays.value[currentIndex.value].image
    })
}

function nextImage() {

    currentIndex.value = (currentIndex.value + 1) % holidays.value.length;
    currentImage.value = holidays.value[currentIndex.value].image

}

function prevImage() {
    currentIndex.value = (currentIndex.value - 1 + holidays.value.length) % holidays.value.length;
    currentImage.value = holidays.value[currentIndex.value].image
}

// Autoplay functionality (optional)
const autoplayInterval = 5000; // Set the time in milliseconds
let autoplayTimer;

function startAutoplay() {
    autoplayTimer = setInterval(nextImage, autoplayInterval);
}

function stopAutoplay() {
    clearInterval(autoplayTimer);
}

// onMounted(startAutoplay);

onMounted(() => {
    getHolidays()
})

</script>

<style>
.image-slider
{
    position: relative;
    max-width: 100%;
    overflow: hidden;
    margin: 0 auto;
}

.fade-enter-active,
.fade-leave-active
{
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to

/* .fade-leave-active in <2.1.8 */
{
    opacity: 0;
}


.sliderButton
{
    padding: 8px 12px;
    color: black;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
