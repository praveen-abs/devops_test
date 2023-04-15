<template>
    <div>
        <TaxSavingInvestments />

        <!-- Navigation Bar -->

        <div class="pt-1 pb-0 mb-3 tw-card left-line">

            <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation">
                    <a class="nav-link active " id="" data-bs-toggle="pill" href="" data-bs-target="#house_property"
                        role="tab" aria-controls="" aria-selected="true">
                        HRA
                    </a>
                </li>

                <li class="mx-3 nav-item " role="presentation">
                    <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#c_cc" role="tab"
                        aria-controls="" aria-selected="true">
                        Section 80C & 80CCC</a>
                </li>
                <li class="nav-item " role="presentation">
                    <a class="mx-0 nav-link mx-xl-3 " id="" data-bs-toggle="pill" href="" data-bs-target="#other_exemptions"
                        role="tab" aria-controls="" aria-selected="true">
                        Other Exemptions
                    </a>
                </li>
                <li class="mx-3 nav-item " role="presentation">
                    <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#income_loss" role="tab"
                        aria-controls="" aria-selected="true">
                        House Property</a>
                </li>


                <li class="nav-item " role="presentation">
                    <a class="mx-0 nav-link mx-xl-3 " id="" data-bs-toggle="pill" href="" data-bs-target="#reimbursement"
                        role="tab" aria-controls="" aria-selected="true">
                        Reimbursement
                    </a>
                </li>
                <li class="mx-3 nav-item " role="presentation">
                    <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#previous_income" role="tab"
                        aria-controls="" aria-selected="true">
                        Previous Employer Income
                    </a>
                </li>


                <li class="nav-item " role="presentation">
                    <a class="mx-0 nav-link mx-xl-3 " id="" data-bs-toggle="pill" href="" data-bs-target="#other_income"
                        role="tab" aria-controls="" aria-selected="true">
                        Other Source Of Income
                    </a>
                </li>

            </ul>

        </div>


        <!-- Tab Content -->


        <div class="tab-content " id="">
            <div class="tab-pane fade active show " id="house_property" role="tabpanel" aria-labelledby="pills-home-tab">
              <HRA />
            </div>
            <div class="tab-pane fade show " id="c_cc" role="tabpanel" aria-labelledby="">
                <Section80cc80ccc />
            </div>
            <div class="tab-pane fade " id="other_exemptions" role="tabpanel" aria-labelledby="">
                <OtherExemption />
            </div>
            <div class="tab-pane fade " id="income_loss" role="tabpanel" aria-labelledby="">
                <HouseProperty />
            </div>
            <div class="tab-pane fade " id="reimbursement" role="tabpanel" aria-labelledby="">
                <Reimbursement />
            </div>
            <div class="tab-pane fade " id="previous_income" role="tabpanel" aria-labelledby="">
                <PreviousEmployerIncome />
            </div>
            <div class="tab-pane fade " id="other_income" role="tabpanel" aria-labelledby="">
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

</script>