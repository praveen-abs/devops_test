<template>
<<<<<<< HEAD
    <div class="w-full">
        <div class="flex justify-between pt-4 mx-6">
            <p class="">Payroll and attendance end date settings</p>
            <div>
                <i class="pi pi-pencil" style="font-size: 1rem" @click="active_Btn"></i>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mx-6">
            <div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-1">
                    <h5 class="my-2 text-sm font-semibold">Pay Frequency</h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Monthly"
                                v-model="uesPayroll.generalPayrollSettings.pay_frequency" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-sm font-semibold">
                        When would you like to start using the ABShrms payroll?
                    </h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="November 2023"
                                v-model="uesPayroll.generalPayrollSettings.payperiod_start_month" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-sm font-semibold">
                        On which date did the pay peroid end in november ?
                    </h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Text Placeholder"
                                v-model="uesPayroll.generalPayrollSettings.payperiod_end_date" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-sm font-semibold">
                        The payment date for the peroid of nov 1st to nov 30th is
                    </h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="December 01"
                                v-model="uesPayroll.generalPayrollSettings.payment_date" />
=======
    <div class="w-full  border p-4">

        <div class="grid grid-cols-5 gap-4">
            <div class="col-span-2">
                <div class="flex mt-3 d-flex justify-content-between align-items-center pt-4 ml-6 ">
                    <div class="">
                        <p class=" fw-semibold text-gray-600 fs-14">Payroll and attendance end date settings</p>
                    </div>
                    <div class="">
                        <i class="pi pi-pencil text-gray-600 pr-6 cursor-pointer" style="font-size: 1rem"
                            @click="editAttendanceEndDate = !editAttendanceEndDate"></i>
                    </div>
                </div>
                <div class=" p-4 my-2 bg-gray-100 shadow-md rounded-lg  border-1 ">
                    <div class="my-2">
                        <h5 class="my-2 font-semibold fs-13">Pay Frequency</h5>
                        <div class="flex gap-8 justify-evenly">
                            <div class="w-full">
                                <InputText class="w-full h-11" placeholder="Monthly" v-if="editAttendanceEndDate"
                                    v-model="uesPayroll.generalPayrollSettings.pay_frequency"
                                    :readonly="editAttendanceEndDate" />
                                <Dropdown :options="useHelper.payFrequencyDropdown" class="w-full h-11" optionLabel="name"
                                    optionValue="id" placeholder="Select Pay Frequency" v-else />

                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <h5 class="my-2 font-semibold fs-13">
                            When would you like to start using the ABShrms payroll?
                        </h5>
                        <div class="flex gap-8 justify-evenly">
                            <div class="w-full">
                                <InputText class="w-full h-11" placeholder="November 2023" v-if="editAttendanceEndDate"
                                    v-model="uesPayroll.generalPayrollSettings.payperiod_start_month"
                                    :readonly="editAttendanceEndDate" />
                                <Calendar v-model="uesPayroll.generalPayrollSettings.payperiod_start_month" view="month"
                                    dateFormat="mm/yy" class="w-full h-11"
                                    @date-select="daysAsDropdown(uesPayroll.generalPayrollSettings.payperiod_start_month.getMonth() + 1, uesPayroll.generalPayrollSettings.payperiod_start_month.getFullYear())"
                                    v-else />
                            </div>
                        </div>
                        <!-- MMMM D, YYYY ,dayjs date format -->
                    </div>
                    <div class="my-4">
                        <h5 class="my-2 font-semibold fs-13">
                            On which date did the pay peroid end in
                            {{ uesPayroll.generalPayrollSettings.payperiod_start_month
                                ? dayjs(uesPayroll.generalPayrollSettings.payperiod_start_month).format('MMMM') : null }}?
                        </h5>
                        <div class="flex gap-8 justify-evenly">
                            <div class="w-full">
                                <InputText class="w-full h-11" placeholder="Text Placeholder" v-if="editAttendanceEndDate"
                                    v-model="uesPayroll.generalPayrollSettings.payperiod_end_date"
                                    :readonly="editAttendanceEndDate" />
                                <Dropdown v-model="uesPayroll.generalPayrollSettings.payperiod_end_date"
                                    :options="daysArray" class="w-full h-11" optionLabel="day" optionValue="day"
                                    placeholder="Select day" v-else />
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <h5 class="my-2 fs-13 font-semibold">
                            The payment date for the peroid of {{ uesPayroll.generalPayrollSettings.payperiod_start_month
                                ? dayjs(uesPayroll.generalPayrollSettings.payperiod_start_month).format('MMMM') : null }}
                            {{ uesPayroll.generalPayrollSettings.payperiod_end_date ?
                                uesPayroll.generalPayrollSettings.payperiod_end_date : 1 }}st to
                            {{ uesPayroll.generalPayrollSettings.payperiod_start_month
                                ? dayjs(uesPayroll.generalPayrollSettings.payperiod_start_month).format('MMMM') : null }}
                            {{ uesPayroll.generalPayrollSettings.payperiod_start_month ?
                                useHelper.getLastDayOfMonth(uesPayroll.generalPayrollSettings.payperiod_start_month.getMonth(),
                                    uesPayroll.generalPayrollSettings.payperiod_start_month.getFullYear()) : null }}? is
                        </h5>
                        <div class="flex gap-8 justify-evenly">
                            <div class="w-full">
                                <InputText class="w-full h-11" placeholder="December 01" v-if="editAttendanceEndDate"
                                    v-model="uesPayroll.generalPayrollSettings.payment_date"
                                    :readonly="editAttendanceEndDate" />
                                <Dropdown v-model="uesPayroll.generalPayrollSettings.payment_date" :options="daysArray"
                                    class="w-full h-11" optionLabel="day" optionValue="day" placeholder="Select payment day"
                                    v-else />
                            </div>
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-8 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
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

