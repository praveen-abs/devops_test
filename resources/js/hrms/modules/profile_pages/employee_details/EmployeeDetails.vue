<template>
    <div class="w-full" v-if="_instance_profilePagesStore.employeeDetails.get_employee_details">
        <div class="w-full bg-white rounded-lg p-2 border">
            <div class="flex justify-around">
                <p class="font-semibold text-sm">General Information</p>
                <div class="flex justify-end ">
                    <!-- <p class="rounded-full font-semibold  border whitespace-nowrap p-1 text-xs">
                    Edit -->
                    <img src="../../../assests/icons/edit.svg" class="h-4 mb-1 w-4 cursor-pointer my-auto" alt="">

                    <!-- </p> -->
                </div>
            </div>

            <div class="grid grid-cols-12 gap-2 h-full py-2">
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Birthday</p>
                    <p class="font-semibold text-sm">
                        {{ dayjs(_instance_profilePagesStore.employeeDetails.get_employee_details.dob).format('DD-MMM-YYYY')
                        }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Gender</p>
                    <p class="font-semibold text-sm">
                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.gender }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Date Of Joining (DOJ)</p>
                    <p class="font-semibold text-sm">
                        {{ dayjs(_instance_profilePagesStore.employeeDetails.get_employee_details.doj).format('DD-MMM-YYYY')
                        }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Marital Status</p>
                    <p class="font-semibold text-sm"> {{
                        _instance_profilePagesStore.employeeDetails.get_employee_details.bank_name }}</p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Blood Group</p>
                    <p class="font-semibold text-sm"> {{
                        _instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_name }}</p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Physically Handicapped</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged }}</p>
                </div>

            </div>

        </div>


        <div class="w-full bg-white rounded-lg p-2 border my-3">
            <div class="flex justify-around">
                <p class="font-semibold text-sm">Contact Information</p>
                <div class="flex justify-end ">
                    <!-- <p class="rounded-full font-semibold  border whitespace-nowrap p-1 text-xs">
                    Edit -->
                    <img src="../../../assests/icons/edit.svg" class="h-4 mb-1 w-4 cursor-pointer my-auto" alt="">

                    <!-- </p> -->
                </div>
            </div>


            <div class="grid grid-cols-12 gap-4 h-full py-2">
                <div class="col-span-3">
                    <p class="font-semibold text-xs text-gray-500">Personal Email</p>
                    <p class="font-semibold text-sm"> {{ _instance_profilePagesStore.employeeDetails.email ?
                        _instance_profilePagesStore.employeeDetails.email : '-' }}</p>
                </div>
                <div class="col-span-3">
                    <p class="font-semibold text-xs text-gray-500">Official Email</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail ?
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail : '-' }}</p>
                </div>
                <div class="col-span-3">
                    <p class="font-semibold text-xs text-gray-500">Mobile Number</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number ?
                        _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number : '-' }}</p>
                </div>
                <div class="col-span-3">
                    <p class="font-semibold text-xs text-gray-500">Official Mobile Number</p>
                    <p class="font-semibold text-sm"> {{
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.official_mobile ?
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.official_mobile : '-' }}</p>
                </div>
            </div>

        </div>
        <div class="w-full bg-white rounded-lg p-2 border">
            <div class="flex justify-around">
                <p class="font-semibold text-sm">Address</p>
                <div class="flex justify-end ">
                    <!-- <p class="rounded-full font-semibold  border whitespace-nowrap p-1 text-xs">
                    Edit -->
                    <img src="../../../assests/icons/edit.svg" class="h-4 mb-1 w-4 cursor-pointer my-auto" alt="">

                    <!-- </p> -->
                </div>
            </div>


            <div class="grid grid-cols-12 gap-4 h-full py-2">
                <div class="col-span-6">
                    <p class="font-semibold text-xs text-gray-500">Current Address</p>
                    <p class="font-semibold text-sm">
                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.current_address_line_1 ?
                            _instance_profilePagesStore.employeeDetails.get_employee_details.current_address_line_1 : '-' }}</p>
                </div>
                <div class="col-span-6">
                    <p class="font-semibold text-xs text-gray-500">Permanent Address </p>
                    <p class="font-semibold text-sm">
                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.permanent_address_line_1 ?
                            _instance_profilePagesStore.employeeDetails.get_employee_details.permanent_address_line_1 : '-' }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</template>

<script setup>
import dayjs from 'dayjs';
import { ref, onMounted, reactive, computed } from "vue";
import moment from "moment";
import { useNow, useDateFormat } from '@vueuse/core'
import axios from "axios";
import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";


import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const fetch_data = Service()
const _instance_profilePagesStore = profilePagesStore()

</script>
