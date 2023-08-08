<template>
    <div>
        <Dialog header="Header" v-model:visible="canShowLoadingScreen" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog>


        <div>
            <DataTable :value="manageEmployeesStore.array_active_employees" :paginator="true" :rows="10" dataKey="id"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
                :rowsPerPageOptions="[5, 10, 25]" v-model:filters="filters" filterDisplay="menu"
                :loading="canShowLoadingScreen" :globalFilterFields="['emp_name', 'emp_code', 'status']">
                <template #empty> No customers found.</template>
                <template #loading> Loading customers data. Please wait. </template>
                <Column class="font-bold" field="emp_name" header="Employee Name"
                    style="min-width: 20rem; text-align: center:  !important;">
                    <template #body="slotProps">

                        <div class="d-flex justify-content-center align-items-center">
                            <p v-if="JSON.parse(slotProps.data.emp_avatar).type == 'shortname'" if
                                class="p-2 w-2 h-18 text-semibold rounded-full bg-blue-900 text-white">{{
                                    JSON.parse(slotProps.data.emp_avatar).data }} </p>

                            <img v-else class="rounded-circle img-md w-2  userActive-status profile-img"
                                style="height: 30px !important;"
                                :src="`data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`" srcset=""
                                alt="" />
                            <p class=" text-left pl-2">{{ slotProps.data.emp_name }} </p>
                        </div>
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                            class="p-column-filter" :showClear="true" />
                    </template>
                </Column>
                <Column field="emp_code" header="Employee Code" class="" style="min-width: 5rem !important;">
                    <template #filter="{ filterModel, filterCallback }">
                        <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                            class="p-column-filter" :showClear="true" />
                    </template>
                </Column>
                <Column field="emp_designation" header="Designation" style="min-width: 15rem;"></Column>
                <Column field="reporting_manager_name" header="Reporting Manager"></Column>
                <Column field="doj" header="DOJ" style="min-width: 10rem;">
                    <template #body="slotProps">{{ dayjs(slotProps.data.doj).format('DD-MMM-YYYY') }}</template>
                </Column>
                <!-- <Column field="blood_group_name" header="Blood Group"></Column> -->
                <Column field="profile_completeness" header="Profile Completeness">
                    <template #body="slotProps">
                        <!-- <ProgressBar :value="slotProps.data.profile_completeness"></ProgressBar> -->

                        <ProgressBar v-if="slotProps.data.profile_completeness <= 39"
                            :value="slotProps.data.profile_completeness"
                            :class="[slotProps.data.profile_completeness <= 39 ? 'progressbar' : '']">
                        </ProgressBar>
                        <ProgressBar class="progressbar_val2"
                            v-if="slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59"
                            :class="[slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]"
                            :value="slotProps.data.profile_completeness">
                        </ProgressBar>

                        <ProgressBar class="progressbar_val3" v-if="slotProps.data.profile_completeness >= 60"
                            :class="[slotProps.data.profile_completeness >= 60]"
                            :value="slotProps.data.profile_completeness">
                        </ProgressBar>

                    </template>
                    <!-- <template #body="slotProps">{{ slotProps.data.profile_completeness + "%" }}</template> -->
                </Column>
                <Column field="enc_user_id" header="View Profile">
                    <template #body="slotProps">
                        <Button icon="pi pi-eye" severity="success" label="View" @click="openProfilePage(slotProps.data)"
                            class="btn btn-orange " style="height: 2em" raised />
                    </template>
                </Column>
            </DataTable>

        </div>
    </div>
</template>
<script setup>
import dayjs from 'dayjs';

import { ref, onMounted } from "vue";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { profilePagesStore } from '../../../profile_pages/stores/ProfilePagesStore';
import { useManageEmployeesStore } from '../manage_service'

const manageEmployeesStore = useManageEmployeesStore()
const profilePageStore = profilePagesStore()

let canShowLoadingScreen = ref(true);

const enc_user_id = ref();

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    emp_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    emp_code: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },

    status: { value: null, matchMode: FilterMatchMode.EQUALS },
});


onMounted(async () => {
    await manageEmployeesStore.getActiveEmployees();
    canShowLoadingScreen.value = false;

});

async function openProfilePage(uid) {
    console.log(uid);
    enc_user_id.value = uid.data;
    profilePageStore.user_code = uid.enc_user_id
    window.location.href = "/pages-profile-new?uid=" + uid.enc_user_id;
}

</script>
