<template>
    <!-- <div class="card" v-if="lding">
        <div class="p-4 border-round border-1 surface-border surface-card">
            <div class="flex mb-3">
                <Skeleton shape="circle" size="4rem" class="mr-2"></Skeleton>
                <div>
                    <Skeleton width="10rem" class="mb-2"></Skeleton>
                    <Skeleton width="5rem" class="mb-2"></Skeleton>
                    <Skeleton height=".5rem"></Skeleton>
                </div>
            </div>
            <Skeleton width="100%" height="150px"></Skeleton>
            <div class="flex mt-3 justify-content-between">
                <Skeleton width="4rem" height="2rem"></Skeleton>
                <Skeleton width="4rem" height="2rem"></Skeleton>
            </div>
        </div>
    </div> -->
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
                    <button class="bg-white text-blue-800 px-3 py-2 rounded shadow-md"> <i class="pi pi-plus"></i>
                        New Role
                    </button>
                </div>
            </div>

        </div>


        <div class="card shadow-md mt-4">


            <DataTable :paginator="true" :rows="10" class="" dataKey="user_code" @rowExpand="onRowExpand"
                @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows" v-model:selection="selectedAllEmployee"
                :selectAll="selectAll" @select-all-change="onSelectAllChange" @row-select="onRowSelect"
                @row-unselect="onRowUnselect" :rowsPerPageOptions="[5, 10, 25]"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                <template #empty> No Employee Details documents for the selected status filter </template>

                <Column :expander="true" />
                <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
                <Column field="roles" header="Roles" sortable></Column>
                <Column field="name" header="Role Description">
                </Column>

                <Column field="doc_status" header="Assigned Privileges" :sortable="false">

                </Column>
                <Column field="doc_status" header="Assigned Employees" :sortable="false">

                </Column>
                <Column field="" header="Action">

                </Column>
                <template #expansion="slotProps">
                    <div>
                        <DataTable responsiveLayout="scroll" v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                            @select-all-change="onSelectAllChange">
                            <Column field="user_code" header="Employee ID">{{ slotProps.data.doc_name }}</Column>
                            <Column field="doc_status" header="Employee Name">

                            </Column>
                            <Column field="" header="Department">

                            </Column>

                            <Column field="" header="Action">

                            </Column>
                        </DataTable>
                    </div>
                </template>

            </DataTable>

        </div>
    </div>




    <Dialog header="Header" v-model:visible="addNewroleDailog" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '65vw', borderTop: '5px solid #002f56' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <h6 class=" modal-title fs-21">
                Creating New Job Role</h6>
        </template>
        <div class="px-4 row">
            <h3 class="text-xl font-semibold col-12">Roles Details</h3>
        </div>
        <div class="p-4">
            <div class=" row">
                <h5 class="text-lg font-semibold col-12">Role Title</h5>
                <InputText placeholder="Role Title" class="w-8 h-10 col-4" />
            </div>
            <div class="my-3 row">
                <h5 class="text-lg font-semibold col-12">Role Description</h5>
                <Textarea placeholder="Role Description " autoResize class="w-8 col-4" />
            </div>
            <div class="my-3">
                <h5 class="text-lg font-semibold">Assign To</h5>
            </div>
            <Tree :value="allpermission" selectionMode="checkbox" class="w-8 font-semibold ">
            </Tree>
        </div>
        <template #footer>
            <div>
                <button class="px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md"
                    @click="addNewroleDailog = false">Cancel</button>
                <button class="py-2 mx-4 btn btn-orange">Create Role</button>
            </div>

        </template>
    </Dialog>
    <!-- {{ selectedKey }} -->
    <!-- {{ rolespermission.allpermission }} -->
    <!-- {{ allpermission.data }} -->
</template>


<script setup>
import { onMounted, ref } from "vue";
import { UseRolePermissionServie } from "./roles_permission_service";
import axios from 'axios';

const rolespermission = UseRolePermissionServie();

const expandedRows = ref([]);
const selectedAllEmployee = ref();

const lding = ref(true)

const selectedKey = ref()
const addNewroleDailog = ref(false)

const canShowLoadingScreen = ref(true);
const canShowCreateRole_Dialog = ref(false);
const canShowManageRoles_Dialog = ref(false);

const allpermission = ref();

axios.get('/getAllPermissions').then(res => {
    allpermission.value = res.data;
    console.log(allpermission);
});


const nodes = ref([
    {
        id: 1,
        key: '0',
        label: 'Documents',
        data: 'Documents Folder',
        icon: 'pi pi-fw pi-inbox',
        children: [
            {

                id: 2,
                key: '1',
                label: 'Work',
                data: 'Work Folder',
                icon: 'pi pi-fw pi-cog',
                children: [
                    { key: '0-0-0', label: 'Expenses.doc', icon: 'pi pi-fw pi-file', data: 'Expenses Document' },
                    { key: '0-0-1', label: 'Resume.doc', icon: 'pi pi-fw pi-file', data: 'Resume Document' }
                ]
            },
            {
                id: 3,
                key: '2',
                label: 'Home',
                data: 'Home Folder',
                icon: 'pi pi-fw pi-home',
                children: [{ key: '0-1-0', label: 'Invoices.txt', icon: 'pi pi-fw pi-file', data: 'Invoices for this month' }]
            }
        ]
    },
    {
        id: 4,
        key: '4',
        label: 'Events',
        data: 'Events Folder',
        icon: 'pi pi-fw pi-calendar',
        children: [
            { id: 5, key: '1-0', label: 'Meeting', icon: 'pi pi-fw pi-calendar-plus', data: 'Meeting' },
            { id: 6, key: '1-1', label: 'Product Launch', icon: 'pi pi-fw pi-calendar-plus', data: 'Product Launch' },
            { id: 7, key: '1-2', label: 'Report Review', icon: 'pi pi-fw pi-calendar-plus', data: 'Report Review' }
        ]
    }])

onMounted(() => {
    setTimeout(() => {
        lding.value = false
    }, 4000);
})

</script>

<style>
.p-treenode-label {
    font-weight: 600;
}
</style>
