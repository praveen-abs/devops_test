<template>
    <!-- {{combinedArray ? Object.values(combinedArray) : []}} -->
    <div class=" bg-white h-[60px]" v-if="canShowLoading"
        @mouseenter="useDashboard.canShowConfiguration = false, useDashboard.canShowClients = false">
        <div class=" grid grid-cols-12 justify-between items-center">
            <!-- Organization List  -->
            <div class="relative border-1 border-x-gray-300 py-2 mx-2 px-2 col-span-4"
                @click="useDashboard.canShowClients = !useDashboard.canShowClients">
                <button class=" text-black rounded  focus:outline-none">
                    <p class="text-md text-gray-600 text-left">Your organization</p>
                    <div class="flex justify-between  items-center gap-2 py-0.5" v-if="currentlySelectedClient">

                        <img :src="currentlySelectedClient.client_logo" alt="" class="h-6 w-12">
                        <p class="text-sm whitespace-nowrap  font-semibold px-2"
                            v-if="currentlySelectedClient.client_fullname.length <= 13">{{
                                currentlySelectedClient.client_fullname }}</p>
                        <p class="font-semibold text-[12px] font-['Poppins']  text-center text-black my-auto" v-tooltip="currentlySelectedClient.client_fullname "  v-else> {{
                            currentlySelectedClient.client_fullname ? currentlySelectedClient.client_fullname.substring(0,
                                13) + '..' : '' }}</p>
                    </div>
                </button>

                <transition enter-active-class="transition ease-out duration-200 transform"
                    v-if="service.current_user_role == 2 || service.current_user_role == 4"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="useDashboard.canShowClients"
                        class="absolute top-5 left-2 mt-14 w-11/12 bg-white shadow-lg rounded z-20">
                        <!-- Dropdown content goes here -->
                        <div class="cursor-pointer hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"
                            v-for="client in clientList">
                            <div class="justify-between flex p-2 hover:bg-gray-200  items-center"
                                @click="submitSelectedClient(client.id)">
                                <div class="cursor-pointer flex mx-2 align-center justify-between rounded-lg p-0.5 ">
                                    <div class="mx-2 p-1 flex items-center justify-between rounded border gap-4"
                                        style="height: 30px;width:30px">
                                        <img :src="client.client_logo" alt="" class=" mh-100 mw-100">
                                        <p class="font-semibold whitespace-nowrap text-sm ">{{ client.client_fullname }} ({{
                                            client.abs_client_code }})</p>
                                    </div>
                                </div>
                                <div v-if="currentlySelectedClient ? currentlySelectedClient.id == client.id : ''">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 text-green-600 font-semibold">
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
                <input type="text" name="" id="" class="border p-1.5 bg-gray-100  border-gray-300 rounded-lg w-full"
                    v-model="query" placeholder="Search....">

                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="query"
                        class="z-40 absolute top-0 left-0 mt-16 w-3/4  bg-white shadow-lg rounded px-3 py-4  overflow-x-scroll">
                        <!-- Dropdown content goes here -->
                        <div class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none "
                            v-for="employee in globalSearch(query, orgList ? orgList : [])"
                            @click="openProfilePage(employee.enc_user_id)">
                            <div class="flex">
                                <p class="text-gray-900 font-bold text-sm">{{ employee.emp_name }} <span
                                        class="text-gray-600 font-bold text-xs float-right">{{ employee.emp_code }}</span>
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600">{{ employee.emp_designation }}</p>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
            <div class="flex col-span-4 justify-end">
                <button v-tooltip="'Settings'" v-if="service.current_user_role == 2 || service.current_user_role == 4"
                    class="rounded-full bg-gray-100  p-2 hover:bg-gray-200 transition duration-700 ease-in-out  transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none  mx-2"
                    @click="useDashboard.canShowConfiguration = !useDashboard.canShowConfiguration">
                    <img src="./assests/icons/setting.svg" alt="" class="h-6 w-6">
                </button>
                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="useDashboard.canShowConfiguration"
                        @click="useDashboard.canShowConfiguration = !useDashboard.canShowConfiguration"
                        class="absolute top-0 right-40 mt-16 w-60 bg-white shadow-lg rounded z-40 p-2 ">
                        <!-- Dropdown content goes here -->
                        <a href="config-master"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Master config</a>
                        <a href="clientOnboarding"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Client onboarding</a>
                        <a href="document_preview"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Document template</a>
                        <a href="documents_settings"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Document settings</a>
                        <a href="attendance-leavesettings"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Leave setting</a>
                        <a href="attendance_settings"
                            class="p-2  block text-black rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Attendance setting</a>
                        <a href="investment_settings"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Investment setting</a>
                        <a href="showMobileSettingsPage"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Mobile setting</a>
                        <a href="showSAsettingsView"
                            class="p-2 block text-black  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                            Loan and salary advance setting
                        </a>
                    </div>
                </transition>


                <button v-tooltip="'Notification'"
                    class="mx-2 animate-pulse  bg-gray-100 rounded-full p-2  hover:bg-gray-200 transition duration-700 ease-in-out  transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none "
                    @click="visibleRight = true">
                    <img src="./assests/icons/notification.svg" alt="" class="h-6 w-6">
                </button>
                <button v-tooltip="'Exit'"
                    class=" bg-gray-100 rounded-full p-2 hover:bg-gray-200 transition  duration-700 ease-in-out transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">
                    <img src="./assests/icons/exit.svg" alt="" class="h-6 w-6">
                </button>
                <div class=" mx-3 relative"
                    @click="useDashboard.canShowCurrentEmployee = !useDashboard.canShowCurrentEmployee">
                    <button
                        class="py-2 px-3 flex text-white focus:outline-none hover:bg-gray-200 transition duration-700 ease-in-out  transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">

                        <p class="rounded-lg bg-blue-50  text-black font-semibold p-1.5 text-sm">{{
                            service.current_user_name ? service.current_user_name.substring(0, 2) : '' }}</p>

                        <p class="text-sm whitespace-nowrap text-black font-semibold px-2 my-auto mx-2"
                            v-if="service.current_user_name ? service.current_user_name.length <= 10 : ''">{{
                                service.current_user_name ?
                                service.current_user_name : '' }}</p>
                        <p class="font-semibold text-[12px] mx-2 whitespace-nowrap font-['Poppins']  text-center text-black my-auto"
                            v-else> {{
                                service.current_user_name ? service.current_user_name.substring(0, 10) + '..' : '' }}</p>

                    </button>
                    <transition enter-active-class="transition ease-out duration-200 transform"
                        enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition ease-in duration-100 transform"
                        leave-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-2">
                        <div v-if="useDashboard.canShowCurrentEmployee"
                            class="absolute top-0 right-0 mt-14 w-48 bg-white shadow-lg rounded z-30">
                            <!-- Dropdown content goes here -->
                            <a class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 block transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none"
                                href="pages-profile-new ">View profile</a>
                            <a @click="canShowLogout = true"
                                class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 block transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">Log
                                out</a>
                        </div>
                    </transition>
                </div>
            </div>

        </div>
    </div>




    <Sidebar v-model:visible="visibleRight" position="right" class="w-full">
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">
                <img src="./assests/icons/notification.svg" alt="" class="h-6 w-6 animate-pulse">
                Notification
            </p>
        </template>
        <!-- notification_title -->
        <!-- notification_body -->
        <!-- redirect_to_module -->
        <div class="w-full px-2 rounded-lg my-2 p-2" v-if="notificationSource ? notificationSource.length > 0 : false"
            v-for="(notification, index) in notificationSource" :class="`${getBackgroundColor(index)}`">
            <div class="flex justify-between">
                <div>
                    <p class="orange-median font-semibold fs-6">{{ notification.notification_title }}</p>
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
        <div v-else class="w-full px-2 rounded-lg my-2 p-2 bg-red-50">
            <p>No notifications to display</p>
        </div>
    </Sidebar>

    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-if="canShowLogout">
        <!--
          Background backdrop, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
              Modal panel, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->

                <div
                    class="rounded-lg bg-white p-8 shadow-2xl absolute z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <h2 class="text-lg font-bold">Are you sure you want to do that?</h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Do you really wish to log out? Any unsaved modifications will not be retained.
                    </p>

                    <div class="mt-4 flex gap-2 justify-center">
                        <button @click="logout" type="button"
                            class="rounded bg-green-50 px-4 py-2 text-sm font-medium text-green-600">
                            Yes, I'm sure
                        </button>

                        <button @click="canShowLogout = false" type="button"
                            class="rounded bg-gray-50 px-4 py-2 text-sm font-medium text-gray-600">
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
import { onMounted, ref } from 'vue';
import { useMainDashboardStore } from '../dashboard/stores/dashboard_service'
import { Service } from '../Service/Service';

