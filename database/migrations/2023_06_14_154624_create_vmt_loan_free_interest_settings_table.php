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
        Schema::create('vmt_int_free_loan_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('vmt_client_master');
            $table->integer('min_month_served');
            $table->text('loan_applicable_type');
            $table->text('max_loan_month');
            $table->integer('percent_of_ctc');
            $table->integer('deduction_starting_months');
            $table->integer('max_tenure_months');
            $table->text('approver_flow');
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
        Schema::dropIfExists('vmt_loan_free_interest_settings');
    }
};
