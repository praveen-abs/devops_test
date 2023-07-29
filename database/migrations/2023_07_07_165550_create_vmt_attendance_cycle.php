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
        Schema::create('vmt_attendance_cycle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('vmt_client_master');
            $table->integer('att_cutoff_period_id');
            $table->integer('post_attendance_cutoff_date');
            $table->integer('emp_attedance_cutoff_date');
            $table->integer('paydays_in_month');
            $table->integer('include_weekoffs');
            $table->integer('include_holidays');
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
        Schema::dropIfExists('vmt_attendance_cycle');
    }
};
