<template>
    <div class=" bg-white h-[60px]" v-if="canShowLoading">
        <div class=" grid grid-cols-4 items-center">
            <!-- Organization List  -->
            <div class="relative border-2 border-x-gray-300 py-2 mx-2 px-2" @click="isOpens = !isOpens">
                <button class=" text-black rounded  focus:outline-none">
                    <p class="text-md text-gray-600 text-left">Your organization</p>
                    <div class="flex justify-between  items-center gap-2 py-0.5" v-if="currentlySelectedClient">
                        <img :src="currentlySelectedClient.client_logo" alt="" class="h-6 w-12">
                        <p class="font-semibold  whitespace-nowrap text-sm">{{ currentlySelectedClient.client_fullname }}
                            ({{ currentlySelectedClient.abs_client_code }})
                        </p>
                    </div>
                </button>

                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="isOpens" class="absolute top-5 left-2 mt-12  w-full bg-white shadow-lg rounded z-20">
                        <!-- Dropdown content goes here -->
                        <div class="" v-for="client in clientList">
                            <div class="justify-between flex p-2 hover:bg-gray-200    items-center">
                                <div class="cursor-pointer flex mx-2 align-center justify-between rounded-lg p-0.5 ">
                                    <div class="mx-2 p-1 flex items-center justify-between rounded border gap-4"
                                        style="height: 40px;width:40px">
                                        <img :src="client.client_logo" alt="" class=" mh-100 mw-100">
                                        <p class="font-medium whitespace-nowrap text-xs">{{ client.client_fullname }} ({{
                                            client.abs_client_code }})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
            <div>

            </div>
            <div class="relative ">
                <input type="text" name="" id="" class="border-1 p-2 border-gray-700 rounded-lg" v-model="query"
                    placeholder="Search....">
                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="query"
                        class="z-40 absolute top-0 left-0 mt-16 w-full  bg-white shadow-lg rounded px-3 py-4  overflow-x-scroll">
                        <!-- Dropdown content goes here -->
                        <div class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 "
                            v-for="employee in globalSearch(query, orgList)">
                            <div>
                                <p class="text-gray-900 font-bold text-sm">{{ employee.name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600">{{ employee.designation }}</p>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
            <div class="flex justify-evenly ">
                <button class="rounded-lg hover:bg-gray-400">
                    <img src="./assests/icons/setting.svg" alt="" class="h-6 w-6">
                </button>
                <button class="mx-6  rounded-lg hover:bg-gray-400">
                    <img src="./assests/icons/notification.svg" alt="" class="h-6 w-6">
                </button>
                <button class=" rounded-lg hover:bg-gray-400">
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
                        <div v-if="isOpen" class="absolute top-0 right-0 mt-14 w-48 bg-white shadow-lg rounded z-30">
                            <!-- Dropdown content goes here -->
                             <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 "><a href="pages-profile-new">View profile</a></p>
                             <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 "><a href="">Log out</a></p>
                        </div>
                    </transition>
                </div>
            </div>

        </div>
    </div>
</template>


<script setup>

import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useMainDashboardStore } from '../dashboard/stores/dashboard_service'


const useDashboard = useMainDashboardStore()

const isOpen = ref(false);
const isOpens = ref(false);
const query = ref('');
const orgList = ref();
const clientList = ref()
const canShowLoading = ref(false)

const currentlySelectedClient = ref()


const getClientList = () => {
    axios.get('/clients-fetchAll').then(res => {
        clientList.value = res.data
        currentlySelectedClient.value = res.data[0]
    }).finally(() => {
        // canShowLoading.value = true
    })
}





function globalSearch(keyword, list) {
    // Use the filter method to find items whose name contains the keyword (case-insensitive)
    const searchResults = list.filter((item) =>
        item.name.toLowerCase().includes(keyword.toLowerCase())
    );
    return searchResults;
}



const getOrgList = () => {
    axios.get('/fetch-org-members').then(res => {
        orgList.value = Object.values(res.data)
    })

}

onMounted(() => {
    getOrgList()
    getClientList()
    setTimeout(() => {
        canShowLoading.value = true

    }, 2000);
})


</script>


