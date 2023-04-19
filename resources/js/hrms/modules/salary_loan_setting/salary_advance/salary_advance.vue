<template>
    <div class="px-5">
        <div class="row d-flex justify-content-start align-items-center ">
          <div class="d-flex">
            <div class="col-3 fs-3" style="position: relative; left: -8px;">
                <h1>Salary Advance Feature</h1>
            </div>
            <div class="col">


                <button class="orange_btn " :class="[activetab === 2 ? 'bg-white text-black border-1 border-black': 'text-white']" @click="activetab = 1">Disabled</button>
                <button class="Enable_btn"  :class="[activetab === 2 ? 'bg-green-700 text-white' : '']" @click="activetab = 2">Enable</button>

            </div>
            <div v-if="activetab == '2'" class="mx-6">
                <button class="cancel_btn border-blue-800 text-indigo-700"  >cancel</button>
                <button class="cancel_btn" style="background-color: var(--navy); border-radius:0 4px 4px 0 ; color: var(--white);"   >Enable</button>
            </div>
          </div>

            <div class="col" v-if="activetab == '1'">
                <div>
                    <p class="fs-5">Please click the "Enable" button to activate the salary advance feature for use within your organization.</p>
                </div>
            </div>
            <div v-else class="row">
                <div class="col-10">

                    <p class="fs-5">Please click the "Disable" button to deactivate the salary advance feature.</p>
                    <h1 class="fs-3 mt-10">Eligible Employees</h1>
                    <p class="my-2 fs-5" >Kindly choose the employees who are eligible for the salary advance.</p>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body " style="border-top:3px solid var(--navy) ;">
                      <div class="row ">
                        <div class="col-10">
                          <h1 style="border-left:3px solid var(--orange); padding-left: 15px; font-size: 18px;">Employees</h1>
                        </div>
                        <div class="col-10 ">
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText  placeholder="Search" class="h-15" />
                            </span>
                        </div>
                        <div class="col-12">
                          <div class="row px-2">
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Department" class="w-full md: border-color" />
                            </div>
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Department" class="w-full md:" />
                            </div>
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Designation" class="w-full md:" />
                            </div>
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Location" class="w-full md:" />
                            </div>
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name"  placeholder="State" class="w-full md:" />
                            </div>
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Branch" class="w-full md:" />

                            </div>
                            <div class="col">
                              <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Legal Entity" class="w-full md:" />
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

                <div class="col">
                  <h1 class="fs-3 my-3">Percentage of Salary Advance</h1>
                  <p class="my-2 fs-5" >Please select the percentage of the salary advance that employees can avail.</p>

                  <div class="card border-L rounded-top" >
                    <div class="card-body">
                      <div class="row justify-content-start align-items-center">
                        <div class="col-2">

                            <div class="flex flex-wrap gap-3">
                                <div class="flex justify-content-center align-items-center">
                                    <RadioButton v-model="ingredient" inputId="ingredient1" name="pizza" value="Cheese" />
                                    <label for="ingredient1" class="ml-2 fs-5">100%  Of Net salary</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-2 ">
                            <div class="flex align-items-center">
                                    <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom" />
                                    <label for="ingredient2" class="ml-2 fs-5">50% Of Net salary</label>
                            </div>
                        </div>
                        <div class="col-1 ">
                                <div class="flex align-items-center">
                                    <RadioButton v-model="ingredient" inputId="ingredient3" name="pizza" value="Pepper" />
                                    <label for="ingredient3" class="ml-2 fs-5">Custom</label>
                                </div>
                        </div>
                        <div class="col-3 ">
                            <div class="flex align-items-center">
                              <InputText type="text" v-model="value" style="max-width: 100px;" />
                              <label for="ingredient4" class="ml-2 fs-5">% Of Net salary</label>
                            </div>
                        </div>

                        <!--  -->
                      </div>
                    </div>
                  </div>

                  <h1 class="fs-3 my-3 " style="margin-top: 30px !important;">Deduction Method</h1>
                  <p class="my-2 fs-5">Please choose the method of deduction.</p>
                  <div class="card border-L" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7  d-flex justify-content-start align-items-center">
                                <input type="radio" name="Dedution_method" checked>
                                <label for="" class="mx-3 fs-5" style="line-height: 25px;">Deduct the amount in the upcoming payroll.</label>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7  d-flex justify-content-start align-items-center">
                                <input type="radio" name="Dedution_method" checked >
                                <label for="" class="mx-3 fs-5" >The deduction can be made over a period of   <InputText type="text" class="mx-3" v-model="value" style="max-width: 100px;" />  months.</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="fs-5">(Note: Within the declared period of time, employees can choose the month in which the amount will be deducted.)</p>
                            </div>
                        </div>

                    </div>
                  </div>

                  <h1 class="fs-3 my-3 " style="margin-top: 30px !important;">Approval Setting</h1>
                  <p class="my-2 fs-5">Please choose the approval flow for salary advance.</p>

                  <div class="card border-L" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7  d-flex justify-content-start align-items-center">
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
                        <div class="row my-3">
                            <div class="col-7  d-flex justify-content-start align-items-center">
                                <input type="radio" name="Dedution_method" checked >
                                <label for="" class="mx-3 fs-5" style="line-height: 25px;">Employee Request
                                      <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                      HR
                                      <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                      Final Admin
                                </label>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7  d-flex justify-content-start align-items-center">
                                <input type="radio" name="Dedution_method" checked >
                                <label for="" class="mx-3 fs-5" style="line-height: 25px;">Employee Request
                                      <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                      HR
                                </label>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7  d-flex justify-content-start align-items-center">
                                <input type="radio" name="Dedution_method" checked >
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



        </div>
    </div>
</template>
<script setup>

import { ref ,reactive } from 'vue';

const value = ref();
const options = ref(['Off', 'On']);

const activetab = ref(1)
const activetab1 = ref(1)

const ingredient = ref('');


</script>
<style>
:root{
    --orange:#FF4D00;
    --white:#fff;
    --navy: #002f56 ;
}

.orange_btn{
     background-color: var(--orange);
     padding: 7px 30px ;
     border-radius: 4px 0 0 4px;
     color: var(--white);
}
.Enable_btn{
    border: 1px solid var(--navy); padding: 7px 30px ; border-radius: 0 4px 4px 0;

}
.cancel_btn{
    border: 1px solid var(--navy); padding: 7px 30px ; border-radius: 4px 0 0 4px;

}
.border-L{

    border-left: 3px solid var(--navy);
}
.border-color{
    color:#003154 ;
    border: 2px solid #003154;
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

</style>

