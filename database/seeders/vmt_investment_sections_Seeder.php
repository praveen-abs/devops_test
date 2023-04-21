<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_sections_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_sections')->insert([

            ['id' => '1' , 'section_name' => 'Section 17(2)'],
            ['id' => '2' , 'section_name' => 'Section 10(13A)'],

        ]);
    }
}
