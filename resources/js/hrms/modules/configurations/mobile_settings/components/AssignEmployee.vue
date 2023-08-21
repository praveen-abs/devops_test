<template>
    <button @click="useStore.employeeAssignDialog = true">click</button>
    <Dialog v-model:visible="useStore.employeeAssignDialog" modal header="Holiday " :style="{ width: '70vw' }"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" style="border-top:5px solid #002f56" class="popup_card">
        <template #header>
            <div class="w-full p-2">
                <div class="flex justify-between">
                    <div>
                        <p class="text-lg font-semibold">Employee Assign</p>
                    </div>
                    <div>
                        <!-- <Dropdown class="w-full" placeholder="select department" /> -->
                    </div>
                </div>
            </div>
        </template>
        <!-- {{ type }} -->
        <div class="flex w-[100%]">
            <div class="">
                <button class="text-[12px] w-[100px] rounded-l-[8px] h-[26px] bg-[#000000f1] hover:bg-[#000] text-[#fff]" @click="EnableAllAndDisableAll(selectedEmployee)">Enable All</button>
                <button class="text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]">Disable All</button>
            </div>
        </div>
        {{ selectedEmployee }}
        <div class="grid grid-cols-12 gap-2 mt-3">
            <div class="col-span-4 flex items-center">
                <input type="text" placeholder="search employee.." class="border rounded-lg bg-gray-100 p-1.5 w-11/12">
            </div>
            <div class="flex col-span-5 items-center">
                <p>Legal entity</p>
                <Dropdown v-model="legalEntity" class="w-full min-[280px]:" placeholder="legal entity"
                    @change="getFilteredSource($event.value, '')"
                    :options="dropdownValues ? dropdownValues.legalEntity : []" optionLabel="client_name"
                    optionValue="id" />
            </div>
            <div class="flex col-span-3 items-center">
                <p>Department</p>
                <Dropdown v-model="department" class="w-full" placeholder="department"
                    @change="getFilteredSource('', $event.value)" :options="dropdownValues ? dropdownValues.department : []"
                    optionLabel="name" optionValue="id" />

            </div>
        </div>

        <div class="my-3 table-responsive">
            <DataTable v-model:selection="selectedEmployee" :value="filteredSource" ref="dt" dataKey="id" :paginator="true"
                :rows="10"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
                <!-- <Column selectionMode="multiple" headerStyle="width: 3rem"></Column> -->
                <Column field="name" header="Name" style="min-width: 12rem"></Column>
                <Column header="Department" field="department_name" style="min-width: 8rem"></Column>
                <Column field="" header="Action" style="min-width: 12rem">
                    <template #body="slotProps">
                        <div class="mx-auto">
                            <button
                                class=" text-[12px] w-[100px] rounded-l-[8px] h-[26px]  bg-[#000000f1] hover:bg-[#000] text-[#fff]" 
                                @click="EnableDisable(slotProps.data.id, 1)">Enable</button>
                            <button
                                class=" text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]"
                                @click="EnableDisable(slotProps.data.id, 0)">Disable</button>
                        </div>
                    </template>
                </Column>
            </DataTable>
            <div class="flex justify-center w-1/2 p-2 mx-auto">
                <button @click="useStore.employeeAssignDialog = false"
                    class="mx-2 p-2 bg-black !text-[#fff] border-[2px] border-black rounded-lg">Cancel</button>
                <!-- <button class="mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg" @click="saveCurrentlySelectedEmployeeConfig(selectedEmployee, type)">Confirm</button> -->
                <button class="mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg"
                    @click="saveCurrentlySelectedEmployeeConfig(selectedEmployee, type)">Confirm</button>
            </div>
        </div>
    </Dialog>
</template>


<script setup>
import axios from 'axios';
import { onMounted, onUpdated, reactive, ref } from 'vue';
import { useMobileSettingsStore } from '../MobileSettingsService';


const useStore = useMobileSettingsStore()


const props = defineProps({
    type: {
        type: Number,
        required: true,
    },
})


const visible = ref(false)

const selectedEmployee = ref([]);
const dropdownValues = ref()
const legalEntity = ref()
const department = ref()
const filteredSource = ref();

let format = {
        id: "",
        isEnabled: ""
    }

const btn = ref(1);

const getDropdownValues = async () => {
    await axios.get('/getalldropdownfiltersetting').then(res => {
        dropdownValues.value = res.data
    })
}

const getFilteredSource = (legalEntity, department) => {
    console.log(legalEntity, department);
    axios.post('/get_empolyees_filter_data', {
        department_id: department,
        client_name: legalEntity
    }).then(res => {
        console.log(res.data);
        filteredSource.value = res.data;
    })
}


const selectedUserId = reactive([])

// Enable Disable function 

function EnableDisable(userId, EnableOrDisable) {
    console.log("isEnabled:" + EnableOrDisable);
    format.id = userId;
    format.isEnabled = EnableOrDisable;
    selectedUserId.push(format)
    console.log(selectedUserId);
}

function EnableAllAndDisableAll(){
    filteredSource.value.forEach(element=> selectedUserId.push(element.user_code));
}


// const Employee_ConfigData = reactive([])

const saveCurrentlySelectedEmployeeConfig = (data, type) => {

    axios.post('/SaveEmployeeAppConfigStatus', {
        "app_sub_modules_link_id": type,
        "selected_employees_user_code": selectedUserId
    }
    ).then((res) => {
        console.log(res);
    })

    // console.log(data);
    // let format = {
    //     "is_mobile_app_active": [],
    //     "is_check_active": [],
    // }
    // data.forEach(element => {
    //     if (type == 1) {
    //         format.is_mobile_app_active.push(element.user_code)
    //     } else
    //         if (type == 2) {
    //             format.is_check_active.push(element.user_code)
    //         }
    // });
    // console.log(format);

    // axios.post('/SaveEmployeeAppConfigStatus', {
    //     is_mobile_app_active: format.is_mobile_app_active ? format.is_mobile_app_active : [],
    //     is_check_active: format.is_check_active ? format.is_check_active : []

    // }
    // )




}





onMounted(() => {
    getDropdownValues()
})


onUpdated(() => {
    selectedEmployee.value = null

})


</script>


<style lang="scss">
.p-dropdown {
    background: #ffffff;
    border: 1px solid #ced4da;
    transition: background-color 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s;
    border-radius: 6px;
    height: 30px;

    .p-dropdown-label {
        background: transparent;
        border: 0 none;
        margin-top: -7px;
    }
}
</style>



