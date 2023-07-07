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
        Schema::table('vmt_emp_int_loan_details', function (Blueprint $table) {
            $table->text('loan_status')->after('loan_crd_sts');
            $table->text('reviewer_cmds')->after('loan_status');
            $table->date('paid_date')->after('reviewer_cmds');
            $table->text('UTR_number')->after('paid_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_emp_int_loan_details', function (Blueprint $table) {
            //
        });
    }
};
