<template>
    <div class="w-full card">
        <div class="card-body">
            <section id="topBar" class="flex justify-between">
                <section class="flex ">
                    <span class="font-semibold text-lg">Run Payroll</span>
                    <div class="mx-3 bg-blue-600 p-1 rounded-sm px-2 text-white text-sm">FINALIZED</div>
                    <div class="">
                        <p class="">last Updated</p>
                    </div>
                </section>
                <section class="flex">
                    <button @click="canShowRunPayroll = !canShowRunPayroll">
                        <i class="pi pi-chevron-down" style="font-size: 1rem"></i>
                    </button>
                </section>
            </section>
            <div id="Body" class="my-4">
                <div v-if="canShowRunPayroll"
                    class="grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2 transition duration-150 ease-in-out "
                    style="display: grid;">
                    <router-link
                        class="p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110  duration-300"
                        v-for="(item, index) in runPayroll" :key="index" :to="`/payrun/${item.shorName}`">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" :d="item.icons[0]" />
                            <path stroke-linecap="round" stroke-linejoin="round" :d="item.icons[1]" />
                        </svg>
                        <p class="fs-6 font-semibold text-center whitespace-nowrap">{{ item.name }}</p>
                    </router-link>
                </div>
            </div>
            <div id="footer" class="text-end float-right">
                <div class="text-end flex">
                    <button class="btn btn-outline-primary">Preview Run Payroll</button>
                    <button class="btn btn-outline-primary mx-4">Review All Employees</button>
                    <button class="btn btn-primary">Finalize Payroll</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <img src="../../assests/calendar.svg" alt="" srcset=""> -->
</template>

<script setup>
import { onMounted, ref } from "vue";
import { payrunMainStore } from "../stores/payrunMainStore";
const canShowRunPayroll = ref(true)

const usePayrun = payrunMainStore()

const findIcons = (values) => {
    if (values == 'leave') {
        return '../../assests/calendar.svg'
    }
}


const calendarIcon = "M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
const personIcon = "M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
const breifcaseIcon = ["M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z", "M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z"]




const runPayroll = ref([
    { id: 1, shorName: 'leave', icons: calendarIcon, name: "Leave, Attendance & Daily Wages" },
    { shorName: 'attendance', icons: personIcon, name: "New Joinee & Exits" },
    { shorName: 'Salary-Revisions', icons: breifcaseIcon, name: "Bonus, Salary Revisions & Overtime" },
    { shorName: 'Reimbursement', icons: 'pi pi-calendar-times', name: "Reimbursement, Adhoc Payment, Deduction" },
    { shorName: 'Salaries-Hold', icons: 'pi pi-calendar-times', name: "Salaries on Hold & Arrears" },
    { shorName: 'Override', icons: 'pi pi-calendar-times', name: "Override (PT, ESI, TDS, LWF)" },
])

</script>
