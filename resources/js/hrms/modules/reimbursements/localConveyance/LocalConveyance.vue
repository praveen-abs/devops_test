<template>
    <div class="card">
        <DataTable ref="dt" :value="employee_service.data_local_convergance" dataKey="id" :paginator="true" :rows="10"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">


            <Column field="date" header="Date" style="min-width: 8rem" dataType="date" sortable>
                <template #body="slotProps">
                    {{ moment(slotProps.data.date).format('DD-MMM-YYYY') }}
                </template>
            </Column>
            <Column header="Mode Of Transport" style="min-width: 12rem">
                <template #body="slotProps">
                    {{ slotProps.data.vehicle_type }}
                </template>
            </Column>

            <Column field="from" header="From " style="min-width: 8rem">
                <template #body="slotProps">
                    {{ slotProps.data.from }}
                </template>
            </Column>
            <Column field="to" header="To" style="min-width: 8rem">
                <template #body="slotProps">
                    {{ slotProps.data.to }}
                </template>
            </Column>
            <Column field="distance_travelled" header="Total Distance" style="min-width: 4rem">
                <template #body="slotProps">
                    {{ slotProps.data.distance_travelled }}
                </template>
            </Column>
            <Column field="Amt_km" header="Amt/Km" style="min-width:4rem">
                <template #body="slotProps">
                    {{ slotProps.data.cost_per_km }}
                </template>
            </Column>

            <Column field="total_expenses" header="Amount" style="min-width: 6rem">
                <template #body="slotProps">
                    {{ slotProps.data.total_expenses }}
                </template>
            </Column>
            <Column field="user_comments" header="Remarks" style="min-width: 12rem">
                <template #body="slotProps">
                    {{ slotProps.data.user_comments }}
                </template>
            </Column>
        </DataTable>
    </div>

    <Dialog v-model:visible="employee_service.localconvergance_dailog" :style="{ width: '450px' }" header="Local Conveyance"
        :modal="true" class="p-fluid">

        <div class="field">
            <label for="name">Date <span class="text-danger">*</span></label>
            <Calendar inputId="dateformat" v-model="employee_service.employee_local_conveyance.travelled_date"
                dateFormat="dd/mm/yy" />

            <!-- {{ employee_local_conveyance.travelled_date }} -->
        </div>

        <div class="field col">
            <label for="Claim Amount">Mode of transport <span class="text-danger">*</span> </label>
            <Dropdown v-model="employee_service.employee_local_conveyance.mode_of_transport"
                :options="employee_service.local_Conveyance_Mode_of_transport" optionLabel="label" optionValue="value"
                placeholder="Select Mode Of Transport" class="w-full"
                @change="employee_service.amountperKm(employee_service.employee_local_conveyance.mode_of_transport)" />
        </div>

        <div class="flex formgrid">
            <div class="field col">
                <label for="Eligible Amount">From <span class="text-danger">*</span> </label>
                <InputText v-model="employee_service.employee_local_conveyance.travel_from" />
            </div>
            <div class="field col">
                <label for="Claim Amount">To <span class="text-danger">*</span> </label>
                <InputText v-model="employee_service.employee_local_conveyance.travel_to" />
            </div>
        </div>
        <div class="flex formgrid">
            <div class="field col">
                <label for="Eligible Amount">Total Distance <span class="text-danger">*</span> </label>
                <InputText v-model="employee_service.employee_local_conveyance.total_distance_travelled"
                    @input="employee_service.amount_calculation()" />
            </div>
            <div class="field col"
                v-if="employee_service.employee_local_conveyance.mode_of_transport == 'Public Transport'">
                <label for="Eligible Amount">Actual Amount <span class="text-danger">*</span> </label>
                <InputText :readonly="employee_service.employee_local_conveyance.mode_of_transport ==
                    'Public Transport'
                    ? false
                    : true" v-model="employee_service.employee_local_conveyance.local_convenyance_total_amount
        " />
            </div>
            <div class="field col" v-else>
                <label for="Eligible Amount">Amt/Km <span class="text-danger">*</span></label>
                <InputText :readonly="employee_service.employee_local_conveyance.mode_of_transport ==
                    'Public Transport'
                    ? false
                    : true" v-model="employee_service.employee_local_conveyance.Amt_km
        " />
            </div>
        </div>

        <div class="field col" :hidden="employee_service.employee_local_conveyance.mode_of_transport ==
            'Public Transport'
            ? true
            : false
            ">
            <label for="Eligible Amount">Amount <span class="text-danger">*</span> </label>
            <InputText @input="employee_service.amountperKm" v-model="employee_service.employee_local_conveyance
                .local_convenyance_total_amount
                " />
        </div>
        <div class="field col">
            <label for="Eligible Amount">Remarks</label>
            <Textarea v-model="employee_service.employee_local_conveyance.local_conveyance_remarks
                " autoResize rows="2" cols="30" />
        </div>

        <template #footer>
            <Button label="Cancel" icon="pi pi-times" style="height: 30px; color: black" class="p-button-text"
                @click="employee_service.hideDialog" />
            <Button
                :disabled="!employee_service.employee_local_conveyance.travelled_date == '' && !employee_service.employee_local_conveyance.mode_of_transport == '' ? false : true"
                label="Save" icon="pi pi-check" style="height: 30px; background: rgb(255 135 38); color: white"
                @click="employee_service.post_data_for_local_convergance" />
        </template>
    </Dialog>
</template>


<script setup>

import { employee_reimbursment_service } from '../stores/EmployeeReimbursementsService'


const employee_service = employee_reimbursment_service();

</script>
