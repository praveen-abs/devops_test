<template>
  <div class="mb-1">

    <div class="mb-2 shadow card left-line ">
      <div class="pt-1 pb-0 card-body">
        <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed " role="tablist">
          <li class="nav-item text-muted" role="presentation">
            <button class="pb-2 nav-link active" id="pills-offer-pending-tab" data-bs-toggle="pill"
              data-bs-target="#pills-offer-pending" type="button" role="tab" aria-controls="pills-home"
              aria-selected="true">Manage Shifts</button>
          </li>
          <li class="mx-4 nav-item text-muted " role="presentation">
            <button class="pb-2 nav-link" id="pills-offer-completed-tab" data-bs-toggle="pill"
              data-bs-target="#pills-offer-completed" type="button" role="tab" aria-controls="pills-profile"
              aria-selected="false">Flexible Shifts</button>
          </li>
          <li class="nav-item text-muted" role="presentation">
            <button class="pb-2 nav-link" id="pills-offer-resent-tab" data-bs-toggle="pill"
              data-bs-target="#pills-offer-resent" type="button" role="tab" aria-controls="pills-contact"
              aria-selected="false">Rotational Shifts</button>
          </li>
          <li class="mx-4 nav-item text-muted" role="presentation">
            <button class="pb-2 nav-link" id="pills-offer-resen-tab" data-bs-toggle="pill"
              data-bs-target="#pills-offer-resen" type="button" role="tab" aria-controls="pills-contact"
              aria-selected="false">Holidays</button>
          </li>
        </ul>
      </div>
    </div>




    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-offer-pending" role="tabpanel"
        aria-labelledby="pills-offer-pending-tab">

        <div class="card-body">
          <div class="offer-pending-content">
            <ManageShift />
          </div>
        </div>


      </div>
      <div class="tab-pane fade active" id="pills-offer-completed" role="tabpanel"
        aria-labelledby="pills-offer-completed-tab">
        <div class="card-body">
          <div class="my-4 offer-pending-content">
            <FlexibleShift />
          </div>

        </div>
      </div>
      <div class="tab-pane fade " id="pills-offer-resent" role="tabpanel" aria-labelledby="pills-offer-resent-tab">
        <div class="card-body">
          <div class="offer-pending-content">
            <RotationalShift />
          </div>
        </div>
      </div>
      <div class="tab-pane fade " id="pills-offer-resen" role="tabpanel" aria-labelledby="pills-offer-resen-tab">
        <div class="card-body">
          <div class="offer-pending-content">

            <Holidays_Lists />
          </div>
        </div>
      </div>
    </div>

  </div>
</template>


<script setup>
import { onMounted } from 'vue'
import ManageShift from './ManageShift/ManageShift.vue';
import RotationalShift from './RotationalShift/RotationalShift.vue';
import FlexibleShift from './FlexibleShift/FlexibleShift.vue'

import Holidays_Lists from '../holidays/Holidays_Lists.vue';



</script>
