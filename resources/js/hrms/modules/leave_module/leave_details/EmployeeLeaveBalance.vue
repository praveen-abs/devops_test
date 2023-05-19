<template>
    <div class="mb-3 tw-card">
        <div class="mb-2 row">
            <div class="col-sm-6 col-xl-6 col-md-6 col-lg-6">
                <h6 class="text-lg font-semibold text-gray-900 modal-title">Leave Balance</h6>
            </div>
            <div class="col-6 justify-content-end d-flex">
                <LeaveApply />
            </div>
        </div>


        <!-- <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 xl:grid-cols-3" > -->

        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div class="tw-card dynamic-card ">
                <div class="text-center">
                    <p class="mb-2 text-base font-semibold ">
                        <!-- {{ $key }} -->
                    </p>
                    <h6 class="mb-0 text-sm font-semibold">
                        <!-- {{ $value }} -->
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="tw-card ">
        <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Leave Availed</h6>
        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div class="bg-indigo-100 border-l-4 border-indigo-300 tw-card ">
                <div class="text-center">
                    <p class="mb-2 text-base font-semibold ">
                        <!-- {{ $Leave_type }} -->
                    </p>
                    <h6 class="mb-0 text-base font-semibold">
                        <!-- {{ $balance }} -->
                    </h6>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import LeaveApply from '../leave_apply/LeaveApply.vue'
</script>