<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Seeder_VmtPayFrequency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('vmt_pay_frequency')->truncate();

        DB::table('vmt_pay_frequency')->insert([
            ['id'=>'1','name'=>'Monthly'],
            ['id'=>'2','name'=>'Weekly'],
            ['id'=>'3','name'=>'Daily'],

        ]);
    }
}
