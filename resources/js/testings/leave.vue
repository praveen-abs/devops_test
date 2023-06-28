<script setup>
import { onMounted, ref } from 'vue'
// import { initFlowbite } from 'flowbite'
import EmployeeLeaveBalance from '../hrms/modules/leave_module/leave_details/EmployeeLeaveBalance.vue';


// initialize components based on data attribute selectors
onMounted(() => {
    // initFlowbite();

})

const open = ref(false)
const dimmer = ref(false)
const right = ref(false)

const collapse  = (currentAction) =>{

    if(currentAction == 1){
           open.value = true
        if(currentAction == 2){

        }else{

        }

    }
}

const toggle = () => {
    open.value = !open.value;
}
</script>
<template>
    <!-- component -->
    <!-- This is an example component -->
    <div class="flex flex-row h-full">
        <!-- Sidebar -->
        <nav :style="[!open ? 'width: 4.333% !important' : '']"
            class="bg-gray-900  justify-between flex flex-col transition-all duration-700  overflow-hidden items-center"
            ref="content" :class="[open ? 'w-2' : '']" @mouseover="open = true">
            <div class="mt-4">
                <button>
                    <span>
                        <svg class="fill-current h-8 w-8   text-gray-300 hover:text-green-500 " viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </button>
                <div class="my-3">
                    <ul>
                        <li class="my-2.5 relative">
                            <a class="flex  " role="button" id="dropdownDefaultButton"
                                data-dropdown-toggle="dropdown" aria-haspopup="true">
                                <span>
                                    <svg class="fill-current h-8 w-8 text-gray-300 hover:text-green-500 "
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <strong class="fill-current text-gray-300 my-auto"
                                    :class="[open ? '' : 'hidden']">Notifications</strong>
                            </a>
                            <div id="dropdown" class="z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44
                            dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a  role="button"
                                            class="block px-4 py-2 hover:bg-gray-100 rounded-lg mx-2 dark:hover:bg-gray-600 dark:hover:text-white target:bg-red-600">Dashboard</a>
                                    </li>
                                    <li>
                                        <a
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </nav>
        <div class=" text-gray-700 bg-gray-200 h-screen w-screen">
            <div class="card bg-white">
                <div class="card-body">
                    <h5 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-2xl lg:text-2xl"><span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Manoj</span>
                    </h5>
                </div>
            </div>
            <div class="px-16 py-4">
                <EmployeeLeaveBalance />
            </div>
        </div>
    </div>
</template>
<style scoped></style>>
