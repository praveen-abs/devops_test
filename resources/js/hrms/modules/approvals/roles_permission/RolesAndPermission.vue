<template>
    <div v-if="RolePermission.rolesPermission == 1">

        <div class="w-full mt-30">
        <div class="">
            <h1 class="fs-2 fw-semibold my-3">User Roles</h1>
            <p class=" fw-semibold mb-3">User Roles can be assigned to the employees from here. New roles can be created and
                privileges for all these roles can be managed from this section.</p>
        </div>
        <div class="card bg-blue-200 h-20 border-none p-4 ">
            <div class="d-flex justify-content-between align-items-center ">
                <div class=" w-80 ">
                    <input type="text" name="" id="" placeholder="search" class="rounded h-10 w-80 pl-2 shadow-md">
                </div>
                <div class="">
                    <button class=" bg-blue-800 px-4 py-2 rounded text-white mx-3 shadow-md">save</button>
                    <button class="bg-white text-blue-800 px-3 py-2 rounded shadow-md" @click="RolePermission.rolesPermission=2" > <i class="pi pi-plus"></i>
                        New Role
                    </button>
                </div>
            </div>

        </div>
<!--
        {{ RolePermission.arrayRoleDetails }} -->
        <div class="card shadow-md mt-4">
            <DataTable :value="RolePermission.arrayRoleDetails" :paginator="true" :rows="10" class="" dataKey="roles_id" @rowExpand="onRowExpand"
                @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows" v-model:selection="selectedAllEmployee"
                :selectAll="selectAll" @select-all-change="onSelectAllChange" @row-select="onRowSelect"
                @row-unselect="onRowUnselect" :rowsPerPageOptions="[5, 10, 25]"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                <template #empty> No Employee Details documents for the selected status filter </template>

                <Column :expander="true" />
                <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
                <Column field="role" header="Roles" sortable></Column>
                <Column field="description" header="Role Description">
                </Column>

                <Column field="assigned_privileged" header="Assigned Privileges" :sortable="false">

                </Column>
                <Column field="assigned_emp" header="Assigned Employees" :sortable="false">

                </Column>
                <Column field="" header="Action">

                </Column>
                <template #expansion="slotProps">
                    <div>
                        <DataTable :value=" slotProps.data.accordian" responsiveLayout="scroll" v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                            @select-all-change="onSelectAllChange">
                            <Column field="user_code" header="Employee ID">{{ slotProps.data.user_code }}</Column>
                            <Column field="name" header="Employee Name">

                            </Column>
                            <Column field="department_name" header="Department">

                            </Column>

                            <Column field="" header="Action">
                                <template #body="slotProps" >
                                    <button class=" text-white bg-blue-700 px-4 py-2 rounded shadow " @click="removeUserRole(slotProps.data)" >Remove</button>
                                </template>
                            </Column>
                        </DataTable>
                    </div>
                </template>

            </DataTable>

        </div>
    </div>

    </div>

    <div v-if="RolePermission.rolesPermission == 2" >
        <CreateNewRole/>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import {UseRolePermissionStore} from './RolesAndPermissionStore'

import CreateNewRole from "./create_new_role/CreateNewRole.vue";

const RolePermission = UseRolePermissionStore();

const addNewroleDailog = ref(false);
const selectedRowdata = ref();
const currentlySelectedRowData = ref();

onMounted(()=>{

    RolePermission.getRoleDetails()
})

const expandedRows = ref([]);
const selectedAllEmployee = ref();


async function removeUserRole(SelectedRowData){
    currentlySelectedRowData.value= SelectedRowData;
    // console.log(currentlySelectedRowData.value,SelectedRowData.roles_name,SelectedRowData.user_code);
   await RolePermission.removeRoleDetails(SelectedRowData.roles_name,SelectedRowData.user_code);
}




</script>
