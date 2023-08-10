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
        Schema::create('vmt_emp_paygroupcomp_value', function (Blueprint $table) {
            $table->id();
            $table->date('payroll_month');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paygroup_comp_id')->constrained('vmt_paygroup_comps');
            $table->text('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_emp_paygroupcomp_value');
    }
};
