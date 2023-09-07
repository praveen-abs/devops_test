<template>
    <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show fade active" id="applications_tab" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div class="flex justify-between">
                    <div class="">
                        <p class="text-lg font-semibold">Our Accounting Softwares</p>
                        <p class="text-muted fs-6">
                            Here you can integrate with one of our accounting softwares below
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <div class="search-wrapper">
                            <!-- <i class="fa fa-search search-icon"></i> -->
                            <input type="text" name="" id="" class="search-input form-control"
                                placeholder="Search App..." />
                        </div>
                        <div class="">
                            <button class="btn btn-orange" @click="addApps = true">
                                <i class="fa fa-plus-circle me-2"></i>Add New
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
                    style="display: grid;">
                    <div class=" p-2 mx-1 my-4 bg-white border-gray-200 rounded-lg shadow-md border-1"
                        v-for="code of usePayroll.accountingCodeSource" :key="code">
                        <!-- {{ code.accounting_soft_logo }} -->
                        <div class="flex justify-between gap-6 my-4">
                            <div class="w-4 mx-2">
                                <img :style="{ height: '80px', width: '80px' }" alt="" />
                            </div>
                            <div class="m-auto">
                                <InputSwitch :true-value=1 :false-value=0 v-model="value" @change="usePayroll.enableAccountingSoftware(code,value)"  />
                            </div>
                        </div>
                        <div class="mx-4 my-4">
                            <h4 class="text-2xl font-bold text-gray-700">
                                {{ code.accounting_soft_name }}
                            </h4>
                        </div>
                        <div class="mx-4 my-4">
                            <p class="w-full text-gray-500">
                                {{ code.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Dialog v-model:visible="addApps" modal :style="{ width: '35vw', height: '100vh' }">
        <div class="">
            <div class="my-4 mt-2">
                <h1 class="text-2xl font-bold ">App Details</h1>
            </div>
            <div class="my-4">
                <p>Upload a logo <span class="text-muted">(Optional)</span><i
                        class="fa fa-exclamation-circle text-muted ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                        title=".png,jpg.jpeg"></i></p>
                <div class="d-flex justify-content-center align-items-center">

                    <input type="file" id="upload" hidden @click="integration.app_logo_attachment" />
                    <label id="file_upload" for="upload">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.3"
                            stroke="currentColor" class="w-1 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                    </label>


                </div>
            </div>
            <div class="col-12">
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="text-xl font-semibold text-black form-label">App
                        Name</label>
                    <input type="email" class="form-control" id="" placeholder="App name"
                        v-model="usePayroll.accountingCode.accounting_soft_name">
                </div>
            </div>
            <div class="col-12">
                <div class="">
                    <label for="" class="text-xl font-semibold text-black form-label">Description</label>
                    <textarea class="resize-none form-control" placeholder="Description"
                        v-model="usePayroll.accountingCode.description" id="" rows="3"></textarea>
                </div>

            </div>



        </div>

        <template #footer>
            <button type="button" class="btn btn-orange"
                @click="usePayroll.saveAccountingCode(usePayroll.accountingCode)">Submit</button>
        </template>
    </Dialog>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";
import { usePayrollMainStore } from "../../../../stores/payrollMainStore";

const usePayroll = usePayrollMainStore()


const visible = ref(false);
const addApps = ref(false);
const value = ref(false);


onMounted(() => {
    usePayroll.getAccountingSoftware()
})
</script>

<style>
.p-dialog .p-dialog-header .p-dialog-header-icon:last-child {
    right: 25px;
    background: white;
    position: absolute;
    z-index: 999;
}

#file_upload {
    display: inline-block;
    cursor: pointer;
}
</style>
