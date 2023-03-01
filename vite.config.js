import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                    //sass files
                    'resources/sass/testsass.scss',

                    'resources/js/app.js',

                    // Leaves Module
                    'resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveBalance.js',
                    'resources/js/hrms/modules/leave_module/team_leave_module/TeamLeaveBalance.js',

                    //Organization Module

                    'resources/js/hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.js',

                    // Approval Module
                    'resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.js',
                    'resources/js/hrms/modules/approvals/reimbursements/ReimbursementsApproval.js',
                    'resources/js/hrms/modules/approvals/leaves/LeaveApproval.js',
                    'resources/js/hrms/modules/approvals/leaves/PMSApprovalTable.js',
                    'resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.js',
                    'resources/js/hrms/modules/approvals/employee_reimbursements/employee_reimbursements.js',


            ],
            refresh: true,
        }),
    ],
});
