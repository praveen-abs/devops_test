<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\VmtAppModules;
use App\Models\VmtClientMaster;
use App\Models\VmtAppSubModuleslink;


class Seeder_VmtAppModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('vmt_app_modules')->truncate();

        DB::table('vmt_app_modules')->insert([
            ['id'=>'1','module_name'=>'MOBILE APP SETTINGS',"title"=>'Mobile App Settings'],
            ['id'=>'2','module_name'=>'MAIN DASHBOARD',"title"=>'Main Dashboard'],
            ['id'=>'3','module_name'=>'CRM',"title"=>'CRM'],
            ['id'=>'4','module_name'=>'ATTENDANCE_TIMESHEET',"title"=>'Attendance Timesheet'],
            ['id'=>'5','module_name'=>'LEAVE',"title"=>'Leave'],
            ['id'=>'6','module_name'=>'ORGANIZATION',"title"=>'Organization'],
            ['id'=>'7','module_name'=>'APPROVALS',"title"=>'Approvals'],
            ['id'=>'8','module_name'=>'PMS',"title"=>'PMS'],
            ['id'=>'9','module_name'=>'PAYROLL',"title"=>'Payroll'],
            ['id'=>'10','module_name'=>'PAYCHECK',"title"=>'Paycheck'],
            ['id'=>'11','module_name'=>'CLAIM',"title"=>'Claims'],
            ['id'=>'12','module_name'=>'REPORT',"title"=>'Reports'],
            ['id'=>'13','module_name'=>'MASTER CONFIG',"title"=>'Master config'],
            ['id'=>'14','module_name'=>'CLIENT ONBOARDING',"title"=>'Client onboarding'],
            ['id'=>'15','module_name'=>'DOCUMENT TEMPLATES',"title"=>'Document templates'],
            ['id'=>'16','module_name'=>'DOCUMENT SETTINGS',"title"=>'Document settings'],
            ['id'=>'17','module_name'=>'LEAVE SETTINGS',"title"=>'Leave settings'],
            ['id'=>'18','module_name'=>'ATTENDANCE SETTINGS',"title"=>'Attendance settings'],
            ['id'=>'19','module_name'=>'INVESTMENT SETTINGS',"title"=>'Investment settings'],
        ]);
        DB::table('vmt_app_sub_modules')->truncate();

        DB::table('vmt_app_sub_modules')->insert([
            ['id'=>'1','sub_module_name'=>'IS_ENABLED',"title"=>'Is Mobile App Enabled?'],
            ['id'=>'2','sub_module_name'=>'CAN_CHECKIN',"title"=>'Can perform Attendance Check-in?'],
            ['id'=>'3','sub_module_name'=>'CAN_CHECKOUT',"title"=>'Can perform Attendance Check-in?'],
            ['id'=>'4','sub_module_name'=>'CHECKIN_LOCATION',"title"=>'Can capture location on Check-in?'],
            ['id'=>'5','sub_module_name'=>'CHECKOUT_LOCATION',"title"=>'Can capture location on Check-out?'],
            ['id'=>'6','sub_module_name'=>'CHECKIN_SELFIE',"title"=>'Can capture selfie on Check-in?'],
            ['id'=>'7','sub_module_name'=>'CHECKOUT_SELFIE',"title"=>'Can capture selfie on Check-out?'],
            ['id'=>'8','sub_module_name'=>'REIMBURSEMENT_ON_CHECKOUT',"title"=>'Can capture Reimbursement details on Check-out?'],
            ['id'=>'9','sub_module_name'=>'Absent Regularization',"title"=>'Can perform Absent Regularization?'],
            ['id'=>'10','sub_module_name'=>'Attendance Regularization',"title"=>'Can perform Attendance Regularization?'],
            ['id'=>'11','sub_module_name'=>'CAN_SHOW_ATT_REGULARIZATION_APPROVAL',"title"=>'Can show att regularization approval?'],
            ['id'=>'12','sub_module_name'=>'CAN_APPLY_LEAVE',"title"=>'Can apply leave?'],
            ['id'=>'13','sub_module_name'=>'CAN_SHOW_LEAVE_APPROVAL',"title"=>'Can show leave approval?'],
            ['id'=>'14','sub_module_name'=>'Salary Advance and Loan',"title"=>'salary_advance_and_loan'],
            ['id'=>'15','sub_module_name'=>'Investments',"title"=>'investments'],
            ['id'=>'16','sub_module_name'=>'PMS',"title"=>'pms'],
            ['id'=>'17','sub_module_name'=>'Exit Apply',"title"=>'exit_apply'],

            ['id'=>'18','sub_module_name'=>'VENDOR',"title"=>'vendor'],
            ['id'=>'19','sub_module_name'=>'CLIENT',"title"=>'client'],

            ['id'=>'20','sub_module_name'=>'DASHBOARD',"title"=>'dashboard'],
            ['id'=>'21','sub_module_name'=>'TIME SHEET',"title"=>'time_sheet'],

            ['id'=>'22','sub_module_name'=>'MANAGE EMPLOYEES',"title"=>'manage_employees'],
            ['id'=>'23','sub_module_name'=>'ORG STRUCTURE',"title"=>'org_structure'],
            ['id'=>'24','sub_module_name'=>'ONBOARDING',"title"=>'onboarding'],
            ['id'=>'25','sub_module_name'=>'ONBOARDING BULK UPLOAD',"title"=>'onboarding bulk upload'],
            ['id'=>'26','sub_module_name'=>'ONBOARDING QUICK UPLOAD',"title"=>'onboarding quick upload'],
            ['id'=>'27','sub_module_name'=>'MANAGE WELCOMEMAIL STATUS',"title"=>'manage_welcomemail_status'],
            ['id'=>'28','sub_module_name'=>'ROLES AND PERMISSION',"title"=>'roles_and_permission'],

            ['id'=>'29','sub_module_name'=>'ONBOARDING',"title"=>'onboarding'],
            ['id'=>'30','sub_module_name'=>'LEAVES',"title"=>'leaves'],
            ['id'=>'31','sub_module_name'=>'ATTENDANCE REGULARIZATION',"title"=>'attendance_regularization'],
            ['id'=>'32','sub_module_name'=>'REIMBURSEMENT',"title"=>'reimbursement'],
            ['id'=>'33','sub_module_name'=>'TAXATIONS',"title"=>'taxations'],
            ['id'=>'34','sub_module_name'=>'EMPLOYEE DETAILS',"title"=>'employee_details'],
            ['id'=>'35','sub_module_name'=>'LOAN AND SALARY ADVANCE',"title"=>'loan_and_salary_advance'],

            ['id'=>'36','sub_module_name'=>'SELF APPRAISAL',"title"=>'self_appraisal'],
            ['id'=>'37','sub_module_name'=>'TEAM APPRAISAL',"title"=>'team_appraisal'],
            ['id'=>'38','sub_module_name'=>'ORG APPRAISAL',"title"=>'org_appraisal'],
            ['id'=>'39','sub_module_name'=>'PMS CONFIG',"title"=>'pms_config'],
            ['id'=>'40','sub_module_name'=>'PMS FORMS MANAGEMENT',"title"=>'pms_forms_management'],

            ['id'=>'41','sub_module_name'=>'ANALYTICS',"title"=>'analytics'],
            ['id'=>'42','sub_module_name'=>'PAYRUN',"title"=>'payrun'],
            ['id'=>'43','sub_module_name'=>'MANAGE PAYSLIPS',"title"=>'manage_payslip'],
            ['id'=>'44','sub_module_name'=>'CLAIM',"title"=>'claim'],
            ['id'=>'45','sub_module_name'=>'REPORTS',"title"=>'reports'],

            ['id'=>'47','sub_module_name'=>'SALARY DETAILS',"title"=>'salary_details'],
            ['id'=>'48','sub_module_name'=>'INVESTMENTS',"title"=>'investments'],
            ['id'=>'49','sub_module_name'=>'FORM 16',"title"=>'form_16'],
            ['id'=>'50','sub_module_name'=>'LOAN AND SALARY ADVANCE',"title"=>'loan _and_salary_advance'],

            ['id'=>'51','sub_module_name'=>'REIMBURSEMENTS',"title"=>'loan _and_salary_advance'],
        ]);

        DB::table('vmt_app_sub_modules_links')->truncate();
        DB::table('vmt_app_sub_modules_links')->insert([
            ['id'=>'1','module_id'=>'1','sub_module_id'=>'1'],
            ['id'=>'2','module_id'=>'1','sub_module_id'=>'2'],
            ['id'=>'3','module_id'=>'1','sub_module_id'=>'3'],
            ['id'=>'4','module_id'=>'1','sub_module_id'=>'4'],
            ['id'=>'5','module_id'=>'1','sub_module_id'=>'5'],
            ['id'=>'6','module_id'=>'1','sub_module_id'=>'6'],
            ['id'=>'7','module_id'=>'1','sub_module_id'=>'7'],
            ['id'=>'8','module_id'=>'1','sub_module_id'=>'8'],
            ['id'=>'9','module_id'=>'1','sub_module_id'=>'9'],
            ['id'=>'10','module_id'=>'1','sub_module_id'=>'10'],
            ['id'=>'11','module_id'=>'1','sub_module_id'=>'11'],
            ['id'=>'12','module_id'=>'1','sub_module_id'=>'12'],
            ['id'=>'13','module_id'=>'1','sub_module_id'=>'13'],
            ['id'=>'14','module_id'=>'1','sub_module_id'=>'14'],
            ['id'=>'15','module_id'=>'1','sub_module_id'=>'15'],
            ['id'=>'16','module_id'=>'1','sub_module_id'=>'16'],
            ['id'=>'17','module_id'=>'1','sub_module_id'=>'17'],

            ['id'=>'18','module_id'=>'2','sub_module_id'=>'1'],

            ['id'=>'19','module_id'=>'3','sub_module_id'=>'1'],
            ['id'=>'20','module_id'=>'3','sub_module_id'=>'18'],
            ['id'=>'21','module_id'=>'3','sub_module_id'=>'19'],

            ['id'=>'22','module_id'=>'4','sub_module_id'=>'1'],
            ['id'=>'23','module_id'=>'4','sub_module_id'=>'20'],
            ['id'=>'24','module_id'=>'4','sub_module_id'=>'21'],

            ['id'=>'25','module_id'=>'5','sub_module_id'=>'1'],

            ['id'=>'26','module_id'=>'6','sub_module_id'=>'1'],
            ['id'=>'27','module_id'=>'6','sub_module_id'=>'22'],
            ['id'=>'28','module_id'=>'6','sub_module_id'=>'23'],
            ['id'=>'29','module_id'=>'6','sub_module_id'=>'24'],
            ['id'=>'30','module_id'=>'6','sub_module_id'=>'25'],
            ['id'=>'31','module_id'=>'6','sub_module_id'=>'26'],
            ['id'=>'32','module_id'=>'6','sub_module_id'=>'27'],
            ['id'=>'33','module_id'=>'6','sub_module_id'=>'28'],

            ['id'=>'34','module_id'=>'7','sub_module_id'=>'1'],
            ['id'=>'35','module_id'=>'7','sub_module_id'=>'29'],
            ['id'=>'36','module_id'=>'7','sub_module_id'=>'30'],
            ['id'=>'37','module_id'=>'7','sub_module_id'=>'31'],
            ['id'=>'38','module_id'=>'7','sub_module_id'=>'32'],
            ['id'=>'39','module_id'=>'7','sub_module_id'=>'33'],
            ['id'=>'40','module_id'=>'7','sub_module_id'=>'34'],
            ['id'=>'41','module_id'=>'7','sub_module_id'=>'35'],

            ['id'=>'42','module_id'=>'8','sub_module_id'=>'1'],
            ['id'=>'43','module_id'=>'8','sub_module_id'=>'36'],
            ['id'=>'44','module_id'=>'8','sub_module_id'=>'37'],
            ['id'=>'45','module_id'=>'8','sub_module_id'=>'38'],
            ['id'=>'46','module_id'=>'8','sub_module_id'=>'39'],
            ['id'=>'47','module_id'=>'8','sub_module_id'=>'40'],

            ['id'=>'48','module_id'=>'9','sub_module_id'=>'1'],
            ['id'=>'49','module_id'=>'9','sub_module_id'=>'41'],
            ['id'=>'50','module_id'=>'9','sub_module_id'=>'42'],
            ['id'=>'51','module_id'=>'9','sub_module_id'=>'43'],
            ['id'=>'52','module_id'=>'9','sub_module_id'=>'44'],
            ['id'=>'53','module_id'=>'9','sub_module_id'=>'45'],

            ['id'=>'54','module_id'=>'10','sub_module_id'=>'18'],
            ['id'=>'55','module_id'=>'10','sub_module_id'=>'47'],
            ['id'=>'56','module_id'=>'10','sub_module_id'=>'48'],
            ['id'=>'57','module_id'=>'10','sub_module_id'=>'49'],
            ['id'=>'58','module_id'=>'10','sub_module_id'=>'50'],

            ['id'=>'59','module_id'=>'11','sub_module_id'=>'1'],
            ['id'=>'60','module_id'=>'11','sub_module_id'=>'51'],

            ['id'=>'61','module_id'=>'12','sub_module_id'=>'1'],
            ['id'=>'62','module_id'=>'13','sub_module_id'=>'1'],
            ['id'=>'63','module_id'=>'14','sub_module_id'=>'1'],
            ['id'=>'64','module_id'=>'15','sub_module_id'=>'1'],
            ['id'=>'65','module_id'=>'16','sub_module_id'=>'1'],
            ['id'=>'66','module_id'=>'17','sub_module_id'=>'1'],
            ['id'=>'67','module_id'=>'18','sub_module_id'=>'1'],
            ['id'=>'68','module_id'=>'19','sub_module_id'=>'1'],





        ]);



    }
}
