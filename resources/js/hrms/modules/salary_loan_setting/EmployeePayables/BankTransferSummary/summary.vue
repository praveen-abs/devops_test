<template>
    <div class=" mt-4 h-full">
        <div class="card-body d-flex justify-content-between align-items-center bg-gray-100 py-2 h-full ">
            <div class=" shadow-sm bg-white rounded-md w-4 mr-2 h-[150px] ">
                <div class=" bg-gray-200 p-2" style="background-color:#E6E6E6;" >
                    <p class=" fs-5">Bank Transfer</p>
                </div>
                <div class="flex justify-content-between align-items-start p-3 ">
                    <div>
                        <p class="text-[12px] md:text-[13px] xl:text-[16px]">Default Batch for Bank Transfer</p>
                        <p class="text-[12px] md:text-[13px] xl:text-[16px] text-gray-700 mt-2">188 Employees</p>
                    </div>
                    <div>
                        <button class="bg-gray-200 p-2 rounded-md mt-2 w-[90px]  text-[12px]  xl:text-[13px] " >Not Paid</button>
                    </div>
                </div>

                <div class=" bg-white shadow-sm p-3">
                    <p class="text-[14px]  xl:text-[16px] mb-2">Salary to be Paid</p>
                    <div class=" border-b-2 d-flex justify-content-between align-items-center w-full pb-2">
                        <!-- <div class=" d-flex justify-content-between align-items-center "> -->
                            <p class="text-[13px]  xl:text-[14px] ">Total Employees</p>
                        <p class=" text-right ">188</p>
                        <!-- </div> -->

                    </div>
                </div>
            </div>
            <div class=" rounded-md w-9  h-full ml-2" style="background-color: #E6E6E6;">
                <DataTable ref="dt" dataKey="user_code" :paginator="true" :rows="10"
                                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                                :rowsPerPageOptions="[5, 10, 25]" :filters="filters"
                                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                                responsiveLayout="scroll">
                                <Column selectionMode="multiple" headerStyle="width: 1.5rem" ></Column>
                                <Column field="user_code" header="Employee Name" style="min-width: 8rem"></Column>
                                <Column field="name" header="Employee Name" style="min-width: 12rem"></Column>
                                <Column field="department_name" header="Department " style="min-width: 12rem"></Column>
                                <Column field="designation" header="Designation " style="min-width: 20rem"></Column>
                                <Column field="work_location" header="Location " style="min-width: 12rem"></Column>
                                <Column field="client_name" header="Legal Entity" style="min-width: 20rem"></Column>
                            </DataTable>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>
