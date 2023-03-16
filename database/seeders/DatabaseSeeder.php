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
        DB::table('users')->insert([
            'id' => '' ,
            'name' => 'super admin',
            'user_code'=>'SA100',
            'email' => 'tested2353@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'avatar'=>'egrherhea',
            'created_at' => now(),
            'updated_at' => now(),
            'is_admin'=>'0',
            'is_onboarded'=>'1',
            'onboard_type'=>'normal',
            'is_ssa'=>'1',
            'can_login'=>'1',


        ]);


        DB::table('vmt_employee_details')->insert([
            'id'=>'',
            'userid'=>'1',
            'emp_no'=>'SA100',
            'gender'=>'male',
            'status'=>'single',
            'doj'=>'2022-11-10',
            'dol'=>'2022-06-02',
            'location'=>'asdf',
            'dob'=>'2022-06-30',
            'aadhar_number'=>'98764345674',
            'father_name'=>'ftyyyuuur',
            'pan_number'=>'ceap543245l',
            'dl_no'=>'876543455',
            'pan_ack'=>'7654332',
            'uan'=>'876544333',
            'epf_number'=>'8776543222',
            'esic_number'=>'3556789654',
            'marital_status'=>'married',
            'basic'=>'6433643',
            'hra'=>'gegeherhe',
            'child_edu_allowance'=>'4456433',
            'spl_alw'=>'523532',
            'total_fixed_gross'=>'555332525',
            'epfemployer'=>'',
            'esicemployer'=>'drhrj',
            'ctc'=>'45332',
            'epfemployee'=>'3636',
            'esicemployee'=>'4636',
            'pt'=>'4636',
            'net'=>'463',
            'esic_applicability'=>'33333336',
            'mobile_number'=>'9654423456',
            'bank_id'=>'54',
            'bank_ifsc_code'=>'sbin2352244',
            'bank_account_number'=>'22555675466667',
            'current_address_line_1'=>'none',
            'current_address_line_2'=>'none',
            'current_country_id'=>'3',
            'current_state_id'=>'22',
            'permanent_address_line_1'=>'none',
            'permanent_address_line_2'=>'none',
            'permanent_country_id'=>'22',
            'permanent_state_id'=>'33',
            'current_city'=>'none',
            'permanent_city'=>'none',
            'current_pincode'=>'099',
            'permanent_pincode'=>'099',
            'present_address'=>'asdf',
            'permanent_address'=>'asdf',
            'father_age'=>'65',
            'mother_name'=>'tfiyf',
            'mother_age'=>'44',
            'spouse_name'=>'egaeg',
            'spouse_age'=>'2022-02-12',
            'kid_name'=>'siiiieed',
            'kid_age'=>'2022-06-23',
            'aadhar_card_file'=>'hi.jpg',
            'aadhar_card_backend_file'=>'hi.jpg',
            'pan_card_file'=>'hi.jpg',
            'passport_file'=>'hi2.jpg',
            'voters_id_file'=>'hi3.jpg',
            'dl_file'=>'hi.jpg',
            'education_certificate_file'=>'hi.jpg',
            'reliving_letter_file'=>'hi.jpg',
            'blood_group_id'=>'1',
            'physically_challenged'=>'no',
            'no_of_children'=>'2',
            'religion'=>'hindu',
           'nationality'=>'indian',
           'passport_date'=>'2022-04-23',
           'passport_number'=>'65433345566',
           'experience_json'=>'363',
           'family_info_json'=>'6363',
           'contact_json'=>'436',
           'mother_dob'=>'2022-06-14',
           'father_dob'=>'2022-07-12',
           'father_gender'=>'male',
           'mother_gender'=>'female',
           'docs_reviewed'=>'636',


        ]);

        DB::table('vmt_employee_office_details')->insert([
            'id'=>'',
            'emp_id'=>'0',
            'user_id'=>'1',
            'department_id'=>'7',
            'process'=>'excutive sales & cummercial',
            'designation'=>'excutive sales & cummercial',
            'cost_center'=>'test',
            'confirmation_period'=>'2022-03-22',
            'holiday_location'=>'chennai',
            'l1_manager_code'=>'SA100',
            'l1_manager_designation'=>'excutive sales & cummercial',
            'l1_manager_name'=>'super admin',
            'l2_manager_code'=>'325',
            'l2_manager_designation'=>'252',
            'l2_manager_name'=>'fafaa',
            'l3_manager_code'=>'twet',
            'l3_manager_designation'=>'fsg',
            'l3_manager_name'=>'esgse',
            'l4_manager_code'=>'225',
            'l4_manager_designation'=>'gaega',
            'l4_manager_name'=>'sgsgs',
            'work_location'=>'chennai',
            'official_mobile'=>'9876543210',
            'emp_notice'=>'hgrh',
            'probation_period'=>'egeg',


        ]);



    }
}
