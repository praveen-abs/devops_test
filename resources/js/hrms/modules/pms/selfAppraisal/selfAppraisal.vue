<template>
    <div class="w-[100%]">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-3 col-xxl-3 col-lg-3">
                <div class="card pms-card  left-line">
                    <div class="card-body p-0">
                        <div class=" row">
                            <div class="col-sm-6 col-5 col-md-5 col-xl-5 col-xxl-5 col-lg-5 text-center">
                                <img src="../assests/employee_goals.png" alt="" class="">

                            </div>
                            <div
                                class="col-sm-6  col-7 col-md-7 mt-3 col-xl-7 col-xxl-7 ps-0 col-lg-7 align-items-center flex-column d-flex">
                                <p class="mb-1 text-center">Employee Goals</p>
                                <p class="fw-bold mt-1 f-18 text-center">0
                                </p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3 col-xxl-3 col-lg-3">
                <div class="card pms-card  left-line">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-6 col-5 col-md-5 col-xl-5 col-xxl-5 col-lg-5 text-center">
                                <img src="../assests/self_review.png" alt="" class="">
                            </div>
                            <div
                                class="col-sm-6  col-7 col-md-7 mt-3 col-xl-7 col-xxl-7 ps-0 col-lg-7 align-items-center flex-column d-flex">
                                <p class="mb-1 text-center">Self Review</p>
                                <p class="fw-bold text-center mt-1 f-18">
                                    0 </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-6 col-xl-3 col-xxl-3 col-lg-3">
                <div class="card pms-card left-line">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-6 col-5 col-md-5 col-xl-5 col-xxl-5 col-lg-5 text-center">

                                <img src="../assests/employees_assessed.png" alt="" class="">
                            </div>
                            <div
                                class="col-sm-6  col-7 col-md-7 mt-3 col-xl-7 col-xxl-7 ps-0 col-lg-7 align-items-center flex-column d-flex">
                                <p class="mb-1 text-center">Employees Assessed</p>
                                <p class="fw-bold text-center mt-1 f-18">
                                    0
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-3 col-xxl-3 col-lg-3">
                <div class="card pms-card left-line">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-6 col-5 col-md-5 col-xl-5 col-xxl-5 col-lg-5 text-center">

                                <img src="../assests/pms_rating.png" alt="" class="">
                            </div>
                            <div
                                class="col-sm-6  col-7 col-md-7 mt-3 col-xl-7 col-xxl-7 ps-0 col-lg-7 align-items-center flex-column d-flex">
                                <p class="mb-1 text-center">Final Score Published</p>

                                <p class="fw-bold text-center mt-1 f-18">
                                    0
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-2 " id="initial-section">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 ">
                    <div class="p-3 justify-content-center d-flex align-items-center"><img src="../assests/assign_goals.png"
                            style="width:280px;min-height:250px;"></div>
                    <h6 class="fw-bold">Assign Goals for your employees</h6>
                    <button @click="visibleRight = true" class="btn btn-orange mt-1">
                        <i class="text-white fa fa-plus me-1"></i>
                        Add
                    </button>

                </div>
            </div>
        </div>

        <Sidebar v-model:visible="visibleRight" position="right" class="w-full">
            <template #header>
                <div>
                    <img class="mx-4 left-0 h-8 w-8 absolute" src="../assests/employee_goals.png" alt="">
                    <p class="absolute left-9 mx-4 font-semibold fs-5 ">
                        New Goals Assign
                    </p>
                </div>
            </template>


            <div class="p-2">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Calendar type</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Year</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Frequency</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Assignment Period</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Department</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Employee</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Employee</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div>
                        <p class="font-semibold text-sm text-gray-500">Reviewer</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                </div>

                <div class="border w-full px-2 my-3"></div>


                <div>
                    <p class="font-semibold text-lg">Goals / Areas of Development</p>

                    <div class="grid grid-cols-12 gap-4 place-items-center">
                        <div class="col-span-5">
                            <p class="text-sm whitespace-nowrap font-semibold  text-gray-400">Select Existing Form from the
                                Drop Down</p>
                        </div>
                        <div class="col-span-4">
                            <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                        </div>
                        <div class="col-span-3">
                            <button class="btn btn-orange">view form</button>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-10">
                    <div class="flex justify-center mx-auto ">
                        <button class="p-1 border rounded-lg px-auto"
                            @click="KpiFormCreation = true, visibleRight = false">Create
                            kpi form </button>
                        <button class="btn btn-orange mx-3">publish</button>
                    </div>
                </div>
            </div>
        </Sidebar>


        <Sidebar v-model:visible="KpiFormCreation" position="right" class="w-full">
            <template #header>
                <div>
                    <img class="mx-4 left-0 h-8 w-8 absolute" src="../assests/employee_goals.png" alt="">
                    <p class="absolute left-9 mx-4 font-semibold fs-5 ">
                        KPI Form Creation </p>
                </div>

            </template>

            <div class="mt-5 w-full">
                <div>
                    <p class="font-semibold text-lg">Goals / Areas of Development</p>
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-8 flex justify-between">
                            <div
                                class="grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2  mr-3">
                                <div class="col-span-3 font-semibold fs-6  cursor-pointer w-full" for="file">
                                    <i class="pi pi-folder px-2" style="font-size: 1rem"></i>Browse
                                </div>
                                <span class="col-span-9 px-4">
                                    file
                                </span>
                            </div>
                            <button class="btn btn-orange float-right">Upload</button>
                            <input ref="fileInput" type="file" name="" id="file" hidden accept=".xls, .xlsx">
                        </div>
                        <!-- <div class="col-span-4 flex gap-2">
                            <p class="font-semibold text-lg">Sample</p> <button class="btn btn-orange">Download</button>
                        </div> -->
                    </div>
                </div>
                <div class="border border-black w-full px-2 my-3"></div>

                <div>
                    <div class="flex gap-4">
                        <div>
                            <p class="font-semibold text-lg">Enter the form name</p>
                        </div>
                        <div>
                            <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                        </div>
                    </div>
                </div>


                <div class="w-4/5">
                    <div class="my-1">
                        <p class="font-medium text-gray-500 text-md">Objective</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div class="my-1">
                        <p class="font-medium text-gray-500 text-md">KRA</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div class="my-1">
                        <p class="font-medium text-gray-500 text-md">Frequency</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div class="my-1">
                        <p class="font-medium text-gray-500 text-md">Target</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                    <div class="my-1">
                        <p class="font-medium text-gray-500 text-md">KPI Weightage %</p>
                        <input type="text" name="" id="" class="border p-1 rounded-lg my-1  w-full">
                    </div>
                </div>


            </div>

        </Sidebar>


    </div>
</template>

<script setup>
import { ref } from 'vue';
const visibleRight = ref(false)
const KpiFormCreation = ref(false)
</script>



<style>
.p-sidebar-right .p-sidebar
{
    width: 45rem;
    height: 100%;
}
</style>
