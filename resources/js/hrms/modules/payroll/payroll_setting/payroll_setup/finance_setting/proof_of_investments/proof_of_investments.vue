<template>
    <div>

        <div class="row card-headers w-full d-flex justify-content-between align-items-center  md:justify-center align-middle" :style="{}">
            <div class="col-md" style="line-height: 30px;">
                <!-- <h1 class="mb-5">HRA Calculation</h1> -->
            </div>
            <div class="col-md d-flex justify-content-end" >
                <button class="mb-5 " :style="{border:'1px solid #F36826', borderRadius:'4px',color:'#F36826' ,padding:'8px 18px' ,fontSize:'15.06px'}">Release Investments Declaration</button>
            </div>
        </div>


        <div class="w-full">
            <div class="card w-8 ">

                <div class="card-body " :style="{background:'#F7F7F7'}" >

                        <div class="row w-full d-flex  justify-around align-items-start md">
                            <div class="col-md col-8  cd">
                              <h1 :class="{ navy: isnavy , gary: isgray}">Do employees need to provide proof of their investments while submission?</h1>
                           </div>
                            <div class="col-sm  d-flex .align-items-start">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" :style="{color:'#002f56'}" v-model="blu" value="blu_clr" @click="togglenavy">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">yes</label>
                                </div>
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" :style="{color:'#002f56'}" value="gr_clr" @click="togglegray">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 w-full d-flex  justify-around align-items-start md ">
                            <div class="col-md col-9  cd">
                                <h1 class="w-full ">
                                    In the context of approving partial investment amounts, is it compulsory for reviewers to provide comments?
                                </h1>
                            </div>
                            <div class="col-sm  d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" :style="{color:'#002f56'}" v-model="blu" value="blu_clr" @click="togglenavy">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">yes</label>
                                </div>
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" :style="{color:'#002f56'}" value="gr_clr" @click="togglegray">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">No</label>
                                </div>
                            </div>


                        </div>

                        <div class="row mt-5 w-full d-flex  justify-around align-items-start md ">
                            <div class="col-md col-4  cd">
                                <h1 class="w-full ">
                                    Can employees switch their tax regime?
                                </h1>
                            </div>
                            <div class="col-sm  d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" :style="{color:'#002f56'}" v-model="blu" value="blu_clr" @click="togglenavy">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">yes</label>
                                </div>
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="INV" :style="{color:'#002f56'}" value="gr_clr" @click="togglegray">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">No</label>
                                </div>
                            </div>
                        </div>



                </div>

            <div>

                </div>
            </div>

            <div class="mt-5">
                <div class="card w-8 mt-5">
                    <h1 class="p-3" :style="{background:'#F7F7F7' ,border:'none'}"><strong>Schedule 1</strong></h1>
                    <div class="card-body" :style="{background:'#F7F7F7'}">

                        <div class="row d-flex  justify-around align-items-start">
                            <div class="col-md col-8  cd">
                              <h2  :style="{lineHeight:'25px'}">The deadline for employees to submit proof of their IT declaration  for the current financial year is</h2>
                            </div>
                            <div class="col-md d-flex">
                                <div class="justify-around items-center" >

                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-6rem" :style="{lineHeight:'7px'}" />

                                </div>
                                <div class="justify-around items-center  ml-3">
                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-6rem" :style="{lineHeight:'7px'}" />
                                </div>
                            </div>

                        </div>
                        <div class="row d-flex ">
                            <div class="col col-md   cd">
                              <h2  :style="{lineHeight:'25px'}"><strong>Note :</strong>  Upon approval of an employee's resignation, their proof of investments will be automatically opened to them so they can submit the necessary proofs.</h2>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

