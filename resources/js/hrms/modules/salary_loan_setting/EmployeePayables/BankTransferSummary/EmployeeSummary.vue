<template>
    <div>
        <div class=" w-full flex justify-between align-middle mt-[14px]">
            <div class=" d-flex align-items-center flex-wrap">
                <h1 class=" text-black text-[14px] tracking-wide" style="font-weight: 500 !important;">Total
                    :<span>188</span></h1>

                <MultiSelect v-model="selectedCities" :options="cities" optionLabel="name" placeholder="Business Unit"
                    :maxSelectedLabels="3" class="w-full md:w-14rem h-10 mx-[10px]" />


                <MultiSelect v-model="selectedCities" :options="cities" optionLabel="name" placeholder="Department"
                    :maxSelectedLabels="3" class="w-full md:w-14rem  h-10 mx-[10px]" />


                <MultiSelect v-model="selectedCities" :options="cities" optionLabel="name" placeholder="Location"
                    :maxSelectedLabels="3" class="w-full md:w-14rem  h-10 mx-[10px]" />
            </div>

            <!--  -->
            <div>
                <button class=" rounded-md px-4 py-1 border border-blue-600 text-blue-600 fs-6 h-10"
                    @click="btn_download = !btn_download">
                    <p class=" position-relative right-3">Download</p>
                    <div id="btn-download" style=" position: absolute; right: 0;"
                        :class="[btn_download == true ? toggleClass : 'toggleClass', 'toggleClass']">
                        <svg width="22px" height="16px" viewBox="0 0 22 16">
                            <path
                                d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15"
                                id="check"></path>
                            <polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline>
                            <path d="M8,1 L8,11" class="svg-out"></path>
                        </svg>
                    </div>
                </button>

            </div>


        </div>
    </div>
</template>

<script setup>
import { ref, reactive, computed } from "vue";

const selectedCities = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);

const toggleClass = ref('downloaded');

const btn_download = ref(false);

</script>

<style lang="sass" scoped>

.p-multiselect-label
    position: relative !important
    bottom:14px !important
.p-placeholder 
  position: relative !important
  bottom:14px !important
 


.p-multiselect-trigger-icon .pi .pi-chevron-down

#btn-download
  cursor: pointer
  display: block
  width: 48px
  height: 48px
  border-radius: 50%
  -webkit-tap-highlight-color: transparent
  //transform: scale(2)
  //centering
  position: absolute
  top: calc(50% - 24px)
  left: calc(85% - 24px)
  &:hover
    background: rgba(#223254,.03)
  svg
    margin: 16px 0 0 16px
    fill: none
    transform: translate3d(0,0,0)
    polyline,
    path
      stroke: #0077FF
      stroke-width: 2
      stroke-linecap: round
      stroke-linejoin: round
      transition: all .3s ease
      transition-delay: .3s
    path#check
      stroke-dasharray: 38
      stroke-dashoffset: 114
      transition: all .4s ease
  &.downloaded
    svg
      .svg-out
        opacity: 0
        animation: drop .3s linear
        transition-delay: .4s
      path#check
        stroke: #20CCA5
        stroke-dashoffset: 174
        transition-delay: .4s

@keyframes drop
  20%
    transform: (translate(0, -3px))
  80%
    transform: (translate(0, 2px))
  95%
    transform: (translate(0, 0))


</style>
