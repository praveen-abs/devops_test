<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_emp_investments_dec_amt_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_emp_investments_dec_amt')->insert([
           ['id' => '1' , 'form_sectionparticular_id' => '1' , 'declaration_amount' =>'150000'],
           ['id' => '2' , 'form_sectionparticular_id' => '2' , 'declaration_amount' =>'200000'],
       ]);
    }
}
