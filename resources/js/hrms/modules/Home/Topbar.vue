<template>
    <div class=" bg-white h-[60px]">
        <div class="grid items-center justify-between grid-cols-12 ">
            <!-- Organization List  -->
            <div class="relative col-span-4 px-2 py-2 mx-2 border-1 border-x-gray-300">
                <button class="text-black rounded focus:outline-none">
                    <p class="text-left text-gray-600 text-md">Your organization</p>
                    <div class="flex justify-between  items-center gap-2 py-0.5"
                        v-if="currentlySelectedClient ? true : false">
                        <img :src="currentlySelectedClient.client_logo" alt="" class="w-12 h-6">
                        <p class="px-2 text-sm font-semibold whitespace-nowrap"
                            v-if="currentlySelectedClient ? currentlySelectedClient.client_fullname.length <= 20 : ''"
                            @mouseover="useDashboard.canShowClients = !useDashboard.canShowClients">{{
                                currentlySelectedClient ? currentlySelectedClient.client_fullname : '' }}</p>
                        <p class="font-semibold text-[12px] font-['Poppins']  text-center text-black my-auto"
                            v-tooltip="currentlySelectedClient.client_fullname" v-else
                            @mouseover="useDashboard.canShowClients = !useDashboard.canShowClients"
                            @mouseleave="useDashboard.canShowClients = false"> {{
                                currentlySelectedClient.client_fullname ? currentlySelectedClient.client_fullname.substring(0,
                                    20) + '..'+ '    ' + currentlySelectedClient.abs_client_code : '' }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 font-semibold text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                    </div>
                </button>

                <transition enter-active-class="transition duration-200 ease-out transform"
                    @mouseleave="useDashboard.canShowClients = false" @mouseenter="useDashboard.canShowClients = true"
                    v-if="service.current_user_role == 1 || service.current_user_role == 2 || service.current_user_role == 3 || service.current_user_role == 4"
                    enter-class="translate-y-2 opacity-0" enter-to-class="translate-y-0 opacity-100"
                    leave-active-class="transition duration-100 ease-in transform" leave-class="translate-y-0 opacity-100"
                    leave-to-class="translate-y-2 opacity-0">
                    <!-- <transition enter-active-class="transition duration-200 ease-out transform"
                    v-if="service.current_user_role == 2 || service.current_user_role == 4"
                    enter-class="translate-y-2 opacity-0" enter-to-class="translate-y-0 opacity-100"
                    leave-active-class="transition duration-100 ease-in transform" leave-class="translate-y-0 opacity-100"
                    leave-to-class="translate-y-2 opacity-0"   @mouseleave ="useDashboard.canShowClients = false "> -->
                    <div v-if="useDashboard.canShowClients"
                        class="absolute z-20 w-11/12 bg-white rounded shadow-lg top-5 left-2 mt-14">
                        <!-- Dropdown content goes here -->
                        <div class="transition transform cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"
                            v-for="client in clientList">
                            <div class="flex items-center justify-between p-2 hover:bg-gray-200"
                                @click="submitSelectedClient(client.id), useDashboard.canShowClients = false">
                                <div class="cursor-pointer flex mx-2 align-center justify-between rounded-lg p-0.5 ">
                                    <div class="flex items-center justify-between gap-4 p-1 mx-2 border rounded"
                                        style="height: 30px;width:30px">
                                        <img :src="client.client_logo" alt="" class=" mh-100 mw-100">
                                        <!-- <p class="text-sm font-semibold whitespace-nowrap ">{{ client.client_fullname }} ({{
                                            client.abs_client_code }})</p> -->
                                        <p  class="px-2 text-sm font-semibold whitespace-nowrap"
                                            v-if="client ?  client.client_fullname.length <= 40 : ''">{{
                                                client ? client.client_fullname : '' }} {{ client ? client.abs_client_code : '' }}</p>
                                        <p class="px-2 text-sm font-semibold whitespace-nowrap"
                                            v-tooltip="client.client_fullname" v-else> {{
                                                client ?  client.client_fullname ? client.client_fullname.substring(0,
                                                    40) + '..' : '' : '' }}</p>
                                    </div>
                                </div>
                                <div v-if="currentlySelectedClient ? currentlySelectedClient.id == client.id : ''">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 font-semibold text-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
            <div class="relative col-span-4">
                <input v-if="service.current_user_role == 1 || service.current_user_role == 2 || service.current_user_role == 3" type="text" name="" id="" class="border p-1.5 bg-gray-100  border-gray-300 rounded-lg w-full"
                    v-model="query" placeholder="Search....">

                <transition enter-active-class="transition duration-200 ease-out transform"
                    enter-class="translate-y-2 opacity-0" enter-to-class="translate-y-0 opacity-100"
                    leave-active-class="transition duration-100 ease-in transform" leave-class="translate-y-0 opacity-100"
                    leave-to-class="translate-y-2 opacity-0">
                    <div v-if="query"
                        class="absolute top-0 left-0 z-40 w-3/4 px-3 py-4 mt-16 overflow-x-scroll bg-white rounded shadow-lg">
                        <!-- Dropdown content goes here -->
                        <RouterLink class="w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none "
                            v-for="employee in globalSearch(query, orgList ? orgList : [])"
                            @click="query = null" :to="`/profile-page/${employee.user_id}`" >
                            <div class="flex">
                                <p class="text-sm font-bold text-gray-900">{{ employee.emp_name }} <span
                                        class="float-right text-xs font-bold text-gray-600">{{ employee.emp_code }}</span>
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600">{{ employee.emp_designation }}</p>
                            </div>
                        </RouterLink>
                    </div>
                </transition>
            </div>
            <div class="flex justify-end col-span-4">
                <button v-tooltip="'Settings'"
                    v-if="service.current_user_role == 1 || service.current_user_role == 2 || service.current_user_role == 3"
                    class="p-2 mx-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"
                    @click="useDashboard.canShowConfiguration = !useDashboard.canShowConfiguration">
                    <img src="./assests/icons/setting.svg" alt="" class="w-6 h-6">
                </button>
                <transition enter-active-class="transition duration-200 ease-out transform" v-if="activeSettings"
                    enter-class="translate-y-2 opacity-0" enter-to-class="translate-y-0 opacity-100"
                    leave-active-class="transition duration-100 ease-in transform" leave-class="translate-y-0 opacity-100"
                    leave-to-class="translate-y-2 opacity-0" @mouseleave="useDashboard.canShowConfiguration = false">
                    <div v-if="useDashboard.canShowConfiguration"
                        @click="useDashboard.canShowConfiguration = !useDashboard.canShowConfiguration"
                        class="absolute top-0 z-50 p-2 mt-16 bg-white rounded shadow-lg right-40 w-60 "
                        @mouseleave="useDashboard.canShowConfiguration = false">
                        <!-- Dropdown content goes here -->

                        <!-- <RouterLink  v-if= "findSelectedModuleIsEnabled(activeSettings,'MASTER CONFIG').sub_module_name.IS_ENABLED ===1 "
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Master config</RouterLink> -->

                        <RouterLink to="/Configuration/Client-onboarding"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'CLIENT ONBOARDING').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Client onboarding</RouterLink>
                        <!-- <RouterLink to="/Configuration/Client-onboarding"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'DOCUMENT TEMPLATES').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Document template</RouterLink> -->
                        <RouterLink to="/Configuration/Document-settings"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'DOCUMENT SETTINGS').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Document settings</RouterLink>
                        <!-- <RouterLink to="/Configuration/Client-onboarding"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'LEAVE SETTINGS').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Leave setting</RouterLink> -->
                        <RouterLink to="/Configuration/Attendance-settings"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'ATTENDANCE SETTINGS').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Attendance setting</RouterLink>
                        <!-- <RouterLink to="/Configuration/Mobile-settings"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'INVESTMENT SETTINGS').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Investment setting</RouterLink> -->
                        <RouterLink to="/Configuration/Mobile-settings"
                            v-if="findSelectedModuleIsEnabled(activeSettings, 'MOBILE APP SETTINGS').sub_module_name.IS_ENABLED === 1"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Mobile setting</RouterLink>
                        <RouterLink to="/Configuration/Module-settings"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Module setting</RouterLink>
                        <!--  <a href="showSAsettingsView"
                            class="block w-full p-2 text-black transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Loan and salary advance setting
                        </a> -->
                    </div>
                </transition>


                <button v-tooltip="'Notification'"
                    class="p-2 mx-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full animate-pulse hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none "
                    @click="visibleRight = true">
                    <img src="./assests/icons/notification.svg" alt="" class="w-6 h-6">
                </button>
                <button v-tooltip="'Log out'" @click="canShowLogout = true"
                    class="p-2 transition duration-700 ease-in-out transform bg-gray-100 rounded-full hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
                    <img src="./assests/icons/exit.svg" alt="" class="w-6 h-6">
                </button>
                <RouterLink :to="`/profile-page`">
                    <div class="relative mx-3">
                    <button
                        class="flex px-3 py-2 text-white transition duration-700 ease-in-out transform focus:outline-none hover:bg-gray-200 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">

                        <img  v-if="service.current_user_code != 'SA_ABS' && _profilePagesStore.profile_img" class=" forRounded w-[30px] h-[30px] rounded-full"
                        :src="`data:image/png;base64,${_profilePagesStore.profile}`" srcset="" alt="" id="output"
                     />

                    <!-- <h1
                        class="rounded-full bg-blue-50  text-black font-semibold p-1.5 text-sm">
                        {{ _profilePagesStore.employeeDetails.user_short_name }}
                    </h1> -->


                        <p v-else class="rounded-full bg-blue-50  text-black font-semibold p-1.5 text-sm">
                            {{ _profilePagesStore.employeeDetails.current_user_short_name }}</p>

                        <p class="px-2 mx-2 my-auto text-sm font-semibold text-black whitespace-nowrap"
                            v-if="service.current_user_name ? service.current_user_name.length <= 10 : ''">{{
                                service.current_user_name ?
                                service.current_user_name : '' }}</p>
                        <p class="font-semibold text-[12px] mx-2 whitespace-nowrap font-['Poppins']  text-center text-black my-auto"
                            v-else> {{
                                service.current_user_name ? service.current_user_name.substring(0, 10) + '..' : '' }}</p>

                    </button>
                    <!-- <transition enter-active-class="transition duration-200 ease-out transform"
                        enter-class="translate-y-2 opacity-0" enter-to-class="translate-y-0 opacity-100"
                        leave-active-class="transition duration-100 ease-in transform"
                        leave-class="translate-y-0 opacity-100" leave-to-class="translate-y-2 opacity-0"
                        @mouseenter="useDashboard.canShowCurrentEmployee = true" class="">
                        <div v-if="useDashboard.canShowCurrentEmployee"
                            class="absolute top-0 right-0 z-30 w-48 bg-white rounded shadow-lg mt-14"> -->
                            <!-- Dropdown content goes here -->
                       
                            <!-- <a @click="canShowLogout = true"
                                class="block w-full p-2 transition transform rounded-lg cursor-pointer hover:bg-gray-100 hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">Log
                                out</a> -->
                        <!-- </div>
                    </transition> -->
                </div>
                
                </RouterLink>
              
            </div>

        </div>
    </div>




    <Sidebar v-model:visible="visibleRight" position="right" class="w-full">
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">
                <img src="./assests/icons/notification.svg" alt="" class="w-6 h-6 animate-pulse">
                Notification
            </p>
        </template>
        <!-- notification_title -->
        <!-- notification_body -->
        <!-- redirect_to_module -->
        <div class="w-full p-2 px-2 my-2 rounded-lg" v-if="notificationSource ? notificationSource.length > 0 : false"
            v-for="(notification, index) in notificationSource" :class="`${getBackgroundColor(index)}`">
            <div class="flex justify-between">
                <div>
                    <p class="font-semibold orange-median fs-6">{{ notification.notification_title }}</p>
                </div>
                <div>
                    <button @click="readNotification(notification.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>
            </div>
            <p class="text-sm">{{ notification.notification_body }}</p>
            <!-- :class="`${getBackgroundColor(index)}`" -->
        </div>
        <div v-else class="w-full p-2 px-2 my-2 rounded-lg bg-red-50">
            <p>No notifications to display</p>
        </div>
    </Sidebar>

    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-if="canShowLogout">
        <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div
                    class="absolute z-50 p-8 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-2xl top-1/2 left-1/2">
                    <h2 class="text-lg font-bold">Are you sure you want to do that?</h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Do you really wish to log out? Any unsaved modifications will not be retained.
                    </p>

                    <div class="flex justify-center gap-2 mt-4">
                        <button @click="logout" type="button"
                            class="px-4 py-2 text-sm font-medium text-green-600 rounded bg-green-50">
                            Yes, I'm sure
                        </button>

                        <button @click="canShowLogout = false" type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-600 rounded bg-gray-50">
                            No, go back
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-if="canSwitchLegalEntity">
        <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div
                    class="absolute z-50 p-8 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-2xl top-1/2 left-1/2">
                    <h2 class="text-lg font-bold">Are you sure you want to do that?</h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Do you really wish to log out? Any unsaved modifications will not be retained.
                    </p>

                    <div class="flex justify-center gap-2 mt-4">
                        <button @click="logout" type="button"
                            class="px-4 py-2 text-sm font-medium text-green-600 rounded bg-green-50">
                            Yes, I'm sure
                        </button>

                        <button @click="canShowLogout = false" type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-600 rounded bg-gray-50">
                            No, go back
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-if="canSwitchLegalEntity">
        <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div
                    class="absolute z-50 p-8 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-2xl top-1/2 left-1/2">
                    <h2 class="text-lg font-bold">Are you sure you want to do that?</h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Do you really wish to switch the client ?Any unsaved modifications will not be retained.
                    </p>

                    <div class="flex justify-center gap-2 mt-4">
                        <button @click="submitSelectedClient()" type="button"
                            class="px-4 py-2 text-sm font-medium text-green-600 rounded bg-green-50">
                            Yes, I'm sure
                        </button>

                        <button @click="canShowLogout = false" type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-600 rounded bg-gray-50">
                            No, go back
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>


