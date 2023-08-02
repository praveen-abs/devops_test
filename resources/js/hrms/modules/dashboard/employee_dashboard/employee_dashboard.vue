<template>
    <div class="p-3 overflow-auto h-screen">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-4">
                <WelcomeCard />
            </div>
            <div class="col-span-4">
                <LeaveDetials />
            </div>
            <div class="bg-white rounded-lg col-span-4">
                <HolidayWidget />
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 pb-7">
            <div class="col-span-8">
                <div class="grid grid-cols-2 gap-4 my-2">
                    <div>
                        <LeaveBalance />
                    </div>
                    <div>
                        <Calender />
                    </div>
                </div>
                <div class="grid grid-cols-1 ">
                    <div>
                        <events />
                    </div>
                </div>
            </div>
            <div class="col-span-4 my-2">
                <Notification />
            </div>
        </div>
    </div>
</template>

<script setup>
import WelcomeCard from "./welcome_card/welcome_card.vue";
import LeaveDetials from "./leave_details/leave_details.vue";
import Notification from "./notifications/notification.vue";
import LeaveBalance from "./leave_balance/leave_balance.vue";
import Calender from "./calender/calender.vue";
import HolidayWidget from "./holiday_widget/holiday_widget.vue";
import events from "../events/events.vue";
</script>


<style>
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888888;
    border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #a1a1a1;
}
</style>
