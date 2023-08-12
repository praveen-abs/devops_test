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
        Schema::create('vmt_config_apps', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('is_mobile_app_active')->default(0);
            $table->integer('is_checkin_active')->default(0);
            $table->integer('is_checkout_active')->default(0);
            $table->integer('is_location_capture_active')->default(0);
            $table->integer('is_checkin_selfie_active')->default(0);
            $table->integer('is_checkout_selfie_active')->default(0);
            $table->integer('is_reimbursement_checkout_active')->default(0);
            $table->integer('is_absent_regularization_active')->default(0);
            $table->integer('is_attendance_regularization_active')->default(0);
            $table->integer('is_leave_apply_active')->default(0);
            $table->integer('is_salary_advance_loan_active')->default(0);
            $table->integer('is_investments_active')->default(0);
            $table->integer('is_pms_active')->default(0);
            $table->integer('is_exit_apply_active')->default(0);
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
        Schema::dropIfExists('vmt_config_apps');
    }
};
