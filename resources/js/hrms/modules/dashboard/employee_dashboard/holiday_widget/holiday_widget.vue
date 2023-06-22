<template>
        <Galleria :value="holidays" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true"
        containerStyle="max-width: 500px" style="height: 100px;" :showItemNavigators="true" :showThumbnails="false">
        <template #item="slotProps">
            <img :src="`data:image/png;base64,${slotProps.item.image}`" class="mt-3 rounded shadow-sm" style="width:450px; height: 175px; margin-bottom: 10px;position: relative; bottom :10px; display: block;"  :alt="slotProps.item.holiday_name" />
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
.p-galleria-item-prev .p-galleria-item-nav .p-link{
/* border: 2px solid gray; */
box-shadow: 0 0 0 0.2rem #BFDBFE !important;
}
.p-galleria .p-galleria-item-nav {
background: transparent;
/* box-shadow: 0 0 0 0.2rem #BFDBFE !important; */
color: #BFDBFE;
width: 4rem;
height: 4rem;
transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;
border-radius: 6px;
margin: 0 0.5rem;

}
.p-galleria-item-nav{
 /* position: relative; */
  bottom:10px ;
  position: absolute;
  top: 80px;
  z-index: 10;
}
</style>


