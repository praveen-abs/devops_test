import { createRouter, createWebHistory } from "vue-router";
import QuickOnboarding from '../QuickOnboarding/QuickOnboarding.vue'



const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/testing_shelly/:module",
            name: "home",
            component: QuickOnboarding,
        },
    ],
});
export default router;
