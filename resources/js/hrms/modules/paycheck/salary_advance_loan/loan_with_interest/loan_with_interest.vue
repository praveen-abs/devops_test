<template>
    <div class="mr-4 card">
        <div class="px-5 row d-flex justify-content-start align-items-center card-body">
            <div class="flex justify-between gap-6 my-2">
                <div class=" fs-4">
                    <p class="text-xl font-medium">You are eligible for the Loan with Interest as per the
                        <span  class="text-lg text-primary text-decoration-underline"> Company's Loan Policy </span>
                    </p>
                </div>

                <div class="float-right ">
                    <button class="btn btn-border-orange">View Report</button>
                    <button class="mx-4 btn btn-orange" @click="dialog_NewInterestWithLoanRequest = true">
                        <i class="mx-2 fa fa-plus" aria-hidden="true"></i>
                        New Request
                    </button>
                </div>
            </div>

            <div class="my-6 widget-card">
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5">
                    <div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400">
                        <p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p>
                        <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                    </div>
                    <div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400">
                        <p class="mb-2 font-bold text-ash-medium f-13 "> Total Repaid Amount</p>
                        <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                    </div>

                    <div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400 ">
                        <p class="mb-2 font-bold text-ash-medium f-13 ">Balance Amount</p>
                        <h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6>
                    </div>
                    <div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400">
                        <p class="mb-2 font-bold text-ash-medium f-13 ">Pending Request</p>
                        <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                    </div>
                    <div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400">
                        <p class="mb-2 font-bold text-ash-medium f-13 ">Completed Rquests</p>
                        <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="sample"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Request ID" field="section" style="min-width: 8rem">
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="particular" header="Advance Amount" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="ref" header="Paid On " style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>

                    <Column field="max_limit" header="Expected Return" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>


                    <Column field="Status" header="Status" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>

                </DataTable>

            </div>

        </div>
    </div>

    <Dialog v-model:visible="dialog_NewInterestWithLoanRequest" modal header="Header" :style="{ width: '60vw' }">
        <template #header>
            <div>
                <h1 style="border-left: 3px solid var( --orange);padding-left: 10px ;" class="fs-4">New interest With Loan Request</h1>
            </div>
        </template>
        <div class="row p-2">
            <div class="col-7">

                <div class="card border-0">
                    <div class="card-body bg-gray-100 ">
                        <div class="row  ">
                            <div class="col-6   " style="margin-right: 30px;">
                                <h1 class="fs-5 my-2 ">Required Amount</h1>
                                <InputText type="text" v-model="value" placeholder="&#8377; Enter The Required Amount" />
                                <p class="fs-6 my-2" style="color: var(--clr-gray)">Max Eligible Amount : 20,000</p>
                            </div>
                            <div class="col mx-2">
                                <h1 class="fs-5 my-2">Term</h1>
                                <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="1.5" class="w-full md:w-10rem" />
                                <label for="" class="fs-5 ml-2" style="color:var(--navy) ; ">Years</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pr-5">
                                <button class="bg-danger text-light pt-2 pl-4 pr-4 pb-2  float-right rounded" @click="Calculate_EMI =true">Calculate EMI</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="row">
                    <div class="col-12 pl-8 pr-8 " >

                        <div class="div p-4  allcenter rounded" style="background: #CEE3F4 ; ">
                            <h1 class="fw-bolder fs-4">2.5%</h1>
                            <h1  class=" fw-bolder mt-2">Interest Rate</h1>
                        </div>

                    </div>

                    <div class="col  pl-8 pr-8 " >
                        <div class="div allcenter p-4 rounded " style="background: #FDCFCF;" >
                            <h1 class="fw-bolder fs-4">&#8377; 0</h1>
                            <h1 class="fw-bolder mt-2" >Month EMI</h1>

                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div class="card bg-gray-100 bottom-0 my-4" style="border:none ">
            <div class="card-body mx-4">
                <div class="row">
                    <!-- fw-bolder -->
                    <h1 class="fs-4 my-2  ">EMI Dedution</h1>
                    <h1 class="fs-5 text-gray-600 mb-3">The EMI Dedution Will begin from the Upcoming Payroll</h1>
                        <div class="col-4">
                            <h1 class="fs-5 my-2 ml-2">EMI Start Month</h1>
                            <Calendar v-model="date" showIcon />
                        </div>

                        <div class="col-4 mx-2">
                            <h1 class="fs-5 my-2 ml-2">EMI Start Month</h1>
                            <Calendar v-model="date" showIcon />
                        </div>
                        <div class="col-3">
                            <h1 class="fs-5 my-2 ml-2" >Total Months</h1>
                            <InputText type="text" v-model="value" style="width: 150px !important;" />
                        </div>
                </div>
            </div>
        </div>

        <div class="p-4 my-6 bg-gray-100 rounded-lg gap-6">
            <span class="font-semibold ">Reason</span>
            <Textarea  class="my-3 capitalize form-control textbox" autoResize type="text" rows="3" />
        </div>

        <div class="float-right ">
          <button class="btn btn-border-dark border-dark px-5">Cancel</button>
          <button  class="mx-4 btn btn-orange px-5">Submit</button>
        </div>

    </Dialog>


    <Dialog v-model:visible="Calculate_EMI" modal header="Header" :style="{ width: '50vw' }">
        <template #header>
            <div>
                <h1 style="border-left: 3px solid var( --orange);padding-left: 10px ;" class="fs-4">New interest With Loan Request</h1>
            </div>
        </template>

    </Dialog>






    <!-- <Dialog visible="false" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">


    </Dialog>

    <Dialog header="Header" visible="false" :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }"
        :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog> -->
</template>
<script setup>
import { ref, reactive } from 'vue';

const value = ref();
const options = ref(['Off', 'On']);

const dialog_NewInterestWithLoanRequest =ref(false);

const Calculate_EMI = ref(false);

const activetab = ref(1)
const activetab1 = ref(1)

const ingredient = ref('');


</script>
<style>
:root {
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
}

.orange_btn {
    background-color: var(--orange);
    padding: 7px 30px;
    border-radius: 4px 0 0 4px;
    color: var(--white);
}

.Enable_btn {
    border: 1px solid var(--navy);
    padding: 7px 30px;
    border-radius: 0 4px 4px 0;

}

.cancel_btn {
    border: 1px solid var(--navy);
    padding: 7px 30px;
    border-radius: 4px 0 0 4px;

}
.allcenter{
    display: flex;
     flex-direction: column;
      justify-content: center;
       align-items: center;
}
</style>


{
    <!--

<template>
    <div class="card flex justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="visible = true" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";


</script>
     -->
}

