<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Seeder_VmtOrgTimePeriod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('vmt_org_time_period')->truncate();

       DB::table('vmt_org_time_period')->insert([
        ['id'=>'1','calendar_type'=>'Financial Year','start_date'=>'2022-04-01','end_date'=>'2023-03-31','abbrevation'=>'FY','status'=>'1'],
        ['id'=>'2','calendar_type'=>'Financial Year','start_date'=>'2023-04-01','end_date'=>'2024-03-31','abbrevation'=>'FY','status'=>'0']
       ]);
    }
}
