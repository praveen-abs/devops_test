<template>
        <!-- <Carousel :value="holidays" :numVisible="1" :numScroll="1" :responsiveOptions="responsiveOptions">
                <template #item="slotProps">
                    <div class="px-1 text-center h-90">
                        <img :src="`data:image/png;base64,${slotProps.data.image}`" class="mt-3 rounded shadow-sm" style="width: 290px; height: 135px; " :alt="slotProps.data.holiday_name" />
                        <div>
                            <h4 class="my-2 fw-semibold">{{ slotProps.data.holiday_name }}</h4>
                        </div>
                    </div>
                </template>
            </Carousel> -->
            <Galleria :value="holidays" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true"
            containerStyle="max-width: 500px" style="height: 100px;" :showItemNavigators="true" :showThumbnails="false">
            <template #item="slotProps">
                <img :src="`data:image/png;base64,${slotProps.item.image}`" class="mt-3 rounded shadow-sm" style="width:400px; height: 170px; display: block;"  :alt="slotProps.item.holiday_name" />
            </template>
        </Galleria>


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
.p-carousel-indicators.p-reset {
    display: none;
}
</style>


{
<!--
<template>
    <div class="card md:flex md:justify-content-center">
        <Galleria :value="images" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true" containerStyle="max-width: 640px"
            :showItemNavigators="true">
            <template #item="slotProps">
                <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" style="width: 100%; display: block;" />
            </template>
            <template #thumbnail="slotProps">
                <img :src="slotProps.item.thumbnailImageSrc" :alt="slotProps.item.alt" style="display: block;" />
            </template>
        </Galleria>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { PhotoService } from '@/service/PhotoService';

onMounted(() => {
    PhotoService.getImages().then((data) => (images.value = data));
});

const images = ref();
const responsiveOptions = ref([
    {
        breakpoint: '991px',
        numVisible: 4
    },
    {
        breakpoint: '767px',
        numVisible: 3
    },
    {
        breakpoint: '575px',
        numVisible: 1
    }
]);
</script> -->
}
