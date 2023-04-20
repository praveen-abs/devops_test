<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_declarations_fields_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_declarations_fields')->insert([
               ['id' => '1' , 'declaration_field_name' => 'declaration_1' , 'field_type' => ''],
               ['id' => '2' , 'declaration_field_name' => 'declaration_2' , 'field_type' => ''],
          ]);
    }
}
