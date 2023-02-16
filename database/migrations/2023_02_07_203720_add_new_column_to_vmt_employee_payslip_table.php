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
        Schema::table('vmt_employee_payslip', function (Blueprint $table) {
              $table->text('stats_bonus');
              $table->text('earned_stats_bonus');
              $table->text('earned_stats_arrear');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_employee_payslip', function (Blueprint $table) {
              $table->dropColumn('stats_bonus');
              $table->dropColumn('earned_stats_bonus');
              $table->dropColumn('stats_bonus');
        });
    }
};
