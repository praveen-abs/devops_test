<template>
    <div>
        <div class="row card-headers w-full d-flex justify-content-between align-items-center  md:justify-center align-middle" :style="{}">
            <div class="col-md" style="line-height: 30px;">
                <h1 class="mb-5">HRA Calculation</h1>
            </div>
            <div class="col-md d-flex justify-content-end" >
                <button class="mb-5 " :style="{border:'1px solid #F36826', borderRadius:'4px',color:'#F36826' ,padding:'8px 18px' ,fontSize:'15.06px'}">Release Investments Declaration</button>
            </div>
        </div>

        <div class="w-full">
            <div class="card w-8 ">

                <div class="card-body " :style="{background:'#F7F7F7'}"
                >

                        <div class="row w-full d-flex  justify-around  md">
                            <div class="col-md col-7  cd">
                              <h1 :class="{ navy: isnavy ,gary: isgray}">Do you want to consider default rent paid amount for HRA calculation?</h1>
                           </div>
                            <div class="col-md d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglenavy">yes</label>
                                </div>
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglegray">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 w-full d-flex  justify-around md ">
                            <div class="col-md col-7  mt-3 cd">
                                <h1 class="w-full ">
                                    How would you like the House Rent Allowance (HRA) to be taken into account for tax exemption purposes?
                                </h1>
                            </div>
                            <div class="col-md mt-2">
                                <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder=" Month on Month or Annual" class="w-full h-2.2rem" :style="{background:'#FFFFFF;'}" />
                            </div>


                        </div>



                </div>

            <div>

                </div>
            </div>

            <div class="mt-5">
                <h1 class="mt-5" >Investments Estimation and Deduction on Bonuses</h1>

                <div class="card w-8 mt-5">
                    <div class="card-body" :style="{background:'#F7F7F7'}">
                        <div class="row w-full d-flex  justify-around  md">
                            <div class="col-9 col-lg cd">
                              <h1 :class="{ navy: isnavy ,gary: isgray}" >Do you include future payout dates for bonuses (unpaid bonuses) when projecting tax calculations?</h1>
                           </div>
                            <div class="col-sm  d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" v-model="blu" value="blu_clr" @click="togglenavy">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">yes</label>
                                </div>
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" id="" value="gr_clr" @click="togglegray">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">No</label>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>


        <div class="w-full">
            <div class="mt-5">
                <h1 class="mt-5" >Approval of Financial Changes</h1>

                <div class="card w-8 mt-5">
                    <div class="card-body" :style="{background:'#F7F7F7'}">
                        <div class="row border d-flex  justify-around align-items-center md">

                            <div class="col-1 col-lg cd">
                                <label for=""><input type="checkbox" name="" id=""></label>
                           </div>
                           <div class="col-11">
                            <h1> Grant authorization to employees for reviewing and approving changes to the following financial information</h1>
                           </div>
                        </div>


                            <div class="col-sm  d-flex ">
                                <ul class="ml-78 ul">
                                    <li class="cd">Salary Payment Mode: Bank transfer, Cheque, or Cash.</li>
                                    <li class="cd">Bank Information: Bank name, Account number, IFSC Code, or Name on account.</li>
                                    <li class="cd">PF & ESI Information: PF number, UAN, Joining date, Name on account, or ESI number.</li>
                                    <li class="cd">PAN Information: PAN number, Date of birth, Name on PAN card, or Father's Name.</li>
                                    <li class="cd">Aadhaar Information: Aadhaar Number, Aadhaar enrolment number, or Name on Aadhaar.</li>
                                </ul>
                            </div>



                    </div>

                </div>

            </div>

            <div class="mt-5">
                <h1 class="mt-5" >Opting In of New Tax Regime</h1>

                <div class="card w-8 mt-2">
                    <div class="card-body" :style="{background:'#F7F7F7'}">

                        <div class="row">
                            <div class="col-md col-7  cd">
                              <h1 >The deadline for opting in or out of the new tax regime (Section 115BAC) is based on the financial year's cutoff date is </h1>
                            </div>
                            <div class="col-md d-flex">
                                <div class="justify-around items-center  ">

                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-7rem" />

                                </div>
                                <div class="justify-around items-center  ml-4">
                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md col-10  cd">
                              <h1 >For New Joinee, opting in or out to be done within
                                <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" /> days from the date of joining. </h1>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-5">
                <h1 class="mt-5" >Investments Declaration</h1>

                <div class="card w-8 mt-2">
                    <div class="card-body" :style="{background:'#F7F7F7'}">

                        <div class="row">
                            <div class="col-md col-12  cd">
                              <h1 >Employees can update their Investments Declarations anytime during a month prior to month the
                                <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" />
                                    month and before the cut-off period in the financial year, as defined below. </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md d-flex mt-3">
                                <div class="justify-around items-center  ">

                                    <h1 :style="{lineHeight:'45px'}">Cutoff date for changing declaration in financial year is
                                    </h1>
                                </div>
                                <div class="col-md-2 d-flex ">
                                    <div class="justify-around items-center  ml-3">
                                        <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-7rem" />
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex ">
                                    <div class="justify-around items-center  ml-3">
                                        <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" />
                                    </div>
                                </div>

                            </div>

                        </div>



                        <div class="row mt-3">
                            <div class="col-md col-10  cd">
                              <h1 >For New Joinee, opting in or out to be done within
                                <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" /> days from the date of joining.</h1>
                            </div>
                        </div>

                        <div class="row w-full d-flex  justify-around  md">
                            <div class="col-md col-9  cd">
                                <h1>Is approval required for any modifications in IT declarations submitted before Feb 27?</h1>
                           </div>
                            <div class="col-md d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglenavy">yes</label>
                                </div>
                                <div class="justify-around items-center  ml-3">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglegray">No</label>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

            <div class="mt-5">
                <h1 class="mt-5" >Investments Declaration</h1>

                <div class="card w-8 mt-2">
                    <div class="card-body" :style="{background:'#F7F7F7'}">

                        <div class="row">
                            <div class="col-md col-12  cd">
                              <h1 >Employees can update their Investments Declarations anytime during a month prior to month the
                                <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" />
                                    month and before the cut-off period in the financial year, as defined below. </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md d-flex mt-3">
                                <div class="justify-around items-center  ">

                                    <h1 :style="{lineHeight:'45px'}">Cutoff date for changing declaration in financial year is
                                    </h1>
                                </div>
                                <div class="col-md-2 d-flex ">
                                    <div class="justify-around items-center  ml-3">
                                        <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-7rem" />
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex ">
                                    <div class="justify-around items-center  ml-3">
                                        <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" />
                                    </div>
                                </div>

                            </div>

                        </div>



                        <div class="row mt-3">
                            <div class="col-md col-10  cd">
                              <h1 >For New Joinee, opting in or out to be done within
                                <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" /> days from the date of joining.</h1>
                            </div>
                        </div>

                        <div class="row w-full d-flex  justify-around  md">
                            <div class="col-md col-9  cd">
                                <h1>Is approval required for any modifications in IT declarations submitted before Feb 27?</h1>
                           </div>

                            <div class="col-md d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglenavy">yes</label>
                                </div>
                                <div class="justify-around items-center  ml-3">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglegray">No</label>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>


            <div class="mt-5">
                <h1 class="mt-5" >Notification to Employees</h1>

                <div class="card w-8 mt-2">
                    <div class="card-body" :style="{background:'#F7F7F7'}">
                        <div class="row d-flex  justify-around align-items-center md">

                            <div class="col-1 col-lg">
                                <label for=""><input type="checkbox" name="" id=""></label>
                            </div>
                            <div class="col-8 mr-5">
                            <h1>Notify the employee when the investment Delaration is released. </h1>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md col-10  cd">
                              <h1 >For New Joinee, opting in or out to be done within
                                <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-7rem" /> days from the date of joining.</h1>
                            </div>
                        </div>

                        <div class="row w-full d-flex  justify-around  md">
                            <div class="col-md col-9  cd">
                                <h1>Is approval required for any modifications in IT declarations submitted before Feb 27?</h1>
                           </div>

                            <div class="col-md d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglenavy">yes</label>
                                </div>
                                <div class="justify-around items-center  ml-3">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}" @click="togglegray">No</label>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

        </div>






    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';


