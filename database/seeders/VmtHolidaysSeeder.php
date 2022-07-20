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
            ['holiday_name' => 'Christmas', 'holiday_date' =>	'2022-12-25 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
            ['holiday_name' => 'Independance Day', 'holiday_date' =>	'2022-08-15 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
            ['holiday_name' => 'Good Friday', 'holiday_date' =>	'2022-07-15 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
            ['holiday_name' => 'Ramzan', 'holiday_date' =>	'2022-06-15 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
            ['holiday_name' => 'New Year', 'holiday_date' =>	'2022-01-01 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
        ]);
    }
}
