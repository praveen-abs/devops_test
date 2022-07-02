<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        if (!$user) {
            $hr = DB::table('users')->insert([
                'id' => 1,
                'name' => 'Praveen',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $role = Role::create(['name' => 'HR']);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $hr->assignRole([$role->id]);
            $manager = DB::table('users')->insert([
                'id' => 2,
                'name' => 'Kumar',
                'email' => 'manager@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $role = Role::create(['name' => 'Manager']);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $manager->assignRole([$role->id]);
            $emp1 = DB::table('users')->insert([
                'id' => 3,
                'name' => 'Seeni',
                'email' => 'employee1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $role = Role::create(['name' => 'Employee']);
            $permissions = Permission::pluck('id','id')->whereIn('id', [5,6,7,8])->get();
            $role->syncPermissions($permissions);
            $emp1->assignRole([$role->id]);
            $emp2 = DB::table('users')->insert([
                'id' => 4,
                'name' => 'Seeni',
                'email' => 'employee2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $role = Role::create(['name' => 'Employee']);
            $permissions = Permission::pluck('id','id')->whereIn('id', [5,6,7,8])->get();
            $role->syncPermissions($permissions);
            $emp2->assignRole([$role->id]);
            $emp3 = DB::table('users')->insert([
                'id' => 5,
                'name' => 'Seeni',
                'email' => 'employee3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $role = Role::create(['name' => 'Employee']);
            $permissions = Permission::pluck('id','id')->whereIn('id', [5,6,7,8])->get();
            $role->syncPermissions($permissions);
            $emp3->assignRole([$role->id]);
        }
    }
}
