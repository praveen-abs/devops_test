<template>
    <div class="px-5">
      <div class="row d-flex justify-content-start align-items-center ">
        <div class="d-flex">
          <div class="col-3 fs-3" style="position: relative; left: -8px;">
            <h1>Interest Free Loan Feature</h1>
          </div>

          <div class="col">
            <button class="orange_btn "
              :class="[activetab === 2 ? 'bg-white text-black border-1 border-black' : 'text-white']"
              @click="activetab = 1">Disabled</button>
            <button class="Enable_btn" :class="[activetab === 2 ? 'bg-green-700 text-white' : '']"
              @click="activetab = 2">Enable</button>

          </div>

          <div class="float-right" v-if="activetab == '2'">
            <button class="btn btn-border-primary">Cancel</button>
            <button class="mx-4 btn btn-primary">Save Changes</button>
          </div>
        </div>

        <div class="col" v-if="activetab == '1'">
          <div>
            <p class="fs-5">Please click the "Enable" button to activate the Interest Free Loan Feature for use within your
              organization.</p>
          </div>
        </div>
        <div v-else class="row">
          <div class="col-10">

            <p class="fs-5">Please click the "Disable" button to deactivate the Interest Free Loan Feature.</p>
            <h1 class="mt-10 fs-3">Eligible Employees and Amount</h1>
            <p class="my-2 fs-5">The employee's eligibility for the loan amount can be determined based on the number of years they have served in the organization.</p>
          </div>
          <div class=" col-12">
            <div class="rounded-lg shadow-sm card border-L ">
              <div class="card-body ">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fs-5">The employee must have served for a minimum of
                            <InputText type="text" v-model="value" style="max-width: 100px; " class="mx-2" />
                             years to avail the loan amount of
                             <InputText type="text" v-model="value" style="max-width: 100px;" class="mx-2" />
                              % of their CTC.</h1>
                    </div>
                    <div class="col-10">
                        <p class="fs-5 ">(Note: This will be calculated based on the employee's date of joining.)</p>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col ">
            <h1 class="my-3 fs-3 " style="margin-top: 30px !important;">Deduction Method</h1>
            <p class="my-2 fs-5">In the case of an interest-free loan, the EMI would only consist of repayment of the principal amount borrowed, and no interest would be charged.</p>
            <div class="card border-L">
              <div class="card-body">
                <div class="row">
                  <div class="col-7 d-flex justify-content-start align-items-center">
                    <input type="radio" name="Dedution_method" checked>
                    <label for="" class="mx-3 fs-5 clr-dark" style="line-height: 25px;">Begin deducting the EMI in the upcoming payroll.</label>
                  </div>
                </div>
                <div class="my-1 row">
                  <div class="col-7 d-flex justify-content-start align-items-center">
                    <input type="radio" name="Dedution_method" checked>
                    <label for="" class="mx-3 fs-5 clr-dark">Employee can select the month when they would like their EMI payments to begin
                    </label>
                  </div>
                </div>
                <div class="row ml-1">
                    <div class="col ml-4 ">
                        <h2 class="fs-5 clr-gray">The EMI deductions should begin within
                            <InputText type="text" v-model="value" style="max-width: 100px;" class="mx-2" />months from the date the loan is taken.</h2>
                    </div>
                </div>
                <div class="row ml-1">
                  <div class="col ml-4">
                    <p class="fs-5 clr-gray" style="line-height: 14px;">
                        (Note: During the specified period, employees have the option to select the month in which they would like the EMI deductions to begin.)</p>
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 clr-dark">Please specify the maximum duration or tenure for the employee to repay the loan amount
                              <InputText type="text" v-model="value" style="max-width: 100px;" class="mx-2" />
                              years
                        </p>
                    </div>
                </div>

              </div>
            </div>

            <h1 class="my-3 fs-3 " style="margin-top: 30px !important;">Approval Setting</h1>
            <p class="my-2 fs-5">Please choose the approval flow for Interest Free Loan Feature.</p>

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
  *{
    font-family: sans-serif;
  }
  :root {
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
  }
  .clr{
    color: var(--navy);
  }
  .clr-dark{
    color: #454545;

  }
  .clr-gray{
    color: #949494;
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
  }</style>

