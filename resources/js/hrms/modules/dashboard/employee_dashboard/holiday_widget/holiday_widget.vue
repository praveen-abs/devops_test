<template>
        <div class="card">
            <Carousel :value="holidays" :numVisible="1" :numScroll="1" :responsiveOptions="responsiveOptions">
                <template #item="slotProps">
                    <div class="px-1 text-center h-90">
                        <img :src="`data:image/png;base64,${slotProps.data.image}`" class="mt-3 rounded shadow-sm" style="width: 290px; height: 135px; " :alt="slotProps.data.holiday_name" />
                        <div>
                            <h4 class="my-2 fw-semibold">{{ slotProps.data.holiday_name }}</h4>
                        </div>
                    </div>
                </template>
            </Carousel>
        </div>
</template>
<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";


const holidays = ref();
const responsiveOptions = ref([
    {
        breakpoint: '1199px',
        numVisible: 3,
        numScroll: 3
    },
    {
        breakpoint: '991px',
        numVisible: 2,
        numScroll: 2
    },
    {
        breakpoint: '767px',
        numVisible: 1,
        numScroll: 1
    }
]);

const getHolidays = async () => {
    await axios.get('/holiday/master-page').then(res => {
        console.log(res.data);
        holidays.value = res.data
    })
}


onMounted(() => {
    getHolidays()
})

</script>

<style>
.p-carousel-indicators.p-reset{
    display: none;
}
</style>
