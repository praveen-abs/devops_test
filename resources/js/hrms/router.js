import { createRouter, createWebHistory } from 'vue-router';

const routes = [

    // {
    //     path: '/login',
    //     name: 'login',
    //     component: () => import('../hrms/modules/login_Page/login_Page.vue'),
    //     meta: { requiresAuth: false }, // Protect this route
    // },

    {
        path: '/',
        name: 'home',
        component: () => import('../hrms/modules/Home/Home.vue'),
        // meta: { requiresAuth: true }, // Protect this route
        children: [
            // Define your other routes here
            {
                path: '/',
                name: '',
                component: () => import('../hrms/modules/dashboard/dashboard.vue'),

            },
            {
                path: '/profile-page',
                name: 'profile-page',
                component: () => import('../hrms/modules/profile_pages/ProfilePageNew.vue'),
            },
            {
                path: '/profile-page/:user_code',
                name: 'profile-page-search',
                component: () => import('../hrms/modules/profile_pages/ProfilePageNew.vue'),

            },
            {
                path: '/attendance-dashboard',
                name: 'attendance-dashboard',
                component: () => import('../hrms/modules/attendence/attendanceDashboard/attendanceDashboard.vue'),
            },
            {
                path: '/attendance-timesheet',
                name: 'attendance-timesheet',
                component: () => import('../hrms/modules/attendence/AttendanceModule.vue'),
                // meta: { requiresAuth: true }, // Protect this route
            },
            {
                path: '/attendance-leave',
                name: 'Attendance',
                component: () => import('../hrms/modules/leave_module/LeaveModule.vue'),
                // meta: { requiresAuth: true }, // Protect this route
            },

            // Organization

            {
                path: '/Organization/manage-employees',
                name: 'manage-employees',
                component: () => import('../hrms/modules/Organization/manage_employee/ManageEmployee.vue'),
            },
            {
                path: '/Organization/employee-onboarding',
                name: 'employee-onboarding',
                component: () => import('../hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.vue'),
            },
            {
                path: '/Organization/bulk-onboarding',
                name: 'bulk-onboarding',
                component: () => import('../hrms/modules/Organization/BulkOnboarding/BulkOnboarding.vue'),
            },
            {
                path: '/Organization/quick-onboarding',
                name: 'quick-onboarding',
                component: () => import('../hrms/modules/Organization/QuickOnboarding/QuickOnboarding.vue'),
            },
            {
                path: '/Organization/manage-welcome-mails',
                name: 'manage-welcome-mails',
                component: () => import('../hrms/modules/Organization/manage_welcome_mails_status/ManageWelcomeMailStatus.vue'),
            },

            // Approvals

            {
                path: '/Approvals/Onboarding-documents',
                name: 'Onboarding-documents',
                component: () => import('../hrms/modules/approvals/onboarding/review_document.vue'),
            },
            {
                path: '/Approvals/leave',
                name: 'approval-leave',
                component: () => import('../hrms/modules/approvals/leaves/LeaveApproval.vue'),
            },
            {
                path: '/Approvals/Attendance-regularization',
                name: 'approvals-regularization',
                component: () => import('../hrms/modules/approvals/att_regularization/AttRegularizationApproval.vue'),
            },
            {
                path: '/Approvals/Reimbursements',
                name: 'approvals-Reimbursements',
                component: () => import('../hrms/modules/approvals/reimbursements/ReimbursementsApproval.vue'),
            },
            {
                path: '/Approvals/Employee-Details',
                name: 'approvals-employee-Details',
                component: () => import('../hrms/modules/approvals/employeeDetails_approvals/EmpDetails_approvals.vue'),
            },
            {
                path: '/Approvals/loan-settings',
                name: 'approvals-salary-advance',
                component: () => import('../hrms/modules/approvals/salary_advance_loan/approvals_salary_advance.vue'),
            },

            // Paycheck
            {
                path: '/Paycheck/Salary-Details',
                name: 'Paycheck-Salary-Details',
                component: () => import('../hrms/modules/paycheck/salary_details/salary_details.vue'),
            },
            {
                path: '/Paycheck/Investments',
                name: 'Paycheck-Investments',
                component: () => import('../hrms/modules/paycheck/investments/investment.vue'),
            },
            {
                path: '/Paycheck/Loan-and-salary-advance',
                name: 'Paycheck-Loan-and-salary-advance',
                component: () => import('../hrms/modules/paycheck/salary_advance_loan/employee_salary_loan.vue'),
            },
            {
                path: '/Paycheck/Import-loan-and-salary-advance',
                name: 'Paycheck-Import-loan-and-salary-advance',
                component: () => import('../hrms/modules/salary_loan_setting/salary_advance_excel_import/salary_advance_excel_import.vue'),
            },

            // Performance 
            {
                path: '/Performance/employee-appraisal',
                name: 'Performance-employee-appraisal',
                component: () => import('../hrms/components/PageNotFound.vue'),
            },

            // payroll
            {
                path: '/Payroll/Manage-Payslips',
                name: 'Payroll-Manage-Payslips',
                component: () => import('../hrms/modules/manage_payslips/ManagePayslips.vue'),
            },
            {
                path: '/Payroll/payroll-analytics',
                name: 'payroll-analytics',
                component: () => import('../hrms/components/PageNotFound.vue'),
            },
            {
                path: '/Payroll/PayRun',
                name: 'Payroll-Pay-Run',
                component: () => import('../hrms/modules/payroll/payRun/payRun.vue'),
            },

            // Reports
            {
                path: '/Reports',
                name: 'Reports',
                component: () => import('../hrms/modules/reports/ReportsMaster.vue'),
            },

            // Configuration
            {
                path: '/Configuration/Client-onboarding',
                name: 'Client-onboarding',
                component: () => import('../hrms/modules/configurations/client_onboarding/client_onboarding_master.vue'),
            },
            // {
            //     path: '/Configuration/Document-template',
            //     name: 'Document-template',
            //     component: () => import('../hrms/modules/reports/ReportsMaster.vue'),
            // },
            {
                path: '/Configuration/Document-settings',
                name: 'Document-settings',
                component: () => import('../hrms/modules/configurations/emp_documents/DocumentsSettings.vue'),
            },
            {
                path: '/Configuration/Attendance-settings',
                name: 'Attendance-settings',
                component: () => import('../hrms/modules/configurations/attendance_settings/Attendance_setting_Master.vue'),
            },
            // {
            //     path: '/Configuration/Investment-settings',
            //     name: 'Investment-settings',
            //     component: () => import('../hrms/modules/configurations/'),
            // },
            {
                path: '/Configuration/Mobile-settings',
                name: 'Mobile-settings',
                component: () => import('../hrms/modules/configurations/mobile_settings/MobileSettings.vue'),
            },
            {
                path: '/Configuration/Module-settings',
                name: 'Module-settings',
                component: () => import('../hrms/modules/configurations/module_settings/module_settings.vue'),
            },

            // Claims
            {
                path: '/Claims/Employee-reimbursements',
                name: 'Employee-reimbursements',
                component: () => import('../hrms/modules/reimbursements/EmployeeReimbursements.vue')
            },



            {
                path: '/testing',
                name: 'testing',
                component: () => import('../testings/api.vue'),
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
router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        // Check if the user is authenticated by validating the access_token
        const accessToken = localStorage.getItem('access_token'); // Retrieve the access_token from local storage (you can use cookies or a different storage mechanism)

        if (!accessToken) {
            // If the access_token is not present, redirect to the login page
            next('/login');
        } else {
            // User is authenticated, proceed to the requested route
            next();
        }
    } else {
        // For routes that don't require authentication, proceed
        next();
    }
});


export default router;
