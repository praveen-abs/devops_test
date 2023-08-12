<template>

    <div class="mb-1 left-line">
        <div class="card ">
            <div class="card-body">
            <ul class="my-4 nav nav-pills nav-tabs-dashed " role="tablist">
                <li class="nav-item text-muted" role="presentation">
                    <button class="pb-2 nav-link active" id="pills-offer-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-offer-pending" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Employee's Provident Fund</button>
                </li>
                <li class="mx-4 nav-item text-muted " role="presentation">
                    <button class="pb-2 nav-link" id="pills-offer-completed-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-offer-completed" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Employee's State Insurance</button>
                </li>
                <li class="nav-item text-muted" role="presentation">
                    <button class="pb-2 nav-link" id="pills-offer-resent-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-offer-resent" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">ABRY Scheme</button>
                </li>
                <li class="mx-4 nav-item text-muted" role="presentation">
                    <button class="pb-2 nav-link" id="pills-offer-resen-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-offer-resen" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">PMRPY Scheme</button>
                </li>
            </ul>




<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-offer-pending" role="tabpanel"
        aria-labelledby="pills-offer-pending-tab">

            <div class="card-body">
                <div class="offer-pending-content">
                    <employees_provident_fund />
                </div>
            </div>


    </div>
    <div class="tab-pane fade active" id="pills-offer-completed" role="tabpanel"
        aria-labelledby="pills-offer-completed-tab">
            <div class="card-body">
                <div class="my-4 offer-pending-content">
                    <employees_state_insurance />
                </div>

        </div>
    </div>
    <div class="tab-pane fade " id="pills-offer-resent" role="tabpanel"
        aria-labelledby="pills-offer-resent-tab">
            <div class="card-body">
                <div class="offer-pending-content">
                <abry_scheme />

            </div>
        </div>
    </div>
    <div class="tab-pane fade " id="pills-offer-resen" role="tabpanel"
        aria-labelledby="pills-offer-resen-tab">
            <div class="card-body">
                <div class="offer-pending-content">
                 <pmrpy_scheme />

            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<router-view></router-view>
</template>


<script setup>

import { onMounted } from 'vue'
// import { initFlowbite } from 'flowbite'
import employees_provident_fund from './employees_provident_fund/employees_provident_fund.vue'
import employees_state_insurance from './employees_state_insurance/employees_state_insurance.vue';
import abry_scheme from './abry_scheme/abry_scheme.vue';
import pmrpy_scheme from './pmrpy_scheme/pmrpy_scheme.vue'

</script>
