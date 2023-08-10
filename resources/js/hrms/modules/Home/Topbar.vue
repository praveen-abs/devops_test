<template>
    <div class=" bg-white h-[60px]" v-if="canShowLoading" @mousedown="isConfigurationOpen = false">
        <div class=" grid grid-cols-4 items-center">
            <!-- Organization List  -->
            <div class="relative border-1 border-x-gray-300 py-2 mx-2 px-2" @click="isOpens = !isOpens">
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
                            <div class="justify-between flex p-2 hover:bg-gray-200  items-center">
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



                <input type="text" name="" id="" class="border p-2 border-gray-700 rounded-lg" v-model="query"
                    placeholder="Search....">

                <!-- <form class="mt-2">
                        <label for="search">Search</label>
                        <input id="search" type="search" pattern=".*\S.*" required>
                        <span class="caret"></span>
                    </form> -->

                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="query"
                        class="z-40 absolute top-0 left-0 mt-16 w-full  bg-white shadow-lg rounded px-3 py-4  overflow-x-scroll">
                        <!-- Dropdown content goes here -->
                        <div class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none "
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
                <button class="rounded-lg p-2 hover:bg-gray-200 " @click="isConfigurationOpen = true">
                    <img src="./assests/icons/setting.svg" alt="" class="h-6 w-6">
                </button>
                <transition enter-active-class="transition ease-out duration-200 transform"
                    enter-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-100 transform" leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-2">
                    <div v-if="isConfigurationOpen" @click="isConfigurationOpen = !isConfigurationOpen"
                        class="absolute top-0 right-40 mt-16 w-60 bg-white shadow-lg rounded z-40 p-2 ">
                        <!-- Dropdown content goes here -->
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Master config</p>
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Client onboarding</p>
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Document template</p>
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Leave setting</p>
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Attendance setting</p>
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Investment setting</p>
                        <p class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none ">Loan and salary advance setting
                        </p>
                    </div>
                </transition>


                <!-- <button class="mx-6  rounded-lg hover:bg-gray-400">
                    <img src="./assests/icons/notification.svg" alt="" class="h-6 w-6">
                </button> -->
                <button class=" rounded-lg p-2 hover:bg-gray-200">
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
                            <a class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 block"
                                href="pages-profile-new ">View profile</a>
                            <a @click="logout" class="p-2  rounded-lg cursor-pointer w-full hover:bg-gray-100 block" href="">Log
                                out</a>
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
const isConfigurationOpen = ref(false);
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



</script>


<style>
:root
{
    --bg: #e3e4e8;
    --fg: #17181c;
    --input: gray;
    --primary: #255ff4;
    --dur: 1s;
}

form,
input,
.caret
{
    margin: auto;
}

form
{
    position: relative;
    width: 100%;
    max-width: 17em;
}

input,
.caret
{
    display: block;
    transition: all calc(var(--dur) * 0.5) linear;
}

input
{
    background: transparent;
    border-radius: 50%;
    box-shadow: 0 0 0 0.2em inset;
    caret-color: var(--primary);
    width: 1.4em;
    height: 1.4em;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

input:focus,
input:valid
{
    background: var(--input);
    border-radius: 0.25em;
    box-shadow: none;
    padding: 0.75em 1em;
    transition-duration: calc(var(--dur) * 0.25);
    transition-delay: calc(var(--dur) * 0.25);
    width: 100%;
    height: 2.5em;
}

input:focus
{
    animation: showCaret var(--dur) steps(1);
    outline: transparent;
}

input:focus+.caret,
input:valid+.caret
{
    animation: handleToCaret var(--dur) linear;
    background: transparent;
    width: 1px;
    height: 1.5em;
    transform: translate(0, -1em) rotate(-180deg) translate(7.5em, -0.25em);
}

input::-webkit-search-decoration
{
    -webkit-appearance: none;
}

label
{
    color: #17181c;
    overflow: hidden;
    position: absolute;
    width: 0;
    height: 0;
}

.caret
{
    background: currentColor;
    border-radius: 0 0 0.125em 0.125em;
    margin-bottom: -0.9em;
    width: 0.20em;
    height: 0.8em;
    transform: translate(0, -1em) rotate(-45deg) translate(0, 0.875em);
    transform-origin: 50% 0;
}

/* Dark mode */
@media (prefers-color-scheme: dark)
{
    :root
    {
        --bg: #17181c;
        --fg: #e3e4e8;
        --input: rgba(189, 189, 189, 0.316);
        --primary: #5583f6;
    }
}

/* Animations */
@keyframes showCaret
{
    from
    {
        caret-color: transparent;
    }

    to
    {
        caret-color: var(--primary);
    }
}

@keyframes handleToCaret
{
    from
    {
        background: currentColor;
        width: 0.25em;
        height: 1em;
        transform: translate(0, -1em) rotate(-45deg) translate(0, 0.875em);
    }

    25%
    {
        background: currentColor;
        width: 0.25em;
        height: 1em;
        transform: translate(0, -1em) rotate(-180deg) translate(0, 0.875em);
    }

    50%,
    62.5%
    {
        background: var(--primary);
        width: 1px;
        height: 1.5em;
        transform: translate(0, -1em) rotate(-180deg) translate(7.5em, 2.5em);
    }

    75%,
    99%
    {
        background: var(--primary);
        width: 1px;
        height: 1.5em;
        transform: translate(0, -1em) rotate(-180deg) translate(7.5em, -0.25em);
    }

    87.5%
    {
        background: var(--primary);
        width: 1px;
        height: 1.5em;
        transform: translate(0, -1em) rotate(-180deg) translate(7.5em, 0.125em);
    }

    to
    {
        background: transparent;
        width: 1px;
        height: 1.5em;
        transform: translate(0, -1em) rotate(-180deg) translate(7.5em, -0.25em);
    }
}
</style>

