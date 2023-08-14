<template>
    <div class="w-full h-screen bg-gray-50 p-3">
        <div class="bg-white border rounded-lg grid grid-cols-12 p-3 content-center"
            v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details">
            <div class="col-span-4 h-full grid grid-cols-12 gap-6">
                <div class="col-span-4">
                    <div :class="[_instance_profilePagesStore.employeeDetails.short_name_Color ? _instance_profilePagesStore.employeeDetails.short_name_Color : '', _instance_profilePagesStore.employeeDetails.short_name_Color]" class=" h-full w-full rounded-full  flex justify-center items-center" v-if="!_instance_profilePagesStore.profile" >
                        <p class="font-semibold text-4xl text-center text-white">
                            {{ _instance_profilePagesStore.employeeDetails.user_short_name }}
                        </p>
                    </div>
                    <div v-else class="profile-pic">
                        <img v-if="_instance_profilePagesStore.profile" class="forRound"
                            :src="`data:image/png;base64,${_instance_profilePagesStore.profile}`" srcset="" alt=""
                            id="output" width="200" />
                        <label class="-label" for="file">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span>Change</span>
                        </label>
                        <input id="file" type="file"   @change="updateProfilePhoto($event)"/>
                    </div>

                </div>
                <div class="col-span-8">
                    <div>
                        <p class="font-semibold text-md">{{ _instance_profilePagesStore.employeeDetails ?
                            _instance_profilePagesStore.employeeDetails.name : '-' }}</p>
                        <p class="font-semibold text-xs text-gray-500">{{ _instance_profilePagesStore.employeeDetails ?
                            _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation : '-' }}</p>
                    </div>
                    <div class="py-2">
                        <p class="font-semibold text-xs">Profile completeness</p>

                        <div class="w-11/12 my-1">
                            <ProgressBar v-if="_instance_profilePagesStore.employeeDetails.profile_completeness <= 39"
                                :value="_instance_profilePagesStore.employeeDetails.profile_completeness"
                                :class="[_instance_profilePagesStore.employeeDetails.profile_completeness <= 39 ? 'progressbar' : '']">
                            </ProgressBar>
                            <ProgressBar class="progressbar_val2"
                                v-if="_instance_profilePagesStore.employeeDetails.profile_completeness >= 40 && _instance_profilePagesStore.employeeDetails.profile_completeness <= 59"
                                :class="[_instance_profilePagesStore.employeeDetails.profile_completeness >= 40 && _instance_profilePagesStore.employeeDetails.profile_completeness <= 59]"
                                :value="_instance_profilePagesStore.employeeDetails.profile_completeness">
                            </ProgressBar>

                            <ProgressBar class="progressbar_val3"
                                v-if="_instance_profilePagesStore.employeeDetails.profile_completeness >= 60"
                                :class="[_instance_profilePagesStore.employeeDetails.profile_completeness >= 60]"
                                :value="_instance_profilePagesStore.employeeDetails.profile_completeness">
                            </ProgressBar>
                        </div>

                        <p class="mb-2 text-muted f-10 text-start fw-bold">
                            Your profile is completed
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-span-5 grid grid-cols-3 gap-4 h-full">
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Employee Status</p>
                    <p v-if="_instance_profilePagesStore.employeeDetails.active == 1" class="font-semibold text-sm">Active
                    </p>
                    <p v-else class="font-semibold text-sm">Not active</p>
                </div>
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Designation</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation ?
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation : '-' }}</p>
                </div>
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Department</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails ?
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name : '-' }}</p>
                </div>
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Employee Code</p>
                    <p class="font-semibold text-sm">{{ _instance_profilePagesStore.employeeDetails ?
                        _instance_profilePagesStore.employeeDetails.user_code : '-' }}</p>
                </div>
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Location</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails ?
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.work_location : '-' }}</p>
                </div>
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Reporting to</p>
                    <p class="font-semibold text-sm whitespace-nowrap" v-if="_instance_profilePagesStore.employeeDetails">
                        {{
                            `${_instance_profilePagesStore.employeeDetails
                                .get_employee_office_details.l1_manager_name}(${_instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code})`
                        }}
                    </p>

                </div>

            </div>
            <div class="col-span-3 h-full">
                <div class="flex justify-end">
                    <div>
                        <!-- <p class="rounded-full font-semibold  border whitespace-nowrap p-1 text-xs">
                    Edit -->
                        <!-- <img src="../../../assests/icons/edit.svg" class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""> -->
                        <img src="../hrms/assests/icons/edit.svg" class="h-4 w-4 cursor-pointer my-auto" alt="">

                        <!-- </p> -->
                    </div>
                    <div class="mx-2">
                        <button class="p-0 m-0 bg-transparent border-0 outline-none btn">
                            <i class="pi pi-id-card text-success fs-4" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full my-2">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 col-xl-12">
                <div class="mb-2">
                    <div class="pt-1 pb-0 ">
                        <ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#employee_details" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Employee Details</a>
                            </li>
                            <li class="mx-4 nav-item" role="presentation">
                                <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#family_det" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Family</a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#experience_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Experience</a>
                            </li>
                            <li class="mx-4 nav-item " role="presentation">
                                <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#finance_det"
                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                    Paycheck</a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#document_det"
                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                    Document</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content " id="pills-tabContent">

                    <div class="tab-pane  fade active show" id="employee_details" role="tabpanel" aria-labelledby="">
                        <div>
                            <EmployeeDetails />
                        </div>
                    </div>

                    <div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">
                        <FamilyDetails />
                    </div>

                    <div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">
                        <ExperienceDetails />

                    </div>
                    <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">
                        <div>
                            <FinanceDetails />
                        </div>


                    </div>
                    <div class="tab-pane fade" id="document_det" role="tabpanel" aria-labelledby="">

                        <Documents />

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import EmployeeDetails from '../hrms/modules/profile_pages/employee_details/EmployeeDetails.vue'
import FamilyDetails from '../hrms/modules/profile_pages/family_details/FamilyDetails.vue'
import FinanceDetails from '../hrms/modules/profile_pages/finance_details/FinanceDetails.vue'
import ExperienceDetails from '../hrms/modules/profile_pages/experience/ExperienceDetails.vue'
import Documents from '../hrms/modules/profile_pages/documents/documents.vue'

