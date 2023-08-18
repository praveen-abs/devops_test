<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vmt_snapshot_payroll', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_code')->constrained('users');
            $table->text('employee_name');
            $table->text('gender');
            $table->text('designation');
            $table->date('doj');
            $table->date('dob');
            $table->text('pay_group_id');
            $table->text('employment_status');
            $table->text('location');
            $table->text('business_unit');
            $table->text('cost_center');
            $table->text('legal_entity');
            $table->integer('aadhaar_number');
            $table->text('pan_number');
            $table->integer('uan_number');
            $table->text('epf_number');
            $table->text('esic_number');
            $table->text('bank_name');
            $table->text('bank_account_number');
            $table->text('bank_ifsc_code');
            $table->integer('mobile_number');
            $table->text('email_id');
            $table->text('abry');
            $table->date('payroll_month');
            $table->text('fixed_gross_amount');
            $table->text('basic');
            $table->text('dearness_allowance');
            $table->text('vda');
            $table->text('hra');
            $table->text('child_education_allowance');
            $table->text('communication_allowance');
            $table->text('food_allowance');
            $table->text('leave_travel_allowance');
            $table->text('special_allowance');
            $table->text('other_allowance');
            $table->text('vehicle_reimbursement');
            $table->text('driver_salary');
            $table->text('washing_allowance');
            $table->text('unifrom_allowance');
            $table->text('total_fixed_gross');
            $table->text('month_days');
            $table->text('worked_days');
            $table->text('arrears_days');
            $table->text('LOP');
            $table->text('earned_basic');
            $table->text('basic_arrears');
            $table->text('earned_dearness_allowance');
            $table->text('dearness_allowance_arrears');
            $table->text('earned_vda');
            $table->text('vda_arrears');
            $table->text('earned_hra');
            $table->text('hra_arrears');
            $table->text('earned_special_allowance');
            $table->text('special_allowance_arrears');
            $table->text('earned_other_allowance');
            $table->text('earned_vehicle_reimbursement');
            $table->text('vehicle_reimbursement_arrears');
            $table->text('earned_driver_salary');
            $table->text('driver_salary_arrears');
            $table->text('earned_washing_allowance');
            $table->text('washing_allowance_arrears');
            $table->text('earned_unifrom_allowance');
            $table->text('unifrom_allowance_arrears');
            $table->text('overtime');
            $table->text('incentive');
            $table->text('other_earnings');
            $table->text('leave_encashment');
            $table->text('referral_bonus');
            $table->text('statutory_bonus');
            $table->text('ex_gratia');
            $table->text('gift_payment');
            $table->text('attendance_bonus');
            $table->text('daily_allowance');
            $table->text('total_earned_gross');
            $table->text('epf_wages');
            $table->text('epf_wages_arrears');
            $table->text('epf_employer');
            $table->text('epf_er_arrears');
            $table->text('edli_charges');
            $table->text('edli_charges_arrears');
            $table->text('epf_admin_charges');
            $table->text('epf_admin_charges_arrears');
            $table->text('employer_esic');
            $table->text('employer_lwf');
            $table->text('ctc');
            $table->text('epf_employee');
            $table->text('vpf_employee');
            $table->text('epf_ee_Arrear');
            $table->text('employee_esic');
            $table->text('professional_tax');
            $table->text('income_tax');
            $table->text('salary_advance');
            $table->text('medical_deductions');
            $table->text('canteen_deduction');
            $table->text('uniform_deduction');
            $table->text('loan_deduction');
            $table->text('other_deductions');
            $table->text('lwf');
            $table->text('total_deductions');
            $table->text('net_salary_payable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_snapshot_payroll');
    }
};
