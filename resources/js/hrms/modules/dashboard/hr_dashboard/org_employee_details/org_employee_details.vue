<template>
    <!-- {{ useDashboard.orgEmployeeDetailCount ? useDashboard.orgEmployeeDetailCount : [] }} -->
    <div class="w-full" v-if="useDashboard.orgEmployeeDetailCount">
        <p class=" font-[14px] font-['Poppins']  text-gray-500 ">
            Current month - <span class="mb-2 text-xl font-semibold">{{ dayjs(new
                Date()).format('MMMM') }}</span>
        </p>
        <div class="grid grid-cols-4 gap-3 my-2">
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer" @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.total_employees},useDashboard.reportName = `total_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.total_employee_count ? useDashboard.orgEmployeeDetailCount.total_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Total Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer "  @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.new_employees},useDashboard.reportName = `new_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.new_employee_count ? useDashboard.orgEmployeeDetailCount.new_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">New Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer"  @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.exit_employees},useDashboard.reportName =`active_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.exit_employee_count ? useDashboard.orgEmployeeDetailCount.exit_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Exit Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer"  @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.yet_to_active_employees},useDashboard.reportName = `yet_to_active_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.yet_to_active_employee_count ? useDashboard.orgEmployeeDetailCount.yet_to_active_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Yet to Active Employees </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import dayjs from 'dayjs'
import { useMainDashboardStore } from '../../stores/dashboard_service';

const useDashboard = useMainDashboardStore()

</script>
