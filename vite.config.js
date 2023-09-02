import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        { src: '@/plugins/vue3-html2pdf', mode: 'client' },
        vue(),
        laravel({
            input: [

                'resources/scss/main.scss',
                'resources/scss/views/main_dashboard.scss',

                'resources/js/app.js',

                // Home
                'resources/js/hrms/modules/Home/Home.js',
                'resources/js/hrms/modules/Home/Sidebar.js',
                'resources/js/hrms/modules/Home/Topbar.js',


                //Main dashboard
                'resources/js/hrms/modules/dashboard/dashboard.js',

                // Profile Page new

                'resources/js/hrms/modules/profile_pages/ProfilePageNew.js',

                // Attendance

                'resources/js/hrms/modules/attendence/AttendanceModule.js',
                'resources/js/hrms/modules/attendence/attendanceDashboard/attendanceDashboard.js',

                // Leaves

                'resources/js/hrms/modules/leave_module/LeaveModule.js',

                //Reports
                'resources/js/hrms/modules/reports/ReportsModule.js',
                'resources/js/hrms/modules/reports/pms/PMSFormsDownloadTable.js',
                'resources/js/hrms/modules/reports/attendance/attendanceBasicReports/attendanceBasicReports.js',
                'resources/js/hrms/modules/reports/attendance/attendanceAbsentReports/attendanceAbsentReports.js',
                'resources/js/hrms/modules/reports/attendance/attendanceLatecomingReports/attendanceLatecomingReports.js',
                'resources/js/hrms/modules/reports/attendance/attendanceEarlygoingReports/attendanceEarlygoingReports.js',
                'resources/js/hrms/modules/reports/attendance/attendanceOvertimeReports/attendanceOvertimeReports.js',
                'resources/js/hrms/modules/reports/attendance/attendanceDetailReports/AttendanceReport_Detailed.js',
                'resources/js/hrms/modules/reports/attendance/HalfDayAbsentReport/HalfDayAbsentReport.js',

                //Organization Module
                'resources/js/hrms/modules/Organization/manage_employee/ManageEmployee.js',
                'resources/js/hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.js',
                'resources/js/hrms/modules/Organization/employee_docs_upload/EmployeeDocsUpload.js',
                'resources/js/hrms/modules/Organization/QuickOnboarding/QuickOnboarding.js',
                'resources/js/hrms/modules/Organization/BulkOnboarding/BulkOnboarding.js',

                // Approval Module
                'resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.js',
                'resources/js/hrms/modules/approvals/reimbursements/ReimbursementsApproval.js',
                'resources/js/hrms/modules/approvals/onboarding/review_document.js',
                'resources/js/hrms/modules/approvals/leaves/LeaveApproval.js',
                'resources/js/hrms/modules/approvals/pms/PMSApprovalTable.js',
                'resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.js',

                ////Reimbursements Module

                //Employee Reimbursements
                'resources/js/hrms/modules/reimbursements/EmployeeReimbursements.js',

                //Configurations
                //Attendance settings

                'resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_master.js',

                // testing GeneralShift

                'resources/js/hrms/modules/configurations/attendance_settings/ManageShift/GeneralShift/GeneralShift.js',

                // Client Onboarding

                'resources/js/hrms/modules/configurations/client_onboarding/client_onboarding_master.js',

                'resources/js/hrms/modules/configurations/client_onboarding/on_run_client_onboarding.js',


                // Assign Shift
                //'resources/js/hrms/modules/configurations/attendance_settings/Att_AssignWorkShifts.js',

                //Holidays
                'resources/js/hrms/modules/configurations/holidays/Holidays_Lists.js',
                // Holidays_Master
                'resources/js/hrms/modules/configurations/holidays/Holidays_Master.js',
                'resources/js/hrms/modules/configurations/holidays/CreateNewHolidaysList.js',

                // Investment Setting


                // Paycheck
                'resources/js/hrms/modules/paycheck/investments/investment.js',

                //Payroll
                'resources/js/hrms/modules/manage_payslips/ManagePayslips.js',
                // Payrun
                'resources/js/hrms/modules/payroll/payRun/payRun.js',

                // payroll setup

                'resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/payroll_setup.js',


                // Salary Advance and Loan Setting

                'resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.js',

                //Investments
                'resources/js/hrms/modules/paycheck/investments/declaration/declaration.js',
                'resources/js/hrms/modules/paycheck/investments/investments_and_exemption/investments_and_exemption.js',

                // Salary Advance

                // Employee Salary Advance
                'resources/js/hrms/modules/paycheck/salary_advance_loan/employee_salary_loan.js',


                //Investments Form Mgmt
                'resources/js/hrms/modules/paycheck/inv_forms_mgmt/InvFormsMgmt.js',


                // Payslip Template

                //'resources/js/hrms/modules/payroll/payslip/payslipMaster.js',

                // Roles and permission

                'resources/js/hrms/modules/roles_permission/RolesPermission.js',
                'resources/js/hrms/modules/payroll/payroll_setting/payroll_setting.js',
                'resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/payroll_setup.js',

                // super Admin screen
                'resources/js/hrms/modules/approvals/roles_permission/RolesAndPermission.js',
                // Admin screen roles And Permission
                'resources/js/hrms/modules/approvals/roles_permission/AdminRoleAndPermission/AdminRolesPermission.js',


                //PMS forms management
                'resources/js/hrms/modules/pms/pms_forms_mgmt/PMSFormsMgmt.js',
                //'resources/js/hrms/modules/pms/pms_forms_mgmt/employee_view/PMSFormsMgmt_SelfView.js',
                //'resources/js/hrms/modules/pms/pms_forms_mgmt/hr_view/PMSFormsMgmt_HRView.js',

                //manage welcome mail status
                'resources/js/hrms/modules/Organization/manage_welcome_mails_status/ManageWelcomeMailStatus.js',

                // Exit
                'resources/js/hrms/modules/exit/exit.js',

                // testing_pradeesh
                'resources/js/hrms/modules/paycheck/investments/investments_and_exemption/testing_tableMaster/testing_table.js',
                // 'resources/js/hrms/modules/paycheck/investments/investments_and_exemption/testing_tableMaster/testing_table.js',
                'resources/js/hrms/modules/configurations/emp_documents/DocumentsSettings.js',

                // Onboarding From management
                'resources/js/hrms/modules/onboarding_module/onboarding_form_mgmt/OnboardingFormMgmt.js',

                // Employee details approvals

                'resources/js/hrms/modules/approvals/employeeDetails_approvals/EmpDetails_approvals.js',

                //approvals_salary_advance
                'resources/js/hrms/modules/approvals/salary_advance_loan/approvals_salary_advance.js',

                // login page
                'resources/js/hrms/modules/login_Page/login_Page.js',
                'resources/js/hrms/modules/manage_payslips/ManagePayslips.js',
                'resources/js/hrms/modules/profile_pages/finance_details/EmployeePayslips.js',

                //    Exit approval
                // 'resources/js/hrms/modules/approvals/exit_approval/resignation_approval.js',
                //Mobile Settings
                'resources/js/hrms/modules/configurations/mobile_settings/MobileSettings.js',
                // Employee Payables Details
                'resources/js/hrms/modules/salary_loan_setting/EmployeePayables/EmployeePayablesDetails.js',

                // salary advance existing data

                'resources/js/hrms/modules/salary_loan_setting/salary_advance_excel_import/salary_advance_excel_import.js',

            //  payslipPreview
            'resources/js/hrms/modules/configurations/payslip_preview/payslipPreview.js'


            ],

            refresh: true,
        }),
    ],
    resolve: {
        dedupe: ['vue', 'vue-router'],
    },
});
