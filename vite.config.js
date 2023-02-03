import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
         vue(),
        laravel({
            input: ['resources/js/app.js',
                    'resources/js/hrms/modules/leave_module/Org_leave_module/OrgLeaveBalance.js',
                    'resources/js/hrms/modules/leave_module/team_leave_module/team_leave_balance.js',
                    'resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.js',
                    'resources/js/hrms/modules/approvals/reimbursements/ReimbursementsApproval.js',
                    'resources/js/hrms/modules/testings/praveen/crud_table/CRUD_DataTable.js',
                    'resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.js'
            ],
            refresh: true,
        }),
    ],
});
