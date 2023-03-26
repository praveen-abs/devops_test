<template>
    <div class="card shadow profile-box card-top-border p-2">
        <div class="card-body justify-content-center align-items-center">
           <div class=" mx-2">
            <div class="my-3">
                <p class="text-2xl text-black">Tax Deductions FY 2022-2023</p>
            </div>
            <div class="my-2 border-red-100 p-1 text-black bg-red-100 rounded-lg">
                <div class="my-2 px-2">Kindly update your <span>PAN to</span> avoid 20$ TDS deduction (if applicable) </div>
            </div>
            <div class="my-4 border-1 bg-gray-100 rounded-lg">
                <p class="p-2 text-black">You have the option of either using a new regime(with no tax deducations), or using the same regime as FY 2019-20.To help you make an informed decision., we are displaying your tax liability in both these regimes,and you can choose the option that you prefer.For us to accurately calculated your tax liabilities , please ensure you full in all the information requested below,irrespective of the regime that you pick</p>
            </div>
            <div class="my-4 flex gap-6">
                <div class="w-6">
                <div class="text-xl ">Your current chosen tax regime is <span class="text-xl  text-black font-bold">Old Tax Regime</span> </div>

                    <p class="font-normal text-md">The confirmed old tax regime will be used in future payroll calculations
                    </p>
                    <div>
                  </div>
                </div>
                  <div>
                    <button  @click="switch_regime_dailo=true" type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Old Tax Regime</button>

                    </div>
                    <div>


                        <button  @click="switch_regime_dailog=true" type="button" class=" text-orange-400 font-bold hover:text-white border border-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-orange-400 dark:text-orange-400dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-orange-400">
                            Switch Regime
                        </button>

                        <!-- <button class="bg-orange-400">Switch Regime</button> -->

                    </div>



            </div>
            <div class="h-full p-3 bg-blue-50 my-4">
                <p class="text-blue-700">
                    Choosing old regime will give you an additional benefits of &#x20B9; 41,222.00 as compared to New Regime.Calculations are based on the latest
                </p>
            </div>
           </div>
        </div>


    </div>

    <div   class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="switch_regime_dailog" modal header="Header" :style="{ width: '50vw' }">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <template #footer>
            <Button label="No" icon="pi pi-times" @click="switch_regime_dailog = false" text />
            <Button label="Yes" icon="pi pi-check" @click="switch_regime_dailog = false" autofocus />
        </template>
    </Dialog>
</template>



<script setup>
import { Modal } from 'flowbite-vue'
import { ref } from 'vue'

const switch_regime_dailog =ref(false);
const switch_regime_dailo =ref(false);
</script>
