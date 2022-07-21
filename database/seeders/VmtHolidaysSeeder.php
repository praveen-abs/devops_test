<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VmtHolidaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_holidays')->insert([
            ['holiday_name' => 'Independance Day', 'holiday_date' => '2022-08-15 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
            ['holiday_name' => 'Gandhi Jayanthi', 'holiday_date' =>	'2022-10-02 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'gandhi_jayandhi.png'],
            ['holiday_name' => 'Ganesh Chadurthi', 'holiday_date' => '2022-08-31 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'ganesh_chadurthi.png'],
            ['holiday_name' => 'Onam', 'holiday_date' => '2022-08-30 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'onam.png'],
            ['holiday_name' => 'Raksha Bandhan', 'holiday_date' => '2022-08-11 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'raksha_bandhan.png'],
        ]);
    }
}
