<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\VmtMasterConfig;

class MasterConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add new configs here
        $config_settings = [
            "client_code_series" => "100",
            "can_send_appointmentletter_after_onboarding"=>"true",
            "can_send_appointmentmail_after_onboarding"=>"true"
        ];

        $existingConfigs = VmtMasterConfig::whereIn('config_name', array_keys($config_settings))->pluck('config_name');

        //Remove config which already exists in DB
        foreach($existingConfigs as $keys)
        {
            unset($config_settings[$keys]);
        }

        //dd($config_settings);

        //Insert only missing configs
        $newConfigsCount = 0;
        foreach($config_settings as $key => $value)
        {
            DB::table('vmt_config_master')->insert(['config_name'=>$key, 'config_value'=>$value]);
            $newConfigsCount++;
        }

        //dd(DB::table('vmt_config_master')->get()->toArray());
        echo "Configs addded : ".$newConfigsCount." \n";
    }
}