<<<<<<< HEAD
        <div class="grid grid-cols-12 gap-6 mx-6">
            <div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-4">
                    <h6 class="my-2 text-sm font-semibold">
                        Select the attendance cut-off peroid in a month
                    </h6>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <Dropdown class="w-full h-11 " placeholder="select"
                                v-model="uesPayroll.generalPayrollSettings.att_cutoff_period_id" />
                        </div>
=======
        <div class="grid grid-cols-5 gap-4">
            <div class="col-span-2">
                <div class="flex pt-4">
                    <p class="fs-14 text-gray-600">Attendance cut-off cycle</p>
                    <div>
                        <i class="pi pi-pencil mr-3 cursor-pointer" style="font-size: 1rem"
                            @click='active_Btn2 = !active_Btn2'></i>
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
                    </div>
                </div>
                <div class=" p-4 my-2 bg-gray-100 rounded-lg  border-1 shadow-sm">
                    <div class="my-4">
                        <!-- <h1 style="color: #4E4E4E;">4E4E4E</h1> -->
                        <h6 class="my-2 fs-14 font-semibold text-black-alpha-70">
                            Select the attendance cut-off peroid in a month
                        </h6>
                        <div class="flex gap-8 justify-evenly">
                            <div class="w-full">
                                <Dropdown class="w-full h-11 " placeholder="select"
                                    v-model="uesPayroll.generalPayrollSettings.att_cutoff_period_id" />
                            </div>
                        </div>
                    </div>

                    <div class="my-4 ">
                        <div class="flex gap-3 w-100 d-flex justify-content-between align-items-center">
                            <div class="w-70">
                                <h5 class="my-2 fs-13 font-semibold" style="line-height: 16px;">
                                    Do you want to consider new joinee post attendance cut off date ?
                                </h5>
                            </div>
                            <div class=" w-30 d-flex justify-content-center align-items-center">
                                <div class="mx-2 d-flex justify-content-between align-items-center ">
                                    <input style="height: 18px; width: 18px" class="form-check-input" type="radio" name=""
                                        id="" value=""
                                        v-model="uesPayroll.generalPayrollSettings.post_attendance_cutoff_date" />
                                    <label class="ml-2 font-bold form-check-label leave_type fs-13" for="">Yes</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center ">
                                    <input style="height: 18px; width: 18px" class="form-check-input" type="radio" name=""
                                        id="" value=""
                                        v-model="uesPayroll.generalPayrollSettings.post_attendance_cutoff_date" />
                                    <label class="ml-2 font-bold form-check-label leave_type fs-13" for="">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </div>

                <div class="my-4">
                    <div class=" flex justify-center items-center">
                        <div class="">
                            <input type="checkbox" name="" class="form-check-input mr-3" id=""
                                style="width: 16px; height: 20px;">
                            <Checkbox class="mx-2" :binary="true" />
                        </div>
                        <div class="text-sm">
                            The employee's attendance cut-off date differs from their pay peroid end
                            date
                            <span class="text-blue-400 underline">what is Attendance cut-off date?</span>
