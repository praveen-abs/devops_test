<template>
    <div class=" investments-wrapper">
        <div class="mb-2 shadow card left-line p-1">
            <div class="pt-1 pb-0 card-body">
                <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="mx-4 nav-item ember-view" role="presentation">
                        <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#Leave" role="tab" aria-controls="pills-home" aria-selected="true">
                           1.Leave Applied</a>
                    </li>
                    <li class=" nav-item ember-view" role="presentation">
                        <a class="mx-4 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#Attendance" role="tab" aria-controls="pills-home" aria-selected="true">
                           2.Attendance</a>
                    </li>
                    <li class=" nav-item ember-view" role="presentation">
                        <a class="mx-4 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#LOP" role="tab" aria-controls="pills-home" aria-selected="true">
                           3.LOP Summary</a>
                    </li>
                    <li class=" nav-item ember-view" role="presentation">
                        <a class="mx-4 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#Revoke " role="tab" aria-controls="pills-home" aria-selected="true">
                            4.Revoke LOP </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-2 rounded-lg card my-2">
            <p class="p-2 bg-orange-100 my-3 rounded-lg font-semibold fs-6">All leave (approved or pending) that falls under this payroll cycle month will be displayed here.</p>
        </div>
        <div class="mb-0 card">
            <div class="card-body">
                <div class="tab-content " id="pills-tabContent">
                    <div class="tab-pane fade active show" id="Leave" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                       
                    </div>

                    <div class="tab-pane fade " id="Attendance" role="tabpanel">
                       

                    </div>
                    <div class="tab-pane fade " id="LOP" role="tabpanel">
                       

                    </div>
                    <div class="tab-pane fade " id="Revoke" role="tabpanel">
                        

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
const router = useRouter();
const route = useRoute();
onMounted(()=>{
    console.log(route.params.module);
})
</script>