<script setup>

import axios from 'axios';
import { onMounted, onUpdated, ref } from 'vue';
import { useMainDashboardStore } from '../dashboard/stores/dashboard_service'
import { Service } from '../Service/Service';
import { profilePagesStore } from "../profile_pages/stores/ProfilePagesStore";
import { useRouter, useRoute } from "vue-router";


const useDashboard = useMainDashboardStore()
let _profilePagesStore = profilePagesStore();
const service = Service();



const visibleRight = ref(false)
const query = ref('');
const orgList = ref();
const clientList = ref()
const canShowLoading = ref(false)
const canShowLogout = ref(false)
const canSwitchLegalEntity = ref(false)
const router = useRouter();
const route = useRoute();


const Modules = ref([
    {
        id: 1, label: 'Attendance',
        to: 'attendance-timesheet'
    }
])


const currentlySelectedClient = ref()


 function getClientList() {
axios.get('/clients-fetchAll').then(res => {
clientList.value = res.data;
}).finally(() => {
});
}

function getSessionClient() {
axios.get(` ${window.location.origin}/session-sessionselectedclient`).then(res => {
currentlySelectedClient.value = res.data;
});


}

const submitSelectedClient = (client) => {
    useDashboard.canShowLoading = true
    let url = '/session-update-globalClient'
    console.log({ "client_id": client });
    setTimeout(() => {
        axios.post(url, { "client_id": client }).finally(() => {
            getSessionClient()
            getOrgList()
        }).finally(() => {
            useDashboard.canShowLoading = false;
            window.location.reload();

        })
    }, 500);
}


