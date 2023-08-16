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
            ['id'=>'1','module_name'=>'Mobile App Settings'],
        ]);
        DB::table('vmt_app_sub_modules')->truncate();

        DB::table('vmt_app_sub_modules')->insert([
            ['id'=>'1','sub_module_name'=>'Mobile App'],
            ['id'=>'2','sub_module_name'=>'Check-In / Check-out'],
            ['id'=>'3','sub_module_name'=>'Location Capture'],
            ['id'=>'4','sub_module_name'=>'Check-In / Check-out Selfie'],
            ['id'=>'5','sub_module_name'=>'Reimbursement while Check-out'],
            ['id'=>'6','sub_module_name'=>'Absent/Attendance Regularization'],
            ['id'=>'7','sub_module_name'=>'Leave Apply'],
            ['id'=>'8','sub_module_name'=>'Salary Advance and Loan'],
            ['id'=>'9','sub_module_name'=>'Investments'],
            ['id'=>'10','sub_module_name'=>'PMS'],
            ['id'=>'11','sub_module_name'=>'Exit Apply'],
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

        ]);



    }
}
