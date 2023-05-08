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
    <div class="w-full">
        <!-- <div>
            <h4>Employee Roles and Permissiom</h4>
        </div>
        <div>
            <table></table>
        </div> -->

        <!-- Creating New Job Roles dailog-->
      <button class="btn btn-orange" @click="addNewroleDailog = true">Create Role</button>

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
            <Tree v-model:selectionKeys="selectedKey" :value="nodes" selectionMode="checkbox" class="w-8 font-semibold ">
            </Tree>
        </div>
        <template #footer>
            <div>
                <button class="px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md" @click="addNewroleDailog = false">Cancel</button>
                <button class="py-2 mx-4 btn btn-orange">Create Role</button>
            </div>

        </template>
    </Dialog>
</template>


<script setup>
import { onMounted, ref } from "vue";

const lding = ref(true)

const selectedKey = ref()
const addNewroleDailog = ref(false)
const nodes = ref(
    [
        {
            key: '0',
            label: 'Assets Privileges ',
            data: 'Assets Privileges ',
            children: [
                {
                    key: '0-0',
                    label: 'Apply for attendance adjustment / regularisation on behalf of employees',
                    data: 'Apply for attendance adjustment / regularisation on behalf of employees',
                },
                {
                    key: '0-1',
                    label: `Approve/Reject 'Work from Home (WFH) / On Duty (OD)' requests`,
                    data: `Approve/Reject 'Work from Home (WFH) / On Duty (OD)' requests`,
                },
                {
                    key: '0-2',
                    label: 'Edit Individual Asset Information',
                    data: 'Edit Individual Asset Information',
                },
                {
                    key: '0-3',
                    label: `Bulk import assets & assignment`,
                    data: `Bulk import assets & assignment`,
                },
                {
                    key: '0-4',
                    label: 'Assign Asset to an Employee',
                    data: 'Assign Asset to an Employee',
                },
                {
                    key: '0-5',
                    label: `Update Asset Availability`,
                    data: `Update Asset Availability`,
                },
                {
                    key: '0-6',
                    label: 'Recover Asset & Update Condition',
                    data: 'Recover Asset & Update Condition',
                },
                {
                    key: '0-7',
                    label: `View Reports`,
                    data: `View Reports`,
                },
                {
                    key: '0-8',
                    label: 'Download Reports',
                    data: 'Download Reports',
                },
                {
                    key: '0-9',
                    label: `Manage Asset DefinitionsGlobal`,
                    data: `Manage Asset DefinitionsGlobal`,
                },
                {
                    key: '0-10',
                    label: 'Delete Asset',
                    data: 'Delete Asset',
                }
            ]
        },
        {
            key: '1',
            label: 'Attendance Privileges',
            data: 'Attendance Privileges',
            icon: 'pi pi-fw pi-calendar',
            children: [
                { key: '1-0', label: 'Meeting', icon: 'pi pi-fw pi-calendar-plus', data: 'Meeting' },
                { key: '1-1', label: 'Product Launch', icon: 'pi pi-fw pi-calendar-plus', data: 'Product Launch' },
                { key: '1-2', label: 'Report Review', icon: 'pi pi-fw pi-calendar-plus', data: 'Report Review' }
            ]
        },
        {
            key: '2',
            label: 'Employee Document Privileges',
            data: 'Employee Document Privileges',
            icon: 'pi pi-fw pi-star-fill',
            children: [
                {
                    key: '2-0',
                    icon: 'pi pi-fw pi-star-fill',
                    label: 'Al Pacino',
                    data: 'Pacino Movies',
                    children: [
                        { key: '2-0-0', label: 'Scarface', icon: 'pi pi-fw pi-video', data: 'Scarface Movie' },
                        { key: '2-0-1', label: 'Serpico', icon: 'pi pi-fw pi-video', data: 'Serpico Movie' }
                    ]
                },
                {
                    key: '2-1',
                    label: 'Robert De Niro',
                    icon: 'pi pi-fw pi-star-fill',
                    data: 'De Niro Movies',
                    children: [
                        { key: '2-1-0', label: 'Goodfellas', icon: 'pi pi-fw pi-video', data: 'Goodfellas Movie' },
                        { key: '2-1-1', label: 'Untouchables', icon: 'pi pi-fw pi-video', data: 'Untouchables Movie' }
                    ]
                }]
        },
        {
            key: '3',
            label: 'Employee Finance Privileges',
            data: 'Employee Finance Privileges',
            children: [
                { key: '1-0', label: 'Meeting', icon: 'pi pi-fw pi-calendar-plus', data: 'Meeting' },
                { key: '1-1', label: 'Product Launch', icon: 'pi pi-fw pi-calendar-plus', data: 'Product Launch' },
                { key: '1-2', label: 'Report Review', icon: 'pi pi-fw pi-calendar-plus', data: 'Report Review' }
            ]
        }
    ])

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