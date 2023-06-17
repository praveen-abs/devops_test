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
        Schema::create('vmt_emp_int_loan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vmt_int_loan_id')->constrained('vmt_loan_interest_settings');
            $table->integer('eligible_amount');
            $table->text('borrowed_amount');
            $table->text('emi_per_month');
            $table->date('deduction_starting_month');
            $table->date('deduction_ending_month');
            $table->text('tenure_months');
            $table->date('requested_date');
            $table->text('reason');
            $table->text('approver_flow');
            $table->integer('loan_crd_sts');
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
        Schema::dropIfExists('vmt_emp_int_loan_details');
    }
};
