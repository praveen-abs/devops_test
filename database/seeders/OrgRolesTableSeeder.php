<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Delete old data
         DB::table('vmt_org_roles')->truncate();


          DB::table('vmt_org_roles')->insert([
            ['name'=> 'Super Admin', 'email'=>'test@gmail.com','is_active' => 1,'created_at' => now(),'updated_at' => now()],
            ['name'=> 'Admin', 'email'=>'test@gmail.com','is_active' => 1,'created_at' => now(),'updated_at' => now()],
            ['name'=> 'HR', 'email'=>'test@gmail.com','is_active' => 1,'created_at' => now(),'updated_at' => now()],
            ['name'=> 'Manager', 'email'=>'test@gmail.com','is_active' => 1,'created_at' => now(),'updated_at' => now()],
            ['name'=> 'Employee', 'email'=>'test@gmail.com','is_active' => 1,'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