=======
                    <div class="my-2 w-100">
                        <div class="d-flex  align-items-center">
                            <div class="">
                                <input type="checkbox" name="" class="rounded-sm mr-2" id=""
                                    style="width: 18px; height: 18px;">
                            </div>
                            <div class=" text-left">
                               <p class="text-xs"> The employee's attendance cut-off date differs from their pay peroid end
                                date <span class="text-blue-400 underline text-xs">what is Attendance cut-off date?</span></p>

                            </div>
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
                        </div>
                    </div>
                </div>
            </div>

<<<<<<< HEAD
            <div class="col-span-8 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
                <div class="bg-orange-100 p-2 rounded " v-if="active2 == 2 " >
                    <i class="fa fa-exclamation-triangle ml-2 mb-3" style="width: 25px;" aria-hidden="true" ></i>
                    The edit option has been disabled. Please contact the ABShrms Support Team for assistance.
                </div>
                <h1 class=" mt-4 font-extralight">
                    The finalized payroll peroid is <strong>26th - 25th</strong>
=======

            <div class="col-span-3 px-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
                <Transition>
                    <div class="bg-orange-100 p-2 rounded mt-4  " v-if="active_Btn2">
                        <i class="fa fa-exclamation-triangle ml-2 mb-3" style="width: 25px;" aria-hidden="true"></i>
                        The edit option has been disabled. Please contact the ABShrms Support Team for assistance.
                    </div>
                </Transition>
                <h1 class=" mt-4 text-gray-600 fs-13 ">
                    The finalized payroll peroid is <span class=" text-black-alpha-80 fs-13 line-height-2 ">26th -
                        25th</span>
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
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
        <div class="grid grid-cols-12 gap-6 mx-6 my-4">
            <div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-4">
                    <h5 class="my-2 text-sm font-semibold">Pay days in month</h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Actual days in a month "
                                v-model="uesPayroll.generalPayrollSettings.paydays_in_month" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h5 class="my-2 text-sm font-semibold">Pay days in month</h5>
                    <div class="flex gap-8 my-3 justify-between">
                        <div class="my-2">
                            <p>Include Week Off's</p>
                        </div>
                        <div class="flex">
                            <div class="mx-4">
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="1" v-model="uesPayroll.generalPayrollSettings.include_weekoffs" />
                                <label class="ml-2 font-bold form-check-label leave_type mx-2" for="">Yes</label>
                            </div>
                            <div>
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="0" v-model="uesPayroll.generalPayrollSettings.include_weekoffs" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-8 justify-between">
                        <div class="">
                            <p>Include Holiday's</p>
                        </div>
                        <div class="flex">
                            <div class="mx-4">
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" v-model="uesPayroll.generalPayrollSettings.include_holidays" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">Yes</label>
                            </div>
                            <div>
                                <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                    value="" v-model="uesPayroll.generalPayrollSettings.include_holidays" />
                                <label class="ml-2 font-bold form-check-label leave_type" for="">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-8 p-4 my-4 leading-8 ">
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
        <div class="grid grid-cols-12 gap-6 mx-6 ">
            <div class="col-span-4  p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                <div class="my-4">
                    <h5 class="my-2 text-sm font-semibold">Currency</h5>
                    <div class="flex gap-8 justify-evenly">
                        <div class="w-full">
                            <InputText class="w-full h-11" placeholder="Indian Rupee (&#8377;)"
                                v-model="uesPayroll.generalPayrollSettings.currency_type" />
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-evenly">
<<<<<<< HEAD
                    <h5 class="text-sm font-semibold w-7">Description</h5>
                    <div class="flex gap-6  my-3">
                        <div class="flex  ">
