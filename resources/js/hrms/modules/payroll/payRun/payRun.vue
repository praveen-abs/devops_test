<template>
    <div class="w-full" v-if="usePayrun.currentActiveScreen == 0">
        <!--Current  Financial Year  calculation -->
        <div class="">
            <CurrentFinancialYearStatus />
        </div>
        <!-- Run Current Month Payroll -->
        <div class="my-4">
            <p class="font-sans font-semibold fs-5">JUN 2023</p>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2 ...">
                <RunPayroll />
            </div>
            <div class="...">
                <calculatedPayRollPerMonth />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 my-3">
            <div class="col-span-2 ...">
                <PayrollOutCome />
            </div>
            <div class="...">
                <Activity />
            </div>
        </div>
    </div>
    <Transition>
        <div class="" v-if="usePayrun.currentActiveScreen == 1">
            <LeaveAttendanceDailyWages />
        </div>
    </Transition>
</template>

<script setup>
import CurrentFinancialYearStatus from './currentFinancialYearStatus/currentFinancialYearStatus.vue'
import RunPayroll from './runPayroll/runPayroll.vue'
import calculatedPayRollPerMonth from './calculatedPayrollPerMonth/calculatedPayrollPerMonth.vue'
import PayrollOutCome from './payrollOutcome/payrollOutcome.vue';
import Activity from './activity/activity.vue'

import LeaveAttendanceDailyWages from './runPayroll/leaveAttendanceDailyWages/leaveAttendanceDailyWages.vue';
import { payrunMainStore } from './stores/payrunMainStore'

const usePayrun = payrunMainStore()

</script>

<style>
.page-content {
    padding: calc(40px + 1.5rem) calc(1.5rem / 2) 50px calc(1.5rem / 2);
}
</style>