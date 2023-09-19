import { createRouter, createWebHistory } from 'vue-router';

const routes = [

    {
        path: '/',
        name: 'home',
        component: () => import('../Home/Home.vue'),
        children: [
            // Define your other routes here
            {
                path: '/',
                name: 'dashboard',
                component: () => import('../dashboard/dashboard.vue'),

            },
            {
                path: '/dashboard',
                name: 'profile',
                component: () => import('../attendence/attendanceDashboard/attendanceDashboard.vue'),
            },
            {
                path: '/timesheet',
                name: 'eventManagement',
                component: () => import('../attendence/AttendanceModule.vue'),
                // meta: { requiresAuth: true }, // Protect this route
            },
            {
                path: '/leave',
                name: 'staff',
                component: () => import('../leave_module/LeaveModule.vue'),
            },
            // Other routes go here
        ],
        // meta: { requiresAuth: true }, // Protect this route
    },

];
const router = createRouter({
    history: createWebHistory(),
    routes,
});


// Global navigation guard
// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.requiresAuth)) {
//     // Check if the user is authenticated by validating the access_token
//     const accessToken = localStorage.getItem('access_token'); // Retrieve the access_token from local storage (you can use cookies or a different storage mechanism)

//     if (!accessToken) {
//       // If the access_token is not present, redirect to the login page
//       next('/login');
//     } else {
//       // User is authenticated, proceed to the requested route
//       next();
//     }
//   } else {
//     // For routes that don't require authentication, proceed
//     next();
//   }
// });


export default router;
