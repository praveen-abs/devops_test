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
        Schema::create('vmt_loan_with_int_transaction_record', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_loan_details_id')->constrained('vmt_emp_int_loan_details');
            $table->text('expected_emi');
            $table->text('paid_emi');
            $table->date('payroll_date');
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
        Schema::dropIfExists('vmt_loan_with_int_transaction_record');
    }
};
