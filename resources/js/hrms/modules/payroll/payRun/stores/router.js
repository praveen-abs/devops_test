import { createRouter, createWebHistory } from "vue-router";
import PayRun from '../payRun.vue'
import Activity from '../activity/activity.vue'
import CalculatePayroll from '../calculatedPayrollPerMonth/calculatedPayrollPerMonth.vue'

let routes = [{
    path: '/testing_shelly',
    name: 'payrun',
    component: PayRun,
    path: 'testing_shelly/Activity',
    name: 'Activity',
    component: Activity,
    path: '/testing_shelly/CalculatePayroll',
    name: 'CalculatePayroll',
    component: CalculatePayroll,
  
}]

const router = createRouter({
    history: createWebHistory(),
  routes
})
export default router