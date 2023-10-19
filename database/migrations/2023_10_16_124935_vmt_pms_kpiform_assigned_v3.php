<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void max
     */
    public function up()
    {
        Schema::create('vmt_pms_kpiform_assigned_v3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vmt_pms_kpiform_v3_id');
            $table->text('assignee_id');
            $table->text('reviewer_id');
            $table->text('assigner_id');
            $table->text('calendar_type');
            $table->text('year');
            $table->text('frequency');
            $table->text('assignment_period');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('org_time_period_id');
            $table->timestamps();


            $table->foreign('vmt_pms_kpiform_v3_id')->references('id')->on('vmt_pms_Kpiform_v3');
            $table->foreign('department_id')->references('id')->on('vmt_department');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_pms_kpiform_assigned_v3');
    }
};
