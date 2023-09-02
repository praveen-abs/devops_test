<template>
    <!-- {{ useDashboard.hrDashboardSource ? useDashboard.hrDashboardSource : [] }} -->
    <div class="w-full">
        <p class=" font-[14px] font-['Poppins']  text-gray-500 ">
            Current month - <span class="mb-2 text-xl font-semibold">{{ dayjs(new
                Date()).format('MMMM') }}</span>
        </p>
        <div class="grid grid-cols-4 gap-3 my-2">
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.hrDashboardSource ? useDashboard.hrDashboardSource.active_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Total Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.hrDashboardSource.new_employee_count ? useDashboard.hrDashboardSource.new_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">New Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.hrDashboardSource ? useDashboard.hrDashboardSource.exit_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Exit Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.hrDashboardSource ? useDashboard.hrDashboardSource.yet_active_employee_count : 0 }}
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