<!--  -->
            <div class="mt-5">
                <div class="card w-8 mt-5">
                    <div class="card-body" :style="{background:'#F7F7F7'}">

                        <!-- ",border:'1px solid black' -->

                        <div class="row d-flex  justify-around align-items-center ">

                            <div class="col-1 col-lg  w-0 mr-3">
                                <label for=""><input type="checkbox" name="" id=""></label>
                            </div>
                            <div class="col col-sm-10 d-flex justify-around align-items-center p-0 m-0" >
                            <strong :style="{  fontSize:'700' ,width:'80px'}"> Schedule 2  </strong>
                            <p :style="{color: '#959595'}">  (Optional) </p>
                            </div>
                        </div>
                        <div class="row d-flex ">
                            <div class="col-9 col-md cd">
                              <h2  :style="{lineHeight:'25px'}">The second deadline for employees to submit proof of their IT declaration  for the current financial year is</h2>
                            </div>

                            <div class="col-md d-flex">
                                <div class="justify-around items-center" >

                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-6rem" :style="{lineHeight:'7px'}" />

                                </div>
                                <div class="justify-around items-center  ml-3">
                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-6rem" :style="{lineHeight:'7px'}" />
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card w-8 mt-5">
                <div class="card-body" :style="{background:'#F7F7F7'}">
                    <div class="row d-flex  justify-around align-items-center ">

                        <div class="col-1 col-lg  w-0 mr-3">
                            <label for=""><input type="checkbox" name="" id=""></label>
                        </div>
                        <div class="col col-sm-10 d-flex justify-around align-items-center p-0 m-0" >
                        <strong :style="{  fontSize:'700' ,width:'80px'}"> Schedule 3  </strong>
                        <p :style="{color: '#959595'}">  (Optional) </p>
                        </div>
                    </div>

                    <div class="row d-flex ">
                                <div class="col-9 col-md cd">
                                <h2  :style="{lineHeight:'25px'}">The last deadline for employees to submit proof of their IT declaration  for the current financial year is</h2>
                                </div>

                                <div class="col-md d-flex">
                                    <div class="justify-around items-center" >

                                        <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-6rem" :style="{lineHeight:'7px'}" />

                                    </div>
                                    <div class="justify-around items-center  ml-3">
                                        <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-6rem" :style="{lineHeight:'7px'}" />
                                    </div>
                                </div>

                    </div>
                </div>
            </div>

       <div class="mt-5 mb-0">
        <h1>Notification to Employees</h1>

            <div class="card w-8 mt-2">

                <div class="card-body" :style="{background:'#F7F7F7'}">
                    <div class="row d-flex  justify-around align-items-center ">

                        <div class="col-1 col-lg  w-0 mr-3"  @click="dialog_Notifyvisible = true">
                            <label for=""><input type="checkbox"  ></label>
                        </div>
                        <div class="col col-sm-10 d-flex justify-around align-items-center " >
                            <p>Notify the employee when the Proof of investment is released.</p>
                        </div>
                    </div>

                    <template>
                        <div>
                            <Dialog v-model:visible="dialog_Notifyvisible" modal header="Header" :style="{ width: '55vw' }">
                                    <p>
                                        The attendance cut-off date marks the deadline for processing an employee's salary within a pay period. After this date, any absence by the employee will not affect their salary for that pay period. However, any loss of pay days before the cut-off date will be considered. If an employee incurs any loss of pay days after the cut-off date, the payment for those days will be recovered in the next pay period as part of "Recovery Arrears."
                                    </p>

                                    <p>Example :</p>

                                    <div class="row border">
                                        <div class="col-2 flex-column border pt-3 pl-4 col-md" style="width: 100px; ">
                                            <strong>Month</strong>
                                            <h1 class="mt-4">August</h1>
                                        </div>
                                        <div class="col-2 flex-column border pt-3  col-md"  style="width: 125px;  ">
                                            <strong class="pl-4">Pay period </strong>
                                            <h1 class="pt-4">Aug 1  <sup>st</sup> - Aug 31 <sup>st</sup></h1>
                                        </div>
                                        <div class="col-3 flex-column border pt-3 col-md " style="width: 170px;">
                                            <strong class="pl-1" >Attendance Cut-Off Date</strong>
                                            <h1 class="pt-4 pl-4">Jul 26  <sup>st</sup>Aug - 25 <sup>st</sup></h1>
                                        </div>
                                        <div class="col-2 col-md border pt-3" style="width: 150px; ">
                                            <strong class="pt-3 pl-3">Loss of Pay Days </strong>
                                            <h1 class="pl-4 pt-4">Aug 27  <sup>st</sup>& 28 <sup>st</sup></h1>
                                        </div>
                                        <div class="col-2 col-md border pt-3" style="width: 100px; ">
                                            <strong >Payable Days </strong>
                                            <h1 class="pl-4 pt-4">31 / 31</h1>
                                        </div>
                                        <div class="col-2 border col-md pt-3" style="width: 180px;  ">
                                            <strong class="pt-4">Impacted Month Will be </strong>
                                            <h1 class="pt-4" style="padding-left: 45px;">September</h1>
                                        </div>
                                    </div>

                                    <h1 class="mt-4"><strong>Note :</strong> The attendance cut-off date is not relevant to employees who receives daily remuneration</h1>

                            </Dialog>

                        </div>
                    </template>




                </div>
            </div>
        </div>

        </div>


    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';

const dialog_Notifyvisible = ref(false);


// const blu = ref();
// const isnavy = ref(false)

// const isgray = ref(false);



// function togglenavy() {
//   isnavy.value = true;
//   isgray.value =false;

// }
// function togglegray(){
//     isgray.value = true;
// }


// const month = ref();
// const cities = ref([
//     { name: 'New York', code: 'NY' },
//     { name: 'Rome', code: 'RM' },
//     { name: 'London', code: 'LDN' },
//     { name: 'Istanbul', code: 'IST' },
//     { name: 'Paris', code: 'PRS' }
// ]);




</script>


{
    <!--

<template>
    <div class="card flex justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="visible = true" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";

const visible = ref(false);
</script>
     -->
}
