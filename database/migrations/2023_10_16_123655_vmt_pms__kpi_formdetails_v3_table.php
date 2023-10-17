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
        Schema::create('vmt_pms_kpiform_details_v3', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('vmt_pms_kpiform_v3_id')->constrained('vmt_pms_Kpiform_v3');
            $table->unsignedBigInteger('vmt_pms_kpiform_v3_id');
            $table->text('dimension');
            $table->text('Kpi');
            $table->text('operational_definition');
            $table->text('measure');
            $table->text('frequency');
            $table->text('target');
            $table->text('stretch_target');
            $table->text('source');
            $table->text('kpi_weightage');
            $table->text('matrices');
            $table->timestamps();

            $table->foreign('vmt_pms_kpiform_v3_id')->references('id')->on('vmt_pms_Kpiform_v3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_pms_kpiform_details_v3');
    }
};
