import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import FullReload from 'vite-plugin-full-reload'

export default defineConfig({
    plugins: [
        FullReload(['config/routes.rb', 'app/views/**/*']),
        vue(),
        laravel({
            input: [

                'resources/js/app.js',

                // Leaves
                'resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.js',
                'resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveBalance.js',
                'resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveHistoryTable.js',

                'resources/js/hrms/modules/leave_module/team_leave_module/TeamLeaveBalance.js',
                //Reports
                'resources/js/hrms/modules/reports/pms/PMSFormsDownloadTable.js',

                //Organization Module

                'resources/js/hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.js',

                // Approval Module
                'resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.js',
                'resources/js/hrms/modules/approvals/reimbursements/ReimbursementsApproval.js',
                'resources/js/hrms/modules/approvals/onboarding/review_document.js',
                'resources/js/hrms/modules/approvals/leaves/LeaveApproval.js',
                'resources/js/hrms/modules/approvals/pms/PMSApprovalTable.js',
                'resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.js',


                ////Reimbursements Module
                //Employee Reimbursements
                'resources/js/hrms/modules/reimbursements/employee_reimbursements/EmployeeReimbursements.js',

                //Configurations

                'resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_master.js',

                // Assign Shift
                'resources/js/hrms/modules/configurations/attendance_settings/Att_AssignWorkShifts.js',

                //Holidays
                'resources/js/hrms/modules/configurations/holidays/Holidays_Lists.js',

                'resources/js/hrms/modules/configurations/attendance_settings/Att_AssignWorkShifts.js',

                // Integration

                'resources/js/hrms/modules/configurations/integration_auth/integration_auth.js',

                // Offer Letter

                'resources/js/hrms/modules/onboarding_module/offer_letter/offer_letter_generation/offer_letter_generation.js',
                'resources/js/hrms/modules/onboarding_module/offer_letter/offer_letter_template/offer_letter_template.js',
                'resources/js/hrms/modules/onboarding_module/offer_letter/offer_letter_master/offer_letter_master.js',

                // Pay check

                'resources/js/hrms/modules/paycheck/declaration/declaration.js',

                // Payroll Setting  resources\js\hrms\modules\payroll\payroll_setting\

                'resources/js/hrms/modules/payroll/payroll_setting/payroll_setting.js',

                //   Payroll Setup

                'resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/payroll_setup.js',








            ],
            define: {
                'process.env': process.env
            },
            refresh: true,
        }),
    ],
});
