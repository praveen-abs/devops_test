<template>
  <div class="px-5">
    <div class="row d-flex justify-content-start align-items-center mt-4">
      <div class="d-flex mt-4">
        <div class="col-3 fs-3" style="position: relative; left: -8px;">
          <h1 class="fw-bolder">Salary Advance Feature</h1>
        </div>
        <div class="col">


          <button class="orange_btn "
            :class="[salaryStore.isSalaryAdvanceFeatureEnabled === 2 ? 'bg-white text-black border-1 border-black' : 'text-white']"
            @click="salaryStore.isSalaryAdvanceFeatureEnabled  = 1">Disabled</button>
          <button class="Enable_btn" :class="[salaryStore.isSalaryAdvanceFeatureEnabled  === 2 ? 'bg-green-700 text-white' : '']"
            @click="salaryStore.isSalaryAdvanceFeatureEnabled  = 2">Enable</button>

        </div>

        <!-- <div class="float-right" v-if="salaryStore.isSalaryAdvanceFeatureEnabled  == '2'">
          <button class="btn btn-border-primary">Cancel</button>
          <button class="mx-4 btn btn-primary" @click="salaryStore.saveSalaryAdvanceFeature">Save Changes</button>
        </div> -->
      </div>

      <div class="col" v-if="salaryStore.isSalaryAdvanceFeatureEnabled  == '1'">
        <div>
          <p class="fs-5">Please click the "Enable" button to activate the salary advance feature for use within your
            organization.</p>
        </div>
      </div>
      <div v-else class="row">
        <div class="col-10">

          <p class="fs-5">Please click the "Disable" button to deactivate the salary advance feature.</p>
          <h1 class="mt-12 fs-3 fw-bolder">Eligible Employees</h1>
          <p class="my-2 fs-5">Kindly choose the employees who are eligible for the salary advance.</p>
        </div>
        <div class=" col-12">
          <div class="rounded-lg shadow-sm card">
            <div class="card-body " style="border-top:4px solid var(--navy) ; border-radius: 4px 4px 0 0 ;">
              <div class="row ">
                <div class="col-10">
                  <h1 style="border-left:4px solid var(--orange); padding-left: 15px; font-size: 18px;">Employees</h1>
                </div>
                <div class="col-10 ">
                  <span class="p-input-icon-left">
                    <i class="pi pi-search" />
                    <InputText placeholder="Search" class="h-15 " />
                  </span>
                </div>
                <div class="col-12">
                  <div class="px-2 row">
                    <div class="col">

                        <div style="padding: 10px ;" class="border rounded d-flex justify-content-start align-items-center border-color" >
                            <input type="checkbox" class="mr-3" style="width:20px ; height: 20px; ">
                            <h1>Clear Filters</h1>
                        </div>

                      <!-- <Dropdown v-model="opt" editable :options="op" optionLabel="dep" optionValue="dep"
                        placeholder="Department" class="w-full text-red-500 md: border-color" /> -->

                      <!-- {{ opt }} -->
                    </div>
                    <div class="col">
                        <Dropdown v-model="opt" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="Department" class="w-full text-red-500 md: border-color" />
                    </div>
                    <div class="col">
                        <Dropdown v-model="opt1" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="Designation" class="w-full text-red-500 md: border-color" />
                    </div>
                    <div class="col">
                        <Dropdown v-model="opt2" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="Location" class="w-full text-red-500 md: border-color" />
                    </div>
                    <div class="col">
                        <Dropdown v-model="opt3" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="State" class="w-full text-red-500 md: border-color" />
                    </div>
                    <div class="col">

                        <Dropdown v-model="opt4" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="Branch" class="w-full text-red-500 md: border-color" />

                    </div>
                    <div class="col">
                        <Dropdown v-model="opt5" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="Legal Entity" class="w-full text-red-500 md: border-color" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <!-- table components  -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col mt-4">
          <h1 class="my-3 fs-3 fw-bolder">Percentage of Salary Advance</h1>
          <p class="my-2 fs-5">Please select the percentage of the salary advance that employees can avail.</p>

          <div class="shadow-sm card border-L rounded-top">
            <div class="card-body">
              <div class="row justify-content-start align-items-center">
                <div class="col-2">

                  <div class="flex flex-wrap gap-3">
                    <div class="flex justify-content-center align-items-center">
                      <RadioButton v-model="salaryStore.sa.perOfSalAdvance" inputId="ingredient1" name="percofsaladvance" value="100%OfNetsalary" />
                      <label for="ingredient1" class="ml-2 fs-5">100% Of Net salary</label>
                    </div>
                  </div>


                </div>
                <div class="col-2 ">
                  <div class="flex align-items-center">
                    <RadioButton v-model="salaryStore.sa.perOfSalAdvance" inputId="ingredient2" name="percofsaladvance" value="50%OfNetsalary" />
                    <label for="ingredient2" class="ml-2 fs-5">50% Of Net salary</label>
                  </div>
                </div>
                <div class="col-1 ">
                  <div class="flex align-items-center">
                    <RadioButton v-model="salaryStore.sa.perOfSalAdvance" inputId="ingredient3" name="percofsaladvance" value="custom" />
                    <label for="ingredient3" class="ml-2 fs-5">Custom</label>
                  </div>
                </div>
                <div class="col-3" v-if="salaryStore.sa.perOfSalAdvance == 'custom'">
                  <div class="flex align-items-center">
                    <InputText type="text"  v-model="salaryStore.sa.cusPerOfSalAdvance" name="percofsaladvance" style="max-width: 100px;" />
                    <label for="ingredient4" class="ml-2 fs-5">% Of Net salary</label>
                  </div>
                </div>

                <!--  -->
              </div>
            </div>
          </div>

          <h1 class="my-3 fs-3 mt-3 fw-bolder" style="margin-top: 30px !important;">Deduction Method</h1>
          <p class="my-2 fs-5">Please choose the method of deduction.</p>
          <div class="card border-L">
            <div class="card-body">
              <div class="row">
                <div class="col-7 d-flex justify-content-start align-items-center">
                  <!-- <input type="radio" name="Dedution_method" checked> -->
                  <RadioButton v-model="salaryStore.sa.deductMethod" inputId="ingredient1" name="deductiomAmt" value="upcomingPayroll" />
                  <label for="" class="mx-3 fs-5" style="line-height: 25px;">Deduct the amount in the upcoming
                    payroll.</label>
                </div>
              </div>
              <div class="my-3 row">
                <div class="col-7 d-flex justify-content-start align-items-center">
                  <RadioButton v-model="salaryStore.sa.deductMethod" inputId="ingredient1" name="deductiomAmt" value="upcomingPayroll" />
                  <label for="" class="mx-3 fs-5">The deduction can be made over a period of
                    <InputText type="text" class="mx-3" v-model="value" style="max-width: 100px;" /> months.
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="text-gray-600 fs-5">(Note: Within the declared period of time, employees can choose the month in which the
                    amount will be deducted.)</p>
                </div>
              </div>

            </div>
          </div>

          <h1 class="my-3 fs-3 fw-bolder" style="margin-top: 30px !important;">Approval Setting</h1>
          <p class="my-2 fs-5">Please choose the approval flow for salary advance.</p>

          <div class="card border-L">
            <div class="card-body">
              <div class="row">
                <div class="col-7 d-flex justify-content-start align-items-center">
                  <input type="radio" name="Dedution_method" checked>
                  <label for="" class="mx-3 fs-5" style="line-height: 25px;">Employee Request
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                    Line Manager
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                    HR
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                    Final Admin
                  </label>
                </div>
              </div>
              <div class="my-3 row">
                <div class="col-7 d-flex justify-content-start align-items-center">
                  <input type="radio" name="Dedution_method" checked>
                  <label for="" class="mx-3 fs-5" style="line-height: 25px;">Employee Request
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                    HR
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                    Final Admin
                  </label>
                </div>
              </div>
              <div class="my-3 row">
                <div class="col-7 d-flex justify-content-start align-items-center">
                  <input type="radio" name="Dedution_method" checked>
                  <label for="" class="mx-3 fs-5" style="line-height: 25px;">Employee Request
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                    HR
                  </label>
                </div>
              </div>
              <div class="my-3 row">
                <div class="col-7 d-flex justify-content-start align-items-center">
                  <input type="radio" name="Dedution_method" checked>
                  <label for="" class="mx-3 fs-5" style="line-height: 25px;">Employee Request
                    <i class="pi pi-arrow-right" style="font-size: 1rem"></i>

                    Final Admin
                  </label>
                </div>
              </div>



            </div>
          </div>

        </div>
      </div>

      <!--Next screen  -->

      <!-- <OrganizationChart v-model:selectionKeys="selection" :value="data" collapsible selectionMode="multiple">
        <template #person="slotProps">
            <div class="flex flex-column">
                <div class="flex flex-column align-items-center">
                    <span class="mb-2 font-bold">{{ slotProps.node.data.name }}</span>
                    <span>{{ slotProps.node.data.title }}</span>
                </div>
            </div>
        </template>
        <template #default="slotProps">
            <span>{{ slotProps.node.label }}</span>
        </template>
    </OrganizationChart>
{{ selection }} -->


    </div>
    <div class="row">
                <div class="col">
                    <div class="float-right" v-if="salaryStore.isSalaryAdvanceFeatureEnabled  == '2'">
                        <button class="btn btn-border-primary">Cancel</button>
                        <button class="mx-4 btn btn-primary" @click="salaryStore.saveSalaryAdvanceFeature">Save Changes</button>
                    </div>
                </div>
    </div>


  </div>
