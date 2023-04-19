<template>
  <div class="mr-4 card">
    <div class="px-5 row d-flex justify-content-start align-items-center card-body">
      <div class="flex justify-between gap-6 my-2">
        <div class=" fs-4">
          <p class="text-xl font-medium">The company allows employees to request a salary advance of up to <strong
              class="text-lg"> 100%</strong> of their monthly salary.</p>
        </div>

        <div class="float-right ">
          <button class="btn btn-border-orange">View Report</button>
          <button class="mx-4 btn btn-orange"><i class="mx-2 fa fa-plus" aria-hidden="true"></i>New Request</button>
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
          currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

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




<!-- 
  <Dialog visible="false" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">


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
</style>

