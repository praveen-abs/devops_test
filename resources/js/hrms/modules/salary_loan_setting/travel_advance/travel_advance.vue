<template>
    <div class="px-5">
      <div class="row d-flex justify-content-start align-items-center ">
        <div class="d-flex">
          <div class="col-3 fs-3" style="position: relative; left: -8px;">
            <h1>Travel Advance Feature</h1>
          </div>
          <div class="col">


            <button class="orange_btn "
              :class="[activetab === 2 ? 'bg-white text-black border-1 border-black' : 'text-white']"
              @click="activetab = 1">Disabled</button>
            <button class="Enable_btn" :class="[activetab === 2 ? 'bg-green-700 text-white' : '']"
              @click="activetab = 2">Enable</button>

          </div>

          <div class="float-right" v-if="activetab == '2'" >
            <button class="btn btn-border-primary">Cancel</button>
            <button class="mx-4 btn btn-primary">Save Changes</button>
          </div>
        </div>

        <div class="col" v-if="activetab == '1'" >
          <div>
            <p class="fs-5">Please click the "Enable" button to activate the Travel Advance Feature for use within your
              organization.</p>
          </div>
        </div>
        <div v-else class="row">
          <div class="col-10">

            <p class="fs-5">Please click the "Disable" button to deactivate the Travel Advance Feature.</p>
            <h1 class="mt-10 fs-3">Eligible Employees</h1>
            <p class="my-2 fs-5">Kindly choose the employees who are eligible for the Travel Advance Feature.</p>
          </div>
          <div class=" col-12">
            <div class="rounded-lg shadow-sm card">
              <div class="card-body " style="border-top:3px solid var(--navy) ;">
                <div class="row ">
                  <div class="col-10">
                    <h1 style="border-left:3px solid var(--orange); padding-left: 15px; font-size: 18px;">Employees</h1>
                  </div>
                  <div class="col-10 ">
                    <span class="p-input-icon-left">
                      <i class="pi pi-search" />
                      <InputText placeholder="Search" class="h-15" />
                    </span>
                  </div>
                  <div class="col-12">
                    <div class="px-2 row">
                      <div class="col">
                        <Dropdown v-model="opt" editable :options="op" optionLabel="dep" optionValue="dep"
                          placeholder="Department" class="w-full text-red-500 md: border-color" />
                        {{ opt }}
                      </div>
                      <div class="col">
                        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name"
                          placeholder="Department" class="w-full md:" />
                      </div>
                      <div class="col">
                        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name"
                          placeholder="Designation" class="w-full md:" />
                      </div>
                      <div class="col">
                        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name"
                          placeholder="Location" class="w-full md:" />
                      </div>
                      <div class="col">
                        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="State"
                          class="w-full md:" />
                      </div>
                      <div class="col">
                        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Branch"
                          class="w-full md:" />

                      </div>
                      <div class="col">
                        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name"
                          placeholder="Legal Entity" class="w-full md:" />
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

          <div class="col ">
            <h1 class="my-3 fs-3">Travel Advance Limit</h1>
            <p class="my-2 fs-5">What is the maximum Limit for the travel allowance that can be availed.</p>

            <div class="shadow-sm card border-L rounded-top">
              <div class="card-body">
                <div class="row justify-content-start align-items-center">
                    <div class="col-6 fs-5">
                        Is there a maximium limit on the travel allowance that can be availed?
                    </div>
                  <div class="col-1">

                    <div class="flex flex-wrap gap-3">
                      <div class="flex justify-content-center align-items-center">
                        <RadioButton v-model="ingredient" inputId="ingredient1" name="pizza" value="Cheese" :class="[activetab1 === 2 ? ' orange' : '  ml-2 fs-5 ']"
              @click="activetab1 = 2 " />
                        <label for="ingredient1" class="ml-2 fs-5" >Yes</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-1 "  >
                    <div class="flex align-items-center">
                      <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom"  :class="[activetab1 === 1 ? 'orange' : '']"
              @click="activetab1 = 1 " />
                      <label for="ingredient2" class="ml-2 fs-5">No</label>
                    </div>
                  </div>
                  <div class="col-12" v-if="activetab1=='2'" >
                    <label for="" class="fs-5">Enter the maximum amount can be availed per month
                        <InputText type="text" class="mx-3" v-model="value" style="max-width: 100px;" />
                    </label>
                  </div>

                  <!--  -->
                </div>
              </div>
            </div>

            <h1 class="my-3 fs-3 " style="margin-top: 30px !important;">Deduction </h1>
            <p class="my-2 fs-5">Please choose the method of deduction.</p>
            <div class="card border-L">
              <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h1 class="fs-5">Is this advance can be decducted from claim</h1>
                    </div>
                    <div class="col-1">
                        <div class="flex align-items-center">
                            <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom" />
                            <label for="ingredient2" class="ml-2 fs-5">yes</label>
                        </div>

                    </div>

                    <div class="col-1">
                        <div class="flex align-items-center">
                            <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom" />
                            <label for="ingredient2" class="ml-2 fs-5">No</label>
                        </div>
                    </div>

                    <div class="col d-flex  align-items-center fs-5 txt_underline" ><h1 class="text-primary" >View Example</h1></div>

                </div>
              </div>
            </div>

            <h1 class="fs-3 mt-4 mb-4" >Claim Settings</h1>
            <div class="card border-L">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start align-items-center">
                            <h1 class="fs-5">is it for employess to submit bills or receipt to clam travel allowances?</h1>
                        </div>
                        <div class="col-1  d-flex justify-content-start align-items-center">
                            <input type="radio" name="" style="width:50px;" checked>
                            <p class="fs-5 mx-3">yes</p>
                        </div>
                        <div class="col-1 d-flex justify-content-start align-items-center">
                            <input type="radio" style="width:50px;" checked>
                            <p class="fs-5 mx-3">No</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 d-flex justify-content-start align-items-center">
                            <p class="fs-5"> The employees Sumbit the bills within <InputText type="text" class="mx-3" v-model="value" style="max-width: 100px;" /> months for the date of travel advance.</p>
                         </div>

                        <div class="col-12 d-flex justify-content-start align-items-center"><input type="checkbox" class="mr-4" style="width:20px; height: 20px;" name="" id="" >
                             <p class="fs-5"> If bills are by the employee within the above timeframe, the amount can be deducted from the employee's subsequent payroll.</p>
                        </div>

                    </div>

                </div>
            </div>

            <h1 class="my-3 fs-3 " style="margin-top: 30px !important;">Approval Setting</h1>
            <p class="my-2 fs-5">Please choose the approval flow for Travel Advance.</p>

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



      </div>
    </div>
  </template>
  <script setup>

  import { ref, reactive, onMounted } from 'vue';

  const value = ref();
  const options = ref(['Off', 'On']);

  const activetab = ref(1)
  const activetab1 = ref(1)

  const ingredient = ref('');

  const opt = ref()
  const op = ref([
    { id: 1, dep: "res" }
  ])

  onMounted(() => {
    opt.value = "Department"
  })


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

    border-left: 3px solid var(--navy);
  }

  .border-color {
    color: #003154;
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

  .p-dropdown-label.p-inputtext {
    color: var(--navy);
  }
  .txt_underline{
    text-decoration: underline #3B82F6;
  }
  </style>

