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

            // ['id' => '10' , 'section_name' => 'Section 80C'],
            // ['id' => '11' , 'section_name' => 'Section 80CCC'],
            // ['id' => '11' , 'section_name' => 'Section 80CCD(1)'],
            // ['id' => '12' , 'section_name' => 'Section 80CCD (1B)'],
            // ['id' => '13' , 'section_name' => 'Section 80CCD (2)'],
            // ['id' => '14' , 'section_name' => 'Section 80D'],
            // ['id' => '14' , 'section_name' => 'Section 80DD'],
            // ['id' => '14' , 'section_name' => 'Section 80DDB'],
            // ['id' => '14' , 'section_name' => 'Section 80U'],
            // ['id' => '17' , 'section_name' => 'Section 80E'],
            // ['id' => '18' , 'section_name' => 'Section 80EE'],
            // ['id' => '19' , 'section_name' => 'Section 80EEA'],
            // ['id' => '20' , 'section_name' => 'Section 80EEB'],
            // ['id' => '20' , 'section_name' => 'Section 80G'],
            // ['id' => '7' , 'section_name' => 'Section 80TTA'],
            // ['id' => '8' , 'section_name' => 'Section 80TTB'],
            // ['id' => '6' , 'section_name' => 'Other Income'],
            // ['id' => '5' , 'section_name' => 'Previous Employer Income'],
            // ['id' => '2' , 'section_name' => 'Section 10(13A)'],
            // ['id' => '9' , 'section_name' => 'Section 24'],
            // ['id' => '1' , 'section_name' => 'Section 17(2)'],
            // ['id' => '4' , 'section_name' => 'Section 10(5)'],

            ['id' => '1' , 'section_name' => 'Section 17(2)'],
            ['id' => '2' , 'section_name' => 'Section 10(13A)'],
            ['id' => '3' , 'section_name' => 'Section 10(14)'],
            ['id' => '4' , 'section_name' => 'Sec 80TTA'],
            ['id' => '5' , 'section_name' => 'Sec 80TTB'],
            ['id' => '6' , 'section_name' => 'Section 24'],
            ['id' => '7' , 'section_name' => 'Section 80C'],
            ['id' => '8' , 'section_name' => 'Section 80CCC'],
            ['id' => '9' , 'section_name' => 'Section 80CCD (1B)'],
            ['id' => '10' , 'section_name' => 'Section 80CCD (2)'],
            ['id' => '11' , 'section_name' => 'Section 80D'],
            ['id' => '12' , 'section_name' => 'Section DD'],
            ['id' => '13' , 'section_name' => 'Section DDB'],
            ['id' => '14' , 'section_name' => 'Section 80E'],
            ['id' => '15' , 'section_name' => 'Section 80EE'],
            ['id' => '16' , 'section_name' => 'Section 80EEB'],



        ]);
    }
}
