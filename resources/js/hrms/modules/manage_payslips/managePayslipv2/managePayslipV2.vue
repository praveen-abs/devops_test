<template>
    <div class="">
        <h1 class="text-[28px] font-['poppins'] text-[#000]">Payslips - Jun 2023</h1>
        <p class=" text-[14px] text-[#000]">Here you can release payslips
            for employees and download the payslips. Payslips can only be sent to
            active employees. Employees who are relieved will not receive Payslips.</p>

        <div class=" flex justify-between items-center my-4">

            <div class="flex justify-center items-center ">
                <p class=" text-[#000]"> Total : 188</p>
                <Dropdown optionLabel="name" placeholder="Business Unit" class="w-full md:w-10rem mx-2 h-10" />
                <Dropdown optionLabel="name" placeholder="Department" class="w-full md:w-14rem mx-2 h-10" />
                <Dropdown optionLabel="name" placeholder="Location" class="w-full md:w-14rem mx-2 h-10" />
            </div>
            <div class=" flex items-center ">
                <!-- v-model="filters['global'].value" -->
                <div class="flex justify-content-end ">
                    <span class="p-input-icon-left ">
                        <i class="pi pi-search" />
                        <InputText placeholder="Keyword Search" />
                    </span>
                </div>

                <button class=" p-2 mx-2 rounded-md w-[120px] "
                    :class="[!activetab == 0 ? 'bg-[#000] !text-[#ffff]' : '!text-[#000] !bg-[#E6E6E6]']"
                    @click="btn_download = !btn_download">
                    <p class=" relative left-2 font-['poppins']"
                        :class="[!activetab == 0 ? 'bg-[#000] !text-[#ffff]' : '!text-[#000] !bg-[#E6E6E6]']">Download</p>
                    <div id="btn-download" style=" position: absolute; right: 0;"
                        :class="[btn_download == true ? toggleClass : '']">
                        <svg width="22px" height="16px" viewBox="0 0 22 16"
                            :class="[!activetab == 0 ? '!stroke-[#ffff] ' : '!stroke-[#000]']">
                            <path
                                d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15"
                                id="check" :style="[!activetab === 0 ? 'stroke=blue' : '!bg-[#E6E6E6] !text-[#000] ']">
                            </path>
                            <polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline>
                            <path d="M8,1 L8,11" class="svg-out " stroke=""
                                :style="[activetab === 0 ? 'red' : 'fill: red']">
                            </path>
                        </svg>
                    </div>
                </button>




            </div>
        </div>

        <div class=" flex items-center justify-start my-4">
            <button class=" bg-[#0873CD] rounded-[4px]  p-2 px-4 mx-2 text-[#fff]">Release Payslips</button>
            <button class="bg-[#0873CD] rounded-[4px]  p-2 px-4 mx-2 text-[#fff]">Hold Back Payslips</button>
            <button class="bg-[#0873CD] rounded-[4px]  p-2 px-4 mx-2 text-[#fff]">Send Payslips by Email</button>
            <button class="bg-[#0873CD] rounded-[4px]  p-2 px-4 mx-2 text-[#fff]">Release Payslips</button>
        </div>


        <DataTable :value="products" stripedRows tableStyle="min-width: 50rem my-4">
            <Column field="code" header="Employee "></Column>
            <Column field="name" header="Business"></Column>
            <Column field="category" header="Department"></Column>
            <Column field="quantity" header="Location"></Column>
            <Column field="quantity" header="Month"></Column>
            <Column field="quantity" header="Payslip Released"></Column>
            <Column field="quantity" header="Email sent"></Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const activetab = ref(0);
const btn_download = ref(false);



</script>

<style >
.p-icon,
.p-dropdown-trigger-icon
{
    rotate: 270deg !important;
}

.p-placeholder
{
    margin-top: -2px !important;
}

.p-inputtext
{
    padding-left: 40px;
}
</style>



<style lang="sass" scoped>

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
  left: calc(15% - 24px)
  &:hover
    //  background: rgba(#223254,.03)
  svg
    margin: 16px 0 0 16px
    fill: none
    transform: translate3d(0,0,0)
    polyline,
    path
      // stroke: #000
      stroke-width: 1.5
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