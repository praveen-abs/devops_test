<template>
    <div class="image-slider relative h-full w-full">
        <transition name="fade" mode="out-in">
            <img :src="`data:image/jpeg;base64,${currentImage}`" :key="currentImage" alt="Holiday Image"
                class="h-full w-full rounded-lg" />
        </transition>
        <div class="controls absolute top-16 w-full px-3">
            <div class="flex justify-between">
                <button class="sliderButton" @click="prevImage">Previous</button>
                <button class="sliderButton" @click="nextImage">Next</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';


const holidays = ref()

const getHolidays = () => {
    axios.get('/holiday/master-page').then(res => {
        console.log(res.data);
        holidays.value = res.data
        currentImage.value = holidays.value[0].image
        // currentImage.value = computed(() => holidays.value[currentIndex.value].image );
    })
}

const currentImage = ref()
const images = []

const currentIndex = ref(0);


function nextImage() {
    currentIndex.value = (currentIndex.value + 1) % holidays.value.length;
}

function prevImage() {
    currentIndex.value = (currentIndex.value - 1 + holidays.value.length) % images.length;
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
    startAutoplay()
    getHolidays()
})

</script>

<style>
.image-slider {
    position: relative;
    max-width: 100%;
    overflow: hidden;
    margin: 0 auto;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to

/* .fade-leave-active in <2.1.8 */
    {
    opacity: 0;
}


.sliderButton {
    padding: 8px 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.sliderButton:hover {
    background-color: #0056b3;
}
</style>
