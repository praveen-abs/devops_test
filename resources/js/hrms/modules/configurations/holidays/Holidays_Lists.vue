<template>
    <div v-if="useStore.activeHolidaysPage === 2" class="p-5 card main-body">

        <div v-if="useStore.activeHolidaysPage === 1">
            <Holidays_Master />
        </div>
        <div v-if="useStore.activeHolidaysPage === 3">
            <CreateNewHolidaysList />
        </div>
        <div class="head-contant d_spc_bt d-flex flex-wrap">
            <h3 class="fs-4 fw-bold mb-3">Holiday Summary</h3>
            <div class="holiday-settings-btns">

                <ul class="d-flex flex-wrap">
                    <li><button class="cancel_btn w-30 mb-3" @click="useStore.activeHolidaysPage = 1">Cancel</button></li>
                    <li><button class="view_Lists w-30 mb-3" @click="useStore.activeHolidaysPage = 3">View Lists </button>
                    </li>
                    <li><button class="add_new_holiday_btn w-33 mb-3" @click="visible = true"> Add New Holiday</button></li>
                </ul>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div v-for="holiday in useStore.holidayData" :key="holiday.id">
                <div class="col w-full mx-4">
                    <div class="m-0 card-title d_spc_bt align-items-center w-full">
                        <h3 class="fs-5">{{ holiday.holiday_name }}</h3>
                        <span class="fs-6"> {{ dayjs(holiday.holiday_date).format('DD-MMM-YYYY') }}</span>
                    </div>
                    <div class="card clr-trans card-w h-48 w-full">
                        <img v-if="holiday.image" :src="`assets/images/holiday/${holiday.image}`" class="card-img-top"
                            alt="...">
                        <img v-else src="../../../assests/images/no-image.png" class="card-img-top" alt="...">
                        <div class="overlay"></div>
                        <div class="hover_btn_div d-ard">
                            <button label="Edit" @click="editdialog = true" class="w-6 fs-6">
                                Edit
                            </button>
                            <button @click="remove" class="w-8 fs-6 mx-4">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }" class="popup_card">
            <div class="img_container border position-relative rounded-lg" style="height: 150px;min-width: 200px; ">
                <img  class="rounded-lg z-0" :src="useStore.avatar" alt="" style="height: 150px;min-width: 100%; ">
                <label
                    class="position-absolute bottom-0 end-0 d-flex justify-items-center align-items-center fs-5 btn rounded-circle w-1 h-8 z-10"
                    id="" for="uploadFestivalPhoto">
                    <i class="ri-pencil-fill text-blue-900"></i>
                </label>
                <input type="file" name="" id="uploadFestivalPhoto" hidden @change="useStore.FestivalPhoto($event)" />
            </div>
            <div class="card-title">
                <div class="flex gap-2 mt-5 flex-column">
                    <label for="username">Festival Title</label>
                    <InputText id="username" class="h-10" v-model="useStore.addNewHoliday.FestivalTitle"
                        aria-describedby="username-help" />
                </div>
                <div class="flex gap-2 mt-5 flex-column">
                    <label for="username">Description</label>
                    <InputText id="username" class="h-10" v-model="useStore.addNewHoliday.Description"
                        aria-describedby="username-help" />
                </div>
                <div class="flex gap-2 mt-5 flex-column">
                    <label for="username">Date</label>
                    <Calendar v-model="useStore.addNewHoliday.date" showIcon class="h-10" />
                </div>

            </div>
            <template #footer>
                <Button label="Close" class="bg-white border-orange-400 text-orange-500" @click="visible = false" text />
                <Button label="Submit" class="bg-orange-500 border-none" icon="pi pi-check"
                    @click="useStore.sumbitAddNewHoliday" autofocus />
            </template>
        </Dialog>

        <Dialog v-model:visible="editdialog" modal header="Holiday " :style="{ width: '25vw' }" class="popup_card">
            <div class="img_container border position-relative rounded-lg" style="height: 150px;min-width: 200px; ">
                <img  class="rounded-lg z-0" :src="useStore.avatar" alt="" style="height: 150px;min-width: 100%; ">
                <label
                    class="position-absolute bottom-0 end-0 d-flex justify-items-center align-items-center fs-5 btn rounded-circle w-1 h-8 z-10"
                    id="" for="uploadFestivalPhoto">
                    <i class="ri-pencil-fill text-orange-500"></i>
                </label>
                <input type="file" name="" id="uploadFestivalPhoto" hidden @change="useStore.FestivalPhoto($event)" />
            </div>
            <div class="card-title">
                <div class="flex gap-2 mt-5 flex-column">
                    <label for="username">Festival Title</label>
                    <InputText id="username" class="h-10" v-model="useStore.addNewHoliday.FestivalTitle"
                        aria-describedby="username-help" />
                </div>
                <div class="flex gap-2 mt-5 flex-column">
                    <label for="username">Description</label>
                    <InputText id="username" class="h-10" v-model="useStore.addNewHoliday.Description"
                        aria-describedby="username-help" />
                </div>
                <div class="flex gap-2 mt-5 flex-column">
                    <label for="username">Date</label>
                    <Calendar v-model="useStore.addNewHoliday.date" showIcon class="h-10" />
                </div>

            </div>
            <template #footer>
                <Button label="Close" class="bg-white border-orange-400 text-orange-500" @click="visible = false" text />
                <Button label="Submit" class="bg-orange-500 border-none" icon="pi pi-check"
                    @click="useStore.sumbitAddNewHoliday" autofocus />
            </template>
        </Dialog>

        <Dialog header="Header" v-model:visible="useStore.canShowLoading"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
            :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog>

        <!--  -->
    </div>
    <CreateNewHolidaysList />
    <!-- {{ useStore.holidayData }} -->
