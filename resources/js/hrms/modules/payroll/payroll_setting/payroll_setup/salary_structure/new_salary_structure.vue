<template>
    <div class="w-full">
        <div class="flex pt-4 mx-6">
                    <p>Payroll and attendance end date settings</p>
                    <div>icon</div>
        </div>
        <div class="flex gap-8">
            <div class="">
               
                <div class="flex gap-6 mx-6">
                    <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                        <div class="my-1">
                            <h5 class="my-2 text-lg font-semibold">Structure Name</h5>
                            <div class="flex gap-8 justify-evenly">
                                <div class="w-6">
                                    <InputText class="w-full" />
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <h5 class="my-2 text-lg font-semibold">
                                Description
                            </h5>
                            <div class="flex gap-8 justify-evenly">
                                <div class="w-6">
                                    <InputText class="w-full" />
                                </div>
                            </div>
                        </div>
                  
                      
                    </div>
                </div>
                <div>
                    <div class="flex mx-6 my-4">
                        <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                            <div class="my-4">
                                <h5 class="my-2 text-lg font-semibold">
                                    PF & ESI Configuration
                                </h5>
                                <div>
                                    <div class="flex gap-8 justify-evenly">
                                     <div>
                                        <input type="checkbox" name="" id="">
                                     </div>
                                     <div>
                                        <p></p>
                                     </div>
                                    </div>
                                    <div class="flex gap-8 justify-evenly">
                                     <div>
                                        <input type="checkbox" name="" id="">
                                     </div>
                                     <div>
                                        <p></p>
                                     </div>
                                    </div>
                                    <div class="flex gap-8 justify-evenly">
                                     <div>
                                        <input type="checkbox" name="" id="">
                                     </div>
                                     <div>
                                        <p></p>
                                     </div>
                                    </div>
                                    <div class="flex gap-8 justify-evenly">
                                     <div>
                                        <input type="checkbox" name="" id="">
                                     </div>
                                     <div>
                                        <p></p>
                                     </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>


                 
                </div>
            
            </div>
            <div>
                <div class="w-16 p-4 my-4 ">
                        <div class="flex gap-10">
                            <strong class="w-10">Salary Components</strong>
                            <div>
                                <input type="button" value="Add Components">
                            </div>
                        </div>
                        <div class="my-6 w-96">
                            <DataTable :value="products">
                                <Column field="product" header="Code"></Column>
                                <Column field="lastYearSale" header="Name"></Column>
                                <Column field="thisYearSale" header="Category"></Column>
                            </DataTable>
                        </div>
                    </div>
            </div>
        </div>
   
   <div class="flex">
    <div class="w-7">1</div>
    <div class="">2</div>
   </div>





    </div>
</template>
  
<script setup>
import { ref, onMounted } from "vue";

const products = ref([
    {
        product: "Bamboo Watch",
        lastYearSale: 51,
        thisYearSale: 40,
        lastYearProfit: 54406,
        thisYearProfit: 43342,
    },
    {
        product: "Black Watch",
        lastYearSale: 83,
        thisYearSale: 9,
        lastYearProfit: 423132,
        thisYearProfit: 312122,
    },
    {
        product: "Blue Band",
        lastYearSale: 38,
        thisYearSale: 5,
        lastYearProfit: 12321,
        thisYearProfit: 8500,
    },
]);
</script>
  