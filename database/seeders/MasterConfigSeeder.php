<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_config_master')->insert(array(
            ['config_name'=>'client_code_series', 'config_value'=>'100'],
            ['config_name'=>'can_send_appointmentletter_after_onboarding', 'config_value'=>'true'],
        ));
    }
}
