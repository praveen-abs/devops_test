import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/scss/main.scss',
                'resources/scss/views/main_dashboard.scss',

                'resources/js/app.js',

                // Profile Page new

                'resources/js/hrms/modules/profile_pages/ProfilePageNew.js',

                // Leaves
                'resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.js',
                'resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveBalance.js',
                'resources/js/hrms/modules/leave_module/org_leave_module/OrgLeaveHistoryTable.js',

                'resources/js/hrms/modules/leave_module/team_leave_module/TeamLeaveBalance.js',
                //Reports
                'resources/js/hrms/modules/reports/pms/PMSFormsDownloadTable.js',

                //Organization Module
                'resources/js/hrms/modules/Organization/manage_employee/ManageEmployee.js',
                'resources/js/hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.js',
                'resources/js/hrms/modules/Organization/employee_docs_upload/EmployeeDocsUpload.js',

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

                // Client Onboarding

                'resources/js/hrms/modules/configurations/client_onboarding/client_onboarding_master.js',

                // Assign Shift
                //'resources/js/hrms/modules/configurations/attendance_settings/Att_AssignWorkShifts.js',

                //Holidays
                'resources/js/hrms/modules/configurations/holidays/Holidays_Lists.js',


                // Paycheck

                'resources/js/hrms/modules/paycheck/investments/investment.js',

                // Salary Advance and Loan Setting

                'resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.js',

                // Declaration

                'resources/js/hrms/modules/paycheck/investments/declaration/declaration.js',

                // invenstments and exemption

                'resources/js/hrms/modules/paycheck/investments/investments_and_exemption/investments_and_exemption.js',


                // Profile pages



                // familyinfo_table_page
                'resources/js/hrms/modules/profile_pages/employee_details/EmployeeDetails.js',

                // 'resources/js/hrms/modules/profile_pages/FamilyDetails.js',

                // // Experience page
                // 'resources/js/hrms/modules/profile_pages/ExperienceDetails.js',

                // // financeDetails page
                // 'resources/js/hrms/modules/profile_pages/FinanceDetails.js',
                // // Documents Review

                // 'resources/js/hrms/modules/approvals/onboarding/review_document.js'

                //Payroll
                'resources/js/hrms/modules/manage_payslips/ManagePayslips.js'

            ],
            refresh: true,
        }),
    ],
    // css: {
    //     preprocessorOptions: {
    //       scss: {
    //         additionalData: `
    //           @import "./resources/scss/views/main_dashboard.scss";
    //           @import "./resources/scss/main.scss";
    //         `
    //       }
    //     }
    //   }
});
