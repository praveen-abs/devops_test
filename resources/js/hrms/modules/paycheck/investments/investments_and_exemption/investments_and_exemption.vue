<template>
     <Toast />
    <div>
        <TaxSavingInvestments />

        <!-- Navigation Bar -->

        <div class="p-2 pb-0 mb-3 bg-white rounded-lg shadow tw-card left-line" style="background-color: white;">

            <ul class="bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation"  >
                    <a class="mx-4 nav-link" id="" data-bs-toggle="pill" href="" 
                        role="tab" aria-controls="" aria-selected="true" @click="investmentStore.investment_exemption_steps = 1" :class="[investmentStore.investment_exemption_steps === 1 ? 'active' : '']">
                        HRA
                    </a>
                </li>

                <li class="mx-3 nav-item " role="presentation"  >
                    <a class="mx-4 nav-link " id="" data-bs-toggle="pill" href="" @click="investmentStore.investment_exemption_steps = 2" :class="[investmentStore.investment_exemption_steps === 2 ? 'active' : '']" role="tab"
                        aria-controls="" aria-selected="true">
                        Section 80C & 80CCC
                        </a>
                </li>
                <li class="nav-item " role="presentation"  >
                    <a class="mx-4 nav-link mx-xl-3 " id="" data-bs-toggle="pill" href=""  @click="investmentStore.investment_exemption_steps = 3" :class="[investmentStore.investment_exemption_steps === 3 ? 'active' : '']"
                        role="tab" aria-controls="" aria-selected="true">
                        
                        Other Exemptions
                    </a>
                </li>
                <li class="mx-3 nav-item " role="presentation" >
                    <a class="mx-4 nav-link " id="" data-bs-toggle="pill" href=""  @click="investmentStore.investment_exemption_steps = 4" :class="[investmentStore.investment_exemption_steps === 4 ? 'active' : '']" role="tab"
                        aria-controls="" aria-selected="true">
                        House Property
                        </a>
                </li>


                <li class="nav-item " role="presentation" >
                    <a class="mx-4 nav-link mx-xl-3 " id="" data-bs-toggle="pill" href=""  @click="investmentStore.investment_exemption_steps = 5" :class="[investmentStore.investment_exemption_steps === 5 ? 'active' : '']"
                        role="tab" aria-controls="" aria-selected="true">
                        Reimbursement
                    </a>
                </li>
                <li class="mx-3 nav-item " role="presentation"  >
                    <a class="mx-4 nav-link" id="" data-bs-toggle="pill" href="" @click="investmentStore.investment_exemption_steps = 6" :class="[investmentStore.investment_exemption_steps === 6 ? 'active' : '']" role="tab"
                        aria-controls="" aria-selected="true">
                        Previous Employer Income
                    </a>
                </li>


                <li class="nav-item " role="presentation"  >
                    <a class="mx-4 nav-link mx-xl-3 " id="" data-bs-toggle="pill" href="" @click="investmentStore.investment_exemption_steps = 7" :class="[investmentStore.investment_exemption_steps === 7 ? 'active' : '']"
                        role="tab" aria-controls="" aria-selected="true">
                        Other Source Of Income
                    </a>
                </li>

            </ul>

        </div>


        <!-- Tab Content -->


        <div class="tab-content " id="">
            <div  v-if="investmentStore.investment_exemption_steps === 1" >
              <HRA />
            </div>
            <div  v-if="investmentStore.investment_exemption_steps === 2" >
                <Section80cc80ccc />
            </div>
            <div  v-if="investmentStore.investment_exemption_steps === 3">
                <OtherExemption />
            </div>
            <div  v-if="investmentStore.investment_exemption_steps === 4">
                <HouseProperty />
            </div>
            <div  v-if="investmentStore.investment_exemption_steps === 5">
                <Reimbursement />
            </div>
            <div  v-if="investmentStore.investment_exemption_steps === 6">
                <PreviousEmployerIncome />
            </div>
            <div  v-if="investmentStore.investment_exemption_steps === 7">
                <OtherSourceOfIncome />
            </div>

        </div>
    </div>
</template>


<script setup>

import TaxSavingInvestments from './tax_saving_investments/tax_saving_investments.vue'
import HRA from './hra/hra.vue';
import Section80cc80ccc from './section_80cc_80ccc/section_80cc_80ccc.vue';
import OtherExemption from './other_exemption/other_exemption.vue';
import HouseProperty from './house_property/house_property.vue';
import Reimbursement from './reimbursement/reimbursement.vue';
import PreviousEmployerIncome from './previous_employer_income/previous_employer_income.vue';
import OtherSourceOfIncome from './other_source_of_income/other_source_of_income.vue';
import { onMounted, ref } from 'vue';
import { investmentMainStore } from '../../stores/investmentMainStore';


const investmentStore = investmentMainStore()

const activetab = ref(investmentStore.investment_exemption_steps);

// onMounted(async () => {
//     console.log(activetab.value);
//     await investmentStore.getInvestmentSource()
// })

</script>

<style>

.dec_amt {
    font-weight: 501;
}
.p-inputtext.p-component.p-inputnumber-input{
height: 32px;
background: #f6f4f46e;
border: 0.1px solid rgba(187, 187, 187, 0.65);
}
.p-inputtext:enabled:focus {
  outline: 0 none;
  outline-offset: 0;
  box-shadow: 0 0 0 0.2rem #3b82f6fc ;
  border-color: #3B82F6;
}
.p-inputtext {
  margin: 0;
  height: 32px;
  background: #f6f4f46e;
  border: 0.1px solid rgba(187, 187, 187, 0.65);
}
.p-datatable-scrollable .p-datatable-thead {
  position: sticky;
  top: 0;
  z-index: 0;
}
</style>