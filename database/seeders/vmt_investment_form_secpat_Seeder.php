<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_form_secpat_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_form_secpat')->insert([
            ['id' => '1' , 'form_id' => '1' , 'sec_pat_id' => '1'],
            ['id' => '2' , 'form_id' => '2' , 'sec_pat_id' => '2'],
            ['id' => '3' , 'form_id' => '3' , 'sec_pat_id' => '3'],
            ['id' => '4' , 'form_id' => '4' , 'sec_pat_id' => '4'],
       ]);
    }
}
