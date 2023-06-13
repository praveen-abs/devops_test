<template>
    <div>

        <div class="mr-4 card">
        <div class="px-5 row d-flex justify-content-start align-items-center card-body">
            <div class="flex justify-between gap-6 my-2">
                <div class=" fs-4">
                    <p class="text-xl font-medium">Five Team Members are eligible for the Loan with Interest as per the
                        <span class="text-lg text-primary text-decoration-underline"> Company's Loan Policy</span></p>
                </div>

                <div class="float-right">
                    <button class="btn btn-border-orange">View Report</button>
                    <button class="mx-4 btn btn-orange"  >
                        <!-- <i class="mx-2 fa fa-plus" aria-hidden="true"></i> -->
                        Approval All
                    </button>

                    <Dialog  header="Header" :style="{ width: '58vw' }" modal  >
                        <template #header>
                            <div><h1 style="border-left: 3px solid var( --orange);padding-left: 5px ;" class="fs-4">New Interest Free Loan Request</h1></div>
                        </template>
                        <div class="card bg-gray-100 bottom-0 mb-10" style="border:none">
                            <div class="card-body">
                                <div class="row mx-2">
                                    <div class="col mx-2">
                                        <h1 class="fs-5 my-2">Required Amount</h1>
                                        <InputText type="text"  placeholder="&#8377; Enter The Required Amount" />
                                        <p class="fs-6 my-2" style="color: var(--clr-gray)">Max Eligible Amount : 20,000</p>
                                    </div>
                                    <div class="col mx-2">
                                        <h1 class="fs-5 my-2">Monthly EMI</h1>
                                        <InputText type="text"  placeholder="&#8377; " />
                                    </div>
                                    <div class="col mx-2">
                                        <h1 class="fs-5 my-2">Term</h1>
                                        <Dropdown  optionLabel="name" placeholder="1.5" class="w-full md:w-10rem" />
                                        <label for="" class="fs-5 ml-2" style="color:var(--navy) ; ">Years</label>
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
                                            <Calendar  showIcon />
                                        </div>

                                        <div class="col-4 mx-2">
                                            <h1 class="fs-5 my-2 ml-2">EMI Start Month</h1>
                                            <Calendar showIcon />
                                        </div>
                                        <div class="col-3">
                                            <h1 class="fs-5 my-2 ml-2" >Total Months</h1>
                                            <InputText type="text"  style="width: 150px !important;" />
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 my-6 bg-gray-100 rounded-lg gap-6">
                            <span class="font-semibold ">Reason</span>
                            <Textarea  class="my-3 capitalize form-control textbox" autoResize type="text" rows="3" />
                        </div>


                        <template #footer>
                            <div class="float-right ">
                                <button class="btn btn-border-orange" >Cancel</button>
                                <button  class="mx-4 btn btn-orange" >Submit</button>
                            </div>
                            <!-- <Button label="" icon="pi pi-times" @click="visible = false" text />
                            <Button label="Yes" icon="pi pi-check" @click="visible = false" text /> -->
                        </template>
                    </Dialog>
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
                <!-- {{ useEmpStore.salaryAdvanceEmployeeData }} -->
                <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Request ID" field="section" style="min-width: 8rem">
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="particular" header="Employee ID" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="" header="Employee Name" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>

                    <Column field="max_limit" header="Advance Amount" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>

                    <Column field="max_limit" header="Date" style="min-width: 12rem">
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



    <Dialog header="Header"  :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }"
    :modal="true" :closable="false" :closeOnEscape="false">
    <template #header>
      <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
        animationDuration="2s" aria-label="Custom ProgressSpinner" />
    </template>
    <template #footer>
      <h5 style="text-align: center">Please wait...</h5>
    </template>
  </Dialog>






    </div>
</template>
