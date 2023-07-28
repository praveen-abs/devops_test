<template>
    <div>
        <DataTable  :value="arrayAbsent" :paginator="true" :rows="10" dataKey="id"
        paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
        :rowsPerPageOptions="[5, 10, 25]"
        currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
        v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
        <template #empty> No Employeee found. </template>
        <template #loading> Loading customers data. Please wait. </template>

        <Column class="font-bold" field="employee_name" header="Employee Name">
            <template #body="slotProps">
                <div class="flex justify-content-center align-items-center">
                    <p v-if="JSON.parse(slotProps.data.employee_avatar).type == 'shortname'" if
                        class="p-2 w-3 h-18 text-semibold rounded-full bg-blue-900 text-white" >{{
                            JSON.parse(slotProps.data.employee_avatar).data }} </p>

                    <img v-else class="rounded-circle img-md w-3 userActive-status profile-img"
                        style="height: 30px !important;"
                        :src="`data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`" srcset=""
                        alt="" />
                    <p class=" text-left pl-2">{{ slotProps.data.employee_name }} </p>
                </div>
            </template>
            <template #filter="{ filterModel, filterCallback }">
                <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                    class="p-column-filter" :showClear="true" />
            </template>
        </Column>




        <Column class="font-bold" field="attendance_date" header="Attendance Date"> 
            <template #body="slotProps">
                {{dayjs(slotProps.data.attendance_date).format('DD-MMM-YYYY')}}
            </template>
           
        </Column>

        <Column class="font-bold" field="regularization_type" header="Regularization Type"> </Column>
        <Column class="font-bold" field="checkin_time" header="Checkin Time"> </Column>
        <Column class="font-bold" field="checkout_time" header="Checkout Time"> </Column>
        <Column class="font-bold" field="reason" header="Reason"> </Column>
        <Column class="font-bold" field="custom_reason" header="Custom Reason"> </Column>
  
        <Column class="font-bold" field="reviewer_comments" header="Reviewer Comments"> </Column>
        <Column class="font-bold" field="reviewer_reviewed_date" header="Reviewed Date"> </Column>
        <Column class="font-bold" field="status" header="Status">
            <template #body="{ data }">
                <Tag :value="data.status" :severity="getSeverity(data.status)" />
            </template>
            <!-- <template #body="{ data }">
    <span :class="'customer-badge status-' + data.status">{{ data.status }}</span>
  </template> -->
            <template #filter="{ filterModel, filterCallback }">
                <Dropdown v-model="filterModel.value" @change="filterCallback()" :options="statuses"
                    placeholder="Select" class="p-column-filter" :showClear="true">
                    <template #value="slotProps">
                        <span :class="'customer-badge status-' + slotProps.value" v-if="slotProps.value">{{
                            slotProps.value
                        }}</span>
                        <span v-else>{{ slotProps.placeholder }}</span>
                    </template>
                    <template #option="slotProps">
                        <span :class="'customer-badge status-' + slotProps.option">{{
                            slotProps.option
                        }}</span>
                    </template>
                </Dropdown>
            </template>
        </Column>



    </DataTable>
    </div>

</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import moment from "moment";
import dayjs from 'dayjs';
import { useNow, useDateFormat } from '@vueuse/core'

const arrayAbsent = ref();

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },

    status: { value: 'Pending', matchMode: FilterMatchMode.EQUALS },
});


onMounted(()=>{
    getAbsentRegularization();
})

async function getAbsentRegularization(){

    await axios.get('/fetch-absent-regularization-data').then((res)=>{
        arrayAbsent.value = res.data;
        console.log(arrayAbsent.value);
    }).finally(()=>{

    })

}

const getSeverity = (status) => {
    switch (status) {
        case 'Rejected':
            return 'danger';

        case 'Approved':
            return 'success';


        case 'Pending':
            return 'warning';

    }
};



</script>