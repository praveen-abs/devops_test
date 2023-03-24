<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_department')->insert([
            ['name'=> 'IT', 'created_at' => now()],
            ['name'=> 'Sales', 'created_at' => now()],
            ['name'=> 'HR', 'created_at' => now()],
            ['name'=> 'Support', 'created_at' => now()],
            ['name'=> 'Leadership', 'created_at' => now()],
            ['name'=> 'Production', 'created_at' => now()],
            ['name'=> 'Client Service', 'created_at' => now()],
            ['name'=> 'Business Development', 'created_at' => now()],
            ['name'=> 'Management', 'created_at' => now()],
            ['name'=> 'Finance', 'created_at' => now()],
            ['name'=> 'Admin', 'created_at' => now()],
            ['name'=> 'Creative', 'created_at' => now()],
        ]);
    }
}
