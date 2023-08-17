import { createRouter, createWebHistory } from "vue-router";
import QuickOnboarding from '../QuickOnboarding/QuickOnboarding.vue'
import BulkOnboarding from '../BulkOnboarding/BulkOnboarding.vue'



const router = createRouter({
    // history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/quickEmployeeOnboarding/:module",
            name: "QuickOnboarding",
            component: QuickOnboarding,
        },
        {
            path: "/bulkEmployeeOnboarding/:module",
            name: "BulkOnboarding",
            component: BulkOnboarding,
        },
    ],
});
export default router;
