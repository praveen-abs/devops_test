<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('vmt_bloodgroup')->insert([
            ['name'=> 'A Positive'],
            ['name'=> 'A Negative'],
            ['name'=> 'B Positive'],
            ['name'=> 'B Negative'],
            ['name'=> 'AB Positive'],
            ['name'=> 'AB Negative'],
            ['name'=> 'O Positive'],
            ['name'=> 'O Negative'],
        ]);
    }
}
