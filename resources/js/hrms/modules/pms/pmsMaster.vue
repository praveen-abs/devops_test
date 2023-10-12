<template>
    <div>
        <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed mb-3 border-b-[3px] border-gray-300 " id="pills-tab"
            role="tablist">
            <li class=" nav-item" role="presentation">
                <a class="px-2 position-relati3e border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                    data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" @click="activetab = 1"
                    :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                    SELF APPRAISAL
                </a>
                <div v-if="activetab === 1" class="relative h-1 rounded-l-3xl top-1 "
                    style="border: 2px solid #F9BE00 !important;"></div>
                <!-- <div v-else class="h-1 border-2 border-gray-300  rounded-l-3xl"></div> -->
            </li>

            <li class="border-0  nav-item position-relative" role="presentation">
                <a class=" text-center px-3  border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                    data-bs-toggle="pill" href="" @click="activetab = 2"
                    :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']" role="tab"
                    aria-controls="" aria-selected="true">
                    TERM APPRAISAL
                </a>
                <div v-if="activetab === 2" class=" h-1 relative top-1  bottom-[1px] left-0 w-[100%]"
                    style="border: 2px solid #F9BE00 !important;"></div>
                <!-- <div v-else class="h-1 border-gray-300  border-3"></div> -->
            </li>

            <li class="border-0  nav-item position-relative" role="presentation">
                <a class=" text-center px-3  border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                    data-bs-toggle="pill" href="" @click="activetab = 3"
                    :class="[activetab === 3 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']" role="tab"
                    aria-controls="" aria-selected="true">
                    ORGANIZATION APPRAISAL
                </a>
                <div v-if="activetab === 3" class="h-1 rounded-r-3xl relative top-1 w-[100%] left-0"
                    style="border: 2px solid #F9BE00 !important;"></div>
                <!-- <div v-else class="h-1 border-gray-300  border-3 rounded-r-3xl"></div> -->
            </li>

            <li class="border-0  nav-item position-relative" role="presentation">
                <a class=" text-center px-3  border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                    data-bs-toggle="pill" href="" @click="activetab = 4"
                    :class="[activetab === 4 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']" role="tab"
                    aria-controls="" aria-selected="true">
                    PMS CONFIG
                </a>
                <div v-if="activetab === 4" class="h-1 rounded-r-3xl relative top-1 w-[100%] left-0"
                    style="border: 2px solid #F9BE00 !important;"></div>
                <!-- <div v-else class="h-1 border-gray-300  border-3 rounded-r-3xl"></div> -->
            </li>

            <li class="border-0  nav-item position-relative" role="presentation">
                <a class=" text-center px-3  border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                    data-bs-toggle="pill" href="" @click="activetab = 5"
                    :class="[activetab === 5 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']" role="tab"
                    aria-controls="" aria-selected="true">
                    PMS FORMS MANAGEMENTS
                </a>
                <div v-if="activetab === 5" class="h-1 rounded-r-3xl relative top-1 w-[100%] left-0"
                    style="border: 2px solid #F9BE00 !important;"></div>
                <!-- <div v-else class="h-1 border-gray-300  border-3 rounded-r-3xl"></div> -->
            </li>

        </ul>

        <div>
            <div v-if="activetab == 1">
                <selfAppraisal />
            </div>
        </div>

    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';

import selfAppraisal from './selfAppraisal/selfAppraisal.vue';
import { usePmsMainStore } from './stores/pmsMainStore'
import {usePmsHelperStore} from './stores/pmsHelperStore'
import { Service } from '../Service/Service';
import axios from 'axios';

const useStore = usePmsMainStore()
const useHelper = usePmsHelperStore()
const useService = Service()

const activetab = ref(1);


onMounted(async () => {
    await useStore.getSelfAppraisalDashboardDetails(194)
    // await useStore.getPmsConfiguration()
    // await useHelper.getKpiAsDropdown()
    // await useHelper.getManagerList()
})



</script>