const blu = ref();
const isnavy = ref(false)

const isgray = ref(false);



function togglenavy() {
  isnavy.value = true;
  isgray.value =false;

}
function togglegray(){
    isgray.value = true;
}


const month = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);



</script>



<style>

.navy{
    color: #003054
;
}
.gary{
    color: #B1B1B1;
}
input:checked{
    color:#F36826;
    background: #F36826;

}
.ml-78{
    margin-left:6rem ;
    list-style:disc;
}
.Mon{
    height: 2.5rem;
    border-radius: 4px;
    border: 1px solid green;
    width: 8rem;
}

@media only screen and (max-width: 600px) {
    .cd{
        display: flex;
        justify-content: center;
        align-items:center;
        width: 130%;
        text-align:justify;
        margin: 0;
    }
    .ml-78{
        margin: none !important;
        position: relative;
        left: -65px;

    }

}
.ul >li{
    margin: 1rem 0 0 0 ;
}

</style>

{

<!-- <template>
    <div class="card flex justify-content-center">
        <div class="flex flex-wrap gap-3">
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient1" name="pizza" value="Cheese" />
                <label for="ingredient1" class="ml-2">Cheese</label>
            </div>
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom" />
                <label for="ingredient2" class="ml-2">Mushroom</label>
            </div>
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient3" name="pizza" value="Pepper" />
                <label for="ingredient3" class="ml-2">Pepper</label>
            </div>
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient4" name="pizza" value="Onion" />
                <label for="ingredient4" class="ml-2">Onion</label>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const ingredient = ref('');
</script>



<template>
    <div class="card flex justify-content-center">
        <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Select a City" class="w-full md:w-14rem" />
    </div>
</template>

<script setup>
import { ref } from "vue";

const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);
</script>


<template>
    <div class="card flex justify-content-center">
        <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Select a City" class="w-full md:w-14rem" />
    </div>
</template>

<script setup>
import { ref } from "vue";

const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);
</script>



-->
}
