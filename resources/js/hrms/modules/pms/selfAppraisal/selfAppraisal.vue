<template>
    <div>
        <div class=" grid grid-cols-4 gap-4 px-4 mt-[20px] ">
            <div class=" !shadow-xl border-[1px] flex rounded-lg justify-around items-center ">
                <img src="../assests/employee_goals.png" class=" w-[70px] " alt="">
                <div class=" flex flex-col">
                    <h1 class=" font-semibold text-[20px]  font-['poppins']">Employee Goals</h1>
                    <span class=" text-[16px] ">74/7</span>
                </div>
            </div>
            <div class=" !shadow-xl border-[1px] flex rounded-lg justify-around items-center">
                <div>
                    <img src="../assests/self_review.png" class="  w-[70px] " alt="">
                </div>
                <div class=" flex flex-col">
                    <h1 class=" font-semibold text-[20px]  font-['poppins']">Employee Goals</h1>
                    <span class=" text-[16px] ">74/7</span>
                </div>
            </div>
            <div class="flex  !shadow-xl border-[1px] rounded-lg justify-around items-center">
                <img src="../assests/pms_rating.png" class=" w-[70px] " alt="">
                <div class=" flex flex-col">
                    <h1 class=" font-semibold text-[20px]  font-['poppins']">Employee Goals</h1>
                    <span class=" text-[16px] ">74/7</span>
                </div>
            </div>
            <div class="flex !shadow-xl border-[1px] rounded-lg justify-around items-center">
                <img src="../assests/employees_assessed.png" class=" w-[70px] " alt="">
                <div class=" flex flex-col">
                    <h1 class=" font-semibold text-[20px]  font-['poppins']">Employee Goals</h1>
                    <span class=" text-[16px] ">74/7</span>
                </div>
            </div>
        </div>
        <div class=" flex justify-between mt-5">

            <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed mb-3 border-b-[3px] border-gray-300 "
                id="pills-tab" role="tablist">
                <li class=" nav-item" role="presentation">
                    <a class="px-2 position-relati3e border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                        data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                        @click="activetab = 1"
                        :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                        CURRENT
                    </a>
                    <div v-if="activetab === 1" class="h-1 rounded-l-3xl relative top-1 "
                        style="border: 2px solid #F9BE00 !important;"></div>
                    <!-- <div v-else class=" border-2 h-1 rounded-l-3xl border-gray-300"></div> -->
                </li>

                <li class=" nav-item position-relative  border-0" role="presentation">
                    <a class=" text-center px-3  border-0 font-['poppins'] text-[12px]  text-[#001820]" id=""
                        data-bs-toggle="pill" href="" @click="activetab = 2"
                        :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']" role="tab"
                        aria-controls="" aria-selected="true">
                        COMPLETED
                    </a>
                    <div v-if="activetab === 2" class=" h-1 relative top-1  bottom-[1px] left-0 w-[100%]"
                        style="border: 2px solid #F9BE00 !important;"></div>
                    <!-- <div v-else class=" border-3 h-1  border-gray-300"></div> -->
                </li>
            </ul>

            <div class=" flex justify-between">
                <button class=" bg-[#F9BE00] px-4 rounded-md text-[#000] h-[35px]">Add Goals</button>
            </div>


        </div>


        <DataTable  paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" class=" w-[100%] ">
            <Column field="name" header="Name" style="width: 25%"></Column>
            <Column field="country.name" header="Country" style="width: 25%"></Column>
            <Column field="company" header="Company" style="width: 25%"></Column>
            <Column field="representative.name" header="Representative" style="width: 25%"></Column>
        </DataTable> 


    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
</script>