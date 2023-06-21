<template>
    <div class="w-full mx-2">
        <section id="header" class="flex justify-between w-full my-4 ">
            <div>Salary Compenents</div>
            <div><button class="btn btn-orange">Add Components</button></div>
        </section>
        <DataTable :value="sales">
            <ColumnGroup type="header">
                <Row>
                    <Column header="Product" :rowspan="3" />
                    <Column header="Product" :rowspan="3" />
                    <Column header="Product" :rowspan="3" />
                    <Column header="Profits" :colspan="2" />
                    <Column header="Product" :rowspan="3" />
                    <Column header="Product" :rowspan="3" />

                </Row>
                <Row>
                </Row>
                <Row>
                    <Column header="Product" :rowspan="3" />
                    <Column header="Product" :rowspan="3" />
                </Row>
            </ColumnGroup>
            <Column field="product" />
            <Column field="lastYearSale">
                <template #body="slotProps">
                    {{ slotProps.data.lastYearSale }}%
                </template>
            </Column>
            <Column field="thisYearSale">
                <template #body="slotProps">
                    {{ slotProps.data.thisYearSale }}%
                </template>
            </Column>
            <Column field="lastYearProfit">
                <template #body="slotProps">
                    {{ formatCurrency(slotProps.data.lastYearProfit) }}
                </template>
            </Column>
            <Column field="thisYearProfit">
                <template #body="slotProps">
                    {{ formatCurrency(slotProps.data.thisYearProfit) }}
                </template>
            </Column>
            <Column field="thisYearProfit">
                <template #body="slotProps">
                    {{ formatCurrency(slotProps.data.thisYearProfit) }}
                </template>
            </Column>
            <Column field="thisYearProfit">
                <template #body="slotProps">
                    {{ formatCurrency(slotProps.data.thisYearProfit) }}
                </template>
            </Column>


        </DataTable>
        <Dialog v-model:visible="visbile" :modal="true" :closable="true"
            :style="{ width: '80vw', borderTop: '5px solid #002f56' }">
            <template #header>
                <span class="text-lg font-semibold modal-title text-indigo-950">Add New Components</span>
            </template>
            <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 mt-4"
                style="display: grid;">
                <div class="px-4">
                    <div class="">
                        <label for="metro_city" class="block mb-2  text-gray-700 font-semibold fs-6">Type of the component</label>
                        <Dropdown editable class="w-full" optionLabel="name" optionValue="value"
                            placeholder="Select City" />
                    </div>
                    <div class="my-3">
                        <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Name of the component</label>
                        <Dropdown editable class="w-full" optionLabel="name" optionValue="value"
                            placeholder="Select City" />
                    </div>
                    <div class="">
                        <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Name of the component(In Payslip)</label>
                        <Dropdown editable class="w-full" optionLabel="name" optionValue="value"
                            placeholder="Select City" />
                    </div>
                    <div class="my-3">
                        <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Type of calculation</label>
                        <Dropdown editable class="w-full" optionLabel="name" optionValue="value"
                            placeholder="Select City" />
                    </div>
                    <div class="">
                        <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Enter the amount</label>
                        <Dropdown editable class="w-full" optionLabel="name" optionValue="value"
                            placeholder="Select City" />
                    </div>
                </div>
                <div>
                    <div class="border-1 rounded-lg p-2">
                        <div class="mx-2">
                            <span>Status</span>
                            <div class="form-check form-check-inline mx-8">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                    id="full_day" value="yes" />
                                <label class="form-check-label leave_type ms-2" for="full_day">Enable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                    id="full_day" value="yes" />
                                <label class="form-check-label leave_type ms-2" for="full_day">Disable</label>
                            </div>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3">Make this earning a part of the employee's salary structure</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3">This salary component is taxable</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3">Calculate on pro-rate basis</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3">Show the component in payslip</p>
                        </div>
                        <div class=" my-5 mx-2">
                            <span class="w-8">Considered for EPF</span>
                            <div class="form-check form-check-inline mx-8">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                    id="full_day" value="yes" />
                                <label class="form-check-label leave_type ms-2" for="full_day">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                    id="full_day" value="yes" />
                                <label class="form-check-label leave_type ms-2" for="full_day">No</label>
                            </div>
                        </div>
                        <div class=" my-5 mx-2">
                            <span>Considered for EPF</span>
                            <div class="form-check form-check-inline  mx-8">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                    id="full_day" value="yes" />
                                <label class="form-check-label leave_type ms-2" for="full_day">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                    id="full_day" value="yes" />
                                <label class="form-check-label leave_type ms-2" for="full_day">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <div class="flex">
                    <button class="btn btn-orange-outline">Cancel</button>
                    <button class="btn btn-orange mx-2">Save</button>
                </div>
            </div>
        </Dialog>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const visbile = ref(false)

const sales = ref([
    { product: 'Bamboo Watch', lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
    { product: 'Black Watch', lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
    { product: 'Blue Band', lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
    { product: 'Blue T-Shirt', lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 },
    { product: 'Brown Purse', lastYearSale: 17, thisYearSale: 79, lastYearProfit: 643242, thisYearProfit: 500332 },
    { product: 'Chakra Bracelet', lastYearSale: 52, thisYearSale: 65, lastYearProfit: 421132, thisYearProfit: 150005 },
    { product: 'Galaxy Earrings', lastYearSale: 82, thisYearSale: 12, lastYearProfit: 131211, thisYearProfit: 100214 },
    { product: 'Game Controller', lastYearSale: 44, thisYearSale: 45, lastYearProfit: 66442, thisYearProfit: 53322 },
    { product: 'Gaming Set', lastYearSale: 90, thisYearSale: 56, lastYearProfit: 765442, thisYearProfit: 296232 },
    { product: 'Gold Phone Case', lastYearSale: 75, thisYearSale: 54, lastYearProfit: 21212, thisYearProfit: 12533 }
]);

const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};

const lastYearTotal = computed(() => {
    let total = 0;
    for (let sale of sales.value) {
        total += sale.lastYearProfit;
    }

    return formatCurrency(total);
});

const thisYearTotal = computed(() => {
    let total = 0;
    for (let sale of sales.value) {
        total += sale.thisYearProfit;
    }

    return formatCurrency(total);
});

</script>


<style >
.p-dropdown-label.p-inputtext {
    height: 34px;
}
</style>