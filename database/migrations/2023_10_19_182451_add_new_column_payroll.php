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
        Schema::table('vmt_payroll', function (Blueprint $table) {
            $table->date('payroll_start_date')->after('payroll_date');
            $table->date('payroll_end_date')->after('payroll_start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_payroll', function (Blueprint $table) {
            $table->dropColumn('payroll_start_date');
            $table->dropColumn('payroll_end_date');
        });
    }
};
