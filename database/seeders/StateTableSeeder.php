<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
        DB::table('vmt_states')->insert([
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Andhra Pradesh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Andaman and Nicobar Islands', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Arunachal Pradesh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Assam', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Bihar', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Chandigarh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Chhattisgarh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Dadar and Nagar Haveli', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Daman and Diu', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Delhi', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Lakshadweep', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Puducherry', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Goa', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Gujarat', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Haryana', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Himachal Pradesh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Jammu and Kashmir', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Jharkhand', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Karnataka', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Kerala', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Madhya Pradesh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Maharashtra', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Manipur', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Meghalaya', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Mizoram', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Nagaland', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Odisha', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Punjab', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Rajasthan', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Sikkim', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Tamil Nadu', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Telangana', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Tripura', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Uttar Pradesh', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'Uttarakhand', 'status' => 'A'],
            ['country_id'=>'359', 'country_code' => 'IN', 'state_name'=>'West Bengal', 'status' => 'A']
        ]);
    }
}