import { profilePagesStore } from '../hrms/modules/profile_pages/stores/ProfilePagesStore'
import { ref, onMounted } from 'vue'
import { Service } from '../hrms/modules/Service/Service'

const service = Service()

let _instance_profilePagesStore = profilePagesStore();

onMounted(() => {
    _instance_profilePagesStore.fetchEmployeeDetails()
})
</script>



<style lang="scss">
@mixin object-center {
    display: flex;
    justify-content: center;
    align-items: center;
}

$circleSize: 90px;
$radius: 100px;
$shadow: 0 0 10px 0 rgba(255, 255, 255, .35);
$fontColor: rgb(250, 250, 250);

.profile-pic {
    color: transparent;
    transition: all .3s ease;
    @include object-center;
    position: relative;
    transition: all .3s ease;

    input {
        display: none;
    }

    .forRound {
        position: absolute;
        object-fit: cover;
        width: $circleSize;
        height: $circleSize;
        box-shadow: $shadow;
        border-radius: $radius;
        z-index: 0;
    }

    .-label {
        cursor: pointer;
        height: $circleSize;
        width: $circleSize;
    }

    &:hover {
        .-label {
            @include object-center;
            background-color: rgba(0, 0, 0, .8);
            z-index: 10000;
            color: $fontColor;
            transition: background-color .2s ease-in-out;
            border-radius: $radius;
            margin-bottom: 0;
        }
    }

    span {
        display: inline-flex;
        padding: .2em;
        height: 2em;
        font-size: 12px;
    }
}
</style>
