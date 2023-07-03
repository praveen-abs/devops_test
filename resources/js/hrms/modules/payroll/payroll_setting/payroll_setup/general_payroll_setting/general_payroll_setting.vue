<template>
    <div class="w-full">
        <div class="flex w-4 pt-4 mx-6">
            <p class="w-10">Payroll and attendance end date settings</p>
            <div>
                <i class="pi pi-pencil" style="font-size: 1rem" @click="active_Btn"></i>
            </div>
        </div>
        <div class="flex grid-cols-2 gap-6 mx-6">
            <div class="w-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-1">
                    <h5 class="my-2 text-lg font-semibold">Pay Frequency</h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Monthly" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-lg font-semibold">
                        When would you like to start using the ABShrms payroll?
                    </h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="November 2023" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-lg font-semibold">
                        On which date did the pay peroid end in november ?
                    </h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Text Placeholder" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-lg font-semibold">
                        The payment date for the peroid of nov 1st to nov 30th is
                    </h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="December 01" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-8 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
                <div class="p-2 bg-orange-100 rounded mt-2" v-if="active == 2">
                    This change is of most importance and has a widespread impact on the salaries of all employees. We strongly advise you to reach out to the support team for further clarification.
                </div>

                <h6 class="my-2 font-extralight">
                    The finalized payroll peroid is <strong>JAN 1 - JAN 31</strong>
                </h6>

                <div class="mb-6  mt-4 w-full" >
                    <DataTable :value="products" style="background-color: none;">
                        <Column field="product" header=""></Column>
                        <Column field="lastYearSale" header="Feb"></Column>
                        <Column field="thisYearSale" header="Mar"></Column>
                        <Column field="thisYearProfit" header="Apr"></Column>
                    </DataTable>
                </div>
                <div class="mx-4">
                    <p>Please Note that for month of February, the number of pay days will be adjusted to 28 days unstead of
                        the standard 30 0r 31 days ,As a result salary for employees will be calculated using the formula
                        SALARY * 28/28</p>
                </div>
            </div>
        </div>
        <div class="mx-6 my-4">
            <div class="flex w-4 pt-4">
            <p>Attendance cut-off cycle</p>
            <div>
                <i class="pi pi-pencil mr-3" style="font-size: 1rem" @click='active_Btn2' ></i>
            </div>
        </div>
        </div>

        <div class="flex grid-cols-2 gap-6 mx-6 my-4">
            <div class="w-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-4">
                    <h6 class="my-2 text-lg font-semibold">
                        Select the attendance cut-off peroid in a month
                    </h6>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <Dropdown class="w-full h-11 " placeholder="select" />
                        </div>
                    </div>
                </div>

                <div class="my-4">
                    <div class="flex gap-3 justify-evenly ">
                        <h5 class="my-2 fs-6 font-semibold" style="line-height: 22px;">
                            Do you want to consider new joinee post attendance cut off date ?
                        </h5>
                        <div class="flex w-4 my-4  mr-3">
                            <div class="mx-4 d-flex ">
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">Yes</label>
                            </div>
                            <div class="d-flex ">
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4">
                    <div class=" d-flex justify-self-center align-items-center">
                        <div class="">
                            <input type="checkbox" name="" class="form-check-input mr-3" id=""
                                style="width: 20px; height: 20px;">
                            <Checkbox class="mx-2" :binary="true" />
                        </div>
                        <div class="fs-6">
                            The employee's attendance cut-off date differs from their pay peroid end
                            date
                            <span class="text-blue-400 underline">what is Attendance cut-off date?</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-8 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
                <div class="bg-orange-100 p-2 rounded " v-if="active2 == 2 " >
                    <i class="fa fa-exclamation-triangle ml-2 mb-3" style="width: 25px;" aria-hidden="true" ></i>
                    The edit option has been disabled. Please contact the ABShrms Support Team for assistance.
                </div>
                <h1 class=" mt-4 font-extralight">
                    The finalized payroll peroid is <strong>26th - 25th</strong>
                </h1>
                <div class="mb-6 mt-4 w-full">
                    <DataTable :value="products">
                        <Column field="product" header=""></Column>
                        <Column field="lastYearSale" header="Feb "></Column>
                        <Column field="thisYearSale" header="Mar"></Column>
                        <Column field="thisYearProfit" header="Apr"></Column>
                    </DataTable>
                </div>
            </div>
        </div>
        <div class="mx-6">
            <p>Pay Peroid Calculation</p>
        </div>
        <div class="flex grid-cols-2 gap-6 mx-6 my-4">
            <div class="w-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-4">
                    <h5 class="my-2 text-lg font-semibold">Pay days in month</h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Actual days in a month " />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-lg font-semibold">Pay days in month</h5>
                    <div class="flex gap-8 my-3 justify-evenly">
                        <div class="w-6 my-2">
                            <p>Include Week Off's</p>
                        </div>
                        <div class="flex w-6 ">
                            <div class="mx-4">
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">Yes</label>
                            </div>
                            <div>
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-6">
                            <p>Include Holiday's</p>
                        </div>
                        <div class="flex w-6">
                            <div class="mx-4">
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">Yes</label>
                            </div>
                            <div>
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-6 p-4 my-4 leading-8 ">
                <div class="my-6">
                    <p style="line-height: 25px;">
                        <strong class="mr-2">NOTE :</strong>
                        Please note that calculating the number of days for a given pay period can
                        significantly impact salary deductions for loss of pay due to leave or other
                        reasons. For instance, consider the example of an employee whose monthly
                        salary is INR 30,000 and who takes one day of leave without pay.
                    </p>
                    <p style="line-height: 25px;">If we
                        calculate loss of pay based on a 30-day month, the deduction would be INR
                        30,000/30 = INR 1000.
                    </p>
                    <p style="line-height: 25px;">
                        However, if we exclude weekends from the calculation,
                        assuming 8 Saturdays and Sundays in the month, the effective number of working
                        days would be 30-8 = 22 days. In this case, the deduction for one day of loss
                        of pay would be INR 30,000/22 = INR 1364.
                    </p>
                </div>
            </div>
        </div>
        <div class="mx-6">
            <p>Currency and Compensation</p>
        </div>
        <div class="flex grid-cols-2 gap-6 mx-6 my-4">
            <div class="w-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-4">
                    <h5 class="my-2 text-lg font-semibold">Currency</h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Indian Rupee (&#8377;)" />
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-evenly">
                    <h5 class="text-lg font-semibold w-7">Description</h5>
                    <div class="flex flex-column w-6 my-3">
                        <div class="d-flex  ">
                            <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                value="" />
                            <label class="ml-2 text-lg font-semibold from-check-label leave_type" for="">Monthly</label>
                        </div>
                        <div class="my-3">
                            <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                value="" />
                            <label class="ml-2 text-lg font-semibold form-check-label leave_type" for="">Daliy</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-6 p-4 my-4 ">
                <div class="my-2">
                    <strong>EXPLANATION :</strong>
                    <p class="my-3">
                        <strong class="mr-2">Monthly :</strong>Monthly remuneration refers to the compensation paid to an
                        employee
                        in exchange for their services, which is calculated and defined on a monthly
                        basis. This compensation serves as a form of payment for the employee's work
                        performed throughout the month.
                    </p>
                    <p class="my-3">
                        <strong class="mr-2">Daily :</strong>Daily remuneration refers to the compensation paid to an
                        employee for
                        their services, which is calculated on a per-day basis. It is the amount that
                        an employee is entitled to receive for each day of work performed as per the
                        agreed terms of their employment contract.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const products = ref([
    {
        product: "Bamboo Watch",
        lastYearSale: 51,
        thisYearSale: 40,
        lastYearProfit: 54406,
        thisYearProfit: 43342,
    },
    {
        product: "Black Watch",
        lastYearSale: 83,
        thisYearSale: 9,
        lastYearProfit: 423132,
        thisYearProfit: 312122,
    },
    {
        product: "Blue Band",
        lastYearSale: 38,
        thisYearSale: 5,
        lastYearProfit: 12321,
        thisYearProfit: 8500,
    },
]);

const active = ref(1);
const active2 =ref(1);

function active_Btn(){
    active.value = 2;
    console.log(active.value);
}
function active_Btn2(){
    active2.value = 2 ;
    console.log(active2);
}





</script>
