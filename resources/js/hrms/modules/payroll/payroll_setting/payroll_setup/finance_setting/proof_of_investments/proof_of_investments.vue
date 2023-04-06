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

                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="May" class="w-full md:w-6rem" :style="{lineHeight:'2px'}" />

                                </div>
                                <div class="justify-around items-center  ml-3">
                                    <Dropdown v-model="month" :options="cities" optionLabel="name" placeholder="25" class="w-full md:w-6rem" />
                                </div>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>


    </div>
</template>

<script>
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
