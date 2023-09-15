<template>
    <div>

    <div>
        <div class="bg-white p-2 flex  justify-between">
            <!-- v-model="filters['global'].value" -->
            <div>
                <InputText placeholder="Search"  v-model="filters['global'].value" class="border-color !h-10" style="height: 3em; font-['poppins'] !mb-[4px]" />

                <!-- <Dropdown optionLabel="name" placeholder="Select Category" class="w-[200px] mx-2" /> -->
            </div>
            <div class="flex items-center ">
                <!-- <div>
                    <button class="px-3 py-2 " :class="[Basic_details==1 ? 'bg-black  text-[white] rounded-l-md' : ' bg-[#E6E6E6] text-black rounded-l-md']" @click="Basic_details=1">Basic</button>
                    <button class="px-3 py-2 " :class="[Basic_details==2 ? 'bg-black text-[white] rounded-r-md' : ' bg-[#E6E6E6] text-black  rounded-r-md']" @click="Basic_details=2">Detail</button>
                </div> -->
                <button class=" bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]" @click="UseEmployeeMaster.btn_download = !UseEmployeeMaster.btn_download,UseEmployeeMaster.downloadEmployeeMaster() ">
                        <p class=" relative left-2 font-['poppins']">Download</p>
                        <div id="btn-download"  style=" position: absolute; right: 0;"
                            :class="[UseEmployeeMaster.btn_download == true ? toggleClass : ' ' ]">
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

        <div>

            <DataTable :value="UseEmployeeMaster.employeeMaterReportSource"
            paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" 
        paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
        currentPageReportTemplate="{first} to {last} of {totalRecords}" responsiveLayout="scroll">
            <Column v-for="col of UseEmployeeMaster.Employee_MaterReportDynamicHeaders" :key="col.title" :field="col.title" :header="col.title"
                style="white-space: nowrap;text-align: left; !important">
            </Column>
        </DataTable>

        </div>
    </div>
        
    </div>
</template>
<script setup>
import axios from 'axios';
import { ref, onMounted, reactive } from 'vue';
import { FilterMatchMode } from 'primevue/api';

import { EmployeeMasterStore } from "./employee_master_reportsStore" ;

const Basic_details =  ref(1);


const UseEmployeeMaster = EmployeeMasterStore();

onMounted(()=>{
    UseEmployeeMaster.getemployeeMater();
    // fetchFilterClientIds();
});

const filters = ref({
    'global': { value: null, matchMode: FilterMatchMode.CONTAINS },
});


const toggleClass = ref('downloaded');

</script>


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
      stroke: #000
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