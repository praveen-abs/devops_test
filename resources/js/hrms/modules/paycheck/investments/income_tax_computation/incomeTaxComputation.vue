<template>
    <div class="p-2">
        <div class="my-3">
            <p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse
                how income tax is being
                calculated and what is the TDS every month.</p>
        </div>
        <div class="card">
            <div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body">
                <div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400">
                    <p class="my-2 font-semibold fs-6 ">Net Taxable Income</p>
                    <h6 class="text-lg font-bold ">INR 4,82,246 </h6>
                </div>
                <div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400">
                    <p class="my-2 font-semibold fs-6 ">Gross Income Tax</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>

                <div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400 ">
                    <p class="my-2 font-semibold fs-6">Total Surcharge & Cess</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>
                <div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400">
                    <p class="my-2 font-semibold fs-6">Net Income Tax payable</p>
                    <h6 class="text-lg font-bold ">INR 4,82,246 </h6>
                </div>
                <div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400">
                    <p class="my-2 font-semibold fs-6">Tax Paid Till Now</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>

                <div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400 ">
                    <p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>
            </div>
        </div>
        <div class="my-4 card">
            <div class="card-body">
                <div class="flex ">
                    <p class="font-semibold fs-5">
                        A. Gross Earnings from Employment
                    </p>
                    <div>
                        <!-- DropDown -->
                        Income from Previous Employer
                    </div>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <DataTable :rows="1" dataKey="id" scrollable>
                            <template #empty> No Data Found. </template>
                            <template #loading> Loading customers data. Please wait. </template>
                            <Column field="particulars" header="Salary Breakup" frozen class="font-bold">
                            </Column>
                            <Column field="new_regime" header="Apr 23"></Column>
                            <Column field="old_regime" header="May 23"></Column>
                            <Column field="old_regime" header="June 23 "></Column>
                            <Column field="old_regime" header="July 23 "></Column>
                            <Column field="new_regime" header="Aug 23"></Column>
                            <Column field="old_regime" header="Sep 23"></Column>
                            <Column field="old_regime" header="Oct 23 "></Column>
                            <Column field="old_regime" header="Nov 23 "></Column>
                            <Column field="old_regime" header="Dec 23 "></Column>
                            <Column field="old_regime" header="Jan 23 "></Column>
                            <Column field="old_regime" header="Feb 23 "></Column>
                            <Column field="old_regime" header="Mar 23 "></Column>
                        </DataTable>
                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>
        <div class="my-4 card">
            <div class="card-body">
                <div>
                    <p class="font-semibold fs-5">B. Taxable Income From All Heads</p>
                </div>
                <div class="my-4 table-responsive">
                    <DataTable :rows="1" dataKey="id" scrollable>
                        <template #empty> No Data Found. </template>
                        <template #loading> Loading customers data. Please wait. </template>
                        <Column field="new_regime" header="Apr 23"></Column>
                        <Column field="old_regime" header="May 23"></Column>
                    </DataTable>
                </div>
                <div class="table-responsive">
                    <DataTable :rows="1" dataKey="id" scrollable>
                        <template #empty> No Data Found. </template>
                        <template #loading> Loading customers data. Please wait. </template>
                        <Column field="particulars" header="Excemptions" frozen class="font-bold">
                        </Column>
                        <Column field="new_regime" header="Sections"></Column>
                        <Column field="old_regime" header="Allowance"></Column>
                        <Column field="old_regime" header="Gross Amount"></Column>
                        <Column field="old_regime" header="Deductible Amount"></Column>
                        <Column field="old_regime" header="Total"></Column>
                    </DataTable>
                </div>
            </div>
        </div>
        <div class="my-4 card">
            <div class="card-body">
                <div>
                    <p class="font-semibold fs-5">C. Tax Calculations</p>
                </div>
                <div class="my-4 table-responsive">
                    <DataTable :rows="1" dataKey="id" scrollable>
                        <template #empty> No Data Found. </template>
                        <template #loading> Loading customers data. Please wait. </template>
                        <Column field="particulars" header="Tax" frozen class="font-bold">
                        </Column>
                        <Column field="new_regime" header="Income Tax Slab"></Column>
                        <Column field="old_regime" header="Tax Amount"></Column>
                    </DataTable>
                </div>
            </div>
        </div>
        <div class="my-4 card">
            <div class="card-body">
                <div class="flex">
                    <p class="font-semibold fs-5">
                        Month- Month Tax Deduction Details
                    </p>
                    <div>
                        <!-- DropDown -->
                        Income from Previous Employer
                    </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <DataTable :rows="1" dataKey="id" scrollable>
                            <template #empty> No Data Found. </template>
                            <template #loading> Loading customers data. Please wait. </template>
                            <Column field="particulars" header="Month" frozen class="font-bold">
                            </Column>
                            <Column field="new_regime" header="Apr 23"></Column>
                            <Column field="old_regime" header="May 23"></Column>
                            <Column field="old_regime" header="June 23 "></Column>
                            <Column field="old_regime" header="July 23 "></Column>
                            <Column field="new_regime" header="Aug 23"></Column>
                            <Column field="old_regime" header="Sep 23"></Column>
                            <Column field="old_regime" header="Oct 23 "></Column>
                            <Column field="old_regime" header="Nov 23 "></Column>
                            <Column field="old_regime" header="Dec 23 "></Column>
                            <Column field="old_regime" header="Jan 23 "></Column>
                            <Column field="old_regime" header="Feb 23 "></Column>
                            <Column field="old_regime" header="Mar 23 "></Column>
                        </DataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>