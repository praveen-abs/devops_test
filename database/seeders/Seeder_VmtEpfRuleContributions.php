<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Seeder_VmtEpfRuleContributions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vmt_epf_rule_contributions')->truncate();

        DB::table('vmt_epf_rule_contributions')->insert([
            ['id'=>'1','epf_rule'=>'','epf_contribution_type'=>''],
            ['id'=>'2','epf_rule'=>'','epf_contribution_type'=>''],
            ['id'=>'3','epf_rule'=>'','epf_contribution_type'=>''],
            ['id'=>'4','epf_rule'=>'','epf_contribution_type'=>''],

        ]);

    }
}