const useDashboard = useMainDashboardStore()
const service = Service();



const visibleRight = ref(false)
const query = ref('');
const orgList = ref();
const clientList = ref()
const canShowLoading = ref(false)
const canShowLogout = ref(false)


const Modules = ref([
    {
        id: 1, label: 'Attendance',
        to: 'attendance-timesheet'
    }
])


const currentlySelectedClient = ref()


const getClientList = () => {
    axios.get('/clients-fetchAll').then(res => {
        clientList.value = res.data
    }).finally(() => {
    })
}

const getSessionClient = () => {
    axios.get('session-sessionselectedclient').then(res => {
        console.log(res.data);
        currentlySelectedClient.value = res.data
    })
}

const submitSelectedClient = (client) => {
    let url = '/session-update-globalClient'
    console.log({ "client_id": client });
    axios.post(url, { "client_id": client }).finally(() => {
        getSessionClient()
        getOrgList()
    })
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
    axios.get('/getNotifications').then(res => {
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


onMounted(() => {
    getOrgList()
    getClientList()
    getSessionClient()
    setTimeout(() => {
        canShowLoading.value = true
    }, 2000);
    getNotifications()

})


// Your Vue component

async function logout() {
    try {
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
    console.log(uid);
    window.location.href = "/pages-profile-new?uid=" + uid;
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



</script>


<style>
.p-sidebar-right .p-sidebar
{
    width: 28rem;
    height: 100%;
}
</style>

