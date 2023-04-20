<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_section_particulars_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_section_particulars')->insert([
          ['id'=> '1' , 'section_id' => '1' , 'particular_id' => '1'],
          ['id'=> '2' , 'section_id' => '1' , 'particular_id' => '2'],
          ['id'=> '3' , 'section_id' => '2' , 'particular_id' => '3'],
          ['id'=> '4' , 'section_id' => '2' , 'particular_id' => '4'],



        ]);
    }
}
