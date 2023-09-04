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
            ['id'=>'1','module_name'=>'Mobile App Settings',"internal_name"=>'mobile_app_settings'],
        ]);
        DB::table('vmt_app_sub_modules')->truncate();

        DB::table('vmt_app_sub_modules')->insert([
            ['id'=>'1','sub_module_name'=>'Mobile App',"internal_name"=>'mobile_app'],
            ['id'=>'2','sub_module_name'=>'Check-In',"internal_name"=>'check_in'],
            ['id'=>'3','sub_module_name'=>'Check-Out',"internal_name"=>'check-out'],
            ['id'=>'4','sub_module_name'=>'Location Capture',"internal_name"=>'location_capture'],
            ['id'=>'5','sub_module_name'=>'Check-In Selfie',"internal_name"=>'check_in_selfie'],
            ['id'=>'6','sub_module_name'=>'Check-out Selfie',"internal_name"=>'check_out_selfie'],
            ['id'=>'7','sub_module_name'=>'Reimbursement while Check-out',"internal_name"=>'reimbursement_while_check_out'],
            ['id'=>'8','sub_module_name'=>'Absent Regularization',"internal_name"=>'absent_regularization'],
            ['id'=>'9','sub_module_name'=>'Attendance Regularization',"internal_name"=>'attendance_regularization'],
            ['id'=>'10','sub_module_name'=>'Leave Apply',"internal_name"=>'leave_apply'],
            ['id'=>'11','sub_module_name'=>'Salary Advance and Loan',"internal_name"=>'salary_advance_and_loan'],
            ['id'=>'12','sub_module_name'=>'Investments',"internal_name"=>'investments'],
            ['id'=>'13','sub_module_name'=>'PMS',"internal_name"=>'pms'],
            ['id'=>'14','sub_module_name'=>'Exit Apply',"internal_name"=>'exit_apply'],
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

        ]);



    }
}
