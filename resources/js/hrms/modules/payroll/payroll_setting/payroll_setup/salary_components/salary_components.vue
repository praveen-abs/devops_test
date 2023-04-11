<template>
 
        <div class="mb-1 left-line">
            <div class="card ">
                <div class="card-body">
                <ul class="my-4 nav nav-pills nav-tabs-dashed " role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <button class="pb-2 nav-link active" id="pills-offer-pending-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-offer-pending" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true"> Earings</button>
                    </li>
                    <li class="mx-4 nav-item text-muted " role="presentation">
                        <button class="pb-2 nav-link" id="pills-offer-completed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-offer-completed" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Adhoc Components</button>
                    </li>
                    <li class="nav-item text-muted" role="presentation">
                        <button class="pb-2 nav-link" id="pills-offer-resent-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-offer-resent" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Reimbursement</button>
                    </li>
                    <li class="mx-4 nav-item text-muted" role="presentation">
                        <button class="pb-2 nav-link" id="pills-offer-resen-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-offer-resen" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Accounting Code</button>
                    </li>
                </ul>

          


    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-offer-pending" role="tabpanel"
            aria-labelledby="pills-offer-pending-tab">
           
                <div class="card-body">
                    <div class="offer-pending-content">
                        <earings />
                    </div>
                </div>

           
        </div>
        <div class="tab-pane fade active" id="pills-offer-completed" role="tabpanel"
            aria-labelledby="pills-offer-completed-tab">
                <div class="card-body">
                    <div class="my-4 offer-pending-content">
                        <adhoc_componentsVue />
                    </div>

            </div>
        </div>
        <div class="tab-pane fade " id="pills-offer-resent" role="tabpanel"
            aria-labelledby="pills-offer-resent-tab">
                <div class="card-body">
                    <div class="offer-pending-content">
                    <reimbursement />
                            
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="pills-offer-resen" role="tabpanel"
            aria-labelledby="pills-offer-resen-tab">
                <div class="card-body">
                    <div class="offer-pending-content">
                     <accounting_code />
                    
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>

</template>


<script setup>
import { onMounted } from 'vue'

import earings from './earings/earings.vue';
import adhoc_componentsVue from './adhoc_components/adhoc_components.vue';
import reimbursement from './reimbursement/reimbursement.vue';
import accounting_code from './accounting_code/accounting_code.vue';

</script>
