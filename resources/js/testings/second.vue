<template>
    <div class="w-full h-screen bg-gray-50 p-3">
        <EmployeeCard />

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
import EmployeeCard from '../hrms/modules/profile_pages/EmployeeCard/EmployeeCard.vue'
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
