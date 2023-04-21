<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_particulars_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_particulars')->insert([
            ['id' => '1', 'particular_name' => 'Vehicle Reimbursement' ,'references' => 'If Cubic Capacity is below 1.6 ltrs (1600CC) expenses can be considered upto 1800pm & If Cubic Capacity is above 1.6 ltrs then  expenses can be considered upto 2400pm' , 'amount_max_limit' => '28800'],
            ['id' => '2', 'particular_name' => 'Driver Reimbursement' ,'references' => 'Maximum exemption will be restricted to Rs.900/- per month or amount paid under CTC  whichever is less.' , 'amount_max_limit' => '10800'],
            ['id' => '3', 'particular_name' => 'Telephone Reimbursement' ,'references' => 'Exemption will be restricted to the extend of bills provided or as per CTC, whichever is less. Maximum amount of exemption is ' , 'amount_max_limit' => '36000'],
            ['id' => '4', 'particular_name' => 'House Rent Allowance' ,'references' => 'Exemption will be provide the Least of:
            a) Actual HRA paid
            b) Rent paid subtract (-)10% of Basic salary
            c) for Metro 50% of Basic salary (Mumbai, Kolkata, Delhi or Chennai)
            For non metro 40% of Basic salary ' , 'amount_max_limit' => ''],


        ]);

    }
}
