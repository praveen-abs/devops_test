<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_forms_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_forms')->insert([
            ['id' => '1', 'form_name' => 'invertment form 1' , 'active' => '1'],
            ['id' => '2', 'form_name' => 'invertment form 2' , 'active' => '1'],
            ['id' => '3', 'form_name' => 'invertment form 3' , 'active' => '1'],
            ['id' => '4', 'form_name' => 'invertment form 4' , 'active' => '1'],

        ]);
    }
}
