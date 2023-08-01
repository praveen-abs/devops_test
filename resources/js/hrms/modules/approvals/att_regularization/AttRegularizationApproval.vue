<template>
    <Toast />
    <div class="Attendance regularization">
        <div class="p-2 pb-0 mb-3  rounded-lg shadow tw-card left-line">
            <div class="flex justify-between">
                <ul class="bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed " id="pills-tab"
                    role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#leave_balance" aria-selected="true"
                            role="tab">
                            Attendance Regularization</a>
                    </li>
                    <li class="nav-item text-muted " role="presentation">
                        <a class="pb-2 mx-4 nav-link" data-bs-toggle="tab" href="#team_leaveBalance" aria-selected="false"
                            tabindex="-1" role="tab">
                            Absent Regularization</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content h-[100vh]" id="pills-tabContent">

            <div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">
                <attendance_regularization />
            </div>
            <div class="tab-pane fade show " id="team_leaveBalance" role="tabpanel" aria-labelledby="pills-profile-tab">
                <absent_Regularization />
            </div>


        </div>
    </div>
</template>


<script setup>
import attendance_regularization from "./attendance_regularization.vue";
import absent_Regularization from "./absent_Regularization.vue";
</script>



