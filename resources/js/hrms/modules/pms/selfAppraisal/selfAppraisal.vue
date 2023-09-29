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
                <button v-if="activetab == 1" @click="visibleRight = true"
                    class=" bg-[#F9BE00] px-4 text-[16px] rounded-md text-[#000] h-[35px] font-semibold ">
                    <i class="pi pi-plus mr-2"></i>
                    Add Goals</button>
                <!-- v-model="filters['global'].value"  -->
                <InputText placeholder="Keyword Search" class="h-[35px] w-[211px] mx-4" />
            </div>


        </div>

        <div class="" v-if="activetab == 1" >
            <DataTable paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" class=" w-[100%] ">
                <Column field="name" header="Name" style="width: 25%"></Column>
                <Column field="country.name" header="Country" style="width: 25%"></Column>
                <Column field="company" header="Company" style="width: 25%"></Column>
                <Column field="representative.name" header="Representative" style="width: 25%"></Column>
            </DataTable>
        </div>
        <div class="" v-if="activetab == 2">
            <h1 class=" text-[20px] text-[#000]">completed</h1>
        </div>
        <Sidebar v-model:visible="visibleRight" position="right"  class=" !w-[650px]" >
            <h2 class=" text-[#000] text-[16px] font-semibold "> New Goals Assign</h2>
            <div class="grid grid-cols-2 gap-4  mt-2">
                <div class=" flex flex-col">
                    <label for="" class=" text-[12px] text-[#757575] my-2">Calendar Type</label>
                    <InputText type="text" v-model="value" class=" h-10 !bg-[#DDDDDD] !border-[#F6F6F6] border-[1px]"  />
                </div>
                <div class=" flex flex-col ">
                    <label for="" class=" text-[12px] text-[#757575]  my-2">Year</label>
                    <InputText type="text" v-model="value" class="h-10 !bg-[#DDDDDD] !border-[#F6F6F6] border-[1px]"  />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4  mt-2">
                <div class=" flex flex-col">
                    <label for="" class=" text-[12px] text-[#757575] my-2">Frequency</label>
                    <InputText type="text" v-model="value" class=" h-10 !bg-[#DDDDDD] !border-[#F6F6F6]"  />
                </div>
                <div class=" flex flex-col ">
                    <label for="" class=" text-[12px] text-[#757575]  my-2">Assigment Period</label>
                    <InputText type="text" v-model="value" class="h-10 !bg-[#DDDDDD] !border-[#F6F6F6]"  />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4  mt-2">
                <div class=" flex flex-col">
                    <label for="" class=" text-[12px] text-[#757575] my-2">Department</label>
                    <InputText type="text" v-model="value" class=" h-10 !bg-[#DDDDDD] !border-[#F6F6F6] border-[1px]"  />
                </div>
                <div class=" flex flex-col ">
                    <label for="" class=" text-[12px] text-[#757575]  my-2">Employee</label>
                    <InputText type="text" v-model="value" class="h-10 !bg-[#DDDDDD] !border-[#F6F6F6]"  />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4  mt-2">
                <div class=" flex flex-col ">
                    <label for="" class=" text-[12px] text-[#757575]  my-2">Reviewer</label>
                    <InputText type="text" v-model="value" class="h-10 !bg-[#DDDDDD] !border-[#F6F6F6]"  />
                </div>
            </div>
            <div class="  w-[100%] ">
                <hr  class=" border-[1px] my-4 ">
                <h1 class=" text-[#000] font-semibold text-[16px]">Goals/ Arears of Development</h1>
                <div class="flex items-center justify-between">
                    <p class=" text-[12px] text-[#757575]">Select Existing Form from the Drop Down</p>
                    <Dropdown optionLabel="name" placeholder="Select KPI form" class=" h-10 mx-2 w-[400px]" />
                    <button class=" bg-[#F9BE00] h-[33px] w-[144px] rounded-[8px] ">View From</button>
                </div>
            </div>



            <div class=" flex items-center justify-center absolute bottom-6 left-[25%]">
                <button class=" text-[#000] border-[1px] border-[#000] rounded-[8px] p-2 mx-4 w-[144px] h-[33px]" @click="Create_KPI_From = true ,visibleRight= false ">
                    Create KPI From
                    </button>
                    <button class="bg-[#F9BE00] text-[#000] rounded-[8px] p-2 w-[144px] h-[33px]" @click="visibleRight=false" > Publish</button>

            </div>
        </Sidebar>

        <Sidebar v-model:visible="Create_KPI_From" position="right"  class=" !w-[650px]" >
            <h2 class=" text-[#000] text-[16px] font-semibold ">KPI From Creation</h2>

            <div class="  w-[100%] ">
                <div class=" flex flex-col">
                    <h1 class=" text-[#000] font-semibold text-[16px]">Goals/ Arears of Development</h1>
                    
                </div>

                <div class="flex items-center justify-between">
                    <Dropdown optionLabel="name" placeholder="Select KPI form" class=" h-10 mx-2 w-[400px]" />
                    <button class=" bg-[#F9BE00] h-[33px] w-[144px] rounded-[8px] ">View From</button>
                </div>
            </div>
        </Sidebar>





    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

const activetab = ref(1);

const visibleRight = ref(false);

const Create_KPI_From = ref(false);



</script>

<style>
.p-dropdown .p-dropdown-label
{
    background: transparent;
    border: 0 none;
    margin-top: -6px;
}
</style>