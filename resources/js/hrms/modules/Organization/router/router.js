import { createRouter, createWebHistory } from "vue-router";
import QuickOnboarding from '../QuickOnboarding/QuickOnboarding.vue'
import BulkOnboarding from '../BulkOnboarding/BulkOnboarding.vue'



const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/import/:module",
            name: "QuickOnboarding",
            component: QuickOnboarding,
        },
<<<<<<< HEAD

=======
        {
            path: "/import/:module",
            name: "BulkOnboarding",
            component: BulkOnboarding,
        },
>>>>>>> 364a04ef40528e673b79184b76938954c77db39e
    ],
});
export default router;
