<template>
    <div>
        <div class="my-4">
            <h6>Team Resignation Approval</h6>
        </div>
        <div class="table-responsive">
            <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" 
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

                <Column header="Sections" field="section" style="min-width: 8rem">
                    <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                </Column>

                <Column field="particular" header="Particulars" style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                </Column>

                <Column field="ref" header="References " style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                </Column>

                <Column field="max_limit" header="Max Limit" style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                </Column>

                <Column field="Declaration Amount" header="Declaration Amount" style="min-width: 12rem">
                  
                </Column>
                <Column field="Status" header="Status" style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                </Column>
                <Column field="" header="Action" style="min-width: 12rem">

                    
                </Column>
            </DataTable>

        </div>
    </div>
</template>