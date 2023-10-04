<template>
    <!-- <div class="image-slider relative h-[180px] w-full">
        <transition name="fade" mode="out-in">
            <img :src="`data:image/jpeg;base64,${currentImage}`" :key="currentImage" alt="Holiday Image"
                class="w-full h-full rounded-lg" />
        </transition>
        <div class="absolute w-full px-3 controls top-16">
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
    </div> -->

    <Galleria :value="holidays" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true" containerStyle=""
        class="!h-[180px] !rounded-[20px] overflow-hidden " :showItemNavigators="true" :showThumbnails="false">
        <template #item="slotProps">
            <img :src="`data:image/png;base64,${slotProps.item.image}`"
                class="mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]"
                style="width: 100%; margin-bottom: 10px;position: relative;right: 0;  bottom :10px; display: block;"
                :alt="slotProps.item.holiday_name" />
            <button class=" text-[#fff] absolute right-4 top-2 px-3 text-['poppins'] rounded-lg p-1 bg-[#00000067] "
                @click="visibleRight = true">View List</button>
        </template>

    </Galleria>
    <Sidebar v-model:visible="visibleRight" position="right">
        <!-- <h2>Right Sidebar</h2> -->
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">
                Holiday list</p>
        </template>

       <div class="p-2">
        <DataTable :value="holidays">
            <Column field="holiday_name" header="Holiday Name"></Column>
            <Column field="holiday_date" header="Holiday Date">
                <template #body="slotProps">
                    <!-- <div> -->
                    {{ dayjs(slotProps.data.holiday_date).format('DD-MMM-YYYY') }} {{
                        dayjs(slotProps.data.holiday_date).format('ddd') }}
                    <!-- </div> -->
                </template>
            </Column>
            <Column field="holiday_description" header="Holiday Description "></Column>
        </DataTable>
       </div>

    </Sidebar>
</template>

<script setup>
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';
import dayjs from 'dayjs';

const currentIndex = ref();
const holidays = ref()
const currentImage = ref();


const visibleRight = ref(false);




const getHolidays = () => {
    axios.get('/holiday/master-page').then(res => {
        console.log(res.data);
        holidays.value = res.data
        let conditionPass = true
        res.data.forEach((element, i) => {
            if (conditionPass) {
                if (new Date(element.holiday_date) >= new Date()) {
                    currentIndex.value = i
                    conditionPass = false
                }
            }
        });
        currentImage.value = holidays.value[0].image
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

.p-galleria-item
{
    height: 110% !important;
    border-radius: 20px !important;

}

.p-galleria-item-wrapper
{
    height: 180px !important;
    border-radius: 20px !important;
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

.p-galleria-item-prev
{
    position: absolute;
    top: 55px !important;
    left: 10px;
    z-index: 1 !important;
}

.p-galleria-item-container
{
    height: 170px !important;
    border-radius: 20px !important;
    margin-bottom: 10px !important;
}

.p-galleria-item-prev :hover
{}

.p-galleria-content
{
    border-radius: 30px !important;
}

.p-link:focus
{
    box-shadow: none !important;
}

.p-galleria-item-nav:hover
{
    border: none !important;
}

.p-link:hover
{
    border: none;
    box-shadow: none !important;
}

.p-galleria-item-next
{
    position: absolute;
    top: 55px !important;
}

.p-sidebar-right .p-sidebar
{
    width: 50% !important;
    height: 100%;
}
</style>
