import { createRouter, createWebHistory } from "vue-router";
import payroll_setting from '../payroll_setting.vue'

export const router = createRouter({
history: createWebHistory(),
routes: [ { path: "/", component: payroll_setting },

]
});
