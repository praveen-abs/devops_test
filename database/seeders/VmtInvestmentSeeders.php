<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VmtInvestmentSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([


            vmt_investment_forms_Seeder::class,
            vmt_investment_particulars_Seeder::class,
            vmt_investment_sections_Seeder::class,
            vmt_investment_section_particulars_Seeder::class,
            vmt_investment_form_secpat_Seeder::class,
            vmt_investment_declarations_fields_Seeder::class,
            vmt_emp_investments_dec_fields_Seeder::class,
            vmt_emp_investments_dec_amt_Seeder::class,
        ]);
    }
}