</template>
<script setup>

import { ref, reactive, onMounted } from 'vue';

import {salaryAdvanceSettingMainStore} from '../stores/salaryAdvanceSettingMainStore'

const salaryStore = salaryAdvanceSettingMainStore()


onMounted(() => {
  opt.value = "Department"
  opt1.value = "Designation"
  opt2.value = "Location"
  opt3.value = "State"
  opt4.value = "Branch"
  opt5.value = "Legal Entity"
})


const value = ref();


const activetab = ref(1)


const ingredient = ref('');



const opt = ref()
const opt1 =ref()
const opt2 =ref();
const opt3 =ref();
const opt4 =ref();
const opt5 =ref();
const opt6 =ref();



const op = ref([
  { id: 1, dep: "res" }
])






const selection = ref({});


const data = ref({
    key: '0',
    type: 'person',
    data: {

        name: 'Amy Elsner',
        title: 'CEO'
    },
    children: [
        {
            key: '0_0',
            type: 'person',
            data: {

                name: 'Anna Fali',
                title: 'CMO'
            },
            children: [
                {
                    key: '0_0_0',
                    label: 'Sales'
                },
                {
                    key: '0_0_"1',
                    label: 'Marketing'
                }
            ]
        },
        {
            key: '0_1',
            type: 'person',
            data: {
                name: 'Stephen Shaw',
                title: 'CTO'
            },
            children: [
                {
                    key: '0_1_0',
                    label: 'Development'
                },
                {
                    key: '0_1_1',
                    label: 'UI/UX Design'
                }
            ]
        }
    ]
});


</script>
<style>
:root {
  --orange: #FF4D00;
  --white: #fff;
  --navy: #002f56;
}

.orange_btn {
  background-color: var(--orange);
  padding: 7px 30px;
  border-radius: 4px 0 0 4px;
  color: var(--white);
}

.Enable_btn {
  border: 1px solid var(--navy);
  padding: 7px 30px;
  border-radius: 0 4px 4px 0;

}

.cancel_btn {
  border: 1px solid var(--navy);
  padding: 7px 30px;
  border-radius: 4px 0 0 4px;

}

.border-L {
  border-left: 4px solid var(--navy) !important;
}

.border-color {
  color: #003154;
  /* border: 2px solid #3B82F6 !important; */
   border: 2px solid #003487 !important;
}

.border-color::placeholder {
  color: #002f56 !important;
}

input[type=radio] {
  border: 0px;
  width: 20px;
  height: 20px;
  color: var(--orange) !important;
  background-color: var(--orange) !important;
}

.p-dropdown-label.p-inputtext {
  color: var(--navy);
}</style>

{




}

