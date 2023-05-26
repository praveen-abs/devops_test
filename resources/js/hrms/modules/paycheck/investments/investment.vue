<template>
    <Toast />
    <ConfirmDialog></ConfirmDialog>
    <div class=" mt-30 investments-wrapper">
        <div class="mb-2 shadow card left-line ">
            <div class="pt-1 pb-0 card-body">
                <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
                    <!-- <li class="mx-4 nav-item ember-view" role="presentation">
                        <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true">
                            Declaration</a>
                    </li> -->
                    <li class=" nav-item ember-view" role="presentation">
                        <a class="mx-2 nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true">
                            Investments and Exemptions</a>
                    </li>
                    <!-- <li class=" nav-item ember-view" role="presentation">
                        <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#investmentComputation" role="tab" aria-controls="pills-home" aria-selected="true">
                            Income Tax Computations</a>
                    </li> -->
                    <!-- <li class="mx-4 nav-item ember-view" role="presentation">
                        <a class="mx-4 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#form_12bb" role="tab" aria-controls="pills-home" aria-selected="true">
                            Form 12 BB</a>
                    </li>
                    <li class="mx-4 nav-item ember-view" role="presentation">
                        <a class="mx-4 nav-link ember-view" id="" data-bs-toggle="pill" href=""
                            data-bs-target="#tax_filling" role="tab" aria-controls="pills-home" aria-selected="true">
                            Tax Filling</a>
                    </li> -->

                </ul>
            </div>
        </div>
        <div class="mb-0 top-line">
            <div class="card-body">
                <div class="tab-content " id="pills-tabContent">
                    <!-- <div class="tab-pane fade active show" id="investment_dec" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <Declaration />
                    </div> -->

                    <div class="tab-pane  active show fade " id="exemptions" role="tabpanel">
                        <InvestmentAndExemption />

                    </div>
                    <div class="tab-pane fade " id="investmentComputation" role="tabpanel">
                        <ImvestmentComputation />

                    </div>
                    <!-- <div class="tab-pane fade " id="other_income" role="tabpanel" aria-labelledby="pills-home-tab">

                    </div>
                    <div class="tab-pane fade " id="other_exemptions" role="tabpanel" aria-labelledby="pills-home-tab">

                    </div> -->
                </div>
            </div>
        </div>
    </div>



    <Dialog header="Header" v-model:visible="investmentStore.canShowLoading"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
        :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>
</template>


<script setup>
import { onMounted } from 'vue'
import Declaration from './declaration/declaration.vue'
import InvestmentAndExemption from './investments_and_exemption/investments_and_exemption.vue'
import ImvestmentComputation from './income_tax_computation/incomeTaxComputation.vue'


import { investmentMainStore } from '../stores/investmentMainStore'
import { Service } from '../../Service/Service';
import dayjs from 'dayjs'

const investmentStore = investmentMainStore()
const service = Service()

onMounted(async () => {
    await investmentStore.getInvestmentSource()
})
</script>


<style >
.p-dropdown {
    display: inline-flex;
    cursor: pointer;
    position: relative;
    user-select: none;
    height: 32px;
    background: #f6f4f46e;
}

.p-dropdown .p-dropdown-label.p-placeholder {
    position: relative;
    top: -5px;
    /* border: 1px solid red; */
    color: #6c757d;
}

.p-dialog-mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
    z-index: 216;
}



i,
span,
.tabview-custom {
    vertical-align: middle;
}

span {
    margin: 0 0.5rem;
}

.AadharCardFront {
    margin-left: 20px;
}

.label {
    width: 170px;
}

.p-tabview p {
    line-height: 1.5;
    margin: 0;
}

dialog>header {
    color: #002f56 !important;
}

.form-selects {
    padding: 0;
    width: 100%;
    height: 2.5rem;
}

.save {
    border: 1px solid #e63b1f;
    color: #e63b1f;
}

.p-dialog-header {
    /* border-left: #e63b1f 5px solid !important; */
}

.form-selects ::-webkit-scrollbar {
    width: 10px !important;
    border-radius: 12px !important;
}

/* Track */
.form-selects ::-webkit-scrollbar-track {
    background: #f1f1f1 !important;
}

/* Handle */
.form-selects ::-webkit-scrollbar-thumb {
    background: #888 !important;
    border-radius: 12px !important;
}

/* Handle on hover */
.form-selects ::-webkit-scrollbar-thumb:hover {
    background: #252222 !important;
    border-radius: 12px !important;
}

Dialog {
    color: #002f56;
}

.p-inputtext.p-component.p-inputnumber-input {
    height: 32px;
    background: #f6f4f46e;
}
</style>