</template>


<script setup>
import { ref, onMounted, reactive, computed } from 'vue';
import axios from 'axios'
import { useToast } from "primevue/usetoast";
import dayjs from 'dayjs';
import { useHolidayStore } from "../attendance_settings/stores/HolidayStore";
import Holidays_Master from "./Holidays_Master.vue";
import CreateNewHolidaysList from "./CreateNewHolidaysList.vue";

const useStore = useHolidayStore()

//
const visible = ref(false);
const editdialog = ref(false);

const value = ref(null);
const date = ref();




const toast = useToast();

const onAdvancedUpload = () => {
    toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};

onMounted(async () => {
    await useStore.getHolidays()
})


// const uploadFestivalPhoto = (e) => {
//     if (e.target.files && e.target.files[0]) {
//         addNewHoliday.Holiday_Photo = e.target.files[0];
//         console.log(addNewHoliday.Holiday_Photo);
//     }
// }



  // form.append('FestivalTitle', )
    // form.append('Description', addNewHoliday.Description)
    // form.append('date', addNewHoliday.date)
    // form.append('Holiday_Photo', addNewHoliday.Holiday_Photo)
    // {
    //     FestivalTitle:addNewHoliday.FestivalTitle,
    //     Description :addNewHoliday.Description,
    //     date: addNewHoliday.date,
    //     Holiday_Photo: addNewHoliday.Holiday_Photo
    // }






</script>



<style lang="scss">
.bg-orange {
    background: var(--clr-orange);
}

:root {
    --clr-blue: #002f56;
    --clr-orange: rgb(255, 83, 10);
    --clr-drk-gray: #6c757d;
    --clr-gray: #646464;
    --clr-lit-gray: #e2e2e2;
    --clr-med-gray: #c9c9c9;
    --clr-white: #fff;
}

.clr-trans {
    background: transparent !important;
}

.d-flex {
    display: flex;


}

.d_spc_bt {
    display: flex;
    align-content: center;
    justify-content: space-between;
}

li {
    list-style: none;
}

/* .holiday-settings-btns ul {

} */
.holiday-settings-btns ul>li {}

.holiday-settings-btns button {
    padding: 6px 30px;
    border-radius: 4px !important;
    font-weight: 500;
    font-size: 15px;
    font-family: sans-serif;
}

.cancel_btn {
    border: 1px solid var(--clr-orange);
    color: var(--clr-orange);
    background: var(--clr-white);
    margin: 0 10px;
}

.view_Lists {
    background: var(--clr-blue) !important;
    color: var(--clr-white);
    border: 1px solid var(--clr-blue);
    border-radius: 4px !important;
    margin: 0 10px;
}

.add_new_holiday_btn {
    background: var(--clr-orange);
    border: 1px solid var(--clr-orange);
    color: var(--clr-white);
    margin: 0 0 0 10px;
}

.card-title h3 {
    font-weight: 600;
    margin: 0;
}

.card-title span {
    margin: 0;
    color: var(--clr-drk-gray);
    font-size: 14px;
    line-height: 36px;
    font-family: sans-serif;
}

.card-title {
    width: 95%;
}

.cd-img {
    position: relative;
}

.col_w {
    width: 10rem;
    height: 23rem;
    padding: 0;
    margin: 0;
}

.hover_btn_div {
    position: absolute;
    top: 45%;
    left: 23%;
    width: 60%;
    // border: 1px solid white;
}

.hover_btn_div button {
    border: 1px solid var(--clr-white) !important;
    background: transparent;
    color: var(--clr-white);
    padding: 4px 12px;
    font-size: 18px;
    border-radius: 2px;
    visibility: hidden;
}

.d-ard {
    display: flex;
    justify-content: space-around;
    align-content: center;
    // border: 4px solid yellow;
}

.card-img-top {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

.card-w:hover .hover_btn_div>button {
    visibility: visible;
    cursor: pointer;
    transition: 0.6s ease-in-out !important;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    // border: 4px solid yellow;
}

.card-w:hover .overlay {
    background: rgba(0, 0, 0, 0.349);
    transition: 0.3s ease-in-out;
}

.p-datepicker .p-datepicker-header {
    padding: 0.5rem;
    color: #061328;
    background: #002f56;
    font-weight: 600;
    margin: 0;
    border-bottom: 1px solid #dee2e6;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}

.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-year,
.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-month {
    color: #fff;
    transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;
    font-weight: 600;
    padding: 0.5rem;
}

.p-datepicker:not(.p-datepicker-inline) .p-datepicker-header {
    background: #002f56;
    color: black;
}

.p-calendar-w-btn .p-datepicker-trigger {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    background: #002f56;
}

.card-img,
.img_container {
    position: relative;
}

// #file_upload {
// }
.formgrid {
    position: absolute;
    bottom: 20px;
    right: 20px;

    // border: 1px solid ;

    color: #061328;
}

.formgrid label {
    font-size: 20px !important;
    text-decoration: underline;
    color: var(--clr-blue);
    letter-spacing: 2px;
    line-height: 20px;
}
</style>

{

<!-- <template>
    <div class="card flex justify-content-center">
        <Calendar v-model="date" />
    </div>
</template>

<script setup>
import { ref } from "vue";

const date = ref();
</script> -->
}

