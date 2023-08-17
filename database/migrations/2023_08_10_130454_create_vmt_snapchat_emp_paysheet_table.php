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
        Schema::create('vmt_snapchat_emp_paysheet', function (Blueprint $table) {
            $table->id();
            $table->text('user_code');
            $table->date('payroll_month');
            $table->longText('payslip_data')->nullable();
            $table->longText('Tds_worksheet_data')->nullable();
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
        Schema::dropIfExists('vmt_snapchat_emp_paysheet');
    }
};