function globalSearch(keyword, list) {
    // Use the filter method to find items whose name contains the keyword (case-insensitive)
    const searchResults = list.filter((item) =>
        item.emp_name.toLowerCase().includes(keyword.toLowerCase()) ||
        item.emp_code.toLowerCase().includes(keyword.toLowerCase())
    );
    return searchResults;
}

const combinedArray = ref()


const getOrgList = () => {
    axios.get('/vmt-activeemployees-fetchall').then(res => {
        orgList.value = res.data
    })

}


const notificationSource = ref()

const getNotifications = () => {
    axios.post('/getNotifications',{
        user_code:service.current_user_code
    }).then(res => {
        notificationSource.value = res.data.data
    })
}


const readNotification = (notification_id) => {
    axios.post('/readNotification', {
        record_id: notification_id
    }).finally(() => {
        getNotifications()
    })
}


function updateMasterConfigClientCode(client) {
    axios.post('/session-update-globalClient', {
        client_id: client
    });
}

const activeSettings = ref()
function getActiveSettings() {
    axios.get('/getClient_AllModulePermissionDetails', {
    }).then((res) => {
        activeSettings.value = res.data.data
    });

}



onMounted(async () => {
    getOrgList()
    getClientList()
    getSessionClient();
    setTimeout(() => {
        canShowLoading.value = true
    }, 2000);
    getNotifications()
    getActiveSettings();

    await service.current_user_id
    _profilePagesStore.user_code = service.current_user_id
    console.log(_profilePagesStore.user_code);
    setTimeout(() => {
     _profilePagesStore.fetchEmployeeDetails()
    }, 3000);


    // console.log("TopBar", _profilePagesStore.profile);

});


onUpdated(() => {
    // _profilePagesStore.getProfilePhoto();
})


// Your Vue component

async function logout() {
    try {
        router.replace('/')
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        await axios.post('/logout', null, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        }).finally(() => {
            window.location.reload()
        });
    } catch (error) {
        console.error('Logout error:', error);
    }
}

async function openProfilePage(uid) {
    router.replace(`/profile-page/${uid}`)
}

const filterNotificationLength = (value) => {
    return value.length
}

const colors = [
    'bg-orange-50',
    'bg-emerald-50',
    'bg-yellow-50',
    'bg-rose-50',
    'bg-cyan-50',
    'bg-amber-50',
    'bg-red-50',
    'bg-blue-50',
    'bg-pink-50',
    'bg-green-50',
    'bg-fuchsia-50',
];

const getBackgroundColor = (index) => {
    console.log(index);
    return colors[index % colors.length];
};


function findSelectedModuleIsEnabled(array, idToFind) {

    return array.find(obj => obj.module_name === idToFind);
}

</script>


<style>
.p-sidebar-right .p-sidebar
{
    width: 28rem;
    height: 100%;
}
</style>

