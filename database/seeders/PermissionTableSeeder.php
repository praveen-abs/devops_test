<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
		   'Performance_Appraisal',
           'Self_Appraisal',
           'Team',
           'ORG',
           'L1_Review',
		   'L2_Review',
           '360_Degree_Review',
		   'Final_Review',
        ];
     
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}