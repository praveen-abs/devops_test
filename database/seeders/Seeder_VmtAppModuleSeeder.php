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
            ['id'=>'1','module_name'=>'MOBILE_APP_SETTINGS',"title"=>'mobile_app_settings'],
            ['id'=>'2','module_name'=>'MAIN_DASHBOARD',"title"=>'dashboard'],
            ['id'=>'3','module_name'=>'ATTENDANCE_TIMESHEET',"title"=>'attendance_timesheet'],
            ['id'=>'4','module_name'=>'LEAVE',"title"=>'leave'],
            ['id'=>'5','module_name'=>'PMS',"title"=>'pms'],
            ['id'=>'6','module_name'=>'PAYROLL',"title"=>'payroll'],
            ['id'=>'7','module_name'=>'PAYCHECK',"title"=>'paycheck'],
            ['id'=>'8','module_name'=>'CLAIM',"title"=>'claim'],
            ['id'=>'9','module_name'=>'REPORT',"title"=>'reports'],
        ]);
        DB::table('vmt_app_sub_modules')->truncate();

        DB::table('vmt_app_sub_modules')->insert([
            ['id'=>'1','sub_module_name'=>'IS_MOBILEAPP_ENABLED',"title"=>'mobile_app'],
            ['id'=>'2','sub_module_name'=>'CAN_CHECKIN',"title"=>'check_in'],
            ['id'=>'3','sub_module_name'=>'CAN_CHECKOUT',"title"=>'check-out'],
            ['id'=>'4','sub_module_name'=>'CHECKIN_LOCATION',"title"=>'location_capture'],
            ['id'=>'5','sub_module_name'=>'CHECKIN_SELFIE',"title"=>'check_in_selfie'],
            ['id'=>'6','sub_module_name'=>'CHECKOUT_SELFIE',"title"=>'check_out_selfie'],
            ['id'=>'7','sub_module_name'=>'REIMBURSEMENT_ON_CHECKOUT',"title"=>'reimbursement_while_check_out'],
            ['id'=>'8','sub_module_name'=>'Absent Regularization',"title"=>'absent_regularization'],
            ['id'=>'9','sub_module_name'=>'Attendance Regularization',"title"=>'attendance_regularization'],
            ['id'=>'10','sub_module_name'=>'CAN_APPLY_LEAVE',"title"=>'leave_apply'],
            ['id'=>'11','sub_module_name'=>'Salary Advance and Loan',"title"=>'salary_advance_and_loan'],
            ['id'=>'12','sub_module_name'=>'Investments',"title"=>'investments'],
            ['id'=>'13','sub_module_name'=>'PMS',"title"=>'pms'],
            ['id'=>'14','sub_module_name'=>'Exit Apply',"title"=>'exit_apply'],
            ['id'=>'15','sub_module_name'=>'IS_ENABLED',"title"=>'is_enabled'],
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
            ['id'=>'15','module_id'=>'2','sub_module_id'=>'15'],
            ['id'=>'16','module_id'=>'3','sub_module_id'=>'15'],
            ['id'=>'17','module_id'=>'4','sub_module_id'=>'15'],
            ['id'=>'18','module_id'=>'5','sub_module_id'=>'15'],
            ['id'=>'19','module_id'=>'6','sub_module_id'=>'15'],
            ['id'=>'20','module_id'=>'7','sub_module_id'=>'15'],
            ['id'=>'21','module_id'=>'8','sub_module_id'=>'15'],
            ['id'=>'22','module_id'=>'9','sub_module_id'=>'15'],


        ]);



    }
}
