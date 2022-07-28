<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('roles')->insert([
            ['name'=> 'Admin', 'guard_name'=>'web','created_at' => now(),'updated_at' => now()],
            ['name'=> 'Employee', 'guard_name'=>'web','created_at' => now(),'updated_at' => now()],
            ['name'=> 'Manager', 'guard_name'=>'web','created_at' => now(),'updated_at' => now()],
            ['name'=> 'HR', 'guard_name'=>'web','created_at' => now(),'updated_at' => now()],
        ]);
    }
}