=======
                    <h5 class="text-lg font-semibold mt-4">Remuneration Types</h5>
                    <div class="flex gap-6 my-3">
                        <div class=" flex  items-center">
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
                            <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                value="1" v-model="uesPayroll.generalPayrollSettings.remuneration_type" />
                            <label class="ml-2 text-sm font-semibold from-check-label leave_type" for="">Monthly</label>
                        </div>
                        <div class="">
                            <input style="height: 20px; width: 20px" class="form-check-input" type="radio" name="" id=""
                                value="0" v-model="uesPayroll.generalPayrollSettings.remuneration_type" />
                            <label class="ml-2 text-sm font-semibold form-check-label leave_type" for="">Daliy</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-8 p-4 my-4 ">
                <div class="my-2">
                    <strong>EXPLANATION :</strong>
                    <p class="my-2 text-gray-600">
                        <strong class="mr-2 text-black-70">Monthly :</strong>Monthly remuneration refers to the compensation
                        paid to an
                        employee
                        in exchange for their services, which is calculated and defined on a monthly
                        basis. This compensation serves as a form of payment for the employee's work
                        performed throughout the month.
                    </p>
                    <p class="my-3 text-gray-600">
                        <strong class="mr-2 text-black-70">Daily :</strong>Daily remuneration refers to the compensation
                        paid to an
                        employee for
                        their services, which is calculated on a per-day basis. It is the amount that
                        an employee is entitled to receive for each day of work performed as per the
                        agreed terms of their employment contract.
                    </p>
                </div>
            </div>
        </div>
        <div class="my-3 text-end">
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4"
                @click="uesPayroll.activeTab--">Previous</button>
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"
                @click="uesPayroll.saveGeneralPayrollSettings(uesPayroll.generalPayrollSettings)">Save</button>
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="uesPayroll.activeTab++">Next</button>
        </div>

    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { usePayrollMainStore } from "../../../stores/payrollMainStore";
import { usePayrollHelper } from "../../../stores/payrollHelper";
import dayjs from "dayjs";


const uesPayroll = usePayrollMainStore()
const useHelper = usePayrollHelper()
const editAttendanceEndDate = ref(true)


const formattedDate = ref()

const active = ref(1);
const active2 = ref(1);

const active_Btn = ref(false);
const active_Btn2 = ref(false);

// function active_Btn() {
//     active.value = 2;
//     console.log(active.value);
// }
// function active_Btn2() {
//     active2.value = 2;
//     console.log(active2);
// }

const daysArray = ref([])


const daysAsDropdown = (month, year) => {
    daysArray.value.splice(0, daysArray.value.length)
    const days = new Date(year, month, 0).getDate()
    for (let day = 1; day <= days; day++) {
        daysArray.value.push({ day: day });
    }

}


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


onMounted(() => {

    uesPayroll.generalPayrollSettings.payperiod_start_month ? dayjs(uesPayroll.generalPayrollSettings.payperiod_start_month).format('MMM') : uesPayroll.generalPayrollSettings.payperiod_start_month


    // for (let day = 1; day <= 31; day++) {
    //     daysArray.value.push({ day: day });
    // }
})


</script>

<style>
.fs-13
{
    font-size: 13.2px !important;
}

.v-enter-active,
.v-leave-active
{
    transition: opacity 0.3s ease;
}

.v-enter-from,
.v-leave-to
{
    opacity: 0;
}
</style>
