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
            $table->text('employee_code');
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
            $table->text('pan_number');
            $table->integer('uan_number');
            $table->text('epf_number');
            $table->text('esic_number');
            $table->text('bank_name');
            $table->text('bank_account_number');
            $table->text('bank_ifsc_code');
            $table->text('');

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
