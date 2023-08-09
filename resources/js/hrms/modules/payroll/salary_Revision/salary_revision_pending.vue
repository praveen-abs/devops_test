<template>
    <div>
        <div class="">
            <div class=" flex justify-between items-center ">
                <div class="flex justify-start items-center flex-wrap">
                    <div class="mr-2">
                        <p class="text-[#001820]">Total : 188</p>
                    </div>
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Department" class=" max-[1000px]:!w-[180px] w-[200px] mx-2 h-10  my-1" />
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Frequency" class=" max-[1000px]:w-[180px] h-10   mx-3 my-1" />
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Increment on" class=" max-[1000px]:w-[180px] h-10   mx-3 my-1" />
                </div>
                <div class=" flex-row">
                    <button class=" bg-[#0873CD] py-2 px-3 rounded-md mx-2 text-white hover:bg-blue-700 my-1">Process</button>
                    <button class="bg-[#0873CD] py-2  px-3 rounded-md mx-2 text-white hover:bg-blue-700" >Cancel</button>
                </div>
                
            </div>
            <div class=" flex justify-between mt-4 ">
                <div>
                    <button class=" border-1 border-gray-400 px-3 py-2 rounded-lg w-[140px] text-[#001820] hover:bg-slate-200">+ Add Employee</button>
                    <button class="border-1 mx-2 border-gray-400  px-3 py-2 rounded-lg max-[1000px]:w-[180px] text-[#001820] hover:bg-slate-200">Import Employee List</button>
                </div>
                <div class=" flex justify-center items-center flex-wrap">
                    <span class="p-input-icon-left !w-[250px]  mx-5">
                        <i class="pi pi-search" />
                        <InputText placeholder="Search" v-model="filters['global'].value"
                            class="border-1 border-gray-400 !w-[300px] h-[h-10]" />
                    </span>
                    <button class=" rounded-md px-4 py-1 border-1 max-[1000px]:w-[180px] border-gray-400 text-[#001820] fs-6 h-10" @click="btn_download = !btn_download">
                        <div id="btn-download"  style="" class=""
                            :class="[btn_download == true ? toggleClass : 'toggleClass', 'toggleClass']">
                            <svg width="22px" height="16px" viewBox="0 0 22 16">
                                <path
                                    d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15"
                                    id="check"></path>
                                <polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline>
                                <path d="M8,1 L8,11" class="svg-out"></path>
                            </svg>
                        </div>
                        <!-- position-relative right-3 -->
                        <p class=" relative left-2  text-[#001820]">Download</p>
                    </button>
                </div>
            </div>
        </div>

        <!--  -->

        <div class="mt-4">
                <DataTable  paginator :rows="10" dataKey="id"   removableSort tableStyle="min-width:100%" class=" " :globalFilterFields="['name', 'country.name', 'representative.name', 'status']">

                    <Column field="code" header="Code" sortable style="width: 25%"></Column>
                    <Column field="name" header="Name" sortable style="width: 25%"></Column>
                    <Column field="category" header="Category" sortable style="width: 25%"></Column>
                    <Column field="quantity" header="Quantity" sortable style="width: 25%"></Column>
                </DataTable>
        </div>
    </div>
</template>

<script setup>
import {ref ,onMounted} from "vue";
import { FilterMatchMode } from 'primevue/api';

const toggleClass = ref('downloaded');

const btn_download = ref(false);



const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);


const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'country.name': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    representative: { value: null, matchMode: FilterMatchMode.IN },
    status: { value: null, matchMode: FilterMatchMode.EQUALS },
    verified: { value: null, matchMode: FilterMatchMode.EQUALS }
});

    

</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital@0;1&display=swap');
  *{
    font-family: 'Lobster', cursive;
    font-family: 'Poppins', sans-serif;
  }
 .p-placeholder{
    margin-top:-5px;
 }
.pi-chevron-down{
    rotate: 272deg;
}
.p-inputtext{
    margin-top: -5px;
    color: #223254;
    color: #0077FF;
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
  left: calc(14% - 24px)
  &:hover
    background: rgba(#001820,.03)
  svg
    margin: 16px 0 0 16px
    fill: none
    transform: translate3d(0,0,0)
    polyline,
    path
      stroke: #001820
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

