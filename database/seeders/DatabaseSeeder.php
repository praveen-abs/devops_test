<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([UsersTableSeeder::class]);
        // $this->call([PermissionTableSeeder::class]);
        // $this->call([CountriesTableSeeder::class]);
        // $this->call([VmtHolidaysSeeder::class]);

        /*
            users
            vmt_employee_details
            vmt_employee_office_details

        */
        $this->call([
            BloodGroupSeeder::class,
            VmtHolidaysSeeder::class,
            OrgRolesTableSeeder::class,
            DepartmentTableSeeder::class,
            StateTableSeeder::class,
            BankTableSeeder::class,
            Seeder_VmtMaritalStatus::class,
            CountriesTableSeeder::class,
            LeaveTableSeeder::class,

        ]);

    }
}

