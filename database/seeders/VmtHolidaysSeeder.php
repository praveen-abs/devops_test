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
            ['holiday_name' => 'Pongal', 'holiday_date' => '2022-01-16 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'pongal.jpg'],
            ['holiday_name' => 'Republic Day', 'holiday_date' => '2022-01-16 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'republic_day_jan_26.jpg'],
            ['holiday_name' => 'Good Friday', 'holiday_date' => '2022-04-17 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'Good Friday.jpg'],
            ['holiday_name' => 'May Day', 'holiday_date' => '2022-05-01 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'MayDay.jpg'],
            ['holiday_name' => 'Independance Day', 'holiday_date' => '2022-08-15 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'independence.jpg'],
            ['holiday_name' => 'Gandhi Jayanthi', 'holiday_date' =>	'2022-10-02 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'gandhi_jayandhi.png'],
            ['holiday_name' => 'Ganesh Chadurthi', 'holiday_date' => '2022-09-19 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'ganesh_chadurthi.png'],
            ['holiday_name' => 'Ayutha puja', 'holiday_date' => '2022-10-23 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'aazhutha pooja.png'],
            ['holiday_name' => 'Vijaya Dhashami', 'holiday_date' => '2022-10-24 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'vijaya dashami.png'],
            ['holiday_name' => 'Diwali', 'holiday_date' => '2022-11-13 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'diwali.png'],
            ['holiday_name' => 'Christmas', 'holiday_date' => '2022-12-25 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => 'christmas.png'],
            ['holiday_name' => 'Thiruvallur Day', 'holiday_date' => '2022-01-16 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Saraswathi Pooja', 'holiday_date' => '2022-01-26 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Doljatra', 'holiday_date' => '2022-03-07 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Holi', 'holiday_date' => '2022-03-09 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Holi', 'holiday_date' => '2022-03-10 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Tamil New Year', 'holiday_date' => '2022-04-14 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Ramzan', 'holiday_date' => '2022-04-22 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Bengali New Year', 'holiday_date' => '2022-05-15 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Raksha Bandham', 'holiday_date' => '2022-08-30 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Raksha Bandham', 'holiday_date' => '2022-08-31 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Maha Ashtami', 'holiday_date' => '2022-10-21 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Maha Ashtami', 'holiday_date' => '2022-10-22 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Maha Navami', 'holiday_date' => '2022-10-23 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],
            ['holiday_name' => 'Dussehra', 'holiday_date' => '2022-10-24 00:00:00', 'holiday_description' => 'Government Holiday', 'image' => ''],

        ]);

}

}
