<template>
    <nav class="bg-black  transition-all duration-700 overflow-x-scroll " ref="content"
        :class="[!open ? 'w-16 ' : 'w-56 px-3']">

        <button :class="{ 'bg-indigo-600': isActive, 'bg-gray-300': !isActive }" @click="toggleSwitch"
            class="relative inline-flex flex-shrink-0 h-6 w-12 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200">
            <span :class="{ 'translate-x-6': isActive, 'translate-x-0': !isActive }"
                class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
        </button>

        <template v-for="(menu, index) in menuItems" :key="index">
            <a v-if="open" role="button" @click="toggleMenu(index)" :class="{
                'bg-gray-400': isOpen(index),
            }" class="w-full h-10 flex justify-start items-center rounded-lg mb-2 text-white text-sm">
                <span>
                    <svg class="fill-current h-4 w-4 text-gray-300 hover:text-green-500 " viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <span class="fill-current text-gray-300 text-sm" :class="[open ? '' : 'hidden']">
                    {{ menu.label }}</span>
            </a>
            <button v-else @click="toggleMenu(index)" :class="{
                'bg-yellow-400 text-black': isOpen(index),
            }" class="px-2 py-2 mx-auto  flex justify-center items-center  rounded hover:bg-gray-700">
                <svg class="fill-current h-6 w-6 text-gray-300 hover:text-green-500 " viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" :class="{
                        'text-black': isOpen(index),
                    }">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z"
                        fill="currentColor" />
                </svg>
            </button>


            <!-- Sub-menu content -->
            <div v-if="isOpen(index)" class="transition-all duration-1000"
                :class="[open ? 'bg-white rounded-lg text-black' : 'absolute  left-16 w-32 bg-black rounded shadow-lg']">
                <ul class=" p-2">
                    <li v-for="(item, subIndex) in menu.subItems" :key="subIndex" class="text-xs my-1 cursor-pointer"
                        :class="[open ? 'text-black  hover:bg-gray-600 focus:bg-gray-600 p-2 rounded-lg' : 'text-white hover:bg-gray-700 focus:bg-gray-700 p-2 rounded-lg']">
                        {{ item }}
                    </li>
                </ul>
            </div>



        </template>
    </nav>
</template>

<script setup>
import { onMounted, ref } from 'vue'

const open = ref(false)
const dimmer = ref(false)
const right = ref(false)

const isMenuOpen = ref(false)

const menuItems = ref([
    {
        label: 'Attendance',
        subItems: ['Timesheet', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Organization',
        subItems: ['onboarding', 'Submenu 2.2'],
    },
    {
        label: 'Menu 1',
        subItems: ['Submenu 1.1', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Menu 2',
        subItems: ['Submenu 2.1', 'Submenu 2.2'],
    },
    {
        label: 'Menu 1',
        subItems: ['Submenu 1.1', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Menu 2',
        subItems: ['Submenu 2.1', 'Submenu 2.2'],
    },
    {
        label: 'Menu 1',
        subItems: ['Submenu 1.1', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Menu 2',
        subItems: ['Submenu 2.1', 'Submenu 2.2'],
    },
    {
        label: 'Attendance',
        subItems: ['Timesheet', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Organization',
        subItems: ['onboarding', 'Submenu 2.2'],
    },
    {
        label: 'Menu 1',
        subItems: ['Submenu 1.1', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Menu 2',
        subItems: ['Submenu 2.1', 'Submenu 2.2'],
    },
    {
        label: 'Menu 1',
        subItems: ['Submenu 1.1', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Menu 2',
        subItems: ['Submenu 2.1', 'Submenu 2.2'],
    },
    {
        label: 'Attendance',
        subItems: ['Timesheet', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Organization',
        subItems: ['onboarding', 'Submenu 2.2'],
    },
    {
        label: 'Menu 1',
        subItems: ['Submenu 1.1', 'Submenu 1.2', 'Submenu 1.3'],
    },
    {
        label: 'Menu 2',
        subItems: ['Submenu 2.1', 'Submenu 2.2'],
    },

    // Add more menu items as needed
]);



const activeMenuIndex = ref(null);

const toggleMenu = (index) => {
    activeMenuIndex.value = activeMenuIndex.value === index ? null : index;
};

const isOpen = (index) => {
    return activeMenuIndex.value === index;
};

const hoverMenu = (index) => {

    activeMenuIndex.value = activeMenuIndex.value === index ? null : index;

}

const isHover = (index) => {
    return activeMenuIndex.value === index;
}

const isActive = ref(false)

const toggleSwitch = () => {
    isActive.value = !isActive.value;
    open.value = !open.value;

}
</script>
