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
            ['id'=>'1','module_name'=>'MOBILE_APP_SETTINGS',"title"=>'Mobile App Settings'],
            ['id'=>'2','module_name'=>'MAIN_DASHBOARD',"title"=>'Main Dashboard'],
            ['id'=>'3','module_name'=>'ATTENDANCE_TIMESHEET',"title"=>'Attendance Timesheet'],
            ['id'=>'4','module_name'=>'LEAVE',"title"=>'Leave'],
            ['id'=>'5','module_name'=>'PMS',"title"=>'PMS'],
            ['id'=>'6','module_name'=>'PAYROLL',"title"=>'Payroll'],
            ['id'=>'7','module_name'=>'PAYCHECK',"title"=>'Paycheck'],
            ['id'=>'8','module_name'=>'CLAIM',"title"=>'Claims'],
            ['id'=>'9','module_name'=>'REPORT',"title"=>'Reports'],
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
            ['id'=>'11','sub_module_name'=>'CAN_APPLY_LEAVE',"title"=>'Can apply leave?'],
            ['id'=>'12','sub_module_name'=>'Salary Advance and Loan',"title"=>'salary_advance_and_loan'],
            ['id'=>'13','sub_module_name'=>'Investments',"title"=>'investments'],
            ['id'=>'14','sub_module_name'=>'PMS',"title"=>'pms'],
            ['id'=>'15','sub_module_name'=>'Exit Apply',"title"=>'exit_apply'],
            ['id'=>'16','sub_module_name'=>'SALARY_DETAILS',"title"=>'salary_details'],
            ['id'=>'17','sub_module_name'=>'INVESTMENTS',"title"=>'investments'],
            ['id'=>'18','sub_module_name'=>'FORM_16',"title"=>'form_16'],
            ['id'=>'19','sub_module_name'=>'LOAN_AND_SALARY_ADVANCE',"title"=>'loan _and_salary_advance'],
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

            ['id'=>'16','module_id'=>'2','sub_module_id'=>'1'],
            ['id'=>'17','module_id'=>'3','sub_module_id'=>'1'],
            ['id'=>'18','module_id'=>'4','sub_module_id'=>'1'],
            ['id'=>'19','module_id'=>'5','sub_module_id'=>'1'],
            ['id'=>'20','module_id'=>'6','sub_module_id'=>'1'],
            ['id'=>'21','module_id'=>'7','sub_module_id'=>'1'],
            ['id'=>'22','module_id'=>'8','sub_module_id'=>'1'],
            ['id'=>'23','module_id'=>'9','sub_module_id'=>'1'],
            ['id'=>'24','module_id'=>'7','sub_module_id'=>'16'],
            ['id'=>'25','module_id'=>'7','sub_module_id'=>'17'],
            ['id'=>'26','module_id'=>'7','sub_module_id'=>'18'],
            ['id'=>'27','module_id'=>'7','sub_module_id'=>'19'],



        ]);



    }
}
