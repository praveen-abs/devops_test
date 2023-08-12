<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Seeder_VmtAttendanceCutoffPeriod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('vmt_attendance_cutoff_period')->where('is_default','1')->delete();

        DB::table('vmt_attendance_cutoff_period')->insert([
            ['start_date'=>'01','end_date'=>'31','is_default'=>'1'],
            ['start_date'=>'16','end_date'=>'15','is_default'=>'1'],
            ['start_date'=>'21','end_date'=>'20','is_default'=>'1'],
            ['start_date'=>'26','end_date'=>'25','is_default'=>'1'],
            ['start_date'=>'06','end_date'=>'05','is_default'=>'1'],


        ]);
    }

}
