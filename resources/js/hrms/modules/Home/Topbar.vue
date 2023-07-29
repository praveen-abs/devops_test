<template>
    <div class="card bg-white p-3">
        <div class="card-body grid grid-cols-4">
            <!-- Organization List  -->
            <div class="relative" @click="isOpens = !isOpens">
                <button class="py-2 px-4 border-2 text-black rounded focus:outline-none">
                    Your organization
                </button>

                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="isOpens" class="absolute top-0 left-0 mt-12 w-48 bg-white shadow-lg rounded">
                        <!-- Dropdown content goes here -->
                        <ul>
                            <li class="py-2 px-4 cursor-pointer hover:bg-gray-100">Option 1</li>
                            <li class="py-2 px-4 cursor-pointer hover:bg-gray-100">Option 2</li>
                            <li class="py-2 px-4 cursor-pointer hover:bg-gray-100">Option 3</li>
                        </ul>
                    </div>
                </transition>
            </div>
            <div>

            </div>
            <div>
                <input type="text" name="" id="" class="border-1 border-gray-700 p-2 rounded-lg" placeholder="Search....">
            </div>
            <div class="flex justify-evenly">
                <button>
                    <img src="./assests/icons/setting.svg" alt="" class="h-6 w-6">
                </button>
                <button class="mx-6">
                    <img src="./assests/icons/notification.svg" alt="" class="h-6 w-6">
                </button>
                <button>
                    <img src="./assests/icons/exit.svg" alt="" class="h-6 w-6">
                </button>
                <div class="relative" @click="isOpen = !isOpen">
                    <button class="py-2 px-4 bg-blue-500 text-white rounded focus:outline-none">
                        SA
                    </button>

                    <transition enter-active-class="transition ease-out duration-200 transform"
                        enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition ease-in duration-100 transform"
                        leave-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-2">
                        <div v-if="isOpen" class="absolute top-0 right-0 mt-14 w-48 bg-white shadow-lg rounded">
                            <!-- Dropdown content goes here -->
                            <ul>
                                <li class="py-2 px-4 cursor-pointer hover:bg-gray-100">View profile</li>
                                <li class="py-2 px-4 cursor-pointer hover:bg-gray-100">Option 2</li>
                                <li class="py-2 px-4 cursor-pointer hover:bg-gray-100">Sign out</li>
                            </ul>
                        </div>
                    </transition>
                </div>
            </div>

        </div>
    </div>
</template>


<script setup>

import { ref } from 'vue';

const isOpen = ref(false);
const isOpens = ref(false);


</script>


